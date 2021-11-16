<?php
	 include_once('connect.php');
	 
	 if(isset($_POST['report']))
	 {
		 if(!empty($_POST['name']) && ($_POST['address']) && ($_POST['phone']))
		 {
			 $name= $_POST['name'];
			 $address= $_POST['address'];
			 $phone= $_POST['phone'];
			 
			$query = "INSERT INTO report (name,address,phone) VALUES ('$name','$address','$phone')";
            $query_run = mysqli_query($con, $query);
			 header('Location: ../user_report.php');
		 }
	 }
?>