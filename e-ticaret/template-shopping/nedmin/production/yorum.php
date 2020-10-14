<?php include "header.php";
$yorumsor=$db->prepare("SELECT * FROM yorum order by yorum_id DESC");
$yorumsor->execute();

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>yorum işlemleri <small>

            </small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


              <thead>
                <tr>
                  <th>s.no</th>
                  <th>yorum  yapan kişi Adı</th>
                  <th>yorum detay </th>
                  <th></th>

                  <th></th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
                <?php



                $sira=0;
                while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)){$sira++ ;
                  $ykullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
                  $ykullanicisor->execute(array(
                    'id' => $yorumcek['kullanici_id']));

                    $ykullanicicek=$ykullanicisor->fetch(PDO::FETCH_ASSOC); ?>
                   

                    <tr>
                      <td><?php echo $sira ?></td>
                      <td><?php echo$ykullanicicek['kullanici_adsoyad'] ?></td>
                      <td><?php echo$yorumcek['yorum_detay']?></td>
                      <td><?php if ($yorumcek['yorum_durum']==0) { ?>
                   <a href="../netting/islem.php?yorum_id=<?php echo$yorumcek['yorum_id'] ?>&yorumgoster=1"><button class="btn btn-success btn-xs ">Onayla</button></a>
              <?php        }  else{ ?>
                    <button disabled="" class="btn btn-success btn-xs ">Onaylandı</button>
       <?php       }

              ?></td>

                      <td><a href="yorum-duzenle.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>"><button class="btn btn-primary btn-xs">düzenle</button></a></td>
                      <td><center><a href="../netting/islem.php?yorum_id=<?php echo$yorumcek['yorum_id'] ?>&yorumsil=ok"><button class="btn btn-danger btn-xs ">sil</button></a></center></td>

                    </tr>









                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <!-- /page content -->

  <?php include"footer.php" ?>