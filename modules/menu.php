<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
session_start();

$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}

if(isset($_POST['submit'])){	
$namaproduk=$_POST['namaproduk'];
$jmlproduk=$_POST['jumlahproduk'];
$hrgproduk=$_POST['hargaproduk'];
$_SESSION['email'];
$tgl=date('D - j - M - Y');
date_default_timezone_set("Asia/Jakarta");
$time=date('H:i:s');

$query="INSERT INTO produk (namaproduk,jmlproduk,hrgproduk,email,tgl,time) VALUES 
('$namaproduk','$jmlproduk','$hrgproduk','$_SESSION[email]','$tgl','$time')";
$hasil=mysqli_query($conn,$query);
/*$data=mysqli_fetch_array($hasil);*/

if($hasil){
		$_SESSION['namaproduk']=$namaproduk;
		$_SESSION['jumlahproduk']=$jmlproduk;
		$_SESSION['hargaproduk']=$hrgproduk;
	echo"<script>alert('data berhasil disimpan');</script>";
	echo"<script>window.location.href='menu.php'</script>";
}
else{
	echo"<h1>oops error</h1>";
}
}
?>

<html>
<head><title>GuruKami - Menu</title>
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

<!--navbar-->
<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-left w3-black"
 style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="../modules/menu" class="w3-bar-item w3-button w3-xlarge">My Dashboard</a>
   <a href="../modules/profile" class="w3-bar-item w3-button w3-xlarge">Profile</a>
  <a href="../modules/account" class="w3-bar-item w3-button w3-xlarge">Account</a>
  <a href="../modules/logout" class="w3-bar-item w3-button w3-xlarge">Sign Out</a>
</div>

<div class="w3-main" id="main">
<div class="w3-bar">
  
  <div class="w3-container">
  <a href="../index" class="w3-bar-item w3-button w3-xlarge w3-text-red w3-right w3-wide">GuruKami</a>
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
	<h1 class="w3-text-red">My Dashboard</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

  <table class="w3-table-all">
	<tr>
		<th>No</th>
		<th>Nama Pemohon</th>
		<th>Alamat</th>
		<th>Wilayah</th>
		<th>No.Telepon</th>
		<th>jadwal</th>
		<th>Budget</th>
	</tr>
	<tr>
		<?php
		
		error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
			session_start();
			
			$conn=mysqli_connect("localhost","root","","gurukami");
			if(!$conn){
			die("connection failed :".mysqli_connect_error());
			}
			
			$_SESSION['email'];
			$query=mysqli_query($conn,"SELECT * FROM client WHERE email='$_SESSION[email]'");
	
			
			if(mysqli_num_rows($query)==0){
				echo '<tr><td colspan="6">tidak ada data </td></tr>' ;
			}else{
			
			$no=1;
			while($data=mysqli_fetch_array($query)){
			echo "
				<tr>
				<td>$no</td>
				<td>$data[namaproduk]</td>
				<td>$data[hrgproduk]</td>
				<td>$data[jmlbeli]</td>
				<td><a class='w3-text-red' href='deleteshop.php?id=".$data['transaksi_id']."' 
		<!--onclick='return confirm(\"yakin ?\")'>Hapus</a></td>	
				</tr>";
				$no++;
			}
			}
?>
</tr>	
	</table>
	</form>
	</div>
	</div>
</div>

<?php include"../footer.html"; ?>