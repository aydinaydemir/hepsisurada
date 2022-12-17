<?php
include "config.php";

$sql_command = "SELECT DISTINCT pcName FROM ProductCompany ORDER BY pcName ASC";

$myResult = mysqli_query($db,$sql_command);
?>
<h1>Product Company SELECTION</h1>
<form action="select.php" method="POST">
<select name="pcName">
<?php
while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $aCountry = $id_rows['pcName'];
        echo "<option value=$pcName>" . $pcName  . "</option>";
    }



?>
</select>
<button>SELECT</button>

</form>