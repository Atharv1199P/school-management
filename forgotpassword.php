<?php
require 'emailforgetpass.php';
require 'conn.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $conn = mysqli_connect("localhost", "root", "", "school");

    $i = mysqli_query($conn, "SELECT * FROM school_details WHERE username = '$username' AND email = '$email'");
    if (mysqli_num_rows($i) == 1) {
        $row = mysqli_fetch_assoc($i);
        $fname = $row['fname'];
        $password = $row['password'];

        sendforgotpassemail($email, $fname, $password);
       
    } else {
        echo "Username or email does not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div form class="card" style="width: 400px; margin: 50px auto;">
        <div class="card-header">
            <h2>Forgot Password</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="uname" class="form-label">Enter your username:</label>
                    <input type="text" name="username" id="uname" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Enter your email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>



</body>

</html>