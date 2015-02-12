<?php
$PageTitle = "Contact";
$SideMenu = "m7";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "JCcontact";
?>

<h1>Contact</h1>

<div class="floating-box">
  <strong>Mailing Address</strong><br>
  Jim's Cheese, Inc.<br>
  410 Portland Rd.<br>
  Waterloo, WI 53594
</div>

Jim's Cheese, based in Waterloo, Wis., is ready to serve you. Please contact us using our handy form below and a company representative will respond to you soon.<br>
<br>

Call us at 920-478-3571 or 800-345-3571.<br>
Fax: 920-478-2320<br>
<br>

<img src="images/contact.png" alt="" class="right" style="margin-top: 30px;">

<?php
if (isset($_POST['submit']) && $_POST['confirmationCAP'] == "") {
  if ($_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST['contact'] != "" &&
      $_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "")
  {
    $SendTo = "info@jimscheese.com";
    $Subject = "Contact From Website";
    $From = "From: Contact Form <contactform@jimscheese.com>\r\n";
    $From .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";

    $Message = $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    $Message .= $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    $Message .= $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    $Message .= "Best way to contact: " . $_POST['contact'] . "\n";

    $Message .= "\n";

    $Message .= "Comments/Questions:\n" . $_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

    $Message = stripslashes($Message);

    mail($SendTo, $Subject, $Message, $From);
    //echo "<pre>".$Message."</pre>";

    echo "<strong>Thank you for your interest in Jim's Cheese.<br>You will be contacted soon.</strong>";
  } else {
    echo "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
  }
} else {
?>
  Use the following form to contact Jim's. All fields are required.<br>
  <br>

  <script type="text/javascript">
    <!--
    function checkRadio(field) { for(var i=0; i < field.length; i++) { if(field[i].checked) return field[i].value; } return false; }
    function checkform (form) {
      if (form.name.value == "") { alert('Name required.'); form.name.focus(); return false; }
      if (form.email.value == "") { alert('Email required.'); form.email.focus(); return false; }
      if (form.phone.value == "") { alert('Phone required.'); form.phone.focus(); return false; }
      if (checkRadio(form.contact) == "") { alert('Contact method required.'); return false; }
      if (form.comment.value == "") { alert('Comment required.'); form.comment.focus(); return false; }
      return true;
    }
    //-->
  </script>

  <form action="contact.php" method="POST" onSubmit="return checkform(this)" style="width: 360px;">
    <div>
      <label for="name" style="float: left; width: 50px; font-weight: bold;">Name</label>
      <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" style="width: 300px;" id="name"><br>
      <br>

      <label for="email" style="float: left; width: 50px; font-weight: bold;">Email</label>
      <input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" style="width: 300px;" id="email"><br>
      <br>

      <label for="phone" style="float: left; width: 50px; font-weight: bold;">Phone</label>
      <input type="text" name="<?php echo md5("phone" . $ip . $salt . $timestamp); ?>" style="width: 300px;" id="phone"><br>
      <br>

      <label for="contact" style="font-weight: bold;">Best way to contact</label><br>
      <input type="radio" name="contact" value="By phone"> By phone &nbsp; &nbsp;
      <input type="radio" name="contact" value="By email"> By email<br>
      <br>

      <label for="comment" style="font-weight: bold;">Comments/Questions</label><br>
      <textarea name="<?php echo md5("comment" . $ip . $salt . $timestamp); ?>" rows="8" cols="30" style="width: 350px; height: 150px;" id="comment"></textarea><br>
      <br>

      <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>
        
      <input type="hidden" name="ip" value="<?php echo $ip; ?>">
      <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

      <input type="submit" name="submit" value="Submit" style="display: block; margin: 0 auto; font-weight: bold;">
    </div>
  </form>
<?php } ?>

<?php include "footer.php"; ?>