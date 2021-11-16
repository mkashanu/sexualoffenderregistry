<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width. initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>User register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
	<div class="container">
	<div class="wrapper">
    <div class="form signup">
      <header>Talk to a Therapist</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
           
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
         
          <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="field input">
          
          <input type="password" name="password" placeholder="Password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
        
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </div>
  </div>
	<script src="javascript/pass-show-hide.js"></script>
	<script src="javascript/signup.js"></script>

</body>
</html>