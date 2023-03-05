<?php
$showAlert = false;
$showError = false;
//    $exists=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $err = "";
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $bpassword = password_hash($password,PASSWORD_BCRYPT);

    $existsql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existsql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0) {
        $showError = "ursername already exists ";
    } else {
        // $showError = "ursername already exists ";

        // && $showAlert == false
    }

    if ($password == $cpassword) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ( '$username', '$hash', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            // header("location: login.php");
        }
    } else {
        $showError = "Password do not match  ";
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
    if ($showAlert) {
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account is now created and you can login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div> ';
    }
    ;

    if ($showError) {
        echo '
   <div class="alert alert-danger  alert-dismissible fade show" role="alert">
    <strong >error!  </strong>' . $showError . '
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }
    ;
    ?>


    <div class="container">
        <h1 class="title">Signup to our website</h1>
        <form class="row g-3" name="form" method="post">
            <div class="mb-3">
                <!-- <label for="username" class="form-label">User Name</label> -->
                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" required>
            </div>
            <!-- <div class="col-md-6">
  <label for="Email" class="form-label">Email address</label>
  <input type="email" class="form-control" id="Email" name="Email" placeholder="Email address">
</div> -->
            <div class="col-md-6">
                <label for="password" class="visually-hidden">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
            </div>
            <div class="col-md-6">
                <label for="cpassword" class="visually-hidden">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword"
                    placeholder="Confirm Password" required>
                <small id="emailHelp" class="form-text text-muted">make sure to type the same password</small>
            </div>

            <button class="btn btn-primary" class="col-md-6">Sign up</button>

        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>