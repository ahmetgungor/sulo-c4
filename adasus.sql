-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 19 Şub 2021, 13:27:57
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `adasus`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

DROP TABLE IF EXISTS `ayar`;
CREATE TABLE IF NOT EXISTS `ayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `dil` int(11) NOT NULL,
  `tip` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'module adı etiket veya ayarlar gibi ',
  `anahtar` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `deger` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `anahtar` (`anahtar`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`id`, `site`, `dil`, `tip`, `anahtar`, `deger`) VALUES
(5, 'eplassigorta.com.tr', 1, 'site', 'reklam2', 'yeni_reklam_1200x628_px_jpeg[199].jpg'),
(6, 'eplassigorta.com.tr', 1, 'site', 'reklam3', 'whatsapp_image_2020-07-11_at_10.52.02.jpeg'),
(11, 'eplassigorta.com.tr', 1, 'site', 'reklam1url', 'http://127.0.0.2/admin/ayar/index?promo=true&site=eplassigorta.com.tr&dil=1'),
(9, 'eplassigorta.com.tr', 1, 'site', 'css', '.body{\r\n}'),
(10, 'eplassigorta.com.tr', 1, 'site', 'js', '<script>\r\nalert(\"test\")\r\n</script>asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `canli`
--

DROP TABLE IF EXISTS `canli`;
CREATE TABLE IF NOT EXISTS `canli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `home` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `away` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `home_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `away_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `time` bigint(20) NOT NULL,
  `stream_id` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `link` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `m3u8` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stream_id` (`stream_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuid`
--

DROP TABLE IF EXISTS `menuid`;
CREATE TABLE IF NOT EXISTS `menuid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `dil` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazi_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sira` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menuid`
--

INSERT INTO `menuid` (`id`, `baslik`, `site`, `dil`, `yazi_id`, `kategori_id`, `uid`, `sira`) VALUES
(15, 'AnaMenu', 'localhost', '1', 13, 0, 0, 3),
(14, 'AnaMenu', 'localhost', '1', 12, 0, 0, 4),
(7, 'AnaMenu', 'localhost', '1', 9, 0, 0, 0),
(8, 'AnaMenu', 'localhost', '1', 10, 0, 6, 0),
(11, 'AnaMenu', 'localhost', '1', 6, 0, 0, 2),
(13, 'AnaMenu', 'localhost', '1', 11, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `dil` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `g_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `g_keyw` text COLLATE utf8_turkish_ci NOT NULL,
  `g_desc` text COLLATE utf8_turkish_ci NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `y_tarihi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `g_tarihi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `yayin` int(11) NOT NULL,
  `tasarim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tip` int(11) NOT NULL,
  `ustmenu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dil` (`dil`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `page`
--

INSERT INTO `page` (`dil`, `id`, `site`, `g_title`, `g_keyw`, `g_desc`, `baslik`, `link`, `aciklama`, `y_tarihi`, `g_tarihi`, `yayin`, `tasarim`, `tip`, `ustmenu`) VALUES
(2, 5, 'localhost', 'qwe', 'rr', 'cc', 'tes asdasd qwe test', 'tes_asdasd_qwe_test', '<p>asd</p>\r\n', '2021-02-04 01:10:47', '2021-02-04 08:07:08', 0, 'page', 1, 0),
(1, 7, 'eplassigorta.com.tr', '', '', '', 'Ana Sayfa', 'ana_sayfa', '', '2021-02-05 00:12:33', '2021-02-05 00:12:33', 1, 'page', 2, 0),
(1, 8, 'localhost', '', '', '', 'test123', 'test123', ' ', '2021-02-05 01:51:46', '2021-02-05 01:51:46', 1, '', 3, 0),
(1, 9, 'localhost', '', '', '', 'Ana Sayfa', 'ana-sayfa', '', '2021-02-10 04:22:27', '2021-02-10 04:22:27', 1, 'page', 1, 0),
(1, 10, 'localhost', '', '', '', 'Kurumsal', 'kurumsal', '', '2021-02-10 04:22:46', '2021-02-10 04:22:46', 1, 'page', 1, 0),
(1, 11, 'localhost', '', '', '', 'Vizyon & Misyon', 'vizyon-misyon', '', '2021-02-10 04:23:12', '2021-02-10 04:23:12', 1, 'page', 1, 0),
(1, 12, 'localhost', '', '', '', 'İletişim', 'iletisim', '', '2021-02-10 04:23:30', '2021-02-10 04:23:40', 1, 'page', 1, 0),
(1, 13, 'localhost', '', '', '', 'Şubelerimiz', 'subelerimiz', '', '2021-02-10 04:24:33', '2021-02-10 04:24:33', 1, 'page', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

DROP TABLE IF EXISTS `resim`;
CREATE TABLE IF NOT EXISTS `resim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yaziid` int(11) NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `sira` int(11) NOT NULL,
  `onecikan` int(11) NOT NULL,
  `slide` text COLLATE utf8_turkish_ci NOT NULL,
  `slide_adi` text COLLATE utf8_turkish_ci NOT NULL,
  `link` text COLLATE utf8_turkish_ci NOT NULL,
  `kayit_tarihi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`id`, `resim`, `yaziid`, `aciklama`, `sira`, `onecikan`, `slide`, `slide_adi`, `link`, `kayit_tarihi`) VALUES
(26, 'whatsapp_image_2021-01-08_at_17.47.49.jpeg', 9, '', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `isimsoyisim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gsm` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `dogumtarihi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `ktarihi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gtarihi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gkodu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aktif` int(11) NOT NULL,
  `tc` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `kadi`, `isimsoyisim`, `sifre`, `email`, `gsm`, `dogumtarihi`, `aciklama`, `ktarihi`, `gtarihi`, `gkodu`, `aktif`, `tc`) VALUES
(1, 'uyar', 'güneş', '5cfc2315e25373629a4288b8412779df', 'uyar@test.com', '(544)451-87-59', '02-09-1987', '', '2021-01-07 08:36:36', '2021-01-07 08:36:36', '01QJsnHMeSGfcb9EVig2qIu5h7rRAxtX', 1, ''),
(2, 'testrrrcccccfff', 'test2', '175cbe349fb06e2ac806b1cd46de75c6', 'ahmetgungor.m@gmail.com', '(333)333-33-33', '12-31-2312', '', '2021-01-07 08:58:15', '2021-01-08 04:59:34', '8Xr763L90y2QKWtmbhOZuoqlCxUNaMsI', 1, '123123123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye_grup`
--

DROP TABLE IF EXISTS `uye_grup`;
CREATE TABLE IF NOT EXISTS `uye_grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grup_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar` text COLLATE utf8_turkish_ci NOT NULL,
  `py_gunluk_limit` varchar(200) COLLATE utf8_turkish_ci NOT NULL COMMENT 'PY Para yatırma kisaltmasi',
  `py_bakiyeden_discount_tutari` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `pc_gunluk_limit` varchar(200) COLLATE utf8_turkish_ci NOT NULL COMMENT 'PC Para Çekme',
  `pc_discount` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `dc_kac_gun_gecerli` varchar(200) COLLATE utf8_turkish_ci NOT NULL COMMENT 'DC Discount kisaltmasi',
  `dc_kac_katini_oduyor` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
