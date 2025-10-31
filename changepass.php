<?php
require 'conn.php';
if (isset($_POST['submit'])) {
    $psd = $_POST['psd'];
    $password = $_POST['password'];


    

    $i = mysqli_query($conn, "UPDATE school_details set  password = '$psd'   where password = '$password'");
    if ($i > 0) {
        echo "<strong>Updated successfully</strong>";
    } else {
        echo "Failed";
    }
} else {
    echo "<strong>Please check the all fields.</strong>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change - password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
   
    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="#">
            SGI Panel
        </a>
        

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="list.php">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="changepass.php">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger fw-semibold" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>

    </div>
</nav>


</nav>
    <div class="card" style="width: 700px; margin: 50px auto; ">
        <div class="card-header">
            <h2>change password</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="psd" class="form-label">Enter your last password:</label>
                    <input type="password" name="password" id="psd" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="psd1" class="form-label">Enter new password:</label>
                    <input type="password" name="psd" id="psd1" class="form-control">
                </div>


                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-success">update</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>