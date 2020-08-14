<?php

$uid = $_GET["uid"];

// Create connection
$con = mysqli_connect("208.109.166.118", "danielwilczak", "Dmw0234567", "LEI_Inventory");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// This SQL statement selects ALL from the table 'Locations'
$sql = "SELECT * FROM 29_RAW_INVENTORY WHERE `uid` = '".$uid."'";

// Check if there are results
if ($result = mysqli_query($con, $sql)) {
    // If so, then create a results array and a temporary one
    // to hold the data
    $resultArray = array();
    $tempArray = array();

    // Loop through each row in the result set
    while ($row = $result->fetch_object()) {
        // Add each row into our results array
        $tempArray = $row;
        array_push($resultArray, $tempArray);
    }

    // Finally, take result and turn it into an array where it come out as an stdclass
    $resultArray = (array) $resultArray[0];
}

// Close connections
mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Multi Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

    <?php include("assets/include/import.php"); ?>

  <!-- =======================================================
  * Template Name: Multi - v2.1.0
  * Template URL: https://bootstrapmade.com/multi-responsive-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
    <?php include ("assets/include/header.php") ?>
  <!-- End Header -->

  <script>
      function myFunction() {
          var x = document.getElementById("change_box");
          if (x.style.display === "none") {
              x.style.display = "block";
          } else {
              x.style.display = "none";
          }
      }
  </script>

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">



      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-id"></i>
              <span style="font-size: 20px">Name: </span>
              <p><?php echo $resultArray["trade_Name"]; ?></p>

            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-exclamation-tringle"></i>
              <span style="font-size: 20px"><?php echo $resultArray["Exp_Date"]; ?> </span>
              <p><strong>Expiration Date: </strong>YYYY-MM-DD</p>

            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-card"></i>
              <span style="font-size: 20px" ><?php echo $resultArray["RM"]; ?></span>
              <p><strong>RM#:</strong> Raw Material Number</p>

            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-card"></i>
              <span style="font-size: 20px"><?php echo $resultArray["LOT"]; ?></span>
              <p><strong>Lot#:</strong> Current lot number.</p>

            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-location-pin"></i>
              <span><?php echo $resultArray["location"]; ?></span>
              <p><strong>Location:</strong> Raw material location</p>
              <a href="#" onclick="myFunction()">Change Location &raquo;</a>
              <div style="display: none;" id="change_box">
                  <form action="change_location.php">
                      <label for="fname">Location to change to:</label><br>
                      <input type="text" id="newLocation" name="newLocation" value=""><br>
                      <input type="text" style="display: none;" id="uid" name="uid" value="<?php echo $uid;?>"><br>
                      <input type="submit" value="Submit" style="margin-left:65px;">
                  </form>
              </div>

            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-measure"></i>
              <span><?php echo $resultArray["quantity_Kg"]; ?></span>
              <p><strong>Quantity (Kg): </strong> Current RM quantity in Kilograms </p>
              <a href="#">Change Quantity&raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-info-square"></i>
              <br>
                <p><strong>LEI: </strong> <?php  if((int)$resultArray["LEI"] == 0) {echo "False";}else{ echo "True";} ?> </p>
                <p><strong>YOU: </strong> <?php if((int)$resultArray["YOU"] == 0) {echo "False";}else{ echo "True";}  ?> </p>
                <p><strong>EXP: </strong> <?php if((int)$resultArray["EXP"] == 0) {echo "False";}else{ echo "True";}  ?> </p>
                <p><strong>CS: </strong> <?php if((int)$resultArray["CS"] == 0) {echo "False";}else{ echo "True";} ?> </p>
                <p><strong>Container: </strong> <?php echo $resultArray["container"];  ?> </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-measure"></i>
              <span>Notes:</span>
              <p><strong>Notes: </strong><?php echo $resultArray["notes"]; ?> </p>
              <a href="#">Change Notes&raquo;</a>

            </div>
          </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                    <i class="icofont-measure"></i>
                    <span style="font-size: 20px">Qr Code</span>
                    <p><img src="https://chart.googleapis.com/chart?chs=177x177&amp;cht=qr&amp;chl=https://wilczakindustrialparts.com/LEI/info.php?uid=<?php echo $resultArray["uid"]; ?>&amp;choe=UTF-8"></p>
                    <a href="https://chart.googleapis.com/chart?chs=300x300&amp;cht=qr&amp;chl=https://wilczakindustrialparts.com/LEI/info.php?uid=<?php echo $resultArray["uid"];?>">Print Qr Code&raquo;</a>
                </div>
            </div>


        </div>

      </div>
    </section><!-- End Counts Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <?php include("assets/include/footer.php"); ?>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>