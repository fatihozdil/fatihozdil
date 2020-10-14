<?php require_once"header.php";
islemkontrol();

$urunsor=$db->prepare("SELECT * FROM urun where kullanici_id=:id and urun_id=:ida");
$urunsor->execute(array(
    'id' => $_SESSION['userkullanici_id'],
    'ida' => $_GET['urun_id']
));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>


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
                        <h2 class="title-section">Ürun Ekleme</h2>
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
                        <label class="col-sm-3 control-label">fotoğraf</label>
                        <div class="col-sm-9">
                          <img src="<?php echo $uruncek['urunfoto_resimyol'] ?>">
                        </div>
                    </div>  


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Yükle</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="urunfoto_resimyol" id="first-name" type="file">
                        </div>
                    </div>  
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-9">
                            <div class="custom-select">
                                <select  name="kategori_id" class='select2'>
                                 <?php $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
                                 $kategorisor->execute();
                                 while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){?>
                                    <option <?php echo $kategoricek['kategori_id']==$uruncek['kategori_id'] ? 'selected="select"' : "";?> value="<?php echo $kategoricek['kategori_id'] ?>"> <?php echo $kategoricek['kategori_ad'] ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label class="col-sm-3 control-label">Ürün Adı</label>
                    <div class="col-sm-9">
                        <input class="form-control"  name="urun_ad" required="" value="<?php echo $uruncek['urun_ad']; ?>" id="company-name" type="text">

                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-3 control-label">Açıklama</label>
                    <div class="col-sm-9">
                     <textarea id="editor1" name="urun_detay"><?php echo $uruncek['urun_detay'] ?></textarea>

                 </div>
             </div>
             <script>
              CKEDITOR.replace( 'editor1' );
          </script>
          <div class="form-group">
            <label class="col-sm-3 control-label">Fiyat</label>
            <div class="col-sm-9">
                <input class="form-control"  name="urun_fiyat" required=""value="<?php echo $uruncek['urun_fiyat'] ?> TL" id="company-name" type="text">

            </div>
        </div>  
<input type="hidden" name="eskiresim" value="<?php echo  $uruncek['urunfoto_resimyol']; ?>">
<input type="hidden" name="urun_id" value="<?php  echo $uruncek['urun_id']; ?>">



        <div class="form-group">

            <div align="right" class="col-sm-12">
                <button  name="magazaurunguncelle" class="update-btn" >Değişiklikleri Kaydet </button>

            </div>
        </div>
    </div></div></div></form>
</div></div></div></div>


<!-- Settings Page End Here -->
<?php require_once "footer.php" ?>
