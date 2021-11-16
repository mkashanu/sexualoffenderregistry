<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Victim reports</title>
	<link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	 <link rel="stylesheet" type="text/css" href="css/style1.css">

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
                  <li><a  href="pol_view.php">View Offenders</a></li>
                  <li><a href="pol_add.php">Add Offenders</a></li>
                  <li><a href="pol_search.php">Search offenders</a></li>
               </ul>
            </li>
			<li><a class="active"href="pol_report.php">Reports</a></li>
			<li><a href="../logout.php">Logout</a><li>
			
         </ul>
      </nav>
   <div class="container">
     
        <div class="row">
            <div class="col-md-16 mt-5">

                <?php include('includes/message.php'); ?>


                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Fullname</th>
                                        <th>Address</th>
                                        <th>Phone number</th>
                                        <th>Time of report</th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once 'includes/connect.php';

                                        $offender = "SELECT * FROM report";
                                        $result = mysqli_query($con, $offender);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            foreach($result as $data) 
                                            {
                                                ?>
                                                 <tr>
                                                    <td><?= $data['id']; ?></td>
                                                    <td><?= $data['name']; ?></td>
                                                    <td><?= $data['address']; ?></td>
                                                    <td><?= $data['phone']; ?></td>
                                                    <td><?= $data['time']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <tr>
                                                <td colspan="6">No Record Found</td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      

</body>
</html>