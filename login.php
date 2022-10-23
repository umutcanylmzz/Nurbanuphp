<?php



session_start();

require_once "config.php";



$username = $password = "";

$username_err = $password_err = $login_err = "";

 

if($_SERVER["REQUEST_METHOD"] == "POST"){

 

    // Kullanıcı adı boş mu kontrol et

    if(empty(trim($_POST["username"]))){

        $username_err = "Bir kullanıcı adı girin.";

    } else{

        $username = trim($_POST["username"]);

    }

    

    // Sifre boş mu kontrol et

    if(empty(trim($_POST["password"]))){

        $password_err = "Bir parola girin.";

    } else{

        $password = trim($_POST["password"]);

    }

    

    // Girilen bilgileri doğrula

    if(empty($username_err) && empty($password_err)){

       

        $sql = "SELECT id, name, surname, username, password FROM users WHERE username = ?";

        

        if($stmt = mysqli_prepare($link, $sql)){

            // değişkenleri parametreye bağla

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            

            // parametreyi hazırla

            $param_username = $username;

            

        

            if(mysqli_stmt_execute($stmt)){

                

                mysqli_stmt_store_result($stmt);

                

                // Kullanıcı adının varsa şifreyi doğrula

                if(mysqli_stmt_num_rows($stmt) == 1){                    

                    // sonucu değişkene at

                    mysqli_stmt_bind_result($stmt, $id, $name, $surname, $username, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)){

                        if(password_verify($password, $hashed_password)){

                            //şifre doğru oturumu başlat

                            session_start();

                          

                      

                            $_SESSION["loggedin"] = true;

                            $_SESSION["id"] = $id;

                            $_SESSION["name"] = $name;                            

                            $_SESSION["surname"] = $surname;                            

                            $_SESSION["username"] = $username;                            

                            

                 

                            header("location: index.php");

                        } else{

                        

                            $login_err = "Kullanıcı adı veya parola geçersiz.";

                        }

                    }

                } else{

                

                    $login_err = "Kullanıcı adı veya parola geçersiz.";

                }

            } else{

                echo "Bir Hata Oluştu sonra tekrar deneyiniz.";

            }



        

            mysqli_stmt_close($stmt);

        }

    }

    

    // Close connection

    mysqli_close($link);

}

?>

 

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="../js/jquery-3.6.0.min.js" ></script> 

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/popper.min.js"></script>

    <script src="../js/bootstrap.min.js" ></script>

    <link rel="stylesheet" type="text/css" href="css/ui.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Giriş Yap</title>

    <link rel="icon" href="img/logo1.png" type="image/icon type">

</head>

    <style>

        body{

    	overflow-x: hidden;

		background-image: url("css/img/Adsız-1.png");

        font: 14px sans-serif;

  		}



		html { 

		scroll-behavior: smooth; 

		}



        /* Preloader */

		#preloader {

			position:fixed;

			top:0;

			left:0;

			right:0;

			bottom:0;

			background-color:#fff; /* sayfa yüklenirken gösterilen arkaplan rengimiz */

			z-index:99; /* efektin arkada kalmadığından emin oluyoruz */

		}

		#status {

			width:200px;

			height:200px;

			position:absolute;

			left:50%;

			top:50%;

			background-image:url("css/img/1495.gif"); /* burası yazının ilk başında bahsettiğimiz animasyonu çağırır */

			background-repeat:no-repeat;

			background-position:center;

			margin:-100px 0 0 -100px;

		}



        .wrapper{ width: 360px;   }

    </style>

<div id="preloader">

    <div id="status">&nbsp;</div>

	</div>

	<!-- Preloader -->

	<script type="text/javascript">

		//<![CDATA[

			$(window).load(function() { // makes sure the whole site is loaded

				$('#status').fadeOut(); // will first fade out the loading animation

				$('#preloader').delay(200).fadeOut('slow'); // will fade out the white DIV that covers the website.

				//$('body').delay(350).css({'overflow':'visible'});

			})

		//]]>

	</script>

<body>

        <div class="row m-3  text-center">

                 <div class="container-fluid">

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">

                    <div class="row">

                  

                        <div class="col-lg-4 mt-1 col-sm-6">

                             <img src="img/product/banner.jfif" alt="" height="100px">

                        </div>

                        <div class="col-lg-4 mt-1 col-sm-6">

                             <img src="img/product/banner2.jfif" alt="" height="100px">

                        </div>

                        <div class="col-lg-4 mt-1 col-sm-6">

                             <img src="img/product/banner.jfif" alt="" height="100px">

                        </div>

                    </div>

                 

                   

                 

                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>

				

             

                  

                </div > 

         </div>

       

	



    <div class="container-xxl"> 

        

        <div class="row justify-content-center">

          

            <div class="wrapper mt-5">

                

                <h2 class="mb-4">Giriş Paneli</h2>

                <!-- <p>Please fill in your credentials to login.</p> -->

        

                <?php 

                if(!empty($login_err)){

                    echo '<div class="alert alert-danger">' . $login_err . '</div>';

                }        

                ?>

        

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">

                        <label>Kullanıcı Adı</label>

                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">

                        <span class="invalid-feedback"><?php echo $username_err; ?></span>

                    </div>    

                    <div class="form-group">

                        <label>Parola</label>

                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">

                        <span class="invalid-feedback"><?php echo $password_err; ?></span>

                    </div>

                    <div class="form-group">

                        <input type="submit" class="btn btn-secondary" value="Giriş Yap">

                    </div>

                    <p>Hesabın yok mu? <a href="register.php" style="color:#808080;">Kayıt Ol</a></p>

                </form>

                <div class="row text-center">

                    <div class="col-12 mt-5">

                        <img src="img/shield.png" alt="">

                        Güvenli Alışveriş

                        <p style="font-size:12px" class="mt-3   ">© Copyright 1998 - 2022 D-Market Elektronik Hizmetler Tic. A.Ş.</p>

                     </div>

                </div>

            </div>

            

        </div> 

    </div> 

</body>

</html>