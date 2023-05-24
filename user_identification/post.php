<?php
include 'database.php';
include "header.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit;
}
?>


<!-- Fetch posts from the database -->
<?php
$sql = "SELECT * FROM post";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Post ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Email</th>";
    echo "<th>Message</th>";
    echo "<th>File</th>";
    echo "<th>Meta Data</th>";
    echo "<th>Action</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        // print_r($row);
        $post_id = $row['id'];
        
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $msg = $row['msg'];
        $file = $row['file'];
        

        // Fetch meta data for the post
        $meta_sql = "SELECT meta_key, meta_value FROM meta_post WHERE post_id = $post_id";
        $meta_result = mysqli_query($conn, $meta_sql);

        $meta_data = array();
        if (mysqli_num_rows($meta_result) > 0) {
            while ($meta_row = mysqli_fetch_assoc($meta_result)) {
                $meta_key = $meta_row['meta_key'];
                $meta_value = $meta_row['meta_value'];

                $meta_data[$meta_key] = $meta_value;
            }
        }

        // Display the post details
        echo "<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$first_name</td>";
        echo "<td>$last_name</td>";
        echo "<td>$email</td>";
        echo "<td>$msg</td>";
        echo "<td><img src='$file' alt='File' width='80' height='100'></td>";
        

        // Display the meta data
        echo "<td>";
        if (!empty($meta_data)) {
            foreach ($meta_data as $meta_key => $meta_value) {
                echo "<p>$meta_key: $meta_value</p>";
                // echo "<p>$meta_value</p>";
            }
        } else {
            echo "No meta data found.";
        }
        echo "</td>";
        echo "<td>";
        echo "<a href='post_update.php?edit_id=$post_id' class='btn btn-primary'>Edit</a>";
        echo " ";
        echo "<a href='post_delete.php?delete_id=$post_id' class='btn btn-danger' onclick='return confirmDelete()'>Delete</a>"; // Add onclick event for confirmation
        echo "</td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No posts found.</p>";
}

mysqli_close($conn);
?>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?"); // Display confirmation dialog
    }
</script>
<?php
include "footer.php" ?>

