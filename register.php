<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $name = $surname = $password = $confirm_password =$email=$adres= "";
$username_err = $name_err = $surname_err = $password_err = $confirm_password_err =$email_err=$adres_err= "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Lütfen Bir Kullanıcı Adı Giriniz.";
    } 
     else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
        
            if(mysqli_stmt_execute($stmt)){
             
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Bu Kullanıcı Adı daha önce kullanılmış.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Bir hata oluştu sonra tekrar deneyiniz.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["name"]))){
        $name_err = "Lütfen isminizi Giriniz.";     
    } elseif(strlen(trim($_POST["name"])) < 3){
        $name_err = "İsiminiz 2 Karakterden Fazla olmalı.";
    } else{
        $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["surname"]))){
        $surname_err = "Lütfen Soyadınızı Giriniz.";     
    } elseif(strlen(trim($_POST["surname"])) < 3){
        $surname_err = "Soyadınız 2 Karakterden Fazla olmalı";
    } else{
        $surname = trim($_POST["surname"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Lütfen Şifrenizi giriniz.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = " Şifreniz 6 Karakterden Fazla olmalı";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Şifrenizi Tekrar Giriniz";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Şifreler Eşleşmiyor.";
        }
    }
    if(empty(trim($_POST["email"]))){
        $email_err = "Lütfen E-mailinizi Giriniz.";     
    } elseif(strlen(trim($_POST["email"])) < 3){
        $email_err = "name must have atleast 6 characters.";
    } else{
        $email = trim($_POST["email"]);
    }
    if(empty(trim($_POST["adres"]))){
      $adres_err = "Lütfen Adresinizi Giriniz.";     
  } elseif(strlen(trim($_POST["adres"])) < 3){
      $adres_err = "name must have atleast 6 characters.";
  } else{
      $adres = trim($_POST["adres"]);
  }
    // Check input errors before inserting in database
    if(empty($username_err) && empty($name_err) && empty($surname_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, name, surname,email,adres, password) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_name, $param_surname,$param_email,$param_adres, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_name = $name;
            $param_surname = $surname;
            $param_email=$email;
            $param_adres=$adres;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
               
               header("location:login.php");
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="js/jquery-3.6.0.min.js" ></script> 
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="css/ui.css">
    <title>Kayıt Ol</title>
    <link rel="icon" href="css/img/logo1.png" type="image/icon type">
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



<div class="container-xxl"> 
        <div class="row  justify-content-center">
            <div class="wrapper mt-4">
                <h2 class="mb-4">Kayıt Paneli</h2>
                <!-- <p>Please fill this form to create an account.</p> -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                     <div class="form-group">
                        <label>Ad</label>
                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>    
                    <div class="form-group">
                        <label>Soyad</label>
                        <input type="text" name="surname" class="form-control <?php echo (!empty($surname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $surname; ?>">
                        <span class="invalid-feedback"><?php echo $surname_err; ?></span>
                    </div>    
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email"   class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div> 
                    <div class="form-group">
                        <label>adres</label>
                        <input type="text" name="adres"    class="form-control <?php echo (!empty($adres_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $adres; ?>">
                        <span class="invalid-feedback"><?php echo $adres_err; ?></span>
                    </div> 
                    <div class="form-group">
                        <label>Parola</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Parola Tekrarı</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary swalDefaultSuccess" value="Kullanıcı Ekle">
                        <!-- <input type="reset" class="btn btn-secondary ml-2" value="Reset"> -->
                    </div>
                 
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