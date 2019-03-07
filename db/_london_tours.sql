-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2019 at 07:33 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
-- Table structure for table `_attractions_`
--

CREATE TABLE `_attractions_` (
  `_id_` int(11) NOT NULL,
  `_title_` varchar(128) NOT NULL,
  `_subtitle_` varchar(512) NOT NULL,
  `_description_` varchar(2560) NOT NULL,
  `_price_` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_attractions_`
--

INSERT INTO `_attractions_` (`_id_`, `_title_`, `_subtitle_`, `_description_`, `_price_`) VALUES
(101, 'Tower of London', 'The Tower of London is a powerful symbol of England, and a treasure trove of captivating history. ', 'The Tower of London is a powerful symbol of England, and a treasure trove of captivating history. Marvel at the Crown Jewels and Traitors\' Gate, hear stories from the iconic Beefeaters, see the infamous ravens, and discover how English history was made at this impressive seat of power - at once a fortress, royal palace and infamous prison. Choose a ticket that covers your entry to the Tower of London, or upgrade your royal experience with one of the \'Palace Pass\' combination tickets, giving you the ability to visit the Tower of London, Kensington Palace, Hampton Court Palace or Banqueting House at your leisure. Please note that Hampton Court Palace is not located in Central London, so Big Bus Tours doesn\'t have a stop nearby. But, you can quickly and easily reach Hampton Court by train from Waterloo Station.', 21),
(102, 'The London Eye', 'The London Eye is a cantilevered observation wheel on the South Bank of the River Thames in London.', 'Choose between standard or fast track entry and climb aboard one of the London Eye\'s 32 glass capsules - you\'ll take a turn over the Thames for stunning views of London and its remarkable Landmarks. Tell the time by Big Ben, see the devilish detail in the extravagant Houses of Parliament, and perhaps even hear the chimes at St Paul\'s. Moving at a speed of 26 cm per second, a full revolution of the London Eye lasts about 30 minutes. While on board, you\'ll be able to enjoy an ever-changing perspective of London, with interactive digital guides available in 7 languages. From the very top, you can see for up to 40 km on a clear day.', 20),
(103, 'St. Paul\'s Cathedral', 'St. Paul\'s Cathedral\r\nCompleted in 1710, the current iteration of St. Paul\'s Cathedral was designed by the famous architecht, Sir Christopher Wren. ', 'Completed in 1710, the current iteration of St. Paul\'s Cathedral was designed by the famous architecht, Sir Christopher Wren. Its soaring dome is an icon of London, and visitors will have the opportunity to climb and explore it from three different viewing galleries, along with the expansive subterranean crypt. Admission also includes multimedia guides and guided tours. Marvel at the grand spectacle of the Cathedral\'s lavishly appointed baroque interior, then climb the stairs to take in sweeping views of London from the Stone and Golden Galleries. Explore the crypt to find famous names, study the elements of the Cathedral\'s classical features, and discover how Wren\'s clever designs made this masterpiece a reality.', 18),
(104, 'Tower Bridge ', 'The world-famous Tower Bridge is an icon of London and one of Victorian engineering\'s finest creations.', 'Standing guard over the River Thames, the world-famous Tower Bridge is an icon of London and one of Victorian engineering’s finest creations. Take in great views of the city and get an insider\'s perspective on the workings of the bridge at the unique Tower Bridge Exhibitions. Uncover the stories and characters of the bridge\'s construction, explore the atmospheric Victorian engine rooms, and cross Tower Bridge to see London beneath your feet from the glass walkway. The Tower Bridge Exhibition is one of London\'s most highly rated hidden gems, and an unmissable addition to your London sightseeing adventure.', 19),
(105, 'SeaLife Aquarium', 'SeaLife London Aquarium presents thousands of unique sea creatures in a series of special aquatic habitats', 'Take a fascinating journey beneath the waves at SeaLife London Aquarium. From coastal beaches and reefs to the dark depths of the ocean, you\'ll see thousands of unique sea creatures in a series of special aquatic habitats. Explore these custom-designed zones to see animals like sharks, penguins, jellyfish, crocodiles, rays and more. Located on London\'s South Bank beneath the London Eye, SeaLife London Aquarium is the perfect place to delight and entertain the whole family. Feed your curiosity in this magical underwater environment, which offers the chance to observe and learn about unique sea creatures in a variety of different marine zones.', 14),
(106, 'London Dungeon', 'The London Dungeon and embark on a descent to uncover some of the city\'s gruesome past - bringing together an amazing cast of theatrical actors', 'London has some 2,000 years of history behind it, and some of it is fairly dark. Visit The London Dungeon and embark on a descent to uncover some of the city\'s gruesome past - bringing together an amazing cast of theatrical actors, special effects, stages, scenes and rides. This original and exciting walkthrough experience stimulates all the senses - making you feel as if you\'re right in the middle of history. Located just by the London Eye on the South Bank, the London Dungeon has been one of the city\'s most popular attractions for over 40 years. The full experiences takes just under 2 hours. Please note that a lot of the London Dungeon is designed to give you a scare, so if you\'re with children under 12, visit with caution.', 12);

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
(67, 3, 7, '2019-02-28', 3, '2019-02-22 02:42:04', ' mihair@gmail.com', 0, 'sa', 'sa', 'sa'),
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
(5001, 'Mix of Nine London Icons Souvenir Key Rings\r\n', 'A mix of nine of the best selling souvenir keyrings featuring famous landmarks and made from good quality metal.', 9.99),
(5002, 'Gift Set of Four Metal London Keyrings with Bus & Taxi\r\n', 'A set of four souvenir metal keyrings including a Double Decker bus, a post box, a telephone box and a black taxi cab key ring.', 6.11),
(5003, 'Gift Set of Four London Stone Models\r\n', 'A set of four beautifully made miniature model landmarks of England, including London Big Ben, Buckingham Palace, the London Eye and Tower Bridge. ', 7.69),
(5004, 'Gift Set of Three Diecast Metal Mini London Models\r\n', 'Set of Three Miniature Diecast Metal souvenir models including the famous red Double Decker bus, red telephone box and gold Big Ben models.', 3.69),
(5005, 'Gift Set of 3 Die Cast Metal London Keyrings\r\nGIFT ', 'A set of three Die Cast metal souvenir keyrings including a London Red Double Decker Bus Keyring, a post box Keyring and a telephone Box Keyring.', 3.49),
(5006, 'Gift Set of 3 Union Jack Pens\r\n', 'A set of three wavy clip ballpoint pens featuring the British Union Jack flag. A timeless keepsake from a visit to Britain.Nice, colorful, and durable pan', 2.95),
(5007, 'English Tea Souvenir Selection Gift Set\r\n', 'Part of our best-selling range of British heritage mini tin gift packs containing a selection of fine English teas (loose).', 5.49),
(5008, 'Set of Four UK Union Jack Pencils with Ruler\r\n', 'This set of four UK flag Union Jack pencils with a matching ruler is great for use in schools and offices and to give as presents.', 1.29),
(5009, 'Gift Set of 3 London Souvenir Fridge Magnets', 'Set of three resin Fridge Magnets including a Post Box, a Telephone Box and a red Double Decker bus.', 3.29),
(5010, 'Rubber PVC London Collage Magnet', 'An attractive, colourful rubber fridge magnet, artistically depicting famous sights of the British capital.', 1.29);

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
(1013, 'Aprons, Tea Towels & Kitchenware', 'A mix of nine of the best selling souvenir keyrings featuring famous landmarks and made from good quality metal.', 9.99),
(1014, 'Badges & Patches\r\n', 'A set of four souvenir metal keyrings including a Double Decker bus, a post box, a telephone box and a black taxi cab key ring.', 2.55),
(1015, 'London Union Jack Baseball Cap', 'Sturdy polyresin bottle opener sculpted in the shape of a Queens Royal Guard, with a solid steel opener. ', 3.99),
(1016, 'Bottle Openers, Lighters & Ash Trays', 'Set of Three Miniature Diecast Metal souvenir models including the famous red Double Decker bus, red telephone box and gold Big Ben models.', 3.69),
(1017, 'London Fridge Magnets 3 DIE CAST METAL LONDON KEYRINGS', 'Large metal multiscene souvenir magnet with images of popular London attractions including a post box, Phone Box, etc.', 8.49),
(1018, 'I Love London Souvenirs', 'A superb idea for a little souvenir from England. Great to stick notes on the fridge.', 4.45),
(1019, 'Money Boxes', 'Red tin Telephone Box moneybox tea caddy with 20 tagged English Breakfast teabags.', 5.12),
(1020, 'White London Souvenir School Kit', 'A white souvenir school kit with pencil case, Union Jack British Bus pencil, bus ruler, Union Jack eraser and bus sharpener.', 1.99),
(1021, 'Union Jack Paper Gift Bag', 'These strong bags are ideal for a range of uses, from gifting sweets and chocolates to small or medium sized souvenirs.', 0.15),
(1022, '17cm Light Up Gold Plated Crystal Big Ben Clock', 'An absolutely stunning treat from the capital. This gold plated Crystal Big Ben Clock has colour changing lights.', 14.99),
(1023, 'Glitter Heart Union Jack Fridge Magnet', 'Add some style to your fridge with this PVC Glitter Heart shaped Union Jack Magnet.', 1.49),
(1024, 'Union Jack T Shirt Rubber Magnet', 'This fun rubber British magnet is shaped like a Union Jack T shirt and has the name of the capital in the middle. ', 5.65);

-- --------------------------------------------------------

--
-- Table structure for table `_stops_`
--

CREATE TABLE `_stops_` (
  `_id_` int(11) NOT NULL,
  `_route_id_` int(11) NOT NULL,
  `_name_` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_stops_`
--

INSERT INTO `_stops_` (`_id_`, `_route_id_`, `_name_`) VALUES
(1, 1, 'Green Park Underground'),
(2, 1, 'Hyde Park Corner'),
(3, 1, 'Queen Mother Gates'),
(4, 1, 'Marble Arch'),
(5, 1, 'Mayfair'),
(6, 1, 'Regent Street'),
(7, 1, 'Piccadilly Circus'),
(8, 1, 'Haymarket'),
(9, 1, 'Trafalgar Square'),
(10, 1, 'Craig\'s Court'),
(11, 1, 'Whitehall'),
(12, 1, 'London Eye'),
(14, 1, 'Waterloo (Eastbound)'),
(15, 1, 'Covent Garden'),
(16, 1, 'St Paul\'s Cathedral'),
(17, 1, 'Tower of London'),
(18, 1, 'Temple Underground Station'),
(19, 1, 'Westminster Pier'),
(20, 1, 'Lambeth Palace'),
(21, 1, 'Buckingham Palace'),
(22, 1, 'Nova Complex'),
(23, 1, 'Victoria Station'),
(24, 2, 'Hyde Park Corner'),
(25, 2, 'Harrods'),
(26, 2, 'South Kensington Museums'),
(27, 2, 'Gloucester Road'),
(28, 2, 'Kensington Palace'),
(29, 2, 'Notting Hill'),
(30, 2, 'Kensington Gardens'),
(31, 2, 'Thistle Hotel'),
(32, 2, 'Lancaster Gate'),
(33, 2, 'Paddington Station'),
(34, 2, 'Praed Street'),
(35, 2, 'Baker Street');

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
(13, 4, 2147483647, 'dsa', 'fdsfsf', '2019-02-07'),
(14, 4, 2147483647, 'Help', 'I need some help<>', '2019-02-25'),
(15, 4, 521210, 'sa', 'mihaii', '2019-02-25'),
(16, 4, 451165416, 'mihail', 'mihai', '2019-02-25'),
(17, 7, 48353, 'Refound', 'hid', '2019-03-05'),
(18, 7, 65474, 'Refound', 'fgdsg', '2019-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `_temp_cart`
--

CREATE TABLE `_temp_cart` (
  `_id_` int(11) NOT NULL,
  `_item_id_` int(11) NOT NULL,
  `_title_` varchar(256) NOT NULL,
  `_number_` int(11) NOT NULL,
  `_date_` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_temp_cart`
--

INSERT INTO `_temp_cart` (`_id_`, `_item_id_`, `_title_`, `_number_`, `_date_`) VALUES
(2, 2, '', 1, '2019-03-20'),
(3, 2, '', 1, '2019-03-27'),
(4, 2, '', 1, '2019-03-22'),
(8, 102, 'The London Eye', 1, '2019-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `_tours_`
--

CREATE TABLE `_tours_` (
  `_id_` int(11) NOT NULL,
  `_title_` varchar(500) NOT NULL,
  `_short_description_` varchar(500) NOT NULL,
  `_description_` varchar(1500) NOT NULL,
  `_region_` varchar(30) NOT NULL,
  `_color_` varchar(30) NOT NULL,
  `_duration_` varchar(255) NOT NULL,
  `_frequency_` varchar(255) NOT NULL,
  `_price_` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_tours_`
--

INSERT INTO `_tours_` (`_id_`, `_title_`, `_short_description_`, `_description_`, `_region_`, `_color_`, `_duration_`, `_frequency_`, `_price_`) VALUES
(1, 'Route A', 'Discover the best of Central London on our A Route bus tours. Our A Route bus tours feature live, English-speaking guides on all buses - experts in sharing facts and stories about London\'s fascinating history, culture and architecture. ', 'The A Route showcases the best of London, from exclusive Belgravia in the west to Tower Bridge in the east. You\'re welcome to hop on and hop off the bus at over 20 different stops, each conveniently located close to landmarks like Big Ben, Buckingham Palace, the Tower of London, Trafalgar Square, and more.', 'West-East', 'Red', '2 hours, 40 minutes', 'Every 10-15 Minutes', 17.5),
(2, 'Route B', 'Hop on our London B Route Tour to discover the best of North London, from elegant Kensington Palace and bustling Harrods, to stylish Notting Hill and famous Paddington station . ', 'Along the way, you\'ll enjoy an entertaining and informative digital commentary, available in 12 languages and broadcast via complimentary headphones.', 'North-South', 'B', '2 hours, 30 minutes', 'Every 10-15 Minutes', 17.5),
(3, 'Route A & B', 'Hop on our London A & B Link Route, ', 'Connects King\'s Cross and St. Pancras stations with the heart of London, where you\'ll be able to easily all combined landmarks from A Route and B Route guided tours. The A & B guided tour features pre-recorded commentary, available in 12 languages.\r\n\r\n', 'West-East plus North-South', 'Green', '4 hours, 50 minutes', 'Every 10-15 Minutes', 30.5);

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
-- Indexes for table `_attractions_`
--
ALTER TABLE `_attractions_`
  ADD PRIMARY KEY (`_id_`);

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
-- Indexes for table `_stops_`
--
ALTER TABLE `_stops_`
  ADD PRIMARY KEY (`_id_`),
  ADD KEY `_route_id_` (`_route_id_`);

--
-- Indexes for table `_support_req_`
--
ALTER TABLE `_support_req_`
  ADD PRIMARY KEY (`_id_`);

--
-- Indexes for table `_temp_cart`
--
ALTER TABLE `_temp_cart`
  ADD PRIMARY KEY (`_id_`),
  ADD KEY `_item_id_` (`_item_id_`);

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
-- AUTO_INCREMENT for table `_attractions_`
--
ALTER TABLE `_attractions_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `_booked_guided_tours_`
--
ALTER TABLE `_booked_guided_tours_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `_gifts_`
--
ALTER TABLE `_gifts_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5011;

--
-- AUTO_INCREMENT for table `_guess_`
--
ALTER TABLE `_guess_`
  MODIFY `_user_id_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_souvenirs_`
--
ALTER TABLE `_souvenirs_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `_stops_`
--
ALTER TABLE `_stops_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `_support_req_`
--
ALTER TABLE `_support_req_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `_temp_cart`
--
ALTER TABLE `_temp_cart`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

--
-- Constraints for table `_stops_`
--
ALTER TABLE `_stops_`
  ADD CONSTRAINT `_stop_route_id_` FOREIGN KEY (`_route_id_`) REFERENCES `_tours_` (`_id_`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
