-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2015 at 11:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `charteredauction`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `img_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(22) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `view_status` tinyint(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `permalink` varchar(525) NOT NULL,
  `description` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `sort_order` tinyint(2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `view_status` varchar(225) NOT NULL,
  `top` tinyint(2) NOT NULL,
  `column` tinyint(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `permalink`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `image`, `sort_order`, `status`, `view_status`, `top`, `column`, `created_at`, `updated_at`) VALUES
(1, 0, 'Agriculture & Supplies', '', '', '', '', '', '', 0, 0, 'visible', 0, 0, '2015-08-24 00:36:45', '2015-08-24 00:36:45'),
(2, 0, 'Real Estate', '', '', '', '', '', '', 0, 0, 'visible', 0, 0, '2015-08-24 00:38:31', '2015-08-24 00:38:31'),
(3, 0, 'Construction Equipment ', '', '', '', '', '', '', 0, 0, 'visible', 0, 0, '2015-08-24 00:38:52', '2015-08-24 00:38:52'),
(4, 0, 'Furniture', '', '', '', '', '', '', 0, 0, 'visible', 0, 0, '2015-08-24 00:39:13', '2015-08-24 00:39:13'),
(5, 0, 'Industrial Machinery', '', '', '', '', '', '', 0, 0, 'visible', 0, 0, '2015-08-24 00:39:43', '2015-08-24 00:39:43'),
(6, 0, 'Housing ', '', '', '', '', '', '', 0, 0, 'visible', 0, 0, '2015-08-24 00:40:25', '2015-08-24 00:40:25'),
(7, 0, 'Vehicles', '', '', '', '', '', '', 0, 0, 'visible', 0, 0, '2015-08-24 00:40:43', '2015-08-24 00:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories_description`
--

CREATE TABLE IF NOT EXISTS `categories_description` (
  `category_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE IF NOT EXISTS `categories_products` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_products`
--

INSERT INTO `categories_products` (`category_id`, `product_id`) VALUES
(5, 3),
(2, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(225) NOT NULL,
  `comment_author_email` varchar(225) NOT NULL,
  `comment_author_url` varchar(225) NOT NULL,
  `comment_author_ip` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_approved` tinyint(1) NOT NULL,
  `comment_parent_id` int(11) NOT NULL,
  `comment_type` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `comment_subject` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `address_format` text COLLATE utf8_bin NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `company` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `apartment` varchar(225) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(225) NOT NULL,
  `country` varchar(200) NOT NULL,
  `shipping_country` varchar(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `remember_token` text NOT NULL,
  `shipping_firstname` varchar(50) NOT NULL,
  `shipping_lastname` varchar(50) NOT NULL,
  `shipping_company` varchar(225) NOT NULL,
  `shipping_phone` varchar(25) NOT NULL,
  `shipping_address_1` text NOT NULL,
  `shipping_address_2` text NOT NULL,
  `shiping_apartment` varchar(225) NOT NULL,
  `shipping_city` varchar(225) NOT NULL,
  `shipping_state` varchar(225) NOT NULL,
  `shipping_lga` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `image` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `view_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`phone`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image_manager_files`
--

CREATE TABLE IF NOT EXISTS `image_manager_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `originalName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE IF NOT EXISTS `lgas` (
  `LGA` varchar(28) DEFAULT NULL,
  `population` varchar(9) DEFAULT NULL,
  `zone_id` varchar(8) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `uodated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menupos`
--

CREATE TABLE IF NOT EXISTS `menupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_title` varchar(50) NOT NULL,
  `menu_jsondata` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `position` varchar(50) NOT NULL,
  `menu_type` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL,
  `link` varchar(225) NOT NULL,
  `has_child` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` tinyint(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mycarts`
--

CREATE TABLE IF NOT EXISTS `mycarts` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `sort_order` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `options_values`
--

CREATE TABLE IF NOT EXISTS `options_values` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `option_id` tinyint(11) NOT NULL,
  `image` text NOT NULL,
  `title` varchar(225) NOT NULL,
  `optvalue` varchar(225) NOT NULL,
  `sort_order` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `company` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `apartment` varchar(225) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_firstname` varchar(30) NOT NULL,
  `payment_lastname` varchar(30) NOT NULL,
  `payment_company` varchar(225) NOT NULL,
  `payment_tax_id` int(30) NOT NULL,
  `payment_address_1` varchar(225) NOT NULL,
  `payment_address_2` varchar(225) NOT NULL,
  `payment_city` varchar(225) NOT NULL,
  `payment_postcode` varchar(10) NOT NULL,
  `payment_country` varchar(225) NOT NULL,
  `payment_country_id` varchar(11) NOT NULL,
  `payment_method` varchar(225) NOT NULL,
  `payment_code` varchar(225) NOT NULL,
  `shipping_firstname` varchar(50) NOT NULL,
  `shipping_lastname` varchar(50) NOT NULL,
  `shipping_company` varchar(225) NOT NULL,
  `shipping_address_1` varchar(225) NOT NULL,
  `shipping_address_2` varchar(225) NOT NULL,
  `shipping_city` varchar(225) NOT NULL,
  `shipping_postcode` varchar(10) NOT NULL,
  `shipping_country` varchar(225) NOT NULL,
  `shipping_method` varchar(225) NOT NULL,
  `shipping_code` varchar(225) NOT NULL,
  `notes` text NOT NULL,
  `discounts` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_status_id` int(15) NOT NULL,
  `commission` decimal(10,2) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `user_agent` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_no` (`invoice_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_options`
--

CREATE TABLE IF NOT EXISTS `orders_options` (
  `order_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(25) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_option_id` int(25) NOT NULL,
  `product_option_value_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `value` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`order_option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `orders_products_id` int(25) NOT NULL AUTO_INCREMENT,
  `product_id` int(25) NOT NULL,
  `order_id` int(25) DEFAULT NULL,
  `product_name` varchar(225) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `reward` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`orders_products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `permalink` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `p_content` text NOT NULL,
  `has_parent` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `target` varchar(50) NOT NULL,
  `status` enum('published','unpublished','drafted','archived') NOT NULL DEFAULT 'published',
  `featured` tinyint(1) NOT NULL,
  `audio` varchar(325) NOT NULL,
  `video` varchar(325) NOT NULL,
  `document` varchar(325) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_keyword` varchar(225) NOT NULL,
  `meta_description` varchar(225) NOT NULL,
  `type` enum('page','post','category','custom menu','document','slideshow','document category','page block') NOT NULL DEFAULT 'post',
  `post_meta` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `venue` text NOT NULL,
  `created_by` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `view_status` enum('visible','hidden') NOT NULL DEFAULT 'visible',
  `sortorder` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`,`permalink`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(225) NOT NULL,
  `image` varchar(500) NOT NULL,
  `isdn` varchar(50) NOT NULL,
  `suk` varchar(50) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `quantity` int(5) NOT NULL,
  `minimum` tinyint(5) NOT NULL,
  `model` varchar(225) NOT NULL,
  `subtract` tinyint(1) NOT NULL,
  `sort_order` int(5) NOT NULL,
  `tag` text NOT NULL,
  `status` tinyint(3) NOT NULL,
  `end_date` date NOT NULL,
  `end_time` varchar(25) NOT NULL,
  `inc_value` decimal(25,2) NOT NULL,
  `open_price` decimal(25,2) NOT NULL,
  `lowest_price` decimal(25,2) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_keyword` varchar(225) NOT NULL,
  `meta_description` text NOT NULL,
  `view_status` varchar(225) NOT NULL,
  `date_available` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `brand_id`, `brand_name`, `image`, `isdn`, `suk`, `price`, `quantity`, `minimum`, `model`, `subtract`, `sort_order`, `tag`, `status`, `end_date`, `end_time`, `inc_value`, `open_price`, `lowest_price`, `meta_title`, `meta_keyword`, `meta_description`, `view_status`, `date_available`, `created_at`, `updated_at`) VALUES
(2, 'Government Mini-Bus', '<p>A mini-bus formerly used to transport senators and Senate staff around Parliament Hill is among the vehicles offered for sale on the federal government&#39;s surplus and seized goods auction site. The dent came from running into a security bollard, not from contact with any particular senator. (GCsurplus.ca</p>\r\n', 0, '', 'bus2_1359330937.jpg', '', '', '5000000.00', 5, 0, '', 0, 0, 'Special', 0, '2015-09-24', '1:45 AM', '50000.00', '4500000.00', '4500000.00', '', '', '', 'visible', '0000-00-00 00:00:00', '2015-08-24 00:50:20', '2015-08-24 01:20:35'),
(3, 'Naval Landing Craft', '<p>Government Liquidation is the exclusive sales channel for Defense Department surplus, enabling buyers to bid on and purchase unique military items, such as these landing craft. &nbsp;Each year, the company auctions millions &nbsp;of surplus military items on behalf of the Department of Defense, supporting government zero-waste initiatives as well as generating revenue for the U.S. Treasury: over 240 million surplus items and two million pounds of scrap material has been sold on the Government Liquidation website, generating over half a billion dollars back to the Treasury.</p>\r\n', 0, '', 'naval_landing_craft_1117277168.jpg', '', '', '99999999.99', 0, 0, '', 0, 0, 'Special', 0, '2015-09-18', '2:00 AM', '10000000.00', '99999999.99', '80000000.00', '', '', '', 'visible', '0000-00-00 00:00:00', '2015-08-24 01:02:54', '2015-08-24 01:02:54'),
(4, 'SSA MetroWest Facility', '<p>The Nigerian General Services Administration (GSA) is pleased to announce the sale of the former SSA MetroWest Facility. &nbsp;Located on the northwestern edge of the Ikoyi central business district (CBD) at 300 N.Greene Street, occupying approximately 11 acres, this complex offers an opportunity to revive an important link between west Baltimore and downtown. &nbsp;The large multi-parcel tract lends itself to endless redevelopment possibilities as a new economic anchor for the west quadrant of town.&nbsp;</p>\r\n\r\n<p>The property is situated in the Westside neighborhood of Baltimore, adjacent to historic residential neighborhoods of Mount Vernon and Seton Hill; University Center, the academic,research, and institution center of the University of Maryland (UMB),University of Maryland Medical System (UMMS), University of Maryland BioParkand VA Hospital; and the Central Business District.</p>\r\n\r\n<p>Constructed in 1980 for the purposes of housing SSA&#39;s Teleservices and Disability and Earnings and Wages Divisions, Metro West is configured as two separate structures - the North and South Buildings - linked by a two-story connecting wing that spans across West Mulberry Street. The facility&#39;s main entrance is located on Greene Street, and features a four-story atrium lobby into the South Building. &nbsp;Secondary entrances are located on the south side of each building.&nbsp;</p>\r\n\r\n<p>The South Building has five office floors over two levels of basement garage space. &nbsp;A tunnel under Mulberry Street connects the garage with the North Building. &nbsp;The North Building has four office levels over a two-level basement containing the loading docks and mailing facilities. There is also an eight-story tower over the main office levels, plus a two-level mechanical penthouse.&nbsp;</p>\r\n\r\n<p>The Metro West facility features 410 garage parking spaces and surface parking for 108 cars. &nbsp;The facility sits on 10.77 acres of land, which is zoned as B-5-1 for Central Commercial District.</p>\r\n\r\n<p>The overall construction of the building is most similar to Class B office space in the local market. The building takes up a two block area and is bounded by W. Franklin Street to the north, W. Saratoga Street to the south, N. Greene Street to the east and Martin Luther King Jr. Boulevard to the west.</p>\r\n\r\n<p>Please see Addendum 1 for the site specific art covenant.</p>\r\n', 0, '', 'metro_west_facility_1113834625.jpg', '', '', '99999999.99', 0, 0, '', 0, 0, 'Special', 0, '2015-09-30', '2:15 AM', '99999999.99', '99999999.99', '99999999.99', '', '', '', 'visible', '0000-00-00 00:00:00', '2015-08-24 01:13:38', '2015-08-24 01:13:38'),
(5, 'National Weather Forecast Office', '<p>Commercial office space for sale! &nbsp;Located near Sault Ste. Marie Municipal Airport.<br />\r\nSale opens August&nbsp;22th! &nbsp;Invitation for Bids (contract of sale) coming soon.</p>\r\n', 0, '', 'national_weather_forecast_office_2495843.jpg', '', '', '1000000.00', 0, 0, '', 0, 0, 'Special', 0, '2015-09-18', '2:30 AM', '50000.00', '1000000.00', '800000.00', '', '', '', 'visible', '0000-00-00 00:00:00', '2015-08-24 01:29:39', '2015-08-24 01:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `products_description`
--

CREATE TABLE IF NOT EXISTS `products_description` (
  `product_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `tag` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_options`
--

CREATE TABLE IF NOT EXISTS `products_options` (
  `product_option_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `option_value_id` int(11) NOT NULL,
  `option_value` varchar(225) NOT NULL,
  `option_type` varchar(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  `subtract` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `points_prefix` varchar(5) NOT NULL,
  `price_prefix` varchar(5) NOT NULL,
  `weight_prefix` varchar(5) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `points` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `option_id` int(11) NOT NULL,
  PRIMARY KEY (`product_option_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE IF NOT EXISTS `shippings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_code` varchar(50) NOT NULL,
  `shipping_title` varchar(225) NOT NULL,
  `shipping_description` text NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signatories`
--

CREATE TABLE IF NOT EXISTS `signatories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `signatory_firstname` varchar(100) NOT NULL,
  `signatory_lastname` varchar(100) NOT NULL,
  `signatory_othernames` varchar(225) NOT NULL,
  `signatory_gender` varchar(25) NOT NULL,
  `signatory_date_of_birth` date NOT NULL,
  `signatory_place_of_birth` varchar(225) NOT NULL,
  `signatory_residence_address` text NOT NULL,
  `signatory_country_of_residence` varchar(225) NOT NULL,
  `signatory_email` varchar(225) NOT NULL,
  `signatory_phone` varchar(225) NOT NULL,
  `signatory_identification_type` varchar(50) NOT NULL,
  `signatory_identification_number` varchar(25) NOT NULL,
  `signatory_issuance_date` date NOT NULL,
  `signatory_expiry_date` date NOT NULL,
  `signatory_place_of_issuance` varchar(100) NOT NULL,
  `signatory_designation` varchar(100) NOT NULL,
  `signatory_authorization_class` varchar(10) NOT NULL,
  `signatory_identity` text NOT NULL,
  `signatory_photo` text NOT NULL,
  `signatory_signature` text NOT NULL,
  `signatory_type` enum('corporate','joint') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sigtemps`
--

CREATE TABLE IF NOT EXISTS `sigtemps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `signatory_firstname` varchar(100) NOT NULL,
  `signatory_lastname` varchar(100) NOT NULL,
  `signatory_othernames` varchar(225) NOT NULL,
  `signatory_gender` varchar(25) NOT NULL,
  `signatory_date_of_birth` date NOT NULL,
  `signatory_place_of_birth` varchar(225) NOT NULL,
  `signatory_residence_address` text NOT NULL,
  `signatory_country_of_residence` varchar(225) NOT NULL,
  `signatory_email` varchar(225) NOT NULL,
  `signatory_phone` varchar(225) NOT NULL,
  `signatory_identification_type` varchar(50) NOT NULL,
  `signatory_identification_number` varchar(25) NOT NULL,
  `signatory_issuance_date` date NOT NULL,
  `signatory_expiry_date` date NOT NULL,
  `signatory_place_of_issuance` varchar(100) NOT NULL,
  `signatory_designation` varchar(100) NOT NULL,
  `signatory_authorization_class` varchar(10) NOT NULL,
  `signatory_identity` text NOT NULL,
  `signatory_photo` text NOT NULL,
  `signatory_signature` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE IF NOT EXISTS `slideshows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(325) NOT NULL,
  `img_name` varchar(225) NOT NULL,
  `permalink` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(225) NOT NULL,
  `image_type` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `code` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
