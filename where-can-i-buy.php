<?php
if (!isset($_POST['submit']) && $_SERVER['QUERY_STRING'] == "thankyou") header("Location: where-can-i-buy.php");
$PageTitle = "Where Can I Buy";
//$SideMenu = "m6";
include "header.php";
include_once "inc/dbconfig.php";
?>

<!-- BEGIN Google Conversion -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1008631094;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "5exrCPLk4wMQtvr54AM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1008631094/?value=0&amp;label=5exrCPLk4wMQtvr54AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- END Google Conversion -->

<a href="http://www.somethingspecialwi.com"><img src="images/something-special.png" alt="Something special from Wisconsin" style="float: right;"></a>

<h1>Where Can I Buy</h1>

<h2>Enter your zip code to locate a Jim's Cheese retailer near you.</h2>

<form action="where-can-i-buy.php?thankyou" method="post" style="width: 380px;">
  Zip Code: <input type="text" name="zip" size="10" value="<?php echo $_POST['zip']; ?>"> &nbsp;
  Distance:
  <select name="distance">
    <option value="5"<?php if ($_POST['distance'] == "5") echo " selected"; ?>>5 miles</option>
    <option value="10"<?php if ($_POST['distance'] == "10") echo " selected"; ?>>10 miles</option>
    <option value="25"<?php if ($_POST['distance'] == "25") echo " selected"; ?>>25 miles</option>
    <option value="50"<?php if ($_POST['distance'] == "50") echo " selected"; ?>>50 miles</option>
    <option value="100"<?php if ($_POST['distance'] == "100") echo " selected"; ?>>100 miles</option>
  </select> &nbsp;
  <input type="submit" name="submit" value="Find">
</form>

<?php if (isset($_POST['submit'])) { ?>
  <br>
  <strong>Locations within <?php echo $_POST['distance']; ?> miles of <?php echo $_POST['zip']; ?></strong><br>
  <br>

  <div style="float: left; width: 300px;">

  <?php
  // Set variables
  $zipdb = "zip.txt";

  // Set search radius
  switch ($_POST['distance']) {
  case 100:
    $SearchRadius = "1.5";
    break;
  case 50:
    $SearchRadius = "1";
    break;
  case 25:
    $SearchRadius = "0.5";
    break;
  case 10:
    $SearchRadius = "0.2";
    break;
  case 5:
    $SearchRadius = "0.1";
    break;
  }

  // Open Zip Code database
  $file_handle = fopen($zipdb, "rb");

  // Get the latitude and longitude of supplied Zip Code
  while (!feof($file_handle) ) {
    $line_of_text = fgets($file_handle);
    $parts = explode(",", $line_of_text);
    if ($parts[0] == $_POST['zip']) {
      $MyLat = $parts[3];
      $MyLon = $parts[4];
    }
  }

  // Close Zip Code database
  fclose($file_handle);

  // Define the minimum and maximum latitude and longitude
  $MaxLat = $MyLat + $SearchRadius;
  $MinLat = $MyLat - $SearchRadius;
  $MaxLon = $MyLon + $SearchRadius;
  $MinLon = $MyLon - $SearchRadius;

  // Open Zip Code database
  $file_handle = fopen($zipdb, "rb");

  while (!feof($file_handle) ) {
    // Check latitude and logitude of each line
    $line_of_text = fgets($file_handle);
    $parts = explode(",", $line_of_text);
    $ZipLat = $parts[3];
    $ZipLon = $parts[4];

    // If latitude and logitude in is range...
    if (($parts[3] <= $MaxLat) && ($parts[3] >= $MinLat) && ($parts[4] <= $MaxLon) && ($parts[4] >= $MinLon)) {
      // Calculate the distance between points
      $theta = $ZipLon - $MyLon;
      $dist = sin(deg2rad($ZipLat)) * sin(deg2rad($MyLat)) +  cos(deg2rad($ZipLat)) * cos(deg2rad($MyLat)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $miles = round($miles);

      // Shove into array
      $ZipArray[] = "$miles|$parts[0]|$parts[3]|$parts[4]";
    }
  }

  // Close Zip Code database
  fclose($file_handle);

  // Sort the array
  sort($ZipArray, SORT_NUMERIC);

  function GenLoc($ziparr, $type) {
    $header = "no";

    //if ($type == "Dealer") $color = "red";
    //if ($type == "Showroom") $color = "paleblue";
    //if ($type == "Contractor") $color = "green";
    //if ($type == "Distributor") $color = "yellow";
    $color = "yellow";

    // Index and letter for map markers
    $letter = "A";
    $GMindex = 0;

    // Open array of zip codes in radius and find any retailers within
    while (list($key, $val) = each($ziparr)) {
      $vals = explode("|", $val);
      $MyMiles = $vals[0];
      $MyFinalZip = $vals[1];

      $result = mysql_query("SELECT * FROM where_can_i_buy WHERE zip LIKE '" . $MyFinalZip . "%'");

      // If there is a match format and display it
      while($row = mysql_fetch_array($result)) {
        // Sanitize the address for geocoding
        $searchaddress = trim($row['address']) . " " . trim($row['city']) . " " . trim($row['state']) . " " . trim($row['zip']);
        $searchaddress = urlencode($searchaddress);
        
        // No latitude or longitude in database
        if ($row['latitude'] == "" || $row['longitude'] == "") {
          // Get latitude and longitude for this address to display on map
          $request  = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $searchaddress .  "&sensor=false";
          $response = file_get_contents($request);
          
          $data = json_decode($response);
          $Llat = $data->results[0]->geometry->location->lat;
          $Llng = $data->results[0]->geometry->location->lng;

          mysql_query("UPDATE where_can_i_buy SET latitude = '" . $Llat . "', longitude = '" . $Llng . "' WHERE id = '" . $row['id'] . "'");
        } else {
          $Llat = $row['latitude'];
          $Llng = $row['longitude'];
        }
        
        if ($Llng != "") {
          if ($header == "yes") echo "<h3>" . $type . "s</h3>\n";
          ?>

          <div style="float: left; width: 20px; font-weight: bold;"><img src="images/markers/<?php echo $color; ?>_Marker<?php if ($GMindex < 26) echo $letter; ?>.png"></div>
          <div style="margin-left: 25px; text-transform: uppercase;">
            <?php echo stripslashes($row['customer']); ?><br>
            <?php echo stripslashes($row['address']); ?><br>
            <?php echo stripslashes($row['city']); ?>, <?php echo $row['state']; ?> <?php echo $row['zip']; ?><br>
            <?php if (!empty($row['telephone'])) echo $row['telephone'] . "<br>"; ?>
            <?php
            //if (!empty($row['website'])) {
            //  $fullurl = (substr($row['website'], 0, 7) == "http://") ? $row['website'] : "http://" . $row['website'];
            //  echo "<a href=\"" . $fullurl . "\">" . $row['website'] . "</a><br>\n";
            //}
            ?>
            <span style="font-size: 80%;">
              About <?php echo $MyMiles; ?> miles &nbsp; <a href="http://maps.google.com/maps?daddr=<?php echo $searchaddress; ?>" target="_blank">Get Directions</a>
            </span>
          </div>
          <div style="clear: both;"></div>
          <br>

          <?php
          // Generate address string for map info box
          $info = "<strong>" . stripslashes($row['customer']) . "</strong><br>";
          $info .= stripslashes($row['address']) . "<br>";
          $info .= stripslashes($row['city']) . ", " . $row['state'] . " " . $row['zip'] . "<br>";
          if (!empty($row['telephone'])) $info .= $row['telephone'] . "<br>";
          //if (!empty($row['website'])) {
          //  $fullurl = (substr($row['website'], 0, 7) == "http://") ? $row['website'] : "http://" . $row['website'];
          //  $info .= "<a href='" . $fullurl . "' target='_blank'>" . $row['website'] . "</a><br>";
          //}
          $info .= "<br><a href='http://maps.google.com/maps?daddr=" . $searchaddress . "' target='_blank'>Get Directions</a>";

          // Create map markers and info box
          $MyMarker = ($GMindex < 26) ? "images/markers/" . $color . "_Marker" . $letter . ".png" : "images/markers/" . $color . "_Marker.png";
          $Markers .= "[\"" . $info . "\", " . $Llat . ", " . $Llng . ", \"" . $MyMarker . "\"],";

          // Increase index and letter by one
          $GMindex++;
          $letter++;

          $header = "no";
        }
      }
    }

    reset($ziparr);
    
    $Markers = substr($Markers, 0, -1);
    return $Markers;
  }

  //$Markers .= GenLoc($ZipArray, "Contractor");
  //$Markers .= GenLoc($ZipArray, "Dealer");
  //$Markers .= GenLoc($ZipArray, "Showroom");
  //$Markers .= GenLoc($ZipArray, "Distributor");
  $Markers .= GenLoc($ZipArray, "Retailers");

  $lines = explode("\n", $Markers);
  $num_lines = "var numlines = " . count($lines) . ";";

  // No dealers were found
  if ($Markers == "") echo "No locations found.  Try expanding the distance and searching again.";
  ?>
  </div>

  <div id="map">
    <div style="border: 1px solid #B17906;">
      <div id="map_canvas" style="width: 550px; height: 550px"></div>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <script type="text/javascript">
        var locations = [
        <?php echo $Markers; ?>
        ];
        
        var map = new google.maps.Map(
          document.getElementById("map_canvas"), {
            center: new google.maps.LatLng(<?php echo $MyLat . ", " . $MyLon; ?>),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }
        );
        
        var infowindow = new google.maps.InfoWindow();
        
        var shadow = new google.maps.MarkerImage("images/markers/marker-shadow.png",
            new google.maps.Size(51, 37),
            new google.maps.Point(0,0),
            new google.maps.Point(0, 37));

        var marker, i;

        for (i = 0; i < locations.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: locations[i][3],
            shadow: shadow
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }
      </script>

      
    </div>
  </div> <!-- END map -->
<?php } ?>

<div style="clear: both;"></div>

<?php include "footer.php"; ?>