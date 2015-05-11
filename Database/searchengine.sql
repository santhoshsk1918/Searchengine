-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2015 at 06:12 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `searchengine`
--

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `sr_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sr_id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`sr_id`, `title`, `description`, `type`, `link`, `keywords`) VALUES
(2, 'fdsfd', 'sadasdw', '', 'upload/5546dcc0193907.09681029.pdf', 'mounesh project score team mobile'),
(3, 'fdsfd', 'sadasdw', 'pdf', 'upload/5546dcdc9e4c20.76427927.pdf', 'mounesh project score team mobile'),
(4, 'dsa', 'das', 'pdf', 'upload/5546e4d8c379d9.61416790.pdf', 'mounesh project score team mobile'),
(5, 'dsaewq', 'ewqe', 'pptx', 'upload/5546e68e7e7410.12193125.pptx', 'uvce deptcse for industrial wireless'),
(6, 'dsaewq', 'ewqe', 'xlsx', 'upload/5546e6a4bcb086.52579255.xlsx', 'kumar k b s m'),
(7, 'dsaewq', 'ewqe', 'docx', 'upload/5546e6ae715632.37306444.docx', 'cloud data for delay t'),
(8, 'dsaewq', 'ewqe', 'docx', 'upload/5546e6b73bc238.80950784.docx', 'cloud data for delay t'),
(9, 'dsaewq', 'ewqe', 'doc', 'upload/5546e6c0b35c44.84340247.doc', 'h e c b a'),
(10, 'dsaewq', 'ewqe', 'doc', 'upload/5546e76e709af1.18200830.doc', 'h e c b a'),
(11, 'dsad', 'dsadwdasdadwdqd  dsad wa daw ada ad ads ', 'docx', 'upload/5546f99dd4c084.03095762.docx', 'cloud data for delay t'),
(12, 'dwadd', 'awdasdadw das adsa da a ', 'docx', 'upload/5546ff5d1294b2.08995765.docx', 'cloud data for delay t'),
(13, 'Praveen PPt', 'This is praveen''s ppt', 'pptx', 'upload/55472b56539db3.23893219.pptx', 'data sensory for g are'),
(14, 'Praveen PPt', 'This is praveen''s ppt', 'pptx', 'upload/55472bac10a2a0.09102894.pptx', 'data sensory for g are'),
(15, 'dsad`', 'fdfa e', 'pptx', 'upload/55472bc1823bb8.52337610.pptx', 'data sensory for g are'),
(16, 'dsad`', 'fdfa e', 'pptx', 'upload/55472cc545b516.01562045.pptx', 'data sensory g integration time'),
(17, 'dsad`', 'fdfa e', 'pptx', 'upload/55473114d49839.38631247.pptx', 'data sensory time integration step'),
(18, 'dsad`', 'fdfa e', 'doc', 'upload/55473136d0fb69.65688715.doc', 'h e b c a'),
(19, 'dsad`', 'fdfa e', 'doc', 'upload/55473155c3e7c3.76999822.doc', 'e c b g t'),
(20, 'dsad`', 'fdfa e', 'docx', 'upload/554731a24bb2a7.56649343.docx', 'cloud data delay the t'),
(21, 'dsa', 'dawd', 'pptx', 'upload/5547fa3a0a8d89.66554646.pptx', 'opportunistic energy h node d'),
(22, 'das', 'dawdasdaw', 'pptx', 'upload/5548004ee2b300.60674704.pptx', 'm n instruction architecture mod'),
(23, 'dasd', 'awadsad adw ', 'pptx', 'upload/55480be5e4a1e1.87642080.pptx', 'opportunistic energy h node d'),
(24, 'dawdd', 'wasawads', 'pptx', 'upload/554813da347102.99826364.pptx', 'uvceapril departmentcse the value synopsis  dad dwa dwwa'),
(25, 'dawdd', 'awdasda da dsa wd adsad ad', 'png', 'upload/images554821dfed4da4.04444553.png', ''),
(26, 'dawdd', 'awdasda da dsa wd adsad ad', 'pdf', 'upload/554822c7a341e5.38800416.pdf', 'project mounesh team udupi score  dsada daw dawd'),
(27, 'priority based searching technique', 'short description related to searching technology with considering the priority of the individual file which is loaded in the database', 'pdf', 'upload/55486f83bf57c7.39654798.pdf', 'project mounesh team udupi score'),
(28, 'My paper', 'This is my paper', 'pdf', 'upload/55486ff515c707.47637790.pdf', 'fig e s ieeetransactionsoncircuitsandsystemsforvideotechnology vol'),
(29, 'cloud based searching technique', 'description of cloud based searching', 'pdf', 'upload/5548718955faf5.38048049.pdf', 'video cloud game mobile in'),
(30, 'Santhosh s kashyap', 'This is Santhosh s Kashyap the great!!!!!!!!!!!!', 'pdf', 'upload/5548c49d86ef96.92053518.pdf', 'pp fig in vol a'),
(31, 'Santhosh s kashyap', 'This is Santhosh s Kashyap the great!!!!!!!!!!!!', 'pdf', 'upload/5548c4bc7b2cc7.62118905.pdf', 'video cloud game mobile in  Santhosh is ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
