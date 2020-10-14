
    <div class="container">
        <h2 class="title-default">öne Çıkanlar</h2>  
    </div>
    <div class="container=fluid">
        <div class="fox-carousel dot-control-textPrimary" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="3" data-r-medium-nav="false" data-r-medium-dots="true" data-r-large="4" data-r-large-nav="false" data-r-large-dots="true">
                     <?php $urunsor=$db->prepare("SELECT count(siparis_detay.urun_id) as say, urun.*,kullanici.*,kategori.*,siparis_detay.* FROM urun INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id INNER JOIN kategori ON kategori.kategori_id=urun.kategori_id inner join siparis_detay on siparis_detay.urun_id=urun.urun_id  where urun_durum=:onecikar group by siparis_detay.urun_id order by say desc limit 8");
                    $urunsor->execute(array(
                        'onecikar' => 1));
                    while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){?>
                     <div class="single-item-grid">
                            <div class="item-img">
                              <a href="urun-<?=seo($uruncek['urun_ad']."-".$uruncek['urun_id']) ?>"> <img src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="product" class="img-responsive"></a> 
                              <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                          </div>
                          <div class="item-content">
                            <div class="item-info">
                                <h3><a href="urun-<?=seo($uruncek['urun_ad']."-".$uruncek['urun_id']) ?>"><?php echo $uruncek['urun_ad'] ?></a></h3>
                                <span><a href="kategoriler-<?=seo($uruncek['kategori_ad']."-".$uruncek['kategori_id']) ?>"><?php echo $uruncek['kategori_ad'] ?></a></span>
                                <div class="price"><?php echo $uruncek['urun_fiyat'] ?>TL</div>
                            </div>
                            <div class="item-profile">
                                <div class="profile-title">
                                    <div class="img-wrapper"><img src="<?php echo $uruncek['kullanici_magazafoto'] ?>" alt="profile" class="img-responsive img-circle"></div>
                                    <span><?php echo $uruncek['kullanici_ad']." ".$uruncek['kullanici_soyad'] ?></span>
                                </div>
                                <div class="profile-rating">
                                    <ul>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li>(<span> 05</span> )</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php } ?>
        </div>
    </div>