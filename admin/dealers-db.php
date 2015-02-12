<?php
include "../inc/dbconfig.php";

switch ($_GET['a']) {
  case "add":
    mysql_query("INSERT INTO where_can_i_buy (
                customer,
                address,
                city,
                state,
                zip,
                telephone,
                latitude,
                longitude
                ) VALUES (
                '" . $_POST['customer'] . "',
                '" . $_POST['address'] . "',
                '" . $_POST['city'] . "',
                '" . $_POST['state'] . "',
                '" . $_POST['zip'] . "',
                '" . $_POST['telephone'] . ",'
                '" . $_POST['latitude'] . ",'
                '" . $_POST['longitude'] . "'
                )");
    break;
  case "edit":
    mysql_query("UPDATE where_can_i_buy SET
                customer = '" . mysql_real_escape_string($_POST['customer']) . "',
                address = '" . mysql_real_escape_string($_POST['address']) . "',
                city = '" . mysql_real_escape_string($_POST['city']) . "',
                state = '" . $_POST['state'] . "',
                zip = '" . $_POST['zip'] . "',
                telephone = '" . $_POST['telephone'] . "',
                latitude = '" . $_POST['latitude'] . "',
                longitude = '" . $_POST['longitude'] . "'
                WHERE id = '" . $_POST['id'] . "'");
    break;
  case "delete":
    mysql_query("DELETE FROM where_can_i_buy WHERE id = '" . $_GET['id'] . "'");
    break;
}

mysql_close();

header( "Location: dealers.php" );
?>