-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2017 at 03:05 PM
-- Server version: 10.1.22-MariaDB-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `umairtaj_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE IF NOT EXISTS `listings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `process` varchar(255) NOT NULL,
  `step_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `seller_id`, `code`, `address`, `city`, `state`, `zipcode`, `price`, `process`, `step_id`, `agent_id`) VALUES
(66, 84, '4C85058', 'Lot 1 Sorrento Circle, Andover, MA 01810', 'Andover', 'MA', '01810', '729,900', 'Listing Process', 5, 69),
(67, 85, '6996A50', '2 Clark Road, Andover, MA 01810', 'Andover', 'MA', '01810', '329,900', 'Listing Process', 7, 69),
(68, 86, '05C0595', '24 Muirfield, Andover, MA 01810', 'Andover', 'MA', '01810', '1,200,000', 'Listing Process', 5, 69);

-- --------------------------------------------------------

--
-- Table structure for table `listing_gallery`
--

CREATE TABLE IF NOT EXISTS `listing_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `listing_gallery`
--

INSERT INTO `listing_gallery` (`id`, `listing_id`, `pic`) VALUES
(30, 66, '75f7414P1040903.JPG'),
(31, 66, 'a7c464cP1040904.JPG'),
(32, 66, '7b18d19P1040905.JPG'),
(42, 67, 'd8254284.JPG'),
(43, 67, '857e4a05.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `listing_pdfs`
--

CREATE TABLE IF NOT EXISTS `listing_pdfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `listing_pdfs`
--

INSERT INTO `listing_pdfs` (`id`, `listing_id`, `pdf`) VALUES
(1, 1, 'test-file.pdf'),
(3, 3, 'test-file.pdf'),
(4, 62, '6e21fcetest-file.pdf'),
(5, 62, '144de8atest-file.pdf'),
(13, 62, '90cc3bctest-file.pdf'),
(17, 62, '4f2495dtest-file.pdf'),
(20, 64, '4f2495dtest-file.pdf'),
(21, 66, 'testname.pdf'),
(22, 66, 'a0c9ef6DEED Lot 1 Sorrento 1-22-17.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `listing_pics`
--

CREATE TABLE IF NOT EXISTS `listing_pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `listing_pics`
--

INSERT INTO `listing_pics` (`id`, `listing_id`, `pic`) VALUES
(32, 66, 'da0a1a5P1040917.JPG'),
(33, 67, '98e2d0dphoto (1).jpeg'),
(34, 68, '52d281bNEW MLS PIC.png');

-- --------------------------------------------------------

--
-- Table structure for table `listing_steps`
--

CREATE TABLE IF NOT EXISTS `listing_steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `step_no` int(11) NOT NULL,
  `step_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `listing_steps`
--

INSERT INTO `listing_steps` (`id`, `step_no`, `step_name`, `content`, `video`) VALUES
(1, 1, 'The Preparation', '<ol>\r\n</ol>\r\n\r\n<p>During the preparation stage, the listing department will collect all the signed documents from your agent. It is essential for you to sign all the required documents, and returned them to your agent as soon as you can.&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Collecting Signed Documents from your agent</li>\r\n	<li>Scheduling the Sign Installation</li>\r\n	<li>Preparing sign riders</li>\r\n	<li>Sign Installed</li>\r\n	<li>Inventory Tracking</li>\r\n</ul>\r\n', 'https://www.youtube.com/embed/J2gXxxQij_8'),
(2, 2, 'File Creation', '<p>During the File Set Up stage, our Listing Department will collect all the signed documents from your agent. It is essential for you to sign all the required documents, and return&nbsp;them to your agent as soon as you can.&nbsp;</p>\r\n\r\n<p><strong>Here are some of the files that you may see while listing your home:</strong></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center">Agency Disclosure</td>\r\n			<td style="text-align:center">Contingent Status Request Form</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Inclusions Exclusions Form</td>\r\n			<td style="text-align:center">Utility Costs</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Non-MLS Listing Form</td>\r\n			<td style="text-align:center">Delayed Listing Form</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Notice of Dual Agency</td>\r\n			<td style="text-align:center">Credit Faxback Form</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Offer Presentation</td>\r\n			<td style="text-align:center">Statement of Property Condition</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Sellers Disclosure</td>\r\n			<td style="text-align:center">VIF Form</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Deferral of Showings</td>\r\n			<td style="text-align:center">Exclusive Right to Sell Agreement</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n', 'https://www.youtube.com/embed/LidFOnEStOg'),
(3, 3, 'Pre-Listing Checklists', '<p>The Pre-Listing Checklists are essential to list your home with 100% accuracy. Our Listing Department has dozens of checklists with dozens of items on each checklist dedicated to making the listing of your home our&nbsp;top priority.</p>\r\n\r\n<p><strong>Here are just a few of the checklist tasks our Listing Department completes:</strong></p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:550px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center">Take Measurements</td>\r\n			<td style="text-align:center">Take Pictures</td>\r\n			<td style="text-align:center">Install Lock Box</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Make Copies of Keys</td>\r\n			<td style="text-align:center">Return Original Keys</td>\r\n			<td style="text-align:center">Test Key Copies</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Create Offline MLS</td>\r\n			<td style="text-align:center">Create Visual Tour</td>\r\n			<td style="text-align:center">Schedule Sign Installation</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Create Feature Sheet</td>\r\n			<td style="text-align:center">Secure Domain Name</td>\r\n			<td style="text-align:center">Set Picture Appointment</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Enter Listing Info in CRMs</td>\r\n			<td style="text-align:center">Confirm Showing Instructions</td>\r\n			<td style="text-align:center">Assign Key Number</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Forward Domain Name</td>\r\n			<td style="text-align:center">Attach Docs to MLS Listing</td>\r\n			<td style="text-align:center">Confirm Sign Preferences</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Schedule Broker Caravan</td>\r\n			<td style="text-align:center">Create Draft Feature Sheets</td>\r\n			<td style="text-align:center">Make Listing Live</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">Enter HOA/MGT Co Info</td>\r\n			<td style="text-align:center">Download Property Pictures</td>\r\n			<td style="text-align:center">Download GIS Map</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'https://www.youtube.com/embed/dAVSYhzNt1w'),
(4, 4, 'Sign Installation', '<p>During the Sign Installation Step, our sign guy, Louis, will install a sign on your property in the location you chose.&nbsp;</p>\r\n', 'https://www.youtube.com/embed/5yVqW963Qzc'),
(5, 5, 'Feature Sheets', '<p>Our Marketing and Listing Specialists are currently designing your Feature Sheets and Marketing Materials. Upon completion, the feature sheet drafts will be sent to you for your review for accuracy.&nbsp;</p>\r\n', 'https://www.youtube.com/embed/EjXM43CeUKA'),
(6, 6, 'Open Houses', '<p>Congratulations! Your property is live on MLS and is being seen by all the local realtors! It is just a matter of time before your property sells! We are currently scheduling open houses for buyers and their agents to stop by and check out the interior of your property.&nbsp;</p>\r\n\r\n<p><img alt="" src="https://images-na.ssl-images-amazon.com/images/I/71wDZ-6tXZL._AC_UL320_SR276,320_.jpg" style="height:151px; width:130px" /></p>\r\n', 'https://www.youtube.com/embed/AdyzC0TwwVs'),
(7, 7, 'You Received an Offer', '<p>Congratulations! You received an offer on your listing! Should you choose to accept the offer, your file will be transferred over to Pam Garcia at our Closing Department, who will handle the rest of your transaction.&nbsp;</p>\r\n\r\n<p><img alt="" src="https://rdcnewsadvice.wpengine.com/wp-content/uploads/2013/12/real_estate_purchase_offer.jpg" style="height:260px; width:400px" /></p>\r\n', 'https://www.youtube.com/embed/TIK4CiEMdIA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `last_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `sms` varchar(255) DEFAULT 'off',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cell`, `email`, `pass`, `pic`, `last_date`, `status`, `sms`) VALUES
(1, 'admin', '978 - 815 - 6500', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '', '2017-06-07', 'admin', ''),
(2, 'manager', '978 - 815 - 6400', 'manager@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', '', '2017-05-21', 'manager', ''),
(4, 'Johnson', '978 - 815 - 6200', 'johnson@gmail.com', '79ab945544e5bc017a2317b6146ed3aa', 'user.jpg', '2017-05-21', 'seller', 'on'),
(5, 'Eric Frahlich', '(978)479-7649', 'EFrahlich@AndoverHomes.com', '6ed61d4b80bb0f81937b32418e98adca', 'user1.jpg', '2017-05-21', 'agent', 'on'),
(65, 'James', '384762983', 'james@gmail.com', '1ff8a7b5dc7a7d1f0ed65aaa29c04b1e', '', '2017-05-25', 'seller', 'on'),
(66, 'Mike Watney, Jane Watney', '+381 26 3124', 'mike@gmail.com', '73278a4a86960eeb576a8fd4c9ec6997', '', '2017-05-25', 'seller', 'on'),
(67, 'Guten Tag', '+3851239235891', 'guten@tag.com', '67d16d00201083a2b118dd5128dd6f59', '', '2017-05-25', 'seller', NULL),
(68, 'full name', '194712', 'email@gmail.com', 'e00da03b685a0dd18fb6a08af0923de0', '', '2017-05-27', 'seller', NULL),
(69, 'Lillian Montalto', '(978)815-6300', 'Lillian@AndoverHomes.com', '0b8aff0438617c055eb55f0ba5d226fa', '3631973LM Current Photo.jpg', '2017-05-30', 'agent', 'on'),
(70, 'Wayne Altavilla', '(978)375-4465', 'WAltavilla@AndoverHomes.com', '82161242827b703e6acf9c726942a1e4', '9eb4f40New Pic Wayne.jpeg', '2017-05-30', 'agent', 'on'),
(71, 'Bob Bohlen', '(978)809-4462', 'ccim@AndoverHomes.com', '2a38a4a9316c49e5a833517c45d31070', '30b601fBob-2012-New1.jpg', '2017-05-30', 'agent', 'on'),
(72, 'Cheryl Eggerts', '(978)905-0979', 'CEggerts@AndoverHomes.com', 'b337e84de8752b27eda3a12363109e80', '13115c8Cheryl New.JPG', '2017-05-30', 'agent', 'on'),
(73, 'Ana Fultz-Desouza', '(978)809-6048', 'Ana@AndoverHomes.com', '8d34201a5b85900908db6cae92723617', 'c0a99efAna Head shot.jpg', '2017-05-30', 'agent', 'on'),
(74, 'Matt Hurchik', '(978)886-8632', 'MHurchik@AndoverHomes.com', '303ed4c69846ab36c2904d3ba8573050', '8b2dd04matt biz card pix.jpg', '2017-05-30', 'agent', 'on'),
(75, 'Todd Koss', '(978)873-3072', 'TKoss@AndoverHomes.com', '90794e3b050f815354e3e29e977a88ab', 'a694ce2New.JPG', '2017-05-30', 'agent', 'on'),
(76, 'Mindaugas Maciulis', '(978)944-8881', 'MMaciulis@AndoverHomes.com', '6cdd60ea0045eb7a6ec44c54d29ed402', 'ab6ad881x1 FS Min pix.jpg', '2017-05-30', 'agent', 'on'),
(77, 'Aldo Mansi', '(617)449-8990', 'AMansi@AndoverHomes.com', 'cfecdb276f634854f3ef915e2e980c31', '1e0ec53DSCN9316.JPG', '2017-05-30', 'agent', 'on'),
(78, 'Taylor Martel', '(978)880-1884', 'TMartel@AndoverHomes.com', '2bb232c0b13c774965ef8558f0fbd615', '023f463Taylor Business Card.JPG', '2017-05-30', 'agent', 'on'),
(79, 'Kerrie Myers', '(978)223-7343', 'KMyers@AndoverHomes.com', '437d7d1d97917cd627a34a6a0fb41136', '2a16177Kerries new business photo 11-20-15.jpg', '2017-05-30', 'agent', 'on'),
(80, 'Tyler Richards', '(978)973-3433', 'TRichards@AndoverHomes.com', '41ae36ecb9b3eee609d05b90c14222fb', '6371a56TYLER 9-18-14.jpg', '2017-05-30', 'agent', 'on'),
(81, 'Charles Santiago', '(978)337-3421', 'CSantiago@AndoverHomes.com', 'c6e19e830859f2cb9f7c8f8cacb8d2a6', '6ad810fBio 2 resize 12-28-15.jpg', '2017-05-30', 'agent', 'on'),
(82, 'Zhuoming Sun', '(978)689-5416', 'ZSun@AndoverHomes.com', '49182f81e6a13cf5eaa496d51fea6406', '5fedffdBUSINESS CARD PIC.jpg', '2017-05-30', 'agent', 'on'),
(83, 'Mei Zhou', '(978)413-6688', 'MZhou@AndoverHomes.com', 'a5cdd4aa0048b187f7182f1b9ce7a6a7', '282eaa6MeiZhou_w1.jpg', '2017-05-30', 'agent', 'on'),
(84, 'George Hughes', '(978)886-8404', 'georgehughes70@yahoo.com', '3295c76acbf4caaed33c36b1b5fc2cb1', '', '2017-05-30', 'seller', NULL),
(85, 'Ho Sung Byun', '(914)413-3050', 'hosung.byun@gmail.com', 'efe937780e95574250dabe07151bdc23', '', '2017-05-30', 'seller', NULL),
(86, 'Cathy', '(978)123-4567', 'clshimberg@hotmail.com', '0deb1c54814305ca9ad266f53bc82511', '', '2017-05-30', 'seller', 'on');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
