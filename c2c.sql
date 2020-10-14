-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 10 Eki 2020, 11:12:55
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `c2c`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_bakim` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_google`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, 'dimg/31286logo-coral.svg', 'c2c e-ticaret', 'c2c proje', 'eticaret, shopping, php, learning, student php', 'FATİH ÖZDİL', '0850 840 80 76', '0850 840 80 76', '0850 840 80 76', 'omaremmi1234@gmail.com', 'İstanbul', 'Topkapı', 'Topkapı sarayı', '7 x 24 açık eticaret scripti', 'ayar_maps_api', 'ayar_analystic', 'ayar_zopima', 'www.facebook.com', 'www.twitter.com', 'www.google.com', 'www.youtube.com', 'mail.alanadiniz.com', '', 'password', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `banka_id` int(11) NOT NULL,
  `banka_ad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `banka_iban` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `banka_hesapadsoyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `banka_durum` enum('1','0') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `banka`
--

INSERT INTO `banka` (`banka_id`, `banka_ad`, `banka_iban`, `banka_hesapadsoyad`, `banka_durum`) VALUES
(1, 'garanti bankası', 'TR02302350231', 'Fatih ÖZDİL', '1'),
(2, 'yapı kredi', 'TR2385092722745822', 'Fatih ÖZDİL', '1'),
(3, 'ziraat bankası', 'TR648290538', 'Fatih ÖZDİL', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_video` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_vizyon` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_misyon` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'Joy Akademi Eğitim Sürümü', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong> Phasellus viverra viverra eros, <img alt=\"\" src=\"https://www.neyazilim.com/dimg/30166neyazilim_logo.png\" style=\"float:right; height:42px; width:200px\" />eu laoreet leo iaculis vehicula. Nunc pretium volutpat neque, finibus fermentum neque pretium vel. In hac habitasse platea dictumst. Phasellus ipsum lacus, vehicula et fringilla a, dapibus ac mi. Nulla orci tortor, fringilla eget magna in, dictum consequat lectus. Sed tincidunt purus nec erat scelerisque pretium. Aliquam vehicula lacus vel lacus varius egestas.</p>\r\n\r\n<p>Vivamus eget euismod mi. Pellentesque et bibendum libero. Aliquam ullamcorper felis id nisl fermentum fringilla. Curabitur egestas condimentum lacus ut ornare. Donec vitae libero sagittis, pharetra massa ut, aliquam tellus. Proin luctus ex orci, nec pretium purus ultrices id. Nulla facilisi. Donec convallis pellentesque mauris. Suspendisse potenti. Ut viverra ex ante, vel tincidunt massa pellentesque et. Aenean rutrum ut ex facilisis vestibulum. Mauris est nibh, auctor quis efficitur et, pellentesque eu metus.</p>\r\n\r\n<p>Sed auctor maximus nunc ut cursus. Sed ultrices lectus eu turpis tincidunt, id dignissim nisl mattis. Sed in risus justo. Fusce et eleifend elit. Donec sit amet sapien accumsan, ornare diam ut, pellentesque dui. Maecenas ut molestie mauris. Curabitur imperdiet enim ut feugiat vulputate. Quisque dictum dolor a risus facilisis, eu bibendum dolor aliquam. Mauris vestibulum leo mauris, sit amet blandit erat suscipit nec.</p>\r\n\r\n<p>Nam facilisis sem vitae sem cursus, non ultrices dolor ullamcorper. Donec tortor massa, convallis eu tortor ornare, ornare sollicitudin tellus. Pellentesque quis interdum neque. Praesent elementum mauris sit amet nibh scelerisque bibendum. Maecenas aliquet metus lacinia elit bibendum volutpat. Vivamus eget augue eu quam consectetur venenatis. Proin rhoncus, tellus vitae tempor efficitur, eros orci maximus odio, eu rutrum sapien arcu non nisl. Donec egestas mauris eu nisl faucibus, ullamcorper dictum urna efficitur. Aliquam eu velit nisi. Etiam vitae nisi massa. Etiam a auctor felis.</p>\r\n\r\n<p>Vestibulum sem erat, venenatis at blandit in, mollis ut mauris. Donec vitae neque venenatis ante fermentum auctor vel at quam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut auctor lectus, at egestas odio. Donec vestibulum nunc vitae porttitor scelerisque. Aenean non erat facilisis, finibus ex eu, commodo nulla. Pellentesque ornare, sem sit amet laoreet efficitur, sapien enim facilisis nibh, vel imperdiet nunc eros id libero. Suspendisse potenti. Nullam nec fringilla nibh. Duis sed ex a eros interdum faucibus. Duis viverra quis sem ut accumsan.</p>\r\n', 'gGXSHaER4h8', 'Joy Akademi ile ilgili hakkımızda vizyon içeriği burada yer alacağından buraya vizyon verisi girilecekitir.', 'Joy Akademi ile ilgili hakkımızda vizyon içeriği burada yer alacağından buraya vizyon verisi girilecekitir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_onecikar` enum('1','0') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '0',
  `kategori_seourl` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_onecikar`, `kategori_seourl`, `kategori_sira`, `kategori_durum`) VALUES
(9, 'HTML templete', '0', 'html-templete', 2, '0'),
(10, 'php script', '1', 'php-script', 2, '1'),
(11, 'wordpress templete', '1', 'wordpress-templete', 3, '1'),
(12, 'alan adı', '1', 'alan-adi', 4, '1'),
(13, 'hakkımızda', '1', 'hakkimizda', 5, '1'),
(14, 'fatih', '1', 'fatih', 1, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `subMerchantKey` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_magaza` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `kullanici_magazafoto` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT 'dimg/logo-yok.png',
  `kullanici_zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_sonzaman` datetime NOT NULL,
  `kullanici_resim` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tc` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_banka` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_iban` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_ad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_soyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tip` enum('PERSONAL','PRIVATE_COMPANY','LIMITED_OR_JOINT_STOCK_COMPANY','') CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT 'PERSONAL',
  `kullanici_vdaire` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_vno` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `subMerchantKey`, `kullanici_magaza`, `kullanici_magazafoto`, `kullanici_zaman`, `kullanici_sonzaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_banka`, `kullanici_iban`, `kullanici_ad`, `kullanici_soyad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_tip`, `kullanici_vdaire`, `kullanici_vno`, `kullanici_yetki`, `kullanici_durum`) VALUES
(153, '', '0', 'dimg/magazafoto/28832avatar-02-jpg.jpg', '2017-07-31 11:31:57', '0000-00-00 00:00:00', '', '', '', NULL, 'Fatih', 'ÖZDİL', 'aaa@gmail.com', '05326668991', 'e10adc3949ba59abbe56e057f20f883e', 's1', 'İstanbul', 'Çatalca', 'sdf', 'PERSONAL', 'sdf', 'sdf', '5', 1),
(165, '', '2', 'dimg/profil/5ee3c08801711agac-yasken.jpg', '2020-06-08 19:41:54', '2020-08-03 22:06:52', '', '12345678', 'ziraatt', 'TR12345678', 'Fatih1', 'ÖZDİL', 'omaremmi1234@gmail.com', '08505408076', '25d55ad283aa400af464c76d713c07ad', 'melikgazi mah türk yurdu küme', 'kayseri', 'melikgazi', 'yok', 'PERSONAL', '142567', '12345678', '1', 1),
(167, '', '1', 'dimg/profil/5ee3c08801711agac-yasken.jpg', '2020-06-08 19:41:54', '2020-08-03 22:07:18', '', '12345678', 'ziraatt', 'TR12345678', 'Muhammed', 'ÖZDİL', 'muhammed@gmail.com', '08505408076', '25d55ad283aa400af464c76d713c07ad', 'melikgazi mah türk yurdu küme', 'kayseri', 'melikgazi', 'yok', 'PERSONAL', '142567', '12345678', '1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_ad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_detay` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '0', 'hakkımızda', '', 'hakkimizda', 3, '1', 'hakkimizda'),
(2, '0', 'iletişim', '<p><iframe frameborder=\"0\" scrolling=\"no\" src=\"&lt;blockquote class=&quot;twitter-tweet&quot;&gt;&lt;p lang=&quot;tr&quot; dir=&quot;ltr&quot;&gt;Pandemi nedeniyle kapalı olan camilerde, uzun süre sonra Cuma Namazı kılınıyor. &lt;a href=&quot;https://t.co/XYxUngAez5&quot;&gt;https://t.co/XYxUngAez5&lt;/a&gt;&lt;/p&gt;&amp;mdash; İstanbul Büyükşehir Belediyesi (@istanbulbld) &lt;a href=&quot;https://twitter.com/istanbulbld/status/1266313331926724613?ref_src=twsrc%5Etfw&quot;&gt;May 29, 2020&lt;/a&gt;&lt;/blockquote&gt; &lt;script async src=&quot;https://platform.twitter.com/widgets.js&quot; charset=&quot;utf-8&quot;&gt;&lt;/script&gt;\"></iframe></p>\r\n', '', 1, '1', 'iletisim'),
(4, '0', 'hakkimizda', '<p>1234</p>\r\n', '', 2, '1', 'hakkimizda');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mesaj_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gel` int(11) NOT NULL,
  `kullanici_gon` int(11) NOT NULL,
  `mesaj_okunma` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`mesaj_id`, `mesaj_zaman`, `mesaj_detay`, `kullanici_gel`, `kullanici_gon`, `mesaj_okunma`) VALUES
(1, '0000-00-00 00:00:00', '<p>kardelim ne bu tantana</p>\r\n', 165, 167, '1'),
(2, '2020-06-17 11:31:59', '<p>selam kardeşim</p>\r\n\r\n<p>&nbsp;</p>\r\n', 165, 167, '1'),
(5, '2020-06-17 12:11:38', '<p>selam kardeşim</p>\r\n\r\n<p>&nbsp;</p>\r\n', 167, 165, '1'),
(8, '2020-06-18 10:16:41', '<p>ayıp</p>\r\n\r\n<p>&nbsp;</p>\r\n', 165, 167, '1'),
(9, '2020-06-18 10:27:28', '<p>213123</p>\r\n', 165, 167, '1'),
(10, '2020-08-03 18:58:41', '<p>nabıyon</p>\r\n', 165, 167, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_id` int(11) NOT NULL,
  `kullanici_idsatici` int(11) NOT NULL,
  `siparis_odeme` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_zaman`, `kullanici_id`, `kullanici_idsatici`, `siparis_odeme`, `urun_id`) VALUES
(750046, '2020-06-16 16:27:04', 167, 165, '0', 38),
(750047, '2020-06-16 16:27:13', 167, 165, '0', 38),
(750048, '2020-06-18 11:29:31', 167, 165, '0', 41),
(750049, '2020-06-18 11:29:38', 167, 165, '0', 42),
(750050, '2020-06-18 11:29:52', 167, 165, '0', 43),
(750051, '2020-06-18 11:30:00', 167, 165, '0', 43),
(750052, '2020-06-18 11:30:11', 167, 165, '0', 43),
(750053, '2020-06-18 11:30:20', 167, 165, '0', 43),
(750054, '2020-06-18 11:30:33', 167, 165, '0', 42),
(750055, '2020-06-18 11:30:42', 167, 165, '0', 42),
(750056, '2020-06-18 11:30:51', 167, 165, '0', 42),
(750057, '2020-06-18 11:30:58', 167, 165, '0', 42),
(750058, '2020-07-23 13:38:26', 167, 165, '0', 38),
(750059, '2020-08-03 19:04:51', 167, 165, '0', 38),
(750060, '2020-08-03 19:06:41', 167, 165, '0', 38);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparisdetay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kullanici_idsatici` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_adet` int(3) NOT NULL,
  `siparisdetay_kargozaman` datetime NOT NULL,
  `siparisdetay_kargoad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `siparisdetay_kargono` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `siparisdetay_onay` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `siparisdetay_yorum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `siparisdetay_onayzaman` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparisdetay_id`, `siparis_id`, `kullanici_id`, `kullanici_idsatici`, `urun_id`, `urun_fiyat`, `urun_adet`, `siparisdetay_kargozaman`, `siparisdetay_kargoad`, `siparisdetay_kargono`, `siparisdetay_onay`, `siparisdetay_yorum`, `siparisdetay_onayzaman`) VALUES
(59, 750046, 167, 165, 38, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(60, 750047, 167, 165, 38, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(61, 750048, 167, 165, 41, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(62, 750049, 167, 165, 42, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(63, 750050, 167, 165, 43, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(64, 750051, 167, 165, 43, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(65, 750052, 167, 165, 43, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(66, 750053, 167, 165, 43, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(67, 750054, 167, 165, 42, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(68, 750055, 167, 165, 42, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(69, 750056, 167, 165, 42, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(70, 750057, 167, 165, 42, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(71, 750058, 167, 165, 38, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '0', '0000-00-00 00:00:00'),
(72, 750059, 167, 165, 38, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(73, 750060, 167, 165, 38, 34.00, 0, '0000-00-00 00:00:00', '', '', '2', '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_resimyol` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_link` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_durum` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_sira`, `slider_link`, `slider_durum`) VALUES
(20, 'kayan resim 121ara', 'dimg/slider/31729247192495228866slide-1.jpg', 2, 'https://www.edukey.com.tr/', '1'),
(21, 'kayan resim 12', 'dimg/slider/31417226822451126955slide-2.jpg', 2, 'https://www.edukey.com.tr/', '1'),
(22, 'kayan resim 3', 'dimg/slider/23025269712085420871slide-3.jpg', 3, 'https://www.edukey.com.tr/', '1'),
(23, 'kayan resim 4', 'dimg/slider/30787302052496424531slide-4.jpg', 4, 'https://www.edukey.com.tr/', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urunfoto_resimyol` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_ad` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_seourl` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_detay` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_satis` int(4) NOT NULL DEFAULT '0',
  `urun_video` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_keyword` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_onecikar` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kullanici_id`, `kategori_id`, `urun_zaman`, `urunfoto_resimyol`, `urun_ad`, `urun_seourl`, `urun_detay`, `urun_fiyat`, `urun_satis`, `urun_video`, `urun_keyword`, `urun_stok`, `urun_durum`, `urun_onecikar`) VALUES
(38, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '1', '', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 34.00, 0, '', '', 0, '1', '1'),
(41, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '2', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae dui tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus odio sit amet erat pharetra, ut iaculis enim viverra. Ut a massa tincidunt, imperdiet magna nec, luctus mauris. Phasellus id nisi turpis. Sed vehicula vulputate nibh, at lobortis tellus rutrum quis. Nulla facilisi. Nulla sed varius magna, pellentesque lacinia ex. Curabitur varius, dolor eget tempor interdum, tellus nisi ullamcorper orci, ac posuere quam turpis quis augue. Nam erat leo, efficitur in vestibulum in, viverra eget mi. Curabitur scelerisque magna a ex lobortis consectetur. Suspendisse volutpat purus est, posuere sagittis metus venenatis nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;In felis quam, dictum id sodales eget, efficitur eu sem. Sed vitae mi tincidunt, porta tortor id, laoreet ipsum. Donec at odio a risus condimentum efficitur eget at nunc. Nulla varius ex at vehicula sodales. Proin ac ornare velit. Donec vel ipsum lacinia, faucibus ex ornare, lobortis ante. Suspendisse et massa lectus. Sed dignissim, massa sit amet finibus imperdiet, nisi metus lobortis metus, nec hendrerit lectus felis et leo. Nullam luctus, nunc non tristique convallis, mi nulla posuere ipsum, vitae rhoncus augue tortor quis risus. Sed id ligula sit amet est facilisis lobortis. In egestas ligula ac vulputate bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Pellentesque malesuada at dolor vitae tincidunt.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi a augue erat. In tincidunt risus id laoreet porta. Proin vitae finibus erat. Ut tellus nibh, viverra finibus turpis ac, sodales condimentum arcu. Morbi condimentum porta interdum. Aenean rhoncus risus id lectus ullamcorper, a venenatis turpis faucibus. Proin pretium est ut congue tempor. Aliquam vehicula ex eu metus semper, ut iaculis tortor luctus. Integer ullamcorper, sem sed euismod tristique, magna massa tempor lacus, vitae vehicula ipsum arcu quis lorem.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi tellus risus, semper nec sollicitudin vel, vehicula ac ex. Aliquam erat volutpat. Cras eu facilisis arcu. Integer nec dapibus dolor. Integer mattis vel ex eu vestibulum. Fusce mattis enim vel ante ullamcorper aliquet. Nam aliquet varius quam. Morbi in iaculis mi, vel accumsan dui.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maecenas rhoncus dignissim dictum. Donec fringilla luctus finibus. Integer augue erat, pellentesque id lorem non, laoreet finibus libero. Phasellus aliquam dignissim porttitor. Aenean semper eros id tellus pharetra, et fringilla tortor commodo. Ut sed scelerisque magna. Sed fermentum nibh in ante euismod iaculis. Donec molestie vehicula varius. Aliquam erat volutpat. Ut ac risus rhoncus, cursus orci in, viverra metus. Etiam non urna et ligula scelerisque imperdiet in quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce egestas aliquet libero, sed sodales ligula dapibus vitae.&lt;/p&gt;\r\n', 34.00, 0, '', '', 0, '1', '1'),
(42, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '3', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae dui tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus odio sit amet erat pharetra, ut iaculis enim viverra. Ut a massa tincidunt, imperdiet magna nec, luctus mauris. Phasellus id nisi turpis. Sed vehicula vulputate nibh, at lobortis tellus rutrum quis. Nulla facilisi. Nulla sed varius magna, pellentesque lacinia ex. Curabitur varius, dolor eget tempor interdum, tellus nisi ullamcorper orci, ac posuere quam turpis quis augue. Nam erat leo, efficitur in vestibulum in, viverra eget mi. Curabitur scelerisque magna a ex lobortis consectetur. Suspendisse volutpat purus est, posuere sagittis metus venenatis nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;In felis quam, dictum id sodales eget, efficitur eu sem. Sed vitae mi tincidunt, porta tortor id, laoreet ipsum. Donec at odio a risus condimentum efficitur eget at nunc. Nulla varius ex at vehicula sodales. Proin ac ornare velit. Donec vel ipsum lacinia, faucibus ex ornare, lobortis ante. Suspendisse et massa lectus. Sed dignissim, massa sit amet finibus imperdiet, nisi metus lobortis metus, nec hendrerit lectus felis et leo. Nullam luctus, nunc non tristique convallis, mi nulla posuere ipsum, vitae rhoncus augue tortor quis risus. Sed id ligula sit amet est facilisis lobortis. In egestas ligula ac vulputate bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Pellentesque malesuada at dolor vitae tincidunt.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi a augue erat. In tincidunt risus id laoreet porta. Proin vitae finibus erat. Ut tellus nibh, viverra finibus turpis ac, sodales condimentum arcu. Morbi condimentum porta interdum. Aenean rhoncus risus id lectus ullamcorper, a venenatis turpis faucibus. Proin pretium est ut congue tempor. Aliquam vehicula ex eu metus semper, ut iaculis tortor luctus. Integer ullamcorper, sem sed euismod tristique, magna massa tempor lacus, vitae vehicula ipsum arcu quis lorem.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi tellus risus, semper nec sollicitudin vel, vehicula ac ex. Aliquam erat volutpat. Cras eu facilisis arcu. Integer nec dapibus dolor. Integer mattis vel ex eu vestibulum. Fusce mattis enim vel ante ullamcorper aliquet. Nam aliquet varius quam. Morbi in iaculis mi, vel accumsan dui.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maecenas rhoncus dignissim dictum. Donec fringilla luctus finibus. Integer augue erat, pellentesque id lorem non, laoreet finibus libero. Phasellus aliquam dignissim porttitor. Aenean semper eros id tellus pharetra, et fringilla tortor commodo. Ut sed scelerisque magna. Sed fermentum nibh in ante euismod iaculis. Donec molestie vehicula varius. Aliquam erat volutpat. Ut ac risus rhoncus, cursus orci in, viverra metus. Etiam non urna et ligula scelerisque imperdiet in quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce egestas aliquet libero, sed sodales ligula dapibus vitae.&lt;/p&gt;\r\n', 34.00, 0, '', '', 0, '1', '1'),
(43, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '4', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae dui tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus odio sit amet erat pharetra, ut iaculis enim viverra. Ut a massa tincidunt, imperdiet magna nec, luctus mauris. Phasellus id nisi turpis. Sed vehicula vulputate nibh, at lobortis tellus rutrum quis. Nulla facilisi. Nulla sed varius magna, pellentesque lacinia ex. Curabitur varius, dolor eget tempor interdum, tellus nisi ullamcorper orci, ac posuere quam turpis quis augue. Nam erat leo, efficitur in vestibulum in, viverra eget mi. Curabitur scelerisque magna a ex lobortis consectetur. Suspendisse volutpat purus est, posuere sagittis metus venenatis nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;In felis quam, dictum id sodales eget, efficitur eu sem. Sed vitae mi tincidunt, porta tortor id, laoreet ipsum. Donec at odio a risus condimentum efficitur eget at nunc. Nulla varius ex at vehicula sodales. Proin ac ornare velit. Donec vel ipsum lacinia, faucibus ex ornare, lobortis ante. Suspendisse et massa lectus. Sed dignissim, massa sit amet finibus imperdiet, nisi metus lobortis metus, nec hendrerit lectus felis et leo. Nullam luctus, nunc non tristique convallis, mi nulla posuere ipsum, vitae rhoncus augue tortor quis risus. Sed id ligula sit amet est facilisis lobortis. In egestas ligula ac vulputate bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Pellentesque malesuada at dolor vitae tincidunt.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi a augue erat. In tincidunt risus id laoreet porta. Proin vitae finibus erat. Ut tellus nibh, viverra finibus turpis ac, sodales condimentum arcu. Morbi condimentum porta interdum. Aenean rhoncus risus id lectus ullamcorper, a venenatis turpis faucibus. Proin pretium est ut congue tempor. Aliquam vehicula ex eu metus semper, ut iaculis tortor luctus. Integer ullamcorper, sem sed euismod tristique, magna massa tempor lacus, vitae vehicula ipsum arcu quis lorem.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi tellus risus, semper nec sollicitudin vel, vehicula ac ex. Aliquam erat volutpat. Cras eu facilisis arcu. Integer nec dapibus dolor. Integer mattis vel ex eu vestibulum. Fusce mattis enim vel ante ullamcorper aliquet. Nam aliquet varius quam. Morbi in iaculis mi, vel accumsan dui.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maecenas rhoncus dignissim dictum. Donec fringilla luctus finibus. Integer augue erat, pellentesque id lorem non, laoreet finibus libero. Phasellus aliquam dignissim porttitor. Aenean semper eros id tellus pharetra, et fringilla tortor commodo. Ut sed scelerisque magna. Sed fermentum nibh in ante euismod iaculis. Donec molestie vehicula varius. Aliquam erat volutpat. Ut ac risus rhoncus, cursus orci in, viverra metus. Etiam non urna et ligula scelerisque imperdiet in quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce egestas aliquet libero, sed sodales ligula dapibus vitae.&lt;/p&gt;\r\n', 34.00, 0, '', '', 0, '1', '1'),
(44, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '5', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae dui tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus odio sit amet erat pharetra, ut iaculis enim viverra. Ut a massa tincidunt, imperdiet magna nec, luctus mauris. Phasellus id nisi turpis. Sed vehicula vulputate nibh, at lobortis tellus rutrum quis. Nulla facilisi. Nulla sed varius magna, pellentesque lacinia ex. Curabitur varius, dolor eget tempor interdum, tellus nisi ullamcorper orci, ac posuere quam turpis quis augue. Nam erat leo, efficitur in vestibulum in, viverra eget mi. Curabitur scelerisque magna a ex lobortis consectetur. Suspendisse volutpat purus est, posuere sagittis metus venenatis nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;In felis quam, dictum id sodales eget, efficitur eu sem. Sed vitae mi tincidunt, porta tortor id, laoreet ipsum. Donec at odio a risus condimentum efficitur eget at nunc. Nulla varius ex at vehicula sodales. Proin ac ornare velit. Donec vel ipsum lacinia, faucibus ex ornare, lobortis ante. Suspendisse et massa lectus. Sed dignissim, massa sit amet finibus imperdiet, nisi metus lobortis metus, nec hendrerit lectus felis et leo. Nullam luctus, nunc non tristique convallis, mi nulla posuere ipsum, vitae rhoncus augue tortor quis risus. Sed id ligula sit amet est facilisis lobortis. In egestas ligula ac vulputate bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Pellentesque malesuada at dolor vitae tincidunt.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi a augue erat. In tincidunt risus id laoreet porta. Proin vitae finibus erat. Ut tellus nibh, viverra finibus turpis ac, sodales condimentum arcu. Morbi condimentum porta interdum. Aenean rhoncus risus id lectus ullamcorper, a venenatis turpis faucibus. Proin pretium est ut congue tempor. Aliquam vehicula ex eu metus semper, ut iaculis tortor luctus. Integer ullamcorper, sem sed euismod tristique, magna massa tempor lacus, vitae vehicula ipsum arcu quis lorem.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi tellus risus, semper nec sollicitudin vel, vehicula ac ex. Aliquam erat volutpat. Cras eu facilisis arcu. Integer nec dapibus dolor. Integer mattis vel ex eu vestibulum. Fusce mattis enim vel ante ullamcorper aliquet. Nam aliquet varius quam. Morbi in iaculis mi, vel accumsan dui.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maecenas rhoncus dignissim dictum. Donec fringilla luctus finibus. Integer augue erat, pellentesque id lorem non, laoreet finibus libero. Phasellus aliquam dignissim porttitor. Aenean semper eros id tellus pharetra, et fringilla tortor commodo. Ut sed scelerisque magna. Sed fermentum nibh in ante euismod iaculis. Donec molestie vehicula varius. Aliquam erat volutpat. Ut ac risus rhoncus, cursus orci in, viverra metus. Etiam non urna et ligula scelerisque imperdiet in quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce egestas aliquet libero, sed sodales ligula dapibus vitae.&lt;/p&gt;\r\n', 34.00, 0, '', '', 0, '1', '1'),
(45, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '6', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae dui tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus odio sit amet erat pharetra, ut iaculis enim viverra. Ut a massa tincidunt, imperdiet magna nec, luctus mauris. Phasellus id nisi turpis. Sed vehicula vulputate nibh, at lobortis tellus rutrum quis. Nulla facilisi. Nulla sed varius magna, pellentesque lacinia ex. Curabitur varius, dolor eget tempor interdum, tellus nisi ullamcorper orci, ac posuere quam turpis quis augue. Nam erat leo, efficitur in vestibulum in, viverra eget mi. Curabitur scelerisque magna a ex lobortis consectetur. Suspendisse volutpat purus est, posuere sagittis metus venenatis nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;In felis quam, dictum id sodales eget, efficitur eu sem. Sed vitae mi tincidunt, porta tortor id, laoreet ipsum. Donec at odio a risus condimentum efficitur eget at nunc. Nulla varius ex at vehicula sodales. Proin ac ornare velit. Donec vel ipsum lacinia, faucibus ex ornare, lobortis ante. Suspendisse et massa lectus. Sed dignissim, massa sit amet finibus imperdiet, nisi metus lobortis metus, nec hendrerit lectus felis et leo. Nullam luctus, nunc non tristique convallis, mi nulla posuere ipsum, vitae rhoncus augue tortor quis risus. Sed id ligula sit amet est facilisis lobortis. In egestas ligula ac vulputate bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Pellentesque malesuada at dolor vitae tincidunt.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi a augue erat. In tincidunt risus id laoreet porta. Proin vitae finibus erat. Ut tellus nibh, viverra finibus turpis ac, sodales condimentum arcu. Morbi condimentum porta interdum. Aenean rhoncus risus id lectus ullamcorper, a venenatis turpis faucibus. Proin pretium est ut congue tempor. Aliquam vehicula ex eu metus semper, ut iaculis tortor luctus. Integer ullamcorper, sem sed euismod tristique, magna massa tempor lacus, vitae vehicula ipsum arcu quis lorem.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi tellus risus, semper nec sollicitudin vel, vehicula ac ex. Aliquam erat volutpat. Cras eu facilisis arcu. Integer nec dapibus dolor. Integer mattis vel ex eu vestibulum. Fusce mattis enim vel ante ullamcorper aliquet. Nam aliquet varius quam. Morbi in iaculis mi, vel accumsan dui.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maecenas rhoncus dignissim dictum. Donec fringilla luctus finibus. Integer augue erat, pellentesque id lorem non, laoreet finibus libero. Phasellus aliquam dignissim porttitor. Aenean semper eros id tellus pharetra, et fringilla tortor commodo. Ut sed scelerisque magna. Sed fermentum nibh in ante euismod iaculis. Donec molestie vehicula varius. Aliquam erat volutpat. Ut ac risus rhoncus, cursus orci in, viverra metus. Etiam non urna et ligula scelerisque imperdiet in quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce egestas aliquet libero, sed sodales ligula dapibus vitae.&lt;/p&gt;\r\n', 34.00, 0, '', '', 0, '1', '1'),
(46, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '7,', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae dui tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus odio sit amet erat pharetra, ut iaculis enim viverra. Ut a massa tincidunt, imperdiet magna nec, luctus mauris. Phasellus id nisi turpis. Sed vehicula vulputate nibh, at lobortis tellus rutrum quis. Nulla facilisi. Nulla sed varius magna, pellentesque lacinia ex. Curabitur varius, dolor eget tempor interdum, tellus nisi ullamcorper orci, ac posuere quam turpis quis augue. Nam erat leo, efficitur in vestibulum in, viverra eget mi. Curabitur scelerisque magna a ex lobortis consectetur. Suspendisse volutpat purus est, posuere sagittis metus venenatis nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;In felis quam, dictum id sodales eget, efficitur eu sem. Sed vitae mi tincidunt, porta tortor id, laoreet ipsum. Donec at odio a risus condimentum efficitur eget at nunc. Nulla varius ex at vehicula sodales. Proin ac ornare velit. Donec vel ipsum lacinia, faucibus ex ornare, lobortis ante. Suspendisse et massa lectus. Sed dignissim, massa sit amet finibus imperdiet, nisi metus lobortis metus, nec hendrerit lectus felis et leo. Nullam luctus, nunc non tristique convallis, mi nulla posuere ipsum, vitae rhoncus augue tortor quis risus. Sed id ligula sit amet est facilisis lobortis. In egestas ligula ac vulputate bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Pellentesque malesuada at dolor vitae tincidunt.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi a augue erat. In tincidunt risus id laoreet porta. Proin vitae finibus erat. Ut tellus nibh, viverra finibus turpis ac, sodales condimentum arcu. Morbi condimentum porta interdum. Aenean rhoncus risus id lectus ullamcorper, a venenatis turpis faucibus. Proin pretium est ut congue tempor. Aliquam vehicula ex eu metus semper, ut iaculis tortor luctus. Integer ullamcorper, sem sed euismod tristique, magna massa tempor lacus, vitae vehicula ipsum arcu quis lorem.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi tellus risus, semper nec sollicitudin vel, vehicula ac ex. Aliquam erat volutpat. Cras eu facilisis arcu. Integer nec dapibus dolor. Integer mattis vel ex eu vestibulum. Fusce mattis enim vel ante ullamcorper aliquet. Nam aliquet varius quam. Morbi in iaculis mi, vel accumsan dui.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maecenas rhoncus dignissim dictum. Donec fringilla luctus finibus. Integer augue erat, pellentesque id lorem non, laoreet finibus libero. Phasellus aliquam dignissim porttitor. Aenean semper eros id tellus pharetra, et fringilla tortor commodo. Ut sed scelerisque magna. Sed fermentum nibh in ante euismod iaculis. Donec molestie vehicula varius. Aliquam erat volutpat. Ut ac risus rhoncus, cursus orci in, viverra metus. Etiam non urna et ligula scelerisque imperdiet in quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce egestas aliquet libero, sed sodales ligula dapibus vitae.&lt;/p&gt;\r\n', 34.00, 0, '', '', 0, '1', '1'),
(47, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '8', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae dui tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus odio sit amet erat pharetra, ut iaculis enim viverra. Ut a massa tincidunt, imperdiet magna nec, luctus mauris. Phasellus id nisi turpis. Sed vehicula vulputate nibh, at lobortis tellus rutrum quis. Nulla facilisi. Nulla sed varius magna, pellentesque lacinia ex. Curabitur varius, dolor eget tempor interdum, tellus nisi ullamcorper orci, ac posuere quam turpis quis augue. Nam erat leo, efficitur in vestibulum in, viverra eget mi. Curabitur scelerisque magna a ex lobortis consectetur. Suspendisse volutpat purus est, posuere sagittis metus venenatis nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;In felis quam, dictum id sodales eget, efficitur eu sem. Sed vitae mi tincidunt, porta tortor id, laoreet ipsum. Donec at odio a risus condimentum efficitur eget at nunc. Nulla varius ex at vehicula sodales. Proin ac ornare velit. Donec vel ipsum lacinia, faucibus ex ornare, lobortis ante. Suspendisse et massa lectus. Sed dignissim, massa sit amet finibus imperdiet, nisi metus lobortis metus, nec hendrerit lectus felis et leo. Nullam luctus, nunc non tristique convallis, mi nulla posuere ipsum, vitae rhoncus augue tortor quis risus. Sed id ligula sit amet est facilisis lobortis. In egestas ligula ac vulputate bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Pellentesque malesuada at dolor vitae tincidunt.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi a augue erat. In tincidunt risus id laoreet porta. Proin vitae finibus erat. Ut tellus nibh, viverra finibus turpis ac, sodales condimentum arcu. Morbi condimentum porta interdum. Aenean rhoncus risus id lectus ullamcorper, a venenatis turpis faucibus. Proin pretium est ut congue tempor. Aliquam vehicula ex eu metus semper, ut iaculis tortor luctus. Integer ullamcorper, sem sed euismod tristique, magna massa tempor lacus, vitae vehicula ipsum arcu quis lorem.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi tellus risus, semper nec sollicitudin vel, vehicula ac ex. Aliquam erat volutpat. Cras eu facilisis arcu. Integer nec dapibus dolor. Integer mattis vel ex eu vestibulum. Fusce mattis enim vel ante ullamcorper aliquet. Nam aliquet varius quam. Morbi in iaculis mi, vel accumsan dui.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maecenas rhoncus dignissim dictum. Donec fringilla luctus finibus. Integer augue erat, pellentesque id lorem non, laoreet finibus libero. Phasellus aliquam dignissim porttitor. Aenean semper eros id tellus pharetra, et fringilla tortor commodo. Ut sed scelerisque magna. Sed fermentum nibh in ante euismod iaculis. Donec molestie vehicula varius. Aliquam erat volutpat. Ut ac risus rhoncus, cursus orci in, viverra metus. Etiam non urna et ligula scelerisque imperdiet in quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce egestas aliquet libero, sed sodales ligula dapibus vitae.&lt;/p&gt;\r\n', 34.00, 0, '', '', 0, '1', '1'),
(48, 165, 11, '2020-06-12 21:54:37', 'dimg/urunfoto/5ee3f99dc8734web-uygulama-guvenlik-testleri-nasil.jpg', '9', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae dui tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus odio sit amet erat pharetra, ut iaculis enim viverra. Ut a massa tincidunt, imperdiet magna nec, luctus mauris. Phasellus id nisi turpis. Sed vehicula vulputate nibh, at lobortis tellus rutrum quis. Nulla facilisi. Nulla sed varius magna, pellentesque lacinia ex. Curabitur varius, dolor eget tempor interdum, tellus nisi ullamcorper orci, ac posuere quam turpis quis augue. Nam erat leo, efficitur in vestibulum in, viverra eget mi. Curabitur scelerisque magna a ex lobortis consectetur. Suspendisse volutpat purus est, posuere sagittis metus venenatis nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;In felis quam, dictum id sodales eget, efficitur eu sem. Sed vitae mi tincidunt, porta tortor id, laoreet ipsum. Donec at odio a risus condimentum efficitur eget at nunc. Nulla varius ex at vehicula sodales. Proin ac ornare velit. Donec vel ipsum lacinia, faucibus ex ornare, lobortis ante. Suspendisse et massa lectus. Sed dignissim, massa sit amet finibus imperdiet, nisi metus lobortis metus, nec hendrerit lectus felis et leo. Nullam luctus, nunc non tristique convallis, mi nulla posuere ipsum, vitae rhoncus augue tortor quis risus. Sed id ligula sit amet est facilisis lobortis. In egestas ligula ac vulputate bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Pellentesque malesuada at dolor vitae tincidunt.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi a augue erat. In tincidunt risus id laoreet porta. Proin vitae finibus erat. Ut tellus nibh, viverra finibus turpis ac, sodales condimentum arcu. Morbi condimentum porta interdum. Aenean rhoncus risus id lectus ullamcorper, a venenatis turpis faucibus. Proin pretium est ut congue tempor. Aliquam vehicula ex eu metus semper, ut iaculis tortor luctus. Integer ullamcorper, sem sed euismod tristique, magna massa tempor lacus, vitae vehicula ipsum arcu quis lorem.&lt;/p&gt;\r\n\r\n&lt;p&gt;Morbi tellus risus, semper nec sollicitudin vel, vehicula ac ex. Aliquam erat volutpat. Cras eu facilisis arcu. Integer nec dapibus dolor. Integer mattis vel ex eu vestibulum. Fusce mattis enim vel ante ullamcorper aliquet. Nam aliquet varius quam. Morbi in iaculis mi, vel accumsan dui.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maecenas rhoncus dignissim dictum. Donec fringilla luctus finibus. Integer augue erat, pellentesque id lorem non, laoreet finibus libero. Phasellus aliquam dignissim porttitor. Aenean semper eros id tellus pharetra, et fringilla tortor commodo. Ut sed scelerisque magna. Sed fermentum nibh in ante euismod iaculis. Donec molestie vehicula varius. Aliquam erat volutpat. Ut ac risus rhoncus, cursus orci in, viverra metus. Etiam non urna et ligula scelerisque imperdiet in quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce egestas aliquet libero, sed sodales ligula dapibus vitae.&lt;/p&gt;\r\n', 34.00, 0, '', '', 0, '1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `yorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yorum_detay` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum_puan` int(11) NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urun_id` int(11) NOT NULL,
  `yorum_durum` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`yorum_id`, `kullanici_id`, `yorum_detay`, `yorum_puan`, `yorum_zaman`, `urun_id`, `yorum_durum`) VALUES
(32, 167, 'orem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beş', 2, '2020-06-16 16:29:12', 38, '0'),
(33, 167, 'orem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beş', 3, '2020-06-16 16:29:26', 38, '0'),
(34, 167, 'asd', 4, '2020-06-18 11:31:50', 42, '0'),
(35, 167, 'ddytky', 2, '2020-06-18 11:32:04', 42, '0'),
(36, 167, 'guışug', 5, '2020-06-18 11:32:23', 42, '0'),
(37, 167, '123123', 1, '2020-06-18 11:32:37', 43, '0'),
(38, 167, 'strhsh', 3, '2020-06-18 11:32:53', 43, '0'),
(39, 167, '345345', 4, '2020-06-18 11:33:08', 43, '0'),
(40, 167, '34535', 4, '2020-06-18 11:33:21', 43, '0'),
(41, 167, 'fxjdtyk', 5, '2020-06-18 11:33:36', 42, '0'),
(42, 167, 'gılulıgglıu', 1, '2020-06-18 11:33:51', 41, '0'),
(43, 167, '575856', 5, '2020-06-18 11:34:29', 42, '0'),
(44, 167, 'sfe', 5, '2020-08-03 19:06:02', 38, '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`banka_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparisdetay_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `banka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750061;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_detay`
--
ALTER TABLE `siparis_detay`
  MODIFY `siparisdetay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
