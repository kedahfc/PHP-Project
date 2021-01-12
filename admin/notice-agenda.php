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
    
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
  
  if($lastInsertId)
  {
  $_SESSION['msg']="Notice & Agenda's information listed successfully";

  }
  else 
  {
  $_SESSION['error']="Something went wrong. Please try again";
  }
  
  }
    
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from notice WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$_SESSION['delmsg']="Information Deleted";
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
    
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">

    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />


    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
    
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme">

</head>

<body class="vertical  dark">
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

        <div class="form-group mb-2">
          <a href="minutes-meeting.php" class="btn btn-primary">Minutes of Meeting</a>
        </div>


        <div class="row justify-content-center">
          <div class="col-12" style=margin-top:20px>
            <h2 class="page-title">Add Notice & Agenda</h2>

            <?php if($_SESSION['error']!="")
            {?>
              <div class="col-md-6">
                <div class="alert alert-danger" >
                  <strong>Error :</strong> 
                  <?php echo htmlentities($_SESSION['error']);?>
                  <?php echo htmlentities($_SESSION['error']="");?>
                </div>
              </div>
            <?php } ?>

            <?php if($_SESSION['msg']!="")
            {?>
              <div class="col-md-6">
                <div class="alert alert-success" >
                  <strong style=color:#001a4e>Success :</strong> 
                  <?php echo htmlentities($_SESSION['msg']);?>
                  <?php echo htmlentities($_SESSION['msg']="");?>
                </div>
              </div>
            <?php } ?>

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

            <?php if($_SESSION['delmsg']!="")
            {?>
              <div class="col-md-6">
                <div class="alert alert-success" >
                  <strong style=color:#001a4e>Success :</strong> 
                  <?php echo htmlentities($_SESSION['delmsg']);?>
                  <?php echo htmlentities($_SESSION['delmsg']="");?>
                </div>
              </div>
            <?php } ?>

            <form role="form" method="post">

              <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Notice & Agenda Details</strong>
                </div>

                <div class="card-body">


                      <div class="form-group row" style=margin-left:20px>
                        <label class="col-sm-1.5 col-form-label">Title<span style="color:red;">*</span></label>
                            <div class="col-sm-9"  style=margin-left:85px>
                                <input type="text" name="title"  placeholder="Enter the Title of Meeting" class="form-control" required />
                            </div>
                      </div>
                    
                        <div class="form-group row" style=margin-left:20px>
                          <label class="col-sm-1.5 col-form-label">Meeting Date<span style="color:red;">*</span></label>
                            <div class="col-sm-2" style=margin-left:30px>
                              <input type="date" name="meeting_date"  placeholder="date" class="form-control" required />
                            </div>

                            <label class="col-sm-1.5 col-form-label" style="margin-right:17px">Day<span style="color:red;">*</span></label>
                                  <div class="col-sm-2">
                                    <select  style="margin-left:5px" name="meeting_day" class="form-control" required>
                                        <option value="">Select Day</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                    </select>
                                 </div>

                            <label class="col-sm-1.5 col-form-label" style="margin-right:17px">Date Notice<span style="color:red;">*</span></label>
                            <div class="col-sm-2" style=margin-left:18px>
                              <input type="date" name="date_notice"  placeholder="date" class="form-control" required />
                            </div>
                        </div>
   
                        <div class="form-group row" style=margin-left:20px>
                          <label class="col-sm-1.5 col-form-label">Meeting Time<span style="color:red;">*</span></label>
                            <div class="col-sm-2" style=margin-left:30px>
                                <input type="time" name="meeting_time"  placeholder="Time" class="form-control" required />
                            </div>

                            <label class="col-sm-1.5 col-form-label" style="margin-right:25px">Meeting Venue<span style="color:red;">*</span></label>
                              <div class="col-sm-5">
                            <input type="text" name="meeting_venue"  placeholder="Enter the Venue of Meeting" class="form-control" required />
                          </div>
                        </div>

                      <div class="form-group row" style=margin-left:20px>
                          <label class="col-sm-1.5 col-form-label">Position<span style="color:red;">*</span></label>
                          <div class="col-sm-9" style=margin-left:65px>
                            <textarea type="text" name="position"  placeholder="Enter the Positions and Names" class="form-control" required ></textarea>
                          </div>
                      </div>

                    <div class="form-group row" style=margin-left:20px>
                        <label class="col-sm-1.5 col-form-label">Notice Description<span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" name="notice_description"  placeholder="Enter the Notice Information" class="form-control" required ></textarea>
                            </div>
                    </div>

                    <div class="form-group row" style=margin-left:20px>
                    <label class="col-sm-1.5 col-form-label">Agenda 1<span style="color:red;">*</span></label>
                          <div class="col-sm-9" style=margin-left:60px>
						  <input type="text" name="agenda1"  placeholder="Agenda 1" class="form-control" required />
                            
                          </div>
                          </div>
						  
						 <div class="form-group row" style=margin-left:20px>
                    <label class="col-sm-1.5 col-form-label">Agenda 2<span style="color:red;">*</span></label>
                          <div class="col-sm-9" style=margin-left:60px>
						  <input type="text" name="agenda2"  placeholder="Agenda 2" class="form-control" required />
                            
                          </div>
                          </div>
						  
						  <div class="form-group row" style=margin-left:20px>
                    <label class="col-sm-1.5 col-form-label">Agenda 3<span style="color:red;">*</span></label>
                          <div class="col-sm-9" style=margin-left:60px>
						  <input type="text" name="agenda3"  placeholder="Agenda 3" class="form-control" required />
                            
                          </div>
                          </div>
						  
						  <div class="form-group row" style=margin-left:20px>
                    <label class="col-sm-1.5 col-form-label">Agenda 4<span style="color:red;">*</span></label>
                          <div class="col-sm-9" style=margin-left:60px>
						  <input type="text" name="agenda4"  placeholder="Agenda 4" class="form-control" required />
                            
                          </div>
                          </div>
						  
						  
					<div class="form-group row" style=margin-left:20px>
                    <label class="col-sm-1.5 col-form-label">Agenda 5<span style="color:red;">*</span></label>
                          <div class="col-sm-9" style=margin-left:60px>
						  <input type="text" name="agenda5"  placeholder="Agenda 5" class="form-control" required />
                            
                          </div>
                          </div>
						  
						  <div class="form-group row" style=margin-left:20px>
                    <label class="col-sm-1.5 col-form-label">Agenda 6</label>
                          <div class="col-sm-9" style=margin-left:65px>
						  <input type="text" name="agenda6"  placeholder="Agenda 6" class="form-control" required />
                            
                          </div>
                          </div>
						  
						  <div class="form-group row" style=margin-left:20px>
                    <label class="col-sm-1.5 col-form-label">Agenda 7</label>
                          <div class="col-sm-9" style=margin-left:65px>
						  <input type="text" name="agenda7"  placeholder="Agenda 7" class="form-control" required />
                            
                          </div>
                          </div>
						  
					
                    <div class="form-group row" style=margin-left:20px>
                          <label class="col-sm-1.5 col-form-label">Prepared By<span style="color:red;">*</span></label>
                            <div class="col-sm-9" style=margin-left:40px>
                                <input type="text" name="prepared_by"  placeholder="Enter Name" class="form-control" required >
                            </div>
                      </div>


                    <div class="form-group mb-2" style=text-align:center>
                      <button type="submit" name="create" class="btn btn-primary">Create</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div> <!-- / .row justify-content-center-->

          <div class="col-12"  style=margin-top:20px>
            <h2 class="mb-2 page-title">Manage Notice & Agenda</h2>
          </div>


          <!-- Small table -->
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                <!-- table -->

                <table class="table datatables" id="dataTable-1">
                  <thead>
                    <tr class=title-row>
					            <th>No</th>
                      <th>Date Notice</th>
                      <th>Title</th>
                      <th>Meeting Date</th>
                      <th>Meeting Day</th>
                      <th>Meeting Time</th>
                      <th>Meeting Venue</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                        $sql = "SELECT * from  notice";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {               
                        ?>   

                    <tr class="odd gradeX">
                      <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($result->Date_Notice);?></td>
                        <td style=text-align:left><?php echo htmlentities($result->Title);?></td>
                        <td><?php echo htmlentities($result->Meeting_Date);?></td>
                        <td><?php echo htmlentities($result->Meeting_Day);?></td>
                        <td><?php echo htmlentities($result->Meeting_Time);?></td>
                        <td><?php echo htmlentities($result->Meeting_Venue);?></td>
                      <td>
                       <a href="view-notice-agenda.php?noticeid=<?php echo htmlentities($result->id);?>"><i class="fe fe-eye" style=color:#4e8aff></i>
                        <a href="edit-notice-agenda.php?noticeid=<?php echo htmlentities($result->id);?>"><i class="fe fe-edit" style=color:#64dbb3></i>
                        <a href="notice-agenda.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');"><i class="fe fe-trash-2" style=color:#e4606d></i>
                      </td>
                    </tr>

                    <?php $cnt=$cnt+1;}} ?> 

                  </tbody>
                </table>
              </div>
            </div>
          </div> <!-- simple table -->
        </div> <!-- row justify -->

      </div> <!-- .container-fluid -->
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
    <script src='js/jquery.dataTables.min.js'></script>
    <script src='js/dataTables.bootstrap4.min.js'></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
    <script src='js/textarea.min.js'></script>

    <script>
      $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [16, 32, 64, -1],
          [16, 32, 64, "All"]
        ]
      });
    </script>

    <script src="js/apps.js"></script>

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
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