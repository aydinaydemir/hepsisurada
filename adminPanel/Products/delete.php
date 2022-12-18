<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $pid = $_POST['ids'];
    $sql_statement = "DELETE FROM Products WHERE pid = $pid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>