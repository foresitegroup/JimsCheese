<?php
//$TopDir = "http://localhost/JimsCheese/";
//$ProductsDir = "http://localhost/JimsCheese/products/";
if ($TopDir == "") $TopDir = (basename(dirname($_SERVER['PHP_SELF'])) == "products" || basename(dirname($_SERVER['PHP_SELF'])) == "blog") ? "../" : "";
$ProductsDir = (basename(dirname($_SERVER['PHP_SELF'])) != "products") ? "products/" : "../products/";

function email($address, $name="") {
  for ($i = 0; $i < strlen($address); $i++) { $email .= (rand(0, 1) == 0) ? "&#" . ord(substr($address, $i)) . ";" : substr($address, $i, 1); }
  if ($name == "") $name = $email;
  echo "<a href=\"&#109;&#97;&#105;&#108;&#116;&#111;&#58;$email\">$name</a>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

  <title>
    Jim's Cheese
    <?php
    if (basename(dirname($_SERVER['PHP_SELF'])) == "blog") {
      // Print the <title> tag based on what is being viewed.
	    global $page, $paged;

      echo " | ";

      // Add the blog name.
      bloginfo( 'name' );

      wp_title( '|', true, 'left' );

      // Add a page number if necessary:
      if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
    } else {
      if ($PageTitle != "") echo " | " . $PageTitle;
    }
    ?>
  </title>
  <meta name="description" content="Jim's Cheese, LLC, located in Waterloo, WI, has long been known for Wisconsin Aged Cheddar, artisan cheeses, and waxed cut-outs. Representing the Dairy State, we're proud to grow with Wisconsin's finest artisan, single herd, small-batch and rBGH-free cheeses from makers who produce the most unique and creative cheeses available anywhere. We offer over 400 varieties of great Wisconsin Cheese and over 300 different waxed cheese cut-outs along with a variety of complementing condiments such as sausages, crackers, candies and gift components.">
  <meta name="keywords" content="wisconsin cheese, domestic, improted, smoked, artisan, cut outs, shapes, sliced, High temp, gift boxes, sausage, waterloo, jim's cheese pantry, wholesale cheese, aged cheddar, swiss, waxed cheese, cheese cut-outs">
  <meta name="author" content="Remedi Creative">

  <link rel="shortcut icon" href="<?php echo $TopDir; ?>images/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo $TopDir; ?>images/apple-touch-icon.png">

  <link href='http://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic|Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/jc2012.css" type="text/css" media="screen,print">

  <?php if ($SideMenu != "") { ?>
  <style type="text/css">
    #sidebar UL LI.<?php echo $SideMenu; ?>,
    #sidebar UL LI.<?php echo $SideMenu; ?> UL LI {
      display: block;
    }
  </style>
  <?php } ?>

  <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery-1.7.2.js"></script>
  <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery.cycle.all.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
      $("#rotating").cycle({ fx: 'fade', speed: 2000, timeout: 6500 });
    });
  </script>
  <!--[if lt IE 9 ]>
  <script type="text/javascript" src="<?php echo $TopDir; ?>inc/IE9.js"></script>
  <![endif]-->
  <!--[if lt IE 7 ]>
  <script type="text/javascript" src="<?php echo $TopDir; ?>inc/dd_belatedpng.js"></script>
  <script type="text/javascript">DD_belatedPNG.fix('img, .png, #facebook, #header-shadow, #menu, #rounded-top, #rounded-bottom');</script>
  <![endif]-->

  <?php
  echo $HeadInc;
  if (basename(dirname($_SERVER['PHP_SELF'])) == "blog") {
    wp_head();
    echo '<link rel="stylesheet" type="text/css" media="all" href="' . $TopDir . 'blog/wp-content/themes/jimscheese/style.css" />';
    $ProductsDir = "../products/";
  }
  ?>

  <!-- BEGIN Google Analytics -->
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-33501604-1']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
  <!-- END Google Analytics -->
</head>
<body>

<div id="header-wrap">
  <div id="top-menu">
    <a href="<?php echo $TopDir; ?>blog/" title="Blog" id="wordpress"></a>

    <ul>
      <li><a href="<?php echo $TopDir; ?>.">Home</a></li>
      <li><a href="<?php echo $TopDir; ?>customer-service.php">Customer Service</a></li>
      <li><a href="<?php echo $TopDir; ?>employment.php">Employment</a></li>
      <li><a href="<?php echo $TopDir; ?>contact.php">Contact</a></li>
      <li><a href="<?php echo $TopDir; ?>resellers.php" class="red">Customer Login</a></li>
    </ul>
  </div> <!-- END top-menu -->

  <div id="header">
    <a href="<?php echo $TopDir; ?>."><img src="<?php echo $TopDir; ?>images/logo.jpg" alt="Jim's Cheese - Wisconsin's Finest Cheese Since 1955" id="logo"></a>
    
    <a href="http://www.facebook.com/JimsCheese" title="Facebook" id="facebook"></a>
    
    <div id="featured">
      <a href="<?php echo $TopDir; ?>resellers.php">Monthly Specials</a><br>
      <a href="<?php echo $TopDir; ?>pdf/Jim's_Cheese_Brochure_2014.pdf">Brochure 2014</a>
    </div>
    
    <?php if (strtotime("now") <= strtotime("11 October 2013 3:00pm")) { ?>
    <br><br>
    <a href="<?php echo $TopDir; ?>jims-cheese-pantry-and-cafe.php" id="featured">Oct 11th Wine &amp; Cheese Tasting</a>
    <?php } ?>
  </div> <!-- END header -->
</div> <!-- END header-wrap -->

<div id="header-shadow"></div>

<div id="wrap">
  <div id="menu">
    <?php include "menu.php"; ?>
  </div> <!-- END menu -->

  <?php if ($PageTitle != "") { ?>
  <?php if ($SideMenu != "") { ?>
  <div id="content-wrap">
    <div id="sidebar">
      <?php if (basename(dirname($_SERVER['PHP_SELF'])) != "blog") include "menu.php"; ?>
    </div> <!-- END sidebar  -->
    <?php } ?>

    <div id="content-main<?php if ($SideMenu == "") echo "-no-side"; ?>">
      <?php } ?>
