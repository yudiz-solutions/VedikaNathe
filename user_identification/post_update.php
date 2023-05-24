<?php
include 'database.php';
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit;
}

$error = array();
if (isset($_POST['update_account'])) {

    // Get the updated data from the form
    $post_id = $_POST['post_id'];
    
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';

    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '' ;

    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $msg = isset($_POST['msg']) ? $_POST['msg'] : '' ;

    $folder = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
   
    $img_tmp = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name'] : '';
    $file = "./uploads/" . $folder;
  
    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';

    $hashtag = isset($_POST['hashtag']) ? $_POST['hashtag'] : '' ;

    $has_error = false;
    if(empty($first_name)){
        $has_error = true;
        $error['first_name'][] = 'Please enter first name';
    }

    if(empty($last_name)){
        $has_error = true;
        $error['last_name'][] = 'Please enter last name';
    }

    if(empty($email)){
        $has_error = true;
        $error['email'][] = 'Please enter email name';
    }

    if(!empty($_FILES['file']["tmp_name"])){
        move_uploaded_file($img_tmp, $file);
    }else{
        $file = isset($_POST['hidden_file']) ? $_POST['hidden_file'] : '';
    }

    if(empty($caption)){
        $has_error = true;
        $error['caption'][] = 'Please enter caption name';
    }

    if(empty($hashtag)){
        $has_error = true;
        $error['hashtag'][] = 'Please enter hashtag name';
    }

   

    if($has_error==false){

    // Update the post data in the post table
    $update_post_sql = "UPDATE post SET first_name='$first_name', last_name='$last_name', email='$email', msg='$msg', file='$file' WHERE id='$post_id'";

    if (mysqli_query($conn, $update_post_sql)) {
        echo "<div class='alert alert-success'>Post updated successfully.</div>";
         header("location:post.php");
    } else {
        echo "<div class='alert alert-danger'>Error updating post: " . mysqli_error($conn) . "</div>";
    }

    // Update the meta data in the meta_post table

    $update_meta_sql = "UPDATE meta_post SET meta_value='$caption' WHERE post_id='$post_id' AND meta_key='caption'";
    mysqli_query($conn, $update_meta_sql);

    $update_meta_sql = "UPDATE meta_post SET meta_value='$hashtag' WHERE post_id='$post_id' AND meta_key='hashtag'";
    mysqli_query($conn, $update_meta_sql);
}
}


// Retrieve the post details based on the edit_id parameter
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch the post details from the database
    $select_sql = "SELECT * FROM post WHERE id='$edit_id'";
    $result = mysqli_query($conn, $select_sql);

    if ($result && mysqli_num_rows($result) > 0) {
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
        if ($meta_result && mysqli_num_rows($meta_result) > 0) {
            $meta_row = mysqli_fetch_assoc($meta_result);
            $caption = $meta_row['meta_value'];
        }

        // Fetch the hashtag from the meta_post table
        $hashtag = '';
        $select_meta_sql = "SELECT meta_value FROM meta_post WHERE post_id='$post_id' AND meta_key='hashtag'";
        $meta_result = mysqli_query($conn, $select_meta_sql);
        if ($meta_result && mysqli_num_rows($meta_result) > 0) {
            $meta_row = mysqli_fetch_assoc($meta_result);
            $hashtag = $meta_row['meta_value'];
        }

        // Display the form for updating the post
        ?>
        <div class="container mt-4">
            <h2>Edit Post</h2>
            <form method="POST" action="post_update.php?edit_id=<?php echo $_GET['edit_id'];?>"enctype="multipart/form-data">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>">
                    <?php if (!empty($error['first_name'])): ?>
                        <span class="error text-danger"><?php echo $error['first_name'][0]; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>">
                    <?php if (!empty($error['last_name'])): ?>
                        <span class="error text-danger"><?php echo $error['last_name'][0]; ?></span>
                    <?php endif; ?>

                    
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                    <?php if (!empty($error['email'])): ?>
                        <span class="error text-danger"><?php echo $error['email'][0]; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="msg">Message:</label>
                    <textarea class="form-control" name="msg" id="msg"><?php echo $msg; ?></textarea>
                    <?php if (!empty($error['message'])): ?>
                        <span class="error text-danger"><?php echo $error['message'][0]; ?></span>
                    <?php endif; ?>

                    
                </div>

                <div class="form-group">
                    <label for="file">Your File:*</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" value="<?php echo $file; ?>">
                        <input type="hidden" name="hidden_file" value="<?php echo $file; ?>">

                        <label class="custom-file-label" for="file">Drag and drop your file or browse</label>
                        <?php if (!empty($error['file'])): ?>
                        <span class="error text-danger"><?php echo $error['file'][0]; ?></span>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $caption; ?>" >
                        <?php if (!empty($error['caption'])): ?>
                        <span class="error text-danger"><?php echo $error['caption'][0]; ?></span>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Hashtag</label>
                        <input type="text" class="form-control" id="hashtag" name="hashtag" value="<?php echo $hashtag; ?>">
                        <?php if (!empty($error['hashtag'])): ?>
                        <span class="error text-danger"><?php echo $error['hashtag'][0]; ?></span>
                    <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update_account">Update</button>
            </form>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-danger'>Post not found.</div>";
    }
}

include 'footer.php';
?>