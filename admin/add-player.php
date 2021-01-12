<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{
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
    move_uploaded_file($_FILES["player_image"]["tmp_name"],"player-images/".$_FILES["player_image"]["name"]);

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
    $lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
$_SESSION['msg']="Player's information listed successfully";
header('location:manage-player.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-player.php');
}

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


          <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Add Player</h2>

                        <form class="form-horizontal" name="player" method="post" enctype="multipart/form-data">

                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Player Details</strong>
                                </div>

                                <div class="card-body">

                                <div class="form-group row" style="margin-left:40px">
                                <label class="col-sm-1.9 col-form-label" style="margin-right:15px">Position<span style="color:red;">*</span></label>
                                  <div class="col-sm-4">
                                    <select  style="margin-left:5px" name="player_position" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Goalkeeper">Goalkeeper</option>
                                        <option value="Defender">Defender</option>
                                        <option value="Midfielder">Midfielder</option>
                                    </select>
                                </div>




                                    <label class="col-sm-1.9 col-form-label">Birth Place<span style="color:red;">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="player_birthplace"  placeholder="Birth Place" class="form-control" required />
                                </div>
                            </div>


                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label" style="margin-right:32px">Name<span style="color:red;">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="player_name"  placeholder="Enter Name of Player" class="form-control" required />
                                            </div>

                                                <label class="col-sm-1.9 col-form-label" style="margin-right:5px">Birth Date<span style="color:red;">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="date" name="player_birthdate"  placeholder="Enter Birth Day" class="form-control" required />
                                            </div>
                                    </div>


                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label" style="margin-right:3px">Jersey No.<span style="color:red;">*</span></label>
                                            <div class="col-sm-2" style="margin-right:145px">
                                                <input type="number" name="player_jerseyno"  placeholder="Jersey No" class="form-control" required />
                                            </div>

                                        <label class="col-sm-2 col-form-label" style="margin-right:20px">Height<span style="color:red;">*</span></label>
                                            <div class="col-sm-2" style="margin-left:-90px" >
                                                <input type="number" name="player_height"  placeholder="in Centimeter" class="form-control" required />
                                            </div>
                                            <label class="col-form-label"  style="margin-left:-5px">cm</label>
                                    </div>


                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label">Nationality<span style="color:red;">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="player_nationality"  placeholder="Nation" class="form-control" required />
                                            </div>

                                        <label class="col-sm-1.9 col-form-label" style="margin-right:10px">Last Club<span style="color:red;">*</span></label>                                            <div class="col-sm-4">
                                                <input type="text" name="player_lastclub"  placeholder="Club Name" class="form-control" required />
                                            </div>
                                    </div>

                                    <div class="form-group row" style="margin-left:40px">
                                        <label class="col-sm-1.9 col-form-label" style="margin-right:45px">Age<span style="color:red;">*</span></label>
                                            <div class="col-sm-2">
                                                <input type="number" name="player_age"  placeholder="Age" class="form-control" required />
                                            </div>
                                            <label class="col-form-label" style="margin-left:-5px">years</label>

                                        <label class="col-sm-1.9 col-form-label" style="margin-left:170px">Year Join<span style="color:red;">*</span></label>
                                            <div class="col-sm-2" style="margin-left:10px" >
                                                <input type="number" name="player_yearjoin"  placeholder="Year" class="form-control" required />
                                            </div>
                                    </div>

                                    <div class="form-group row" style="margin-left:40px" >
                                        <label for="focusedinput" class="col-sm-1.9 col-form-label">Player Image<span style="color:red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="file" name="player_image" id="player_image" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2" style=text-align:center>
                                        <button type="submit" name="create" class="btn btn-primary">Add Player</button>
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