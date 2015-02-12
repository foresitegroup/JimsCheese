<?php
if (!isset($_POST['submit']) && $_SERVER['QUERY_STRING'] == "thankyou") header("Location: become-a-retailer.php");
$PageTitle = "Become a Retailer";
$SideMenu = "m7";
include "header.php";
?>

<!-- BEGIN Google Conversion -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1008631094;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "ukuYCPrj4wMQtvr54AM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1008631094/?value=0&amp;label=ukuYCPrj4wMQtvr54AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- END Google Conversion -->

<h1>Become a Retailer</h1>

<img src="images/map.jpg" alt="" class="right" style="width: 200px;">

Becoming a member of the Jim's Cheese retail family is more than just profitable. Our quality line cheeses, cheese cutouts, artisan cheeses and deli cheeses will make your cooler the destination for quality Wisconsin products.<br>
<br>

Jim's Cheese and the products we represent will make a great addition to your store's product line.<br>
<br>

<?php
if (isset($_POST['submit'])) {
  $SendTo = "info@jimscheese.com";
  $Subject = "Contact From Website";
  $From = "From: Retailer Form <retailerform@jimscheese.com>\r\n";
  $From .= "Reply-To: " . $_POST['email'] . "\r\n";

  $Message = $_POST['name'] . "\n";
  if (!empty($_POST['company'])) $Message .= $_POST['company'] . "\n";
  if (!empty($_POST['address'])) $Message .= $_POST['address'] . "\n";
  if (!empty($_POST['address2'])) $Message .= $_POST['address2'] . "\n";
  if (!empty($_POST['city'])) $Message .= $_POST['city'];
  if (!empty($_POST['city']) && !empty($_POST['state'])) $Message .= ", ";
  if (!empty($_POST['state'])) $Message .= $_POST['state'];
  if (!empty($_POST['city']) || !empty($_POST['state']) && !empty($_POST['zip'])) $Message .= " ";
  if (!empty($_POST['zip'])) $Message .= $_POST['zip'];
  if (!empty($_POST['city']) || !empty($_POST['state']) || !empty($_POST['zip'])) $Message .= "\n";

  $Message .= "\n";

  if (!empty($_POST['phone'])) $Message .= $_POST['phone'] . "\n";
  if (!empty($_POST['email'])) $Message .= $_POST['email'] . "\n";

  $Message .= "\n";

  if (!empty($_POST['contact'])) $Message .= "Best time to contact: " . $_POST['contact'] . "\n";

  $Message .= "\n";

  if (!empty($_POST['store'])) $Message .= "Type of Store(s): " . implode(", ", $_POST['store']) . "\n";

  $Message = stripslashes($Message);

  mail($SendTo, $Subject, $Message, $From);
  //echo "<pre>".$Message."</pre>";

  echo "<strong>Thank you for your interest in Jim's Cheese.<br>You will be contacted soon.</strong>";
} else {
  $states_arr = array('AL'=>"Alabama",'AK'=>"Alaska",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut",'DE'=>"Delaware",'DC'=>"District of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'HI'=>"Hawaii",'ID'=>"Idaho",'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa",  'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland", 'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York",'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma", 'OR'=>"Oregon",'PA'=>"Pennsylvania",'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah",'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");

function showOptionsDrop($array) {
  $string = "";
  foreach($array as $k => $v) {
    $string .= "<option value=\"" . $k . "\"" . $s . ">" . $v . "</option>\n";
  }
  return $string;
}
?>
  For more information please fill in the following form and a Jim's Cheese representative will contact you.<br>
  <br>

  <strong style="color: #B17906;">*</strong> required fields<br>
  <br>

  <script type="text/javascript">
    <!--
    function checkform (form) {
      if (form.name.value == "") { alert('Name required.'); form.name.focus(); return false; }
      if (form.phone.value == "") { alert('Phone required.'); form.phone.focus(); return false; }
      if (form.email.value == "") { alert('Email required.'); form.email.focus(); return false; }
      return true;
    }
    //-->
  </script>

  <form action="become-a-retailer.php?thankyou" method="POST" onSubmit="return checkform(this)">
    <div style="float: left; width: 385px;">
      <div style="float: left; width: 75px;"><strong>Name <span style="color: #B17906;">*</span></strong></div>
      <input type="text" name="name" style="width: 300px;"><br>
      <br>

      <div style="float: left; width: 75px;"><strong>Company</strong></div>
      <input type="text" name="company" style="width: 300px;"><br>
      <br>

      <div style="float: left; width: 75px;"><strong>Address</strong></div>
      <input type="text" name="address" style="width: 300px;"><br>
      <br>

      <div style="float: left; width: 75px;"><strong>Address 2</strong></div>
      <input type="text" name="address2" style="width: 300px;"><br>
      <br>

      <div style="float: left; width: 75px;"><strong>City</strong></div>
      <input type="text" name="city" style="width: 300px;"><br>
      <br>

      <div style="float: left; width: 75px;"><strong>State</strong></div>
      <select name="state" style="float: left;">
        <option value="">Select...</option>
        <?php echo showOptionsDrop($states_arr); ?>
      </select>

      <div style="float: left; width: 70px; margin-left: 38px;"><strong>Zip Code</strong></div>
      <input type="text" name="zip" style="width: 50px;"><br>
      <br>

      <div style="float: left; width: 75px;"><strong>Phone <span style="color: #B17906;">*</span></strong></div>
      <input type="text" name="phone" style="width: 300px;"><br>
      <br>

      <div style="float: left; width: 75px;"><strong>Email <span style="color: #B17906;">*</span></strong></div>
      <input type="text" name="email" style="width: 300px;"><br>
      <br>

      <strong>Best time to contact you</strong><br>
      <input type="text" name="contact" style="width: 375px;"><br>
      <br>

      <input type="submit" name="submit" value="Submit" style="display: block; margin: 0 auto; font-weight: bold;">
    </div>

    <div style="float: right; width: 200px;">
      <strong>Type of Store(s)</strong><br>
      <input type="checkbox" name="store[]" value="Gift"> Gift<br>
      <input type="checkbox" name="store[]" value="Grocery"> Grocery<br>
      <input type="checkbox" name="store[]" value="Quick Mart"> Quick Mart<br>
      <input type="checkbox" name="store[]" value="Deli"> Deli<br>
      <input type="checkbox" name="store[]" value="Specialty Food"> Specialty Food<br>
      <input type="checkbox" name="store[]" value="Organic Foods"> Organic Foods<br>
      <input type="checkbox" name="store[]" value="Kiosk in Mall"> Kiosk in Mall<br>
      <input type="checkbox" name="store[]" value="Kiosk in Market"> Kiosk in Market<br>
      <input type="checkbox" name="store[]" value="Lunch Counter"> Lunch Counter<br>
      <input type="checkbox" name="store[]" value="Other"> Other
    </div>
  </form>
<?php } ?>

<?php include "footer.php"; ?>