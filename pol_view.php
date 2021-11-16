<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>View Offenders</title>
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
                  <li><a class="active" href="pol_view.php">View Offenders</a></li>
                  <li><a href="pol_add.php">Add Offenders</a></li>
                  <li><a href="pol_search.php">Search offenders</a></li>
               </ul>
            </li>
			<li><a href="pol_report.php">Reports</a></li>
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
                                        <th>Town</th>
                                        <th>Type</th>
                                        <th> Status <th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once 'includes/dbconfig.php';

                                        $offender = "SELECT * FROM offender";
                                        $result = mysqli_query($con, $offender);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            foreach($result as $data) 
                                            {
                                                ?>
                                                 <tr>
                                                    <td><?= $data['id']; ?></td>
                                                    <td><?= $data['fullname']; ?></td>
                                                    <td><?= $data['address']; ?></td>
                                                    <td><?= $data['town']; ?></td>
                                                    <td><?= $data['type']; ?></td>
                                                    <td><?= $data['status']; ?></td>
													<td><img src="uploads/<?=$data['image'];?>" style="width: px; height: 70px" alt="Image"></td>
                                                    <td>
                                                        <a href="pol_edit.php?id=<?=$data['id']?>" class="btn btn-secondary"><i class="far fa-edit"></i></a>
													</td>
													<td>
                                                        <button type="button" class="btn btn-danger delete_btn" value="<?=$data['id'];?>"><i class="fas fa-trash-alt"></i></button>
                                                    </td>
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
        $(document).ready(function () {
            $(document).on('click', '.delete_btn', function () {
                var id = $(this).val();

                if (confirm("Are you sure! you want to delete this data ?")) {
                    $.ajax({
                        type: "POST",
                        url: "function.php",
                        data: {
                            id: id,
                            deleteStudent: true,
                        },
                        success: function (response) {
                            window.location.reload();                            
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>

