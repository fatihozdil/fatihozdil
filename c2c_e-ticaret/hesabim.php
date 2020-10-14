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


                            <?php     }


                        } ?>  

                <form enctype="multipart/form-data"  action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">kişisel bilgilerim</h2>
                        <div class="personal-info inner-page-padding"> 
                         <div class="form-group">
                          
        

                        <div class="form-group">

                            <label class="col-sm-3 control-label">Profil resimi</label>
                           <div class="col-sm-9">
                               <img src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>">
                           </div>
                       </div> 
                       <div class="form-group">


                        <label class="col-sm-3 control-label">Resim Yükle</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="kullanici_magazafoto" id="first-name" type="file">
                        </div>
                    </div>   
                    <div class="form-group">
                     <label class="col-sm-3 control-label">Email</label>
                     <div class="col-sm-9">
                        <input class="form-control" disabled="" value="<?php echo $kullanicicek['kullanici_mail'] ?>" id="first-name" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Ad</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad'] ?>" id="first-name" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Soyad</label>
                    <div class="col-sm-9">
                        <input class="form-control"  name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad'] ?>"  id="last-name" type="text">
                    </div>
                </div>
                <input type="hidden" name="eskiresim" value="<?php echo $kullanicicek['kullanici_magazafoto'] ?>" name="">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Telefon</label>
                    <div class="col-sm-9">
                        <input class="form-control"  name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>"  id="company-name" type="text">

                    </div>
                </div>

                <div class="form-group">

                    <div align="right" class="col-sm-12">
                        <button  name="musterikullaniciguncelle" class="update-btn" >Güncelle </button>

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
</div> 
<!-- Settings Page End Here -->
<?php require_once "footer.php" ?>