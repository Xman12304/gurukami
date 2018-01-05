<html>
<head><title>GuruKami - Situs Guru Privat </title>
<meta http-equiv="Content-Type" content="text/html"/>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Jasa Privat, Guru Private, Guru, Private, Jasa Guru">
<meta name="description" content="Situs Direktori Guru Private Indonesia">
<link rel="stylesheet" href="assets/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
}
/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
/* Second image (Portfolio) */
.bgimg-1 {
    background-image: url("kelas.jpg");
    min-height: 400px;
}
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: fixed;
    }
}
.frame-image{
	width:100%;
	height:200px;
	overflow:hidden;
	position:relative;
}
.frame-image img{
	width:100%;
	height:200px;
	position:absolute;
	right:0px;
	top:-5px;
}
@media only screen and (max-device-width: 200px) {
	.frame-image img{
	width:100%;
	height:400px;
	position:absolute;
	right:0px;
	top:-5px;
}
}	

</style>
</head>
<body>

<div class="w3-main" id="main">

<!--navbar-->

	<div class="w3-container w3-bar w3-white">
	<a href="index" class="w3-bar-item w3-button w3-xlarge w3-wide w3-text-red w3-right">GuruKami</a>
	
	<div class="w3-dropdown-click">
	<button class="w3-button w3-xlarge w3-text-red" onclick="myFunction()">Menu</button>
	<div id="demo" class="w3-dropdown-content w3-bar-block w3-card-2">
	<a href="modules/signin" class="w3-bar-item w3-button w3-text-red">Masuk</a>
	<a href="modules/signup" class="w3-bar-item w3-button w3-text-red">Daftar</a>
	<a href="about" class="w3-bar-item w3-button w3-text-red">Tentang Kami</a>
	</div>
	</diV>
	
	</div>



<!--price-->
<div class="w3-content w3-center w3-container">
<div class="w3-row w3-center w3-padding-16">

<div class="w3-half w3-section">
<div class="w3-panel w3-red w3-card-4">
<h3>Membangun</h3>
<p>Meningkatkan Taraf Pendidikan</p>
</div>
</div>
<div class="w3-half w3-section">
<div class="w3-panel w3-white w3-card-4">
<h3 class="w3-text-red">Negeri</h3>
<p class="w3-text-red">Bakti Kami Pada Negeri</p>
</div>
</div>

</div>
</diV>

<!--image-->
<div class="bgimg-1 w3-display-container">
  <div class="w3-display-middle">
    <span class="w3-xxlarge w3-text-white w3-red w3-padding w3-animate-right w3-wide">Cerdas 
	Membangun Bangsa</span>
  </div>
</div>

<!--content-->
<div class="w3-content w3-center w3-container">
<div class="w3-row w3-center w3-padding-16 w3-col s12 m12">

<?php
//error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
session_start();

$conn=mysqli_connect("localhost","root","","gurukami");
	if(!$conn){
	die("connection failed :".mysqli_connect_error());
	}

//query ambil data dan substring folder photo	
$query=mysqli_query($conn,"SELECT nama,pelajaran,biaya,(SELECT SUBSTRING(photo,4))as photo1 FROM signup2");
//$query=mysqli_query($conn,"SELECT  FROM signup2");

if(mysqli_num_rows($query)==0){
			echo '<tr><td colspan="6"> tidak ada data </td></tr>' ;
		}else{
			while($data=mysqli_fetch_array($query)){
				extract($data);
		
				echo'<div class="w3-quarter w3-section w3-padding w3-round-large">
				<div class="w3-red w3-card-4">
					<div class="frame-image">
						<img src="'.$data['photo1'].'">
						
						<!--<img src="'./*$data['photo'].*/'" >-->
					</div>
					<h4>'.$data['nama'].'</h4>
					<a class="w3-medium">'.$data['pelajaran'].' </a><br>
					<a class="w3-medium">'.$data['biaya'].'</a><br>
					<button class="w3-button w3-round-large w3-row w3-white w3-text-red w3-large"><span><i class="fa fa-like">Pilih</i>
					</span></button><br><br>
				</div>
				</div>';	
			}
		}
	
?>



</div>
</diV>

</div>

<?php include"footer.html"; ?>

<!--footer
<footer class="w3-container w3-center w3-red w3-padding-16">
  <h5 class="w3-text-white">2017 &copy; KarcisKita</h5>
</footer>


<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "30%";
  document.getElementById("mySidebar").style.width = "100%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>

</body>
</html>-->