<?php
session_start();
if (isset($_SESSION['mid'])) {
    $id = $_SESSION['mid'];


    $conn = mysqli_connect("localhost", "root", "", "school");

    $i = mysqli_query($conn, "SELECT * from school_details where role='teacher' and id='$id'");
    while ($row = mysqli_fetch_assoc($i)) {
        echo '<div class = "col-md-4 mb-3">
                <div class = "card">
                    <div class = "card-body">
                        <p class = "card-text"><strong>ID:</strong> ' . $row['id'] . '</p>
                        <p class = "card-text"><strong>First name:</strong> ' . $row['fname'] . '</p>
                        <p class = "card-text"><strong>Middle name:</strong> ' . $row['mname'] . '</p>
                        <p class = "card-text"><strong>Last name:</strong> ' . $row['lname'] . '</p>
                        <p class = "card-text"><strong>Mobile no:</strong> ' . $row['mobile'] . '</p>
                        <p class = "card-text"><strong>Email:</strong> ' . $row['email'] . '</p>
                        <p class = "card-text"><strong>Username:</strong> ' . $row['username'] . '</p>
                        <p class = "card-text"><strong>Password:</strong> ' . $row['password'] . '</p>
                        <p class = "card-text"><strong>role:</strong> ' . $row['role'] . '</p>
                    </div>
                </div>
            </div>';
    }
}


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<a href="logout1.php">Logout</a>