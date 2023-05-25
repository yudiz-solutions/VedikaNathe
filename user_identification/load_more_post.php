<?php
include 'database.php';

$start = $_POST['start'];
$limit = 3;

$sql = "SELECT * FROM post LIMIT $start, $limit";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<tbody>";

    $number=$start;
    while($row = mysqli_fetch_assoc($result)){

        $post_id = $row['id'];

        $first_name = $row['first_name'];

        $last_name = $row['last_name'];

        $email = $row['email'];

        $msg = $row['msg'];

        $file = $row['file'];
        
        echo "<tbody>";
        $number++;

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
        echo"<td>$number</td>";
        // echo "<td>$post_id</td>";
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
            }
        } else {
            echo "No meta data found.";
        }
        echo "</td>";
        echo "<td>";
        echo "<a href='post_update.php?edit_id=$post_id' class='btn btn-primary'>Edit</a>";
        echo " ";
        echo "<a href='post_delete.php?delete_id=$post_id' class='btn btn-danger' onclick='return confirmDelete()'>Delete</a>";
        echo "</td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    $all_posts_displayed = mysqli_num_rows($result) < $limit;
    if ($all_posts_displayed) {
        echo "<script>$('#load-more-btn').hide();</script>";
    }else {
        echo "<script>$('#load-more-btn').show();</script>";
    }

} else {
    echo " ";
}

mysqli_close($conn);
?>
