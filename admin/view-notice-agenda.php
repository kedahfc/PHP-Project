<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
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

   $sql="INSERT INTO notice(Date_Notice,Position,Title,Notice_Description,Meeting_Date,Meeting_Day,Meeting_Time,Meeting_Venue,Agenda1,Agenda2,Agenda3,Agenda4,Agenda5,Agenda6,Agenda7,Prepared_By) VALUES(:date_notice,:position,:title,:notice_description,:meeting_date,:meeting_day,:meeting_time,:meeting_venue,:agenda1,:agenda2,:agenda3,:agenda4,:agenda5,:agenda6,:agenda7,:prepared_by)"; 
 
$query = $dbh->prepare($sql);
   $query->bindParam(':date_notice',$date_notice,PDO::PARAM_STR);
    $query->bindParam(':position',$position,PDO::PARAM_STR);
    $query->bindParam(':title',$title,PDO::PARAM_STR);
    $query->bindParam(':notice_description',$notice_description,PDO::PARAM_STR);
    $query->bindParam(':meeting_date',$meeting_date,PDO::PARAM_STR);
    $query->bindParam(':meeting_day',$meeting_day,PDO::PARAM_STR);
    $query->bindParam(':meeting_time',$meeting_time,PDO::PARAM_STR);
    $query->bindParam(':meeting_venue',$meeting_venue,PDO::PARAM_STR);
    $query->bindParam(':agenda1',$agenda1,PDO::PARAM_STR);
	$query->bindParam(':agenda2',$agenda2,PDO::PARAM_STR);
	$query->bindParam(':agenda3',$agenda3,PDO::PARAM_STR);
	$query->bindParam(':agenda4',$agenda4,PDO::PARAM_STR);
	$query->bindParam(':agenda5',$agenda5,PDO::PARAM_STR);
	$query->bindParam(':agenda6',$agenda6,PDO::PARAM_STR);
	$query->bindParam(':agenda7',$agenda7,PDO::PARAM_STR);
    $query->bindParam(':prepared_by',$prepared_by,PDO::PARAM_STR);
	$query->bindParam(':noticeid',$noticeid,PDO::PARAM_STR);
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

                <div class="form-group row" style=margin-top:50px>
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
            


                <div class="form-group row" style=margin-left:70px;margin-top:50px>
                    <div class="col-sm-11">
                        <div><strong style=font-size:20px><?php echo htmlentities($result->Title);?></strong></div> 
                    </div>
                </div>
				
				 <div class="form-group row" style=margin-left:70px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify><?php echo htmlentities($result->Notice_Description);?></div>
                    </div>
                </div>

                <div class="form-group row" style=margin-left:70px>
                    <div class="col-sm-11" style=margin-left:70px>
                        <div style=font-size:20px><strong>Meeting Date: </strong>
                        <?php echo htmlentities($result->Meeting_Date);?>,
                        <?php echo htmlentities($result->Meeting_Day);?>
                        </div>
                    </div>
                </div>
				
                <div class="form-group row" style=margin-left:70px>
                    <div class="col-sm-11" style=margin-left:70px>
                        <div style=font-size:20px><strong>Meeting Time: </strong><?php echo htmlentities($result->Meeting_Time);?></div>
                    </div>
                </div>

                <div class="form-group row" style=margin-left:70px>
                    <div class="col-sm-11" style=margin-left:70px>
                        <div style=font-size:20px><strong>Meeting Venue: </strong><?php echo htmlentities($result->Meeting_Venue);?></div>
                    </div>
                </div>


                <div class="form-group row" style=margin-left:70px>
                    <div class="col-sm-11">
                        <div style=font-size:20px><strong>Agenda</strong></div>
                    </div>
                </div>
                <div class="form-group row" style=margin-left:80px>
                    <div class="col-sm-11">
                        <div style=font-size:20px;text-align:justify>1. <?php echo htmlentities($result->Agenda1);?></div>
                        <div style=font-size:20px;text-align:justify>2. <?php echo htmlentities($result->Agenda2);?></div>
                        <div style=font-size:20px;text-align:justify>3. <?php echo htmlentities($result->Agenda3);?></div>
                        <div style=font-size:20px;text-align:justify>4. <?php echo htmlentities($result->Agenda4);?></div>
                        <div style=font-size:20px;text-align:justify>5. <?php echo htmlentities($result->Agenda5);?></div>
                        <div style=font-size:20px;text-align:justify>6. <?php echo htmlentities($result->Agenda6);?></div>
                        <div style=font-size:20px;text-align:justify>7. <?php echo htmlentities($result->Agenda7);?></div>
							  
                    </div>
                </div>

                <div class="form-group row" style=margin-left:50px;margin-top:40px>
                    <div class="col-sm-9"> 
                        <div style=font-size:20px><strong>Prepared By</strong></div>
						<div style=font-size:20px><?php echo htmlentities($result->Prepared_By);?></div>
                        <div style=font-size:20px>Secretary</div>
                    </div>
                   
                
                  
               
                     
                <?php } ?>

            </div>

                <div class="form-group mb-2" style=text-align:center;margin-top:20px>
                    <button onclick="window.print()" class="btn btn-primary">Print</button>
                </div>

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