<?php
include 'database.php';
include 'header.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated data from the form
    $post_id = $_POST['post_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $file = $_POST['file'];
    $caption = $_POST['caption'];
    $hashtag = $_POST['hashtag'];

    // Update the post data in the post table
    $update_post_sql = "UPDATE post SET first_name='$first_name', last_name='$last_name', email='$email', msg='$msg', file='$file' WHERE id='$post_id'";
    if (mysqli_query($conn, $update_post_sql)) {
        echo "<div class='alert alert-success'>Post updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating post: " . mysqli_error($conn) . "</div>";
    }

    // Update the meta data in the meta_post table
    $update_meta_sql = "UPDATE meta_post SET meta_value='$caption' WHERE post_id='$post_id' AND meta_key='caption'";
    mysqli_query($conn, $update_meta_sql);

    $update_meta_sql = "UPDATE meta_post SET meta_value='$hashtag' WHERE post_id='$post_id' AND meta_key='hashtag'";
    mysqli_query($conn, $update_meta_sql);
}

// Retrieve the post details based on the edit_id parameter
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch the post details from the database
    $select_sql = "SELECT * FROM post WHERE id='$edit_id'";
    $result = mysqli_query($conn, $select_sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $post_id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $msg = $row['msg'];
        $file = $row['file'];

        // Fetch the caption from the meta_post table
        $caption = '';
        $select_meta_sql = "SELECT meta_value FROM meta_post WHERE post_id='$post_id' AND meta_key='caption'";
        $meta_result = mysqli_query($conn, $select_meta_sql);
        if (mysqli_num_rows($meta_result) > 0) {
            $meta_row = mysqli_fetch_assoc($meta_result);
            $caption = $meta_row['meta_value'];
        }

        // Fetch the hashtag from the meta_post table
        $hashtag = '';
        $select_meta_sql = "SELECT meta_value FROM meta_post WHERE post_id='$post_id' AND meta_key='hashtag'";
        $meta_result = mysqli_query($conn, $select_meta_sql);
        if (mysqli_num_rows($meta_result) > 0) {
            $meta_row = mysqli_fetch_assoc($meta_result);
            $hashtag = $meta_row['meta_value'];
        }

        // Display the form for updating the post
        ?>
        <div class="container mt-4">
            <h2>Edit Post</h2>
            <form method="POST" action="post_update.php">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>">
                    <span class="error text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>">
                    <span class="error text-danger"></span>

                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                    <span class="error text-danger"></span>

                </div>
                <div class="form-group">
                    <label for="msg">Message:</label>
                    <textarea class="form-control" name="msg" id="msg"><?php echo $msg; ?></textarea>
                    <span class="error text-danger"></span>

                </div>

                <div class="form-group">
                    <label for="file">Your File:*</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" value="<?php echo $file; ?>">
                        <label class="custom-file-label" for="file">Drag and drop your file or browse</label>
                        <span class="error text-danger"></span>

                    </div>

                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $caption; ?>" >
                        <span class="error text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Hashtag</label>
                        <input type="text" class="form-control" id="hashtag" name="hashtag" value="<?php echo $hashtag; ?>">
                        <span class="error text-danger"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-danger'>Post not found.</div>";
    }
}

include 'footer.php';
?>