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
    $resultsid=intval($_GET['resultsid']);
    $match_name=$_POST['match_name'];
    $match_team1=$_POST['match_team1'];
    $match_team2=$_POST['match_team2'];
    $match_date=$_POST['match_date'];
    $result1=$_POST['result1'];
    $result2=$_POST['result2'];

$sql="update  results set Match_Name=:match_name,Match_Team1=:match_team1,Match_Team2=:match_team2,Match_Date=:match_date,Result1=:result1,Result2=:result2 where id=:resultsid";

$query = $dbh->prepare($sql);

$query->bindParam(':result2',$result2,PDO::PARAM_STR);
$query->bindParam(':result1',$result1,PDO::PARAM_STR);
$query->bindParam(':match_date',$match_date,PDO::PARAM_STR);
$query->bindParam(':match_team1',$match_team1,PDO::PARAM_STR);
$query->bindParam(':match_team2',$match_team2,PDO::PARAM_STR);
$query->bindParam(':match_name',$match_name,PDO::PARAM_STR);;
$query->bindParam(':resultsid',$resultsid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Match information updated successfully";
header('location:results.php');



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
                        <h2 class="page-title">Edit Results</h2>

                        <form role="form" method="post">

                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Result Details</strong>
                                </div>

                                <div class="card-body">

                                    <?php 
                                    $resultsid=intval($_GET['resultsid']);
                                    $sql = "SELECT * from  results where id=:resultsid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':resultsid',$resultsid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {               ?>   


                                    <div class="form-group row">
                                        <label class="col-sm-1.5 col-form-label">Match Name<span style="color:red;">*</span></label>      
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="match_name"  value="<?php echo htmlentities($result->Match_Name);?>" required />  
                                        </div>
       
                                        <label class="col-sm-1.5 col-form-label">Match Teams<span style="color:red;">*</span></label>
                                            <div class="col-sm-2">
                                                <input type="text" name="match_team1"  placeholder="Team Home" class="form-control" value="<?php echo htmlentities($result->Match_Team1);?>" required />
                                            </div>
                                            <label style="margin-top:10px;">VS</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="match_team2"  placeholder="Team Away" class="form-control" value="<?php echo htmlentities($result->Match_Team2);?>" required />
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-sm-1.8 col-form-label">Match Date<span style="color:red;">*</span></label>
                                            <div class="col-sm-4" style=margin-left:5px>
                                                <input type="date" name="match_date"  placeholder="Match Date" class="form-control" value="<?php echo htmlentities($result->Match_Date);?>" required />
                                            </div>

                                            <label class="col-sm-1.5 col-form-label">Result<span style="color:red;">*</span></label>
                                            <div class="col-sm-1" style=margin-left:43px>
                                                <input type="text" name="result1"  placeholder="Score" class="form-control" value="<?php echo htmlentities($result->Result1);?>" required />
                                            </div>
                                        <label style="margin-top:10px;">VS</label>
                                            <div class="col-sm-1" >
                                                <input type="text" name="result2"  placeholder="Score" class="form-control" value="<?php echo htmlentities($result->Result2);?>" required />
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