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

      <div class="settings-details tab-content">
        <div class="tab-pane fade active in" id="Personal">
          <h2 class="title-section">Ürünlerim</h2>
          <div class="personal-info inner-page-padding"> 






            <table class="table table-hover table-bordered text-center table-striped table-sm table-responsive">
             <thead  class="thead-dark " >
              <tr> 
                <th>#</th>
                <th>Kayıt Tarihi</th>
                <th>Ürün Adı</th>
                <th> </th>
                <th> </th>

              </tr>
            </thead>
            <tbody>
              <?php $urunsor=$db->prepare("SELECT * FROM urun where kullanici_id=:id  order by urun_id DESC");
              $urunsor->execute(array(
                'id' => $_SESSION['userkullanici_id']));
              $sira=0;
              while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){$sira++ ?>
                <tr>

                  <td><?php echo $sira ?>  </td>
                  <td> <?php echo $uruncek['urun_zaman'] ?></td>
                  <td><?php echo $uruncek['urun_ad'] ?></td>
                  <td><center><a href="urun-duzenle?urun_id=<?php echo $uruncek['urun_id']; ?>"><button   class="btn  btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><?php if ($uruncek['urun_durum']==0) {?>
                    <center><button class="btn btn-warning  btn-xs">ürün yönetici onayı bekliyor</button></center>
                  <?php              } else{?>
                  <a onclick="return confirm('bu ürünü silmek istediğinizden emin misiniz? \nişlem geri alınamaz')" href="nedmin/netting/kullanici.php?urunsil=ok&urun_id=<?php echo $uruncek['urun_id'] ?>&urunfoto=<?php echo $uruncek['urunfoto_resimyol']?>"> <center><button class="btn btn-warning  btn-xs"> kaldır</button></center> </a> <?php }?>

                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>


        </div></div></div>
      </div></div></div></div>


      <!-- Settings Page End Here -->
      <?php require_once "footer.php" ?>
