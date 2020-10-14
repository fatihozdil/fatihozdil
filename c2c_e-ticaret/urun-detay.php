<?php require_once "header.php"; 
$urunsor=$db->prepare("SELECT urun.*,kullanici.* from urun inner join kullanici on urun.kullanici_id=kullanici.kullanici_id where urun_durum=:durum and urun_id=:id");
$urunsor->execute(array(
    'durum' => 1,
    'id' => $_GET['urun_id']));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);


?>
<!-- Main Banner 1 Area Start Here -->
<div class="inner-banner-area">
    <div class="container">
        <div class="inner-banner-wrapper">
            <p><?php echo $uruncek['urun_ad']; ?></p>

        </div>
    </div>
</div>
<!-- Main Banner 1 Area End Here --> 
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">

        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Product Details Page Start Here -->
<div class="product-details-page bg-secondary">                
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                <div class="inner-page-main-body">
                    <div class="single-banner">
                        <img src="<?php echo $uruncek['urunfoto_resimyol']; ?>" alt="<?php echo $uruncek['urun_ad']; ?>" class="img-responsive">
                    </div>                                

                            <!--     <div class="product-tag-line">
                                    <ul class="product-tag-item">
                                        <li><a href="#">Live Preview</a></li>
                                        <li><a href="#">Screenshots</a></li>
                                        <li><a href="#">Documentation</a></li>
                                    </ul>
                                    <ul class="social-default">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div> -->
                                <div class="product-details-tab-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <ul class="product-details-title">
                                                <li class="active"><a href="#description" data-toggle="tab" aria-expanded="false">Ürün Açıklaması</a></li>
                                                <li><a href="#review" data-toggle="tab" aria-expanded="false">Yorumlar</a></li>

                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="description">
                                                   <p><?php echo $uruncek['urun_detay']; ?></p>
                                               </div>
                                               <div class="tab-pane fade" id="review">
                                                <div class="container">
                                                  <div class="row">
                                                      <div class="col-md-8">
                                                          <div class="comments-list">
                                                              <?php $yorumsor=$db->prepare("SELECT kullanici.*,yorum.* from yorum inner join kullanici on kullanici.kullanici_id=yorum.kullanici_id where yorum.urun_id=:id");
                                                              $yorumsor->execute(array(
                                                                'id' => $_GET['urun_id']));

                                                              while ($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {


                                                               ?>
                                                               <div class="media">
                                                                  <div class="media-body">
                                                                      <h4 class="media-heading user_name"><img style="border-radius: 30px; float: left;margin-right: 10px ;" width="32" height="32" class="img-responsive" src="<?php echo $uruncek['kullanici_magazafoto'] ?> " alt="profil_resmi"><?php echo $yorumcek['kullanici_ad']." ".$yorumcek['kullanici_soyad'] ?> 
                                                                      <ul style="float: right;" class="default-rating">
                                                                          <?php switch ($yorumcek['yorum_puan']) {
                                                                              case '5': ?>

                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <?php 
                                                                              break;
                                                                              case '4': ?>

                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <?php 
                                                                              break;

                                                                              case '3': ?>

                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                      
                                                                              <?php 
                                                                              break;

                                                                              case '2': ?>

                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                            
                                                                              <?php 
                                                                              break;

                                                                              case '1': ?>

                                                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                              <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                                                             
                                                                              <?php 
                                                                              break;


                                                                            }  ?>

                                                                              <li>(<span> <?php echo $yorumcek['yorum_puan'] ?></span> )</li>

                                                                          </ul>
                                                                     </h4>


                                                                      <?php   echo $yorumcek['yorum_detay']; ?>
                                                                  </div>
                                                              </div>
                                                              <hr>
                                                          <?php } ?>
                                                      </div>


                                                  </div>
                                              </div>                    
                                          </div>                    
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div> 


                  </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <div class="fox-sidebar">
                    <div class="sidebar-item">
                        <div class="sidebar-item-inner">
                            <h3 class="sidebar-item-title">Ürün Fiyatı</h3>
                            <ul class="sidebar-product-price">
                                <li><?php echo $uruncek['urun_fiyat']; ?> TL</li>
                                <li>

                                </li>
                            </ul>
                            <form action="odeme" method="POST">
                                <ul class="sidebar-product-btn">
                                    <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
                                    <?php if (empty($_SESSION['userkullanici_id'])) {?>
                                        <li>    <a href="login" class="add-to-cart-btn" id="cart-button"><i class="fa fa-shopping-ban" aria-hidden="true"></i>Satın almak için Giriş yap</a></li>
                                    <?php } else if ($_SESSION['userkullanici_id']==$uruncek['kullanici_id']) {?>
                                        <li>    <a  class="add-to-cart-btn" id="cart-button"><i class="fa fa-shopping-ban" aria-hidden="true"></i>Kendi Ürününüz</a></li>
                                    <?php } else{ ?>
                                     <li>    <button type="submit" class="add-to-cart-btn" id="cart-button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Satın AL</button></li>

                                 <?php     } ?>    



                             </form>
                         </ul>
                     </div>
                 </div>                                
                 <div class="sidebar-item">
                    <div class="sidebar-item-inner">
                        <ul class="sidebar-sale-info">
                            <li><i class="fa fa-shopping-cart" aria-hidden="true"></i></li>
                            <li><?php 
                            $say=$db->prepare("SELECT COUNT(urun_id) as sonuc from siparis_detay where urun_id=:id ");
                            $say->execute(array(
                                'id' => $_GET['urun_id']));
                                $vericek=$say->fetch(PDO::FETCH_ASSOC);
                                echo $vericek['sonuc']; ?></li>
                            <li>Satış Miktarı</li>                                           
                        </ul>
                    </div>
                </div>

                <div class="sidebar-item">
                    <div class="sidebar-item-inner">
                        <h3 class="sidebar-item-title">Geliştirici</h3>
                        <div class="sidebar-author-info">
                            <img width="70" height="67" src="<?php echo $uruncek['kullanici_magazafoto'] ?>" alt="product" class="img-responsive">
                            <div class="sidebar-author-content">
                                <h3><?php echo $uruncek['kullanici_ad']." ".mb_substr($uruncek['kullanici_soyad'],0,1) ; ?></h3>
                                <a href="kullanici-<?=seo($uruncek['kullanici_ad']."-".$uruncek['kullanici_soyad'])."-".$uruncek['kullanici_id']  ?>" class="view-profile">View Profile</a>
                            </div>
                        </div>
                        <ul class="sidebar-badges-item">
                            <?php $say=$db->prepare("SELECT COUNT(kullanici_idsatici) as sonuc from siparis_detay where kullanici_idsatici=:id ");
                            $say->execute(array(
                                'id'=> $uruncek['kullanici_id']));
                            $vericek=$say->fetch(PDO::FETCH_ASSOC);
                         

                            if ($vericek['sonuc']>=1 and $vericek['sonuc']<10) { ?>
                               <li><img src="img\profile\badges1.png" alt="badges" class="img-responsive"></li>
                           <?php       } else if ($vericek['sonuc']>=10 and $vericek['sonuc']<100) { ?>
                               <li><img src="img\profile\badges1.png" alt="badges" class="img-responsive"></li>
                               <li><img src="img\profile\badges2.png" alt="badges" class="img-responsive"></li>

                           <?php } else if ($vericek['sonuc']>=100 and $vericek['sonuc']<1000) { ?>
                               <li><img src="img\profile\badges1.png" alt="badges" class="img-responsive"></li>
                               <li><img src="img\profile\badges2.png" alt="badges" class="img-responsive"></li>
                               <li><img src="img\profile\badges3.png" alt="badges" class="img-responsive"></li>

                           <?php } else if ($vericek['sonuc']>=1000 and $vericek['sonuc']<10000) { ?>
                               <li><img src="img\profile\badges1.png" alt="badges" class="img-responsive"></li>
                               <li><img src="img\profile\badges2.png" alt="badges" class="img-responsive"></li>
                               <li><img src="img\profile\badges3.png" alt="badges" class="img-responsive"></li>
                               <li><img src="img\profile\badges4.png" alt="badges" class="img-responsive"></li>
                           <?php } else if ($vericek['sonuc']>=10000 ) { ?>
                              <li><img src="img\profile\badges1.png" alt="badges" class="img-responsive"></li>
                              <li><img src="img\profile\badges2.png" alt="badges" class="img-responsive"></li>
                              <li><img src="img\profile\badges3.png" alt="badges" class="img-responsive"></li>
                              <li><img src="img\profile\badges4.png" alt="badges" class="img-responsive"></li>
                              <li><img src="img\profile\badges5.png" alt="badges" class="img-responsive"></li>

                          <?php } ?>       
                        </ul>
                    </div>
                </div>
            </div>
        </div>                        
    </div>
</div>
</div>
<!-- Product Details Page End Here -->
<?php require_once "footer.php" ;?>