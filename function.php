<?php
session_start();
require_once 'includes/dbconfig.php';

if(isset($_POST['updateOffender']))
{
    // Student Id
    $id = $_POST['id'];

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $town = mysqli_real_escape_string($con, $_POST['town']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $image = $_FILES['image']['name'];

    // Image Temporary Directory
    $tmp_dir = $_FILES['image']['tmp_name'];

    // Input field is empty or not
    if(empty($name) || empty($address) || empty($town) || empty($type) || empty($status))
    {
        $_SESSION['status'] = "All Fields are mandetory!";
        header('Location: pol_edit.php?id='.$id);
        exit(0);
    }
    else
    {
        $offenderChecking = "SELECT id,image FROM offender WHERE id='$id'";
        $offender_result = mysqli_query($con, $offenderChecking);

        if(mysqli_num_rows($offender_result) > 0)
        {
            $offenderData = mysqli_fetch_array($offender_result);

            if($image != NULL)  //Creating New File
            {
                // Allowed Extensions
                $allowed_extension = array('png','jpg','jpeg');
                // Getting Extension from Image
                $image_extension = pathinfo($image, PATHINFO_EXTENSION);

                // Creating new Image_Name / filename
                $filename = time().'.'.$image_extension;

                // Checking Image is Valid or not
                if(!in_array($image_extension, $allowed_extension))
                {
                    $_SESSION['status'] = "You are allowed with only jpg, png, jpeg Image";
                    header('Location: pol_edit.php?id='.$stud_id);
                    exit(0);
                }
                
                // Giving New Filename
                $update_filename = $filename;
            }
            else
            {
                //Updating with Old Image data.
                $update_filename = $offenderData['image'];
            }

            $queryUpdateOffender = "UPDATE offender SET fullname='$name', address='$address',town='$town', type='$type', status='$status', image='$update_filename' WHERE id='$id' ";
            $queryUpdateOffender_result = mysqli_query($con, $queryUpdateOffender);

            if($queryUpdateOffender_result)
            {
                if($image != NULL)
                {
                    // Uploading New Image
                    move_uploaded_file($tmp_dir, 'uploads/'.$filename);

                    //IF File or Image Exists in Folder 
                    if(file_exists('uploads/'.$offenderData['image'])){
                        // Removing/Deleting the Old Image
                        unlink("uploads/".$offenderData['image']);
                    }
                }

                $_SESSION['status'] = "Offender details Updated Successfully";
                header('Location: pol_edit.php?id='.$id);
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Offender  details Not Updated";
                header('Location: pol_edit.php?id='.$id);
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "No Such ID / Offender Found";
            header('Location: pol_edit.php?id='.$id);
            exit(0);
        }
    }
}

if(isset($_POST['saveOffender']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $town = mysqli_real_escape_string($con, $_POST['town']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $image = $_FILES['image']['name'];

    // Image Temporary Directory
    $tmp_dir = $_FILES['image']['tmp_name'];

    // Input field is empty or not
    if(empty($name) || empty($address) ||empty($town)|| empty($type) ||empty($status) || empty($image))
    {
        $_SESSION['status'] = "All Fields are mandetory!";
        header('Location: pol_add.php');
        exit(0);
    }
    else
    {
        // Allowed Extensions
        $allowed_extension = array('png','jpg','jpeg');
        // Getting Extension from Image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);

        // Creating new Image_Name / filename
        $filename = time().'.'.$image_extension;

        // Checking Image is Valid or not
        if(!in_array($image_extension, $allowed_extension))
        {
            $_SESSION['status'] = "You are allowed with only jpg, png, jpeg Image";
            header('Location: pol_add.php');
            exit(0);
        }
        else
        {
            // Insert Query
            $query = "INSERT INTO offender (fullname,address,town,type,status,image) VALUES ('$name','$address','$town', '$type','$status','$filename')";
            $query_run = mysqli_query($con, $query);
            if($query_run)
            {
                // Upload Image to uploads folder - After Inserting data
                move_uploaded_file($tmp_dir, 'uploads/'.$filename);

                $_SESSION['status'] = "Offender Registered Successfully";
                header('Location: pol_add.php');
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Something went wrong";
                header('Location: pol_add.php');
                exit(0);
            }
        }
    }

}

if(isset($_POST['deleteStudent']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $deleteChecking = "SELECT * FROM offender WHERE id='$id'";
    $CheckingDeleteResult = mysqli_query($con, $deleteChecking);

    // If record exists more than 0
    if(mysqli_num_rows($CheckingDeleteResult) > 0)
    {
        $deleteCheckData = mysqli_fetch_array($CheckingDeleteResult);

        // Delete Query to Delete data
        $deletequery = "DELETE FROM offender WHERE id='$id' ";
        $deletequery_run = mysqli_query($con, $deletequery);

        if($deletequery_run)
        {
            // Checking File exsists and removing the file/image
            if(file_exists('uploads/'.$deleteCheckData['image'])){
                unlink("uploads/".$deleteCheckData['image']);
            }

            $_SESSION['status'] = "Offender Deleted Successfully";
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "Something Went Wrong";
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "No Such ID / Offender Found";
        exit(0);
    }
}

?>

