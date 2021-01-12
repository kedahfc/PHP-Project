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
          <h2>Membership</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Membership</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="pricing" class="pricing">
      <div class="container">

        <h1 style=text-align:center;margin-top:-30px>Membership Plan</h1>

        <?php $sql = "SELECT * from membership";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {	?>

        
        <div style=margin-top:10px;font-size:20px>
            <label class="col-sm-12 col-form-label"></label>
            <div class="col-sm-12" style=margin-bottom:20px;text-align:center>
              <h><?php echo htmlentities($result->Member_Description);?></h>
            </div>
        </div>

        <div class="col-md-3" style=text-align:center;margin-left:250px>
          <div class="card shadow">
            <div class="card-body">
            
              <h3>Basic Plan</h3>
              <h4><sup>RM</sup><?php echo htmlentities($result->Annual_Fee);?><span> / Year</span></h4>
              <ul>
                <li><?php echo htmlentities($result->Annual_Description);?></li>
              </ul>
              <div class="btn-wrap">
              <a href="user/user-login.php"class="btn btn-buy"> Choose</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3" style=text-align:center;margin-left:40px>
          <div class="card shadow">
            <div class="card-body">
            
              <h3>Premium Plan</h3>
              <h4><sup>RM</sup><?php echo htmlentities($result->Monthly_Fee);?><span> / Year</span></h4>
              <ul>
                <li><?php echo htmlentities($result->Monthly_Description);?></li>
              </ul>
              <div class="btn-wrap">
              <a href="user/user-login.php"class="btn btn-buy"> Choose</a>
              </div>
            </div>
          </div>
        </div>

        <?php }} ?>

      </div>
    </div>

      
    </section><!-- End Pricing Section -->


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