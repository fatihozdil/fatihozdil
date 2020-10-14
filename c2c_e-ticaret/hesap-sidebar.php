   <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <ul class="settings-title">
                                <li class="active"><a href="javascript:void(0)" aria-expanded="false">	<b>ÜYE İŞLEMLERİ</b></a></li>
                                <li><a href="magaza-basvuru" aria-expanded="false">Mağaza Başvuru</a></li>
                                <li><a href="siparislerim" aria-expanded="false">Siparişlerim</a></li>
                                <li><a href="hesabim" aria-expanded="false">Hesap Bilgilerim</a></li>
                                <li><a href="gelen-mesajlar" aria-expanded="false">gelen mesajlarım</a></li>
                            	<li><a href="giden-mesajlar" aria-expanded="false">giden mesajlarım</a></li>
                                <li><a href="adres-bilgileri"aria-expanded="false">Adres Bilgileri</a></li>
                                <li><a href="sifre-islemleri"aria-expanded="false">Şifre işlemleri</a></li>

                            
                            </ul>

                            <?php if ($kullanicicek['kullanici_magaza']==2) {?> 
                            	<hr>
                            <ul class="settings-title">
                                <li class="active"><a href="javascript:void(0)" aria-expanded="false">	<b>MAĞAZA  İŞLEMLERİ</b></a></li>
                                <li><a href="urun-ekle" aria-expanded="false">Ürün Ekle</a></li>
                            	<li><a href="urunlerim" aria-expanded="false">Ürünlerim</a></li>
                                <li><a href="yeni-siparisler"aria-expanded="false">Yeni Siparişlerim</a></li>
                                <li><a href="tamamlanan-siparisler"aria-expanded="false">Tamanlanan Siparişler</a></li>
                                <li><a href="sifre-islemleri"aria-expanded="false">Mesajlar</a></li>
                                <li><a href="sifre-islemleri"aria-expanded="false">Ayarlar</a></li>

                            
                            </ul> <?php } ?>
                        </div>