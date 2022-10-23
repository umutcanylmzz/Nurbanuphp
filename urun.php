<?php

// Initialize the session

session_start();

ob_start();

define("DATA", "data/");





function veriTabaninaBaglan($veriTabaniAdi)
{

    $db = new mysqli("localhost", "root", "", $veriTabaniAdi);

    mysqli_set_charset($db, "utf8");

    return $db;
}

?>



<!DOCTYPE html>

<html lang="utf-8">

<head>

    <title>Nur Banu Çimen</title>

    <meta charset="UTF-8">

    <meta name="description" content=" Divisima | eCommerce Template">

    <meta name="keywords" content="divisima, eCommerce, creative, html">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->

    <link href="img/logo1.png" rel="shortcut icon" />



    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">





    <!-- Stylesheets -->

    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <link rel="stylesheet" href="css/flaticon.css" />

    <link rel="stylesheet" href="css/slicknav.min.css" />

    <link rel="stylesheet" href="css/jquery-ui.min.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />

    <link rel="stylesheet" href="css/animate.css" />

    <link rel="stylesheet" href="css/style.css" />





    <!--[if lt IE 9]>

		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anonymous+Pro&display=swap');

        @import url('https://fonts.googleapis.com/css?family=Montserrat:300&display=swap');

        @import url('https://fonts.googleapis.com/css?family=Big+Shoulders+Display&display=swap');





        .img1 {

            position: relative;

            height: 350px;

            width: 283px;

        }

        .img1:hover {



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

        .hover-animation img.img-front:hover {

            opacity: 0;

            cursor: pointer;

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
a{
	color: rgb(0, 0, 0);
}
a:hover{
	color: #fff;
}

.card1:hover {



            transform: scale(1.05)
        }



        span {



            position: relative;

        }



        .top-image {

            position: absolute;

            left: 0;

            top: 0;

            opacity: 0;

            max-width: 100%;

            height: 100%;

            transition: all 0.4s ease-in-out;

        }

        .top-image:hover {

            opacity: 1;

        }

        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }
    </style>

    <script>
        $(document).ready(function() {



            $("#owl-demo").owlCarousel({

                items: 4,

                lazyLoad: true,

                navigation: true

            });



        });
 


        $(document).ready(function() {

            <?php

            // Initialize URL to the variable

            $url =  $_SERVER["REQUEST_URI"];



            // Use parse_url() function to parse the URL 

            // and return an associative array which

            // contains its various components

            $url_components = parse_url($url);



            // Use parse_str() function to parse the

            // string passed via URL

            parse_str($url_components['query'], $params);



            $urlArray = explode('?', $url); //convert string into array with explode

            $id = $urlArray[1]; //Print first array value

            $urlArray2 = explode('=', $id); //convert string into array with explode

            $id2 = $urlArray2[0]; //Print first array value

            ?>



        });

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

    <!-- Page Preloder -->





    <!-- Header section -->



    <?php

    include_once(DATA . "header.php");

    ?>

    <!-- Header section end -->





    <style>



    </style>



    <!-- Product filter section end -->

    <section class="product-filter-section mt-4">

        <div class="container">

            <div class="row">



                <div class="col-12">





                    <div class="row mt-2">



                        <?php
                        include 'config.php';
                        $qry = "select * from urunler where id=" . json_encode($params['id']);
                        $result = mysqli_query($link, $qry);
                        $num = $result->num_rows;
                        for ($i = 0; $i < $num; $i++) {
                            $row = $result->fetch_assoc();

                        ?>
                            <div class='col-lg-3 col-sm-6'>
                                <div class="product-item">

                                    <div class="pi-pic  " onclick="uruneYonlendir(<?php echo $row['id']; ?>)">







                                        <img class="img1 mx-3" src="./img/<?php echo $row['urunResim1']; ?>" width="250px" height="250px" alt="">




                                    </div>

                                    <div class="pi-text">

                                        <h6><?php echo $row['urunFiyat']; ?>₺</h6>

                                        <p><?php echo $row['urunAciklama']; ?> </p>

                                    </div>

                                </div>







                            </div>





                            <div class="col-lg-6 col-sm-6">

                                <div class="row">

                                    <div class="col-12">

                                        <h4><?php echo $row['urunAciklama']; ?> </h4>



                                        <div class="row mt-3">

                                            <div class="col">





                                                <div class="row mt-2 ">
                                                    <p class="text-dark">Renk Seçiniz:</p>
                                                    <div class="col-auto">


                                                        <button class="btn btn-dark btn-circle"></button>

                                                    </div>

                                                    <div class="col-auto">

                                                        <button class="btn btn-danger btn-circle"></button>

                                                    </div>

                                                    <div class="col-auto">

                                                        <button class="btn btn-info btn-circle"></button>



                                                    </div>

                                                </div>

                                                <div class="col-3 mt-3">



                                                    <select class="form-select rounded p-1  mx-5 mt-4" style="font-family:" Times New Roman", Times, serif;" aria-label="Default select example">

                                                        <option selected>Beden Seçin</option>

                                                        <option value="1">36</option>

                                                        <option value="2">38</option>

                                                        <option value="3">40</option>

                                                    </select>

                                                </div>

                                                <div class="col-6 mt-5  ">

                                                    <div class="pi-links">

                                                        <div class="row">

                                                            <div class="col-7">

                                                                <button class=" m-2 btn btn-outline-dark" >   <a href="" onclick="sepeteEkle(<?php echo $row['id'];?>)" class="add-card"><span>Sepete Ekle</span></a>	
</button>

                                                            </div>

                                                            <div class="col-5">

                                                                <button class="m-2 btn btn-outline-dark">Satın Al</button>

                                                            </div>

                                                        </div>





                                                    </div>

                                                </div>

                                            </div>



                                        </div>



                                    <?php } ?>

                                    </div>



                                </div>



                            </div>

                            <div class="col-lg-3 col-sm-12 blinking	">

                                <a href="urunler.php">

                                    <img src="./img/reklam1.jpg" style="height: 350px; width: 250px;" alt="">

                                </a>

                            </div>








                    </div>

                </div>


            </div>
















        </div>



        <div class="col-auto mt-5 text-center">

            <h4> Beğeneceğiniz Ürünler</h4>

            <ul class="product-filter-menu mt-2 text-center">

                <li><a href="#">TOPS</a></li>

                <li><a href="#">JUMPSUITS</a></li>

                <li><a href="#">LINGERIE</a></li>

                <li><a href="#">JEANS</a></li>

                <li><a href="#">DRESSES</a></li>

                <li><a href="#">COATS</a></li>

                <li><a href="#">JUMPERS</a></li>

                <li><a href="#">COATS</a></li>

            </ul>

        </div>
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-sm-6  ">

                    <div class="product-item">

                        <div class="pi-pic">

                            <img src="./img/product/deneme2.webp" width="280px" height="280px"" alt="">

                            <div class="pi-links">

                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>

                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>

                            </div>

                        </div>

                        <div class="pi-text">

                            <h6>$35,00</h6>

                            <p>Flamboyant Pink Top </p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-sm-6">

                    <div class="product-item">

                        <div class="pi-pic">

                            <img src="./img/product/deneme2.webp" width="280px" height="280px" alt="">

                            <div class="pi-links">

                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>

                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>

                            </div>

                        </div>

                        <div class="pi-text">

                            <h6>$35,00</h6>

                            <p>Flamboyant Pink Top </p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-sm-6">

                    <div class="product-item">

                        <div class="pi-pic">

                            <img src="./img/product/deneme2.webp" width="280px" height="280px" alt="">

                            <div class="pi-links">

                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>

                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>

                            </div>

                        </div>

                        <div class="pi-text">

                            <h6>$35,00</h6>

                            <p>Flamboyant Pink Top </p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-sm-6">

                    <div class="product-item">

                        <div class="pi-pic">

                            <img src="./img/product/deneme2.webp" width="280px" height="280px" alt="">

                            <div class="pi-links">

                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>

                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>

                            </div>

                        </div>

                        <div class="pi-text">

                            <h6>$35,00</h6>

                            <p>Flamboyant Pink Top </p>

                        </div>

                    </div>

                </div>

            </div>
        </div>




       

    </section>



    <!-- Banner section -->



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

                            <p>1481 Creekside Lane Avila Beach, CA 93424, P.O. BOX 68 </p>

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

                <p class="text-white text-center mt-5">Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>

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