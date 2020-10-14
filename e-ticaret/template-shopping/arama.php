
<?php include"header.php" ;
if (isset($_POST['arama'])) {
	
$aranan=$_POST['aranan'];
	$urunsor=$db->prepare("SELECT * FROM urun where urun_ad LIKE ?");
	$urunsor->execute(array("%$aranan%"));
	 $say=$urunsor->rowCount();


} else{
	header("location:index.php?durum=boş");
}

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
			<?php if ($say==0) {
				echo "aradığınız kriterde ürün bulunamadı";
			} ?>
			<div class="row prdct"><!--Products-->
				<?php  while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){ ?>
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