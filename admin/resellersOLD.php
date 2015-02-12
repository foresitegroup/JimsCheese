<?php
include "login.php";
$PageTitle = "Reseller Emails";
include "header.php";
date_default_timezone_set('America/Chicago');
?>

<div style="float: right; text-align: center;">
  <form method="post" action="resellers.php" name="zones">
    <div>
      <select name="zone" onchange="document.zones.submit()">
        <option value="">Filter by Zone...</option>
        <option value="1"<?php if ($_POST['zone'] == "1") echo " selected"; ?>>Zone 1</option>
        <option value="2"<?php if ($_POST['zone'] == "2") echo " selected"; ?>>Zone 2</option>
        <option value="3"<?php if ($_POST['zone'] == "3") echo " selected"; ?>>Zone 3</option>
        <option value="4"<?php if ($_POST['zone'] == "4") echo " selected"; ?>>Zone 4</option>
      </select>
    </div>
  </form>
  
  <br>
  
  <span id="togglebutton">Show Email Only</span>
</div>

<table celppading="0" cellspacing="0" id="zone">
  <tr>
    <td class="toggle">&nbsp;</td>
    <td><strong>Email</strong></td>
    <td class="toggle"><strong>Zone</strong></td>
  </tr>
<?php
if ($_POST['zone'] != "") $where = "WHERE zone = '" . $_POST['zone'] . "'";
$result = mysql_query("SELECT * FROM resellers $where ORDER BY email ASC");

while ($row = mysql_fetch_array($result)) {
?>
  <tr>
    <td class="toggle" style="padding: 0px 15px 0 0;">
      <a href="resellers-db.php?a=delete&id=<?php echo $row['id']; ?>" onClick="return(confirm('Are you sure you want to delete this record?'));"><img src="images/delete.png" alt="Delete" title="Delete" style="margin-top: 2px;"></a>
    </td>
    <td valign="top" style="padding: 0 15px 0 0;">
      <?php echo $row['email']; ?>
    </td>
    <td class="toggle" valign="top" style="text-align: center; ">
      <?php echo $row['zone']; ?>
    </td>
  </tr>
  <tr class="toggle"><td colspan="3" style="font-size: 10px; padding: 0; height: 10px;"></td></tr>
<?php } ?>
</table>

<div style="clear: both;"></div>

<?php include "footer.php"; ?>