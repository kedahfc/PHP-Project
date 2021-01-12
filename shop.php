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
          <h2>Shop</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Shop</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


<!--- rooms ---->
<section id="team" class="team">
  <div class="container">

    <h1 style=text-align:center;margin-top:-40px>Lastest Products</h1>

    <div class="row">

    <div style=margin-top:10px;font-size:20px>
            <label class="col-sm-12 col-form-label"></label>
            <div class="col-sm-12" style=margin-bottom:20px;text-align:center>
              <h>The latest products from Kedah FA. You can click on this</h> <a href=https://shopee.com.my/kedahfa.os><img src="assets/img/shopee.png"></a> <h>to buy the products and see more other products</h>
            </div>
        </div>

      <?php $sql = "SELECT * from product";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {	?>

   
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">

              <div class="player-img" style=color:#000000>
            <img src="admin/product-images/<?php echo htmlentities($result->Image);?>" class="img-responsive" alt="">
            </div>

            <div class="entry-title" style=color:#000000>
              <h4 style=font-size:25px;text-align:center><?php echo htmlentities($result->Product_Name);?></h4>
              <h3 style=font-size:30px;text-align:center>RM <?php echo htmlentities($result->Price);?></h3>
            </div>


          </div><!-- End blog entry -->
        </div>

      <?php }} ?>

		</div>
	</div>
</section>
<!--- /rooms ---->


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