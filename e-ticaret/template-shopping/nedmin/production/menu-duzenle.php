<?php include "header.php";

$menusor=$db->prepare("SELECT * FROM menu where menu_id=:id");
 $menusor->execute(array(
  'id' => $_GET['menu_id']));

 $menucek=$menusor->fetch(PDO::FETCH_ASSOC);

 ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>menü düzenleme <small>


              <?php if (isset($_GET['durum'])) {
              
             
              if ($_GET['durum']=="ok") {?>
                <b style="color:green;">işlem başarılı</b>

              <?php 
              }  elseif ($_GET['durum']=="no") {?>
                <b style="color:red;">işlem başarısız</b>
              <?php } }
              ?>
            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
           
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                     <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">menü link<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input disabled="" value="<?php echo $_SERVER['HTTP_HOST'] ?>/sayfa-<?php echo$menucek['menu_ad']  ?>" type="text" name="menu_ad" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo$menucek['menu_ad']  ?>" type="text" name="menu_ad" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                   <!-- Ck Editör Başlangıç -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">          
                  <textarea id="editor1"  name="menu_detay"><?php echo $menucek['menu_detay']; ?></textarea>
                </div>
              </div>
              <script>
                        CKEDITOR.replace( 'editor1' );
                </script>

              <!-- Ck Editör Bitiş -->
                 <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo$menucek['menu_sira']  ?>" type="text" name="menu_sira" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                 <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü url<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo$menucek['menu_url']  ?>" type="text" name="menu_url" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">menü durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="menu_durum" required="">
                    <option value="1" <?php echo $menucek['menu_durum']== '1' ? 'selected=""'  : ""
                    ; ?>>aktif</option>
                    <option value="0" <?php echo $menucek['menu_durum']== '0' ? 'selected=""'  : ""
                    ; ?>>pasif</option>
                  </select>
                   <input type="hidden" value="<?php echo $menucek['menu_id'] ?>" name="menu_id">
                </div>
              </div>
         
              
          
              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="menuduzenle" class="btn btn-primary ">Güncelle</button>
             
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

   
      </div>
       </div>

      <!-- /page content -->

      <?php include"footer.php" ?>