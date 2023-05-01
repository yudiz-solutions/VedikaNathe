<?php
  require 'db_connection_crud.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card-header">
            <h4>Student Details 
              <a href="crud_student.php" class="btn btn-primary flot-end">Add Students</a>
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-border table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Course</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM students";
                $query_run = mysqli_query($connection,$query);

                if(mysqli_num_rows($query_run)>0)
                {
                  foreach($query_run as $student)
                  {
                    // echo $student['name'];
                    ?>
                    <tr>
                      <td><?= $student['id'];?></td>
                      <td><?= $student['name'];?></td>
                      <td><?= $student['email'];?></td>
                      <td><?= $student['phone'];?></td>
                      <td><?= $student['course'];?></td>
                      <td>
                      <a href="" class="btn btn-info btn-sm">View</a>
                        <a href="student_edit.php?id=<?= $student['id'];?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                      </td>

                    </tr>
                    <?php
                  }
                }    
                  else
                  {
                    echo "<h5> No Record Found </h5>";

                  }
                

                ?>
              </tbody>
              
            </table>


          </div>

        </div>

      </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>