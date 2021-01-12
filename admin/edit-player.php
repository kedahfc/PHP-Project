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

$sql="update  player set Player_Position=:player_position, Player_Name=:player_name, Player_Jerseyno=:player_jerseyno, Player_Nationality=:player_nationality, Player_Age=:player_age, Player_Birthplace=:player_birthplace, Player_Birthdate=:player_birthdate, Player_Height=:player_height, Player_Lastclub=:player_lastclub, Player_Yearjoin=:player_yearjoin where id=:playerid";

$query = $dbh->prepare($sql);

$query->bindParam(':player_yearjoin',$player_yearjoin,PDO::PARAM_STR);
$query->bindParam(':player_lastclub',$player_lastclub,PDO::PARAM_STR);
$query->bindParam(':player_height',$player_height,PDO::PARAM_STR);
$query->bindParam(':player_birthdate',$player_birthdate,PDO::PARAM_STR);
$query->bindParam(':player_birthplace',$player_birthplace,PDO::PARAM_STR);
$query->bindParam(':player_age',$player_age,PDO::PARAM_STR);
$query->bindParam(':player_nationality',$player_nationality,PDO::PARAM_STR);
$query->bindParam(':player_jerseyno',$player_jerseyno,PDO::PARAM_STR);
$query->bindParam(':player_name',$player_name,PDO::PARAM_STR);
$query->bindParam(':player_position',$player_position,PDO::PARAM_STR);
$query->bindParam(':playerid',$playerid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Player information updated successfully";



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
                        <h2 class="page-title">Edit Player</h2>

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

                        <form class="form-horizontal" name="player" method="post" enctype="multipart/form-data">

                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Player Details</strong>
                                </div>

                                <div class="card-body">

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


                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label" style="margin-right:17px">Position</label>
                                            <div class="col-sm-4">
                                            <select name="player_position"  id="player_position" class="form-control" required>
                                        <option value="<?php echo htmlentities($result->Player_Position);?>"><?php echo htmlentities($result->Player_Position);?></option>
                                        <option value="Goalkeeper">Goalkeeper</option>
                                        <option value="Defender">Defender</option>
                                        <option value="Midfielder">Midfielder</option>
                                        </select>                                          
                                                </div>

                                                <label class="col-sm-1.9 col-form-label">Birth Place</label>
                                            <div class="col-sm-4">
                                            <input class="form-control" type="text" name="player_birthplace"  value="<?php echo htmlentities($result->Player_Birthplace);?>" required /> 
                                            </div>
                                    </div>


                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label" style="margin-right:32px">Name</label>
                                            <div class="col-sm-4">
                                            <input class="form-control" type="text" name="player_name"  value="<?php echo htmlentities($result->Player_Name);?>" required /> 
                                            </div>

                                                <label class="col-sm-1.9 col-form-label" style="margin-right:5px">Birth Date</label>
                                            <div class="col-sm-4">
                                            <input class="form-control" type="date" name="player_birthdate"  value="<?php echo htmlentities($result->Player_Birthdate);?>"/> 
                                            </div>
                                    </div>


                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label" style="margin-right:3px">Jersey No.</label>
                                            <div class="col-sm-2" style="margin-right:200px">
                                            <input class="form-control" type="number" name="player_jerseyno"  value="<?php echo htmlentities($result->Player_Jerseyno);?>" required />
                                            </div>

                                        <label class="col-sm-2 col-form-label" style="margin-left:-15px">Height</label>
                                            <div class="col-sm-2" style="margin-left:-75px" >
                                            <input class="form-control" type="number" name="player_height"  value="<?php echo htmlentities($result->Player_Height);?>" required /> 
                                            </div>
                                            <label class="col-form-label"  style="margin-left:-5px">cm</label>
                                    </div>


                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label">Nationality</label>
                                            <div class="col-sm-4">
                                            <input class="form-control" type="text" name="player_nationality"  value="<?php echo htmlentities($result->Player_Nationality);?>" required /> 
                                            </div>

                                        <label class="col-sm-1.9 col-form-label" style="margin-right:10px">Last Club</label>                                            <div class="col-sm-4">
                                        <input class="form-control" type="text" name="player_lastclub"  value="<?php echo htmlentities($result->Player_Lastclub);?>" required /> 
                                            </div>
                                    </div>

                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label" style="margin-right:45px">Age</label>
                                            <div class="col-sm-2">
                                            <input class="form-control" type="number" name="player_age"  value="<?php echo htmlentities($result->Player_Age);?>" required />
                                            </div>
                                            <label class="col-form-label" style="margin-left:-5px">years</label>

                                        <label class="col-sm-1.9 col-form-label" style="margin-left:170px">Year Join</label>
                                            <div class="col-sm-2" style="margin-left:10px" >
                                            <input class="form-control" type="number" name="player_yearjoin"  value="<?php echo htmlentities($result->Player_Yearjoin);?>" required /> 
                                            </div>
                                    </div>

                                    <div class="form-group row" style="margin-left:40px">
                                        <label for="focusedinput" class="col-sm-1.9 col-form-label">Player Image</label>
                                        <div class="col-sm-5">
                                        <img src="player-images/<?php echo htmlentities($result->Player_Image);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image-player.php?imgid=<?php echo htmlentities($result->id);?>">Change Image</a>
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