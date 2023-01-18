<?php

include "db.php";

if (isset($_POST['submit'])) {
  $con = getdb();

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $contact = $_POST['contact'];

  $sql = "INSERT into employeeinfo (firstName,lastName,contact) 
    values ('" . $firstName . "','" . $lastName . "','" . $contact . "')";
  mysqli_query($con, $sql);
  if (!isset($result)) {
    echo "New record created successfully.";
  } else {

    echo "Error:";
  }

  $con->close();
  header("location:index.php");
}
