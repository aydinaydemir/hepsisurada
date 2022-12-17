<?php
include "config.php";

$sql_command = "SELECT DISTINCT ccName FROM CargoCompany ORDER BY ccName ASC";

$myResult = mysqli_query($db,$sql_command);
?>
<h1>CARGO COMPANY SELECTION</h1>
<form action="select.php" method="POST">
<select name="ccName">
<?php
while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $aCountry = $id_rows['ccName'];
        echo "<option value=$ccName>" . $ccName  . "</option>";
    }



?>
</select>
<button>SELECT</button>

</form>