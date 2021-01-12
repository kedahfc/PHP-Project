<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
  $productid=intval($_GET['productid']);
  $product_name=$_POST['product_name'];
  $price=$_POST['price'];	
  $member_price=$_POST['member_price'];
  $product_availability=$_POST['product_availability'];	
  $product_description=$_POST['product_description'];
  $pimage=$_FILES["image_1"]["name"];
	$pimage2=$_FILES["image_2"]["name"];
	$pimage3=$_FILES["image_3"]["name"];
	$pimage4=$_FILES["image_4"]["name"];

  $sql="INSERT INTO  product(Product_Name,Price,Member_Price,Product_Availability,Product_Description,Image_1,Image_2,Image_3,Image_4) VALUES(:product_name,:price,:member_price,:product_availability,:product_description,:pimage,:pimage2,:pimage3,:pimage4)";
    
$query = $dbh->prepare($sql);

  $query->bindParam(':product_description',$product_description,PDO::PARAM_STR);
  $query->bindParam(':product_availability',$product_availability,PDO::PARAM_STR);
  $query->bindParam(':member_price',$member_price,PDO::PARAM_STR);
  $query->bindParam(':price',$price,PDO::PARAM_STR);
  $query->bindParam(':product_name',$product_name,PDO::PARAM_STR);
  $query->bindParam(':productid',$productid,PDO::PARAM_STR);
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
          <h2>View Product</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li>View Product</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Product Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container">
      <h3 style=text-align:center>Product Details</h3>
      <div class="row">

        <?php 
        $productid=intval($_GET['productid']);
        $sql = "SELECT * from  product where id=:productid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':productid',$productid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {               ?> 

        <div class="col-lg-12  col-md-6 d-flex align-items-stretch" data-aos="fade-up">

          <article class="entry entry-single">

          <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
				    <img src="admin/product-images/<?php echo htmlentities($result->Image_1);?>" class="img-responsive">
            <img src="admin/product-images/<?php echo htmlentities($result->Image_2);?>" class="img-responsive">
            <img src="admin/product-images/<?php echo htmlentities($result->Image_3);?>" class="img-responsive">
            <img src="admin/product-images/<?php echo htmlentities($result->Image_4);?>" class="img-responsive">
            </div>	

            <div>
            <h2><?php echo htmlentities($result->Product_Name);?></h2>
            <p class="dow">RM<?php echo htmlentities($result->Price);?></p>
            <p><b>Availability: </b> <?php echo htmlentities($result->Product_Availability);?></p>
            <p><b>Description: </b> <?php echo htmlentities($result->Product_Description);?></p>
            </div>

            <?php }} ?>

            <div class="form-group mb-2" style=text-align:center;margin-top:20px>
                <a href="user-login.php"  class="btn btn-primary">Add to Cart</a>
            </div>
      
          </article>
        </div>
      </div>
    </div>
  </section>

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