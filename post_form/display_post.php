<?php

include 'db_post_form.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">

        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
    <title>Display All User Account</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4> Account Details
                        <a href="registration_form.php" class="btn btn-primary flot-end">Add Account</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Profile</th>
                                <th>Social Media</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM userdata";
                            $query_run = mysqli_query($conn, $query);
                            $number=0;


                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $user) {
                                    $number++;
                                    // print_r ($user);
                                    // die;
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $number; ?>
                                        </td>

                                        <td>
                                            <?= $user['first_name']; ?>
                                        </td>
                                        <td>
                                            <?= $user['last_name']; ?>
                                        </td>
                                        <td>
                                            <?= $user['username']; ?>
                                        </td>
                                        <td>
                                            <?= $user['email']; ?>
                                        </td>
                                        <td>
                                            <?= $user['password']; ?>
                                        </td>

                                        <td>
                                            <img src="<?php echo $user['profile'] ?>"alt="profile"  width="100px">
                                        </td>
                                        
                                        <td>
                                            <?= $user['social_media']; ?>
                                        </td>
                                        <td>
                                            <a href="post_show.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">View</a>

                                            <a href="post_edit.php ?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">Edit</a>

                                            <a href="post_delete.php?id=<?php echo $user['id'] ?>" class="btn btn-danger btn-sm">Delete</a>                                      
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






</body>

</html>