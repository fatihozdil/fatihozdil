<?php include "header.php";
$urunsor=$db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>ürün işlemleri <small>

            </small></h2>
            <div align="right"> <a href="urun-ekle.php"> <button class="btn btn-success btn-xs">Yeni Ekle</button></a></div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


              <thead>
                <tr>
                  <th>s.no</th>
                  <th>ürün Ad</th>
                  <th>ürün fiyat</th>
                  <th>ürün resim işlemleri</th>
                  <th>ürün stok</th>
                  <th>ürün öne çıkar</th>
                  <th>ürün Durum</th>

                  <th></th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
                <?php
                $sira=0;
                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){$sira++?>

                 <tr>
                  <td><?php echo $sira ?></td>
                  <td><?php echo$uruncek['urun_ad'] ?></td>
                  <td><?php echo$uruncek['urun_fiyat']?></td>
                  <td><a href="urun-galeri.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-success btn-xs">resim ekle</button></a></td>
                  <td><?php echo$uruncek['urun_stok']?></td>
                  <td>
                    <?php if ($uruncek['urun_onecikar']==1) { ?>
                      <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_onecikar=0&urungosterme=ok"><button class="btn  btn-success wrap">ürün öne çıkanlarda listeleniyor</button></a>
                    <?php            } else{ ?>

                      <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_onecikar=1&urungoster=ok"><button class="btn  btn-warning wrap">ürün öne çıkanlarda listelenmiyor</button></a>

                   <?php } ?>




                 </td>

                 <td><?php if($uruncek['urun_durum']==1) {?>

                  <button class="btn btn-success btn-xs">aktif</button>


                <?php } else{ ?>

                  <button class="btn btn-danger btn-xs">pasif</button>
                  <?php
                } ?>



              </td>
              <td><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-primary btn-xs">düzenle</button></a></td>
              <td><center><a href="../netting/islem.php?urun_id=<?php echo$uruncek['urun_id'] ?>&urunsil=ok"><button class="btn btn-danger btn-xs ">sil</button></a></center></td>

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