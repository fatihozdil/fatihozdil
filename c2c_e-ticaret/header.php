<!doctype html>
<?php include'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
date_default_timezone_set('Europe/Istanbul');
//ayarlar veri çekme
$ayarsor=$db->prepare("SELECT * FROM  ayar where ayar_id=:id");
$ayarsor->execute(array(
    'id' => 0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['userkullanici_mail'])) {
    $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
    $kullanicisor->execute(array(
        'mail' => $_SESSION['userkullanici_mail']));
    $say=$kullanicisor->rowcount();
    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

    if (!isset($_SESSION['userkullanici_id'])) {
        $_SESSION['userkullanici_id']=$kullanicicek['kullanici_id'];
    }
}
if (isset($_SESSION['userkullanici_sonzaman']) and isset($_SESSION['userkullanici_id'])) {


$kullanici_sonzaman=$_SESSION['userkullanici_sonzaman'];
$suan=time();
$fark=($suan-$kullanici_sonzaman);
if ($fark>10) { 

    $sonzaman=$db->prepare("UPDATE kullanici set

        kullanici_sonzaman=:kullanici_sonzaman
        where kullanici_id={$_SESSION['userkullanici_id']}
        ");
    $update=$sonzaman->execute(array(

        'kullanici_sonzaman' => date('Y-m-d H:i:s')
    ));
    $_SESSION['userkullanici_sonzaman']=strtotime(date("Y-m-d H:i:s"));

}
}
if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {
    exit('erişim yasak');
}

?>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo$ayarcek['ayar_decription'];  ?>">
    <meta name="keywords" content="<?php echo$ayarcek['ayar_keywords'];  ?>">
    <meta name="author" content="<?php echo$ayarcek['ayar_author'];  ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (empty($title)) {
        echo $ayarcek['ayar_title'];
    } else {
        echo $title;
    } ?></title>

    <!-- ck editör -->
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img\favicon.png">

    <!-- Normalize CSS --> 
    <link rel="stylesheet" href="css\normalize.css">

    <!-- Main CSS -->         
    <link rel="stylesheet" href="css\main.css">

    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="css\bootstrap.min.css">

    <!-- Animate CSS --> 
    <link rel="stylesheet" href="css\animate.min.css">

    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="css\font-awesome.min.css">
    
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="vendor\OwlCarousel\owl.carousel.min.css">
    <link rel="stylesheet" href="vendor\OwlCarousel\owl.theme.default.min.css">
    
    <!-- Main Menu CSS -->      
    <link rel="stylesheet" href="css\meanmenu.min.css">

    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="css\jquery.datetimepicker.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="css\select2.min.css">

    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="css\reImageGrid.css">

    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="css\hover-min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Modernizr Js -->
    <script src="js\modernizr-2.8.3.min.js"></script>

</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Add your site or application content here -->
        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <!-- Main Body Area Start Here -->
        <div id="wrapper">
            <!-- Header Area Start Here -->
            <header>                
                <div id="header2" class="header2-area right-nav-mobile">
                    <div class="header-top-bar">
                        <div class="container">
                            <div class="row">                         
                                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
                                    <div class="logo-area">
                                        <a href="index.php"><img class="img-responsive" src="<?php echo $ayarcek['ayar_logo']; ?>" alt="logo"></a>
                                    </div>
                                </div> 
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">

                                   <ul class="profile-notification">                                            
                                    <li>
                                        <div class="notify-contact"><span>Need help?</span> Talk to an expert: +61 3 8376 6284</div>
                                    </li>
                                    <?php if (isset($_SESSION['userkullanici_mail'])) { ?>
                                        <li>
                                            <div class="notify-notification">
                                                <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i><span>8</span></a>
                                                <ul>
                                                    <li>
                                                        <div class="notify-notification-img">
                                                            <img  class="img-responsive" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>" alt="profile">
                                                        </div>
                                                        <div class="notify-notification-info">
                                                            <div class="notify-notification-subject">Need WP Help!</div>
                                                            <div class="notify-notification-date">01 Dec, 2016</div>
                                                        </div>
                                                        <div class="notify-notification-sign">
                                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="notify-notification-img">
                                                            <img class="img-responsive" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>" alt="profile">
                                                        </div>
                                                        <div class="notify-notification-info">
                                                            <div class="notify-notification-subject">Need HTML Help!</div>
                                                            <div class="notify-notification-date">01 Dec, 2016</div>
                                                        </div>
                                                        <div class="notify-notification-sign">
                                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="notify-notification-img">
                                                            <img class="img-responsive" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>" alt="profile">
                                                        </div>
                                                        <div class="notify-notification-info">
                                                            <div class="notify-notification-subject">Psd Template Help!</div>
                                                            <div class="notify-notification-date">01 Dec, 2016</div>
                                                        </div>
                                                        <div class="notify-notification-sign">
                                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="notify-message">
                                                <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><span><?php 
                                                $say=$db->prepare("SELECT COUNT(mesaj_okunma) as sonuc from mesaj where mesaj_okunma=:id and kullanici_gel=:kullanici_id ");
                                                $say->execute(array(
                                                    'id' => 0,
                                                    'kullanici_id'=> $_SESSION['userkullanici_id']));
                                                $vericek=$say->fetch(PDO::FETCH_ASSOC);
                                                echo $vericek['sonuc']; ?></span></a>
                                                <ul>

                                                 <?php $urunsor=$db->prepare("SELECT mesaj.*,kullanici.* FROM mesaj inner join kullanici on mesaj.kullanici_gon=kullanici.kullanici_id where kullanici_gel=:id  order by mesaj_okunma,mesaj_zaman DESC limit 3");
                                                 $urunsor->execute(array(
                                                    'id' => $_SESSION['userkullanici_id']));

                                                    while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {?>
                                                        <li>
                                                            <div class="notify-message-img">
                                                                <img class="img-responsive" src="<?php echo $uruncek['kullanici_magazafoto'] ?>" alt="profile">
                                                            </div>
                                                            <div class="notify-message-info">
                                                                <div class="notify-message-sender"><?php echo $uruncek['kullanici_ad']." ".$uruncek['kullanici_soyad'] ?></div>
                                                                <div class="notify-message-subject"><?php echo mb_substr($uruncek['mesaj_detay'],0,8)?>...</div>
                                                                <div class="notify-message-date"><?php echo $uruncek['mesaj_zaman'] ?></div>
                                                            </div>
                                                            <div class="notify-message-sign">
                                                                <a href="mesaj-detay?mesaj_id=<?php echo $uruncek['mesaj_id']; ?>"><i <?php if ($uruncek['mesaj_okunma']==0) { ?>
                                                                  style="color: orange;"
                                                                  <?php   } ?> class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                                              </div>
                                                          </li>
                                                      <?php } ?>
                                                  </ul>
                                              </div>
                                          </li>



                                          <li>
                                            <div class="user-account-info">
                                                <div class="user-account-info-controler">
                                                    <div class="user-account-img">
                                                        <img style="border-radius: 30px " width="34" height="34" class="img-responsive" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>" alt="profile">
                                                    </div>
                                                    <div class="user-account-title">
                                                        <div class="user-account-name"><?php echo $kullanicicek['kullanici_ad']." ". $kullanicicek['kullanici_soyad'] ;?></div>
                                                        <div class="user-account-balance"><?php 
                                                        $urunsor=$db->prepare("SELECT sum(urun_fiyat) as toplam FROM siparis_detay where kullanici_idsatici=:id  ");
                                                        $urunsor->execute(array(
                                                            'id' => $_SESSION['userkullanici_id']));
                                                        $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
                                                        if (isset($uruncek['toplam'])) {
                                                        echo $uruncek['toplam']." "."TL";
                                                            
                                                        }else{

                                                        echo "0 TL";

                                                        }

                                                            ?></div>
                                                        </div>
                                                        <div class="user-account-dropdown">
                                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li><a href="hesabim">hesab bilgilerim</a></li>

                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a class="apply-now-btn" href="logout" id="logout-button">çıkış yap</a></li>

                                        <?php           }  else {?>
                                            <li><a class="apply-now-btn" href="login">giriş yap</a></li>
                                            <li><a class="apply-now-btn-color hidden-on-mobile" href="register">kayıt ol</a></li>

                                        <?php }?>
                                    </ul>
                                </div>                          
                            </div>                          
                        </div>
                    </div>
                    <div class="main-menu-area bg-primaryText" id="sticker">
                        <div class="container">
                            <nav id="desktop-nav">
                                <ul>
                                    <li class="active"><a href="index">Anasayfa</a></li>
                                    <li ><a href="kategoriler">Kategoriler</a></li>

                                    <?php $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_onecikar=:one_cikar order by kategori_sira ASC");
                                    $kategorisor->execute(array(
                                        'one_cikar' => 1));
                                        while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){ ?>

                                            <li ><a href="kategoriler-<?=seo($kategoricek['kategori_ad'])."-".$kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu Area Start -->
                    <div class="mobile-menu-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mobile-menu">
                                        <nav id="dropdown">
                                            <ul>
                                              <li class="active"><a href="index">Anasayfa</a></li>
                                    <li ><a href="kategoriler">Kategoriler</a></li>
                                    <li ><a href="login">giriş yap    </a></li>
                                    <li ><a href="register">kayıt ol</a></li>

                                    <?php $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_onecikar=:one_cikar order by kategori_sira ASC");
                                    $kategorisor->execute(array(
                                        'one_cikar' => 1));
                                        while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){ ?>

                                            <li ><a href="kategoriler-<?=seo($kategoricek['kategori_ad'])."-".$kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></a></li>
                                        <?php } ?>   



                                            </ul>
                                        </nav>
                                    </div>           
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!-- Mobile Menu Area End -->
                </header>
            <!-- Header Area End Here -->