<?php
require_once 'db_post_form.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];


    $sql = "SELECT * FROM posts WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $post = $row['post'];
        $caption = $row['caption'];
        $hashtag = $row['hashtag'];

        
    } else {

        $post = "No post yet";
        $caption = "";
        $hashtag = "";
    }
}


//  else {
//     header("Location: display_post.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Post Show Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/main.js"></script>

</head>

<body>
    <div class="container">
        <h1>Post Show </h1>
        <?php if(empty($_GET['id'])) header('location:display_post.php');
        $id = $_GET['id']; ?>

        <a href="post_add.php?user_id=<?= $id?>" class="btn btn-primary mb-3">Add Post</a>
       


        <table class="table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Post</th>
                    <th>Caption</th>
                    <th>Hashtag</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = $_GET['id'];
                
                $_SESSION['postid'] = $id;
                



                $sql = "SELECT posts.Id AS id, posts.user_id,posts.post,posts.caption,posts.hashtag,userdata.username from posts INNER JOIN userdata ON userdata.id = posts.user_id WHERE userdata.id = $id";
                $query_run = mysqli_query($conn, $sql);

                $number = 0;
                // $number = $user['id']+$count;
                
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $post) {
                       
                        $number++;

                        ?>

                        <tr>
                            <td>
                                <?php echo $number; ?>
                            </td>
                            <td>
                                <img src="<?php echo $post['post'] ?>" alt="post" width="100px">
                            </td>
                            <td>
                                <?php echo $post['caption'] ?>
                            </td>
                            <td>
                                <?php echo $post['hashtag'] ?>
                            </td>
                            <td>
                                
                                <a href="user_edit_post.php?post_id=<?= $post['id']?>" class="btn btn-primary">Edit</a>
                                <form method="POST" action="user_delete_post.php">
                                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<h5> No Record Found </h5>";

                }


                ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Edit Modal -->
    <!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        <input type="hidden" id="editId" name="editId">
                        <div class="mb-3">
                            <label for="editPost" class="form-label">Post</label>
                            <textarea class="form-control" id="editPost" name="editPost" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editCaption" class="form-label">Caption</label>
                            <input type="text" class="form-control" id="editCaption" name="editCaption" required>
                        </div>
                        <div class="mb-3">
                            <label for="editHashtag" class="form-label">Hashtag</label>
                            <input type="text" class="form-control" id="editHashtag" name="editHashtag" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="editForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    Delete Modal -->
    <!-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> -->

                    <!-- <form id="deleteForm" method="POST">
                        <input type="hidden" id="deleteId" name="deleteId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="deleteForm" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div> -->


</body>

</html>