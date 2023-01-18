    <?php
    function getdb(){
    $servername = "localhost";
    $username = "roor";
    $password = "";
    $db = "test";
    try {
       
        $con = mysqli_connect($servername, $username, $password, $db);
         //echo "Connected successfully"; 
        }
    catch(exception $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
return $con;
    }
    ?>