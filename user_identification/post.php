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
<div id="post-container">

    <?php
    $limit = 3; 
    $sql = "SELECT * FROM post LIMIT $limit";
    $result = mysqli_query($conn, $sql);
   
    
    // $sql = "SELECT * FROM post";
// $result = mysqli_query($conn, $sql);
// // $number= 0;
    
    if (mysqli_num_rows($result) > 0) {
    
        echo "<table class='table'>";

        echo "<thead>";
        echo "<tr >";

        echo "<th>Sr.No.</th>";
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

       
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
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
        }

        echo "</tbody>";
        echo "</table>";

        $sql_count = "SELECT COUNT(*) AS total_posts FROM post";
        $count_result = mysqli_query($conn, $sql_count);
        $total_posts = 0;
        
        if ($count_result && mysqli_num_rows($count_result) > 0) {
            $row_count = mysqli_fetch_assoc($count_result);
            $total_posts = $row_count['total_posts'];
        }

        $all_posts_displayed = mysqli_num_rows($result) >= $total_posts;


        if ($all_posts_displayed) {
            echo "<script>$('#load-more-btn').hide();</script>";
        }

    } else {
        echo "<p>No posts found.</p>";
    }

    mysqli_close($conn);
    ?>
</div>
<button id="load-more-btn" class="btn btn-primary learn-more-btn">Load More</button>
<!-- <input type="hidden" id="row" value="0">
<input type="hidden" id="> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        var start = <?php echo  $limit; ?>;
        var totalPosts =<?php echo $total_posts; ?>;

        $("#load-more-btn").click(function () {
            var button = $(this);
            $.ajax({
                url: "load_more_post.php",
                method: "POST",
                data: { start: start },
                success: function (data) {
                    if (data != '') {
                        $("#post-container").append(data);
                        start += <?php echo $limit; ?>;
                        if (start >= totalPosts) {
                            button.hide();
                            // $(".post-row.hidden").removeClass("hidden"); 
                        }
                    } else {
                        button.hide(); 
                    }

                }
            });
        });
    });

</script>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?"); // Display confirmation dialog
    }
</script>

<?php
include "footer.php" ?>