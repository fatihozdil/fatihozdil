<?php include "header.php";

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
 $kullanicisor->execute(array(
  'id' => $_GET['kullanici_id']));

 $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

 ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mağaza İşlemleri <small>


              <?php if (isset($_GET['durum'])) {
              
             
              if ($_GET['durum']=="ok") {?>
                <b style="color:green;">işlem başarılı</b>

              <?php 
              }  elseif ($_GET['durum']=="no") {?>
                <b style="color:red;">işlem başarısız</b>
              <?php } }
              ?>
            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php $zaman=explode(" ", $kullanicicek['kullanici_zaman']) ;?>
            <form action="../netting/adminislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input disabled="" value="<?php echo$kullanicicek['kullanici_mail']  ?>" type="text"  id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kayıt tarihi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo$zaman['0']  ?>" disabled="" type="date" id="first-name" required="required" class="form-control re col-md-7 col-xs-12">
                </div>
              </div> <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kayıt saati <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input disabled="" value="<?php echo$zaman['1']  ?>" type="time"  id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanici Tip <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="kullanici_tip" disabled="" value="<?php echo$kullanicicek['kullanici_tip']  ?>" type="text" name="kullanici_tip" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                </div> 
                <div id="kurumsal">
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Firma Ünvan  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo$kullanicicek['kullanici_unvan']  ?>" type="text" name="kullanici_unvan" id="first-name"class="form-control col-md-7 col-xs-12">
                </div>
              </div>  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vergi Dairesi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo$kullanicicek['kullanici_vdaire']  ?>" type="text" name="kullanici_vdaire" id="first-name"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vergi no <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo$kullanicicek['kullanici_vno']  ?>" type="text" name="kullanici_vno" id="first-name"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              </div>
              <div id="tc">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TC <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo$kullanicicek['kullanici_tc']  ?>" type="text" name="kullanici_tc" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              </div>
                     <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  value="<?php echo$kullanicicek['kullanici_banka']  ?>" type="text" name="kullanici_banka" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>     
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IBAN <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  value="<?php echo$kullanicicek['kullanici_iban']  ?>" type="text" name="kullanici_iban" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  value="<?php echo$kullanicicek['kullanici_ad']  ?>" type="text" name="kullanici_ad" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>    <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  value="<?php echo$kullanicicek['kullanici_soyad']  ?>" type="text" name="kullanici_soyad" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">GSM <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  value="<?php echo$kullanicicek['kullanici_gsm']  ?>" type="text" name="kullanici_gsm" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                   <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adres <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  value="<?php echo$kullanicicek['kullanici_adres']  ?>" type="text" name="kullanici_adres" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>       <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İL <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  value="<?php echo$kullanicicek['kullanici_il']  ?>" type="text" name="kullanici_il" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>       <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  value="<?php echo$kullanicicek['kullanici_ilce']  ?>" type="text" name="kullanici_ilce" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kullanici_durum" required="">
                    <option value="1" <?php echo $kullanicicek['kullanici_durum']== '1' ? 'selected=""'  : ""
                    ; ?>>aktif</option>
                    <option value="0" <?php echo $kullanicicek['kullanici_durum']== '0' ? 'selected=""'  : ""
                    ; ?>>pasif</option>
                  </select>
                   <input type="hidden" value="<?php echo $kullanicicek['kullanici_id'] ?>" name="kullanici_id">
                </div>
              </div>
         
              
          
              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="magazaonaykayit" class="btn btn-primary ">Başvuruyu Onayla</button>
                     </form>
                  <a onclick="return confirm ('başvuruyu reddetmek istediğinizden emin misiniz?') " class="btn btn-danger " href="../netting/adminislem.php?magazadurum=sil&kullanici_id=<?php echo $kullanicicek['kullanici_id'] ?>">Başvuruyu Reddet</a>
             
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

   
      </div>
       </div>

      <!-- /page content -->

      <?php include"footer.php" ?>
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