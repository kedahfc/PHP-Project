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
    $position=$_POST['position'];
    $official_name=$_POST['official_name'];
      
    $sql="INSERT INTO  senior_officials(Position,Official_Name) VALUES(:position,:official_name)";

      $query = $dbh->prepare($sql);
    $query->bindParam(':position',$position,PDO::PARAM_STR);
    $query->bindParam(':official_name',$official_name,PDO::PARAM_STR);
      $query->execute();
      $lastInsertId = $dbh->lastInsertId();
  
  if($lastInsertId)
  {
  $_SESSION['msg']="Senior Officials' information listed successfully";

  }
  else 
  {
  $_SESSION['error']="Something went wrong. Please try again";
  }
  
  }
    
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from senior_officials WHERE id=:id";
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
        <a href="teamofficials.php" class="btn btn-primary">Manage Team Officials</a>
        </div>


        <div class="row justify-content-center">
          <div class="col-12" style=margin-top:20px>
            <h2 class="page-title">Add Senior Officials</h2>

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
                    <strong class="card-title">Senior Officials Details</strong>
                </div>

                <div class="card-body">

                  <div class="form-group row" style=margin-left:20px>
                        <label class="col-sm-2 col-form-label">Position<span style="color:red;">*</span></label>
                            <div class="col-sm-8">
                            <input type="text" name="position"  placeholder="Position" class="form-control" required />
                            </div>
                    </div>

                    <div class="form-group row" style=margin-left:20px>
                        <label class="col-sm-2 col-form-label">Name<span style="color:red;">*</span></label>
                            <div class="col-sm-8">
                            <input type="text" name="official_name"  placeholder="Enter Name" class="form-control" required />
                            </div>
                    </div>

                    <div class="form-group mb-2" style=text-align:center>
                      <button type="submit" name="create" class="btn btn-primary" style=margin-top:20px>Add Position</button>
                    </div>

                  </div>
                </div>
              </div>
            </form>
          </div>
        </div> <!-- / .row justify-content-center-->

          <div class="col-12" style=margin-top:20px>
            <h2 class="mb-2 page-title">Manage Senior Officials</h2>
          </div>


          <!-- Small table -->
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                <!-- table -->

                <table class="table datatables" id="dataTable-1">
                  <thead>
                    <tr class=title-row>
                    <th>No.</th>
                          <th>Position</th>
                          <th>Name</th>
                          <th>Creation Date</th>
                          <th>Updation Date</th>
                          <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                        $sql = "SELECT * from  senior_officials";
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
                      <td style=text-align:left><?php echo htmlentities($result->Position);?></td>
                          <td style=text-align:left><?php echo htmlentities($result->Official_Name);?></td>
                          <td><?php echo htmlentities($result->Creation_Date);?></td>
                          <td><?php echo htmlentities($result->Updation_Date);?></td>
                      <td>
                        <a href="edit-seniorofficials.php?seniorid=<?php echo htmlentities($result->id);?>"><i class="fe fe-edit" style=color:#64dbb3></i>
                        <a href="seniorofficials.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');"><i class="fe fe-trash-2" style=color:#e4606d></i>
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