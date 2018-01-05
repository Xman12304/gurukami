<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
session_start();

$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}
	
if($_POST['submit']=="simpan"){	
$nama=$_POST['nama'];
$pelajaran=$_POST['pelajaran'];
$biaya=$_POST['biaya'];
$pendter=$_POST['pendter'];
$lokasi=$_POST['lokasi'];
$_SESSION['email'];

/*$tgl=date('D - j - M - Y');
date_default_timezone_set("Asia/Jakarta");
$time=date('H:i:s');*/


/*$imageFileType=pathinfo($photo2,PATHINFO_EXTENSION);*/

	/*$query="INSERT INTO profile (photo,pelajaran,biaya,pendter,lokasi,email) VALUES 
	('$photo','$pelajaran','$biaya','$pendter','$lokasi','$_SESSION[email]')";*/
	
	$query="UPDATE signup2 SET nama='$nama',pelajaran='$pelajaran',biaya='$biaya' ,
	pendter='$pendter',lokasi='$lokasi' WHERE email='$_SESSION[email]' " or die(mysql_error());
	
	$hasil=mysqli_query($conn,$query);
	$data=mysqli_fetch_array($hasil);
	
	/*echo"<script>alert('data berhasil disimpan');</script>";
	echo"<script>window.location.href='profile'</script>";*/

	if($hasil){
	echo"<script>alert('data berhasil disimpan');</script>";
	echo"<script>window.location.href='profile'</script>";
	}
	else{
	echo"<h1>oops error</h1>";
	}
	
}
else if($_POST['submit']=="unggah"){
session_start();
$photo=$_FILES['foto']['name'];
$tipe_file=$_FILES['foto']['type'];
$tmp_file=$_FILES['foto']['tmp_name'];
//$path="images/".$photo;
$folder="../images/";
$filesave=$folder.$photo;
$_SESSION['email'];

$width_size=480;

$allowed_extensions = array("jpg", "jpeg", "png", "");
$pecah=explode(".",$photo);
$ekstensi=$pecah[1];

if(in_array($ekstensi,$allowed_extensions)){
	
	//start resize
	move_uploaded_file($tmp_file,$filesave);
	$resize_image=$folder.$photo;
	list( $width, $height)=getimagesize($filesave);
	$k=$width/$width_size;
	$newwidth=$width/$k;
	$newheight=$height/$k;
	
	$thumb=imagecreatetruecolor($newwidth, $newheight);
	$source=imagecreatefromjpeg($filesave);
	
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	imagejpeg($thumb,$resize_image);
	
	imagedestroy($thumb);
	imagedestroy($source);
	//end resize
	
	$query="UPDATE signup2 SET photo='$resize_image' WHERE email='$_SESSION[email]'" or die(mysql_error());
	
	//error hilang 1 saat gambar sama
	/*$img=mysqli_query($conn,"SELECT photo FROM signup2 WHERE email='$_SESSION[email]'");
	$data=mysqli_fetch_array($img);
	$folder="images/$data[photo]";
	unlink($folder);*/
	
	$hasil=mysqli_query($conn,$query);
	$data=mysqli_fetch_array($hasil);
	
	echo"<script>alert('data berhasil disimpan');</script>";
	echo"<script>window.location.href='profile'</script>";

	if($hasil){
	echo"<script>alert('Foto berhasil disimpan');</script>";
	echo"<script>window.location.href='profile'</script>";
	}
	else{
	echo"<h1>oops error</h1>";
	}
	
}else{	
	echo"<script>alert('sorry only jpg , png , jpeg files are allowed ');
		window.location='profile';</script>";
}
}
?>