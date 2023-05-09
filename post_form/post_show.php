<?php
require_once 'db_post_form.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row) ;
            // die;
            $post = $row['post'];

            $caption = $row['caption'];
            // echo $caption;
            $hashtag = $row['hashtag'];
        }

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
    <div class="container col-4">
        <h1>Post Show </h1>
        <?php if (empty($_GET['id']))
            header('location:display_post.php');
        $id = $_GET['id']; ?>

        <a href="post_add.php?user_id=<?= $id ?>" class="btn btn-primary mb-3">Add Post</a>



        <!-- <table class="table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Post</th>
                    <th>Caption</th>
                    <th>Hashtag</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> -->
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
                
                    
                    <div class="card" style="width: 18rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <img src="<?php echo $post['post'] ?>" alt="post" class="card-img-top" width="100px">
                    
                    <div class="card-body">
                        <h5 class="card-title">
                        <?=$post['caption'];?><br>
                        <?=$post['hashtag'];?>
                        
                    </h5>
                        <a href="user_edit_post.php?post_id=<?= $post['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="user_delete_post.php?post_id=<?= $post['id'] ?> " class="btn btn-danger btn-sm">Delete</a>

                    </div>
                </div>

           


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


</body>

</html>