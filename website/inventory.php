<?php
$con = mysqli_connect("208.109.166.118", "danielwilczak", "Dmw0234567", "LEI_Inventory");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Multi Bootstrap Template</title>
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="inventory.php">Home</a></li>
          <li>Inventory</li>
        </ol>


      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
            <?php
            $result = mysqli_query($con,"SELECT * FROM 29_RAW_INVENTORY");

            echo "<table border='1'>
<tr>
<th>RM:</th>
<th>LOT:</th>
<th>Name:</th>
<th>Exp_Date:</th>
<th>Location:</th>
<th>Quantity_Kg:</th>
<th>Container:</th>
<th>Notes:</th>
<th>Detail:</th>

</tr>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['RM'] . "</td>";
                echo "<td>" . $row['LOT'] . "</td>";
                echo "<td>" . $row['trade_Name'] . "</td>";
                echo "<td>" . $row['Exp_Date'] . "</td>";
                echo "<td>" . $row['location'] . "</td>";
                echo "<td>" . $row['quantity_Kg'] . "</td>";
                echo "<td>" . $row['container'] . "</td>";
                echo "<td>" . $row['notes'] . "</td>";
                echo '<td><a href="info.php?uid=' . $row['uid'] .'">Info</a></td>';
                echo "</tr>";
            }
            echo "</table>";

            mysqli_close($con);

            ?>
        </p>
      </div>
    </section>

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