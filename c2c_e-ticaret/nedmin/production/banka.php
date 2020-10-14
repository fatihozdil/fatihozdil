<?php include "header.php";
$bankasor=$db->prepare("SELECT * FROM banka order by banka_id ASC");
 $bankasor->execute();

 ?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>bankaler işlemleri <small>

            </small></h2>
            <div align="right"> <a href="banka-ekle.php"> <button class="btn btn-success btn-xs">Yeni Ekle</button></a></div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


              <thead>
                <tr>
                  <th>s.no</th>
                  <th>bankaler Ad</th>
                  <th>bankaler iban</th>
                  <th>bankaler hesap ad soyad</th>
                  <th>bankaler Durum</th>

                  <th></th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
                <?php
                $sira=0;
                 while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)){$sira++?>

                 <tr>
                  <td><?php echo $sira ?></td>
                  <td><?php echo$bankacek['banka_ad'] ?></td>
                  <td><?php echo$bankacek['banka_iban']?></td>
                  <td><?php echo$bankacek['banka_hesapadsoyad']?></td>
                  <td><?php if($bankacek['banka_durum']==1) {?>
                    
                    <button class="btn btn-success btn-xs">aktif</button>


                  <?php } else{ ?>

                    <button class="btn btn-danger btn-xs">pasif</button>
                    <?php
                  } ?>



                  </td>
                  <td><a href="banka-duzenle.php?banka_id=<?php echo $bankacek['banka_id'] ?>"><button class="btn btn-primary btn-xs">düzenle</button></a></td>
                  <td><center><a href="../netting/islem.php?banka_id=<?php echo$bankacek['banka_id'] ?>&bankasil=ok"><button class="btn btn-danger btn-xs ">sil</button></a></center></td>

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