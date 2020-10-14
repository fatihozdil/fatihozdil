<?php 
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';

if (isset($_POST['logoduzenle'])) {
if ($_FILES['ayar_logo']['size']>1048576) {
 echo "bu dosya boyutu çok büyük";
header("location:../production/genel-ayar.php?durum=dosyabuyuk");

}
// izinli uzantı birinci  yol 
$izinliuzantilar=array('gif','jpg','png','svg');
$ext=strtolower(substr($_FILES['ayar_logo']['name'],strpos($_FILES['ayar_logo']['name'],'.')+1));
 $tip=$_FILES['ayar_logo']['type'];
// izinli uzantı ikinci   yol 
// $uzanti=explode(".", $_FILES['ayar_logo']['name']);
// $uzanti=$uzanti[count($uzanti)-1]; // bu kod bize dosyanın uzantısını verir.	

if (in_array($ext, $izinliuzantilar) === false) { //if (!in_array($ext, $izinliuzantilar) ) {  ikisi birbirine eşit
	echo "bu uzantı desteklenmiyor";
	header("location:../production/genel-ayar.php?durum=formathata");
	exit();
}
	



	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}
if (isset($_POST['kullaniciduzenle'])) {
	$kullanici_id=$_POST['kullanici_id'];
	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_gsm=:kullanici_gsm,
		kullanici_adres=:kullanici_adres,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}
		");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_adres' => $_POST['kullanici_adres'],
		'kullanici_il' => $_POST['kullanici_il'],
		'kullanici_ilce' => $_POST['kullanici_ilce'],
		'kullanici_durum' => $_POST['kullanici_durum']
	));
	if ($update) {
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
		exit;
	} else{
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
		exit;

	}} 
	if (isset($_GET['kullanicisil'])) {
	if ($_GET['magazadurum']=="sil") {

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
	
		kullanici_magaza=:kullanici_magaza
		WHERE kullanici_id={$_GET['kullanici_id']}
		");

	$update=$ayarkaydet->execute(array(
	
		'kullanici_magaza' => 0
	));
	if ($update) {
		header("Location:../production/magazalar.php?durum=ok");
		exit;
	} else{
		header("Location:../production/magazalar.php?durum=no");
		exit;

	}}}

				if (isset($_POST['magazaonaykayit'])) {
		$kullaniciguncelle=$db->prepare("UPDATE kullanici set
			kullanici_banka=:kullanici_banka,
			kullanici_iban=:kullanici_iban,
			kullanici_ad=:kullanici_ad,
			kullanici_soyad=:kullanici_soyad,
			kullanici_gsm=:kullanici_gsm,
			kullanici_ad=:kullanici_ad,
			kullanici_soyad=:kullanici_soyad,
			kullanici_tc=:kullanici_tc,
			kullanici_unvan=:kullanici_unvan,
			kullanici_vdaire=:kullanici_vdaire,
			kullanici_vno=:kullanici_vno,
			kullanici_adres=:kullanici_adres,
			kullanici_il=:kullanici_il,
			kullanici_magaza=:kullanici_magaza,
			kullanici_ilce=:kullanici_ilce
			where kullanici_id={$_POST['kullanici_id']}
			");
		$update=$kullaniciguncelle->execute(array(
			'kullanici_banka' => htmlspecialchars($_POST['kullanici_banka']),
			'kullanici_iban' => htmlspecialchars($_POST['kullanici_iban']),
			'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
			'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
			'kullanici_gsm' => htmlspecialchars($_POST['kullanici_gsm']),
			'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
			'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
			'kullanici_tc' => htmlspecialchars($_POST['kullanici_tc']),
			'kullanici_unvan' => htmlspecialchars($_POST['kullanici_unvan']),
			'kullanici_vdaire' => htmlspecialchars($_POST['kullanici_vdaire']),
			'kullanici_vno' => htmlspecialchars($_POST['kullanici_vno']),
			'kullanici_adres' => htmlspecialchars($_POST['kullanici_adres']),
			'kullanici_il' => htmlspecialchars($_POST['kullanici_il']),
			'kullanici_magaza' => 2,
			'kullanici_ilce' => htmlspecialchars($_POST['kullanici_ilce'])
		));
			if ($update) {
		header("Location:../production/magazalar.php?durum=ok");
		exit;
	} else{
		header("Location:../production/magazalar.php?durum=no");
		exit;

	}
	}
//urun düzenleme
	if (isset($_POST['urunduzenle'])) {
 	$urun_id=$_POST['urun_id'];
 	$urun_seourl=seo($_POST['urun_ad']);

 	$kaydet=$db->prepare("UPDATE urun SET
 		kategori_id=:kategori_id,
 		urun_onecikar=:urun_onecikar,
 		urun_durum=:urun_durum 		
 		where urun_id={$_POST['urun_id']}");
 	$update=$kaydet->execute(array(
 		'kategori_id'=> $_POST['kategori_id'], 	
 		'urun_onecikar'=> $_POST['urun_onecikar'], 		
 		'urun_durum'=> $_POST['urun_durum']
 	));


 	if ($update) {
 		header("location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");
 	} else{
 		header("location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
 	}
 }

//urun öne çıkarma
 //buton başlangıç
 if (isset($_GET['urungoster'])) {

 	$urungoster= $_GET['urun_onecikar'];
 	$kaydet=$db->prepare("UPDATE urun SET
 		
 		urun_onecikar=:urun_onecikar
 		
 		where urun_id={$_GET['urun_id']}");
 	$update=$kaydet->execute(array(
 		
 		'urun_onecikar'=> $urungoster
 		

 	));


 	if ($update) {
 		header("location:../production/urun.php");
 	} else{
 		header("location:../production/urun.php");
 	}
 }
 //
 if (isset($_GET['urungosterme'])) {
 	$urungosterme=$_GET['urun_onecikar'];

 	$kaydet=$db->prepare("UPDATE urun SET
 		
 		urun_onecikar=:urun_onecikar
 		
 		where urun_id={$_GET['urun_id']}");
 	$update=$kaydet->execute(array(
 		
 		'urun_onecikar'=> $urungosterme
 		

 	));


 	if ($update) {
 		header("location:../production/urun.php?durum=ok");
 	} else{
 		header("location:../production/urun.php?durum=no");
 	}
 }
 //ürün silme

  if (isset($_GET['urunsil'])) {
 	$sil=$db->prepare("DELETE FROM urun where urun_id=:urun_id");
 	$kontrol=$sil->execute(array(
 		'urun_id'=> $_GET['urun_id']));
 	if ($kontrol) {
 		header("location:../production/urun.php?durum=ok");
 	}else{
 		header("location:../production/urun.php?durum=no");

 	}
 }

 //kategori silme
  if (isset($_GET['kategorisil'])) {
 	$sil=$db->prepare("DELETE FROM kategori where kategori_id=:kategori_id");
 	$kontrol=$sil->execute(array(
 		'kategori_id'=> $_GET['kategori_id']));
 	if ($kontrol) {
 		header("location:../production/kategori.php?durum=ok");
 	}else{
 		header("location:../production/kategori.php?durum=no");

 	}
 }

 //kategori düzenleme
 if (isset($_POST['kategoriduzenle'])) {
 	$kategori_id=$_POST['kategori_id'];
 	$kategori_seourl=seo($_POST['kategori_ad']);

 	$kaydet=$db->prepare("UPDATE kategori SET
 		kategori_ad=:ad,
 		kategori_durum=:kategori_durum,
 		kategori_seourl=:kategori_seourl,
 		kategori_onecikar=:kategori_onecikar,
 		kategori_sira=:kategori_sira
 		where kategori_id={$_POST['kategori_id']}");
 	$update=$kaydet->execute(array(
 		'ad'=> htmlspecialchars($_POST['kategori_ad']),
 		'kategori_durum'=> htmlspecialchars($_POST['kategori_durum']),
 		'kategori_seourl'=> $kategori_seourl,
 		'kategori_onecikar'=> htmlspecialchars($_POST['kategori_onecikar']),
 		'kategori_sira'=>$_POST['kategori_sira']));

 	if ($update) {
 		header("location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");
 	} else{
 		header("location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
 	}
 }

 if (isset($_POST['kategorikaydet'])) {

 	$kategori_seourl=seo($_POST['kategori_ad']);

 	$kaydet=$db->prepare("INSERT INTO kategori SET
 		kategori_ad=:ad,
 		kategori_durum=:kategori_durum,
 		kategori_seourl=:kategori_seourl,
 		kategori_onecikar=:kategori_onecikar,
 		kategori_sira=:kategori_sira
 		
 		");
 	$update=$kaydet->execute(arraY(
 		'ad'=> $_POST['kategori_ad'],
 		'kategori_durum'=> $_POST['kategori_durum'],
 		'kategori_seourl'=> $kategori_seourl,
 		'kategori_onecikar'=> htmlspecialchars($_POST['kategori_onecikar']),
 		'kategori_sira'=>$_POST['kategori_sira']));

 	if ($update) {
 		header("location:../production/kategori.php?durum=ok");
 	} else{
 		header("location:../production/kategori.php?durum=no");
 	}
 }

 
 
   ?>