<?php require_once "header.php" ;?>
  
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                        <ul>
                            <li><a href="index.php">Home</a><span> -</span></li>
                            <li>kayıt işlemleri</li>
                        </ul>
                    </div>
                </div>  
            </div> 

            <!-- Inner Page Banner Area End Here -->          
            <!-- Registration Page Area Start Here -->
            <div class="registration-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <h2 class="title-section">kayıt ol</h2>

                    <div class="registration-details-area inner-page-padding">
                          <?php 
                if (isset($_GET['durum'])) {
                    
                
                if ($_GET['durum']=="farklisifre") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
                </div>
                    
                <?php } elseif ($_GET['durum']=="eksiksifre") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
                </div>
                    
                <?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
                </div>
                    
                <?php } elseif ($_GET['durum']=="basarisiz") {?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
                </div>
                    
                <?php }}
                 ?>
                        <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">Ad *</label>
                                        <input placeholder="Adınızı Giriniz" required="" type="text" name="kullanici_ad" id="first-name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="last-name">Soyad *</label>
                                        <input placeholder="Soyadınızı Giriniz" required=""  type="text" id="last-name" name="kullanici_soyad"  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="email">E-mail *</label>
                                        <input placeholder="Mail Adresinizi Giriniz" required=""  type="email" id="email" name="kullanici_mail"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="phone">Telefon</label>
                                        <input placeholder="Telefon Numaranızı Giriniz" type="text" id="phone" name="kullanici_gsm"  class="form-control">
                                    </div>
                                </div>
                            </div>        
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="sifre1">Şifre *</label>
                                        <input placeholder="Şifrenizi Giriniz" required=""  type="password" id="sifre1" name="kullanici_passwordone"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="sifre2">Şifre Tekrar *</label>
                                        <input placeholder="Şifrenizi Tekrar Giriniz" required=""  type="password" id="sifre2" name="kullanici_passwordtwo" class="form-control">
                                    </div>
                                </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                           
                                    <div class="pLace-order">
                                        <button class="update-btn disabled" name="musterikaydet" type="submit">Kayıt Ol!</button>
                                    </div>
                                </div>
                       
                            </div>                                     
                         
                              
                        </form>                      
                    </div> 
                </div>
            </div>
            <!-- Registration Page Area End Here -->
           <?php require_once "footer.php"; ?>