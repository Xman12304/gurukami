 <?php
session_start();
$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}
if(isset($_POST['submit'])){
	
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$nomortlp=$_POST['nomortlp'];
	$gender=$_POST['gender'];
	$_SESSION['email'];
	$_SESSION['pass'];
	
	$pelajaran=$_POST['pelajaran'];
	$biaya=$_POST['biaya'];
	$pendter=$_POST['pendter'];
	$lokasi=$_POST['lokasi'];
	
	//script reminimize ukuran foto
	$photo=$_FILES['photo']['name'];
	$tipe_file=$_FILES['photo']['type'];
	$tmp_file=$_FILES['photo']['tmp_name'];
	//$path="images/".$photo;
	$folder="../images/";
	$filesave=$folder.$photo;
	$width_size=480;
	
	$allowed_extensions = array("jpg", "jpeg", "png");
	$pecah=explode(".",$photo);
	$ekstensi=$pecah[1];

if(in_array($ekstensi,$allowed_extensions)){

	//$move=move_uploaded_file($tmp_file,$path);

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

	$query=mysqli_query($conn,"INSERT INTO signup2 (nama,alamat,nomortlp,gender,pelajaran,biaya
	,pendter,lokasi,photo,email,pass) 
	VALUES ('$nama','$alamat','$nomortlp','$gender','$pelajaran','$biaya','$pendter','$lokasi','$resize_image'
	,'$_SESSION[email]','$_SESSION[pass]')");

	if($query){
		echo"<script>alert('data berhasil disimpan');
		window.location='../modules/signin';</script>";
	}else{
		mysql_error();
	}
}else{
	echo"<script>alert('sorry only jpg , png , jpeg files are allowed ');
		window.location='signup2';</script>";
}
}
?>
<html>
<head><title>GuruKami - Isi Biodata</title>
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
	<a href="" class="w3-bar-item w3-button w3-xlarge w3-text-red w3-wide w3-right">GuruKami</a>
	
	<!--<div class="w3-dropdown-click">
	<button class="w3-button w3-xlarge w3-text-red" onclick="myFunction()">Menu</button>
	<div id="demo" class="w3-dropdown-content w3-bar-block w3-card-2">
	<a href="signin.php" class="w3-bar-item w3-button w3-text-red">Masuk</a>
	<a href="signup.php" class="w3-bar-item w3-button w3-text-red">Daftar</a>
	<a href="" class="w3-bar-item w3-button w3-text-red">Tentang Kami</a>
	</div>
	</diV>-->
	
	</div>


<!--form-->
<br>
<div class="w3-content w3-container w3-padding-16 ">
<h2 class="w3-text-red">Isi Biodata</h2>
  <p>Lengkapi Form Biodata Dibawah Ini dengan Benar</p>
  <div class="w3-content w3-container">
  <form method="post" id="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
  <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
   <!--<div class="w3-col s12 m7">
  <label class="w3-text-red"><b>Foto Profil</b></label>
  <br><input type="file" name="photo" multiple required>
  </div>-->
  <div class="w3-col s12 m7">
  <label class="w3-text-red"><b>Nama Lengkap</b></label>
  <input class="w3-input " name="nama" type="text" required>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Alamat</b></label>
  <input class="w3-input " name="alamat" type="text" required>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Nomor Telepon</b></label>
  <input class="w3-input " name="nomortlp" type="text" maxlength="13" placeholder="exp : 0896****" required>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Jenis Kelamin</b></label>
  <p><input class="w3-radio" name="gender" type="radio" value="pria" checked>
  <label>Pria</label></p>
  <p><input class="w3-radio" name="gender" type="radio" value="Wanita">
  <label>Wanita</label></p>
  </div>
  
  <!--move from profile-->
  <div class="w3-col s12 m7">
  <label class="w3-text-red"><b>Foto Profil</b></label>
  <br><input type="file" accept="image/*" name="photo" required/>
  <!--capture="camera" taruh di atas -->
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Pelajaran</b></label>
  <select class="w3-select w3-border w3-light-grey" name="pelajaran" required>
  <option value="-">- Pilih Pelajaran -</option>
  <option value="Matematika" >Matematika</option>
  <option value="IPA" >IPA</option>
  <option value="B.Inggris" >Bahasa Inggris</option>
  <option value="Fisika" >Fisika</option>
  <option value="PHP" >Web Programming ( Html,Css,PHP )</option>
  </select>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Biaya / Bln</b></label>
  <input class="w3-input w3-border w3-light-grey" 
  name="biaya" type="number" placeholder="exp: 250.000" required></input>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Pendidikan Terakhir</b></label>
  <select class="w3-select w3-border w3-light-grey" name="pendter" required>
  <option value="-">- Pilih Pendidikan Terakhir -</option>
  <option value="S1" >S1</option>
  <option value="D3" >D3</option>
  <option value="SMA/SMK" >SMA/SMK</option>
  </select>
  </div>
  <div class="w3-col s12 m7">	
  <label class="w3-text-red"><b>Lokasi Mengajar</b></label>
  <select class="w3-select w3-border w3-light-grey" name="lokasi" type="text" required>
   <option value="-">- Pilih Lokasi Mengajar -</option>
  <option value="Jakarta" >Jakarta ( Pesanggrahan,Psr.Rebo,Petukangan )</option>
  <option value="Tangerang" >Tangerang ( Kota Tangerang,Pamulang,Ciputat,Bintaro )</option>
  <option value="Depok" disabled>Depok ( Still Proccess )</option>
  <option value="Bogor" >Bogor ( Dramaga,Tajur,Leuwiliang )</option>
  <option value="Bekasi" disabled>Bekasi (Still Proccess )</option>
  </select>
  </div>
  
  </div>
  
  
  <button name="submit" type="submit" class="w3-btn w3-red w3-center w3-section">
  <i class="fa fa-paper-plane"></i>Lanjutkan</button>
  <a href="signup" class="w3-btn w3-red w3-center w3-section">
  <i class="fa fa-cross-x"></i>Batal</a>
  <br>
  </form>
  </div>
</div>
</div>

<?php include"../footer.html"; ?>