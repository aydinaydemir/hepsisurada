<?php 

include "config.php"; 
if (!empty($_POST['pName']) && !empty($_POST['pStock']) &&!empty($_POST['pAvgRating']) &&!empty($_POST['pPrice']) &&!empty($_POST['pDescription'])){ 

    $pName = $_POST['pName']; 
    $pStock = $_POST['pStock']; 
    $pAvgRating = $_POST['pAvgRating']; 
    $pPrice = $_POST['pPrice']; 
    $pDescription = $_POST['pDescription']; 
 

    $sql_statement = "INSERT INTO Products (pName, pStock , pAvgRating , pPrice , pDescription) VALUES ('$pName', '$pStock', '$pAvgRating','$pPrice','$pDescription')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
