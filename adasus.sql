-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 11 Oca 2021, 10:09:19
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
