-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 02:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhome_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `nameBG` varchar(100) NOT NULL,
  `nameEN` varchar(50) NOT NULL,
  `imagePath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nameBG`, `nameEN`, `imagePath`) VALUES
(1, 'Обяви', 'Offers', 'images/offers.png'),
(2, 'Добави обява', 'Add an offer', 'images/sell.png');

-- --------------------------------------------------------

--
-- Table structure for table `ordercontents`
--

CREATE TABLE `ordercontents` (
  `orderID` bigint(20) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `productQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `value` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `value`, `userID`) VALUES
(11, 'Vladislav Petrov', 163, 17),
(13, 'Vladislav Petrov', 957, 17),
(14, 'Vladislav Petrov', 106, 17);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `nameBG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameEn` varchar(100) NOT NULL,
  `categoryID` bigint(20) NOT NULL,
  `shortDescriptionBg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longDescriptionBg` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortDescriptionEn` varchar(256) NOT NULL,
  `longDescriptionEn` varchar(1024) NOT NULL,
  `imagePath` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `quantitySold` bigint(20) NOT NULL,
  `isPromo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nameBG`, `nameEn`, `categoryID`, `shortDescriptionBg`, `longDescriptionBg`, `shortDescriptionEn`, `longDescriptionEn`, `imagePath`, `price`, `quantitySold`, `isPromo`) VALUES
(1, 'Генуя 1 оригинална лира 1794 Италия', 'Genua 1 Authentic lira 1794 made in Italy', 1, 'Генуя 1 лира 1794 Италия ИТ 4603\r\nСъстояние: Много', 'Монетата е невероятно попълнение към колекцията на всеки любител. Само за ценители! В света има останали по-малко от 100 такива бройки.', 'Genua 1 lira 1794 Italy IT 4603\r\nCondition: Very good\r\nCountry: Italy\r\nYear: 1794', 'The coin is an amazing addition to any hobbyists collection. Only for connoisseurs! There are less than 100 such units left in the world.', 'images/item1.jpg', 158, 0, 1),
(2, '6 сребърни руски чашки с ниело позлата', '6 silver Russian cups with niello gilding', 1, 'Стара Русия ранен соц 1950те години - Ръчна израбо', 'Супер стилни и елегантни! За шотове и водка!\r\nЧашки височина 9,8см диаметър 4,2см. х 30ml \r\nПоднос диаметър 17,8см.\r\nобщо 435грама  сребро 875 Русия\r\nСъстояние: Отлично', 'Old Russia early social 1950s handmade! Engraved niello and gilding!', 'Super stylish and elegant!  For shots and vodka!\r\n Cups height 9.8cm diameter 4.2cm.  x 30ml\r\n Tray diameter 17.8 cm.\r\n total 435 grams of silver 875 Russia\r\n Condition: Excellent', 'images/item2.png', 699, 0, 1),
(3, 'Стар бакелетен бакелитов телефон', 'Old Bakelite Bakelite Telephone', 1, 'Отлично визуално състяние, произведен 1957 г. Елпр', 'Колекционерски Много Стар Ретро Телефон \r\nТип:Т-ТА-3 \r\nNo:3883 \r\nБДС-3725-57\r\nПроизведен през 1957година. \r\nИдеален за Колекция, Декорация на Магазин, Заведение или Дома.\r\nПроизводство:М.Т.П.-ЕЛПРОМ\r\nЗавод КЛ.ВОРОШИЛОВ СОФИЯ', 'Excellent visual condition, produced 1957. Elprom Voroshilov', 'Collectible Very Old Retro Phone\r\n Type: T-TA-3\r\n No: 3883\r\n BDS-3725-57\r\n Produced in 1957.\r\n Ideal for Collection, Shop, Restaurant or Home Decoration.\r\n Production: M.T.P.-ELPROM\r\n Factory KL.VOROSHILOV SOFIA', 'images/item3.png', 78, 3, 0),
(4, 'АЛЛА ПУГАЧЕВА Огледало за душа 2 LP 12\"', 'ALLA PUGACHEVA Shower mirror 2 LP 12\"', 1, 'ПЕРФЕКТНО СЪСТОЯНИЕ  НА ВИНИЛ  !!!!!', 'ВИНИЛ - НОВ, БЕЗ ЗАБЕЛЕЖКИ. ПЪРВА  ПРЕСА, издадена от Електрекорд - Русия ,12 инча', 'PERFECT VINYL CONDITION !!!!!', 'VINYL - NEW, NO NOTES. FIRST PRESSING released by Electrekord - Russia .12 inch', 'images/item4.png', 325, 2, 0),
(5, 'Билет ГРАДСКИ ТЕЛЕФОН 5 минути ', 'CITY TELEPHONE TICKET - call 5 minutes 1893', 1, 'ПОЛУЧАВАТЕ БИЛЕТА ОТ СНИМКАТА', 'БИЛЕТА Е РАЗКЪСАН НА 85 % В ОБЛАСТТА НА НАЗЪБВАНЕТО', 'YOU GET THE TICKET FROM THE PHOTO', 'THE TICKET IS 85% BROKEN IN THE GEAR AREA', 'images/item5.png', 16, 0, 0),
(6, 'Германска значка за Олимпиада в Берлин 1936', 'Original German 1936 Berlin Olympics badge', 1, 'Много добро състояние с малки износвания', 'На гърба има маркировка на фирма производител. 100% оригинал, без реставрации. Среща се рядко, на пазара се предлагат много копия и реплики. Размер: 3,3 см. - 3,1 см. Колекционна рядкост!', 'Very good condition with minor wear', 'There is a manufacturers mark on the back. 100% original, no restorations. It is rare, many copies and replicas are available on the market.  Size: 3.3 cm - 3.1 cm Rare collectors item!', 'images/item6.png', 265, 0, 0),
(7, 'Детска Играчка Луноход', '70s Childrens Toy with batteries Lunokhod Russia', 1, 'Играчката е създадена във връзка с изпращането на ', 'Задвижва се с две батерии и се управлява с дистанционно.\r\nразмери 23х13см.', 'The toy was created in connection with the sending of the Russian Lunar Rover ', 'Powered by two batteries and controlled by remote.\r\n dimensions 23x13 cm.', 'images/item7.png', 145, 0, 0),
(8, 'Меден пепелник подкова', 'Copper ashtray horseshoe, lucky horse.', 1, 'Старинен английски пепелник,майсторска ръчна израб', 'Пепелника представлява подкова в реални размери,на дъното има релефно ковано изображение на кон.Разкошна изработка за радост и късмет на притежателя.Размери 14 х 12 х 2 см.Тегло 350 гр.', 'Antique English ashtray, masterfully handcrafted from solid, gleaming copper', 'The ashtray is a horseshoe in real size, on the bottom there is a relief forged image of a horse. Magnificent craftsmanship for the joy and luck of the owner. Dimensions 14 x 12 x 2 cm. Weight 350 g.', 'images/item8.png', 83, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `salt` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `salt`) VALUES
(17, 'admin', 'adminov', 'admin@olxkolekcioneri.com', 'Yoanna123', '9?\"?*?$?2?E9?'),
(22, 'Yoanna', 'Todorova', 'yt@olxkolekcioneri.com', '$2y$10$xq7ub1XOQF1DXXEQ3colZOx57w7x5Uof6oszRGvlOuXWJAc8CtDCy', 'CsAddm9whEoRIzwzauJ55g=='),
(23, 'Vyara', 'Ivanova', 'vi@olxkolekcioneri.com', '$2y$10$.wekKFO7151gU5W36eLKRu78Ky89QqU5t7ElANbApOCy0bGWNaTre', 'o8yVLH7znt6ROY4aOaPaDA=='),
(24, 'Salina', 'Zhelyazkova', 'sz@olxkolekcioneri.com', '$2y$10$NWUbfVRHLlTg3Xgdmfd.wuI3DgGM4ujE.nI.FVJzukOdErJroN8Y6', 'O1Jv1hrKm2BeEGpJJX9Fnw=='),
(25, 'Stella', 'Gadevska', 'sg@olxkolekcioneri.com', '$2y$10$80qhWH4ecyrxLYVWqB9AYOA9A8Z20vrYOxQALFryEp.iiSmKe4XN6', 'kOjrp1+erDxh4lZXr5Z+DA==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordercontents`
--
ALTER TABLE `ordercontents`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordercontents`
--
ALTER TABLE `ordercontents`
  ADD CONSTRAINT `ordercontents_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ordercontents_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
