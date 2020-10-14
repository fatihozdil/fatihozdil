<?php include "header.php";
$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
	'id' => $_GET['urun_id']));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
echo$say=$urunsor->rowCount();

if ($say==0) {
	header("location:index.php?durum=belanaatlarim");
	exit();
}

?>
<head><title><?php echo$uruncek['urun_ad'];  ?> </title></head>



<div class="container">
	
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title"><?php echo $uruncek['urun_ad']; ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php $urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:id order by urunfoto_sira asc limit 1");
					$urunfotosor->execute(array(
						'id' => $uruncek['urun_id']));
					$urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC); ?>
					<div class="dt-img">
						<div class="detpricetag"><div class="inner"><?php echo $uruncek['urun_fiyat'] ; ?>TL</div></div>
						<a class="fancybox" href="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
					</div>
					<?php $urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:id order by urunfoto_sira asc limit 1,3");
					$urunfotosor->execute(array(
						'id' => $uruncek['urun_id']));
					while ($urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC)) {?>
				


					<div class="thumb-img">
						<a class="fancybox" href="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
					</div>
			<?php		} ?>
				</div>

				<div class="col-md-6 det-desc">

					<div class="productdata">
						<div class="infospan">ürün kodu <span><?php echo $uruncek['urun_id']; ?></span></div>
						<div class="infospan">Item no <span>2522</span></div>
						<div class="infospan">Manufacturer <span>Nikon</span></div>
						<hr>

						<form action="nedmin/netting/islem.php" method="POST">
							<div class="form-group">
								<label for="qty" class="col-sm-2 control-label">adet</label>

								<div class="col-sm-4">
									<input class="form-control" type="number"min="1" max="<?php echo $uruncek['urun_stok']; ?>" value="1" name="urun_adet">
								</div>
								
								<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
								<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
								<div class="col-sm-4">
									<button type="submit" name="sepetekle" class="btn btn-default btn-red btn-sm"><span class="addchart">sepete ekle</span></button>
								</div>
								<div class="clearfix"></div>
							</div>
							
						</form>
						<div class="sharing">
							<div class="share-bt">
								<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_counter addthis_pill_style"></a>
								</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
								<div class="clearfix"></div>
							</div>
							<div class="avatock"><span> <?php if ($uruncek['urun_stok']>=1) {
								echo "ürün adedi:".$uruncek['urun_stok'];
							}else{
								echo "ürün stoklarımızda kalmamıştır.";
							}

							?></span></div>
						</div>

					</div>
				</div>
			</div>

			<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					<li <?php if (empty($_GET['durum'])) { ?>
						class="active"
						<?php } ?> ><a href="#desc" data-toggle="tab">açıklama</a></li>
						<?php
						$urun_id=$uruncek['urun_id'];
						$yorumsor=$db->prepare("SELECT * FROM yorum where urun_id=:urun_id and yorum_durum=:durum ");
						$yorumsor->execute(array(
							'urun_id' => $urun_id,
							'durum'=> 1		)); 

						$say=$yorumsor->rowCount();

						?>
						<li <?php if (isset($_GET['durum'])) { ?>
							class="active"
							<?php } ?>><a href="#rev" data-toggle="tab">yorum yaz (<?php echo $say ?>)</a></li>
							<?php if (!empty($uruncek['urun_video'])) { ?>
								<li class=""><a href="#video" data-toggle="tab">ürün video</a></li>
							<?php	} ?>
						</ul>
						<div id="myTabContent" class="tab-content shop-tab-ct">
							<div class="tab-pane fade <?php if (!isset($_GET['durum'])) { ?>
								active in
								<?php } ?>" id="desc">
								<p>
									<?php echo $uruncek['urun_detay']; ?>
								</p>
							</div>
							<div class="tab-pane fade <?php if (isset($_GET['durum'])) { ?>
								active in
								<?php } ?>" id="rev">
								
								<p class="dash">
									<?php while ($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {
										$ykullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
										$ykullanicisor->execute(array(
											'id' => $yorumcek['kullanici_id']));

											$ykullanicicek=$ykullanicisor->fetch(PDO::FETCH_ASSOC); ?>


											<span><?php echo $ykullanicicek['kullanici_adsoyad'] ?></span> <?php echo $yorumcek['yorum_zaman'] ?><br><br>
											<?php echo $yorumcek['yorum_detay'] ?>

										</p>

									<?php	} ?>
									<h4>yorum yaz</h4>
									<?php if (isset($_SESSION['userkullanici_mail'])) { ?>
										<form action="nedmin/netting/islem.php"  method="POST" role="form">

											<div class="form-group">
												<textarea name="yorum_detay" placeholder="bir yorum yaz" class="form-control" id="text"></textarea>
											</div>


											<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
											<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">


											<input type="hidden" name="gelen_url" value="<?php echo"http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']."";  ?>">



											<button type="submit" name="yorumkaydet" class="btn btn-default btn-red btn-sm">Submit</button>
										</form>

									<?php	} else{ ?>

										yorum yapmak için <a href="register" style="color: red;">üye</a> olmalı yada giriş yapmalısınız.
									<?php		} ?>

								</div>

								<?php if (!empty($uruncek['urun_video'])) { ?>
									<div class="tab-pane fade " id="video">
										<p>

											<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $uruncek['urun_video'];?>" frameborder="0"  allowfullscreen></iframe>
										</p>
									</div>
								<?php	} ?>
								<!-- my tab content -->
							</div>
							<!-- tab review -->
						</div> 

						<div id="title-bg">
							<div class="title">benzer ürünler</div>
						</div>
						<div class="row prdct"><!--Products-->


							<?php  
							$kategori_id=$uruncek['kategori_id'];
							$urunaltsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id  order by rand()");
							$urunaltsor->execute(array(
								'kategori_id'=> $kategori_id));

								while($urunaltcek=$urunaltsor->fetch(PDO::FETCH_ASSOC)){ ?>
									<div class="col-md-4">
										<div class="productwrap">
											<div class="pr-img">
												<div class="hot"></div>
												<a href="<?php echo "urun-".$urunaltcek['urun_seourl']."-".$urunaltcek['urun_id']; ?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
												<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $urunaltcek['urun_fiyat']*1.50 ?></span><?php echo $urunaltcek['urun_fiyat'] ?> TL</span></div></div>
											</div>
											<span class="smalltitle"><a href="product.htm"><?php echo $urunaltcek['urun_ad']; ?></a></span>
											<span class="smalldesc"><?php echo $urunaltcek['urun_id'] ?></span>
										</div>
									</div>

								<?php } ?>




							</div><!--Products-->
							<div class="spacer"></div>
						</div><!--Main content-->
						<?php include "sidebar.php"; ?>
					</div>
				</div>

				<?php include "footer.php" ?>