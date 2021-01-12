<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
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
	

    $sql="INSERT INTO meeting(Title,Attendance,Absence,Last_Meeting,Issue1,Issue1_Explanation,Issue2,Issue2_Explanation,Issue3,Issue3_Explanation,AOB,Date_Next_Meeting,Prepared_By,Approved_By,Minutes_Date) VALUES(:title,:attendance,:absence,:last_meeting,:issue1,:issue1_explanation,:issue2,:issue2_explanation,:issue3,:issue3_explanation,:aob,:date_next_meeting,:prepared_by,:approved_by,:minutes_date)";      
 
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

                <div class="form-group row"style=margin-top:50px>
                    <div class="col-sm-9" style=margin-left:70px>
                        <img src="assets/img/logo/logo 1.png" style=text-align:left>
                    </div>
                    <div class="col-sm-3" style=margin-left:-100px>
                        <div style=font-size:20px;color:#00000;font-weight:900;margin-top:10px>KEDAH FOOTBALL CLUB</div>
                        <div style=font-size:20px>Level 1, Main Grandstand,</div>
                        <div style=font-size:20px>Darul Aman Stadium,</div>
                        <div style=font-size:20px>05100 Alor Setar, Kedah</div>
                        <div style=font-size:20px>No. Tel: 04-733 9960</div>
                    </div>
                </div>

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
            


                <div class="form-group row" style=margin-left:50px;margin-top:50px>
                    <div class="col-sm-11">
                        <div><strong style=font-size:20px><?php echo htmlentities($result->Title);?></strong></div> 
                    </div>
                </div>

                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-11">
                        <div style=font-size:20px><strong>Present: </strong></div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:120px>
                    <div class="col-sm-4">
                        <div style=font-size:20px><?php echo htmlentities($result->Attendance);?></div>
                    </div>
                </div>

                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><strong>1.0 Apologies of Absence</strong></div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:80px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><?php echo htmlentities($result->Absence);?></div>
                    </div>
                </div>

                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-11">
                        <div style=font-size:20px><strong>2.0 Minutes of Last Meeting</strong></div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:80px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><?php echo htmlentities($result->Last_Meeting);?></div>
                    </div>
                </div>


                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><strong>3.0<?php echo htmlentities($result->Issue1);?></strong></div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:80px>
                    <div class="col-sm-11">
                        <div style=font-size:20px><?php echo htmlentities($result->Issue1_Explanation);?></div>
                    </div>
                </div>


                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-11">
                        <div style=font-size:20px><strong>4.0<?php echo htmlentities($result->Issue2);?></strong></div>
                        </div>
                </div>
                <div class="form-group row" style=margin-left:80px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><?php echo htmlentities($result->Issue2_Explanation);?></div>
                    </div>
                </div>


                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-11">
                        <div style=font-size:20px><strong>5.0<?php echo htmlentities($result->Issue3);?></strong></div>
                        </div>
                </div>
                <div class="form-group row" style=margin-left:80px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><?php echo htmlentities($result->Issue3_Explanation);?></div>
                    </div>
                </div>


                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-11"> 
                        <div style=font-size:20px><strong>6.0 Any Other Business</strong></div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:80px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><?php echo htmlentities($result->AOB);?></div>
                    </div>
                </div>


                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-11"> 
                        <div style=font-size:20px><strong>7.0 Date of Next Meeting</strong></div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:80px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><?php echo htmlentities($result->Date_Next_Meeting);?></div>
                    </div>
                </div>



                <div class="form-group row" style=margin-left:50px;margin-top:40px>
                    <div class="col-sm-9"> 
                        <div style=font-size:20px><strong>Prepared By</strong></div>
                    </div>
                    <div class="col-sm-2"> 
                        <div style=font-size:20px;margin-right:-50px><strong>Approved By</strong></div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:50px>
                    <div class="col-sm-9">
                        <div style=font-size:20px><?php echo htmlentities($result->Prepared_By);?></div>
                        <div style=font-size:20px>Secretary</div>
                    </div>
                    <div class="col-sm-2"> 
                        <div style=font-size:20px><?php echo htmlentities($result->Approved_By);?></div>
                        <div style=font-size:20px>President</div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:50px;margin-top:40px>
                    <div class="col-sm-7">
                    <div style=font-size:20px><?php echo htmlentities($result->Minutes_Date);?></div>
                    </div>
                </div>
                        

                <?php } ?>



                <div class="form-group mb-2" style=text-align:center;margin-top:20px>
                    <button onclick="window.print()" class="btn btn-primary">Print</button>
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