<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
    $honoursid=intval($_GET['honoursid']);
    $type_honours=$_POST['type_honours'];
    $match_name=$_POST['match_name'];
    $champion_standing=$_POST['champion_standing'];
	$year=$_POST['year'];

$sql="update  honours set Type_Honours=:type_honours, Match_Name=:match_name, Champion_Standing=:champion_standing, Year=:year where id=:honoursid";

$query = $dbh->prepare($sql);

$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':champion_standing',$champion_standing,PDO::PARAM_STR);
$query->bindParam(':match_name',$match_name,PDO::PARAM_STR);
$query->bindParam(':type_honours',$type_honours,PDO::PARAM_STR);;
$query->bindParam(':honoursid',$honoursid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Honours information updated successfully";
header('location:honours.php');



}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

   <!-- Favicons -->
   <link href="../assets/img/logo/logo.png" rel="icon">

    <title>Admin Kedah Football Club</title>

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">

    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>

  </head>

<body class="vertical  light">
    <div class="wrapper">
          <!-- ======= Header ======= -->
          <header> 
          <?php include('includes/header.php');?>
          </header>
          <!-- End Header -->

          <!-- ======= Sidebar ======= -->
          <sidebar> 
          <?php include('includes/sidebar.php');?>
          </sidebar>
          <!-- End Sidebar -->

        <!-- MENU SECTION END-->
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Add Honours</h2>

                        <form role="form" method="post">

                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Honours Details</strong>
                                </div>

                                <div class="card-body">

                                    <?php 
                                    $honoursid=intval($_GET['honoursid']);
                                    $sql = "SELECT * from  honours where id=:honoursid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':honoursid',$honoursid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {               ?>   


                                    <div class="form-group row">
                                        <label class="col-sm-1.5 col-form-label" style=margin-right:35px>Type Honours</label>
                                            <div class="col-sm-4">
                                            <input class="form-control" type="text" name="type_honours"  value="<?php echo htmlentities($result->Type_Honours);?>" required />  
                                            </div>

                                        <label class="col-sm-1.5 col-form-label">Match Name</label>
                                            <div class="col-sm-4">
                                            <input class="form-control" type="text" name="match_name"  value="<?php echo htmlentities($result->Match_Name);?>" required /> 
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-sm-1.5 col-form-label">Champion Standing</label>
                                            <div class="col-sm-4">
                                            <input class="form-control" type="text" name="champion_standing"  value="<?php echo htmlentities($result->Champion_Standing);?>" required />
                                            </div>

                                    <label class="col-sm-1.5 col-form-label" style=margin-right:50px>Year</label>
                                            <div class="col-sm-4">
                                            <input class="form-control" type="text" name="year"  value="<?php echo htmlentities($result->Year);?>" required />
                                            </div>
                                    </div>

								
 
                                        <?php }} ?>
                                        
                                    <div class="form-group mb-2" style=text-align:center>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div> <!-- / .row justify-content-center-->
                </div> <!-- / .container-fluid-->
            </div>
        </main> 
    </div> <!-- .wrapper -->


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
    <script src='js/textarea.min.js'></script>
    <script src="js/apps.js"></script>

     <!-- CORE JQUERY  -->
     <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
</body>
</html>
<?php } ?>