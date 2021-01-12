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
    $noticeid=intval($_GET['noticeid']);
     $date_notice=$_POST['date_notice'];
    $position=$_POST['position'];
    $title=$_POST['title'];
    $notice_description=$_POST['notice_description'];
    $meeting_date=$_POST['meeting_date'];
    $meeting_day=$_POST['meeting_day'];
    $meeting_time=$_POST['meeting_time'];
    $meeting_venue=$_POST['meeting_venue'];
	$agenda1=$_POST['agenda1'];
	$agenda2=$_POST['agenda2'];
	$agenda3=$_POST['agenda3'];
	$agenda4=$_POST['agenda4'];
	$agenda5=$_POST['agenda5'];
	$agenda6=$_POST['agenda6'];
	$agenda7=$_POST['agenda7'];
    $prepared_by=$_POST['prepared_by'];

    $sql="update notice set Date_Notice=:date_notice,Position=:position,Title=:title,Notice_Description=:notice_description,Meeting_Date=:meeting_date,Meeting_Day=:meeting_day,Meeting_Time=:meeting_time,Meeting_Venue=:meeting_venue,Agenda1=:agenda1,Agenda2=:agenda2,Agenda3=:agenda3,Agenda4=:agenda4,Agenda5=:agenda5,Agenda6=:agenda6,Agenda7=:agenda7,Prepared_By=:prepared_by where id=:noticeid";

$query = $dbh->prepare($sql);

    $query->bindParam(':prepared_by',$prepared_by,PDO::PARAM_STR);
	$query->bindParam(':agenda7',$agenda7,PDO::PARAM_STR);
	$query->bindParam(':agenda6',$agenda6,PDO::PARAM_STR);
	$query->bindParam(':agenda5',$agenda5,PDO::PARAM_STR);
	$query->bindParam(':agenda4',$agenda4,PDO::PARAM_STR);
	$query->bindParam(':agenda3',$agenda3,PDO::PARAM_STR);
	$query->bindParam(':agenda2',$agenda2,PDO::PARAM_STR);
	$query->bindParam(':agenda1',$agenda1,PDO::PARAM_STR);
	$query->bindParam(':meeting_venue',$meeting_venue,PDO::PARAM_STR);
    $query->bindParam(':meeting_time',$meeting_time,PDO::PARAM_STR);
    $query->bindParam(':meeting_day',$meeting_day,PDO::PARAM_STR);
    $query->bindParam(':meeting_date',$meeting_date,PDO::PARAM_STR);
    $query->bindParam(':notice_description',$notice_description,PDO::PARAM_STR);
    $query->bindParam(':title',$title,PDO::PARAM_STR);
    $query->bindParam(':position',$position,PDO::PARAM_STR);
    $query->bindParam(':date_notice',$date_notice,PDO::PARAM_STR);
    $query->bindParam(':noticeid',$noticeid,PDO::PARAM_STR);
$query->execute();

$_SESSION['updatemsg']="Notice & Agenda information updated successfully";
header('location:notice-agenda.php');


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
                        <h2 class="page-title">Edit Notice & Agenda Information</h2>

                        <form role="form" method="post">

                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Notice & Agenda Details</strong>
                                </div>

                                <div class="card-body">

                                    <?php 
                                    $noticeid=intval($_GET['noticeid']);
                                    $sql = "SELECT * from  notice where id=:noticeid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':noticeid',$noticeid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {               ?>   


                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-1.5 col-form-label">Title</label>
                                            <div class="col-sm-9"  style=margin-left:95px>
                                            <input class="form-control" type="text" name="title"  placeholder="Enter the Title of Meeting"  value="<?php echo htmlentities($result->Title);?>" required />
                                            </div>
                                    </div>
                                
                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-1.5 col-form-label">Meeting Date</label>
                                            <div class="col-sm-2" style=margin-left:40px>
                                            <input type="date" name="meeting_date"  placeholder="date" class="form-control" value="<?php echo htmlentities($result->Meeting_Date);?>" required />
                                            </div>

                                            <label class="col-sm-1.5 col-form-label" style="margin-right:17px">Day</label>
                                                <div class="col-sm-2">
                                                    <select  style="margin-left:5px" name="meeting_day" class="form-control" required>
                                                        <option value="<?php echo htmlentities($result->Meeting_Day);?>"><?php echo htmlentities($result->Meeting_Day);?></option>
                                                        <option value="Sunday">Sunday</option>
                                                            <option value="Monday">Monday</option>
                                                            <option value="Tuesday">Tuesday</option>
                                                            <option value="Wednesday">Wednesday</option>
                                                            <option value="Thursday">Thursday</option>
                                                    </select>
                                                </div>

                                        <label class="col-sm-1.5 col-form-label"  style="margin-left:85px">Date Notice</label>
                                        <div class="col-sm-2" style=margin-left:30px>
                                        <input class="form-control" type="date" name="date_notice"  placeholder="date"   value="<?php echo htmlentities($result->Date_Notice);?>" required />
                                        </div>
                                    </div>
            
                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-1.5 col-form-label">Meeting Time</label>
                                        <div class="col-sm-3" style=margin-left:40px>
                                            <input class="form-control" type="time" name="meeting_time"  placeholder="Time"  value="<?php echo htmlentities($result->Meeting_Time);?>" required /> 
                                        </div>

                                            <label class="col-sm-1.5 col-form-label" style=margin-left:45px>Meeting Venue</label>
                                        <div class="col-sm-4" style=margin-left:40px>
                                            <input class="form-control" type="text" name="meeting_venue"  placeholder="Enter the Venue of Meeting" value="<?php echo htmlentities($result->Meeting_Venue);?>"/> 
                                        </div>
                                    </div>

                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-1.5 col-form-label">Position</label>
                                        <div class="col-sm-9" style=margin-left:75px>
                                            <textarea class="form-control" type="text" name="position"  placeholder="Enter the Positions and Names"  required > <?php echo htmlentities($result->Position);?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-1.5 col-form-label">Notice Description</label>
                                            <div class="col-sm-9" style=margin-left:10px>
                                                <textarea class="form-control" type="text" name="notice_description"  placeholder="Enter the Notice Information" required > <?php echo htmlentities($result->Notice_Description);?></textarea>
                                            </div>
                                    </div>

                                    <div class="form-group row" style=margin-left:20px>
                                            <label class="col-sm-1.5 col-form-label">Agenda 1</label>
                                        <div class="col-sm-9" style=margin-left:70px>
                                            <input class="form-control" type="text" name="agenda1"  placeholder="Agenda 1"  value="<?php echo htmlentities($result->Agenda1);?>" required /> 
                                        </div>
                                    </div>
									
									<div class="form-group row" style=margin-left:20px>
                                            <label class="col-sm-1.5 col-form-label">Agenda 2</label>
                                        <div class="col-sm-9" style=margin-left:70px>
                                            <input class="form-control" type="text" name="agenda2"  placeholder="Agenda 2"  value="<?php echo htmlentities($result->Agenda2);?>" required /> 
                                        </div>
                                    </div>
									
									<div class="form-group row" style=margin-left:20px>
                                            <label class="col-sm-1.5 col-form-label">Agenda 3</label>
                                        <div class="col-sm-9" style=margin-left:70px>
                                            <input class="form-control" type="text" name="agenda3"  placeholder="Agenda 3"  value="<?php echo htmlentities($result->Agenda3);?>" required /> 
                                        </div>
                                    </div>
									
									<div class="form-group row" style=margin-left:20px>
                                            <label class="col-sm-1.5 col-form-label">Agenda 4</label>
                                        <div class="col-sm-9" style=margin-left:70px>
                                            <input class="form-control" type="text" name="agenda4"  placeholder="Agenda 4"  value="<?php echo htmlentities($result->Agenda4);?>" required /> 
                                        </div>
                                    </div>
									
									<div class="form-group row" style=margin-left:20px>
                                            <label class="col-sm-1.5 col-form-label">Agenda 5</label>
                                        <div class="col-sm-9" style=margin-left:70px>
                                            <input class="form-control" type="text" name="agenda5"  placeholder="Agenda 5"  value="<?php echo htmlentities($result->Agenda5);?>" required /> 
                                        </div>
                                    </div>
									
									<div class="form-group row" style=margin-left:20px>
                                            <label class="col-sm-1.5 col-form-label">Agenda 6</label>
                                        <div class="col-sm-9" style=margin-left:70px>
                                            <input class="form-control" type="text" name="agenda6"  placeholder="Agenda 6"  value="<?php echo htmlentities($result->Agenda6);?>" required /> 
                                        </div>
                                    </div>
									
									<div class="form-group row" style=margin-left:20px>
                                            <label class="col-sm-1.5 col-form-label">Agenda 7</label>
                                        <div class="col-sm-9" style=margin-left:70px>
                                            <input class="form-control" type="text" name="agenda7"  placeholder="Agenda 7"  value="<?php echo htmlentities($result->Agenda7);?>" required /> 
                                        </div>
                                    </div>

                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-1.5 col-form-label">Prepared By</label>
                                            <div class="col-sm-9" style=margin-left:50px>
                                                <input class="form-control" type="text" name="prepared_by"  placeholder="Enter Name"  value="<?php echo htmlentities($result->Prepared_By);?>" required /> 
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