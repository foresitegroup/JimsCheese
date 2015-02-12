<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  $oscTemplate->buildBlocks();

  if (!$oscTemplate->hasBlocks('boxes_column_left')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }

  if (!$oscTemplate->hasBlocks('boxes_column_right')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }
  
  $PageTitle = tep_output_string_protected($oscTemplate->getTitle());
  $SideMenu = "m2";
?>

<?php
$HeadInc = "
  <base href=\"" . ((($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG) . "\" />
  <link rel=\"stylesheet\" type=\"text/css\" href=\"ext/jquery/fancybox2/jquery.fancybox.css?v=2.0.6\" />
  <script type=\"text/javascript\" src=\"ext/jquery/fancybox2/jquery.fancybox.pack.js?v=2.0.6\"></script>
  " . $oscTemplate->getBlocks('header_tags') . "
  ";

if (tep_not_null(JQUERY_DATEPICKER_I18N_CODE)) {
  $HeadInc .= "
  <script type=\"text/javascript\" src=\"ext/jquery/ui/i18n/jquery.ui.datepicker-" . JQUERY_DATEPICKER_I18N_CODE .".js\"></script>
  <script type=\"text/javascript\">
    $.datepicker.setDefaults($.datepicker.regional['" . JQUERY_DATEPICKER_I18N_CODE . "']);
  </script>
  ";
}

include "../header.php";
?>

<div id="bodyWrapper" class="container_<?php echo $oscTemplate->getGridContainerWidth(); ?>">

<?php require(DIR_WS_INCLUDES . 'header.php'); ?>

<div id="bodyContent" class="grid_<?php echo $oscTemplate->getGridContentWidth(); ?> <?php echo ($oscTemplate->hasBlocks('boxes_column_left') ? 'push_' . $oscTemplate->getGridColumnWidth() : ''); ?>">
