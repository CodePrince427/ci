-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2017 at 05:23 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `seller_id`, `code`, `address`, `city`, `state`, `zipcode`, `price`, `process`, `step_id`, `agent_id`) VALUES
(66, 84, '4C85058', 'Lot 1 Sorrento Circle', 'Andover', 'MA', '01810', '729,900', 'Listing Process', 5, 69),
(67, 85, '6996A50', '2 Clark Road', 'Andover', 'MA', '01810', '329,900', 'Listing Process', 7, 69),
(68, 86, '05C0595', '24 Muirfield', 'Andover', 'MA', '01810', '1,200,000', 'Listing Process', 6, 69),
(69, 87, '0FECFE7', '5 Lee Street', 'Wilmington', 'MA', '01887', '3,000', 'Listing Process', 6, 70),
(70, 88, 'EA5FC66', '42 Martin Ave U:42', 'North Andover', 'MA', '01845', '429,900', 'Listing Process', 6, 69),
(71, 89, '2183C10', '3 Lantern Road', 'Andover', 'MA', '01810', '799,900', 'Listing Process', 6, 73),
(72, 90, '4A11835', '79 Shady Hill Road', 'Newton', 'MA', '02461', '849,900', 'Listing Process', 6, 69),
(73, 91, '7D8C214', '153 Wallace Hill Road', 'Townsend', 'MA', '01469', '1,490,000', 'Listing Process', 6, 75),
(74, 92, '6153F0B', '154 Main Street', 'Andover', 'MA', '01810', '1,588,000', 'Listing Process', 6, 69),
(75, 93, '12D9B05', '43 Pike Street', 'Salisbury', 'MA', '01952', '396,000', 'Listing Process', 6, 81),
(76, 94, '35FB8DB', '650 Osgood Street', 'North Andover', 'MA', '01845', '899,000', 'Listing Process', 6, 5),
(77, 95, '4874F49', '21 Gulliver Avenue', 'Salem', 'NH', '03079', '385,000', 'Listing Process', 6, 75),
(78, 96, '8DF70F8', '20 North Street', 'North Reading', 'MA', '01864', '825,000', 'Listing Process', 6, 69),
(79, 97, 'C99ABC5', '450 Bear Hill Road', 'North Andover', 'MA', '01845', '1,450,000', 'Listing Process', 6, 69);

-- --------------------------------------------------------

--
-- Table structure for table `listing_gallery`
--

CREATE TABLE IF NOT EXISTS `listing_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

-- --------------------------------------------------------

--
-- Table structure for table `listing_pdfs`
--

CREATE TABLE IF NOT EXISTS `listing_pdfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `listing_pdfs`
--

INSERT INTO `listing_pdfs` (`id`, `listing_id`, `pdf`) VALUES
(23, 67, 'a2968aeDeed 2 Clark 4-29-17.pdf'),
(24, 67, 'ba79e37CTG Signed 2 Clark 4-29-17.pdf'),
(25, 67, '3de0a86Deferral Signed 2 Clark 4-29-17.pdf'),
(26, 67, '24d54e6Delayed Signed 2 Clark 4-29-17.pdf'),
(27, 67, '11212a0GIS Map Aerial 2 Clark 4-29-17.pdf'),
(28, 67, '8a6bf77GIS Map Conservation 2 Clark 4-29-17.pdf'),
(29, 67, 'fb633ddERTLA Signed 2 Clark 4-29-17.pdf'),
(30, 67, 'd770046LEAD Signed 2 Clark 4-29-17.pdf'),
(31, 67, 'c180ba7MA State Signed 2 Clark 4-29-17.pdf'),
(32, 67, '3b442a3Non MLS Signed 2 Clark 4-29-17.pdf'),
(33, 67, 'fcd6e47OP Signed 2 Clark 4-29-17.pdf'),
(35, 68, '3a4a02aDUAL Signed 24 Muirfield 5-30-17.pdf'),
(36, 68, 'aad54f5CTG Signed 24 Muirfield 5-30-17.pdf'),
(37, 68, 'b2adc33ERTLA Lease Signed 24 Muirfield 5-30-17.pdf'),
(38, 68, 'ERTLA Sale Signed 24 Muirfield 5-30-17.pdf'),
(42, 68, '60fe82dMA State Signed 24 Muirfield 5-30-17.pdf'),
(46, 68, '18e25c1OP Signed 24 Muirfield 5-30-17.pdf'),
(51, 69, '40717c7CTG Signed 5 Lee 6-2-17.pdf'),
(52, 69, 'd099566Delayed Signed 5 Lee 6-2-17.pdf'),
(53, 69, '2fc1e9cERTLA Signed 5 Lee 6-2-17.pdf'),
(54, 69, '5a88245DUAL Signed 5 Lee 6-2-17.pdf'),
(57, 69, '8350b09OP Signed 5 Lee 6-2-17.pdf'),
(59, 69, 'f4019ddSDP Signed  5 Lee 6-2-17.pdf'),
(60, 69, '3ed54b8Showing Instructions 5 Lee 6-2-17.pdf'),
(61, 69, '02cbcb7Utility Costs (NOTES) 5 Lee 6-2-17.pdf'),
(62, 69, '66718eeSign Details 5 Lee 6-2-17.pdf'),
(63, 69, '5a93f5dUtility Costs TYPED 5 Lee 6-2-17.pdf'),
(66, 70, '2524f79Deed 42 Martin 6-6-17.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `listing_pics`
--

CREATE TABLE IF NOT EXISTS `listing_pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `listing_pics`
--

INSERT INTO `listing_pics` (`id`, `listing_id`, `pic`) VALUES
(32, 66, 'da0a1a5P1040917.JPG'),
(33, 67, '98e2d0dphoto (1).jpeg'),
(34, 68, '42220fe1.jpg'),
(35, 69, '3bea5601.JPG'),
(36, 70, '2064bb61.JPG'),
(37, 71, '419e6cd1.jpg'),
(38, 72, 'b3bf2141 Copy.JPG'),
(41, 75, 'a2859c41.JPG'),
(42, 76, '787dc8d1.jpg'),
(43, 77, '14543aa1.JPG'),
(44, 78, '19f81e51.JPG'),
(45, 79, '28a7213front-1.jpg'),
(46, 74, 'dcdee601.jpg'),
(47, 73, '4fe01dhgwh.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cell`, `email`, `pass`, `pic`, `last_date`, `status`, `sms`) VALUES
(1, 'admin', '978 - 815 - 6500', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '', '2017-06-12', 'admin', ''),
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
(86, 'Cathy Shimberg', '978-886-5055', 'clshimberg@hotmail.com', '0deb1c54814305ca9ad266f53bc82511', '', '2017-05-30', 'seller', 'on'),
(87, 'Jie Weng', '781-460-7406', 'weng-jie2002@hotmail.com', '303ed4c69846ab36c2904d3ba8573050', '', '2017-06-11', 'seller', 'on'),
(88, 'Seema Gupta', '469-877-2244', 'guptefamily@hotmail.com', '3ef815416f775098fe977004015c6193', '', '2017-06-11', 'seller', 'on'),
(89, 'Ana Desouza', '978-809-6048', 'afultz-desouza@andoverhomes.com', 'a0a080f42e6f13b3a2df133f073095dd', '', '2017-06-11', 'seller', 'on'),
(90, 'Terry Denery', '617-960-7876', 'terry.denery@mathworks.com', '50c3d7614917b24303ee6a220679dab3', '', '2017-06-11', 'seller', 'on'),
(91, 'Nick Demis', '978-579-0619', 'npdemis@aol.com', '5ef0b4eba35ab2d6180b0bca7e46b6f9', '', '2017-06-11', 'seller', 'on'),
(92, 'Niles Overly', '614-370-1400', 'nilesoverly@gmail.com', '5c572eca050594c7bc3c36e7e8ab9550', '', '2017-06-11', 'seller', 'on'),
(93, 'John Arthur', '978-417-0691', 'ksa1951@juno.com', 'b7892fb3c2f009c65f686f6355c895b5', '', '2017-06-11', 'seller', 'on'),
(94, 'Stephen Rye', '978-319-5801', 'stephanrye@me.com', '168908dd3227b8358eababa07fcaf091', '', '2017-06-11', 'seller', 'on'),
(95, 'Samuel Pappalardo', '978-479-1590', 'sjpappalardo@comcast.net', 'bbcbff5c1f1ded46c25d28119a85c6c2', '', '2017-06-11', 'seller', 'on'),
(96, 'Wayne Hinckley', '978-387-9074', 'weh@tiac.net', '8bf1211fd4b7b94528899de0a43b9fb3', '', '2017-06-11', 'seller', 'on'),
(97, 'David Cafua', '978-852-9895', 'dcafua@cafuamanagement.com', '4ea06fbc83cdd0a06020c35d50e1e89a', '', '2017-06-11', 'seller', 'on');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
