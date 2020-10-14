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
          <h2 class="title-section">Siparişlerim</h2>
          <div class="personal-info inner-page-padding"> 






            <table class="table table-hover table-bordered text-center table-striped table-sm table-responsive">
             <thead  class="thead-dark " >
              <tr> 
                <th>#</th>
                <th>Sipariş Tarihi</th>
                <th>Ürün Adı</th>
                <th>Sipariş No </th>
                <th> </th>

              </tr>
            </thead>
            <tbody>
              <?php $urunsor=$db->prepare("SELECT urun.urun_ad ,siparis.* FROM siparis inner join urun on urun.urun_id=siparis.urun_id where siparis.kullanici_id=:id  order by siparis_zaman DESC");
              $urunsor->execute(array(
                'id' => $_SESSION['userkullanici_id']));
              $sira=0;
              while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){$sira++ ?>
                <tr>

                  <td><?php echo $sira ?>  </td>
                  <td> <?php echo $uruncek['siparis_zaman'] ?></td>
                  <td><?php echo $uruncek['urun_ad'] ?></td>
                  <td><?php echo $uruncek['siparis_id'] ?></td>
                  <td><center><a href="siparis-detay?siparis_id=<?php echo $uruncek['siparis_id']; ?>"><button   class="btn  btn-primary btn-xs">Detay</button></a></center></td>
                 
                </tr>
              <?php } ?>
            </tbody>
          </table>


        </div></div></div>
      </div></div></div></div>


      <!-- Settings Page End Here -->
      <?php require_once "footer.php" ?>
