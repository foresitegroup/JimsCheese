<?php
include "resellers-login.php";
$PageTitle = "Product and Price Guides";
$SideMenu = "";
$HeadInc = "
<style type=\"text/css\">
  LABEL { display: inline-block; width: 80px; font-weight: bold; }
  INPUT[type=\"text\"] { width: 300px; margin-bottom: 10px; }
</style>
";
include "header.php";
?>

<h1>Product and Price Guides</h1>

Welcome to Jim's Cheese product and price guides. To talk to a customer service representative, please call us at 920-478-3571 or 800-345-3571 and fax us at 920-478-2320. To view our price lists, please click the links directly below.<br>
<br>

<div style="text-align: center; font-weight: bold;">
  <?php if ($ThePassword == $Zone1Password) { $zone = 1; ?>
  <a href="pdf/resellers/JCPricingV1.pdf">Jim's Cheese Pricing</a><br>
  <a href="pdf/resellers/LFAPricingV1.pdf">Lake Forest Artisan Pricing</a><br>
  <a href="pdf/resellers/CutoutsPricingV1.pdf">Cutouts Pricing</a><br>
  <?php } ?>
  
  <?php if ($ThePassword == $Zone2Password) { $zone = 2; ?>
  <a href="pdf/resellers/JCPricingV2.pdf">Jim's Cheese Pricing</a><br>
  <a href="pdf/resellers/LFAPricingV2.pdf">Lake Forest Artisan Pricing</a><br>
  <a href="pdf/resellers/CutoutsPricingV2.pdf">Cutouts Pricing</a><br>
  <?php } ?>
  
  <?php if ($ThePassword == $Zone3Password) { $zone = 3; ?>
  <a href="pdf/resellers/JCPricingV3.pdf">Jim's Cheese Pricing</a><br>
  <a href="pdf/resellers/LFAPricingV3.pdf">Lake Forest Artisan Pricing</a><br>
  <a href="pdf/resellers/CutoutsPricingV3.pdf">Cutouts Pricing</a><br>
  <?php } ?>
  
  <?php if ($ThePassword == $Zone4Password) { $zone = 4; ?>
  <a href="pdf/resellers/JCPricingV4.pdf">Jim's Cheese Pricing</a><br>
  <a href="pdf/resellers/LFAPricingV4.pdf">Lake Forest Artisan Pricing</a><br>
  <a href="pdf/resellers/CutoutsPricingV4.pdf">Cutouts Pricing</a><br>
  <?php } ?>
  
  <a href="pdf/Jim's_Cheese_Brochure.pdf">Brochure</a><br>
  <a href="pdf/resellers/December_2015_Specials.pdf">December 2015 Specials</a>
</div><br>
<br>

<?php
if (isset($_POST['submit'])) {
  include_once "inc/dbconfig.php";
  
  mysql_query("INSERT INTO resellers (email, firstname, lastname, company, zone) VALUES ('" . $_POST['email'] . "', '" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['company'] . "', '" . $zone . "')");
  
  echo "Thank you for your information. We will begin sending updates soon.";
} else {
?>

To receive notices of Jim's Cheese monthly specials, discounted items and information on new products, please submit your information below. Your information will be kept private and not be given or sold to third parties.

<script type="text/javascript">
  <!--
  function checkform (form) {
    if (form.email.value == "") { alert('Please enter an email address.'); form.email.focus(); return false; }
    if (form.firstname.value == "") { alert('Please enter your first name.'); form.firstname.focus(); return false; }
    if (form.lastname.value == "") { alert('Please enter your last name.'); form.lastname.focus(); return false; }
    if (form.company.value == "") { alert('Please enter your company name.'); form.company.focus(); return false; }
    return true;
  }
  //-->
</script>

<form action="resellers.php" method="POST" onSubmit="return checkform(this)">
  <div>
    <label>Email</label> <input type="text" name="email"><br>
    <label>First Name</label> <input type="text" name="firstname"><br>
    <label>Last Name</label> <input type="text" name="lastname"><br>
    <label>Company</label> <input type="text" name="company"><br>
    <input type="submit" name="submit" value="Submit">
  </div>
</form>
<?php } ?>

<?php include "footer.php"; ?>