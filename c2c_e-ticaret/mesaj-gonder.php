<?php require_once"header.php";
islemkontrol();

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
 $kullanicisor->execute(array(
  'id' => $_GET['kullanici_gel']));

 $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC); ?>

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
            <form action="nedmin/netting/kullanici.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Mesaj gönderme İşlemleri</h2>
                        <div class="personal-info inner-page-padding"> 
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
                 



                   
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gönderilen Kullanıcı</label>
                        <div class="col-sm-9">
                            <input class="form-control"  disabled="" value="<?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad'] ?>"  id="company-name" type="text">
                            <input type="hidden" name="kullanici_gel" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                        </div>
                    </div>  
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Mesaj</label>
                        <div class="col-sm-9">
                               <textarea id="editor1" placeholder="mesajınızı yazınız"  name="mesaj_detay"></textarea>

                        </div>
                    </div>
  <script>
              CKEDITOR.replace( 'editor1' );
            </script>
                <div class="form-group">
               
                   


                    <div class="form-group">

                        <div align="right" class="col-sm-12">
                            <button  name="mesajgonder" class="update-btn" >Gönder</button>

                        </div>
                    </div>
                </div></div></div></form>
            </div></div></div></div>


            <!-- Settings Page End Here -->
            <?php require_once "footer.php" ?>
         