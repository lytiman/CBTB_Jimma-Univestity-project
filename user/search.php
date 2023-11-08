<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');



  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Search | Online Birth Certificate System</title>
  
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">
  
    <div class="wrapper-pro">
      <?php //include_once('includes/sidebar.php');?>
        <?php //include_once('includes/header.php');?>
       
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="../index.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Verify Certificate </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->

            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Search <span class="table-project-n"></span> Verify Certificate </h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        
                                         <form method="post">
                                                     
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                    <label class="login2 pull-right pull-right-pro">Registered Mobile No</label></div>
<div class="col-lg-7">
<input id="regmob" type="text" name="regmob" required="true" class="form-control" placeholder="Registered Mobile Number">
</div>
</div>
</div>
       

                                                <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                    <label class="login2 pull-right pull-right-pro">Certificate No</label></div>
<div class="col-lg-7">
<input id="certificateno" type="text" name="certificateno" required="true" class="form-control" placeholder="Certificate Number">
</div>
</div>
</div>


                                                     
                                                  
<div class="form-group-inner">
<div class="login-btn-inner">
  <div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-9">
<div class="login-horizental cancel-wp pull-left">
                                                                            
 <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="search">Verify</button>
</div>
</div>
</div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                          <?php
if(isset($_POST['search']))
{ 

$regmob=$_POST['regmob'];
$certificateno=$_POST['certificateno'];
  ?>
  <h4 align="center">Result against Reg Mobile no. <?php echo $regmob;?> and Certificate no. <?php echo $certificateno;?>  </h4>
                                                                        <h3 align="center">Certificate of Birth</h3>
                                        <hr />
                                        <p align="left">This is to certify that the following information has been taken from the original record of Birth.</p>
                                       
<?php
$vid=$_GET['viewid'];
$sql="SELECT tblapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblapplication join  tbluser on tblapplication.UserID=tbluser.ID where tbluser.MobileNumber=:regmob and  tblapplication.ApplicationID=:certificateno";
$query = $dbh -> prepare($sql);
$query-> bindParam(':regmob', $regmob, PDO::PARAM_STR);
$query-> bindParam(':certificateno', $certificateno, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{   
$certgendate=$row->UpdationDate;            ?>
<table border="1" class="table table-bordered">


<tr align="center">
<td colspan="4" >
<strong> Application Number:</strong>   <?php  echo $row->ApplicationID;?></td></tr>


    <th scope>Full Name</th>
    <td><?php  echo $row->FullName;?></td>
    <th scope>Gender</th>
    <td><?php  echo $row->Gender;?></td>
  </tr>
   <tr>
    <th scope>Date of Birth</th>
    <td><?php  echo $row->DateofBirth;?></td>
    <th scope>Place of Birth</th>
    <td><?php  echo $row->PlaceofBirth;?></td>
  </tr>
  <tr>
     <th scope>Name of Mother</th>
    <td><?php  echo $row->NameOfMother;?></td>
    <th scope>Name of Father</th>
    <td><?php  echo $row->NameofFather;?></td>
  
  </tr>
   <tr>
    <th scope>Permanent Address</th>
  <td><?php  echo $row->PermanentAdd;?></td>
    <th scope>Postal Address</th>
    <td><?php  echo $row->PostalAdd;?></td>

  </tr>
   <tr>
        <th scope>Mobile Number</th>
    <td><?php  echo $row->MobileNumber;?></td>
    <th scope>Email</th>
    <td><?php  echo $row->Email;?></td>

  </tr>
   <tr>

    <th scope>Date of apply</th>
    <td><?php  echo $row->Dateofapply;?></td>
  </tr>
 
  <?php }?>
</table>
          
          <p align="left"><b>Certificate Genration Date :</b> <?php echo htmlentities($certgendate);?></p>
   <a href="download-certificate.php?cid=<?php  echo $row->ApplicationID;?>" class="btn btn-danger">Download Certificate</a>                        
      </div></div>
  <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
        </div>
    </div>
  <?php include_once('includes/footer.php');?>
   
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>


</body>


