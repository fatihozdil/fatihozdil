<?php 
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';
//tablo güncelleme işlemi
if (isset($_POST['genelayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	));
	if ($update) {
		header("Location:../production/genel-ayar.php?durum=ok");
	} else{
		header("Location:../production/genel-ayar.php?durum=no");
	}


}

if (isset($_POST['iletisimayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_il=:ayar_il,
		ayar_ilce=:ayar_ilce,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_faks'=> $_POST['ayar_faks'],
		'ayar_mail'=> $_POST['ayar_mail'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_ilce'=> $_POST['ayar_ilce'],
		'ayar_adres' => $_POST['ayar_adres'],
		'ayar_mesai'=> $_POST['ayar_mesai']
	));
	if ($update) {
		header("Location:../production/iletisim-ayarlar.php?durum=ok");
	} else{
		header("Location:../production/iletisim-ayarlar.php?durum=no");
	}
}
if (isset($_POST['apiayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		where ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_analystic' =>  $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim'=>  $_POST['ayar_zopim']
	));
	if ($update) {
		header("Location:../production/api-ayarlar.php?durum=ok");
	} else {
		header("Location:../production/api-ayarlar.php?durum=no");
	}
}

if (isset($_POST['sosyalayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:ayar_facebook,
		ayar_google=:ayar_google,
		ayar_youtube=:ayar_youtube,
		ayar_twitter=:ayar_twitter
		where ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_google' => $_POST['ayar_google'],
		'ayar_youtube' => $_POST['ayar_youtube'],
		'ayar_twitter' => $_POST['ayar_twitter']));
	if ($update) {
		header("Location:../production/sosyal-ayarlar.php?durum=ok");
	}else{
		header("Location:../production/sosyal-ayarlar.php?durum=no");
	}
}
if (isset($_POST['mailayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		where ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_smtphost'=> $_POST['ayar_smtphost'],
		'ayar_smtpuser'=> $_POST['ayar_smtpuser'],
		'ayar_smtppassword'=> $_POST['ayar_smtppassword'],
		'ayar_smtpport' => $_POST['ayar_smtpport']));
	if ($update) {
		header("Location:../production/mail-ayarlar.php?durum=ok");
	} else{
		header("Location:../production/mail-ayarlar.php?durum=no");
	}

}
if (isset($_POST['hakkimizdakaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");
	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
	));
	if ($update) {
		header("Location:../production/hakkimizda.php?durum=ok");
	} else{
		header("Location:../production/hakkimizda.php?durum=no");
	}
}
if (isset($_POST['admingiris'])) {
	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);
	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
	));
	$say=$kullanicisor->rowCount();
	if ($say==1) {
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
	} else {
		header("Location:../production/login.php?durum=no");
		exit;
	}

}



if (isset($_GET['kullanicisil'])) {
	

	if ($_GET['kullanicisil']=="ok") {
		$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['kullanici_id']));
		if ( $kontrol) {
			header("location:../production/kullanici.php?sil=ok");

		}else{
			header("location:../production/kullanici.php?sil=no");
		}
	}
}
if (isset($_POST['menuduzenle'])) {
	$menu_id=$_POST['menu_id'];
	$menu_seourl=seo($_POST['menu_ad']);
	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}
		");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));
	if ($update) {
		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");
		exit;
	} else{
		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
		exit;

	}

}


	if ($_GET['menusil']=="ok") {
		islemkontrol();

		$sil=$db->prepare("DELETE from menu where menu_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['menu_id']));
		if ( $kontrol) {
			header("location:../production/menu.php?sil=ok");

		}else{
			header("location:../production/menu.php?sil=no");
		}
	}

if (isset($_POST['menukaydet'])) {
	$menu_seourl=seo($_POST['menu_ad']);
	$kaydet=$db->prepare("INSERT into menu set 
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		
		");
	$insert=$kaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));
	if ($insert) {
//echo"kayıt başarılı";
		header("location:../production/menu.php?durum=ok");
		exit;
	}else{
//echo"kayıt başarısız";
		header("location:../production/menu.php?durum=no");
		exit;
	}
}


if (isset($_POST['sliderkaydet'])) {


	$uploads_dir = '../../dimg/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}



}
if (isset($_POST['sliderupdate'])) {
	if($_FILES['slider_resimyol']["size"] > 0)  {




		$slider_id=$_POST['slider_id'];
		$uploads_dir = '../../dimg/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$ayarkaydet=$db->prepare("UPDATE slider SET
			slider_resimyol=:slider_resimyol,
			slider_ad=:slider_ad,
			slider_link=:slider_link,
			slider_sira=:slider_sira,
			slider_durum=:slider_durum
			WHERE slider_id={$_POST['slider_id']}");


		$update=$ayarkaydet->execute(array(
			'slider_resimyol' => $refimgyol,
			'slider_ad' => $_POST['slider_ad'],
			'slider_link' => $_POST['slider_link'],
			'slider_sira' => $_POST['slider_sira'],
			'slider_durum' => $_POST['slider_durum']
		));
		if ($update) {
			$resimsilunlink=$_POST['eski_slider'];
			unlink("../../$resimsilunlink");
			header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
		} else{
			header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
		}
	}else {
		$slider_id=$_POST['slider_id'];
		$ayarkaydet=$db->prepare("UPDATE slider SET
			slider_ad=:slider_ad,
			slider_link=:slider_link,
			slider_sira=:slider_sira,
			slider_durum=:slider_durum
			WHERE slider_id={$_POST['slider_id']}");


		$update=$ayarkaydet->execute(array(
			'slider_ad' => $_POST['slider_ad'],
			'slider_link' => $_POST['slider_link'],
			'slider_sira' => $_POST['slider_sira'],
			'slider_durum' => $_POST['slider_durum']
		));
		if ($update) {
			

			header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
		} else{
			header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
		}

	} 



}

if (isset($_GET['slidersil'])) {

	if ($_GET['slidersil']=="ok") {
		$sil=$db->prepare("DELETE from slider where slider_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['slider_id']));
		if ( $kontrol) {
			$resimsilunlink=$_GET['slider_yol'];
			unlink("../../$resimsilunlink");
			header("location:../production/slider.php?sil=ok");

		}else{
			header("location:../production/slider.php?sil=no");
		}
	}
}



	if (isset($_POST["kullaniciupdate"])) { 

		$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
		$kullanici_password=md5($_POST['kullanici_passwordeski']);

		$kullanicisor=$db->prepare("SELECT * FROM kullanici where 
			kullanici_password=:pswrd");
		$kullanicisor->execute(array(
			'pswrd' => $kullanici_password));
		$say=$kullanicisor->rowCount();



		if ($say==1) {
			if (empty($_POST["kullanici_passwordone"]) and empty($_POST['kullanici_passwordtwo'])) {

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad

					where kullanici_id={$_POST['kullanici_id']}");
				$update=$kullanicikaydet->execute(array(
					'kullanici_adsoyad'=>$_POST['kullanici_adsoyad']    
				));


				if ($update) {
					header("location:../../hesabim.php?durum=ok");
    }//update bitis
    else{
    	header("location:../../hesabim.php?durum=no");
    }

        } //empty bitiş 
        //empty else
        else{
        	$kullanici_passwordone=$_POST['kullanici_passwordone'];
        	$kullanici_passwordtwo=$_POST['kullanici_passwordtwo'];

        	if ($kullanici_passwordone=$kullanici_passwordtwo) {
        		if (strlen($kullanici_passwordone)>=6) {

        			$password=md5($kullanici_passwordone);


        			$ayarkaydet=$db->prepare("UPDATE kullanici SET
        				kullanici_adsoyad=:kullanici_adsoyad,

        				kullanici_password=:kullanici_password

        				where  kullanici_id={$_POST['kullanici_id']}");
        			$update=$ayarkaydet->execute(array(
        				'kullanici_adsoyad'=>$_POST['kullanici_adsoyad'],

        				'kullanici_password'=>$password));

                }//strlen
                else{header("location:../../hesabim.php?durum=eksiksifre");}
            }//passwordonetwo
            else{
            	header("location:../../hesabim.php?durum=farklisifre");}
            	if ($update) {
            		header("location:../../hesabim.php?durum=okK");
    }//update bitis
    else{
    	header("location:../../hesabim.php?durum=noo");
    }

            }//empty else bitiş
    }//say bitiş
    else{
    	header("location:../../hesabim.php?durum=yanlissifre");}
 }//isset bitiş




 
 //bitiş

 if (isset($_POST['urunekle'])) {
 	$urun_seourl=seo($_POST['urun_ad']);

 	$kaydet=$db->prepare("INSERT INTO urun SET
 		kategori_id=:kategori_id,
 		urun_ad=:urun_ad,
 		urun_detay=:urun_detay,
 		urun_fiyat=:urun_fiyat,
 		urun_onecikar=:urun_onecikar,
 		urun_video=:urun_video,
 		urun_keyword=:urun_keyword,
 		urun_stok=:urun_stok,
 		urun_durum=:urun_durum,
 		urun_seourl=:urun_seourl
 		");
 	$insert=$kaydet->execute(array(
 		'kategori_id'=> $_POST['kategori_id'],
 		'urun_ad'=> $_POST['urun_ad'],
 		'urun_detay'=> $_POST['urun_detay'],
 		'urun_fiyat'=> $_POST['urun_fiyat'],
 		'urun_video'=> $_POST['urun_video'],
 		'urun_onecikar'=> $_POST['urun_onecikar'],
 		'urun_keyword'=>$_POST['urun_keyword'],
 		'urun_stok' => $_POST['urun_stok'],		
 		'urun_durum'=> $_POST['urun_durum'],
 		'urun_seourl'=> $urun_seourl));


 	if ($insert) {
 		header("location:../production/urun.php?durum=ok");
 	} else{
 		header("location:../production/urun.php?durum=no");
 	}
 }

 if (isset($_POST['yorumkaydet'])) {


 	$gelen_url=$_POST['gelen_url'];
 	;
 	$ayarekle=$db->prepare("INSERT INTO yorum SET
 		yorum_detay=:yorum_detay,
 		kullanici_id=:kullanici_id,
 		urun_id=:urun_id


 		");

 	$insert=$ayarekle->execute(array(
 		'yorum_detay' => $_POST['yorum_detay'],
 		'kullanici_id' => $_POST['kullanici_id'],
 		'urun_id' => $_POST['urun_id']

 	));


 	if ($insert) {

 		Header("Location:$gelen_url?durum=ok");
 	} else {

 		Header("Location:$gelen_url?durum=no");
 	}

 }

 if (isset($_GET['yorumsil'])) {
 	if ($_GET['yorumsil']=="ok") {


 		$yorumsil=$db->prepare("DELETE FROM yorum where yorum_id=:id ");
 		$kontrol=$yorumsil->execute(array(
 			'id' => $_GET['yorum_id']));
 		if ( $kontrol) {
 			header("location:../production/yorum.php?sil=ok");

 		}else{
 			header("location:../production/yorum.php?sil=no");
 		}

 	}

 }
 if (isset($_POST['yorumduzenle'])) {
 	$yorum_id=$_POST['yorum_id'];
 	$ayarkaydet=$db->prepare("UPDATE yorum SET

 		yorum_detay=:yorum_detay
 		WHERE yorum_id={$_POST['yorum_id']}");
 	$update=$ayarkaydet->execute(array(

 		'yorum_detay' => $_POST['yorum_detay']
 	));
 	if ($update) {
 		header("Location:../production/yorum-duzenle.php?yorum_id=$yorum_id&durum=ok");
 	} else{
 		header("Location:../production/yorum-duzenle.php?yorum_id=$yorum_id&durum=no");
 	}


 }
 if (isset($_GET['yorumgoster'])) {

 	$ayarkaydet=$db->prepare("UPDATE yorum SET

 		yorum_durum=:yorum_durum
 		WHERE yorum_id={$_GET['yorum_id']}");
 	$update=$ayarkaydet->execute(array(

 		'yorum_durum' => $_GET['yorumgoster']
 	));
 	if ($update) {
 		header("Location:../production/yorum.php?durum=ok");
 	} else{
 		header("Location:../production/yorum.php?durum=no");
 	}

 }
 if (isset($_POST['sepetekle'])) {




 	$ayarekle=$db->prepare("INSERT INTO sepet SET
 		urun_adet=:urun_adet,
 		kullanici_id=:kullanici_id,
 		urun_id=:urun_id


 		");

 	$insert=$ayarekle->execute(array(
 		'urun_id' => $_POST['urun_id'],
 		'kullanici_id' => $_POST['kullanici_id'],
 		'urun_adet' => $_POST['urun_adet']

 	));


 	if ($insert) {

 		Header("Location:../../sepet?durum=ok");
 	} else {

 		Header("Location:../../sepet?durum=no");
 	}

 }
 if (isset($_POST['bankakaydet'])) {


 	$kaydet=$db->prepare("INSERT INTO banka SET
 		banka_ad=:banka_ad,
 		banka_iban=:banka_iban,
 		banka_durum=:banka_durum, 
 		banka_hesapadsoyad=:banka_hesapadsoyad
 		
 		");
 	$update=$kaydet->execute(arraY(
 		'banka_ad'=> $_POST['banka_ad'],
 		'banka_iban'=> $_POST['banka_iban'],
 		'banka_durum'=> $_POST['banka_durum'],
 		'banka_hesapadsoyad'=>$_POST['banka_hesapadsoyad']));

 	if ($update) {
 		header("location:../production/banka.php?durum=ok");
 	} else{
 		header("location:../production/banka.php?durum=no");
 	}
 }
 if (isset($_POST['bankaduzenle'])) {
 	$banka_id=$_POST['banka_id'];


 	$kaydet=$db->prepare("UPDATE banka SET
 		banka_ad=:banka_ad,
 		banka_iban=:banka_iban,
 		banka_durum=:banka_durum, 
 		banka_hesapadsoyad=:banka_hesapadsoyad
 		where banka_id={$_POST['banka_id']}");
 	$update=$kaydet->execute(array(
 		'banka_ad'=> $_POST['banka_ad'],
 		'banka_iban'=> $_POST['banka_iban'],
 		'banka_durum'=> $_POST['banka_durum'],
 		'banka_hesapadsoyad'=>$_POST['banka_hesapadsoyad']));
 	if ($update) {
 		header("location:../production/banka-duzenle.php?durum=ok&banka_id=$banka_id");
 	} else{
 		header("location:../production/banka-duzenle.php?durum=no&banka_id=$banka_id");
 	}
 }
 if (isset($_GET['bankasil'])) {
 	$sil=$db->prepare("DELETE FROM banka where banka_id=:banka_id");
 	$kontrol=$sil->execute(array(
 		'banka_id'=> $_GET['banka_id']));
 	if ($kontrol) {
 		header("location:../production/banka.php?durum=ok");
 	}else{
 		header("location:../production/banka.php?durum=no");

 	}
 }

 if (isset($_POST['bankasiparisekle'])) {

$kullanici_id=$_POST['kullanici_id'];

 	$siparis_tip="banka havalesi";
 	$kaydet=$db->prepare("INSERT INTO siparis SET
 		kullanici_id=:kullanici_id,
 		siparis_tip=:siparis_tip,
 		siparis_banka=:siparis_banka,
 		siparis_toplam=:siparis_toplam
 		");

 	$insert=$kaydet->execute(array(
 		'kullanici_id'=> $_POST['kullanici_id'],
 		'siparis_tip'=>$siparis_tip,
 		'siparis_banka'=>$_POST['siparis_banka'],
 		'siparis_toplam'=> $_POST['siparis_toplam']
 	));

 	if ($insert) {
  	//header("location:../production/siparis.php?durun=ok");
 		$siparis_id=$db->lastInsertId();
 		$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
 		$sepetsor->execute(array(
 			'id' => $_POST['kullanici_id']));


 		while ($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

 			$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
 			$urunsor->execute(array(
 				'id' => $sepetcek['urun_id']));

 			$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
 			$urun_id=$sepetcek['urun_id'];

 			$urun_fiyat=$uruncek['urun_fiyat'];
 			$urun_adet=$sepetcek['urun_adet'];
 			$kaydet=$db->prepare("INSERT INTO siparis_detay SET
 				kullanici_id=:kullanici_id,
 				siparis_id=:siparis_id,
 				urun_id=:urun_id,
 				urun_fiyat=:urun_fiyat,
 				urun_adet=:urun_adet
 				");

 			$insert=$kaydet->execute(array(
 				'kullanici_id'=> $_POST['kullanici_id'],
 				'siparis_id'=>$siparis_id,
 				'urun_id'=>$urun_id,
 				'urun_fiyat'=>$urun_fiyat,
 				'urun_adet'=> $urun_adet
 			));

 		}if ($insert) {
 			$sil=$db->prepare("DELETE from sepet where kullanici_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $kullanici_id));
		if ( $kontrol) {
			header("location:../../siparislerim.php?sil=ok");

		}else{
			header("location:../../siparislerim.php?sil=no");
		}
 		}

 		

 	}



 		else{
  //	header("location:../production/siparis.php?durun=no");
 			echo "başaramadık abi";

 		}
 	}

 	if (isset($_POST['urunfotosil'])) {
 		$urun_id=$_POST['urun_id'];
 		 $checklist=$_POST['urunfotosec'];

 		foreach ($checklist as $list ) {
 			$sil=$db->prepare("DELETE FROM urunfoto where urunfoto_resimyol=:id ");
 			$kontrol=$sil->execute(array(
 			'id' => $list ));
 			unlink("../../$list");
 		}
 	
 		if ( $kontrol) {
			header("location:../production/urun-galeri.php?urun_id=$urun_id&sil=ok");

		}else{
			header("location:../production/urun-galeri.php?urun_id=$urun_id&sil=no");
		}
 		

 	}
 	

 	?>