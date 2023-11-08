<?php
namespace Dompdf;
 use Dompdf\Dompdf;

require_once '../admin/dompdf/autoload.inc.php';
ob_start();
$con=mysqli_connect("127.0.0.1:3308", "root", "", "birthdatabase");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset =  "UTF-8">
	<title>Birth Certificate</title>
<style>
table, th, td {
  border: 1px solid;
}
</style>
</head>
<body>
<div  align="center" class = "logo">
<img src="img/flag.jpg" height=50 width = 100 >
<h3 lang="am">በኢትዮጵያ ፌደራላዊ ዴሞክራሲያዊ ሪፐብሊክ የውሳኝ ኩነት ምዝገባ</h3>
    <h3 >Federal Democratic Republic of Ethiopia Vital Registration</h3>
    <h4  lang="am">የልደት ምስክር ወረቀት</h4>
    <h4 align="center">Birth Certificate</h4>
</div>
	<?php 

$cid=intval($_GET['cid']);
	$ret=mysqli_query($con,"SELECT tblapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblapplication join  tbluser on tblapplication.UserID=tbluser.ID where tblapplication.ApplicationID='$cid'");

while ($row=mysqli_fetch_array($ret)) { ?>
<h3>Application / Certificate Number: <?php  echo $row['ApplicationID'];?></h3>
<table  align="center" width="100%">

<tr>
    <th width="150">Full Name</th>
    <td width="250"><?php  echo $row['FullName'];?></td>
    <th width="150">Gender</th>
    <td><?php  echo $row['Gender'];?></td>
  </tr>
   <tr>
    <th scope>Date of Birth</th>
    <td><?php  echo $row['DateofBirth'];?></td>
    <th scope>Place of Birth</th>
    <td><?php  echo $row['PlaceofBirth'];?></td>
  </tr>
</table>

  <table  align="center" border="1" width="100%" style="margin-top:3%;">
  <tr>
    <th width="150">Name of Mother</th>
    <td width="250"><?php  echo $row['NameOfMother'];?></td>
       <th width="150">Name of Father</th>
    <td><?php  echo $row['NameofFather'];?></td>

  </tr>
   <tr>
<th scope>Permanent Address of Parents</th>
    <td><?php  echo $row['PermanentAdd'];?></td>
    <th scope>Postal Address Permanent Address of Parents</th>
    <td><?php  echo $row['PostalAdd'];?></td>

  </tr>
   <tr>
        <th scope>Parents Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
    <th scope>Parents Email</th>
    <td><?php  echo $row['Email'];?></td>

  </tr>


</table>

<table  align="center" border="1" width="100%" style="margin-top:3%;">
<tr>
	    <th width="150">Certificate Number</th>
    <td><?php  echo $row['ApplicationID'];?></td>
    <th >Apply Date</th>
    <td><?php  echo $row['Dateofapply'];?></td>

  </tr>
   <tr>
    <th width="150">Issued Date</th>
    <td><?php  echo $row['UpdationDate'];?></td>
  </tr>
</table>

<?php } ?>

<p>THIS IS A COMPUTER GENERATED CERTIFICATE. </p>
</body>
</html>
<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'landscape');
$dompdf->load_html($html);
$dompdf->render();
//For view
$dompdf->stream("",array("Attachment" => false));
// for download
$dompdf->stream("Birth-Certificate.pdf");
?>