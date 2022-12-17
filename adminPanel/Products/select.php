<?php

include "config.php";
if(!empty($_POST['aCountry'])){


	$country = $_POST['aCountry'];
	$sql_statement = "SELECT * FROM Addresses WHERE aCountry = \"$country\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
    echo $row['aCity'] ."  " .$row['aStreet'] . "<br>";
}
}


?>