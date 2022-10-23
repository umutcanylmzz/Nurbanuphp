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

		<div class="col-lg-9 col-md-12">

		    <div class="container-fluid">





       

        



<!-- DataTables Example -->

<div class="card mb-2 mt-3">

	<div class="card-header">

		<i class="flaticon-bag"></i>

	   SEPETİM

	</div>

	<div class="card-body">





		<div class="table-responsive">

			<table class="table-border" id="dataTable" width="100%" cellspacing="0">

				<thead>

				<tr>

				

					<th>Resim</th>   

					<th>Marka</th>

					<th>Açıklama</th>    

					<th>Fiyat</th>                            

						   <th>Sil</th>

				</tr>

				</thead>

				<tfoot>

				</tfoot>

				<tbody>

				<?php  

				include 'config.php';

				$qry="select * from urunler u join sepet s on u.id=s.id where userId=".$_SESSION["id"];

				$result=mysqli_query($link,$qry);

				$num=$result->num_rows;

				if($num == 0) {
?>
				<tr>

					<td>
							<div class="row">

								<div class="col-12 mt-3">

								<p><strong>Sepetinizde Hiç Ürün Yok</p>

							</div>

					 	</div>

					</td>

					</tr>
<?php
				}

				 while ($kayit=$result->fetch_assoc()) { ?>

					<tr>

						<td><img src="./img/<?= $kayit["urunResim1"] ?>" width="100px" height="100px"/></td>

						<td><?= $kayit["urunAciklama"] ?></td>

						

						<td><?= $kayit["urunMarka"] ?></td>

						<td><?= $kayit["urunFiyat"] ?></td>



										   <td>

							<a class="dropdown-item"  type="button" data-bs-toggle="modal"

							   data-bs-target="#sepettenSil<?= $kayit["id"] ?>"><span class="fa fa-trash fa-2x"></span></a>



							   <div class="modal fade" id="sepettenSil<?= $kayit["id"] ?>" tabindex="-1" role="dialog"

								 aria-labelledby="exampleModalLabel" aria-hidden="true">

								<div class="modal-dialog" role="document">

									<div class="modal-content">

										<div class="modal-header">

											<h5 class="modal-title" id="exampleModalLabel">Sil</h5>

											<button class="close" type="button" data-dismiss="modal"

													aria-label="Close">

												<span aria-hidden="true">×</span>

											</button>

											</div>

											<div class="modal-body">   <b><?=$kayit['urunAciklama']?></b> ' Ürünü Sepetten Çıkarmak istediğinize Emin Misiniz</div>

											<div class="modal-footer">

											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

											<a class="btn btn-danger pull-right mx-4"

											   href="sepettenSil.php?sayfa=sepetim&id=<?= $kayit["id"] ?>">Sil</a>



											</div>

										</div>

									</div>

								</div>

							



								



							   



						</td>

						

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

			

		</div>

		
        <aside class=" col-md-3  mt-3">

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

            

        



            $qry="select SUM(u.urunFiyat) toplam from urunler u join sepet s on u.id=s.id where userId=".$_SESSION["id"];



            // echo "$sorgu";

            $result=mysqli_query($link,$qry);


                $kayit=$result->fetch_assoc(); 

            

            if(!is_null($kayit["toplam"])) {

                echo 	'<label>Ödenecek Tutar</label>';

                echo 	'<dd class="text-right h5 mt-1"> '.$kayit["toplam"].' TL </dd>';

                echo    '<a href="odeme.php" class="btn btn-secondary float-md-start mt-2"> Satın Al  </a>';

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