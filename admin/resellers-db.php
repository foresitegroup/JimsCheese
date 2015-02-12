<?php
include "../inc/dbconfig.php";

switch ($_GET['a']) {
  case "delete":
    $query = "DELETE FROM resellers WHERE id = '" . $_GET['id'] . "'";
    break;
}

mysql_query($query);

mysql_close();

header( "Location: resellers.php" );
?>