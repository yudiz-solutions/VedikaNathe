<?php

include 'database.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}

include 'header.php';
?>


  <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4> Account Details</h4>

                    <!-- SEARCH FORM -->
                    <form action="" method="POST" class="mt-3">
                        <div class="input-group">
                            <input type="text" name="searchVal" class="form-control" placeholder="Search by name">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="search_btn">Search</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>User Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Hobby</th>
                                <th>Profile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['search_btn'])) {
                                $searchVal = $_POST['searchVal'];
                                $query = "SELECT * FROM registration WHERE firstname LIKE '%$searchVal%' or username Like '%$searchVal%' or lastname Like '%$searchVal%' or email Like '%$searchVal%'   ";
                                $query_run = mysqli_query($conn, $query);
                                $number = 0;
                            } else {
                                $query = "SELECT * FROM registration";
                                $query_run = mysqli_query($conn, $query);
                                $number = 0;
                                
                            }

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $user) {
                                    $number++;

                                    // print_r ($user);
                                    // die;
                            
                                    ?>
                                    <tr id="<?php echo $user['id']; ?>">

                                        <td>
                                            <?php echo $number; ?>
                                        </td>

                                        <td>
                                            <?= $user['firstname']; ?>
                                        </td>
                                        <td>
                                            <?= $user['username']; ?>
                                        </td>
                                        <td>
                                            <?= $user['lastname']; ?>
                                        </td>
                                        <td>
                                            <?= $user['email']; ?>
                                        </td>
                                        <td>
                                            <?= $user['hobby']; ?>
                                        </td>

                                        <td>
                                            <img src="<?php echo $user['profile_image'] ?>" alt="profile" width="80"
                                                height="100">
                                        </td>

                                        <td class="action-btn">

                                            <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm"
                                                class="text-light">Edit</a>

                                        <button class="btn btn-danger btn-sm remove">Delete</button>
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
<?php include 'footer.php' ?>
<script type="text/javascript">
    $(document).on("click", ".remove", function () {

        var id = $(this).parents("tr").attr("id");


        if (confirm('Are you sure to remove this record ?')) {
            $.ajax({
                url: 'delete.php',
                type: 'GET',
                data: { id: id },
                error: function () {
                    alert('Something is wrong');
                },
                success: function (data) {
                    $("#" + id).remove();
                    alert("Record removed successfully");
                }
            });
        }
    });



</script>