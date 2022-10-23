<?php
session_start();

$db=new mysqli("sql305.epizy.com","epiz_32830441","smBeU2Sp4rQHaFb","epiz_32830441_nurbanu");
mysqli_set_charset($db,"utf8");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    echo "Lütfen önce giriş yapın.";
}
else {
  
    
        $sorgu="insert into sepet(id, userId) values(".$_POST['id'].", ".$_SESSION['id'].")";
        $sonuc=$db->query($sorgu);
    
}
?>