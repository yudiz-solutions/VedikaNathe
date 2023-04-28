<?php
// var_dump($_SESSION['message']);
if (isset($_SESSION['message'])):
    ?>


    <div id="alert" class="alert alert-danger">
       
        <strong>Hey!</strong>
        <?= $_SESSION['message']; ?>
        <button onclick="document.getElementById('alert').style.opacity = '0'" type="button" class="close"
            data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
    unset($_SESSION['message']);
endif;
?>