<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));

session_start();

$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}
	
$email=$_POST['email'];
$password=$_POST['pass'];

/*$_SESSION['email']=$email;
$_SESSION['pass']=$password;*/

$query="SELECT*FROM signup2 WHERE email='$email'";
$hasil=mysqli_query($conn,$query);
$data=mysqli_fetch_array($hasil);

if($password==$data['pass']){
	$_SESSION['email']=$data['email'];
	echo"<script>window.location.href=<?php include'../menu'; ?></script>";
}
else echo"<h1>login gagal</h1>";

?>