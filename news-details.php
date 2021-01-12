<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
  $newsid=intval($_GET['newsid']);
  $news_title=$_POST['news_title'];
  $news_author=$_POST['news_author'];
  $news_company=$_POST['news_company'];
  $news_date=$_POST['news_date'];
  $news_description1=$_POST['news_description1'];
  $news_description2=$_POST['news_description2'];
  $news_description3=$_POST['news_description3'];
  $nimage1=$_FILES["news_image1"]["name"];
  $nimage2=$_FILES["news_image2"]["name"];
  $nimage3=$_FILES["news_image3"]["name"];
  $nimage4=$_FILES["news_image4"]["name"];

  $sql="INSERT INTO  news(News_Title,News_Author,News_Company,News_Date,News_Description1,News_Description2,News_Description3,News_Image1,News_Image2,News_Image3,News_Image4) VALUES(:news_title,:news_author,:news_company,:news_date,:news_description1,:news_description2,:news_description3,:nimage1,:nimage2,:nimage3,:nimage4)";
    
$query = $dbh->prepare($sql);
$query->bindParam(':news_description3',$news_description3,PDO::PARAM_STR);
$query->bindParam(':news_description2',$news_description2,PDO::PARAM_STR);
$query->bindParam(':news_description1',$news_description1,PDO::PARAM_STR);
$query->bindParam(':news_date',$news_date,PDO::PARAM_STR);
$query->bindParam(':news_company',$news_company,PDO::PARAM_STR);
$query->bindParam(':news_author',$news_author,PDO::PARAM_STR);
$query->bindParam(':news_title',$news_title,PDO::PARAM_STR);
$query->bindParam(':newsid',$newsid,PDO::PARAM_STR);
  $query->execute();
$_SESSION['updatemsg']="Product information updated successfully";

}
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
          <h2>News Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="news.php">News</a></li>
            <li>News Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

      <div class="row">

      <?php 
          $newsid=intval($_GET['newsid']);
          $sql = "SELECT * from  news where id=:newsid";
          $query = $dbh -> prepare($sql);
          $query->bindParam(':newsid',$newsid,PDO::PARAM_STR);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
          foreach($results as $result)
          {       ?>   

            <div class="col-lg-12  col-md-6 d-flex align-items-stretch" data-aos="fade-up">

            <article class="entry entry-single">


            <div class="col-md-6 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
              <img src="admin/news-images/<?php echo htmlentities($result->News_Image1);?>" class="img-responsive" alt="">
              </div>

              <div>
            <h2 class="entry-title" style=margin-bottom:20px;margin-top:20px>
              <?php echo htmlentities($result->News_Title);?>
              </h2>
              </div>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i><?php echo htmlentities($result->News_Author);?></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <?php echo htmlentities($result->News_Date);?></li>
                </ul>
              </div>

              <div class="entry-content" style="margin-bottom:20px">
                <p>
                <?php echo htmlentities($result->News_Description1);?>
                </p>
                </div>

              <div class="entry-content"style="margin-bottom:20px">
                <p>
                <?php echo htmlentities($result->News_Description2);?>
                </p>
              </div>

              
              <div class="col-md-7 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
              <img  src="admin/news-images/<?php echo htmlentities($result->News_Image2);?>" class="img-responsive" alt="">
              </div>
              

              <div class="entry-content" style="margin-top:20px;margin-bottom:20px">
                <p>
                <?php echo htmlentities($result->News_Description3);?>
                </p>


                 </article>

                 <!-- End blog entry -->

                <?php }} ?>
         
              
            </div> 
        </div>
    </section>
    <!-- End Blog Section -->

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