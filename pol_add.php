<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Offender</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<nav>
         <ul>
            <li><a href="pol_home.php">Home</a></li>
            <li>
               <a href="#">Offenders
               <i class="fas fa-caret-down"></i>
               </a>
               <ul>
                  <li><a href="pol_view.php">Offenders</a></li>
                  <li><a class ="active" href="pol_add.php">Add Offenders</a></li>
                  <li><a href="pol_search.php">Search offenders</a></li>
               </ul>
            </li>
			<li><a href="pol_report.php">Reports</a></li>
			<li><a href="../logout.php">Logout</a><li>
         </ul>
      </nav>
    <br>
	
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">

                <?php include('includes/message.php'); ?>
                
                <div class="card">
                    <div class="card-header">
                        <h6>
                            REGISTER OFFENDER
                        </h6>
                    </div>
                    <div class="card-body">

                        <form action="function.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Fullname</label>
                                <input type="text" name="name" required class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Town</label>
                                <input type="text" name="town" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Type of offense</label>
                                <input type="text" name="type" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="text" name="status" required class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Upload image</label>
                                <input type="file" name="image" required class="form-control">
                            </div>

                            <div class="mb-3">
                                <hr>
                                <button type="submit" name="saveOffender" class="btn btn-secondary float-end">Save Offender</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

