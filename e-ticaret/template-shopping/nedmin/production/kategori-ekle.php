<?php include "header.php";


 ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>kategori düzenleme <small>


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
                <ul class="dropdown-menu" role="kategori">
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kategori ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="kategori adı" type="text" name="kategori_ad" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
          
                 <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kategori sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="kategori sıra" type="text" name="kategori_sira" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
               
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kategori durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kategori_durum" required="">
                    <option value="1" >aktif</option>
                    <option value="0">pasif</option>
                  </select>
             
                </div>
              </div>
         
              
          
              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="kategorikaydet" class="btn btn-primary ">KAYDET</button>
             
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