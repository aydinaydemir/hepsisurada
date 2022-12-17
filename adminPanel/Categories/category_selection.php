
<form action="select.php" method="POST"> 

<?php
include "config.php";

$sql_command = "SELECT DISTINCT aCountry FROM Addresses ORDER BY aCountry ASC";

$myResult = mysqli_query($db,$sql_command);
?>

<center>
  
  <label for="category-select">Select a category:</label>
  <select id="category-select" name="category">
    <?php
      // Loop through the list of categories and create an option for each one
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['cid'];
        $name = $row['cname'];
        echo "<option value='$id'>$name</option>";
      }
    ?>
  </select>
  
</center>
</form>
