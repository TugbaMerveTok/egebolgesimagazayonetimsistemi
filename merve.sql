-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2019, 01:15:54
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `merve`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`AID`, `name`, `username`, `pass`) VALUES
(1, 'tugba', 'tgb', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee`
--

CREATE TABLE `employee` (
  `EID` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `shopID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `employee`
--

INSERT INTO `employee` (`EID`, `name`, `username`, `password`, `shopID`) VALUES
(1, 'tugba', 'tugba', '123', 1),
(2, 'buse', 'buse', '456', 2),
(3, 'nevruze', 'nevruze', '789', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `PID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `StokSayısı` int(11) NOT NULL,
  `SID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`PID`, `price`, `StokSayısı`, `SID`) VALUES
(2, 200, 10000, 1),
(3, 150, 12000, 2),
(4, 50, 1000, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shop`
--

CREATE TABLE `shop` (
  `SID` int(11) NOT NULL,
  `shopName` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `shop`
--

INSERT INTO `shop` (`SID`, `shopName`) VALUES
(1, 'Aydın'),
(2, 'Denizli'),
(3, 'İzmir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `soldproducts`
--

CREATE TABLE `soldproducts` (
  `PID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `yıl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `soldproducts`
--

INSERT INTO `soldproducts` (`PID`, `quantity`, `SID`, `price`, `yıl`) VALUES
(2, 5, 1, 0, 2019),
(2, 5, 1, 0, 2019),
(2, 5, 1, 500, 2019),
(2, 5, 1, 500, 2019),
(2, 5, 1, 500, 2019),
(2, 5, 1, 500, 2019),
(3, 5000, 2, 150, 2018),
(4, 8000, 3, 50, 2018),
(3, 5000, 2, 150, 2018),
(4, 8000, 3, 50, 2018),
(2, 1, 1, 100, 2018),
(2, 1, 2, 200, 2019),
(2, 3, 3, 300, 2019);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Tablo için indeksler `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EID`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Tablo için indeksler `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`SID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `employee`
--
ALTER TABLE `employee`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `shop`
--
ALTER TABLE `shop`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
