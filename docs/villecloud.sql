-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2015 at 04:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `villecloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` bigint(20) NOT NULL,
  `admin_fullname` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `admin_register_date` datetime NOT NULL,
  `admin_last_login_date` datetime NOT NULL,
  `admin_last_login_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
`asset_id` bigint(20) NOT NULL,
  `asset_name` varchar(240) NOT NULL,
  `asset_value` double NOT NULL,
  `asset_desc` text NOT NULL,
  `asset_label` varchar(100) NOT NULL,
  `asset_category_id` bigint(20) NOT NULL,
  `asset_purchase_date` datetime NOT NULL,
  `asset_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE IF NOT EXISTS `asset_categories` (
`asset_category_id` bigint(20) NOT NULL,
  `asset_category_name` varchar(240) NOT NULL,
  `asset_category_desc` text NOT NULL,
  `asset_category_dep_rate` double NOT NULL,
  `asset_category_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
`bank_id` bigint(20) NOT NULL,
  `bank_account_name` varchar(240) NOT NULL,
  `bank_account_status` tinyint(4) NOT NULL COMMENT '0 = closed, 1 = active, 2 = dormant',
  `bank_account_currency_code` varchar(100) NOT NULL,
  `bank_name` varchar(240) NOT NULL,
  `bank_account_no` varchar(100) NOT NULL,
  `bank_account_notes` longtext NOT NULL,
  `bank_balance` double NOT NULL,
  `bank_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_transactions`
--

CREATE TABLE IF NOT EXISTS `bank_transactions` (
`bank_transaction_id` bigint(20) NOT NULL,
  `bank_transaction_details` text NOT NULL,
  `bank_transaction_date` datetime NOT NULL,
  `bank_transaction_value` bigint(20) NOT NULL,
  `bank_transaction_source` varchar(100) NOT NULL DEFAULT 'sale' COMMENT 'sale, income etc',
  `bank_transaction_source_id` bigint(20) NOT NULL,
  `bank_transaction_commulative_balance` double NOT NULL,
  `bank_transaction_target_bank_id` bigint(20) NOT NULL,
  `bank_transaction_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash_transactions`
--

CREATE TABLE IF NOT EXISTS `cash_transactions` (
`cash_transaction_id` bigint(20) NOT NULL,
  `cash_transaction_details` text NOT NULL,
  `cash_transaction_date` datetime NOT NULL,
  `cash_transaction_value` double NOT NULL,
  `cash_transaction_commulative_balance` double NOT NULL,
  `cash_transaction_source` varchar(100) NOT NULL DEFAULT 'sale' COMMENT 'sale, income etc',
  `cash_transaction_source_id` bigint(20) NOT NULL COMMENT 'for sale, it will be sale_id etc',
  `cash_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`client_id` bigint(20) NOT NULL,
  `client_name` varchar(240) NOT NULL,
  `client_phone` varchar(240) NOT NULL,
  `client_email` varchar(240) NOT NULL,
  `client_money_spent` double NOT NULL,
  `client_register_date` datetime NOT NULL,
  `client_observations` text NOT NULL,
  `client_newsletter_subs` tinyint(1) NOT NULL DEFAULT '0',
  `client_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`company_id` bigint(20) NOT NULL,
  `company_name` varchar(240) NOT NULL,
  `company_reg_no` varchar(240) NOT NULL,
  `company_country` varchar(100) NOT NULL,
  `company_city` varchar(100) NOT NULL,
  `company_state` varchar(100) NOT NULL,
  `company_address` text NOT NULL,
  `company_phone` varchar(100) NOT NULL,
  `company_website` varchar(240) NOT NULL,
  `company_logo_uri` text NOT NULL,
  `company_email` varchar(240) NOT NULL,
  `company_ntn` varchar(240) NOT NULL,
  `company_vat` varchar(240) NOT NULL,
  `company_notes` text NOT NULL,
  `company_contacts` text NOT NULL COMMENT 'Contacts array containing the name, email, position etc',
  `company_currency_code` varchar(100) NOT NULL,
  `company_users_limit` int(11) NOT NULL,
  `company_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_reg_no`, `company_country`, `company_city`, `company_state`, `company_address`, `company_phone`, `company_website`, `company_logo_uri`, `company_email`, `company_ntn`, `company_vat`, `company_notes`, `company_contacts`, `company_currency_code`, `company_users_limit`, `company_status`, `created_at`, `updated_at`) VALUES
(1, 'PakCoders', 'sdfsdf4234234', 'Pakistan', 'Rawalpindi', 'Punjab', 'Rawalpindi City', '00923361518881', 'http://wazeem.com', '14191037375495cdf9e2b4a43.jpg', 'wasxxm@gmail.com', '32kjk', '676jhjh', '', 'a:2:{i:0;a:3:{s:4:"name";s:5:"Lucas";s:5:"email";s:15:"lucas@gmail.com";s:5:"title";s:7:"Manager";}i:1;a:3:{s:4:"name";s:6:"Waseem";s:5:"email";s:16:"wasxxm@gmail.com";s:5:"title";s:3:"CEO";}}', 'USD', 10, 1, '0000-00-00 00:00:00', '2014-12-25 15:33:03'),
(2, 'csacsa', 'sasadsad', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'dawd', 'ddf', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'dfgfdg', 'fdgfdg', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'sdsdfsfdsfdsf', 'dsfds', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'sdf', 'sdf', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'dsf', 'dsf', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'dsfdsfdsf', 'dsfdsfsdf', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'asfasf', 'asfasfasf', 'Barbados', '', '', '', '', '', '14182458325488b6c876e1535.jpg', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'asfsaasf', 'sasadasdasdas', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'sadsadasdas', 'asdasdsad', 'Argentina', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'scsac', 'ascascascasc', 'Bahrain', 'ascsac', 'ascasc', 'asc sad sa assa', '2312124214', 'http://wazeem.com', '', 'asc@dad.com', 'sad', 'sad', '', '', 'PKR', 12, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'sdasfasfsf', 'safsf', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'dwdqw', 'wqdq', 'Belgium', '', '', '', '', '', '', '', '', '', '', 'a:2:{i:0;a:3:{s:4:"name";s:5:"Lucas";s:5:"email";s:19:"   lucas@gmail.com\r";s:5:"title";s:10:"   Manager";}i:1;a:3:{s:4:"name";s:6:"Waseem";s:5:"email";s:20:"   wasxxm@gmail.com\r";s:5:"title";s:6:"   CEO";}}', 'USD', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'cscsacas', 'ascasc', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '2014-12-11 12:07:32', '2014-12-11 12:07:32'),
(16, 'efwef', 'ewfwefwef', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '2014-12-11 13:11:02', '2014-12-11 13:11:02'),
(17, 'wdwdwd', 'dssdf', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '2014-12-11 13:11:36', '2014-12-11 13:11:36'),
(18, 'sadad', 'asdad', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '2014-12-11 15:24:22', '2014-12-11 15:24:22'),
(19, 'Pakistan', 'waseem', 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', 'USD', 10, 1, '2014-12-11 15:27:51', '2014-12-11 15:27:51'),
(20, 'PakCodersssss', 'dvcds3vdscds', 'Afghanistan', '', '', '', '', '', '14191040695495cf459974e923.jpg', '', '', '', '', '', 'USD', 10, 1, '2014-12-20 19:34:29', '2014-12-20 19:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `capital` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_sub_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_3166_2` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `iso_3166_3` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `region_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sub_region_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `eea` tinyint(1) NOT NULL DEFAULT '0',
  `calling_code` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `capital`, `citizenship`, `country_code`, `currency`, `currency_code`, `currency_sub_unit`, `full_name`, `iso_3166_2`, `iso_3166_3`, `name`, `region_code`, `sub_region_code`, `eea`, `calling_code`) VALUES
(4, 'Kabul', 'Afghan', '004', 'afghani', 'AFN', 'pul', 'Islamic Republic of Afghanistan', 'AF', 'AFG', 'Afghanistan', '142', '034', 0, '93'),
(8, 'Tirana', 'Albanian', '008', 'lek', 'ALL', '(qindar (pl. qindarka))', 'Republic of Albania', 'AL', 'ALB', 'Albania', '150', '039', 0, '355'),
(10, 'Antartica', 'of Antartica', '010', '', '', '', 'Antarctica', 'AQ', 'ATA', 'Antarctica', '', '', 0, '672'),
(12, 'Algiers', 'Algerian', '012', 'Algerian dinar', 'DZD', 'centime', 'People’s Democratic Republic of Algeria', 'DZ', 'DZA', 'Algeria', '002', '015', 0, '213'),
(16, 'Pago Pago', 'American Samoan', '016', 'US dollar', 'USD', 'cent', 'Territory of American', 'AS', 'ASM', 'American Samoa', '009', '061', 0, '1'),
(20, 'Andorra la Vella', 'Andorran', '020', 'euro', 'EUR', 'cent', 'Principality of Andorra', 'AD', 'AND', 'Andorra', '150', '039', 0, '376'),
(24, 'Luanda', 'Angolan', '024', 'kwanza', 'AOA', 'cêntimo', 'Republic of Angola', 'AO', 'AGO', 'Angola', '002', '017', 0, '244'),
(28, 'St John’s', 'of Antigua and Barbuda', '028', 'East Caribbean dollar', 'XCD', 'cent', 'Antigua and Barbuda', 'AG', 'ATG', 'Antigua and Barbuda', '019', '029', 0, '1'),
(31, 'Baku', 'Azerbaijani', '031', 'Azerbaijani manat', 'AZN', 'kepik (inv.)', 'Republic of Azerbaijan', 'AZ', 'AZE', 'Azerbaijan', '142', '145', 0, '994'),
(32, 'Buenos Aires', 'Argentinian', '032', 'Argentine peso', 'ARS', 'centavo', 'Argentine Republic', 'AR', 'ARG', 'Argentina', '019', '005', 0, '54'),
(36, 'Canberra', 'Australian', '036', 'Australian dollar', 'AUD', 'cent', 'Commonwealth of Australia', 'AU', 'AUS', 'Australia', '009', '053', 0, '61'),
(40, 'Vienna', 'Austrian', '040', 'euro', 'EUR', 'cent', 'Republic of Austria', 'AT', 'AUT', 'Austria', '150', '155', 1, '43'),
(44, 'Nassau', 'Bahamian', '044', 'Bahamian dollar', 'BSD', 'cent', 'Commonwealth of the Bahamas', 'BS', 'BHS', 'Bahamas', '019', '029', 0, '1'),
(48, 'Manama', 'Bahraini', '048', 'Bahraini dinar', 'BHD', 'fils (inv.)', 'Kingdom of Bahrain', 'BH', 'BHR', 'Bahrain', '142', '145', 0, '973'),
(50, 'Dhaka', 'Bangladeshi', '050', 'taka (inv.)', 'BDT', 'poisha (inv.)', 'People’s Republic of Bangladesh', 'BD', 'BGD', 'Bangladesh', '142', '034', 0, '880'),
(51, 'Yerevan', 'Armenian', '051', 'dram (inv.)', 'AMD', 'luma', 'Republic of Armenia', 'AM', 'ARM', 'Armenia', '142', '145', 0, '374'),
(52, 'Bridgetown', 'Barbadian', '052', 'Barbados dollar', 'BBD', 'cent', 'Barbados', 'BB', 'BRB', 'Barbados', '019', '029', 0, '1'),
(56, 'Brussels', 'Belgian', '056', 'euro', 'EUR', 'cent', 'Kingdom of Belgium', 'BE', 'BEL', 'Belgium', '150', '155', 1, '32'),
(60, 'Hamilton', 'Bermudian', '060', 'Bermuda dollar', 'BMD', 'cent', 'Bermuda', 'BM', 'BMU', 'Bermuda', '019', '021', 0, '1'),
(64, 'Thimphu', 'Bhutanese', '064', 'ngultrum (inv.)', 'BTN', 'chhetrum (inv.)', 'Kingdom of Bhutan', 'BT', 'BTN', 'Bhutan', '142', '034', 0, '975'),
(68, 'Sucre (BO1)', 'Bolivian', '068', 'boliviano', 'BOB', 'centavo', 'Plurinational State of Bolivia', 'BO', 'BOL', 'Bolivia, Plurinational State of', '019', '005', 0, '591'),
(70, 'Sarajevo', 'of Bosnia and Herzegovina', '070', 'convertible mark', 'BAM', 'fening', 'Bosnia and Herzegovina', 'BA', 'BIH', 'Bosnia and Herzegovina', '150', '039', 0, '387'),
(72, 'Gaborone', 'Botswanan', '072', 'pula (inv.)', 'BWP', 'thebe (inv.)', 'Republic of Botswana', 'BW', 'BWA', 'Botswana', '002', '018', 0, '267'),
(74, 'Bouvet island', 'of Bouvet island', '074', '', '', '', 'Bouvet Island', 'BV', 'BVT', 'Bouvet Island', '', '', 0, '47'),
(76, 'Brasilia', 'Brazilian', '076', 'real (pl. reais)', 'BRL', 'centavo', 'Federative Republic of Brazil', 'BR', 'BRA', 'Brazil', '019', '005', 0, '55'),
(84, 'Belmopan', 'Belizean', '084', 'Belize dollar', 'BZD', 'cent', 'Belize', 'BZ', 'BLZ', 'Belize', '019', '013', 0, '501'),
(86, 'Diego Garcia', 'Changosian', '086', 'US dollar', 'USD', 'cent', 'British Indian Ocean Territory', 'IO', 'IOT', 'British Indian Ocean Territory', '', '', 0, '246'),
(90, 'Honiara', 'Solomon Islander', '090', 'Solomon Islands dollar', 'SBD', 'cent', 'Solomon Islands', 'SB', 'SLB', 'Solomon Islands', '009', '054', 0, '677'),
(92, 'Road Town', 'British Virgin Islander;', '092', 'US dollar', 'USD', 'cent', 'British Virgin Islands', 'VG', 'VGB', 'Virgin Islands, British', '019', '029', 0, '1'),
(96, 'Bandar Seri Begawan', 'Bruneian', '096', 'Brunei dollar', 'BND', 'sen (inv.)', 'Brunei Darussalam', 'BN', 'BRN', 'Brunei Darussalam', '142', '035', 0, '673'),
(100, 'Sofia', 'Bulgarian', '100', 'lev (pl. leva)', 'BGN', 'stotinka', 'Republic of Bulgaria', 'BG', 'BGR', 'Bulgaria', '150', '151', 1, '359'),
(104, 'Yangon', 'Burmese', '104', 'kyat', 'MMK', 'pya', 'Union of Myanmar/', 'MM', 'MMR', 'Myanmar', '142', '035', 0, '95'),
(108, 'Bujumbura', 'Burundian', '108', 'Burundi franc', 'BIF', 'centime', 'Republic of Burundi', 'BI', 'BDI', 'Burundi', '002', '014', 0, '257'),
(112, 'Minsk', 'Belarusian', '112', 'Belarusian rouble', 'BYR', 'kopek', 'Republic of Belarus', 'BY', 'BLR', 'Belarus', '150', '151', 0, '375'),
(116, 'Phnom Penh', 'Cambodian', '116', 'riel', 'KHR', 'sen (inv.)', 'Kingdom of Cambodia', 'KH', 'KHM', 'Cambodia', '142', '035', 0, '855'),
(120, 'Yaoundé', 'Cameroonian', '120', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Cameroon', 'CM', 'CMR', 'Cameroon', '002', '017', 0, '237'),
(124, 'Ottawa', 'Canadian', '124', 'Canadian dollar', 'CAD', 'cent', 'Canada', 'CA', 'CAN', 'Canada', '019', '021', 0, '1'),
(132, 'Praia', 'Cape Verdean', '132', 'Cape Verde escudo', 'CVE', 'centavo', 'Republic of Cape Verde', 'CV', 'CPV', 'Cape Verde', '002', '011', 0, '238'),
(136, 'George Town', 'Caymanian', '136', 'Cayman Islands dollar', 'KYD', 'cent', 'Cayman Islands', 'KY', 'CYM', 'Cayman Islands', '019', '029', 0, '1'),
(140, 'Bangui', 'Central African', '140', 'CFA franc (BEAC)', 'XAF', 'centime', 'Central African Republic', 'CF', 'CAF', 'Central African Republic', '002', '017', 0, '236'),
(144, 'Colombo', 'Sri Lankan', '144', 'Sri Lankan rupee', 'LKR', 'cent', 'Democratic Socialist Republic of Sri Lanka', 'LK', 'LKA', 'Sri Lanka', '142', '034', 0, '94'),
(148, 'N’Djamena', 'Chadian', '148', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Chad', 'TD', 'TCD', 'Chad', '002', '017', 0, '235'),
(152, 'Santiago', 'Chilean', '152', 'Chilean peso', 'CLP', 'centavo', 'Republic of Chile', 'CL', 'CHL', 'Chile', '019', '005', 0, '56'),
(156, 'Beijing', 'Chinese', '156', 'renminbi-yuan (inv.)', 'CNY', 'jiao (10)', 'People’s Republic of China', 'CN', 'CHN', 'China', '142', '030', 0, '86'),
(158, 'Taipei', 'Taiwanese', '158', 'new Taiwan dollar', 'TWD', 'fen (inv.)', 'Republic of China, Taiwan (TW1)', 'TW', 'TWN', 'Taiwan, Province of China', '142', '030', 0, '886'),
(162, 'Flying Fish Cove', 'Christmas Islander', '162', 'Australian dollar', 'AUD', 'cent', 'Christmas Island Territory', 'CX', 'CXR', 'Christmas Island', '', '', 0, '61'),
(166, 'Bantam', 'Cocos Islander', '166', 'Australian dollar', 'AUD', 'cent', 'Territory of Cocos (Keeling) Islands', 'CC', 'CCK', 'Cocos (Keeling) Islands', '', '', 0, '61'),
(170, 'Santa Fe de Bogotá', 'Colombian', '170', 'Colombian peso', 'COP', 'centavo', 'Republic of Colombia', 'CO', 'COL', 'Colombia', '019', '005', 0, '57'),
(174, 'Moroni', 'Comorian', '174', 'Comorian franc', 'KMF', '', 'Union of the Comoros', 'KM', 'COM', 'Comoros', '002', '014', 0, '269'),
(175, 'Mamoudzou', 'Mahorais', '175', 'euro', 'EUR', 'cent', 'Departmental Collectivity of Mayotte', 'YT', 'MYT', 'Mayotte', '002', '014', 0, '262'),
(178, 'Brazzaville', 'Congolese', '178', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of the Congo', 'CG', 'COG', 'Congo', '002', '017', 0, '242'),
(180, 'Kinshasa', 'Congolese', '180', 'Congolese franc', 'CDF', 'centime', 'Democratic Republic of the Congo', 'CD', 'COD', 'Congo, the Democratic Republic of the', '002', '017', 0, '243'),
(184, 'Avarua', 'Cook Islander', '184', 'New Zealand dollar', 'NZD', 'cent', 'Cook Islands', 'CK', 'COK', 'Cook Islands', '009', '061', 0, '682'),
(188, 'San José', 'Costa Rican', '188', 'Costa Rican colón (pl. colones)', 'CRC', 'céntimo', 'Republic of Costa Rica', 'CR', 'CRI', 'Costa Rica', '019', '013', 0, '506'),
(191, 'Zagreb', 'Croatian', '191', 'kuna (inv.)', 'HRK', 'lipa (inv.)', 'Republic of Croatia', 'HR', 'HRV', 'Croatia', '150', '039', 1, '385'),
(192, 'Havana', 'Cuban', '192', 'Cuban peso', 'CUP', 'centavo', 'Republic of Cuba', 'CU', 'CUB', 'Cuba', '019', '029', 0, '53'),
(196, 'Nicosia', 'Cypriot', '196', 'euro', 'EUR', 'cent', 'Republic of Cyprus', 'CY', 'CYP', 'Cyprus', '142', '145', 1, '357'),
(203, 'Prague', 'Czech', '203', 'Czech koruna (pl. koruny)', 'CZK', 'halér', 'Czech Republic', 'CZ', 'CZE', 'Czech Republic', '150', '151', 1, '420'),
(204, 'Porto Novo (BJ1)', 'Beninese', '204', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Benin', 'BJ', 'BEN', 'Benin', '002', '011', 0, '229'),
(208, 'Copenhagen', 'Danish', '208', 'Danish krone', 'DKK', 'øre (inv.)', 'Kingdom of Denmark', 'DK', 'DNK', 'Denmark', '150', '154', 1, '45'),
(212, 'Roseau', 'Dominican', '212', 'East Caribbean dollar', 'XCD', 'cent', 'Commonwealth of Dominica', 'DM', 'DMA', 'Dominica', '019', '029', 0, '1'),
(214, 'Santo Domingo', 'Dominican', '214', 'Dominican peso', 'DOP', 'centavo', 'Dominican Republic', 'DO', 'DOM', 'Dominican Republic', '019', '029', 0, '1'),
(218, 'Quito', 'Ecuadorian', '218', 'US dollar', 'USD', 'cent', 'Republic of Ecuador', 'EC', 'ECU', 'Ecuador', '019', '005', 0, '593'),
(222, 'San Salvador', 'Salvadoran', '222', 'Salvadorian colón (pl. colones)', 'SVC', 'centavo', 'Republic of El Salvador', 'SV', 'SLV', 'El Salvador', '019', '013', 0, '503'),
(226, 'Malabo', 'Equatorial Guinean', '226', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Equatorial Guinea', 'GQ', 'GNQ', 'Equatorial Guinea', '002', '017', 0, '240'),
(231, 'Addis Ababa', 'Ethiopian', '231', 'birr (inv.)', 'ETB', 'cent', 'Federal Democratic Republic of Ethiopia', 'ET', 'ETH', 'Ethiopia', '002', '014', 0, '251'),
(232, 'Asmara', 'Eritrean', '232', 'nakfa', 'ERN', 'cent', 'State of Eritrea', 'ER', 'ERI', 'Eritrea', '002', '014', 0, '291'),
(233, 'Tallinn', 'Estonian', '233', 'euro', 'EUR', 'cent', 'Republic of Estonia', 'EE', 'EST', 'Estonia', '150', '154', 1, '372'),
(234, 'Tórshavn', 'Faeroese', '234', 'Danish krone', 'DKK', 'øre (inv.)', 'Faeroe Islands', 'FO', 'FRO', 'Faroe Islands', '150', '154', 0, '298'),
(238, 'Stanley', 'Falkland Islander', '238', 'Falkland Islands pound', 'FKP', 'new penny', 'Falkland Islands', 'FK', 'FLK', 'Falkland Islands (Malvinas)', '019', '005', 0, '500'),
(239, 'King Edward Point (Grytviken)', 'of South Georgia and the South Sandwich Islands', '239', '', '', '', 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', '', '', 0, '44'),
(242, 'Suva', 'Fijian', '242', 'Fiji dollar', 'FJD', 'cent', 'Republic of Fiji', 'FJ', 'FJI', 'Fiji', '009', '054', 0, '679'),
(246, 'Helsinki', 'Finnish', '246', 'euro', 'EUR', 'cent', 'Republic of Finland', 'FI', 'FIN', 'Finland', '150', '154', 1, '358'),
(248, 'Mariehamn', 'Åland Islander', '248', 'euro', 'EUR', 'cent', 'Åland Islands', 'AX', 'ALA', 'Åland Islands', '150', '154', 0, '358'),
(250, 'Paris', 'French', '250', 'euro', 'EUR', 'cent', 'French Republic', 'FR', 'FRA', 'France', '150', '155', 1, '33'),
(254, 'Cayenne', 'Guianese', '254', 'euro', 'EUR', 'cent', 'French Guiana', 'GF', 'GUF', 'French Guiana', '019', '005', 0, '594'),
(258, 'Papeete', 'Polynesian', '258', 'CFP franc', 'XPF', 'centime', 'French Polynesia', 'PF', 'PYF', 'French Polynesia', '009', '061', 0, '689'),
(260, 'Port-aux-Francais', 'of French Southern and Antarctic Lands', '260', 'euro', 'EUR', 'cent', 'French Southern and Antarctic Lands', 'TF', 'ATF', 'French Southern Territories', '', '', 0, '33'),
(262, 'Djibouti', 'Djiboutian', '262', 'Djibouti franc', 'DJF', '', 'Republic of Djibouti', 'DJ', 'DJI', 'Djibouti', '002', '014', 0, '253'),
(266, 'Libreville', 'Gabonese', '266', 'CFA franc (BEAC)', 'XAF', 'centime', 'Gabonese Republic', 'GA', 'GAB', 'Gabon', '002', '017', 0, '241'),
(268, 'Tbilisi', 'Georgian', '268', 'lari', 'GEL', 'tetri (inv.)', 'Georgia', 'GE', 'GEO', 'Georgia', '142', '145', 0, '995'),
(270, 'Banjul', 'Gambian', '270', 'dalasi (inv.)', 'GMD', 'butut', 'Republic of the Gambia', 'GM', 'GMB', 'Gambia', '002', '011', 0, '220'),
(275, NULL, 'Palisitnean', '275', NULL, NULL, NULL, NULL, 'PS', 'PSE', 'Palestinian Territory, Occupied', '142', '145', 0, '970'),
(276, 'Berlin', 'German', '276', 'euro', 'EUR', 'cent', 'Federal Republic of Germany', 'DE', 'DEU', 'Germany', '150', '155', 1, '49'),
(288, 'Accra', 'Ghanaian', '288', 'Ghana cedi', 'GHS', 'pesewa', 'Republic of Ghana', 'GH', 'GHA', 'Ghana', '002', '011', 0, '233'),
(292, 'Gibraltar', 'Gibraltarian', '292', 'Gibraltar pound', 'GIP', 'penny', 'Gibraltar', 'GI', 'GIB', 'Gibraltar', '150', '039', 0, '350'),
(296, 'Tarawa', 'Kiribatian', '296', 'Australian dollar', 'AUD', 'cent', 'Republic of Kiribati', 'KI', 'KIR', 'Kiribati', '009', '057', 0, '686'),
(300, 'Athens', 'Greek', '300', 'euro', 'EUR', 'cent', 'Hellenic Republic', 'GR', 'GRC', 'Greece', '150', '039', 1, '30'),
(304, 'Nuuk', 'Greenlander', '304', 'Danish krone', 'DKK', 'øre (inv.)', 'Greenland', 'GL', 'GRL', 'Greenland', '019', '021', 0, '299'),
(308, 'St George’s', 'Grenadian', '308', 'East Caribbean dollar', 'XCD', 'cent', 'Grenada', 'GD', 'GRD', 'Grenada', '019', '029', 0, '1'),
(312, 'Basse Terre', 'Guadeloupean', '312', 'euro', 'EUR ', 'cent', 'Guadeloupe', 'GP', 'GLP', 'Guadeloupe', '019', '029', 0, '590'),
(316, 'Agaña (Hagåtña)', 'Guamanian', '316', 'US dollar', 'USD', 'cent', 'Territory of Guam', 'GU', 'GUM', 'Guam', '009', '057', 0, '1'),
(320, 'Guatemala City', 'Guatemalan', '320', 'quetzal (pl. quetzales)', 'GTQ', 'centavo', 'Republic of Guatemala', 'GT', 'GTM', 'Guatemala', '019', '013', 0, '502'),
(324, 'Conakry', 'Guinean', '324', 'Guinean franc', 'GNF', '', 'Republic of Guinea', 'GN', 'GIN', 'Guinea', '002', '011', 0, '224'),
(328, 'Georgetown', 'Guyanese', '328', 'Guyana dollar', 'GYD', 'cent', 'Cooperative Republic of Guyana', 'GY', 'GUY', 'Guyana', '019', '005', 0, '592'),
(332, 'Port-au-Prince', 'Haitian', '332', 'gourde', 'HTG', 'centime', 'Republic of Haiti', 'HT', 'HTI', 'Haiti', '019', '029', 0, '509'),
(334, 'Territory of Heard Island and McDonald Islands', 'of Territory of Heard Island and McDonald Islands', '334', '', '', '', 'Territory of Heard Island and McDonald Islands', 'HM', 'HMD', 'Heard Island and McDonald Islands', '', '', 0, '61'),
(336, 'Vatican City', 'of the Holy See/of the Vatican', '336', 'euro', 'EUR', 'cent', 'the Holy See/ Vatican City State', 'VA', 'VAT', 'Holy See (Vatican City State)', '150', '039', 0, '39'),
(340, 'Tegucigalpa', 'Honduran', '340', 'lempira', 'HNL', 'centavo', 'Republic of Honduras', 'HN', 'HND', 'Honduras', '019', '013', 0, '504'),
(344, '(HK3)', 'Hong Kong Chinese', '344', 'Hong Kong dollar', 'HKD', 'cent', 'Hong Kong Special Administrative Region of the People’s Republic of China (HK2)', 'HK', 'HKG', 'Hong Kong', '142', '030', 0, '852'),
(348, 'Budapest', 'Hungarian', '348', 'forint (inv.)', 'HUF', '(fillér (inv.))', 'Republic of Hungary', 'HU', 'HUN', 'Hungary', '150', '151', 1, '36'),
(352, 'Reykjavik', 'Icelander', '352', 'króna (pl. krónur)', 'ISK', '', 'Republic of Iceland', 'IS', 'ISL', 'Iceland', '150', '154', 1, '354'),
(356, 'New Delhi', 'Indian', '356', 'Indian rupee', 'INR', 'paisa', 'Republic of India', 'IN', 'IND', 'India', '142', '034', 0, '91'),
(360, 'Jakarta', 'Indonesian', '360', 'Indonesian rupiah (inv.)', 'IDR', 'sen (inv.)', 'Republic of Indonesia', 'ID', 'IDN', 'Indonesia', '142', '035', 0, '62'),
(364, 'Tehran', 'Iranian', '364', 'Iranian rial', 'IRR', '(dinar) (IR1)', 'Islamic Republic of Iran', 'IR', 'IRN', 'Iran, Islamic Republic of', '142', '034', 0, '98'),
(368, 'Baghdad', 'Iraqi', '368', 'Iraqi dinar', 'IQD', 'fils (inv.)', 'Republic of Iraq', 'IQ', 'IRQ', 'Iraq', '142', '145', 0, '964'),
(372, 'Dublin', 'Irish', '372', 'euro', 'EUR', 'cent', 'Ireland (IE1)', 'IE', 'IRL', 'Ireland', '150', '154', 1, '353'),
(376, '(IL1)', 'Israeli', '376', 'shekel', 'ILS', 'agora', 'State of Israel', 'IL', 'ISR', 'Israel', '142', '145', 0, '972'),
(380, 'Rome', 'Italian', '380', 'euro', 'EUR', 'cent', 'Italian Republic', 'IT', 'ITA', 'Italy', '150', '039', 1, '39'),
(384, 'Yamoussoukro (CI1)', 'Ivorian', '384', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Côte d’Ivoire', 'CI', 'CIV', 'Côte d''Ivoire', '002', '011', 0, '225'),
(388, 'Kingston', 'Jamaican', '388', 'Jamaica dollar', 'JMD', 'cent', 'Jamaica', 'JM', 'JAM', 'Jamaica', '019', '029', 0, '1'),
(392, 'Tokyo', 'Japanese', '392', 'yen (inv.)', 'JPY', '(sen (inv.)) (JP1)', 'Japan', 'JP', 'JPN', 'Japan', '142', '030', 0, '81'),
(398, 'Astana', 'Kazakh', '398', 'tenge (inv.)', 'KZT', 'tiyn', 'Republic of Kazakhstan', 'KZ', 'KAZ', 'Kazakhstan', '142', '143', 0, '7'),
(400, 'Amman', 'Jordanian', '400', 'Jordanian dinar', 'JOD', '100 qirsh', 'Hashemite Kingdom of Jordan', 'JO', 'JOR', 'Jordan', '142', '145', 0, '962'),
(404, 'Nairobi', 'Kenyan', '404', 'Kenyan shilling', 'KES', 'cent', 'Republic of Kenya', 'KE', 'KEN', 'Kenya', '002', '014', 0, '254'),
(408, 'Pyongyang', 'North Korean', '408', 'North Korean won (inv.)', 'KPW', 'chun (inv.)', 'Democratic People’s Republic of Korea', 'KP', 'PRK', 'Korea, Democratic People''s Republic of', '142', '030', 0, '850'),
(410, 'Seoul', 'South Korean', '410', 'South Korean won (inv.)', 'KRW', '(chun (inv.))', 'Republic of Korea', 'KR', 'KOR', 'Korea, Republic of', '142', '030', 0, '82'),
(414, 'Kuwait City', 'Kuwaiti', '414', 'Kuwaiti dinar', 'KWD', 'fils (inv.)', 'State of Kuwait', 'KW', 'KWT', 'Kuwait', '142', '145', 0, '965'),
(417, 'Bishkek', 'Kyrgyz', '417', 'som', 'KGS', 'tyiyn', 'Kyrgyz Republic', 'KG', 'KGZ', 'Kyrgyzstan', '142', '143', 0, '996'),
(418, 'Vientiane', 'Lao', '418', 'kip (inv.)', 'LAK', '(at (inv.))', 'Lao People’s Democratic Republic', 'LA', 'LAO', 'Lao People''s Democratic Republic', '142', '035', 0, '856'),
(422, 'Beirut', 'Lebanese', '422', 'Lebanese pound', 'LBP', '(piastre)', 'Lebanese Republic', 'LB', 'LBN', 'Lebanon', '142', '145', 0, '961'),
(426, 'Maseru', 'Basotho', '426', 'loti (pl. maloti)', 'LSL', 'sente', 'Kingdom of Lesotho', 'LS', 'LSO', 'Lesotho', '002', '018', 0, '266'),
(428, 'Riga', 'Latvian', '428', 'lats (pl. lati)', 'LVL', 'santims', 'Republic of Latvia', 'LV', 'LVA', 'Latvia', '150', '154', 1, '371'),
(430, 'Monrovia', 'Liberian', '430', 'Liberian dollar', 'LRD', 'cent', 'Republic of Liberia', 'LR', 'LBR', 'Liberia', '002', '011', 0, '231'),
(434, 'Tripoli', 'Libyan', '434', 'Libyan dinar', 'LYD', 'dirham', 'Socialist People’s Libyan Arab Jamahiriya', 'LY', 'LBY', 'Libya', '002', '015', 0, '218'),
(438, 'Vaduz', 'Liechtensteiner', '438', 'Swiss franc', 'CHF', 'centime', 'Principality of Liechtenstein', 'LI', 'LIE', 'Liechtenstein', '150', '155', 1, '423'),
(440, 'Vilnius', 'Lithuanian', '440', 'litas (pl. litai)', 'LTL', 'centas', 'Republic of Lithuania', 'LT', 'LTU', 'Lithuania', '150', '154', 1, '370'),
(442, 'Luxembourg', 'Luxembourger', '442', 'euro', 'EUR', 'cent', 'Grand Duchy of Luxembourg', 'LU', 'LUX', 'Luxembourg', '150', '155', 1, '352'),
(446, 'Macao (MO3)', 'Macanese', '446', 'pataca', 'MOP', 'avo', 'Macao Special Administrative Region of the People’s Republic of China (MO2)', 'MO', 'MAC', 'Macao', '142', '030', 0, '853'),
(450, 'Antananarivo', 'Malagasy', '450', 'ariary', 'MGA', 'iraimbilanja (inv.)', 'Republic of Madagascar', 'MG', 'MDG', 'Madagascar', '002', '014', 0, '261'),
(454, 'Lilongwe', 'Malawian', '454', 'Malawian kwacha (inv.)', 'MWK', 'tambala (inv.)', 'Republic of Malawi', 'MW', 'MWI', 'Malawi', '002', '014', 0, '265'),
(458, 'Kuala Lumpur (MY1)', 'Malaysian', '458', 'ringgit (inv.)', 'MYR', 'sen (inv.)', 'Malaysia', 'MY', 'MYS', 'Malaysia', '142', '035', 0, '60'),
(462, 'Malé', 'Maldivian', '462', 'rufiyaa', 'MVR', 'laari (inv.)', 'Republic of Maldives', 'MV', 'MDV', 'Maldives', '142', '034', 0, '960'),
(466, 'Bamako', 'Malian', '466', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Mali', 'ML', 'MLI', 'Mali', '002', '011', 0, '223'),
(470, 'Valletta', 'Maltese', '470', 'euro', 'EUR', 'cent', 'Republic of Malta', 'MT', 'MLT', 'Malta', '150', '039', 1, '356'),
(474, 'Fort-de-France', 'Martinican', '474', 'euro', 'EUR', 'cent', 'Martinique', 'MQ', 'MTQ', 'Martinique', '019', '029', 0, '596'),
(478, 'Nouakchott', 'Mauritanian', '478', 'ouguiya', 'MRO', 'khoum', 'Islamic Republic of Mauritania', 'MR', 'MRT', 'Mauritania', '002', '011', 0, '222'),
(480, 'Port Louis', 'Mauritian', '480', 'Mauritian rupee', 'MUR', 'cent', 'Republic of Mauritius', 'MU', 'MUS', 'Mauritius', '002', '014', 0, '230'),
(484, 'Mexico City', 'Mexican', '484', 'Mexican peso', 'MXN', 'centavo', 'United Mexican States', 'MX', 'MEX', 'Mexico', '019', '013', 0, '52'),
(492, 'Monaco', 'Monegasque', '492', 'euro', 'EUR', 'cent', 'Principality of Monaco', 'MC', 'MCO', 'Monaco', '150', '155', 0, '377'),
(496, 'Ulan Bator', 'Mongolian', '496', 'tugrik', 'MNT', 'möngö (inv.)', 'Mongolia', 'MN', 'MNG', 'Mongolia', '142', '030', 0, '976'),
(498, 'Chisinau', 'Moldovan', '498', 'Moldovan leu (pl. lei)', 'MDL', 'ban', 'Republic of Moldova', 'MD', 'MDA', 'Moldova, Republic of', '150', '151', 0, '373'),
(499, 'Podgorica', 'Montenegrin', '499', 'euro', 'EUR', 'cent', 'Montenegro', 'ME', 'MNE', 'Montenegro', '150', '039', 0, '382'),
(500, 'Plymouth (MS2)', 'Montserratian', '500', 'East Caribbean dollar', 'XCD', 'cent', 'Montserrat', 'MS', 'MSR', 'Montserrat', '019', '029', 0, '1'),
(504, 'Rabat', 'Moroccan', '504', 'Moroccan dirham', 'MAD', 'centime', 'Kingdom of Morocco', 'MA', 'MAR', 'Morocco', '002', '015', 0, '212'),
(508, 'Maputo', 'Mozambican', '508', 'metical', 'MZN', 'centavo', 'Republic of Mozambique', 'MZ', 'MOZ', 'Mozambique', '002', '014', 0, '258'),
(512, 'Muscat', 'Omani', '512', 'Omani rial', 'OMR', 'baiza', 'Sultanate of Oman', 'OM', 'OMN', 'Oman', '142', '145', 0, '968'),
(516, 'Windhoek', 'Namibian', '516', 'Namibian dollar', 'NAD', 'cent', 'Republic of Namibia', 'NA', 'NAM', 'Namibia', '002', '018', 0, '264'),
(520, 'Yaren', 'Nauruan', '520', 'Australian dollar', 'AUD', 'cent', 'Republic of Nauru', 'NR', 'NRU', 'Nauru', '009', '057', 0, '674'),
(524, 'Kathmandu', 'Nepalese', '524', 'Nepalese rupee', 'NPR', 'paisa (inv.)', 'Nepal', 'NP', 'NPL', 'Nepal', '142', '034', 0, '977'),
(528, 'Amsterdam (NL2)', 'Dutch', '528', 'euro', 'EUR', 'cent', 'Kingdom of the Netherlands', 'NL', 'NLD', 'Netherlands', '150', '155', 1, '31'),
(531, 'Willemstad', 'Curaçaoan', '531', 'Netherlands Antillean guilder (CW1)', 'ANG', 'cent', 'Curaçao', 'CW', 'CUW', 'Curaçao', '019', '029', 0, '599'),
(533, 'Oranjestad', 'Aruban', '533', 'Aruban guilder', 'AWG', 'cent', 'Aruba', 'AW', 'ABW', 'Aruba', '019', '029', 0, '297'),
(534, 'Philipsburg', 'Sint Maartener', '534', 'Netherlands Antillean guilder (SX1)', 'ANG', 'cent', 'Sint Maarten', 'SX', 'SXM', 'Sint Maarten (Dutch part)', '019', '029', 0, '721'),
(535, NULL, 'of Bonaire, Sint Eustatius and Saba', '535', 'US dollar', 'USD', 'cent', NULL, 'BQ', 'BES', 'Bonaire, Sint Eustatius and Saba', '019', '029', 0, '599'),
(540, 'Nouméa', 'New Caledonian', '540', 'CFP franc', 'XPF', 'centime', 'New Caledonia', 'NC', 'NCL', 'New Caledonia', '009', '054', 0, '687'),
(548, 'Port Vila', 'Vanuatuan', '548', 'vatu (inv.)', 'VUV', '', 'Republic of Vanuatu', 'VU', 'VUT', 'Vanuatu', '009', '054', 0, '678'),
(554, 'Wellington', 'New Zealander', '554', 'New Zealand dollar', 'NZD', 'cent', 'New Zealand', 'NZ', 'NZL', 'New Zealand', '009', '053', 0, '64'),
(558, 'Managua', 'Nicaraguan', '558', 'córdoba oro', 'NIO', 'centavo', 'Republic of Nicaragua', 'NI', 'NIC', 'Nicaragua', '019', '013', 0, '505'),
(562, 'Niamey', 'Nigerien', '562', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Niger', 'NE', 'NER', 'Niger', '002', '011', 0, '227'),
(566, 'Abuja', 'Nigerian', '566', 'naira (inv.)', 'NGN', 'kobo (inv.)', 'Federal Republic of Nigeria', 'NG', 'NGA', 'Nigeria', '002', '011', 0, '234'),
(570, 'Alofi', 'Niuean', '570', 'New Zealand dollar', 'NZD', 'cent', 'Niue', 'NU', 'NIU', 'Niue', '009', '061', 0, '683'),
(574, 'Kingston', 'Norfolk Islander', '574', 'Australian dollar', 'AUD', 'cent', 'Territory of Norfolk Island', 'NF', 'NFK', 'Norfolk Island', '009', '053', 0, '672'),
(578, 'Oslo', 'Norwegian', '578', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'Kingdom of Norway', 'NO', 'NOR', 'Norway', '150', '154', 1, '47'),
(580, 'Saipan', 'Northern Mariana Islander', '580', 'US dollar', 'USD', 'cent', 'Commonwealth of the Northern Mariana Islands', 'MP', 'MNP', 'Northern Mariana Islands', '009', '057', 0, '1'),
(581, 'United States Minor Outlying Islands', 'of United States Minor Outlying Islands', '581', 'US dollar', 'USD', 'cent', 'United States Minor Outlying Islands', 'UM', 'UMI', 'United States Minor Outlying Islands', '', '', 0, '1'),
(583, 'Palikir', 'Micronesian', '583', 'US dollar', 'USD', 'cent', 'Federated States of Micronesia', 'FM', 'FSM', 'Micronesia, Federated States of', '009', '057', 0, '691'),
(584, 'Majuro', 'Marshallese', '584', 'US dollar', 'USD', 'cent', 'Republic of the Marshall Islands', 'MH', 'MHL', 'Marshall Islands', '009', '057', 0, '692'),
(585, 'Melekeok', 'Palauan', '585', 'US dollar', 'USD', 'cent', 'Republic of Palau', 'PW', 'PLW', 'Palau', '009', '057', 0, '680'),
(586, 'Islamabad', 'Pakistani', '586', 'Pakistani rupee', 'PKR', 'paisa', 'Islamic Republic of Pakistan', 'PK', 'PAK', 'Pakistan', '142', '034', 0, '92'),
(591, 'Panama City', 'Panamanian', '591', 'balboa', 'PAB', 'centésimo', 'Republic of Panama', 'PA', 'PAN', 'Panama', '019', '013', 0, '507'),
(598, 'Port Moresby', 'Papua New Guinean', '598', 'kina (inv.)', 'PGK', 'toea (inv.)', 'Independent State of Papua New Guinea', 'PG', 'PNG', 'Papua New Guinea', '009', '054', 0, '675'),
(600, 'Asunción', 'Paraguayan', '600', 'guaraní', 'PYG', 'céntimo', 'Republic of Paraguay', 'PY', 'PRY', 'Paraguay', '019', '005', 0, '595'),
(604, 'Lima', 'Peruvian', '604', 'new sol', 'PEN', 'céntimo', 'Republic of Peru', 'PE', 'PER', 'Peru', '019', '005', 0, '51'),
(608, 'Manila', 'Filipino', '608', 'Philippine peso', 'PHP', 'centavo', 'Republic of the Philippines', 'PH', 'PHL', 'Philippines', '142', '035', 0, '63'),
(612, 'Adamstown', 'Pitcairner', '612', 'New Zealand dollar', 'NZD', 'cent', 'Pitcairn Islands', 'PN', 'PCN', 'Pitcairn', '009', '061', 0, '649'),
(616, 'Warsaw', 'Polish', '616', 'zloty', 'PLN', 'grosz (pl. groszy)', 'Republic of Poland', 'PL', 'POL', 'Poland', '150', '151', 1, '48'),
(620, 'Lisbon', 'Portuguese', '620', 'euro', 'EUR', 'cent', 'Portuguese Republic', 'PT', 'PRT', 'Portugal', '150', '039', 1, '351'),
(624, 'Bissau', 'Guinea-Bissau national', '624', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Guinea-Bissau', 'GW', 'GNB', 'Guinea-Bissau', '002', '011', 0, '245'),
(626, 'Dili', 'East Timorese', '626', 'US dollar', 'USD', 'cent', 'Democratic Republic of East Timor', 'TL', 'TLS', 'Timor-Leste', '142', '035', 0, '670'),
(630, 'San Juan', 'Puerto Rican', '630', 'US dollar', 'USD', 'cent', 'Commonwealth of Puerto Rico', 'PR', 'PRI', 'Puerto Rico', '019', '029', 0, '1'),
(634, 'Doha', 'Qatari', '634', 'Qatari riyal', 'QAR', 'dirham', 'State of Qatar', 'QA', 'QAT', 'Qatar', '142', '145', 0, '974'),
(638, 'Saint-Denis', 'Reunionese', '638', 'euro', 'EUR', 'cent', 'Réunion', 'RE', 'REU', 'Réunion', '002', '014', 0, '262'),
(642, 'Bucharest', 'Romanian', '642', 'Romanian leu (pl. lei)', 'RON', 'ban (pl. bani)', 'Romania', 'RO', 'ROU', 'Romania', '150', '151', 1, '40'),
(643, 'Moscow', 'Russian', '643', 'Russian rouble', 'RUB', 'kopek', 'Russian Federation', 'RU', 'RUS', 'Russian Federation', '150', '151', 0, '7'),
(646, 'Kigali', 'Rwandan; Rwandese', '646', 'Rwandese franc', 'RWF', 'centime', 'Republic of Rwanda', 'RW', 'RWA', 'Rwanda', '002', '014', 0, '250'),
(652, 'Gustavia', 'of Saint Barthélemy', '652', 'euro', 'EUR', 'cent', 'Collectivity of Saint Barthélemy', 'BL', 'BLM', 'Saint Barthélemy', '019', '029', 0, '590'),
(654, 'Jamestown', 'Saint Helenian', '654', 'Saint Helena pound', 'SHP', 'penny', 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', 'Saint Helena, Ascension and Tristan da Cunha', '002', '011', 0, '290'),
(659, 'Basseterre', 'Kittsian; Nevisian', '659', 'East Caribbean dollar', 'XCD', 'cent', 'Federation of Saint Kitts and Nevis', 'KN', 'KNA', 'Saint Kitts and Nevis', '019', '029', 0, '1'),
(660, 'The Valley', 'Anguillan', '660', 'East Caribbean dollar', 'XCD', 'cent', 'Anguilla', 'AI', 'AIA', 'Anguilla', '019', '029', 0, '1'),
(662, 'Castries', 'Saint Lucian', '662', 'East Caribbean dollar', 'XCD', 'cent', 'Saint Lucia', 'LC', 'LCA', 'Saint Lucia', '019', '029', 0, '1'),
(663, 'Marigot', 'of Saint Martin', '663', 'euro', 'EUR', 'cent', 'Collectivity of Saint Martin', 'MF', 'MAF', 'Saint Martin (French part)', '019', '029', 0, '590'),
(666, 'Saint-Pierre', 'St-Pierrais; Miquelonnais', '666', 'euro', 'EUR', 'cent', 'Territorial Collectivity of Saint Pierre and Miquelon', 'PM', 'SPM', 'Saint Pierre and Miquelon', '019', '021', 0, '508'),
(670, 'Kingstown', 'Vincentian', '670', 'East Caribbean dollar', 'XCD', 'cent', 'Saint Vincent and the Grenadines', 'VC', 'VCT', 'Saint Vincent and the Grenadines', '019', '029', 0, '1'),
(674, 'San Marino', 'San Marinese', '674', 'euro', 'EUR ', 'cent', 'Republic of San Marino', 'SM', 'SMR', 'San Marino', '150', '039', 0, '378'),
(678, 'São Tomé', 'São Toméan', '678', 'dobra', 'STD', 'centavo', 'Democratic Republic of São Tomé and Príncipe', 'ST', 'STP', 'Sao Tome and Principe', '002', '017', 0, '239'),
(682, 'Riyadh', 'Saudi Arabian', '682', 'riyal', 'SAR', 'halala', 'Kingdom of Saudi Arabia', 'SA', 'SAU', 'Saudi Arabia', '142', '145', 0, '966'),
(686, 'Dakar', 'Senegalese', '686', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Senegal', 'SN', 'SEN', 'Senegal', '002', '011', 0, '221'),
(688, 'Belgrade', 'Serb', '688', 'Serbian dinar', 'RSD', 'para (inv.)', 'Republic of Serbia', 'RS', 'SRB', 'Serbia', '150', '039', 0, '381'),
(690, 'Victoria', 'Seychellois', '690', 'Seychelles rupee', 'SCR', 'cent', 'Republic of Seychelles', 'SC', 'SYC', 'Seychelles', '002', '014', 0, '248'),
(694, 'Freetown', 'Sierra Leonean', '694', 'leone', 'SLL', 'cent', 'Republic of Sierra Leone', 'SL', 'SLE', 'Sierra Leone', '002', '011', 0, '232'),
(702, 'Singapore', 'Singaporean', '702', 'Singapore dollar', 'SGD', 'cent', 'Republic of Singapore', 'SG', 'SGP', 'Singapore', '142', '035', 0, '65'),
(703, 'Bratislava', 'Slovak', '703', 'euro', 'EUR', 'cent', 'Slovak Republic', 'SK', 'SVK', 'Slovakia', '150', '151', 1, '421'),
(704, 'Hanoi', 'Vietnamese', '704', 'dong', 'VND', '(10 hào', 'Socialist Republic of Vietnam', 'VN', 'VNM', 'Viet Nam', '142', '035', 0, '84'),
(705, 'Ljubljana', 'Slovene', '705', 'euro', 'EUR', 'cent', 'Republic of Slovenia', 'SI', 'SVN', 'Slovenia', '150', '039', 1, '386'),
(706, 'Mogadishu', 'Somali', '706', 'Somali shilling', 'SOS', 'cent', 'Somali Republic', 'SO', 'SOM', 'Somalia', '002', '014', 0, '252'),
(710, 'Pretoria (ZA1)', 'South African', '710', 'rand', 'ZAR', 'cent', 'Republic of South Africa', 'ZA', 'ZAF', 'South Africa', '002', '018', 0, '27'),
(716, 'Harare', 'Zimbabwean', '716', 'Zimbabwe dollar (ZW1)', 'ZWL', 'cent', 'Republic of Zimbabwe', 'ZW', 'ZWE', 'Zimbabwe', '002', '014', 0, '263'),
(724, 'Madrid', 'Spaniard', '724', 'euro', 'EUR', 'cent', 'Kingdom of Spain', 'ES', 'ESP', 'Spain', '150', '039', 1, '34'),
(728, 'Juba', 'South Sudanese', '728', 'South Sudanese pound', 'SSP', 'piaster', 'Republic of South Sudan', 'SS', 'SSD', 'South Sudan', '002', '015', 0, '211'),
(729, 'Khartoum', 'Sudanese', '729', 'Sudanese pound', 'SDG', 'piastre', 'Republic of the Sudan', 'SD', 'SDN', 'Sudan', '002', '015', 0, '249'),
(732, 'Al aaiun', 'Sahrawi', '732', 'Moroccan dirham', 'MAD', 'centime', 'Western Sahara', 'EH', 'ESH', 'Western Sahara', '002', '015', 0, '212'),
(740, 'Paramaribo', 'Surinamese', '740', 'Surinamese dollar', 'SRD', 'cent', 'Republic of Suriname', 'SR', 'SUR', 'Suriname', '019', '005', 0, '597'),
(744, 'Longyearbyen', 'of Svalbard', '744', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'Svalbard and Jan Mayen', 'SJ', 'SJM', 'Svalbard and Jan Mayen', '150', '154', 0, '47'),
(748, 'Mbabane', 'Swazi', '748', 'lilangeni', 'SZL', 'cent', 'Kingdom of Swaziland', 'SZ', 'SWZ', 'Swaziland', '002', '018', 0, '268'),
(752, 'Stockholm', 'Swedish', '752', 'krona (pl. kronor)', 'SEK', 'öre (inv.)', 'Kingdom of Sweden', 'SE', 'SWE', 'Sweden', '150', '154', 1, '46'),
(756, 'Berne', 'Swiss', '756', 'Swiss franc', 'CHF', 'centime', 'Swiss Confederation', 'CH', 'CHE', 'Switzerland', '150', '155', 1, '41'),
(760, 'Damascus', 'Syrian', '760', 'Syrian pound', 'SYP', 'piastre', 'Syrian Arab Republic', 'SY', 'SYR', 'Syrian Arab Republic', '142', '145', 0, '963'),
(762, 'Dushanbe', 'Tajik', '762', 'somoni', 'TJS', 'diram', 'Republic of Tajikistan', 'TJ', 'TJK', 'Tajikistan', '142', '143', 0, '992'),
(764, 'Bangkok', 'Thai', '764', 'baht (inv.)', 'THB', 'satang (inv.)', 'Kingdom of Thailand', 'TH', 'THA', 'Thailand', '142', '035', 0, '66'),
(768, 'Lomé', 'Togolese', '768', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Togolese Republic', 'TG', 'TGO', 'Togo', '002', '011', 0, '228'),
(772, '(TK2)', 'Tokelauan', '772', 'New Zealand dollar', 'NZD', 'cent', 'Tokelau', 'TK', 'TKL', 'Tokelau', '009', '061', 0, '690'),
(776, 'Nuku’alofa', 'Tongan', '776', 'pa’anga (inv.)', 'TOP', 'seniti (inv.)', 'Kingdom of Tonga', 'TO', 'TON', 'Tonga', '009', '061', 0, '676'),
(780, 'Port of Spain', 'Trinidadian; Tobagonian', '780', 'Trinidad and Tobago dollar', 'TTD', 'cent', 'Republic of Trinidad and Tobago', 'TT', 'TTO', 'Trinidad and Tobago', '019', '029', 0, '1'),
(784, 'Abu Dhabi', 'Emirian', '784', 'UAE dirham', 'AED', 'fils (inv.)', 'United Arab Emirates', 'AE', 'ARE', 'United Arab Emirates', '142', '145', 0, '971'),
(788, 'Tunis', 'Tunisian', '788', 'Tunisian dinar', 'TND', 'millime', 'Republic of Tunisia', 'TN', 'TUN', 'Tunisia', '002', '015', 0, '216'),
(792, 'Ankara', 'Turk', '792', 'Turkish lira (inv.)', 'TRY', 'kurus (inv.)', 'Republic of Turkey', 'TR', 'TUR', 'Turkey', '142', '145', 0, '90'),
(795, 'Ashgabat', 'Turkmen', '795', 'Turkmen manat (inv.)', 'TMT', 'tenge (inv.)', 'Turkmenistan', 'TM', 'TKM', 'Turkmenistan', '142', '143', 0, '993'),
(796, 'Cockburn Town', 'Turks and Caicos Islander', '796', 'US dollar', 'USD', 'cent', 'Turks and Caicos Islands', 'TC', 'TCA', 'Turks and Caicos Islands', '019', '029', 0, '1'),
(798, 'Funafuti', 'Tuvaluan', '798', 'Australian dollar', 'AUD', 'cent', 'Tuvalu', 'TV', 'TUV', 'Tuvalu', '009', '061', 0, '688'),
(800, 'Kampala', 'Ugandan', '800', 'Uganda shilling', 'UGX', 'cent', 'Republic of Uganda', 'UG', 'UGA', 'Uganda', '002', '014', 0, '256'),
(804, 'Kiev', 'Ukrainian', '804', 'hryvnia', 'UAH', 'kopiyka', 'Ukraine', 'UA', 'UKR', 'Ukraine', '150', '151', 0, '380'),
(807, 'Skopje', 'of the former Yugoslav Republic of Macedonia', '807', 'denar (pl. denars)', 'MKD', 'deni (inv.)', 'the former Yugoslav Republic of Macedonia', 'MK', 'MKD', 'Macedonia, the former Yugoslav Republic of', '150', '039', 0, '389'),
(818, 'Cairo', 'Egyptian', '818', 'Egyptian pound', 'EGP', 'piastre', 'Arab Republic of Egypt', 'EG', 'EGY', 'Egypt', '002', '015', 0, '20'),
(826, 'London', 'British', '826', 'pound sterling', 'GBP', 'penny (pl. pence)', 'United Kingdom of Great Britain and Northern Ireland', 'GB', 'GBR', 'United Kingdom', '150', '154', 1, '44'),
(831, 'St Peter Port', 'of Guernsey', '831', 'Guernsey pound (GG2)', 'GGP (GG2)', 'penny (pl. pence)', 'Bailiwick of Guernsey', 'GG', 'GGY', 'Guernsey', '150', '154', 0, '44'),
(832, 'St Helier', 'of Jersey', '832', 'Jersey pound (JE2)', 'JEP (JE2)', 'penny (pl. pence)', 'Bailiwick of Jersey', 'JE', 'JEY', 'Jersey', '150', '154', 0, '44'),
(833, 'Douglas', 'Manxman; Manxwoman', '833', 'Manx pound (IM2)', 'IMP (IM2)', 'penny (pl. pence)', 'Isle of Man', 'IM', 'IMN', 'Isle of Man', '150', '154', 0, '44'),
(834, 'Dodoma (TZ1)', 'Tanzanian', '834', 'Tanzanian shilling', 'TZS', 'cent', 'United Republic of Tanzania', 'TZ', 'TZA', 'Tanzania, United Republic of', '002', '014', 0, '255'),
(840, 'Washington DC', 'American', '840', 'US dollar', 'USD', 'cent', 'United States of America', 'US', 'USA', 'United States', '019', '021', 0, '1'),
(850, 'Charlotte Amalie', 'US Virgin Islander', '850', 'US dollar', 'USD', 'cent', 'United States Virgin Islands', 'VI', 'VIR', 'Virgin Islands, U.S.', '019', '029', 0, '1'),
(854, 'Ouagadougou', 'Burkinabe', '854', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Burkina Faso', 'BF', 'BFA', 'Burkina Faso', '002', '011', 0, '226'),
(858, 'Montevideo', 'Uruguayan', '858', 'Uruguayan peso', 'UYU', 'centésimo', 'Eastern Republic of Uruguay', 'UY', 'URY', 'Uruguay', '019', '005', 0, '598'),
(860, 'Tashkent', 'Uzbek', '860', 'sum (inv.)', 'UZS', 'tiyin (inv.)', 'Republic of Uzbekistan', 'UZ', 'UZB', 'Uzbekistan', '142', '143', 0, '998'),
(862, 'Caracas', 'Venezuelan', '862', 'bolívar fuerte (pl. bolívares fuertes)', 'VEF', 'céntimo', 'Bolivarian Republic of Venezuela', 'VE', 'VEN', 'Venezuela, Bolivarian Republic of', '019', '005', 0, '58'),
(876, 'Mata-Utu', 'Wallisian; Futunan; Wallis and Futuna Islander', '876', 'CFP franc', 'XPF', 'centime', 'Wallis and Futuna', 'WF', 'WLF', 'Wallis and Futuna', '009', '061', 0, '681'),
(882, 'Apia', 'Samoan', '882', 'tala (inv.)', 'WST', 'sene (inv.)', 'Independent State of Samoa', 'WS', 'WSM', 'Samoa', '009', '061', 0, '685'),
(887, 'San’a', 'Yemenite', '887', 'Yemeni rial', 'YER', 'fils (inv.)', 'Republic of Yemen', 'YE', 'YEM', 'Yemen', '142', '145', 0, '967'),
(894, 'Lusaka', 'Zambian', '894', 'Zambian kwacha (inv.)', 'ZMW', 'ngwee (inv.)', 'Republic of Zambia', 'ZM', 'ZMB', 'Zambia', '002', '014', 0, '260');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
`department_id` bigint(20) NOT NULL,
  `department_company_id` bigint(20) NOT NULL,
  `department_name` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `department_desc` text NOT NULL,
  `department_users_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_company_id`, `department_name`, `created_at`, `updated_at`, `department_desc`, `department_users_count`) VALUES
(1, 1, 'Finance', '2014-12-16 00:00:00', '2014-12-30 14:32:16', 'No description', 3),
(2, 1, 'Human Resource', '2014-12-15 00:00:00', '2014-12-24 19:31:43', 'Human resource department', 1),
(4, 1, 'Human Resource4', '2014-12-26 10:06:54', '2014-12-26 10:06:54', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_permissions`
--

CREATE TABLE IF NOT EXISTS `department_permissions` (
`department_permission_id` bigint(20) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `department_permission_set_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_permissions`
--

INSERT INTO `department_permissions` (`department_permission_id`, `department_id`, `department_permission_set_id`, `created_at`, `updated_at`) VALUES
(4, 1, 5, '2014-12-30 14:17:42', '2014-12-30 14:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`employee_id` bigint(20) NOT NULL,
  `employee_name` varchar(240) NOT NULL,
  `employee_label` varchar(240) NOT NULL,
  `employee_salary` double NOT NULL,
  `employee_photo_uri` varchar(1000) NOT NULL,
  `employee_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = working, 0 = fired',
  `employeer_reg_no` varchar(240) NOT NULL,
  `employee_children_no` smallint(6) NOT NULL,
  `employee_relationship_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = single, 1 = married, 2 = divorced',
  `employee_diseases` text NOT NULL,
  `empployee_account_date` datetime NOT NULL,
  `employee_salary_interval` int(11) NOT NULL,
  `employee_salary_interval_type` varchar(100) NOT NULL DEFAULT 'month' COMMENT 'Can be month, day, week, year',
  `employee_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
`expense_id` bigint(20) NOT NULL,
  `expense_date` datetime NOT NULL,
  `expense_value` double NOT NULL,
  `expense_type_id` varchar(100) NOT NULL COMMENT 'Type can be utility bills, salaries, repair etc',
  `expense_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE IF NOT EXISTS `expense_types` (
`expense_type_id` bigint(20) NOT NULL,
  `expense_type_name` varchar(300) NOT NULL,
  `expense_type_desc` text NOT NULL,
  `expense_type_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE IF NOT EXISTS `incomes` (
`income_id` bigint(20) NOT NULL,
  `income_date` datetime NOT NULL,
  `income_value` double NOT NULL,
  `income_type_id` varchar(100) NOT NULL COMMENT 'Types can be like sale of assets, sale of scrape, bank interest, gifts',
  `income_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_types`
--

CREATE TABLE IF NOT EXISTS `income_types` (
`income_type_id` bigint(20) NOT NULL,
  `income_type_name` varchar(300) NOT NULL,
  `income_type_desc` text NOT NULL,
  `income_type_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE IF NOT EXISTS `inventory_items` (
`inventory_item_id` bigint(20) NOT NULL,
  `inventory_item_date_added` datetime NOT NULL,
  `inventory_item_value` double NOT NULL,
  `inventory_item_source` varchar(100) NOT NULL DEFAULT 'po' COMMENT 'po = purchase order, manual = manual addition of item',
  `inventory_item_po` bigint(20) NOT NULL COMMENT 'Inventory item purchase order',
  `inventory_item_product_id` int(11) NOT NULL COMMENT 'The product ID of the item added',
  `inventory_item_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`log_id` bigint(20) NOT NULL,
  `log_company_id` bigint(20) NOT NULL,
  `log_activity_name` text NOT NULL,
  `log_activity_details` longtext NOT NULL,
  `log_activity_user_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `log_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_05_181909_setup_countries_table', 1),
('2014_12_05_181910_charify_countries_table', 1),
('2014_12_05_192152_charify_countries_table', 2),
('2014_12_05_192152_create_admin_table', 2),
('2014_12_19_133414_create_admin_table', 0),
('2014_12_19_133414_create_asset_categories_table', 0),
('2014_12_19_133414_create_assets_table', 0),
('2014_12_19_133414_create_bank_transactions_table', 0),
('2014_12_19_133414_create_banks_table', 0),
('2014_12_19_133414_create_cash_transactions_table', 0),
('2014_12_19_133414_create_clients_table', 0),
('2014_12_19_133414_create_companies_table', 0),
('2014_12_19_133414_create_countries_table', 0),
('2014_12_19_133414_create_department_permissions_table', 0),
('2014_12_19_133414_create_departments_table', 0),
('2014_12_19_133414_create_employees_table', 0),
('2014_12_19_133414_create_expense_types_table', 0),
('2014_12_19_133414_create_expenses_table', 0),
('2014_12_19_133414_create_income_types_table', 0),
('2014_12_19_133414_create_incomes_table', 0),
('2014_12_19_133414_create_inventory_items_table', 0),
('2014_12_19_133414_create_logs_table', 0),
('2014_12_19_133414_create_payment_types_table', 0),
('2014_12_19_133414_create_payrolls_table', 0),
('2014_12_19_133414_create_permission_sets_table', 0),
('2014_12_19_133414_create_permissions_table', 0),
('2014_12_19_133414_create_product_categories_table', 0),
('2014_12_19_133414_create_products_table', 0),
('2014_12_19_133414_create_purchase_invoices_table', 0),
('2014_12_19_133414_create_purchase_orders_table', 0),
('2014_12_19_133414_create_purchase_requests_table', 0),
('2014_12_19_133414_create_sale_budgets_table', 0),
('2014_12_19_133414_create_sale_contracts_table', 0),
('2014_12_19_133414_create_sale_invoices_table', 0),
('2014_12_19_133414_create_sales_table', 0),
('2014_12_19_133414_create_settings_table', 0),
('2014_12_19_133414_create_suppliers_table', 0),
('2014_12_19_133414_create_taxes_table', 0),
('2014_12_19_133414_create_user_departments_table', 0),
('2014_12_19_133414_create_user_permissions_table', 0),
('2014_12_19_133414_create_users_table', 0),
('2014_12_19_133809_create_password_reminders_table', 3),
('2014_12_19_133853_create_admin_table', 0),
('2014_12_19_133853_create_asset_categories_table', 0),
('2014_12_19_133853_create_assets_table', 0),
('2014_12_19_133853_create_bank_transactions_table', 0),
('2014_12_19_133853_create_banks_table', 0),
('2014_12_19_133853_create_cash_transactions_table', 0),
('2014_12_19_133853_create_clients_table', 0),
('2014_12_19_133853_create_companies_table', 0),
('2014_12_19_133853_create_countries_table', 0),
('2014_12_19_133853_create_department_permissions_table', 0),
('2014_12_19_133853_create_departments_table', 0),
('2014_12_19_133853_create_employees_table', 0),
('2014_12_19_133853_create_expense_types_table', 0),
('2014_12_19_133853_create_expenses_table', 0),
('2014_12_19_133853_create_income_types_table', 0),
('2014_12_19_133853_create_incomes_table', 0),
('2014_12_19_133853_create_inventory_items_table', 0),
('2014_12_19_133853_create_logs_table', 0),
('2014_12_19_133853_create_password_reminders_table', 0),
('2014_12_19_133853_create_payment_types_table', 0),
('2014_12_19_133853_create_payrolls_table', 0),
('2014_12_19_133853_create_permission_sets_table', 0),
('2014_12_19_133853_create_permissions_table', 0),
('2014_12_19_133853_create_product_categories_table', 0),
('2014_12_19_133853_create_products_table', 0),
('2014_12_19_133853_create_purchase_invoices_table', 0),
('2014_12_19_133853_create_purchase_orders_table', 0),
('2014_12_19_133853_create_purchase_requests_table', 0),
('2014_12_19_133853_create_sale_budgets_table', 0),
('2014_12_19_133853_create_sale_contracts_table', 0),
('2014_12_19_133853_create_sale_invoices_table', 0),
('2014_12_19_133853_create_sales_table', 0),
('2014_12_19_133853_create_settings_table', 0),
('2014_12_19_133853_create_suppliers_table', 0),
('2014_12_19_133853_create_taxes_table', 0),
('2014_12_19_133853_create_user_departments_table', 0),
('2014_12_19_133853_create_user_permissions_table', 0),
('2014_12_19_133853_create_users_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reminders`
--

INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
('wasxxm@gmail.com', '1d967ea478fd7182c4515841fbac9651884a64f9', '2014-12-19 09:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE IF NOT EXISTS `payment_types` (
`payment_type_id` bigint(20) NOT NULL,
  `payment_type_name` varchar(240) NOT NULL,
  `payment_type_desc` text NOT NULL,
  `payment_type_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE IF NOT EXISTS `payrolls` (
`payroll_id` bigint(20) NOT NULL,
  `payroll_employee_id` bigint(20) NOT NULL,
  `payroll_date` datetime NOT NULL,
  `payroll_value` double NOT NULL,
  `payroll_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`permission_id` int(11) NOT NULL,
  `permission_name` varchar(240) NOT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission_name`, `super_user`) VALUES
(1, 'super_user', 1),
(2, 'create_company', 1),
(3, 'disable_company', 1),
(4, 'edit_company', 0),
(5, 'view_company', 0),
(6, 'create_user', 0),
(7, 'disable_user', 0),
(8, 'edit_user', 0),
(9, 'view_user', 0),
(10, 'create_department', 0),
(11, 'delete_department', 0),
(12, 'edit_department', 0),
(13, 'view_department', 0),
(14, 'edit_company_users_limit', 1),
(15, 'manage_user_departments', 0),
(16, 'view_permission_set', 0),
(17, 'edit_permission_set', 0),
(18, 'create_permission_set', 0),
(19, 'delete_permission_set', 0),
(20, 'view_profile', 0),
(21, 'edit_profile', 0),
(22, 'manage_user_permissions', 0),
(23, 'manage_department_permissions', 0),
(24, 'view_purchase_request', 0),
(25, 'reject_purchase_request', 0),
(26, 'edit_purchase_request', 0),
(28, 'delete_purchase_request', 0),
(29, 'create_purchase_request', 0),
(30, 'approve_purchase_request', 0),
(31, 'view_supplier', 0),
(32, 'edit_supplier', 0),
(33, 'delete_supplier', 0),
(34, 'create_supplier', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission_sets`
--

CREATE TABLE IF NOT EXISTS `permission_sets` (
`permission_set_id` int(11) NOT NULL,
  `permission_ids` text NOT NULL,
  `permission_ids_str` longtext NOT NULL,
  `permission_set_name` varchar(240) NOT NULL,
  `permission_set_desc` text NOT NULL,
  `departments_count` int(11) NOT NULL DEFAULT '0',
  `users_count` int(11) NOT NULL DEFAULT '0',
  `company_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_sets`
--

INSERT INTO `permission_sets` (`permission_set_id`, `permission_ids`, `permission_ids_str`, `permission_set_name`, `permission_set_desc`, `departments_count`, `users_count`, `company_id`, `created_at`, `updated_at`) VALUES
(1, '1', '', 'Super User', 'Super User of the whole Web Site. This user can manage all functions provided in the admin panel.', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '4,5,6,7,8,9,10,11,12,13,15,16,17,18,19,20,21,22,23,24,25,26,28,29,30,31,32,33,34', '', 'Company Admin', '', 0, 1, 1, '2014-12-25 16:58:30', '2015-01-28 02:49:27'),
(5, '5,9,13', '', 'Department User', '', 1, 0, 1, '2014-12-25 17:59:46', '2014-12-30 14:17:43'),
(7, '5', '', 'Hello', '', 0, 0, 1, '2014-12-25 18:02:31', '2014-12-30 14:30:49'),
(8, '9', '', 'Ikram', '', 0, 0, 1, '2014-12-25 18:03:27', '2014-12-26 12:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` bigint(20) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_desc` text NOT NULL,
  `product_category_id` bigint(20) NOT NULL,
  `product_value` double NOT NULL,
  `product_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_category_id`, `product_value`, `product_company_id`) VALUES
(1, 'Sony Xperia Z1', 'The best water-proof Sony mobile', 1, 14, 1),
(2, 'iPhone 6 Branded', 'The original iPhone 6 mobile from Apple', 1, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
`product_category_id` bigint(20) NOT NULL,
  `product_category_name` varchar(300) NOT NULL,
  `product_category_desc` text NOT NULL,
  `product_category_type` varchar(100) NOT NULL DEFAULT 'goods' COMMENT 'goods or service',
  `product_category_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_name`, `product_category_desc`, `product_category_type`, `product_category_company_id`) VALUES
(1, 'Mobiles', 'Mobiles of all kind', 'goods', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase_request`
--

CREATE TABLE IF NOT EXISTS `product_purchase_request` (
`product_purchase_request_id` bigint(20) NOT NULL,
  `purchase_request_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `value` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_purchase_request`
--

INSERT INTO `product_purchase_request` (`product_purchase_request_id`, `purchase_request_id`, `product_id`, `value`, `quantity`) VALUES
(4, 1, 1, 0, 0),
(5, 1, 2, 0, 0),
(17, 4, 1, 0, 0),
(18, 4, 2, 0, 0),
(20, 3, 1, 14, 1),
(21, 3, 2, 3.1, 10),
(22, 2, 1, 14, 1),
(23, 2, 2, 4.3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE IF NOT EXISTS `purchase_invoices` (
`purchase_invoice_id` bigint(20) NOT NULL,
  `purchase_invoice_label` varchar(100) NOT NULL,
  `purchase_invoice_payment_type_id` bigint(20) NOT NULL,
  `purchase_invoice_supplier_id` bigint(20) NOT NULL,
  `purchase_invoice_value` double NOT NULL,
  `purchase_invoice_date` datetime NOT NULL,
  `purchase_invoice_source` varchar(100) NOT NULL COMMENT 'po, other_expense',
  `purchase_invoice_po_id` bigint(20) NOT NULL,
  `purchase_invoice_status` varchar(100) NOT NULL COMMENT '0 = pending, 1 = paid',
  `purchase_invoice_payment_date` datetime NOT NULL,
  `purchase_invoice_cash_transaction_id` bigint(20) NOT NULL,
  `purchase_invoice_transaction_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE IF NOT EXISTS `purchase_orders` (
`purchase_order_id` bigint(20) NOT NULL,
  `purchase_order_price` double NOT NULL,
  `purchase_order_supplier_id` bigint(20) NOT NULL,
  `purchase_order_product_ids` text NOT NULL COMMENT 'Array consisting of ID, Quantity, Price logged',
  `purchase_order_date` datetime NOT NULL,
  `purchase_order_status` smallint(100) NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = approved, 2 = delivered',
  `purchase_order_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requests`
--

CREATE TABLE IF NOT EXISTS `purchase_requests` (
`purchase_request_id` bigint(20) NOT NULL,
  `purchase_request_name` varchar(250) NOT NULL,
  `purchase_request_desc` longtext NOT NULL,
  `purchase_request_date` datetime NOT NULL,
  `purchase_request_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = approved, 2 = denied',
  `purchase_request_reject_notes` text NOT NULL COMMENT 'Reason for the purchase request being denied',
  `purchase_request_edited_date` datetime NOT NULL,
  `purchase_request_company_id` bigint(20) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_requests`
--

INSERT INTO `purchase_requests` (`purchase_request_id`, `purchase_request_name`, `purchase_request_desc`, `purchase_request_date`, `purchase_request_status`, `purchase_request_reject_notes`, `purchase_request_edited_date`, `purchase_request_company_id`, `updated_at`, `created_at`, `user_id`) VALUES
(2, 'Buy Mobiles', 'Buy Xperia Z1 and iPhone 6', '2015-01-05 10:13:44', 1, '', '2015-01-12 16:49:29', 1, '2015-01-12 16:49:36', '2015-01-05 10:13:44', 1),
(3, 'Need 3 Laptops', 'Dell Inspiron Laptops', '2015-01-08 08:43:42', 2, '', '2015-01-12 16:53:19', 1, '2015-01-12 16:53:19', '2015-01-08 08:43:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`sale_id` bigint(20) NOT NULL,
  `sale_client_id` bigint(20) NOT NULL,
  `sale_inventory_item_ids` text NOT NULL COMMENT 'Array containing inventory item ID, price, quantity',
  `sale_value` double NOT NULL,
  `sale_date` datetime NOT NULL,
  `sale_is_contract` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Is the sale a contract based sale? 1 = yes, 0 = no',
  `sale_contract_id` bigint(20) NOT NULL,
  `sale_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_budgets`
--

CREATE TABLE IF NOT EXISTS `sale_budgets` (
`sale_budget_id` bigint(20) NOT NULL,
  `sale_budget_value` double NOT NULL,
  `sale_budget_added_date` datetime NOT NULL,
  `sale_budget_start_date` datetime NOT NULL,
  `sale_budget_end_date` datetime NOT NULL,
  `sale_budget_client_id` bigint(20) NOT NULL,
  `sale_budget_inventory_item_ids` text NOT NULL COMMENT 'Inventory items array containing IDs, price, quantity',
  `sale_budget_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_contracts`
--

CREATE TABLE IF NOT EXISTS `sale_contracts` (
`sale_contract_id` bigint(20) NOT NULL,
  `sale_contract_client_id` bigint(20) NOT NULL,
  `sale_contract_date_added` datetime NOT NULL,
  `sale_contract_start_date` datetime NOT NULL,
  `sale_contract_end_date` datetime NOT NULL,
  `sale_contract_desc` text NOT NULL,
  `sale_contract_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = not active, 1 = active, 2 = completed, 3 = terminated',
  `sale_contract_inventory_item_ids` text NOT NULL,
  `sale_contract_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoices`
--

CREATE TABLE IF NOT EXISTS `sale_invoices` (
`sale_invoice_id` bigint(20) NOT NULL,
  `sale_invoice_label` varchar(100) NOT NULL,
  `sale_invoice_payment_type_id` bigint(20) NOT NULL,
  `sale_invoice_client_id` bigint(20) NOT NULL,
  `sale_invoice_value` double NOT NULL,
  `sale_invoice_source` varchar(100) NOT NULL DEFAULT 'direct_sale' COMMENT 'direct_sale, other_income or contract',
  `sale_invoice_sale_id` bigint(20) NOT NULL,
  `sale_invoice_sale_contract_id` bigint(20) NOT NULL,
  `sale_invoice_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = payable, 1 = paid',
  `sale_invoice_date` datetime NOT NULL,
  `sale_invoice_payment_date` datetime NOT NULL,
  `sale_invoice_cash_transaction_id` bigint(20) NOT NULL,
  `sale_invoice_bank_transaction_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`setting_id` bigint(20) NOT NULL,
  `setting_key` varchar(240) NOT NULL,
  `setting_value` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_key`, `setting_value`) VALUES
(1, 'company_logo_max_size', '100'),
(2, 'company_logo_width', '300'),
(3, 'company_logo_height', '80'),
(4, 'pagination_size', '10'),
(5, 'profile_pic_width', '100'),
(6, 'profile_pic_height', '100'),
(7, 'profile_pic_max_size', '100'),
(8, 'email_from', 'support@villenegocios.com.br'),
(9, 'email_name', 'villeNegocios Support');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
`supplier_id` bigint(20) NOT NULL,
  `supplier_name` varchar(240) NOT NULL,
  `supplier_phone` varchar(100) NOT NULL,
  `supplier_email` varchar(240) NOT NULL,
  `supplier_money_spent` double NOT NULL,
  `supplier_register_date` datetime NOT NULL,
  `supplier_observations` text NOT NULL,
  `supplier_company_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_email`, `supplier_money_spent`, `supplier_register_date`, `supplier_observations`, `supplier_company_id`, `created_at`, `updated_at`) VALUES
(1, 'PakCoders', '4214234234', 'wasxxm@gmail.com', 45.67, '2015-01-26 06:18:11', 'Observations', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE IF NOT EXISTS `taxes` (
`tax_id` bigint(20) NOT NULL,
  `tax_name` varchar(240) NOT NULL,
  `tax_type` varchar(100) NOT NULL DEFAULT 'sales_tax' COMMENT 'Values can be like income_tax, sales_tax, custom_duty',
  `tax_desc` text NOT NULL,
  `tax_rate` double NOT NULL,
  `tax_company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` bigint(20) NOT NULL,
  `user_company_id` bigint(20) NOT NULL,
  `email` varchar(240) NOT NULL,
  `password` varchar(240) NOT NULL,
  `user_fullname` varchar(240) NOT NULL,
  `user_label` varchar(240) NOT NULL,
  `user_phone` varchar(240) NOT NULL,
  `user_profile_pic_uri` varchar(250) NOT NULL,
  `user_last_login_date` datetime NOT NULL,
  `user_last_login_ip` varchar(100) NOT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = blocked, 1 = active',
  `user_block_note` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(250) NOT NULL,
  `user_session` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_company_id`, `email`, `password`, `user_fullname`, `user_label`, `user_phone`, `user_profile_pic_uri`, `user_last_login_date`, `user_last_login_ip`, `user_status`, `user_block_note`, `created_at`, `updated_at`, `remember_token`, `user_session`) VALUES
(1, 1, 'wasxxm@gmail.com', '$2y$10$X2jsvGu81TBEynHWEfGkIuU9bmUTIeZF.fj.bhWebbqno7uGCk7la', 'Waseem Khan', 'CEO', '03361518881', '14191038175495ce4976ee055.jpg', '2014-12-06 00:00:00', '127.0.0.1', 1, '', '2014-12-10 00:00:00', '2015-01-28 03:26:21', '0Gezc5mE7yxHmh2czmZAcKaX4XkaZcnAu6fZAgPCP1xRU3gPRMfF8OrVnYk8', ''),
(2, 0, 'waseem@gmail.com', '$2y$10$lo8JSgI7X6MyQeMfChUXWuUiP1Eq/VFMtmagYvnJl0c.GuLOaVQxy', 'Lucas', '', '', '', '0000-00-00 00:00:00', '', 0, '', '2014-12-02 00:00:00', '2014-12-20 20:40:07', '4B5o1CaQTXq4yl6neEtYzBdIbOy1Ad89rg0sQgWTp8TzpNo1yyohwWNlWyjj', ''),
(3, 2, 'sda@sacsa.com', 'saasfasf', 'asd', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-12 11:05:19', '2014-12-12 11:05:19', '', ''),
(4, 15, 'asf@cscs.com', 'waseem', 'asfasf', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-12 12:17:36', '2014-12-12 12:17:36', '', ''),
(5, 10, 'dsg@ascsa.com', '$2y$10$F51VAmON9kv9Kj8ByHBB7OgKrMSmnEfylH4bxon/bQb4Njv9iY6U.', 'gfsdgsd', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-12 12:19:31', '2014-12-12 12:19:31', '', ''),
(6, 1, 'wasxxm2@gmail.com', '$2y$10$FJfa6ThRI.loE4X1VWhx1enZtYEngK8jYQyZJTlkbakDiNFEQLSZe', 'Anwar', '', '', '1418892881549296512f8f7401.jpg', '0000-00-00 00:00:00', '', 1, '', '2014-12-18 08:49:35', '2014-12-18 08:54:41', '', ''),
(8, 1, 'asswasxxm@gmail.com', '$2y$10$JelWYURpihP5Wl8FSw0T.uTpGs93vPUBUYqYfJLpt/rjSvfwu3odq', 'Waseem', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-20 13:54:02', '2014-12-20 23:42:12', 'oT7V4zS5e4zn1rCrMIpqqQVVwmqRWVRT0kewEpC72NKBxPWb5dwRhGgHuRwp', ''),
(9, 1, 'minhaj@gmail.com', '$2y$10$6EKdoKkcmfGpTQs/fd6l0.BPyRfg4iLvBFE0DIU3/uNPmaIKuskMe', 'Minhaj', 'Hello', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-20 19:34:57', '2014-12-20 23:17:58', 'KxaGnl2tYLtxrJo2RdtF1AW9XYPce9fH9XPJdUZ045dj89z6oFIltSVru7Cx', ''),
(10, 1, 'ikram@gmail.com', '$2y$10$3PdfbJajEWk1E0C4oZweEeD6C5dQyYZ5icP2JRIGwNYJz06jtr1/e', 'Ikram', 'CEO', '', '1419521676549c2e8cd8ae4692.jpg', '0000-00-00 00:00:00', '', 1, '', '2014-12-20 23:57:05', '2014-12-30 14:32:44', 'q8cfFbcizjUHvm7MZ5sQNfTcRFqIHRySn7uZl79fiLsXV7lJ8tpzLAVNYYHO', ''),
(11, 1, 'asds@sacc.com', '$2y$10$Guy2ymt/X/4xZjTqIWWFqub5qN5IqC4PHhy826zbvPcIRXwHbA93G', 'asda', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-25 16:01:36', '2014-12-25 16:01:36', '', ''),
(12, 1, 'asdasd@sacasc.com', '$2y$10$GgKgzNa8vLABgLqC2sDLWuE4kScNn1P/uHBIudq36IqikwPkscQLK', 'sasfs', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-25 16:01:53', '2014-12-25 16:01:53', '', ''),
(13, 1, 'sdfsd@assad.com', '$2y$10$Rz6.tDvVFXIbbVqrH/MUue5i53YfcwJfRpjhS1neXumZ8XkcZUB86', 'ssfsdfsd', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-25 16:02:08', '2014-12-25 16:02:08', '', ''),
(14, 1, 'fsdfds@ascsdcds.com', '$2y$10$3RS.MeUukuzXZZc2DNb0b.dIFYRv9vpyKyS72NvwjMhzlfsjQRHsu', 'dsdfsdfsd', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-25 16:02:32', '2014-12-25 16:02:32', '', ''),
(15, 1, 'dsfsdfsd@ac.com', '$2y$10$mTS2U5ZsBzX3/THkuo7WnuYei.OFRnc8rKkJBvdknyg925vrA2Fse', 'dsfsf', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-25 16:03:18', '2014-12-25 16:03:18', '', ''),
(16, 1, 'sadsa@sacsc.cscom', '$2y$10$yAR7sDawD254OxqEIbtR3uS1bxOTQt2MvPUmvk33LnoFCsASzbKFS', 'sdfdsfsdf', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-25 16:03:31', '2014-12-25 16:03:31', '', ''),
(17, 1, 'sad@csdcsdc.com', '$2y$10$ITPWpkZzRSHxTdsduGnw9eJBvEMZvb03IPisEdFRfYU.2LZEOZZlu', 'dcsd', '', '', '', '0000-00-00 00:00:00', '', 1, '', '2014-12-25 16:07:32', '2014-12-25 16:07:32', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_departments`
--

CREATE TABLE IF NOT EXISTS `user_departments` (
`user_department_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_departments`
--

INSERT INTO `user_departments` (`user_department_id`, `user_id`, `department_id`, `company_id`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, '2014-12-24 17:03:30', '2014-12-24 17:03:30'),
(8, 1, 2, 1, '2014-12-24 19:31:42', '2014-12-24 19:31:42'),
(9, 9, 1, 1, '2014-12-26 10:04:34', '2014-12-26 10:04:34'),
(10, 10, 1, 1, '2014-12-30 14:32:16', '2014-12-30 14:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE IF NOT EXISTS `user_permissions` (
`user_permission_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_permission_set_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`user_permission_id`, `user_id`, `user_permission_set_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`), ADD UNIQUE KEY `admin_fullname` (`admin_fullname`,`admin_email`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
 ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `asset_categories`
--
ALTER TABLE `asset_categories`
 ADD PRIMARY KEY (`asset_category_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
 ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bank_transactions`
--
ALTER TABLE `bank_transactions`
 ADD PRIMARY KEY (`bank_transaction_id`);

--
-- Indexes for table `cash_transactions`
--
ALTER TABLE `cash_transactions`
 ADD PRIMARY KEY (`cash_transaction_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`), ADD KEY `countries_id_index` (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
 ADD PRIMARY KEY (`department_id`), ADD UNIQUE KEY `department_company_id` (`department_company_id`,`department_name`);

--
-- Indexes for table `department_permissions`
--
ALTER TABLE `department_permissions`
 ADD PRIMARY KEY (`department_permission_id`), ADD UNIQUE KEY `department_id` (`department_id`,`department_permission_set_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
 ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
 ADD PRIMARY KEY (`expense_type_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
 ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `income_types`
--
ALTER TABLE `income_types`
 ADD PRIMARY KEY (`income_type_id`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
 ADD PRIMARY KEY (`inventory_item_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `password_reminders`
 ADD KEY `password_reminders_email_index` (`email`), ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
 ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
 ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`permission_id`), ADD UNIQUE KEY `permission_name` (`permission_name`);

--
-- Indexes for table `permission_sets`
--
ALTER TABLE `permission_sets`
 ADD PRIMARY KEY (`permission_set_id`), ADD UNIQUE KEY `permission_set_name` (`permission_set_name`,`company_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
 ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_purchase_request`
--
ALTER TABLE `product_purchase_request`
 ADD PRIMARY KEY (`product_purchase_request_id`), ADD UNIQUE KEY `purchase_request_id` (`purchase_request_id`,`product_id`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
 ADD PRIMARY KEY (`purchase_invoice_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
 ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
 ADD PRIMARY KEY (`purchase_request_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_budgets`
--
ALTER TABLE `sale_budgets`
 ADD PRIMARY KEY (`sale_budget_id`);

--
-- Indexes for table `sale_contracts`
--
ALTER TABLE `sale_contracts`
 ADD PRIMARY KEY (`sale_contract_id`);

--
-- Indexes for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
 ADD PRIMARY KEY (`sale_invoice_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`setting_id`), ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
 ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_departments`
--
ALTER TABLE `user_departments`
 ADD PRIMARY KEY (`user_department_id`), ADD UNIQUE KEY `user_id` (`user_id`,`department_id`,`company_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
 ADD PRIMARY KEY (`user_permission_id`), ADD UNIQUE KEY `user_id` (`user_id`,`user_permission_set_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
MODIFY `asset_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asset_categories`
--
ALTER TABLE `asset_categories`
MODIFY `asset_category_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
MODIFY `bank_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank_transactions`
--
ALTER TABLE `bank_transactions`
MODIFY `bank_transaction_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cash_transactions`
--
ALTER TABLE `cash_transactions`
MODIFY `cash_transaction_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `client_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `department_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `department_permissions`
--
ALTER TABLE `department_permissions`
MODIFY `department_permission_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `employee_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
MODIFY `expense_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
MODIFY `expense_type_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
MODIFY `income_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `income_types`
--
ALTER TABLE `income_types`
MODIFY `income_type_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
MODIFY `inventory_item_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
MODIFY `payment_type_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
MODIFY `payroll_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `permission_sets`
--
ALTER TABLE `permission_sets`
MODIFY `permission_set_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
MODIFY `product_category_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_purchase_request`
--
ALTER TABLE `product_purchase_request`
MODIFY `product_purchase_request_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
MODIFY `purchase_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
MODIFY `purchase_order_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
MODIFY `purchase_request_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `sale_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_budgets`
--
ALTER TABLE `sale_budgets`
MODIFY `sale_budget_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_contracts`
--
ALTER TABLE `sale_contracts`
MODIFY `sale_contract_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
MODIFY `sale_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `setting_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `supplier_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
MODIFY `tax_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_departments`
--
ALTER TABLE `user_departments`
MODIFY `user_department_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
MODIFY `user_permission_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
