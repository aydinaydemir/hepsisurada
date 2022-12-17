<?php
include "config.php";

$sql_command = "SELECT DISTINCT aCity FROM Addresses ORDER BY aCity ASC";

$myResult = mysqli_query($db,$sql_command);
?>
<h1>ADDRESS SELECTION</h1>
<form action="select.php" method="POST">
<select name="aCity">
<?php
while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $aCity = $id_rows['aCity'];
        echo "<option value=$aCity>" . $aCity  . "</option>";
    }

?>
</select>
<button>SELECT</button>

</form>