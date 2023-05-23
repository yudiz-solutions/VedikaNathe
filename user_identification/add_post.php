
<?php include 'header.php'; ?>

    <div class="row">
          <div class="col-md-12">
              <div class="card-header">
                  <h4>POST FORM</h4>
              </div>
          </div>
    </div>

    <div class="row">
      <div class="col-md-6">

        <form id="post-form"  method="POST" enctype="multipart/form-data">

          <div class="mb-3"></div>

        <div class="form-group">
              <label for="firstname">First Name:*</label>
              <input type="text" class="form-control" id="first_name" name="first_name">
              <span class="error text-danger"></span>
        </div>

        <div class="form-group">
              <label for="lastname">Last Name:*</label>
              <input type="text" class="form-control" id="last_name" name="last_name">
              <span class="error text-danger"></span>
        </div>

        <div class="form-group">
              <label for="email">Email:*</label>
              <input type="email" class="form-control" id="email" name="email">
              <span class="error text-danger"></span>
        </div>

       <div class="form-group">
              <label for="message">Your Message:</label>
              <textarea class="form-control" id="message" name="message"></textarea>
              <span class="error text-danger"></span>

       </div>

        <div class="form-group">
                <label for="file">Your File:*</label>
              <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file">
                    <label class="custom-file-label" for="file">Drag and drop your file or browse</label>
                    <span class="error text-danger"></span>

              </div>

        <div class="form-group">
              <label for="caption">Caption</label>
              <input type="text" class="form-control" id="caption" name="caption">
              <span class="error text-danger"></span>
        </div>
        
        
        <div class="form-group">
              <label for="lastname">Hashtag</label>
              <input type="text" class="form-control" id="hashtag" name="hashtag">
              <span class="error text-danger"></span>
        </div>
      </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
  </div>

  
  <script type="text/javascript">
  $(document).ready(function() {
    $("#post-form").on("submit", function(event) {
      event.preventDefault();

      // Get the values of form elements
      var first_name = $("#first_name").val();
      var last_name = $("#last_name").val();
      var email = $("#email").val();
      var message = $("#message").val();
      var file = $("#file")[0].files[0];
      var caption = $("#caption").val();
      var hashtag = $("#hashtag").val();

      // Create a new FormData object
      var formData = new FormData();

      // Append the form data to the FormData object
      formData.append('first_name', first_name);
      formData.append('last_name', last_name);
      formData.append('email', email);
      formData.append('message', message);
      formData.append('file', file);
      formData.append('caption', caption);
      formData.append('hashtag', hashtag);

      // Reset error messages
      $("#first_name").next().text("");
      $("#last_name").next().text("");
      $("#email").next().text("");
      $("#message").next().text("");
      $("#file").next().text("");

      // Validate form fields
      if (first_name.trim() == "") {
        $("#first_name").next().text("Please enter your first name.");
      }

      if (last_name.trim() == "") {
        $("#last_name").next().text("Please enter your last name.");
      }

      if (email.trim() == "") {
        $("#email").next().text("Please enter your email.");
      }

      if (message.trim() == "") {
        $("#message").next().text("Please enter your message.");
      }

      if (!isValidEmail(email)) {
        $("#email").next().text("Please enter a valid email address.");
      }

      
      $.ajax({
        url: 'post_client_validation.php',
        type: "POST",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
          var obj = JSON.parse(response);
              console.log(obj);
          var error = '';
          $.each(obj, function(input_id, error_message) {
            $("#" + input_id).next().html(error_message);
          });

          
          if (obj.status == 1) {
            $('#post-form').trigger('reset');
            // console.log(obj);
            swal({
              title: "Success",
              text: "Post Added Successfully",
              icon: "success",
              buttons: {
                confirm: "Okay"
              },
              closeOnClickOutside: false
            });
          }
        },
        error: function() {
          console.log('Error');
        }
      });
    });

    function isValidEmail(email) {
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });
</script>
<?php include 'footer.php'; ?>

  