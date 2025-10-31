<?php
session_start();

require 'conn.php'; 
if (isset($_SESSION['mid'])) {

    $i = mysqli_query($conn, "SELECT * FROM school_details where role='student'");
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php require 'nav.php'; ?>

<div class="container mt-4">
    <div class="row">

        <?php
        if(isset($i)) {
        while ($row = mysqli_fetch_assoc($i)) {
            echo ' <div class = "col-md-4 mb-3">
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
    }else{
        echo '<div class="alert alert-warning">No records found.</div>';
    }
            ?>