<?php
include "config.php";

$sql_command = "SELECT DISTINCT cName FROM Categories ORDER BY cName ASC";

$myResult = mysqli_query($db,$sql_command);
?>
<h1>ADDRESS SELECTION</h1>
<form action="select.php" method="POST">
<select name="cName">
<?php
while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $aCountry = $id_rows['cName'];
        echo "<option value=$cName>" . $cName  . "</option>";
    }



?>
</select>
<button>SELECT</button>

</form>