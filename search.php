<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        #maincontainer {
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <?php
    include 'partials/_header.php';
    include 'partials/_dbconnect.php';
    ?>

    <div class="container my-3" id="maincontainer">
        <h1 class="py-2">Search results for <em>"<?php echo $_GET['search']; ?>"</em></h1>
        <?php
        $noresults = true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM threads WHERE t_title LIKE '%$query%' or t_desc LIKE '%$query%'";
        // "SELECT * FROM  WHERE match (t_title, t_desc) against ('$query')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $noresults = false;
            $title = $row['t_title'];
            $desc = $row['t_desc'];
            $t_id = $row['t_id'];
            $url = "thread.php?threadid=" . $t_id;
            echo '
            <div class="result">
                <h3><a href="'.$url.'" class="text-dark text-decoration-none">'.$title.'</a></h3>
                <p>
                '.$desc.'
                </p>
            </div>
            ';
        }
        if($noresults){
            echo '
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-4">No Results Found</p>
                    <p class="lead">
                    <ul>Suggestions:
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                    </ul>
                    </p>
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
</body>

</html>

<!-- https://source.unsplash.com/2400x700/?code,apple -->