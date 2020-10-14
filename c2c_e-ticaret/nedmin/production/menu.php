<?php include "header.php";
$menusor=$db->prepare("SELECT * FROM menu");
 $menusor->execute();

 ?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>menü işlemleri <small>

            </small></h2>
            <div align="right"> <a href="menu-ekle.php"> <button class="btn btn-success btn-xs">Yeni Ekle</button></a></div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


              <thead>
                <tr>
                  <th>s.no</th>
                  <th>Menü Ad</th>
                  <th>Menü Url</th>
                  <th>Menü Sıra</th>
                  <th>Menü Durum</th>

                  <th></th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
                <?php
                $sira=0;
                 while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){$sira++?>

                 <tr>
                  <td><?php echo $sira ?></td>
                  <td><?php echo$menucek['menu_ad'] ?></td>
                  <td><?php echo$menucek['menu_url']?></td>
                  <td><?php echo$menucek['menu_sira']?></td>
                  <td><?php if($menucek['menu_durum']==1) {?>
                    
                    <button class="btn btn-success btn-xs">aktif</button>


                  <?php } else{ ?>

                    <button class="btn btn-danger btn-xs">pasif</button>
                    <?php
                  } ?>



                  </td>
                  <td><a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id'] ?>"><button class="btn btn-primary btn-xs">düzenle</button></a></td>
                  <td><center><a href="../netting/islem.php?menu_id=<?php echo$menucek['menu_id'] ?>&menusil=ok"><button class="btn btn-danger btn-xs ">sil</button></a></center></td>

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