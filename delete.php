<?php
  include 'db.php';
 if(isset($_GET['id'])) {
    $id=$_GET['id'];

  $con=getdb();
    $sql="DELETE FROM employeeinfo WHERE id=$id";
    $res=mysqli_query($con,$sql);
    header("location:index.php");
  }
  else{
    echo "error occur";
  }
?>