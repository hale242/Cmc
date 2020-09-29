-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 11:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sellsogood_cmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(11) NOT NULL,
  `name_page` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_page_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `name_page`, `content`, `meta_page_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'About', '<h2><strong>OUR MISSION</strong></h2>\r\n\r\n<p>To Serve Society in Partnership with the Medical Profession by providing quality medical products and excellent services with professionalism</p>\r\n\r\n<h2><strong>OUR VISION</strong></h2>\r\n\r\n<p>To be The Leading Total Medical Equipment and Informatics&nbsp; Solution Provider in Southeast Asia</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1><span style=\"color:#3333cc\"><strong>CORPORATE INFORMATION</strong></span></h1>\r\n\r\n<p><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/11/CMC-2.jpg\" style=\"height:255px; width:340px\" /><img alt=\"\" src=\"http://www.cmcbiotech.co.th/th/wp-content/uploads/2019/06/CMC-2.jpg\" style=\"height:255px; width:340px\" /></p>\r\n\r\n<table border=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Company :</td>\r\n			<td>CMC Biotech Co., Ltd.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Founded&nbsp; :</td>\r\n			<td>1963</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Incorporated :&nbsp;</td>\r\n			<td>19 December 1991</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Head office :</td>\r\n			<td>364&nbsp;Soi Ladprao 94 (Panjamitr) Ladprao Road, Phlabphla, Wang Thong Lang, Bangkok 10310, Thailand</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tel :</td>\r\n			<td>+ 66 (2) 530 4995-6&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fax :</td>\r\n			<td>+ 66 (2) 559 3261</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Call center :</td>\r\n			<td>+ 66 (2) 935 6667-8</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Email :&nbsp;</td>\r\n			<td>Sales_xr@cmcbiotech.co.th<br />\r\n			Sales_us@cmcbiotech.co.th&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1 style=\"text-align:center\"><strong>OUR HISTORY</strong></h1>\r\n\r\n<p style=\"text-align:center\">Originally founded in 1963, CMC Biotech Co., Ltd. was joined on 19 December 1991. The company&rsquo;s core business is supplying and service for medical equipment. We are the sole distributor of Canon Medical Equipment in Thailand.</p>\r\n\r\n<p style=\"text-align:center\">Our Company believed in the experience and ability of each well trained and qualified service personnel with the objective of &ldquo;Service Excellence With Professionalism&rdquo;.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<hr />\r\n<h2>To know more about Canon Medical Systems&nbsp;<a href=\"https://global.medical.canon/\" rel=\"noopener\" target=\"_blank\">Click Here</a></h2>\r\n\r\n<table border=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>1963</td>\r\n			<td>Started distributing Toshiba medical equipment in Thailand (Founding Company, CMC Co., Ltd.)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1991</td>\r\n			<td>Re- Structured the company with the establishments of CMC Biotech Co., Ltd.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1994</td>\r\n			<td>Established Northeastern (Khon Kaen) and Southern (Hat Yai) branch offices.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1997</td>\r\n			<td>Established Northern (Chiangmai) branch office.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1999</td>\r\n			<td>Secured major orders for Ultrasound scanners in the Danish Loan Project and X-ray systems in OECF Loan Project.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2000</td>\r\n			<td>Awarded &ldquo;The Best Distributor of Toshiba Medical Equipment&rdquo; of the year.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2001</td>\r\n			<td>Starting-up an ICT team within the operation for ICT related business.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2003</td>\r\n			<td>Began sole distributorship of Sedecal X-ray equipment.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2004</td>\r\n			<td>First sale of Sedecal X-ray mobile units.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2005</td>\r\n			<td>Certified ISO 9001:2000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2010</td>\r\n			<td>Certified ISO 9001:2008</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2017</td>\r\n			<td>Certified ISO 9001:2015</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2018</td>\r\n			<td>Toshiba Medical Systems Name change to Canon Medical&nbsp; Systems</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 'About Page', 'About Page', 'About Page', '2019-11-26 11:09:36', '2019-11-28 14:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_image`, `banner_title`, `banner_url`, `created_at`, `updated_at`) VALUES
(10, '251119_165243.jpg', NULL, 'http://www.cmcbiotech.co.th/th/', '2019-11-25 16:52:44', '2019-11-25 16:52:44'),
(11, '041219_102847.jpg', 'Banner 2', 'http://www.cmcbiotech.co.th/th/', '2019-12-04 10:28:48', '2019-12-27 14:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choice_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `choice` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `question_id`, `choice`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'This is a simple hero unit.', 'true', '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(2, 1, 'It uses utility classes for typography.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(3, 1, 'Component for calling extra attention.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(4, 1, 'It uses utility classes for typography and spacing to space.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(5, 2, 'This is a simple hero unit.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(6, 2, 'It uses utility classes for typography.', 'true', '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(7, 2, 'Component for calling extra attention.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(8, 2, 'Component for calling extra attention.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(9, 3, 'Pericardial Effusion.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(10, 3, 'Aortic Disease.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(11, 3, 'Prosthetic Valves.', 'true', '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(12, 3, 'Echo & Cardiovascular Surgery.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(13, 4, 'Left Ventricular Function.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(14, 4, 'Aortic Stenosis.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(15, 4, 'Mitral Regurgitation.', NULL, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(16, 4, 'Parasternal Views.', 'true', '2020-01-13 13:48:10', '2020-01-13 14:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `comment_lesson`
--

CREATE TABLE `comment_lesson` (
  `comment_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `name_page` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_google` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_page_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `name_page`, `address`, `email`, `map_google`, `longitude`, `latitude`, `meta_page_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Contact us', 'Contact us', NULL, '<p><iframe frameborder=\"0\" height=\"600\" scrolling=\"no\" src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7750.243488654262!2d100.607906!3d13.771531!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee1930fc91cbb7aa!2sCMC%20BIOTECH%20CO.%2C%20LTD.!5e0!3m2!1sen!2sth!4v1574744191863!5m2!1sen!2sth\" width=\"100%\"></iframe></p>', NULL, NULL, 'Contact us', 'Contact us', 'Contact us', '2019-11-26 11:20:19', '2019-11-26 11:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_cat_id` int(11) DEFAULT NULL,
  `course_teacher_id` int(11) DEFAULT NULL,
  `course_vdo_url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_price` float DEFAULT NULL,
  `course_short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `course_full_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_is_required` int(11) DEFAULT NULL COMMENT 'id course ที่ต้องผ่านถึงจะซื้อ course นี้ได้',
  `course_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_view` int(11) NOT NULL DEFAULT 0,
  `course_status` int(11) NOT NULL COMMENT '1 = activate 0 = draft',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_cat_id`, `course_teacher_id`, `course_vdo_url`, `course_price`, `course_short_description`, `course_full_description`, `course_is_required`, `course_image`, `course_view`, `course_status`, `created_at`, `updated_at`) VALUES
(1, 'Test Course', 1, 3, 'https://www.youtube.com/embed/fH31ecAeNnc', 3500, 'Test Short Description', '<p>Dr.&nbsp; Surachate&nbsp;&nbsp;&nbsp;&nbsp; Siripongsakun, MD</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Personal history</p>\r\n\r\n<p>Birthdate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; December 13th, 1979&nbsp; &nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Birth place&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; Udornthani province, Thailand.</p>\r\n\r\n<p>Present address :&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Mobile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; 085-0065-333</p>\r\n\r\n<p>Office Address&nbsp; :&nbsp; Department of Radiology, &nbsp;Chulabhorn Cancer Center, &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Laksi, Bangkok, Thailand &nbsp;Tel &nbsp;+66-2-576-6298 &nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>E-mail address&nbsp; :&nbsp;&nbsp; surachate@yahoo.com, ssiripongsakun@mednet.ucla.edu</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Education</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bachelor&rsquo;s degree&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; March, 2003&nbsp; :&nbsp;&nbsp;&nbsp; Doctor of medicine&nbsp; ( second class honor )</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Faculty of medicine , Chulalongkorn University, Bangkok, Thailand&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Post graduational education&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; April, 2007&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp; Graduate diploma of clinical sciences in radiology,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Faculty of medicine , Chulalongkorn University, Bangkok, Thailand&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; April, 2009&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp; Higher graduate diploma of clinical sciences in radiology,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Faculty of medicine , Chulalongkorn University, Bangkok, Thailand&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; May,&nbsp; 2009&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp; Diploma Thai board of radiology</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Royal College of Radiologists of Thailand</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; June, 2010-13:&nbsp;&nbsp;&nbsp; Visiting research fellow abdominal imaging and interventionals,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; David Geffen School of Medicine at UCLA</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Extracurricular activity</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1997-1999&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; Member of student council of Chulalongkorn University.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; 1999&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; Head instructor of food and welfare division ,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 20<sup>th</sup>&nbsp;Asian Medical Student Conference ( AMSC ), Thailand</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; 2001&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; Treasurer, 11<sup>th</sup>&nbsp;medical camp for high school student, Faculty of medicine&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chulalongkorn University.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; 2002&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; Member of graduate comittee, Chulalongkorn University.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; 2007&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; Chief of 2<sup>nd</sup>&nbsp;year residents, Department of diagnostic radiology,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Faculty of medicine, Chulalongkorn University.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Clinical experiences&nbsp;</p>\r\n\r\n<p>&nbsp;April,2003-March,2007&nbsp; :&nbsp; Internship, first year government-mandatory clinical service</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; At Udornthani regional hospital, Thailand</p>\r\n\r\n<p>April,2004-May,2006&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Attending physician at Ban-phue hospital, 90-bed community</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hospital, Udornthani, Thailand</p>\r\n\r\n<p>&nbsp;July,2010- June,2012&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Visiting Research Fellow at department of Radiology,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; David Geffen School of Medicine at UCLA</p>\r\n\r\n<p>&nbsp;June,2009-October,2017&nbsp;&nbsp;&nbsp; :&nbsp; Attending radiologist at Chulabhorn Cancer Center</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>June, 2013-October,2017&nbsp; : Head department of Diagnostic radiology at Chulabhorn hospital.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>November 2017 &ndash; current&nbsp; :&nbsp; Director of Sonographer School , HRH pricess Chulabhorn</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; College of Medical Science</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Membership of professional association</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Member of Thai Medical Association&nbsp; (2006-present)</li>\r\n	<li>Member of Royal College of Radiologists of Thailand&nbsp; (2010-present)</li>\r\n	<li>International member of Korean Society of Radiology&nbsp; (2013-present)</li>\r\n	<li>International member of Korean Society of Ultrasound in Medicine&nbsp; (2013-present)</li>\r\n	<li>Committee of Medical Ultrasonic Society of Thailand&nbsp; (2014-present)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n	<li>Secretary of Royal college of Radiologist of Thailand (2015-2017)</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Training</p>\r\n\r\n<ol>\r\n	<li>IAEA/RCA regional training course on CT cancer staging for abdomen and urogenital system Korea Institute of Radiological and Medical Sciences (KIRAMS), Seoul, Korea (6-10 October, 2014)</li>\r\n	<li>Korean Society of Ultraound in Medicine (KSUM) Asian International Fellowship:&nbsp; Head and neck sonography, Asan Medical Center, Korea (7-20 August, 2017)</li>\r\n	<li>Korean Society of Radiology (KSR) fellowship program: MSK radiology, Hallym university, Dongtan Sacre Heart Hospital, Korea&nbsp; (2 June &ndash; 6 July , 2019)</li>\r\n</ol>', NULL, '090120_155630.jpg', 38, 1, '2020-01-09 15:56:30', '2020-01-15 14:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` int(11) DEFAULT NULL COMMENT '1 = activate 0 = draft',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`category_id`, `category_name`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Vascular', 1, '2020-01-09 15:55:13', '2020-01-09 15:55:13'),
(2, 'Data Excue', 1, '2020-01-15 10:48:26', '2020-01-15 10:48:26'),
(3, 'Cate Course Beep', 1, '2020-01-15 10:49:07', '2020-01-15 10:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `email_id` int(11) NOT NULL,
  `subject` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `send_to_admin` int(11) DEFAULT NULL COMMENT '1 = on 0 = off',
  `send_to_teacher` int(11) DEFAULT NULL COMMENT '1 = on 0 = off',
  `send_to_user` int(11) DEFAULT NULL COMMENT '1 = on 0 = off',
  `type` int(11) NOT NULL COMMENT '0 = order 1 = subscription 2 = register',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_id`, `subject`, `content`, `send_to_admin`, `send_to_teacher`, `send_to_user`, `type`, `created_at`, `updated_at`) VALUES
(1, 'email order', '<p>email order....</p>', 1, 1, 1, 0, '2019-12-24 16:33:03', '2019-12-24 16:39:57'),
(2, 'email subscription', '<p>email subscription....</p>', 1, NULL, NULL, 1, '2019-12-24 16:42:32', '2019-12-24 16:42:32'),
(3, 'email register', '<p>email register</p>', NULL, 1, NULL, 2, '2019-12-24 16:45:25', '2019-12-24 16:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `home_page_id` int(11) NOT NULL,
  `logo_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`home_page_id`, `logo_image`, `created_at`, `updated_at`) VALUES
(1, '051119_162801.jpg', '2019-11-05 16:28:01', '2019-11-05 16:28:01'),
(2, '051119_171220.jpg', '2019-11-05 17:12:20', '2019-11-05 17:12:20'),
(3, '191119_154340.jpg', '2019-11-19 15:43:41', '2019-11-19 15:43:41'),
(4, '191119_173730.png', '2019-11-19 17:37:30', '2019-11-19 17:37:30'),
(5, '191119_174020.jpg', '2019-11-19 17:40:20', '2019-11-19 17:40:20'),
(6, '191119_174209.png', '2019-11-19 17:42:09', '2019-11-19 17:42:09'),
(7, '191119_174241.jpg', '2019-11-19 17:42:41', '2019-11-19 17:42:41'),
(8, '251119_095742.png', '2019-11-25 09:57:42', '2019-11-25 09:57:42'),
(9, '251119_095952.png', '2019-11-25 09:59:52', '2019-11-25 09:59:52'),
(10, '251119_100333.jpg', '2019-11-25 10:03:33', '2019-11-25 10:03:33'),
(11, '251119_105516.jpg', '2019-11-25 10:55:16', '2019-11-25 10:55:16'),
(12, '251119_105634.jpg', '2019-11-25 10:56:34', '2019-11-25 10:56:34'),
(13, '251119_161958.png', '2019-11-25 16:19:58', '2019-11-25 16:19:58'),
(14, '251119_162217.jpg', '2019-11-25 16:22:17', '2019-11-25 16:22:17'),
(15, '021219_172015.jpg', '2019-12-02 17:20:15', '2019-12-02 17:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `last_watch`
--

CREATE TABLE `last_watch` (
  `last_watch_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lesson_vdo_url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lesson_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lesson_status` int(11) DEFAULT NULL COMMENT '0 = active 1 = inactive',
  `course_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_vdo_url`, `lesson_content`, `lesson_status`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'L1', 'https://www.youtube.com/embed/LXb3EKWsInQ', 'วงจรงูเขียว', 1, 1, '2020-01-09 17:17:10', '2020-01-09 17:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_file`
--

CREATE TABLE `lesson_file` (
  `lesson_file_id` int(11) NOT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `lesson_file` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson_file`
--

INSERT INTO `lesson_file` (`lesson_file_id`, `lesson_id`, `lesson_file`, `created_at`, `updated_at`) VALUES
(1, 1, '5e16fd9ae8c78_contents_s_re.png', '2020-01-09 17:17:11', '2020-01-09 17:17:11'),
(2, 1, '5e16fdbda71f8_090120_101145.jpg', '2020-01-09 17:17:34', '2020-01-09 17:17:34'),
(3, 1, '5e16fdcd21dac_20170324-203858_small_i7.png', '2020-01-09 17:17:50', '2020-01-09 17:17:50'),
(4, 1, '5e16fdcd687cf_20191128-150914_ASUS_ROG_Zenith_II_extreme.png', '2020-01-09 17:17:50', '2020-01-09 17:17:50'),
(5, 1, '5e16fdcd8ea82_20181106112645_24428_24_1.jpg', '2020-01-09 17:17:50', '2020-01-09 17:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_short_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_full_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_page_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_keyword` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_view` int(11) NOT NULL DEFAULT 0,
  `news_status` int(11) DEFAULT NULL COMMENT '1 = activate 0 = draft',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_short_content`, `news_full_content`, `news_page_title`, `news_description`, `news_keyword`, `news_image`, `news_view`, `news_status`, `created_at`, `updated_at`) VALUES
(2, 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', '<h2><em><span style=\"font-size:12pt\">เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!</span></em></h2>\r\n\r\n<p>ใกล้ปลายปีหลายบริษัทเริ่มทยอยสรุปผลประกอบการ เพื่อเป็นขวัญกำลังใจให้กับพนักงานที่ทำงานอย่างหนักมาตลอดทั้งปี โดยหลายๆ บริษัทเริ่มประกาศผลตอบแทนพนักงานกันบ้างแล้ว โดยเพจเฟซบุ๊ก <strong>ลุงตู่ตูน</strong> โพสต์ข้อความพร้อมภาพประกอบเกี่ยวกับบริษัทชื่อดังในไทยจ่ายโบนัสให้พนักงานสูงสุดถึง 8 เดือนด้วยกัน แถมบวกเงินพิเศษให้อีกหลายหมื่นบาท&nbsp; ใครได้เท่าไหร่ไปดูกัน!</p>', 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', 'เปิดโบนัส 9 บริษัท จ่ายหนัก จัดเต็ม แถมให้เงินพิเศษ ขึ้นเงินเดือน!', '211119_154843.jpg', 9, 1, '2019-11-21 15:48:43', '2019-12-30 11:57:49'),
(3, 'กลุ่มบริษัท CMC Biotech & Thai GL ได้มีพิธีเปิดอาคาร 356-358 อย่างเป็นทางการ', 'กลุ่มบริษัท CMC Biotech & Thai GL ได้มีพิธีเปิดอาคาร 356-358 อย่างเป็นทางการ', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1_PiF1nx1eE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ยืนยันความเป็นผู้นำ ด้าน Diagnostic Imaging<br />\r\nกลุ่มบริษัทฯ CMC Biotech &amp; Thai GL Group ได้มีพิธีเปิดอาคาร 356-358 อย่างเป็นทางการ รวมถึงพิธีทำบุญถวายภัตตาหารเพล และร่วมรับประทานอาหารกลางวัน ภายใต้ชื่องานว่า</p>\r\n\r\n<p>&rdquo; The Ribbon Cutting and Opening Ceremony of Advanced Imaging Eduation Centre, Bangkok and CMC Biotech New Building</p>\r\n\r\n<p>นอกจากนี้ยังมี ทางบริษัท CMC Biotech Co., Ltd. และบริษัทฯในเครือ ได้มีการจัดสถานที่อบรมอย่างเป็นทางการโดยผนึกกำลังร่วมกับ Vital Images (Canon HIT) ได้จัดอบรม CT Course Training เพื่อเรียนรู้ฟังก์ชั่นต่างๆ ของ Software Vitrea 7.11 ณ Advanced Imaging Education Centre, Bangkok เมื่อวันที่ 28-31 ตุลาคม ที่ผ่านมาด้วย นอกจากนี้ยังมีหัวข้อการอบรมอีกมากมาย<br />\r\nโดยท่านสามารถติดตามได้ที่ www.cmcbiotech.co.th</p>\r\n\r\n<p>เราเชื่อว่าการมี Advanced Imaging Education Centre, Bangkok จะมีส่วนช่วยพัฒนาบุคคลากรทางการแพทย์ได้อย่างดียิ่ง และเราพร้อมเป็นส่วนหนึ่งของการพัฒนาด้าน Diagnostic Imaging ได้อย่างมีประสิทธิภาพมากยิ่งขึ้น</p>\r\n\r\n<p>#CMCBiotech<br />\r\n#CMCBiotechandThaiGLGroup<br />\r\n#CanonMedical<br />\r\n#AdvancedImagingEducationCentreBangkok</p>', 'CMC', 'CMC', 'CMC', '251119_094832.jpg', 23, 1, '2019-11-25 09:48:32', '2019-12-04 18:34:15'),
(4, 'ติดตั้ง CT scan 32 Slices รพ.ดำเนินสะดวก', 'ติดตั้ง CT scan 32 Slices รพ.ดำเนินสะดวก', '<p>ทางบริษัท CMC Biotech Co., Ltd. ได้ทำการติดตั้งเครื่อง CT Scan 32 Slices เพื่อการตรวจรักษาลูกค้าถือเป็นจุดมุ่งหมายสำคัญในการทำงานของเรา รวมไปถึงการให้คำแนะนำและแนวทางปฏิบัติในระยะแรกและการสนับสนุนทางด้านเทคนิค โดย CMC Biotech ที่ได้รับการฝึกอบรมมาเป็นอย่างดี ซึ่งจะทำให้ลูกค้าได้รับประโยชน์สูงสุดในการใช้</p>\r\n\r\n<p>ขอขอบพระคุณ รพ.ดำเนินสะดวก ที่ไว้วางใจในผลิตภัณฑ์ของบริษัทฯ</p>', 'CMC', 'CMC', 'CMC', '251119_095149.jpg', 17, 1, '2019-11-25 09:51:49', '2019-12-04 14:11:31'),
(5, 'โครงการก้าวคนละก้าว CMC', 'โครงการก้าวคนละก้าว CMC', '<p>ร่วมผนึกกำลังกับ โครงการ &ldquo;ก้าวคนละก้าว เพื่อ 11 โรงพยาบาลศูนย์ทั่วประเทศ &rdquo; เมื่อวันอาทิตย์ที่ 24 ธันวาคม 2561 ที่ผ่านมา</p>\r\n\r\n<p>คณะผู้บริหารและตัวแทนพนักงานของกลุ่ม บริษัท CMC &amp; Thai GL ได้นำเงินบริจาคสมทบทุนให้กับ ตูน บอดี้สแลม<br />\r\nในโครงการ ก้าวคนละก้าว เพื่อ 11 โรงพยาบาลศูนย์ทั่วประเทศ ณ วัดร่องขุ่น จ.เชียงราย โดยบรรยากาศเต็มไปด้วยความชื่นมื่น</p>\r\n\r\n<p>#CMCBIOTECH<br />\r\n#CMCANDTHAIGLGROUP</p>', 'CMC', 'CMC', 'CMC', '251119_095333.jpg', 20, 1, '2019-11-25 09:53:33', '2020-01-07 14:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_status` int(11) DEFAULT 1 COMMENT '1 = payment 2 = wait 3 = success',
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_payment_type` int(11) DEFAULT NULL COMMENT '1 = credit card 2 = transfer payment',
  `order_payment_date` date DEFAULT NULL,
  `order_payment_time` time DEFAULT NULL,
  `order_bank_transfer` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_slip_file` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `order_status`, `user_id`, `order_date`, `order_payment_type`, `order_payment_date`, `order_payment_time`, `order_bank_transfer`, `order_slip_file`, `created_at`, `updated_at`) VALUES
(5, '14012020163125', 3, 8, '2020-01-14', 2, '2020-01-14', '16:31:18', 'กสิกร (xxx-xxxx-xxx)', '140120_163125.jpg', '2020-01-14 16:31:25', '2020-01-14 16:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `course_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 1, '2019-12-27 10:19:12', '2019-12-27 10:19:12'),
(2, 1, 8, 1, '2019-12-27 10:19:12', '2019-12-27 10:19:12'),
(3, 2, 1, 1, '2020-01-09 17:18:43', '2020-01-09 17:18:43'),
(4, 3, 1, 1, '2020-01-10 10:01:52', '2020-01-10 10:01:52'),
(5, 4, 1, 1, '2020-01-13 15:25:58', '2020-01-13 15:25:58'),
(6, 5, 1, 1, '2020-01-14 16:31:25', '2020-01-14 16:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `pravacy_policy`
--

CREATE TABLE `pravacy_policy` (
  `pravacy_id` int(11) NOT NULL,
  `name_page` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_page_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pravacy_policy`
--

INSERT INTO `pravacy_policy` (`pravacy_id`, `name_page`, `content`, `meta_page_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Pravacy Policy', '<p>Pravacy Policy</p>', 'Pravacy Policy', 'Pravacy Policy', 'Pravacy Policy', '2019-11-26 11:19:40', '2019-11-26 11:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `pre_post_test`
--

CREATE TABLE `pre_post_test` (
  `test_id` int(11) NOT NULL,
  `pretest_header` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posttest_header` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_required` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `question_type` int(11) NOT NULL COMMENT '1 = ปรนัย 2 = อัตนัย',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pre_post_test`
--

INSERT INTO `pre_post_test` (`test_id`, `pretest_header`, `posttest_header`, `score_required`, `course_id`, `question_type`, `created_at`, `updated_at`) VALUES
(1, 'DOPPLER US OF LOWER EXTREMITY VEINS PRACTICE AND PROTOCOL', 'DOPPLER US OF LOWER EXTREMITY VEINS PRACTICE AND PROTOCOL', '4', 1, 2, '2020-01-09 17:16:19', '2020-01-13 14:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `pre_post_test_save`
--

CREATE TABLE `pre_post_test_save` (
  `test_save_id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `pretest_score` int(11) DEFAULT NULL,
  `posttest_score` int(11) DEFAULT NULL,
  `pretest_status` int(11) DEFAULT 0 COMMENT '0 = Wait 1 = Fail 2 = Pass',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pre_post_test_save`
--

INSERT INTO `pre_post_test_save` (`test_save_id`, `test_id`, `user_id`, `course_id`, `pretest_score`, `posttest_score`, `pretest_status`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 1, NULL, NULL, 0, '2020-01-13 14:29:55', '2020-01-14 16:22:14'),
(3, 1, 8, 1, NULL, NULL, 0, '2020-01-14 16:31:25', '2020-01-14 16:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_detail` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_status` int(11) DEFAULT NULL COMMENT '1 = activate 0 = draft 	',
  `product_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_view` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `product_status`, `product_image`, `product_view`, `created_at`, `updated_at`) VALUES
(2, 'Champ_test1234', 'Product detail...', 1, '181119_091914.jpg', 3, '2019-11-18 09:19:14', '2020-01-07 14:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`, `test_id`, `created_at`, `updated_at`) VALUES
(1, 'Echo BachelorClass - Your introduction to basic echocardiography', 1, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(2, 'This is a simple hero unit, a simple jumbotron-style component for calling extra attention. It uses utility classes for typography and spacing to space content out within the larger container.', 1, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(3, 'It uses utility classes for typography and spacing to space content out within the larger container.', 1, '2020-01-13 13:48:10', '2020-01-13 14:19:51'),
(4, 'Echo BachelorClass will ensure you gain the knowledge to make quick and important clinical decisions on your patients.', 1, '2020-01-13 13:48:10', '2020-01-13 14:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `review_course`
--

CREATE TABLE `review_course` (
  `review_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `title_web` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_web` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_web` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_web` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_web` int(11) DEFAULT NULL COMMENT '1 = on 2 = off',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `title_web`, `footer_web`, `email_web`, `phone_web`, `seo_description`, `seo_keywords`, `status_web`, `created_at`, `updated_at`) VALUES
(1, 'CMC Elearning', 'CMC Elearning', 'info@cmc.com', '(00) 123 456 789', NULL, NULL, 1, '2019-10-28 00:00:00', '2019-10-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

CREATE TABLE `terms_condition` (
  `terms_id` int(11) NOT NULL,
  `name_page` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_page_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `terms_condition`
--

INSERT INTO `terms_condition` (`terms_id`, `name_page`, `content`, `meta_page_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Condition', '<p>Terms &amp; Condition</p>', 'Terms & Condition', 'Terms & Condition', 'Terms & Condition', '2019-11-26 11:17:42', '2019-11-26 11:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `social_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(11) DEFAULT NULL COMMENT '1 = ชาย 2 = หญิง',
  `birthday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_card` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `occupation` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL COMMENT '1 = active 0 = inactive',
  `user_type` int(11) DEFAULT NULL COMMENT '1 = admin 2 = user 3 = teacher',
  `user_from` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'register,facebook,google ',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `social_id`, `first_name`, `last_name`, `email`, `password`, `sex`, `birthday`, `address`, `phone_number`, `id_card`, `occupation`, `company`, `image`, `user_status`, `user_type`, `user_from`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'IVB', 'admin@cmc.com', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', 1, '11/06/2019', '13123213', '1111111111', '1111111111111', NULL, 'rewrewr', '061119_133904.jpg', 1, 1, NULL, '2019-11-06 11:21:00', '2019-11-06 13:39:04'),
(2, NULL, 'อ. abc', 'defg', 'topza1412@gmail.com', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', 1, '11/06/2019', NULL, '1234567890', '1111111111111', NULL, NULL, '061119_163630.jpg', 1, 3, NULL, '2019-11-06 16:36:31', '2019-11-06 16:36:31'),
(3, NULL, 'Shariff', 'Benchawong', 'shariffbacom@gmail.com', '0fee5cba64f43f2e8a46caa22031458e74e6c72bb47687b9ae8161ad200b8ebf', 1, '11/19/2019', '386 Soi Ladphrao 94', '0868909090', '0000000000000', NULL, 'Service', NULL, 1, 3, NULL, '2019-11-19 10:14:12', '2019-11-19 10:14:12'),
(4, NULL, 'Karoon', 'Thepvong', 'karoon_t@innovex.co.th', '4241e9856df7f965e348d8cf004ac41474e6c72bb47687b9ae8161ad200b8ebf', 1, '07/13/1990', 'test test', '0935639874', '1570500000000', 'ADMINTs', 'INNOVEX', '191119_112847.png', 1, 1, NULL, '2019-11-19 11:28:47', '2019-11-19 11:28:47'),
(5, NULL, 'Champ', 'Tset', 'thesetup3@gmail.com', '22d7fe8c185003c98f97e5d6ced420c774e6c72bb47687b9ae8161ad200b8ebf', 1, '09/09/1986', '89/81', '0635163891', '1111111111111', NULL, NULL, NULL, 1, 3, NULL, '2019-11-21 10:49:56', '2019-11-21 10:49:56'),
(6, NULL, 'Test01', 'Test LAST', 'karoon_t@innovex.co.th', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', 1, '07/13/1990', NULL, '1234567890', '1570500000000', NULL, NULL, NULL, 1, 2, NULL, '2019-11-25 10:07:27', '2019-11-25 10:07:27'),
(7, NULL, 'Surachate', 'Siripongsakum', 'shariffbacom@gmail.com', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', 1, NULL, '386 Soi Ladphrao 94', '0868909090', '1570500000000', NULL, 'Chulabhorn Cancer Center', '251119_113919.png', 1, 3, NULL, '2019-11-25 11:39:19', '2019-11-25 11:39:19'),
(8, NULL, 'Dr. Park Shin', 'Hye', 'test@test.com', '25d55ad283aa400af464c76d713c07ad74e6c72bb47687b9ae8161ad200b8ebf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 'register', '2019-11-25 13:47:22', '2019-11-25 13:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `user_course_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_score` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_course_status` int(11) NOT NULL COMMENT '0 = wait 1 = pass 2 = false',
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_course_category`
-- (See below for the actual view)
--
CREATE TABLE `v_course_category` (
`category_id` int(11)
,`category_name` varchar(150)
,`counter` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2020-01-14 10:17:46', '2020-01-14 10:17:46');

-- --------------------------------------------------------

--
-- Structure for view `v_course_category`
--
DROP TABLE IF EXISTS `v_course_category`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_course_category`  AS  select `cc`.`category_id` AS `category_id`,`cc`.`category_name` AS `category_name`,count(`c`.`course_cat_id`) AS `counter` from (`course_category` `cc` join `course` `c` on(`cc`.`category_id` = `c`.`course_cat_id`)) group by `c`.`course_cat_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `comment_lesson`
--
ALTER TABLE `comment_lesson`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`home_page_id`);

--
-- Indexes for table `last_watch`
--
ALTER TABLE `last_watch`
  ADD PRIMARY KEY (`last_watch_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `lesson_file`
--
ALTER TABLE `lesson_file`
  ADD PRIMARY KEY (`lesson_file_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `pravacy_policy`
--
ALTER TABLE `pravacy_policy`
  ADD PRIMARY KEY (`pravacy_id`);

--
-- Indexes for table `pre_post_test`
--
ALTER TABLE `pre_post_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `pre_post_test_save`
--
ALTER TABLE `pre_post_test_save`
  ADD PRIMARY KEY (`test_save_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `review_course`
--
ALTER TABLE `review_course`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `terms_condition`
--
ALTER TABLE `terms_condition`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`user_course_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comment_lesson`
--
ALTER TABLE `comment_lesson`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `home_page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `last_watch`
--
ALTER TABLE `last_watch`
  MODIFY `last_watch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lesson_file`
--
ALTER TABLE `lesson_file`
  MODIFY `lesson_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pravacy_policy`
--
ALTER TABLE `pravacy_policy`
  MODIFY `pravacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pre_post_test`
--
ALTER TABLE `pre_post_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pre_post_test_save`
--
ALTER TABLE `pre_post_test_save`
  MODIFY `test_save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review_course`
--
ALTER TABLE `review_course`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_condition`
--
ALTER TABLE `terms_condition`
  MODIFY `terms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `user_course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
