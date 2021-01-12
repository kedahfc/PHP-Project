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
$email=$_POST['email']; 
$plan=$_POST['plan']; 
$startdate=$_POST['startdate']; 
$expireddate=$_POST['expireddate']; 

$status=1;
$sql="INSERT INTO  member(Member_ID,Full_Name,Mobile_Num,Email,Membership_Plan,Starting_Date,Expired_Date,Status) VALUES(:member,:fname,:mobileno,:email,:plan,:startdate,:expireddate,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':member',$member,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
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

<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>    

</head>
<body>

    <!------MENU SECTION START-->
<?php include('includes/header.php');?>

<!-- MENU SECTION END-->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Member Registration</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="membership.php">Membership</a></li>
            <li>Register</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  
    <!--SIGNUP PANEL START-->           

    <section id="pricing" class="pricing">
      <div class="container">
      
        <div class="col-md-3" style=text-align:center;margin-left:250px>
          <div class="card shadow">
            <div class="card-body">
            
              <form name="signup" method="post" onSubmit="return valid();">

            
              <h3 style=margin-bottom:20px>Personal Details</h3>

              <div class="form-group">
              <input class="form-control" type="text" name="fname" placeholder="Enter Full Name" autocomplete="off" required />
              </div>

              <div class="form-group">
              <input class="form-control" type="text" name="mobileno" maxlength="10" placeholder="Enter Mobile Number" autocomplete="off" required />
              </div>
                                                      
              <div class="form-group">
              <input class="form-control" type="email" name="email" id="email" onBlur="checkAvailability()" placeholder="Enter Email " autocomplete="on" required  />
                <span id="user-availability-status" style="font-size:12px"></span> 
              </div>
                            
              <div class="form-group"  style=text-align:center>
              <button type="submit" name="signup" class="btn btn-primary" id="submit">Register</button>
              </div>

              
            </div>
          </div>
        </div>

        <div class="col-md-4" style=text-align:center;margin-left:40px>
          <div class="card shadow">
            <div class="card-body">
            
              <h3 style=margin-bottom:20px>Membership Plan</h3>
              
              <div class="form-group">
                <select name="plan" class="form-control" required>
                    <option value="Basic">Basic</option>
                  </select>
              </div>

              <div class="form-group">
              <select class="form-control" required>
                    <option>RM 210</option>
                  </select>
              </div>

              <div class="form-group row" style=font-size:15px;color:#000000;text-align:left;margin-top:20px>
                  <label style=margin-left:20px>Start Date : </label><label style=margin-left:80px> Expired Date :</label>
                      <div class="col-sm-6">
                      <input class="form-control" type="text" name="startdate"  value="<?php echo date("Y-m-d") ?>" readonly /> 
                      </div>

                      <div class="col-sm-6">
                      <input class="form-control" type="text" name="expireddate"  value="<?php $date = date("Y-m-d"); echo date('Y-m-d', strtotime($date. ' + 1 year'));?>" readonly /> 
                          <div class="invalid-feedback">Please provide a valid to date.</div>
                      </div>
              </div>

              </form>
              <div class="form-group"  style=text-align:center>
              <a href="payment-basic.php"class="btn btn-primary">Pay Now</a>
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
