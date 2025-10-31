<?php
require 'conn.php';
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];







    $i = mysqli_query($conn, "SELECT * from school_details where username = '$username' and password = '$password'");
    if (mysqli_num_rows($i) == 1) {
        $row = mysqli_fetch_assoc($i);
        if ($row['role'] == 'teacher') {
            $_SESSION['mid'] = $row['id'];
            $_SESSION['rl'] = $row['role'];
            header("Location:list.php");
        } else if ($row['role'] == 'student') {
            $_SESSION['mid'] = $row['id'];
            $_SESSION['rl'] = $row['role'];
            header("Location:student1.php");
        } else {
            header("Location:login.php");
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div  class="card" style="width: 400px; margin: 50px auto;">
        <div class="card-header">
            <h2>Login</h2>
            <div class="mt-2 d-flex justify-content-end p-1">
                <a href="register.php" class="btn btn-primary">Register</a>
            </div>
        </div>

        <div class="card-body">
            <form action="" method="post">

                <div class="mb-3 mt-3">
                    <label for="uname" class="form-label">Enter your username:</label>
                    <input type="text" name="username" id="uname" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="psd" class="form-label">Enter your password:</label>
                    <input type="password" name="password" id="psd" class="form-control">
                </div>



                <div class="mb-3 d-flex justify-content-start gap-2">
                    <button type="submit" name="submit" class="btn btn-success">Login</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

                <div>
                    <a href="forgotpassword.php" class="btn btn-warning">Forgot Password</a>
                </div>

            </form>
        </div>
    </div>
</body>

</html>