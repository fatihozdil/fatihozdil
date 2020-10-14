<?php include "header.php";
$kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
 $kategorisor->execute();

 ?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>kategoriler işlemleri <small>

            </small></h2>
            <div align="right"> <a href="kategori-ekle.php"> <button class="btn btn-success btn-xs">Yeni Ekle</button></a></div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


              <thead>
                <tr>
                  <th>s.no</th>
                  <th>kategoriler Ad</th>
                  <th>kategoriler Sıra</th>
                  <th>kategoriler Durum</th>

                  <th></th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
                <?php
                $sira=0;
                 while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){$sira++?>

                 <tr>
                  <td><?php echo $sira ?></td>
                  <td><?php echo$kategoricek['kategori_ad'] ?></td>
                  <td><?php echo$kategoricek['kategori_sira']?></td>
                  <td><?php if($kategoricek['kategori_durum']==1) {?>
                    
                    <button class="btn btn-success btn-xs">aktif</button>


                  <?php } else{ ?>

                    <button class="btn btn-danger btn-xs">pasif</button>
                    <?php
                  } ?>



                  </td>
                  <td><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>"><button class="btn btn-primary btn-xs">düzenle</button></a></td>
                  <td><center><a href="../netting/islem.php?kategori_id=<?php echo$kategoricek['kategori_id'] ?>&kategorisil=ok"><button class="btn btn-danger btn-xs ">sil</button></a></center></td>

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