
	<?php include "header.php" ?>
	<div class="container">
		
		<div id="title-bg">
			<div class="title">siparişlerim</div>
		</div>
		
			<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					
					<th>resim</th>
					<th>ürün ismi</th>
					<th>ürün kodu.</th>
					<th>miktar</th>
					<th>fiyat</th>
				</tr>
			</thead>
			<tbody>
				<?php $siparissor=$db->prepare("SELECT * FROM siparis_detay where siparis_id=:id and kullanici_id=:kullanici_id");
				$siparissor->execute(array(
					'id' => $_GET['sef'],
					'kullanici_id' => $kullanicicek['kullanici_id']));


				while ($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {
					$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id ");
					$urunsor->execute(array(
						'id' => $sipariscek['urun_id']));

					$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
				 $urunadetcarpim=$uruncek['urun_fiyat']*$sipariscek['urun_adet'];
				 //@$toplamfiyat+=$urunadetcarpim ;
					?>
					

					<tr>
			
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad']; ?></td>
						<td><?php echo $sipariscek['urun_id'] ?></td>
						<td><form><input type="text" class="form-control quantity" value="<?php echo $sipariscek['urun_adet'] ?>"></form></td>
						<td><?php echo  $urunadetcarpim; ?></td>
					</tr>
				<?php	 } ?>
			</tbody>
		</table>
	</div>
		<div class="spacer"></div>
	</div>
	
	
				<?php include "footer.php" ;?>