<html>
<head><title>GuruKami - Daftar</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Jasa Privat, Guru Private, Guru, Private, Jasa Guru">
<meta name="description" content="Situs Direktori Guru Private Indonesia">
<link rel="stylesheet" href="../assets/w3.css">
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

<div class="w3-main" id="main">

<!--navbar-->
<div class="w3-container w3-bar w3-white">
	<a href="index" class="w3-bar-item w3-button w3-xlarge w3-text-red w3-wide w3-right">GuruKami</a>
	
	<div class="w3-dropdown-click">
	<button class="w3-button w3-xlarge w3-text-red" onclick="myFunction()">Menu</button>
	<div id="demo" class="w3-dropdown-content w3-bar-block w3-card-2">
	<a href="signin" class="w3-bar-item w3-button w3-text-red">Masuk</a>
	<a href="signup" class="w3-bar-item w3-button w3-text-red">Daftar</a>
	<a href="about" class="w3-bar-item w3-button w3-text-red">Tentang Kami</a>
	</div>
	</diV>
	
	</div>


<!--form-->
<br>
<div class="w3-content w3-container w3-padding-16 ">
<h2 class="w3-text-red">Daftar</h2>
  <p>Silahkan Daftar Untuk Menjadi Abdi Bangsa</p>
  <div class="w3-content w3-container">
  <form method="post" id="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
  <div class="w3-col s12 m7">
  <label class="w3-text-red"><b>Email</b></label>
  <input class="w3-input " name="email" type="email" required>
	</div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Password</b></label>
  <input class="w3-input " name="pass" type="password" required>
  </div>
  </div>
  <?php
session_start();
$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}

if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['pass'];

$query="SELECT email FROM signup2 WHERE email='$email'";
$cek=mysqli_query($conn,$query);

if(mysqli_num_rows($cek)>0){
	echo"<div class='w3-content'><h4 class='w3-text-red'>
 maaf email sudah terdaftar, silahkan gunakan email lain</h4></div>";
}
else{
	/*$query=mysqli_query($conn,"INSERT INTO signup (email,pass) VALUES ('$email','$password')");
	$data=mysqli_fetch_array($hasil);*/
	if($query){
	$_SESSION['email']=$email;
	$_SESSION['pass']=$password;	
	echo"<script>alert('silahkan isi selanjutnya');
		window.location.href='../modules/signup2';</script>";
}
}
}
?>
  <button name="submit" type="submit" class="w3-btn w3-red w3-center w3-section">
  <i class="fa fa-paper-plane"></i>Daftar Akun</button><br>
  </form>
  </div>
</div>

<?php include"../footer.html"; ?>