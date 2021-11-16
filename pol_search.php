<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Search</title>
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
                  <li><a href="pol_view.php">View Offenders</a></li>
                  <li><a href="pol_add.php">Add Offenders</a></li>
                  <li><a class="active" href="pol_search.php">Search offenders</a></li>
				  
               </ul>
            </li>
			<li><a href="pol_report.php">Reports</a></li>
			<li><a href="../logout.php">Logout</a><li>
         </ul>
      </nav>
	  <br>
	  <br>
	 <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search by Name/Location">
									   <button type="submit" class="btn btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Town</th>
									<th>Type</th>
									<th>Status </th>
									<th> Image </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","soregistry");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM offender WHERE CONCAT(fullname,town) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['fullname']; ?></td>
                                                    <td><?= $items['address']; ?></td>
                                                    <td><?= $items['town']; ?></td>
													<td><?= $items['type']; ?></td>
													<td><?= $items['status']; ?></td>
													<td><img src ="uploads/<?= $items['image'];?>" style="width: 100px; height: 100px" alt="Image"></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
