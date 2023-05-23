<?php
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}

include 'database.php';
$loggedInUsername = $_SESSION['username'];
$sql = "SELECT firstname FROM registration WHERE username='$loggedInUsername'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $firstName = $row['firstname'];
} else {
    $firstName = "User"; // Set a default value if the first name is not found
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h4>Welcome, <?php echo $firstName; ?></h4>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
