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
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/logo1.png" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<style>
	  @import url('https://fonts.googleapis.com/css2?family=Anonymous+Pro&display=swap');
    		@import url('https://fonts.googleapis.com/css?family=Montserrat:300&display=swap');
        		@import url('https://fonts.googleapis.com/css?family=Big+Shoulders+Display&display=swap');
 
.img1{
  
  border-radius: 50px;
  opacity:0.9;
  transition: 0.5s;

   
}

 .card1 {
margin-top: 10px;
margin-bottom: 10px;
    	   transition: transform .7s;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
border-radius: 150px;
margin-left: auto;
margin-right: auto;
  text-align: center;
  font-family: arial;
  background: white;
    width: 220px;
  height: 220px;
}
.card1:hover{

   transform: scale(1.05)
}
 
  span{
    
    position: relative;
  }

  .top-image{
	position: absolute;
	left: 0;
	top: 0;
	opacity: 0; 
	 max-width: 100%;
	height: 100%;
	transition: all 0.4s  ease-in-out;
  }
  .top-image:hover{
	opacity: 1;
  }
</style>
<script>
	 $(document).ready(function() {
  
        $("#owl-demo").owlCarousel({
          items : 4,
          lazyLoad : true,
          navigation : true
        });
  
      });
</script>
</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header section -->





	<!-- Product filter section end -->
	<div id="content-wrapper">

<div class="container">

	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Mağaza Saat</li>
	</ol>
	

	<!-- DataTables Example -->
	<div class="card mb-3">

		<div class="card-body">


			<div class="table-responsive">
				<table class="table table-bordered"  width="50%" cellspacing="0">
					<thead>
					<tr>
					
						<th>Gün</th>
						<th>Saat</th>
					

						

					</tr>
					</thead>

					<tbody>

					<?php

							$db=veriTabaninaBaglan("nurbanu");
							$sorgu="select * from magazasaat";
							$sonuc=$db->query($sorgu);
							$kayitSayisi=$sonuc->num_rows;

					 while ($kayit=$sonuc->fetch_assoc()) { ?>
						<tr>
						
							<td><?= $kayit["gun"] ?></td>
						   
						  
							<td><?= $kayit["saat"] ?></td>
							
						 
						</tr>
						<?php
					} //while bitimi
					?>
					</tbody>
				</table>
			</div>
		</div>
	
	</div>

</div>

	<!-- Banner section -->
	<section class="banner-section mt-2 ">
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
