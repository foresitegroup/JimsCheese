<ul>
  <li class="m1"><a href="<?php echo $TopDir; ?>.">Home</a></li>
  <li class="m2">
    <a href="<?php echo $TopDir; ?>products/index.php?cPath=22">Products</a>
    <ul>
      <?php
      include_once "inc/dbconfig.php";
      $result = mysql_query("SELECT c.categories_id, cd.categories_name, c.parent_id FROM categories c, categories_description cd WHERE c.parent_id = '0' AND c.categories_id = cd.categories_id ORDER BY sort_order, cd.categories_name");

      while($row = mysql_fetch_array($result)) {
        echo "<li><a href=\"" . $TopDir . "products/index.php?cPath=" . $row['categories_id'] . "\">" . $row['categories_name'] . "</a></li>\n";
      }
      ?>
      <!-- <li><a href="<?php //echo $TopDir; ?>something-special-from-wisconsin.php">Something Special From Wisconsin</a></li> -->
      <!-- <li><a href="<?php //echo $TopDir; ?>featured-items.php">Featured Items</a></li> -->
      <!-- <li><a href="<?php //echo $TopDir; ?>pdf/Product_Line.pdf">Product Line PDF</a></li> -->
    </ul>
  </li>
  <li class="m3">
    <a href="<?php echo $TopDir; ?>artisan-cheeses.php">Artisan Cheeses</a>
    <ul>
      <li><a href="<?php echo $TopDir; ?>products/index.php?cPath=22">Lake Forest Artisan</a></li>
      <!-- <li><a href="<?php //echo $TopDir; ?>pdf/Lake_Forest_Artisan_Line.pdf">Lake Forest Artisan Line PDF</a></li> -->
    </ul>
  </li>
  <li class="m4"><a href="<?php echo $TopDir; ?>blog/">Jim's Blog</a></li>
  <li class="m5"><a href="http://www.jimscheesepantry.com">Jim's Cheese Pantry &amp; Cafe</a></li>
  <li class="m6"><a href="<?php echo $TopDir; ?>where-can-i-buy.php">Where Can I Buy</a></li>
  <li class="m7">
    <a href="<?php echo $TopDir; ?>about-us.php">About Us</a>
    <ul>
      <li><a href="<?php echo $TopDir; ?>contact.php">Contact</a></li>
      <li><a href="<?php echo $TopDir; ?>become-a-retailer.php">Become a Retailer</a></li>
      <li><a href="<?php echo $TopDir; ?>resources.php">Resources</a></li>
    </ul>
  </li>
  <li class="m8"><a href="<?php echo $TopDir; ?>resellers.php">Monthly Specials</a></li>
</ul>