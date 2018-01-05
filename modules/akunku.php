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