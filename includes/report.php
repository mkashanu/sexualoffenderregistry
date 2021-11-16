
<?php
session_start();
require_once 'includes/dbconfig.php';

if(isset($_POST['reportButton']))
{
    $name = mysqli_real_escape_string($con, $_POST['fname']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $explain = mysqli_real_escape_string($con, $_POST['explain']);

    // Input field is empty or not
    if(empty($fname) || empty($address) ||empty($contact)|| empty($explain))
    {
        $_SESSION['status'] = "All Fields are mandetory!";
        header('Location: userdonation.php');
        exit(0);
    }
	else
        {
            // Insert Query
            $query = "INSERT INTO report (fullname,address,number,assault) VALUES ('$name','$address','$contact', '$explain')";
            $query_run = mysqli_query($con, $query);
            
        }

}
?>