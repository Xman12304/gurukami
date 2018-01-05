<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
session_start();

$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}
	
if(isset($_POST['submit'])){	
$email=$_POST['email'];
$pass=$_POST['pass'];

$query="UPDATE signup2 SET email='$email',pass='$pass' WHERE email='$_SESSION[email]' " or die(mysql_error());
	
	$hasil=mysqli_query($conn,$query);
	$data=mysqli_fetch_array($hasil);
	
	/*echo"<script>alert('data berhasil disimpan');</script>";
	echo"<script>window.location.href='profile'</script>";*/

	if($hasil){
	$_SESSION['email']=$email;	
	echo"<script>alert('data berhasil disimpan');</script>";
	echo"<script>window.location.href='account'</script>";
	}
	else{
	echo"<h1>oops error</h1>";
	}
	
}

?>
<html>
<head><title>GuruKami - Account</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Jasa Privat, Guru Private, Guru, Private, Jasa Guru">
<meta name="description" content="Situs Direktori Guru Private Indonesia">
<link rel="stylesheet" href="../w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
}
</style>
</head>
<body>

<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
session_start();
$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}
	
	$query=mysqli_query($conn,"SELECT email,pass FROM signup2 WHERE email='$_SESSION[email]'");
	$data=mysqli_fetch_array($query);
?>

<!--textarea plugin
<script src='js/tinymce/tinymce.min.js'></script>
<script src='js/tinymce/jquery.tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#pengalaman',
	<!--selector: 'textarea',
	toolbar: false,
	menubar: false,
	statusbar: false,
  });
  </script>-->
  
<!--navbar-->
<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-left w3-black"
 style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="menu" class="w3-bar-item w3-button w3-xlarge">My Dashboard</a>
   <a href="profile" class="w3-bar-item w3-button w3-xlarge">Profile</a>
  <a href="account" class="w3-bar-item w3-button w3-xlarge">Account</a>
  <a href="logout" class="w3-bar-item w3-button w3-xlarge">Sign Out</a>
</div>

<div class="w3-main" id="main">
<div class="w3-bar">
  
  <div class="w3-container">
  <a href="index" class="w3-bar-item w3-button w3-xlarge w3-text-red w3-right w3-wide">GuruKami</a>
   <a class="w3-bar-item w3-button w3-xlarge w3-text-red w3-left" onclick="w3_open()">Menu<!--<i class="w3-red fa fa-bars"></i>--></a>
  </div>
  
</div>

<div class="w3-content w3-container w3-padding-16 ">

<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));

/*date_default_timezone_set("Asia/Jakarta");
$tgl=date('D - j - M - Y');
$jam=date('H:i:s');

echo "Date : ".$tgl."<br>";
echo "Time : ".$jam."<br>";*/

session_start();

if($_SESSION['email']){
	echo"your email is ".$_SESSION['email']."&nbsp;&nbsp;&nbsp;";
	
}else{
	session_destroy();
	echo"<script>window.location.href='index.php'</script>";
}

?>

<div class="w3-content w3-container">
<h1 class="w3-text-red">My Account</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

<div class="w3-row-padding" style="margin:0 -16px 8px -16px">

  
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Email</b></label>
  <input class="w3-input w3-border w3-light-grey" 
  name="email" type="email" value="<?php echo $data['email'];?>" required></input>
  </div>
  
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Password</b></label>
  <input class="w3-input w3-border w3-light-grey" 
  name="pass" type="password" value="<?php echo $data['pass'];?>" required></input>
  </div>
 
  <!--<div class="w3-col s12 m7">
  <label class="w3-text-red"><b>Pengalaman Kerja</b></label>
  <textarea class="w3-input w3-border w3-light-grey" name="pengalaman" id="pengalaman"></textarea>
  </div>-->
  </div>
  <button type="submit" name="submit" class="w3-btn w3-red w3-center w3-section">
  <i class="fa fa-paper-plane"></i>Simpan</button><br>
  </form>
  </div>

 </div> 
 </div>

 <?php include"../footer.html"; ?>
