-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 03:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `a_mail` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`a_id`, `a_name`, `a_mail`, `password`, `contact`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin*2#', '9001234567', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeed`
--

CREATE TABLE `tblfeed` (
  `cf_id` int(10) NOT NULL,
  `feed_name` varchar(50) NOT NULL,
  `cf_photo` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `amt` double(10,2) NOT NULL,
  `details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfeed`
--

INSERT INTO `tblfeed` (`cf_id`, `feed_name`, `cf_photo`, `qty`, `amt`, `details`) VALUES
(1, 'Nandini Gold Cattle Feed', 'feed.jpg', 50, 1180.00, 'Manufactured By:-\r\nSunanda Private Ltd., Hassan District,\r\nKarnataka'),
(2, 'Chelated Area Specific Mineral Mixture', 'mineral.jpg', 1, 86.00, 'Manufactured By:-\r\nCattle Feed Plant, Hassan District, Karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `p_id` int(10) NOT NULL,
  `f_id` int(10) NOT NULL,
  `rating` varchar(200) DEFAULT NULL,
  `msg` text NOT NULL,
  `reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`p_id`, `f_id`, `rating`, `msg`, `reply`) VALUES
(201, 1, 'good', 'Satisfied!!', 'Thank you!!'),
(205, 2, 'bad', 'Not working!', NULL),
(201, 4, 'good', 'Nice Website!!!', 'Thanks'),
(201, 5, 'good', 'superr', 'Thank you!!'),
(210, 7, 'good', 'I liked this application!!', NULL),
(210, 8, 'neutral', 'Nice ', NULL),
(210, 9, 'good', 'Thanks for developing this application', 'Welcome!!');

-- --------------------------------------------------------

--
-- Table structure for table `tblmilk`
--

CREATE TABLE `tblmilk` (
  `m_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `fat` double(10,2) NOT NULL,
  `litre` double(10,2) NOT NULL,
  `clr` double(10,2) NOT NULL,
  `snf` double(10,2) NOT NULL,
  `price` double(10,2) NOT NULL,
  `tot_price` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmilk`
--

INSERT INTO `tblmilk` (`m_id`, `p_id`, `fat`, `litre`, `clr`, `snf`, `price`, `tot_price`, `date`, `session`) VALUES
(1, 203, 7.50, 9.20, 27.00, 8.40, 34.30, 315.56, '2023-06-01', 'Morning'),
(2, 201, 6.90, 12.50, 27.00, 8.50, 38.92, 486.50, '2023-06-01', 'Morning'),
(3, 204, 6.30, 8.50, 26.00, 8.10, 32.30, 274.55, '2023-06-02', 'Morning'),
(4, 201, 4.10, 4.70, 27.00, 8.50, 33.00, 155.10, '2023-06-01', 'Evening'),
(5, 203, 3.50, 18.45, 26.00, 8.50, 33.00, 608.85, '2023-06-01', 'Evening'),
(6, 201, 3.80, 13.00, 28.00, 8.60, 33.70, 438.10, '2023-06-02', 'Morning'),
(7, 201, 4.00, 6.80, 27.00, 9.00, 34.75, 236.30, '2023-06-02', 'Evening'),
(8, 201, 4.40, 15.90, 28.00, 10.00, 37.23, 591.96, '2023-06-03', 'Morning'),
(9, 201, 4.60, 9.10, 27.00, 8.90, 35.66, 324.51, '2023-06-03', 'Morning'),
(10, 201, 4.40, 10.30, 28.00, 9.40, 36.18, 372.65, '2023-06-04', 'Morning'),
(11, 201, 5.00, 8.90, 27.00, 9.70, 37.75, 335.98, '2023-06-04', 'Evening'),
(12, 201, 4.90, 14.70, 27.00, 9.20, 36.88, 542.14, '2023-06-05', 'Morning'),
(13, 201, 6.50, 7.80, 28.00, 8.50, 37.22, 290.32, '2023-06-05', 'Evening'),
(14, 201, 7.00, 15.40, 28.00, 8.70, 38.44, 591.98, '2023-06-06', 'Morning'),
(15, 201, 5.60, 7.80, 27.00, 8.90, 36.35, 283.53, '2023-06-06', 'Evening'),
(16, 201, 5.80, 18.60, 28.00, 9.10, 37.05, 689.13, '2023-06-07', 'Morning'),
(17, 201, 5.00, 6.70, 28.00, 8.60, 34.78, 233.03, '2023-06-07', 'Evening'),
(18, 201, 5.40, 17.86, 28.00, 8.70, 35.65, 636.71, '2023-06-08', 'Morning'),
(19, 201, 4.60, 7.90, 26.00, 8.70, 34.26, 270.65, '2023-06-08', 'Evening'),
(20, 201, 5.50, 21.00, 29.00, 8.80, 36.00, 756.00, '2023-06-09', 'Morning'),
(21, 201, 5.70, 7.90, 27.00, 8.80, 36.35, 287.17, '2023-06-09', 'Evening'),
(22, 201, 4.80, 7.80, 27.00, 8.60, 34.44, 268.63, '2023-06-10', 'Morning'),
(23, 201, 5.90, 6.00, 28.00, 8.70, 36.35, 218.10, '2023-06-10', 'Evening'),
(24, 203, 6.20, 23.90, 28.00, 8.50, 37.70, 901.03, '2023-06-02', 'Morning'),
(25, 203, 6.30, 12.90, 28.00, 8.80, 38.44, 495.88, '2023-06-02', 'Evening'),
(26, 203, 7.00, 21.00, 29.00, 8.90, 39.84, 836.64, '2023-06-03', 'Morning'),
(27, 203, 6.60, 13.87, 27.00, 8.60, 38.57, 534.97, '2023-06-03', 'Evening'),
(28, 203, 5.80, 8.90, 28.00, 8.60, 37.35, 332.42, '2023-06-04', 'Morning'),
(29, 203, 6.80, 9.00, 28.00, 9.10, 39.84, 358.56, '2023-06-04', 'Evening'),
(30, 203, 7.00, 19.00, 28.00, 8.90, 39.78, 755.82, '2023-06-05', 'Morning'),
(31, 203, 6.60, 13.00, 27.00, 8.60, 38.57, 501.41, '2023-06-05', 'Evening'),
(32, 203, 5.90, 19.90, 26.00, 8.60, 37.35, 743.26, '2023-06-06', 'Morning'),
(33, 203, 6.80, 12.10, 28.00, 9.10, 39.84, 482.06, '2023-06-06', 'Evening'),
(34, 203, 6.90, 21.00, 28.00, 8.70, 39.31, 825.51, '2023-06-07', 'Morning'),
(35, 203, 4.80, 11.00, 28.00, 8.70, 34.61, 380.71, '2023-06-06', 'Evening'),
(36, 203, 5.50, 19.70, 26.00, 8.80, 36.00, 709.20, '2023-06-08', 'Morning'),
(37, 203, 3.80, 12.30, 27.00, 8.90, 33.22, 408.61, '2023-06-08', 'Evening'),
(38, 203, 5.60, 20.70, 27.00, 8.90, 36.35, 752.45, '2023-06-09', 'Morning'),
(39, 203, 4.90, 11.08, 26.00, 9.20, 35.65, 395.00, '2023-06-09', 'Evening'),
(40, 203, 6.10, 19.50, 28.00, 8.90, 37.22, 725.79, '2023-06-10', 'Morning'),
(41, 203, 4.30, 12.50, 27.00, 8.70, 33.74, 421.75, '2023-06-10', 'Evening'),
(42, 204, 4.90, 15.40, 28.00, 9.10, 35.31, 543.77, '2023-06-01', 'Morning'),
(43, 204, 5.70, 11.68, 28.00, 8.90, 36.52, 426.55, '2023-06-01', 'Evening'),
(44, 204, 5.00, 9.00, 27.00, 9.10, 36.65, 329.85, '2023-06-02', 'Evening'),
(45, 204, 5.80, 16.77, 26.00, 8.90, 36.70, 615.46, '2023-06-03', 'Morning'),
(46, 204, 4.60, 11.80, 27.00, 9.00, 34.78, 410.40, '2023-06-03', 'Evening'),
(47, 204, 6.40, 10.90, 27.00, 8.90, 37.74, 411.37, '2023-06-04', 'Morning'),
(48, 204, 4.20, 13.63, 27.00, 8.90, 34.96, 476.50, '2023-06-04', 'Evening'),
(49, 204, 4.90, 15.70, 28.00, 8.80, 36.01, 565.36, '2023-06-05', 'Morning'),
(50, 202, 3.70, 19.00, 27.00, 9.00, 34.27, 651.13, '2023-06-01', 'Morning'),
(51, 202, 4.90, 12.00, 27.00, 8.70, 35.83, 429.96, '2023-06-01', 'Evening'),
(52, 209, 4.20, 8.90, 26.00, 9.20, 35.49, 315.86, '2023-06-02', 'Morning'),
(53, 209, 3.80, 4.80, 26.00, 8.70, 33.92, 162.82, '2023-06-02', 'Evening'),
(54, 205, 5.60, 12.79, 27.00, 8.90, 36.35, 464.92, '2023-06-03', 'Morning'),
(55, 205, 6.50, 12.77, 28.00, 9.10, 38.26, 488.58, '2023-06-02', 'Morning'),
(56, 209, 7.00, 11.75, 26.00, 9.10, 39.13, 459.78, '2023-06-05', 'Morning'),
(57, 205, 5.30, 4.40, 28.00, 8.70, 35.48, 156.11, '2023-06-06', 'Evening'),
(58, 210, 7.50, 9.20, 27.00, 8.40, 34.30, 315.56, '2023-07-01', 'Morning'),
(59, 210, 6.90, 12.40, 27.00, 8.50, 38.92, 482.61, '2023-07-01', 'Morning'),
(60, 210, 6.30, 8.50, 26.00, 8.10, 32.30, 274.55, '2023-07-02', 'Morning'),
(61, 210, 4.10, 4.70, 27.00, 8.50, 33.00, 155.10, '2023-07-02', 'Evening'),
(62, 210, 3.50, 18.45, 26.00, 8.50, 33.00, 608.85, '2023-07-03', 'Evening'),
(63, 210, 3.80, 13.00, 28.00, 8.60, 33.70, 438.10, '2023-07-04', 'Morning'),
(64, 210, 4.00, 6.80, 27.00, 9.00, 34.75, 236.30, '2023-07-04', 'Evening'),
(65, 210, 4.40, 15.90, 28.00, 10.00, 37.23, 591.96, '2023-07-05', 'Morning'),
(66, 210, 4.60, 9.10, 27.00, 8.90, 35.66, 324.51, '2023-07-06', 'Morning'),
(67, 210, 4.40, 10.30, 28.00, 9.40, 36.18, 372.65, '2023-07-07', 'Morning'),
(68, 210, 5.00, 8.90, 27.00, 9.70, 37.75, 335.98, '2023-07-07', 'Evening'),
(69, 210, 4.90, 14.70, 27.00, 9.20, 36.88, 542.14, '2023-07-08', 'Morning'),
(70, 210, 6.50, 7.80, 28.00, 8.50, 37.22, 290.32, '2023-07-08', 'Evening'),
(71, 210, 7.00, 15.40, 28.00, 8.70, 38.44, 591.98, '2023-07-09', 'Morning'),
(72, 210, 5.60, 7.80, 27.00, 8.90, 36.35, 283.53, '2023-07-09', 'Evening'),
(73, 210, 5.80, 18.60, 28.00, 9.10, 37.05, 689.13, '2023-07-10', 'Morning'),
(74, 210, 5.00, 6.70, 28.00, 8.60, 34.78, 233.03, '2023-07-10', 'Evening'),
(75, 210, 5.40, 17.86, 28.00, 8.70, 35.65, 636.71, '2023-07-11', 'Morning'),
(76, 210, 4.60, 7.90, 26.00, 8.70, 34.26, 270.65, '2023-07-11', 'Evening'),
(77, 210, 5.50, 21.00, 29.00, 8.80, 36.00, 756.00, '2023-07-12', 'Morning'),
(78, 210, 5.70, 7.90, 27.00, 8.80, 36.35, 287.17, '2023-07-12', 'Evening'),
(79, 211, 4.80, 7.80, 27.00, 8.60, 34.44, 268.63, '2023-07-01', 'Morning'),
(80, 211, 5.90, 6.00, 28.00, 8.70, 36.35, 218.10, '2023-07-01', 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE `tblnews` (
  `n_id` int(10) NOT NULL,
  `n_title` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `photo_id` varchar(500) NOT NULL,
  `n_date` date NOT NULL DEFAULT current_timestamp(),
  `n_time` time(6) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnews`
--

INSERT INTO `tblnews` (`n_id`, `n_title`, `subject`, `content`, `photo_id`, `n_date`, `n_time`) VALUES
(1, 'Repeat breeders', 'An effective ethno-veterinary formulation for field use.', '<b>Ingredients Required:-</b><br>\r\n&emsp;1.White radish<br>\r\n&emsp;2.Aloe vera leaves<br>\r\n&emsp;3.Maringa leaves<br>\r\n&emsp;4.Cissus Quadrangularis stem<br>\r\n&emsp;5.Curry leaves<br>\r\n&emsp;6.Turmeric<br><br>\r\n<b>Methods of preparation and administration of medication:-</b><br>\r\n&emsp;Step-wise treatment protocol<br>\r\n&emsp;Start the treatment on the first or second day of the heat cycle<br>\r\n&emsp;1.Feed on full radish every day for 5 days. Smear it with jaggery and salt before feeding.<br>\r\n&emsp;2.Feed one fresh leaf of Aloe Vera(after remaining the thorns ) once a day for 4 days along with jaggery and  salt after step 1.<br>\r\n&emsp;3.Feed a handfuls of fresh Moringa leaves along with jaggery and salt once a day for the next 4 days after step 2.<br>\r\n&emsp;4.Feed a handfuls of fresh cissus stem with jaggery and salt once a day for 4 days after step 3.<br>\r\n&emsp;5.Lastly, feed 4 handfuls of fresh Curry leaves mixed with turmeric, jaggery and salt once a day for 4 days after step 4.<br><br>\r\n<b>Note:</b><br>\r\n&emsp;All the herbs are to be given orally in fresh form, once a day only.<br>\r\n&emsp;Repeat the treatment once again if the animal has not conceived.<br><br>\r\n<b>Credits:-</b><br>\r\n&emsp;Dr N Punnaimurthy, Professor & Head Tamil Nadu Veterinary and Animal Sciences University (TANUVAS)<br>\r\n&emsp;Dr M N Balakrishnan Nair, Emeritus Professor Transdisciplinary University (TDU), Bengaluru<br>\r\n<b>Prepared by:-</b><br>\r\n&emsp;Animal Health Group<br> \r\n&emsp;National Dairy Development Board<br> \r\n&emsp;Anand<br><br>', 'n1.jpg', '2023-06-21', '20:45:29.000000'),
(2, 'Udder (all types / L)', 'An effective ethno-veterinary formulation for field use.', '<b>Ingredients Required:</b><br>\r\n&emsp;250 grams of slime<br>\r\n&emsp;50 grams of turmeric<br>\r\n&emsp;lime- 15 gm<br>\r\n&emsp;lemon-2<br>\r\n&emsp;Jaggery-100gm<br><br>\r\n<b>Method of preparation:</b><br>\r\n&emsp;Grind 1-3 ingredients into a red paste and cut the lemons into two slices.<br><br>\r\nMethod of administration of medication:<br>\r\n&emsp;1.Take a handful of the paste and add 150-200 ml of water to it. \r\n&emsp;2.Wash the bite thoroughly and apply the red mixture on all parts of the udder and repeat this procedure.\r\n&emsp;3.10 times a day for five days.\r\n&emsp;4. 2 lemons should be given daily for 3 days.<br><br>\r\n<b>Note:</b><br>\r\n&emsp;If there is bleeding with milk, along with the above mixture, give curry powder (2 handfuls) and jaggery paste twice a day until the disease is cared.<br><br>\r\n<b>Credits:-</b><br>\r\n&emsp;Dr N Punnaimurthy, Professor & Head Tamil Nadu Veterinary and Animal Sciences University (TANUVAS)<br>\r\n&emsp;Dr M N Balakrishnan Nair, Emeritus Professor Transdisciplinary University (TDU), Bengaluru<br>\r\n<b>Prepared by:-</b><br>\r\n&emsp;Animal Health Group<br> \r\n&emsp;National Dairy Development Board<br> \r\n&emsp;Anand<br><br>\r\n', 'n2.jpg', '2023-06-21', '20:46:45.000000'),
(3, 'Blockages of nipple pores', 'An effective ethno-veterinary formulation for field use.', '<b>Ingredients Required:</b><br>\r\n&emsp;1.Freshly plucked and clean neem leafstalk-1<br>\r\n&emsp;2.turmeric powder<br>\r\n&emsp;Butter or ghee.<br><br>\r\n<b>Method of preparation:</b><br>\r\n&emsp;1.Cut a stick of neem leaf at the required.<br>\r\n&emsp;2.Length based on teat length, mix butter or ghee with turmeric powder, coat the mixture thoroughly on the neem leafstalk.<br><br>\r\n<b>Method of administration of medication:</b><br>\r\n&emsp;1.Apply some mixture on the affected teat orifice. <br>\r\n&emsp;2.Insert the neem leafstalk coated with the mixture into the teat affected with obstruction.<br>\r\n&emsp;3.Insert only in an anti-Clockwise direction. <br>\r\n&emsp;4.Leave a small stub outside the teat orifice.<br>\r\n&emsp;5.Remove the neem leafstalk just before each milking.<br><br>\r\n<b>Note:</b><br>\r\n&emsp;•	Replace with a new neem leafstalk coated with mixture after each milking.<br>\r\n&emsp;•	Continue the process till the teat obstraction resolves.<br>\r\n&emsp;•	Use only a freshly plucked and clean neem leafstalk.<br>\r\n&emsp;•	Always prepare the mixture freshly.<br><br>\r\n<b>Credits:-</b><br>\r\n&emsp;Dr N Punnaimurthy, Professor & Head Tamil Nadu Veterinary and Animal Sciences University (TANUVAS)<br>\r\n&emsp;Dr M N Balakrishnan Nair, Emeritus Professor Transdisciplinary University (TDU), Bengaluru<br>\r\n<b>Prepared by:-</b><br>\r\n&emsp;Animal Health Group<br> \r\n&emsp;National Dairy Development Board<br> \r\n&emsp;Anand<br><br>\r\n', 'n3.jpg', '2023-06-22', '19:17:46.000000'),
(4, 'Ethnoveterinary formulation for Udder oedema', 'An effective ethno-veterinary formulation for field use.', '<b>Ingredients Required:</b><br>\r\n&emsp;1.Cooking oil (any)-200ml.<br>\r\n&emsp;2.Garlic-2 bulbs.<br>\r\n&emsp;3.Turmeric powder-1 handful.<br>\r\n<b>Methods of preparation:</b><br>\r\n&emsp;1.Add turmeric powder and sliced garlic to the oil.<br>\r\n&emsp;2.Mix well and  remove from fire just as the flavor develops(no need to boil).<br><br>\r\n<b>Method of administration of medication:</b><br>\r\n&emsp;1.After the formulation cools apply the formulation in a circular motion with force.<br>\r\n&emsp;2.Apply the formulation over the entire udder. <br>\r\n&emsp;3.Apply 4 times a day for 3 days.<br><br>\r\n<b>Note:</b><br>\r\n&emsp;Before using this formulation to check the udder oedema has known i.e is this the same?.<br><br>\r\n<b>Credits:-</b><br>\r\n&emsp;Dr N Punnaimurthy, Professor & Head Tamil Nadu Veterinary and Animal Sciences University (TANUVAS)<br>\r\n&emsp;Dr M N Balakrishnan Nair, Emeritus Professor Transdisciplinary University (TDU), Bengaluru<br>\r\n<b>Prepared by:-</b><br>\r\n&emsp;Animal Health Group<br> \r\n&emsp;National Dairy Development Board<br> \r\n&emsp;Anand<br><br>\r\n', 'n4.jpg', '2023-06-22', '19:22:48.000000'),
(5, 'Ethnoveterinary formulation for fever in bovines', 'An effective ethno-veterinary formulation for field use.', '<b>Ingredients Required:</b><br>\r\n&emsp;1.Black pepper – 10 grams<br>\r\n&emsp;2.Coriander Seeds – 10 grams<br>\r\n&emsp;3.Jeera (cumin) – 10 grams<br>\r\n&emsp;4.Dry cinnamon leaves – 10 grams<br>\r\n&emsp;5.Garlic – 2 cloves<br>\r\n&emsp;6.Shallots (small onions) – 2 bulbs<br>\r\n&emsp;7.Turmeric powder – 10 grams<br>\r\n&emsp;8.Holy basil (Tulsi) –1 handful<br>\r\n&emsp;9.Sweet basil – 1 handful<br>\r\n&emsp;10.Betel leaves – 5 numbers<br>\r\n&emsp;11.Neem leaves – 1 handful<br>\r\n&emsp;12.Kariyat leaves (Andrographis paniculate) – 20 grams<br>\r\n&emsp;13.Jaggery – 100 grams(10 grams approx.  2 teaspoons).<br><br>\r\n<b>Methods of preparation:</b><br>\r\n&emsp;1.Soak 10 grams each of Black Pepper, Jeera and Coriander seeds  for 15 minutes and blend 10 grams of cinnamon leaves , 2 cloves of Garlic and 2 bulbs of shallots, 1 handful each of Neem , sweet and Holy Basil (Tulasi) fresh leaves and 5 fresh betel leaves and blend 100 grams of Jaggery mix all the blended ingredients to form a paste.<br>\r\n&emsp;2.Add 10 grams of Turmeric powder and 20 grams of dry kariyat leaf powder mix to a pasty consistency.<br><br>\r\n<b>Method of administration of medication:</b><br>\r\n&emsp;1.Apply small portions of the preparation on the tongue and  palate.<br> &emsp2;.Allow the animal to chew the preparation after each administration.<br> &emsp3;.Repeat the administration in small portions.<br><br>\r\n<b>Note:</b><br>\r\n&emsp;1.Two handfuls are sufficient for one adult animal . <br>\r\n&emsp;2.Complete the prepared dose in two equal administrations( morning and evening).<br><br>\r\n<b>Credits:-</b><br>\r\n&emsp;Dr N Punnaimurthy, Professor & Head Tamil Nadu Veterinary and Animal Sciences University (TANUVAS)<br>\r\n&emsp;Dr M N Balakrishnan Nair, Emeritus Professor Transdisciplinary University (TDU), Bengaluru<br>\r\n<b>Prepared by:-</b><br>\r\n&emsp;Animal Health Group<br> \r\n&emsp;National Dairy Development Board<br> \r\n&emsp;Anand<br><br>\r\n', 'n5.jpg', '2023-06-22', '19:30:13.000000'),
(6, 'Ethnoveterinary formulation for bloat and indigestion in bovines', 'An effective ethno-veterinary formulation for field use.', '<b>Ingredients Required:</b><br>\r\n&emsp;1.Black pepper – 10 g<br>\r\n&emsp;2.Jeera (cumin) – 10g<br>\r\n&emsp;3.Onion – 100g<br>\r\n&emsp;4.Garlic – 10 pearls<br>\r\n&emsp;5.Red Chilly – 2 no. s<br>\r\n&emsp;6.Turmeric – 10g<br>\r\n&emsp;7.Jaggery – 100g<br>\r\n&emsp;8.Betel leaves – 10 no. s<br>\r\n&emsp;9.Ginger – 100g<br>\r\n&emsp;10.Salt – As required, at the time of administering (1 Teaspoon = 5gm approx).<br><br>\r\n<b>Methods of preparation:</b><br>\r\n&emsp;1.Soak pepper and cumin in water for 20-30 minutes, blend along with other ingredients to form a paste. <br>\r\n&emsp;2.Roll the paste into small balls.<br><br>\r\n<b>Method of administration:</b><br>\r\n&emsp;1.Administer each portion with salt by smearing on tongue and palate.<br> &emsp;2.Allow the animal to chew. <br>\r\n&emsp;3.Repeat the process till the full dose is given. <br>\r\n&emsp;4.Administer 3-4 doses in small portions every day for 8 days.<br><br>\r\n<b>Note:</b><br>\r\n&emsp;•	Ensure that the animal is not suffering from acute conditions like choking.<br> \r\n&emsp;•	Ensure that the animal is not suffering from ruminal acidosis.<br><br>\r\n<b>Credits:-</b><br>\r\n&emsp;Dr N Punnaimurthy, Professor & Head Tamil Nadu Veterinary and Animal Sciences University (TANUVAS)<br>\r\n&emsp;Dr M N Balakrishnan Nair, Emeritus Professor Transdisciplinary University (TDU), Bengaluru<br>\r\n<b>Prepared by:-</b><br>\r\n&emsp;Animal Health Group<br> \r\n&emsp;National Dairy Development Board<br> \r\n&emsp;Anand<br><br>\r\n', 'n6.jpg', '2023-06-22', '19:41:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `p_id` int(10) NOT NULL,
  `cf_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `quantity` int(10) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `paymethod` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`p_id`, `cf_id`, `order_id`, `order_date`, `quantity`, `addr`, `paymethod`, `status`) VALUES
(201, 1, 1, '2023-06-27', 2, 'sarve, puttur', 'cod', 'Delivered'),
(201, 2, 2, '2023-06-27', 4, 'sarve,puttur', 'cod', 'Pending'),
(201, 1, 3, '2023-06-27', 2, 'puttur', 'cod', 'Delivered'),
(202, 1, 4, '2023-06-27', 1, 'panjala', 'cod', 'Pending'),
(210, 2, 5, '2023-07-12', 5, 'Kallare', 'cod', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducer`
--

CREATE TABLE `tblproducer` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_mail` varchar(50) NOT NULL,
  `p_pwd` varchar(8) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'producer',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproducer`
--

INSERT INTO `tblproducer` (`p_id`, `p_name`, `p_mail`, `p_pwd`, `phone`, `address`, `role`, `created_at`) VALUES
(201, 'Jeevan Kumar', 'jeev25@gmail.com', '123456jk', '7344567891', 'Panjala, Puttur', 'producer', '2023-06-21'),
(202, 'Sharanya Rai', 'sharu.rai@gmail.com', 'sharu200', '9756324182', 'Naithady, Puttur', 'producer', '2023-06-21'),
(203, 'Bhavya', 'bhavya@gmail.com', 'bhav%900', '9480346519', 'Shibara,Puttur', 'producer', '2023-06-21'),
(204, 'Prasad Hegde', 'prasad2023@gmail.com', 'pras2000', '8108765429', 'Sarve', 'producer', '2023-06-21'),
(205, 'Harshitha K', 'harshithahebbark@gmail.com', '*har123%', '9591023174', 'Puttur', 'producer', '2023-06-22'),
(209, 'Devika K', 'devikak0506@gmail.com', 'devika12', '8792462285', 'Puttur', 'producer', '2023-06-23'),
(210, 'Geetha', 'geetha34@gmail.com', '123*456%', '7903457643', 'Sarve', 'producer', '2023-07-10'),
(211, 'shravya', 'shrav56@gmail.com', 'sh#25&av', '9534653103', 'Nella,Kadaba', 'producer', '2023-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `tblsupervisor`
--

CREATE TABLE `tblsupervisor` (
  `sup_id` int(10) NOT NULL,
  `sup_name` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `pwd` varchar(8) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'supervisor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsupervisor`
--

INSERT INTO `tblsupervisor` (`sup_id`, `sup_name`, `emailid`, `pwd`, `contactno`, `address`, `role`) VALUES
(1, 'Supervisor', 'supervisor@gmail.com', 'super123', '7342569101', 'Puttur', 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransport`
--

CREATE TABLE `tbltransport` (
  `t_id` int(10) NOT NULL,
  `m_qty` double(10,2) NOT NULL,
  `t_date` date NOT NULL,
  `time` time(6) NOT NULL DEFAULT current_timestamp(),
  `loc` varchar(10) NOT NULL DEFAULT 'KMF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransport`
--

INSERT INTO `tbltransport` (`t_id`, `m_qty`, `t_date`, `time`, `loc`) VALUES
(1, 32.50, '2023-06-01', '20:35:51.000000', 'KMF'),
(2, 48.20, '2023-06-02', '20:36:13.000000', 'KMF'),
(3, 39.40, '2023-06-03', '20:36:52.000000', 'KMF'),
(4, 78.30, '2023-07-01', '17:25:20.000000', 'KMF'),
(5, 102.50, '2023-07-02', '17:25:37.000000', 'KMF'),
(6, 81.28, '2023-07-03', '17:25:52.000000', 'KMF'),
(7, 69.50, '2023-07-04', '17:26:06.000000', 'KMF'),
(8, 32.50, '2023-07-05', '20:35:51.000000', 'KMF'),
(9, 48.20, '2023-07-06', '20:36:13.000000', 'KMF'),
(10, 39.40, '2023-07-07', '20:36:52.000000', 'KMF'),
(11, 78.30, '2023-07-08', '17:25:20.000000', 'KMF'),
(12, 102.50, '2023-07-09', '17:25:37.000000', 'KMF'),
(13, 81.28, '2023-07-10', '17:25:52.000000', 'KMF'),
(14, 69.50, '2023-07-11', '17:26:06.000000', 'KMF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_mail` (`a_mail`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `tblfeed`
--
ALTER TABLE `tblfeed`
  ADD PRIMARY KEY (`cf_id`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `tblmilk`
--
ALTER TABLE `tblmilk`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `cf_id` (`cf_id`);

--
-- Indexes for table `tblproducer`
--
ALTER TABLE `tblproducer`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_mail` (`p_mail`),
  ADD UNIQUE KEY `p_pwd` (`p_pwd`),
  ADD UNIQUE KEY `contact` (`phone`);

--
-- Indexes for table `tblsupervisor`
--
ALTER TABLE `tblsupervisor`
  ADD PRIMARY KEY (`sup_id`),
  ADD UNIQUE KEY `emailid` (`emailid`),
  ADD UNIQUE KEY `pwd` (`pwd`),
  ADD UNIQUE KEY `contactno` (`contactno`);

--
-- Indexes for table `tbltransport`
--
ALTER TABLE `tbltransport`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblfeed`
--
ALTER TABLE `tblfeed`
  MODIFY `cf_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblmilk`
--
ALTER TABLE `tblmilk`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `n_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblproducer`
--
ALTER TABLE `tblproducer`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `tblsupervisor`
--
ALTER TABLE `tblsupervisor`
  MODIFY `sup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbltransport`
--
ALTER TABLE `tbltransport`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD CONSTRAINT `tblfeedback_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblproducer` (`p_id`);

--
-- Constraints for table `tblmilk`
--
ALTER TABLE `tblmilk`
  ADD CONSTRAINT `tblmilk_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblproducer` (`p_id`);

--
-- Constraints for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblproducer` (`p_id`),
  ADD CONSTRAINT `tblorder_ibfk_2` FOREIGN KEY (`cf_id`) REFERENCES `tblfeed` (`cf_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
