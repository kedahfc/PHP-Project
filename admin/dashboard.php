<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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

  <body class="vertical light">
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
              <!-- <h2>Section title</h2> -->
              <h1>Dashboard</h1>
              <div class="row">
              </div> <!-- end section -->

              <!-- info small box -->
              <div class="row">

              <?php $sql = "SELECT id from user";
              $query = $dbh -> prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=$query->rowCount();
                        ?>		



              <div class="col-md-4 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                          <a href=reg-users.php class="h2 mb-0"><?php echo htmlentities($cnt);?></a>
                          <div class="small text-muted mb-0">Registered</div><div>Users</div>
                        </div>

                        <?php $sql = "SELECT id from member";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=$query->rowCount();
                        ?>	

                        <div class="col">
                          <a href=reg-members.php class="h2 mb-0"><?php echo htmlentities($cnt);?></a>
                          <div class="small text-muted mb-0">Registered</div><div>Members</div>
                        </div>
                        <div class="col-auto">
                          <span class="fe fe-32 fe-users text-muted mb-0"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <?php $sql = "SELECT * from ticket_sold";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=$query->rowCount();
                ?>
                <div class="col-md-4 mb-4" style=margin-top:20px>
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                      <div class="col">
                          <a href=ticket-sold.php class="h2 mb-0" style=font-size:20px><?php echo htmlentities($cnt);?>
                          Ticket Sold
                          </a>
                         
                        </div>
                        <div class="col-auto">
                          <span class="fe fe-32 fe-life-buoy text-muted mb-0"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <?php $sql = "SELECT id from membership_fees";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=$query->rowCount();
                ?>

                <div class="col-md-4 mb-4" style=margin-top:20px>
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                        <a href=membership-fees.php class="h2 mb-0" style=font-size:20px><?php echo htmlentities($cnt);?> Collected Fees</a>
                        </div>

                        <div class="col-auto">
                          <span class="fe fe-32 fe-slack text-muted mb-0"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- end section -->

              <?php $sql = "SELECT id from income";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=$query->rowCount();
                ?>

              <!-- widgets -->
              <div class="row">
              <div class="col-md-4 mb-4" style=margin-top:20px>
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        
                      <div class="col">
                        <a href=income.php class="h2 mb-0" style=font-size:20px><?php echo htmlentities($cnt);?> Other Income Received</a>
                        </div>

                        <div class="col-auto">
                          <span class="fe fe-32 fe-dollar-sign text-muted mb-0"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <?php $sql = "SELECT id from expense";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=$query->rowCount();
                ?>

              <!-- widgets -->
              <div class="col-md-4 mb-4" style=margin-top:20px>
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                        <a href=expense.php class="h2 mb-0" style=font-size:20px><?php echo htmlentities($cnt);?> Types of Expenses</a>
                        </div>

                        <div class="col-auto">
                          <span class="fe fe-32 fe-dollar-sign text-muted mb-0"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <?php $sql = " ";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=$query->rowCount();
                ?>

              <!-- widgets -->
              <div class="col-md-4 mb-4" style=margin-top:20px>
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                        <a class="h2 mb-0" style=font-size:20px>24 Types of Income Received</a>
                        </div>

                        <div class="col-auto">
                          <span class="fe fe-32 fe-dollar-sign text-muted mb-0"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div> <!-- end section -->
              
              <?php $sql = "SELECT id from player";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=$query->rowCount();
                ?>

              <div class="row">
                <div class="col-md-4 mb-4">
                  <div class="card shadow">
                    <div class="card-header">
                      <span class="card-title">Team</span>
                    </div>
                    <div class="card-body my-n2">
                      <div class="d-flex">
                        <div class="flex-fill">
                          <h4 href=manage-players.php class="mb-0"><?php echo htmlentities($cnt);?> Players</h4>
                        </div>

                        <?php $sql = "SELECT * from results";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=$query->rowCount();
                        ?>
                        <div class="col-auto">
                          <span class="fe fe-32 fe-command text-muted mb-0"></span>
                        </div>
                        <div class="flex-fill text-right">
                        <h4 href=matches.php class="mb-0"><?php echo htmlentities($cnt);?> Matches</h4>
                        
                          <p class="text-muted mb-0 small">in 2020</p>
                        </div>
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->

                <?php $sql = "SELECT * from news";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=$query->rowCount();
                        ?>

                <div class="col-md-4 mb-4">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <span class="card-title">News</span>
                      <a class="float-right small text-muted" href="#!"><span>+1.8%</span></a>
                    </div>
                    <div class="card-body my-n1">
                      <div class="d-flex">
                      <div class="col-auto">
                          <span class="fe fe-32 fe-book-open text-muted mb-0"></span>
                        </div>
                        <div class="flex-fill">
                          <h4 class="mb-0" href=manage-news.php><span><?php echo htmlentities($cnt);?> Lastest News</h4>
                         
                        </div>
                        
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->

                <?php $sql = "SELECT * from standings";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=$query->rowCount();
                        ?>

                <div class="col-md-4 mb-4">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <span class="card-title">Standings</span>
                      
                    </div>
                    <div class="card-body my-n2">
                      <div class="d-flex">
                        <div class="flex-fill">
                          <h4 class="mb-0" ><?php echo htmlentities($cnt);?> Standings</h4></div>
                        
                          <div class="col-auto">
                          <span class="fe fe-32 fe-award text-muted mb-0"></span>
                        </div>
                        <div class="flex-fill text-right">
                        <h4 class="mb-0" ><?php echo htmlentities($cnt);?> Honours</h4></div>

                        </div>
                        </div>
             
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->

                <?php $sql = "SELECT * from senior_officials";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=$query->rowCount();
                        ?>

              <div class="row">
                <div class="col-md-4 mb-4">
                  <div class="card shadow">
                    <div class="card-header">
                      <span class="card-title">Club Structure</span>
                    </div>
                    <div class="card-body my-n2">
                      <div class="d-flex">
                        <div class="flex-fill"  style=text-align:center  >
                          <h4 href=seniorofficials.php><?php echo htmlentities($cnt);?> </h4>Seniors Officials
                        </div>

                        <?php $sql = "SELECT * from team_officials";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=$query->rowCount();
                        ?>
                        <div class="col-auto">
                          <span class="fe fe-32 fe-framer text-muted mb-0"></span>
                        </div>
                        <div class="flex-fill" style=text-align:center >
                          <h4><?php echo htmlentities($cnt);?> </h4>Teams Officials
                        </div>
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->

        

                <?php $sql = "SELECT * from fixtures";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=$query->rowCount();
                        ?>

                <div class="col-md-4 mb-4">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <span class="card-title">Fixtures</span>
                      
                    </div>
                    <div class="card-body my-n2">
                      <div class="d-flex">
                      <div class="flex-fill" style=text-align:center >
                          <h4><?php echo htmlentities($cnt);?> </h4>Matches
                        </div>
                        <div class="flex-fill">
                          <span class="badge badge-pill badge-warning">COVID-19</span>
                        </div>
                        <div class="col-auto">
                          <span class="fe fe-32 fe-globe text-muted mb-0"></span>
                        </div>
                        </div>
                        </div>
             
                      </div>
                    </div> <!-- .card-body -->
                 
          
                <?php $sql = "SELECT * from product";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=$query->rowCount();
                        ?>

                <div class="col-md-4 mb-4">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <span class="card-title">Products</span>
                      
                    </div>
                    <div class="card-body my-n2">
                      <div class="d-flex">
                      <div class="flex-fill" style=text-align:center >
                          <h4><?php echo htmlentities($cnt);?> </h4>Latest Products
                        </div>
                       
                        <div class="col-auto">
                          <span class="fe fe-32 fe-shopping-bag text-muted mb-0"></span>
                        </div>
                        </div>
                        </div>
             
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->






              </div> <!-- .row -->
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
    <script src="js/d3.min.js"></script>
    <script src="js/topojson.min.js"></script>
    <script src="js/datamaps.all.min.js"></script>
    <script src="js/datamaps-zoomto.js"></script>
    <script src="js/datamaps.custom.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/apexcharts.custom.js"></script>
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
    
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>

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