<html>
<head><title>GuruKami - Profile</title>
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
//error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
session_start();
$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}
	
	$query=mysqli_query($conn,"SELECT nama,pelajaran,biaya,pendter,lokasi,photo FROM signup2 WHERE email='$_SESSION[email]'");
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
<h1 class="w3-text-red">My Profile</h1>
<form method="post" action="editproses.php" enctype="multipart/form-data">

<div class="w3-row-padding" style="margin:0 -16px 8px -16px">

  
  <div class="w3-col s12 m7">
  <label class="w3-text-red"><b>Foto Profil</b></label>
  <div class="center">
   
   <?php
   echo'<img src="'.$data['photo'].'" style="width:50%">'; 
   ?>
  <br><input class="w3-red" type="file" accept="image/*" name="foto"></input>
  <button type="submit" name="submit" class="w3-btn w3-red w3-center w3-section" value="unggah"> 
  <i class="fa fa-camera"></i>Unggah Foto</button><br>
  <!--capture="camera" taruh di atas -->
   <!--style="color:transparent"--> 
  </div>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Username</b></label>
  <input class="w3-input w3-border w3-light-grey" 
  name="nama" type="text" value="<?php echo $data['nama'];?>" required></input>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Pelajaran</b></label>
  <select class="w3-select w3-border w3-light-grey" name="pelajaran" required>
  <option value="-">- Pilih Pelajaran -</option>
  <option value="Matematika" <?php if($data['pelajaran']=='Matematika'){echo 'selected';}?>>Matematika</option>
  <option value="IPA" <?php if($data['pelajaran']=='IPA'){echo 'selected';}?>>IPA</option>
  <option value="B.Inggris" <?php if($data['pelajaran']=='B.Inggris'){echo 'selected';}?>>Bahasa Inggris</option>
  <option value="Fisika" <?php if($data['pelajaran']=='Fisika'){echo 'selected';}?>>Fisika</option>
  <option value="PHP" <?php if($data['pelajaran']=='PHP'){echo 'selected';}?>>Web Programming ( Html,Css,PHP )</option>
  </select>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Biaya / Bln</b></label>
  <input class="w3-input w3-border w3-light-grey" 
  name="biaya" type="number" value="<?php echo $data['biaya'];?>" placeholder="exp: 250.000" required></input>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Pendidikan Terakhir</b></label>
  <select class="w3-select w3-border w3-light-grey" name="pendter" required>
  <option value="-">- Pilih Pendidikan Terakhir -</option>
  <option value="S1" <?php if($data['pendter']=='S1'){echo 'selected';}?>>S1</option>
  <option value="D3" <?php if($data['pendter']=='D3'){echo 'selected';}?>>D3</option>
  <option value="SMA/SMK" <?php if($data['pendter']=='SMA/SMK'){echo 'selected';}?>>SMA/SMK</option>
  </select>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Lokasi Mengajar</b></label>
  <select class="w3-select w3-border w3-light-grey" name="lokasi" type="text" required>
   <option value="-">- Pilih Lokasi Mengajar -</option>
  <option value="Jakarta" <?php if($data['lokasi']=='Jakarta'){echo 'selected';}?>>Jakarta ( Pesanggrahan,Psr.Rebo,Petukangan )</option>
  <option value="Tangerang" <?php if($data['lokasi']=='Tangerang'){echo 'selected';}?>>Tangerang ( Kota Tangerang,Pamulang,Ciputat,Bintaro )</option>
  <option value="Depok" disabled>Depok ( Still Proccess )</option>
  <option value="Bogor" <?php if($data['lokasi']=='Bogor'){echo 'selected';}?>>Bogor ( Dramaga,Tajur,Leuwiliang )</option>
  <option value="Bekasi" disabled>Bekasi (Still Proccess )</option>
  </select>
  </div>
  <!--<div class="w3-col s12 m7">
  <label class="w3-text-red"><b>Pengalaman Kerja</b></label>
  <textarea class="w3-input w3-border w3-light-grey" name="pengalaman" id="pengalaman"></textarea>
  </div>-->
  </div>
  <button type="submit" name="submit" class="w3-btn w3-red w3-center w3-section" value="simpan">
  <i class="fa fa-paper-plane"></i>Simpan</button><br>
  </form>
  </div>

 </div> 
 </div>

 <?php include"../footer.html"; ?>
