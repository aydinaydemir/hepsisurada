<?php
include "config.php";

$sql_command = "SELECT DISTINCT aCountry FROM Addresses ORDER BY aCountry ASC";

$myResult = mysqli_query($db,$sql_command);
?>
<h1>ADDRESS SELECTION</h1>
<form action="select.php" method="POST">
<select name="aCountry">
<?php
while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $aCountry = $id_rows['aCountry'];
        echo "<option value=$aCountry>" . $aCountry  . "</option>";
    }



?>
</select>
<button>SELECT</button>

</form>