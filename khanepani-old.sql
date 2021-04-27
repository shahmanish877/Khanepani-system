-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 07:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khanepani`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `joinned` date DEFAULT NULL,
  `gharnum` varchar(10) DEFAULT NULL,
  `area` varchar(20) NOT NULL,
  `meter` varchar(15) NOT NULL,
  `address` varchar(20) NOT NULL,
  `father` varchar(30) DEFAULT NULL,
  `mother` varchar(30) DEFAULT NULL,
  `grandfather` varchar(50) DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `phone`, `joinned`, `gharnum`, `area`, `meter`, `address`, `father`, `mother`, `grandfather`, `remark`) VALUES
(3, 'Ram Bahadur', 9804007723, '2072-02-02', '-', '0', '3', 'Bagaichha tol', 'chandra bahadur magar', '-', '-', '-'),
(4, 'Gokul Ghimire', 9842056969, '2073-03-04', '-', '0', '4', 'school dada', 'khyamraj ghimire', '---', '-', '-'),
(5, 'Mamata chahar', 9829392061, '2074-05-02', '-', '0', '5', 'ghopali tol', 'juwalsingh darji', '-', '-', '-'),
(6, 'Sarita subba', 9842208855, '2072-01-02', '-', '0', '6', 'school dada', '-', '-', '-', '-'),
(7, 'dili bahadur khadka', 9818895165, '2067-04-02', '-', '1', '7', 'ghopali marga', 'kajiman khadka', '-', '-', '-'),
(10, 'laal bahadur sarki', 9803046390, '2076-12-06', '-', '0', '190713219', 'janajagaran tol', 'bhim bahadur sarki', '-', 'kal bahadur sarki', '-'),
(11, 'padam bahadur tamang', 9860893263, '2076-12-04', '-', '0', '190711828', 'ghopali tol', 'nara bahadur tamang', '-', '-', '-'),
(12, 'anjana rai', 9817344323, '2076-11-19', '-', '0', '190711796', 'janayudda tol', 'des bahadur rai', '-', '-', ''),
(13, 'kalpana rai', 980813517, '2076-11-28', '-', '0', '190713131', 'pani tanki', 'ganesh kumar rai', '-', '-', '-'),
(15, 'hem kumari karki', 9807004836, '2076-09-28', '-', '3/165', 'H007278', 'sutar chowk', 'gaurab ram karki', '-', '-', '-'),
(16, 'rajendra neupane', 9852056871, '2076-09-13', '-', '3/129', 'H007271', 'Bagaichha tol', 'ghanashyam neupane', '-', '-', '-'),
(17, 'tikaram khadka', 9808648833, '2076-10-06', '-', '3/190', 'H007275', 'school dada', 'til bahadur khadka', '-', '-', '-'),
(18, 'til bahadur surje magar', 9810210783, '2076-10-20', '-', '3/14', 'H004760', 'newar tol', 'deuraj surje magar', '-', 'man bahadur surje magar', '-'),
(19, 'ranju biswokarma', 9807368868, '2076-11-02', '-', '3/165', 'H004753', 'dharane line', 'gopal sarki', '-', 'suman biswokarma', ''),
(20, 'lal maya kepchhaki magar', 9815391133, '2076-11-21', '-', '1/291', '190711985', 'Bagaichha tol', 'Nara Bahadur Kepchhaki Magar', '-', 'Chahakman Kepchhaki Magar', '-'),
(21, 'Dil Bahadur Basnet', 9807303648, '2076-11-04', '-', '1/229', 'H004755', 'Bagaichha tol', 'adiman basnet', '-', '-', '-'),
(22, 'ram bahadur karki', 984205165, '2076-10-23', '-', '1', 'H004756', 'ukkhubari tol', 'amar bahadur karki', '-', 'hasta bahadur karki', '-'),
(23, 'chandra maya thapa magar', 9816397917, '2076-10-21', '-', '1/70', 'H004758', 'sital chowk', 'keshabram thapamagar', '-', 'jeewan shrestha', '-'),
(24, 'fulmaya karki', 9805348827, '2076-10-28', '-', '0.057971014', 'H004754', 'chhatiun chowk', 'durga bahadur karki', '-', '-', '-'),
(25, 'Urmila limbu', 9805336518, '2076-10-28', '-', '4/244', 'H004751', 'ghopali tol', 'jor bahadur rai', '-', 'kritiraj limbu', '-'),
(26, 'durga kumari basnet', 9811316690, '2076-10-09', '-', '4/5', 'H007273', 'ghopali marga', 'khadga bahadur basnet', '-', 'chandra bahadur katwal', '-'),
(27, 'krisna bahadur khadka', 9823576642, '2076-10-02', '-', '4/214', 'H007277', 'sudarkendra marga', 'nara bahadur khadka', '-', 'singha bahadur khadka', '-'),
(28, 'goma katuwal', 9842209321, '2076-09-13', '-', '4/71', '190705207', 'ghopali tol', 'khadga bahadur karki', '', 'nara bahadur katuwal', '-'),
(29, 'dhak bahadur rai', 9862164319, '2076-03-25', '-', '4/19', '190707927', 'ghopali tol', 'bakhat bahadur rai', '-', 'ram prashad rai', '-'),
(30, 'nawaraj thapa', 9823777725, '2076-09-28', '-', '5/95', 'H007279', 'saraswoti chowk', 'daghiram thapa', '-', 'man bahadur thapa', '-'),
(31, 'tikaram basnet', 9842064733, '2076-09-28', '-', '3/175', 'H007280', 'janayudda marga', 'chandra bahadur basnet', '-', 'sher bahadur basnet', ''),
(32, 'moti bahadur basnet', 9811087013, '2076-09-11', '-', '3/18', '190708377', 'saraswoti chowk', 'padam bahadur basnet', '-', 'khadga bahadur basnet', '-'),
(34, 'ekraj rai', 9843835335, '2076-10-29', '-', '2/96', 'H004752', 'janajagaran tol', 'chitra bahadur rai', '-', 'bir mani rai', ''),
(35, 'til kumari magar', 9811335313, '2076-10-06', '-', '2/350', 'H007276', 'dobaan line', 'bhakta bahadur rai', '-', 'bhuwan prashad rai', '-'),
(36, 'aarati rai', 9810407415, '2076-09-23', '-', '2/9', 'H005726', 'dobaan line', 'dil bahadur rai', '-', 'ratna bahadur rai', '-'),
(37, 'ram bahadur sarki', 9814765749, '2076-09-07', '-', '2/263', '190707953', 'janajagaran tol', 'tek bahadur sarki', '-', 'santa bahadur sarki', '-'),
(41, 'tal man limbu', 9811223344, '2067-02-02', '-', '1/2', '00001', 'Bagaichha tol', '-', '-', '-', '-'),
(42, 'chandra bahadur lungeli', 9812113354, '2071-07-02', '-', '1/3', '0002', 'Bagaichha tol', '-', '-', '-', '-'),
(43, 'singha bahadur aale', 9842145766, '2065-08-04', '-', '1/4', '0003', 'Bagaichha tol', '-', '-', '-', '-'),
(44, 'om prakash aale', 9812315658, '2065-10-02', '-', '1/5', '0004', 'Bagaichha tol', '-', '-', '-', '-'),
(45, 'manbahadur thapa magar', 9842520020, '2072-03-02', '-', '0.166666666', '0005', 'Bagaichha tol', '-', '-', '-', '-'),
(46, 'dil kumar rai', 9842342617, '2067-09-02', '-', '1/7', '0006', 'Bagaichha tol', '-', '-', '-', '-'),
(47, 'bhagishor magar', 9824357310, '2067-04-05', '-', '0.125000000', '0007', 'Bagaichha tol', '-', '-', '-', '-'),
(48, 'ishor lamichhane', 9804556214, '2068-04-03', '-', '1/9', '0008', 'Bagaichha tol', '-', '-', '-', '-'),
(49, 'khagendra magar', 9810553915, '2067-10-06', '-', '0.125000000', 'H004944', 'Bagaichha tol', '-', '-', '-', '-'),
(50, 'ramesh magar', 9810553913, '2067-04-03', '-', '0.090909090', '0010', 'Bagaichha tol', '-', '-', '-', '-'),
(51, 'chandra bahadur magar', 9842156648, '2069-07-02', '-', '1/10', '0011', 'Bagaichha tol', '-', '-', '-', '-'),
(52, 'kumar moktan', 9823142653, '2069-05-26', '-', '0.076923076', '0012', 'Bagaichha tol', '-', '-', '-', '-'),
(53, 'ramesh tamang', 9862145965, '2068-10-16', '-', '1/12', '0013', 'Bagaichha tol', '-', '-', '-', '-'),
(54, 'mangal bahadur tamang', 9824341565, '2069-05-30', '-', '1/15', '0014', 'Bagaichha tol', '-', '-', '-', '-'),
(55, 'ratna kumar khadka', 9814386796, '2067-12-29', '-', '0.071428571', '0705075', 'Bagaichha tol', '-', '-', '-', '-'),
(56, 'bir bahadur tamang', 9816349261, '2068-07-16', '-', '0.058823529', 'h05442', 'Bagaichha tol', '-', '-', '-', ''),
(57, 'ganesh gautam', 989819358595, '2073-04-06', '-', '0.066666666', '0017', 'Bagaichha tol', '', '', '', ''),
(58, 'tirtha bahadur tamang', 9845623589, '2070-08-24', '-', '1/19', '0018', 'Bagaichha tol', '-', '-', '-', '-'),
(59, 'bhim bhujel', 9807383710, '2071-01-31', '-', '0.050000000', '0706677', 'Bagaichha tol', '-', '-', '-', '-'),
(60, 'fadindra basnet', 9824946587, '2067-06-12', '-', '1/21', '0020', 'Bagaichha tol', '-', '-', '-', '-'),
(61, 'nir kumar kafle', 9854326261, '2072-05-16', '-', '1/22', '0021', 'Bagaichha tol', '-', '-', '-', '-'),
(62, 'deep bahadur basnet', 9862157623, '2068-11-03', '-', '0.047619047', 'H004899', 'Bagaichha tol', '-', '-', '-', '-'),
(63, 'geeta banjara', 9842341806, '2070-08-12', '-', '0.045454545', 'H004888', 'Bagaichha tol', '-', '-', '-', '-'),
(64, 'padam karki', 9854326561, '2069-11-03', '-', '1/25', '0024', 'Bagaichha tol', '-', '-', '-', '-'),
(65, 'tika maya basnet', 9842345698, '2067-09-28', '-', '0.038461538', 'H006210', 'Bagaichha tol', '-', '-', '-', '-'),
(66, 'ghanashyam neupane', 9817355854, '2073-01-03', '-', '0.037037037', '0706670', 'Bagaichha tol', '-', '-', '-', '-'),
(67, 'sabita tamang', 9817311970, '2068-05-22', '-', '0.035714285', 'H005732', 'Bagaichha tol', '', '', '', ''),
(69, 'bendra bahadur gurung', 9842156488, '2073-06-18', '-', '0.034482758', 'H009379', 'Bagaichha tol', '-', '-', '-', '-'),
(70, 'sanu kumari lungeli', 9815303972, '2067-11-18', '-', '0.033333333', 'H004718', 'Bagaichha tol', '-', '-', '-', '-'),
(71, 'bir bahadur khatri', 9862187922, '2073-01-15', '-', '1/31', '0030', 'Bagaichha tol', '-', '-', '-', '-'),
(72, 'durga khatri', 9807379445, '2068-05-07', '-', '0.031250000', '0706066', 'Bagaichha tol', '-', '-', '-', '-'),
(73, 'ram bahadur rai', 9862159861, '2067-06-21', '-', '1/31', '0032', 'Bagaichha tol', '', '', '', ''),
(75, 'kopila kafle', 980265987, '2068-09-23', '-', '1/32', '0033', 'Bagaichha tol', '-', '-', '-', '-'),
(76, 'chalimaya magar', 98270774819, '2069-08-27', '-', '0.030303030', '0034', 'Bagaichha tol', '-', '-', '-', '-'),
(77, 'jashmaya rai', 9804357662, '2071-08-23', '-', '1/36', '0035', 'Bagaichha tol', '-', '-', '-', '-'),
(78, 'khagendra subedi', 9842156897, '2068-03-12', '-', '1/35', '0036', 'Bagaichha tol', '-', '-', '-', '-'),
(79, 'yasodha chapagain', 9823167529, '2068-04-13', '-', '1/38', '0037', 'Bagaichha tol', '-', '-', '-', '-'),
(80, 'rajendra pathak', 9853269845, '2072-05-02', '-', '1/37', '0038', 'Bagaichha tol', '-', '-', '-', '-'),
(81, 'ram prashad chapagain', 9854326561, '2067-11-19', '-', '1/38', '0039', 'Bagaichha tol', '-', '-', '-', '-'),
(82, 'jagat bahadur rai', 9842039675, '2073-08-22', '-', '0.024390243', 'H0705304', 'Bagaichha tol', '-', '-', '-', '-'),
(83, 'ravi prashad gautam', 9854623496, '2072-03-02', '-', '1/40', '0041', 'Bagaichha tol', '-', '-', '-', '-'),
(84, 'krishna prashad gautam', 9856432168, '2072-01-23', '-', '1/41', '0042', 'Bagaichha tol', '-', '-', '-', '-'),
(85, 'tukendra gautam', 9852076732, '2073-05-08', '-', '0.023809523', 'H004319', 'Bagaichha tol', '-', '-', '-', '-'),
(86, 'jashmaya limbu', 9812569826, '2070-06-17', '-', '1/45', '0044', 'Bagaichha tol', '-', '-', '-', '-'),
(87, 'sabitra tamang', 9856123487, '2069-11-30', '-', '1/46', '0045', 'Bagaichha tol', '-', '-', '-', '-'),
(88, 'parbati siwakoti', 9862146359, '2060-06-15', '-', '1/45', '0046', 'Bagaichha tol', '-', '-', '-', ''),
(89, 'kumari siwakoti', 9804286935, '2066-07-11', '-', '1/45', '0047', 'Bagaichha tol', '-', '-', '-', '-'),
(90, 'bishworaj karki', 9856231478, '2069-08-19', '-', '1/47', '0048', 'Bagaichha tol', '-', '-', '-', '-'),
(91, 'somnath siwakoti', 9815694789, '2070-01-10', '-', '1/48', '0049', 'Bagaichha tol', '-', '-', '-', '-'),
(92, 'tanka basnet', 9804275698, '2067-07-24', '-', '1/49', '0050', 'Bagaichha tol', '-', '-', '-', '-'),
(93, 'brihaspati gautam', 9820659875, '2070-02-16', '-', '1/50', '0051', 'Bagaichha tol', '-', '-', '-', '-'),
(94, 'jyotikala rai', 9815326958, '2069-12-31', '-', '1/51', '0052', 'Bagaichha tol', '-', '-', '-', '-'),
(96, 'kamala subedi', 9804265394, '2063-07-23', '-', '1/51', '0053', 'Bagaichha tol', '-', '-', '-', '-'),
(97, 'netra prashain', 9804259686, '2068-03-17', '-', '1/53', '0054', 'Bagaichha tol', '-', '-', '-', '-'),
(98, 'dhan bahadur basnet', 980487965987, '2067-07-23', '-', '1/54', '0055', 'Bagaichha tol', '-', '-', '-', '-'),
(99, 'laal bahadur rai', 9853269486, '2069-05-15', '-', '1/55', '0056', 'Bagaichha tol', '-', '-', '-', '-'),
(100, 'sanimaya rai', 9823657894, '2070-09-24', '-', '1/58', '0057', 'Bagaichha tol', '-', '-', '-', '-'),
(101, 'dil bahadur niroula', 980476948513, '2067-06-07', '-', '1/51', '0058', 'Bagaichha tol', '-', '-', '-', '-'),
(102, 'bisnu maya luhol', 9856985621, '2070-10-28', '-', '1/60', '0059', 'Bagaichha tol', '-', '-', '-', '-'),
(103, 'bidya gurung', 9804236789, '2070-07-19', '-', '1/59', '0060', 'Bagaichha tol', '-', '-', '-', '-'),
(104, 'lalita luhola', 9814563256, '2070-01-02', '-', '1/60', '0061', 'Bagaichha tol-', '', '-', '-', '-'),
(105, 'laxmi prashad limbu', 9825356986, '2062-02-22', '-', '1/63', '0062', 'Bagaichha tol', '-', '-', '-', '-'),
(106, 'purna bahadur limbu', 9858697598, '2068-02-13', '-', '1/65', '0063', 'Bagaichha tol', '-', '-', '-', '-'),
(107, 'surya shrestha', 9821658991, '2070-02-09', '-', '1/65', '0064', 'Bagaichha tol', '-', '-', '-', ''),
(108, 'harkajung limbu', 9824156123, '2070-02-09', '-', '1/64', '0065', 'Bagaichha tol', '-', '-', '-', '-'),
(109, 'tularam ranamagar', 9857946851, '2067-03-03', '-', '1/65', '0066', 'Bagaichha tol', '-', '-', '-', '-'),
(110, 'khem kumar magar', 9821456987, '2071-02-05', '-', '1/68', '0067', 'Bagaichha tol', '-', '-', '-', '-'),
(111, 'raju tamang', 9856985213, '2069-02-04', '-', '1/69', '0068', 'Bagaichha tol', '-', '-', '-', '-'),
(112, 'ram bahadur dewan', 9986432726, '2070-03-16', '-', '1/69', '0069', 'Bagaichha tol', '-', '-', '-', '-'),
(113, 'durga shrestha', 9821547894, '2070-06-16', '-', '1/71', '0070', 'Bagaichha tol', '-', '-', '-', '-'),
(114, 'indra kumar lungeli', 9854986578, '2068-02-25', '-', '1/70', '0071', 'Bagaichha tol', '-', '-', '-', '-'),
(115, 'ambika devi dhakal', 9815698548, '2071-12-19', '-', '1/73', '0072', 'Bagaichha tol', '-', '-', '-', ''),
(116, 'prem kumar shrestha ', 9823569814, '2071-04-14', '-', '1/74', '0073', 'Bagaichha tol', '-', '-', '-', '-'),
(117, 'bindra bahadur khadka', 9804159875, '2070-10-22', '-', '1/75', '0074', 'Bagaichha tol', '-', '-', '-', '-'),
(118, 'hem kumar shrestha ', 9804569875, '2073-02-06', '-', '1/76', '0075', 'Bagaichha tol', '-', '-', '-', '-'),
(119, 'suman shah', 9815623548, '2069-02-18', '-', '1/75', '0076', 'Bagaichha tol', '-', '-', '-', '-'),
(120, 'puspa kumar limbu', 9856895741, '2069-05-21', '-', '1/78', '0077', 'Bagaichha tol', '-', '-', '-', '-'),
(121, 'sujit burja', 9804156891, '2070-11-22', '-', '1/79', '0078', 'Bagaichha tol', '-', '-', '-', '-'),
(122, 'bhim subedi', 9814569825, '2071-02-07', '-', '1/80', '0079', 'Bagaichha tol', '-', '-', '-', '-'),
(123, 'baalmati rai', 9856234875, '2068-02-11', '-', '1/79', '0080', 'Bagaichha tol', '-', '-', '-', ''),
(124, 'krishna thakuri', 9856231245, '2068-06-11', '-', '1/82', '0081', 'Bagaichha tol', '-', '-', '-', '-'),
(125, 'jashmaya gurbachhan', 9815469576, '2071-08-16', '-', '1/83', '0082', 'Bagaichha tol', '-', '-', '-', '-'),
(126, 'bindra rai', 9815623595, '2071-06-15', '-', '1/84', '0083', 'Bagaichha tol', '-', '-', '-', '-'),
(129, 'amar bahadur rai', 9562346895, '2071-11-20', '-', '1/85', '0084', 'Bagaichha tol', '-', '-', '-', '-'),
(130, 'maina rana', 9823598694, '2071-08-24', '-', '1/86', '0085', 'Bagaichha tol', '-', '-', '-', '-'),
(131, 'tanka lungeli', 9814563275, '2072-02-14', '-', '1/87', '0086', 'Bagaichha tol', '-', '-', '-', '-'),
(132, 'ram prashad thapamagar', 9804568694, '2071-10-15', '-', '1/88', '0087', 'Bagaichha tol', '-', '-', '-', '-'),
(133, 'suresh pulami', 984225684, '2071-07-18', '-', '1/89', '0088', 'Bagaichha tol', '-', '-', '-', '-'),
(134, 'Nawaraj Ghimire', 9845689515, '2071-08-24', '-', '1/88', '0089', 'Bagaichha tol', '-', '-', '-', '-'),
(135, 'bhoj bahadur thapamagar', 9845659812, '2068-02-12', '-', '1/91', '0090', 'Bagaichha tol', '--', '-', '-', '-'),
(136, 'laxmi lama', 9815469123, '2068-12-22', '-', '0.011111111', '0092', 'Bagaichha tol', '-', '-', '-', '-'),
(137, 'manoj pariyar ', 9845696875, '2069-10-23', '-', '1/92', '0093', 'Bagaichha tol', '-', '-', '-', '-'),
(138, 'panchamaya durlami', 9812564352, '2071-10-27', '-', '1/92', '0091', 'Bagaichha tol', '-', '-', '-', '-'),
(139, 'madan  kumar rai', 9815263654, '2070-06-23', '-', '1/95', '0094', 'Bagaichha tol', '-', '-', '-', '-'),
(140, 'ranamaya limbu', 9815487964, '2071-08-23', '-', '1/96', '0095', 'Bagaichha tol', '-', '-', '-', '-'),
(141, 'bhisma acharya', 9815426759, '2071-02-15', '-', '1/95', '0096', 'Bagaichha tol', '-', '-', '-', '-'),
(142, 'amrita rai', 9812365498, '2071-11-21', '-', '1/98', '0097', 'Bagaichha tol', '-', '-', '-', ''),
(143, 'harkaraj rai', 9823654879, '2070-08-19', '-', '1/99', '0098', 'Bagaichha tol', '-', '-', '-', '-'),
(144, 'tirtha subedi', 9804265987, '2070-01-31', '-', '1/98', '0099', 'Bagaichha tol', '-', '-', '-', '-'),
(145, 'chyawan rai', 9823654789, '2071-06-14', '-', '0.010101010', '0100', 'Bagaichha tol', '-', '-', '', '-'),
(146, 'san bahadur basnet', 9804154691, '2071-08-16', '-', '1/100', '0101', 'Bagaichha tol', '-', '-', '-', '-'),
(147, 'khem rai', 9852369847, '2071-06-23', '-', '1/101', '0102', 'Bagaichha tol', '-', '-', '-', '-'),
(148, 'balu basnet', 9804126985, '2071-12-25', '-', '1/102', '0103', 'Bagaichha tol', '-', '-', '-', '-'),
(149, 'dambar darlami', 9823587695, '2071-01-16', '-', '1/103', '104', 'Bagaichha tol', '-', '-', '-', '-'),
(150, 'malati thapamagar', 9842170759, '2072-02-27', '-', '1/104', '0105', 'Bagaichha tol', '-', '-', '-', '-'),
(151, 'man bahadur kalikote', 9814341245, '2071-02-07', '-', '0.009523809', 'H0705263', 'Bagaichha tol', '-', '-', '-', '-'),
(152, 'narendra karki', 9856321456, '2071-06-30', '-', '1/106', '0107', 'Bagaichha tol', '-', '-', '-', '-'),
(153, 'ratnamaya tamang', 9804357662, '2071-11-14', '-', '1/107', '0108', 'Bagaichha tol', '-', '-', '-', '-'),
(154, 'ganga rai', 9823159875, '2070-09-23', '-', '1/108', '0109', 'Bagaichha tol', '-', '-', '-', '-'),
(155, 'tilak bahadur poudel', 9823569817, '2071-07-11', '-', '1/109', '0110', 'Bagaichha tol', '-', '-', '-', '-\r\n'),
(156, 'damber darlami', 9814569878, '2071-06-16', '-', '1/105', '0104', 'Bagaichha tol', '-', '-', '-', '-'),
(157, 'rajendra subedi', 9804258966, '0000-00-00', '-', '1/112', '0111', 'Bagaichha tol', '-', '-', '-', '-'),
(158, 'nara bahadur budhathoki', 9829382368, '2071-07-19', '-', '4/84', '00083', 'chhotiline', 'surabir budhathoki', '-', '-', '-'),
(159, 'chakra bahadur bista', 9804387101, '2071-05-18', '-', '4/83', '00082', 'chhotiline', 'karna bahadur bista', 'chandra maya bista', '-', '-'),
(160, 'narabir darlami', 9804256958, '2072-03-16', '-', '1/113', '0112', 'Bagaichha tol', '-', '-', '-', '-'),
(161, 'sita bastola', 9812365478, '2072-04-14', '-', '1/112', '0113', 'Bagaichha tol', '-', '-', '-', '-'),
(162, 'devi pariyar', 9811383979, '2072-12-13', '-', '0.008849557', '6706545', 'Bagaichha tol', '-', '-', '-', '-'),
(163, 'sanu gurbachhan', 9845698632, '2072-08-15', '-', '1/114', '0115', 'Bagaichha tol', '-', '-', '-', '-'),
(164, 'yagya kumari karki', 9812365894, '2072-12-11', '-', '1/115', '0116', 'Bagaichha tol', '-', '-', '-', '-'),
(165, 'ram bahadur tamang', 9815623589, '2072-08-16', '-', '1/116', '0117', 'Bagaichha tol', '-', '-', '-', '-'),
(166, 'sarita gurung', 9815698675, '2072-06-19', '-', '1/117', '0118', 'Bagaichha tol', '-', '-', '-', '-'),
(167, 'bal bahadur ranamagar', 9842698545, '2072-07-20', '-', '1/118', '0119', 'Bagaichha tol', '-', '-', '-', '-'),
(168, 'loknath subedi', 9852053793, '2071-09-17', '-', '2/307', '0306', 'sital chowk', '-', '-', '-', '-'),
(169, 'santa kumar limbu', 9825391346, '2074-10-10', '-', '1/180', 'H011064', 'kalpat', 'purna bahadur limbu', '-', '', '-'),
(170, 'hemraj rana', 9801256987, '2074-11-27', '-', '1/10', 'H011066', 'sutar chowk', 'sher bahadur rana', '-', '-', '-'),
(171, 'ratna bahadur basnet', 9842208569, '2075-01-16', '-', '2/8', 'H011803', 'sital chowk', 'khadga bahadur basnet', '-', '-', '-'),
(172, 'patnimaya tamang', 9810323108, '2074-11-27', '-', '1/59', 'H011068', 'sutar chowk', 'dil bahadur tamang', '-', '-', '-'),
(173, 'ratna maya biswokarma', 9812564876, '2075-02-10', '-', '2/8', 'H005077', 'sital chowk', '-', '-', 'karna bahadur biswokarma', '-'),
(174, 'mina biswokarma', 9800933932, '2075-01-05', '-', '5/7', 'H011807', 'Singhabahini marga', 'chakra bahadur biswokarma', '-', '-', '-'),
(175, 'santosh rai', 9816334668, '2074-07-17', '-', '5/8', 'H010170', 'sital chowk', 'nara bahadur rai', '-', '-', '-'),
(176, 'thaam maya rai', 9805364151, '2074-08-03', '-', '5/14', 'H002520', 'sayapatri chowk', 'dalan singh tai', '-', '-', '-'),
(177, 'samir gautam', 9852026233, '2074-01-24', '-', '5/136', 'H012694', 'dovan line', 'siyaram gautam', '-', 'laxmi gautam', '-'),
(179, 'fulmaya poudel', 9803968903, '2074-06-10', '-', '5/117', 'H001246', 'chauki dada', 'til bahadur poudel', '-', 'keshab raj gautam', '-'),
(180, 'nir bahadur biswokarma', 9811071812, '2073-05-10', '-', '5/235', 'H011711', 'sutar chowk', 'ratna bahadur b.k', '-', 'budda bahadur b.k', '-'),
(181, 'durga basnet', 9800998141, '2072-12-17', '-', '0.008403361', 'H0706936', 'Bagaichha tol', '-', '-', '-', '-'),
(182, 'sanjaya bastola', 9804159638, '2072-02-16', '-', '1/120', '0121', 'Bagaichha tol', '-', '-', '-', '-'),
(183, 'krishna prashad dahal', 9817586963, '2072-11-18', '-', '1/121', '0122', 'Bagaichha tol', '-', '-', '-', '-'),
(184, 'khir bahadur adhikari', 980126598, '2072-01-02', '-', '1/122', '0123', 'Bagaichha tol', '-', '-', '-', '-'),
(185, 'chandra bahadur pulami', 9845698798, '2072-07-10', '-', '1/123', '0124', 'Bagaichha tol', '-', '-', '-', '-'),
(186, 'keshab balampaaki ', 9815263534, '2072-08-16', '-', '1/124', '0125', 'Bagaichha tol', '-', '-', '-', '-'),
(187, 'prem bahadur magar', 9812658978, '2072-08-24', '-', '1/125', '0126', 'Bagaichha tol', '', '', '', ''),
(188, 'govinda karki', 9801236598, '2072-11-12', '-', '1/126', '0127', 'Bagaichha tol', '-', '-', '-', '--'),
(189, 'januka khokrel', 9812365497, '2072-07-18', '-', '1/127', '0128', 'Bagaichha tol', '-', '-', '-', '-'),
(190, 'tirtha bahadur balampaki', 9875986485, '2072-06-06', '-', '1/128', '0129', 'Bagaichha tol', '-', '-', '-', '-'),
(191, 'karman pulami', 9802365984, '2071-03-17', '-', '1/129', '0130', 'Bagaichha tol', '-', '-', '-', '-'),
(192, 'bisnu kumar rai', 9823659874, '2072-05-17', '-', '1/130', '0131', 'Bagaichha tol', '-', '-', '-', '-'),
(193, 'hirakaji tamang', 9856981546, '2072-11-19', '-', '1/131', '0132', 'Bagaichha tol', '-', '-', '-', '-'),
(194, 'mangal bahadur limbu', 9804236598, '2072-03-16', '-', '1/132', '0133', 'Bagaichha tol', '-', '-', '-', '-'),
(195, 'yogendra thapamagar', 9802165498, '2072-08-11', '-', '1/133', '0134', 'Bagaichha tol', '-', '-', '--', '-'),
(196, 'purna bahadur timsina', 9801236548, '2072-07-18', '-', '1/134', '0135', 'Bagaichha tol', '-', '-', '-', '-'),
(197, 'yograj acharya', 98124569878, '2072-05-14', '-', '1/135', '0136', 'Bagaichha tol', '-', '-', '-', '-'),
(198, 'guru prashad dhakal', 981236598, '2072-12-26', '-', '1/136', '0137', 'Bagaichha tol', '-', '-', '-', '-'),
(199, 'bhakta bahadur gurung', 9802365987, '2072-04-22', '-', '1/138', '0139', 'Bagaichha tol', '-', '-', '-', '-'),
(200, 'krishna maya dhakal', 9824659012, '2072-07-24', '-', '1/139', '0140', 'Bagaichha tol', '-', '-', '-', '-'),
(201, 'man bahadur tamang', 9812365478, '2072-07-17', '-', '1/140', '0141', 'Bagaichha tol', '-', '--', '-', '-'),
(202, 'dambar shrestha', 9802365123, '2072-07-25', '-', '1/141', '0142', 'Bagaichha tol', '-', '-', '-', '-'),
(203, 'ratna kumari lingthep', 9804236598, '2072-12-10', '-', '1/142', '0143', 'Bagaichha tol', '-', '-', '-', '-'),
(204, 'saptamaya tamang', 9801236598, '2072-12-17', '-', '1/143', '0144', 'Bagaichha tol', '-', '-', '-', '-'),
(205, 'mithumaya limbu', 98123365756, '2072-07-26', '-', '1/144', '0145', 'Bagaichha tol', '-', '-', '-', '-'),
(206, 'matrika niroula', 9804259867, '2072-09-21', '-', '1/145', '0146', 'Bagaichha tol', '-', '-', '-', '-'),
(207, 'barna bahadur rai', 9802365987, '2072-10-13', '-', '1/146', '0147', 'Bagaichha tol', '-', '-', '-', '-'),
(208, 'ambika magar', 9812365989, '2072-08-26', '-', '1/147', '0148', 'Bagaichha tol', '-', '-', '-', '-'),
(209, 'hemraj thapamagar', 9825146985, '2072-06-26', '-', '1/148', '0149', 'Bagaichha tol', '-', '-', '-', '-'),
(210, 'laxmi pathak', 9825698679, '2072-07-18', '-', '1/149', '0150', 'Bagaichha tol', '-', '-', '-', '-'),
(211, 'mohan rai', 98456986895, '2072-11-26', '-', '1/150', '0151', 'Bagaichha tol', '-', '-', '-', '-'),
(212, 'tek maya magar', 9845698236, '2070-10-22', '-', '1/151', '0152', 'Bagaichha tol', '-', '-', '-', '-'),
(213, 'padam thapamagar', 9803265989, '2070-08-26', '-', '1/152', '0153', 'Bagaichha tol', '-', '-', '-', '-'),
(214, 'maina basnet', 9804253698, '2071-09-17', '-', '1/153', '0154', 'Bagaichha tol', '-', '-', '-', '-'),
(215, 'rita pariyar', 9814598765, '2072-08-04', '-', '1/154', '0155', 'Bagaichha tol', '-', '-', '-', '-'),
(216, 'chandra kumar khadka ', 9802659878, '2072-03-10', '-', '1/155', '0156', 'Bagaichha tol', '-', '-', '-', '-'),
(217, 'indira ghimire', 9812897637, '2072-06-19', '-', '1/156', '0157', 'Bagaichha tol', '-', '-', '-', '-'),
(218, 'dhan bahadur dewan', 9823326598, '2072-09-22', '-', '1/157', '0158', 'Bagaichha tol', '--', '-', '-', '-'),
(219, 'birkha bahadur pithakote magar', 98124569875, '2072-04-19', '-', '1/158', '0159', 'Bagaichha tol', '-', '-', '-', '-'),
(220, 'nara bahadur gurung', 9842169856, '2072-10-27', '-', '1/159', '0160', 'Bagaichha tol', '-', '-', '-', '-'),
(221, 'raju timsina', 9862498788, '2073-02-11', '-', '1/160', '0161', 'Bagaichha tol', '-', '-', '-', '-'),
(222, 'aaitamaya chemjong', 9821546978, '2072-07-18', '-', '1/161', '0162', 'Bagaichha tol', '-', '-', '-', '-'),
(223, 'pratiman limbu', 9821036989, '2072-10-27', '-', '1/162', '0163', 'Bagaichha tol', '-', '-', '-', '-'),
(224, 'bhola shrestha ', 9874586932, '2072-01-31', '-', '1/163', '0164', 'Bagaichha tol', '-', '-', '-', '-'),
(225, 'jhumkadevi limbu', 984215698, '2072-04-06', '-', '1/164', '0165', 'Bagaichha tol', '-', '-', '-', '-'),
(226, 'man bahadur tamang', 9804357665, '2072-05-15', '-', '1/165', '0166', 'Bagaichha tol', '-', '-', '-', '-'),
(227, 'yagya prashad gautam', 9804357669, '2072-07-24', '-', '1/166', '0167', 'Bagaichha tol', '-', '-', '-', '-'),
(228, 'bhakta bahadur rai', 9842187922, '2072-06-19', '-', '1/167', '0168', 'Bagaichha tol', '-', '-', '-', '-'),
(229, 'sila rai', 9821659878, '2072-10-11', '-', '1/168', '0169', 'Bagaichha tol', '-', '-', '-', '-'),
(230, 'dipak subedi', 9865986598, '2073-09-13', '-', '1/169', '0170', 'Bagaichha tol', '-', '-', '-', '-'),
(231, 'somnath siwakoti', 9845968574, '2071-07-26', '-', '1/170', '0171', 'Bagaichha tol', '-', '-', '-', '-'),
(232, 'jurodhan rai', 9862187928, '2072-10-14', '-', '1/171', '0172', 'Bagaichha tol', '-', '-', '-', '-'),
(233, 'prem bahadur magar', 9862187929, '2071-05-26', '-', '1/172', '0173', 'Bagaichha tol', '-', '-', '-', '-'),
(234, 'chandra gautam', 9856214879, '2072-03-21', '-', '1/173', '0174', 'Bagaichha tol', '-', '-', '-', '-'),
(235, 'chandra thapamagar', 985214897, '2072-03-16', '-', '1/174', '0175', 'Bagaichha tol', '-', '-', '-', '-'),
(236, 'umesh katuwal', 9825369685, '2072-11-19', '-', '1/175', '0176', 'Bagaichha tol', '-', '-', '-', '-'),
(237, 'madhav prashad ganagain', 9856987898, '2072-08-04', '-', '1/176', '0177', 'Bagaichha tol', '-', '-', '-', '-'),
(238, 'gangamaya karki', 9832165984, '2072-01-27', '-', '1/177', '0178', 'Bagaichha tol', '-', '-', '-', '-'),
(239, 'tara karki', 9856932817, '2072-05-15', '-', '1/178', '0179', 'Bagaichha tol', '-', '-', '-', '-'),
(240, 'manika rai ', 9858698596, '2072-06-19', '-', '1/179', '0180', 'Bagaichha tol', '-', '-', '-', '-'),
(241, 'pabitra bhujel', 9832659897, '2072-03-23', '-', '1/180', '0181', 'Bagaichha tol', '-', '-', '-', '-'),
(242, 'nawaraj baruwal', 9856986598, '2072-07-20', '-', '1/181', '0182', 'Bagaichha tol', '-', '-', '-', '-'),
(243, 'chandra rijal', 9812659878, '2072-04-05', '-', '1/182', '0183', 'Bagaichha tol', '-', '-', '-', '-'),
(244, 'keshav prashad khatiwoda', 9842285922, '2072-08-16', '-', '0.005464480', 'H959118', 'Bagaichha tol', '-', '-', '-', '-'),
(245, 'dhanmaya shrestha', 9825369685, '2072-03-16', '-', '1/184', '0185', 'Bagaichha tol', '-', '-', '-', '-'),
(246, 'kedar bhandari', 9856986325, '2072-07-03', '-', '1/185', '0186', 'Bagaichha tol', '-', '-', '-', '-'),
(247, 'shyam balampaki', 9804039419, '2072-11-18', '-', '0.005376344', 'H947089', 'Bagaichha tol', '-', '-', '-', '-'),
(248, 'purna bahadur aale magar', 9842156989, '2072-03-22', '-', '1/187', '0188', 'Bagaichha tol', '-', '-', '-', '-'),
(249, 'khagendra gautam', 9836154879, '2072-02-13', '-', '1/188', '0189', 'Bagaichha tol', '-', '-', '-', '-'),
(250, 'keshab ghimire', 9875968574, '2072-05-15', '-', '1/189', '0190', 'Bagaichha tol', '-', '-', '-', '-'),
(251, 'kamal limbu', 9856982365, '2072-05-08', '-', '1/190', '0191', 'Bagaichha tol', '-', '-', '-', '-'),
(252, 'narendra thulung rai', 9825487964, '2072-04-05', '-', '1/191', '0192', 'Bagaichha tol', '-', '-', '-', '-'),
(253, 'sundar samaj', 9858963256, '2072-04-05', '-', '1/192', '0193', 'Bagaichha tol', '-', '-', '-', '-'),
(254, 'arjun kepchhaki ', 9804357666, '2072-06-12', '-', '1/193', '0194', 'Bagaichha tol', '-', '-', '-', '-'),
(255, 'dambar bahadur thapa', 9804355768, '2072-06-12', '-', '1/194', '0195', 'Bagaichha tol', '-', '-', '-', '-'),
(256, 'tanka lungeli', 9856982645, '2072-03-01', '-', '1/195', '0196', 'Bagaichha tol', '-', '-', '-', '-'),
(257, 'bisnukala niroula', 9804074994, '2071-03-09', '-', '0.055555555', 'H970181', 'Bagaichha tol', '-', '-', '-', '-'),
(258, 'buddha maya limbu', 9819095459, '2071-03-05', '-', '0.006493506', 'H970258', 'Bagaichha tol', '-', '-', '-', '-'),
(259, 'januka ghale', 9841525502, '2071-03-05', '-', '0.005050505', 'H970257', 'Bagaichha tol', '-', '-', '-', '-'),
(260, 'bhim maya siwakoti', 9842169623, '2071-03-07', '-', '0.050000000', 'H970250', 'Bagaichha tol', '-', '-', '-', '-'),
(261, 'man bahadur rai', 9825698645, '2071-02-28', '-', '0.012820512', 'H970128', 'Bagaichha tol', '-', '-', '-', '-'),
(262, 'birendra kumar tamang', 9811293824, '2071-03-07', '-', '0.050000000', 'H970121', 'Bagaichha tol', '-', '-', '-', '-'),
(263, 'ganga shrestha', 9817383405, '2071-03-12', '-', '0.014084507', 'H970130', 'Bagaichha tol', '-', '-', '-', '-'),
(264, 'chankha bahadur rai', 986525197, '2073-07-23', '-', '0.004926108', '0204', 'Bagaichha tol', '-', '-', '-', '-'),
(265, 'devi prashad dhamala', 9842349465, '0000-00-00', '-', '0.017543859', 'H970187', 'pranami tol', '-', '-', '-', '-'),
(266, 'nirmala aale', 9856987848, '2073-08-22', '-', '1/205', '0206', 'Bagaichha tol', '-', '-', '-', '-'),
(267, 'chandra bahadur pulami', 9825448795, '2073-07-16', '-', '1/206', '0207', 'Bagaichha tol', '-', '-', '-', '-'),
(268, 'ramesh kumar limbu', 9843722460, '2071-03-30', '-', '0.014492753', 'H976099', 'Bagaichha tol', '-', '-', '-', '-'),
(269, 'Hiramani Magar', 9846892575, '2073-05-28', '-', '1/208', '0209', 'Bagaichha tol', '-', '-', '-', '-'),
(270, 'shantikala adhikari', 9804327665, '2073-12-16', '-', '1/209', '0210', 'Bagaichha tol', '-', '-', '-', '-'),
(271, 'dhanmaya limbu', 9804123655, '2073-07-24', '-', '1/210', '0211', 'Bagaichha tol', '-', '-', '-', '-'),
(272, 'goma basnet', 9843277627, '2073-07-17', '-', '0.004739336', 'H014502', 'Bagaichha tol', '-', '-', '-', '-'),
(273, 'shova bhandari', 9823659878, '2073-07-16', '-', '1/212', '0213', 'Bagaichha tol', '-', '-', '-', '-'),
(274, 'manashova rai', 9895216247, '2073-04-04', '-', '1/213', '0214', 'Bagaichha tol', '-', '-', '-', '-'),
(275, 'naramaya tamang', 9815469878, '2073-08-22', '-', '1/213', '0215', 'Bagaichha tol', '-', '-', '-', '-'),
(276, 'bhim bahadur poudel', 9852698758, '2073-11-19', '-', '1/215', '0216', 'Bagaichha tol', '-', '-', '-', '-'),
(277, 'kebal bahadur limbu', 9852639897, '2073-11-19', '-', '1/216', '0217', 'Bagaichha tol', '-', '-', '-', '-'),
(278, 'mina limbu', 9862154987, '2073-12-30', '-', '1/217', '0218', 'Bagaichha tol', '-', '-', '-', '-'),
(279, 'sangita poudyal', 9832165988, '2073-07-18', '-', '1/218', '0219', 'Bagaichha tol', '-', '-', '-', '-'),
(280, 'upendra poudel', 9562487954, '2073-05-08', '-', '1/219', '0220', 'Bagaichha tol', '-', '-', '-', '-'),
(281, 'shantimaya limbu', 9825378194, '2073-05-14', '-', '1/220', '0221', 'Bagaichha tol', '-', '-', '-', '-'),
(282, 'tol kumari luhol', 9804357669, '2073-05-29', '-', '1/221', '0222', 'Bagaichha tol', '--', '-', '-', '--'),
(283, 'ramkaji kami', 9823598691, '2072-07-17', '-', '1/222', '0223', 'Bagaichha tol', '-', '-', '-', '-'),
(284, 'dil bahadur shrestha ', 98245612363, '2072-03-25', '-', '1/223', '0224', 'Bagaichha tol', '-', '-', '-', '-'),
(285, 'dil kumar limbu', 9845698745, '2072-07-10', '-', '1/224', '0225', 'Bagaichha tol', '-', '-', '-', '-'),
(286, 'laal bahadur magar', 9804256988, '2072-03-16', '-', '1/225', '0226', 'Bagaichha tol', '-', '-', '-', '-'),
(287, 'ganga maya magar', 9823592810, '2072-08-16', '-', '0.004424778', 'H2063', 'Bagaichha tol', '-', '-', '-', '-'),
(288, 'naramaya magar', 9852162789, '2072-07-17', '-', '0.004405286', '0229', 'Bagaichha tol', '-', '-', '-', '-'),
(289, 'barsa shrestha', 9823654812, '2072-10-26', '-', '1/228', '0230', 'Bagaichha tol', '-', '-', '-', '-'),
(290, 'chetnath ghimire', 9804357889, '2072-08-16', '-', '1/230', '0231', 'Bagaichha tol', '-', '-', '-', '-'),
(291, 'tankamaya aale', 9812369578, '2072-09-22', '-', '1/231', '0232', 'Bagaichha tol', '-', '-', '-', '-'),
(292, 'laxmi kumari magar', 9862178978, '2072-08-22', '-', '1/231', '0233', 'Bagaichha tol', '-', '-', '-', '-'),
(293, 'lokmaya limbu', 98526987852, '2072-01-23', '-', '1/233', '0234', 'Bagaichha tol', '-', '-', '-', '-'),
(294, 'santamaya tamang', 9823165489, '2072-06-06', '-', '1/234', '0235', 'Bagaichha tol', '-', '-', '-', '-'),
(295, 'sita mabuhaang rai', 9875981859, '2072-07-24', '-', '1/235', '0236', 'Bagaichha tol', '-', '-', '-', '-'),
(296, 'dhanapati siwakoti', 9869587596, '2072-11-20', '-', '0.004237288', '0237', 'Bagaichha tol', '-', '-', '-', '-'),
(298, 'dewan singh tamang', 9804589654, '2072-07-18', '-', '1/237', '0238', 'Bagaichha tol', '-', '-', '-', '-'),
(299, 'nilakantha shrestha', 9856986589, '2072-06-12', '-', '1/238', '0239', 'Bagaichha tol', '-', '-', '-', '-'),
(300, 'ram kumar limbu', 9801236555, '2072-03-23', '-', '1/239', '0240', 'Bagaichha tol', '-', '-', '-', '-'),
(301, 'chanda rai', 98123698578, '2072-06-13', '-', '1/240', '0241', 'Bagaichha tol', '-', '-', '-', '-'),
(302, 'damayanti karki(siwakoti)', 9804256325, '2072-05-16', '-', '1/241', '0242', 'Bagaichha tol', '-', '-', '-', '-'),
(303, 'rajendra thapamagar', 9842520020, '2072-05-22', '-', '0.004132231', 'H002065', 'Bagaichha tol', '-', '-', '-', '-'),
(304, 'sita kumari basnet', 9832167898, '2072-07-17', '-', '1/243', '0244', 'Bagaichha tol', '-', '-', '-', '-'),
(305, 'fulmaya limbu', 9856987596, '2072-09-22', '-', '1/244', '0245', 'Bagaichha tol', '-', '-', '-', '-'),
(306, 'kamal karki', 9865489758, '2072-07-18', '-', '1/245', '0246', 'Bagaichha tol', '-', '-', '-', '-'),
(307, 'kamala limbu', 9825698696, '2072-05-08', '-', '1/246', '0247', 'Bagaichha tol', '-', '-', '-', '-'),
(308, 'elohin church', 9862598762, '2072-09-29', '-', '1/247', '0248', 'Bagaichha tol', '-', '-', '-', '-'),
(309, 'bhim bhujel', 9807383710, '2072-07-18', '-', '0.004032258', 'H006512', 'Bagaichha tol', '-', '-', '-', '-'),
(310, 'ratna maya tamang', 9842187996, '2072-09-22', '-', '1/249', '0250', 'Bagaichha tol', '-', '-', '-', '-'),
(312, 'sangita rai', 9856951236, '2072-09-22', '-', '1/250', '0251', 'Bagaichha tol', '-', '-', '-', '-'),
(313, 'ishorman limbu', 9821456958, '2072-06-06', '-', '1/251', '0252', 'Bagaichha tol', '-', '-', '-', '-'),
(314, 'yammaya limbu', 986248978, '2072-03-17', '-', '1/252', '0253', 'Bagaichha tol', '-', '-', '-', '-'),
(315, 'dil kumar lamichhane', 9823659878, '2072-09-23', '-', '1/253', '0254', 'Bagaichha tol', '-', '-', '-', '-'),
(316, 'prem kumar tamang', 9863215488, '2072-03-17', '-', '1/254', '0255', 'Bagaichha tol', '-', '-', '-', '-'),
(317, 'salina rai', 9804123659, '2072-08-16', '-', '1/255', '0256', 'Bagaichha tol', '-', '-', '-', '-'),
(318, 'binda khadka', 9853269875, '2072-09-29', '-', '1/256', '0257', 'Bagaichha tol', '-', '-', '-', '-'),
(319, 'kul bahadur tamang', 9842187925, '2072-04-20', '-', '1/257', '0258', 'Bagaichha tol', '-', '-', '-', '-'),
(320, 'laxmi tamang', 9802369854, '2072-02-07', '-', '1/258', '0259', 'Bagaichha tol', '-', '-', '-', '-'),
(321, 'tukke charmakar', 9852169784, '2072-07-18', '-', '1/259', '0260', 'Bagaichha tol', '-', '-', '-', '-'),
(322, 'ram bahadur tamang', 9865986523, '2072-07-17', '-', '1/260', '0261', 'Bagaichha tol', '-', '-', '-', '-'),
(323, 'pritha limbu', 9801236989, '2072-08-16', '-', '1/261', '0262', 'Bagaichha tol', '-', '-', '-', '-'),
(324, 'rukmani aale', 9842200744, '2072-09-14', '-', '0.003816793', 'H1416', 'Bagaichha tol', '-', '-', '-', '-'),
(325, 'jayanti magar', 9856985236, '2072-07-26', '-', '1/263', '0264', 'b', '', '', '', ''),
(326, 'durga limbu', 9856231481, '2073-06-05', '-', '1/265', '0266', 'Bagaichha tol', '-', '-', '-', '-'),
(327, 'sasikala tamang', 9842598769, '2072-07-19', '-', '1/266', '0267', 'Bagaichha tol', '-', '-', '-', '-'),
(328, 'laxmi  sherpa', 9820747879, '2072-06-20', '-', '1/267', '0268', 'Bagaichha tol', '-', '-', '-', '-'),
(329, 'kyattin bantawa rai', 9858963219, '2073-10-19', '-', '1/268', '0269', 'Bagaichha tol', '-', '-', '-', '-'),
(330, 'bhawana aadambe', 9874856963, '2073-08-22', '-', '1/269', '0270', 'Bagaichha tol', '-', '-', '-', '-'),
(331, 'urmila tamang', 9826598745, '2073-04-11', '-', '1/271', '0272', 'Bagaichha tol', '-', '-', '-', '-'),
(333, 'kalpana rai', 9825693214, '2073-10-19', '-', '1/272', '0273', 'Bagaichha tol', '-', '-', '-', '-'),
(334, 'hira khatri', 9821456932, '2073-07-17', '-', '0.003663003', '18503', 'Bagaichha tol', '-', '-', '-', '-'),
(335, 'vencher west to energy', 9852055651, '2075-08-06', '-', '1/273', 'h003626', 'Bagaichha tol', '-', '-', '-', '-'),
(336, 'vencher west to energy', 9852055651, '2075-08-06', '-', '1/275', 'h003627', 'Bagaichha tol', '-', '-', '-', '-'),
(337, 'samjhana b.k', 9803578853, '2077-03-05', '-', '7/123', '980713119', 'sital chowk', '-', '-', '-', '-'),
(338, 'laal bahadur sarki', 9803046390, '2076-12-06', '-', '2/266', '190013219', 'sital chowk', '-', '-', '-', '-'),
(339, 'karna bahadur moktan', 9819031834, '2076-02-16', '-', '1/296', '90602061', 'Bagaichha tol', '-', '-', '-', '-'),
(340, 'birmaya tamang', 9811071417, '2075-03-21', '-', '0.003311258', 'H004759', 'Bagaichha tol', '-', '-', '-', '-'),
(342, 'ambika sigdel', 9842064271, '2076-10-22', '-', '6/96', 'H004757', 'ukkhubari tol', '-', '-', '-', '-'),
(344, 'nabin chandra rai', 9808668097, '2076-10-13', '-', '1/178', 'H007272', 'Bagaichha tol', '-', '-', '-', '-'),
(345, 'indraprasta jestha nagarik sam', 9842082588, '2076-10-08', '-', '7/122', '190705327', 'chokti', '-', '-', '-', '-'),
(346, 'Dal bahadur khakka', 9823056117, '2076-10-06', '-', '3/59', 'H007274', 'school dada', '-', '-', '-', '-'),
(348, 'damber kumari thapa', 9807350814, '2070-03-20', '-', '3/113', 'H070610', 'saraswoti chowk', '-', '-', '-', '-'),
(349, 'teacher bahadur rai', 9849950601, '2072-02-07', '-', '2/309', '0310', 'saraswoti chowk', '-', '-', '-', '-'),
(350, 'til maya rai', 9815032998, '2072-03-09', '-', '3/213', '184210', 'saraswoti chowk', '-', '-', '-', '-'),
(351, 'bhawani shankar rai', 9807360675, '2075-09-18', '-', '3/163', 'H938541', 'saraswoti chowk', '-', '-', '-', '-'),
(352, 'ttirtha bhattarai', 9842350985, '2070-04-24', '-', '2/8', 'H0904718', 'kalpat', '-', '-', '-', '-'),
(353, 'arjun rai', 9826354879, '2073-07-16', '-', '1/299', '0300', 'Bagaichha tol', '-', '-', '-', '-'),
(354, 'uttar kumar rai', 9865987548, '2073-03-15', '-', '0.003355704', '1907-11996', 'Bagaichha tol', '-', '-', '-', '-'),
(355, 'bam bahadur shrestha', 9845789685, '2073-08-16', '-', '1/297', '0298', 'Bagaichha tol', '-', '-', '-', '-'),
(356, 'karna bahadur moktan', 9836259876, '2073-06-11', '-', '1/296', '0297', 'Bagaichha tol', '-', '-', '-', '-'),
(357, 'sita kumari basnet', 9801265485, '2073-06-19', '-', '1/295', '0296', 'Bagaichha tol', '-', '-', '-', '-'),
(358, 'raj kumar sarki', 9825689764, '2073-10-25', '-', '1/294', '0295', 'Bagaichha tol', '-', '-', '-', '-'),
(359, 'buddha maya limbu', 9845789632, '2073-06-12', '-', '1/293', '0294', 'Bagaichha tol', '-', '-', '-', '-'),
(360, 'asmita katuwal', 9807382378, '2071-03-04', '-', '3/49', 'H970256', 'saraswoti chowk', '-', '-', '-', '-'),
(361, 'saraswoti lawoti', 9803467804, '2071-03-07', '-', '0.007751937', 'H970259', 'kalpat', '-', '-', '--', '-'),
(362, 'ratna bahadur rai', 9804035009, '2071-03-04', '-', '3/30', 'H970260', 'saraswoti chowk', '-', '-', '-', '-'),
(363, 'nagendra lamichhane', 9807005442, '2071-03-09', '-', '3/154', 'H981295', 'saraswoti chowk', '-', '-', '-', '-'),
(364, 'bhakta bahadur subedi', 9815330457, '2071-03-10', '-', '7/127', 'H970251', 'chokti', '-', '-', '-', '-'),
(365, 'sampurna rai', 9842425218, '2071-03-06', '-', '2/230', 'H970254', 'kalpat', '-', '-', '-', '-'),
(366, 'devimaya rai', 9804399544, '2071-03-06', '-', '2/128', 'H970255', 'kalpat', '-', '-', '-', '-'),
(367, 'tara limbu', 9817934232, '2071-02-27', '-', '2/126', 'H970129', 'kalpat', '-', '-', '-', '-'),
(368, 'tanka bahadur shrestha', 9842275953, '2071-03-10', '-', '7/127', 'H970127', 'chokti', '-', '-', '-', '-'),
(369, 'khadga bahadur bhujel', 9800336654, '2071-03-05', '-', '2/103', 'H970126', 'kalpat', '-', '-', '-', '-'),
(370, 'surendra kuwar', 9806099856, '2071-03-20', '-', '5/47', 'H970122', 'sutar chowk', '-', '-', '-', ''),
(371, 'kul bahadur basnet', 9804054698, '2071-03-20', '-', '5/50', 'H970123', 'sutar chowk', '-', '-', '-', '-'),
(372, 'chandramaya biswokarma', 9807005454, '2071-03-10', '-', '7/124', 'H970124', 'limbu chauri', '', '', '', ''),
(373, 'kausila limbu', 9829380412, '2072-03-17', '-', '1/279', '0280', 'Bagaichha tol', '-', '-', '-', '-'),
(375, 'ram poudel', 9856231478, '2071-03-19', '-', '3/56', 'H004762', 'school dada', '-', '-', '-', '-'),
(376, 'bhim prashad subedi', 9828755896, '2077-03-18', '-', '1/106', '190714814', 'aadarsha marga', 'bhaira prashad subedi', '-', 'hari prashad subedi', ''),
(377, 'chameli rai', 9812659868, '2071-03-18', '-', '7/3', '702', 'chokti', '-', '-', '-', '-'),
(378, 'sita basnet', 9813145129, '2071-05-24', '-', '1/123', 'H96968', 'Bagaichha tol', '-', '-', '-', '-'),
(379, 'sangita acharya', 9811339245, '2071-03-10', '-', '6/63', 'H981298', 'chattiun chowk', '-', '-', '-', '-'),
(380, 'kalpana tamang', 9807323208, '2071-03-09', '-', '2/211', 'H970252', 'bishal chowk', '-', '-', '-', '-'),
(381, 'gopal thapa', 9856236985, '2071-03-05', '-', '5/97', 'H980186', 'chhatiun chowk', '-', '-', '-', '-'),
(382, 'tikaram karki', 9807068259, '2071-03-17', '-', '5/55', 'H981296', 'sutar chowk', '-', '-', '-', '-'),
(383, 'arun rai', 9849434251, '2071-03-09', '-', '4/3', 'H981300', 'ghopali tol', '-', '-', '-', '-'),
(384, 'prakash b.k', 9800943135, '2071-03-09', '-', '2/99', 'H989254', 'century tol', '-', '-', '-', '--'),
(385, 'kalpana b.k', 985612365, '2071-03-09', '-', '6/148', 'H981293', 'raya chauri', '-', '-', '-', '-'),
(386, 'laxmi b.k', 9807327865, '2071-03-09', '-', '6/105', 'H981292', 'raya chauri', '-', '-', '-', '-'),
(387, 'govinda bahadur joshi', 9819348860, '2071-03-12', '-', '4/166', 'H981291', 'ghopali tol', '-', '-', '-', '-'),
(388, 'kamala b.k', 9807042296, '2071-03-18', '-', '6/123', 'H976100', 'chhatiun chowk', '-', '-', '-', '-'),
(389, 'laal bahadur bista', 9812345767, '2071-03-31', '-', '6/150', 'H970189', 'chhatiun chowk', '-', '-', '-', '-'),
(390, 'samudra rai', 9812356987, '2071-03-20', '-', '7/133', 'H976095', 'chokti', '-', '-', '-', '-'),
(391, 'bhoj bahadur rai', 9856236985, '2071-03-20', '-', '7/133', 'H976094', 'chokti', '-', '-', '-', '-'),
(392, 'biswonath acharya', 9842259741, '2071-03-10', '-', '2/83', 'H981299', 'pranami tol', '-', '-', '-', '-'),
(393, 'kul bahadur khadka', 9842992119, '2071-03-13', '-', '4/214', 'H981297', 'ghopali tol', '-', '-', '-', '-'),
(394, 'lila khadka', 9819036223, '2071-03-13', '-', '7/79', 'H970182', 'chokti', '-', '-', '-', '-'),
(395, 'harka b.k', 9800934775, '2071-03-12', '-', '2/7', 'H08253', 'sital chowk', '-', '-', '-', '-'),
(396, 'kul prashad dahal', 25552003, '2071-03-23', '-', '2/40', '2039', 'voudi', '-', '-', '-', '-'),
(397, 'rakhu rai', 9804160608, '2071-03-19', '-', '3/187', '3189', 'saraswoti chowk', '-', '-', '-', '-'),
(398, 'toya ghimire', 9810464949, '2071-03-18', '-', '3/53', 'H0706111', 'school dada', '-', '-', '-', '-'),
(399, 'bhakta bahadur katuwal', 9818056002, '2071-03-19', '-', '3/31', 'H009342', 'saraswoti chowk', '-', '-', '-', '-'),
(400, 'chandradhan tamang', 9875698569, '2071-03-10', '-', '2/2', '01412', 'sital chowk', '-', '-', '--', '-'),
(401, 'chandra bahadur tamang', 9820563214, '2071-03-18', '-', '1/288', 'H01039', 'Bagaichha tol', '-', '-', '-', '-'),
(402, 'man bahadur khadka', 9804364125, '2071-03-18', '-', '3/27', 'H13460', 'saraswoti chowk', '-', '-', '-', '-'),
(403, 'shova tamang', 9856236548, '2072-03-16', '-', '2/1', '0704386', 'pranami tol', '-', '-', '-', ''),
(404, 'milan rai', 9852369585, '2071-03-20', '-', '3/40', '29000934', 'saraswoti chowk', '-', '-', '--', '-'),
(405, 'gunjaman pulami', 9804568978, '2071-03-12', '-', '1.000000000', '2001', 'sital chowk', '-', '-', '-', '-'),
(407, 'shova maya tamang', 9856321546, '2071-03-11', '-', '2/1', '2002', 'pranami tol', '-', '-', '-', '-'),
(408, 'chandradhan tamang', 9823621525, '2071-03-19', '-', '2/2', '2003', 'sital chowk', '-', '-', '-', '-'),
(409, 'dhan bhadur balampaki magar', 9856231478, '2071-03-26', '-', '2/3', '2004', 'sital chowk', '-', '-', '-', '-'),
(410, 'mina rai', 9825361545, '2071-03-12', '-', '2/4', '2005', 'sital chowk', '-', '-', '-', '-'),
(411, 'dhan kumari limbu', 98156236589, '2071-03-19', '-', '2/5', '2006', 'sital chowk', '-', '-', '-', '-'),
(412, 'bharat rai', 9856326986, '2071-03-18', '-', '2/6', '2007', 'sital chowk', '-', '-', '-', '-'),
(413, 'harka bahadur b.k', 9812365848, '2071-03-17', '-', '2/7', '2008', 'sital chowk', '-', '-', '-', '-'),
(414, 'tirtha bhattarai', 9845263636, '2071-03-18', '-', '2/8', '2009', 'sital chowk', '-', '-', '-', '-'),
(415, 'kumar dhamala', 9812569865, '2071-03-10', '-', '2/9', '2010', 'sital chowk', '-', '-', '-', '-'),
(416, 'khadka bahadur b.k', 9856152536, '2071-03-13', '-', '2/10', '2011', 'sital chowk', '-', '-', '-', '-'),
(417, 'sitaram magrati', 9845362941, '2071-03-19', '-', '2/11', '2012', 'sital chowk', '-', '-', '-', ''),
(418, 'padam rai', 98253695787, '2071-03-18', '-', '2/12', '2013', 'sital chowk', '-', '-', '-', '-'),
(419, 'usha balampaki magar', 9845697635, '2071-03-10', '-', '2/13', '2014', 'sital chowk', '-', '-', '-', '-'),
(420, 'bam bahadur rai', 9804256897, '2071-03-12', '-', '2/14', '2015', 'sital chowk', '-', '-', '-', '-'),
(421, 'devi basnet', 9845693245, '2071-03-09', '-', '2/15', '2016', 'sital chowk', '-', '-', '-', '-'),
(422, 'bhim limbu', 9825369578, '2071-03-18', '-', '2/16', '2017', 'sital chowk', '-', '-', '-', '-'),
(423, 'khintumaya tamang', 9815256565, '2071-03-24', '-', '2/17', '2018', 'sital chowk', '-', '-', '-', '-'),
(424, 'nagendra kimbu', 9814562315, '2071-03-26', '-', '2/18', '2019', 'sital chowk', '-', '-', '-', '-'),
(425, 'diwash acharya', 9812369587, '2071-03-19', '-', '2/19', '2020', 'pranami tol', '-', '-', '-', '-'),
(426, 'bisnu acharya', 9845121212, '2071-03-20', '-', '2/20', '2021', 'sital chowk', '-', '-', '-', '-'),
(427, 'saligram bajgain', 9812569856, '2071-03-26', '-', '2/21', '2022', 'sital chowk', '-', '-', '-', '-'),
(428, 'mina khatri', 9845236985, '2071-03-08', '-', '2/22', '2023', 'sital chowk', '-', '-', '-', '-'),
(429, 'geeta bhattarai', 9852361498, '2071-03-12', '-', '2/23', '2024', 'sital chowk', '-', '-', '-', '-'),
(430, 'puspa niroula', 9856231745, '2071-03-21', '-', '2/24', '2025', 'sital chowk', '-', '-', '-', '-'),
(431, 'chetanmani ghimire', 9856231494, '2071-04-13', '-', '2/30', '0705208', 'voudi', '-', '-', '-', '-'),
(432, 'shova bista', 9804349821, '2071-04-14', '-', '3/33', '13A06', 'saraswoti chowk', '-', '-', '-', '-'),
(433, 'durga rana', 9819341188, '2071-04-15', '-', '1/137', '0138', 'Bagaichha tol', '-', '-', '-', '-'),
(434, 'bisnu gautam', 9804001620, '2071-03-18', '-', '1/198', '0197', 'Bagaichha tol', '-', '-', '-', '-'),
(435, 'bhes kumar bhujel', 9827074904, '2072-04-20', '-', '2/102', '2101', 'sital chowk', '-', '-', '-', '-'),
(436, 'suman b.k', 9845236598, '2072-03-08', '-', '2/104', '200010', 'sital chowk', '-', '-', '-', '-'),
(437, 'dhanmaya tamang', 9812365987, '2072-04-14', '-', '2/129', '2130', 'sital chowk', '-', '-', '-', '-'),
(438, 'bisnu limbu', 9825987645, '2072-03-22', '-', '2/130', '2131', 'sital chowk', '-', '-', '-', '-'),
(439, 'lekhnath rai', 9812365987, '2072-04-12', '-', '2/135', '2136', 'sital chowk', '-', '-', '-', '-'),
(440, 'bina rai', 9812365987, '2072-04-13', '-', '2/139', '2140', 'sital chowk', '-', '-', '-', '-'),
(441, 'babita tamang', 9827337418, '2072-04-01', '-', '2/142', '2143', 'sital chowk', '-', '-', '-', '-'),
(442, 'kabita rai', 9852369512, '0207-04-09', '-', '2/141', '2142', 'sital chowk', '-', '-', '-', '-'),
(443, 'bishal rai', 9845362848, '2072-03-05', '-', '2/143', '2144', 'sital chowk', '-', '-', '-', '-'),
(444, 'dalmaya rai', 9856231548, '2072-04-06', '-', '2/144', '2145', 'sital chowk', '-', '-', '-', '-'),
(445, 'tilmaya gurung', 9825367848, '2072-03-22', '-', '2/145', '2146', 'sital chowk', '-', '-', '-', '-'),
(446, 'bikram rasaili', 9856321232, '2072-04-06', '-', '2/149', '2150', 'sital chowk', '-', '-', '-', '-'),
(447, 'dil bahadur yogi', 9853629875, '2072-04-09', '-', '2/150', '2151', 'sital chowk', '-', '-', '-', '-'),
(448, 'bindu pulami', 9845362548, '2072-04-05', '-', '2/156', '2157', 'sital chowk', '-', '-', '-', '-'),
(449, 'prabina yogi', 9823659878, '2072-04-21', '-', '2/187', '2188', 'sital chowk', '-', '-', '-', '-\r\n'),
(450, 'ramesh gautam', 9865321548, '2072-04-15', '-', '2/188', '2189', 'sital chowk', '-', '-', '-', '-'),
(451, 'sher bahadur yogi', 9813268975, '2072-04-13', '-', '2/207', '2208', 'voudi', '-', '-', '-', '-'),
(452, 'anita rai', 9804152636, '2072-04-08', '-', '2/211', '2211', 'voudi', '-', '-', '-', '-'),
(453, 'lokachan magar', 9856253698, '2072-04-13', '-', '2/213', '2214', 'voudi', '-', '-', '-', '-'),
(454, 'roop kumar limbu', 9804152398, '2072-04-14', '-', '2/221', '2222', 'voudi', '-', '-', '-', '-'),
(455, 'thir bahadur magar', 9816368471, '2072-04-21', '-', '2/231', 'H938646', 'school dada', '-', '-', '-', '-'),
(456, 'prem rai', 9804326598, '2072-04-14', '-', '2/237', '2238', 'sital chowk', '-', '-', '-', ''),
(457, 'radha shrestha', 9804123659, '2072-04-20', '-', '2/251', '2252', 'sital chowk', '-', '-', '-', '-'),
(458, 'sampurna rai', 9856231465, '2072-04-19', '-', '2/259', '2260', 'bishal chowk', '-', '-', '-', '-'),
(459, 'tara limbu', 9817934232, '2072-04-20', '-', '2/261', '2262', 'sital chowk', '-', '-', '-', '-'),
(460, 'ganesh charmakar', 9810290839, '2072-04-15', '-', '2/299', '2300', 'sital chowk', '-', '-', '-', '-'),
(461, 'ram kumar rai', 9827329894, '2072-04-29', '-', '2/302', '2303', 'sital chowk', '-', '-', '-', '-'),
(462, 'yogendra tamang', 9804569815, '2072-04-13', '-', '2/322', '2323', 'sital chowk', '-', '-', '-', '-'),
(463, 'ambika basnet', 9816335057, '2072-04-15', '-', '2/325', '2326', 'sital chowk', '-', '-', '-', '-'),
(464, 'hasta shrestha', 9852064129, '2072-04-19', '-', '2/337', '2338', 'sital chowk', '-', '-', '-', '-'),
(465, 'hari rai', 9804236985, '2072-04-30', '-', '2/338', '2339', 'sital chowk', '-', '-', '-', '-'),
(466, 'binod rana`', 9807399670, '2072-04-20', '-', '2/361', '2362', 'sital chowk', '-', '-', '-', '-'),
(467, 'sunil rai', 9804253695, '2072-04-28', '-', '2/378', '2379', 'sital chowk', '-', '-', '-', '-');
INSERT INTO `client` (`id`, `name`, `phone`, `joinned`, `gharnum`, `area`, `meter`, `address`, `father`, `mother`, `grandfather`, `remark`) VALUES
(468, 'ram babu sarki', 9815362898, '2072-04-08', '-', '2/380', '2381', 'sital chowk', '-', '-', '-', '-'),
(469, 'januka shrestha', 9825369856, '2072-04-21', '-', '3/57', '3058', 'saraswoti chowk', '--', '-', '-', '-'),
(470, 'bharatmani shrestha', 9804263598, '2072-04-20', '-', '3/67', '3066', 'saraswoti chowk', '-', '-', '-', '-'),
(471, 'bisnu shrestha', 9804235994, '2072-04-20', '-', '3/66', '3067', 'saraswoti chowk', '-', '-', '-', '-'),
(472, 'gorkharam karki', 9825369875, '2072-04-07', '-', '7/102', '7101', 'chokti', '-', '-', '-', '-'),
(473, 'govinda basnet', 9856231478, '2072-04-14', '-', '5/20', '5020', 'chhatiun chowk', '-', '-', '-', '-'),
(474, 'ram kumar limbu', 9804256312, '2072-04-28', '-', '5/24', '5025', 'chhatiun chowk', '-', '-', '-', '-'),
(475, 'padam gurung', 9815263658, '2072-04-21', '-', '5/28', '5029', 'chhatiun chowk', '-', '-', '-', '-'),
(476, 'ganga dhamala', 9856231475, '2072-04-15', '-', '5/101', '5102', 'sutar chowk', '-', '-', '-', '-'),
(477, 'suresh shrestha', 9811065509, '2072-04-20', '-', '3/17', '3018', 'saraswoti chowk', '-', '-', '-', '-'),
(478, 'rita shah', 9802719137, '2072-04-14', '-', '7/229', '7230', 'chokti', '-', '-', '-', '-'),
(479, 'sanapathlal rai', 9812563698, '2072-04-22', '-', '3/37', '20002165', 'saraswoti chowk', '-', '-', '-', '-'),
(480, 'laxmi prashad limbu', 9815253645, '2072-04-23', '-', '5/218', '5219', 'sutar chowk', '-', '-', '-', '-'),
(481, 'dilip khanal', 9812569875, '2072-04-19', '-', '7/2', '7001', 'chokti', '', '', '', ''),
(482, 'chameli rai', 9825361973, '2072-04-13', '-', '7/1', '7002', 'chokti', '-', '-', '-', '-'),
(483, 'bharat tamang', 9815237895, '2072-03-16', '-', '7/2', '7003', 'chokti', '-', '-', '-', '-'),
(484, 'gopal rai', 9845236598, '2072-03-16', '-', '7/3', '7004', 'chokti', '-', '-', '-', '-'),
(485, 'lalit bhandari', 98021456987, '2072-04-20', '-', '7/5', '7005', 'chokti', '-', '-', '-', '-'),
(486, 'bal bahadur shrestha', 9825364879, '2072-03-24', '-', '7/5', '7006', 'chokti', '-', '-', '-', '-'),
(487, 'sashikala rai', 9802364975, '2072-03-16', '-', '7/6', '7007', 'chokti', '-', '-', '-', '-'),
(488, 'rati tamang', 9845697895, '2072-03-16', '-', '7/7', '7008', 'chokti', '-', '-', '-', '-'),
(489, 'tilak shrestha', 9856231876, '2072-03-16', '-', '7/8', '7009', 'chokti', '-', '-', '-', '-'),
(490, 'rikh bahadur tamang', 9825361548, '2072-03-16', '-', '7/9', '7010', 'chokti', '-', '-', '-', '-'),
(491, 'budda kafle', 98112365987, '2072-03-16', '-', '7/10', '7011', 'chokti', '-', '-', '-', '-'),
(492, 'hasta bahadur rai', 9825487513, '2072-03-23', '-', '7/11', '7012', 'chokti', '-', '-', '-', '-'),
(493, 'ratna bahadur shrestha', 9825361546, '2072-03-23', '-', '7/12', '7013', 'chokti', '-', '-', '-', '-'),
(494, 'toran shrestha', 9804236548, '2072-03-16', '-', '7/13', '7014', 'chokti', '-', '-', '-', '-'),
(495, 'hari parajuli', 9852014569, '2072-03-16', '-', '7/14', '7015', 'chokti', '-', '-', '-', '-'),
(496, 'dambar bahadur bhandari', 9852361498, '2072-03-23', '-', '7/15', '7016', 'chokti', '-', '-', '-', '-'),
(497, 'tilak bahadur rai', 9823156325, '2072-03-15', '-', '7/16', '7017', 'chokti', '-', '-', '-', '-'),
(498, 'tulashi rai', 9852361478, '2072-03-16', '-', '7/17', '7018', 'chokti', '-', '-', '-', '-'),
(499, 'yeshoda khadka', 9812365487, '2072-03-16', '-', '7/18', '7019', 'chokti', '-', '-', '-', '-'),
(500, 'laal bahadur rai', 9821546975, '2072-03-16', '-', '7/19', '7020', 'chokti', '-', '-', '-', '-'),
(501, 'dhan bahadur rai', 9845263548, '2072-03-16', '-', '7/20', '7021', 'chokti', '-', '-', '-', '-'),
(502, 'jagat bahdur rai', 9852361478, '2072-03-16', '-', '7/21', '7022', 'chokti', '-', '-', '-', '-'),
(503, 'kamal; bhandari', 9856231478, '2072-03-16', '-', '7/22', '7023', 'chokti', '-', '-', '-', '-'),
(504, 'binda  rai', 9853621478, '2072-03-16', '-', '7/23', '7024', 'chokti', '-', '-', '-', '-'),
(505, 'ambika bhandari', 9852361236, '2072-03-23', '-', '7/24', '7025', 'chokti', '-', '-', '-', '-'),
(506, 'nir bahadur rai', 9856231478, '2072-03-16', '-', '7/25', '7026', 'chokti', '-', '-', '-', '-'),
(507, 'khadga bahadur rai', 9852361478, '2072-03-23', '-', '7/26', '7027', 'chokti', '-', '-', '-', '-'),
(508, 'dinesh kumar rai', 9825361478, '2072-03-16', '-', '7/27', '7028', 'chokti', '-', '-', '-', '-'),
(509, 'bijaya rai', 9825367895, '2072-03-09', '-', '7/28', '7029', 'chokti', '-', '-', '-', '-'),
(510, 'tara rai', 9856231478, '2072-03-16', '-', '7/29', '7030', 'chokti', '-', '-', '-', '-'),
(511, 'kul bahadur khanal', 9856214578, '2072-03-16', '-', '7/31', '7032', 'chokti', '-', '-', '-', '-'),
(512, 'tankadhoj basnet', 9852361478, '2072-04-13', '-', '7/32', '7033', 'chokti', '-', '-', '-', '-'),
(513, 'ruk maya bista', 9856231478, '2072-03-16', '-', '7/33', '7031', 'chokti', '-', '-', '-', '-'),
(514, 'surendra karki', 9856003265, '2072-03-25', '-', '7/34', '7035', 'chokti', '-', '-', '-', '-'),
(515, 'bir bahadur karki', 9825467878, '2072-03-23', '-', '7/35', '7036', 'chokti', '-', '-', '-', '-'),
(517, 'ratna bahadur basnet', 9812000236, '2072-03-15', '-', '7/36', '7037', 'chokti', '-', '-', '-', '-'),
(518, 'santosh karki', 9800124586, '2072-04-19', '-', '7/37', '7038', 'chokti', '-', '-', '-', '-'),
(519, 'muna limbu', 9852311025, '2072-03-15', '-', '7/38', '7039', 'chokti', '-', '-', '-', '-'),
(520, 'birkha bahadur basnet', 9825364598, '2072-03-16', '-', '7/39', '7040', 'chokti', '-', '-', '-', '-'),
(521, 'dil bahadur limbu', 9856147895, '2072-03-16', '-', '7/40', '7041', 'chokti', '-', '-', '-', '-'),
(522, 'madan katwal', 9856237895, '2072-04-12', '-', '7/41', '7042', 'chokti', '-', '-', '-', '-'),
(523, 'lila magar', 9845236578, '2072-03-23', '-', '7/42', '7043', 'chokti', '-', '-', '-', '-'),
(525, 'rajendra raut ', 9852361457, '2072-03-16', '-', '7/43', '7044', 'chokti', '-', '-', '-', '-'),
(526, 'indra basnet', 9856231478, '2072-03-16', '-', '7/44', '7045', 'chokti', '-', '-', '-', '-'),
(527, 'anita magar', 9856287945, '2072-03-16', '-', '7/45', '7046', 'chokti', '-', '-', '-', '-'),
(528, 'shiva b.k', 9862145876, '2072-03-16', '-', '7/46', '7047', 'chokti', '-', '-', '-', '-'),
(529, 'man bahadur dahal ', 9825364879, '2072-03-31', '-', '7/47', '7048', 'chokti', '-', '-', '-', '-'),
(530, 'tej karki', 9856231478, '2072-03-24', '-', '7/48', '7049', 'chokti', '-', '-', '-', '-'),
(531, 'ratna bahadur khadka', 9804256986, '2072-03-16', '-', '7/49', '7050', 'chokti', '-', '-', '-', '-'),
(532, 'govinda chhetri', 9804597689, '2072-03-23', '-', '7/50', '7051', 'chokti', '-', '-', '-', '-'),
(533, 'sakti bahadur rai', 9856231457, '2072-03-16', '-', '7/51', '7052', 'chokti', '-', '-', '-', '-'),
(534, 'mitralal gautam ', 9856234876, '2072-03-23', '-', '7/52', '7053', 'chokti', '-', '-', '-', '-'),
(535, 'krishna prashad gautam ', 9856214789, '2072-03-16', '-', '7/53', '7054', 'chokti', '', '', '', ''),
(536, 'man bahadur shah', 9856448795, '2072-03-23', '-', '7/54', '7055', 'chokti', '-', '-', '-', '-'),
(537, 'rohini gautam ', 9856231478, '2072-03-22', '-', '7/55', '7056', 'chokti', '-', '-', '-', '-'),
(538, 'laal bahadur karki', 9853246978, '2072-03-23', '-', '7/56', '7057', 'chokti', '-', '-', '-', '-'),
(539, 'dinesh basnet', 9812364189, '2072-03-25', '-', '7/57', '7058', 'chokti', '-', '-', '-', '-'),
(540, 'karna bahadur kunwar', 9856789425, '2072-03-16', '-', '7/58', '7059', 'chokti', '-', '-', '-', '-'),
(541, 'indra bahadur kunwar', 9856789578, '2072-03-15', '-', '7/59', '7060', 'chokti', '-', '-', '-', '-'),
(542, 'devi karki', 98952364879, '2072-04-21', '-', '5/4', '5005', 'chattiun chowk', '-', '-', '-', '-'),
(543, 'khagendra magar', 9812546987, '2072-04-12', '-', '5/5', '5006', 'chhatiun chowk', '-', '-', '-', '-'),
(544, 'govinda rai', 9804125689, '2072-04-19', '-', '5/52', '5053', 'chhatiun chowk', '-', '-', '-', '-'),
(545, 'bal kumar karki', 9816302569, '2072-04-20', '-', '5/54', '5055', 'chhatiun chowk', '-', '-', '-', '-'),
(546, 'bijaya basnet', 9824569768, '2072-04-21', '-', '5/156', '5157', 'sutar chowk', '-', '-', '-', '-'),
(547, 'menuka tamang', 9825364879, '2072-04-19', '-', '5/158', '5159', 'sutar chowk', '-', '-', '-', '-'),
(548, 'meera rai', 9856142545, '2072-04-08', '-', '5/152', '5163', 'sutar chowk', '-', '-', '-', '-'),
(549, 'taranath rai', 9825367984, '2072-04-14', '-', '5/166', '5167', 'sutar chowk', '-', '-', '-', '-'),
(550, 'ganga tamang', 9856237985, '2072-04-26', '-', '5/170', '5171', 'sutar chowk', '-', '-', '-', '-'),
(551, 'pradip thapa', 9856201478, '2072-04-13', '-', '5/172', '5173', 'sutar chowk', '-', '-', '-', '-'),
(552, 'fulmaya tamang', 9856278915, '2072-04-21', '-', '5/175', '5176', 'sutar chowk', '-', '-', '-', '-'),
(553, 'santosh tamang', 98012564879, '2072-04-27', '-', '5/176', '5177', 'sutar chowk', '-', '-', '-', '-'),
(554, 'padam moktan', 9825367894, '2072-02-05', '-', '3/2', '301', 'saraswoti chowk', '-', '-', '-', '-'),
(555, 'tej bahadur karki', 9856142536, '2072-05-10', '-', '3/1', '302', 'saraswoti chowk', '-', '-', '-', '-'),
(556, 'padam kafle', 9878987858, '2072-05-10', '-', '3/2', '303', 'saraswoti chowk', '-', '-', '-', '-'),
(557, 'man maya rai', 9858698948, '2072-05-18', '-', '3/3', '304', 'saraswoti chowk', '-', '-', '-', '-'),
(558, 'ganga devi katuwal', 9856487958, '2072-05-24', '-', '3/4', '305', 'saraswoti chowk', '-', '-', '-', '-'),
(559, 'ananda neupane', 9869523125, '2072-05-10', '-', '0.600000000', '306', 'saraswoti chowk', '-', '-', '', '-'),
(560, 'tanka bhandari', 9841878569, '2072-05-09', '-', '3/6', '307', 'saraswoti chowk', '-', '-', '-', '-'),
(561, 'manendra rai', 9858697894, '2072-05-17', '-', '0.428571428', '308', 'saraswoti chowk', '-', '-', '-', '-'),
(562, 'padam bahadur rai', 9869235689, '2072-05-15', '-', '3/8', '309', 'saraswoti chowk', '-', '-', '-', '-'),
(563, 'rameshor rumdali', 9858687948, '2072-05-04', '-', '3./9', '310', 'saraswoti chowk', '-', '-', '-', '-'),
(564, 'malpot karyalaya', 9845652314, '2076-03-05', '-', '2/222', '03360', 'voudi', '-', '-', '-', '-'),
(565, 'narayan prashad niroula', 9819303180, '2077-05-18', '-', '3/93', '200504753', 'school dada', 'tikaram niroula', '-', '-', 'second meter'),
(566, 'lila thapa', 9842172427, '2072-05-10', '-', '6/1', '602', 'ukkhubari tol', 'harka bahadur thapa', '-', '-', '-'),
(567, 'pampha gautam', 9842172427, '2072-05-17', '-', '6/2', '603', 'ukkhubari tol', '-', '-', '-', '-'),
(568, 'dil kumar limbu', 9801256987, '2072-05-17', '-', '7/40', '741', 'chokti', '-', '-', '-', '-'),
(569, 'man bahadur rai', 9842041414, '2072-09-16', '-', '7/150', '7151', 'chokti', '-', '-', '-', '-'),
(570, 'debendra shrestha ', 9812222222, '2072-09-08', '-', '7/151', '7152', 'chokti', '-', '-', '-', '-'),
(571, 'barsha rai', 82154564555, '2072-02-05', '-', '7/152', '7153', 'chokti', '-', '-', '-', '-'),
(573, 'indramaya kunwar', 9842133333, '2072-02-07', '-', '7/153', '7154', 'chokti', '-', '-', '-', '-'),
(574, 'nara bahadur poudel', 9856789858, '2072-03-08', '-', '4/99', '4100', 'school dada', '-', '-', '-', '-'),
(575, 'dipak neupane', 9845623121, '2072-04-07', '-', '4/173', '4174', 'ghopali tol', '-', '-', '-', '-'),
(576, 'farash gautam', 9852361478, '2072-09-07', '-', '5/95', '5096', 'devithan line', '-', '-', '-', '-'),
(577, 'bina dangol', 9856254879, '2072-02-06', '-', '4/261', '4262', 'ghopali tol', '-', '-', '-', '-'),
(578, 'govinda basnet', 9856897412, '2071-09-09', '-', '4/201', '4202', 'ghopali tol', '-', '-', '-', '-'),
(579, 'kalpana pariyar', 9856478596, '2072-09-02', '-', '4/207', '4208', 'ghopali tol', '-', '-', '-', '-'),
(580, 'dagal singh limbu', 9865321245, '2072-01-11', '-', '4/209', '4210', 'ghopali tol', '-', '-', '-', '-'),
(581, 'sangita budhathoki', 9824381657, '2077-09-19', '-', '7/15', 'H000389', 'simal chowk', 'man bahadur budhathoki', '-', 'H.santosh thapa', '-'),
(582, 'ram bahadur karki', 9865321578, '2072-09-09', '-', '3/153', '3154', 'saraswoti chowk', '-', '-', '-', '-'),
(583, 'damansari rai ', 9807392205, '2072-09-08', '-', '5/34', '5035', 'sutar chowk', '-', '-', '-', '-'),
(584, 'bhadramaya rijal', 9865237895, '2072-02-14', '-', '4/211', '4212', 'ghopali tol', '-', '-', '-', '-'),
(585, 'hari khadka', 9856985632, '2072-02-05', '-', '4/213', '4214', 'ghopali tol', '-', '-', '-', '-'),
(586, 'krishna shrestha ', 9842166108, '2069-09-18', '-', '5/93', '5094', 'ukkhubari tol', 'sher bahadur shrestha', '-', '-', '-'),
(587, 'rita thapa', 9856321545, '2072-09-15', '-', '4/215', '4216', 'ghopali tol', '-', '-', '-', '-'),
(588, 'bisnu khadka', 9847856975, '2072-09-10', '-', '4/216', '4217', 'ghopali tol', '-', '-', '-', '-'),
(589, 'ramesh  thapa', 9856778852, '2072-04-13', '-', '0.018348623', '4218', 'ghopali tol', '-', '-', '-', '-'),
(590, 'geeta aapagain ', 9827019556, '2072-09-18', '-', '2/246', '2247', 'doban line', '-', '-', '-', '-'),
(591, 'yeshoda chapagain', 9878794118, '2072-10-19', '-', '1/36', '1037', 'Bagaichha tol', '-', '-', '-', '-'),
(592, 'pramila poudel', 9856321547, '2072-10-07', '-', '3/26', '3027', 'saraswoti chowk', '-', '-', '-', '-'),
(593, 'dhana maya tamang', 9856487895, '2072-10-15', '-', '3/41', '3042', 'saraswoti chowk', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `client_dues`
--

CREATE TABLE `client_dues` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unpaid',
  `dues_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_dues`
--

INSERT INTO `client_dues` (`id`, `cid`, `amount`, `status`, `dues_date`) VALUES
(16, 3, '85.00', 'unpaid', '2077-10-21'),
(17, 5, '350.00', 'unpaid', '2077-10-21'),
(18, 5, '245.00', 'unpaid', '2077-10-21'),
(25, 52, '33.20', 'unpaid', '2077-11-03'),
(26, 7, '9595.00', 'unpaid', '2077-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE `meter` (
  `mid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `reading` varchar(11) NOT NULL,
  `read_date` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`mid`, `cid`, `reading`, `read_date`, `status`) VALUES
(43, 3, '160', '2077-10-01', 'paid'),
(44, 3, '600', '2077-11-06', 'unpaid'),
(45, 3, '600', '2077-08-02', 'unpaid'),
(46, 5, '500', '2077-09-01', 'paid'),
(47, 5, '900', '2077-10-02', 'paid'),
(48, 10, '606', '2077-09-02', 'paid'),
(49, 10, '900', '2077-10-07', 'paid'),
(50, 12, '515', '2077-08-02', 'paid'),
(52, 12, '750', '2077-09-02', 'unpaid'),
(53, 12, '900', '2077-10-07', 'paid'),
(55, 52, '1160', '2077-11-03', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `new_charge`
--

CREATE TABLE `new_charge` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `paid_date` date NOT NULL,
  `meter_charge` int(11) DEFAULT 0,
  `membership` int(11) NOT NULL DEFAULT 0,
  `filter` int(11) NOT NULL DEFAULT 0,
  `misc` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner_transfer`
--

CREATE TABLE `owner_transfer` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `old_owner` text NOT NULL,
  `new_owner` text NOT NULL,
  `charge` int(11) NOT NULL,
  `paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `prev_reading` float NOT NULL DEFAULT 0,
  `cur_reading` float NOT NULL,
  `read_date` text NOT NULL,
  `paid_date` text NOT NULL,
  `fee_rebate` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `remark` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `client_dues` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `dues_return` decimal(10,2) NOT NULL DEFAULT 0.00,
  `previous_return` decimal(10,2) NOT NULL,
  `new_dues` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `cid`, `prev_reading`, `cur_reading`, `read_date`, `paid_date`, `fee_rebate`, `discount`, `remark`, `amount`, `client_dues`, `total`, `grand_total`, `dues_return`, `previous_return`, `new_dues`) VALUES
(22, 5, 49, 500, '2077-09-01', '2077-10-21', '248.16', '0.00', '', '3102.00', 0, '3350.16', '3350.16', '0.00', '0.00', '350.00'),
(23, 5, 500, 900, '2077-10-02', '2077-10-21', '0.00', '0.00', '', '2745.00', 0, '2745.00', '2745.00', '0.00', '0.00', '245.00'),
(26, 12, 400, 515, '2077-08-02', '2077-10-21', '150.00', '0.00', '', '750.00', 0, '900.00', '900.00', '0.00', '0.00', '50.00'),
(28, 12, 515, 900, '2077-10-07', '2077-10-21', '-105.60', '0.00', '', '2640.00', 67, '2534.40', '2601.40', '0.00', '0.00', '0.00'),
(35, 10, 580, 606, '2077-09-02', '2077-11-02', '10.16', '0.00', '', '127.00', 0, '137.16', '140.00', '2.84', '0.00', '0.00'),
(36, 10, 606, 900, '2077-10-07', '2077-11-03', '0.00', '0.00', '', '2003.00', 255, '2000.16', '2000.00', '0.00', '2.84', '255.16'),
(37, 52, 1110, 1160, '2077-11-03', '2077-11-03', '-11.80', '0.00', '', '295.00', 0, '283.20', '250.00', '0.00', '0.00', '33.20');

-- --------------------------------------------------------

--
-- Table structure for table `replace_charge`
--

CREATE TABLE `replace_charge` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `paid_date` date NOT NULL,
  `meter_charge` int(11) NOT NULL,
  `filter` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$DQlTB7DRbxa3mvhBN4z6nu0Bxuc2lFVspTI8d1bnA4CpI3upEqi3q', '2020-04-14 09:51:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meter` (`meter`);

--
-- Indexes for table `client_dues`
--
ALTER TABLE `client_dues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meter`
--
ALTER TABLE `meter`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `new_charge`
--
ALTER TABLE `new_charge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`cid`);

--
-- Indexes for table `owner_transfer`
--
ALTER TABLE `owner_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `replace_charge`
--
ALTER TABLE `replace_charge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=594;

--
-- AUTO_INCREMENT for table `client_dues`
--
ALTER TABLE `client_dues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meter`
--
ALTER TABLE `meter`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `new_charge`
--
ALTER TABLE `new_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `owner_transfer`
--
ALTER TABLE `owner_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `replace_charge`
--
ALTER TABLE `replace_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_dues`
--
ALTER TABLE `client_dues`
  ADD CONSTRAINT `client_dues_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meter`
--
ALTER TABLE `meter`
  ADD CONSTRAINT `meter_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_charge`
--
ALTER TABLE `new_charge`
  ADD CONSTRAINT `new_charge_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `owner_transfer`
--
ALTER TABLE `owner_transfer`
  ADD CONSTRAINT `owner_transfer_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `client` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replace_charge`
--
ALTER TABLE `replace_charge`
  ADD CONSTRAINT `replace_charge_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `client` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
