-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 06:18 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `_london_tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `_booked_guided_tours_`
--

CREATE TABLE `_booked_guided_tours_` (
  `_id_` int(11) NOT NULL,
  `_tour_id_` int(11) NOT NULL,
  `_user_id_` int(11) NOT NULL,
  `_date_` date NOT NULL,
  `_number_of_tickets_` int(2) NOT NULL,
  `book_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `_contact_email_` varchar(144) NOT NULL,
  `_contact_number_` int(48) NOT NULL,
  `_address_` varchar(255) NOT NULL,
  `_city_` varchar(56) NOT NULL,
  `_postcode_` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_booked_guided_tours_`
--

INSERT INTO `_booked_guided_tours_` (`_id_`, `_tour_id_`, `_user_id_`, `_date_`, `_number_of_tickets_`, `book_date`, `_contact_email_`, `_contact_number_`, `_address_`, `_city_`, `_postcode_`) VALUES
(66, 3, 7, '2019-11-30', 1, '2019-02-22 03:53:05', 'miha@gmail.com', 2147483647, 'sa21111111', 'Nisporeni', 'nll'),
(67, 3, 7, '2019-02-28', 3, '2019-02-22 02:42:04', ' mihair@gmail.com', 0, 'sa', 'sa', 'sa'),
(94, 1, 3, '2019-11-30', 2, '2019-02-22 04:01:24', 'mihairmcr7@gmail.com', 2147483647, 'sa21111111', 'Nisporeni', 'NS12'),
(95, 2, 7, '2019-02-26', 2, '2019-02-22 04:08:39', ' ion@gmail.com', 421547741, '414 Lenon street', 'Luton', 'LU4 T53');

-- --------------------------------------------------------

--
-- Table structure for table `_gifts_`
--

CREATE TABLE `_gifts_` (
  `_id_` int(11) NOT NULL,
  `_title_` varchar(256) NOT NULL,
  `_description_` varchar(750) NOT NULL,
  `_price_` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_gifts_`
--

INSERT INTO `_gifts_` (`_id_`, `_title_`, `_description_`, `_price_`) VALUES
(1000, 'Mix of Nine London Icons Souvenir Key Rings\r\n', 'A mix of nine of the best selling souvenir keyrings featuring famous landmarks and made from good quality metal.', 9.99),
(1001, 'Gift Set of Four Metal London Keyrings with Bus & Taxi\r\n', 'A set of four souvenir metal keyrings including a Double Decker bus, a post box, a telephone box and a black taxi cab key ring.', 6.11),
(1002, 'Gift Set of Four London Stone Models\r\n', 'A set of four beautifully made miniature model landmarks of England, including London Big Ben, Buckingham Palace, the London Eye and Tower Bridge. A great souvenir idea and a superb addition to any model collection.', 7.69),
(1003, 'Gift Set of Three Diecast Metal Mini London Models\r\n', 'Set of Three Miniature Diecast Metal souvenir models including the famous red Double Decker bus, red telephone box and gold Big Ben models.', 3.69),
(1004, 'Gift Set of 3 Die Cast Metal London Keyrings\r\nGIFT SET OF 3 DIE CAST METAL LONDON KEYRINGS', 'A set of three Die Cast metal souvenir keyrings including a London Red Double Decker Bus Keyring, a post box Keyring and a telephone Box Keyring.', 3.49),
(1005, 'Gift Set of 3 Union Jack Pens\r\n', 'A set of three wavy clip ballpoint pens featuring the British Union Jack flag. A timeless keepsake from a visit to Britain.', 2.95),
(1006, 'English Tea Souvenir Selection Gift Set\r\n', 'Part of our best-selling range of British heritage mini tin gift packs containing a selection of fine English teas (loose).', 5.49),
(1007, 'Set of Four UK Union Jack Pencils with Ruler\r\n', 'This set of four UK flag Union Jack pencils with a matching ruler is great for use in schools and offices and to give as presents.', 1.29),
(1008, 'Gift Set of 3 London Souvenir Fridge Magnets', 'Set of three resin Fridge Magnets including a Post Box, a Telephone Box and a red Double Decker bus.', 3.29),
(1011, 'Rubber PVC London Collage Magnet', 'An attractive, colourful rubber fridge magnet, artistically depicting famous sights of the British capital.', 1.29);

-- --------------------------------------------------------

--
-- Table structure for table `_guess_`
--

CREATE TABLE `_guess_` (
  `_user_id_` int(11) NOT NULL,
  `_user_first_name_` varchar(144) NOT NULL,
  `_user_last_name_` varchar(144) NOT NULL,
  `_user_email_` varchar(144) NOT NULL,
  `_user_phone_no_` varchar(56) NOT NULL,
  `_user_street_` varchar(255) NOT NULL,
  `_user_city_` varchar(56) NOT NULL,
  `_user_postcode_` varchar(56) NOT NULL,
  `_user_password_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_souvenirs_`
--

CREATE TABLE `_souvenirs_` (
  `_id_` int(11) NOT NULL,
  `_title_` varchar(256) NOT NULL,
  `_description_` varchar(750) NOT NULL,
  `_price_` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_souvenirs_`
--

INSERT INTO `_souvenirs_` (`_id_`, `_title_`, `_description_`, `_price_`) VALUES
(0, 'Aprons, Tea Towels & Kitchenware', 'A mix of nine of the best selling souvenir keyrings featuring famous landmarks and made from good quality metal.', 9.99),
(1, 'Badges & Patches\r\n', 'A set of four souvenir metal keyrings including a Double Decker bus, a post box, a telephone box and a black taxi cab key ring.', 2.55),
(2, 'London Union Jack Baseball Cap', 'Sturdy polyresin bottle opener sculpted in the shape of a Queens Royal Guard, with a solid steel opener. ', 3.99),
(3, 'Bottle Openers, Lighters & Ash Trays', 'Set of Three Miniature Diecast Metal souvenir models including the famous red Double Decker bus, red telephone box and gold Big Ben models.', 3.69),
(4, 'London Fridge Magnets 3 DIE CAST METAL LONDON KEYRINGS', 'Large metal multiscene souvenir magnet with images of popular London attractions including a post box, Phone Box, etc.', 8.49),
(5, 'I Love London Souvenirs', 'A superb idea for a little souvenir from England. Great to stick notes on the fridge.', 4.45),
(6, 'Money Boxes', 'Red tin Telephone Box moneybox tea caddy with 20 tagged English Breakfast teabags.', 5.12),
(7, 'White London Souvenir School Kit', 'A white souvenir school kit with pencil case, Union Jack British Bus pencil, bus ruler, Union Jack eraser and bus sharpener.', 1.99),
(8, 'Union Jack Paper Gift Bag', 'These strong bags are ideal for a range of uses, from gifting sweets and chocolates to small or medium sized souvenirs.', 0.15),
(9, '17cm Light Up Gold Plated Crystal Big Ben Clock', 'An absolutely stunning treat from the capital. This gold plated Crystal Big Ben Clock has colour changing lights.', 14.99),
(10, 'Glitter Heart Union Jack Fridge Magnet', 'Add some style to your fridge with this PVC Glitter Heart shaped Union Jack Magnet.', 1.49),
(11, 'Union Jack T Shirt Rubber Magnet', 'This fun rubber British magnet is shaped like a Union Jack T shirt and has the name of the capital in the middle. ', 5.65);

-- --------------------------------------------------------

--
-- Table structure for table `_support_req_`
--

CREATE TABLE `_support_req_` (
  `_id_` int(11) NOT NULL,
  `_userID_` int(11) NOT NULL,
  `_phoneNumber_` int(20) DEFAULT NULL,
  `_subject_` varchar(144) DEFAULT NULL,
  `_message_` varchar(255) NOT NULL,
  `_date_` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_support_req_`
--

INSERT INTO `_support_req_` (`_id_`, `_userID_`, `_phoneNumber_`, `_subject_`, `_message_`, `_date_`) VALUES
(13, 4, 2147483647, 'dsa', 'fdsfsf', '2019-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `_tours_`
--

CREATE TABLE `_tours_` (
  `_id_` int(11) NOT NULL,
  `_title_` varchar(500) NOT NULL,
  `_short_description_` varchar(500) NOT NULL,
  `_full_description_` varchar(1500) NOT NULL,
  `_region_` varchar(30) NOT NULL,
  `_color_` varchar(30) NOT NULL,
  `_duration_` varchar(255) NOT NULL,
  `_frequency_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_tours_`
--

INSERT INTO `_tours_` (`_id_`, `_title_`, `_short_description_`, `_full_description_`, `_region_`, `_color_`, `_duration_`, `_frequency_`) VALUES
(1, 'Route A', 'Discover the best of Central London on our A Route bus tours. Our A Route bus tours feature live, English-speaking guides on all buses - experts in sharing facts and stories about London\'s fascinating history, culture and architecture. ', 'The A Route showcases the best of London, from exclusive Belgravia in the west to Tower Bridge in the east. You\'re welcome to hop on and hop off the bus at over 20 different stops, each conveniently located close to landmarks like Big Ben, Buckingham Palace, the Tower of London, Trafalgar Square, and more.', 'West-East', 'Red', '2 hours, 40 minutes', 'Every 10-15 Minutes'),
(2, 'Route B', 'Hop on our London B Route Tour to discover the best of North London, from elegant Kensington Palace and bustling Harrods, to stylish Notting Hill and famous Paddington station . ', 'Along the way, you\'ll enjoy an entertaining and informative digital commentary, available in 12 languages and broadcast via complimentary headphones.', 'North-South', 'B', '2 hours, 30 minutes', 'Every 10-15 Minutes'),
(3, 'Route A & B', 'Hop on our London A & B Link Route, ', 'Connects King\'s Cross and St. Pancras stations with the heart of London, where you\'ll be able to easily all combined landmarks from A Route and B Route guided tours. The A & B guided tour features pre-recorded commentary, available in 12 languages.\r\n\r\n', 'West-East plus North-South', 'Green', '4 hours, 50 minutes', 'Every 10-15 Minutes');

-- --------------------------------------------------------

--
-- Table structure for table `_users_`
--

CREATE TABLE `_users_` (
  `_user_id_` int(11) NOT NULL,
  `_user_first_name_` varchar(144) NOT NULL,
  `_user_last_name_` varchar(144) NOT NULL,
  `_user_email_` varchar(144) NOT NULL,
  `_user_phone_no_` varchar(56) NOT NULL,
  `_user_street_` varchar(255) NOT NULL,
  `_user_city_` varchar(56) NOT NULL,
  `_user_postcode_` varchar(56) NOT NULL,
  `_user_password_` varchar(255) NOT NULL,
  `_privileges_` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_users_`
--

INSERT INTO `_users_` (`_user_id_`, `_user_first_name_`, `_user_last_name_`, `_user_email_`, `_user_phone_no_`, `_user_street_`, `_user_city_`, `_user_postcode_`, `_user_password_`, `_privileges_`) VALUES
(3, ' Mihail', 'Tudos', 'mihairmcr7@gmail.com', '7491648162', '258 High Street North', 'Dunstable', 'LU6 1BE', '$2y$10$XpzAxj4AbkNtZry8YPOunOmil5vK6ZWtx/jcQUiHDYtlAyknspGhy', 0),
(4, ' Mihail', 'Tudos', 'mihairmcr8@gmail.com', '7491648162', '258 High Street North', 'Dunstable', 'LU6 1BE', '$2y$10$Oy7kaSt3FgA1MvGBdB0WqO/y1YuXsWuu7CTDfZQ1s71DONWzeolM.', 0),
(5, ' Mihail', 'Tudos', 'mihairmcr9@gmail.com', '7491648162', '258 High Street North', 'Dunstable', 'LU6 1BE', '$2y$10$NkmPYElUeemLIA0MYzy1XupDpmwTbmz22VDQDVG..YVdvgaynlr/.', 0),
(7, 'Mihail', 'Tudos', 'mihailtudos@outlook.com', '07454524885', '241 South street', 'London', 'HA9 0WS', '$2y$10$Oy7kaSt3FgA1MvGBdB0WqO/y1YuXsWuu7CTDfZQ1s71DONWzeolM.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_booked_guided_tours_`
--
ALTER TABLE `_booked_guided_tours_`
  ADD PRIMARY KEY (`_id_`),
  ADD KEY `_tour_id_` (`_tour_id_`),
  ADD KEY `_user_id_` (`_user_id_`);

--
-- Indexes for table `_gifts_`
--
ALTER TABLE `_gifts_`
  ADD PRIMARY KEY (`_id_`);

--
-- Indexes for table `_guess_`
--
ALTER TABLE `_guess_`
  ADD PRIMARY KEY (`_user_id_`);

--
-- Indexes for table `_souvenirs_`
--
ALTER TABLE `_souvenirs_`
  ADD PRIMARY KEY (`_id_`);

--
-- Indexes for table `_support_req_`
--
ALTER TABLE `_support_req_`
  ADD PRIMARY KEY (`_id_`);

--
-- Indexes for table `_tours_`
--
ALTER TABLE `_tours_`
  ADD PRIMARY KEY (`_id_`);

--
-- Indexes for table `_users_`
--
ALTER TABLE `_users_`
  ADD PRIMARY KEY (`_user_id_`),
  ADD UNIQUE KEY `_user_email_` (`_user_email_`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_booked_guided_tours_`
--
ALTER TABLE `_booked_guided_tours_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `_gifts_`
--
ALTER TABLE `_gifts_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `_guess_`
--
ALTER TABLE `_guess_`
  MODIFY `_user_id_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_souvenirs_`
--
ALTER TABLE `_souvenirs_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `_support_req_`
--
ALTER TABLE `_support_req_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `_tours_`
--
ALTER TABLE `_tours_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `_users_`
--
ALTER TABLE `_users_`
  MODIFY `_user_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_booked_guided_tours_`
--
ALTER TABLE `_booked_guided_tours_`
  ADD CONSTRAINT `_tour_id_` FOREIGN KEY (`_tour_id_`) REFERENCES `_tours_` (`_id_`),
  ADD CONSTRAINT `_user_id_` FOREIGN KEY (`_user_id_`) REFERENCES `_users_` (`_user_id_`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
