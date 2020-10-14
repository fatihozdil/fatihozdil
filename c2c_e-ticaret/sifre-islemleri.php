<?php require_once"header.php";
islemkontrol(); ?>

<!-- Main Banner 1 Area End Here --> 
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <ul>
                <li><a href="index.htm">Home</a><span> -</span></li>
                <li>Settings</li>
            </ul>
        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Settings Page Start Here -->
<div class="settings-page-area bg-secondary section-space-bottom">
    <div class="container">
        <div class="row settings-wrapper">
         <?php require_once "hesap-sidebar.php" ;?>
         <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"> 
            <form action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">şifre bilgilerim</h2>
                        <div class="personal-info inner-page-padding"> 
                         <div class="form-group">
                            <?php 
                            if (isset($_GET['durum'])) {
                                if ($_GET['durum']=="no") {?>

                                    <div class="alert alert-danger">
                                        <strong>Hata!</strong> Kaydedilmedi
                                    </div>

                                <?php }
                                elseif ($_GET['durum']=="ok") { ?>
                                   <div class="alert alert-success">
                                    <strong>bilgi!</strong> Bilgiler Başarı ile Güncellendi
                                </div>


                            <?php     }   elseif ($_GET['durum']=="eslesmiyor") { ?>
                               <div class="alert alert-danger">
                                <strong>Hata!</strong> Gİrdiğiniz Şifreler Eşleşmiyor
                            </div> 


                        <?php }   elseif ($_GET['durum']=="yanlis") { ?>
                           <div class="alert alert-danger">
                            <strong>Hata!</strong> Şifre yanlış
                        </div>


                    <?php } elseif ($_GET['durum']=="uzunluk") { ?>
                           <div class="alert alert-danger">
                            <strong>Hata!</strong> Şifreniz en az 6 Karakter uzunluğunda olmalıdır.
                        </div>

        <?php }        } ?>     

                <div class="form-group">
                    <label class="col-sm-3 control-label">Eski Şifre</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="kullanici_eskisifre" placeholder="eski şifrenizi giriniz" id="first-name" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Yeni Şifre</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="kullanici_passwordone" placeholder="yeni şifrenizi giriniz" id="first-name" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Yeni Şifre Tekrar</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="kullanici_passwordtwo"placeholder="yeni şifrenizi tekrar giriniz"id="first-name" type="text">
                    </div>
                </div>
                <div class="form-group">


                 <div class="form-group">

                    <div align="right" class="col-sm-12">
                        <button  name="musterisifreguncelle" class="update-btn" >Güncelle </button>

                    </div>
                </div>

            </div>                                        
        </div> 
    </div> 

</div>                                       
</div> 

</form> 
</div>  
</div>  
</div>  
</div> 
<!-- Settings Page End Here -->
<?php require_once "footer.php" ?>