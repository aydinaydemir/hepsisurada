<?php

include "config.php";
if(!empty($_POST['aCity'])){


	$city = $_POST['aCity'];
	$sql_statement = "SELECT * FROM Addresses WHERE aCity = \"$city\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
    echo $row['aCountry'] ."  " .$row['aStreet'] . "<br>";
}
}


?>