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
          <h2 class="title-section">Giden Mesajlar</h2>
          <div class="personal-info inner-page-padding"> 






            <table class="table table-hover table-bordered text-center table-striped table-sm table-responsive">
             <thead  class="thead-dark " >
              <tr> 
                <th>#</th>
                <th>gönderim zamanı</th>
                <th>Gönderilen Kullanici</th>
                <th> durum </th>
                <th> </th>


              </tr>
            </thead>
            <tbody>
              <?php $urunsor=$db->prepare("SELECT mesaj.*,kullanici.* FROM mesaj inner join kullanici on mesaj.kullanici_gel=kullanici.kullanici_id where mesaj.kullanici_gon=:id  order by mesaj_okunma,mesaj_zaman DESC");
              $urunsor->execute(array(
                'id' => $_SESSION['userkullanici_id']));
              $sira=0;
              while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){$sira++ ?>
                <tr>

                  <td><?php echo $sira ?>  </td>
                  <td> <?php echo $uruncek['mesaj_zaman'] ?></td>
                  <td><?php echo $uruncek['kullanici_ad']." ".$uruncek['kullanici_soyad']; ?></td>
                  <td><?php if ($uruncek['mesaj_okunma']==0) {?>
                <i style="color: green;" class="fa fa-circle" aria-hidden="true">
         <?php         } else{ ?>
                  <i class="fa fa-circle" aria-hidden="true">
              <?php  } ?></td>
                  <td><center><a href="mesaj-detay-giden?mesaj_id=<?php echo $uruncek['mesaj_id']; ?>&detay=ok"><button   class="btn  btn-primary btn-xs">oku</button></a></center></td>
                   <td> <a onclick="return confirm('bu mesajı silmek istediğinizden emin misiniz? \nişlem geri alınamaz\ngönderilenden  de silinir')" href="nedmin/netting/kullanici.php?gidenmesajsil=ok&mesaj_id=<?php echo $uruncek['mesaj_id'] ?>"> <center><button class="btn btn-warning  btn-xs"> sil</button></center> </a></td>
                 
                </tr>
              <?php } ?>
            </tbody>
          </table>


        </div></div></div>
      </div></div></div></div>


      <!-- Settings Page End Here -->
      <?php require_once "footer.php" ?>
