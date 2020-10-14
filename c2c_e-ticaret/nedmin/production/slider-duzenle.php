<?php include "header.php";
$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
 $slidersor->execute(array(
  'id' => $_GET['slider_id']));
 $slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>slider ekleme <small>


            </small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />  

            <form action="../netting/islem.php" method="POST"  enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                          <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($slidercek['slider_resimyol'])>0) {?>

                    <img width="200"  src="../../<?php echo $slidercek['slider_resimyol']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../../dimg/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="slider_resimyol"   class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  type="text" name="slider_ad" id="first-name" value="<?php echo $slidercek['slider_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

                <input type="hidden" name="eski_slider" value="<?php echo $slidercek['slider_resimyol']; ?>">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">slider link<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  type="text" name="slider_link" id="first-name"  value="<?php echo $slidercek['slider_link'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="slider_sira" id="first-name"  value="<?php echo $slidercek['slider_sira'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="slider_durum" required="">
                    <option value="1" <?php echo $slidercek['slider_durum']=='1' ? 'selected=""' : "" ;?> >aktif</option>
                    <option value="0" <?php echo $slidercek['slider_durum']=='0' ? 'selected=""' : "" ;?> >pasif</option>
                  </select>
                     <input type="hidden" value="<?php echo $slidercek['slider_id'] ?>" name="slider_id">
                </div>
              </div>

              

              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="sliderupdate" class="btn btn-primary ">kaydet</button>

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