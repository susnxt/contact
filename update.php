<?php

include "db.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string
$con=getdb();
$qry = mysqli_query($con,"select * from employeeinfo where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data
echo ("Id=$id");
if(isset($_POST['update'])) // when click on Update button
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contact= $_POST['contact'];
	
    $edit = mysqli_query($con,"update employeeinfo set firstName='$firstName', lastName='$lastName',contact='$contact' where id='$id'");
	
    if($edit)
    {
        mysqli_close($con); // Close connection
        header("location:index.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo "error occur";
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="firstName" value="<?php echo $data['firstName'] ?>" placeholder="Enter first Name" Required>
  <input type="text" name="lastName" value="<?php echo $data['lastName'] ?>" placeholder="Enter Last Name" Required>
  <input type="text" name="contact" value="<?php echo $data['contact'] ?>" placeholder="Enter contact" Required>

  <input type="submit" name="update" value="Update">
</form>