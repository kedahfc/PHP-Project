<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
    
//Code for member ID
$count_my_page = ("Member_ID.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 

$member= $hits[0];   
$fname=$_POST['fname'];
$mobileno=$_POST['mobileno'];
$plan=$_POST['plan']; 
$startdate=$_POST['startdate']; 
$expireddate=$_POST['expireddate']; 

$status=1;
$sql="INSERT INTO  member(Member_ID,Full_Name,Mobile_Number,Membership_Plan,Starting_Date,Expired_Date,Status) VALUES(:member,:fname,:mobileno,:plan,:startdate,:expireddate,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':member',$member,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':plan',$plan,PDO::PARAM_STR);
$query->bindParam(':startdate',$startdate,PDO::PARAM_STR);
$query->bindParam(':expireddate',$expireddate,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
echo '<script>alert("Your Registration successfull and your Member_ID is  "+"'.$member.'")</script>';
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
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
  <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
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

    <!------MENU SECTION START-->
<?php include('includes/header.php');?>

<!-- MENU SECTION END-->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>My Membership</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>My Membership</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  
    <!--SIGNUP PANEL START-->           

    <section id="pricing" class="pricing">
      <div class="container">
      
        <div class="col-md-5" style=text-align:center;margin-left:300px>
          <div class="card shadow">
            <div class="card-body">
            
              <h3 style=margin-bottom:20px>Membership Plan</h3>
              
              <div class="form-group row" style=font-size:15px;color:#000000;text-align:left;margin-top:20px>
              <label style=margin-left:20px>Member ID : </label>  
                      <div class="col-sm-6">
                      <div   name="memberid"> MID010</div>
                      </div>
              </div>


              <div class="form-group row" style=font-size:15px;color:#000000;text-align:left;margin-top:20px>
              <label style=margin-left:20px>Membership Plan : </label> 
                      <div class="col-sm-6">
                      <div   name="startdate"> Premium</div>
                      </div>
              </div>

              <div class="form-group row" style=font-size:15px;color:#000000;text-align:left;margin-top:20px>
              <label style=margin-left:20px>Amount Paid :</label>
                      <div class="col-sm-6">
                      <div   name="startdate"> RM 270</div>
                      </div>
              </div>

              <div class="form-group row" style=font-size:15px;color:#000000;text-align:left;margin-top:20px>
                  <label style=margin-left:20px>Start Date : </label> 
                      <div class="col-sm-6">
                      <div  name="startdate">2021-01-11 </div>
                      </div>

              </div>       
              <div class="form-group row" style=font-size:15px;color:#000000;text-align:left;margin-top:20px>
                  <label style=margin-left:20px> Expired Date : </label>
                  <div class="col-sm-6">
                  <div type="text" name="expireddate"> 2022-01-11</div>
                </div>
              </div>

              </form>
 
              <div class="btn-wrap">
              <a href="view-member-receipt.php?"class="btn btn-primary">View Details</a>
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
