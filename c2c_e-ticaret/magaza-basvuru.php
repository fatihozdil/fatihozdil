<?php require_once"header.php";
islemkontrol(); ?>

<!-- Main Banner 1 Area End Here --> 
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">

        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Settings Page Start Here -->
<div class="settings-page-area bg-secondary section-space-bottom">
    <div class="container">
        <div class="row settings-wrapper">
         <?php require_once "hesap-sidebar.php" ;?>
         <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">                <?php 
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
            <form action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form"><div class="settings-details tab-content">
                <div class="tab-pane fade active in" id="Personal">
                    <h2 class="title-section">Mağaza Başvuru İşlemleri</h2>
                    <div class="personal-info inner-page-padding"> 
            <?php if ($kullanicicek['kullanici_magaza']==0) {?>
            
         
                <div class="form-group">

                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" disabled="" value="<?php echo $kullanicicek['kullanici_mail'] ?>" id="first-name" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Banka Ad</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="kullanici_banka" value="<?php echo $kullanicicek['kullanici_banka'] ?>" id="first-name" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Iban Numaranız</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="kullanici_iban" value="<?php echo $kullanicicek['kullanici_iban'] ?>" id="first-name" type="text">
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
                <div class="form-group">
                    <label class="col-sm-3 control-label">Telefon</label>
                    <div class="col-sm-9">
                        <input class="form-control"  name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>"  id="company-name" type="text">

                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kişisel/Kurumsal</label>
                    <div class="col-sm-9">
                        <div class="custom-select">
                            <select id="kullanici_tip" name="kullanici_tip" class='select2'>
                                <option <?php echo $kullanicicek['kullanici_tip']== 'PERSONAL' ? 'selected=""'  : ""
                                ; ?> value="PERSONAL">KİŞİSEL</option>
                                <option <?php echo $kullanicicek['kullanici_tip']== 'PRIVATE_COMPANY' ? 'selected=""'  : ""
                                ; ?> value="PRIVATE_COMPANY">KURUMSAL</option>

                            </select>
                        </div>
                    </div>
                </div>

                
                <div id="tc">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">T.C</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>" id="first-name" type="text">
                    </div>
                </div>
            </div>
            <div id="kurumsal">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Firma Ünvan</label>
                    <div class="col-sm-9">
                        <input class="form-control"  name="kullanici_unvan" value="<?php echo $kullanicicek['kullanici_unvan'] ?>"  id="company-name" type="text">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Firma V.dairesi</label>
                    <div class="col-sm-9">
                        <input class="form-control"  name="kullanici_vdaire" value="<?php echo $kullanicicek['kullanici_vdaire'] ?>"  id="company-name" type="text">

                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Firma V.no</label>
                    <div class="col-sm-9">
                        <input class="form-control"  name="kullanici_vno" value="<?php echo $kullanicicek['kullanici_vno'] ?>"  id="company-name" type="text">

                    </div>
                </div> 
            </div> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Adres</label>
                <div class="col-sm-9">
                    <input class="form-control"  name="kullanici_adres" required="" value="<?php echo $kullanicicek['kullanici_adres'] ?>"  id="company-name" type="text">

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">İL</label>
                <div class="col-sm-9">
                    <input class="form-control"  name="kullanici_il" required="" value="<?php echo $kullanicicek['kullanici_il'] ?>"  id="company-name" type="text">

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">İlçe</label>
                <div class="col-sm-9">
                    <input class="form-control"  name="kullanici_ilce" required=""  value="<?php echo $kullanicicek['kullanici_ilce'] ?>"  id="company-name" type="text">

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="checkbox col-sm-9">
                    <label><input required="" type="checkbox" value="">Kullanıcı Sözleşmesini Kabul ediyorum</label>
                </div>
            </div>



            <div class="form-group">

                <div align="right" class="col-sm-12">
                    <button  name="musterimagazabasvuru" class="update-btn" >Başvuruyu Tamamla </button>

                </div>
            </div>

             <?php  } else  if ($kullanicicek['kullanici_magaza']==1) {?> <div class="alert alert-success">
                            <strong>bilgi!</strong> onay aşamasında
                        </div>


      <?php       } else  if ($kullanicicek['kullanici_magaza']==2) {?> <div class="alert alert-success">
                            <strong>bilgi!</strong> onaylandı 
                        </div>

      <?php       } ?>
        </div></div></div></form> 

    </div>  
</div>  
</div>  
</div> 
<!-- Settings Page End Here -->
<?php require_once "footer.php" ?>
<script type="text/javascript">

    $(document).ready(function(){

        $("#kullanici_tip").change(function(){

            var tip=$("#kullanici_tip").val();

            if (tip=="PERSONAL") {
                $("#kurumsal").hide();
                $("#tc").show();
            } else if (tip=="PRIVATE_COMPANY") {
             $("#kurumsal").show();
             $("#tc").hide();
         }
     }).change();

    });



</script>