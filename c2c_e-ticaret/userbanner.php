   <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 col-lg-push-3 col-md-push-4 col-sm-push-4">
                <div class="inner-page-main-body">
                    <div class="single-banner">
                        <img src="img\banner\1.jpg" alt="product" class="img-responsive">
                    </div>                                
                    <div class="author-summery">
                        <div class="single-item">
                            <div class="item-title">Bölge:</div>
                            <div class="item-details"><?php echo $kullanicicek['kullanici_ilce']."/".$kullanicicek['kullanici_il'] ?></div>                                       
                        </div>
                        <?php $tarih=explode(" ", $kullanicicek['kullanici_zaman']);

                        ?>
                        <div class="single-item">
                            <div class="item-title">Kayıt Tarihi</div>
                            <div class="item-details"><?php echo $tarih[0] ?></div>                                       
                        </div>
                        <div class="single-item">
                            <div class="item-title">Satıcı Puanı:</div>
                            <div class="item-details">
                                <?php $say=$db->prepare("SELECT COUNT(yorum.yorum_puan) as say, SUM(yorum.yorum_puan) as topla, yorum.*,urun.* from yorum inner join urun on urun.urun_id=yorum.urun_id where urun.kullanici_id=:id ");
                                $say->execute(array(
                                    'id'=> $_GET['kullanici_id']));
                                $vericek=$say->fetch(PDO::FETCH_ASSOC);
                                $bolum=round($vericek['topla']/ $vericek['say']) ;?>
                                <ul class="default-rating">
                                    <?php switch ($bolum) {
                                      case '5': ?>

                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li>(<span> <?php echo $bolum; ?></span> )</li>

                                      <?php 
                                      break;
                                      case '4': ?>

                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li>(<span> <?php echo $bolum; ?></span> )</li>

                                      <?php 
                                      break;

                                      case '3': ?>

                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li>(<span> <?php echo $bolum; ?></span> )</li>


                                      <?php 
                                      break;

                                      case '2': ?>

                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li>(<span> <?php echo $bolum; ?></span> )</li>


                                      <?php 
                                      break;

                                      case '1': ?>

                                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li><i style="color: grey;" class="fa fa-star" aria-hidden="true"></i></li>
                                      <li>(<span> <?php echo $bolum; ?></span> )</li>

                                      >
                                      <?php 
                                      break;


                                  }  ?>
                              </ul>
                          </div>                                       
                      </div>
                      <div class="single-item">
                        <div class="item-title">Toplam Satış:</div>
                        <div class="item-name"><?php $say=$db->prepare("SELECT COUNT(kullanici_idsatici) as sonuc from siparis_detay where kullanici_idsatici=:id ");
                        $say->execute(array(
                            'id'=> $_GET['kullanici_id']));
                        $vericek=$say->fetch(PDO::FETCH_ASSOC);
                        echo $vericek['sonuc']; ?></div>                                       
                    </div>
                </div>
            </div>
        </div>