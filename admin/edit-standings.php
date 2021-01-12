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
    $standings_matchname=$_POST['standings_matchname'];
    $standings_ranking=$_POST['standings_ranking'];
    $simage=$_FILES["standings_image"]["name"];

$sql="update  standings set Standings_Matchname=:standings_matchname, Standings_Ranking=:standings_ranking where id=:standingsid";

$query = $dbh->prepare($sql);

$query->bindParam(':standings_ranking',$standings_ranking,PDO::PARAM_STR);
$query->bindParam(':standings_matchname',$standings_matchname,PDO::PARAM_STR);
$query->bindParam(':standingsid',$standingsid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Standings information updated successfully";



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
                        <h2 class="page-title">Add Standings</h2>

                        <?php if($_SESSION['updatemsg']!="")
                            {?>
                            <div class="col-md-6">
                                <div class="alert alert-success" >
                                <strong style=color:#001a4e>Success :</strong> 
                                <?php echo htmlentities($_SESSION['updatemsg']);?>
                                <?php echo htmlentities($_SESSION['updatemsg']="");?>
                                </div>
                            </div>
                            <?php } ?>

                        <form class="form-horizontal" name="standings" method="post" enctype="multipart/form-data">

                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Standings Details</strong>
                                </div>

                                <div class="card-body">

                                    <?php 
                                    $standingsid=intval($_GET['standingsid']);
                                    $sql = "SELECT * from  standings where id=:standingsid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':standingsid',$standingsid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {               ?>   


                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Match Name</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="standings_matchname" class="form-control" value="<?php echo htmlentities($result->Standings_Matchname);?>" required />
                                            </div>
                                    </div>

                                     <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Ranking</label>
                                            <div class="col-sm-8">
                                            <input type="number" name="standings_ranking" class="form-control" value="<?php echo htmlentities($result->Standings_Ranking);?>" required />
                                            </div>
                                    </div>

                                    <div class="form-group row" style="margin-left:35px">
                                        <label for="focusedinput" class="col-sm-1.9 col-form-label">Standings Image</label>
                                        <div class="col-sm-8" style=margin-left:45px>
                                        <img src="standings-images/<?php echo htmlentities($result->Standings_Image);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image-standings.php?imgid=<?php echo htmlentities($result->id);?>">Change Image</a>
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