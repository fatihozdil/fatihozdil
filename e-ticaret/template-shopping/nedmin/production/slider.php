<?php include "header.php";
$slidersor=$db->prepare("SELECT * FROM slider");
 $slidersor->execute();

 ?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>slider işlemleri <small>

            </small></h2>
            <div align="right"> <a href="slider-ekle.php"> <button class="btn btn-success btn-xs">Yeni Ekle</button></a></div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


              <thead>
                <tr>
                  <th>s.no</th>
                  <th>slider resim</th>
                  <th>slider ad</th>
                  <th>slider link</th>
                  <th>slider sıra</th>
                  <th>slider durum</th>

                  <th></th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
                <?php
                $sira=0;
                 while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){$sira++?>

                 <tr>
                  <td><?php echo $sira ?></td>
                  <td><img width="120" src="../../<?php echo$slidercek['slider_resimyol'] ?>"></td>
                  <td><?php echo$slidercek['slider_ad']?></td>
                  <td><?php echo$slidercek['slider_link']?></td>
                  <td><?php echo$slidercek['slider_sira']?></td>
                  <td><?php if($slidercek['slider_durum']==1) {?>
                    
                    <button class="btn btn-success btn-xs">aktif</button>


                  <?php } else{ ?>

                    <button class="btn btn-danger btn-xs">pasif</button>
                    <?php
                  } ?>



                  </td>
                  <td><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id'] ?>&slider_resim=<?php echo $slidercek['slider_resimyol'] ?>"><button class="btn btn-primary btn-xs">düzenle</button></a></td>
                  <td><center><a href="../netting/islem.php?slider_id=<?php echo$slidercek['slider_id'] ?>&slidersil=ok&slider_yol=<?php echo $slidercek['slider_resimyol']?>"><button class="btn btn-danger btn-xs ">sil</button></a></center></td>

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