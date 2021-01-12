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
          <h2>Fixtures</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Fixtures</li>
          </ol>
        </div>

      </div>
    </section>
	<!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
<!--- rooms ---->
<section id="blog" class="blog">
  <div class="container">
	
    <h3 style=text-align:center>List Upcoming Match</h3>
	 
                        <?php 
                            $sql = "SELECT * from  matches";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0)
                            {
                            foreach($results as $result)
                            {               
                            ?>   
	 
     <!-- Small table -->
              <div class="col-md-12">
                <div class="card shadow">
                  <div class="card-body">
                    <!-- table -->

                    <table class="table datatables" id="dataTable-1">
					    <thead>
                        <tr class=title-row>
                        <th>No.</th>
                          <th>Match Name</th>
                          <th>Team Home</th>
                          <th>Versus</th>
                          <th>Team Away</th>
                          <th>Match Date</th>
                          <th>Match Time</th>
                        </tr>
                      </thead>
                      <tbody>



          <div class="form-group row" style=margin-top:50px;color:#66121a;font-size:20px;background-color:#f3b7bd>
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-8">
              <p><?php echo htmlentities($result->Fixtures_Description);?></p>
              </div>
            </div>

            <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-8">
              <p><?php echo htmlentities($result->Match_Name);?></p>
              </div>
			  
			  <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-8">
              <p><?php echo htmlentities($result->Match_Team1);?><?php echo htmlentities($result->Match_Team2);?></p>
              </div>

             <?php $cnt=$cnt+1;}} ?> 		
					
                  </tbody>
                </table>
              </div>
            </div>
          </div> 
<!-- simple table -->
<!--- /rooms ---->
    </section><!-- End Portfolio Section -->

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