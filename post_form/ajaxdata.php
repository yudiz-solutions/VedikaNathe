<?php 
include("db_post_form.php");

if (isset($_POST['country_id'])) {
	$query = "SELECT * FROM state where country_id=".$_POST['country_id'];
	$result = $conn->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select State</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['state_name'].'</option>';
		 }
	}else{

		echo '<option>No State Found!</option>';
	}
}elseif (isset($_POST['state_id'])) {
	$query = "SELECT * FROM city where state_id=".$_POST['state_id'];
	$result = $conn->query($query);
    print_r($result);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select City</option>';
           // die();
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['city_name'].'</option>';
		 }
	}else{

		echo '<option>No City Found!</option>';
	}

}


?>