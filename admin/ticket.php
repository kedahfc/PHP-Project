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
    $match_name=$_POST['match_name'];
    $match_team1=$_POST['match_team1'];
    $match_team2=$_POST['match_team2'];
    $match_date=$_POST['match_date'];
    $match_time=$_POST['match_time'];
    $ticket_price=$_POST['ticket_price'];
    $member_price=$_POST['member_price'];
    $ticket_availability=$_POST['ticket_availability'];
    $ticket_description=$_POST['ticket_description'];
    
    $sql="INSERT INTO  ticket(Match_Name,Match_Team1,Match_Team2,Match_Date,Match_Time,Ticket_Price,Member_Price,Ticket_Availability,Ticket_Description) VALUES(:match_name,:match_team1,:match_team2,:match_date,:match_time,:ticket_price,:member_price,:ticket_availability,:ticket_description)";
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':match_name',$match_name,PDO::PARAM_STR);
    $query->bindParam(':match_team1',$match_team1,PDO::PARAM_STR);
    $query->bindParam(':match_team2',$match_team2,PDO::PARAM_STR);
    $query->bindParam(':match_date',$match_date,PDO::PARAM_STR);
    $query->bindParam(':match_time',$match_time,PDO::PARAM_STR);
    $query->bindParam(':ticket_price',$ticket_price,PDO::PARAM_STR);
    $query->bindParam(':member_price',$member_price,PDO::PARAM_STR);
    $query->bindParam(':ticket_availability',$ticket_availability,PDO::PARAM_STR);
    $query->bindParam(':ticket_description',$ticket_description,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
$_SESSION['msg']="Ticket Listed successfully";
header('location:ticket.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:ticket.php');
}

}
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from ticket WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$_SESSION['delmsg']="InformationDeleted";
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
                <a href="matches.php" class="btn btn-primary">Back to Match</a>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Add Ticket</h2>

                            
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
                                    <strong class="card-title">Ticket Details</strong>
                                </div>

                                <div class="card-body">


                                    <div class="form-group row">
                                        <label class="col-sm-1.5 col-form-label">Match Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="match_name"  placeholder="Match Name" class="form-control"/>
                                            </div>
  
                                        <label class="col-sm-1.5 col-form-label" style=margin-left:90px>Match Teams</label>
                                            <div class="col-sm-2" style=margin-left:15px>
                                                <input type="text" name="match_team1"  placeholder="Team Home" class="form-control"/>
                                            </div>
                                            <label style="margin-top:10px;margin-left:-8px">VS</label>
                                            <div class="col-sm-2" style=margin-left:-8px>
                                                <input type="text" name="match_team2"  placeholder="Team Away" class="form-control"/>
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-sm-1.8 col-form-label">Match Date</label>
                                            <div class="col-sm-4" style=margin-left:5px>
                                                <input type="date" name="match_date"  placeholder="Match Date" class="form-control"  />
                                            </div>

                                        <label class="col-sm-1.8 col-form-label" style=margin-left:90px>Match Time</label>
                                            <div class="col-sm-3" style=margin-left:25px>
                                                <input type="time" name="match_time"  placeholder="Match Time" class="form-control"  />
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-1.8 col-form-label" style=margin-right:10px>Price (RM)</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="ticket_price"  placeholder="Enter Ticket Price" class="form-control" />
                                            </div>


                                        <label class="col-sm-1.8 col-form-label" style=margin-left:90px>Member Price</label>
                                            <div class="col-sm-4" style=margin-left:12px>
                                                <input type="text" name="member_price"  placeholder="Enter Member Price" class="form-control" />
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                            <label class="col-sm-1.8 col-form-label">Availablility</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="ticket_availability"  placeholder="Enter Number of Tickets Available" class="form-control" />
                                            </div>                                       
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-1.8 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="textarea" name="ticket_description"  placeholder="Enter Description" class="form-control"></textarea>
                                            </div>
                                    </div>

                                     <div class="form-group mb-2" style=text-align:center>
                                        <button type="submit" name="create" class="btn btn-primary">Create</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div> <!-- / .row justify-content-center-->


                <div class="col-12">
                    <h2 class="mb-2 page-title">Manage Ticket</h2>
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
                          <th>Match Name</th>
                          <th>Team Home</th>
                          <th>Versus</th>
                          <th>Team Away</th>
                          <th>Match Date</th>
                          <th>Match Time</th>
                          <th>Price</th>
                          <th>Member Price</th>
                          <th>Availability</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php 
                            $sql = "SELECT * from  ticket";
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
                          <td style=text-align:left><?php echo htmlentities($result->Match_Name);?></td>
                          <td><?php echo htmlentities($result->Match_Team1);?></td>
                          <td>VS</td>
                          <td><?php echo htmlentities($result->Match_Team2);?></td>
						              <td><?php echo htmlentities($result->Match_Date);?></td>
                          <td><?php echo htmlentities($result->Match_Time);?></td>
                          <td>RM <?php echo htmlentities($result->Ticket_Price);?></td>
                          <td>RM <?php echo htmlentities($result->Member_Price);?></td>
                          <td><?php echo htmlentities($result->Ticket_Availability);?></td>
                          <td style=text-align:left><?php echo htmlentities($result->Ticket_Description);?></td>
                          <td>
                            <a href="edit-ticket.php?ticketid=<?php echo htmlentities($result->id);?>"><i class="fe fe-edit" style=color:#64dbb3></i>
                            <a href="ticket.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');"><i class="fe fe-trash-2" style=color:#e4606d></i>
                          </td>
                        </tr>

                        <?php $cnt=$cnt+1;}} ?>  

                      </tbody>
                    </table>
                  </div>
                </div>
              </div> <!-- simple table -->
            </div> <!-- end section -->




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