    <?php
	include 'db.php';
	 $con = getdb();
     if(isset($_POST["Import"])){
        $filename=$_FILES["file"]["tmp_name"];    
         if($_FILES["file"]["size"] > 0)
         {
          $delsql = "DELETE FROM employeeinfo";
          mysqli_query($con,$delsql);
            $file = fopen($filename, "r");
              while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
               {
                
                 $sql = "INSERT into employeeinfo (firstName,lastName,contact) 
                       values ('".$getData[1]."','".$getData[2]."','".$getData[3]."')";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"index.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"index.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	      function get_all_records(){
        $con = getdb();
        $Sql = "SELECT * FROM employeeinfo";
        $result = mysqli_query($con, $Sql);  
        if (mysqli_num_rows($result) > 0) {
         echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
                 <thead><tr>
                 <th>Id</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>contact</th>
                            <th>action</th>
                            </tr></thead><tbody>";
         while($row = mysqli_fetch_assoc($result)) {
             echo "<tr>
             <td>".$row['id']."</td>
                       <td>" . $row['firstName']."</td>
                       <td>" . $row['lastName']."</td>
                       <td>" . $row['contact']."</td>
                       <td>
                       <a href='update.php?id=".$row['id']."' class='edit_btn' >Edit</a>
                       <a href='delete.php?id=".$row['id']."' class='edit_btn' >delete</a>
                   </td>
			
                       
                       </tr>" ;      
         }
        
         echo "</tbody></table></div>";
         
    } else {
         echo "No Records Found..";
    }
    }
     ?>