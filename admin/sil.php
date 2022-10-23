<?php


session_start(); //oturum başlattık

//eğer mevcut oturum varsa sayfayı yönlendiriyoruz.


if ($_GET) {

    $sayfa = $_GET["sayfa"];
    include("../inc/vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.
    $sorgu = $baglanti->prepare("SELECT * FROM $sayfa Where id=:id");
    $sorgu->execute(['id' => (int)$_GET["id"]]);
    $sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor
    unlink('../img/' . $sonuc["foto"]);//eski dosya siliniyor. isteğe bağlı

    // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
    $where = ['id' => (int)$_GET['id']];
    $durum = $baglanti->prepare("DELETE FROM $sayfa WHERE id=:id")->execute($where);
    if ($durum) {
        header("location:$sayfa.php"); // Eğer sorgu çalışırsa index.php sayfasına gönderiyoruz.
    }
}
?>