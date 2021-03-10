-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 10 Mar 2021, 03:46:29
-- Sunucu sürümü: 10.3.23-MariaDB-cll-lve
-- PHP Sürümü: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `intrabettv_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `id` int(11) NOT NULL,
  `site` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `dil` int(11) NOT NULL,
  `tip` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'module adı etiket veya ayarlar gibi ',
  `anahtar` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `deger` mediumtext COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`id`, `site`, `dil`, `tip`, `anahtar`, `deger`) VALUES
(52, 'tbcof.com', 1, 'site', 'reklam3', 'reklam2.gif'),
(11, 'eplassigorta.com.tr', 1, 'site', 'reklam1url', 'http://127.0.0.2/admin/ayar/index?promo=true&site=eplassigorta.com.tr&dil=1'),
(9, 'eplassigorta.com.tr', 1, 'site', 'css', '.body{\r\n}'),
(51, 'tbcof.com', 1, 'site', 'reklam2', 'reklam2.jpg'),
(21, 'tbcof.com', 1, 'site', 'baslik', 'Portobet Tv'),
(22, 'tbcof.com', 1, 'site', 'description', 'Portobet Tv'),
(23, 'tbcof.com', 1, 'site', 'reklam1url', '#'),
(24, 'tbcof.com', 1, 'site', 'reklam2url', '#'),
(25, 'tbcof.com', 1, 'site', 'reklam3url', '#'),
(26, 'tbcof.com', 1, 'site', 'css', '.channel-area .slick-slide:after {\r\n    content: \"\";\r\n    position: inherit;\r\n    top: 0;\r\n    left: 0px;\r\n    width: 100%;\r\n    height: 100%;\r\n    background: radial-gradient(circle at center,#607d8b,rgb(0 0 0));\r\n    z-index: 1;\r\n    transition: all 200ms linear;\r\n    border-radius: 5px;\r\n}\r\n\r\n  #pagesikin {\r\n    position: fixed;\r\n    left: 0;\r\n    right: 0;\r\n    top: 0;\r\n    background: no-repeat center top!importtaant;\r\n    width: 100%;\r\n    height: 100%;\r\n    z-index: -1;\r\n}\r\n\r\nplyr--video {\r\n  border-radius: var(--radius)!important;\r\n}'),
(53, 'tbcof.com', 1, 'site', 'js', ' '),
(28, 'tbcof.com', 1, 'site', 'bgcolor', '#323232'),
(44, 'tbcof.com', 1, 'site', 'mobile_reklam1', 'l7mj6t.gif'),
(35, 'tbcof.com', 1, 'site', 'mobile_reklam1url', 'qweqw'),
(45, 'tbcof.com', 1, 'site', 'mobile_reklam2', 'l7mj6t.gif'),
(37, 'tbcof.com', 1, 'site', 'mobile_reklam2url', '?link'),
(38, 'tbcof.com', 1, 'site', 'bahisyap_btn', 'https://www.google.com/'),
(47, 'tbcof.com', 1, 'site', 'yurl', 'http://portobet.tv/'),
(48, 'tbcof.com', 1, 'site', 'ydomain', '<strong style='),
(49, 'tbcof.com', 1, 'site', 'reklam1', 'reklam1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `canli`
--

CREATE TABLE `canli` (
  `id` int(11) NOT NULL,
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
  `m3u8` mediumtext COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `domain`
--

CREATE TABLE `domain` (
  `id` int(11) NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lisans` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuid`
--

CREATE TABLE `menuid` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `dil` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazi_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sira` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menuid`
--

INSERT INTO `menuid` (`id`, `baslik`, `site`, `dil`, `yazi_id`, `kategori_id`, `uid`, `sira`) VALUES
(15, 'AnaMenu', 'localhost', '1', 13, 0, 0, 3),
(14, 'AnaMenu', 'localhost', '1', 12, 0, 0, 4),
(7, 'AnaMenu', 'localhost', '1', 9, 0, 0, 0),
(8, 'AnaMenu', 'localhost', '1', 10, 0, 6, 0),
(11, 'AnaMenu', 'localhost', '1', 6, 0, 0, 2),
(13, 'AnaMenu', 'localhost', '1', 11, 0, 0, 1),
(16, 'AnaMenu', 'tbcof.com', '1', 14, 0, 0, 0),
(17, 'AnaMenu', 'tbcof.com', '1', 15, 0, 0, 1),
(18, 'AnaMenu', 'tbcof.com', '1', 16, 0, 0, 2),
(19, 'AnaMenu', 'tbcof.com', '1', 17, 0, 0, 3),
(20, 'AnaMenu', 'tbcof.com', '1', 18, 0, 0, 4),
(29, 'KanalListesi', 'tbcof.com', '1', 36, 0, 0, 0),
(30, 'KanalListesi', 'tbcof.com', '1', 37, 0, 0, 2),
(28, 'KanalListesi', 'tbcof.com', '1', 35, 0, 0, 3),
(31, 'KanalListesi', 'tbcof.com', '1', 38, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page`
--

CREATE TABLE `page` (
  `dil` int(11) NOT NULL,
  `id` int(11) NOT NULL,
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
  `ekalan` mediumtext COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `page`
--

INSERT INTO `page` (`dil`, `id`, `site`, `g_title`, `g_keyw`, `g_desc`, `baslik`, `link`, `aciklama`, `y_tarihi`, `g_tarihi`, `yayin`, `tasarim`, `tip`, `ustmenu`, `ekalan`) VALUES
(2, 5, 'localhost', 'qwe', 'rr', 'cc', 'tes asdasd qwe test', 'tes_asdasd_qwe_test', '<p>asd</p>\r\n', '2021-02-04 01:10:47', '2021-02-04 08:07:08', 0, 'page', 1, 0, ''),
(1, 43, 'tbcof.com', 'Fraport TAV Antalyaspor 2021&#39;de yenilgi yüzü görmedi', ' ', 'Fraport TAV Antalyaspor 2021&#39;de yenilgi yüzü görmedi', 'Fraport TAV Antalyaspor 2021&#39;de yenilgi yüzü görmedi', 'fraport-tav-antalyaspor-2021de-yenilgi-yüzü-görmedi', 'Süper Lig&#39;de Fenerbahçe ile 1-1 berabere kalan teknik direktör Ersun Yanal yönetimindeki Fraport TAV Antalyaspor, 2021 yılındaki maçlarda 9 beraberlik, 3 galibiyetle 12 maçta yenilgi yüzü görmedi. Ligde devam eden en uzun yenilmezlik serisinin sahibi olan Ersun Yanal yönetimindeki kırmızı beyazlılar, 55 yılık lig tarihinde ilk defa 12 maçta kaybetmeme rekoru kırdı.\n', '2021-03-05 07:45:32', '2021-03-05 07:45:32', 1, 'page', 7, 0, ''),
(1, 8, 'localhost', '', '', '', 'test123', 'test123', ' ', '2021-02-05 01:51:46', '2021-02-05 01:51:46', 1, '', 3, 0, ''),
(1, 9, 'localhost', '', '', '', 'Ana Sayfa', 'ana-sayfa', '', '2021-02-10 04:22:27', '2021-02-10 04:22:27', 1, 'page', 1, 0, ''),
(1, 10, 'localhost', '', '', '', 'Kurumsal', 'kurumsal', '', '2021-02-10 04:22:46', '2021-02-10 04:22:46', 1, 'page', 1, 0, ''),
(1, 11, 'localhost', '', '', '', 'Vizyon & Misyon', 'vizyon-misyon', '', '2021-02-10 04:23:12', '2021-02-10 04:23:12', 1, 'page', 1, 0, ''),
(1, 12, 'localhost', '', '', '', 'İletişim', 'iletisim', '', '2021-02-10 04:23:30', '2021-02-10 04:23:40', 1, 'page', 1, 0, ''),
(1, 13, 'localhost', '', '', '', 'Şubelerimiz', 'subelerimiz', '', '2021-02-10 04:24:33', '2021-02-10 04:24:33', 1, 'page', 1, 0, ''),
(1, 14, 'tbcof.com', 'canlı tv izle', 'canlı tv izle', 'canlı tv izle', 'Ana Sayfa', 'ana-sayfa', '', '2021-02-20 03:12:45', '2021-03-01 06:27:51', 1, 'AnaSayfa', 1, 0, 'fas fa-home'),
(1, 15, 'tbcof.com', '', '', '', 'Canlı Bahis', 'https://piabet959.com/?btag=a_18932b_1655c_&affid=15669', '', '2021-02-20 05:24:53', '2021-03-01 06:27:12', 1, 'Link', 1, 0, 'fas fa-newspaper'),
(1, 16, 'tbcof.com', '', '', '', 'Canlı Casino', 'https://piabet959.com/', '', '2021-02-20 05:25:53', '2021-03-01 06:28:44', 1, 'Link', 1, 0, 'fas fa-diagnoses'),
(1, 17, 'tbcof.com', '', '', '', 'Sanal Spor', 'https://piabet959.com/', '', '2021-02-20 05:28:02', '2021-03-01 06:29:55', 1, 'Link', 1, 0, 'fas fa-basketball-ball'),
(1, 18, 'tbcof.com', '', '', '', 'Hemen Üye Ol', 'https://piabet959.com/', '', '2021-02-20 05:31:19', '2021-03-01 06:29:10', 1, 'Link', 1, 0, 'fas fa-user-plus'),
(1, 42, 'tbcof.com', 'Fraport TAV Antalyaspor 2021&#39;de yenilgi yüzü görmedi', ' ', 'Fraport TAV Antalyaspor 2021&#39;de yenilgi yüzü görmedi', 'Fraport TAV Antalyaspor 2021&#39;de yenilgi yüzü görmedi', 'fraport-tav-antalyaspor-2021de-yenilgi-yüzü-görmedi', 'Süper Lig&#39;de Fenerbahçe ile 1-1 berabere kalan teknik direktör Ersun Yanal yönetimindeki Fraport TAV Antalyaspor, 2021 yılındaki maçlarda 9 beraberlik, 3 galibiyetle 12 maçta yenilgi yüzü görmedi. Ligde devam eden en uzun yenilmezlik serisinin sahibi olan Ersun Yanal yönetimindeki kırmızı beyazlılar, 55 yılık lig tarihinde ilk defa 12 maçta kaybetmeme rekoru kırdı.\n', '2021-03-05 06:58:53', '2021-03-05 06:58:53', 1, 'page', 7, 0, ''),
(1, 23, 'tbcof.com', 'S Sport', ' ', ' ', 'S Sport', 's-sport', ' ', '2021-03-02 07:40:58', '2021-03-02 07:40:58', 1, 'page', 6, 0, '190'),
(1, 24, 'tbcof.com', 'S Sport', ' ', ' ', 'S Sport', 's-sport', ' ', '2021-03-02 07:41:16', '2021-03-02 07:41:16', 1, 'page', 6, 0, '190'),
(1, 35, 'tbcof.com', 'S Sport', ' ', ' ', 'S Sport', 's-sport', ' ', '2021-03-03 04:21:23', '2021-03-03 04:21:23', 1, 'page', 5, 0, 'https://channel009.b-cdn.net/190-0028.m3u8'),
(1, 36, 'tbcof.com', 'S Sport 2', ' ', ' ', 'S Sport 2', 's-sport-2', ' ', '2021-03-03 04:21:37', '2021-03-03 04:21:37', 1, 'page', 5, 0, 'https://channel009.b-cdn.net/195-0028.m3u8'),
(1, 37, 'tbcof.com', 'Smart Spor', ' ', ' ', 'Smart Spor', 'smart-spor', ' ', '2021-03-03 04:21:48', '2021-03-03 04:21:48', 1, 'page', 5, 0, 'https://channel009.b-cdn.net/202-0028.m3u8'),
(1, 38, 'tbcof.com', 'Bein Sports 1 HD', ' ', ' ', 'Bein Sports 1 HD', 'bein-sports-1-hd', '', '2021-03-03 04:30:15', '2021-03-06 06:22:03', 1, 'page', 5, 0, 'https://channel009.b-cdn.net/601-0028.m3u8'),
(1, 39, 'tbcof.com', '', '', '', 'test', 'test', ' ', '2021-03-04 07:43:11', '2021-03-04 07:43:11', 1, '', 2, 0, ''),
(1, 40, 'tbcof.com', '', '', '', 'test', 'test', '<p>test</p>\r\n', '2021-03-04 07:43:50', '2021-03-04 07:43:50', 1, 'Link', 5, 0, ''),
(1, 41, 'tbcof.com', '', '', '', 'test1', 'test1', '<p>test1</p>\r\n', '2021-03-04 07:46:42', '2021-03-04 07:46:42', 1, 'Link', 5, 0, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `id` int(11) NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yaziid` int(11) NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `sira` int(11) NOT NULL,
  `onecikan` int(11) NOT NULL,
  `slide` text COLLATE utf8_turkish_ci NOT NULL,
  `slide_adi` text COLLATE utf8_turkish_ci NOT NULL,
  `link` text COLLATE utf8_turkish_ci NOT NULL,
  `kayit_tarihi` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`id`, `resim`, `yaziid`, `aciklama`, `sira`, `onecikan`, `slide`, `slide_adi`, `link`, `kayit_tarihi`) VALUES
(26, 'whatsapp_image_2021-01-08_at_17.47.49.jpeg', 9, '', 0, 0, '', '', '', ''),
(27, 'reklam1.jpg', 14, '', 0, 0, '', '', '', ''),
(44, '1614949133.jpeg', 42, '', 0, 1, '', '', '', ''),
(42, '1614766907.png', 37, '', 0, 1, '', '', '', ''),
(41, '1614766896.png', 36, '', 0, 1, '', '', '', ''),
(45, '1614951932.jpeg', 43, '', 0, 1, '', '', '', ''),
(43, '1614767414.png', 38, '', 0, 1, '', 'hjklbsdjkdsnjk', 'jksdxcnksdj', ''),
(40, '1614766883.png', 35, '', 0, 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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
  `tc` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `kadi`, `isimsoyisim`, `sifre`, `email`, `gsm`, `dogumtarihi`, `aciklama`, `ktarihi`, `gtarihi`, `gkodu`, `aktif`, `tc`) VALUES
(1, 'uyar', 'güneş', 'eb5a790b34e06e2ce3346fa2ca5d6abb', 'uyar@test.com', '(544)451-87-59', '02-09-1987', 'tbcof.com', '2021-01-07 08:36:36', '2021-01-07 08:36:36', '01QJsnHMeSGfcb9EVig2qIu5h7rRAxtX', 1, ''),
(2, 'testrrrcccccfff', 'test2', '175cbe349fb06e2ac806b1cd46de75c6', 'ahmetgungor.m@gmail.com', '(333)333-33-33', '12-31-2312', '', '2021-01-07 08:58:15', '2021-01-08 04:59:34', '8Xr763L90y2QKWtmbhOZuoqlCxUNaMsI', 1, '123123123'),
(3, 'ahmet', 'gungor', 'eb5a790b34e06e2ce3346fa2ca5d6abb', 'test@gmail.com', '(544)451-87-59', '', '', '2021-02-25 03:51:17', '2021-02-25 03:51:17', '8ImwExPu5jBysgnNXArQFSTDUGRC7Zh9', 1, ''),
(4, 'test', 'test2', 'eb5a790b34e06e2ce3346fa2ca5d6abb', 'deneme@deneme.com', '(544)451-87-59', '', 'tbcof.com', '2021-02-26 08:38:53', '2021-02-26 08:38:53', 'C8pIuvxiL2J0TMrNKzah3dkZ6RYO194f', 1, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye_grup`
--

CREATE TABLE `uye_grup` (
  `id` int(11) NOT NULL,
  `grup_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar` text COLLATE utf8_turkish_ci NOT NULL,
  `py_gunluk_limit` varchar(200) COLLATE utf8_turkish_ci NOT NULL COMMENT 'PY Para yatırma kisaltmasi',
  `py_bakiyeden_discount_tutari` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `pc_gunluk_limit` varchar(200) COLLATE utf8_turkish_ci NOT NULL COMMENT 'PC Para Çekme',
  `pc_discount` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `dc_kac_gun_gecerli` varchar(200) COLLATE utf8_turkish_ci NOT NULL COMMENT 'DC Discount kisaltmasi',
  `dc_kac_katini_oduyor` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anahtar` (`anahtar`);

--
-- Tablo için indeksler `canli`
--
ALTER TABLE `canli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream_id` (`stream_id`);

--
-- Tablo için indeksler `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menuid`
--
ALTER TABLE `menuid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Tablo için indeksler `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dil` (`dil`,`id`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye_grup`
--
ALTER TABLE `uye_grup`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Tablo için AUTO_INCREMENT değeri `canli`
--
ALTER TABLE `canli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `menuid`
--
ALTER TABLE `menuid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `uye_grup`
--
ALTER TABLE `uye_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
