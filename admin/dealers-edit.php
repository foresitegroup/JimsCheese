<?php
include "login.php";
$PageTitle = "Edit Dealer";
include "header.php";

$result = mysql_query("SELECT * FROM where_can_i_buy WHERE id = '" . $_GET['id'] . "'");
$row = mysql_fetch_array($result);
?>

<br>

<form action="dealers-db.php?a=edit" method="POST" style="width: 660px; margin: 0 auto;">
  <div>
    <div style="float: left; margin-right: 45px;">
      <strong>Customer</strong><br>
      <input type="text" name="customer" style="width: 300px;" value="<?php echo stripslashes($row['customer']); ?>"><br>
      <br>
      
      <strong>Address</strong><br>
      <input type="text" name="address" style="width: 300px;" value="<?php echo stripslashes($row['address']); ?>"><br>
      <br>
      
      <strong>City</strong><br>
      <input type="text" name="city" style="width: 300px;" value="<?php echo stripslashes($row['city']); ?>"><br>
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
        <input type="text" name="zip" style="width: 75px;" value="<?php echo $row['zip']; ?>">
      </div>
      
      <div style="clear: both;"></div>
    </div>
    <div style="float: left;">
      <strong>Telephone</strong><br>
      <input type="text" name="telephone" style="width: 300px;" value="<?php echo $row['telephone']; ?>"><br>
      <br>

      <strong>Latitude</strong><br>
      <input type="text" name="latitude" style="width: 300px;" value="<?php echo $row['latitude']; ?>"><br>
      <br>

      <strong>Longitude</strong><br>
      <input type="text" name="longitude" style="width: 300px;" value="<?php echo $row['longitude']; ?>"><br>
      <br>
    </div>
    
    <div style="clear: both;"></div><br>
    <br>
    
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" value="Update" style="display: block; margin: 0 auto;">
  </div>
</form>

<?php include "footer.php"; ?>