<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
    $playerid=intval($_GET['playerid']);
    $player_position=$_POST['player_position'];
    $player_name=$_POST['player_name'];
    $player_jerseyno=$_POST['player_jerseyno'];
    $player_nationality=$_POST['player_nationality'];
    $player_age=$_POST['player_age'];
    $player_birthplace=$_POST['player_birthplace'];
    $player_birthdate=$_POST['player_birthdate'];
    $player_height=$_POST['player_height'];
    $player_lastclub=$_POST['player_lastclub'];
    $player_yearjoin=$_POST['player_yearjoin'];
    $pimage=$_FILES["player_image"]["name"];

    $sql="INSERT INTO  player(Player_Position,Player_Name,Player_Jerseyno,Player_Nationality,Player_Age,Player_Birthplace,Player_Birthdate,Player_Height,Player_Lastclub,Player_Yearjoin,Player_Image) VALUES(:player_position,:player_name,:player_jerseyno,:player_nationality,:player_age,:player_birthplace,:player_birthdate,:player_height,:player_lastclub,:player_yearjoin,:pimage)";
    
$query = $dbh->prepare($sql);

  $query->bindParam(':player_position',$player_position,PDO::PARAM_STR);
  $query->bindParam(':player_name',$player_name,PDO::PARAM_STR);
  $query->bindParam(':player_jerseyno',$player_jerseyno,PDO::PARAM_STR);
  $query->bindParam(':player_nationality',$player_nationality,PDO::PARAM_STR);
  $query->bindParam(':player_age',$player_age,PDO::PARAM_STR);
  $query->bindParam(':player_birthplace',$player_birthplace,PDO::PARAM_STR);
  $query->bindParam(':player_birthdate',$player_birthdate,PDO::PARAM_STR);
  $query->bindParam(':player_height',$player_height,PDO::PARAM_STR);
  $query->bindParam(':player_lastclub',$player_lastclub,PDO::PARAM_STR);
  $query->bindParam(':player_yearjoin',$player_yearjoin,PDO::PARAM_STR);
  $query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
  $query->execute();
$_SESSION['updatemsg']="Information updated successfully";

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
          <h2>View Player's Detail</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="current-squad.php">Current Squad</a></li>
            <li>Player's Detail</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Product Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container">
      <h3 style=text-align:center>Player Details</h3>
      <div class="row">

        <?php 
        $playerid=intval($_GET['playerid']);
        $sql = "SELECT * from  player where id=:playerid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':playerid',$playerid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {               ?> 

        <div class="col-lg-10  col-md-2 d-flex align-items-stretch" data-aos="fade-up">

          <article class="entry entry-single"  style=margin-left:100px>


          <div class="col-md-5 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
            <img src="../admin/player-images/<?php echo htmlentities($result->Player_Image);?>" class="img-responsive" style=text-align:left;width:100;height:200>
            </div>	

            <div style=margin-right:-500px>
            <h2 style=margin-left:300px;margin-bottom:10px;font-size:22px><?php echo htmlentities($result->Player_Name);?></h2>
            <p><b style=margin-left:30px;font-size:16px>Position</b><b span style="margin-left:57px">:</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Position);?></span></p>
            <p><b style=margin-left:30px;font-size:16px>Jersey No</b><b span style="margin-left:40px"> :</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Jerseyno);?></span></p>
            <p><b style=margin-left:30px;font-size:16px>Nationality</b><b span style="margin-left:27px">:</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Nationality);?></p>
            <p><b style=margin-left:30px;font-size:16px>Age</b><b span style="margin-left:80px"> :</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Age);?></p>
            <p><b style=margin-left:30px;font-size:16px>Birth Place</b><b span style="margin-left:30px">:</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Birthplace);?></p>
            <p><b style=margin-left:30px;font-size:16px>Birth Date</b><b span style="margin-left:35px">:</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Birthdate);?></p>
            <p><b style=margin-left:30px;font-size:16px>Height</b><b span style="margin-left:65px">:</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Height);?> cm</p>
            <p><b style=margin-left:30px;font-size:16px>Last Club</b><b span style="margin-left:48px">:</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Lastclub);?></p>
            <p><b style=margin-left:30px;font-size:16px>Year Join</b><b span style="margin-left:51px">:</b></span><span style="margin-left:40px;font-size:16px"><?php echo htmlentities($result->Player_Yearjoin);?></p>
            </div>

            <?php }} ?>
      

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