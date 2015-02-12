      <?php if ($PageTitle != "") { ?>
      </div> <!-- END content-main<?php if ($SideMenu == "") echo "-no-side"; ?> -->
    
    <?php if ($SideMenu != "") { ?>
    <div style="clear: both;">
      <div id="content-bottom-sidebar"></div>
      <div id="content-bottom-main"></div>
    </div>
  </div> <!-- END content-wrap -->
  <?php } ?>
  <?php } ?>
  
  <a href="<?php echo $ProductsDir; ?>index.php?cPath=27" class="spiff-footer" style="background: url(<?php echo $TopDir; ?>images/spiff-cutouts.jpg);">Cheese Cutouts</a>
  <a href="<?php echo $ProductsDir; ?>index.php?cPath=26" class="spiff-footer" style="background: url(<?php echo $TopDir; ?>images/spiff-retail.jpg);">Retail Cuts</a>
  <a href="<?php echo $ProductsDir; ?>index.php?cPath=25" class="spiff-footer" style="background: url(<?php echo $TopDir; ?>images/spiff-block.jpg);">Block, Loaf, Horns &amp; Rounds</a>
  <a href="<?php echo $ProductsDir; ?>index.php?cPath=31" class="spiff-footer" style="background: url(<?php echo $TopDir; ?>images/spiff-gift.jpg); margin: 0;">Gift Boxes &amp; Components</a>
  
  <div style="clear: both;"></div>
  
  <div id="footer">
    <div id="address">
      <a href="<?php echo $TopDir; ?>."><img src="<?php echo $TopDir; ?>images/logo-footer.jpg" alt="Jim's Cheese - Wisconsin's Finest Cheese Since 1955" style="margin-bottom: 9px;"></a><br>
      
      Jim's Cheese LLC<br>
      410 Portland Rd.<br>
      Waterloo, WI 53594<br>
      920-478-3571<br>
    </div>
    
    <div id="footer-menu">
      <?php include "menu.php"; ?>
      
      <div id="col2">
        <?php include "menu.php"; ?>
      </div>
    </div>
    
    <a href="http://trade.eatwisconsincheese.com/retail/wi_cheese_company_search/companydetail.aspx?companyid=12&companyinfoid=23"><img src="<?php echo $TopDir; ?>images/wisconsin-cheese-seal.png" alt="Wisconsin Cheese" style="float: right;"></a>
    <a href="https://www.aibonline.org"><img src="<?php echo $TopDir; ?>images/aib-logo.png" alt="American Institute of Baking" style="float: right; margin-right: 20px;"></a>
    
    <div style="clear: both;"></div>
  </div> <!-- END footer -->
</div> <!-- END wrap -->

<?php
if (basename(dirname($_SERVER['PHP_SELF'])) == "blog") {
  wp_footer();
}
?>

</body>
</html>