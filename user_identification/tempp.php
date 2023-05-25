<div id="post-container">
    <?php
    $sql = "SELECT * FROM post LIMIT 10"; // Retrieve the first 10 posts initially
    $result = mysqli_query($conn, $sql);
    $number = 0;

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>";
        // Rest of the table headers...

        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            // Retrieve post details...

            // Display the post details...
        }
        echo "</tbody>";
        echo "</table>";
        $number = mysqli_num_rows($result);
    } else {
        echo "<p>No posts found.</p>";
    }
    ?>
</div>
<button id="load-more-btn" class="btn btn-primary">Load More</button>
<script>
    $(document).ready(function() {
        var start = <?php echo $number; ?>; // Store the current number of posts displayed

        $("#load-more-btn").click(function() {
            $.ajax({
                url: "load_more_posts.php",
                method: "POST",
                data: { start: start },
                success: function(data) {
                    if (data != '') {
                        $("#post-container").append(data); // Append the new posts to the container
                        start += 10; // Increment the start value for the next request
                    } else {
                        $("#load-more-btn").hide(); // Hide the button if no more posts are available
                    }
                }
            });
        });
    });
</script>
 <?php
include 'database.php';

$start = $_POST['start'];
$limit = 10; // Number of posts to load per request

$sql = "SELECT * FROM post LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve post details...
        $post_id = $row['id'];
        
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $msg = $row['msg'];
        $file = $row['file'];
        
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
        echo "<td>$number</td>";
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
   

        // Display the post details...
    }
} else {
    echo '';
}

mysqli_close($conn);
?>
------------------------------
<script>
    $(document).ready(function () {
        var start = <?php echo $number; ?>;
        var total_rows = <?php echo mysqli_num_rows($result); ?>

        $("#load-more-btn").click(function () {
            var button =$(this);
            $.ajax({
                url: "load_more_post.php",
                method: "POST",
                data: { start: start },
                success: function (data) {
                    if (data != '') {
                        $("#post-container").append(data);
                        start += 5;
                    } else {
                      button.hide(); //hide btn if post not available
                    }
                }
            });
        });

        if(start >= totalRows){
            $("#load-more-btn").hide();
        }

        
    });

</script>
------------------------------<script>
    $(document).ready(function () {
        var start = <?php echo $number; ?>;

        $("#load-more-btn").click(function () {
            var button = $(this);
            $.ajax({
                url: "load_more_post.php",
                method: "POST",
                data: { start: start },
                success: function (data) {
                    if (data != '') {
                        $("#post-container").append(data);
                        start += 5;
                    } else {
                        // $("#load-more-btn").hide(); //hide btn if post not available
                        $("#load-more-btn").hide(); // Hide button if no more posts are available
                        $(".post-row.hidden").removeClass("hidden"); // Show the remaining hidden rows
                    }

                }
            });
        });
    });

</script>