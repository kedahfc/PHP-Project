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
$newsid=intval($_GET['newsid']);
$news_title=$_POST['news_title'];
$news_author=$_POST['news_author'];
$news_company=$_POST['news_company'];
$news_date=$_POST['news_date'];
$news_description1=$_POST['news_description1'];
$news_description2=$_POST['news_description2'];
$news_description3=$_POST['news_description3'];
$nimage1=$_FILES["news_image1"]["name"];
$nimage2=$_FILES["news_image2"]["name"];
$nimage3=$_FILES["news_image3"]["name"];
$nimage4=$_FILES["news_image4"]["name"];

$sql="update  news set News_Title=:news_title, News_Author=:news_author, News_Company=:news_company, News_Date=:news_date, News_Description1=:news_description1, News_Description2=:news_description2, News_Description3=:news_description3 where id=:newsid";

$query = $dbh->prepare($sql);
$query->bindParam(':news_description3',$news_description3,PDO::PARAM_STR);
$query->bindParam(':news_description2',$news_description2,PDO::PARAM_STR);
$query->bindParam(':news_description1',$news_description1,PDO::PARAM_STR);
$query->bindParam(':news_date',$news_date,PDO::PARAM_STR);
$query->bindParam(':news_company',$news_company,PDO::PARAM_STR);
$query->bindParam(':news_author',$news_author,PDO::PARAM_STR);
$query->bindParam(':news_title',$news_title,PDO::PARAM_STR);
$query->bindParam(':newsid',$newsid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
$_SESSION['msg']="News Listed successfully";
header('location:manage-news.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-news.php');
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

<!-- MENU SECTION END-->
<main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Edit News</h2>

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




                        <form class="form-horizontal" name="news" method="post" enctype="multipart/form-data">

                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">News Details</strong>
                                </div>

                                <div class="card-body">

                                <?php 
                                    $newsid=intval($_GET['newsid']);
                                    $sql = "SELECT * from  news where id=:newsid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':newsid',$newsid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {               ?>   


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">News Title<span style="color:red;">*</span></label>      
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="news_title"  value="<?php echo htmlentities($result->News_Title);?>" required /> 
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Author<span style="color:red;">*</span></label>      
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="news_author"  value="<?php echo htmlentities($result->News_Author);?>" required /> 
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Company</label>      
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="news_company"  value="<?php echo htmlentities($result->News_Company);?>" required /> 
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Published Date</label>      
                                    <div class="col-sm-8">
                                        <input class="form-control" type="date" name="news_date"  value="<?php echo htmlentities($result->News_Date);?>" required /> 
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description 1</label>      
                                    <div class="col-sm-8">
                                    <textarea class="form-control" type="textarea" name="news_description1"  rows="5" required ><?php echo htmlentities($result->News_Description1);?></textarea>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description 2</label>      
                                    <div class="col-sm-8">
                                    <textarea class="form-control" type="textarea" name="news_description2"  rows="5" required ><?php echo htmlentities($result->News_Description2);?></textarea>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description 3</label>      
                                    <div class="col-sm-8">
                                    <textarea class="form-control" type="textarea" name="news_description3"  rows="5" ><?php echo htmlentities($result->News_Description3);?></textarea>
                                    </div>
                                </div> 

                                <div class="form-group row" >
                                        <label for="focusedinput" class="col-sm-2 col-form-label" style=margin-right:85px>News Image 1</label>
                                        <div class="col-sm-4" style=margin-left:-90px>
                                        <img src="news-images/<?php echo htmlentities($result->News_Image1);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image-news1.php?imgid=<?php echo htmlentities($result->id);?>">Change Image</a>
                                        </div>
 

                                    <label for="focusedinput" class="col-sm-2 col-form-label">News Image 3</label>
                                        <div class="col-sm-4" style=margin-left:-90px>
                                        <img src="news-images/<?php echo htmlentities($result->News_Image3);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image-news3.php?imgid=<?php echo htmlentities($result->id);?>">Change Image</a>
                                        </div>
                                    </div>

                                    <div class="form-group row" >
                                    <label for="focusedinput" class="col-sm-2 col-form-label"   style=margin-right:85px>News Image 2</label>
                                        <div class="col-sm-4" style=margin-left:-90px>
                                        <img src="news-images/<?php echo htmlentities($result->News_Image2);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image-news2.php?imgid=<?php echo htmlentities($result->id);?>">Change Image</a>
                                        </div>
      
                                        <label for="focusedinput" class="col-sm-2 col-form-label">News Image 4</label>
                                        <div class="col-sm-4" style=margin-left:-90px>
                                        <img src="news-images/<?php echo htmlentities($result->News_Image4);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image-news4.php?imgid=<?php echo htmlentities($result->id);?>">Change Image</a>
                                        </div>
                                    </div>

                                    <?php }} ?>
                                    
                                <div class="form-group mb-2" style=text-align:center>
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
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