<?php 

include "config.php"; 
if (!empty($_POST['oid']) && !empty($_POST['oStatus'])){ 

    $oid = $_POST['oid']; 
    $oStatus = $_POST['oStatus']; 

    $sql_statement = "INSERT INTO Orders (oid, oStatus ) VALUES ('$oid', '$oStatus')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
