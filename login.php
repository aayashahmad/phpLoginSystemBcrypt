<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $err = "";
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM `users` WHERE  username='$username' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: wellcome.php");
            }
        }
    } else {
        $showError = "invalid Credentials";
    }

}
?>


<!doctype html>
<html lang="en">

<head>
    <style>
        .title {
            font-size: 2.5rem;
            margin: 20px 0px;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php' ?>

    <?php
    if ($login) {
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your are logged in.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div> ';
    }
    ;
    if ($showError) {
        echo '
   <div class="alert alert-danger  alert-dismissible fade show" role="alert">
     <strong>invalid Credentials!</strong> ,' . $showError . ', .
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }
    ;
    ?>


    <div class="container ">
        <h1 class="title">Login to our website</h1>
        <form class="row g-3" name="form" method="post">
            <div class="mb-3 ">

                <!-- <label for="username" class="form-label">User Name</label> -->
                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" required>
            </div>
            <!-- <div class="col-md-6">
  <label for="Email" class="form-label">Email address</label>
  <input type="email" class="form-control" id="Email" name="Email" placeholder="Email address">
</div> -->
            <div class="mb-3 ">
                <label for="password" class="visually-hidden">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
            </div>


            <button class="btn btn-primary" class="mb-3">Log in</button>

        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>