<?php
session_start();
if (isset($_SESSION['logged in']) || $_SESSION != true) {
    header("location: login.php");
    exit;
}



?>
<!doctype html>
<html lang="en">

<head>
    <style>
        .title2 {
            /* text-align: center; */
            font-size: 2.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-weight: 900;
            color: rebeccapurple;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title class="title2">wellcome
        <?php $_SESSION['username'] ?>
    </title> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <h1 class="title2">Wellcome
        <?php echo $_SESSION['username'] ?>
        <h1>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
                crossorigin="anonymous"></script>
</body>

</html>