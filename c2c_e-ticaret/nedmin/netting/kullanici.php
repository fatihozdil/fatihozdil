<?php 
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';
date_default_timezone_set('Europe/Istanbul');


if (isset($_POST['musterikaydet'])) {

	$kullanici_ad=htmlspecialchars($_POST['kullanici_ad']);
	$kullanici_soyad=htmlspecialchars($_POST['kullanici_soyad']);
	$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
	$kullanici_gsm=htmlspecialchars($_POST['kullanici_gsm']);
	$kullanici_passwordone=htmlspecialchars(trim($_POST['kullanici_passwordone']));
	$kullanici_passwordtwo=htmlspecialchars(trim($_POST['kullanici_passwordtwo']));
	
	if ($kullanici_passwordone==$kullanici_passwordtwo) {

		if (strlen($kullanici_passwordone)>=6) {
			//başlangıç
			$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail));

			$say=$kullanicisor->rowCount();


			if ($say==0) {
				$password=md5($kullanici_passwordone);
				$kullanici_yetki=1;

				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET 	
					kullanici_ad=:kullanici_ad,
					kullanici_soyad=:kullanici_soyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_gsm=:kullanici_gsm,
					kullanici_yetki=:kullanici_yetki");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_ad' =>$kullanici_ad,
					'kullanici_soyad' =>$kullanici_soyad,
					'kullanici_mail'=>$kullanici_mail,
					'kullanici_password'=>$password,
					'kullanici_gsm'=>$kullanici_gsm,
					'kullanici_yetki' =>$kullanici_yetki ));

				if ($insert) {
					header("location:../../login?durum=kayitbasarili");
				}else {
					header("location:../../register?durum=basarisiz");
				}
			} else{ 
				header("location:../../register?durum=mukerrerkayit");}

			} else{header("location:../../register?durum=eksiksifre");}

		} else{
			header("location:../../register?durum=farklisifre");
		}

	}



	if (isset($_POST['musterigiris'])) {
		require_once '../../securimage/securimage.php';

		$securimage = new Securimage();

		if ($securimage->check($_POST['captcha_code']) == false) {

			header("Location:../../login?durum=captchahata");
			exit;

		}
		
		$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
		$kullanici_password=md5(htmlspecialchars($_POST['kullanici_password']));

		$kullanicisor=$db->prepare("SELECT * FROM kullanici where 
			kullanici_mail=:mail and kullanici_yetki=:yetki and 
			kullanici_password=:password and kullanici_durum=:durum");
		$kullanicisor->execute(array(
			'mail' => $kullanici_mail,
			'yetki' => 1,
			'password' => $kullanici_password,
			'durum' => 1));
		$say=$kullanicisor->rowCount();
		if ($say==1) {
			$sonzaman=$db->prepare("UPDATE kullanici set
				
				kullanici_sonzaman=:kullanici_sonzaman
				where kullanici_mail='$kullanici_mail'
				");
			$update=$sonzaman->execute(array(

				'kullanici_sonzaman' => date('Y-m-d H:i:s')
			));
			$_SESSION['userkullanici_sonzaman']=strtotime(date("Y-m-d H:i:s"));
			$_SESSION['userkullanici_mail']=$kullanici_mail;
			header("location:../../");
		} else{
			header("location:../../login?durum=hata");
		}
	}
//hesabim 

	if (isset($_POST['musterikullaniciguncelle'])) {

		if($_FILES['kullanici_magazafoto']["size"] > 0)  {



			if ($_FILES['kullanici_magazafoto']['size']>1048576) {
				echo "bu dosya boyutu çok büyük";
				header("location:../../hesabim.php?durum=dosyabuyuk");

			}$izinliuzantilar=array('gif','jpg','png','svg');
			$ext=strtolower(substr($_FILES['kullanici_magazafoto']['name'],strpos($_FILES['kullanici_magazafoto']['name'],'.')+1));
			if (in_array($ext, $izinliuzantilar) === false) {
				echo "bu uzantı desteklenmiyor";
				header("location:../../hesabim.php?durum=formathata");
				exit();
			}
			@$tmp_name = $_FILES['kullanici_magazafoto']["tmp_name"];
			@$name =seo($_FILES['kullanici_magazafoto']["name"]);

			require_once "SimpleImage.php";
			$image= new SimpleImage;
			$image -> load($tmp_name);
			$image -> resize(128,128);
			$image -> save($tmp_name);


			$uploads_dir = '../../dimg/profil';


			$benzersizsayi4=uniqid();
			$refimgyol=substr($uploads_dir, 6)."/".substr($benzersizsayi4.$name, 0, - 4).".".$ext;

			$resim_url=substr($benzersizsayi4.$name, 0, - 4).".".$ext;

			@move_uploaded_file($tmp_name, "$uploads_dir/$resim_url");




			$kullaniciguncelle=$db->prepare("UPDATE kullanici set
				kullanici_ad=:kullanici_ad,
				kullanici_soyad=:kullanici_soyad,
				kullanici_gsm=:kullanici_gsm,
				kullanici_magazafoto=:foto
				where kullanici_id={$_SESSION['userkullanici_id']}
				");
			$update=$kullaniciguncelle->execute(array(
				'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
				'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
				'kullanici_gsm' => htmlspecialchars($_POST['kullanici_gsm']),
				'foto' => $refimgyol
			));



			if ($update) {
				$resimsilunlink=$_POST['eskiresim'];
				if ($resimsilunlink=='dimg/logo-yok.png') {
					header("location:../../hesabim.php?durum=ok");

				} else{

					unlink("../../$resimsilunlink");
					header("location:../../hesabim.php?durum=ok");

				}



			} else {

				header("location:../../hesabim.php?durum=no");

			}


		}
		else{

			$kullaniciguncelle=$db->prepare("UPDATE kullanici set
				kullanici_ad=:kullanici_ad,
				kullanici_soyad=:kullanici_soyad,
				kullanici_gsm=:kullanici_gsm
				where kullanici_id={$_SESSION['userkullanici_id']}
				");
			$update=$kullaniciguncelle->execute(array(
				'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
				'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
				'kullanici_gsm' => htmlspecialchars($_POST['kullanici_gsm'])
			));
			if ($update) {
				header("location:../../hesabim.php?durum=ok");
			} else{
				header("location:../../hesabim.php?durum=no");
			}
		}
	}
//hesabim 


	
	if (isset($_POST['musteriadresguncelle'])) {
		$kullaniciguncelle=$db->prepare("UPDATE kullanici set
			kullanici_tip=:kullanici_tip,
			kullanici_ad=:kullanici_ad,
			kullanici_soyad=:kullanici_soyad,
			kullanici_tc=:kullanici_tc,
			kullanici_unvan=:kullanici_unvan,
			kullanici_vdaire=:kullanici_vdaire,
			kullanici_vno=:kullanici_vno,
			kullanici_adres=:kullanici_adres,
			kullanici_il=:kullanici_il,
			kullanici_ilce=:kullanici_ilce
			where kullanici_id={$_SESSION['userkullanici_id']}
			");
		$update=$kullaniciguncelle->execute(array(
			'kullanici_tip' => htmlspecialchars($_POST['kullanici_tip']),
			'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
			'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
			'kullanici_tc' => htmlspecialchars($_POST['kullanici_tc']),
			'kullanici_unvan' => htmlspecialchars($_POST['kullanici_unvan']),
			'kullanici_vdaire' => htmlspecialchars($_POST['kullanici_vdaire']),
			'kullanici_vno' => htmlspecialchars($_POST['kullanici_vno']),
			'kullanici_adres' => htmlspecialchars($_POST['kullanici_adres']),
			'kullanici_il' => htmlspecialchars($_POST['kullanici_il']),
			'kullanici_ilce' => htmlspecialchars($_POST['kullanici_ilce'])
		));
		if ($update) {
			header("location:../../adres-bilgileri.php?durum=ok");
		} else{
			header("location:../../adres-bilgileri.php?durum=no");
		}
	}
	if (isset($_POST['musterisifreguncelle'])) {
		$eskisifre=trim($_POST['kullanici_eskisifre']);
		$kullanici_passwordone=trim($_POST['kullanici_passwordone']);
		$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']);
		$password=md5($eskisifre);


		$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_password=:pswrd and kullanici_id=:id");
		$kullanicisor->execute(array(
			'pswrd' => $password,
			'id' => $_SESSION['userkullanici_id']));

		$say=$kullanicisor->rowCount();

		
		if ($say==1) {

			if ($kullanici_passwordone==$kullanici_passwordtwo) {

				if (strlen($kullanici_passwordone)>=6) {
					$kullanici_password=md5($kullanici_passwordone);





					$kullaniciguncelle=$db->prepare("UPDATE kullanici set

						kullanici_password=:kullanici_password
						where kullanici_id={$_SESSION['userkullanici_id']}
						");
					$update=$kullaniciguncelle->execute(array(

						'kullanici_password' =>$kullanici_password));
					if ($update) {
						header("location:../../sifre-islemleri.php?durum=ok");
					} else{
						header("location:../../sifre-islemleri.php?durum=no");
					}	
				}  else {
					header("location:../../sifre-islemleri.php?durum=uzunluk");

				}				}
				else {
					header("location:../../sifre-islemleri.php?durum=eslesmiyor");

				}
			}else {
				header("location:../../sifre-islemleri.php?durum=yanlis");

			}

		}
		if (isset($_POST['musterimagazabasvuru'])) {
			$kullaniciguncelle=$db->prepare("UPDATE kullanici set
				kullanici_banka=:kullanici_banka,
				kullanici_iban=:kullanici_iban,
				kullanici_ad=:kullanici_ad,
				kullanici_soyad=:kullanici_soyad,
				kullanici_gsm=:kullanici_gsm,
				kullanici_tip=:kullanici_tip,
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
				where kullanici_id={$_SESSION['userkullanici_id']}
				");
			$update=$kullaniciguncelle->execute(array(
				'kullanici_banka' => htmlspecialchars($_POST['kullanici_banka']),
				'kullanici_iban' => htmlspecialchars($_POST['kullanici_iban']),
				'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
				'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
				'kullanici_gsm' => htmlspecialchars($_POST['kullanici_gsm']),
				'kullanici_tip' => htmlspecialchars($_POST['kullanici_tip']),
				'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
				'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
				'kullanici_tc' => htmlspecialchars($_POST['kullanici_tc']),
				'kullanici_unvan' => htmlspecialchars($_POST['kullanici_unvan']),
				'kullanici_vdaire' => htmlspecialchars($_POST['kullanici_vdaire']),
				'kullanici_vno' => htmlspecialchars($_POST['kullanici_vno']),
				'kullanici_adres' => htmlspecialchars($_POST['kullanici_adres']),
				'kullanici_il' => htmlspecialchars($_POST['kullanici_il']),
				'kullanici_magaza' => 1,
				'kullanici_ilce' => htmlspecialchars($_POST['kullanici_ilce'])
			));
			if ($update) {
				header("location:../../magaza-basvuru.php");
			} else{
				header("location:../../magaza-basvuru.php?durum=no");
			}
		}

///////////////////////////////////////////////////////////////////// mağaza ürün ekle



		if (isset($_POST['magazaurunekle'])) {





			if ($_FILES['urunfoto_resimyol']['size']>1048576) {
				echo "bu dosya boyutu çok büyük";
				header("location:../../urun-ekle.php?durum=dosyabuyuk");

			}$izinliuzantilar=array('gif','jpg','png','svg');
			$ext=strtolower(substr($_FILES['urunfoto_resimyol']['name'],strpos($_FILES['urunfoto_resimyol']['name'],'.')+1));
			if (in_array($ext, $izinliuzantilar) === false) {
				echo "bu uzantı desteklenmiyor";
				header("location:../../urun-ekle.php?durum=formathata");
				exit();
			}
			@$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
			@$name =seo($_FILES['urunfoto_resimyol']["name"]);

			require_once "SimpleImage.php";
			$image= new SimpleImage;
			$image -> load($tmp_name);
			$image -> resize(829,422);
			$image -> save($tmp_name);


			$uploads_dir = '../../dimg/urunfoto';


			$benzersizsayi4=uniqid();
			$refimgyol=substr($uploads_dir, 6)."/".substr($benzersizsayi4.$name, 0, - 4).".".$ext;

			$resim_url=substr($benzersizsayi4.$name, 0, - 4).".".$ext;

			@move_uploaded_file($tmp_name, "$uploads_dir/$resim_url");




			$kullaniciguncelle=$db->prepare("INSERT INTO urun set
				kategori_id=:kategori_id,
				kullanici_id=:kullanici_id,
				urun_ad=:urun_ad,
				urun_detay=:urun_detay,
				urun_fiyat=:urun_fiyat,
				urunfoto_resimyol=:foto
				");
			$update=$kullaniciguncelle->execute(array(
				'kategori_id' => htmlspecialchars($_POST['kategori_id']),
				'kullanici_id' => htmlspecialchars($_SESSION['userkullanici_id']),
				'urun_ad' => htmlspecialchars($_POST['urun_ad']),
				'urun_detay' => $_POST['urun_detay'],
				'urun_fiyat' => htmlspecialchars($_POST['urun_fiyat']),
				'foto' => $refimgyol
			));



			if ($update) {

				header("location:../../urunlerim.php?durum=ok");
			} else {

				header("location:../../urun-ekle.php?durum=no");

			}




		}
	/////////////////////////////////////////////////

////urunduzenle
		if (isset($_POST['magazaurunguncelle'])) {
			$urun_id=$_POST['urun_id'];

			if($_FILES['urunfoto_resimyol']["size"] > 0)  {



				if ($_FILES['urunfoto_resimyol']['size']>1048576) {
					echo "bu dosya boyutu çok büyük";
					header("location:../../hesabim.php?durum=dosyabuyuk");

				}$izinliuzantilar=array('gif','jpg','png','svg');
				$ext=strtolower(substr($_FILES['urunfoto_resimyol']['name'],strpos($_FILES['urunfoto_resimyol']['name'],'.')+1));
				if (in_array($ext, $izinliuzantilar) === false) {
					echo "bu uzantı desteklenmiyor";
					header("location:../../hesabim.php?durum=formathata");
					exit();
				}
				@$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
				@$name =seo($_FILES['urunfoto_resimyol']["name"]);

				require_once "SimpleImage.php";
				$image= new SimpleImage;
				$image -> load($tmp_name);
				$image -> resize(829,422);
				$image -> save($tmp_name);


				$uploads_dir = '../../dimg/urunfoto';


				$benzersizsayi4=uniqid();
				$refimgyol=substr($uploads_dir, 6)."/".substr($benzersizsayi4.$name, 0, - 4).".".$ext;

				$resim_url=substr($benzersizsayi4.$name, 0, - 4).".".$ext;

				@move_uploaded_file($tmp_name, "$uploads_dir/$resim_url");




				$kullaniciguncelle=$db->prepare("UPDATE urun set
					kategori_id=:kategori_id,
					urun_ad=:urun_ad,
					urun_detay=:urun_detay,
					urun_fiyat=:urun_fiyat,
					urunfoto_resimyol=:foto
					where kullanici_id={$_SESSION['userkullanici_id']} and urun_id={$_POST['urun_id']}
					");
				$update=$kullaniciguncelle->execute(array(
					'kategori_id' => htmlspecialchars($_POST['kategori_id']),
					'urun_ad' => htmlspecialchars($_POST['urun_ad']),
					'urun_detay' => $_POST['urun_detay'],
					'urun_fiyat' => htmlspecialchars($_POST['urun_fiyat']),
					'foto' => $refimgyol
				));



				if ($update) {
					$resimsilunlink=$_POST['eskiresim'];


					unlink("../../$resimsilunlink");
					header("location:../../urun-duzenle.php?urun_id=$urun_id&durum=ok");





				} else {

					header("location:../../urun-duzenle.php?urun_id=$urun_id&durum=no");

				}


			}
			else{

				$kullaniciguncelle=$db->prepare("UPDATE urun set
					kategori_id=:kategori_id,
					urun_ad=:urun_ad,
					urun_detay=:urun_detay,
					urun_fiyat=:urun_fiyat

					where kullanici_id={$_SESSION['userkullanici_id']} and urun_id={$_POST['urun_id']}
					");
				$update=$kullaniciguncelle->execute(array(
					'kategori_id' => htmlspecialchars($_POST['kategori_id']),
					'urun_ad' => htmlspecialchars($_POST['urun_ad']),
					'urun_detay' => $_POST['urun_detay'],
					'urun_fiyat' => htmlspecialchars($_POST['urun_fiyat'])
				));
				if ($update) {
					header("location:../../urun-duzenle.php?urun_id=$urun_id&durum=ok");
				} else{
					header("location:../../urun-duzenle.php?urun_id=$urun_id&durum=no");
				}
			}
		}

	///urun duzenle bitiş

	//urun sil

		if (isset($_GET['urunsil'])) {

			if ($_GET['urunsil']=="ok") {
				$sil=$db->prepare("DELETE from urun where urun_id=:id");
				$kontrol=$sil->execute(array(
					'id' => $_GET['urun_id']));
				if ( $kontrol) {
					$resimsilunlink=$_GET['urunfoto'];
					unlink("../../$resimsilunlink");
					header("location:../../urunlerim.php?sil=ok");

				}else{
					header("location:../../urunlerim.php?sil=no");
				}
			}
		}

		//siparis kaydetme işlemleri
		if (isset($_POST['sipariskaydet'])) {
			$sipariskaydet=$db->prepare("INSERT INTO siparis set 
				urun_id=:urun_id,
				kullanici_id=:id,
				kullanici_idsatici=:satici_id");

			$insert=$sipariskaydet->execute(array(
				'urun_id'=> htmlspecialchars($_POST['urun_id']),
				'id'=>$_SESSION['userkullanici_id'],
				'satici_id'=> htmlspecialchars($_POST['kullanici_idsatici'])));

			if ($insert) {
				$siparis_id=$db->LastInsertId();
				$sipariskaydet1=$db->prepare("INSERT INTO siparis_detay set 
					kullanici_id=:id,
					kullanici_idsatici=:satici_id,
					urun_id=:urun_id,
					urun_fiyat=:urun_fiyat,
					siparis_id=:siparis_id
					");

				$insert1=$sipariskaydet1->execute(array(
					'id'=>$_SESSION['userkullanici_id'],
					'satici_id'=> htmlspecialchars($_POST['kullanici_idsatici']),
					'urun_id'=> htmlspecialchars($_POST['urun_id']),
					'urun_fiyat'=> htmlspecialchars($_POST['urun_fiyat']),
					'siparis_id'=> $siparis_id
				));
				if ($insert1) {
					header("location:../../siparislerim.php");
				}

			}else{
				header("location:../../404.php");
			}
		}

//urun alıcı ödeme onayı
		if (isset($_GET['durum'])) {

			if ($_GET['durum']=="ok") {
				$siparis_id=$_GET['onay'];

				$guncelle=$db->prepare(" UPDATE siparis_detay set
					siparisdetay_onay=:onay
					where siparisdetay_id={$_GET['siparisd']}");

				$update=$guncelle->execute(array(
					'onay'=> 2));
				if ($update) {
					header("location:../../siparis-detay?siparis_id=$siparis_id");
				} else {

					header("location:../../siparis-detay?siparis_id=$siparis_id&durum=no");

				}	}

			}



//urun satıcı teslim onayı
			if (isset($_GET['durum'])) {
				
				if ($_GET['durum']=="okk") {


					$guncelle=$db->prepare(" UPDATE siparis_detay set
						siparisdetay_onay=:onaya
						where siparisdetay_id={$_GET['siparisdd']}");

					$update=$guncelle->execute(array(
						'onaya'=> 1));
					if ($update) {
						header("location:../../yeni-siparisler");
					} else {

						header("location:../../yeni-siparisler?durum=no");

					}	}
				}
				if (isset($_POST['puanyorumekle'])) {
					$siparis_id=$_POST['siparis_id'];
					$ekle=$db->prepare("INSERT INTO yorum set
						yorum_puan=:puan,
						yorum_detay=:detay,
						urun_id=:id,
						kullanici_id=:idm
						");

					$insert=$ekle->execute(array(
						'puan' => $_POST['yorum_puan'],
						'detay' =>$_POST['yorum_detay'],
						'id' => $_POST['urun_id'],
						'idm' => $_SESSION['userkullanici_id']
					));
					if ($insert) {
						$kaydet=$db->prepare("UPDATE siparis_detay set
							siparisdetay_yorum=:yorum
							where siparis_id={$siparis_id}");
						$update=$kaydet->execute(array(
							'yorum' => 1));
						
						header("location:../../siparis-detay?siparis_id=$siparis_id");
					}else {
						header("location:../../siparis-detay?siparis_id=$siparis_id&durum=no");

					}
				}
				if (isset($_POST['mesajgonder'])) {
					$kullanici_gel=$_POST['kullanici_gel'];
					$mesajkaydet=$db->prepare("INSERT INTO mesaj set 
						kullanici_gel=:kullanici_gel,
						kullanici_gon=:kullanici_gon,
						mesaj_detay=:mesaj_detay");

					$kaydet=$mesajkaydet->execute(array(
						'kullanici_gel'=> $_POST['kullanici_gel'],
						'kullanici_gon'=> $_SESSION['userkullanici_id'],
						'mesaj_detay'=> $_POST['mesaj_detay']));

					if ($kaydet) {
						header("location:../../mesaj-gonder?durum=ok&kullanici_gel=$kullanici_gel ");
					} else{

						header("location:../../mesaj-gonder?durum=no&kullanici_gel=$kullanici_gel ");

					}
				}	
				if (isset($_POST['mesajcevap'])) {
					$kullanici_gel=$_POST['kullanici_gel'];
					$mesajkaydet=$db->prepare("INSERT INTO mesaj set 
						kullanici_gel=:kullanici_gel,
						kullanici_gon=:kullanici_gon,
						mesaj_detay=:mesaj_detay");

					$kaydet=$mesajkaydet->execute(array(
						'kullanici_gel'=> $_POST['kullanici_gel'],
						'kullanici_gon'=> $_SESSION['userkullanici_id'],
						'mesaj_detay'=> $_POST['mesaj_detay']));

					if ($kaydet) {
						header("location:../../gelen-mesajlar?durum=ok ");
					} else{

						header("location:../../gelen-mesajlar?durum=no ");

					}
				}	
				if (isset($_GET['gelenmesajsil'])) {

					if ($_GET['gelenmesajsil']=="ok") {
						$sil=$db->prepare("DELETE from mesaj where mesaj_id=:id");
						$kontrol=$sil->execute(array(
							'id' => $_GET['mesaj_id']));
						if ( $kontrol) {
							
							
							header("location:../../gelen-mesajlar.php?sil=ok");

						}else{
							header("location:../../gelen-mesajlar.php?sil=no");
						}
					}
				}

				if (isset($_GET['gidenmesajsil'])) {

					if ($_GET['gidenmesajsil']=="ok") {
						$sil=$db->prepare("DELETE from mesaj where mesaj_id=:id");
						$kontrol=$sil->execute(array(
							'id' => $_GET['mesaj_id']));
						if ( $kontrol) {
							
							
							header("location:../../giden-mesajlar.php?sil=ok");

						}else{
							header("location:../../giden-mesajlar.php?sil=no");
						}
					}
				}
				?>