<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{	
	$memberid=intval($_GET['memberid']);
   $fname=$_POST['fname'];
    $plan=$_POST['plan'];
  
   $sql="INSERT INTO member(Member_ID,Full_Name,Membership_Plan) VALUES(:memberid,:fname,:plan)"; 
 
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':plan',$plan,PDO::PARAM_STR);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
	$query->bindParam(':memberid',$memberid,PDO::PARAM_STR);
    $query->execute();

}
?>
<!doctype html>
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

<body>
    
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
 

            <!-- Container -->
            <div class="container">

                <!-- Row -->

                    <div class="col-xl-12">


                <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                    <div class="invoice-from-wrap">
                        <div class="row">


                        <div class="form-group mb-2" style=text-align:center;margin-top:20px>
                    <button onclick="window.print()" class="btn btn-primary">Print</button>
                </div>

                            <h2 class="mb-4 page-title" style=margin-left:200px;margin-top:40px;font-size:40px>Membership Fees Receipt</h2> 
                                <img src="assets/img/logo/head.png" style=margin-bottom:30px>
      
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr class=title-row>
                                        <th>No.</th>
                                        <th>Payment Date</th>
                                        <th>Member ID</th>
                                        <th>Full Name</th>
                                        <th>Membership Plan</th>
                                        <th>Amount Paid</th>
                                         </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                        $memberid=intval($_GET['memberid']);
                                        $sql = "SELECT * from  member where id=:memberid";
                                        $query = $dbh -> prepare($sql);
                                        $query->bindParam(':memberid',$memberid,PDO::PARAM_STR);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query->rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {               ?>   

                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?>2021-01-11</td>
                                            <td class="center"><?php echo htmlentities($result->Member_ID);?></td>
                                            <td style=text-align:left><?php echo htmlentities($result->Full_Name);?></td>
                                            <td class="center"><?php echo htmlentities($result->Membership_Plan);?></td>
                                            <td class="center"><?php echo htmlentities($result->Payment_Date);?></td>
                                        </tr>
                                            <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>

                                </div>

                                <div class="form-group mb-2" style=text-align:right>
                                <div style=margin-top:40px;font-size:30px;margin:50px><strong>Total Payment :</strong></div>
                                </div>
                                
                                
     
        
       
    </div>
    <!-- /HK Wrapper -->

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
