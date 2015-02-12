<?php
include "login.php";
$PageTitle = "Reseller Emails";
include "header.php";
date_default_timezone_set('America/Chicago');
?>

<a href="resellers-export.php" id="togglebutton">Export</a>

<table celppading="0" cellspacing="0" id="zone">
  <tr>
    <td>&nbsp;</td>
    <td><strong>Email</strong></td>
    <td style="padding-right: 40px;"><strong>Name</strong></td>
    <td style="padding-right: 40px;"><strong>Company</strong></td>
    <td><strong>Zone</strong></td>
  </tr>
<?php
$result = mysql_query("SELECT * FROM resellers ORDER BY email ASC");

while ($row = mysql_fetch_array($result)) {
?>
  <tr>
    <td style="padding: 0px 15px 0 0;">
      <a href="resellers-db.php?a=delete&id=<?php echo $row['id']; ?>" onClick="return(confirm('Are you sure you want to delete this record?'));"><img src="images/delete.png" alt="Delete" title="Delete" style="margin-top: 2px;"></a>
    </td>
    <td valign="top" style="padding: 0 40px 0 0;">
      <?php echo $row['email']; ?>
    </td>
    <td valign="top" style="padding: 0 40px 0 0;">
      <?php echo $row['firstname'] . " " . $row['lastname']; ?>
    </td>
    <td valign="top" style="padding: 0 40px 0 0;">
      <?php echo $row['company']; ?>
    </td>
    <td valign="top" style="text-align: center; ">
      <?php echo $row['zone']; ?>
    </td>
  </tr>
  <tr><td colspan="5" style="font-size: 10px; padding: 0; height: 10px;"></td></tr>
<?php } ?>
</table>

<div style="clear: both;"></div>

<?php include "footer.php"; ?>