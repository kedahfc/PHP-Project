<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kedah Football Club</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header> 
  <?php include('includes/header.php');?>
  </header>
  <!-- End Header -->

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Annual General Meeting </h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>AGM</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<!-- ======= Testimonials Section ======= -->
<section id="blog" class="blog">
  <div class="container" style=color:#000000>

    <h3 style=text-align:center;margin-top:-30px>Notice Annual General Meeting</h3>
    <div class="row" >

      <?php $sql = "SELECT * from notice";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {	?>
      <div class="col-lg-8 d-flex align-items-stretch" style=margin-left:185px data-aos="fade-up">
        <article class="entry entry-single" >
          <div><strong style=margin-left:20px;font-size:16px><?php echo htmlentities($result->Title);?></strong></div>
          <div style=margin-left:20px;font-size:14px;margin-top:10px;margin-bottom:10px><?php echo htmlentities($result->Notice_Description);?></div>
          <div style=margin-left:40px;font-size:14px;margin-top:5px>Meeting Date   :  <?php echo htmlentities($result->Meeting_Date);?></div>
          <div style=margin-left:40px;font-size:14px;margin-top:5px>Meeting Time   :  <?php echo htmlentities($result->Meeting_Time);?></div>
          <div style=margin-left:40px;font-size:14px;margin-top:5px;margin-bottom:10px>Meeting Venue  :  <?php echo htmlentities($result->Meeting_Venue);?></div>
          <div><strong style=margin-left:20px;font-size:14px;margin-top:5px>Agenda :</strong></div>
          <div style=margin-left:20px;font-size:14px;margin-top:5px>1. <?php echo htmlentities($result->Agenda1);?></div>
          <div style=margin-left:20px;font-size:14px;margin-top:5px>2. <?php echo htmlentities($result->Agenda2);?></div>
          <div style=margin-left:20px;font-size:14px;margin-top:5px>3. <?php echo htmlentities($result->Agenda3);?></div>
          <div style=margin-left:20px;font-size:14px;margin-top:5px>4. <?php echo htmlentities($result->Agenda4);?></div>
          <div style=margin-left:20px;font-size:14px;margin-top:5px>5. <?php echo htmlentities($result->Agenda5);?></div>
          <div style=margin-left:20px;font-size:14px;margin-top:5px>6. <?php echo htmlentities($result->Agenda6);?></div>
          <div style=margin-left:20px;font-size:14px;margin-top:5px;margin-bottom:30px>7. <?php echo htmlentities($result->Agenda7);?></div>
          <div><strong style=margin-left:20px;font-size:14px>Prepared by :</strong></div>
          <div style=margin-left:20px;font-size:14px;margin-top:5px><?php echo htmlentities($result->Prepared_By);?></div>
          </div>


          <?php }} ?>

        </article>
      </div>
    </div>

 


  </div>
</section><!-- End Testimonials Section -->



  <!-- ======= Footer ======= -->
  <footer> <?php include('includes/footer.php');?>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>