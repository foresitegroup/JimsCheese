<?php
include "login.php";
$PageTitle = "Dealers";
include "header.php";
?>

<form action="dealers-db.php?a=add" method="POST" style="float: left;">
  <div>
    <h3>Add New Dealer</h3>
    
    <strong>Customer</strong><br>
    <input type="text" name="customer" style="width: 300px;"><br>
    <br>
    
    <strong>Address</strong><br>
    <input type="text" name="address" style="width: 300px;"><br>
    <br>
    
    <strong>City</strong><br>
    <input type="text" name="city" style="width: 300px;"><br>
    <br>
    
    <div style="float: left;">
      <strong>State</strong><br>
      <select name="state">
        <option value=""></option>
        <option value="AL"<?php if ($row['state'] == "AL") echo " selected"; ?>>Alabama</option>
        <option value="AK"<?php if ($row['state'] == "AK") echo " selected"; ?>>Alaska</option>
        <option value="AZ"<?php if ($row['state'] == "AZ") echo " selected"; ?>>Arizona</option>
        <option value="AR"<?php if ($row['state'] == "AR") echo " selected"; ?>>Arkansas</option>
        <option value="CA"<?php if ($row['state'] == "CA") echo " selected"; ?>>California</option>
        <option value="CO"<?php if ($row['state'] == "CO") echo " selected"; ?>>Colorado</option>
        <option value="CT"<?php if ($row['state'] == "CT") echo " selected"; ?>>Connecticut</option>
        <option value="DE"<?php if ($row['state'] == "DE") echo " selected"; ?>>Delaware</option>
        <option value="DC"<?php if ($row['state'] == "DC") echo " selected"; ?>>District of Columbia</option>
        <option value="FL"<?php if ($row['state'] == "FL") echo " selected"; ?>>Florida</option>
        <option value="GA"<?php if ($row['state'] == "GA") echo " selected"; ?>>Georgia</option>
        <option value="HI"<?php if ($row['state'] == "HI") echo " selected"; ?>>Hawaii</option>
        <option value="ID"<?php if ($row['state'] == "ID") echo " selected"; ?>>Idaho</option>
        <option value="IL"<?php if ($row['state'] == "IL") echo " selected"; ?>>Illinois</option>
        <option value="IN"<?php if ($row['state'] == "IN") echo " selected"; ?>>Indiana</option>
        <option value="IA"<?php if ($row['state'] == "IA") echo " selected"; ?>>Iowa</option>
        <option value="KS"<?php if ($row['state'] == "KS") echo " selected"; ?>>Kansas</option>
        <option value="KY"<?php if ($row['state'] == "KY") echo " selected"; ?>>Kentucky</option>
        <option value="LA"<?php if ($row['state'] == "LA") echo " selected"; ?>>Louisiana</option>
        <option value="ME"<?php if ($row['state'] == "ME") echo " selected"; ?>>Maine</option>
        <option value="MD"<?php if ($row['state'] == "MD") echo " selected"; ?>>Maryland</option>
        <option value="MA"<?php if ($row['state'] == "MA") echo " selected"; ?>>Massachusetts</option>
        <option value="MI"<?php if ($row['state'] == "MI") echo " selected"; ?>>Michigan</option>
        <option value="MN"<?php if ($row['state'] == "MN") echo " selected"; ?>>Minnesota</option>
        <option value="MS"<?php if ($row['state'] == "MS") echo " selected"; ?>>Mississippi</option>
        <option value="MO"<?php if ($row['state'] == "MO") echo " selected"; ?>>Missouri</option>
        <option value="MT"<?php if ($row['state'] == "MT") echo " selected"; ?>>Montana</option>
        <option value="NE"<?php if ($row['state'] == "NE") echo " selected"; ?>>Nebraska</option>
        <option value="NV"<?php if ($row['state'] == "NV") echo " selected"; ?>>Nevada</option>
        <option value="NH"<?php if ($row['state'] == "NH") echo " selected"; ?>>New Hampshire</option>
        <option value="NJ"<?php if ($row['state'] == "NJ") echo " selected"; ?>>New Jersey</option>
        <option value="NM"<?php if ($row['state'] == "NM") echo " selected"; ?>>New Mexico</option>
        <option value="NY"<?php if ($row['state'] == "NY") echo " selected"; ?>>New York</option>
        <option value="NC"<?php if ($row['state'] == "NC") echo " selected"; ?>>North Carolina</option>
        <option value="ND"<?php if ($row['state'] == "ND") echo " selected"; ?>>North Dakota</option>
        <option value="OH"<?php if ($row['state'] == "OH") echo " selected"; ?>>Ohio</option>
        <option value="OK"<?php if ($row['state'] == "OK") echo " selected"; ?>>Oklahoma</option>
        <option value="OR"<?php if ($row['state'] == "OR") echo " selected"; ?>>Oregon</option>
        <option value="PA"<?php if ($row['state'] == "PA") echo " selected"; ?>>Pennsylvania</option>
        <option value="RI"<?php if ($row['state'] == "RI") echo " selected"; ?>>Rhode Island</option>
        <option value="SC"<?php if ($row['state'] == "SC") echo " selected"; ?>>South Carolina</option>
        <option value="SD"<?php if ($row['state'] == "SD") echo " selected"; ?>>South Dakota</option>
        <option value="TN"<?php if ($row['state'] == "TN") echo " selected"; ?>>Tennessee</option>
        <option value="TX"<?php if ($row['state'] == "TX") echo " selected"; ?>>Texas</option>
        <option value="UT"<?php if ($row['state'] == "UT") echo " selected"; ?>>Utah</option>
        <option value="VT"<?php if ($row['state'] == "VT") echo " selected"; ?>>Vermont</option>
        <option value="VA"<?php if ($row['state'] == "VA") echo " selected"; ?>>Virginia</option>
        <option value="WA"<?php if ($row['state'] == "WA") echo " selected"; ?>>Washington</option>
        <option value="WV"<?php if ($row['state'] == "WV") echo " selected"; ?>>West Virginia</option>
        <option value="WI"<?php if ($row['state'] == "WI") echo " selected"; ?>>Wisconsin</option>
        <option value="WY"<?php if ($row['state'] == "WY") echo " selected"; ?>>Wyoming</option>
      </select>
    </div>
    
    <div style="float: right;">
      <strong>Zip Code</strong><br>
      <input type="text" name="zip" style="width: 75px;">
    </div>
    
    <div style="clear: both;"></div>
    <br>
    
    <strong>Telephone</strong><br>
    <input type="text" name="telephone" style="width: 300px;"><br>
    <br>

    <strong>Latitude</strong><br>
    <input type="text" name="latitude" style="width: 300px;"><br>
    <br>

    <strong>Longitude</strong><br>
    <input type="text" name="longitude" style="width: 300px;"><br>
    <br>
    
    <input type="submit" value="Submit">
  </div>
  
  <br><br><br>

  <a href="dealers-export.php" id="togglebutton">Export Dealers to Spreadsheet</a>
</form>

<table cellspacing="0" style="float: right;">
  <tr>
    <td colspan="3">
      <h3 style="float: left;">Existing Dealers</h3>
      
      <form name="frmFilter" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="float: right; margin-top: 14px;">
        <strong>Sort by</strong>
        <select name="sort" onchange="document.frmFilter.submit()">
          <option value=""<?php if ($_POST['sort'] == "") echo " selected"; ?>>Name</option>
          <option value="state"<?php if ($_POST['sort'] == "state") echo " selected"; ?>>State</option>
          <option value="zip"<?php if ($_POST['sort'] == "zip") echo " selected"; ?>>Zip Code</option>
        </select>
      </form>
    </td>
  </tr>
  <?php
  $sort = ($_POST['sort'] != "") ? $_POST['sort'] : "customer";
  $result = mysql_query("SELECT * FROM where_can_i_buy ORDER BY " . $sort . " ASC");
  
  while ($row = mysql_fetch_array($result)) {
  ?>
    <tr>
      <td style="padding: 6px 15px 0 4px;" valign="top" rowspan="2">
        <a href="dealers-edit.php?id=<?php echo $row['id']; ?>"><img src="images/edit.png" alt="Edit" title="Edit" style="margin: 0 4px 2px 0;"></a><br>
        <a href="dealers-db.php?a=delete&id=<?php echo $row['id']; ?>" onClick="return(confirm('Are you sure you want to delete this dealer?'));"><img src="images/delete.png" alt="Delete" title="Delete"></a>
      </td>
      <td style="padding: 3px 15px 3px 0;">
        <?php echo $row['customer']; ?><br>
        <?php echo $row['address']; ?><br>
        <?php echo $row['city']; ?>, <?php echo $row['state']; ?> <?php echo $row['zip']; ?>
      </td>
      <td style="padding: 3px 4px 3px 0;" valign="top">
        <?php echo $row['telephone']; ?>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <?php echo $row['latitude'] . ", " . $row['longitude']; ?>
      </td>
    </tr>
    <tr><td colspan="3" style="padding: 0; height: 10px;">&nbsp;</td></tr>
  <?php } ?>
</table>

<div style="clear: both;"></div>

<?php include "footer.php"; ?>