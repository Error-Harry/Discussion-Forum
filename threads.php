<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        #ques {
            min-height: 433px;
        }
    </style>
</head>

<body>
    <?php
    include 'partials/_dbconnect.php';
    include 'partials/_header.php';
    ?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE c_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['c_name'];
        $catdesc = $row['c_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER["REQUEST_METHOD"];
    if ($method == 'POST') {
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<", "&lt;", $th_title); 
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);
        $u_id = $_POST['u_id'];
        $sql = "INSERT INTO `threads` (`t_title`, `t_desc`, `t_cat_id`, `t_user_id`, `t_timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$u_id', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Your thread has been added! Please wait for community to respond
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        }
    }

    ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
            <p class="lead"> <?php echo $catdesc; ?> </p>
            <hr class="my-4">
            <p>This is peer to peer forum. Keep it friendly.
                Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                Stay on topic. ...
                Share your knowledge. ...
                Refrain from demeaning, discriminatory, or harassing behaviour and speech.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '
            <div class="container">
                <h1 class="py-2">Start a Discussions</h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="title">Problem Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                        <small id="" class="form-text text-muted">Keep your title as crisp and short as possible</small>
                    </div>
                    <input type="hidden" name="u_id" value="'.$_SESSION["u_id"].'">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            ';
        }
    else{
        echo '
        <div class="container">
            <h1 class="py-2">Start a Discussions</h1>
            <p class="lead">Your are not logged in. Please login to be able to start a Discussions</p>
        </div>
        ';
    }
    ?>

    <div class="container" id="ques">
        <h1 class="py-2">Browse Questions</h1>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE t_cat_id = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['t_id'];
            $title = $row['t_title'];
            $desc = $row['t_desc'];
            $t_time = $row['t_timestamp'];
            $t_user_id = $row['t_user_id'];
            $sql2 = "SELECT u_email FROM users WHERE u_id = '$t_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            echo '
            <div class="media my-3">
                <img src="img/userd.jpg" width="55px" class="mr-3" alt="...">
                <div class="media-body">
                <p class="font-weight-bold my-0">Asked by: '.$row2['u_email'].' at '.$t_time.' </p>
                    <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
                    ' . $desc . '
                </div>
            </div>
            ';
        }
        if ($noResult) {
            echo '
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                <p class="display-4">No Threads Found</p>
                <p class="lead">Be the first person to ask question.</p>
                </div>
          </div>
            ';
        }
        ?>
    </div>

    <?php
    include 'partials/_footer.php';
    ?>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>

<!-- https://source.unsplash.com/2400x700/?code,apple -->