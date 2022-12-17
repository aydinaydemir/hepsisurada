<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT  pid, uid, amount FROM add_to_ShoppingCart ";
$sql_command2 = "SELECT  uName FROM Users ";
$sql_command3 = "SELECT  pName FROM Products ";

$myresult = mysqli_query($db, $sql_command);
$myresult2 = mysqli_query($db, $sql_command2);
$myresult3 = mysqli_query($db, $sql_command3);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {

        $id_rows2 = mysqli_fetch_assoc($myresult2);
        $id_rows3 = mysqli_fetch_assoc($myresult3);
        $uName = $id_rows2['uName'];
        $pName = $id_rows3['pName'];

        $amount = $id_rows['amount'];

        $pid = $id_rows['pid'];

        $uid = $id_rows['uid'];

        echo "<option value='$pid-$uid'>". $uName . " ". $pName . " " . $amount . "</option>";
}
        

?>

</select>
<button>DELETE</button>
</form>


