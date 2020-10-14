<?php include 'header.php';

 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Kullanıcı Kaydı</div>
							<p >Kullanıcı kayıt işlemlerini aşağıda ki form aracılığı ile gerçekleştirebilirsiniz.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Kayıt Bilgileri</div>
				</div>

				<?php 
				if (isset($_GET['durum'])) {
					
				
				if ($_GET['durum']=="farklisifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
				</div>
					
				<?php } elseif ($_GET['durum']=="eksiksifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
				</div>
					
				<?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
				</div>
					
				<?php } elseif ($_GET['durum']=="basarisiz") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
				</div>
			<?php } elseif ($_GET['durum']=="yanlissifre") {?>
					<div class="alert alert-danger">
					<strong>Hata!</strong>şifreyi eksik ya da yanlış girdiniz.
				</div>
				<?php }}
				 ?>


				


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="kullanici_adsoyad" value=" <?php echo$kullanicicek['kullanici_adsoyad']; ?>">
					</div>
					
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control" readonly="" name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail'] ;?>">
					</div>
				</div>

				<div class="form-group dob">
					<div class="d-flex flex-row ">
						<input type="password" class="form-control" name="kullanici_passwordeski"    placeholder="eski Şifreniz...">
					</div>
					<div class="d-flex flex-row " >
						<input type="password" class="form-control" name="kullanici_passwordone"   placeholder="yeni şifre...">
					</div>
						<div class="d-flex flex-row">
						<input type="password" class="form-control" name="kullanici_passwordtwo"    placeholder="yeni şifre tekrar...">
					</div>
				</div> 
				<input type="hidden" name="kullanici_id" value="<?php echo$kullanicicek['kullanici_id']; ?>">


				<button type="submit" name="kullaniciupdate" class="btn btn-default btn-red">güncelle</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>