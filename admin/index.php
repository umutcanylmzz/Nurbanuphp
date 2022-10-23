<?php



ob_start();



$sayfa = "Kullanıcılar";

include('../inc/vt.php');

include('inc/head.php');

include('inc/nav.php');

include('inc/sidebar.php');

include('../config.php');



$sorgu = $baglanti->prepare("SELECT * FROM users");

$sorgu->execute();



?>



<div id="content-wrapper">



    <div class="container-fluid">



        <!-- Breadcrumbs-->

        <ol class="breadcrumb">

            <li class="breadcrumb-item">

                <a href="#">Dashboard</a>

            </li>

            <li class="breadcrumb-item active">Tablolar</li>

        </ol>

        



        <!-- DataTables Example -->

        <div class="card mb-3">

            <div class="card-header">

                <i class="fas fa-table"></i>

                Kullanıcılar

            </div>

            <div class="card-body">





                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>

                        <tr>

                            <th>ID</th>

                            <th>Kullanıcı Adı</th>   

                            <th>mail</th>

                            <th>adres</th>                         

                            <th>Düzenle</th>

                            <th>Sil</th>

                            

                            



                        </tr>

                        </thead>

                        <tfoot>

                        <tr>

                            <th>ID</th>

                            <th>Kullanıcı Adı</th>   

                            <th>mail</th>

                            <th>adres</th>                                 

                            <th>Düzenle</th>

                            <th>Sil</th>



                        </tr>

                        </tfoot>

                        <tbody>



                        <?php while ($sonuc = $sorgu->fetch()) { ?>

                            <tr>

                                <td><?= $sonuc["id"] ?></td>

                                

                                <td><?= $sonuc["username"] ?></td>

                                <td><?= $sonuc["email"] ?></td>

                                

                                <td><?= $sonuc["adres"] ?></td>

                              

                           

                               

                              <td><a class="btn btn" href="kullanicilarGuncelle.php?id=<?= $sonuc["id"] ?>"><span

                                                class="fa fa-edit fa-2x"></span></a></td>





                                                   <td>

                                    <a class="dropdown-item" href="#" data-toggle="modal"

                                       data-target="#sil<?= $sonuc["id"] ?>"><span class="fa fa-trash fa-2x"></span></a>





                                    <!-- Logout Modal-->

                                    <div class="modal fade" id="sil<?= $sonuc["id"] ?>" tabindex="-1" role="dialog"

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

                                                <div class="modal-body">   <b><?=$sonuc['kadi']?></b>  'Adlı Kullanıcıyı silmek istediğinizden emin misiniz?</div>

                                                <div class="modal-footer">

                                                    <button class="btn btn-secondary pull-left mx-4" type="button"

                                                            data-dismiss="modal">İptal

                                                    </button>

                                                    <a class="btn btn-danger pull-right mx-4"

                                                       href="kullanicilarSil.php?sayfa=kullanicilar&id=<?= $sonuc["id"] ?>">Sil</a>







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

            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

        </div>



    </div>

    <div class="container-fluid">

    <div class="row">

        <div class="col-6">

            <div class="card mb-3">

            <div class="card-header">

                <i class="fas fa-table"></i>

               Kategoriler

            </div>

            <div class="card-body">





                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>

                        <tr>

                            <th>ID</th>

                            <th>Başlık</th>   

                            <th>Adet</th>

                            <th>Düzenle</th>

                            <th>Sil</th>

                            



                        </tr>

                        </thead>

                        <tfoot>

                        <tr>

                        <th>ID</th>

                            <th>Başlık</th>   

                            <th>Adet</th>

                            <th>Düzenle</th>

                            <th>Sil</th>

                        </tr>

                        </tfoot>

                        <tbody>



                        <?php $sorgu1=$baglanti->prepare("SELECT*FROM kategori");

$sorgu1->execute();

                         while ($sonuc = $sorgu1->fetch()) { ?>

                            <tr>

                                <td><?= $sonuc["kat_id"] ?></td>

                                

                                <td><?= $sonuc["baslik"] ?></td>

                                <td><?= $sonuc["adet"] ?></td>

                                

                               

                              

                           

                               

                              <td><a class="btn btn" href="kullanicilarGuncelle.php?id=<?= $sonuc["kat_id"] ?>"><span

                                                class="fa fa-edit fa-2x"></span></a></td>





                                                   <td>

                                    <a class="dropdown-item" href="#" data-toggle="modal"

                                       data-target="#sil<?= $sonuc["kat_id"] ?>"><span class="fa fa-trash fa-2x"></span></a>





                                    <!-- Logout Modal-->

                                    <div class="modal fade" id="sil<?= $sonuc["kat_id"] ?>" tabindex="-1" role="dialog"

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

                                                <div class="modal-body">   <b><?=$sonuc['kat_id']?></b>  'Adlı Kullanıcıyı silmek istediğinizden emin misiniz?</div>

                                                <div class="modal-footer">

                                                    <button class="btn btn-secondary pull-left mx-2" type="button"

                                                            data-dismiss="modal">İptal

                                                    </button>

                                                    <a class="btn btn-danger pull-right mx-4"

                                                       href="kullanicilarSil.php?sayfa=kullanicilar&id=<?= $sonuc["kat_id"] ?>">Sil</a>







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

            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

        </div>

        </div>

        <div class="col-6">

        <div class="card mb-3">

            <div class="card-header">

                <i class="fas fa-table"></i>

                Kullanıcılar

            </div>

            <div class="card-body">





                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>

                        <tr>

                            <th>ID</th>

                            <th>Başlık</th>   

                            <th>Adet</th>                 

                            <th>Düzenle</th>

                            <th>Sil</th>

                            

                            



                        </tr>

                        </thead>

                        <tfoot>

                        <tr>

                        <th>ID</th>

                            <th>Başlık</th>   

                            <th>Adet</th>                 

                            <th>Düzenle</th>

                            <th>Sil</th>



                        </tr>

                        </tfoot>

                        <tbody>



                        <?php  $sorgu2=$baglanti->prepare("SELECT*FROM marka");

$sorgu2->execute();

                        while ($sonuc = $sorgu2->fetch()) { ?>

                            <tr>

                                <td><?= $sonuc["marka_id"] ?></td>

                                

                                <td><?= $sonuc["baslik"] ?></td>

                                <td><?= $sonuc["adet"] ?></td>

                                

                            

                              

                           

                               

                              <td><a class="btn btn" href="kullanicilarGuncelle.php?id=<?= $sonuc["id"] ?>"><span

                                                class="fa fa-edit fa-2x"></span></a></td>





                                                   <td>

                                    <a class="dropdown-item" href="#" data-toggle="modal"

                                       data-target="#sil<?= $sonuc["marka_id"] ?>"><span class="fa fa-trash fa-2x"></span></a>





                                    <!-- Logout Modal-->

                                    <div class="modal fade" id="sil<?= $sonuc["marka_id"] ?>" tabindex="-1" role="dialog"

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

                                                <div class="modal-body">   <b><?=$sonuc['marka_id']?></b>  'Adlı Kullanıcıyı silmek istediğinizden emin misiniz?</div>

                                                <div class="modal-footer">

                                                    <button class="btn btn-secondary pull-left mx-4" type="button"

                                                            data-dismiss="modal">İptal

                                                    </button>

                                                    <a class="btn btn-danger pull-right mx-4"

                                                       href="kullanicilarSil.php?sayfa=kullanicilar&id=<?= $sonuc["id"] ?>">Sil</a>







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

            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

        </div>

        </div>

    </div>

    </div>

    <!-- /.container-fluid -->

    <?php

    include('inc/footer.php');

    ?>

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

    

    <link rel="stylesheet" type="text/css" href="../css/switch.css">





    