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
	$meetingid=intval($_GET['meetingid']);
    $title=$_POST['title'];
    $attendance=$_POST['attendance'];
	$absence=$_POST['absence'];
    $last_meeting=$_POST['last_meeting'];
    $issue1=$_POST['issue1'];
	$issue1_explanation=$_POST['issue1_explanation'];
	$issue2=$_POST['issue2'];
	$issue2_explanation=$_POST['issue2_explanation'];
	$issue3=$_POST['issue3'];
	$issue3_explanation=$_POST['issue3_explanation'];
	$aob=$_POST['aob'];
	$date_next_meeting=$_POST['date_next_meeting'];
	$prepared_by=$_POST['prepared_by'];
    $approved_by=$_POST['approved_by'];
    $minutes_date=$_POST['minutes_date'];

$sql="update meeting set Title=:title,Attendance=:attendance,Absence=:absence,Last_Meeting=:last_meeting,Issue1=:issue1,Issue1_Explanation=:issue1_explanation,Issue2=:issue2,Issue2_Explanation=:issue2_explanation,Issue3=:issue3,Issue3_Explanation=:issue3_explanation,AOB=:aob,Date_Next_Meeting=:date_next_meeting,Prepared_By=:prepared_by,Approved_By=:approved_by,Minutes_Date=:minutes_date where id=:meetingid";
      

$query = $dbh->prepare($sql);

   $query->bindParam(':title',$title,PDO::PARAM_STR);
    $query->bindParam(':attendance',$attendance,PDO::PARAM_STR);
	$query->bindParam(':absence',$absence,PDO::PARAM_STR);
    $query->bindParam(':last_meeting',$last_meeting,PDO::PARAM_STR);
    $query->bindParam(':issue1',$issue1,PDO::PARAM_STR);
	$query->bindParam(':issue1_explanation',$issue1_explanation,PDO::PARAM_STR);
	$query->bindParam(':issue2',$issue2,PDO::PARAM_STR);
	$query->bindParam(':issue2_explanation',$issue2_explanation,PDO::PARAM_STR);
	$query->bindParam(':issue3',$issue3,PDO::PARAM_STR);
	$query->bindParam(':issue3_explanation',$issue3_explanation,PDO::PARAM_STR);
    $query->bindParam(':aob',$aob,PDO::PARAM_STR);
    $query->bindParam(':date_next_meeting',$date_next_meeting,PDO::PARAM_STR);
	$query->bindParam(':prepared_by',$prepared_by,PDO::PARAM_STR);
	$query->bindParam(':approved_by',$approved_by,PDO::PARAM_STR);
    $query->bindParam(':minutes_date',$minutes_date,PDO::PARAM_STR);
	$query->bindParam(':meetingid',$meetingid,PDO::PARAM_STR);
$query->execute();

$_SESSION['updatemsg']="Minutes Meeting information updated successfully";
header('location:minutes-meeting.php');



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
                        <h2 class="page-title">Edit Minutes Meeting Information</h2>

                        <form role="form" method="post">

                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Minutes Meeting Details</strong>
                                </div>

                                <div class="card-body">

                                    <?php 
                                    $meetingid=intval($_GET['meetingid']);
                                    $sql = "SELECT * from  meeting where id=:meetingid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':meetingid',$meetingid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {               ?>   


                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Title</label>      
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="title"  placeholder="Enter the Title of Meeting"   value="<?php echo htmlentities($result->Title);?>" required /> 
                                        </div>
                                    </div> 

                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Attendance</label>      
                                        <div class="col-sm-8">
                                             <textarea class="form-control" type="textarea" name="attendance"  placeholder="Enter the Name Who Present on Meeting"   required ><?php echo htmlentities($result->Attendance);?></textarea>
                                        </div>
                                    </div> 
									
									 <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Absence</label>      
                                        <div class="col-sm-8">
                                             <textarea class="form-control" type="textarea" name="absence"  placeholder="Enter the Name Who Absence"   required ><?php echo htmlentities($result->Absence);?></textarea>
                                        </div>
                                    </div> 

                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Minutes of Last Meeting</label>
                                        <div class="col-sm-8">
                                             <textarea class="form-control" type="textarea" name="last_meeting"  placeholder="Enter the Minutes of Last Meeting "   required > <?php echo htmlentities($result->Last_Meeting);?></textarea>
                                        </div> 
                                    </div> 

									<div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Issue 1</label>      
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="issue1"  placeholder="Issue 1"   value="<?php echo htmlentities($result->Issue1);?>" required /> 
                                        </div>
                                    </div> 

                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Issue 1 Explanation</label>      
                                        <div class="col-sm-8">
                                             <textarea class="form-control"type="textarea" name="issue1_explanation"  placeholder=" Enter the Issue 1 Explanation"   required > <?php echo htmlentities($result->Issue1_Explanation);?></textarea> 
                                        </div>
                                    </div> 

									<div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Issue 2</label>      
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="issue2"  placeholder="Issue 2"   value="<?php echo htmlentities($result->Issue2);?>" required /> 
                                        </div>
                                    </div> 
                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Issue 2 Explanation</label>      
                                        <div class="col-sm-8">
                                             <textarea class="form-control"type="textarea" name="issue2_explanation"  placeholder=" Enter the Issue 2 Explanation"   required > <?php echo htmlentities($result->Issue2_Explanation);?></textarea> 
                                        </div>
                                    </div> 
									
									<div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Issue 3</label>      
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="issue3"  placeholder="Issue 3"   value="<?php echo htmlentities($result->Issue3);?>" required /> 
                                        </div>
                                    </div> 

                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Issue 3 Explanation</label>      
                                        <div class="col-sm-8">
                                             <textarea class="form-control"type="textarea" name="issue3_explanation"  placeholder=" Enter the Issue 3 Explanation"   required > <?php echo htmlentities($result->Issue3_Explanation);?></textarea> 
                                        </div>
                                    </div> 

                                    <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Any Other Business</label>      
                                        <div class="col-sm-8">
                                            <textarea class="form-control" type="text" name="aob"  placeholder="Enter Any Other Business"   required > <?php echo htmlentities($result->AOB);?></textarea>
                                        </div>
                                    </div> 

									<div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Date Next Meeting</label>      
                                        <div class="col-sm-8">
                                            <textarea class="form-control" type="textarea" name="date_next_meeting"  placeholder="Enter Information for Next Meeting"   required > <?php echo htmlentities($result->Date_Next_Meeting);?></textarea>
                                        </div>
                                    </div> 
									
									<div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Prepared By</label>      
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="prepared_by"  placeholder="Enter Name"   value=" <?php echo htmlentities($result->Prepared_By);?>" required /> 
                                        </div>
                                    </div> 
									
									<div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Approved By</label>      
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="approved_by"  placeholder="Enter Name"   value=" <?php echo htmlentities($result->Approved_By);?>" required /> 
                                        </div>
                                    </div> 
							
									
									 <div class="form-group row" style=margin-left:20px>
                                        <label class="col-sm-2 col-form-label">Minutes Date</label>      
                                        <div class="col-sm-3">
                                            <input class="form-control" type="date" name="minutes_date"  placeholder="date"  value="<?php echo htmlentities($result->Minutes_Date);?>" required /> 
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