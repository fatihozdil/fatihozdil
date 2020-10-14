<?php include "header.php"; ?>

<div class="clearfix"></div>
<div class="lines"></div>
</div>

<div class="container">

	<div class="title-bg">
		<div class="title">sepet</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Remove</th>
					<th>resim</th>
					<th>ürün ismi</th>
					<th>ürün kodu.</th>
					<th>miktar</th>
					<th>fiyat</th>
				</tr>
			</thead>
			<tbody>
				<?php $sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
				$sepetsor->execute(array(
					'id' => $kullanicicek['kullanici_id']));


				while ($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {
					$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
					$urunsor->execute(array(
						'id' => $sepetcek['urun_id']));

					$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
				 $urunadetcarpim=$uruncek['urun_fiyat']*$sepetcek['urun_adet'];
				 //@$toplamfiyat+=$urunadetcarpim ;
					?>
					

					<tr>
						<td><form><input type="checkbox"></form></td>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad']; ?></td>
						<td><?php echo $sepetcek['urun_id'] ?></td>
						<td><form><input type="text" class="form-control quantity" value="<?php echo $sepetcek['urun_adet'] ?>"></form></td>
						<td><?php echo  $urunadetcarpim; ?></td>
					</tr>
				<?php	 } ?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6">

		</div>
		<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">
				
				<div class="total">toplam fiyat : <span class="bigprice"><?php if (isset($toplamfiyat)) {
				echo $toplamfiyat;
				}?></span></div>
				<div class="clearfix"></div>
				<a href="odeme" class="btn btn-default btn-yellow">ödeme sayfasına ilerle</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="spacer"></div>
</div>

<?php include "footer.php" ?>