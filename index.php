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

<html lang="utf-8">

<head>




	<meta charset="UTF-8">
	<!-- Favicon -->

	<link href="img/logo1.png" rel="shortcut icon"/>



	<!-- Google Font -->

	



	<link rel="stylesheet" 

href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

	<link rel="stylesheet" href="../../css/bootstrap.min.css"/>

	<link rel="stylesheet" href="../../css/fontawesome.min.css"/>

	<link rel="stylesheet" href="../../css/flaticon.css"/>

	<link rel="stylesheet" href="../../css/slicknav.min.css"/>

	<link rel="stylesheet" href="../../css/jquery-ui.min.css"/>

	<link rel="stylesheet" href="../../css/owl.carousel.min.css"/>

	<link rel="stylesheet" href="../../css/animate.css"/>

	<link rel="stylesheet" href="../../css/style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




	<!--[if lt IE 9]>

		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->

<style>

	  @import url('https://fonts.googleapis.com/css2?family=Anonymous+Pro&display=swap');

    		@import url('https://fonts.googleapis.com/css?family=Montserrat:300&display=swap');

        		@import url('https://fonts.googleapis.com/css?family=Big+Shoulders+Display&display=swap');



.hover-animation {

  position: relative;

  height: 350px;

  width: 263px;



}



.hover-animation img {

  position: absolute;

  left: 0;

  height: 350px;

  width: 263px;

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

<script type="text/javascript">

	
</script>

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

</head>

<body>



<?php

include_once(DATA."header.php");

?>



	<!-- Header section end -->







	<!-- Hero section -->

	<section class="hero-section">

		<div class="hero-slider owl-carousel">

			<div class="hs-item set-bg" data-setbg="img/bg.jpg">

				<div class="container">

					<div class="row">

						<div class="col-xl-6 col-lg-7 text-white">

							<span>Yeni Gelenler</span>

							<h2>denim jackets	</h2>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>

							<a href="#"style="font-family:'Times New Roman', Times, serif;" class="site-btn sb-line">Keşfet</a>

							<a href="#"style="font-family:'Times New Roman', Times, serif;" class="site-btn sb-white">Sepete Ekle</a>

						</div>

					</div>

					<div class="offer-card text-white">

						<span>Şimdi</span>

						<h2>120₺</h2>

						<p>Hemen Al</p>

					</div>

				</div>

			</div>

			<div class="hs-item set-bg" data-setbg="img/bg-2.jpg">

				<div class="container">

					<div class="row">

						<div class="col-xl-6 col-lg-7 text-white">

							<span>Yeni Gelenler</span>

							<h2>denim jackets</h2>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>

							<a href="#" style="font-family:'Times New Roman', Times, serif;" class="site-btn sb-line">Keşfet</a>

							<a href="#" style="font-family:'Times New Roman', Times, serif;" class="site-btn sb-white">Sepete Ekle</a>

						</div>

					</div>

					<div class="offer-card text-white">

						<span>Şimdi</span>

						<h2>120₺</h2>

						<p>Hemen Al</p>

					</div>

				</div>

			</div>

		</div>

		<div class="container">

			<div class="slide-num-holder" id="snh-1"></div>

		</div>

	</section>

	<!-- Hero section end -->







	<!-- Features section -->

	<section class="features-section">

		<div class="container-fluid">

			<div class="row">

				<div class="col-md-4 p-0 feature">

					<div class="feature-inner">

						<div class="feature-icon">

							<img src="img/icons/1.png" alt="#">

						</div>

						<h2>Hızlı Güvenli Alışveriş</h2>

					</div>

				</div>

				<div class="col-md-4 p-0 feature">

					<div class="feature-inner">

						<div class="feature-icon">

							<img src="img/icons/2.png" alt="#">

						</div>

						<h2>Premium Ürünler</h2>

					</div>

				</div>

				<div class="col-md-4 p-0 feature">

					<div class="feature-inner">

						<div class="feature-icon">

							<img src="img/icons/3.png" alt="#">

						</div>

						<h2>Ücretsiz Hızlı Teslimat</h2>

					</div>

				</div>

			</div>

		</div>

	</section>

	<!-- Features section end -->












	<!-- Product filter section -->

	<section class="product-filter-section">

		<div class="container mt-5">

			<div class="section-title">

	

				<h2 style="font-family:Arial, Helvetica, sans-serif ;">EN ÇOK SATILAN ÜRÜNLERE GÖZ ATIN</h2>

			</div>

			<ul class="product-filter-menu">

				<li><a href="#">TOPS</a></li>

				<li><a href="#">JUMPSUITS</a></li>

				<li><a href="#">LINGERIE</a></li>

				<li><a href="#">JEANS</a></li>

				<li><a href="#">DRESSES</a></li>

				<li><a href="#">COATS</a></li>

				<li><a href="#">JUMPERS</a></li>

				<li><a href="#">LEGGINGS</a></li>

			</ul>

			<div class="row">

				<?php  
				include 'config.php';
				$qry = "SELECT * FROM urunler where aktif='1' limit 12 ";
					$result = mysqli_query($link,$qry);
					$num = $result->num_rows;
		  			for(  $i=0; $i < $num; $i++){ 
						$row=$result->fetch_assoc();
				
?>
		<div class='col-lg-3 col-sm-6'>
		   <div class="product-item">

					<div class="pi-pic  "  onclick="uruneYonlendir(<?php echo $row['id'];?>)">	

							

					

				

					  <img class="img1" src="./img/<?php echo $row['urunResim1'];?>" width="250px"  height="250px" alt="">

					

					

				            <div class="pi-links">	

				                <a href=""  onclick="sepeteEkle(<?php echo $row['id'];?>)" class="add-card"><i class="flaticon-bag"></i><span>Sepete Ekle</span></a>	

				                    <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>			

				            </div>	

				    </div>

					<div class="pi-text">

					        <h6><?php echo $row['urunFiyat'];?>₺</h6>			

				            <p><?php echo $row['urunAciklama'];?> </p>		

					</div>	

		    </div>

		
				
			     



			</div>
			<?php }?>
		
		</div>


			

				
			</div>

			

		</div>

	</section>

	<!-- Product filter section end -->





	<!-- Banner section -->

	<section class="banner-section">

		<div class="container">

			<div class="banner set-bg blinking" data-setbg="img/banner-bg.jpg">

				<div class="tag-new">NEW</div>

				<span>New Arrivals</span>

				<h2>STRIPED SHIRTS</h2>

				<a href="#" class="site-btn">SHOP NOW</a>

			</div>

		</div>

	</section>

	<!-- Banner section end  -->



<?php

include_once(DATA."footer.php");

?>



	<!-- Footer section end -->







	<!--====== Javascripts & Jquery ======-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>

	<script language="JavaScript" type="text/javascript" src="../../js/bootstrap.min.js"></script>

	<script language="JavaScript" type="text/javascript" src="../../js/jquery.slicknav.min.js"></script>

	<script language="JavaScript" type="text/javascript" src="../../js/owl.carousel.min.js"></script>

	<script language="JavaScript" type="text/javascript" src="../../js/jquery.nicescroll.min.js"></script>

	<script language="JavaScript" type="text/javascript" src="../../js/jquery.zoom.min.js"></script>

	<script src="../../js/jquery-ui.min.js"></script>

	<script language="JavaScript" type="text/javascript" src="../js/main.js"></script>



	</body>

</html>

