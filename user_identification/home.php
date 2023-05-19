<?php
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}
?>

    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>Welcome,Veds</h4>
            </div>
        </div>
    </div>
<?php include 'footer.php' ?>
