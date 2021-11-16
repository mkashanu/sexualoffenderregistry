<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Offender Details</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

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
                  <li><a class="active" href="pol_view.php">Offenders</a></li>
                  <li><a href="pol_add.php">Add Offenders</a></li>
                  <li><a href="pol_search.php">Search offenders</a></li>
               </ul>
            </li>
			<li><a href="pol_report.php">Reports</a></li>
			<li><a href="../logout.php">Logout</a><li>
         </ul>
      </nav>
    
    <div class="container">

                <?php include('includes/message.php'); ?>
                
                <?php
                require_once 'includes/dbconfig.php';

                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $query = "SELECT * FROM offender WHERE id='$id' ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $studentData = mysqli_fetch_array($query_run);
                        ?>
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        
                                            <a href="offender-view.php" class="btn btn-secondary float-end">BACK</a>
                                      
                                    </div>
                                    <div class="card-body">

                                        <form action="function.php" method="POST" enctype="multipart/form-data">

                                            <input type="hidden" name="id" value="<?=$studentData['id']?>" />

                                            <div class="mb-3">
                                                <label>Full Name</label>
                                                <input type="text" name="name" value="<?=$studentData['fullname']?>" required class="form-control" />
                                            </div>

                                            <div class="mb-3">
                                                <label>Address</label>
                                                <input type="text" name="address" value="<?=$studentData['address']?>" required class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label>Town</label>
                                                <input type="text" name="town" value="<?=$studentData['town']?>" required class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label>Type</label>
                                                <input type="text" name="type" value="<?=$studentData['type']?>" required class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <input type="text" name="status" value="<?=$studentData['status']?>" required class="form-control" />
                                            </div>

                                            <div class="mb-3">
                                                <label>Upload Image (Profile)</label>
                                                <input type="file" name="image" class="form-control" />
                                            </div>

                                            <div class="mb-3">
                                                <hr>
                                                <button type="submit" name="updateOffender" class="btn btn-secondary float-end">Update Offender</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="uploads/<?=$studentData['image'];?>" class="w-100 border" alt="Image">
                            </div>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div class="card card-body">
                                <h3>No Record Found</h3>
                            </div>
                        <?php
                    }
                }
                ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

