<?php
require 'sendemail.php';
require 'conn.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    function generateRandomPassword(int $length = 12): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:,.<>?';
        $password = '';
        $charLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $charLength - 1)];
        }

        return $password;
    }
    $password = generateRandomPassword(12);
    




    $i = mysqli_query($conn, "INSERT INTO school_details(fname,mname,lname,mobile,email,username,password,role) VALUES('$fname','$mname','$lname','$mobile','$email','$username','$password','$role')");

    if ($i > 0) {
        sendRegistrationEmail($email, $fname, $password);
        echo "<strong>Inserted successfully.</strong>";
    } else {
        echo "Failed";
    }
} else {
    echo "<strong>Please fill in all fields.</strong>";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="card" style="width: 700px; margin: 50px auto; ">
        <div class="card-header">
            <h2>Registration</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="id" class="form-label">Enter your ID:</label>
                    <input type="text" name="id" id="id" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="fname" class="form-label">Enter your first name:</label>
                    <input type="text" name="fname" id="fname" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="mname" class="form-label" class="form-label">Enter your middle name:</label>
                    <input type="text" name="mname" id="mname" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="lname" class="form-label">Enter your last name:</label>
                    <input type="text" name="lname" id="lname" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Enter your mobile no:</label>
                    <input type="number" name="mobile" id="mobile" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Enter your email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="uname" class="form-label">Enter your username:</label>
                    <input type="text" name="username" id="uname" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="psd" class="form-label">Enter your password:</label>
                    <input type="password" name="password" id="psd" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Enter your role:</label>
                    <input type="text" name="role" id="role" class="form-control">
                </div>




                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-success">Register</button>
                </div>
                
            </form>
        </div>
    </div>
</body>

</html>