<?php require_once "header.php" ;?>

<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <ul>
                <li><a href="index.php">Home</a><span> -</span></li>
                <li>giriş işlemleri</li>
            </ul>
        </div>
    </div>  
</div> 

<!-- Inner Page Banner Area End Here -->          
<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary section-space-bottom">
    <div class="container">
        <h2 class="title-section">Gitiş Yap</h2>

        <div class="registration-details-area inner-page-padding">
           
           <?php 
           if (isset($_GET['durum'])) {
            if ($_GET['durum']=="hata") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> e-posta veya şifre yanlış
                </div>
                
            <?php }
            elseif ($_GET['durum']=="exit") { ?>
             <div class="alert alert-success">
                <strong>bilgi!</strong> Başarı ile Çıkış Yapıldı
            </div>
            
            
        <?php     } elseif ($_GET['durum']=="captchahata") { ?>
             <div class="alert alert-danger">
                <strong>bilgi!</strong> Güvenlik kodu yanlış
            </div>
            
            
        <?php     }


    } ?>    
     <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">      
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                           
                <div class="form-group">
                    <label class="control-label" for="email">E-mail *</label>
                    <input placeholder="Mail Adresinizi Giriniz" required=""  type="email" id="email" name="kullanici_mail"  class="form-control">
                </div>
            </div>
            
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                          
                <div class="form-group">
                    <label class="control-label" for="sifre1">Şifre *</label>
                    <input placeholder="Şifrenizi Giriniz" required=""  type="password" id="sifre1" name="kullanici_password"  class="form-control">
                </div>
            </div>
            <div class="col-sm-6">  
                           
                <div class="form-group">
                    <label class="control-label" for="email">Güvenlik Kodu *</label>
                    <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
                    <a class="btn btn-danger btn-xs" href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Değiştir ]</a>
                </div>
            </div>
            
            
            <div class="col-sm-6">                                          
                <div class="form-group">
                    <label class="control-label" for="sifre1">Güvenlik Kodu giriniz *</label>
                    <input placeholder="Güvenli Kodunu  Giriniz" required=""  type="text" id="lastname" name="captcha_code"  class="form-control">
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                           
                <div class="pLace-order">
                    <button class="update-btn disabled" name="musterigiris" type="submit">Giriş Yap</button>
                </div>
            </div>
            
        </div>
        
    </form>                      
</div> 
</div>
</div>
<!-- Registration Page Area End Here -->
<?php require_once "footer.php"; ?>