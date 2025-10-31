<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $conn = mysqli_connect("localhost", "root", "", "school");

    $i = mysqli_query($conn, "SELECT * from school_details where username = '$username' and password ='$password'");
    
    if (mysqli_num_rows($i) == 1) {
        $row = mysqli_fetch_assoc($i);
        if ($row['role'] == 'teacher' && $role == 'teacher') {
            $_SESSION['mid'] = $row['id'];
            $_SESSION['rl'] = $row['role'];
            header("Location:profile1.php");
        } else {
            header("Location:profile.php");
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form action="" method="post">

        <div class="mb-3 mt-3">
            <label for="uname"  class="form-label">Enter your username:</label>
            <input type="text" name="username" id="uname" class="form-control">
        </div>

        <div class="mb-3">
            <label for="psd"  class="form-label">Enter your password:</label>
            <input type="password" name="password" id="psd" class="form-control">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Enter your role:</label>
            <input type="text" name="role" id="role" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-success">Login</button>
        </div>
        
    </form>
</body>

</html>