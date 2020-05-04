-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2020 at 04:00 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staticv_united`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('2','1') NOT NULL DEFAULT '2',
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`, `status`, `created`, `updated`) VALUES
(3, 'sajeevan', '$2y$10$9eKGCLgZIMmYkPTs3GT0pe/VEaGTpwfxXwfrvUqW7EA72kodmU7pW', '1', 1, '2019-06-07 06:16:08', '2019-06-07 06:16:08'),
(6, 'admin', '$2y$10$MdFpRNWpykSI6kJZ.np.Y.r1fzXsOQUV2BS2vvu3E9GhakWz/h2VS', '1', 1, '2019-06-13 08:38:13', '2019-08-17 06:55:20'),
(7, 'Deshi', '$2y$10$e71e4hDzfzgGCPWehk/EUO0eHbj6mjiaXNfxAJtmklqj2NyEXCnlK', '2', 1, '2019-09-11 06:58:26', '2019-09-11 06:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `ad_posts`
--

CREATE TABLE `ad_posts` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `description` text,
  `thumb` varchar(100) DEFAULT NULL,
  `approve` int(10) NOT NULL DEFAULT '1',
  `status` int(10) NOT NULL DEFAULT '1',
  `verify` int(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_posts`
--

INSERT INTO `ad_posts` (`id`, `name`, `sub_cat_id`, `description`, `thumb`, `approve`, `status`, `verify`, `created`, `updated`) VALUES
(1, 'Test', 1, '<h2>Hello,</h2>\r\n<p>Test post.</p>\r\n<ol>\r\n<li>one</li>\r\n<li>two</li>\r\n<li>three</li>\r\n</ol>\r\n<h2>&nbsp;</h2>', '0', 1, 0, 1, '2020-04-01 15:36:54', '2020-04-07 05:52:55'),
(2, 'Royal Farm', 3, 'Location - Mount Lavinia\r\nContact No. 750207733', '0', 1, 1, 1, '2020-04-04 03:44:33', '2020-04-14 06:15:50'),
(3, 'Susiko', 1, 'Location - Boralesgamuwa\r\nContact No. - 772992920', '0', 1, 1, 1, '2020-04-05 02:23:23', '2020-04-14 06:16:59'),
(4, 'Paan Paan', 1, 'Location - Colombo\r\nContact No. - 770500020', '0', 1, 1, 0, '2020-04-05 02:24:46', '2020-04-05 02:24:46'),
(5, 'Sensaal', 1, 'Location - 764343030/766077888', '0', 1, 1, 0, '2020-04-05 02:25:25', '2020-04-05 02:25:25'),
(6, 'Eatright', 1, 'Location - Colombo\r\nEmail - info@eatright.lk', '0', 1, 1, 0, '2020-04-05 02:26:11', '2020-04-05 02:26:11'),
(7, 'Finagle', 1, '<p>ðŸ“&nbsp;<strong>Colombo</strong></p>\r\n<p>ðŸ“ž <strong>777267797</strong></p>', '0', 1, 1, 0, '2020-04-05 02:26:48', '2020-04-08 12:29:26'),
(8, 'Kaha Bath Gedara', 2, 'Location - Nawala\r\nContact No. - 0777 660740/0777 862672', '0', 1, 1, 0, '2020-04-05 02:29:20', '2020-04-05 02:29:20'),
(9, 'Kaha Bath Gedara', 2, 'Location - Nawala, Nugegoda, Pelawatta, Rajagiriya, Thalawathugoda, Battaramulla\r\nContact No. - 0777 660740/0777 862672', '0', 1, 1, 0, '2020-04-05 02:33:17', '2020-04-05 02:33:17'),
(10, 'Sensaal', 2, 'Location - Colombo\r\nContact No. - 770132250', '0', 1, 1, 0, '2020-04-05 02:34:49', '2020-04-05 02:34:49'),
(11, 'Orryngo Pharmacy', 9, 'Main Street, Addalaichenai\r\n+94772660787', '0', 1, 1, 0, '2020-04-08 05:45:18', '2020-04-08 05:45:18'),
(12, 'Suwasetha Pharmcy', 9, '31, Rathnapura Rd, Agalawaththa\r\n+94777421224', '0', 1, 1, 0, '2020-04-08 06:00:03', '2020-04-08 06:00:03'),
(13, 'Gayathri Pharmacy', 9, '+94773446388', '0', 1, 1, 0, '2020-04-08 06:00:40', '2020-04-08 06:00:40'),
(14, 'Lal Pharmacy', 9, '+94713298760', '0', 1, 1, 0, '2020-04-08 06:01:44', '2020-04-08 06:01:44'),
(15, 'Mosvold Villas', 15, '+94773173640\r\n\r\nfacebook.com/MosvoldVillas/\r\n\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 06:31:05', '2020-04-08 06:31:05'),
(16, 'Cafe Ceylon', 15, '+94912282729\r\n\r\nAccepts cash on delivery and card payments', '0', 1, 1, 0, '2020-04-08 06:31:05', '2020-04-08 06:31:05'),
(17, 'SkinnyTom&#39;s Deli', 15, '+94762335846\r\n\r\nfacebook.com/skinytoms/\r\n\r\nOrders need to be placed before 9.00 AM', '0', 1, 1, 0, '2020-04-08 06:32:39', '2020-04-08 06:32:39'),
(18, 'Ora Online store', 7, '+9475517788\r\n\r\nfacebook.com/SLdeliveryInfo\r\n\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 06:33:53', '2020-04-08 06:33:53'),
(19, 'HS Marketing', 7, '+94711561010\r\n\r\n+94767625294\r\n\r\n+94701157003\r\n\r\n+94718460597\r\n\r\nfacebook.com/342640899537807\r\n\r\nOrders can be placed via WhatsApp/Viber', '0', 1, 1, 0, '2020-04-08 06:50:58', '2020-04-08 06:50:58'),
(20, 'Cargills Food City', 7, '+94672279415\r\n\r\nfacebook.com/cargillsfoodcity\r\n\r\nOrders can be made from 8am to 2pm daily\r\n\r\nDelivery will be done within 24 hours\r\n\r\nMinimum value of Rs. 2000 per order', '0', 1, 1, 0, '2020-04-08 07:00:43', '2020-04-08 07:00:43'),
(21, 'BIO pharmacy', 9, 'Main Street Akkaraipattu\r\n\r\n+94770367674', '0', 1, 1, 0, '2020-04-08 07:01:58', '2020-04-08 07:01:58'),
(22, 'Osu Sala, Akkaraipattu', 9, '74, TD/02, Akkaraipattu\r\n\r\n+94773710480', '0', 1, 1, 0, '2020-04-08 07:02:27', '2020-04-08 07:02:27'),
(23, 'SMS pharmacy', 9, 'Akkaraipattu\r\n\r\n+94755322552', '0', 1, 1, 0, '2020-04-08 07:02:51', '2020-04-08 07:02:51'),
(24, 'Welcome pharmacy', 9, 'No 218, Main Street, Akkaraipattu\r\n\r\n+94777197333', '0', 1, 1, 0, '2020-04-08 07:03:19', '2020-04-08 07:03:19'),
(25, 'Zam Zam Pharmacy', 9, 'Main Street, Akkaraipattu\r\n\r\n+94777559440', '0', 1, 1, 0, '2020-04-08 07:03:41', '2020-04-08 07:03:41'),
(26, 'Haira Broiler Chicken', 8, '+94712235555\r\n\r\n+94760176176\r\n\r\nhairafarms.com\r\n\r\nfacebook.com/hairafarms\r\n\r\nMinimum Order value of RS. 3000', '0', 1, 1, 0, '2020-04-08 07:06:59', '2020-04-08 07:06:59'),
(27, 'Akurana Medical', 9, '68, Main Street, Akurana\r\n\r\n+94777939614', '0', 1, 1, 0, '2020-04-08 07:07:41', '2020-04-08 07:07:41'),
(28, 'Bio Plus Pharmacy', 9, '260, Mathale Road, Akurana\r\n\r\n+94771192420', '0', 1, 1, 0, '2020-04-08 07:08:30', '2020-04-08 07:08:30'),
(29, 'CCA Pharmacy', 9, '210/4, Mathale Rd, Akurana\r\n\r\n+94777313257', '0', 1, 1, 0, '2020-04-08 07:09:10', '2020-04-08 07:09:10'),
(30, 'Central Pharmacy', 9, '114, Akurana, Mathale Rd, Akurana\r\n\r\n+94772381221', '0', 1, 1, 0, '2020-04-08 07:09:45', '2020-04-08 07:09:45'),
(31, 'City Pharmacy', 9, '124, Asna mosque Rd, Akurana\r\n\r\n+94777841261', '0', 1, 1, 0, '2020-04-08 07:12:58', '2020-04-08 07:12:58'),
(32, 'Medi Plus', 9, 'Matale Rd, Akurana\r\n\r\n +94776073215', '0', 1, 1, 0, '2020-04-08 07:14:19', '2020-04-08 07:14:19'),
(33, 'NV Perera', 6, '+94775425335', '0', 1, 1, 0, '2020-04-08 07:15:17', '2020-04-08 07:15:17'),
(34, 'Denham Todd Akuregoda', 7, '+94777278399', '0', 1, 1, 0, '2020-04-08 07:15:52', '2020-04-08 07:15:52'),
(35, 'Samagi Foods', 7, '+94774234244\r\n+94764509022\r\nRs. 50 delivery fee will be charged', '0', 1, 1, 0, '2020-04-08 07:16:56', '2020-04-08 07:16:56'),
(36, 'Chathuranga Pharmacy', 9, '+94777151207\r\nViber/WhatsApp/Imo the authorized prescriptio', '0', 1, 1, 0, '2020-04-08 07:21:13', '2020-04-08 07:21:13'),
(37, 'Heladiwa Healthcare', 9, 'Galle Road, Akuressa.\r\n+94714165455', '0', 1, 1, 0, '2020-04-08 07:22:00', '2020-04-08 07:22:00'),
(38, 'Isuru Pharmacy', 9, 'No. 72/A, Galle Road, Akuressa\r\n+94718194374', '0', 1, 1, 0, '2020-04-08 07:22:33', '2020-04-08 07:22:33'),
(39, 'Matara Pharmacy', 9, 'Matara Road. Akuressa\r\n+94717388248', '0', 1, 1, 0, '2020-04-08 07:23:01', '2020-04-08 07:23:01'),
(40, 'Sampath Pharmacy', 9, '39E,Matara Road,Akuressa\r\n+94760234833', '0', 1, 1, 0, '2020-04-08 07:27:28', '2020-04-08 07:27:28'),
(41, 'Cargills Food City - Akuressa', 7, '+94412283462\r\nfacebook.com/cargillsfoodcity\r\nOrders can be made from 8am to 2pm daily\r\nDelivery will be done within 24 hours\r\nMinimum value of Rs. 2000 per order', '0', 1, 1, 0, '2020-04-08 07:28:37', '2020-04-08 07:28:37'),
(42, 'Wijedasa Stores', 6, '+94766106288', '0', 1, 1, 0, '2020-04-08 07:29:17', '2020-04-08 07:29:17'),
(43, 'Dinuka Stores', 7, '+94754984957\r\n+94714293343\r\n+94766354235\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 08:15:31', '2020-04-08 08:15:31'),
(44, 'KEELLS KREST', 7, 'facebook.com/krest.lk\r\nContact the store relavant for your city', '0', 1, 1, 0, '2020-04-08 08:16:47', '2020-04-08 08:16:47'),
(45, 'Manogya Pharmacy Alawwa', 9, '+94777138262', '0', 1, 1, 0, '2020-04-08 08:17:20', '2020-04-08 08:17:20'),
(46, 'Cargills Food City - Alawwa', 7, '+94372278872\r\nfacebook.com/cargillsfoodcity\r\nOrders can be made from 8am to 2pm daily\r\nDelivery will be done within 24 hours\r\nMinimum value of Rs. 2000 per order', '0', 1, 1, 0, '2020-04-08 08:18:05', '2020-04-08 08:18:05'),
(47, 'Cargills Food City - Alubomulla', 7, '+94382250422\r\nfacebook.com/cargillsfoodcity\r\nOrders can be made from 8am to 2pm daily\r\nDelivery will be done within 24 hours\r\nMinimum value of Rs. 2000 per order', '0', 1, 1, 0, '2020-04-08 08:18:45', '2020-04-08 08:18:45'),
(48, 'Jayantha Peris', 6, '+94770862002', '0', 1, 1, 0, '2020-04-08 08:19:22', '2020-04-08 08:19:22'),
(49, 'Cargills Food City - Aluthgama 2', 7, '+94342293575\r\nfacebook.com/cargillsfoodcity\r\nOrders can be made from 8am to 2pm daily\r\nDelivery will be done within 24 hours\r\nMinimum value of Rs. 2000 per order', '0', 1, 1, 0, '2020-04-08 08:20:36', '2020-04-08 08:20:36'),
(50, 'Cargills Food City - Aluthgama', 7, '+94342271921\r\nfacebook.com/cargillsfoodcity\r\nOrders can be made from 8am to 2pm daily\r\nDelivery will be done within 24 hours\r\nMinimum value of Rs. 2000 per order', '0', 1, 1, 0, '2020-04-08 08:21:08', '2020-04-08 08:21:08'),
(51, 'Soul Coffee is NOW DELIVERING !', 15, 'We are now delivering to Colombo 1-15 and its Immediate Suburbsâ£\r\nâ£â£â£Place your orders online before 5:30pm, and we will do our best to deliver the next dayâ£\r\nâ£â£\r\nâ£TO PLACE YOUR ORDER :â£\r\nâ£â£\r\nâ£1. Visit our online store at www.soulcoffee.lk and place your orderâ£\r\nâ£â£â£2. Or send us a WhatsApp with your name, address and the items to 0763 740 436, 0773 405 335, 0778 858 037â£', '0', 1, 1, 0, '2020-04-08 08:21:14', '2020-04-08 08:21:14'),
(52, 'Bairaha Meat', 8, 'Grab your frozen Bairaha products delivered to your doorstep.\r\nCall or Whatsapp to the below numbers to place your order.\r\n\r\nIndika-0714967518\r\n(Narahenpita, Thimbirigasyaya, Rajagiriya, Nawala, Nugegoda, Wellawatta, Dehiwala, Kalubowila, Pepiliyana, Boralasgamuwa, Kohuwala)\r\n\r\nEat meal first- 0766473137/ 0713266418\r\n(Fort, Union Place, Kollupitiya, Bambalapitiya, Cinnamon Gardens, Borella, Dematagoda, Maradana, Pitakotuwa, Aluthkade, Kotahena, Kochchikade, Grandpass, Mattakkuliya, Modara, Mount Lavinia)\r\n\r\nShiraz-0775355556\r\n(Wattala,Kaduwela,Kelaniya,Kiribathgoda,Kadawatha,Malabe,Homagama,Athurugiriya)\r\n\r\nGayan â€“ 0773957394\r\n(Wattala, Ja-Ela ,Kandana,Welisara,Ragama,Seeduwa)\r\n\r\nManjula â€“ 0767623427\r\n(Bokundara,Piliyandala,Maharagama,Pannipitiya,Kottawa,Moratuwa,Rathmalana)\r\n\r\nDanesh â€“ 0713332322\r\n(Kotte,Battaramulle, Thalahena, Pelwatte, Thalawathugoda)\r\n\r\nUdara â€“ 0715953507\r\n(Panadura, Gorakana, Walana, Horana, Malamulla, Mahabellana, Pinwatta)\r\n\r\nRavin â€“ 0778802621\r\n(Gampaha, Pasyala, Nittambuwa, Veyangoda, Thihariya, Kalagedihena, Ganemulla,Yakkala, Miriswatta, Kirillawala)\r\n\r\nOrders will be delivered within 24 to 48 hours.\r\n\r\nPlease note that the orders will be delivered first come first serve basis.', '0', 1, 1, 0, '2020-04-08 08:24:37', '2020-04-08 08:24:37'),
(53, 'Bio Foods', 12, '+94763555342\r\nfacebook.com/biofoodslk\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 08:27:42', '2020-04-08 08:27:42'),
(54, 'Celeste Hospitality', 12, '+94775882525\r\nfacebook.com/Little-England-By-Celeste-106896647525328\r\nOrder can be placed be via WhatsApp\r\nOnline payments only', '0', 1, 1, 0, '2020-04-08 08:29:08', '2020-04-08 08:29:08'),
(55, 'Daily Needs', 5, '+94782533918\r\nfacebook.com/ColomboBestFruits\r\nOrders can be placed via Facebook/Text\r\nDelivery surcharge of Rs. 400', '0', 1, 1, 0, '2020-04-08 08:29:53', '2020-04-08 08:29:53'),
(56, 'DGK Traders', 12, '+94773480671\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 08:31:00', '2020-04-08 08:31:00'),
(57, 'Colombo Coffee Company', 7, 'For all coffee lovers during this time of need!\r\n\r\nWhatsApp on 0712383838 to place your orders', '0', 1, 1, 0, '2020-04-08 08:32:38', '2020-04-08 08:32:38'),
(58, 'DZ Fresh Box', 5, '+94776001111\r\nfacebook.com/dzsfreshbox\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 08:36:40', '2020-04-08 08:36:40'),
(59, 'Daily Needs', 7, '+94777721469\r\n+94773717771\r\nRS. 500 Delivery fee will be charged\r\nCash on delivery', '0', 1, 1, 0, '2020-04-08 08:37:48', '2020-04-08 08:37:48'),
(60, 'EGrocer', 7, '+94772508449\r\nfacebook.com/EGrocer.lk\r\nOrders can be placed via WhatsApp\r\nVisit the Facebook page for more details', '0', 1, 1, 0, '2020-04-08 08:38:36', '2020-04-08 08:38:36'),
(61, 'Eco Villa Backpool', 12, '+94714505750\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 08:39:39', '2020-04-08 08:39:39'),
(62, 'Fruit & Vegetable Delivery', 12, 'Fruit & Vegetable delivery near Maharagama, Malabe, Pannipitiya, Thalawathugoda, Athurugiriya, Kotttawa & Hokandara.\r\n\r\nCall 0756151409', '0', 1, 1, 0, '2020-04-08 08:40:23', '2020-04-08 08:40:23'),
(63, 'Drypers- Aluthkade', 16, '+94777422722', '0', 1, 1, 0, '2020-04-08 08:41:30', '2020-04-08 08:41:30'),
(64, 'Fruit & Vegetable Delivery', 5, 'Fruit & Vegetable delivery near Maharagama, Malabe, Pannipitiya, Thalawathugoda, Athurugiriya, Kotttawa & Hokandara.\r\n\r\nCall 0756151409', '0', 1, 1, 0, '2020-04-08 08:42:33', '2020-04-08 08:42:33'),
(65, 'Little Things- Aluthkade', 16, '+94777311331\r\nfacebook.com/littlethings.lk\r\nOrders can be placed via WhatsApp/Viber', '0', 1, 1, 0, '2020-04-08 08:42:34', '2020-04-08 08:42:34'),
(66, 'Coco Veranda', 15, 'Make your quarantine a tad bit cocolicious!\r\n\r\nAreas we cover â€“ Deliveries only!\r\n\r\nColombo 2, 3, 5, 6, 7, 8, Nugegoda, Pelawatta, Battaramulla, Kotte, Narahenpita, Rajagiriya, and Nawala!\r\n\r\nCall us on 0112 662 678 to place your orderes!\r\n\r\nCheck the rest of the delivery menu too!', '0', 1, 1, 0, '2020-04-08 08:43:44', '2020-04-08 08:43:44'),
(67, 'Mom&#39;s Choice Babyshop', 16, '+94776258863\r\nfacebook.com/momschoicelk\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 08:43:50', '2020-04-08 08:43:50'),
(68, 'Fresh Milk Delivery (Selected Areas)', 18, 'If you want fresh milk to be delivered to the below areas Nugegoda, Mirihana, Maharagama, Attidiya and Boralesgamuwa please join below group and order\r\n\r\nKothmale Fresh Milk Rs. 240 (normal retain price). Max order of 3 per house so that we can reach as many.\r\n\r\nDelivery charge of Rs. 150 will be applicable\r\n\r\nIf you want to order please click this link and add the below details\r\n\r\n1. Name\r\n\r\n2. Number of cartons (max 3)\r\n\r\n3. Delivery address\r\n\r\n4. Phone number.\r\n\r\nhttps://chat.whatsapp.com/HTYbXAygjBRIbEvEMlpdwc\r\n\r\nOr whatsApp ur order to 0717828582\r\n\r\nPlease keep change as we want to have contactless delivery', '0', 1, 1, 0, '2020-04-08 08:49:10', '2020-04-08 08:49:10'),
(69, 'MD Products', 7, 'Get your favourite MD products delivered right to your doorsteps from the comfort of your home!\r\n\r\nDelivery within 72 hours\r\n\r\nContact us via Whatsapp at 0711 413 587 / 0711 413 591 to place your order with the details mentioned below:\r\n\r\nâ€¢ Your Name\r\nâ€¢ Delivery Address\r\nâ€¢ Payment Method (Cash or Card)\r\nâ€¢ Pack Number\r\nâ€¢ Contact Number\r\n\r\nWhatsapp your order between 9AM â€“ 5PM\r\nDelivers will take place between 10AM â€“ 5PM\r\n\r\nWe are delivering to the following locations:\r\n\r\nColombo 3 â€“ 8, Narahenpita, Rajagirirya,\r\nNavala, Havelock, Thimbirigasyaya,\r\nNugegoda, Dehiwala, Mt. Lavania & Kotte', '0', 1, 1, 0, '2020-04-08 08:50:33', '2020-04-08 08:50:33'),
(70, 'Kada Malu - Fish', 4, 'Kada Malu is now delivering fresh produce, seafood, dairy and other essentials right to your doorstep.\r\n\r\nDelivery location include:\r\nColombo 2 â€“ 8, Dehiwala, Rajagiriya, Kotte\r\nPelawatte, Mount Lavinia & Maradana\r\n\r\nDelivery available within 48 hours\r\n\r\nCall us on 0774 645 289 / Whatsapp us on 0773 174 252 for further details.\r\n\r\nDM us on Instagram to place your order', '0', 1, 1, 0, '2020-04-08 08:52:40', '2020-04-08 08:52:40'),
(71, 'CBL Foods', 7, 'Indulge your tastebuds during curfew with some delightful treats from Ritzbury, Revello and Tiara.\r\n\r\nOrder your cravings online at www.cblfoods.com or Contact us via Whatsapp/SMS at 0777 699 146 with:\r\nâ€¢ Your Selected package/ list\r\nâ€¢ Your name\r\nâ€¢ Address\r\nâ€¢ Contact number.\r\n\r\nFree Delivery Service Islandwide\r\n\r\nCash on delivery accepted', '0', 1, 1, 0, '2020-04-08 08:53:57', '2020-04-08 08:53:57'),
(72, 'BreadTalk', 17, '+94767437239\r\n+94761361887\r\nbreadtalksrilanka.com\r\nfacebook.com/BreadTalkSriLanka\r\nOrders can be placed via WhatsApp\r\nMinimum order value Rs.1000\r\nDelivery charges Rs.250\r\nPayments via credit/debit cards only', '0', 1, 1, 0, '2020-04-08 09:27:56', '2020-04-08 09:27:56'),
(73, 'Chariot', 1, '+94763162419\r\n+94760980784\r\n+94775633633\r\nfacebook.com/chariotsrilanka\r\nCash on delivery or Bank Transfer\r\nMinimum Order value is Rs. 500\r\nDelivery Charge is Rs.150', '0', 1, 1, 0, '2020-04-08 09:28:40', '2020-04-08 14:58:38'),
(74, 'Family Choice', 17, '+94758054103\r\n+94773682566\r\n+94719903830\r\nMinimum order value of RS. 2000\r\nCash on delivery', '0', 1, 1, 0, '2020-04-08 09:30:04', '2020-04-08 09:30:04'),
(75, 'CIC 3', 18, 'Orders can be placed via WhatsApp/Viber\r\nFree delivery', '0', 1, 1, 0, '2020-04-08 09:31:17', '2020-04-08 09:31:17'),
(76, 'Highland', 18, '+94714433372\r\n+94712402026\r\nOrders can be placed via WhatsApp\r\nFree Delivery', '0', 1, 1, 0, '2020-04-08 09:32:05', '2020-04-08 09:32:05'),
(77, 'Pelwatte', 18, '+94710215162\r\npelwattedairy.com\r\nfacebook.com/PelwatteDairy\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 09:32:44', '2020-04-08 09:32:44'),
(78, 'Laugh Gas', 6, '+94773823650', '0', 1, 1, 0, '2020-04-08 09:35:00', '2020-04-08 09:35:00'),
(79, 'Simplex', 6, 'simplexdelivery.com\r\nfacebook.com/SimplexDelivery\r\nOrders can be placed via the Website only', '0', 1, 1, 0, '2020-04-08 09:35:47', '2020-04-08 09:35:47'),
(80, 'VRR Enterprises', 6, '+94112422924', '0', 1, 1, 0, '2020-04-08 09:36:19', '2020-04-08 09:36:19'),
(81, 'American Water', 13, '+94773469977\r\n+94773827871\r\n+94773831309\r\namericanwater.lk\r\nfacebook.com/americanpws\r\nContact between 9.00AM to 6.00PM', '0', 1, 1, 0, '2020-04-08 09:37:57', '2020-04-08 09:37:57'),
(82, 'CatchMe.lk', 7, '+94117438888\r\n+94774212393\r\n+9477269050\r\n+94777226979\r\n+94777487454\r\ncatchme.lk\r\nfacebook.com/CatchMe.lk\r\nOrders can be placed via the website\r\nDelivery fee of RS. 200 will be charged\r\nOnline payments are accepted', '0', 1, 1, 0, '2020-04-08 09:38:57', '2020-04-08 09:38:57'),
(83, 'Elephant House', 7, '+94773956508\r\n+94765299452\r\n+94773956512\r\n+94773956517\r\nCash on delivery accepted', '0', 1, 1, 0, '2020-04-08 09:44:02', '2020-04-08 09:44:02'),
(84, 'Blue Spoon', 1, 'Blue Spoon is delivering Fresh bread to your homes\r\n\r\nDelivery locations include:\r\nColombo 3 â€“ 7\r\n\r\n*Note: All orders should be placed 1-2 days in advance\r\n\r\nMinimum order value: Rs. 450, excluding delivery charges\r\n\r\nMessage us on Facebook / Instagram to Order\r\n\r\nCash on delivery or bank transfers accepted', '0', 1, 1, 0, '2020-04-08 09:46:04', '2020-04-08 09:46:04'),
(85, 'Pets Care Accessories', 19, '+94777507453\r\ninstagram.com/pets_care_colombo\r\nfacebook.com/petscarecmb\r\nOrders can be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 09:50:30', '2020-04-08 09:50:30'),
(86, 'PetVet', 19, '+94777400111\r\npetvet.lk\r\nfacebook.com/petvetlk\r\nOrders can only be placed via WhatsApp', '0', 1, 1, 0, '2020-04-08 09:50:49', '2020-04-08 09:50:49'),
(87, 'Bark Street', 19, '+947ï¸7ï¸8ï¸0ï¸2ï¸3ï¸3ï¸3ï¸3ï¸\r\nDelivery within 2-3 days', '0', 1, 1, 0, '2020-04-08 09:51:11', '2020-04-08 09:51:11'),
(88, 'Kings Hospital', 9, '+94710310319\r\nfacebook.com/kingshospitalcolombo\r\nAuthorized prescriptions can be forwarded via WhatsApp', '0', 1, 1, 0, '2020-04-08 09:51:39', '2020-04-08 09:51:39'),
(89, 'Healthguard', 9, '+94764477777\r\n+94764477888\r\n+94764477999\r\n+94764477666\r\nhealthguard.lk\r\nfacebook.com/healthguard.sl\r\nViber/WhatsApp the authorized prescription\r\nDelivery fee of Rs300 will be charged\r\nOnly Card Payments accepted', '0', 1, 1, 0, '2020-04-08 09:57:24', '2020-04-08 09:57:24'),
(90, 'Harcourts Pharmacy', 9, '+94773833404\r\n+94711147526\r\nfacebook.com/785957018193374\r\nSend a photo of the prescription via WhatsApp', '0', 1, 1, 0, '2020-04-08 09:57:37', '2020-04-08 09:57:37'),
(91, 'Milco', 18, 'Milco is delivering fresh local milk from farmers to your home.\r\n\r\nCurrently delivering only in the western province.\r\n\r\nFree Delivery Services\r\n\r\nVisit www.milcosrilanka.com and place your order.', '0', 1, 1, 0, '2020-04-08 10:00:22', '2020-04-08 10:00:22'),
(92, 'Nestle - Battaramulla', 7, 'Get your favorite Nestle products delivered to your doorstep with PickMe\r\n\r\nSelect the perfect bundle of essential for your needs.\r\n\r\nDelivery available within 6km from Battaramulla\r\n\r\nOrder your essential from PickMe today', '0', 1, 1, 0, '2020-04-08 10:01:24', '2020-04-08 10:01:24'),
(93, 'Eva Sri Lanka', 1, '<p>+94777507453</p>\r\n<p><a href=\"../../../admin/posts/www.instagram.com/pets_care_colombo\">www.instagram.com/pets_care_colombo</a> </p>\r\n<p><a href=\"../../../admin/posts/www.facebook.com/petscarecmb\">www.facebook.com/petscarecmb </a></p>\r\n<p>Orders can be placed via WhatsApp</p>', '0', 1, 1, 0, '2020-04-08 10:03:53', '2020-04-08 12:35:35'),
(94, 'Elephant House', 18, 'Elephant house is delivering essentials in your area.\r\n\r\nCash on delivery accepted\r\n\r\nCall or SMS based on location for any inquiries.\r\n\r\nCharitha â€“ 0765 299 452\r\nColombo, Borella, Kollupitiya, Bambalapitya, Wellawatta, Dehiwala, Mt.lavinia, Ratmalana, Athul Kotte, Kotte,\r\nNarahenpita & Kirulapone\r\n\r\nRasika â€“ 0773 956 512\r\nPeliyagoda, Kiribathgoda, Kelaniya, kadawatha, Wattala, Ragama, Kirillawala, Biyagama, Delgoda, Gampaha\r\nVeyangoda & Ganemulla\r\n\r\nNalin â€“ 0773 956 508\r\nNegombo, Katana, Divulpitiya, Kochchikade, Katunayake, Seeduwa & Raddolugama\r\n\r\nDuminda â€“ 0773 956 517\r\nNugegoda, Nawala, Rajagiriya, Battaramulla, Thalahena, Malabe, Thalawathugoda, Homagama, Kottawa, Maharagama\r\nPilliyandala, Boralesgamuwa, Kesbewa, Kaduwela, Nawagamuwa, Hanwella, Kosgama, Puwakpitiya & Awissawella', '0', 1, 1, 0, '2020-04-08 10:05:45', '2020-04-08 10:05:45'),
(95, 'Coca Cola', 21, 'Get Coca-Cola products to your doorstep\r\n\r\nPlace your orders via Call, Whatsapp, SMS or Viber\r\n\r\nOrders will be delivered within 3 days.\r\n\r\nCash on delivery\r\n\r\nDelivery areas available with contact detail for:\r\n\r\nPriyantha â€“ 0772 376 928\r\nThalawattugoda\r\nBattarumulla\r\nPelawatta\r\n\r\nPrasanga â€“ 0772 640 841\r\nRajagiriya\r\nDematogoda\r\nKelaniya\r\nKiribathgoda\r\nWattala\r\n\r\nChandana â€“ 0773 660 849\r\nKollupitiya\r\nBambalapitiya\r\nWellawatta\r\nDehiwala', '0', 1, 1, 0, '2020-04-08 10:14:49', '2020-04-08 10:14:49'),
(96, 'Pussella Meat Shop', 8, 'Get high quality meat from Pusslla Meat Shop delivered to your door step\r\n\r\nDelivery Available for Colombo District.\r\n\r\nContact: 0714 829 829\r\n\r\nMin. purchase value of Rs. 2500/-', '0', 1, 1, 0, '2020-04-08 10:15:49', '2020-04-08 10:15:49'),
(97, 'Kotmale', 18, 'Kotmale is delivering yogurt, milk and dairy products to your doorstep\r\n\r\nDelivery Areas & Contact info:\r\n\r\nAnuradhapura â€“ 0776 527 959\r\nTrincomalee â€“ 0773 369 813\r\nJaffna â€“ 0773 369 813\r\nPolonnaruwa â€“ 0776 527 959\r\nKegalle â€“ 0773 659 851\r\nBatticaloa â€“ 0773 369 813', '0', 1, 1, 0, '2020-04-08 10:19:33', '2020-04-08 10:19:33'),
(98, 'CIC Cream', 18, 'CIC Creamoo is delivering yogurt and fresh milk to your doorstep\r\n\r\nDelivery areas & contact info :\r\n\r\nTrincomalee â€“ 0776 106 720\r\nAnuradhapura â€“ 0776 106 720\r\nJaffna â€“ 0776 238 963\r\nPolonnaruwa â€“ 0776 106 720\r\nKegalle â€“ 0775 347 701', '0', 1, 1, 0, '2020-04-08 10:44:44', '2020-04-08 10:44:44'),
(99, 'Lily&#39;s', 1, 'Lilyâ€™s is delivering essentials to your doorstep\r\n\r\nDelivery Available for Colombo and Suburbs\r\n\r\nNo Minimum order\r\n\r\nEssentials will be delivered the next day\r\n\r\nVisit: www.lilys.lk and place your order online.\r\n\r\nCall 070 114 0901 for inquiries', '0', 1, 1, 0, '2020-04-08 10:46:11', '2020-04-08 10:46:11'),
(100, 'Lily&#39;s', 18, 'Lilyâ€™s is delivering essentials to your doorstep\r\n\r\nDelivery Available for Colombo and Suburbs\r\n\r\nNo Minimum order\r\n\r\nEssentials will be delivered the next day\r\n\r\nVisit: www.lilys.lk and place your order online.\r\n\r\nCall 070 114 0901 for inquiries', '0', 1, 1, 0, '2020-04-08 10:46:39', '2020-04-08 10:46:39'),
(101, 'Finagle', 1, 'Join hands with Finagle to deliver bread.\r\n\r\nDelivery areas include Colombo and Gampaha District\r\n\r\nMinimum order of 200 loaves\r\n\r\nDelivered to your doorstep\r\n\r\nCall 0773 476 385(Nimal) / 0778 205 163(Nuwan) for inquiries', '0', 1, 1, 0, '2020-04-08 10:47:36', '2020-04-08 10:47:36'),
(102, 'Tiffin Box', 7, 'Tifin Box will deliver your â€œcustomizedâ€ grocery list.\r\n\r\nCash on Delivery\r\n\r\nCall or Whatsapp 0761 233 344 for inquiries', '0', 1, 1, 0, '2020-04-08 14:30:06', '2020-04-08 14:30:06'),
(103, 'Fleminco', 7, 'Get your essential groceries delivered with Fleminco\r\n\r\nâ€¢ Send your grocery list (Facebook, Call / WhatsApp)\r\nâ€¢ Confirm your order\r\nâ€¢ Pay online or\r\nâ€¢ Pay Cash on Delivery\r\nâ€¢ Wait for the delivery\r\n\r\nCall / Whatsapp us on 0711 282 282\r\nFB / IG @FlemincoSL', '0', 1, 1, 0, '2020-04-08 14:31:12', '2020-04-08 14:31:12'),
(104, 'Just Goodness', 7, 'Just Goodness is offering customers fresh certified organic produce and other essential health products.\r\n\r\nOrder will be delivered every Friday.\r\n\r\nA maximum of 50 orders will be taken in order to complete all deliveries in one day.\r\n\r\nContact us via Whatsapp on 0776 558 993 or drop us a message on our Facebook page for more information', '0', 1, 1, 0, '2020-04-08 14:33:02', '2020-04-08 14:33:02'),
(105, 'Saaraketha Organics', 7, 'Order fresh organic vegetables, fruits, spices, virgin coconut oils & heirloom rice range from Saaraketha Organics.\r\n\r\nPlace your orders online at www.saaraketha.com or WhatsApp us on 0774 367 792 / 0766 110 428', '0', 1, 1, 0, '2020-04-08 14:34:00', '2020-04-08 14:34:00'),
(106, 'Quickshoplk.com', 7, 'A venture by Kalutara municipal council, Quickshoplk.com offers customers:\r\nâ€¢ 6 grocery packages available varying from Rs. 500 to Rs. 3000\r\nâ€¢ Gas Cylinders\r\nâ€¢ Medicine (WhatsApp it to 0759259847)\r\n\r\nCall 0717 811 711 (Pramila) for more details\r\n\r\nPlace your order online:\r\n\r\nQuickshoplk.com', '0', 1, 1, 0, '2020-04-08 14:35:01', '2020-04-08 14:35:01'),
(107, 'Habibi&#39;s Kitchen', 8, 'Habibiâ€™s Kitchen is now delivering raw chicken and seafood to your doorstep.\r\n\r\nPlace your orders through Whatsapp or Facebook with all the details.\r\n\r\nContact us on 0777 464 800 for further details', '0', 1, 1, 0, '2020-04-08 14:36:02', '2020-04-08 14:36:02'),
(108, 'Simply Strawberries by Jagro', 5, 'Jagroâ€™s delivery operation is back in service with a special discount.\r\n\r\nMinimum Order Value: Rs. 2000 (per delivery)\r\n\r\nOrders Available from 8AM â€“ 4PM\r\n\r\nDelivery Locations:\r\nColombo City Limits, Nugegoda\r\nDehiwala, Nawala, Rajagiriya\r\nBattaramulla, Pelawatte\r\n\r\nOrders can be placed by:\r\n\r\nâ€¢ Whatsapp or SMS at 0770 386 237 / 0773 374 498\r\n\r\nâ€¢ Visiting the link below:\r\nhttps://forms.gle/7kSNyxLHErgYbjXT9\r\n\r\nPlease note that your orders will be delivered to you within 3 days.', '0', 1, 1, 0, '2020-04-08 14:37:17', '2020-04-08 14:37:17'),
(109, 'Toi & Bi', 12, 'Toi&Bi delivers fresh produce to your doorstep\r\n\r\nDelivery available for:\r\nNugegoda, Maharagama\r\nMirihana, Ethul Kotte\r\nPita Kotte,Ambuldeniya\r\nDelkanda, Thalawathugoda\r\nNawarohala, Kohuwala\r\n\r\nCall 0703 330 212 / 0767 817 676 / 0716 590 382 or send us a message on our Facebook Page to place your order.', '0', 1, 1, 0, '2020-04-08 14:39:15', '2020-04-08 14:39:15'),
(110, 'Nut House', 22, 'Nut House has all things nuts, and an array of dates, and dried fruits.\r\n\r\nDelivery available for:\r\nColombo and Suburbs.\r\n\r\nCall 0770 077 951\r\n\r\nVisit\r\nhttp://www.nuthouse.lk/', '0', 1, 1, 0, '2020-04-08 14:41:21', '2020-04-08 14:41:21'),
(111, 'Grocerybox.lk', 7, 'Weâ€™re delivering to your doorstep!\r\n\r\nDelevery available for:\r\n\r\nColombo City Limits\r\nNawala\r\nKotte\r\nMalabe\r\nBattaramulla\r\n\r\nFor more information call 0771 063 494\r\n\r\nOrder online!\r\n\r\nwww.grocerybox.lk', '0', 1, 1, 0, '2020-04-08 14:42:25', '2020-04-08 14:42:25'),
(112, 'Takas.lk', 7, 'Fresh Fruits & Vegetables To Your Doorstep!\r\n\r\nDelivery available for:\r\nColombo 1 â€“ 15\r\n\r\nDelivery within 48 Hours\r\n\r\nVisit\r\nhttps://takas.lk/more/daily-rations.html', '0', 1, 1, 0, '2020-04-08 14:43:35', '2020-04-08 14:43:35'),
(113, 'Trillium Deli', 7, 'Fresh produce delivered straight to you\r\n\r\nNo restriction on maximum order quantity\r\nMinimum order value: Rs. 2000\r\n\r\nCash & Card Payments(preferred) accepted\r\n\r\nDelivery available for:\r\n\r\nColombo 5,6,7,8 (Rs.200)\r\nNugegoda/Nawala (Rs.400)\r\nRajagiriya/Thalawathugoda (Rs.600)\r\n\r\nCall 0112 514 545', '0', 1, 1, 0, '2020-04-08 14:44:31', '2020-04-08 14:44:31'),
(114, 'Hansi Food Products', 22, 'We offer a wonderful range of dried spices, herbs, and tea, which is homemade with great quality, love, and taste.\r\n\r\nContact us fof further details and orders   â€“  077 3100 965 / 072 5777 516 / 011 2230 599', '0', 1, 1, 0, '2020-04-08 14:46:16', '2020-04-08 14:46:16'),
(115, 'Cargills Food City', 7, 'Cargills FoodCity Home Delivery Service will commence from 31st March 2020\r\n\r\nPlease click on the link below for our updated list of over 300 outlets and contact details: bit.ly/CargillsFoodCity-HomeDelivery\r\n\r\nThe list of operating outlets will change from time to time based on government regulations and curfew.\r\n\r\nâ€“ Delivery within 5km from selected Cargills FoodCity outlets.\r\nâ€“ Order between 8am to 2pm.\r\nâ€“ Minimum value of Rs. 2000/- per order.', '0', 1, 1, 0, '2020-04-08 14:52:34', '2020-04-08 14:52:34'),
(116, 'Yuhaa Veggie Mart', 12, 'Farm fresh veggies to your doorstep\r\n\r\nDelivery within Colombo 03, 04 , 05 , 06, 07 , Nugegoda, Dehiwala, Mount Lavinia Only\r\n\r\nCall/ WhatsApp â€“  07777 93053  / 0777365267', '0', 1, 1, 0, '2020-04-08 14:53:26', '2020-04-08 14:53:26'),
(117, 'Gills', 7, 'Essential Food Distribution Service. Discounted prices, Free delivery to your doorstep.\r\n\r\nDistribution available from Colombo-Gampaha to Rathnapura, Wennappuwa to Kaluthara.\r\n\r\nHome delivery call.\r\n\r\n076 2 499 322\r\n076 2 499 304\r\n076 2 499 174', '0', 1, 1, 0, '2020-04-08 14:54:31', '2020-04-08 14:54:31'),
(118, 'RichLife', 18, 'Delivery undertaken for any dairy products\r\n\r\nFree Home Delivery(minimum purchase value of Rs.1500 )\r\n\r\nService Available for  â€“    Colombo 1-10 & Dehiwala\r\n\r\nContact Sampath on â€“ 0754 661 909', '0', 1, 1, 0, '2020-04-08 14:55:24', '2020-04-08 14:55:24'),
(119, 'Maxies', 8, 'Delivered straight to your door.\r\n\r\nHarshana (0704139583) â€“ Piliyandala, Kesbewa\r\nJagath (0704063738) â€“ Rathmalana, Moratuwa\r\nNimal (0704493548) â€“ Mathegoda, Homagama, Kottawa, Rukmalgama\r\nChathranga (0704063484) â€“ Kelaniya, Kiribathgoda\r\nNissanka (0704522216) â€“ Raddolugama, Kandana', '0', 1, 1, 0, '2020-04-09 04:31:55', '2020-04-09 04:31:55'),
(120, 'Maxies', 8, 'Delivered straight to your door.\r\n\r\nHarshana (0704139583) â€“ Piliyandala, Kesbewa\r\nJagath (0704063738) â€“ Rathmalana, Moratuwa\r\nNimal (0704493548) â€“ Mathegoda, Homagama, Kottawa, Rukmalgama\r\nChathranga (0704063484) â€“ Kelaniya, Kiribathgoda\r\nNissanka (0704522216) â€“ Raddolugama, Kandana', '0', 1, 1, 0, '2020-04-09 04:31:55', '2020-04-09 04:31:55'),
(121, 'Roots', 5, 'Get fresh fruits delivered to your doorstep from Roots.\r\n\r\nMinimum order Rs.750.00\r\n\r\nCash on delivery\r\n\r\nBetween 6 am â€“ 10 pm only\r\n\r\nWhatsApp or SMS to\r\n\r\nBawantha â€“ 0774 638 630\r\n\r\nJawan-  0775 558 334\r\n\r\nAthula â€“ 0773 461 566\r\n\r\nChathu â€“ 0778 767 700', '0', 1, 1, 0, '2020-04-09 04:32:54', '2020-04-09 04:32:54'),
(122, 'Piyasena Stores', 7, 'Grocery Delivery in Dehiwala, Mount Lavinia\r\n\r\nContact : 0760430393', '0', 1, 1, 0, '2020-04-09 04:33:47', '2020-04-09 04:33:47'),
(123, 'Keells Super', 7, 'Hello, We have made fresh produce packs just for you. Refer the image below for details.\r\n\r\nPick the pack/s you wish to order, call the Keells store closest to you (numbers given below) to order & get it delivered to your doorstep. Deliveries only within a 10Km radius of the store. ðŸ“ž the store closest to you, to place your order.\r\n\r\nOnly limited number of packs per store available. T&C apply.\r\n\r\nArangala 0766713126\r\nAthurugiriya 0772619130\r\nDarley Road 0773845413\r\nDehiwala 0770108441\r\nGothatuwa 0771781708\r\nHavelock Road 0771903896\r\nKalubowila 0770108430\r\nKesbawa 0771526870\r\nKohuwala (Woodland Avenue) 0772075376\r\nKottawa (Rukmalgama Rd) 0763448167\r\nKottawa (Mattegoda Rd) 0770108439\r\nMattakkuliya 0773572238\r\nMaharagama (Dehiwala Rd) 0772145527\r\nMulleriyawa 0762306859\r\nNawala 0770108449\r\nPannipitiya 0772642621\r\nPiliyandala 0772122979\r\nPitakotte 0773649438\r\nRajagiriya 0770108457\r\nRaththanapitiya 0778950947\r\nRajagiriya (Cotta Road) 0772620858\r\nRathmalana 0772636773\r\nShangri-La Mall 0760484959\r\nStanley Thilakarathne Mw 0770108458\r\nThalawathugoda (Capital Mall) 0770108424\r\nThimbirigasyaya 0769120902\r\n\r\nMiriswatta 0760485045\r\nThihariya 0771073281\r\nNegombo 3 0770751679\r\nBiyagama 0763583880\r\nEldeniya 0761861607\r\nGampaha 0779669268\r\nJa Ela â€“ Weligampitiya 0775798541\r\nKapuwatta 0774963155\r\nKelaniya â€“ Tyre Junction 0768606948\r\nKiribathgoda 0770108435\r\nKochchikade 0779729492\r\nMakola 0771584233\r\nMinuwangoda 0771435341\r\nNegombo â€“ Kurana 0762330186\r\nRagama Delpe 0770511048\r\nWattala 0770108460', '0', 1, 1, 0, '2020-04-09 04:35:01', '2020-04-09 04:35:01'),
(124, 'Sierra Rice Products', 11, 'Get your daily essentials delivered to your doorstep.\r\n\r\nDelivery Area â€“ 2 km radius from kottawa\r\n\r\nCall or WhatsApp â€“  0713 846 327 / 0717 446 331 / 0714 723 211', '0', 1, 1, 0, '2020-04-09 04:37:18', '2020-04-09 04:37:18'),
(125, 'Luxmi Stores', 7, 'Grocery Delivery in Wellawatta area\r\n\r\nContact : 771757048', '0', 1, 1, 0, '2020-04-09 06:35:54', '2020-04-09 06:35:54'),
(126, 'Ceylanicus Delivery', 7, 'Delivery of Groceries\r\n\r\nContact : 777300123\r\n\r\nDelivery within Colombo & Suburbs', '0', 1, 1, 0, '2020-04-09 06:37:23', '2020-04-09 06:37:23'),
(127, 'Foodman', 12, 'Food Man\r\n\r\nServices available within 10km radius of Kelaniya.', '0', 1, 1, 0, '2020-04-09 06:39:15', '2020-04-09 06:39:15'),
(128, 'Arpico Super Center', 7, 'Arpico Super Center Outlets for ordering groceries and essentials\r\n\r\nAvailable Areas : Panadura, Matara, Galle, Kalutara.\r\n\r\nOrders can be placed between 10.00am to 3.00pm\r\n\r\nValue Packs Available as shown below.', '0', 1, 1, 0, '2020-04-09 06:49:44', '2020-04-09 06:49:44'),
(129, 'Farm Drop LK', 12, 'FarmDropLK\r\n\r\nDelivery of vegetables available in following areas : Horana, Ingiriya, Bulathsinhala, Agalawatta, Mathugama, Baduraliya\r\n\r\nContact : 0775267980 | 0712767047 (WhatsApp)\r\n\r\nFor More Information : https://www.facebook.com/farmdroplk/', '0', 1, 1, 0, '2020-04-09 10:43:17', '2020-04-09 10:43:17'),
(130, 'Krest Deliveries', 8, 'Keells Krest Products Delivery', '0', 1, 1, 0, '2020-04-09 10:58:55', '2020-04-09 10:58:55'),
(131, 'Nelna Chicken', 8, 'Order Nelna Products\r\n\r\nContact 0772394490 for following locations : Nugegoda, Nawala, Pannipitiya, Rajagiriya, Thalawathugoda, Palawatta, Moratuwa\r\n\r\nContact 0773043662 for following locations : Kaduwela, Biyagama, Malabe, Battaramulla, Kadawatha, Kiribathgoda, Kalaniya', '0', 1, 1, 0, '2020-04-09 11:06:08', '2020-04-09 11:06:08'),
(132, 'Nil Sela Super Nagoda', 7, 'Nil Sela Super Nagoda\r\n\r\nOrder your grocery items in Nagoda through Nil Sela Super\r\n\r\nContact : 0342286666 | 0776346276 | 0712788244 (for WhatsApp)', '0', 1, 1, 0, '2020-04-09 13:06:11', '2020-04-09 13:06:11'),
(133, 'Super K', 7, 'Delivered within 5Km of Piliyandala and Kaduwela Cities\r\n\r\nFor Piliyandala Contact : 0718622567 | 0718622565 | 0112617853\r\n\r\nFor Kaduwela Contact : 0718648628 | 0714307724 | 0112539862', '0', 1, 1, 0, '2020-04-09 13:07:24', '2020-04-09 13:07:24'),
(134, 'Co-op Super', 7, 'CO-OP Super Minuwangoda \r\n\r\nOrders within 5Km from Minuwangoda facilitated\r\n\r\nContact : 0115637404 | 0112283461', '0', 1, 1, 0, '2020-04-09 13:52:15', '2020-04-09 13:52:15'),
(135, 'Sprout Water', 13, 'Sprout Water\r\n\r\nContact : 0764682259 | 0117842777', '0', 1, 1, 0, '2020-04-09 13:53:17', '2020-04-09 13:53:17'),
(136, 'Shall Sala', 18, 'Sahal Sala, Negombo (Koppara Junction)\r\n\r\nCash on Delivery Available\r\n\r\nContact : Anil 0771816618 | Dulshan 0777105780 | Iresha 0702093690', '0', 1, 1, 0, '2020-04-09 13:54:34', '2020-04-09 13:54:34'),
(137, 'Sigiri Stores', 7, 'Delivery Areas : Maharagama, Pannipitiya, Arawwala, Delkanda, Boralesgamuwa, Pathiragoda Road, Pamunuwa and Polwatta Junction\r\n\r\nCall us on : 0718422969\r\n\r\nDrop the List on (WhatsApp, IMO, Viber ) : 0713006232 | 0777288998\r\n\r\nSMS Your Orders On : 0713006232\r\n\r\nPlace your orders on Wednesday and Fridays before 10.00am', '0', 1, 1, 0, '2020-04-09 13:56:14', '2020-04-09 13:56:14'),
(138, 'Scraped Coconut', 12, 'We deliver Scraped Coconut to your doorstep\r\n\r\nContact : 0762033044\r\n\r\nColombo 01 â€“ 08,  Nawala, Rajagiriya, Nugegoda, Kalubowila, Dehiwala, Mt.Lavinia', '0', 1, 1, 0, '2020-04-09 13:58:20', '2020-04-09 13:58:20'),
(139, 'Ceylanicus', 7, 'Send us your shopping list & stay home\r\n\r\nContact : 0777300123\r\n\r\nService Area : Kotte, Piliyandala, Maharagama, Colombo 2, 3, 4, 5, 6, 7', '0', 1, 1, 0, '2020-04-09 14:01:00', '2020-04-09 14:01:00'),
(140, 'Annai Nagaa', 7, 'Annai Nagaa Food City\r\n\r\nGroceries & Vegetables home delivery\r\n\r\nContact Number : 0762316034', '0', 1, 1, 0, '2020-04-09 14:02:43', '2020-04-09 14:02:43'),
(141, 'Ruby Traders', 7, 'Ruby Traders at Narahenpita Economic Trade Center\r\n\r\nContact Details : 0771844447', '0', 1, 1, 0, '2020-04-09 14:03:54', '2020-04-09 14:03:54'),
(142, 'Arpico Super Center Delivery', 7, 'Arpico Super Center Delivery\r\n\r\nBoralesgamuwa â€“ 0114899854 â€“ 0114899855             Kadawatha â€“\r\n\r\nYakkala â€“        Gampaha â€“\r\n\r\nKiribathgoda â€“    Kandy â€“\r\n\r\nThalawathugoda â€“     Negombo â€“\r\n\r\nPiliyandala â€“    Wattala â€“\r\n\r\nNawinna â€“ Kegalle â€“\r\n\r\nKalutara â€“     Hyde Park Corver â€“\r\n\r\nMalabe â€“    Battaramulla â€“\r\n\r\nKottawa â€“ Homagama â€“\r\n\r\nKurunegala â€“     Panadura â€“\r\n\r\nKohuwala â€“   Matara â€“\r\n\r\nGalle â€“ Dehiwala â€“\r\n\r\nWellawatta â€“', '0', 1, 1, 0, '2020-04-09 14:07:14', '2020-04-09 14:07:14'),
(143, 'Fresh Cart Vegetables', 12, 'Fresh Cart\r\n\r\nVegetable home delivery in around Galle city.\r\n\r\nContact : 0727444888 | 0778257357 | 091494688', '0', 1, 1, 0, '2020-04-09 14:08:43', '2020-04-09 14:08:43'),
(144, 'Sea Fair Food City', 7, 'Sea Fair Food City\r\n\r\nOur delivery services are in progress only towards the Inter Galle City for bills which extend more than Rs 500/= only. (On selected items)\r\n\r\nOrders are taken from 10.00 am â€“ 2.00pm and goods will be delivered before 5.00pm\r\n\r\nHotline  :\r\n\r\nMr Mifal 0777375225 | Mr. Amjath 0777902121 | Mr.Arfaq 0777270774 | Office 0912248300 | Office 09122434599', '0', 1, 1, 0, '2020-04-09 14:09:43', '2020-04-09 14:09:43'),
(145, 'Aswenna', 12, 'Aswenna\r\n\r\nVegetable home delivery in Maharagama, Nugegoda, boralesgamuwa, thalawathugoda, Pannipitiya, Kottawa, Kotte, Rajagiriya, Malabe.\r\n\r\nHotline : 0777772964 | 0775142737', '0', 1, 1, 0, '2020-04-09 14:11:20', '2020-04-09 14:11:20'),
(146, 'Shope For Me', 7, 'hopForMe is a service that will deliver you groceries right to your home 24/7, with no added delivery charges. All you have to do is call them up on 0762 786 786, or text them via Viber/Whatsapp, and place your order.\r\n\r\nhttps://786.lk/shop-for-me.html\r\n\r\nhttps://www.facebook.com/786.lkShopforMe/', '0', 1, 1, 0, '2020-04-09 14:12:20', '2020-04-09 14:12:20'),
(147, 'Round Island by Oceanpick', 4, 'Safest fish just one call away. Call us now 071122 8228.\r\n\r\nIf you need super fresh Modha (barramundi) home delivered, we will be happy to assist (even during curfew)\r\n\r\nWe deliver our iconic super fresh, ocean reared barramundi directly from Trinco.\r\n\r\nWe will do our best to cover reasonable distances from central Colombo.\r\n\r\nTo place an order, you will have to whatsapp to 0711228228 the following\r\n\r\n1. item(s) you want from this list only\r\n2. Quantity you want\r\n3. Your name\r\n4. Precise address (to make locating you easy)\r\n5. Mobile #\r\n\r\nNo.20, Shady Grove Avenue, Castle Street\r\nColombo\r\n\r\nDelivery :\r\nSame day delivery charges â€“ Rs. 150\r\nNext day delivery charges â€“ Rs. 50\r\nFree deliveries for orders over â€“ Rs. 3000', '0', 1, 1, 0, '2020-04-09 14:13:43', '2020-04-09 14:13:43'),
(148, 'Kotmale Dairy', 18, 'Kotmale dairy products delivered to your doorstep.\r\n*within Nugegoda area\r\n\r\nViber/Whatsapp/ SMS your orders\r\n\r\n0773250867\r\n\r\nâ€“ Orders accepted till 10pm.\r\nâ€“ Delivery on next day before 2pm.\r\n\r\nMinimum order value Rs 500. Online payments and cash on delivery accepted.', '0', 1, 1, 0, '2020-04-09 14:14:50', '2020-04-09 14:14:50'),
(149, 'Pelwaththa Products', 18, 'Pelawatte items available for home delivery.\r\n\r\nSend an SMS or Whatsapp : 0710215162 to place your order.\r\n\r\nDelivery areas:\r\nColombo, Gampaha, Kalutara', '0', 1, 1, 0, '2020-04-09 14:16:06', '2020-04-09 14:16:06'),
(150, 'Paan Paan', 1, 'We will be delivering thru OKI DOKI during curfew. Delivering to Colombo 3, 4 & 5 only.\r\n\r\nWhatsapp 0770500020 for orders | Order one day prior | Minimum order â€“ RS 500 | Delivery charge â€“ RS 250.\r\n\r\nPlease note that delivery radius will be expanding during the next few days.', '0', 1, 1, 1, '2020-04-09 14:17:14', '2020-04-14 06:17:06'),
(151, 'Grocery Essentials by Granada', 7, 'Grocery essentials by Granada are now delivering fresh fruits and vegetables to your home\r\n\r\nYou can place your order via Viber, Whatsapp or SMS, on 0767 633 388\r\n\r\nMake sure to include your name, address and alternate contact number.\r\n\r\nOrders should have a minimum value of 2500 LKR, and will include a delivery charge of LKR 250.', '0', 1, 1, 1, '2020-04-09 14:18:36', '2020-04-14 06:17:14'),
(152, 'Fresh on wheels', 12, 'Fresh Vegetables Available for a Reasonable Price\r\n\r\nMinimum Order Should be Rs.350/=\r\n\r\nDelivery within Colombo\r\n\r\nCall or Whatsapp â€“ 077 414 7272', '0', 1, 1, 0, '2020-04-09 14:19:34', '2020-04-09 14:19:34'),
(153, 'Prima Chicken', 8, 'STAY AT HOME & BE SAFE! WE WILL COME TO YOU.\r\n\r\nCall or Whatsapp us for your requirements\r\n\r\nMadushanka â€“ 777630388\r\nColombo 1-15 Rishan 772933908\r\n\r\nDelivery\r\nCOLOMBO / RATNAPURA / HAMBANTOTA', '0', 1, 1, 0, '2020-04-09 14:22:00', '2020-04-09 14:22:00'),
(154, 'Navalanka Super City', 7, 'Dear Customers! This is to inform you that you are now able to get your Essentials delivered\r\nright to your doorstep via our WhatsApp Ordering system.\r\n\r\nOrders sent in before 1.00 PM shall be entitled to Delivery between 2 â€“ 3 Days\r\n\r\nOrders after 1.00 PM shall receive their goods the following day.\r\n\r\nWhats App â€“ +9477 704 427\r\n\r\nDelivery Times 7.00 am â€“ 5.30 Pm (Daily)\r\nMinimum Order Value LKR 2500/-\r\nCash or Card on Delivery\r\nFREE DELIVERY\r\nDehiwela | Mount Lavinia | Wellawatta | Bambalapitiya |\r\nColpetty | Narahenpita | Kirullapona', '0', 1, 1, 0, '2020-04-09 14:23:41', '2020-04-09 14:23:41'),
(155, 'Lucky Stores', 7, 'We have Delivery Services for Online Purchases\r\nOnline Orders May Be Placed Between â€“ 9.00 am-1.00 pm\r\n\r\nKindly Note Our Delivery Services are ONLY For Areas in Dehiwala and Mount Lavinia\r\n\r\n \r\n\r\nFor further inquiries contact 075 972 4208 via Whatsapp', '0', 1, 1, 0, '2020-04-09 14:25:02', '2020-04-09 14:25:02'),
(156, 'Daraz.lk', 7, 'Delivery areas\r\n\r\nColombo 1 â€“ 15 and Suburbs â€“ Within 48 hours\r\n\r\nOut of Colombo â€“ 3 â€“ 5 Days.\r\n\r\n \r\n\r\nVisit\r\n\r\nhttps://www.daraz.lk/wow/camp/daraz/megascenario/lk/campaign/stay-home-and-stay-safe\r\n\r\nor via Daraz App to order now.', '0', 1, 1, 0, '2020-04-09 14:26:43', '2020-04-09 14:26:43'),
(157, 'Lanka Sathosa Limited', 7, 'PickMe Food and Lanka Sathosa join hands to deliver groceries to your doorstep even during curfew hours.\r\n\r\nEfficient hassle-free delivery  24/7\r\n\r\nPay on Delivery.', '0', 1, 1, 0, '2020-04-10 08:14:47', '2020-04-10 08:14:47'),
(158, 'Fresh Harvest', 4, 'Ready To Cook Seafood Delivered To Your Doorstep\r\n\r\nDuring these difficult times, we are at Fresh Harvest (Pvt) Ltd would indeed do our utmost best for the community and therefore we have obtained approval to make deliveries around Colombo area even during the curfew period.\r\n\r\nðŸ“žCall 0766 644 644\r\n\r\nYou can *get all details about these packages * and *how to place your orders* using the link below\r\n\r\nhttp://shorturl.at/eowU0', '0', 1, 1, 0, '2020-04-10 08:19:34', '2020-04-10 08:19:34'),
(159, 'Lassana Flora', 12, 'Considering the prevailing situation in the country we have expanded our services to focus on delivering Fresh Vegetables, Fruits and other essentials to your Door Step.\r\n\r\nWe ensure *Guaranteed Freshness* and prices lower than the standard supermarket rate by sourcing our fruits and vegetables straight from the grower.  We use our cold chain expertise and strict hygiene practices to assure the highest food hygiene and freshness.\r\n\r\nDelivery will be free within Colombo and suburbs.\r\n\r\nOrder now viawww.lassana.com or\r\nCall us on 011 200 1122', '0', 1, 1, 0, '2020-04-10 08:21:54', '2020-04-10 08:21:54'),
(160, 'Lassana Flora', 5, 'Considering the prevailing situation in the country we have expanded our services to focus on delivering Fresh Vegetables, Fruits and other essentials to your Door Step.\r\n\r\nWe ensure *Guaranteed Freshness* and prices lower than the standard supermarket rate by sourcing our fruits and vegetables straight from the grower.  We use our cold chain expertise and strict hygiene practices to assure the highest food hygiene and freshness.\r\n\r\nDelivery will be free within Colombo and suburbs.\r\n\r\nOrder now viawww.lassana.com or\r\nCall us on 011 200 1122', '0', 1, 1, 0, '2020-04-10 08:22:49', '2020-04-10 08:22:49'),
(161, 'Roxie Chicken', 8, 'Home Delivery\r\n\r\nFresh Chicken (Whole Chicken & Parts )\r\n\r\nðŸ“žCall  0777 29 39 06\r\n\r\nFREE Delivery â€“ Wattala, Kandana, Ja-Ela, Bopitiya', '0', 1, 1, 0, '2020-04-10 08:25:25', '2020-04-10 08:25:25'),
(162, 'Laughs Super', 7, 'Convenience is just a click away!\r\n\r\nOrder now at www.grocerypal.com\r\n\r\nWe will deliver to your doorstep\r\n\r\nMinimum order value is Rs.2000\r\n\r\nDelivery Areas\r\nDehiwala, Kalubowila,  Kirulapone, Kohuwala, Narahenpita, Nugegoda, Pamankada, Pepiliyana,\r\nBoralesgamuwa, Nedimala.', '0', 1, 1, 0, '2020-04-10 08:27:21', '2020-04-10 08:27:21'),
(163, 'Natural Fresh', 12, 'Home Delivery in Colombo from our natural agriculture farms\r\n\r\n100% Natural     100 % Chemical free\r\n\r\nTo Place an order call or text us on 076 732 70 70  or visit www.naturalfresh.farm', '0', 1, 1, 0, '2020-04-10 08:28:13', '2020-04-10 08:28:13'),
(164, 'Deli', 17, 'Home Delivery Available from our store to your door!\r\n\r\nCall us and get your needs delivered now!\r\n\r\nðŸ“žCall 076 138 6159 / 078 740 8452', '0', 1, 1, 0, '2020-04-10 08:29:08', '2020-04-10 08:29:08'),
(165, 'Softlogic Glomark', 7, 'Our online ordering and doorstep deliveries is back. Visit www.glomark.lk and order your groceries today.\r\n\r\nTo provide you with a better service, we have expanded the delivery areas;\r\n\r\nBattaramulla\r\nBoralesgamuwa\r\nColombo 01: Colombo Fort\r\nColombo 02: Slave Island\r\nColombo 03: Kollupitiya\r\nColombo 04: Bambalapitiya\r\nColombo 05: Narahenpita, Havelock Town, Kirulapona North\r\nColombo 06: Wellawatta, Pamankada, Kirulapona South\r\nColombo 07: Cinnamon Garden\r\nColombo 08: Borella\r\nColombo 09: Dematagoda\r\nColombo 10: Maradana, Panchikawatte\r\nColombo 12: Hulsfdorf\r\nColombo 13: Kotahena, Kochchikade\r\nColombo 14: Grandpass\r\nColombo 15: Mattakkuliya, Modara, Mutwal, Madampitiya\r\nDehiwala\r\nKalubowila\r\nKohuwala\r\nKotte\r\nMaharagama\r\nMt. Lavinia\r\nNugegoda\r\nRajagiriya\r\nRatmalana\r\nPiliyandala\r\nThalawatugoda\r\nKottawa\r\nMoratuwa\r\nMalabe\r\nKaduwela\r\nKesbewa\r\nMattegoda\r\nAthurugiriya\r\nMadapatha\r\nKatubedda\r\nPeliyagoda\r\nWattala\r\nKelaniya\r\nKadawatha\r\n\r\n*Terms & Conditions apply.', '0', 1, 1, 0, '2020-04-10 08:32:52', '2020-04-10 08:32:52'),
(166, 'Ocean&#39;s Best', 4, 'Fresh premium seafood now just a few clicks only and delivered to your doorstep.\r\n\r\nVisit us at â€“ www.oceansbestlk.com or call us on 0777780228\r\n\r\nFree delivery within Colombo from Monday to Friday.', '0', 1, 1, 0, '2020-04-10 08:33:44', '2020-04-10 08:33:44'),
(167, 'Munchee Sri Lanka', 2, 'Flavour up your family-time at home with the Munchee Snack Packs at Rs 1,000 and Rs 1,500 Packages.\r\n\r\nOrder now through the PickMe food app.\r\n\r\nWe deliver to these areas: Nugegoda, Boralesgamuwa, Maharagama, Pannipitiya, Battaramulla & Kotte', '0', 1, 1, 0, '2020-04-10 08:35:16', '2020-04-10 08:35:16'),
(168, 'Happy Pill SL', 2, 'Feeling stuck in quarantine? Itâ€™s time for a COOKIE break!\r\n\r\nHappy Pill SL has launched exclusive deliveries during curfew!\r\n\r\nButter cookie with warm chocolate chips stuffed together for the perfect combo\r\n\r\nDM @happypillsl on Instagram to order now! Limited quantity each day.\r\n\r\nDelivery available within Colombo City Limits. DM us to check whether we deliver to your area.', '0', 1, 1, 0, '2020-04-10 08:36:36', '2020-04-10 08:36:36'),
(169, '1979 - Chinese & Thai Restaurant', 2, 'We are Delivering!\r\nMENU and ORDER ONLINE\r\nClick here: https://1979boralesgamuwa.shophere.lk\r\n\r\nDelivery Areas:\r\nBoralesgamuwa, Bokundara, Piliyandala, Bellanthara, Pepiliyana and Maharagama.\r\n\r\nOrders are accepted from 11.00 a.m to 10.00 p.m\r\n\r\nWe accept Cash, Master, Visa and Amex Credit Cards on Delivery.\r\n\r\nCall us on 0114 328 498 / 0772 431 979 for any inquiries.', '0', 1, 1, 0, '2020-04-10 08:38:03', '2020-04-10 08:38:03');
INSERT INTO `ad_posts` (`id`, `name`, `sub_cat_id`, `description`, `thumb`, `approve`, `status`, `verify`, `created`, `updated`) VALUES
(170, 'Roots Gelato', 2, 'Roots Gelato is NOW DELIVERING ! â£\r\nâ£â£\r\nâ£We are now delivering to Colombo 3 â€“ 8, Nawala, Rajagiriya, Nugegoda, Kohuwala, Battaramulla, Pelawatta, Thalawatugoda, Dehiwala and Mount Lavinia\r\n\r\nOrders placed after 12 will be delivered the next day\r\nâ£â£\r\nRequired info to place your order:\r\n1. Full Name\r\n2. Full Address\r\n3. Any Landmarks\r\n4. Primary and Secondary Contact Numbers\r\n\r\nCash on delivery\r\n\r\nDrop us a message through Whatsapp at 077 555 8334 (Javan) to place your orders.', '0', 1, 1, 0, '2020-04-10 08:39:53', '2020-04-10 08:39:53'),
(171, 'Kurtosh SL', 2, 'Kurtosh SL is back with all your favorite items\r\n\r\nWe are delivering in:\r\nColombo 3 â€“ 8, Nugegoda, Kohuwela, Nawala, Kotte, Battaramulla and areas around.\r\n\r\nMinimum order value of RS2000\r\n\r\nDelivery charges RS 200-500(depending on the distance)\r\n\r\nAll short eats are partially cooked, so you can freeze them and bake or fry when you need.\r\nPlease Bake or Fry before consuming\r\n\r\nWhatsapp on 0777 633 206 to place your order', '0', 1, 1, 0, '2020-04-10 08:42:16', '2020-04-10 08:42:16'),
(172, 'Pappa Rich', 2, 'Enjoy PappaRich in the comfort and safety of your home!\r\n\r\nCall us on any one of the given numbers and get your favorite Malaysian delights delivered straight to your doorstep!\r\n\r\nPlease note, weâ€™ll be delivering to Nugegoda, Borella, Battaramulla, Rajagiriya, Colombo 03, 05 and 07 only.\r\n\r\nOrder Times:\r\n10AM â€“ 12PM\r\n4PM â€“ 6PM\r\n\r\nDelivery Times:\r\n12PM â€“ 3PM\r\n6PM â€“ 9PM\r\n\r\nContact us on any of the numbers below for your inquiries:\r\n0766 203 703 (Whatsapp)\r\n0779 190 105 (Whatsapp)\r\n0712 910 910 (Nawala Restaurant Number)', '0', 1, 1, 0, '2020-04-10 08:43:51', '2020-04-10 08:43:51'),
(173, 'The Sandwich Factory', 2, 'Good food is essential!!\r\n\r\nIf youâ€™re tired of cooking and you miss some of your fave #TSF burgers or sandwiches â€“ Call us on 0114 333 363 to place your order.\r\n\r\nWE DELIVER TO : COLOMBO 2-8 (Call hotline for other locations)\r\n\r\nOrders shoud be placed before noon for delivery between either 1PM â€“ 3PM or 4.30PM â€“ 7PM\r\n\r\nCash and Card Payments accepted\r\n\r\nMinimum Order Quantity of 2 Items', '0', 1, 1, 0, '2020-04-10 08:45:10', '2020-04-10 08:45:10'),
(174, 'Palmyrah Restaurant Colombo', 2, 'Weâ€™re now delivering authentic Sri Lankan food for Lunch AND dinner.\r\n\r\nFOR LUNCH ORDERS â€“ Order between 9am and 11am and we will deliver your food before 3pm on the same day.\r\nFOR DINNER ORDERS â€“ Order between 4pm and 6pm and will deliver your food before 9pm on the same day.\r\n\r\nFor orders\r\nCall : +94 11 2573598\r\nWhatsapp : +94 77 159 0889\r\n\r\nMinimum Order Value: Rs 4000\r\n\r\nCash and Card payments accepted.\r\n\r\nDelivery areas include: Colombo 1 â€“ 8', '0', 1, 1, 0, '2020-04-10 08:46:27', '2020-04-10 08:46:27'),
(175, 'Asylum Restaurant & Lounge Bar', 2, 'Our special delivery menu is back!\r\n\r\nPlease place your orders between 7am and 10am and we will deliver your gastronomical delights between 11am and 4pm the same day!\r\n\r\nWe will be delivering from Colombo 1 â€“ 8.\r\n\r\nFor orders Call or Whatsapp:  077 360 1377 or  076 770 7891', '0', 1, 1, 0, '2020-04-10 08:48:27', '2020-04-10 08:48:27'),
(176, 'Taj Samudra', 2, 'Stay safe and stay home!\r\n\r\nEnjoy some tantalizing dishes from Taj Samudra, Colombo while you wait!\r\n\r\nContact us on 0112 446 622 / 071 569 601 for any inquiries\r\n\r\nDelivery Time include:\r\nLunch: 8AM â€“ 12 Noon\r\nDinner: 3PM â€“ 7PM\r\n\r\nMinimum Order Value of Rs. 4000\r\n\r\nFree Delivery for orders above Rs. 6000\r\n\r\nDelivery Available within Colombo 1 â€“ 13 only', '0', 1, 1, 0, '2020-04-10 08:49:57', '2020-04-10 08:49:57'),
(177, 'Botanik Bistro & Bar', 2, 'Bringing Botanik to you! Botanik is commencing delivery services within Colombo City Limits starting on the 2nd,3rd and 4th April .\r\n\r\nWhatsApp our delivery hotline 076 644 5888 to bring a slice of Botanik Goodness to your doorstep.\r\n\r\nCash on delivery or Bank transfer accepted\r\n\r\nMinimum order value is Rs.2000\r\n\r\nDelivery hotline open from 9AM â€“ 9PM. Place your order the previous day or before 11 AM for same day delivery.', '0', 1, 1, 0, '2020-04-10 08:50:58', '2020-04-10 08:50:58'),
(178, 'Delifrance', 2, 'Delifrance will now be taking delivery orders, offering a selected Menu from 11:00AM-7:00PM.\r\n\r\n*Delivery will be valid for orders above Rs.500. All orders will include a delivery charge of Rs.150.\r\n\r\nDelivery locations include Colombo 1 â€“ 8 & Colombo 11\r\n\r\nCard payments only accepted.', '0', 1, 1, 0, '2020-04-10 08:55:55', '2020-04-10 08:55:55'),
(179, 'CafÃ© Beverly', 2, 'Cafe Beverly is now delivering to your doorstep.\r\n\r\nWe are open from 11:00AM to 7:00PM\r\n\r\nCredit Card and Cash payments accepted\r\n\r\nCall us on 011 2888 686 / 011 2888 664 / 070 344 5455 to place your order\r\n\r\n*Free delivery for bills over Rs.5000', '0', 1, 1, 0, '2020-04-10 09:00:12', '2020-04-10 09:00:12'),
(180, 'Caramel Pumpkin', 2, 'Caramel Pumpkin is delivering all your favorite cravings right to your doorstep.\r\n\r\nOrders will be accepted between 8 AM and 3 PM. Please make sure to get your orders in before 3 PM.\r\n\r\nDelivery will be available for Colombo 02, 03, 05, 06 & 07 due to curfew restrictions.\r\n\r\nWhatsapp us on 071 238 3838 at the given times to place your order.\r\n\r\nFREE DELIVERY', '0', 1, 1, 0, '2020-04-10 09:02:18', '2020-04-10 09:02:18'),
(181, 'Ceylon City Hotel', 2, 'Ceylon City Hotel, Colombo will deliver the food you are craving right to your door step during curfew hours.\r\n\r\nDelivery Available for Colombo 3, 4, 5, 6, 7, 8, Dehiwala, Kalubowila & Nugegoda\r\n\r\nMinimum Order Value: Rs. 2000/-\r\n\r\nDelivery Fee Rs. 300/-\r\n\r\nPayment by Cash or Credit Card\r\n\r\nDelivery times:\r\n\r\nLunch : 1.30 pm â€“ 2.30 pm (orders should be placed by 12 noon)\r\nDinner : 7.30 pm â€“ 8.30 pm (orders should be placed by 6 pm)\r\n\r\nCall 0768 209 103 or Whatsapp 0768 209 105 to place your order', '0', 1, 1, 0, '2020-04-10 09:04:22', '2020-04-10 09:04:22'),
(182, 'Il Gelato', 2, 'Order your favorite ice cream before they melt\r\n\r\nDeliver your ice cream right to your doorstep.\r\n\r\nPlace your orders by calling us at 0777 276 793 / email us at sales@tic.lk', '0', 1, 1, 0, '2020-04-10 09:05:17', '2020-04-10 09:05:17'),
(183, 'Lanka Pharmacy', 9, 'Ambagamuwa\r\n\r\n\r\nHatton\r\n+94775113218', '0', 1, 1, 0, '2020-04-14 04:16:14', '2020-04-14 04:16:14'),
(184, 'New City Medical', 9, 'Hatton\r\n+94777723516', '0', 1, 1, 0, '2020-04-14 04:17:15', '2020-04-14 04:17:15'),
(185, 'Uma Enterprises', 9, '+94777519255', '0', 1, 1, 0, '2020-04-14 04:18:00', '2020-04-14 04:18:00'),
(186, 'Rich Life', 18, '+94777703886\r\nMinimum order value is Rs 1500\r\nCash on delivery\r\nFree Delivery', '0', 1, 1, 0, '2020-04-14 05:49:14', '2020-04-14 05:49:14'),
(187, 'HS Marketing', 7, '+94711561010\r\n+94767625294\r\n+94701157003\r\n+94718460597\r\nfacebook.com/342640899537807\r\nOrders can be placed via WhatsApp/Viber', '0', 1, 1, 0, '2020-04-14 05:50:24', '2020-04-14 05:50:24'),
(188, 'Maliban', 7, '+94702558509\r\n+94702558545\r\n+94702558546\r\nMinimum order value is 2000LKR', '0', 1, 1, 0, '2020-04-14 05:52:05', '2020-04-14 05:52:05'),
(189, 'Medi House', 9, '+94772701301', '0', 1, 1, 0, '2020-04-14 05:52:36', '2020-04-14 05:52:36'),
(190, 'Sahanro Pharmacy', 9, '+94773993289', '0', 1, 1, 0, '2020-04-14 05:53:17', '2020-04-14 05:53:17'),
(191, 'Aloka Pharmacy', 9, 'Ambalanthota\r\n+94718027507', '0', 1, 1, 1, '2020-04-14 06:00:45', '2020-04-14 06:17:41'),
(192, 'Medi First Pharmacy', 9, '40, Main St, Ambalanthota\r\n+94712198329', '0', 1, 1, 1, '2020-04-14 06:01:12', '2020-04-14 06:17:33'),
(193, 'Cargills Food City-  Ambalantota', 7, '+94472225617\r\nfacebook.com/cargillsfoodcity\r\nOrders can be made from 8am to 2pm daily\r\nDelivery will be done within 24 hours\r\nMinimum value of Rs. 2000 per order', '0', 1, 1, 1, '2020-04-14 06:02:26', '2020-04-14 06:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `ad_post_cities`
--

CREATE TABLE `ad_post_cities` (
  `id` int(11) NOT NULL,
  `ad_post_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_post_cities`
--

INSERT INTO `ad_post_cities` (`id`, `ad_post_id`, `city_id`) VALUES
(1, 7, 14),
(2, 7, 15),
(3, 7, 16),
(4, 7, 17),
(5, 7, 18),
(6, 7, 19),
(7, 7, 20),
(8, 7, 21),
(9, 7, 22),
(10, 7, 23),
(11, 7, 24),
(12, 7, 25),
(13, 7, 26),
(14, 7, 27),
(15, 7, 28),
(16, 7, 210),
(17, 7, 331),
(18, 122, 30),
(19, 124, 62),
(20, 125, 19),
(21, 126, 88),
(22, 127, 54),
(23, 133, 88),
(24, 138, 14),
(25, 138, 15),
(26, 138, 16),
(27, 138, 17),
(28, 138, 18),
(29, 138, 19),
(30, 138, 20),
(31, 138, 21),
(32, 138, 30),
(33, 138, 52),
(34, 138, 76),
(35, 138, 81),
(36, 138, 82),
(37, 138, 94),
(38, 139, 15),
(39, 139, 16),
(40, 139, 17),
(41, 139, 18),
(42, 139, 19),
(43, 139, 20),
(44, 139, 63),
(45, 139, 66),
(46, 139, 88),
(47, 140, 17),
(48, 140, 30),
(49, 140, 76),
(50, 140, 107),
(51, 141, 107),
(52, 142, 13),
(53, 142, 30),
(54, 142, 43),
(55, 142, 57),
(56, 142, 67),
(57, 142, 88),
(58, 142, 180),
(59, 142, 321),
(60, 143, 321),
(61, 145, 13),
(62, 145, 62),
(63, 145, 63),
(64, 145, 66),
(65, 145, 67),
(66, 145, 82),
(67, 145, 84),
(68, 145, 94),
(69, 147, 14),
(70, 148, 82),
(71, 150, 16),
(72, 150, 17),
(73, 150, 18),
(74, 151, 82),
(75, 153, 14),
(76, 153, 15),
(77, 153, 16),
(78, 153, 17),
(79, 153, 18),
(80, 153, 19),
(81, 153, 20),
(82, 153, 21),
(83, 153, 22),
(84, 153, 23),
(85, 153, 24),
(86, 153, 25),
(87, 153, 26),
(88, 153, 27),
(89, 153, 28),
(90, 154, 16),
(91, 154, 17),
(92, 154, 30),
(93, 154, 76),
(94, 154, 107),
(95, 155, 30),
(96, 155, 76),
(97, 156, 14),
(98, 156, 15),
(99, 156, 16),
(100, 156, 17),
(101, 156, 18),
(102, 156, 19),
(103, 156, 20),
(104, 156, 21),
(105, 156, 22),
(106, 156, 23),
(107, 156, 24),
(108, 156, 25),
(109, 156, 26),
(110, 156, 27),
(111, 156, 28),
(112, 157, 18),
(113, 157, 30),
(114, 157, 63),
(115, 157, 75),
(116, 157, 76),
(117, 157, 82),
(118, 157, 88),
(119, 157, 94),
(120, 157, 96),
(121, 162, 13),
(122, 162, 18),
(123, 162, 19),
(124, 162, 30),
(125, 162, 52),
(126, 162, 57),
(127, 162, 82),
(128, 162, 87),
(129, 165, 5),
(130, 165, 8),
(131, 165, 13),
(132, 165, 14),
(133, 165, 15),
(134, 165, 16),
(135, 165, 17),
(136, 165, 18),
(137, 165, 19),
(138, 165, 20),
(139, 165, 21),
(140, 165, 22),
(141, 165, 23),
(142, 165, 24),
(143, 165, 25),
(144, 165, 26),
(145, 165, 27),
(146, 165, 28),
(147, 165, 30),
(148, 165, 47),
(149, 165, 52),
(150, 165, 53),
(151, 165, 54),
(152, 165, 55),
(153, 165, 57),
(154, 165, 62),
(155, 165, 63),
(156, 165, 64),
(157, 165, 66),
(158, 165, 67),
(159, 165, 69),
(160, 165, 75),
(161, 165, 76),
(162, 165, 82),
(163, 165, 86),
(164, 165, 88),
(165, 165, 94),
(166, 165, 96),
(167, 167, 8),
(168, 167, 13),
(169, 167, 63),
(170, 167, 66),
(171, 167, 82),
(172, 167, 84),
(173, 169, 11),
(174, 169, 13),
(175, 169, 66),
(176, 169, 87),
(177, 169, 88),
(178, 170, 8),
(179, 170, 16),
(180, 170, 17),
(181, 170, 18),
(182, 170, 19),
(183, 170, 20),
(184, 170, 21),
(185, 170, 30),
(186, 170, 57),
(187, 170, 76),
(188, 170, 82),
(189, 170, 85),
(190, 170, 94),
(191, 171, 8),
(192, 171, 16),
(193, 171, 17),
(194, 171, 18),
(195, 171, 19),
(196, 171, 20),
(197, 171, 21),
(198, 171, 57),
(199, 171, 63),
(200, 171, 82),
(201, 172, 8),
(202, 172, 16),
(203, 172, 18),
(204, 172, 20),
(205, 172, 82),
(206, 172, 94),
(207, 172, 460),
(208, 173, 15),
(209, 173, 16),
(210, 173, 17),
(211, 173, 18),
(212, 173, 19),
(213, 173, 20),
(214, 173, 21),
(215, 174, 14),
(216, 174, 15),
(217, 174, 16),
(218, 174, 17),
(219, 174, 18),
(220, 174, 19),
(221, 174, 20),
(222, 174, 21),
(223, 175, 14),
(224, 175, 15),
(225, 175, 16),
(226, 175, 17),
(227, 175, 18),
(228, 175, 19),
(229, 175, 20),
(230, 175, 21),
(231, 176, 14),
(232, 176, 15),
(233, 176, 16),
(234, 176, 17),
(235, 176, 18),
(236, 176, 19),
(237, 176, 20),
(238, 176, 21),
(239, 176, 22),
(240, 176, 23),
(241, 176, 24),
(242, 176, 25),
(243, 176, 26),
(244, 178, 14),
(245, 178, 15),
(246, 178, 16),
(247, 178, 17),
(248, 178, 18),
(249, 178, 19),
(250, 178, 20),
(251, 178, 21),
(252, 178, 24),
(253, 180, 15),
(254, 180, 16),
(255, 180, 18),
(256, 180, 19),
(257, 180, 20),
(258, 181, 16),
(259, 181, 17),
(260, 181, 18),
(261, 181, 19),
(262, 181, 20),
(263, 181, 21),
(264, 181, 30),
(265, 181, 52),
(266, 181, 82);

-- --------------------------------------------------------

--
-- Table structure for table `ad_post_comments`
--

CREATE TABLE `ad_post_comments` (
  `id` int(11) NOT NULL,
  `ad_post_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `comment` tinytext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_post_comments`
--

INSERT INTO `ad_post_comments` (`id`, `ad_post_id`, `name`, `comment`, `created`, `ip_address`) VALUES
(1, 1, 'Sajeevan', 'Verified Post', '2020-04-03 13:47:23', '61.245.161.88'),
(2, 2, 'Malik Jameel', 'Verified supplier', '2020-04-04 09:57:00', '123.231.87.115'),
(3, 116, 'Hello', 'Thanks', '2020-04-08 18:47:14', '43.250.241.65');

-- --------------------------------------------------------

--
-- Table structure for table `ad_post_images`
--

CREATE TABLE `ad_post_images` (
  `id` int(11) NOT NULL,
  `ad_post_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_post_images`
--

INSERT INTO `ad_post_images` (`id`, `ad_post_id`, `name`, `created`) VALUES
(1, 15, '0804201536028724.jpg', '2020-04-08 06:31:05'),
(2, 16, '080420365861273.jpg', '2020-04-08 06:31:05'),
(3, 17, '0804201929614713.png', '2020-04-08 06:32:39'),
(4, 18, '0804201145558655.jpg', '2020-04-08 06:33:53'),
(5, 19, '0804201235155715.jpg', '2020-04-08 06:50:58'),
(6, 20, '080420832011279.jpg', '2020-04-08 07:00:43'),
(7, 26, '080420728233111.jpg', '2020-04-08 07:06:59'),
(8, 35, '080420162419997.jpg', '2020-04-08 07:16:56'),
(9, 36, '080420385435747.jpg', '2020-04-08 07:21:13'),
(10, 41, '0804201724003207.jpg', '2020-04-08 07:28:37'),
(11, 43, '0804201257154774.jpg', '2020-04-08 08:15:31'),
(12, 44, '0804201965708266.jpg', '2020-04-08 08:16:47'),
(13, 46, '080420463929130.jpg', '2020-04-08 08:18:05'),
(14, 47, '080420164916054.jpg', '2020-04-08 08:18:45'),
(15, 49, '080420995441143.jpg', '2020-04-08 08:20:36'),
(16, 50, '080420806055164.jpg', '2020-04-08 08:21:08'),
(17, 51, '080420787739435.jpg', '2020-04-08 08:21:14'),
(18, 52, '0804201141616599.jpg', '2020-04-08 08:24:37'),
(19, 53, '080420228606776.jpg', '2020-04-08 08:27:42'),
(20, 54, '0804201057704352.jpg', '2020-04-08 08:29:08'),
(21, 55, '080420932233789.jpg', '2020-04-08 08:29:53'),
(22, 56, '0804201799111522.jpg', '2020-04-08 08:31:00'),
(23, 57, '0804201743049629.jpg', '2020-04-08 08:32:38'),
(24, 58, '080420740738060.jpg', '2020-04-08 08:36:40'),
(25, 59, '0804201830775407.jpg', '2020-04-08 08:37:48'),
(26, 60, '0804201603754838.jpg', '2020-04-08 08:38:36'),
(27, 61, '080420484721946.jpg', '2020-04-08 08:39:39'),
(28, 62, '0804201619513146.jpg', '2020-04-08 08:40:23'),
(29, 63, '0804202144225531.jpg', '2020-04-08 08:41:30'),
(30, 65, '08042079284273.jpg', '2020-04-08 08:42:34'),
(31, 66, '080420771572726.jpg', '2020-04-08 08:43:44'),
(32, 67, '08042019518377.jpg', '2020-04-08 08:43:50'),
(33, 69, '0804201455971443.jpg', '2020-04-08 08:50:33'),
(34, 70, '080420204391108.jpeg', '2020-04-08 08:52:40'),
(35, 71, '080420278957233.jpg', '2020-04-08 08:53:58'),
(36, 71, '0804201054067485.jpg', '2020-04-08 08:53:58'),
(37, 72, '080420649381842.png', '2020-04-08 09:27:57'),
(38, 73, '080420920283341.jpg', '2020-04-08 09:28:40'),
(39, 74, '080420361404837.jpg', '2020-04-08 09:30:04'),
(40, 75, '080420636787409.jpg', '2020-04-08 09:31:17'),
(41, 76, '080420996482329.jpg', '2020-04-08 09:32:05'),
(42, 77, '080420408119425.jpg', '2020-04-08 09:32:44'),
(43, 79, '0804202115949010.jpg', '2020-04-08 09:35:48'),
(44, 81, '080420213042172.jpg', '2020-04-08 09:37:57'),
(45, 82, '0804201495276530.jpg', '2020-04-08 09:38:57'),
(46, 83, '0804201973119511.jpeg', '2020-04-08 09:44:02'),
(47, 84, '0804202003935202.jpg', '2020-04-08 09:46:04'),
(48, 85, '080420630272863.jpg', '2020-04-08 09:50:30'),
(49, 86, '080420882188740.jpg', '2020-04-08 09:50:49'),
(50, 87, '080420745245275.jpg', '2020-04-08 09:51:11'),
(51, 88, '080420299642609.jpg', '2020-04-08 09:51:39'),
(52, 89, '080420717776229.jpg', '2020-04-08 09:57:24'),
(53, 90, '080420549274133.jpg', '2020-04-08 09:57:37'),
(54, 91, '080420576248959.jpg', '2020-04-08 10:00:22'),
(55, 92, '0804201252072089.jpg', '2020-04-08 10:01:24'),
(56, 93, '080420781151192.jpg', '2020-04-08 10:03:53'),
(57, 94, '080420299148341.jpg', '2020-04-08 10:05:45'),
(58, 95, '08042093160570.jpg', '2020-04-08 10:14:50'),
(59, 96, '0804201578779837.jpg', '2020-04-08 10:15:49'),
(60, 97, '0804201146936140.jpg', '2020-04-08 10:19:33'),
(61, 98, '080420391172127.jpg', '2020-04-08 10:44:44'),
(62, 99, '080420165517762.jpg', '2020-04-08 10:46:11'),
(63, 100, '080420765141861.jpg', '2020-04-08 10:46:39'),
(64, 101, '0804201809777872.jpg', '2020-04-08 10:47:36'),
(65, 102, '0804201043455340.jpg', '2020-04-08 14:30:06'),
(66, 103, '0804201979903863.jpg', '2020-04-08 14:31:12'),
(67, 104, '08042017062269.png', '2020-04-08 14:33:03'),
(68, 104, '0804201724432758.png', '2020-04-08 14:33:03'),
(69, 104, '0804201172208110.png', '2020-04-08 14:33:03'),
(70, 105, '080420532331439.jpg', '2020-04-08 14:34:00'),
(71, 106, '0804201094380342.jpg', '2020-04-08 14:35:01'),
(72, 107, '0804202029818788.jpg', '2020-04-08 14:36:02'),
(73, 108, '080420512064209.jpg', '2020-04-08 14:37:17'),
(74, 109, '0804201468146410.jpg', '2020-04-08 14:39:15'),
(75, 110, '080420899442994.jpg', '2020-04-08 14:41:22'),
(76, 111, '080420162100789.jpg', '2020-04-08 14:42:25'),
(77, 112, '0804202119908345.png', '2020-04-08 14:43:36'),
(78, 113, '0804202135578934.jpg', '2020-04-08 14:44:31'),
(79, 114, '0804201639667181.jpg', '2020-04-08 14:46:16'),
(80, 115, '0804202111066279.jpg', '2020-04-08 14:52:34'),
(81, 116, '0804201549448246.jpg', '2020-04-08 14:53:26'),
(82, 117, '0804201462519777.jpg', '2020-04-08 14:54:31'),
(83, 118, '080420417854589.jpg', '2020-04-08 14:55:24'),
(84, 119, '0904201305661967.jpg', '2020-04-09 04:31:55'),
(85, 120, '09042069854871.jpg', '2020-04-09 04:31:55'),
(86, 121, '0904201429455079.jpg', '2020-04-09 04:32:54'),
(87, 123, '0904201731952510.jpg', '2020-04-09 04:35:02'),
(88, 124, '090420292116889.jpg', '2020-04-09 04:37:18'),
(89, 126, '0904201647433306.png', '2020-04-09 06:37:23'),
(90, 127, '0904201504307899.jpg', '2020-04-09 06:39:15'),
(91, 128, '0904202036344658.jpg', '2020-04-09 06:49:44'),
(92, 129, '090420575655533.jpg', '2020-04-09 10:43:17'),
(93, 130, '090420905019691.jpg', '2020-04-09 10:58:55'),
(94, 131, '0904201309731382.jpg', '2020-04-09 11:06:08'),
(95, 132, '090420324912146.jpg', '2020-04-09 13:06:11'),
(96, 133, '0904201833418922.jpg', '2020-04-09 13:07:24'),
(97, 134, '0904202043951259.jpg', '2020-04-09 13:52:15'),
(98, 135, '090420812541153.jpg', '2020-04-09 13:53:17'),
(99, 136, '090420424813537.jpg', '2020-04-09 13:54:34'),
(100, 137, '0904201879849295.jpg', '2020-04-09 13:56:14'),
(101, 138, '0904201495495462.jpg', '2020-04-09 13:58:20'),
(102, 139, '090420227955435.jpg', '2020-04-09 14:01:00'),
(103, 140, '0904201487595754.jpg', '2020-04-09 14:02:43'),
(104, 141, '0904201368391015.jpg', '2020-04-09 14:03:54'),
(105, 142, '0904201454704768.jpg', '2020-04-09 14:07:14'),
(106, 143, '090420403623604.jpg', '2020-04-09 14:08:43'),
(107, 144, '090420570504110.jpg', '2020-04-09 14:09:43'),
(108, 145, '090420516011269.jpg', '2020-04-09 14:11:20'),
(109, 146, '090420804571064.jpg', '2020-04-09 14:12:20'),
(110, 147, '0904201101114166.jpg', '2020-04-09 14:13:44'),
(111, 148, '0904202042773162.jpg', '2020-04-09 14:14:50'),
(112, 149, '090420221405035.jpg', '2020-04-09 14:16:06'),
(113, 150, '0904201704268611.jpg', '2020-04-09 14:17:14'),
(114, 151, '090420435495491.jpg', '2020-04-09 14:18:36'),
(115, 152, '0904201860699438.jpg', '2020-04-09 14:19:34'),
(116, 153, '090420350016278.png', '2020-04-09 14:22:01'),
(117, 154, '0904201062362374.jpg', '2020-04-09 14:23:41'),
(118, 155, '090420195257063.jpg', '2020-04-09 14:25:02'),
(119, 156, '090420992258924.png', '2020-04-09 14:26:44'),
(120, 157, '10042068050564.jpg', '2020-04-10 08:14:47'),
(121, 158, '1004202122354696.jpg', '2020-04-10 08:19:34'),
(122, 159, '100420192338285.jpg', '2020-04-10 08:21:54'),
(123, 160, '1004202084898003.jpg', '2020-04-10 08:22:49'),
(124, 161, '1004201893768127.jpg', '2020-04-10 08:25:25'),
(125, 162, '100420475053313.jpg', '2020-04-10 08:27:21'),
(126, 163, '100420707663023.jpg', '2020-04-10 08:28:13'),
(127, 164, '1004201187935659.jpg', '2020-04-10 08:29:08'),
(128, 165, '100420598021135.jpg', '2020-04-10 08:32:52'),
(129, 166, '1004202120172488.jpg', '2020-04-10 08:33:44'),
(130, 167, '10042096567788.jpg', '2020-04-10 08:35:16'),
(131, 168, '1004201031167509.jpg', '2020-04-10 08:36:36'),
(132, 168, '100420907906613.jpg', '2020-04-10 08:36:36'),
(133, 168, '1004201183542935.jpg', '2020-04-10 08:36:36'),
(134, 169, '10042038684441.jpg', '2020-04-10 08:38:03'),
(135, 170, '100420100163829.jpg', '2020-04-10 08:39:53'),
(136, 171, '100420514667126.jpg', '2020-04-10 08:42:16'),
(137, 172, '1004201268161376.jpg', '2020-04-10 08:43:51'),
(138, 172, '1004201951066886.jpg', '2020-04-10 08:43:51'),
(139, 172, '100420596304883.jpg', '2020-04-10 08:43:51'),
(140, 173, '100420292094139.jpg', '2020-04-10 08:45:10'),
(141, 174, '100420389068773.png', '2020-04-10 08:46:27'),
(142, 175, '1004201117364478.png', '2020-04-10 08:48:27'),
(143, 175, '100420214054150.png', '2020-04-10 08:48:27'),
(144, 175, '1004201579048933.png', '2020-04-10 08:48:27'),
(145, 175, '100420166761353.png', '2020-04-10 08:48:27'),
(146, 175, '100420393210088.png', '2020-04-10 08:48:27'),
(147, 176, '1004201901587497.jpg', '2020-04-10 08:49:57'),
(148, 177, '1004201671454956.jpg', '2020-04-10 08:50:58'),
(149, 178, '100420394415027.jpg', '2020-04-10 08:55:56'),
(150, 178, '100420617451222.jpg', '2020-04-10 08:55:56'),
(151, 178, '1004201868790056.jpg', '2020-04-10 08:55:56'),
(152, 178, '1004202073114582.jpg', '2020-04-10 08:55:56'),
(153, 178, '10042067187356.jpg', '2020-04-10 08:55:56'),
(154, 179, '1004201372835778.jpg', '2020-04-10 09:00:12'),
(155, 180, '1004201999484409.jpg', '2020-04-10 09:02:18'),
(156, 180, '100420546915228.jpg', '2020-04-10 09:02:18'),
(157, 180, '1004201185191851.jpg', '2020-04-10 09:02:18'),
(158, 180, '100420384202243.jpg', '2020-04-10 09:02:18'),
(159, 181, '1004201575308952.jpg', '2020-04-10 09:04:22'),
(160, 182, '10042022850441.jpg', '2020-04-10 09:05:17'),
(161, 186, '140420906570574.jpg', '2020-04-14 05:49:14'),
(162, 187, '140420221334385.jpg', '2020-04-14 05:50:24'),
(163, 188, '140420626813283.jpg', '2020-04-14 05:52:05'),
(164, 193, '140420579290811.jpg', '2020-04-14 06:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `ad_post_list`
--

CREATE TABLE `ad_post_list` (
  `id` int(11) NOT NULL,
  `ad_post_id` int(11) NOT NULL,
  `type` enum('phone','email','fb','link','address','insta','twitter','time') NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` tinytext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_post_list`
--

INSERT INTO `ad_post_list` (`id`, `ad_post_id`, `type`, `name`, `detail`, `created`) VALUES
(1, 182, 'phone', 'phone', '0777 276 793', '2020-04-10 15:17:01'),
(2, 182, 'email', 'email', 'sales@tic.lk', '2020-04-10 15:17:01'),
(3, 181, 'phone', 'phone', '0768 209 103', '2020-04-10 15:18:15'),
(4, 181, 'phone', 'phone', '0768 209 105', '2020-04-10 15:18:15'),
(5, 180, 'phone', 'phone', '071 238 3838', '2020-04-10 15:18:39'),
(6, 179, 'phone', 'phone', '011 2888 686', '2020-04-10 15:19:26'),
(7, 179, 'phone', 'phone', '011 2888 686', '2020-04-10 15:19:26'),
(8, 179, 'phone', 'phone', '070 344 5455', '2020-04-10 15:19:26'),
(9, 179, 'time', 'time', 'open from 11:00AM to 7:00PM', '2020-04-10 15:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `user_agent` varchar(200) NOT NULL,
  `ip_address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `user_id`, `date`, `action`, `description`, `user_agent`, `ip_address`) VALUES
(1, 3, '2020-03-28 16:53:29', 'Login', 'sajeevan has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '61.245.161.26'),
(2, 3, '2020-03-28 16:53:46', 'Create Cause', 'New cause Making Masks and Sanitizers available for free for everyone has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '61.245.161.26'),
(3, 3, '2020-03-28 16:55:07', 'Create Cause', 'New cause Distribution of dry rations to under privileged families in Nuwara Eliya has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '61.245.161.26'),
(4, 3, '2020-03-28 16:55:18', 'Create Cause', 'New cause Providing consultancy and support for SMEs that have got affected has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '61.245.161.26'),
(5, 6, '2020-03-29 05:34:09', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '43.250.243.113'),
(6, 6, '2020-03-29 05:34:48', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.2 Safari/605.1.15', '112.134.195.69'),
(7, 3, '2020-03-30 09:22:47', 'Login', 'sajeevan has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '43.250.240.203'),
(8, 3, '2020-03-30 09:23:09', 'Login', 'sajeevan has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '43.250.240.203'),
(9, 3, '2020-04-01 15:18:42', 'Login', 'sajeevan has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '43.250.240.22'),
(10, 3, '2020-04-01 15:36:54', 'Create Post', 'New post Test has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '43.250.240.22'),
(11, 3, '2020-04-03 13:49:11', 'Login', 'sajeevan has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '61.245.161.88'),
(12, 6, '2020-04-04 09:38:36', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '123.231.87.115'),
(13, 6, '2020-04-04 09:42:03', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '61.245.169.235'),
(14, 6, '2020-04-04 09:43:44', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '123.231.87.115'),
(15, 6, '2020-04-06 09:59:04', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(16, 6, '2020-04-06 10:02:26', 'Edit Cause', 'Cause Making Face Masks and Hand Sanitizers available for Free has been edited', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(17, 6, '2020-04-06 10:04:17', 'Create Cause', 'New cause Distributing of Dry Rations to under privileged families in Kalutara has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(18, 6, '2020-04-06 10:06:05', 'Edit Cause', 'Cause Distributing of Dry Rations to under privileged families in Kalutara has been edited', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(19, 6, '2020-04-06 10:07:24', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(20, 6, '2020-04-06 10:16:50', 'Create Cause', 'New cause Providing Mental Health Support and Counselling has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(21, 6, '2020-04-06 10:21:12', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(22, 6, '2020-04-06 10:21:49', 'Edit Cause', 'Cause Distributing Dry Rations to under privileged families in Nuwara Eliya has been edited', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(23, 6, '2020-04-06 10:41:54', 'Create Cause', 'New cause Making Face Masks and Sanitizers Available for Free has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(24, 6, '2020-04-06 10:42:17', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(25, 6, '2020-04-06 10:43:15', 'Edit Cause', 'Cause Distributing Dry Rations to under privileged families in Kalutara has been edited', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(26, 6, '2020-04-06 10:45:48', 'Create Cause', 'New cause Providing Consultancy and Support for SMEs that have been affected has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(27, 6, '2020-04-06 10:46:14', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.222.122'),
(28, 6, '2020-04-07 05:39:35', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.221.21'),
(29, 6, '2020-04-07 05:47:44', 'Edit Cause', 'Cause Distributing Dry Rations to under privileged families in Nuwara Eliya has been edited', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.221.21'),
(30, 6, '2020-04-07 05:48:21', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '112.134.221.21'),
(31, 6, '2020-04-08 06:21:28', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.109.160'),
(32, 3, '2020-04-08 12:26:24', 'Login', 'sajeevan has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '43.250.241.65'),
(33, 3, '2020-04-08 12:28:06', 'Edit Post', 'Post Finagle has been updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '43.250.241.65'),
(34, 3, '2020-04-08 12:35:35', 'Edit Post', 'Post Eva Sri Lanka has been updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '43.250.241.65'),
(35, 6, '2020-04-08 14:58:38', 'Edit Post', 'Post Chariot has been updated', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.109.160'),
(36, 6, '2020-04-09 03:33:21', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '112.134.217.179'),
(37, 6, '2020-04-09 03:36:50', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '112.134.217.179'),
(38, 6, '2020-04-10 05:12:53', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '123.231.84.42'),
(39, 3, '2020-04-10 15:16:16', 'Login', 'sajeevan has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '61.245.169.100'),
(40, 6, '2020-04-10 15:23:22', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '175.157.252.247'),
(41, 6, '2020-04-10 15:24:13', 'Create Cause', 'New cause Distributing Dry Rations to underprivileged families in Moratuwa has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '175.157.252.247'),
(42, 6, '2020-04-10 15:27:24', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '175.157.252.247'),
(43, 6, '2020-04-13 03:20:58', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(44, 6, '2020-04-13 03:48:25', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '175.157.52.164'),
(45, 6, '2020-04-13 03:50:55', 'Create Cause', 'New cause Distributing Dry Rations to Hatton, Moratuwa Coastal Areas and Piliyandala has been created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '175.157.52.164'),
(46, 6, '2020-04-13 03:52:03', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Linux; Android 9; JKM-LX2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', '175.157.52.164'),
(47, 6, '2020-04-13 04:04:52', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '175.157.52.164'),
(48, 6, '2020-04-13 04:09:36', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '175.157.52.164'),
(49, 6, '2020-04-13 04:51:56', 'Edit Cause', 'Cause Distributing Dry Rations to under privileged families in Nuwara Eliya has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(50, 6, '2020-04-13 04:52:17', 'Login', 'admin has been logged in', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(51, 6, '2020-04-13 04:52:46', 'Edit Cause', 'Cause Distributing dry rations to underprivileged families in Nuwara eliya has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(52, 6, '2020-04-13 05:40:45', 'Edit Cause', 'Cause Distributing Dry Rations to under privileged families in Kalutara has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(53, 6, '2020-04-13 05:41:15', 'Edit Cause', 'Cause Distributing dry rations to underprivileged families in Kalutara has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(54, 6, '2020-04-13 06:04:26', 'Edit Cause', 'Cause Distributing dry rations to underprivileged families in Moratuwa has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(55, 6, '2020-04-13 06:10:42', 'Edit Cause', 'Cause Distributing dry rations to Hatton, Piliyandala & coastal areas of Moratuwa has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(56, 6, '2020-04-13 06:31:25', 'Edit Cause', 'Cause Providing Mental Health Support and Counselling has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(57, 6, '2020-04-13 06:40:48', 'Edit Cause', 'Cause Providing free face masks and hand sanitizers has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(58, 6, '2020-04-13 06:50:59', 'Edit Cause', 'Cause Providing Consultancy and Support for SMEs that have been affected has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(59, 6, '2020-04-13 06:52:53', 'Edit Cause', 'Cause Providing free face masks and hand sanitizers for everyone has been edited', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(60, 6, '2020-04-13 07:04:35', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(61, 6, '2020-04-13 07:05:19', 'Update Cause Thumbnail', 'Cause thumbnail has been changed', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '123.231.125.240'),
(62, 3, '2020-04-14 03:36:00', 'Login', 'sajeevan has been logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '43.250.240.126'),
(63, 3, '2020-04-14 04:37:32', 'Edit Cause', 'Cause Distributing dry rations to underprivileged families in Kalutara has been edited', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '43.250.240.126');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `name`, `description`, `thumb`, `created`) VALUES
(5, 'Providing Mental Health Support and Counselling', 'Given the COVID-19 global pandemic situation we have right now, feeling stressed, anxious, or worried is to be expected. \r\n\r\nWe have teamed up with qualified health professionals, psychologists and doctors to offer psychological first aid to individuals who are undergoing anxiety and depression as a result of this crisis.\r\n\r\nYou can support our cause by donating and that will help us offer better mental health services and bring hope and help someone know that they are not alone.', 'pThumb1411591217.jpeg', '2020-04-06 10:16:50'),
(2, 'Distributing dry rations to underprivileged families in Nuwara eliya', 'For many families in rural villages in Nuwara eliya, dry rations and other essential items have been out of reach due to the ongoing pandemic.\r\n\r\nA large number of people in these villages do not have a steady monthly salary or the flexibility of working from home like many of us have today.\r\n \r\nMany do not have enough resources to stock up on dry rations and other essentials for their families. \r\n\r\nWe are changing this,  by uniting together and visiting the areas that need it the most and distributing dry rations to families.  \r\n\r\nHow can you help?\r\n\r\nEvery contribution, no matter what amount, goes into preparing and distributing dry rations & other essential items for an underprivileged family.  \r\n\r\nWith this, you can help make sure a family survives to see another day without hunger.', 'pThumb1344001959.jpeg', '2020-03-28 16:55:07'),
(7, 'Providing Consultancy and Support for SMEs that have been affected', 'The COVID-19 pandemic is affecting small and medium businesses in many ways. \r\n\r\nFrom loss of business to remote work, things are changing fast during the COVID-19 outbreak and businesses are being forced to adapt.\r\n\r\nTherefore,  we have stepped up to create a real social impact and provide bespoke consultancy for SMEs to rise up from this crisis and help mitigate their business operations.\r\n\r\nYou can support our cause to help SMEs navigate these challenging times so that together we will more quickly adapt to our uncertain future.', 'pThumb1760062227.jpeg', '2020-04-06 10:45:48'),
(4, 'Distributing dry rations to underprivileged families in Kalutara', '<p>Due to the ongoing global pandemic and the nationwide quarantine situation, underprivileged families have been hit quite hard.</p>\r\n<p>Their sources of livelihood have broken down, leaving them at risk and dependent on external support for food and other essential supplies. Therefore, we have pledged to cater dry ratios and other basic essentials to these families in Kalutara during this period.</p>\r\n<p>How can you help? Every contribution, no matter what amount, goes into preparing and distributing dry rations and other basic essentials for an underprivileged family.</p>\r\n<p>With this, you can help make sure a family survives to see another day without hunger.</p>', 'pThumb969137835.jpeg', '2020-04-06 10:04:17'),
(6, 'Providing free face masks and hand sanitizers for everyone', 'As the COVID-19 global pandemic continues to spread, face masks and hand sanitizers have become basic necessities in everyoneâ€™s lives and we believe that they should not be sold at a premium.\r\n\r\nWe hope to help our communities stay safe and healthy in the midst of this global pandemic.\r\n\r\nWe have pledged to provide face masks and hand sanitizers for free during this ongoing pandemic.\r\n\r\nYou can help us carry on our cause by donations or by donating hand sanitizers and reusable face masks.', 'pThumb702219590.jpeg', '2020-04-06 10:41:54'),
(8, 'Distributing dry rations to underprivileged families in Moratuwa', 'As the COVID-19 pandemic grows, many people in our society have become vulnerable and helpless. These people depended on their day\'s wages to put a meal on the dining table for their families.\r\n\r\nWith the purpose of saving and helping them, we are serving dry rations and other basic essentials to families in Moratuwa area who are unable to get them due to the nationwide quarantine.\r\n\r\nHow can you help?\r\n\r\nEvery contribution, no matter what amount, goes into preparing and distributing dry rations & other essential items for an underprivileged family.  \r\n\r\nWith this, you can help make sure a family survives to see another day without hunger.', 'pThumb866701936.jpeg', '2020-04-10 15:24:13'),
(9, 'Distributing dry rations to Hatton, Piliyandala & coastal areas of Moratuwa', 'The ongoing global pandemic is having a devastating impact on the underprivileged. With the islandwide quarantine and self-isolation, they are left with no source of employment and are struggling to feed their families. These people are now urgently in need of our help and we are aiming at providing dry ration to these families to help them get through these rough times.\r\n\r\nHow can you help?\r\n\r\nEvery contribution, no matter what amount, goes into  preparing and distributing dry rations and other basic essentials for an underprivileged family.\r\n\r\nWith this, you can help make sure a family survives to see another day without hunger.', 'pThumb1866801298.jpeg', '2020-04-13 03:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `causes_images`
--

CREATE TABLE `causes_images` (
  `id` int(11) NOT NULL,
  `cause_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `causes_images`
--

INSERT INTO `causes_images` (`id`, `cause_id`, `name`, `created`) VALUES
(1, 4, '060420286788435.jpg', '2020-04-06 10:05:20'),
(2, 5, '060420581600470.jpg', '2020-04-06 10:20:55'),
(3, 6, '060420460370505.jpg', '2020-04-06 10:42:05'),
(4, 7, '0604201536911795.jpg', '2020-04-06 10:46:02'),
(5, 2, '0704201124597031.jpg', '2020-04-07 05:45:32'),
(13, 2, '0904201903638246.jpeg', '2020-04-09 03:36:21'),
(7, 4, '070420878794241.jpg', '2020-04-07 05:51:11'),
(8, 4, '070420867791861.jpg', '2020-04-07 05:51:11'),
(9, 4, '070420529871901.jpg', '2020-04-07 05:51:11'),
(10, 4, '070420216154281.jpg', '2020-04-07 05:51:11'),
(11, 4, '0704201653746968.jpg', '2020-04-07 05:51:12'),
(12, 4, '0704201100963828.jpg', '2020-04-07 05:51:12'),
(14, 2, '0904201165944857.jpeg', '2020-04-09 03:36:21'),
(15, 2, '0904201110115322.jpeg', '2020-04-09 03:36:21'),
(16, 2, '0904201544112757.jpeg', '2020-04-09 03:36:21'),
(17, 8, '100420519583305.jpeg', '2020-04-10 15:26:49'),
(18, 8, '1004201457621571.jpeg', '2020-04-10 15:26:49'),
(19, 8, '1004201076778071.jpeg', '2020-04-10 15:26:49'),
(20, 8, '1004201989226312.jpeg', '2020-04-10 15:26:50'),
(21, 8, '1004201002443370.jpeg', '2020-04-10 15:26:50'),
(22, 8, '100420197465756.jpeg', '2020-04-10 15:26:50'),
(23, 8, '1004201250922651.jpeg', '2020-04-10 15:26:50'),
(24, 8, '100420286511651.jpeg', '2020-04-10 15:26:50'),
(25, 8, '100420197275872.jpeg', '2020-04-10 15:26:50'),
(26, 8, '1004202129188790.jpeg', '2020-04-10 15:26:51'),
(27, 8, '1004201013176308.jpeg', '2020-04-10 15:26:51'),
(28, 8, '100420428301351.jpeg', '2020-04-10 15:26:51'),
(29, 8, '1004201714877867.jpeg', '2020-04-10 15:26:52'),
(30, 8, '100420380952810.jpeg', '2020-04-10 15:26:52'),
(31, 8, '100420426771576.jpeg', '2020-04-10 15:26:52'),
(32, 8, '100420508289040.jpeg', '2020-04-10 15:26:52'),
(33, 8, '1004201766153862.jpeg', '2020-04-10 15:26:52'),
(34, 8, '1004201037284237.jpeg', '2020-04-10 15:26:52'),
(35, 9, '130420173169270.jpg', '2020-04-13 03:53:59'),
(36, 9, '1304201993423188.jpg', '2020-04-13 07:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `district_id`, `name`, `created`) VALUES
(2, 1, 'Akarawita', '0000-00-00 00:00:00'),
(3, 1, 'Akuregoda', '0000-00-00 00:00:00'),
(4, 1, 'Angoda', '0000-00-00 00:00:00'),
(5, 1, 'Athurugiriya', '0000-00-00 00:00:00'),
(6, 1, 'Avissawella', '0000-00-00 00:00:00'),
(7, 1, 'Batawala', '0000-00-00 00:00:00'),
(8, 1, 'Battaramulla', '0000-00-00 00:00:00'),
(9, 1, 'Batugampola', '0000-00-00 00:00:00'),
(10, 1, 'Bellanwila', '0000-00-00 00:00:00'),
(11, 1, 'Bokundara', '0000-00-00 00:00:00'),
(12, 1, 'Bope', '0000-00-00 00:00:00'),
(13, 1, 'Boralesgamuwa', '0000-00-00 00:00:00'),
(14, 1, 'Colombo 1', '0000-00-00 00:00:00'),
(15, 1, 'Colombo 2', '0000-00-00 00:00:00'),
(16, 1, 'Colombo 3', '0000-00-00 00:00:00'),
(17, 1, 'Colombo 4', '0000-00-00 00:00:00'),
(18, 1, 'Colombo 5', '0000-00-00 00:00:00'),
(19, 1, 'Colombo 6', '0000-00-00 00:00:00'),
(20, 1, 'Colombo 7', '0000-00-00 00:00:00'),
(21, 1, 'Colombo 8', '0000-00-00 00:00:00'),
(22, 1, 'Colombo 9', '0000-00-00 00:00:00'),
(23, 1, 'Colombo 10', '0000-00-00 00:00:00'),
(24, 1, 'Colombo 11', '0000-00-00 00:00:00'),
(25, 1, 'Colombo 12', '0000-00-00 00:00:00'),
(26, 1, 'Colombo 13', '0000-00-00 00:00:00'),
(27, 1, 'Colombo 14', '0000-00-00 00:00:00'),
(28, 1, 'Colombo 15', '0000-00-00 00:00:00'),
(29, 1, 'Dedigamuwa', '0000-00-00 00:00:00'),
(30, 1, 'Dehiwala', '0000-00-00 00:00:00'),
(31, 1, 'Deltara', '0000-00-00 00:00:00'),
(32, 1, 'Ethul Kotte', '0000-00-00 00:00:00'),
(33, 1, 'Gangodawilla', '0000-00-00 00:00:00'),
(34, 1, 'Godagama', '0000-00-00 00:00:00'),
(35, 1, 'Gonapola', '0000-00-00 00:00:00'),
(36, 1, 'Gothatuwa', '0000-00-00 00:00:00'),
(37, 1, 'Habarakada', '0000-00-00 00:00:00'),
(38, 1, 'Handapangoda', '0000-00-00 00:00:00'),
(39, 1, 'Hanwella', '0000-00-00 00:00:00'),
(40, 1, 'Hewainna', '0000-00-00 00:00:00'),
(41, 1, 'Hiripitya', '0000-00-00 00:00:00'),
(42, 1, 'Hokandara', '0000-00-00 00:00:00'),
(43, 1, 'Homagama', '0000-00-00 00:00:00'),
(44, 1, 'Horagala', '0000-00-00 00:00:00'),
(45, 1, 'Ingiriya', '0000-00-00 00:00:00'),
(46, 1, 'Jalthara', '0000-00-00 00:00:00'),
(47, 1, 'Kaduwela', '0000-00-00 00:00:00'),
(48, 1, 'Kahathuduwa', '0000-00-00 00:00:00'),
(49, 1, 'Kahawala', '0000-00-00 00:00:00'),
(50, 1, 'Kalatuwawa', '0000-00-00 00:00:00'),
(51, 1, 'Kaluaggala', '0000-00-00 00:00:00'),
(52, 1, 'Kalubowila', '0000-00-00 00:00:00'),
(53, 1, 'Katubedda', '0000-00-00 00:00:00'),
(54, 1, 'Kelaniya', '0000-00-00 00:00:00'),
(55, 1, 'Kesbewa', '0000-00-00 00:00:00'),
(56, 1, 'Kiriwattuduwa', '0000-00-00 00:00:00'),
(57, 1, 'Kohuwala', '0000-00-00 00:00:00'),
(58, 1, 'Kolonnawa', '0000-00-00 00:00:00'),
(59, 1, 'Kosgama', '0000-00-00 00:00:00'),
(60, 1, 'Koswatta', '0000-00-00 00:00:00'),
(61, 1, 'Kotikawatta', '0000-00-00 00:00:00'),
(62, 1, 'Kottawa', '0000-00-00 00:00:00'),
(63, 1, 'Kotte', '0000-00-00 00:00:00'),
(64, 1, 'Madapatha', '0000-00-00 00:00:00'),
(65, 1, 'Madiwela', '0000-00-00 00:00:00'),
(66, 1, 'Maharagama', '0000-00-00 00:00:00'),
(67, 1, 'Malabe', '0000-00-00 00:00:00'),
(68, 1, 'Maradana', '0000-00-00 00:00:00'),
(69, 1, 'Mattegoda', '0000-00-00 00:00:00'),
(70, 1, 'Meegoda', '0000-00-00 00:00:00'),
(71, 1, 'Meepe', '0000-00-00 00:00:00'),
(72, 1, 'Mirihana', '0000-00-00 00:00:00'),
(73, 1, 'Moragahahena', '0000-00-00 00:00:00'),
(74, 1, 'Moraketiya', '0000-00-00 00:00:00'),
(75, 1, 'Moratuwa', '0000-00-00 00:00:00'),
(76, 1, 'Mount Lavinia', '0000-00-00 00:00:00'),
(77, 1, 'Mullegama', '0000-00-00 00:00:00'),
(78, 1, 'Mulleriyawa', '0000-00-00 00:00:00'),
(79, 1, 'Napawela', '0000-00-00 00:00:00'),
(80, 1, 'Navagamuwa', '0000-00-00 00:00:00'),
(81, 1, 'Nawala', '0000-00-00 00:00:00'),
(82, 1, 'Nugegoda', '0000-00-00 00:00:00'),
(83, 1, 'Padukka', '0000-00-00 00:00:00'),
(84, 1, 'Pannipitiya', '0000-00-00 00:00:00'),
(85, 1, 'Pelawatta', '0000-00-00 00:00:00'),
(86, 1, 'Peliyagoda', '0000-00-00 00:00:00'),
(87, 1, 'Pepiliyana', '0000-00-00 00:00:00'),
(88, 1, 'Piliyandala', '0000-00-00 00:00:00'),
(89, 1, 'Pita Kotte', '0000-00-00 00:00:00'),
(90, 1, 'Pitipana ', '0000-00-00 00:00:00'),
(91, 1, 'Homagama', '0000-00-00 00:00:00'),
(92, 1, 'Polgasowita', '0000-00-00 00:00:00'),
(93, 1, 'Puwakpitiya', '0000-00-00 00:00:00'),
(94, 1, 'Rajagiriya', '0000-00-00 00:00:00'),
(95, 1, 'Ranala', '0000-00-00 00:00:00'),
(96, 1, 'Ratmalana', '0000-00-00 00:00:00'),
(97, 1, 'Siddamulla', '0000-00-00 00:00:00'),
(98, 1, 'Sri Jayawardenapura Kotte', '0000-00-00 00:00:00'),
(99, 1, 'Talawatugoda', '0000-00-00 00:00:00'),
(100, 1, 'Thalapathpitiya', '0000-00-00 00:00:00'),
(101, 1, 'Thimbirigasyaya', '0000-00-00 00:00:00'),
(102, 1, 'Thummodara', '0000-00-00 00:00:00'),
(103, 1, 'Waga', '0000-00-00 00:00:00'),
(104, 1, 'Watareka', '0000-00-00 00:00:00'),
(105, 1, 'Weliwita', '0000-00-00 00:00:00'),
(106, 1, 'Wellampitiya', '0000-00-00 00:00:00'),
(107, 1, 'Wellawatte', '0000-00-00 00:00:00'),
(108, 1, 'Akurana', '0000-00-00 00:00:00'),
(109, 1, 'Aladeniya', '0000-00-00 00:00:00'),
(110, 1, 'Alawatugoda', '0000-00-00 00:00:00'),
(111, 1, 'Aludeniya', '0000-00-00 00:00:00'),
(112, 1, 'Ambagahapelessa', '0000-00-00 00:00:00'),
(113, 1, 'Ambatenna', '0000-00-00 00:00:00'),
(114, 1, 'Ampitiya', '0000-00-00 00:00:00'),
(115, 1, 'Aniwatta', '0000-00-00 00:00:00'),
(116, 1, 'Ankumbura', '0000-00-00 00:00:00'),
(117, 1, 'Asgiriya', '0000-00-00 00:00:00'),
(118, 1, 'Atabage', '0000-00-00 00:00:00'),
(119, 1, 'Balagolla', '0000-00-00 00:00:00'),
(120, 1, 'Balana', '0000-00-00 00:00:00'),
(121, 1, 'Bambaragahaela', '0000-00-00 00:00:00'),
(122, 1, 'Barawardhana Oya', '0000-00-00 00:00:00'),
(123, 1, 'Batagolladeniya', '0000-00-00 00:00:00'),
(124, 1, 'Batugoda', '0000-00-00 00:00:00'),
(125, 1, 'Batumulla', '0000-00-00 00:00:00'),
(126, 1, 'Bawlana', '0000-00-00 00:00:00'),
(127, 1, 'Bopana', '0000-00-00 00:00:00'),
(128, 1, 'Dangolla', '0000-00-00 00:00:00'),
(129, 1, 'Danture', '0000-00-00 00:00:00'),
(130, 1, 'Dedunupitiya', '0000-00-00 00:00:00'),
(131, 1, 'Dekinda', '0000-00-00 00:00:00'),
(132, 1, 'Deltota', '0000-00-00 00:00:00'),
(133, 1, 'Digana', '0000-00-00 00:00:00'),
(134, 1, 'Dodanwala', '0000-00-00 00:00:00'),
(135, 1, 'Dolapihilla', '0000-00-00 00:00:00'),
(136, 1, 'Dolosbage', '0000-00-00 00:00:00'),
(137, 1, 'Doluwa', '0000-00-00 00:00:00'),
(138, 1, 'Doragamuwa', '0000-00-00 00:00:00'),
(139, 1, 'Dunuwila', '0000-00-00 00:00:00'),
(140, 1, 'Ekiriya', '0000-00-00 00:00:00'),
(141, 1, 'Elamulla', '0000-00-00 00:00:00'),
(142, 1, 'Etulgama', '0000-00-00 00:00:00'),
(143, 1, 'Galaboda', '0000-00-00 00:00:00'),
(144, 1, 'Galagedara', '0000-00-00 00:00:00'),
(145, 1, 'Galaha', '0000-00-00 00:00:00'),
(146, 1, 'Galhinna', '0000-00-00 00:00:00'),
(147, 1, 'Gallellagama', '0000-00-00 00:00:00'),
(148, 1, 'Gampola', '0000-00-00 00:00:00'),
(149, 1, 'Ganga Ihala Korale', '0000-00-00 00:00:00'),
(150, 1, 'Gangawata Korale', '0000-00-00 00:00:00'),
(151, 1, 'Gelioya', '0000-00-00 00:00:00'),
(152, 1, 'Godamunna', '0000-00-00 00:00:00'),
(153, 1, 'Gomagoda', '0000-00-00 00:00:00'),
(154, 1, 'Gonagantenna', '0000-00-00 00:00:00'),
(155, 1, 'Gonawalapatana', '0000-00-00 00:00:00'),
(156, 1, 'Gunnepana', '0000-00-00 00:00:00'),
(157, 1, 'Gurudeniya', '0000-00-00 00:00:00'),
(158, 1, 'Halloluwa', '0000-00-00 00:00:00'),
(159, 1, 'Handaganawa', '0000-00-00 00:00:00'),
(160, 1, 'Handawalapitiya', '0000-00-00 00:00:00'),
(161, 1, 'Handessa', '0000-00-00 00:00:00'),
(162, 1, 'Hanguranketha', '0000-00-00 00:00:00'),
(163, 1, 'Hantane', '0000-00-00 00:00:00'),
(164, 1, 'Haragama', '0000-00-00 00:00:00'),
(165, 1, 'Harankahawa', '0000-00-00 00:00:00'),
(166, 1, 'Harispattuwa', '0000-00-00 00:00:00'),
(167, 1, 'Hasalaka', '0000-00-00 00:00:00'),
(168, 1, 'Hataraliyadda', '0000-00-00 00:00:00'),
(169, 1, 'Heerassagala', '0000-00-00 00:00:00'),
(170, 1, 'Hewaheta', '0000-00-00 00:00:00'),
(171, 1, 'Hindagala', '0000-00-00 00:00:00'),
(172, 1, 'Hondiyadeniya', '0000-00-00 00:00:00'),
(173, 1, 'Hunnasgiriya', '0000-00-00 00:00:00'),
(174, 1, 'Ihala Kobbekaduwa', '0000-00-00 00:00:00'),
(175, 1, 'Illagolla', '0000-00-00 00:00:00'),
(176, 1, 'Jambugahapitiya', '0000-00-00 00:00:00'),
(177, 1, 'Kadugannawa', '0000-00-00 00:00:00'),
(178, 1, 'Kahataliyadda', '0000-00-00 00:00:00'),
(179, 1, 'Kalugala', '0000-00-00 00:00:00'),
(180, 1, 'Kandy', '0000-00-00 00:00:00'),
(181, 1, 'Kapuliyadde', '0000-00-00 00:00:00'),
(182, 1, 'Karandagolla', '0000-00-00 00:00:00'),
(183, 1, 'Katugastota', '0000-00-00 00:00:00'),
(184, 1, 'Kengalla', '0000-00-00 00:00:00'),
(185, 1, 'Ketakumbura', '0000-00-00 00:00:00'),
(186, 1, 'Ketawala Leula', '0000-00-00 00:00:00'),
(187, 1, 'Kiribathkumbura', '0000-00-00 00:00:00'),
(188, 1, 'Kobonila', '0000-00-00 00:00:00'),
(189, 1, 'Kolabissa', '0000-00-00 00:00:00'),
(190, 1, 'Kolongoda', '0000-00-00 00:00:00'),
(191, 1, 'Kulugammana', '0000-00-00 00:00:00'),
(192, 1, 'Kumbukkandura', '0000-00-00 00:00:00'),
(193, 1, 'Kumburegama', '0000-00-00 00:00:00'),
(194, 1, 'Kundasale', '0000-00-00 00:00:00'),
(195, 1, 'Leemagahakotuwa', '0000-00-00 00:00:00'),
(196, 1, 'Lewella', '0000-00-00 00:00:00'),
(197, 1, 'Lunuketiya Maditta', '0000-00-00 00:00:00'),
(198, 1, 'Madawala Bazaar', '0000-00-00 00:00:00'),
(199, 1, 'Madugalla', '0000-00-00 00:00:00'),
(200, 1, 'Madulkele', '0000-00-00 00:00:00'),
(201, 1, 'Mahadoraliyadda', '0000-00-00 00:00:00'),
(202, 1, 'Mahakanda', '0000-00-00 00:00:00'),
(203, 1, 'Mahamedagama', '0000-00-00 00:00:00'),
(204, 1, 'Mailapitiya', '0000-00-00 00:00:00'),
(205, 1, 'Makkanigama', '0000-00-00 00:00:00'),
(206, 1, 'Makuldeniya', '0000-00-00 00:00:00'),
(207, 1, 'Mandaram Nuwara', '0000-00-00 00:00:00'),
(208, 1, 'Mapakanda', '0000-00-00 00:00:00'),
(209, 1, 'Marassana', '0000-00-00 00:00:00'),
(210, 1, 'Marymount Colony', '0000-00-00 00:00:00'),
(211, 1, 'Maturata', '0000-00-00 00:00:00'),
(212, 1, 'Mawatura', '0000-00-00 00:00:00'),
(213, 1, 'Mawilmada', '0000-00-00 00:00:00'),
(214, 1, 'Medadumbara', '0000-00-00 00:00:00'),
(215, 1, 'Medamahanuwara', '0000-00-00 00:00:00'),
(216, 1, 'Medawala Harispattuwa', '0000-00-00 00:00:00'),
(217, 1, 'Meetalawa', '0000-00-00 00:00:00'),
(218, 1, 'Megoda Kalugamuwa', '0000-00-00 00:00:00'),
(219, 1, 'Menikdiwela', '0000-00-00 00:00:00'),
(220, 1, 'Menikhinna', '0000-00-00 00:00:00'),
(221, 1, 'Mimure', '0000-00-00 00:00:00'),
(222, 1, 'Minigamuwa', '0000-00-00 00:00:00'),
(223, 1, 'Minipe', '0000-00-00 00:00:00'),
(224, 1, 'Murutalawa', '0000-00-00 00:00:00'),
(225, 1, 'Muruthagahamulla', '0000-00-00 00:00:00'),
(226, 1, 'Naranpanawa', '0000-00-00 00:00:00'),
(227, 1, 'Nattarampotha', '0000-00-00 00:00:00'),
(228, 1, 'Nawalapitiya', '0000-00-00 00:00:00'),
(229, 1, 'Nillambe', '0000-00-00 00:00:00'),
(230, 1, 'Nugaliyadda', '0000-00-00 00:00:00'),
(231, 1, 'Nugawela', '0000-00-00 00:00:00'),
(232, 1, 'Pallebowala', '0000-00-00 00:00:00'),
(233, 1, 'Pallekelle', '0000-00-00 00:00:00'),
(234, 1, 'Pallekotuwa', '0000-00-00 00:00:00'),
(235, 1, 'Panvila', '0000-00-00 00:00:00'),
(236, 1, 'Panwilatenna', '0000-00-00 00:00:00'),
(237, 1, 'Paradeka', '0000-00-00 00:00:00'),
(238, 1, 'Pasbage', '0000-00-00 00:00:00'),
(239, 1, 'Pathadumbara', '0000-00-00 00:00:00'),
(240, 1, 'Pathahewaheta', '0000-00-00 00:00:00'),
(241, 1, 'Pattitalawa', '0000-00-00 00:00:00'),
(242, 1, 'Pattiya Watta', '0000-00-00 00:00:00'),
(243, 1, 'Peradeniya', '0000-00-00 00:00:00'),
(244, 1, 'Pilawala', '0000-00-00 00:00:00'),
(245, 1, 'Pilimatalawa', '0000-00-00 00:00:00'),
(246, 1, 'Poholiyadda', '0000-00-00 00:00:00'),
(247, 1, 'Polgolla', '0000-00-00 00:00:00'),
(248, 1, 'Pujapitiya', '0000-00-00 00:00:00'),
(249, 1, 'Pupuressa', '0000-00-00 00:00:00'),
(250, 1, 'Pussellawa', '0000-00-00 00:00:00'),
(251, 1, 'Putuhapuwa', '0000-00-00 00:00:00'),
(252, 1, 'Rajawella', '0000-00-00 00:00:00'),
(253, 1, 'Rambukpitiya', '0000-00-00 00:00:00'),
(254, 1, 'Rambukwella', '0000-00-00 00:00:00'),
(255, 1, 'Rangala', '0000-00-00 00:00:00'),
(256, 1, 'Rantembe', '0000-00-00 00:00:00'),
(257, 1, 'Rathukohodigala', '0000-00-00 00:00:00'),
(258, 1, 'Rikillagaskada', '0000-00-00 00:00:00'),
(259, 1, 'Sangarajapura', '0000-00-00 00:00:00'),
(260, 1, 'Senarathwela', '0000-00-00 00:00:00'),
(261, 1, 'Talatuoya', '0000-00-00 00:00:00'),
(262, 1, 'Tawalantenna', '0000-00-00 00:00:00'),
(263, 1, 'Teldeniya', '0000-00-00 00:00:00'),
(264, 1, 'Tennekumbura', '0000-00-00 00:00:00'),
(265, 1, 'Thumpane', '0000-00-00 00:00:00'),
(266, 1, 'Uda Peradeniya', '0000-00-00 00:00:00'),
(267, 1, 'Uda Talawinna', '0000-00-00 00:00:00'),
(268, 1, 'Udadumbara', '0000-00-00 00:00:00'),
(269, 1, 'Udahentenna', '0000-00-00 00:00:00'),
(270, 1, 'Udahingulwala', '0000-00-00 00:00:00'),
(271, 1, 'Udapalatha', '0000-00-00 00:00:00'),
(272, 1, 'Udawatta', '0000-00-00 00:00:00'),
(273, 1, 'Udispattuwa', '0000-00-00 00:00:00'),
(274, 1, 'Ududumbara', '0000-00-00 00:00:00'),
(275, 1, 'Udunuwara', '0000-00-00 00:00:00'),
(276, 1, 'Uduwa', '0000-00-00 00:00:00'),
(277, 1, 'Uduwahinna', '0000-00-00 00:00:00'),
(278, 1, 'Uduwela', '0000-00-00 00:00:00'),
(279, 1, 'Ulapane', '0000-00-00 00:00:00'),
(280, 1, 'Ulpothagama', '0000-00-00 00:00:00'),
(281, 1, 'Unuwinna', '0000-00-00 00:00:00'),
(282, 1, 'Velamboda', '0000-00-00 00:00:00'),
(283, 1, 'Watagoda Harispattuwa', '0000-00-00 00:00:00'),
(284, 1, 'Watapuluwa', '0000-00-00 00:00:00'),
(285, 1, 'Wattappola', '0000-00-00 00:00:00'),
(286, 1, 'Wattegama', '0000-00-00 00:00:00'),
(287, 1, 'Weligalla', '0000-00-00 00:00:00'),
(288, 1, 'Weligampola', '0000-00-00 00:00:00'),
(289, 1, 'Wendaruwa', '0000-00-00 00:00:00'),
(290, 1, 'Weragantota', '0000-00-00 00:00:00'),
(291, 1, 'Werapitiya', '0000-00-00 00:00:00'),
(292, 1, 'Werellagama', '0000-00-00 00:00:00'),
(293, 1, 'Wettawa', '0000-00-00 00:00:00'),
(294, 1, 'Wilanagama', '0000-00-00 00:00:00'),
(295, 1, 'Yahalatenna', '0000-00-00 00:00:00'),
(296, 1, 'Yatihalagala', '0000-00-00 00:00:00'),
(297, 1, 'Yatinuwara', '0000-00-00 00:00:00'),
(298, 1, 'Agaliya', '0000-00-00 00:00:00'),
(299, 1, 'Ahangama', '0000-00-00 00:00:00'),
(300, 1, 'Ahungalla', '0000-00-00 00:00:00'),
(301, 1, 'Akmeemana', '0000-00-00 00:00:00'),
(302, 1, 'Aluthwala', '0000-00-00 00:00:00'),
(303, 1, 'Ambalangoda', '0000-00-00 00:00:00'),
(304, 1, 'Ampegama', '0000-00-00 00:00:00'),
(305, 1, 'Amugoda', '0000-00-00 00:00:00'),
(306, 1, 'Anangoda', '0000-00-00 00:00:00'),
(307, 1, 'Angulugaha', '0000-00-00 00:00:00'),
(308, 1, 'Ankokkawala', '0000-00-00 00:00:00'),
(309, 1, 'Baddegama', '0000-00-00 00:00:00'),
(310, 1, 'Balapitiya', '0000-00-00 00:00:00'),
(311, 1, 'Banagala', '0000-00-00 00:00:00'),
(312, 1, 'Batapola', '0000-00-00 00:00:00'),
(313, 1, 'Bentota', '0000-00-00 00:00:00'),
(314, 1, 'Boossa', '0000-00-00 00:00:00'),
(315, 1, 'Bope-Poddala', '0000-00-00 00:00:00'),
(316, 1, 'Dikkumbura', '0000-00-00 00:00:00'),
(317, 1, 'Dodanduwa', '0000-00-00 00:00:00'),
(318, 1, 'Ella Tanabaddegama', '0000-00-00 00:00:00'),
(319, 1, 'Elpitiya', '0000-00-00 00:00:00'),
(320, 1, 'Ethkandura', '0000-00-00 00:00:00'),
(321, 1, 'Galle', '0000-00-00 00:00:00'),
(322, 1, 'Ganegoda', '0000-00-00 00:00:00'),
(323, 1, 'Ginimellagaha', '0000-00-00 00:00:00'),
(324, 1, 'Gintota', '0000-00-00 00:00:00'),
(325, 1, 'Godahena', '0000-00-00 00:00:00'),
(326, 1, 'Gonagalpura', '0000-00-00 00:00:00'),
(327, 1, 'Gonamulla Junction', '0000-00-00 00:00:00'),
(328, 1, 'Gonapinuwala', '0000-00-00 00:00:00'),
(329, 1, 'Habaraduwa', '0000-00-00 00:00:00'),
(330, 1, 'Haburugala', '0000-00-00 00:00:00'),
(331, 1, 'Halvitigala Colony', '0000-00-00 00:00:00'),
(332, 1, 'Hapugala', '0000-00-00 00:00:00'),
(333, 1, 'Hawpe', '0000-00-00 00:00:00'),
(334, 1, 'Hikkaduwa', '0000-00-00 00:00:00'),
(335, 1, 'Hinatigala', '0000-00-00 00:00:00'),
(336, 1, 'Hiniduma', '0000-00-00 00:00:00'),
(337, 1, 'Hiyare', '0000-00-00 00:00:00'),
(338, 1, 'Ihala Walpola', '0000-00-00 00:00:00'),
(339, 1, 'Ihalahewessa', '0000-00-00 00:00:00'),
(340, 1, 'Imaduwa', '0000-00-00 00:00:00'),
(341, 1, 'Induruwa', '0000-00-00 00:00:00'),
(342, 1, 'Kahaduwa', '0000-00-00 00:00:00'),
(343, 1, 'Kahawa', '0000-00-00 00:00:00'),
(344, 1, 'Kananke Bazaar', '0000-00-00 00:00:00'),
(345, 1, 'Karagoda', '0000-00-00 00:00:00'),
(346, 1, 'Karandeniya', '0000-00-00 00:00:00'),
(347, 1, 'Karapitiya', '0000-00-00 00:00:00'),
(348, 1, 'Koggala', '0000-00-00 00:00:00'),
(349, 1, 'Kosgoda', '0000-00-00 00:00:00'),
(350, 1, 'Kottawagama', '0000-00-00 00:00:00'),
(351, 1, 'Kuleegoda', '0000-00-00 00:00:00'),
(352, 1, 'Magedara', '0000-00-00 00:00:00'),
(353, 1, 'Malgalla Talangalla', '0000-00-00 00:00:00'),
(354, 1, 'Mapalagama', '0000-00-00 00:00:00'),
(355, 1, 'Mapalagama Central', '0000-00-00 00:00:00'),
(356, 1, 'Mattaka', '0000-00-00 00:00:00'),
(357, 1, 'Meda-Keembiya', '0000-00-00 00:00:00'),
(358, 1, 'Meetiyagoda', '0000-00-00 00:00:00'),
(359, 1, 'Nagoda', '0000-00-00 00:00:00'),
(360, 1, 'Nakiyadeniya', '0000-00-00 00:00:00'),
(361, 1, 'Nawadagala', '0000-00-00 00:00:00'),
(362, 1, 'Neluwa', '0000-00-00 00:00:00'),
(363, 1, 'Nindana', '0000-00-00 00:00:00'),
(364, 1, 'Niyagama', '0000-00-00 00:00:00'),
(365, 1, 'Opatha', '0000-00-00 00:00:00'),
(366, 1, 'Panangala', '0000-00-00 00:00:00'),
(367, 1, 'Pannimulla Panagoda', '0000-00-00 00:00:00'),
(368, 1, 'Parana Thanayamgoda', '0000-00-00 00:00:00'),
(369, 1, 'Pitigala', '0000-00-00 00:00:00'),
(370, 1, 'Poddala', '0000-00-00 00:00:00'),
(371, 1, 'Porawagama', '0000-00-00 00:00:00'),
(372, 1, 'Rantotuwila', '0000-00-00 00:00:00'),
(373, 1, 'Ratgama', '0000-00-00 00:00:00'),
(374, 1, 'Talagampola', '0000-00-00 00:00:00'),
(375, 1, 'Talgaspe', '0000-00-00 00:00:00'),
(376, 1, 'Talgaswela', '0000-00-00 00:00:00'),
(377, 1, 'Talpe', '0000-00-00 00:00:00'),
(378, 1, 'Tawalama', '0000-00-00 00:00:00'),
(379, 1, 'Tiranagama', '0000-00-00 00:00:00'),
(380, 1, 'Udalamatta', '0000-00-00 00:00:00'),
(381, 1, 'Udugama', '0000-00-00 00:00:00'),
(382, 1, 'Uluvitike', '0000-00-00 00:00:00'),
(383, 1, 'Unawatuna', '0000-00-00 00:00:00'),
(384, 1, 'Unenwitiya', '0000-00-00 00:00:00'),
(385, 1, 'Uragaha', '0000-00-00 00:00:00'),
(386, 1, 'Uragasmanhandiya', '0000-00-00 00:00:00'),
(387, 1, 'Wakwella', '0000-00-00 00:00:00'),
(388, 1, 'Walahanduwa', '0000-00-00 00:00:00'),
(389, 1, 'Wanchawela', '0000-00-00 00:00:00'),
(390, 1, 'Wanduramba', '0000-00-00 00:00:00'),
(391, 1, 'Warukandeniya', '0000-00-00 00:00:00'),
(392, 1, 'Watugedara', '0000-00-00 00:00:00'),
(393, 1, 'Weihena', '0000-00-00 00:00:00'),
(394, 1, 'Welivitiya-Divithura', '0000-00-00 00:00:00'),
(395, 1, 'Yakkalamulla', '0000-00-00 00:00:00'),
(396, 1, 'Yatalamatta', '0000-00-00 00:00:00'),
(397, 1, 'Adalaichenai', '0000-00-00 00:00:00'),
(398, 1, 'Akkarepattu', '0000-00-00 00:00:00'),
(399, 1, 'Alayadiwembu', '0000-00-00 00:00:00'),
(400, 1, 'Ampara', '0000-00-00 00:00:00'),
(401, 1, 'Bakmitiyawa', '0000-00-00 00:00:00'),
(402, 1, 'Central Camp', '0000-00-00 00:00:00'),
(403, 1, 'Dadayamtalawa', '0000-00-00 00:00:00'),
(404, 1, 'Damana', '0000-00-00 00:00:00'),
(405, 1, 'Damanewela', '0000-00-00 00:00:00'),
(406, 1, 'Deegawapiya', '0000-00-00 00:00:00'),
(407, 1, 'Dehiattakandiya', '0000-00-00 00:00:00'),
(408, 1, 'Devalahinda', '0000-00-00 00:00:00'),
(409, 1, 'Digamadulla Weeragoda', '0000-00-00 00:00:00'),
(410, 1, 'Dorakumbura', '0000-00-00 00:00:00'),
(411, 1, 'Eragama', '0000-00-00 00:00:00'),
(412, 1, 'Galapitagala', '0000-00-00 00:00:00'),
(413, 1, 'Gonagolla', '0000-00-00 00:00:00'),
(414, 1, 'Hingurana', '0000-00-00 00:00:00'),
(415, 1, 'Hulannuge', '0000-00-00 00:00:00'),
(416, 1, 'Imkkamam', '0000-00-00 00:00:00'),
(417, 1, 'Kalmunai', '0000-00-00 00:00:00'),
(418, 1, 'Kannakipuram', '0000-00-00 00:00:00'),
(419, 1, 'Karativu', '0000-00-00 00:00:00'),
(420, 1, 'Kekirihena', '0000-00-00 00:00:00'),
(421, 1, 'Koknahara', '0000-00-00 00:00:00'),
(422, 1, 'Kolamanthalawa', '0000-00-00 00:00:00'),
(423, 1, 'Komari', '0000-00-00 00:00:00'),
(424, 1, 'Lahugala', '0000-00-00 00:00:00'),
(425, 1, 'Madawalalanda', '0000-00-00 00:00:00'),
(426, 1, 'Mahanagapura', '0000-00-00 00:00:00'),
(427, 1, 'Mahaoya', '0000-00-00 00:00:00'),
(428, 1, 'Malwatta', '0000-00-00 00:00:00'),
(429, 1, 'Mangalagama', '0000-00-00 00:00:00'),
(430, 1, 'Marathamune', '0000-00-00 00:00:00'),
(431, 1, 'Mawanagama', '0000-00-00 00:00:00'),
(432, 1, 'Moragahapallama', '0000-00-00 00:00:00'),
(433, 1, 'Namal Oya', '0000-00-00 00:00:00'),
(434, 1, 'Navithanveli', '0000-00-00 00:00:00'),
(435, 1, 'Nawamedagama', '0000-00-00 00:00:00'),
(436, 1, 'Nintavur', '0000-00-00 00:00:00'),
(437, 1, 'Oluvil', '0000-00-00 00:00:00'),
(438, 1, 'Padiyatalawa', '0000-00-00 00:00:00'),
(439, 1, 'Pahalalanda', '0000-00-00 00:00:00'),
(440, 1, 'Palamunai', '0000-00-00 00:00:00'),
(441, 1, 'Panama', '0000-00-00 00:00:00'),
(442, 1, 'Pannalagama', '0000-00-00 00:00:00'),
(443, 1, 'Paragahakele', '0000-00-00 00:00:00'),
(444, 1, 'Periyaneelavanai', '0000-00-00 00:00:00'),
(445, 1, 'Polwaga Janapadaya', '0000-00-00 00:00:00'),
(446, 1, 'Pottuvil', '0000-00-00 00:00:00'),
(447, 1, 'Rajagalatenna', '0000-00-00 00:00:00'),
(448, 1, 'Sainthamaruthu', '0000-00-00 00:00:00'),
(449, 1, 'Samanthurai', '0000-00-00 00:00:00'),
(450, 1, 'Serankada', '0000-00-00 00:00:00'),
(451, 1, 'Siripura', '0000-00-00 00:00:00'),
(452, 1, 'Siyambalawewa', '0000-00-00 00:00:00'),
(453, 1, 'Tempitiya', '0000-00-00 00:00:00'),
(454, 1, 'Thambiluvil', '0000-00-00 00:00:00'),
(455, 1, 'Tirukovil', '0000-00-00 00:00:00'),
(456, 1, 'Uhana', '0000-00-00 00:00:00'),
(457, 1, 'Wadinagala', '0000-00-00 00:00:00'),
(458, 1, 'Wanagamuwa', '0000-00-00 00:00:00'),
(459, 1, 'Werunketagoda', '0000-00-00 00:00:00'),
(460, 1, 'Borella', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created`) VALUES
(1, 'Colombo', '2020-04-01 15:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `donation_request`
--

CREATE TABLE `donation_request` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `item` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_request`
--

INSERT INTO `donation_request` (`id`, `name`, `item`, `email`, `phone`, `created`) VALUES
(1, 'sajeevan', 'Mask, ', 'sajisajeevan007@gmail.com', '8768698', '2020-03-21 03:25:39'),
(2, 'Vichakshana Padmaperuma', 'Dry Rations, ', 'vichakshananc@gmail.com', '0715162549', '2020-03-27 18:20:50'),
(3, 'Shannon Martin', 'Dry Rations, ', 'shanxjag@gmail.com', '+61466811360', '2020-04-02 09:29:31'),
(4, 'layla savage', 'Mask, Sanitizer, ', 'laylasavage.gm.127983170@gcheck.xyz', '+74951374699', '2020-04-11 12:32:44'),
(5, 'layla savage', 'DryRations, ', 'laylasavage.gm.127983170@gcheck.xyz', '+74951374699', '2020-04-11 12:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `kits_request`
--

CREATE TABLE `kits_request` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `item` varchar(100) NOT NULL,
  `reference_no` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kits_request`
--

INSERT INTO `kits_request` (`id`, `name`, `email`, `phone`, `item`, `reference_no`, `created`) VALUES
(1, 'sajeevan', 'sajisajeevan007@gmail.com', '8768698', 'Masks & Sanitizer, ', 'RQST-2081388986', '2020-03-21 03:25:18'),
(2, 'Eugene Perera ', 'thanu.nashika97@gmail.com', '0112715329', 'Masks & Sanitizer, ', 'RQST-2075854884', '2020-03-27 18:21:04'),
(3, 'Zuhair Ali ', 'info@unvsl.org', '778191787', 'Masks & Sanitizer, ', 'RQST-1865788989', '2020-03-28 04:00:49'),
(4, 'Ayesh Nipun', 'nipun.yesh@gmail.com', '+94773269713', 'Masks & Sanitizer, ', 'RQST-1899613889', '2020-03-28 07:16:49'),
(5, 'Ayyash', 'ayyashnem60@gmail.com', '0766476554', 'Masks & Sanitizer, ', 'RQST-1183330275', '2020-03-28 18:04:02'),
(6, 'Nilmini Dahanayake', 'ansdahanayake@gmail.com', '0779913725', 'Masks & Sanitizer, ', 'RQST-1925525872', '2020-03-30 09:42:16'),
(7, 'ravindu nayanajith', 'ravindunayanajith98@gmail.com', '0773498865', 'Masks & Sanitizer, ', 'RQST-894104716', '2020-03-30 14:12:19'),
(8, 'Rusaid Ahamed', 'rusaidahamed@gmail.com', '0777337678', 'Masks & Sanitizer, ', 'RQST-1129385183', '2020-03-31 23:04:23'),
(9, 'Fayas ', 'fayasfazee77@gmail.com', '0771918147 ', 'Masks & Sanitizer, ', 'RQST-1706063584', '2020-04-01 02:15:21'),
(10, 'Ijaas Ahamed', 'ijaas1996@gmail.com', '0757479518', 'Masks & Sanitizer, ', 'RQST-1090581538', '2020-04-01 02:56:40'),
(11, 'M.L.M. Lafran', 'Lafeerlafran@gmail.com', '+94779432191', 'Masks & Sanitizer, ', 'RQST-2067693098', '2020-04-01 03:26:03'),
(12, 'layla savage', 'laylasavage.gm.127983170@gcheck.xyz', '+74951374699', 'Masks&Sanitizer, ', 'RQST-983231259', '2020-04-11 12:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `r_key` varchar(255) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `created`, `r_key`, `ip_address`, `user_agent`, `expiry_date`) VALUES
(1, 3, '2020-03-28 16:53:29', '$2y$10$X5LHoJUlQrhVaXZjirut.OZ6TtjCVgt8ts7HGIZsEz8eVCbNRCyqO', '61.245.161.26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '2020-04-07'),
(2, 6, '2020-03-29 05:34:09', '$2y$10$hAlCGlnG2tOqER3k75uX3.rmRkUMXmSTIuBUcg/WB6424WdTrl3nq', '43.250.243.113', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '2020-04-08'),
(3, 6, '2020-03-29 05:34:47', '$2y$10$6XKFzEmC6wit2OAi6T1JD.JymEfesppmFeT76M1pY0X8zvLH6kocu', '112.134.195.69', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.2 Safari/605.1.15', '2020-04-08'),
(4, 3, '2020-03-30 09:22:47', '$2y$10$kzw/l/IOfjLGtVCBjFNd6eW0hkchrqqK/F2t6ugC/yZVfHSgtCIBO', '43.250.240.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '2020-04-09'),
(5, 3, '2020-03-30 09:23:09', '$2y$10$YNG9rxff/8Z9y5HevACvveilg/PzJV2nv1Sq7ToOAw7x6tBegh65i', '43.250.240.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '2020-04-09'),
(6, 3, '2020-04-01 15:18:42', '$2y$10$j3dkMCnDSHlPqYNlJsKEOehn0tbcSOMJ2d.FbJv8cc7YFoG.YIvFa', '43.250.240.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '2020-04-11'),
(7, 3, '2020-04-03 13:49:11', '$2y$10$Nc7ZiZdl6ooJ/tKj.3AQiubd3QWkax.X6THo3fP3ZpHQdUQC0xioO', '61.245.161.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '2020-04-13'),
(8, 6, '2020-04-04 09:38:36', '$2y$10$C6Q3yb/lAUNTmfQiyAe6Wefq57PNZs/aKdZqtw3txKQkXNpBeYiI.', '123.231.87.115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '2020-04-14'),
(9, 6, '2020-04-04 09:42:03', '$2y$10$NxOJz8id/K9OZA4vd7BWEu7PXGYaEw3YPjUNPduc3LDFMQiKLMIBS', '61.245.169.235', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '2020-04-14'),
(10, 6, '2020-04-04 09:43:44', '$2y$10$WAONslXGwRapIh3j5atOHOFnu36AAKZ8B31AGk8regN5.TYB9GsMa', '123.231.87.115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '2020-04-14'),
(11, 6, '2020-04-06 09:59:04', '$2y$10$PjzQ.4usH612Xggmv.1BI.i3YSLLaJLJh6J1o4Br.SikDS3vnNOZe', '112.134.222.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '2020-04-16'),
(12, 6, '2020-04-07 05:39:35', '$2y$10$7R7BNOgNECMtyACiqE0xR.iqLF3OvS8wQS8biudpY66IjsSVO4AKW', '112.134.221.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '2020-04-17'),
(13, 6, '2020-04-08 06:21:28', '$2y$10$jyKAWDkCC5tPhcWKXTAcjO/28S/XiPZrjiyxIm80n31HHTOfmoBE6', '123.231.109.160', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '2020-04-18'),
(14, 3, '2020-04-08 12:26:24', '$2y$10$2mQX8vZoCBi2Noe2.Y/ROOYYleSS36CrN5Z6dcbbubZDVnt/UzCq2', '43.250.241.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '2020-04-18'),
(15, 6, '2020-04-09 03:33:21', '$2y$10$oeqEjF.UkAOwlt9E0lEoVuxVur6ZhklAxcQWUIZpiuZ4KD9KI8YX2', '112.134.217.179', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '2020-04-19'),
(16, 6, '2020-04-10 05:12:53', '$2y$10$GWJNEw.fgQaGUmQcwrino.txeUn/8b2zH5y8XEoKZHuLelNCumIju', '123.231.84.42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '2020-04-20'),
(17, 3, '2020-04-10 15:16:16', '$2y$10$yC1LaTMGm0Y9a5ejuHqnNuNKwY4vfy6rTwjnzk6sbCup/MW5JBgy6', '61.245.169.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '2020-04-20'),
(18, 6, '2020-04-10 15:23:22', '$2y$10$0f9CWW.DvjaM8XnyTqk0puRgfklsIvhnjUwYMqBgvc0OOOXailN9a', '175.157.252.247', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '2020-04-20'),
(19, 6, '2020-04-13 03:20:58', '$2y$10$l0Un2jqa.tAVzADUK8T5ve3qwQtEzOSvQGbYc9oDv96CsYXQWDaHq', '123.231.125.240', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '2020-04-23'),
(20, 6, '2020-04-13 03:48:25', '$2y$10$yRZAKsSjOnJ113uuU9ISMOOUL2kuX1DKfFtSPsh9A5uSzZCgLauui', '175.157.52.164', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '2020-04-23'),
(21, 6, '2020-04-13 03:52:03', '$2y$10$REfWXkV9SNJkJaR4NVFWUerv0CUbOVa2P9HiyJyrUoM6JINVChsZ.', '175.157.52.164', 'Mozilla/5.0 (Linux; Android 9; JKM-LX2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', '2020-04-23'),
(22, 6, '2020-04-13 04:04:52', '$2y$10$UjZ1QyggCkoGRr.Gq5sGFe1c6fpCy7UZmKOL4XWtLyN6j4igd7EZy', '175.157.52.164', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '2020-04-23'),
(23, 6, '2020-04-13 04:52:17', '$2y$10$7G/QwwB7XLbfh/A1xPAeruslG2U2BUQS5BT44RApobOE075v81bom', '123.231.125.240', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', '2020-04-23'),
(24, 3, '2020-04-14 03:36:00', '$2y$10$339Mj1J7kcNHWdiYkUHWa.KSQZo7e1RiBCw.81NUFSfJkW08XhoGW', '43.250.240.126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', '2020-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `ref_categories`
--

CREATE TABLE `ref_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_categories`
--

INSERT INTO `ref_categories` (`id`, `name`, `code`, `created`) VALUES
(1, 'Categories', NULL, '2020-04-01 15:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `ref_sub_categories`
--

CREATE TABLE `ref_sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `cover_image` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_sub_categories`
--

INSERT INTO `ref_sub_categories` (`id`, `name`, `parent`, `cover_image`) VALUES
(1, 'Bread', 1, ''),
(2, 'Cooked Meals', 1, ''),
(3, 'Eggs', 1, ''),
(4, 'Fish', 1, ''),
(5, 'Fruits', 1, ''),
(6, 'Gas', 1, ''),
(7, 'Groceries', 1, ''),
(8, 'Meat', 1, ''),
(9, 'Medicine', 1, ''),
(10, 'Pet Food', 1, ''),
(11, 'Rice', 1, ''),
(12, 'Vegetables', 1, ''),
(13, 'Water', 1, ''),
(16, 'Baby Care', 1, ''),
(15, 'Restaurants', 1, ''),
(17, 'Bakery Items', 1, ''),
(18, 'Dairy', 1, ''),
(19, 'Pet Care', 1, ''),
(20, 'Sanitary Items', 1, ''),
(21, 'Soft drinks', 1, ''),
(22, 'Nuts, spices & dry fruits', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `requested_cause`
--

CREATE TABLE `requested_cause` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cause` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` tinytext,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requested_cause`
--

INSERT INTO `requested_cause` (`id`, `name`, `cause`, `email`, `phone`, `message`, `created`) VALUES
(1, 'test', 'ttitle', 'sajisajeevan007@gmail.com', '8768698', 'sd', '2020-03-30 09:22:12'),
(2, 'layla savage', 'layla savage', 'laylasavage.gm.127983170@gcheck.xyz', '+74951374699', '', '2020-04-11 12:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `req_causes_img`
--

CREATE TABLE `req_causes_img` (
  `id` int(11) NOT NULL,
  `cause_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_causes_img`
--

INSERT INTO `req_causes_img` (`id`, `cause_id`, `name`, `created`) VALUES
(1, 1, '300320405079815.jpeg', '2020-03-30 09:22:12'),
(2, 1, '30032074449817.jpg', '2020-03-30 09:22:12'),
(3, 1, '300320576845452.jpg', '2020-03-30 09:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `access_token` varchar(100) DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `mobile_no` varchar(45) NOT NULL,
  `p_door_no` varchar(100) DEFAULT NULL,
  `p_city` varchar(45) DEFAULT NULL,
  `p_state` varchar(45) DEFAULT NULL,
  `p_zip_code` varchar(45) DEFAULT NULL,
  `t_door_no` varchar(100) DEFAULT NULL,
  `t_city` varchar(45) DEFAULT NULL,
  `t_state` varchar(45) DEFAULT NULL,
  `t_zip_code` varchar(45) DEFAULT NULL,
  `default_address` varchar(2) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `access_token`, `name`, `email`, `contact_no`, `mobile_no`, `p_door_no`, `p_city`, `p_state`, `p_zip_code`, `t_door_no`, `t_city`, `t_state`, `t_zip_code`, `default_address`, `created`, `updated`, `user_type`) VALUES
(1, '031911261159', 'Manisha Jayasinghe', 'mani.jay1985@gmail.com', '0777004007', '0777004007', '37/13 , weerasekara mw, janajaya mw , divulapitiya, boralasgamuwa ', 'Papiliyana ', 'Srilanka ', '10500', '', '', '', '', 'p', '2019-11-26 05:33:59', '2019-11-26 05:35:17', 'std');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ad_posts`
--
ALTER TABLE `ad_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_post_cities`
--
ALTER TABLE `ad_post_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_post_comments`
--
ALTER TABLE `ad_post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_post_images`
--
ALTER TABLE `ad_post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_post_list`
--
ALTER TABLE `ad_post_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causes_images`
--
ALTER TABLE `causes_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_request`
--
ALTER TABLE `donation_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kits_request`
--
ALTER TABLE `kits_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_no` (`reference_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `access_token_UNIQUE` (`access_token`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `r_key` (`r_key`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ref_categories`
--
ALTER TABLE `ref_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_sub_categories`
--
ALTER TABLE `ref_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_cause`
--
ALTER TABLE `requested_cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_causes_img`
--
ALTER TABLE `req_causes_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ad_posts`
--
ALTER TABLE `ad_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `ad_post_cities`
--
ALTER TABLE `ad_post_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `ad_post_comments`
--
ALTER TABLE `ad_post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ad_post_images`
--
ALTER TABLE `ad_post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `ad_post_list`
--
ALTER TABLE `ad_post_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `causes_images`
--
ALTER TABLE `causes_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation_request`
--
ALTER TABLE `donation_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kits_request`
--
ALTER TABLE `kits_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ref_categories`
--
ALTER TABLE `ref_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ref_sub_categories`
--
ALTER TABLE `ref_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `requested_cause`
--
ALTER TABLE `requested_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `req_causes_img`
--
ALTER TABLE `req_causes_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `fk_admin_login_history` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
