<?php include "header.php";

$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
  'id' => $_GET['urun_id']));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>ürün düzenleme <small>


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
                  <ul class="dropdown-menu" role="urun">
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

              <form action="../netting/adminislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                        <label class="col-sm-3 control-label">fotoğraf</label>
                        <div class="col-sm-9">
                          <img width="400" src="../../<?php echo $uruncek['urunfoto_resimyol'] ?>">
                        </div>
                    </div>  

               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kategori seç <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <?php
                    $urun_id=$uruncek['kategori_id'];
                   $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_ust=:ust order by kategori_sira ");
                   $kategorisor->execute(array(
                    'ust' => 0));
                  ?>
                 <select class="select2_multiple form-control" required="" name="kategori_id">
                  <?php
                   while (
                   $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {
                    $kategori_id=$kategoricek['kategori_id'];  ?>
                    <option <?php  if ($kategori_id==$urun_id) {
                      echo "selected='select'";} ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>
                    <?php
                   }
                   ?>

                 </select>
               </div>
             </div>

             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ürün ad <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input value="<?php echo$uruncek['urun_ad']  ?>"  disabled=""  type="text"   id="first-name" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <!-- Ck Editör Başlangıç -->

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ürün detay <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">          
                <textarea id="editor1" disabled=""  ><?php echo $uruncek['urun_detay']; ?></textarea>
              </div>
            </div>
            <script>
              CKEDITOR.replace( 'editor1' );
            </script>

            <!-- Ck Editör Bitiş -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ürün fiyat<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input value="<?php echo$uruncek['urun_fiyat']  ?>"  disabled=""  type="text"  id="first-name" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
        

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ürün öne çıkar<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="urun_onecikar" required="">
                  <option value="1" <?php echo $uruncek['urun_onecikar']== '1' ? 'selected=""'  : ""
                  ; ?>>evet</option>
                  <option value="0" <?php echo $uruncek['urun_onecikar']== '0' ? 'selected=""'  : ""
                  ; ?>>hayır</option>
                </select>
                <input type="hidden" value="<?php echo $uruncek['urun_id'] ?>" name="urun_id">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ürün yayınla<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="urun_durum" required="">
                  <option value="1" <?php echo $uruncek['urun_durum']== '1' ? 'selected=""'  : ""
                  ; ?>>yayınla</option>
                  <option value="0" <?php echo $uruncek['urun_durum']== '0' ? 'selected=""'  : ""
                  ; ?>>yayınlama</option>
                </select>
                <input type="hidden" value="<?php echo $uruncek['urun_id'] ?>" name="urun_id">
              </div>
            </div>



            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="urunduzenle" class="btn btn-primary ">kaydet</button>

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