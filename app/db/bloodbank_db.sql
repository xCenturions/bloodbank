-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 06:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `assigned` varchar(100) DEFAULT NULL,
  `acl` varchar(60) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `assigned`, `acl`, `deleted`) VALUES
(1, 'admin', 'admin', 'Tharindu Maduranga', 'Jaffna', '[\"Admin\"]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(10) NOT NULL,
  `alert` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `alert`, `status`, `bank`, `date`, `time`, `deleted`) VALUES
(32, '', 'unopened', 'Horana', NULL, NULL, 0),
(34, 'sdd', 'unopened', 'Jafafna', NULL, NULL, 0),
(35, 'ssdd', 'unopened', 'Ho', NULL, NULL, 0),
(36, 'A+,B-,', 'opened', 'Jaffna', '2021-10-14', '10:00:04', 0),
(37, '', 'unopened', NULL, NULL, NULL, 0),
(38, '', 'unopened', NULL, NULL, NULL, 0),
(39, '', 'unopened', '', NULL, NULL, 0),
(40, '', 'unopened', 'Dehiwala', NULL, NULL, 0),
(41, '', 'unopened', 'Matara', NULL, NULL, 0),
(42, '', 'unopened', 'Kandy', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `donor_healthdetails` varchar(50) DEFAULT NULL,
  `preffered_time` time DEFAULT NULL,
  `preffered_date` date DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `location_type` varchar(20) DEFAULT NULL,
  `donor_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `donor_healthdetails`, `preffered_time`, `preffered_date`, `location`, `location_type`, `donor_id`, `deleted`) VALUES
(4, NULL, '19:00:00', '2021-08-25', 'Embilipitiya - Embilipitiya Hospital', '1', 8, 1),
(5, NULL, '19:00:00', '2021-08-25', 'Elpitiya - Elpitiya Hospital', '1', 8, 1),
(6, NULL, '19:00:00', '2021-08-25', 'Makehelwala Kanishta Vidyalaya - Mawanella', '2', 8, 1),
(7, NULL, '19:00:00', '2021-08-26', 'Chilaw - Chilaw Hospital', '1', 8, 0),
(8, NULL, '19:00:00', '2021-08-26', 'Makehelwala Kanishta Vidyalaya - Mawanella', '2', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bloodbanks`
--

CREATE TABLE `bloodbanks` (
  `id` int(11) DEFAULT NULL,
  `cluster` varchar(45) DEFAULT NULL,
  `bloodbank` varchar(45) DEFAULT NULL,
  `TP_No` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodbanks`
--

INSERT INTO `bloodbanks` (`id`, `cluster`, `bloodbank`, `TP_No`) VALUES
(1, 'Ampara', 'Akkaraipattu', '0672277213'),
(1, 'Ampara', 'Ampara', '0632222261'),
(1, 'Ampara', 'Dehiatthakandiya', '0272250344'),
(1, 'Ampara', 'Kalmunai AM(S)', '0672222261'),
(1, 'Ampara', 'Kalmunai Base(N)', '0672229261'),
(1, 'Ampara', 'Mahaoya', '0632244061'),
(1, 'Ampara', 'Sammanthurai', '0672260261'),
(2, 'Anuradhapura', 'Anuradhapura', '0252222261-63'),
(2, 'Anuradhapura', 'Medirigiriya', '0272248261'),
(2, 'Anuradhapura', 'Padaviya', '0252253261'),
(2, 'Anuradhapura', 'Polonnaruwa', '0272222261'),
(2, 'Anuradhapura', 'Thambuttegama', '0252276262'),
(3, 'Badulla', 'Badulla', '055 2222261-62'),
(3, 'Badulla', 'Bibila', '0552265461'),
(3, 'Badulla', 'Diyatalawa', '0572229061'),
(3, 'Badulla', 'Mahiyanganaya', '0552257261'),
(3, 'Badulla', 'Monaragala', '0552276261'),
(3, 'Badulla', 'Welimada', '0572245161'),
(3, 'Badulla', 'Wellawaya', '0552274861'),
(4, 'Batticoloa', 'Batticaloa', '065222226162'),
(4, 'Batticoloa', 'Valachchenai', '0652257721'),
(5, 'CIM', 'Avissawella', '0362222261-62'),
(5, 'CIM', 'CIM', '0112850252-53'),
(5, 'CIM', 'Homagama', '0112855200'),
(5, 'CIM', 'Karawenella', '0362267374'),
(6, 'CNTH', 'Chilaw', '0322222261'),
(6, 'CNTH', 'CNTH', '0112959261-65'),
(6, 'CNTH', 'Gampaha', '033222226162'),
(6, 'CNTH', 'Kalpitiya', '0322260261'),
(6, 'CNTH', 'Marawila', '032 2254261'),
(6, 'CNTH', 'Negambo', '033 2222261-62'),
(6, 'CNTH', 'Puttalam', '032 2265261'),
(6, 'CNTH', 'Wathupitiwala', '033 2280261-62'),
(6, 'CNTH', 'Welisara', '011 2958271'),
(7, 'Jaffna', 'Jaffna', '021 2222261'),
(7, 'Jaffna', 'Killinochchi', '021 2285327'),
(7, 'Jaffna', 'Mullaitivu', '024 3248436'),
(7, 'Jaffna', 'Point Pedro', '021 226 3261'),
(7, 'Jaffna', 'Thellippallai', '021 321 2614'),
(8, 'Kalutara', 'Horana', '034 2261261'),
(8, 'Kalutara', 'Kalutara', '034 2229129'),
(8, 'Kalutara', 'Kethumathie', '038 2232361'),
(8, 'Kalutara', 'Panadura', '038 2232261-62'),
(9, 'Kamburugamuwa', 'Hambanthota', '047 2222016'),
(9, 'Kamburugamuwa', 'Kamburugamuwa', '0412227232'),
(9, 'Kamburugamuwa', 'Kamburupitiya', '041 2292261'),
(9, 'Kamburugamuwa', 'Matara', '041 2222261-63'),
(9, 'Kamburugamuwa', 'Tangalle', '047 2240261'),
(9, 'Kamburugamuwa', 'Thissamaharama', '047 2237261'),
(10, 'Kandy', 'Dambulla', '066 2284761'),
(10, 'Kandy', 'Dikkoya', '051 2230261'),
(10, 'Kandy', 'Gampola', '081 2352261'),
(10, 'Kandy', 'Kandy', '081 2233337-42'),
(10, 'Kandy', 'Kegalle', '035 2222261-63'),
(10, 'Kandy', 'Matale', '066 2222261'),
(10, 'Kandy', 'Mawanella', '035 2246278'),
(10, 'Kandy', 'Nawalapitiya', '054 2222261'),
(10, 'Kandy', 'NuwaraEliya', '052 2222261'),
(10, 'Kandy', 'Peradeniya', '081 2388001-07'),
(10, 'Kandy', 'Rikillagaskada', '081 2365261'),
(10, 'Kandy', 'Warakapola', '035 2267261'),
(11, 'Karapitiya', 'Balapitiya', '091 2258261'),
(11, 'Karapitiya', 'Elpitiya', '091 2291981'),
(11, 'Karapitiya', 'Karapitiya', '091 2232176'),
(11, 'Karapitiya', 'Mahamodara', '091 2222261'),
(12, 'Kurunegala', 'Dambadeniya', '037 2266592'),
(12, 'Kurunegala', 'Kuliyapitiya', '037 2281261'),
(12, 'Kurunegala', 'Kurunegala', '037 2222261-63'),
(12, 'Kurunegala', 'Nikaweratiya', '037 2260261'),
(13, 'NBC', 'Accident Serv.', '011 2691111'),
(13, 'NBC', 'CSHW', '011 2695529'),
(13, 'NBC', 'CSTH', '011 2764069'),
(13, 'NBC', 'DMH', '011 2696224-26'),
(13, 'NBC', 'IDH - Angoda', '011 2411284'),
(13, 'NBC', 'LRH', '011 2693711-13'),
(13, 'NBC', 'Mulleriyawa', '011 2578226'),
(13, 'NBC', 'NBC', '011 2368070'),
(13, 'NBC', 'NHSL', '011 2691111'),
(14, 'Rathnapura', 'Balangoda', '045 2287261'),
(14, 'Rathnapura', 'Embilipitiya', '047 2230261'),
(14, 'Rathnapura', 'Kahawatta', '045 2270261'),
(14, 'Rathnapura', 'Rathnapura', '045 2222261-66'),
(15, 'Trincomalee', 'Kantale', '026 2234261'),
(15, 'Trincomalee', 'Kinniya', '0262234546'),
(15, 'Trincomalee', 'Muthur', '0262238261'),
(15, 'Trincomalee', 'Trincomalee', '0262222261'),
(16, 'Vavuniya', 'Chettikulam', '024 2260903'),
(16, 'Vavuniya', 'Mannar', '023 2222261'),
(16, 'Vavuniya', 'Vavuniya', '024 2222761');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `lat`, `lng`) VALUES
(1, 'Akkaraipattu', 7.2167, 81.85),
(2, 'Ambagahawatta', 7.4, 81.3),
(3, 'Ampara', 7.2833, 81.6667),
(4, 'Bakmitiyawa', 7.02627, 81.6338),
(5, 'Deegawapiya', 7.2833, 81.6667),
(6, 'Devalahinda', 7.1889, 81.5778),
(7, 'Digamadulla Weeragoda', 7.2833, 81.6667),
(8, 'Dorakumbura', 7.35885, 81.2801),
(9, 'Gonagolla', 7.44985, 81.618),
(10, 'Hulannuge', 7.4, 81.3),
(11, 'Kalmunai', 7.4139, 81.8267),
(12, 'Kannakipuram', 7.2167, 81.85),
(13, 'Karativu', 7.3833, 81.8333),
(14, 'Kekirihena', 7.49072, 81.3108),
(15, 'Koknahara', 7.18483, 81.5558),
(16, 'Kolamanthalawa', 7.35173, 81.2499),
(17, 'Komari', 6.97696, 81.7888),
(18, 'Lahugala', 7.41557, 81.3395),
(19, 'Irakkamam', 7.1125, 81.8542),
(20, 'Mahaoya', 7.53525, 81.3511),
(21, 'Marathamune', 7.45, 81.8167),
(22, 'Namaloya', 7.1889, 81.5778),
(23, 'Navithanveli', 7.4333, 81.7833),
(24, 'Nintavur', 7.35, 81.85),
(25, 'Oluvil', 7.2833, 81.85),
(26, 'Padiyatalawa', 7.4, 81.2333),
(27, 'Pahalalanda', 7.21752, 81.5787),
(28, 'Panama', 6.8122, 81.7122),
(29, 'Pannalagama', 7.0667, 81.6167),
(30, 'Paragahakele', 7.25669, 81.6095),
(31, 'Periyaneelavanai', 7.434, 81.8142),
(32, 'Polwaga Janapadaya', 7.1889, 81.5778),
(33, 'Pottuvil', 6.8667, 81.8333),
(34, 'Sainthamaruthu', 7.3833, 81.8333),
(35, 'Samanthurai', 7.3833, 81.8333),
(36, 'Serankada', 7.46452, 81.2636),
(37, 'Tempitiya', 7.61037, 81.4299),
(38, 'Thambiluvil', 7.13223, 81.8191),
(39, 'Tirukovil', 7.1167, 81.85),
(40, 'Uhana', 7.36328, 81.6377),
(41, 'Wadinagala', 7.12785, 81.5692),
(42, 'Wanagamuwa', 7.1125, 81.8542),
(43, 'Angamuwa', 8.17764, 80.205),
(44, 'Anuradhapura', 8.35, 80.3833),
(45, 'Awukana', 7.9753, 80.5266),
(46, 'Bogahawewa', 8.32899, 80.2517),
(47, 'Dematawewa', 8.35737, 80.8701),
(48, 'Dimbulagala', 7.9167, 80.55),
(49, 'Dutuwewa', 8.65, 80.5167),
(50, 'Elayapattuwa', 8.41352, 80.3181),
(51, 'Ellewewa', 7.9167, 80.55),
(52, 'Eppawala', 8.1167, 80.7333),
(53, 'Etawatunuwewa', 8.5595, 80.5476),
(54, 'Etaweeragollewa', 8.61396, 80.5397),
(55, 'Galapitagala', 8.08984, 80.6855),
(56, 'Galenbindunuwewa', 8.5833, 80.55),
(57, 'Galkadawala', 8.41286, 80.3782),
(58, 'Galkiriyagama', 7.9414, 80.565),
(59, 'Galkulama', 8.27041, 80.5065),
(60, 'Galnewa', 8.2, 80.3667),
(61, 'Gambirigaswewa', 8.4667, 80.3667),
(62, 'Ganewalpola', 8.09053, 80.6282),
(63, 'Gemunupura', 8.0667, 80.6833),
(64, 'Getalawa', 8.6167, 80.5333),
(65, 'Gnanikulama', 8.29734, 80.4318),
(66, 'Gonahaddenawa', 8.5333, 80.5083),
(67, 'Habarana', 8.04753, 80.7487),
(68, 'Halmillawa Dambulla', 7.9474, 80.594),
(69, 'Halmillawetiya', 8.35, 80.2667),
(70, 'Hidogama', 8.25042, 80.4187),
(71, 'Horawpatana', 8.4333, 80.8667),
(72, 'Horiwila', 8.0667, 80.6833),
(73, 'Hurigaswewa', 8.1333, 80.3667),
(74, 'Hurulunikawewa', 8.6167, 80.5333),
(75, 'Ihala Puliyankulama', 8.15321, 80.56),
(76, 'Kagama', 8.06147, 80.478),
(77, 'Kahatagasdigiliya', 8.4167, 80.6833),
(78, 'Kahatagollewa', 8.45, 80.65),
(79, 'Kalakarambewa', 8.0833, 80.4667),
(80, 'Kalaoya', 8.0667, 80.6833),
(81, 'Kalawedi Ulpotha', 8.5333, 80.5083),
(82, 'Kallanchiya', 8.45, 80.55),
(83, 'Kalpitiya', 8.2333, 79.7667),
(84, 'Kalukele Badanagala', 7.9167, 80.55),
(85, 'Kapugallawa', 8.4233, 80.6783),
(86, 'Karagahawewa', 8.23416, 80.3228),
(87, 'Kashyapapura', 7.9167, 80.55),
(88, 'Kebithigollewa', 8.5333, 80.4833),
(89, 'Kekirawa', 8.03746, 80.598),
(90, 'Kendewa', 8.4833, 80.6),
(91, 'Kiralogama', 8.19407, 80.3701),
(92, 'Kirigalwewa', 8.53777, 80.5566),
(93, 'Kirimundalama', 8.2333, 79.7667),
(94, 'Kitulhitiyawa', 7.91659, 80.6381),
(95, 'Kurundankulama', 8.2, 80.45),
(96, 'Labunoruwa', 8.16803, 80.617),
(97, 'Ihalagama', 8.35, 80.5),
(98, 'Ipologama', 8.0833, 80.4667),
(99, 'Madatugama', 7.94004, 80.6382),
(100, 'Maha Elagamuwa', 7.99193, 80.6182),
(101, 'Mahabulankulama', 7.9753, 80.5266),
(102, 'Mahailluppallama', 8.106, 80.3619),
(103, 'Mahakanadarawa', 8.35, 80.5),
(104, 'Mahapothana', 8.4167, 80.6833),
(105, 'Mahasenpura', 8.5595, 80.5476),
(106, 'Mahawilachchiya', 8.2814, 80.4588),
(107, 'Mailagaswewa', 8.4, 80.6333),
(108, 'Malwanagama', 8.225, 80.3333),
(109, 'Maneruwa', 7.896, 80.476),
(110, 'Maradankadawala', 8.1333, 80.4833),
(111, 'Maradankalla', 8.3175, 80.5379),
(112, 'Medawachchiya', 8.54082, 80.496),
(113, 'Megodawewa', 8.2333, 80.7333),
(114, 'Mihintale', 8.35, 80.5),
(115, 'Morakewa', 8.51305, 80.7782),
(116, 'Mulkiriyawa', 8.4167, 80.6833),
(117, 'Muriyakadawala', 8.23646, 80.6547),
(118, 'Colombo 15', 6.95944, 79.8753),
(119, 'Nachchaduwa', 8.2667, 80.4667),
(120, 'Namalpura', 8.2333, 80.7333),
(121, 'Negampaha', 7.9872, 80.4597),
(122, 'Nochchiyagama', 8.2668, 80.2082),
(123, 'Nuwaragala', 7.9167, 80.55),
(124, 'Padavi Maithripura', 8.5595, 80.5476),
(125, 'Padavi Parakramapura', 8.5595, 80.5476),
(126, 'Padavi Sripura', 8.5595, 80.5476),
(127, 'Padavi Sritissapura', 8.5595, 80.5476),
(128, 'Padaviya', 8.5595, 80.5476),
(129, 'Padikaramaduwa', 8.2333, 80.7333),
(130, 'Pahala Halmillewa', 8.21672, 80.1912),
(131, 'Pahala Maragahawe', 8.0667, 80.6833),
(132, 'Pahalagama', 8.1869, 80.2838),
(133, 'Palugaswewa', 8.05354, 80.7192),
(134, 'Pandukabayapura', 8.4467, 80.4673),
(135, 'Pandulagama', 8.2814, 80.4588),
(136, 'Parakumpura', 8.4167, 80.6833),
(137, 'Parangiyawadiya', 8.49183, 80.91),
(138, 'Parasangahawewa', 8.4333, 80.4333),
(139, 'Pelatiyawa', 7.9167, 80.55),
(140, 'Pemaduwa', 8.2814, 80.4588),
(141, 'Perimiyankulama', 8.27058, 80.5358),
(142, 'Pihimbiyagolewa', 8.5595, 80.5476),
(143, 'Pubbogama', 7.9167, 80.6),
(144, 'Punewa', 8.6167, 80.4667),
(145, 'Rajanganaya', 8.1708, 80.2833),
(146, 'Rambewa', 8.4333, 80.5),
(147, 'Rampathwila', 8.4, 80.6333),
(148, 'Rathmalgahawewa', 8.5595, 80.5476),
(149, 'Saliyapura', 8.3389, 80.4333),
(150, 'Seeppukulama', 8.4, 80.6333),
(151, 'Senapura', 8.0833, 80.4667),
(152, 'Sivalakulama', 8.25237, 80.6417),
(153, 'Siyambalewa', 7.95, 80.5167),
(154, 'Sravasthipura', 8.2667, 80.4333),
(155, 'Talawa', 8.2167, 80.35),
(156, 'Tambuttegama', 8.15, 80.3),
(157, 'Tammennawa', 8.0333, 80.6),
(158, 'Tantirimale', 8.4, 80.3),
(159, 'Telhiriyawa', 8.15, 80.3333),
(160, 'Tirappane', 8.2167, 80.3833),
(161, 'Tittagonewa', 8.7167, 80.75),
(162, 'Udunuwara Colony', 8.2417, 80.1917),
(163, 'Upuldeniya', 8.4, 80.6333),
(164, 'Uttimaduwa', 8.25499, 80.5549),
(165, 'Vellamanal', 8.5167, 81.1833),
(166, 'Viharapalugama', 8.4, 80.3),
(167, 'Wahalkada', 8.5667, 80.6222),
(168, 'Wahamalgollewa', 8.47984, 80.4975),
(169, 'Walagambahuwa', 8.15313, 80.499),
(170, 'Walahaviddawewa', 8.5595, 80.5476),
(171, 'Welimuwapotana', 8.4333, 80.8667),
(172, 'Welioya Project', 8.5595, 80.5476),
(173, 'Akkarasiyaya', 6.7792, 80.9208),
(174, 'Aluketiyawa', 7.31715, 81.1271),
(175, 'Aluttaramma', 7.2167, 81.0667),
(176, 'Ambadandegama', 6.81591, 81.0565),
(177, 'Ambagasdowa', 6.92852, 80.8921),
(178, 'Arawa', 7.16277, 81.0776),
(179, 'Arawakumbura', 7.08493, 81.1988),
(180, 'Arawatta', 7.32871, 81.037),
(181, 'Atakiriya', 7.0667, 81.1056),
(182, 'Badulla', 6.99537, 81.0484),
(183, 'Baduluoya', 7.15185, 81.0239),
(184, 'Ballaketuwa', 6.86291, 81.0973),
(185, 'Bambarapana', 7.1167, 81.0375),
(186, 'Bandarawela', 6.82887, 80.9909),
(187, 'Beramada', 7.05571, 80.9872),
(188, 'Bibilegama', 6.88747, 81.1413),
(189, 'Boragas', 6.90163, 80.8402),
(190, 'Boralanda', 6.82864, 80.8816),
(191, 'Bowela', 6.95, 80.9333),
(192, 'Central Camp', 7.3589, 81.1759),
(193, 'Damanewela', 7.2125, 81.0583),
(194, 'Dambana', 7.3583, 81.1083),
(195, 'Dehiattakandiya', 7.2125, 81.0583),
(196, 'Demodara', 6.89906, 81.0533),
(197, 'Diganatenna', 6.8667, 80.9667),
(198, 'Dikkapitiya', 6.7381, 80.9669),
(199, 'Dimbulana', 7.0069, 80.9484),
(200, 'Divulapelessa', 7.2167, 81.0667),
(201, 'Diyatalawa', 6.8, 80.9667),
(202, 'Dulgolla', 6.81962, 81.0121),
(203, 'Ekiriyankumbura', 7.26974, 81.2267),
(204, 'Ella', 6.87449, 81.0509),
(205, 'Ettampitiya', 6.9342, 80.9853),
(206, 'Galauda', 7.03735, 80.9818),
(207, 'Galporuyaya', 7.4, 81.05),
(208, 'Gawarawela', 6.89739, 81.0697),
(209, 'Girandurukotte', 7.4, 81.05),
(210, 'Godunna', 7.07196, 80.975),
(211, 'Gurutalawa', 6.8431, 80.9228),
(212, 'Haldummulla', 6.77061, 80.8844),
(213, 'Hali Ela', 6.95, 81.0333),
(214, 'Hangunnawa', 6.94802, 80.8714),
(215, 'Haputale', 6.7667, 80.9667),
(216, 'Hebarawa', 7.2167, 81.0667),
(217, 'Heeloya', 6.8212, 80.9407),
(218, 'Helahalpe', 6.8212, 80.9407),
(219, 'Helapupula', 6.8556, 81.0722),
(220, 'Hopton', 6.9594, 81.1552),
(221, 'Idalgashinna', 6.7833, 80.9),
(222, 'Kahataruppa', 7.02371, 81.1052),
(223, 'Kalugahakandura', 7.12367, 81.0942),
(224, 'Kalupahana', 6.7703, 80.8545),
(225, 'Kebillawela', 6.81694, 80.9931),
(226, 'Kendagolla', 6.99077, 81.1101),
(227, 'Keselpotha', 7.32819, 81.0833),
(228, 'Ketawatta', 7.1035, 81.0808),
(229, 'Kiriwanagama', 6.97118, 80.9155),
(230, 'Koslanda', 6.75993, 81.0274),
(231, 'Kuruwitenna', 7.2167, 81.0667),
(232, 'Kuttiyagolla', 7.0167, 81.0833),
(233, 'Landewela', 7.00211, 81.0005),
(234, 'Liyangahawela', 6.81745, 81.0325),
(235, 'Lunugala', 7.0413, 81.1993),
(236, 'Lunuwatta', 6.95393, 80.9171),
(237, 'Madulsima', 7.04506, 81.1334),
(238, 'Mahiyanganaya', 7.2444, 81.1167),
(239, 'Makulella', 6.8212, 80.9407),
(240, 'Malgoda', 7.4, 81.05),
(241, 'Mapakadawewa', 7.3, 81.1167),
(242, 'Maspanna', 7.02443, 80.9422),
(243, 'Maussagolla', 6.89843, 81.1478),
(244, 'Mawanagama', 7.2125, 81.0583),
(245, 'Medawela Udukinda', 6.846, 80.9279),
(246, 'Meegahakiula', 7.0833, 80.9833),
(247, 'Metigahatenna', 6.9667, 81.0833),
(248, 'Mirahawatta', 6.8817, 80.9347),
(249, 'Miriyabedda', 6.9167, 81.15),
(250, 'Nawamedagama', 7.2125, 81.0583),
(251, 'Nelumgama', 7, 81.0917),
(252, 'Nikapotha', 6.74062, 80.9708),
(253, 'Nugatalawa', 6.9, 80.8833),
(254, 'Ohiya', 6.82135, 80.8418),
(255, 'Pahalarathkinda', 7.4, 81.05),
(256, 'Pallekiruwa', 7.00755, 81.227),
(257, 'Passara', 6.93502, 81.1512),
(258, 'Pattiyagedara', 6.8742, 80.9507),
(259, 'Pelagahatenna', 6.9594, 81.1552),
(260, 'Perawella', 6.94315, 80.8426),
(261, 'Pitamaruwa', 7.10655, 81.1359),
(262, 'Pitapola', 6.80369, 80.8845),
(263, 'Puhulpola', 6.90715, 80.9311),
(264, 'Rajagalatenna', 7.5458, 81.125),
(265, 'Rathkarawwa', 6.8, 80.9167),
(266, 'Ridimaliyadda', 7.2333, 81.1),
(267, 'Silmiyapura', 6.91239, 80.844),
(268, 'Sirimalgoda', 7.00386, 81.0737),
(269, 'Siripura', 7.2125, 81.0583),
(270, 'Sorabora Colony', 7.3583, 81.1083),
(271, 'Soragune', 6.8333, 80.8778),
(272, 'Soranathota', 7.0167, 81.05),
(273, 'Taldena', 7.0833, 81.05),
(274, 'Timbirigaspitiya', 7.0333, 81.05),
(275, 'Uduhawara', 6.94706, 80.8588),
(276, 'Uraniya', 7.23714, 81.1028),
(277, 'Uva Karandagolla', 6.8333, 81.0667),
(278, 'Uva Mawelagama', 6.7333, 81.0167),
(279, 'Uva Tenna', 6.8333, 80.8778),
(280, 'Uva Tissapura', 7.3, 81.1167),
(281, 'Welimada', 6.90606, 80.9132),
(282, 'Weranketagoda', 7.5458, 81.125),
(283, 'Wewatta', 7.33773, 81.2013),
(284, 'Wineethagama', 7.029, 80.937),
(285, 'Yalagamuwa', 7.04783, 80.9505),
(286, 'Yalwela', 7.2667, 81.15),
(287, 'Addalaichenai', 6.71656, 80.0632),
(288, 'Ampilanthurai', 7.8597, 81.4411),
(289, 'Araipattai', 7.66771, 81.7253),
(290, 'Ayithiyamalai', 7.67093, 81.5748),
(291, 'Bakiella', 7.5083, 81.7583),
(292, 'Batticaloa', 7.7167, 81.7),
(293, 'Cheddipalayam', 7.57516, 81.7832),
(294, 'Chenkaladi', 7.7833, 81.6),
(295, 'Eravur', 7.76852, 81.6198),
(296, 'Kaluwanchikudi', 7.5167, 81.7833),
(297, 'Kaluwankemy', 7.8, 81.5667),
(298, 'Kannankudah', 7.67551, 81.6741),
(299, 'Karadiyanaru', 7.68948, 81.5311),
(300, 'Kathiraveli', 8.24393, 81.3603),
(301, 'Kattankudi', 7.675, 81.73),
(302, 'Kiran', 7.86684, 81.5297),
(303, 'Kirankulam', 7.61563, 81.7642),
(304, 'Koddaikallar', 7.6389, 81.6639),
(305, 'Kokkaddicholai', 7.8597, 81.4411),
(306, 'Kurukkalmadam', 7.59407, 81.775),
(307, 'Mandur', 7.48211, 81.7624),
(308, 'Miravodai', 7.9, 81.5167),
(309, 'Murakottanchanai', 7.8667, 81.5333),
(310, 'Navagirinagar', 7.525, 81.725),
(311, 'Navatkadu', 7.5833, 81.7167),
(312, 'Oddamavadi', 7.9167, 81.5167),
(313, 'Palamunai', 7.4833, 81.75),
(314, 'Pankudavely', 7.75, 81.5667),
(315, 'Periyaporativu', 7.53624, 81.7646),
(316, 'Periyapullumalai', 7.56125, 81.4743),
(317, 'Pillaiyaradi', 7.75, 81.6333),
(318, 'Punanai', 7.9667, 81.3833),
(319, 'Thannamunai', 7.76355, 81.6459),
(320, 'Thettativu', 7.5833, 81.7833),
(321, 'Thikkodai', 7.52527, 81.6842),
(322, 'Thirupalugamam', 7.525, 81.725),
(323, 'Unnichchai', 7.6167, 81.55),
(324, 'Vakaneri', 7.9167, 81.4333),
(325, 'Vakarai', 8.16597, 81.4156),
(326, 'Valaichenai', 7.7, 81.6),
(327, 'Vantharumoolai', 7.80745, 81.5915),
(328, 'Vellavely', 7.5, 81.7333),
(329, 'Akarawita', 6.95, 80.1),
(330, 'Ambalangoda', 6.77533, 79.9641),
(331, 'Athurugiriya', 6.87307, 79.9972),
(332, 'Avissawella', 6.955, 80.2117),
(333, 'Batawala', 6.87792, 80.0516),
(334, 'Battaramulla', 6.9003, 79.9221),
(335, 'Biyagama', 6.9408, 79.9889),
(336, 'Bope', 6.8333, 80.1167),
(337, 'Boralesgamuwa', 6.8425, 79.9006),
(338, 'Colombo 8', 6.91472, 79.8778),
(339, 'Dedigamuwa', 6.9115, 80.0622),
(340, 'Dehiwala', 6.85639, 79.8652),
(341, 'Deltara', 6.7833, 79.9167),
(342, 'Habarakada', 6.88252, 80.0177),
(343, 'Hanwella', 6.90599, 80.0833),
(344, 'Hiripitya', 6.85, 79.95),
(345, 'Hokandara', 6.89024, 79.9699),
(346, 'Homagama', 6.85685, 80.0054),
(347, 'Horagala', 6.80763, 80.067),
(348, 'Kaduwela', 6.9305, 79.9848),
(349, 'Kaluaggala', 6.9167, 80.1),
(350, 'Kapugoda', 6.9486, 80.1),
(351, 'Kehelwatta', 6.75, 79.9167),
(352, 'Kiriwattuduwa', 6.80416, 80.0098),
(353, 'Kolonnawa', 6.93303, 79.8881),
(354, 'Kosgama', 6.9333, 80.1411),
(355, 'Madapatha', 6.76682, 79.9301),
(356, 'Maharagama', 6.8434, 79.9328),
(357, 'Malabe', 6.90124, 79.9581),
(358, 'Moratuwa', 6.7733, 79.8825),
(359, 'Mount Lavinia', 6.83886, 79.8631),
(360, 'Mullegama', 6.8874, 80.013),
(361, 'Napawela', 6.9531, 80.2183),
(362, 'Nugegoda', 6.87756, 79.8862),
(363, 'Padukka', 6.83783, 80.0903),
(364, 'Pannipitiya', 6.844, 79.9445),
(365, 'Piliyandala', 6.7981, 79.9264),
(366, 'Pitipana Homagama', 6.8477, 80.016),
(367, 'Polgasowita', 6.7842, 79.9811),
(368, 'Pugoda', 6.9703, 80.1222),
(369, 'Ranala', 6.91525, 80.033),
(370, 'Siddamulla', 6.81578, 79.956),
(371, 'Siyambalagoda', 6.80004, 79.9668),
(372, 'Sri Jayawardenepura', 6.8897, 79.9359),
(373, 'Talawatugoda', 6.8692, 79.9411),
(374, 'Tummodara', 6.9061, 80.1353),
(375, 'Waga', 6.9061, 80.1353),
(376, 'Colombo 6', 6.87466, 79.8605),
(377, 'Agaliya', 6.1833, 80.2),
(378, 'Ahangama', 5.97077, 80.3702),
(379, 'Ahungalla', 6.31522, 80.0303),
(380, 'Akmeemana', 6.1845, 80.3032),
(381, 'Alawatugoda', 6.4167, 80),
(382, 'Aluthwala', 6.1808, 80.1365),
(383, 'Ampegama', 6.19391, 80.1445),
(384, 'Amugoda', 6.31463, 80.221),
(385, 'Anangoda', 6.0722, 80.2389),
(386, 'Angulugaha', 6.03696, 80.3222),
(387, 'Ankokkawala', 6.05329, 80.274),
(388, 'Aselapura', 6.3167, 80.0333),
(389, 'Baddegama', 6.16598, 80.2018),
(390, 'Balapitiya', 6.26925, 80.0361),
(391, 'Banagala', 6.2706, 80.42),
(392, 'Batapola', 6.2357, 80.12),
(393, 'Bentota', 6.4211, 79.9989),
(394, 'Boossa', 6.2233, 80.2),
(395, 'Dellawa', 6.33501, 80.4527),
(396, 'Dikkumbura', 6.01295, 80.3762),
(397, 'Dodanduwa', 6.0967, 80.1456),
(398, 'Ella Tanabaddegama', 6.2922, 80.1988),
(399, 'Elpitiya', 6.30021, 80.1719),
(400, 'Galle', 6.0536, 80.2117),
(401, 'Ginimellagaha', 6.2233, 80.2),
(402, 'Gintota', 6.0564, 80.1839),
(403, 'Godahena', 6.2333, 80.0667),
(404, 'Gonamulla Junction', 6.0667, 80.3),
(405, 'Gonapinuwala', 6.2233, 80.2),
(406, 'Habaraduwa', 6.0043, 80.326),
(407, 'Haburugala', 6.4052, 80.0383),
(408, 'Hikkaduwa', 6.13953, 80.1132),
(409, 'Hiniduma', 6.31603, 80.3289),
(410, 'Hiyare', 6.0799, 80.3179),
(411, 'Kahaduwa', 6.2244, 80.21),
(412, 'Kahawa', 6.18543, 80.076),
(413, 'Karagoda', 6.08418, 80.395),
(414, 'Karandeniya', 6.26047, 80.0725),
(415, 'Kosgoda', 6.33229, 80.0283),
(416, 'Kottawagama', 6.1375, 80.3419),
(417, 'Kottegoda', 6.1667, 80.1),
(418, 'Kuleegoda', 6.2167, 80.1167),
(419, 'Magedara', 6.10813, 80.3939),
(420, 'Mahawela Sinhapura', 6.3167, 80.0333),
(421, 'Mapalagama', 6.23471, 80.2778),
(422, 'Mapalagama Central', 6.2167, 80.3),
(423, 'Mattaka', 6.30237, 80.2542),
(424, 'Meda-Keembiya', 6.1845, 80.3032),
(425, 'Meetiyagoda', 6.18914, 80.0935),
(426, 'Nagoda', 6.2013, 80.2778),
(427, 'Nakiyadeniya', 6.14303, 80.3382),
(428, 'Nawandagala', 6.30466, 80.1342),
(429, 'Neluwa', 6.37393, 80.3633),
(430, 'Nindana', 6.20773, 80.1077),
(431, 'Pahala Millawa', 6.29399, 80.4754),
(432, 'Panangala', 6.27418, 80.3345),
(433, 'Pannimulla Panagoda', 6.36, 80.3653),
(434, 'Parana Thanayamgoda', 6.2167, 80.3),
(435, 'Patana', 6.1333, 80.1167),
(436, 'Pitigala', 6.34889, 80.2178),
(437, 'Poddala', 6.1167, 80.2167),
(438, 'Polgampola', 6.3244, 80.4383),
(439, 'Porawagama', 6.27957, 80.2318),
(440, 'Rantotuwila', 6.3833, 80.0833),
(441, 'Talagampola', 6.0667, 80.3),
(442, 'Talgaspe', 6.3, 80.2),
(443, 'Talpe', 6.0061, 80.2961),
(444, 'Tawalama', 6.3333, 80.3333),
(445, 'Tiranagama', 6.1333, 80.1167),
(446, 'Udalamatta', 6.18924, 80.3061),
(447, 'Udugama', 6.18847, 80.339),
(448, 'Uluvitike', 6.3056, 80.309),
(449, 'Unawatuna', 6.0169, 80.2499),
(450, 'Unawitiya', 6.2417, 80.225),
(451, 'Uragaha', 6.35, 80.1167),
(452, 'Uragasmanhandiya', 6.35846, 80.0823),
(453, 'Wakwella', 6.1, 80.1833),
(454, 'Walahanduwa', 6.05443, 80.2518),
(455, 'Wanchawela', 6.0333, 80.3167),
(456, 'Wanduramba', 6.13639, 80.2528),
(457, 'Warukandeniya', 6.38157, 80.4313),
(458, 'Watugedara', 6.25, 80.05),
(459, 'Weihena', 6.31013, 80.2339),
(460, 'Welikanda', 6.3167, 80.0333),
(461, 'Wilanagama', 6.4167, 80),
(462, 'Yakkalamulla', 6.10903, 80.3492),
(463, 'Yatalamatta', 6.17225, 80.2931),
(464, 'Akaragama', 7.2626, 79.9581),
(465, 'Ambagaspitiya', 7.0833, 80.0667),
(466, 'Ambepussa', 7.25, 80.1667),
(467, 'Andiambalama', 7.18835, 79.9023),
(468, 'Attanagalla', 7.1119, 80.1328),
(469, 'Badalgama', 7.29122, 79.978),
(470, 'Banduragoda', 7.2319, 80.0678),
(471, 'Batuwatta', 7.0584, 79.932),
(472, 'Bemmulla', 7.12093, 80.0282),
(473, 'Biyagama IPZ', 6.9492, 80.0153),
(474, 'Bokalagama', 7.2333, 80.15),
(475, 'Bollete (WP)', 7.0667, 79.95),
(476, 'Bopagama', 7.07964, 80.1587),
(477, 'Buthpitiya', 7.04285, 80.0519),
(478, 'Dagonna', 7.22157, 79.9275),
(479, 'Danowita', 7.2028, 80.1758),
(480, 'Debahera', 7.1389, 80.0981),
(481, 'Dekatana', 6.96832, 80.0354),
(482, 'Delgoda', 6.98658, 80.0158),
(483, 'Delwagura', 7.26537, 80.0033),
(484, 'Demalagama', 6.98893, 80.0469),
(485, 'Demanhandiya', 7.2333, 79.9),
(486, 'Dewalapola', 7.16255, 79.9974),
(487, 'Divulapitiya', 7.2167, 80.0156),
(488, 'Divuldeniya', 7.3, 80.1),
(489, 'Dompe', 6.94981, 80.0551),
(490, 'Dunagaha', 7.2342, 79.9756),
(491, 'Ekala', 7.10556, 79.9153),
(492, 'Ellakkala', 7.13597, 80.1325),
(493, 'Essella', 7.17874, 80.0216),
(494, 'Galedanda', 6.9642, 79.9306),
(495, 'Gampaha', 7.0917, 79.9942),
(496, 'Ganemulla', 7.06418, 79.9633),
(497, 'Giriulla', 7.3275, 80.1267),
(498, 'Gonawala', 6.9612, 79.9992),
(499, 'Halpe', 7.26194, 80.1082),
(500, 'Hapugastenna', 7.1, 80.1667),
(501, 'Heiyanthuduwa', 6.96283, 79.9633),
(502, 'Hinatiyana Madawala', 7.1667, 79.95),
(503, 'Hiswella', 7.02156, 80.1609),
(504, 'Horampella', 7.18519, 79.9768),
(505, 'Hunumulla', 7.24493, 79.9969),
(506, 'Hunupola', 7.11146, 80.1306),
(507, 'Ihala Madampella', 7.25035, 79.9609),
(508, 'Imbulgoda', 7.035, 79.9931),
(509, 'Ja-Ela', 7.07615, 79.8949),
(510, 'Kadawatha', 7.0258, 79.9882),
(511, 'Kahatowita', 7.0667, 80.1167),
(512, 'Kalagedihena', 7.118, 80.058),
(513, 'Kaleliya', 7.195, 80.1136),
(514, 'Kandana', 7.05056, 79.8951),
(515, 'Katana', 7.2517, 79.9078),
(516, 'Katudeniya', 7.3, 80.0833),
(517, 'Katunayake', 7.1647, 79.8731),
(518, 'Katunayake Air Force Camp', 7.1407, 79.8782),
(519, 'Katunayake(FTZ)', 7.1407, 79.8782),
(520, 'Katuwellegama', 7.20856, 79.9457),
(521, 'Kelaniya', 6.95636, 79.9214),
(522, 'Kimbulapitiya', 7.20226, 79.9089),
(523, 'Kirindiwela', 7.04422, 80.1267),
(524, 'Kitalawalana', 7.3, 80.1),
(525, 'Kochchikade', 7.2581, 79.8542),
(526, 'Kotadeniyawa', 7.27986, 80.0558),
(527, 'Kotugoda', 7.1217, 79.9297),
(528, 'Kumbaloluwa', 7.17938, 80.0822),
(529, 'Loluwagoda', 7.29459, 80.1266),
(530, 'Mabodale', 7.2, 80.0167),
(531, 'Madelgamuwa', 7.11006, 79.9482),
(532, 'Makewita', 7.1, 79.9333),
(533, 'Makola', 6.98318, 79.9525),
(534, 'Malwana', 6.95199, 80.0126),
(535, 'Mandawala', 7.00307, 80.0971),
(536, 'Marandagahamula', 7.2447, 79.9696),
(537, 'Mellawagedara', 7.28581, 80.024),
(538, 'Minuwangoda', 7.17646, 79.9549),
(539, 'Mirigama', 7.2414, 80.1325),
(540, 'Miriswatta', 7.0711, 80.0183),
(541, 'Mithirigala', 6.9648, 80.0648),
(542, 'Muddaragama', 7.2167, 80.05),
(543, 'Mudungoda', 7.0647, 79.9991),
(544, 'Mulleriyawa New Town', 6.9301, 80.0549),
(545, 'Naranwala', 7.00163, 80.0274),
(546, 'Nawana', 7.27006, 80.0926),
(547, 'Nedungamuwa', 7.05, 80.0333),
(548, 'Negombo', 7.2086, 79.8358),
(549, 'Nikadalupotha', 7.1167, 80.1333),
(550, 'Nikahetikanda', 7.09909, 80.1796),
(551, 'Nittambuwa', 7.14424, 80.0962),
(552, 'Niwandama', 7.07876, 79.9283),
(553, 'Opatha', 7.13204, 79.9214),
(554, 'Pamunugama', 7.09436, 79.8446),
(555, 'Pamunuwatta', 7.21468, 80.1397),
(556, 'Panawala', 6.9833, 80.0333),
(557, 'Pasyala', 7.17293, 80.1159),
(558, 'Peliyagoda', 6.96098, 79.8789),
(559, 'Pepiliyawala', 7.00234, 80.1289),
(560, 'Pethiyagoda', 7.1167, 80.0167),
(561, 'Polpithimukulana', 7.0444, 79.8782),
(562, 'Puwakpitiya', 7.0405, 80.0645),
(563, 'Radawadunna', 7.17728, 80.1413),
(564, 'Radawana', 7.02987, 80.1009),
(565, 'Raddolugama', 7.14066, 79.8982),
(566, 'Ragama', 7.02528, 79.9174),
(567, 'Ruggahawila', 7.0667, 80.1167),
(568, 'Seeduwa', 7.13206, 79.885),
(569, 'Siyambalape', 6.96454, 79.9864),
(570, 'Talahena', 7.1667, 79.8167),
(571, 'Thambagalla', 7.1167, 80.1333),
(572, 'Thimbirigaskatuwa', 7.2669, 79.9495),
(573, 'Tittapattara', 6.9297, 80.0889),
(574, 'Udathuthiripitiya', 7.075, 80.0333),
(575, 'Udugampola', 7.1167, 79.9833),
(576, 'Uggalboda', 7.13555, 79.9483),
(577, 'Urapola', 7.10479, 80.1369),
(578, 'Uswetakeiyawa', 7.03105, 79.8603),
(579, 'Veyangoda', 7.15698, 80.0958),
(580, 'Walgammulla', 7.0719, 80.1165),
(581, 'Walpita', 7.25813, 80.0347),
(582, 'Walpola (WP)', 7.0418, 79.9257),
(583, 'Wathurugama', 7.0421, 80.0701),
(584, 'Watinapaha', 7.2, 79.9833),
(585, 'Wattala', 6.99004, 79.8922),
(586, 'Weboda', 7.0167, 79.9833),
(587, 'Wegowwa', 7.17844, 79.9621),
(588, 'Weweldeniya', 7.1834, 80.1446),
(589, 'Yakkala', 7.1167, 80.05),
(590, 'Yatiyana', 7.185, 79.9319),
(591, 'Ambalantota', 6.11449, 81.026),
(592, 'Angunakolapelessa', 6.16226, 80.8995),
(593, 'Angunakolawewa', 6.38913, 81.0932),
(594, 'Bandagiriya Colony', 6.1833, 81.1389),
(595, 'Barawakumbuka', 6.1667, 80.8167),
(596, 'Beliatta', 6.04864, 80.7343),
(597, 'Beragama', 6.15, 81.0667),
(598, 'Beralihela', 6.2556, 81.2944),
(599, 'Bundala', 6.19516, 81.2505),
(600, 'Ellagala', 6.26867, 81.3595),
(601, 'Gangulandeniya', 6.2833, 80.7167),
(602, 'Getamanna', 6.03624, 80.6691),
(603, 'Goda Koggalla', 6.0333, 80.75),
(604, 'Gonagamuwa Uduwila', 6.25, 81.2917),
(605, 'Gonnoruwa', 6.23044, 81.1125),
(606, 'Hakuruwela', 6.14646, 80.8305),
(607, 'Hambantota', 6.12756, 81.1113),
(608, 'Handugala', 6.18888, 80.6241),
(609, 'Hungama', 6.10801, 80.9271),
(610, 'Ihala Beligalla', 6.09238, 80.7473),
(611, 'Iththa Demaliya', 6.16743, 80.7352),
(612, 'Julampitiya', 6.2261, 80.7403),
(613, 'Kahandamodara', 6.07865, 80.9029),
(614, 'Kariyamaditta', 6.25736, 80.8094),
(615, 'Katuwana', 6.2667, 80.6972),
(616, 'Kawantissapura', 6.2786, 81.2524),
(617, 'Kirama', 6.2117, 80.6653),
(618, 'Kirinda', 6.26898, 81.2906),
(619, 'Lunama', 6.09852, 80.9715),
(620, 'Lunugamwehera', 6.3417, 81.15),
(621, 'Magama', 6.28011, 81.2704),
(622, 'Mahagalwewa', 6.1833, 81.1389),
(623, 'Mamadala', 6.15813, 80.9668),
(624, 'Medamulana', 6.17588, 80.77),
(625, 'Middeniya', 6.2494, 80.7672),
(626, 'Meegahajandura', 6.1833, 81.1389),
(627, 'Modarawana', 6.11758, 80.7208),
(628, 'Mulkirigala', 6.12, 80.7397),
(629, 'Nakulugamuwa', 6.1842, 80.9063),
(630, 'Netolpitiya', 6.06685, 80.8507),
(631, 'Nihiluwa', 6.07715, 80.6965),
(632, 'Padawkema', 6.35, 81.1667),
(633, 'Pahala Andarawewa', 6.1833, 81.1389),
(634, 'Rammalawarapitiya', 6.2117, 80.6653),
(635, 'Ranakeliya', 6.2167, 81.3),
(636, 'Ranmuduwewa', 6.1833, 81.1389),
(637, 'Ranna', 6.10338, 80.8902),
(638, 'Ratmalwala', 6.2667, 80.85),
(639, 'Ruhunu Ridiyagama', 6.1375, 81.0042),
(640, 'Sooriyawewa Town', 6.1833, 81.1389),
(641, 'Tangalla', 6.0231, 80.7889),
(642, 'Tissamaharama', 6.37033, 81.3281),
(643, 'Uda Gomadiya', 6.2667, 80.6972),
(644, 'Udamattala', 6.3333, 81.1333),
(645, 'Uswewa', 6.24625, 80.8622),
(646, 'Vitharandeniya', 6.1824, 80.806),
(647, 'Walasmulla', 6.15, 80.7),
(648, 'Weeraketiya', 6.135, 80.7865),
(649, 'Weerawila', 6.3417, 81.15),
(650, 'Weerawila NewTown', 6.2556, 81.2944),
(651, 'Wekandawela', 6.135, 80.7865),
(652, 'Weligatta', 6.2059, 81.196),
(653, 'Yatigala', 6.1, 80.6833),
(654, 'Jaffna', 9.66067, 80.0227),
(655, 'Agalawatta', 6.5415, 80.1558),
(656, 'Alubomulla', 6.71198, 79.9659),
(657, 'Anguruwatota', 6.6383, 80.0861),
(658, 'Atale', 6.45, 80.2667),
(659, 'Baduraliya', 6.5231, 80.2324),
(660, 'Bandaragama', 6.71026, 79.9861),
(661, 'Batugampola', 6.76907, 80.1428),
(662, 'Bellana', 6.51894, 80.1831),
(663, 'Beruwala', 6.4739, 79.9842),
(664, 'Bolossagama', 6.62099, 80.0153),
(665, 'Bombuwala', 6.5833, 80.0167),
(666, 'Boralugoda', 6.43871, 80.2788),
(667, 'Bulathsinhala', 6.6662, 80.1649),
(668, 'Danawala Thiniyawala', 6.4333, 80.2667),
(669, 'Delmella', 6.67833, 80.2105),
(670, 'Dharga Town', 6.648, 80.0089),
(671, 'Diwalakada', 6.69677, 80.147),
(672, 'Dodangoda', 6.55595, 80.0068),
(673, 'Dombagoda', 6.6618, 80.0533),
(674, 'Ethkandura', 6.4415, 80.1807),
(675, 'Galpatha', 6.5983, 80.0015),
(676, 'Gamagoda', 6.5971, 80.0055),
(677, 'Gonagalpura', 6.6307, 80.0169),
(678, 'Gonapola Junction', 6.6944, 80.0333),
(679, 'Govinna', 6.66334, 80.1163),
(680, 'Gurulubadda', 6.5333, 80.2667),
(681, 'Halkandawila', 6.5167, 80.0167),
(682, 'Haltota', 6.69554, 80.0213),
(683, 'Halvitigala Colony', 6.5791, 80.2233),
(684, 'Halwala', 6.41652, 80.1066),
(685, 'Halwatura', 6.7, 80.2),
(686, 'Handapangoda', 6.78975, 80.1408),
(687, 'Hedigalla Colony', 6.5333, 80.2667),
(688, 'Henegama', 6.7167, 80.0333),
(689, 'Hettimulla', 6.46136, 79.9926),
(690, 'Horana', 6.71939, 80.0616),
(691, 'Ittapana', 6.42254, 80.0795),
(692, 'Kahawala', 6.7833, 80.1),
(693, 'Kalawila Kiranthidiya', 6.4619, 80.0004),
(694, 'Kalutara', 6.58133, 79.9585),
(695, 'Kananwila', 6.7667, 80.05),
(696, 'Kandanagama', 6.7667, 80.0778),
(697, 'Kelinkanda', 6.58713, 80.2932),
(698, 'Kitulgoda', 6.5167, 80.1833),
(699, 'Koholana', 6.61815, 79.9893),
(700, 'Kuda Uduwa', 6.74787, 80.0785),
(701, 'Labbala', 6.4833, 80),
(702, 'Ihalahewessa', 6.4415, 80.1807),
(703, 'Induruwa', 6.4681, 80.0257),
(704, 'Ingiriya', 6.7296, 80.0604),
(705, 'Maggona', 6.50316, 79.9776),
(706, 'Mahagama', 6.62018, 80.1542),
(707, 'Mahakalupahana', 6.3917, 80.1417),
(708, 'Maharangalla', 6.4667, 80),
(709, 'Malgalla Talangalla', 6.5791, 80.2233),
(710, 'Matugama', 6.5222, 80.1144),
(711, 'Meegahatenna', 6.3637, 80.285),
(712, 'Meegama', 6.648, 80.0089),
(713, 'Meegoda', 6.8053, 80.0829),
(714, 'Millaniya', 6.68621, 80.0172),
(715, 'Millewa', 6.7833, 80.0667),
(716, 'Miwanapalana', 6.75, 80.1),
(717, 'Molkawa', 6.60773, 80.2386),
(718, 'Morapitiya', 6.52713, 80.2637),
(719, 'Morontuduwa', 6.65, 79.9667),
(720, 'Nawattuduwa', 6.5019, 80.0937),
(721, 'Neboda', 6.5906, 80.0842),
(722, 'Padagoda', 6.45698, 80.009),
(723, 'Pahalahewessa', 6.4333, 80.2667),
(724, 'Paiyagala', 6.5167, 80.0167),
(725, 'Panadura', 6.7133, 79.9042),
(726, 'Pannala', 6.4833, 80),
(727, 'Paragastota', 6.6667, 80),
(728, 'Paragoda', 6.62711, 80.2411),
(729, 'Paraigama', 6.4167, 80.1167),
(730, 'Pelanda', 6.6056, 80.2333),
(731, 'Pelawatta', 6.38523, 80.208),
(732, 'Pimbura', 6.571, 80.1613),
(733, 'Pitagaldeniya', 6.45, 80.2667),
(734, 'Pokunuwita', 6.7333, 80.0333),
(735, 'Poruwedanda', 6.7333, 80.1167),
(736, 'Ratmale', 6.45, 80.2),
(737, 'Remunagoda', 6.59499, 80.0313),
(738, 'Talgaswela', 6.4415, 80.1807),
(739, 'Tebuwana', 6.5944, 80.0611),
(740, 'Uduwara', 6.6167, 80.0667),
(741, 'Utumgama', 6.3917, 80.1417),
(742, 'Veyangalla', 6.5422, 80.1583),
(743, 'Wadduwa', 6.66712, 79.924),
(744, 'Walagedara', 6.43778, 80.0714),
(745, 'Walallawita', 6.3667, 80.2),
(746, 'Waskaduwa', 6.6317, 79.9442),
(747, 'Welipenna', 6.46645, 80.1018),
(748, 'Weliveriya', 6.7167, 80.0333),
(749, 'Welmilla Junction', 6.7072, 80.01),
(750, 'Weragala', 6.52706, 80.0041),
(751, 'Yagirala', 6.37871, 80.1618),
(752, 'Yatadolawatta', 6.52309, 80.0644),
(753, 'Yatawara Junction', 6.5983, 80.0015),
(754, 'Aludeniya', 7.37049, 80.4665),
(755, 'Ambagahapelessa', 7.2438, 81.0026),
(756, 'Ambagamuwa Udabulathgama', 7.0333, 80.5),
(757, 'Ambatenna', 7.3472, 80.6192),
(758, 'Ampitiya', 7.2667, 80.65),
(759, 'Ankumbura', 7.43415, 80.5687),
(760, 'Atabage', 7.1333, 80.6),
(761, 'Balana', 7.26903, 80.4855),
(762, 'Bambaragahaela', 7.0523, 80.5023),
(763, 'Batagolladeniya', 7.41596, 80.5767),
(764, 'Batugoda', 7.36627, 80.596),
(765, 'Batumulla', 7.25609, 80.9789),
(766, 'Bawlana', 7.21139, 80.7188),
(767, 'Bopana', 7.3, 80.9),
(768, 'Danture', 7.2833, 80.5333),
(769, 'Dedunupitiya', 7.3333, 80.4333),
(770, 'Dekinda', 7.01469, 80.5099),
(771, 'Deltota', 7.2, 80.6667),
(772, 'Divulankadawala', 7.175, 80.55),
(773, 'Dolapihilla', 7.39358, 80.5847),
(774, 'Dolosbage', 7.0806, 80.4731),
(775, 'Dunuwila', 7.3833, 80.6333),
(776, 'Etulgama', 7.2333, 80.65),
(777, 'Galaboda', 6.9875, 80.5319),
(778, 'Galagedara', 7.36972, 80.5203),
(779, 'Galaha', 7.19576, 80.6687),
(780, 'Galhinna', 7.41836, 80.56),
(781, 'Gampola', 7.1647, 80.5767),
(782, 'Gelioya', 7.2136, 80.6017),
(783, 'Godamunna', 7.22731, 80.6974),
(784, 'Gomagoda', 7.3167, 80.7333),
(785, 'Gonagantenna', 7.1517, 80.7118),
(786, 'Gonawalapatana', 7.0358, 80.5262),
(787, 'Gunnepana', 7.2696, 80.6537),
(788, 'Gurudeniya', 7.26595, 80.7029),
(789, 'Hakmana', 7.3347, 80.824),
(790, 'Handaganawa', 7.27745, 80.9895),
(791, 'Handawalapitiya', 7.2, 80.6667),
(792, 'Handessa', 7.23005, 80.5808),
(793, 'Hanguranketha', 7.1517, 80.7118),
(794, 'Harangalagama', 7.0271, 80.5493),
(795, 'Hataraliyadda', 7.3333, 80.4667),
(796, 'Hindagala', 7.23151, 80.6008),
(797, 'Hondiyadeniya', 7.1364, 80.5766),
(798, 'Hunnasgiriya', 7.29876, 80.8498),
(799, 'Inguruwatta', 7.17504, 80.5998),
(800, 'Jambugahapitiya', 7.3833, 80.6333),
(801, 'Kadugannawa', 7.2536, 80.5275),
(802, 'Kahataliyadda', 7.376, 80.8213),
(803, 'Kalugala', 7.39014, 80.883),
(804, 'Kandy', 7.2964, 80.635),
(805, 'Kapuliyadde', 7.2401, 80.6808),
(806, 'Katugastota', 7.3161, 80.6211),
(807, 'Katukitula', 7.1089, 80.6339),
(808, 'Kelanigama', 7.0049, 80.5182),
(809, 'Kengalla', 7.29646, 80.7118),
(810, 'Ketaboola', 7.0271, 80.5493),
(811, 'Ketakumbura', 7.21053, 80.5717),
(812, 'Kobonila', 7.376, 80.8213),
(813, 'Kolabissa', 7.225, 80.7167),
(814, 'Kolongoda', 7.3552, 80.8375),
(815, 'Kulugammana', 7.31519, 80.5903),
(816, 'Kumbukkandura', 7.2969, 80.7686),
(817, 'Kumburegama', 7.35728, 80.5513),
(818, 'Kundasale', 7.2667, 80.6833),
(819, 'Leemagahakotuwa', 7.2333, 80.5833),
(820, 'Ihala Kobbekaduwa', 7.3167, 80.5833),
(821, 'Lunugama', 7.1984, 80.5782),
(822, 'Lunuketiya Maditta', 7.3292, 80.716),
(823, 'Madawala Bazaar', 7.2696, 80.6537),
(824, 'Madawalalanda', 7.3792, 80.4982),
(825, 'Madugalla', 7.2658, 80.8821),
(826, 'Madulkele', 7.40028, 80.7289),
(827, 'Mahadoraliyadda', 7.3, 80.85),
(828, 'Mahamedagama', 7.225, 80.7167),
(829, 'Mahanagapura', 7.3792, 80.4982),
(830, 'Mailapitiya', 7.1517, 80.7118),
(831, 'Makkanigama', 7.3833, 80.6333),
(832, 'Makuldeniya', 7.34171, 80.7775),
(833, 'Mangalagama', 7.28586, 80.5637),
(834, 'Mapakanda', 7.00789, 80.5311),
(835, 'Marassana', 7.22166, 80.7323),
(836, 'Marymount Colony', 7.1517, 80.7118),
(837, 'Mawatura', 7.1, 80.5667),
(838, 'Medamahanuwara', 7.3, 80.85),
(839, 'Medawala Harispattuwa', 7.3417, 80.6833),
(840, 'Meetalawa', 7.0986, 80.4699),
(841, 'Megoda Kalugamuwa', 7.2631, 80.6028),
(842, 'Menikdiwela', 7.28846, 80.5017),
(843, 'Menikhinna', 7.3167, 80.7),
(844, 'Mimure', 7.4333, 80.8333),
(845, 'Minigamuwa', 7.3333, 80.5167),
(846, 'Minipe', 7.22356, 80.991),
(847, 'Moragahapallama', 7.3792, 80.4982),
(848, 'Murutalawa', 7.3, 80.5667),
(849, 'Muruthagahamulla', 7.1364, 80.5766),
(850, 'Nanuoya', 7.1171, 80.6387),
(851, 'Naranpanawa', 7.33973, 80.7298),
(852, 'Narawelpita', 7.3167, 80.8),
(853, 'Nawalapitiya', 7.05048, 80.5306),
(854, 'Nawathispane', 7.0333, 80.5),
(855, 'Nillambe', 7.15, 80.6333),
(856, 'Nugaliyadda', 7.2333, 80.7),
(857, 'Ovilikanda', 7.45, 80.5667),
(858, 'Pallekotuwa', 7.3333, 80.5667),
(859, 'Panwilatenna', 7.1556, 80.6314),
(860, 'Paradeka', 7.12293, 80.619),
(861, 'Pasbage', 7.0358, 80.5262),
(862, 'Pattitalawa', 7.1167, 80.4667),
(863, 'Peradeniya', 7.2631, 80.6028),
(864, 'Pilimatalawa', 7.2333, 80.5333),
(865, 'Poholiyadda', 7.34327, 80.5202),
(866, 'Pubbiliya', 7.38593, 80.4813),
(867, 'Pupuressa', 7.11563, 80.6775),
(868, 'Pussellawa', 7.11257, 80.6441),
(869, 'Putuhapuwa', 7.3342, 80.7594),
(870, 'Rajawella', 7.28052, 80.7482),
(871, 'Rambukpitiya', 7.0333, 80.5),
(872, 'Rambukwella', 7.29476, 80.7777),
(873, 'Rangala', 7.34449, 80.795),
(874, 'Rantembe', 7.3552, 80.8375),
(875, 'Sangarajapura', 7.3167, 80.5833),
(876, 'Senarathwela', 7.28013, 80.7616),
(877, 'Talatuoya', 7.2536, 80.6925),
(878, 'Teldeniya', 7.2969, 80.7686),
(879, 'Tennekumbura', 7.2833, 80.6667),
(880, 'Uda Peradeniya', 7.249, 80.6141),
(881, 'Udahentenna', 7.0889, 80.5189),
(882, 'Udatalawinna', 7.3161, 80.6211),
(883, 'Udispattuwa', 7.3552, 80.8375),
(884, 'Ududumbara', 7.3552, 80.8375),
(885, 'Uduwahinna', 7.2833, 80.8917),
(886, 'Uduwela', 7.2722, 80.6667),
(887, 'Ulapane', 7.11407, 80.5524),
(888, 'Unuwinna', 7.1517, 80.7118),
(889, 'Velamboda', 7.0523, 80.5023),
(890, 'Watagoda', 7.39731, 80.5883),
(891, 'Watagoda Harispattuwa', 7.3569, 80.6012),
(892, 'Wattappola', 7.2348, 80.5437),
(893, 'Weligampola', 7.0271, 80.5493),
(894, 'Wendaruwa', 7.3552, 80.8375),
(895, 'Weragantota', 7.3167, 80.9833),
(896, 'Werapitya', 7.2969, 80.7686),
(897, 'Werellagama', 7.3167, 80.5833),
(898, 'Wettawa', 7.3508, 80.5221),
(899, 'Yahalatenna', 7.3, 80.5667),
(900, 'Yatihalagala', 7.3, 80.6),
(901, 'Alawala', 7.19738, 80.2828),
(902, 'Alawatura', 7.1333, 80.3333),
(903, 'Alawwa', 7.2875, 80.2536),
(904, 'Algama', 7.15834, 80.1629),
(905, 'Alutnuwara', 7.2333, 80.4667),
(906, 'Ambalakanda', 7.13405, 80.4468),
(907, 'Ambulugala', 7.23913, 80.4096),
(908, 'Amitirigala', 7.0306, 80.1839),
(909, 'Ampagala', 7.08024, 80.289),
(910, 'Anhandiya', 7.2667, 80.2667),
(911, 'Anhettigama', 6.92212, 80.3719),
(912, 'Aranayaka', 7.1447, 80.4614),
(913, 'Aruggammana', 7.11773, 80.3067),
(914, 'Batuwita', 7.04434, 80.1791),
(915, 'Beligala(Sab)', 7.2167, 80.2917),
(916, 'Belihuloya', 7.2667, 80.2167),
(917, 'Berannawa', 7.06448, 80.4055),
(918, 'Bopitiya', 7.17976, 80.2052),
(919, 'Bopitiya (SAB)', 7.2583, 80.2167),
(920, 'Boralankada', 6.97966, 80.3303),
(921, 'Bossella', 7.1333, 80.4),
(922, 'Bulathkohupitiya', 7.10599, 80.3388),
(923, 'Damunupola', 7.18797, 80.3345),
(924, 'Debathgama', 7.1833, 80.3583),
(925, 'Dedugala', 7.09385, 80.419),
(926, 'Deewala Pallegama', 7.2333, 80.2667),
(927, 'Dehiowita', 6.9706, 80.2675),
(928, 'Deldeniya', 7.28091, 80.3588),
(929, 'Deloluwa', 6.9653, 80.3181),
(930, 'Deraniyagala', 6.93239, 80.335),
(931, 'Dewalegama', 7.27893, 80.3191),
(932, 'Dewanagala', 7.2167, 80.4667),
(933, 'Dombemada', 7.37974, 80.3488),
(934, 'Dorawaka', 7.1833, 80.2167),
(935, 'Dunumala', 7.1738, 80.2074),
(936, 'Galapitamada', 7.14, 80.2364),
(937, 'Galatara', 7.2167, 80.4167),
(938, 'Galigamuwa Town', 7.2, 80.3),
(939, 'Gallella', 6.85, 80.35),
(940, 'Galpatha(Sab)', 7.05, 80.2333),
(941, 'Gantuna', 7.1667, 80.3667),
(942, 'Getahetta', 6.9128, 80.2358),
(943, 'Godagampola', 6.88596, 80.3139),
(944, 'Gonagala', 7.03533, 80.2074),
(945, 'Hakahinna', 7.2, 80.3),
(946, 'Hakbellawaka', 7.00395, 80.3288),
(947, 'Halloluwa', 7.2, 80.35),
(948, 'Hedunuwewa', 6.9306, 80.2747),
(949, 'Hemmatagama', 7.1667, 80.5),
(950, 'Hewadiwela', 7.37249, 80.3776),
(951, 'Hingula', 7.2478, 80.469),
(952, 'Hinguralakanda', 6.91506, 80.3044),
(953, 'Hingurana', 6.9167, 80.4167),
(954, 'Hiriwadunna', 7.2833, 80.3833),
(955, 'Ihala Walpola', 7.35096, 80.3973),
(956, 'Ihalagama', 7.2667, 80.3333),
(957, 'Imbulana', 7.08264, 80.2456),
(958, 'Imbulgasdeniya', 7.2853, 80.3186),
(959, 'Kabagamuwa', 7.1367, 80.3416),
(960, 'Kahapathwala', 7.3, 80.4583),
(961, 'Kandaketya', 7.2333, 80.4667),
(962, 'Kannattota', 7.08135, 80.2753),
(963, 'Karagahinna', 7.3604, 80.3832),
(964, 'Kegalle', 7.24935, 80.3517),
(965, 'Kehelpannala', 7.16113, 80.5195),
(966, 'Ketawala Leula', 7.1167, 80.35),
(967, 'Kitulgala', 6.9944, 80.4114),
(968, 'Kondeniya', 7.2667, 80.4333),
(969, 'Kotiyakumbura', 7.0833, 80.2667),
(970, 'Lewangama', 7.1129, 80.239),
(971, 'Mahabage', 7.0198, 80.4502),
(972, 'Makehelwala', 7.28244, 80.4753),
(973, 'Malalpola', 7.05309, 80.351),
(974, 'Maldeniya', 6.9306, 80.2747),
(975, 'Maliboda', 6.88753, 80.4642),
(976, 'Maliyadda', 7.2333, 80.4667),
(977, 'Malmaduwa', 7.15, 80.2833),
(978, 'Marapana', 7.2333, 80.35),
(979, 'Mawanella', 7.24445, 80.439),
(980, 'Meetanwala', 7.3, 80.4583),
(981, 'Migastenna Sabara', 7.0333, 80.3333),
(982, 'Miyanawita', 6.90042, 80.3511),
(983, 'Molagoda', 7.25, 80.3833),
(984, 'Morontota', 7.1667, 80.3667),
(985, 'Narangala', 7.07922, 80.3608),
(986, 'Narangoda', 7.19816, 80.2946),
(987, 'Nattarampotha', 7.1167, 80.35),
(988, 'Nelundeniya', 7.2319, 80.2669),
(989, 'Niyadurupola', 7.1667, 80.2167),
(990, 'Noori', 6.9508, 80.3174),
(991, 'Pannila', 6.86636, 80.321),
(992, 'Pattampitiya', 7.31552, 80.4344),
(993, 'Pilawala', 7.1167, 80.35),
(994, 'Pothukoladeniya', 7.1833, 80.3583),
(995, 'Puswelitenna', 7.3667, 80.3667),
(996, 'Rambukkana', 7.32302, 80.3919),
(997, 'Rilpola', 7.2333, 80.4667),
(998, 'Rukmale', 7.2, 80.4833),
(999, 'Ruwanwella', 7.04885, 80.2561),
(1000, 'Samanalawewa', 7.2667, 80.2167),
(1001, 'Seaforth Colony', 7.0469, 80.3502),
(1002, 'Colombo 2', 6.92694, 79.8486),
(1003, 'Spring Valley', 7.2333, 80.4667),
(1004, 'Talgaspitiya', 7.1667, 80.4833),
(1005, 'Teligama', 7.0033, 80.3647),
(1006, 'Tholangamuwa', 7.23398, 80.226),
(1007, 'Thotawella', 7.3555, 80.3969),
(1008, 'Udaha Hawupe', 7.05, 80.2833),
(1009, 'Udapotha', 7.09414, 80.3774),
(1010, 'Uduwa', 7.11096, 80.3876),
(1011, 'Undugoda', 7.14187, 80.3653),
(1012, 'Ussapitiya', 7.21696, 80.4446),
(1013, 'Wahakula', 7.05824, 80.2074),
(1014, 'Waharaka', 7.08851, 80.1986),
(1015, 'Wanaluwewa', 7.0667, 80.175),
(1016, 'Warakapola', 7.23005, 80.1968),
(1017, 'Watura', 7.1833, 80.3833),
(1018, 'Weeoya', 7.0469, 80.3502),
(1019, 'Wegalla', 7.09963, 80.3065),
(1020, 'Weligalla', 7.1833, 80.2),
(1021, 'Welihelatenna', 7.0333, 80.3333),
(1022, 'Wewelwatta', 6.85, 80.35),
(1023, 'Yatagama', 7.32512, 80.3564),
(1024, 'Yatapana', 7.1333, 80.3),
(1025, 'Yatiyantota', 7.0242, 80.3006),
(1026, 'Yattogoda', 7.2333, 80.2667),
(1027, 'Kandavalai', 9.45156, 80.5008),
(1028, 'Karachchi', 9.37694, 80.3766),
(1029, 'Kilinochchi', 9.41667, 80.4167),
(1030, 'Pachchilaipalli', 9.61158, 80.3273),
(1031, 'Poonakary', 9.5035, 80.2111),
(1032, 'Akurana', 7.63703, 80.0234),
(1033, 'Alahengama', 7.6779, 80.1151),
(1034, 'Alahitiyawa', 7.47391, 80.1712),
(1035, 'Ambakote', 7.49206, 80.4528),
(1036, 'Ambanpola', 7.91597, 80.2375),
(1037, 'Andiyagala', 7.4667, 80.1333),
(1038, 'Anukkane', 7.50181, 80.12),
(1039, 'Aragoda', 7.36612, 80.3442),
(1040, 'Ataragalla', 7.9696, 80.2768),
(1041, 'Awulegama', 7.6569, 80.2203),
(1042, 'Balalla', 7.79103, 80.2508),
(1043, 'Bamunukotuwa', 7.8667, 80.2167),
(1044, 'Bandara Koswatta', 7.6033, 80.1726),
(1045, 'Bingiriya', 7.60518, 79.922),
(1046, 'Bogamulla', 7.4589, 80.2107),
(1047, 'Boraluwewa', 7.68258, 80.0348),
(1048, 'Boyagane', 7.45227, 80.3417),
(1049, 'Bujjomuwa', 7.4581, 80.0603),
(1050, 'Buluwala', 7.4842, 80.4735),
(1051, 'Dadayamtalawa', 7.65, 79.9667),
(1052, 'Dambadeniya', 7.37053, 80.1462),
(1053, 'Daraluwa', 7.35941, 79.9782),
(1054, 'Deegalla', 7.5102, 80.0298),
(1055, 'Demataluwa', 7.51398, 80.2587),
(1056, 'Demuwatha', 7.35, 80.1667),
(1057, 'Diddeniya', 7.68528, 80.4729),
(1058, 'Digannewa', 7.89722, 80.1013),
(1059, 'Divullegoda', 7.75, 80.2),
(1060, 'Diyasenpura', 7.8167, 80.1833),
(1061, 'Dodangaslanda', 7.5667, 80.5333),
(1062, 'Doluwa', 7.62152, 80.4188),
(1063, 'Doragamuwa', 7.5833, 79.9333),
(1064, 'Doratiyawa', 7.45063, 80.3806),
(1065, 'Dunumadalawa', 7.8, 80.0833),
(1066, 'Dunuwilapitiya', 7.3667, 80.2),
(1067, 'Ehetuwewa', 7.92757, 80.332),
(1068, 'Elibichchiya', 7.31318, 80.0569),
(1069, 'Embogama', 7.9214, 80.3608),
(1070, 'Etungahakotuwa', 7.5167, 79.9667),
(1071, 'Galadivulwewa', 7.8, 80.0833),
(1072, 'Galgamuwa', 7.99547, 80.2675),
(1073, 'Gallellagama', 7.3, 80.15),
(1074, 'Gallewa', 7.9667, 80.3333),
(1075, 'Ganegoda', 7.5833, 80),
(1076, 'Girathalana', 7.9833, 80.3833),
(1077, 'Gokaralla', 7.6301, 80.3775),
(1078, 'Gonawila', 7.3167, 80),
(1079, 'Halmillawewa', 7.5953, 79.9972),
(1080, 'Handungamuwa', 7.3667, 80.2),
(1081, 'Harankahawa', 7.3, 80.15),
(1082, 'Helamada', 7.3167, 80.2833),
(1083, 'Hengamuwa', 7.70328, 80.1113),
(1084, 'Hettipola', 7.60537, 80.0831),
(1085, 'Hewainna', 7.3333, 80.2167),
(1086, 'Hilogama', 7.75, 80.0833),
(1087, 'Hindagolla', 7.4833, 80.4167),
(1088, 'Hiriyala Lenawa', 7.6709, 80.4751),
(1089, 'Hiruwalpola', 7.55392, 79.9247),
(1090, 'Horambawa', 7.45, 80.1833),
(1091, 'Hulogedara', 7.7833, 80.1833),
(1092, 'Hulugalla', 7.79059, 80.14),
(1093, 'Ihala Gomugomuwa', 7.5167, 80.0833),
(1094, 'Ihala Katugampala', 7.3672, 80.1467),
(1095, 'Indulgodakanda', 7.42263, 80.4028),
(1096, 'Ithanawatta', 7.4458, 80.3458),
(1097, 'Kadigawa', 7.7167, 80),
(1098, 'Kalankuttiya', 8.05, 80.3833),
(1099, 'Kalatuwawa', 7.6333, 80.3667),
(1100, 'Kalugamuwa', 7.44972, 80.2567),
(1101, 'Kanadeniyawala', 7.43824, 80.5357),
(1102, 'Kanattewewa', 7.6167, 80.2),
(1103, 'Kandegedara', 7.42461, 80.0715),
(1104, 'Karagahagedara', 7.47579, 80.21),
(1105, 'Karambe', 7.80594, 80.3392),
(1106, 'Katiyawa', 7.62464, 80.5539),
(1107, 'Katupota', 7.5331, 80.1897),
(1108, 'Kawudulla', 7.75, 80.3833),
(1109, 'Kawuduluwewa Stagell', 7.8167, 80.1833),
(1110, 'Kekunagolla', 7.49608, 80.1704),
(1111, 'Keppitiwalana', 7.3232, 80.1904),
(1112, 'Kimbulwanaoya', 7.6709, 80.4751),
(1113, 'Kirimetiyawa', 7.5247, 80.1408),
(1114, 'Kirindawa', 7.50208, 80.0961),
(1115, 'Kirindigalla', 7.55431, 80.475),
(1116, 'Kithalawa', 7.4816, 80.1615),
(1117, 'Kitulwala', 7.5, 80.5333),
(1118, 'Kobeigane', 7.65673, 80.121),
(1119, 'Kohilagedara', 7.4167, 80.3667),
(1120, 'Konwewa', 7.8, 80.0667),
(1121, 'Kosdeniya', 7.57408, 80.1388),
(1122, 'Kosgolla', 7.4, 80.3833),
(1123, 'Kotagala', 7.45, 80.2333),
(1124, 'Colombo 13', 6.94278, 79.8586),
(1125, 'Kotawehera', 7.7911, 80.1023),
(1126, 'Kudagalgamuwa', 7.5585, 80.3403),
(1127, 'Kudakatnoruwa', 7.9833, 80.3833),
(1128, 'Kuliyapitiya', 7.46955, 80.0487),
(1129, 'Kumaragama', 7.75, 80.3833),
(1130, 'Kumbukgeta', 7.675, 80.3667),
(1131, 'Kumbukwewa', 7.79747, 80.2179),
(1132, 'Kuratihena', 7.6, 80.1333),
(1133, 'Kurunegala', 7.4867, 80.3647),
(1134, 'Ibbagamuwa', 7.675, 80.3667),
(1135, 'Ihala Kadigamuwa', 7.5436, 79.9819),
(1136, 'Lihiriyagama', 7.3447, 79.9425),
(1137, 'Illagolla', 7.4333, 80.1333),
(1138, 'Ilukhena', 7.5436, 79.9819),
(1139, 'Lonahettiya', 7.4589, 80.2107),
(1140, 'Madahapola', 7.71195, 80.499),
(1141, 'Madakumburumulla', 7.44599, 79.9941),
(1142, 'Madalagama', 7.3534, 80.314),
(1143, 'Madawala Ulpotha', 7.703, 80.5051),
(1144, 'Maduragoda', 7.5667, 80.5333),
(1145, 'Maeliya', 7.73485, 80.4079),
(1146, 'Magulagama', 7.54289, 80.0903),
(1147, 'Maha Ambagaswewa', 7.8167, 80.1833),
(1148, 'Mahagalkadawala', 8.06286, 80.2805),
(1149, 'Mahagirilla', 7.8333, 80.1333),
(1150, 'Mahamukalanyaya', 7.7417, 80.4318),
(1151, 'Mahananneriya', 8.01355, 80.1834),
(1152, 'Mahapallegama', 7.366, 80.0918),
(1153, 'Maharachchimulla', 7.33599, 80.2127),
(1154, 'Mahatalakolawewa', 7.8167, 80.1833),
(1155, 'Mahawewa', 7.5167, 79.9167),
(1156, 'Maho', 7.8228, 80.2778),
(1157, 'Makulewa', 7.99831, 80.3451),
(1158, 'Makulpotha', 7.75175, 80.4399),
(1159, 'Makulwewa', 7.6333, 80.05),
(1160, 'Malagane', 7.65, 80.2667),
(1161, 'Mandapola', 7.63521, 80.1086),
(1162, 'Maspotha', 7.8667, 80.2167),
(1163, 'Mawathagama', 7.40969, 80.3158),
(1164, 'Medirigiriya', 7.8167, 80.1833),
(1165, 'Medivawa', 7.7678, 80.2858),
(1166, 'Meegalawa', 7.9833, 80.3833),
(1167, 'Meegaswewa', 7.8167, 80.1833),
(1168, 'Meewellawa', 7.85, 80.15),
(1169, 'Melsiripura', 7.65, 80.5),
(1170, 'Metikumbura', 7.3615, 80.3177),
(1171, 'Metiyagane', 7.39085, 80.1806),
(1172, 'Minhettiya', 7.58126, 80.3078),
(1173, 'Minuwangete', 7.7167, 80.25),
(1174, 'Mirihanagama', 7.6542, 80.2583),
(1175, 'Monnekulama', 7.82404, 80.0606),
(1176, 'Moragane', 7.54779, 80.1303),
(1177, 'Moragollagama', 7.6333, 80.2167),
(1178, 'Morathiha', 7.5107, 80.4884),
(1179, 'Munamaldeniya', 7.55, 80.0667),
(1180, 'Muruthenge', 7.3942, 80.1861),
(1181, 'Mutugala', 7.3667, 80.1667),
(1182, 'Nabadewa', 7.6833, 80.0667),
(1183, 'Nagollagama', 7.75201, 80.3093),
(1184, 'Nagollagoda', 7.56333, 80.0378),
(1185, 'Nakkawatta', 7.44826, 80.1419),
(1186, 'Narammala', 7.43139, 80.2062),
(1187, 'Nawasenapura', 7.3667, 80.1667),
(1188, 'Nawatalwatta', 7.4581, 80.0603),
(1189, 'Nelliya', 7.69052, 80.4579),
(1190, 'Nikaweratiya', 7.74758, 80.1152),
(1191, 'Nugagolla', 7.3667, 80.2),
(1192, 'Nugawela', 7.33, 80.2204),
(1193, 'Padeniya', 7.64835, 80.2221),
(1194, 'Padiwela', 7.54555, 79.9905),
(1195, 'Pahalagiribawa', 8.0833, 80.2111),
(1196, 'Pahamune', 7.4833, 80.2),
(1197, 'Palagala', 7.4667, 80.1333),
(1198, 'Palapathwela', 7.9, 80.2),
(1199, 'Palaviya', 7.5785, 79.9098),
(1200, 'Pallewela', 7.4667, 79.9833),
(1201, 'Palukadawala', 7.9479, 80.2791),
(1202, 'Panadaragama', 7.8667, 80.2167),
(1203, 'Panagamuwa', 7.55, 80.4667),
(1204, 'Panaliya', 7.32806, 80.3319),
(1205, 'Panapitiya', 7.4167, 80.1833),
(1206, 'Panliyadda', 7.7061, 80.4964),
(1207, 'Pansiyagama', 7.7061, 80.4964),
(1208, 'Parape', 7.3667, 80.4167),
(1209, 'Pathanewatta', 7.4167, 80.0833),
(1210, 'Pattiya Watta', 7.3833, 80.3167),
(1211, 'Perakanatta', 7.3667, 80.2),
(1212, 'Periyakadneluwa', 7.7417, 80.4318),
(1213, 'Pihimbiya Ratmale', 7.6299, 80.0953),
(1214, 'Pihimbuwa', 7.46074, 80.5123),
(1215, 'Pilessa', 7.45, 80.4167),
(1216, 'Polgahawela', 7.33277, 80.2953),
(1217, 'Polgolla', 7.4167, 80.5333),
(1218, 'Polpithigama', 7.8142, 80.4042),
(1219, 'Pothuhera', 7.4181, 80.3317),
(1220, 'Pothupitiya', 7.35542, 80.1717),
(1221, 'Pujapitiya', 7.3833, 80.3167),
(1222, 'Rakwana', 7.9, 80.4),
(1223, 'Ranorawa', 7.8, 80.0833),
(1224, 'Rathukohodigala', 7.5833, 79.9333),
(1225, 'Ridibendiella', 7.802, 80.287),
(1226, 'Ridigama', 7.55, 80.4833),
(1227, 'Saliya Asokapura', 8.0833, 80.2111),
(1228, 'Sandalankawa', 7.30462, 79.9444),
(1229, 'Sevanapitiya', 7.3667, 80.1667),
(1230, 'Sirambiadiya', 8.1, 80.2667),
(1231, 'Sirisetagama', 7.7772, 80.1506),
(1232, 'Siyambalangamuwa', 7.52918, 80.3403),
(1233, 'Siyambalawewa', 7.65, 79.9667),
(1234, 'Solepura', 8.15366, 80.1534),
(1235, 'Solewewa', 8.14585, 80.1326),
(1236, 'Sunandapura', 7.6299, 80.0953),
(1237, 'Talawattegedara', 7.3833, 80.3),
(1238, 'Tambutta', 8.0833, 80.2167),
(1239, 'Tennepanguwa', 7.4167, 80.0833),
(1240, 'Thalahitimulla', 7.43247, 80.002),
(1241, 'Thalakolawewa', 7.79694, 80.4339),
(1242, 'Thalwita', 7.5943, 80.2108),
(1243, 'Tharana Udawela', 7.5333, 80.0667),
(1244, 'Thimbiriyawa', 7.7509, 80.141),
(1245, 'Tisogama', 7.6065, 79.9406),
(1246, 'Thorayaya', 7.5167, 80.4),
(1247, 'Tulhiriya', 7.2833, 80.2167),
(1248, 'Tuntota', 7.5, 79.9167),
(1249, 'Tuttiripitigama', 7.6, 80.1333),
(1250, 'Udagaldeniya', 7.3583, 80.35),
(1251, 'Udahingulwala', 7.3, 80.15),
(1252, 'Udawatta', 7.4333, 80.1333),
(1253, 'Udubaddawa', 7.4828, 79.9753),
(1254, 'Udumulla', 7.45, 80.4),
(1255, 'Uhumiya', 7.4667, 80.2833),
(1256, 'Ulpotha Pallekele', 7.8071, 80.4188),
(1257, 'Ulpothagama', 7.7167, 80.3167),
(1258, 'Usgala Siyabmalangamuwa', 8.0833, 80.2111),
(1259, 'Vijithapura', 7.4667, 80.1333),
(1260, 'Wadakada', 7.39697, 80.2676),
(1261, 'Wadumunnegedara', 7.4167, 79.9667),
(1262, 'Walakumburumulla', 7.4167, 80.0167),
(1263, 'Wannigama', 7.6569, 80.2203),
(1264, 'Wannikudawewa', 7.9977, 80.2964),
(1265, 'Wannilhalagama', 7.9977, 80.2964),
(1266, 'Wannirasnayakapura', 7.6889, 80.1556),
(1267, 'Warawewa', 8.12157, 80.1486),
(1268, 'Wariyapola', 7.62869, 80.236),
(1269, 'Watareka', 7.39714, 80.4329),
(1270, 'Wattegama', 7.5833, 79.9333),
(1271, 'Watuwatta', 7.5167, 79.9167),
(1272, 'Weerapokuna', 7.64943, 79.9819),
(1273, 'Welawa Juncton', 7.6569, 80.2203),
(1274, 'Welipennagahamulla', 7.4581, 80.0603),
(1275, 'Wellagala', 7.6167, 80.2833),
(1276, 'Wellarawa', 7.5729, 79.914),
(1277, 'Wellawa', 7.56652, 80.3692),
(1278, 'Welpalla', 7.4333, 80.05),
(1279, 'Wennoruwa', 7.36947, 80.2196),
(1280, 'Weuda', 7.4, 80.1667),
(1281, 'Wewagama', 7.42031, 80.0998),
(1282, 'Wilgamuwa', 7.3667, 80.2),
(1283, 'Yakwila', 7.3833, 80.0333),
(1284, 'Yatigaloluwa', 7.32873, 80.2645),
(1285, 'Mannar', 8.9833, 79.9),
(1286, 'Puthukudiyiruppu', 9.04695, 79.8533),
(1287, 'Akuramboda', 7.64638, 80.6),
(1288, 'Alawatuwala', 7.55, 80.5583),
(1289, 'Alwatta', 7.44944, 80.6634),
(1290, 'Ambana', 7.65101, 80.6938),
(1291, 'Aralaganwila', 7.696, 80.5842),
(1292, 'Ataragallewa', 7.5333, 80.6067),
(1293, 'Bambaragaswewa', 7.78432, 80.5405),
(1294, 'Barawardhana Oya', 7.5667, 80.625),
(1295, 'Beligamuwa', 7.72588, 80.5528),
(1296, 'Damana', 7.8417, 80.5797),
(1297, 'Dambulla', 7.86804, 80.6465),
(1298, 'Damminna', 7.696, 80.5842),
(1299, 'Dankanda', 7.51962, 80.6942),
(1300, 'Delwite', 7.55, 80.5583),
(1301, 'Devagiriya', 7.5833, 80.9667),
(1302, 'Dewahuwa', 7.7589, 80.5683),
(1303, 'Divuldamana', 7.696, 80.5842),
(1304, 'Dullewa', 7.51101, 80.5986),
(1305, 'Dunkolawatta', 7.4917, 80.625),
(1306, 'Elkaduwa', 7.41071, 80.6933),
(1307, 'Erawula Junction', 7.8633, 80.6842),
(1308, 'Etanawala', 7.5217, 80.6847),
(1309, 'Galewela', 7.75981, 80.5674),
(1310, 'Galoya Junction', 7.696, 80.5842),
(1311, 'Gammaduwa', 7.58165, 80.6985),
(1312, 'Gangala Puwakpitiya', 7.5217, 80.6847),
(1313, 'Hasalaka', 7.5667, 80.625),
(1314, 'Hattota Amuna', 7.5333, 80.6067),
(1315, 'Imbulgolla', 7.57503, 80.6632),
(1316, 'Inamaluwa', 7.95134, 80.6902),
(1317, 'Iriyagolla', 7.55, 80.6333),
(1318, 'Kaikawala', 7.50718, 80.6594),
(1319, 'Kalundawa', 7.8, 80.7167),
(1320, 'Kandalama', 7.8874, 80.7035),
(1321, 'Kavudupelella', 7.5914, 80.6258),
(1322, 'Kibissa', 7.9397, 80.7278),
(1323, 'Kiwula', 7.4917, 80.625),
(1324, 'Kongahawela', 7.67993, 80.7066),
(1325, 'Laggala Pallegama', 7.5333, 80.6067),
(1326, 'Leliambe', 7.4346, 80.6519),
(1327, 'Lenadora', 7.75351, 80.6602),
(1328, 'Ihala Halmillewa', 7.8667, 80.6417),
(1329, 'Illukkumbura', 7.5217, 80.6847),
(1330, 'Madipola', 7.696, 80.5842),
(1332, 'Mahawela', 7.5818, 80.6075),
(1333, 'Mananwatta', 7.68511, 80.6011),
(1334, 'Maraka', 7.5868, 80.962),
(1335, 'Matale', 7.4717, 80.6244),
(1336, 'Melipitiya', 7.5458, 80.5833),
(1337, 'Metihakka', 7.5365, 80.6541),
(1338, 'Millawana', 7.6503, 80.5772),
(1339, 'Muwandeniya', 7.46145, 80.6601),
(1340, 'Nalanda', 7.66249, 80.635),
(1341, 'Naula', 7.70813, 80.6523),
(1342, 'Opalgala', 7.61993, 80.6983),
(1343, 'Pallepola', 7.62069, 80.6005),
(1344, 'Pimburattewa', 7.696, 80.5842),
(1345, 'Pulastigama', 7.67, 80.565),
(1346, 'Ranamuregama', 7.5333, 80.6067),
(1347, 'Rattota', 7.5217, 80.6847),
(1348, 'Selagama', 7.59446, 80.5838),
(1349, 'Sigiriya', 7.95497, 80.7552),
(1350, 'Sinhagama', 7.696, 80.5842),
(1351, 'Sungavila', 7.67, 80.565),
(1352, 'Talagoda Junction', 7.5722, 80.6222),
(1353, 'Talakiriyagama', 7.8206, 80.6172),
(1354, 'Tamankaduwa', 7.67, 80.565),
(1355, 'Udasgiriya', 7.53525, 80.5703),
(1356, 'Udatenna', 7.4167, 80.65),
(1357, 'Ukuwela', 7.42392, 80.63),
(1358, 'Wahacotte', 7.7142, 80.5972),
(1359, 'Walawela', 7.52037, 80.5974),
(1360, 'Wehigala', 7.40902, 80.6691),
(1361, 'Welangahawatte', 7.5217, 80.6847),
(1362, 'Wewalawewa', 7.8103, 80.6669),
(1363, 'Yatawatta', 7.5627, 80.5784),
(1364, 'Akuressa', 6.0964, 80.4808),
(1365, 'Alapaladeniya', 6.2833, 80.45),
(1366, 'Aparekka', 6.00808, 80.6216),
(1367, 'Athuraliya', 6.06972, 80.4979),
(1368, 'Bengamuwa', 6.25342, 80.5981),
(1369, 'Bopagoda', 6.1561, 80.4903),
(1370, 'Dampahala', 6.25963, 80.6331),
(1371, 'Deegala Lenama', 6.2333, 80.45),
(1372, 'Deiyandara', 6.15239, 80.6047),
(1373, 'Denagama', 6.11481, 80.6427),
(1374, 'Denipitiya', 5.9667, 80.45),
(1375, 'Deniyaya', 6.33973, 80.5481),
(1376, 'Derangala', 6.22957, 80.4455);
INSERT INTO `cities` (`id`, `name`, `lat`, `lng`) VALUES
(1377, 'Devinuwara (Dondra)', 5.9319, 80.6069),
(1378, 'Dikwella', 5.9667, 80.6833),
(1379, 'Diyagaha', 5.9833, 80.5667),
(1380, 'Diyalape', 6.1218, 80.4479),
(1381, 'Gandara', 5.93363, 80.6158),
(1382, 'Godapitiya', 6.1218, 80.481),
(1383, 'Gomilamawarala', 6.1833, 80.5667),
(1384, 'Hawpe', 6.12997, 80.4897),
(1385, 'Horapawita', 6.1167, 80.5833),
(1386, 'Kalubowitiyana', 6.3167, 80.4),
(1387, 'Kamburugamuwa', 5.94061, 80.4965),
(1388, 'Kamburupitiya', 6.06985, 80.5647),
(1389, 'Karagoda Uyangoda', 6.0715, 80.5193),
(1390, 'Karaputugala', 6.07377, 80.6035),
(1391, 'Karatota', 6.0667, 80.6667),
(1392, 'Kekanadura', 6.0715, 80.5193),
(1393, 'Kiriweldola', 6.37227, 80.5335),
(1394, 'Kiriwelkele', 6.24996, 80.451),
(1395, 'Kolawenigama', 6.32167, 80.5002),
(1396, 'Kotapola', 6.29239, 80.534),
(1397, 'Lankagama', 6.35, 80.4667),
(1398, 'Makandura', 6.13704, 80.572),
(1399, 'Maliduwa', 6.1333, 80.4167),
(1400, 'Maramba', 6.1614, 80.5035),
(1401, 'Matara', 5.9486, 80.5428),
(1402, 'Mediripitiya', 6.35, 80.4667),
(1403, 'Miella', 6.1167, 80.6833),
(1404, 'Mirissa', 5.94679, 80.4523),
(1405, 'Morawaka', 6.25, 80.4833),
(1406, 'Mulatiyana Junction', 6.1833, 80.5667),
(1407, 'Nadugala', 5.97546, 80.5489),
(1408, 'Naimana', 6.0715, 80.5193),
(1409, 'Palatuwa', 5.98452, 80.5187),
(1410, 'Parapamulla', 6.15022, 80.6168),
(1411, 'Pasgoda', 6.243, 80.6162),
(1412, 'Penetiyana', 6.03481, 80.4506),
(1413, 'Pitabeddara', 6.2167, 80.45),
(1414, 'Puhulwella', 6.04575, 80.6192),
(1415, 'Radawela', 6.12467, 80.6073),
(1416, 'Ransegoda', 6.0715, 80.5193),
(1417, 'Rotumba', 6.22914, 80.5712),
(1418, 'Sultanagoda', 5.9667, 80.5),
(1419, 'Telijjawila', 6.0715, 80.5193),
(1420, 'Thihagoda', 6.0116, 80.5619),
(1421, 'Urubokka', 6.30286, 80.6312),
(1422, 'Urugamuwa', 6.0116, 80.6437),
(1423, 'Urumutta', 6.15018, 80.5196),
(1424, 'Viharahena', 6.37907, 80.598),
(1425, 'Walakanda', 6.01655, 80.6499),
(1426, 'Walasgala', 5.98191, 80.6937),
(1427, 'Waralla', 6.27744, 80.5225),
(1428, 'Weligama', 5.9667, 80.4167),
(1429, 'Wilpita', 6.1, 80.5167),
(1430, 'Yatiyana', 6.02889, 80.6032),
(1431, 'Ayiwela', 7.1, 81.2333),
(1432, 'Badalkumbura', 6.89329, 81.2343),
(1433, 'Baduluwela', 7.11307, 81.4353),
(1434, 'Bakinigahawela', 6.9333, 81.2833),
(1435, 'Balaharuwa', 6.52018, 81.0585),
(1436, 'Bibile', 7.1667, 81.2167),
(1437, 'Buddama', 7.04641, 81.4868),
(1438, 'Buttala', 6.75, 81.2333),
(1439, 'Dambagalla', 6.95574, 81.3759),
(1440, 'Diyakobala', 7.1056, 81.2222),
(1441, 'Dombagahawela', 6.8982, 81.4414),
(1442, 'Ethimalewewa', 6.9216, 81.3833),
(1443, 'Ettiliwewa', 6.73, 81.12),
(1444, 'Galabedda', 6.9167, 81.3833),
(1445, 'Gamewela', 6.9167, 81.2),
(1446, 'Hambegamuwa', 6.50372, 80.8747),
(1447, 'Hingurukaduwa', 6.81726, 81.1534),
(1448, 'Hulandawa', 6.86848, 81.3332),
(1449, 'Inginiyagala', 7.19862, 81.4945),
(1450, 'Kandaudapanguwa', 6.9667, 81.5167),
(1451, 'Kandawinna', 6.9333, 81.2833),
(1452, 'Kataragama', 6.4167, 81.3333),
(1453, 'Kotagama', 7.11645, 81.1779),
(1454, 'Kotamuduna', 6.89254, 81.1777),
(1455, 'Kotawehera Mankada', 6.4636, 81.053),
(1456, 'Kudawewa', 6.4167, 81.0333),
(1457, 'Kumbukkana', 6.8148, 81.2749),
(1458, 'Marawa', 6.80594, 81.3815),
(1459, 'Mariarawa', 6.97597, 81.481),
(1460, 'Medagana', 6.9333, 81.2833),
(1461, 'Medawelagama', 6.9167, 81.2),
(1462, 'Miyanakandura', 6.86917, 81.153),
(1463, 'Monaragala', 6.8667, 81.35),
(1464, 'Moretuwegama', 6.75, 81.2333),
(1465, 'Nakkala', 6.88782, 81.3061),
(1466, 'Namunukula', 6.8667, 81.1167),
(1467, 'Nannapurawa', 7.0833, 81.25),
(1468, 'Nelliyadda', 7.38993, 81.4081),
(1469, 'Nilgala', 7.21594, 81.3128),
(1470, 'Obbegoda', 6.8786, 81.3476),
(1471, 'Okkampitiya', 6.7532, 81.2975),
(1472, 'Pangura', 6.9833, 81.3167),
(1473, 'Pitakumbura', 7.19158, 81.2752),
(1474, 'Randeniya', 6.80347, 81.1119),
(1475, 'Ruwalwela', 7.01748, 81.3862),
(1476, 'Sella Kataragama', 6.4167, 81.3333),
(1477, 'Siyambalagune', 6.8, 81.1333),
(1478, 'Siyambalanduwa', 6.91058, 81.5521),
(1479, 'Suriara', 6.4636, 81.053),
(1480, 'Thanamalwila', 6.4333, 81.1333),
(1481, 'Uva Gangodagama', 7.0056, 81.4222),
(1482, 'Uva Kudaoya', 6.75, 81.2),
(1483, 'Uva Pelwatta', 6.75, 81.2333),
(1484, 'Warunagama', 6.75, 81.2333),
(1485, 'Wedikumbura', 6.8333, 81.3833),
(1486, 'Weherayaya Handapanagala', 6.7778, 81.1167),
(1487, 'Wellawaya', 6.71946, 81.1063),
(1488, 'Wilaoya', 6.9216, 81.3833),
(1489, 'Yudaganawa', 6.77688, 81.2297),
(1490, 'Mullativu', 9.26667, 80.8167),
(1491, 'Agarapathana', 6.82422, 80.7097),
(1492, 'Ambatalawa', 7.05, 80.6667),
(1493, 'Ambewela', 6.89993, 80.7836),
(1494, 'Bogawantalawa', 6.8, 80.6833),
(1495, 'Bopattalawa', 6.9011, 80.6694),
(1496, 'Dagampitiya', 6.9776, 80.4661),
(1497, 'Dayagama Bazaar', 6.9011, 80.6694),
(1498, 'Dikoya', 6.8786, 80.6272),
(1499, 'Doragala', 7.0731, 80.5892),
(1500, 'Dunukedeniya', 6.98264, 80.6329),
(1501, 'Egodawela', 7.02408, 80.6626),
(1502, 'Ekiriya', 7.14883, 80.7572),
(1503, 'Elamulla', 7.0833, 80.8),
(1504, 'Ginigathena', 6.9864, 80.4894),
(1505, 'Gonakele', 6.9917, 80.8194),
(1506, 'Haggala', 6.9697, 80.77),
(1507, 'Halgranoya', 7.0417, 80.8917),
(1508, 'Hangarapitiya', 6.93264, 80.465),
(1509, 'Hapugasthalawa', 7.0667, 80.5667),
(1510, 'Harasbedda', 7.04738, 80.8765),
(1511, 'Hatton', 6.89936, 80.5999),
(1512, 'Hewaheta', 7.1108, 80.7547),
(1513, 'Hitigegama', 6.94752, 80.4572),
(1514, 'Jangulla', 7.0333, 80.8917),
(1515, 'Kalaganwatta', 7.10423, 80.9027),
(1516, 'Kandapola', 6.98149, 80.8028),
(1517, 'Karandagolla', 7.05702, 80.8998),
(1518, 'Keerthi Bandarapura', 7.1108, 80.8581),
(1519, 'Kiribathkumbura', 7.1108, 80.7547),
(1520, 'Kotiyagala', 6.78417, 80.6856),
(1521, 'Kotmale', 7.0214, 80.5942),
(1522, 'Kottellena', 6.89329, 80.5022),
(1523, 'Kumbalgamuwa', 7.10988, 80.8539),
(1524, 'Kumbukwela', 7.05573, 80.8875),
(1525, 'Kurupanawela', 7.01894, 80.921),
(1526, 'Labukele', 7.0442, 80.6919),
(1527, 'Laxapana', 6.8952, 80.5088),
(1528, 'Lindula', 6.92033, 80.6841),
(1529, 'Madulla', 7.04767, 80.9182),
(1530, 'Mandaram Nuwara', 7.0833, 80.8),
(1531, 'Maskeliya', 6.83138, 80.5686),
(1532, 'Maswela', 7.0725, 80.6439),
(1533, 'Maturata', 7.0833, 80.8),
(1534, 'Mipanawa', 7.0333, 80.9167),
(1535, 'Mipilimana', 6.8667, 80.8167),
(1536, 'Morahenagama', 6.94263, 80.4785),
(1537, 'Munwatta', 7.11534, 80.8094),
(1538, 'Nayapana Janapadaya', 7.0731, 80.5892),
(1539, 'Nildandahinna', 7.0833, 80.8833),
(1540, 'Nissanka Uyana', 6.8358, 80.5703),
(1541, 'Norwood', 6.83574, 80.6022),
(1542, 'Nuwara Eliya', 6.9697, 80.77),
(1543, 'Padiyapelella', 7.09251, 80.7985),
(1544, 'Pallebowala', 7.1151, 80.8108),
(1545, 'Panvila', 7.0667, 80.6833),
(1546, 'Pitawala', 6.99861, 80.4523),
(1547, 'Pundaluoya', 7.01826, 80.6761),
(1548, 'Ramboda', 7.06043, 80.6953),
(1549, 'Rikillagaskada', 7.14585, 80.781),
(1550, 'Rozella', 6.9306, 80.5531),
(1551, 'Rupaha', 7.0333, 80.9),
(1552, 'Ruwaneliya', 6.93721, 80.7723),
(1553, 'Santhipura', 6.9697, 80.77),
(1554, 'Talawakele', 6.9367, 80.6611),
(1555, 'Tawalantenna', 7.0667, 80.6833),
(1556, 'Teripeha', 7.1189, 80.9244),
(1557, 'Udamadura', 7.09411, 80.9148),
(1558, 'Udapussallawa', 7.0333, 80.9111),
(1559, 'Uva Deegalla', 7.0333, 80.8917),
(1560, 'Uva Uduwara', 7.0333, 80.8917),
(1561, 'Uvaparanagama', 6.8832, 80.7912),
(1562, 'Walapane', 7.09192, 80.8605),
(1563, 'Watawala', 6.95134, 80.5332),
(1564, 'Widulipura', 6.8952, 80.5088),
(1565, 'Wijebahukanda', 7.0167, 80.6167),
(1566, 'Attanakadawala', 7.90373, 80.8281),
(1567, 'Bakamuna', 7.7833, 80.8167),
(1568, 'Diyabeduma', 7.89851, 80.8983),
(1569, 'Elahera', 7.7244, 80.7883),
(1570, 'Giritale', 7.9833, 80.9333),
(1571, 'Hingurakdamana', 8.0559, 81.0119),
(1572, 'Hingurakgoda', 8.0365, 80.9487),
(1573, 'Jayanthipura', 8, 81),
(1574, 'Kalingaela', 7.9583, 81.0417),
(1575, 'Lakshauyana', 7.9583, 81.0417),
(1576, 'Mankemi', 7.9833, 81.25),
(1577, 'Minneriya', 8.03634, 80.9032),
(1578, 'Onegama', 7.9922, 81.0908),
(1579, 'Orubendi Siyambalawa', 7.75197, 80.8121),
(1580, 'Palugasdamana', 8.0167, 81.0833),
(1581, 'Panichankemi', 7.9833, 81.25),
(1582, 'Polonnaruwa', 7.9403, 81.0071),
(1583, 'Talpotha', 8.0167, 81.0833),
(1584, 'Tambala', 8.0167, 81.0833),
(1585, 'Unagalavehera', 8.00101, 80.9956),
(1586, 'Wijayabapura', 8.0167, 81.0833),
(1587, 'Adippala', 7.5833, 79.8417),
(1588, 'Alutgama', 7.7667, 79.9333),
(1589, 'Alutwewa', 7.8667, 79.95),
(1590, 'Ambakandawila', 7.5333, 79.8),
(1591, 'Anamaduwa', 7.88163, 80.0035),
(1592, 'Andigama', 7.7775, 79.9528),
(1593, 'Angunawila', 7.7667, 79.85),
(1594, 'Attawilluwa', 7.4167, 79.8833),
(1595, 'Bangadeniya', 7.61947, 79.8091),
(1596, 'Baranankattuwa', 7.80325, 79.8726),
(1597, 'Battuluoya', 7.73465, 79.8175),
(1598, 'Bujjampola', 7.3333, 79.9),
(1599, 'Chilaw', 7.5758, 79.7953),
(1600, 'Dalukana', 7.3167, 79.85),
(1601, 'Dankotuwa', 7.30044, 79.885),
(1602, 'Dewagala', 7.3167, 79.85),
(1603, 'Dummalasuriya', 7.4833, 79.9),
(1604, 'Dunkannawa', 7.4167, 79.9),
(1605, 'Eluwankulama', 8.33283, 79.8599),
(1606, 'Ettale', 8.09742, 79.7173),
(1607, 'Galamuna', 7.46466, 79.8724),
(1608, 'Galmuruwa', 7.50172, 79.8958),
(1609, 'Hansayapalama', 7.3167, 79.85),
(1610, 'Ihala Kottaramulla', 7.38307, 79.8718),
(1611, 'Ilippadeniya', 7.56704, 79.8262),
(1612, 'Inginimitiya', 7.9641, 80.1121),
(1613, 'Ismailpuram', 8.0333, 79.8167),
(1614, 'Jayasiripura', 7.6333, 79.8167),
(1615, 'Kakkapalliya', 7.5333, 79.8267),
(1616, 'Kalkudah', 8.1167, 79.7167),
(1617, 'Kalladiya', 7.95, 79.9333),
(1618, 'Kandakuliya', 7.98, 79.9569),
(1619, 'Karathivu', 8.19251, 79.8327),
(1620, 'Karawitagara', 7.57242, 79.8617),
(1621, 'Karuwalagaswewa', 8.03763, 79.9427),
(1622, 'Katuneriya', 7.3667, 79.8333),
(1623, 'Koswatta', 7.3667, 79.9),
(1624, 'Kottantivu', 7.85, 79.7833),
(1625, 'Kottapitiya', 7.63568, 79.8154),
(1626, 'Kottukachchiya', 7.93862, 79.9546),
(1627, 'Kumarakattuwa', 7.66196, 79.8869),
(1628, 'Kurinjanpitiya', 7.98, 79.9569),
(1629, 'Kuruketiyawa', 8.0167, 80.05),
(1630, 'Lunuwila', 7.35082, 79.8572),
(1631, 'Madampe', 7.5, 79.8333),
(1632, 'Madurankuliya', 7.89639, 79.8364),
(1633, 'Mahakumbukkadawala', 7.85, 79.9),
(1634, 'Mahauswewa', 7.9575, 80.0683),
(1635, 'Mampitiya', 7.3167, 79.85),
(1636, 'Mampuri', 7.9964, 79.7411),
(1637, 'Mangalaeliya', 7.775, 79.85),
(1638, 'Marawila', 7.4094, 79.8322),
(1639, 'Mudalakkuliya', 7.79953, 79.9774),
(1640, 'Mugunuwatawana', 7.58487, 79.8547),
(1641, 'Mukkutoduwawa', 7.92824, 79.7565),
(1642, 'Mundel', 7.7958, 79.8283),
(1643, 'Muttibendiwila', 7.45, 79.8833),
(1644, 'Nainamadama', 7.3714, 79.8837),
(1645, 'Nalladarankattuwa', 7.68915, 79.8442),
(1646, 'Nattandiya', 7.4086, 79.8683),
(1647, 'Nawagattegama', 8, 80.1167),
(1648, 'Nelumwewa', 7.3167, 79.85),
(1649, 'Norachcholai', 7.9964, 79.7411),
(1650, 'Pallama', 7.68122, 79.9182),
(1651, 'Palliwasalturai', 7.98, 79.9569),
(1652, 'Panirendawa', 7.54243, 79.8864),
(1653, 'Parakramasamudraya', 7.8667, 79.95),
(1654, 'Pothuwatawana', 7.4833, 79.9),
(1655, 'Puttalam', 8.04361, 79.8412),
(1656, 'Puttalam Cement Factory', 7.4167, 79.8833),
(1657, 'Rajakadaluwa', 7.65052, 79.8283),
(1658, 'Saliyawewa Junction', 7.4167, 79.8833),
(1659, 'Serukele', 7.7333, 79.9167),
(1660, 'Siyambalagashene', 7.8239, 79.978),
(1661, 'Tabbowa', 7.4167, 79.8833),
(1662, 'Talawila Church', 7.9964, 79.7411),
(1663, 'Toduwawa', 7.4861, 79.8022),
(1664, 'Udappuwa', 7.5758, 79.7953),
(1665, 'Uridyawa', 7.8239, 79.978),
(1666, 'Vanathawilluwa', 8.17001, 79.8461),
(1667, 'Waikkal', 7.2833, 79.85),
(1668, 'Watugahamulla', 7.4667, 79.9),
(1669, 'Wennappuwa', 7.35048, 79.8501),
(1670, 'Wijeyakatupotha', 7.5758, 79.7953),
(1671, 'Wilpotha', 7.5758, 79.7953),
(1672, 'Yodaela', 7.5833, 79.8667),
(1673, 'Yogiyana', 7.28604, 79.9242),
(1674, 'Akarella', 6.59053, 80.6442),
(1675, 'Amunumulla', 6.7333, 80.75),
(1676, 'Atakalanpanna', 6.5333, 80.6),
(1677, 'Ayagama', 6.63662, 80.3173),
(1678, 'Balangoda', 6.66174, 80.6937),
(1679, 'Batatota', 6.8333, 80.3667),
(1680, 'Beralapanathara', 6.4521, 80.4894),
(1681, 'Bogahakumbura', 6.6833, 80.7667),
(1682, 'Bolthumbe', 6.73911, 80.665),
(1683, 'Bomluwageaina', 6.4, 80.6333),
(1684, 'Bowalagama', 6.3917, 80.6833),
(1685, 'Bulutota', 6.4333, 80.65),
(1686, 'Dambuluwana', 6.7167, 80.3333),
(1687, 'Daugala', 6.4901, 80.4248),
(1688, 'Dela', 6.6258, 80.4486),
(1689, 'Delwala', 6.51305, 80.474),
(1690, 'Dodampe', 6.73603, 80.3011),
(1691, 'Doloswalakanda', 6.55133, 80.4703),
(1692, 'Dumbara Manana', 6.68032, 80.2475),
(1693, 'Eheliyagoda', 6.85, 80.2667),
(1694, 'Ekamutugama', 6.3406, 80.7804),
(1695, 'Elapatha', 6.66081, 80.3668),
(1696, 'Ellagawa', 6.5687, 80.363),
(1697, 'Ellaulla', 6.8583, 80.3083),
(1698, 'Ellawala', 6.80995, 80.2595),
(1699, 'Embilipitiya', 6.3439, 80.8489),
(1700, 'Eratna', 6.7986, 80.3784),
(1701, 'Erepola', 6.80428, 80.2428),
(1702, 'Gabbela', 6.7167, 80.35),
(1703, 'Gangeyaya', 6.7516, 80.5927),
(1704, 'Gawaragiriya', 6.6422, 80.2667),
(1705, 'Gillimale', 6.729, 80.4415),
(1706, 'Godakawela', 6.5056, 80.6473),
(1707, 'Gurubewilagama', 6.7, 80.5667),
(1708, 'Halwinna', 6.6833, 80.7167),
(1709, 'Handagiriya', 6.56284, 80.7803),
(1710, 'Hatangala', 6.53253, 80.7394),
(1711, 'Hatarabage', 6.65, 80.75),
(1712, 'Hewanakumbura', 6.6833, 80.7667),
(1713, 'Hidellana', 6.7192, 80.3842),
(1714, 'Hiramadagama', 6.53354, 80.6004),
(1715, 'Horewelagoda', 6.3917, 80.6833),
(1716, 'Ittakanda', 6.40353, 80.6365),
(1717, 'Kahangama', 6.70422, 80.3629),
(1718, 'Kahawatta', 6.70815, 80.3038),
(1719, 'Kalawana', 6.5316, 80.4073),
(1720, 'Kaltota', 6.6833, 80.6833),
(1721, 'Kalubululanda', 6.6833, 80.7667),
(1722, 'Kananke Bazaar', 6.7361, 80.4354),
(1723, 'Kandepuhulpola', 6.6833, 80.7667),
(1724, 'Karandana', 6.77254, 80.2069),
(1725, 'Karangoda', 6.67722, 80.3687),
(1726, 'Kella Junction', 6.4, 80.6833),
(1727, 'Keppetipola', 6.6833, 80.7667),
(1728, 'Kiriella', 6.75358, 80.2658),
(1729, 'Kiriibbanwewa', 6.3406, 80.7804),
(1730, 'Kolambage Ara', 6.7516, 80.5927),
(1731, 'Kolombugama', 6.5667, 80.4833),
(1732, 'Kolonna', 6.4041, 80.6815),
(1733, 'Kudawa', 6.75734, 80.5045),
(1734, 'Kuruwita', 6.7792, 80.3686),
(1735, 'Lellopitiya', 6.65517, 80.4714),
(1736, 'Imaduwa', 6.7361, 80.4354),
(1737, 'Imbulpe', 6.7159, 80.6375),
(1738, 'Mahagama Colony', 6.3406, 80.7804),
(1739, 'Mahawalatenna', 6.5833, 80.75),
(1740, 'Makandura', 6.5333, 80.6),
(1741, 'Malwala Junction', 6.7, 80.4333),
(1742, 'Malwatta', 6.65, 80.4167),
(1743, 'Matuwagalagama', 6.7667, 80.2333),
(1744, 'Medagalature', 6.6414, 80.2882),
(1745, 'Meddekanda', 6.6833, 80.6833),
(1746, 'Minipura Dumbara', 6.5687, 80.363),
(1747, 'Mitipola', 6.83692, 80.2219),
(1748, 'Moragala Kirillapone', 6.8333, 80.3),
(1749, 'Morahela', 6.67997, 80.6915),
(1750, 'Mulendiyawala', 6.29166, 80.7602),
(1751, 'Mulgama', 6.64594, 80.8178),
(1752, 'Nawalakanda', 6.5167, 80.3333),
(1753, 'Nawinnapinnakanda', 6.7168, 80.4999),
(1754, 'Niralagama', 6.65, 80.3667),
(1755, 'Nivitigala', 6.6, 80.4553),
(1756, 'Omalpe', 6.32739, 80.6947),
(1757, 'Opanayaka', 6.60836, 80.6251),
(1758, 'Padalangala', 6.24496, 80.916),
(1759, 'Pallebedda', 6.45, 80.7333),
(1760, 'Pallekanda', 6.6333, 80.6667),
(1761, 'Pambagolla', 6.7333, 80.6833),
(1762, 'Panamura', 6.35142, 80.7764),
(1763, 'Panapola', 6.42534, 80.4454),
(1764, 'Paragala', 6.60132, 80.3436),
(1765, 'Parakaduwa', 6.82548, 80.299),
(1766, 'Pebotuwa', 6.54019, 80.4522),
(1767, 'Pelmadulla', 6.62007, 80.5422),
(1768, 'Pinnawala', 6.73125, 80.6721),
(1769, 'Pothdeniya', 6.8333, 80.3),
(1770, 'Rajawaka', 6.60935, 80.798),
(1771, 'Ranwala', 6.55312, 80.6655),
(1772, 'Rassagala', 6.69523, 80.6173),
(1773, 'Rathgama', 6.7333, 80.4833),
(1774, 'Ratna Hangamuwa', 6.65, 80.3667),
(1775, 'Ratnapura', 6.6776, 80.4056),
(1776, 'Sewanagala', 6.3406, 80.7804),
(1777, 'Sri Palabaddala', 6.8002, 80.4762),
(1778, 'Sudagala', 6.7833, 80.4),
(1779, 'Thalakolahinna', 6.5844, 80.7332),
(1780, 'Thanjantenna', 6.6361, 80.8536),
(1781, 'Theppanawa', 6.75, 80.3167),
(1782, 'Thunkama', 6.2833, 80.8833),
(1783, 'Udakarawita', 6.7317, 80.4287),
(1784, 'Udaniriella', 6.65, 80.3667),
(1785, 'Udawalawe', 6.7516, 80.5927),
(1786, 'Ullinduwawa', 6.36732, 80.6312),
(1787, 'Veddagala', 6.45, 80.4333),
(1788, 'Vijeriya', 6.4, 80.6333),
(1789, 'Waleboda', 6.72637, 80.6411),
(1790, 'Watapotha', 6.57796, 80.5107),
(1791, 'Waturawa', 6.4833, 80.4333),
(1792, 'Weligepola', 6.56721, 80.7071),
(1793, 'Welipathayaya', 6.6833, 80.6833),
(1794, 'Wikiliya', 6.6203, 80.7467),
(1795, 'Agbopura', 8.33057, 80.9719),
(1796, 'Buckmigama', 8.6667, 80.95),
(1797, 'China Bay', 8.56166, 81.1874),
(1798, 'Dehiwatte', 8.4458, 81.2875),
(1799, 'Echchilampattai', 8.4458, 81.2875),
(1800, 'Galmetiyawa', 8.3683, 81.0281),
(1801, 'Gomarankadawala', 8.67773, 80.9604),
(1802, 'Kaddaiparichchan', 8.4592, 81.2782),
(1803, 'Kallar', 8.2833, 81.2667),
(1804, 'Kanniya', 8.6333, 81.0167),
(1805, 'Kantalai', 8.36548, 80.9669),
(1806, 'Kantalai Sugar Factory', 8.3683, 81.0281),
(1807, 'Kiliveddy', 8.35409, 81.2756),
(1808, 'Kinniya', 8.49772, 81.1792),
(1809, 'Kuchchaveli', 8.79271, 81.0361),
(1810, 'Kumburupiddy', 8.7333, 81.15),
(1811, 'Kurinchakemy', 8.4989, 81.1897),
(1812, 'Lankapatuna', 8.4458, 81.2875),
(1813, 'Mahadivulwewa', 8.61386, 80.9518),
(1814, 'Maharugiramam', 8.4989, 81.1897),
(1815, 'Mallikativu', 8.4458, 81.2875),
(1816, 'Mawadichenai', 8.4458, 81.2875),
(1817, 'Mullipothana', 8.3683, 81.0281),
(1818, 'Mutur', 8.45, 81.2667),
(1819, 'Neelapola', 8.4458, 81.2875),
(1820, 'Nilaveli', 8.65876, 81.1485),
(1821, 'Pankulam', 8.6333, 81.0167),
(1822, 'Pulmoddai', 8.9333, 80.9833),
(1823, 'Rottawewa', 8.6333, 81.0167),
(1824, 'Sampaltivu', 8.6167, 81.2),
(1825, 'Sampoor', 8.49335, 81.2848),
(1826, 'Serunuwara', 8.4458, 81.2875),
(1827, 'Seruwila', 8.4458, 81.2875),
(1828, 'Sirajnagar', 8.3683, 81.0281),
(1829, 'Somapura', 8.4458, 81.2875),
(1830, 'Tampalakamam', 8.4925, 81.0964),
(1831, 'Thuraineelavanai', 8.2833, 81.2667),
(1832, 'Tiriyayi', 8.7444, 81.15),
(1833, 'Toppur', 8.4, 81.3167),
(1834, 'Trincomalee', 8.5667, 81.2333),
(1835, 'Wanela', 8.3683, 81.0281),
(1836, 'Vavuniya', 8.75882, 80.4935),
(1837, 'Colombo 1', 6.92583, 79.8417),
(1838, 'Colombo 3', 6.90056, 79.8533),
(1839, 'Colombo 4', 6.88889, 79.8567),
(1840, 'Colombo 5', 6.87944, 79.8653),
(1841, 'Colombo 7', 6.90667, 79.8633),
(1842, 'Colombo 9', 6.93, 79.8778),
(1843, 'Colombo 10', 6.92833, 79.8642),
(1844, 'Colombo 11', 6.93667, 79.8497),
(1845, 'Colombo 12', 6.9425, 79.8583),
(1846, 'Colombo 14', 6.9475, 79.8747);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`, `status`, `deleted`) VALUES
(43, 'sasdfs', 'sfsfsdfsd', 'dsfsfsfsfsdf', 'opened', 0),
(59, 'vbnvb', 'vbnvbn', 'vbnvb', 'opened', 0),
(60, NULL, NULL, NULL, 'opened', 0),
(61, NULL, NULL, NULL, 'opened', 0),
(62, NULL, NULL, NULL, 'opened', 0),
(63, NULL, NULL, NULL, 'opened', 0),
(64, NULL, NULL, NULL, 'opened', 0),
(65, NULL, NULL, NULL, 'opened', 0),
(66, NULL, NULL, NULL, 'opened', 0),
(67, NULL, NULL, NULL, 'opened', 0),
(68, NULL, NULL, NULL, 'opened', 0),
(69, NULL, NULL, NULL, 'opened', 0),
(70, NULL, NULL, NULL, 'opened', 0),
(71, 'Tharindud', 'maduranga.tharidu@gmail.com', 'sadasdad', 'opened', 0),
(72, 'Tharindud', 'maduranga.tharidu@gmail.com', 'sadasdad', 'opened', 0),
(73, NULL, NULL, NULL, 'opened', 0),
(74, NULL, NULL, NULL, 'opened', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `bld_grp` varchar(5) DEFAULT NULL,
  `bld_banks` varchar(20) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stk_id` int(11) DEFAULT NULL,
  `tested_disease` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `donor_id`, `bld_grp`, `bld_banks`, `status`, `stk_id`, `tested_disease`, `date`, `deleted`) VALUES
(2, 8, 'A-', NULL, NULL, NULL, NULL, '2021-07-27', 0),
(3, 8, 'AB+', 'Jaffna', NULL, NULL, NULL, '2021-02-21', 0),
(4, 8, 'A-', 'horana', NULL, NULL, NULL, '2021-07-24', 0),
(5, 8, 'O+', '', NULL, NULL, NULL, '2021-04-24', 0),
(6, 8, 'A+', '', '', NULL, NULL, '2021-07-24', 0),
(8, 8, 'AB-', '', 'WBC', NULL, NULL, '2021-09-24', 0),
(9, 8, 'A+', '', 'WBC', NULL, NULL, '2021-07-24', 0),
(10, 8, 'A+', '', NULL, NULL, NULL, '2021-07-24', 0),
(11, 8, 'A+', '', 'WBC', NULL, NULL, '2021-07-24', 0),
(12, 8, 'A+', '', 'WBC', NULL, NULL, '2021-02-24', 0),
(13, 8, 'AB+', '', 'RBC', NULL, NULL, '2021-07-24', 0),
(14, 8, 'A-', '', 'WBC', NULL, NULL, '2021-07-24', 0),
(15, 8, 'O-', '', 'WBC', NULL, NULL, '2021-07-24', 0),
(16, 8, 'A+', 'Horana', NULL, NULL, NULL, '2021-07-27', 0),
(17, 8, 'A+', 'aewe', NULL, NULL, NULL, '2021-07-27', 0),
(18, 8, 'A+', 'cvvc', NULL, NULL, NULL, '2021-07-27', 0),
(19, 8, 'A+', 'cvvc', NULL, NULL, NULL, '2021-07-27', 0),
(20, 8, 'A+', 'bnbbv', NULL, NULL, NULL, '2021-07-28', 0),
(21, 8, 'A+', 'asdasd', NULL, NULL, NULL, '2021-07-28', 0),
(22, 8, 'A+', 'bb', NULL, NULL, NULL, '2021-07-28', 0),
(23, 8, 'A+', 'Jaffna', NULL, NULL, NULL, '2021-07-28', 0),
(24, 8, 'A+', 'hjkhjkh', NULL, NULL, NULL, '2021-07-30', 0),
(25, 8, 'A+', 'gfhfg', NULL, NULL, NULL, '2021-07-30', 0),
(26, 8, 'A+', 'sds', NULL, NULL, NULL, '2021-07-30', 0),
(27, 8, 'A+', 'dds', NULL, NULL, NULL, '2021-07-30', 0),
(28, 8, 'A+', 'sssss', NULL, NULL, NULL, '2021-07-30', 0),
(29, 8, 'A+', 'aaaa', NULL, NULL, NULL, '2021-07-30', 0),
(30, 17, 'B+', 'Horana', NULL, NULL, NULL, '2021-07-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation_record`
--

CREATE TABLE `donation_record` (
  `id` int(5) NOT NULL,
  `donor_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `verified` varchar(10) DEFAULT NULL,
  `weight` int(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `donor_name` varchar(100) DEFAULT NULL,
  `bld_grp` varchar(10) DEFAULT NULL,
  `din_name` varchar(100) DEFAULT NULL,
  `mo_name` varchar(100) DEFAULT NULL,
  `of_name` varchar(100) DEFAULT NULL,
  `ph_name` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `history` varchar(50) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `cus` int(5) DEFAULT NULL,
  `bp` int(5) DEFAULT NULL,
  `cue` varchar(5) DEFAULT NULL,
  `pd` varchar(5) DEFAULT NULL,
  `hd` int(5) DEFAULT NULL,
  `temporary_deferral` int(5) DEFAULT NULL,
  `permanent_deferral` int(5) DEFAULT NULL,
  `resons_deferral` varchar(150) DEFAULT NULL,
  `hb_lvl1` tinyint(1) DEFAULT NULL,
  `hb_lvl2` tinyint(1) DEFAULT NULL,
  `Q` tinyint(1) DEFAULT NULL,
  `T` tinyint(1) DEFAULT NULL,
  `D` tinyint(1) DEFAULT NULL,
  `S` tinyint(1) DEFAULT NULL,
  `st_time` time DEFAULT NULL,
  `et_time` time DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `cm_no` int(10) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tested_disease` varchar(255) DEFAULT NULL,
  `is_added` varchar(10) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_record`
--

INSERT INTO `donation_record` (`id`, `donor_id`, `staff_id`, `verified`, `weight`, `date`, `location`, `donor_name`, `bld_grp`, `din_name`, `mo_name`, `of_name`, `ph_name`, `name`, `history`, `remarks`, `cus`, `bp`, `cue`, `pd`, `hd`, `temporary_deferral`, `permanent_deferral`, `resons_deferral`, `hb_lvl1`, `hb_lvl2`, `Q`, `T`, `D`, `S`, `st_time`, `et_time`, `amount`, `cm_no`, `status`, `tested_disease`, `is_added`, `deleted`) VALUES
(1, 8, 1, 'Yes', 0, '2021-09-13', 'Jaffna', 'Tharindu Maduranga', 'A+', 'gh', 'Thar', '', '', '', NULL, 'asd', 10, 0, 'X', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00', '00:00:00', 0, 1899, 'approved', 'hjkhj', 'No', 0),
(2, 7, 1, NULL, NULL, '2021-09-16', 'Jaffna', 'sdf', 'A+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1245, 'approved', 'zxzxzzxxzzxc', 'Yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `nic` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `donor_city` varchar(120) DEFAULT NULL,
  `donor_email` varchar(35) DEFAULT NULL,
  `donor_mobile` varchar(10) DEFAULT NULL,
  `donor_name` varchar(100) DEFAULT NULL,
  `donor_lname` varchar(50) DEFAULT NULL,
  `donor_bloodgroup` varchar(5) DEFAULT NULL,
  `donor_age` int(5) DEFAULT NULL,
  `donor_sex` varchar(10) DEFAULT NULL,
  `tested_diseases` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `verification_code` varchar(300) DEFAULT NULL,
  `is_active` varchar(100) DEFAULT NULL,
  `form` varchar(40) DEFAULT NULL,
  `acl` text DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `nic`, `password`, `donor_city`, `donor_email`, `donor_mobile`, `donor_name`, `donor_lname`, `donor_bloodgroup`, `donor_age`, `donor_sex`, `tested_diseases`, `dob`, `verification_code`, `is_active`, `form`, `acl`, `hash`, `deleted`) VALUES
(4, 'donor3', '$2y$10$yVEstL.RRwsWfVanabCPce2JeLE9ILDUKH4FCZAv1BpwPLo9n4enG', 'Matara', 'ceteja5424@wawue.com', NULL, 'tharidu', '0', 'A+', 12, 'female', NULL, NULL, NULL, NULL, NULL, '[\"Donor\"]', NULL, 0),
(5, 'donor5', '$2y$10$Yaj95yQaj79x.tynOJwr/OVi5msYTtnMxJuk4/nyrGUsRgh7.cEaa', 'Galle', 'qweqweqw@mai.com', NULL, 'qwerty', '0', 'A+', 45, 'female', NULL, NULL, NULL, NULL, NULL, '[\"Donor\"]', NULL, 0),
(7, '973531576V', '$2y$10$HRUFCp.VG2/TxMEYeOoF3.6V8WHrvQH8EfujxH/F9A7.VpSp80JaS', 'Ingiriya', 'thae@gmail.com', NULL, 'qwer', 'sdft', 'A+', 23, 'female', NULL, NULL, NULL, NULL, NULL, '[\"Donor\"]', NULL, 0),
(8, '973533576V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Horana', '334sdfssssdf@hmm.com', '0762247830', 'Tharinduss', 'Maduranga', 'A+', 23, 'male', NULL, '1997-12-18', NULL, 'confirm', 'submitted', '[\"Donor\"]', NULL, 0),
(9, '973533574V', '$2y$10$/lHxihU7gK0o1zCx/MPCX.QLkLiSI/JBxy.0zu1MQiEJBo3tEMfIG', 'Kagalla', 'asanka@gmail.com', '122344', 'Asanka', 'hasi', 'A-', 20, 'male', NULL, '1971-07-06', NULL, NULL, NULL, '[\"Donor\"]', NULL, 0),
(42, '97355576V', '$2y$10$ebd5cCpEbuSeKXqdNIXc/uAuqvSsqZABz1p.cNnQern8P.6rSQwOG', 'Lahugala', 'b3@gmail.com', '0762247830', 'sass', 'ssssss', 'B+', 0, 'male', NULL, '0000-00-00', 'wE5feJATFZZ0M3f6kYVk8k5EZnvVvHWZ', 'unverified', NULL, '[\"Donor\"]', NULL, 0),
(45, '23735537576V', '$2y$10$x3Vc31outlSZFqf1QPR/Ee52AeeFJ2RnqTkvOV9TCOQYb9NaaZYfi', 'Matara', 'sadadgad@gmail.com', '0762247830', 'asasas', 'Maduranga', 'O-', 0, 'none', NULL, '2021-08-09', 'SBcTaEEn3fZqg8igT1uA4tOnI5vP1sxM', 'unverified', NULL, '[\"Donor\"]', NULL, 0),
(46, '9735645576V', '$2y$10$ZE48VpYYLf.mKvGaMWzRbO1E5yWF0NCsp9TlLPp.vZkCRTa8z1BWK', 'Ampara', 'asdad@gmail.co', '0762247830', 'asasas', 'adasdasd', 'A-', 0, 'none', NULL, '2021-08-04', 'tw8nQn22OdSDFhimMt6AFOEyAMjmnUyI', 'unverified', NULL, '[\"Donor\"]', NULL, 0),
(47, '973555522V', '$2y$10$U2BoZjV2LpZxFSVgeTjv8ObRZuvUqji7xkUx8ID5c5HA9vx6zpjZu', 'Ampara', 'dsfsf@faf.sd', '0762234567', 'Tharindu', 'asasasas', 'O+', 0, 'none', NULL, '2021-08-13', 'IqbIc28yrtQB8Bbi7MyiaZsYMbaxtQ5D', 'unverified', NULL, '[\"Donor\"]', NULL, 0),
(48, '97323455576V', '$2y$10$02eosImSW9wV6tWAEGzdmOd.wYbKEN3FNrGH4zLBWNvYQofBH1Bom', 'Galle', 'asdasd@fsd.sd', '0762234567', 'asasasa', 'Maduranga', 'O+', 23, 'none', NULL, '0000-00-00', 'howCafn1tfGTvwDSjPTC3WCfetBqgalN', 'unverified', NULL, '[\"Donor\"]', NULL, 0),
(49, '974555576V', '$2y$10$.4f9L62.nt5VAJhCugWfteOYwPie7xHKR.kVkLvFUl.ZRee/lLFKC', 'LuhugaLuhugala', 'asas@asd.cas', '0762247830', 'Tharindu', 'asasas', 'A-', 0, 'none', NULL, '2021-08-20', 'sG6H77K5p5k800Dn5y1MZS34gYygUjXJ', 'confirm', NULL, '[\"Donor\"]', NULL, 0),
(50, '97353223576V', '$2y$10$SJ1s2t7GrCAemKsqy.sC1uki1MVKFCsT.Fee3nM/pEAfDI2ymfRbS', 'Komari', 'maduranga.tharidu@gmail.com', NULL, 'Tharindu Maduranga', NULL, 'O+', NULL, NULL, NULL, '1990-06-06', 'wFIimEV8vbEOHAyihH130wYjn8Xt2GgS', 'confirm', 'not_submitted', '[\"Donor\"]', NULL, 0),
(51, '9733433576V', '$2y$10$fbJ2/zqCJotBa2yZaO0OOO.rX9nQ.tTcWoZLjmbEh/kqb2QJsk6Jy', 'Luhugala', 'xinepoj601@vefblogg.com', NULL, 'Tharin', NULL, 'B-', NULL, NULL, NULL, '1981-10-06', '3SkkUY2Ki16tfIGEvif7mZjQYP83CiFH', 'unverified', 'not_submitted', '[\"Donor\"]', NULL, 0),
(61, '641754784V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'ambagahawatta', 'ranjith@gmail.com', '0701234589', 'Ranjith	', 'Perera	', 'AB+', 57, 'male	', NULL, '1964-10-05', NULL, 'confirm', 'submitted	', '[\"Donor\"]', NULL, 0),
(62, '547746745V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'ampara', 'Somasena@gmail.com', '0774567894', 'Somasena', 'Jayathissa', 'O+', 67, 'male	', NULL, '1954-02-02', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(63, '942258846V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Lahugala', 'Chathura	@gmail.com', '0777534128', 'Chathura	', 'Jayalath	', 'A+', 27, 'male	', NULL, '1994-01-07', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(64, '933462124V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Lahugala	', 'Nirmala@gmail.com', '0717849253', 'Nirmala	', 'Thennakoon', 'B+', 28, 'female	', NULL, '1993-10-01', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(65, '206795329V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Lahugala	', 'Supuni@gmail.com	', '0757845635', 'Supuni	', 'Karunarathne', 'O-', 21, 'female	', NULL, '2000-05-20', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(66, '924432105V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Lahugala	', 'Manjulaa@gmail.com', '0787951356', 'Manjulaa	', 'Darmadasa', 'B-', 29, 'female	', NULL, '1992-04-06', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(67, '968145055V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ampara	', 'Damith@gmail.com	', '0755413484', 'Damith	', 'Kobbakaduwa', 'A-', 25, 'male	', NULL, '1996-03-21', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(68, '995264114V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ampara	', 'Nuwani @gmail.com', '0714865114', 'Nuwani 	', 'Peris	', 'O+', 22, 'female	', NULL, '1999-05-11', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(69, '956786339V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ampara	', 'Chamara @gmail.com', '0705498144', 'Chamara ', 'Balasuriya', 'O+', 26, 'male	', NULL, '1995-02-24', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(70, '647146779V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ampara	', 'Semini @gmail.com', '0706659518', 'Semini 	', 'Nilawathura', 'O+', 57, 'female	', NULL, '1964-06-07', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(71, '978134446V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ampara	', 'Mohomad@gmail.com', '0772487245', 'Mohomad', 'Ebrahim	', 'O-', 24, 'male	', NULL, '1997-08-30', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(72, '619279558V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Mahaoya	', 'Gamini@gmail.com	', '0777813485', 'Gamini	', 'Jayaweera', 'AB-', 60, 'male	', NULL, '1961-05-27', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(73, '664164339V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Mahaoya	', 'Serath@gmail.com	', '0779517535', 'Serath	', 'Abewikkrama', 'AB+', 55, 'male	', NULL, '1966-08-12', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(74, '963789779V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Mahaoya	', 'Lakmal@gmail.com	', '0701345238', 'Lakmal	', 'Dias	', 'AB-', 25, 'male	', NULL, '1996-01-17', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(75, '988456448V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Namaloya', 'Vinod@gmail.com	', '0701782452', 'Vinod	', 'Gamage	', 'AB+', 23, 'male	', NULL, '1998-05-18', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(76, '791153442V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Namaloya', 'Sujeewa@gmail.com', '0757458965', 'Sujeewa	', 'Mahawatta', 'B+', 42, 'male	', NULL, '1979-12-10', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(77, '566751776V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Namaloya', 'Darmasena@gmail.com', '0781452362', 'Darmasena', 'Kodithuwakku', 'B+', 65, 'male	', NULL, '1956-07-22', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(78, '943156117V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Namaloya', 'Shiromi@gmail.com', '0711245236', 'Shiromi	', 'Suriyapperuma', 'A+', 27, 'female	', NULL, '1994-03-23', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(79, '972953443V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ambagahawatta', 'Sahan@gmail.com	', '0757346294', 'Sahan 	', 'Iddagoda	', 'O+', 24, 'male	', NULL, '1997-11-20', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(80, '014759119V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ambagahawatta', 'Amani@gmail.com	', '0707006868', 'Amani	', 'De Silva	', 'AB+', 20, 'female	', NULL, '2001-02-24', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(81, '938459188V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ampara', 'Sudeed@gmail.com', '0774589231', 'Sudeed	', 'Alhamin	', 'AB-', 28, 'male	', NULL, '1993-09-12', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0),
(82, '977754149V', '$2y$10$74knsY2zLtJ1zHr3TgnaqONL3clt/Zr4bR0dA9X306XOYIfe3qxzi', 'Ampara', 'Abdul@gmail.com	', '0777339911', 'Abdul	', 'Nisham	', 'A-', 24, 'male	', NULL, '1997-11-05', NULL, 'confirm', 'submitted	', '[\"Donor\"]	', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(10) NOT NULL,
  `donor_id` int(10) DEFAULT NULL,
  `_1_1` varchar(100) DEFAULT NULL,
  `_1_2` int(13) DEFAULT NULL,
  `_1_3` date DEFAULT NULL,
  `_1_4` varchar(100) DEFAULT NULL,
  `_1_5` varchar(100) DEFAULT NULL,
  `_1_6` varchar(100) DEFAULT NULL,
  `_1_7` varchar(100) DEFAULT NULL,
  `_2_1` varchar(100) DEFAULT NULL,
  `_2_2` varchar(100) DEFAULT NULL,
  `_2_3` varchar(100) DEFAULT NULL,
  `_2_4` varchar(100) DEFAULT NULL,
  `_2_5` varchar(100) DEFAULT NULL,
  `_2_6` varchar(100) DEFAULT NULL,
  `_3_1` varchar(100) DEFAULT NULL,
  `_3_2` varchar(100) DEFAULT NULL,
  `_4_1` varchar(100) DEFAULT NULL,
  `_4_2` varchar(100) DEFAULT NULL,
  `_4_3` varchar(100) DEFAULT NULL,
  `_4_4` varchar(100) DEFAULT NULL,
  `_4_5` varchar(100) DEFAULT NULL,
  `_4_6` varchar(100) DEFAULT NULL,
  `_5_1` varchar(100) DEFAULT NULL,
  `_5_2` varchar(100) DEFAULT NULL,
  `_5_3` varchar(100) DEFAULT NULL,
  `_5_4` varchar(100) DEFAULT NULL,
  `_6_1` varchar(100) DEFAULT NULL,
  `_6_2` varchar(100) DEFAULT NULL,
  `_7` varchar(100) DEFAULT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `name` varchar(35) DEFAULT NULL,
  `bloodgroup` varchar(5) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `_2_2_1` varchar(120) DEFAULT NULL,
  `_2_2_2` varchar(120) DEFAULT NULL,
  `_2_2_3` varchar(120) DEFAULT NULL,
  `_2_2_4` varchar(120) DEFAULT NULL,
  `_2_2_5` varchar(120) DEFAULT NULL,
  `_2_2_6` varchar(120) DEFAULT NULL,
  `_2_2_7` varchar(120) DEFAULT NULL,
  `_2_2_8` varchar(120) DEFAULT NULL,
  `_2_2_9` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `donor_id`, `_1_1`, `_1_2`, `_1_3`, `_1_4`, `_1_5`, `_1_6`, `_1_7`, `_2_1`, `_2_2`, `_2_3`, `_2_4`, `_2_5`, `_2_6`, `_3_1`, `_3_2`, `_4_1`, `_4_2`, `_4_3`, `_4_4`, `_4_5`, `_4_6`, `_5_1`, `_5_2`, `_5_3`, `_5_4`, `_6_1`, `_6_2`, `_7`, `nic`, `address`, `email`, `mobile`, `name`, `bloodgroup`, `age`, `sex`, `dob`, `deleted`, `_2_2_1`, `_2_2_2`, `_2_2_3`, `_2_2_4`, `_2_2_5`, `_2_2_6`, `_2_2_7`, `_2_2_8`, `_2_2_9`) VALUES
(60, 8, 'ke;', 0, '0000-00-00', 'Tõ', ' \r\n 									 ', 'ke;', 'Tõ', 'ke;', NULL, 'Tõ', 'ke;', 'ke;', 'ke;', 'ke;', 'ke;', 'Tõ', 'ke;', 'ke;', 'Tõ', 'ke;', 'Tõ', 'Tõ', 'ke;', 'ke;', 'Tõ', 'ke;', 'Tõ', 'udi 6lg jrla', '973533576V', '70/A/02,Gurugoda,Poruwadanda', 'maduranga.tharidu@gmail.com', '0762247830', 'Palle Arachchige Tharindu Maduranga', 'A+', 24, 'male', '1989-08-12', 0, '✓', '✓', '✓', '✓', '✓', '✓', '✓', '✓', '✓');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(5) NOT NULL,
  `cid` int(5) DEFAULT NULL,
  `nearest_location` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `cid`, `nearest_location`, `city`, `date`, `time`, `deleted`) VALUES
(3, 1, 'Ampara Hospital', 'Ampara', NULL, NULL, 0),
(50, 2, 'Horana Hospital', 'horana', '2021-10-20', '06:57:09', 0),
(51, 2, 'Colombo', 'Colombo', '2021-10-10', '12:58:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manage_blood`
--

CREATE TABLE `manage_blood` (
  `user_id` int(11) NOT NULL,
  `bld_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manage_donor`
--

CREATE TABLE `manage_donor` (
  `user_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manage_pt`
--

CREATE TABLE `manage_pt` (
  `user_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `pt_name` varchar(35) DEFAULT NULL,
  `pt_nic` varchar(15) DEFAULT NULL,
  `sex` varchar(13) DEFAULT NULL,
  `pt_bloodgroup` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pt_mobile` varchar(10) DEFAULT NULL,
  `pt_city` text DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `pt_name`, `pt_nic`, `sex`, `pt_bloodgroup`, `dob`, `pt_mobile`, `pt_city`, `qty`, `date`, `location`, `deleted`) VALUES
(1, 'Senanayakage don sumanasriri', '431278183V', 'male', 'A+', '1943-02-20', '0721456321', 'Kochchikade', 1, '2021-03-02', 'Matara', 0),
(2, 'Sumith kalana Liyanage', '826453297V', 'male', 'A+', '1982-05-23', '0702356428', 'Waskaduwa', 2, '2021-03-02', 'Matara', 0),
(3, 'Nuwan Chaminda Perera', '912980146V', 'male', 'AB+', '1991-07-02', '0779864581', 'Kakunadura', 2, '2021-04-01', 'Matara', 0),
(4, 'Manjula Damayanthi Dissanayake', '810980176V', 'female', 'O+', '1981-05-20', '0701563594', 'Dehiwala', 1, '2021-04-20', 'Matara', 0),
(5, 'Kalana Lakmal Weerarathne', '950187456V', 'male', 'O+', '1995-05-20', '0754621358', 'Rawathawaththa', 1, '2021-04-29', 'Matara', 0),
(6, 'Dipika Damayanthi DE Silva', '900453285V', 'female', 'AB+', '1990-02-05', '0774598763', 'Beliaththa', 1, '2021-05-11', 'Matara', 0),
(7, 'Nimal Duminda gamage', '971247563V', 'male', 'O+', '1997-10-08', '0714532231', 'Hakmana', 1, '2021-07-15', 'Matara', 0),
(8, 'Kumudu Mallika Kodithuwakku', '927865162V', 'female', 'AB+', '1992-02-02', '0784588712', 'Kuliyapitiya', 1, '2021-07-20', 'Matara', 0),
(9, 'Ramani Menaka Dasanayake', '781245355V', 'female', 'AB+', '1978-10-12', '0774528650', 'Ampara', 1, '2021-07-20', 'Matara', 0),
(10, 'Suresh murugan ', '900458524V', 'male', 'A+', '1990-01-12', '0774587841', 'Jaffna', 1, '2021-07-21', 'Matara', 0),
(11, 'Nimal Ranjith Mudalige', '435875494V', 'male', 'O+', '1943-04-26', '0714578685', 'Kandy', 2, '2021-07-23', 'Matara', 0),
(12, 'Gayani Kumari Samaradiwaakara', '7845212137V', 'female', 'O+', '1978-10-14', '0704587821', 'Kelaniya', 1, '2021-07-27', 'Matara', 0),
(13, 'Lalith prasanga Weerawansha ', '724586524V', 'male', 'B+', '1972-03-27', '0774232387', 'Bandarawela', 1, '2021-07-27', 'Matara', 0),
(14, 'Janaka Peris', '616587282V', 'male', 'B-', '1961-02-01', '0714542423', 'Ja-Ella', 2, '2021-07-28', 'Matara', 0),
(15, 'Nimali Dissanayake', '9045328771', 'female', 'A-', '1990-05-07', '0717465286', 'Galle', 1, '2021-07-28', 'Matara', 0),
(16, 'Kamal Nandasena', '654578351V', 'male', 'O-', '1965-07-11', '0751243942', 'Puththalama', 1, '2021-07-29', 'Galle', 0),
(17, 'Vijitha Darshani Nawarathna', '804532165V', 'female', 'B-', '1980-01-01', '0714535267', 'Halawatha', 2, '2021-08-02', 'Galle', 0),
(18, 'Nuwa sandeepa peris', '912343512V', 'male', 'A-', '1991-07-03', '0774588942', 'Ampara', 2, '2021-08-03', 'Galle', 0),
(19, 'Deepika sudarshima', '921346795V', 'female', 'AB-', '1992-04-05', '0701468723', 'Maggona', 1, '2021-08-04', 'Galle', 0),
(20, 'Chamod Kankanamge', '960970292V', 'male', 'O+', '1996-01-12', '0717864294', 'Mirihana', 2, '2021-08-04', 'Galle', 0),
(21, 'Gunapa karunaraththa', '544865743V', 'male', 'B-', '1954-05-02', '0724769384', 'Ambalangoda', 1, '2021-10-01', 'Galle', 0),
(22, 'Asanka patabadige', '997563448V', 'male', 'O-', '1999-09-29', '0787893297', 'Panadura', 1, '2021-10-05', 'Galle', 0),
(23, 'Vijitha Darshani Nawarathna', '604853252V', 'female', 'B-', '1960-01-01', '0764876145', 'Madampe', 1, '2021-08-02', 'Galle', 0),
(24, 'Darmasena Jinadasa Walawita', '507846531V', 'male', 'B-', '1950-01-01', '0714566544', 'Kochchikade', 1, '2021-08-02', 'Galle', 0),
(25, 'Kasun naveen Bandara', '965784652V', 'male', 'A-', '1996-01-01', '0717894587', 'Galle', 1, '2021-08-05', 'Galle', 0),
(26, 'Naveesha jayamini Ranawaka', '904576256V', 'female', 'O+', '1990-01-01', '0754785695', 'Galle', 1, '2021-08-06', 'Galle', 0),
(27, 'Mayumi Wimansa Baddewithana', '984665721V', 'female', 'B-', '1998-01-01', '0714512542', 'Kalutara', 2, '2021-08-06', 'Galle', 0),
(28, 'Viraji Perera', '964785622V', 'female', 'AB+', '1996-01-01', '0711200651', 'Wadduwa', 1, '2021-08-11', 'Kandy', 0),
(29, 'Ashoka Ranjith Amarathunga', '604785329V', 'male', 'B+', '1960-01-01', '0781230998', 'Kurunegala', 2, '2021-08-11', 'Kandy', 0),
(30, 'Jayanath Dissanayake', '924712451V', 'male', 'O-', '1992-01-01', '0717845785', 'Kandy', 2, '2021-08-12', 'Kandy', 0),
(31, 'Samarasiri Jayathilaka', '475610235V', 'male', 'O+', '1947-01-01', '0714124421', 'Kandy', 1, '2021-08-13', 'Kandy', 0),
(32, 'Chanaka Maduranga', '964752316V', 'male', 'O+', '1996-01-01', '0714653285', 'Galle', 1, '2021-08-14', 'Kandy', 0),
(33, 'Sadamal Ranasinghe', '967465281V', 'male', 'A+', '1996-01-01', '0798325986', 'Kandy', 1, '2021-08-14', 'Kandy', 0),
(34, 'Shavindu Senaadheera', '984562143V', 'male', 'AB+', '1998-01-01', '0709852100', 'Matara', 1, '2021-08-14', 'Kandy', 0),
(35, 'Ishara Ranaweera', '965415241V', 'male', 'A-', '1996-01-01', '0774578446', 'Matara', 1, '2021-08-15', 'Kandy', 0),
(36, 'Ashoka Hadagama', '701452368V', 'male', 'B-', '1970-01-01', '0770325035', 'Anuradapura', 1, '2021-08-15', 'Kandy', 0),
(37, 'Janaka Wakkubura', '757865412V', 'male', 'O-', '1975-01-01', '0717845695', 'Horowpathana', 2, '2021-08-15', 'Kandy', 0),
(38, 'Sujeewa Prasannarachchi', '607542136V', 'male', 'AB+', '1960-01-01', '0714632856', 'Hambanthota', 2, '2021-08-16', 'Kandy', 0),
(39, 'Jonston Frenando', '427846355V', 'male', 'AB-', '1942-01-01', '0715874682', 'Colombo', 2, '2021-08-18', 'Kandy', 0),
(40, 'Channa Jayasumana', '774845354V', 'male', 'AB-', '1977-01-01', '0765492594', 'Matale', 2, '2021-08-20', 'Kandy', 0),
(41, 'Bawantha Ranasinhe', '931204523V', 'male', 'B+', '1993-01-01', '0721851465', 'Mannaram', 2, '2021-08-20', 'Kandy', 0),
(42, 'Dasun Senadheera', '804532165V', 'male', 'B-', '1980-01-01', '0714535267', 'Halawatha', 1, '2021-08-02', 'Panadura', 0),
(43, 'Sanduni perera', '973544765V', 'female', 'A-', '1997-01-01', '0762247830', 'Tangalle', 1, '2021-08-05', 'Panadura', 0),
(44, 'Akila Senarathna', '551247896V', 'female', 'B+', '1955-01-01', '0712960535', 'Matara', 1, '2021-08-02', 'Panadura', 0),
(45, 'Kusal  Rathnayaka', '906548753V', 'male', 'O-', '1990-01-01', '0772210264', 'Thissamaharama', 1, '2021-08-12', 'Panadura', 0),
(46, 'Sunil Rathwaththa', '848956174V', 'male', 'AB-', '1984-01-01', '0712359231', 'Rathnapura', 2, '2021-08-08', 'Panadura', 0),
(47, 'Upul  Nanayakkara', '609532147V', 'male', 'A+', '1960-01-01', '0765248193', 'Nikaweratiya', 2, '2021-08-04', 'Panadura', 0),
(48, 'Sachithra Senarathna', '856974825V', 'female', 'O+', '1985-01-01', '0725647892', 'Kurunegala', 2, '2021-08-22', 'Panadura', 0),
(49, 'Nimal  Bandara', '983125874V', 'male', 'O-', '1998-01-01', '0714589621', 'Ragama', 2, '2021-08-18', 'Panadura', 0),
(50, 'Vijitha  Poojapitiya', '653985641V', 'female', 'B-', '1965-01-01', '0755896472', 'Kalutara', 2, '2021-08-15', 'Panadura', 0),
(51, 'Lakmali  Ranathunga', '889745623V', 'female', 'AB-', '1988-01-01', '0775531856', 'Gampaha', 2, '2021-08-25', 'Panadura', 0),
(52, 'Kasun Jayawardana', '898263476V', 'male', 'A+', '1989-01-01', '0778965412', 'Ampara', 1, '2021-08-14', 'Panadura', 0);

-- --------------------------------------------------------

--
-- Table structure for table `removed`
--

CREATE TABLE `removed` (
  `id` int(11) NOT NULL,
  `stk_id` int(11) DEFAULT NULL,
  `bld_grps` varchar(10) DEFAULT NULL,
  `bld_rbc` tinyint(1) DEFAULT 0,
  `bld_wbc` tinyint(1) DEFAULT 0,
  `bld_plates` tinyint(1) DEFAULT 0,
  `bld_plasma` tinyint(1) DEFAULT 0,
  `bld_bank` varchar(35) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `removed`
--

INSERT INTO `removed` (`id`, `stk_id`, `bld_grps`, `bld_rbc`, `bld_wbc`, `bld_plates`, `bld_plasma`, `bld_bank`, `deleted`) VALUES
(1, NULL, 'A+', 1, 1, NULL, 1, NULL, 0),
(2, NULL, 'A+', 1, 1, NULL, 1, NULL, 0),
(10, NULL, 'A+', 1, 1, NULL, NULL, NULL, 0),
(12, NULL, 'A+', 1, 1, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `requestcamp`
--

CREATE TABLE `requestcamp` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nic` varchar(100) DEFAULT NULL,
  `mobile` int(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nst_bank` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'unchecked',
  `date` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requestcamp`
--

INSERT INTO `requestcamp` (`id`, `name`, `nic`, `mobile`, `email`, `nst_bank`, `location`, `city`, `status`, `date`, `deleted`) VALUES
(1, 'Palle Arachchige Tharindu Maduranga', '973533576V', 762247830, 'maduranga.tharidu@gmail.com', 'Jaffna', 'Sri Palee College - Horana', 'Horana', 'approved', '2021-10-17', 0),
(2, 'ssss', '973533576V', 762247830, 'maduranga.tharidu@gmail.com', 'Jaffna', 'dsfsdf', 'Horana', 'approved', '2021-10-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `acl` varchar(20) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `username` varchar(135) NOT NULL,
  `staff_mobile` varchar(10) DEFAULT NULL,
  `staff_office` int(14) DEFAULT NULL,
  `staff_email` varchar(35) DEFAULT NULL,
  `staff_address` text DEFAULT NULL,
  `staff_name` varchar(135) DEFAULT NULL,
  `pro_img` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `assigned` varchar(255) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `acl`, `password`, `username`, `staff_mobile`, `staff_office`, `staff_email`, `staff_address`, `staff_name`, `pro_img`, `deleted`, `assigned`, `designation`, `nic`, `hash`) VALUES
(1, '[\"Nurse\"]', '$2y$10$KygAs9QyfkD66JjlTm.aG.M3bEV3gLoQOmqtP11joDxzP69wiTRYm', 'Tharindu1', '0771234561', NULL, 'Tharindu1@gmail.com', 'horana', 'Tha', 'tharindu1-89b0c29226fd927aaddf3fac69513b82.jpeg', 0, 'Matara', 'MO', NULL, NULL),
(2, '[\"Nurse\"]', '$2y$10$V4LhI1AM2RrOgsKWUHyU0e76CgAYpweoFUTywAp7b4ax.rGPXiSeK', 'Sumudu', '0714563214', NULL, 'sumudu@gmail.com', 'sdadad', 'madu', '', 0, 'Matara', NULL, NULL, NULL),
(3, '[\"Nurse\"]', '$2y$10$0wQxwZLIvdrBI0Fd7E95lOjLQEAYX/kfbtxGR62iAXNtbvlQJuGSO', 'Namal', '0771754217', NULL, 'namal@gmail.com', NULL, 'fdgdfg', NULL, 0, 'Matara', NULL, '3435', NULL),
(4, '[\"Nurse\"]', '$2y$10$H3K4Q5UsS1MW9esC.neLFu6nCymS4e.7thjsjX1EIi/2YWgqsYPm2', 'Sanuri', '0717846532', NULL, 'sanuri@gmail.com', NULL, 'fdgdfg', NULL, 0, 'Matara', NULL, '97356633576V', NULL),
(5, '[\"Nurse\"]', '$2y$10$hSwA9zZ/ca.wRrpNAHjy1uI018JXM3ocKHOK4JV4rRdFLPNr6PNRm', 'Vijitha', '0717842145', NULL, 'vijitha@gmail.com', NULL, 'ghjghjgh', NULL, 0, 'Matara', NULL, '97366533576V', NULL),
(6, '[\"Doctor\"]', '$2y$10$KygAs9QyfkD66JjlTm.aG.M3bEV3gLoQOmqtP11joDxzP69wiTRYm', 'Maduranga', '0758452103', NULL, 'maduranga@gmail.com', NULL, 'asd', NULL, 0, 'Matara', NULL, '973533576V', NULL),
(7, '[\"MLT\"]', '$2y$10$puldzPgZtzIfBLlPQMYhXe.O7B8pgqldSDDUz8zgsSWkY/wVNg6uS', 'Nalin', '0758452103', NULL, 'nalin@gmail.com', NULL, 'asdad asdada', NULL, 0, 'Matara', NULL, '973543576V', NULL),
(8, '[\"Doctor\"]', '$2y$10$2f9LcRDvEk9TrpVWUxYHWe6QjNr8BdT295aqIncVxZZFKqxUylKqi', 'Gayantha', '0784821036', NULL, 'gayantha@gmail.com', NULL, 'fds dfgd', NULL, 0, 'Matara', NULL, '973533576V', NULL),
(9, '[\"BSK\"]', '$2y$10$ShsouBzGv7buSHR4TREaCe7Jh2wo1CiBP7.TO4j9SFI.WcgczXUmy', 'Tharaka', '0787845001', 0, 'tharaka@dsf.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Matara', NULL, '973533576V', NULL),
(10, '[\"MLT\"]', '$2y$10$3bJ1DVUOZVyIjie9rvUIo.r53w8CiywMWg7OYliZk.t.n9gIrbRQ.', 'Jagath', '0720424855', NULL, 'jagath@gmail.com', NULL, 'asd adafgfg', NULL, 0, 'Matara', NULL, '973533576V', NULL),
(11, '[\"Nurse\"]', '$2y$10$SZ1ZsgqIEHFPpuclbC5rruyYpdlTFCLLZ4KR2.9c0yKBQCkEFHuU2', 'Kumari', '0707784450', NULL, 'kumari@gmail.com', NULL, 'dfgdfg dfgdgd', NULL, 0, 'Matara', NULL, '973533576V', NULL),
(12, '[\"Doctor\"]', '$2y$10$s.Zao9sq5i7cPZ/av5XnDOp.MqHkTFo.U8UWO6BWa8ryxQZjumECy', 'Tharindu', '0724814815', NULL, 'tharidu@gmail.com', NULL, 'Tharindu maduranga', NULL, 0, 'Galle', NULL, '973533576V', 'FKpmxbMZ5LY8gnZJtJXwbuyyQxaA673z'),
(13, '[\"MLT\"]', '$2y$10$i3pt2Qxv.avewDaoxxIl8O6Y0qQ1Sr8lKDrzAUXSBD3kud16YaphK', 'Malinga', '0714631852', NULL, 'malinga@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(17, '[\"MLT\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Lahiru', '0712580241', NULL, 'lahiru@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(18, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Ruwangi', '0718454154', NULL, 'ruwangi@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(19, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Hasini', '0782154214', NULL, 'hasini@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(20, '[\"Doctor\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Jeewantha', '0782154214', NULL, 'jeewantha@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(21, '[\"BSK\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Rohana', '0711548411', NULL, 'rohana@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(22, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Chalani', '0711548411', NULL, 'chalani@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(23, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Kumudu', '0707845210', NULL, 'kumudu@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(24, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Rasangi', '0704154415', NULL, 'rasangi@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Galle', NULL, '973533576V', NULL),
(25, '[\"Doctor\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Anura', '0774551891', NULL, 'anura@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(26, '[\"Doctor\"]', '$2y$10$KygAs9QyfkD66JjlTm.aG.M3bEV3gLoQOmqtP11joDxzP69wiTRYm', 'Sagara', '0778463210', NULL, 'sagara@gmail.com', NULL, 'Tharindu ', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(27, '[\"Doctor\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Pasidu', '0761425864', NULL, 'pasidu@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(28, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Pawani', '0763145282', NULL, 'pawani@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(29, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Supuni', '0712442121', NULL, 'supuni@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(30, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Mangala', '0753584211', NULL, 'mangala@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(31, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Padmini', '0765865512', NULL, 'padmini@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(32, '[\"MLT\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Nipuna', '0765865512', NULL, 'nipuna@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(33, '[\"Doctor\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Senaka', '0769889520', NULL, 'senaka@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(34, '[\"BSK\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Saliya', '0712110012', NULL, 'saliya@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(35, '[\"MLT\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Diwakara', '0754861235', NULL, 'diwakara@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Kandy', NULL, '973533576V', NULL),
(36, '[\"Doctor\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Nirmala', '0784562854', NULL, 'nirmala@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL),
(37, '[\"Doctor\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'prasanna', '0784562854', NULL, 'prasanna@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL),
(38, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'chandima', '0715142548', NULL, 'chandima@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL),
(39, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Parami', '0702448652', NULL, 'parami@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL),
(40, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Sakunthala', '0721445210', NULL, 'sakunthala@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL),
(41, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Lakmi', '0721478541', NULL, 'lakmi@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL),
(42, '[\"Nurse\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Nimali', '0761852428', NULL, 'nimali@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL),
(43, '[\"BSK\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Sahan', '0714587420', NULL, 'sahan@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL),
(44, '[\"MLT\"]', '$2y$10$rO1SHPpQE5HA1h.luonjyesHokLZpRnVJNPefdvLCWRQ.HKUDgg26', 'Dinuka', '0758945321', NULL, 'dinuka@gmail.com', NULL, 'Tharindu Maduranga', NULL, 0, 'Panadura', NULL, '973533576V', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `cm_no` varchar(100) NOT NULL,
  `donor_nic` varchar(12) DEFAULT NULL,
  `bld_grps` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `bld_rbc` tinyint(1) DEFAULT 0,
  `bld_wbc` tinyint(1) DEFAULT 0,
  `bld_plates` tinyint(1) DEFAULT 0,
  `bld_plasma` tinyint(1) DEFAULT 0,
  `bld_banks` varchar(35) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `cm_no`, `donor_nic`, `bld_grps`, `date`, `bld_rbc`, `bld_wbc`, `bld_plates`, `bld_plasma`, `bld_banks`, `deleted`) VALUES
(1, '', '77353333V', 'A+', '2021-05-24', NULL, 1, NULL, NULL, 'Jaffna', 1),
(2, '', '6735335445V', 'B-', '2021-06-24', 1, 1, NULL, 1, 'Jaffna', 0),
(3, '', '943533345V', 'A+', '2021-08-24', NULL, 1, NULL, NULL, 'Jaffna', 1),
(4, '', '573533556V', 'A+', '2021-08-24', NULL, 1, NULL, NULL, 'asasa', 0),
(5, '', '973532376V', 'A+', '2021-07-24', 1, NULL, NULL, NULL, 'dd', 0),
(6, '', '973533556V', 'B+', '2021-07-24', NULL, 1, NULL, NULL, 'zcxz', 0),
(7, '', '973533576V', 'A+', '2021-07-24', 1, NULL, NULL, NULL, 'waaaa', 0),
(8, '1245', '973531576V', 'A+', '2021-10-13', 1, 1, 1, 1, NULL, 0),
(35, '1899', '973533576V', 'A+', '2021-10-13', 0, 1, 0, 0, 'Jaffna', 0),
(36, '1245', '973531576V', 'A+', '2021-10-13', 0, 0, 1, 0, 'Jaffna', 0),
(37, '1899', '973533576V', 'A+', '2021-10-13', 0, 0, 1, 0, 'Jaffna', 0),
(38, '1245', '973531576V', 'A+', '2021-10-13', 0, 0, 1, 0, 'Jaffna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(5) NOT NULL,
  `location_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `location_type`) VALUES
(1, 'Blood Bank'),
(2, 'Donor Camp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `acl` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `user_name` varchar(35) DEFAULT NULL,
  `user_mobile` varchar(10) DEFAULT NULL,
  `user_email` varchar(35) DEFAULT NULL,
  `user_address` text DEFAULT NULL,
  `login_username` varchar(35) DEFAULT NULL,
  `name` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `acl` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `session`, `user_agent`, `acl`) VALUES
(0, 1, '8df707a948fac1b4a0f97aa554886ec8', 'Mozilla (Windows NT 10.0; Win64; x64; rv:93.0) Gecko Firefox', NULL),
(0, 26, 'd2ddea18f00665ce8623e36bd4e3c7c5', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_ibfk_1` (`stk_id`);

--
-- Indexes for table `donation_record`
--
ALTER TABLE `donation_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_blood`
--
ALTER TABLE `manage_blood`
  ADD PRIMARY KEY (`user_id`,`bld_id`),
  ADD KEY `manage_blood_ibfk_1` (`bld_id`);

--
-- Indexes for table `manage_donor`
--
ALTER TABLE `manage_donor`
  ADD PRIMARY KEY (`user_id`,`donor_id`),
  ADD KEY `manage_donor_ibfk_1` (`donor_id`);

--
-- Indexes for table `manage_pt`
--
ALTER TABLE `manage_pt`
  ADD PRIMARY KEY (`user_id`,`pt_id`),
  ADD KEY `pt_id` (`pt_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `removed`
--
ALTER TABLE `removed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestcamp`
--
ALTER TABLE `requestcamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1847;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `donation_record`
--
ALTER TABLE `donation_record`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `removed`
--
ALTER TABLE `removed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requestcamp`
--
ALTER TABLE `requestcamp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`stk_id`) REFERENCES `removed` (`id`);

--
-- Constraints for table `manage_blood`
--
ALTER TABLE `manage_blood`
  ADD CONSTRAINT `manage_blood_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `manage_donor`
--
ALTER TABLE `manage_donor`
  ADD CONSTRAINT `manage_donor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `manage_pt`
--
ALTER TABLE `manage_pt`
  ADD CONSTRAINT `manage_pt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `manage_pt_ibfk_2` FOREIGN KEY (`pt_id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
