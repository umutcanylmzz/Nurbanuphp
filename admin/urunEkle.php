<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

$sayfa = "Ürünler";



include('../inc/vt.php');

include('inc/head.php');

include('inc/nav.php');

include('inc/sidebar.php');

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.



    $urunFiyat = $_POST['urunFiyat']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz

    $urunKategori = $_POST['urunKategori'];

    $urunAciklama = $_POST['urunAciklama'];

    $sira = $_POST['sira'];

  

    $aktif = 0;

    if (isset($_POST['aktif'])) $aktif = 1;

    $hata = "";



    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.

    if ($urunFiyat <> "" && $urunKategori <> "" && isset($_FILES['urunResim1'])&& isset($_FILES['urunresim2']) ) {



        if ($_FILES['urunResim1']['error'] != 0) {

            $hata .= 'Dosya yüklenirken hata gerçekleşti lütfen daha sonra tekrar deneyiniz.';

        } else {



            $dosya_adi = strtolower($_FILES['urunResim1']['name']);

            $dosya_adi2 = strtolower($_FILES['urunresim2']['name']);

            if (file_exists('images/' . $dosya_adi)) {

                $hata .= " $dosya_adi diye bir dosya var";

            } else {

                $boyut = $_FILES['urunResim1']['size'];

                if ($boyut > (1024 * 1024 * 2)) {

                    $hata .= ' Dosya boyutu 2MB den büyük olamaz.';

                } else {

                    $dosya_tipi = $_FILES['urunResim1']['type'];

                    $dosya_uzanti = explode('.', $dosya_adi);

                    $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];

                    $dosya_tipi2 = $_FILES['urunresim2']['type'];

                    $dosya_uzanti2 = explode('.', $dosya_adi2);

                    $dosya_uzanti2 = $dosya_uzanti2[count($dosya_uzanti2) - 1];

                    if (!in_array($dosya_tipi, ['image/png', 'image/jpeg','image/webp','image/jfif' ]) || !in_array($dosya_uzanti, ['png', 'jpg','webp','jfif'])) {

                        //if (($dosya_tipi != 'image/png' || $dosya_uzanti != 'png' )&&( $dosya_tipi != 'image/jpeg' || $dosya_uzanti != 'jpg')) {

                        $hata .= ' Hata, dosya türü JPEG ,PNG ,WEBP,JFİF olmalı.';

                    } 

                    

                    else {

                        $urunResim1 = $_FILES['urunResim1']['tmp_name'];

                        copy($urunResim1, '../img/' . $dosya_adi);

                        $urunresim2 = $_FILES['urunresim2']['tmp_name'];

                        copy($urunresim2, '../img/' . $dosya_adi2);



                        //Eklencek veriler diziye ekleniyor

                        $satir = [

                            'urunResim1' => $dosya_adi,

                            'urunresim2'=>$dosya_adi2,

                            'urunFiyat' => $urunFiyat,

                            'urunAciklama' => $urunAciklama,

                            'sira' => $sira,

                            'aktif' => $aktif,

                            'urunKategori' => $urunKategori,

                            

                        ];



                        // Veri ekleme sorgumuzu yazıyoruz.

                        $sql = "INSERT INTO urunler SET urunResim1=:urunResim1,urunresim2=:urunresim2, urunFiyat=:urunFiyat,aktif=:aktif,sira=:sira, urunAciklama=:urunAciklama, urunKategori=:urunKategori;";

                        $durum = $baglanti->prepare($sql)->execute($satir);



             if ($durum) {?>

<script type="text/javascript">Swal.fire("Başarılı","Ürün Eklendi","success")


</script>

 <?php } 




                    }

                }

            }

        }

    }

    if($hata!=""){

        echo '<script>swal("Hata","'.$hata.'","error");</script>';

    }

}

?>

<script src="vendor/CKEditor5/ckeditor.js"></script>

<div id="content-wrapper">



    <div class="container-fluid">



        <!-- Breadcrumbs-->

        <ol class="breadcrumb">

            <li class="breadcrumb-item">

                <a href="#">Dashboard</a>

            </li>

            <li class="breadcrumb-item active">Ürün Ekle</li>

        </ol>





        <!-- DataTables Example -->

        <div class="card mb-3">



            <div class="card-body">



                <form method="post" action="urunEkle.php" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-6">

                    <div class="form-group">

                        <label for="urunResim1">Foto</label>

                        <input required type="file" name="urunResim1" class="form-control-file" id="urunResim1">

                    </div>

                    </div>

                    <div class="col-6">

                        <div class="form-group">

                        <label for="urunresim2">Foto2</label>

                        <input type="file" name="urunresim2" class="form-control-file" id="urunresim2">

                    </div>

                    </div>

                </div>    

                

                    

                    <div class="form-group">

                        <label>Üst Başlık</label>

                        <input required type="text" class="form-control" name="urunAciklama" placeholder="Marka Model Giriniz...">

                    </div>

                    <div class="form-group">

                        <label>Fiyat</label>

                        <input required type="text" class="form-control" name="urunFiyat" placeholder="Fiyat Giriniz...">

                    </div>



                    <div class="form-group">

                        <label for="urunKategori">İçerik</label>

                        <textarea name="urunKategori" id="urunKategori"></textarea>



                        <script>

                            ClassicEditor

                                .create(document.querySelector('#urunKategori'))

                                .then(editor => {

                                    console.log(editor);

                                })

                                .catch(error => {

                                    console.error(error);

                                });

                        </script>



                    </div>

                              

                    <div class="form-group">

                        <label>Sıra</label>

                        <input required type="text" class="form-control" name="sira" placeholder="Sıra">

                    </div>



                    <div class="form-check">

                        <input type="checkbox" class="form-check-input" name="aktif" id="aktif">

                        <label class="form-check-label" for="aktif">Aktif mi?</label>

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Kaydet</button>

                    </div>



                </form>





            </div>

        </div>

        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>





        <!-- /.container-fluid -->





        

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

        <script src="js/aktifcustom.js"></script>

        <link rel="stylesheet" type="text/css" href="../css/switch.css">