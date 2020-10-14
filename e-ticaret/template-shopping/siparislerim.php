
	<?php include "header.php" ?>
	<div class="container">
		
		<div id="title-bg">
			<div class="title">siparişlerim</div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-bordered chart">
				<thead>
					<tr>
						<th>sipariş no</th>
						<th>sipariş tarih</th>
						<th>tutar</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
							<?php $siparissor=$db->prepare("SELECT * FROM siparis where kullanici_id=:id");
				$siparissor->execute(array(
					'id' => $kullanicicek['kullanici_id']));


				while ($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {?>
					<tr>
						<td><?php echo $sipariscek['siparis_id'] ?></td>						
						<td><?php echo $sipariscek['siparis_zaman'] ?></td>
						<td><?php echo $sipariscek['siparis_toplam'] ?> TL</td>
						<td><a href="<?php echo "siparis-".seo($sipariscek['siparis_id']);   ?>"><i class="fa fa-eye"></i>detay</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="spacer"></div>
	</div>
	
	
				<?php include "footer.php" ;?>