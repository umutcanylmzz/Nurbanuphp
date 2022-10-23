<!-- Header section --><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<header class="header-section">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 ">
                    <!-- logo -->
                    <a href="index.php"  >
                        <img src="img/logo1.png" class="site-logo" style="height: 80px;" alt="">
                    </a>
                </div>
                <div class="col-xl-6 col-lg-5 mt-3">
                    <form class="header-search-form">
                        <input type="text" placeholder="Kıyafet Ara...">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5 mt-3">
                    <div class="user-panel">
                    <?php
            $linkIndex=2;
            $sorgu="select link from linkler where linkIndex=".$linkIndex;

            
            
            // Check if the user is logged in, if not then redirect him to login page
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ ?>
                
                
            
    <div class="up-item">  
    <i class="flaticon-profile"></i>  
    <a href="login.php" style="margin-right:10px;" >Giriş yap</a>  yada  <a href="register.php" class="mx-2" > Kayıt ol</a>  
    </div>
    <div class="up-item">
   <div class="shopping-card">  
   <i class="flaticon-bag"></i>    
    <span>0</span>
    </div>
   <a href="#">Sepetim	</a>
    </div>            
                            
               
          <?php  }
         
       
            else  { 
                include 'config.php';                $qry="select yetki from users WHERE id=".$_SESSION["id"];
    
                $result = mysqli_query($link,$qry);               $row=$result->fetch_assoc();
                if ($row['yetki'] == 1) {
                    include 'config.php';    
                    $qry="select yetki from users WHERE id=".$_SESSION["id"];
        
                      $result = mysqli_query($link,$qry);               $row=$result->fetch_assoc();
?>
                    
                  
                    <div class="up-item"> 
                    <i class="flaticon-profile"></i>
                     <label> Hoşgeldin  Admin  <?php echo htmlspecialchars(ucfirst( $_SESSION[ "name"] ) )  ?>   <?php echo htmlspecialchars(ucfirst( $_SESSION[ "surname"] ) )  ?>   </label> 
                    </div>
                    <div class="up-item"> 
              
                   
                   
                 
                    <a href="admin/index.php"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i>Ayarlar</a>
                    <a href="logout.php" style="margin-left: 10px;" > Çıkış Yap</a>
                </div>
              <?php  }
                else{
                    $qry1="select *from sepet where userId=".$_SESSION["id"];
        
                    $result1=mysqli_query($link,$qry1);
                    $num1=$result1->num_rows; ?>
                <div class="up-item"> 
               <i class="flaticon-profile"></i> 
                <label> İyi Alışverişler <?php echo htmlspecialchars(ucfirst($_SESSION["name"] ) )  ?>  <?php echo htmlspecialchars(ucfirst($_SESSION["surname"] ) )  ?>  </label>
                </div>
               <div class="up-item">
               <div class="shopping-card">  
                <i class="flaticon-bag"></i> 
               <span><?php echo $num1 ?></span>
                </div>
                <a href="sepetim.php">Sepetim</a>
               <a href="logout.php"  style="margin-left: 10px;"> Çıkış Yap</a>
                </div>
             <?php       }
            }
            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <!-- menu -->
            <ul class="main-menu">
                <li><a href="index.php">Anasayfa</a></li>
                <li><a href="urunler.php">Kadın</a></li>
                <li><a href="urunler.php">Erkek</a></li>
                <li><a href="#">Takı
                    <span class="new">Yeni</span>
                </a></li>
                <li><a href="#">Ayakkabı</a>
                    <ul class="sub-menu">
                        <li><a href="#">Spor</a></li>
                        <li><a href="#">Sandalet</a></li>
                        <li><a href="#">Kundura dayıı</a></li>
                        <li><a href="#">Botlar</a></li>
                        <li><a href="#">Terlik</a></li>
                    </ul>
                </li>
                
                <li><a href="İletisim.php">İletişim</a></li>
            </ul>
        </div>
    </nav>
</header>