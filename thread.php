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
    include 'partials/_header.php';
    include 'partials/_dbconnect.php';
    ?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE t_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['t_title'];
        $desc = $row['t_desc'];
        $t_user_id = $row['t_user_id'];
        $sql2 = "SELECT u_email FROM users WHERE u_id = '$t_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['u_email'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER["REQUEST_METHOD"];
    if ($method == 'POST') {
        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);
        $u_id = $_POST['u_id'];
        $sql = "INSERT INTO `comments` (`c_content`, `t_id`, `c_by`, `c_time`) VALUES ('$comment', '$id', '$u_id', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Your comment has been added!
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
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"> <?php echo $desc; ?> </p>
            <hr class="my-4">
            <p>This is peer to peer forum. Keep it friendly.
                Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                Stay on topic. ...
                Share your knowledge. ...
                Refrain from demeaning, discriminatory, or harassing behaviour and speech.</p>
            <p>Posted by: <b><?php echo $posted_by; ?></b></p>
        </div>
    </div>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '
            <div class="container">
                <h1 class="py-2">Post a Comment</h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Type Your Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        <input type="hidden" name="u_id" value="' . $_SESSION["u_id"] . '">
                    </div>
                    <button type="submit" class="btn btn-success">Post Comment</button>
                </form>
            </div>
            ';
    } else {
        echo '
        <div class="container">
        <h1 class="py-2">Post a Comment</h1>
            <p class="lead">Your are not logged in. Please login to be able to post comments</p>
        </div>
        ';
    }
    ?>

    <div class="container mb-5" id="ques">
        <h1 class="py-2">Discussions</h1>

        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE t_id = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['c_id'];
            $content = $row['c_content'];
            $c_time = $row['c_time'];
            $c_by = $row['c_by'];
            $sql2 = "SELECT u_email FROM users WHERE u_id = '$c_by'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);


            echo '
            <div class="media my-3">
                <img src="img/userd.jpg" width="55px" class="mr-3" alt="...">
                <div class="media-body">
                <p class="font-weight-bold my-0">Commented by: ' . $row2['u_email'] . ' at ' . $c_time . ' </p>
                    ' . $content . '
                </div>
            </div>
            ';
        }

        if ($noResult) {
            echo '
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                <p class="display-4">No comment Found</p>
                <p class="lead">Be the first person to comment.</p>
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