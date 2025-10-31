<?php
session_start();
require 'conn.php';
if (isset($_SESSION['mid'])) {
    $id = $_SESSION['mid'];

    $i = mysqli_query($conn, "SELECT * FROM school_details where role='student' and id='$id'");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-sm bg-light">

    <div class="container-fluid ">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="student1.php">student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="changepass.php">change password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>

</nav>

<div class="container mt-4">
    <div class="row">
<?php
if (isset($i)) {
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
} else {
    echo '<div class="alert alert-warning">No records found.</div>';
}
?>
    </div>
</div>