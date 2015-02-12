<?php include_once "../inc/dbconfig.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

  <title>Jim's Cheese Administration<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Remedi Creative">

  <link rel="shortcut icon" href="../images/favicon.ico">
  <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
  <link href='http://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic|Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../inc/jc2012.css" type="text/css" media="screen,print">
  <link rel="stylesheet" href="inc/admin.css" type="text/css" media="screen,print">
  
  <script type="text/javascript" src="../inc/jquery-1.7.2.js"></script>
  <script>
    $(document).ready(function() {
      $('#togglebutton').click(function() {
        var $this = $(this);
        $('.toggle').slideToggle(0, function() { 
           if ($('.toggle').is(":visible")) {
              $this.html("Show Email Only");
           } else {
              $this.html("Show All Fields");
           }
        });
      });
    });
  </script>
  
  <!--[if lt IE 9 ]>
  <script type="text/javascript" src="../inc/IE9.js"></script>
  <![endif]-->
  <!--[if lt IE 7 ]>
  <script type="text/javascript" src="../inc/dd_belatedpng.js"></script>
  <script type="text/javascript">DD_belatedPNG.fix('img, .png');</script>
  <![endif]-->
</head>
<body>

<div id="header-wrap">
  <div id="top-menu">
    <?php if ($PageTitle != "Login") { ?>
    <ul>
      <li><a href="../blog/wp-login.php" target="new">Blog</a></li>
      <li><a href="../products/admin/login.php" target="new">Products</a></li>
    </ul>
    <?php } ?>
  </div>
  
  <div id="header">
    <a href="."><img src="../images/logo.jpg" alt="Jim's Cheese" id="logo"></a>
  </div> <!-- END header -->
</div> <!-- END header-wrap -->

<div id="header-shadow"></div>

<div id="wrap">
  
<?php if ($PageTitle != "Login") { ?>
<div id="menu">
  <ul>
    <li><a href="dealers.php">Dealers</a></li>
    <li><a href="resellers.php">Reseller Emails</a></li>
  </ul>
</div> <!-- END menu -->
<?php } ?>
    
<div id="content-wrap">
  <div id="content-main-no-side">
    