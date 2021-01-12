<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$imgid=intval($_GET['imgid']);
if(isset($_POST['submit']))
{

$pimage3=$_FILES["image_3"]["name"];
move_uploaded_file($_FILES["image_3"]["tmp_name"],"product-images/".$_FILES["image_3"]["name"]);
$sql="update product set Image_3=:pimage3 where id=:imgid";
$query = $dbh->prepare($sql);

$query->bindParam(':imgid',$imgid,PDO::PARAM_STR);
$query->bindParam(':pimage3',$pimage3,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Change image successfully";
header('location:manage-product.php');



}

	?>
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
						<h2 class="page-title">Change Image</h2>


            <?php if($error)
              {?>
                <div class="col-md-6">
                  <div class="alert alert-danger" >
                    <strong>ERROR</strong>:
                    <?php echo htmlentities($error); ?> 
                  </div>
                </div>
              <?php } 

              else if($msg)
                {?>
                  <div class="col-md-6">
                    <div class="alert alert-success" >
                        <strong style=color:#001a4e>Success :</strong> 
                      <?php echo htmlentities($msg); ?> 
                    </div>
                  </div>
                <?php }?>



						<div class="card shadow mb-4">
								<div class="card-header">
									<strong class="card-title">Image Details</strong>
								</div>

								<div class="card-body">	


						
  	         
                <form class="form-horizontal" name="product" method="post" enctype="multipart/form-data">
						
								<?php 
								$imgid=intval($_GET['imgid']);
								$sql = "SELECT Image_3 from product where id=:imgid";
								$query = $dbh -> prepare($sql);
								$query -> bindParam(':imgid', $imgid, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{	?>	
								<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Image 3</label>
								<div class="col-sm-8">
								<img src="product-images/<?php echo htmlentities($result->Image_3);?>" width="200">
								</div>
								</div>



								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">New Image</label>
									<div class="col-sm-8">
										<input type="file" name="image_3" id="image_3" required>
									</div>
								</div>	
								<?php }} ?>

								<div class="row">
									<div class="col-sm-8 col-sm-offset-2" style=margin-left:70px>
										<button type="submit" name="submit" class="btn-primary btn">Update</button>
									</div>
								</div>
							</form>
						</div>
					</div>	

				</div>
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