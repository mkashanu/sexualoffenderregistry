<!DOCTYPE html>
<html>
<head>
	<title>Police admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
     <form action="login.php" method="post">
     	<h5>Police Administration login</h5>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<input type="text" name="uname" placeholder="User Name">

     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>