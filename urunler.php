<?php

// Initialize the session

session_start();

ob_start();

define ("DATA","data/");

include("config.php");



function veriTabaninaBaglan($veriTabaniAdi){

	$db=new mysqli("localhost","root","",$veriTabaniAdi);

	mysqli_set_charset($db,"utf8");

	return $db;

}









?>



<!DOCTYPE html>

<html lang="zxx">

<head>

	<title>Nur Banu Çimen</title>

	<meta charset="UTF-8">


	<!-- Favicon -->

	<link href="img/logo1.png" rel="shortcut icon"/>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.38/dist/sweetalert2.all.min.js"></script>

	<!-- Google Font -->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.38/dist/sweetalert2.all.min.js"></script>

	<!-- Stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	

	<link rel="stylesheet" href="css/bootstrap.min.css"/>

	<link rel="stylesheet" href="css/font-awesome.min.css"/>

	<link rel="stylesheet" href="css/flaticon.css"/>

	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<link rel="stylesheet" href="css/jquery-ui.min.css"/>

	<link rel="stylesheet" href="css/owl.carousel.min.css"/>

	<link rel="stylesheet" href="css/animate.css"/>

	<link rel="stylesheet" href="css/style.css"/>



<script>

	

	function uruneYonlendir(urunId) {

    // sessionStorage.setItem('tiklananUrun', urunId);

    var url = 'urun.php?';

    url += 'id=' + urunId;

    window.location.replace(url);

}

function sepeteEkle(id) {

    $.ajax({

        url: 'sepeteEkle.php',

        type: 'post',

        data: {

            id: id



	          },

        success: function(gelenCevap) {

			
        }

    });

}









</script>

	

<style>











.ali{

	color: #111111;

	font-size: 12px;

	font-weight: 700;

	text-transform: uppercase;

	background: #ebebeb;

	display: block;



	padding: 10px 34px;

	margin: 0 10px 10px;

	display: inline-block;

	border-radius: 31px;

}



.hover-animation {

  position: relative;

  height: 350px;

  width: 283px;



}

.img1{

	position: relative;

	height: 350px;

  width: 283px;

}

.img1:hover{



  left: 0;

  height: 350px;

  width: 283px;

}



.hover-animation img {

  position: absolute;

  left: 0;

  height: 350px;

  width: 283px;

  -webkit-transition: opacity 0.6s ease-in-out;

  -moz-transition: opacity 0.6s ease-in-out;

  -ms-transition: opacity 0.6s ease-in-out;

  -o-transition: opacity 0.6s ease-in-out;

  transition: opacity 0.6s ease-in-out;

}

.hover-animation img.img-front:hover{

  opacity:0;

  cursor: pointer;

}





</style>

</style>



</head>

<body>

	<!-- Page Preloder -->

	



    <?php

include_once(DATA."header.php");

?>

	<!-- Header section -->

	

	<!-- Header section end -->



<section class="product-filter-section mt-4">

	<div class="container">

		<div class="row">

			<form action="" method="post" name="urunKategori">

		 	<div class="col-12">

				

				<div class="col-auto mt-2">

				

					<ul class="product-filter-menu" name="urunKategori">

						<div class="row">

							<div class="col-auto">	<button value="3" class="ali btn btn-light" name="urunKategori">Erkek</button></div>

							<div class="col-auto"><button value="2" class="ali btn btn-light" name="urunKategori">Kadın</button></div>

							<div class="col-auto"><button value="1" class="ali btn btn-light" name="urunKategori">Ayakkabı</button></div>

							<div class="col-auto"><button value="3" class="ali btn btn-light" name="urunKategori">Elbise</button></div>

							<div class="col-auto">	<button value="3" class="ali btn btn-light" name="urunKategori">Cocuk</button></div>

							<div class="col-auto"><button value="3" class="ali btn btn-light" name="urunKategori">Elektronik</button></div>

						</div>

					

						

						

						

					

						

						

						

					</ul>

					

				</div>	

				</form>

				<div class="row">

					<div class="mt-2 col-lg-9 col-xs-4">

						<h2>Tüm Ürünler</h2>

					</div>

					<div class="col-lg-3  col-xs-4">

						

							<select class="form-select rounded p-2" name="urunFiyat" style="font-family:'Times New Roman', Times, serif;" aria-label="Default select example">

								<option selected value="">Önerilen Sıralama</option>

								<option value="range1">En Yüksek Fiyat</option>

								<option value="range2">En Düşük Fiyat</option>

								<option value="range3">En Yeniler</option>

								

							  </select>

						<button type="submit" class="btn btn-light rounded">Filtrele</button>

					</div>

				</div>

				<div class="row mt-2">

					

				<?php

         error_reporting( error_reporting() & ~E_NOTICE );

	 if(isset($_POST['urunFiyat'])) {	if($_POST['urunFiyat']=='range1'){

			$desc="SELECT * FROM urunler where aktif='1' ORDER by urunFiyat DESC";

		}

		if($_POST['urunFiyat']=='range2'){

			$desc="SELECT * FROM urunler where aktif='1' ORDER by urunFiyat asc";

		}

		if($_POST['urunFiyat']=='range3'){

			$desc="SELECT * FROM where aktif='1' urunler ORDER by sira desc";

		}

		

	}

		@$urunKategori = $_POST['urunKategori'];

		

		//@$urunFiyat = $_POST['urunFiyat'];

		include 'config.php';

		if(isset($_POST['urunFiyat']) && isset($_POST['urunKategori']) ) { $qry = "SELECT * FROM urunler

		WHERE urunFiyat BETWEEN $low AND $high AND  aktif='1'  AND urunKategori ='$urunKategori'"; }

		if(isset($_POST['urunFiyat']) && isset($_POST['urunKategori']) && $_POST['year']==NULL){

			$qry = "SELECT * FROM urunler

		WHERE urunFiyat BETWEEN $low AND $high AND aktif='1' AND urunKategori ='$urunKategori'";

		}

		if(isset($_POST['urunKategori'])  && $_POST['urunFiyat']==NULL){

			$qry = "SELECT * FROM urunler

		WHERE aktif='1' AND urunKategori ='$urunKategori'";

		}

		if(isset($_POST['urunFiyat'])  && $_POST['urunKategori']==NULL){

			$qry = "SELECT * FROM urunler

		WHERE aktif='1' AND urunFiyat BETWEEN $low AND $high ";

		}

		if(isset($_POST['urunKategori']) && $_POST['year']==NULL && $_POST['urunFiyat']==NULL){

			$qry = "SELECT * FROM urunler

		WHERE  aktif='1' AND urunKategori ='$urunKategori'";

		}

		

		if($_POST['urunKategori']==NULL &&  isset($_POST['urunFiyat'])){

			$qry = $desc ;

		}

		if($_POST['urunKategori']==NULL  && $_POST['urunFiyat']==NULL){

			$qry = "SELECT * FROM urunler where aktif='1'";

		}

		$result = mysqli_query($link,$qry);

		$num = mysqli_num_rows($result);

		  if($num > 0) while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>

		  

			

			<div class="col-lg-3 col-md-4 col-sm-6">

				   <div class="product-item">

					<div class="pi-pic  "  >	

							

					

				

					  <img class="img1" src="./img/<?php echo $row['urunResim1'];?>" onclick="uruneYonlendir(<?php echo $row['id'];?>)" alt="">

					

					

				            <div class="pi-links">	

				                <a href="" onclick="sepeteEkle(<?php echo $row['id'];?>)" class="add-card"><i class="flaticon-bag"></i><span>Sepete Ekle</span></a>	

				                    <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>			

				            </div>	

				    </div>

					<div class="pi-text">

					        <h6><?php echo $row['urunFiyat'];?>₺</h6>			

				            <p><?php echo $row['urunAciklama'];?> </p>		

					</div>	

		    </div>

			 </div>  

			

			<?php }else{

		   echo "<h4>Ürün Bulunamadı</h4>"; } ?>

					

				</div>

			</div>

			

		</div>

	</div>

</section>





	<!-- Product filter section end -->





	<!-- Banner section -->

	<section class="banner-section ">

		<div class="container">

			<div class="banner blinking set-bg" data-setbg="img/banner-bg.jpg">

				<div class="tag-new">NEW</div>

				<span>New Arrivals</span>

				<h2>STRIPED SHIRTS</h2>

				<a href="#" class="site-btn">SHOP NOW</a>

			</div>

		</div>

	</section>

	<!-- Banner section end  -->





	<!-- Footer section -->

	<section class="footer-section">

		<div class="container">

			<div class="footer-logo text-center">

				<a href="index.html"><img src="./img/logo-light.png" alt=""></a>

			</div>

			<div class="row">

				<div class="col-lg-3 col-sm-6">

					<div class="footer-widget about-widget">

						<h2>About</h2>

						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>

						<img src="img/cards.png" alt="">

					</div>

				</div>

				<div class="col-lg-3 col-sm-6">

					<div class="footer-widget about-widget">

						<h2>Questions</h2>

						<ul>

							<li><a href="">About Us</a></li>

							<li><a href="">Track Orders</a></li>

							<li><a href="">Returns</a></li>

							<li><a href="">Jobs</a></li>

							<li><a href="">Shipping</a></li>

							<li><a href="">Blog</a></li>

						</ul>

						<ul>

							<li><a href="">Partners</a></li>

							<li><a href="">Bloggers</a></li>

							<li><a href="">Support</a></li>

							<li><a href="">Terms of Use</a></li>

							<li><a href="">Press</a></li>

						</ul>

					</div>

				</div>

				<div class="col-lg-3 col-sm-6">

					<div class="footer-widget about-widget">

						<h2>Questions</h2>

						<div class="fw-latest-post-widget">

							<div class="lp-item">

								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/1.jpg"></div>

								<div class="lp-content">

									<h6>what shoes to wear</h6>

									<span>Oct 21, 2018</span>

									<a href="#" class="readmore">Read More</a>

								</div>

							</div>

							<div class="lp-item">

								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/2.jpg"></div>

								<div class="lp-content">

									<h6>trends this year</h6>

									<span>Oct 21, 2018</span>

									<a href="#" class="readmore">Read More</a>

								</div>

							</div>

						</div>

					</div>

				</div>

				<div class="col-lg-3 col-sm-6">

					<div class="footer-widget contact-widget">

						<h2>Questions</h2>

						<div class="con-info">

							<span>C.</span>

							<p>Your Company Ltd </p>

						</div>

						<div class="con-info">

							<span>B.</span>

							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>

						</div>

						<div class="con-info">

							<span>T.</span>

							<p>+53 345 7953 32453</p>

						</div>

						<div class="con-info">

							<span>E.</span>

							<p>office@youremail.com</p>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="social-links-warp">

			<div class="container">

				<div class="social-links">

					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>

					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>

					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>

					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>

					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>

					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>

					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>

				</div>



<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 

<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->



			</div>

		</div>

	</section>

	<!-- Footer section end -->







	<!--====== Javascripts & Jquery ======-->

	<script src="js/jquery-3.2.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>

	<script src="js/jquery.slicknav.min.js"></script>

	<script src="js/owl.carousel.min.js"></script>

	<script src="js/jquery.nicescroll.min.js"></script>

	<script src="js/jquery.zoom.min.js"></script>

	<script src="js/jquery-ui.min.js"></script>

	<script src="js/main.js"></script>



	</body>

</html>

