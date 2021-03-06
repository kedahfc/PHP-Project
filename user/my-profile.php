<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_POST['update']))
{    
$stdid=$_SESSION['stdid'];  
$fname=$_POST['fname'];
$mobileno=$_POST['mobileno'];

$sql="update user set FullName=:fname,MobileNumber=:mobileno where User_ID=:stdid";
$query = $dbh->prepare($sql);
$query->bindParam(':stdid',$stdid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Your profile has been updated")</script>';
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
          <h2>My Profile</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>My Profile</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<!-- MENU SECTION END-->
<section id="pricing" class="pricing">
      <div class="container" style=margin-top:-50px>

      <ul style=margin-top:20px;text-align:left>
            <a href="update-address.php "class="btn btn-primary">Add Address</a>
        </ul>

        <?php 
        $stdid=$_SESSION['stdid'];
        $sql="SELECT User_ID,FullName,EmailId,MobileNumber,RegDate,UpdationDate,Status from  user  where User_ID=:stdid ";
        $query = $dbh -> prepare($sql);
        $query-> bindParam(':stdid', $stdid, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {               ?>  

        <div class="col-md-6" style=margin-left:270px;color:#000000;font-size:15px>
          <div class="card shadow">
            <div class="card-body" style=text-align:left>
              <form name="signup" method="post">
                <h3 style=text-align:center;margin-bottom:10px>Update Personal Details</h3>
      
  
                <div class="form-group">
                <label>User ID : </label>
                <?php echo htmlentities($result->User_ID);?>
                </div>

                <div class="form-group">
                <label>Reg Date : </label>
                <?php echo htmlentities($result->RegDate);?>
                </div>
                <?php if($result->UpdationDate!=""){?>
                
                <div class="form-group">
                <label>Last Updation Date : </label>
                <?php echo htmlentities($result->UpdationDate);?>
                </div>
                <?php } ?>


   


                <div class="form-group">
                <label>Enter Full Name :</label>
                <input class="form-control" type="text" name="fname" value="<?php echo htmlentities($result->FullName);?>" autocomplete="off" required />
                </div>


                <div class="form-group">
                <label>Mobile Number :</label>
                <input class="form-control" type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required />
                </div>
                                                        
                <div class="form-group">
                <label>Enter Email</label>
                <input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId);?>"  autocomplete="off" required readonly />
                </div>
                <?php }} ?>

                <div  style=text-align:center>                    
                <button type="submit" name="update" class="btn btn-primary" id="submit" >Update Now </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
<?php } ?>
