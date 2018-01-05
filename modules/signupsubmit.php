<?php

$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}

$email=$_POST['email'];
$password=$_POST['pass'];

$query="INSERT INTO signup (email_guru,pass_guru) VALUES ('$email','$password')";
$hasil=mysqli_query($conn,$query);
/*$data=mysqli_fetch_array($hasil);*/

if($hasil>0){
	 echo"<h1>Maaf Email Sudah Terdaftar</h1>";
}
else
echo"<script>alert('data berhasil disimpan');
		window.location='index.php';</script>";

?>