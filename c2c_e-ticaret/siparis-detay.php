<?php require_once"header.php";
islemkontrol(); ?>
<head>
  <style type="text/css">
    input {

      margin-left: 20px !important;
    }
  </style>
</head>
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

      <div class="settings-details tab-content">
        <div class="tab-pane fade active in" id="Personal">
          <h2 class="title-section">Siparişlerim</h2>
          <div class="personal-info inner-page-padding"> 






            <table class="table table-hover table-bordered text-center table-striped table-sm table-responsive">
             <thead  class="thead-dark " >
              <tr> 
                <th>#</th>
                <th></th>
                <th>Sipariş Tarihi</th>
                <th>Ürün Adı</th>
                <th>Sipariş No </th>
                <th>Satıcı</th>
                <th> </th>

              </tr>
            </thead>
            <tbody>
              <?php $urunsor=$db->prepare("SELECT urun.urun_ad,urun.urunfoto_resimyol,urun.kullanici_id,urun.urun_id ,siparis.*,siparis_detay.*,kullanici.kullanici_id,kullanici.kullanici_ad,kullanici.kullanici_soyad FROM siparis inner join urun on urun.urun_id=siparis.urun_id inner join kullanici on kullanici.kullanici_id=siparis.kullanici_idsatici inner join siparis_detay on siparis_detay.siparis_id=siparis.siparis_id where siparis.kullanici_id=:id and siparis.siparis_id=:siparisid  order by siparis_zaman DESC");
              $urunsor->execute(array(
                'id' => $_SESSION['userkullanici_id'],
                'siparisid'=> $_GET['siparis_id']));
              $sira=0;
              while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){$sira++;
                $siparisdetay_onay=$uruncek['siparisdetay_onay'];
                $siparisdetay_yorum=$uruncek['siparisdetay_yorum'];
                $urun_id=$uruncek['urun_id'];
               ?>
                <tr>

                  <td><?php echo $sira ?>  </td>
                  <td><img width="100"  src="<?php echo $uruncek['urunfoto_resimyol']; ?>"> </td>
                  <td> <?php echo $uruncek['siparis_zaman'] ?></td>
                  <td><?php echo $uruncek['urun_ad'] ?></td>
                  <td><?php echo $uruncek['siparis_id'] ?></td>
                  <td><?php echo $uruncek['kullanici_ad']." ".$uruncek['kullanici_soyad'] ?></td>

                  <?php if ($uruncek['siparisdetay_onay']==1) { ?>
                 <td><center><a onclick="return confirm('are you sure?')" href="nedmin/netting/kullanici.php?siparisd=<?php echo $uruncek['siparisdetay_id'] ?>&onay=<?php echo $uruncek['siparis_id'] ?>&durum=ok"><button   class="btn  btn-warning btn-xs">ödemeyi onayla</button></a></center></td>
            
              <?php    } else if ($uruncek['siparisdetay_onay']==2) { ?>

                  <td><center><button   class="btn  btn-success btn-xs">onaylandı</button></center></td>

        <?php      } else if ($uruncek['siparisdetay_onay']==0) { ?>

                  <td><center><button   class="btn  btn-success btn-xs">teslim edilmesi bekleniyor</button></center></td>

        <?php      } ?> 
                </tr>
              <?php } ?>
            </tbody>
          </table>
<?php 
if ($siparisdetay_onay==2 and $siparisdetay_yorum==0) { ?>


                <form enctype="multipart/form-data"  action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Deneyimini Diğer Kullanıcılarla Paylaş</h2>
                        <div class="personal-info inner-page-padding"> 
                         <div class="form-group">
                          
        

                      
                    <div class="form-group">
                     <label class="col-sm-3 control-label">puanla</label>
                     <div class="col-sm-9">
                      <input  name="yorum_puan" type="radio" value="1"> 1
                      <input name="yorum_puan"  type="radio" value="2"> 2
                      <input  name="yorum_puan"  type="radio"value="3"> 3
                      <input  name="yorum_puan"  type="radio"value="4"> 4
                      <input name="yorum_puan"  type="radio"value="5"> 5
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">yorumunuz</label>
                    <div class="col-sm-9">
                        <textarea style="height: 200px" class="form-control" name="yorum_detay"   type="text"></textarea> 
                    </div>
                </div>
              <input type="hidden" name="urun_id" value="<?php echo $urun_id ?>">
              <input type="hidden" name="siparis_id" value="<?php echo $_GET['siparis_id'] ?>">

                <div class="form-group">

                    <div align="right" class="col-sm-12">
                        <button  name="puanyorumekle" class="update-btn" >Güncelle </button>

                    </div>
                </div>
            </div>                                        
        </div> 
    </div> 

</div> 
</form>    
 <?php } elseif($siparisdetay_onay==2 and $siparisdetay_yorum==1) {?>

  <p>yorum yaptın</p>
<?php } ?>
        </div>





      </div></div>
      </div></div></div></div>


      <!-- Settings Page End Here -->
      <?php require_once "footer.php" ?>
