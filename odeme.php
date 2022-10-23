<?php
// Initialize the session

session_start();
ob_start();
define ("DATA","data/");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
function veriTabaninaBaglan($veriTabaniAdi){
	$db=new mysqli("localhost","root","",$veriTabaniAdi);
	mysqli_set_charset($db,"utf8");
	return $db;
}
include("vt.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>

	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/logo1.png" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin.css" rel="stylesheet">

	<!-- Stylesheets -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>

    </head>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


	<!-- Preloader -->
	<style>
		body{
			overflow-x:hidden;
		}
	</style>
    <body>

	<?php
include_once(DATA."header.php");
?>

				<!-- ========================= SECTION CONTENT ========================= -->
	<div class="row">
<div class="col-9">
    <div class="container-fluid">
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
    </div>
</div>
		<aside class="col-md-3 mt-3">
						<div class="card mb-3">
							<div class="card-body">
							<form>
								<div class="form-group">
									<label>Bir kupona mı sahipsin?</label>
									<div class="input-group mt-2">
										<input type="text" class="form-control" name="" placeholder="Kupon Kodu">
										<span class="input-group-append"> 
											<button class="btn btn-secondary">Uygula</button>
										</span>
									</div>
								</div>
							</form>
							</div> <!-- card-body.// -->
						</div>  <!-- card .// -->
						<div class="card">
							<div class="card-body">
								<?php
									$db=new mysqli("localhost","root","","nurbanu");
									mysqli_set_charset($db,"utf8");

									$sorgu="select SUM(u.urunFiyat) toplam from urunler u join sepet s on u.id=s.id where userId=".$_SESSION["id"];

									// echo "$sorgu";
									$sonuc=$db->query($sorgu);
										$kayit=$sonuc->fetch_assoc(); 
									
									if(!is_null($kayit["toplam"])) {
										echo 	'<label>Ödenecek Tutar</label>';
										echo 	'<dd class="text-right h5 mt-1"> '.$kayit["toplam"].' TL </dd>';
										echo    '<a href="#" class="btn btn-secondary float-md-start mt-2"> Satın Al  </a>';
										echo 	'</dl>';
									}
									else {
										echo 	'<label>Ödenecek Tutar</label>';
										echo 	'<dd class="text-right h5 mt-1"> 0 TL </dd>';
										echo    '<a href="#" class="btn btn-secondary float-md-start mt-2"> Satın Al  </a>';
										echo 	'</dl>';
									}
								?> 								
							</div> <!-- card-body.// -->
						</div>  <!-- card .// -->
					</aside> 

	</div>				
	


	<script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                language: {
                    info: "_TOTAL_ kayıttan _START_ - _END_ kayıt gösteriliyor.",
                    infoEmpty: "Gösterilecek hiç kayıt yok.",
                    loadingRecords: "Kayıtlar yükleniyor.",
                    zeroRecords: "Tablo boş",
                    search: "Arama:",
                    sLengthMenu: "Sayfada _MENU_ kayıt göster",
                    infoFiltered: "(toplam _MAX_ kayıttan filtrelenenler)",
                    buttons: {
                        copyTitle: "Panoya kopyalandı.",
                        copySuccess: "Panoya %d satır kopyalandı",
                        copy: "Kopyala",
                        print: "Yazdır",
                    },

                    paginate: {
                        first: "İlk",
                        previous: "Önceki",
                        next: "Sonraki",
                        last: "Son"
                    },
                }
            });  
        });

    </script>

	<!-- Bootstrap core JavaScript-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->

<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
    </body>
</html>