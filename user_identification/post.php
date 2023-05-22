<?php
include 'database.php';
include "header.php";
?>


  <!-- Fetch posts from the database -->
  <?php
  $sql = "SELECT * FROM post";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      echo "<table class='table'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Post ID</th>";
      echo "<th>First Name</th>";
      echo "<th>Last Name</th>";
      echo "<th>Email</th>";
      echo "<th>Message</th>";
      echo "<th>File</th>";
      echo "<th>Meta Data</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($row = mysqli_fetch_assoc($result)) {
          $post_id = $row['id'];
          $first_name = $row['first_name'];
          $last_name = $row['last_name'];
          $email = $row['email'];
          $msg = $row['msg'];
          $file = $row['file'];

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
          echo "<td>$post_id</td>";
          echo "<td>$first_name</td>";
          echo "<td>$last_name</td>";
          echo "<td>$email</td>";
          echo "<td>$msg</td>";
          echo "<td><a href='$file'>$file</a></td>";

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

          echo "</tr>";
      }

      echo "</tbody>";
      echo "</table>";
  } else {
      echo "<p>No posts found.</p>";
  }

  mysqli_close($conn);
  ?>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<?php 
include "footer.php"
?>
