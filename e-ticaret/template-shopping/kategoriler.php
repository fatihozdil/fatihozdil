
<?php include"header.php" ;


?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Category</div>
							<div class="bigtitle">Category</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">kategoriler</div>
				<div class="title-nav">
					<a href=""><i class="fa fa-th-large"></i>grid</a>
					<a href=""><i class="fa fa-bars"></i>List</a>
				</div>
			</div>
			
			<div class="row prdct"><!--Products-->

				<?php

                     $sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                     $sorgu=$db->prepare("select * from kategori");
                     $sorgu->execute();
                     $toplam_icerik=$sorgu->rowCount();
                     $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                  	// eğer sayfa girilmemişse 1 varsayalım.
                     $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
          			// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                     if($sayfa < 1) $sayfa = 1; 
        				// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                     if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                     $limit = ($sayfa - 1) * $sayfada;



                     //aşağısı bir önceki default kodumuz...
                     if (isset($_GET['sef'])) {


                     	$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_seourl=:seourl");
                     	$kategorisor->execute(array(
                     		'seourl' => $_GET['sef']
                     		));

                     	$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

                     	$kategori_id=$kategoricek['kategori_id'];


                     	$urunsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by urun_id DESC limit $limit,$sayfada");
                     	$urunsor->execute(array(
                     		'kategori_id' => $kategori_id
                     		));

                     	$say=$urunsor->rowCount(); ?>
                     	<head><title><?php echo$kategoricek['kategori_ad'];  ?> </title></head>

          <?php           } else {

                     	$urunsor=$db->prepare("SELECT * FROM urun order by urun_id DESC limit $limit,$sayfada");
                     	$urunsor->execute(); ?>
                     	<head><title>kategoriler</title></head>
                <?php     }






                     if ($toplam_icerik==0) {
                     	echo "Bu kategoride ürün bulunamadı";
                     }
  while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){ ?>
					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="<?php echo "urun-".$uruncek['urun_seourl']."-".$uruncek['urun_id']; ?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $uruncek['urun_fiyat']*1.50 ?></span><?php echo $uruncek['urun_fiyat'] ?> TL</span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $uruncek['urun_ad']; ?></a></span>
							<span class="smalldesc"><?php echo $uruncek['urun_id'] ?></span>
						</div>
					</div>

				<?php } ?>
					<div align="right" class="col-md-12">
                     		<ul class="pagination">

                     			<?php

                     			$s=0;

                     			while ($s < $toplam_sayfa) {

                     				$s++; ?>

                     				<?php 

                     				if ($s==$sayfa) {?>

                     				<li class="active">

                     					<a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                     				</li>

                     				<?php } else {?>


                     				<li>

                     					<a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                     				</li>

                     				<?php   }

                     			}

                     			?>

                     		</ul>
                     	</div>

			</div><!--Products-->
			<!-- 	<ul class="pagination shop-pag fixed-bottom">pagination
					<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
				</ul>pagination--> 

			</div>
			<?php include "sidebar.php" ;?>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include "footer.php" ;?>