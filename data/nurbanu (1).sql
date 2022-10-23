-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Eki 2022, 14:13:01
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `nurbanu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `telefon` varchar(50) NOT NULL DEFAULT '0216 000 00 00',
  `siteAdi` varchar(50) NOT NULL DEFAULT 'Teknoloji Dünyası',
  `siteAciklama` varchar(250) NOT NULL DEFAULT 'Teknoloji Dünyası online alışveriş sitesini kullanarak ya da mağazalarını ziyaret ederek telefon, bilgisayar, elektronik ev aletleri gibi teknoloji ürünlerine kolayca eriş. ',
  `siteResmi` varchar(100) NOT NULL DEFAULT '234235.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `config`
--

INSERT INTO `config` (`id`, `telefon`, `siteAdi`, `siteAciklama`, `siteResmi`) VALUES
(1, '0216 000 00 00', 'Teknoloji Dünyası', 'Teknoloji Dünyası online alışveriş sitesini kullanarak ya da mağazalarını ziyaret ederek telefon, bilgisayar, elektronik ev aletleri gibi teknoloji ürünlerine kolayca eriş. ', '234235.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filter`
--

CREATE TABLE `filter` (
  `title` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `price` int(255) NOT NULL,
  `year` year(4) NOT NULL,
  `cover` text NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `filter`
--

INSERT INTO `filter` (`title`, `category`, `price`, `year`, `cover`, `cat_id`) VALUES
('Say you are sorry', 'mystery', 3, 2017, 'deneme.webp', 1),
('You will know me', 'mystery', 4, 2016, 'deneme.webp', 2),
('Say you are sorry', 'adventure', 7, 2017, 'deneme.webp', 3),
('New York', 'fiction', 8, 2016, 'deneme.webp', 4),
('The Outsider', 'mystery', 10, 2018, 'deneme.webp', 5),
('You will know me', 'adventure', 11, 2016, 'deneme.webp', 6),
('The Outsider', 'adventure', 12, 2018, 'deneme.webp', 7),
('The gone world', 'fiction', 14, 2017, 'deneme.webp', 8),
('All the birds in sky', 'fiction', 16, 2018, 'deneme.webp', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `foto` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `ustBaslik` char(250) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` char(250) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `foto`, `ustBaslik`, `baslik`, `icerik`) VALUES
(1, 'logo1.png', 'Ayakkabı,Elbise,Gömlek,Çeket', 'Mağazamız Hakkında', '<p>Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.</p><p>We guarantee that you will fall in <i>lust</i> with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.</p>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kat_id` int(11) NOT NULL,
  `baslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kat_id`, `baslik`, `adet`) VALUES
(1, 'Elektronik', 100),
(2, 'Kadın', 5),
(3, 'Erkek', 20);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `linkler`
--

CREATE TABLE `linkler` (
  `linkId` int(11) NOT NULL,
  `linkIndex` int(11) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `linkler`
--

INSERT INTO `linkler` (`linkId`, `linkIndex`, `link`) VALUES
(1, 1, 'urunler.php'),
(2, 2, 'login.php'),
(3, 3, 'logout.php');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `magazasaat`
--

CREATE TABLE `magazasaat` (
  `id` int(11) NOT NULL,
  `gun` char(50) NOT NULL,
  `saat` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `magazasaat`
--

INSERT INTO `magazasaat` (`id`, `gun`, `saat`) VALUES
(1, 'Pazartesi', '08:00 - 19:00'),
(2, 'Salı', '08:00 - 20:00'),
(3, 'Çarşamba', '08:00 - 20:00'),
(4, 'Perşembe', '08:00 - 20:00'),
(5, 'Cuma', '08:00 - 20:00'),
(6, 'Cumartesi', 'Kapalı'),
(7, 'Pazar', 'Kapalı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

CREATE TABLE `marka` (
  `marka_id` int(11) NOT NULL,
  `baslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `marka`
--

INSERT INTO `marka` (`marka_id`, `baslik`, `adet`) VALUES
(1, 'Nike', 13),
(2, 'Adidas', 60),
(3, 'Puma', 20);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `navbarmenu`
--

CREATE TABLE `navbarmenu` (
  `id` int(11) NOT NULL,
  `baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `altbaslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `aktif` tinyint(2) NOT NULL,
  `altbaslik2` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `altbaslik3` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `altbaslik4` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `navbarmenu`
--

INSERT INTO `navbarmenu` (`id`, `baslik`, `altbaslik`, `aktif`, `altbaslik2`, `altbaslik3`, `altbaslik4`) VALUES
(1, 'Anasayfa', '', 1, '', '', ''),
(2, 'Kadın', '', 1, '', '', ''),
(3, 'Erkek', '', 1, '', '', ''),
(4, 'Takı', '', 1, '', '', ''),
(5, 'Ayakkabı', 'Spor', 1, 'Sandalet', 'Terlik', 'Klasik'),
(6, 'İletişim', '', 1, '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_discount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `product_discount`) VALUES
(1, 1, 2, 'Samsung galaxy s7 edge', 5000, 'Samsung galaxy s7 edge', 'product07.png', 'samsung mobile electronics', '8750$'),
(2, 1, 3, 'iPhone 5s', 25000, 'iphone 5s', 'http___pluspng.com_img-png_iphone-hd-png-iphone-apple-png-file-550.png', 'mobile iphone apple', '8750$'),
(3, 1, 3, 'iPad air 2', 30000, 'ipad apple brand', 'da4371ffa192a115f922b1c0dff88193.png', 'apple ipad tablet', '8750$'),
(4, 1, 3, 'iPhone 6s', 32000, 'Apple iPhone ', 'http___pluspng.com_img-png_iphone-6s-png-iphone-6s-gold-64gb-1000.png', 'iphone apple mobile', '8750$'),
(5, 1, 2, 'iPad 2', 10000, 'samsung ipad', 'iPad-air.png', 'ipad tablet samsung', '50$'),
(6, 1, 1, 'samsung Laptop r series', 35000, 'samsung Black combination Laptop', 'laptop_PNG5939.png', 'samsung laptop ', '8750$'),
(7, 1, 1, 'Laptop Pavillion', 50000, 'Laptop Hp Pavillion', 'laptop_PNG5930.png', 'Laptop Hp Pavillion', '8750$'),
(8, 1, 4, 'Sony', 40000, 'Sony Mobile', '530201353846AM_635_sony_xperia_z.png', 'sony mobile', '8750$'),
(9, 1, 3, 'iPhone New', 12000, 'iphone', 'iphone-hd-png-iphone-apple-png-file-550.png', 'iphone apple mobile', '234'),
(10, 2, 6, 'Red Ladies dress', 1000, 'red dress for girls', 'red dress.jpg', 'red dress ', ''),
(11, 2, 6, 'Blue Heave dress', 1200, 'Blue dress', 'images.jpg', 'blue dress cloths', '8750$'),
(12, 2, 6, 'Ladies Casual Cloths', 1500, 'ladies casual summer two colors pleted', '7475-ladies-casual-dresses-summer-two-colors-pleated.jpg', 'girl dress cloths casual', ''),
(13, 2, 6, 'SpringAutumnDress', 1200, 'girls dress', 'Spring-Autumn-Winter-Young-Ladies-Casual-Wool-Dress-Women-s-One-Piece-Dresse-Dating-Clothes-Medium.jpg_640x640.jpg', 'girl dress', ''),
(14, 2, 6, 'Casual Dress', 1400, 'girl dress', 'download.jpg', 'ladies cloths girl', '8750$'),
(15, 2, 6, 'Formal Look', 1500, 'girl dress', 'shutterstock_203611819.jpg', 'ladies wears dress girl', ''),
(16, 3, 6, 'Sweter for men', 600, '2012-Winter-Sweater-for-Men-for-better-outlook', '2012-Winter-Sweater-for-Men-for-better-outlook.jpg', 'black sweter cloth winter', ''),
(17, 3, 6, 'Gents formal', 1000, 'gents formal look', 'gents-formal-250x250.jpg', 'gents wear cloths', ''),
(19, 3, 6, 'Formal Coat', 3000, 'ad', 'images (1).jpg', 'coat blazer gents', ''),
(20, 3, 6, 'Mens Sweeter', 1600, 'jg', 'Winter-fashion-men-burst-sweater.png', 'sweeter gents ', ''),
(21, 3, 6, 'T shirt', 800, 'ssds', 'IN-Mens-Apparel-Voodoo-Tiles-09._V333872612_.jpg', 'formal t shirt black', ''),
(22, 4, 6, 'Yellow T shirt ', 1300, 'yello t shirt with pant', '1.0x0.jpg', 'kids yellow t shirt', ''),
(23, 4, 6, 'Girls cloths', 1900, 'sadsf', 'GirlsClothing_Widgets.jpg', 'formal kids wear dress', ''),
(24, 4, 6, 'Blue T shirt', 700, 'g', 'images.jpg', 'kids dress', ''),
(25, 4, 6, 'Yellow girls dress', 750, 'as', 'images (3).jpg', 'yellow kids dress', ''),
(27, 4, 6, 'Formal look', 690, 'sd', 'image28.jpg', 'formal kids dress', ''),
(32, 5, 0, 'Book Shelf', 2500, 'book shelf', 'furniture-book-shelf-250x250.jpg', 'book shelf furniture', ''),
(33, 6, 2, 'Refrigerator', 35000, 'Refrigerator', 'CT_WM_BTS-BTC-AppliancesHome_20150723.jpg', 'refrigerator samsung', ''),
(34, 6, 4, 'Emergency Light', 1000, 'Emergency Light', 'emergency light.JPG', 'emergency light', ''),
(35, 6, 0, 'Vaccum Cleaner', 6000, 'Vaccum Cleaner', 'images (2).jpg', 'Vaccum Cleaner', ''),
(36, 6, 5, 'Iron', 1500, 'gj', 'iron.JPG', 'iron', ''),
(37, 6, 5, 'LED TV', 20000, 'LED TV', 'images (4).jpg', 'led tv lg', ''),
(38, 6, 4, 'Microwave Oven', 3500, 'Microwave Oven', 'images.jpg', 'Microwave Oven', ''),
(39, 6, 5, 'Mixer Grinder', 2500, 'Mixer Grinder', 'singer-mixer-grinder-mg-46-medium_4bfa018096c25dec7ba0af40662856ef.jpg', 'Mixer Grinder', ''),
(40, 2, 6, 'Formal girls dress', 3000, 'Formal girls dress', 'girl-walking.jpg', 'ladies', ''),
(45, 1, 2, 'Samsung Galaxy Note 3', 10000, '0', 'samsung_galaxy_note3_note3neo.JPG', 'samsung galaxy Note 3 neo', ''),
(46, 1, 2, 'Samsung Galaxy Note 3', 10000, '', 'samsung_galaxy_note3_note3neo.JPG', 'samsung galxaxy note 3 neo', ''),
(47, 4, 6, 'Laptop', 650, 'nbk', 'product01.png', 'Dell Laptop', ''),
(48, 1, 7, 'Headphones', 250, 'Headphones', 'product05.png', 'Headphones Sony', ''),
(49, 1, 7, 'Headphones', 250, 'Headphones', 'product05.png', 'Headphones Sony', ''),
(50, 3, 6, 'boys shirts', 350, 'shirts', 'pm1.JPG', 'suit boys shirts', ''),
(51, 3, 6, 'boys shirts', 270, 'shirts', 'pm2.JPG', 'suit boys shirts', ''),
(52, 3, 6, 'boys shirts', 453, 'shirts', 'pm3.JPG', 'suit boys shirts', ''),
(53, 3, 6, 'boys shirts', 220, 'shirts', 'ms1.JPG', 'suit boys shirts', ''),
(54, 3, 6, 'boys shirts', 290, 'shirts', 'ms2.JPG', 'suit boys shirts', ''),
(55, 3, 6, 'boys shirts', 259, 'shirts', 'ms3.JPG', 'suit boys shirts', ''),
(56, 3, 6, 'boys shirts', 299, 'shirts', 'pm7.JPG', 'suit boys shirts', ''),
(57, 3, 6, 'boys shirts', 260, 'shirts', 'i3.JPG', 'suit boys shirts', ''),
(58, 3, 6, 'boys shirts', 350, 'shirts', 'pm9.JPG', 'suit boys shirts', ''),
(59, 3, 6, 'boys shirts', 855, 'shirts', 'a2.JPG', 'suit boys shirts', ''),
(60, 3, 6, 'boys shirts', 150, 'shirts', 'pm11.JPG', 'suit boys shirts', ''),
(61, 3, 6, 'boys shirts', 215, 'shirts', 'pm12.JPG', 'suit boys shirts', ''),
(62, 3, 6, 'boys shirts', 299, 'shirts', 'pm13.JPG', 'suit boys shirts', ''),
(63, 3, 6, 'boys Jeans Pant', 550, 'Pants', 'pt1.JPG', 'boys Jeans Pant', ''),
(64, 3, 6, 'boys Jeans Pant', 460, 'pants', 'pt2.JPG', 'boys Jeans Pant', ''),
(65, 3, 6, 'boys Jeans Pant', 470, 'pants', 'pt3.JPG', 'boys Jeans Pant', ''),
(66, 3, 6, 'boys Jeans Pant', 480, 'pants', 'pt4.JPG', 'boys Jeans Pant', ''),
(67, 3, 6, 'boys Jeans Pant', 360, 'pants', 'pt5.JPG', 'boys Jeans Pant', ''),
(68, 3, 6, 'boys Jeans Pant', 550, 'pants', 'pt6.JPG', 'boys Jeans Pant', ''),
(69, 3, 6, 'boys Jeans Pant', 390, 'pants', 'pt7.JPG', 'boys Jeans Pant', ''),
(70, 3, 6, 'boys Jeans Pant', 399, 'pants', 'pt8.JPG', 'boys Jeans Pant', ''),
(71, 1, 2, 'Samsung galaxy s7', 5000, 'Samsung galaxy s7', 'product07.png', 'samsung mobile electronics', ''),
(72, 7, 2, 'sony Headphones', 3500, 'sony Headphones', 'product02.png', 'sony Headphones electronics gadgets', ''),
(73, 7, 2, 'samsung Headphones', 3500, 'samsung Headphones', 'product05.png', 'samsung Headphones electronics gadgets', ''),
(74, 1, 1, 'HP i5 laptop', 5500, 'HP i5 laptop', 'product01.png', 'HP i5 laptop electronics', ''),
(75, 1, 1, 'HP i7 laptop 8gb ram', 5500, 'HP i7 laptop 8gb ram', 'product03.png', 'HP i7 laptop 8gb ram electronics', ''),
(76, 1, 5, 'sony note 6gb ram', 4500, 'sony note 6gb ram', 'product04.png', 'sony note 6gb ram mobile electronics', ''),
(77, 1, 4, 'MSV laptop 16gb ram NVIDEA Graphics', 5499, 'MSV laptop 16gb ram', 'product06.png', 'MSV laptop 16gb ram NVIDEA Graphics electronics', ''),
(78, 1, 5, 'dell laptop 8gb ram intel integerated Graphics', 4579, 'dell laptop 8gb ram intel integerated Graphics', 'product08.png', 'dell laptop 8gb ram intel integerated Graphics electronics', ''),
(79, 7, 2, 'camera with 3D pixels', 2569, 'camera with 3D pixels', 'product09.png', 'camera with 3D pixels camera electronics gadgets', ''),
(80, 1, 1, 'ytrfdkjsd', 12343, 'sdfhgh', '1542455446_thythtf .jpeg', 'dfgh', ''),
(81, 4, 6, 'Kids blue dress', 300, 'blue dress', '1543993724_pg4.jpg', 'kids blue dress', ''),
(82, 7, 3, 'anammm', 2500, 'asddas', '1663512504_1200x627-denizli-valiliginden-hastanedeki-kavgayla-ilgili-aciklama-1581447399921.jpg', 'asd', '8750$'),
(83, 1, 1, 'anammm', 2500, 'asd', '1663512794_bannerdoktor2.jpg', 'Umut', '8750$');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `sepetId` int(11) NOT NULL,
  `adet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urunAciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `urunFiyat` int(50) NOT NULL,
  `urunKategori` int(255) NOT NULL,
  `urunMarka` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urunResim1` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urunresim2` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT 'Belirtilmemiş',
  `sira` int(11) NOT NULL,
  `aktif` tinyint(4) NOT NULL,
  `urunozellik1` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urunozellik2` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urunrenk` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urunbeden` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urunAciklama`, `urunFiyat`, `urunKategori`, `urunMarka`, `urunResim1`, `urunresim2`, `sira`, `aktif`, `urunozellik1`, `urunozellik2`, `urunrenk`, `urunbeden`) VALUES
(26, ' puma ', 12500, 1, '', 'deneme.webp', 'Belirtilmemiş', 1, 1, '', '', '', ''),
(27, 'Kodpit', 2516, 2, '', 'deneme2.webp', 'Belirtilmemiş', 10, 1, '', '', '', ''),
(28, ' puma ', 2100, 3, '', 'deneme.webp', 'Belirtilmemiş', 15, 1, '', '', '', ''),
(29, ' puma ', 12600, 1, '', 'elbise.jfif', 'Belirtilmemiş', 16, 1, '', '', '', ''),
(30, ' puma ', 12532, 2, '', 'elbise3.jfif', 'Belirtilmemiş', 17, 1, '', '', '', ''),
(31, ' puma ', 252, 1, '', 'elbise3.jfif', 'Belirtilmemiş', 18, 1, '', '', '', ''),
(32, ' puma ', 251, 2, '', 'elbise.jfif', 'Belirtilmemiş', 2, 1, '', '', '', ''),
(33, ' puma ', 220, 3, '', 'deneme.webp', 'Belirtilmemiş', 20, 1, '', '', '', ''),
(34, ' puma ', 12500, 1, '', 'deneme.webp', 'Belirtilmemiş', 3, 1, '', '', '', ''),
(35, ' puma ', 12500, 1, '', 'deneme.webp', 'Belirtilmemiş', 4, 1, '', '', '', ''),
(36, ' puma ', 12520, 1, '', 'deneme.webp', 'Belirtilmemiş', 5, 1, '', '', '', ''),
(37, 'Kodpit', 12544, 2, '', 'deneme2.webp', 'elbise3.jfif', 11, 1, '', '', '', ''),
(38, 'Kodpit', 2511, 2, '', 'deneme2.webp', 'elbise3.jfif', 12, 1, '', '', '', ''),
(39, 'Kodpit', 2521, 2, '', 'deneme2.webp', 'elbise3.jfif', 13, 1, '', '', '', ''),
(40, 'Kodpit', 2531, 2, '', 'deneme2.webp', 'elbise3.jfif', 14, 1, '', '', '', ''),
(41, ' puma ', 256, 3, '', 'deneme.webp', 'elbise3.jfif', 21, 1, '', '', '', ''),
(42, ' puma ', 240, 3, '', 'deneme.webp', 'deneme.webp', 22, 1, '', '', '', ''),
(43, ' puma ', 2100, 0, '', 'deneme.webp', 'deneme.webp', 6, 0, '', '', '', ''),
(44, 'ali', 2222, 0, '', 'deneme.webp', 'Belirtilmemiş', 19, 1, '', '', '', ''),
(45, ' puma ', 21001, 0, '', 'deneme2.webp', 'deneme2.webp', 7, 1, '', '', '', ''),
(46, ' puma ', 1, 0, '', 'deneme2.webp', 'deneme.webp', 8, 1, '', '', '', ''),
(47, 'aa', 1, 0, '', 'deneme2.webp', 'elbise3.jfif', 9, 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `yetki` bit(1) NOT NULL,
  `ban` bit(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`, `created_at`, `yetki`, `ban`, `email`, `adres`) VALUES
(7, 'umutcan', 'yılmaz', 'umutcan', '$2y$10$vTuupItFZnO5Zn2q4jTjL.H9R37dxErIkNQfdpazpaY64Vtm2pRsy', '2022-09-12 21:12:15', b'1', b'0', 'umut@gmail.com', 'Denizli'),
(13, 'umutcan', 'yılmaz', 'ali', '12d85bea03bbdf8ede0f6ba0603880d6', '2022-09-27 09:18:06', b'0', b'0', 'umutcan_yilmaz03@hotmail.com', 'Denizli'),
(21, 'umutcan', 'yılmaz', 'nurbanu', '$2y$10$JpTyz/Onc5UpSF0aeNst0OTbVW6DFotstzayxQP5xCzj8MYNVIoGu', '2022-10-05 14:50:27', b'0', b'0', 'umutcan_yilmaz03@hotmail.com', 'Denizli');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `yid` int(11) NOT NULL,
  `email` varchar(155) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`yid`, `email`, `name`, `surname`, `password`, `username`, `created_at`) VALUES
(1, 'umutcan_yilmaz03@hotmail.com', 'umutcan', 'yılmaz', '$2y$10$vTuupItFZnO5Zn2q4jTjL.H9R37dxErIkNQfdpazpaY64Vtm2pRsy', 'umutcan', '2022-10-13 20:34:56');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`cat_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kat_id`);

--
-- Tablo için indeksler `linkler`
--
ALTER TABLE `linkler`
  ADD PRIMARY KEY (`linkId`);

--
-- Tablo için indeksler `magazasaat`
--
ALTER TABLE `magazasaat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`marka_id`);

--
-- Tablo için indeksler `navbarmenu`
--
ALTER TABLE `navbarmenu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepetId`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`yid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `filter`
--
ALTER TABLE `filter`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `linkler`
--
ALTER TABLE `linkler`
  MODIFY `linkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `magazasaat`
--
ALTER TABLE `magazasaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `marka`
--
ALTER TABLE `marka`
  MODIFY `marka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `navbarmenu`
--
ALTER TABLE `navbarmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `yid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
