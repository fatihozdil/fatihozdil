<?php include "header.php"; 
$bankasor=$db->prepare("SELECT * FROM banka order by banka_id ASC");
 $bankasor->execute();
?>

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
				
					<th>resim</th>
					<th>ürün ismi</th>
					<th>ürün kodu.</th>
					<th>miktar</th>
					<th>fiyat</th>
				</tr>
			</thead>
			<form action="nedmin/netting/islem.php"  method="POST">
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
				// @$toplamfiyat+=$urunadetcarpim ;
					?>
					

					<tr>
	
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad']; ?></td>
						<td><?php echo $sepetcek['urun_id'] ?></td>
						<td><?php echo $sepetcek['urun_adet'] ?></td>
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
				
				<div class="total">toplam fiyat : <span class="bigprice"><?php  if (isset($toplamfiyat)) {
					echo $toplamfiyat;
				}?></span></div>
				<div class="clearfix"></div>
			
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
				<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					<li  class="active"><a href="#desc" data-toggle="tab">kredi kartı</a></li>
					
						<li><a href="#rev" data-toggle="tab">banka havalesi</a></li>
							
						</ul>
						<div id="myTabContent" class="tab-content shop-tab-ct">
							<div class="tab-pane fade active in " id="desc">
								<p>
									hıulug
								</p>
							</div>
							<div class="tab-pane fade " id="rev">	

								<p class="dash">shsrthsthsrth	</p>
							<?php      while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)){ ?>	
						
							
								<input type="radio" name="siparis_banka" value="<?php echo $bankacek['banka_ad'] ?>"> <?php echo $bankacek['banka_ad']; echo" "; ?> <br>
						
									

								<?php } ?>	
								<hr>
								<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
								<input type="hidden" name="siparis_toplam" value="<?php echo $toplamfiyat ;?>">

								<button type="submit" class="btn btn-success" name="bankasiparisekle">siparişver</button>
</form>
								</div>

								
								<!-- my tab content -->
							</div>
							<!-- tab review -->
						</div> 
	<div class="spacer"></div>
</div>

<?php include "footer.php" ?>