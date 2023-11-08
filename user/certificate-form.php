<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsuid']==0)) {
header('location:logout.php');
} else{
if(isset($_POST['submit']))
{


$uid=$_SESSION['obcsuid'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$fname=$_POST['fname'];
$pob=$_POST['pob'];
$mname=$_POST['nameofmother'];
$fathername=$_POST['nameoffather'];
$padd=$_POST['padd'];
$postaladd=$_POST['postaladd'];
$mobnumber=$_POST['mobnumber'];
$email=$_POST['email'];
$bc=$_POST['bc'];
$rgn=$_POST['rgn'];
$zn=$_POST['zone'];
$ntn=$_POST['ntn'];
$ntnf=$_POST['ntnf'];
$ntnm=$_POST['mother'];
$file=$_POST['file'];

$appnumber=mt_rand(100000000, 999999999);
$ret="select DateofBirth from tblapplication where DateofBirth=:dob and NameofFather=:fname";
$query= $dbh -> prepare($ret);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);

$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)

{


// $sql="insert into tblapplication(UserID,ApplicationID,DateofBirth,Gender,FullName,PlaceofBirth,NameOfMother,NameofFather,PermanentAdd,PostalAdd,MobileNumber,Email,birthcountry,Rigion,zone/Cityadmin,Nationality,NationalityFather,NationalityMother)values(:uid,:appnumber,:dob,:gender,:fname,:pob,:mname,:fathername,:padd,:postaladd,:mobnumber,:email,:bc,:rgn,:zn,:ntn,:ntnf,:ntnm)";
$sql="insert into tblapplication(UserID,ApplicationID,DateofBirth,Gender,FullName,PlaceofBirth,NameOfMother,NameofFather,PermanentAdd,PostalAdd,MobileNumber,Email,birthcountry,Rigion,Zone,Nationality,NationalityFather, MotherNationality, IdCardinpdf)value(:uid,:appnumber,:dob,:gender,:fname,:pob,:mname,:fathername,:padd,:postaladd,:mobnumber,:email, :bc, :rgn, :zone, :ntn, :ntnf, :mother, :file)";

$query=$dbh->prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':appnumber',$appnumber,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':pob',$pob,PDO::PARAM_STR);
$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':fathername',$fathername,PDO::PARAM_STR);
$query->bindParam(':padd',$padd,PDO::PARAM_STR);
$query->bindParam(':postaladd',$postaladd,PDO::PARAM_STR);
$query->bindParam(':mobnumber',$mobnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':bc',$bc,PDO::PARAM_STR);
$query->bindParam(':rgn',$rgn,PDO::PARAM_STR);
$query->bindParam(':zone',$zn,PDO::PARAM_STR);
$query->bindParam(':ntn',$ntn,PDO::PARAM_STR);
$query->bindParam(':ntnf',$ntnf,PDO::PARAM_STR);
$query->bindParam(':mother',$ntnm,PDO::PARAM_STR);
$query->bindParam(':file',$file,PDO::PARAM_STR);
$query->execute();

$LastInsertId=$dbh->lastInsertId();
if ($LastInsertId>0) {

echo '<script>alert("Birth Certificate applied succesfully")</script>';
echo "<script>window.location.href ='manage-forms.php'</script>";
}
else
{
echo '<script>alert("Something Went Wrong. Please try again")</script>';
}
}
else
{

echo "<script>alert('Date of Birth and Father Name is  already exist. Please try again');</script>";

}}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>

<title>Birth Certificate Form | Online Birth Certificate System</title>

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
<!-- modals CSS
============================================ -->
<link rel="stylesheet" href="css/modals.css">
<!-- normalize CSS
============================================ -->
<link rel="stylesheet" href="css/normalize.css">
<!-- forms CSS
============================================ -->
<link rel="stylesheet" href="css/form/all-type-forms.css">
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
<?php include_once('includes/sidebar.php');?>
<?php include_once('includes/header.php');?>
<!-- Breadcome start-->
<div class="breadcome-area mg-b-30 small-dn">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="breadcome-list shadow-reset">
<div class="row">

<div class="col-lg-12">
<ul class="breadcome-menu">
<li><a href="dashboard.php">Home</a> <span class="bread-slash">/</span>
</li>
<li><span class="bread-blod">Birth Registration Form</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Basic Form Start -->
<div class="basic-form-area mg-b-15">
<div class="container-fluid">

<div class="row">
<div class="col-lg-12">
<div class="sparkline12-list shadow-reset mg-t-30">
<div class="sparkline12-hd">
<div class="main-sparkline12-hd">
<h1>Application Form</h1>
<!-- <div class="sparkline12-outline-icon">
<span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
<span><i class="fa fa-wrench"></i></span>
<span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
</div> -->
</div>
</div>
<div class="sparkline12-graph">
<div class="basic-login-form-ad">
<div class="row">
<div class="col-lg-12">
<div class="all-form-element-inner">

<form method="post">
    
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Date of Birth</label>
            </div>
            <div class="col-lg-9">

            <input type="date" class="form-control" name="dob" value="" required="true" max="<?php echo date('Y-m-d'); ?>" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
                <label class="login2 pull-right pull-right-pro"><span class="basic-ds-n">Gender</span></label>
            </div>
            <div class="col-lg-9 col-md-3 col-sm-3 col-xs-3">
                <div class="bt-df-checkbox">
                    <p style="text-align: left;"> <input type="radio"  name="gender" id="gender" value="Female" checked="true">Female</p>

                <p style="text-align: left;"> <input type="radio" name="gender" id="gender" value="Male">Male</p>

            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Full Name</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="fname" onkeypress="return /[a-zA-Z ]/i.test(event.key)" required="true"/>
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Birth Country</label>
            </div>
            <div class="col-lg-9">

                <input type="text" class="form-control" name="bc" value=""  onkeypress="return /[a-zA-Z ]/i.test(event.key)" required="true" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
<div class="row">
<div class="col-lg-3">
<label class="login2 pull-right pull-right-pro">region</label>
</div>
<div class="col-lg-9">
<select class="form-control" name="rgn" required="true">
    <option value="">Select a region</option>
    <option value="tigray">Tigray</option>
    <option value="afar">Afar</option>
    <option value="amhara">Amhara</option>
    <option value="oromia">Oromia</option>
    <option value="snnp">Southern Nations, Nationalities, and Peoples</option>
    <option value="benihangul gumuz">Benishangul-Gumuz</option>
    <option value="somalia">Somalia</option>
    <option value="gambela">Gambela</option>
    <option value="harari">Harari</option>
    <option value="addis ababa">Addis Ababa</option>
    <option value="dire dawa">Dire Dawa</option>
    <option value="sidama">Sidama</option>
    <option value="southern nations, nationalities, and peoples">South West Ethiopia Peoples</option>
</select>
</div>
</div>
</div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Zone/CityAdmin</label>
            </div>
            <div class="col-lg-9">

                <input type="text" class="form-control" name="zone" value="" onkeypress="return /[a-zA-Z ]/i.test(event.key)" required="true" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Nationality</label>
            </div>
            <div class="col-lg-9">

                <input type="text" class="form-control" name="ntn" value="" onkeypress="return /[a-zA-Z]/i.test(event.key)" required="true" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Nationality Of Father</label>
            </div>
            <div class="col-lg-9">

                <input type="text" class="form-control" name="ntnf" value="" onkeypress="return /[a-zA-Z]/i.test(event.key)" required="true" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Nationality Of Mother</label>
            </div>
            <div class="col-lg-9">

                <input type="text" class="form-control" name="mother" value=""    onkeypress="return /[a-zA-Z ]/i.test(event.key)" required="true" />
            </div>
        </div>
    </div>

    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Place of Birth</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" onkeypress="return /[a-zA-Z]/i.test(event.key)" required="true" value="" name="pob" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Full Name of Mother</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" onkeypress="return /[a-zA-Z\s]/i.test(event.key)"  required="true" value="" name="nameofmother" />
            </div>
        </div>
    </div>




    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Full Name of Father</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" onkeypress="return /[a-zA-Z\s]/i.test(event.key)" required="true" value="" name="nameoffather" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Permanent Address</label>
            </div>
            <div class="col-lg-9">
                <textarea type="text" class="form-control" name="padd" value="" onkeypress="return /[a-zA-Z]/i.test(event.key)" required="true" ></textarea>
            </div>
        </div>
    </div>
        <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Postal Address</label>
            </div>
            <div class="col-lg-9">
                <textarea type="text" class="form-control" name="postaladd" value="" ></textarea>
            </div>
        </div>
    </div>
        <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Contact Number</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" required="true" value="" name="mobnumber" maxlength="10"  pattern="^\2519[0-9]{9}$" oninvalid="this.setCustomValidity('Please enter a valid phone number')" oninput="this.setCustomValidity('')" onkeypress="return isNumberKey(event)"  />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Email</label>
            </div>
            <div class="col-lg-9">
                <input type="email" class="form-control" required="true" name="email" value="" />
            </div>
        </div>
    </div>

    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3">
                <label class="login2 pull-right pull-right-pro">Id in pdf</label>
            </div>
            <div class="col-lg-9">
            
                <input type="file" class="form-control" name="file" value="" accept="application/pdf" required="true" />
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="login-btn-inner">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-9">
                    <div class="login-horizental cancel-wp pull-left">
                        
                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit">Add Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Basic Form End-->

</div>
</div>
<script>
function isNumberKey(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode;
if (charCode > 31 && (charCode < 48 || charCode > 57)) {
evt.preventDefault();
return false;
}
return true;
}
</script>
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
<!-- modal JS
============================================ -->
<script src="js/modal-active.js"></script>
<!-- icheck JS
============================================ -->
<script src="js/icheck/icheck.min.js"></script>
<script src="js/icheck/icheck-active.js"></script>
<!-- main JS
============================================ -->
<script src="js/main.js"></script>
</body>

</html><?php }  ?>