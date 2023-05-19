
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
      </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
  </div>
<?php include 'footer.php'; ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#post-form").on("submit",function (event){
        event.preventDefault();

        // get the values of form elements

        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var file = $("#file")[0].files[0];

        console.log($("#file")[0].files[0])

        //  sets or returns the text content of the selected elements.

        $("#first_name").next().text("");
        $("#last_name").next().text("");
        $("#email").next().text();
        $("#message").next().text("");
        $("#file").next().text("");

        if(first_name.trim() == ""){
          $("#first_name").next().text("Please enter your first name.");
        }

        if(last_name.trim() == ""){
          $("#last_name").next().text("Please enter your last name.");
        }

        if(email.trim() == ""){
          $("#email").next().text("Please enter your first name.");
        }

        if(message.trim() == ""){
          $("#message").next().text("Please enter your message name.");
        }

        if (!isValidEmail(email)) {
          $("#email").next().text("Please enter a valid email address.");
        }

        if(file == '' || file == undefined){
          $("#file").next().next().text("Please select a file.");
        }
        console.log(file);

        // if(file != '' && file != undefined){
        //   console.log(file.size)
        //   //var obj = JSON.parse(file);
        //   if(file.size  > 10000000){
        //     $("#file").next().next().text("Size error.");
        //   }       
        //   //$("#file").parent().text("Please select a file.");
        // }

        function isValidEmail(email) {
          var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          return emailRegex.test(email);
        }

        // it contains data in organize manner and send to the server
        var formData = new FormData(this);
     
        $.ajax({
          url: 'post_client_validation.php',
          type: "POST",
          processData: false, //prevents jquery from processing the data
          contentType: false,      
          data:formData,
          success:function(response) {
            var obj = JSON.parse(response);
            alert('test');


            var error = '';
            $.each(obj, function (input_id, error_message) {
              console.log(input_id)
              $("#" + input_id).next().html(error_message);

            });

            $('#post-form').trigger('reset');
            alert(obj.status);
            if(obj.status == 1) {

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
          error:function() {
            console.log('Error');
          }
        });
      });
    });
  </script>

  