<?php

include "config.php";
if(!empty($_POST['cName'])){


	$country = $_POST['cName'];
	$sql_statement = "SELECT * FROM Categories WHERE cName = \"$Name\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
		// Select the products of a particular category
		$sql = "SELECT * FROM Products WHERE Categories = 'cName'";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			echo "Product: "  . " - Name: " . $row["pName"] . "<br>";
		  }
    }

}


?>