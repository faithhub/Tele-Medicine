-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2020 at 11:26 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xerohsoa_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `speciality_id` int(50) NOT NULL,
  `book_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Confirmed','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caller_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dial_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `dial_code`, `currency_name`, `currency_symbol`, `currency_code`, `created_at`, `updated_at`) VALUES
(1, 'Andorra', 'AD', '+376', 'Euro', '€', 'EUR', NULL, NULL),
(2, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates', 'د.إ', 'AED', NULL, NULL),
(3, 'Afghanistan', 'AF', '+93', 'Afghan afghani', '؋', 'AFN', NULL, NULL),
(4, 'Antigua and Barbuda', 'AG', '+1268', 'East Caribbean dolla', '$', 'XCD', NULL, NULL),
(5, 'Anguilla', 'AI', '+1264', 'East Caribbean dolla', '$', 'XCD', NULL, NULL),
(6, 'Albania', 'AL', '+355', 'Albanian lek', 'L', 'ALL', NULL, NULL),
(7, 'Armenia', 'AM', '+374', 'Armenian dram', '', 'AMD', NULL, NULL),
(8, 'Angola', 'AO', '+244', 'Angolan kwanza', 'Kz', 'AOA', NULL, NULL),
(9, 'Argentina', 'AR', '+54', 'Argentine peso', '$', 'ARS', NULL, NULL),
(10, 'Austria', 'AT', '+43', 'Euro', '€', 'EUR', NULL, NULL),
(11, 'Australia', 'AU', '+61', 'Australian dollar', '$', 'AUD', NULL, NULL),
(12, 'Aruba', 'AW', '+297', 'Aruban florin', 'ƒ', 'AWG', NULL, NULL),
(13, 'Azerbaijan', 'AZ', '+994', 'Azerbaijani manat', '', 'AZN', NULL, NULL),
(14, 'Barbados', 'BB', '+1246', 'Barbadian dollar', '$', 'BBD', NULL, NULL),
(15, 'Bangladesh', 'BD', '+880', 'Bangladeshi taka', '৳', 'BDT', NULL, NULL),
(16, 'Belgium', 'BE', '+32', 'Euro', '€', 'EUR', NULL, NULL),
(17, 'Burkina Faso', 'BF', '+226', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL),
(18, 'Bulgaria', 'BG', '+359', 'Bulgarian lev', 'лв', 'BGN', NULL, NULL),
(19, 'Bahrain', 'BH', '+973', 'Bahraini dinar', '.د.ب', 'BHD', NULL, NULL),
(20, 'Burundi', 'BI', '+257', 'Burundian franc', 'Fr', 'BIF', NULL, NULL),
(21, 'Benin', 'BJ', '+229', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL),
(22, 'Bermuda', 'BM', '+1441', 'Bermudian dollar', '$', 'BMD', NULL, NULL),
(23, 'Brazil', 'BR', '+55', 'Brazilian real', 'R$', 'BRL', NULL, NULL),
(24, 'Bhutan', 'BT', '+975', 'Bhutanese ngultrum', 'Nu.', 'BTN', NULL, NULL),
(25, 'Botswana', 'BW', '+267', 'Botswana pula', 'P', 'BWP', NULL, NULL),
(26, 'Belarus', 'BY', '+375', 'Belarusian ruble', 'Br', 'BYR', NULL, NULL),
(27, 'Belize', 'BZ', '+501', 'Belize dollar', '$', 'BZD', NULL, NULL),
(28, 'Canada', 'CA', '+1', 'Canadian dollar', '$', 'CAD', NULL, NULL),
(29, 'Switzerland', 'CH', '+41', 'Swiss franc', 'Fr', 'CHF', NULL, NULL),
(30, 'Cote d\'Ivoire', 'CI', '+225', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL),
(31, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', '$', 'NZD', NULL, NULL),
(32, 'Chile', 'CL', '+56', 'Chilean peso', '$', 'CLP', NULL, NULL),
(33, 'Cameroon', 'CM', '+237', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL),
(34, 'China', 'CN', '+86', 'Chinese yuan', '¥ or 元', 'CNY', NULL, NULL),
(35, 'Colombia', 'CO', '+57', 'Colombian peso', '$', 'COP', NULL, NULL),
(36, 'Costa Rica', 'CR', '+506', 'Costa Rican colón', '₡', 'CRC', NULL, NULL),
(37, 'Cuba', 'CU', '+53', 'Cuban convertible pe', '$', 'CUC', NULL, NULL),
(38, 'Cape Verde', 'CV', '+238', 'Cape Verdean escudo', 'Esc or $', 'CVE', NULL, NULL),
(39, 'Cyprus', 'CY', '+357', 'Euro', '€', 'EUR', NULL, NULL),
(40, 'Czech Republic', 'CZ', '+420', 'Czech koruna', 'Kč', 'CZK', NULL, NULL),
(41, 'Germany', 'DE', '+49', 'Euro', '€', 'EUR', NULL, NULL),
(42, 'Djibouti', 'DJ', '+253', 'Djiboutian franc', 'Fr', 'DJF', NULL, NULL),
(43, 'Denmark', 'DK', '+45', 'Danish krone', 'kr', 'DKK', NULL, NULL),
(44, 'Dominica', 'DM', '+1767', 'East Caribbean dolla', '$', 'XCD', NULL, NULL),
(45, 'Dominican Republic', 'DO', '+1849', 'Dominican peso', '$', 'DOP', NULL, NULL),
(46, 'Algeria', 'DZ', '+213', 'Algerian dinar', 'د.ج', 'DZD', NULL, NULL),
(47, 'Ecuador', 'EC', '+593', 'United States dollar', '$', 'USD', NULL, NULL),
(48, 'Estonia', 'EE', '+372', 'Euro', '€', 'EUR', NULL, NULL),
(49, 'Egypt', 'EG', '+20', 'Egyptian pound', '£ or ج.م', 'EGP', NULL, NULL),
(50, 'Eritrea', 'ER', '+291', 'Eritrean nakfa', 'Nfk', 'ERN', NULL, NULL),
(51, 'Spain', 'ES', '+34', 'Euro', '€', 'EUR', NULL, NULL),
(52, 'Ethiopia', 'ET', '+251', 'Ethiopian birr', 'Br', 'ETB', NULL, NULL),
(53, 'Finland', 'FI', '+358', 'Euro', '€', 'EUR', NULL, NULL),
(54, 'Fiji', 'FJ', '+679', 'Fijian dollar', '$', 'FJD', NULL, NULL),
(55, 'Faroe Islands', 'FO', '+298', 'Danish krone', 'kr', 'DKK', NULL, NULL),
(56, 'France', 'FR', '+33', 'Euro', '€', 'EUR', NULL, NULL),
(57, 'Gabon', 'GA', '+241', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL),
(58, 'United Kingdom', 'GB', '+44', 'British pound', '£', 'GBP', NULL, NULL),
(59, 'Grenada', 'GD', '+1473', 'East Caribbean dolla', '$', 'XCD', NULL, NULL),
(60, 'Georgia', 'GE', '+995', 'Georgian lari', 'ლ', 'GEL', NULL, NULL),
(61, 'Guernsey', 'GG', '+44', 'British pound', '£', 'GBP', NULL, NULL),
(62, 'Ghana', 'GH', '+233', 'Ghana cedi', '₵', 'GHS', NULL, NULL),
(63, 'Gibraltar', 'GI', '+350', 'Gibraltar pound', '£', 'GIP', NULL, NULL),
(64, 'Guinea', 'GN', '+224', 'Guinean franc', 'Fr', 'GNF', NULL, NULL),
(65, 'Equatorial Guinea', 'GQ', '+240', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL),
(66, 'Greece', 'GR', '+30', 'Euro', '€', 'EUR', NULL, NULL),
(67, 'Guatemala', 'GT', '+502', 'Guatemalan quetzal', 'Q', 'GTQ', NULL, NULL),
(68, 'Guinea-Bissau', 'GW', '+245', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL),
(69, 'Guyana', 'GY', '+595', 'Guyanese dollar', '$', 'GYD', NULL, NULL),
(70, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', '$', 'HKD', NULL, NULL),
(71, 'Honduras', 'HN', '+504', 'Honduran lempira', 'L', 'HNL', NULL, NULL),
(72, 'Croatia', 'HR', '+385', 'Croatian kuna', 'kn', 'HRK', NULL, NULL),
(73, 'Haiti', 'HT', '+509', 'Haitian gourde', 'G', 'HTG', NULL, NULL),
(74, 'Hungary', 'HU', '+36', 'Hungarian forint', 'Ft', 'HUF', NULL, NULL),
(75, 'Indonesia', 'ID', '+62', 'Indonesian rupiah', 'Rp', 'IDR', NULL, NULL),
(76, 'Ireland', 'IE', '+353', 'Euro', '€', 'EUR', NULL, NULL),
(77, 'Israel', 'IL', '+972', 'Israeli new shekel', '₪', 'ILS', NULL, NULL),
(78, 'Isle of Man', 'IM', '+44', 'British pound', '£', 'GBP', NULL, NULL),
(79, 'India', 'IN', '+91', 'Indian rupee', '₹', 'INR', NULL, NULL),
(80, 'Iraq', 'IQ', '+964', 'Iraqi dinar', 'ع.د', 'IQD', NULL, NULL),
(81, 'Iceland', 'IS', '+354', 'Icelandic króna', 'kr', 'ISK', NULL, NULL),
(82, 'Italy', 'IT', '+39', 'Euro', '€', 'EUR', NULL, NULL),
(83, 'Jersey', 'JE', '+44', 'British pound', '£', 'GBP', NULL, NULL),
(84, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', '$', 'JMD', NULL, NULL),
(85, 'Jordan', 'JO', '+962', 'Jordanian dinar', 'د.ا', 'JOD', NULL, NULL),
(86, 'Japan', 'JP', '+81', 'Japanese yen', '¥', 'JPY', NULL, NULL),
(87, 'Kenya', 'KE', '+254', 'Kenyan shilling', 'Sh', 'KES', NULL, NULL),
(88, 'Kyrgyzstan', 'KG', '+996', 'Kyrgyzstani som', 'лв', 'KGS', NULL, NULL),
(89, 'Cambodia', 'KH', '+855', 'Cambodian riel', '៛', 'KHR', NULL, NULL),
(90, 'Kiribati', 'KI', '+686', 'Australian dollar', '$', 'AUD', NULL, NULL),
(91, 'Comoros', 'KM', '+269', 'Comorian franc', 'Fr', 'KMF', NULL, NULL),
(92, 'Kuwait', 'KW', '+965', 'Kuwaiti dinar', 'د.ك', 'KWD', NULL, NULL),
(93, 'Cayman Islands', 'KY', '+ 345', 'Cayman Islands dolla', '$', 'KYD', NULL, NULL),
(94, 'Kazakhstan', 'KZ', '+7 7', 'Kazakhstani tenge', '', 'KZT', NULL, NULL),
(95, 'Laos', 'LA', '+856', 'Lao kip', '₭', 'LAK', NULL, NULL),
(96, 'Lebanon', 'LB', '+961', 'Lebanese pound', 'ل.ل', 'LBP', NULL, NULL),
(97, 'Saint Lucia', 'LC', '+1758', 'East Caribbean dolla', '$', 'XCD', NULL, NULL),
(98, 'Liechtenstein', 'LI', '+423', 'Swiss franc', 'Fr', 'CHF', NULL, NULL),
(99, 'Sri Lanka', 'LK', '+94', 'Sri Lankan rupee', 'Rs or රු', 'LKR', NULL, NULL),
(100, 'Liberia', 'LR', '+231', 'Liberian dollar', '$', 'LRD', NULL, NULL),
(101, 'Lesotho', 'LS', '+266', 'Lesotho loti', 'L', 'LSL', NULL, NULL),
(102, 'Lithuania', 'LT', '+370', 'Euro', '€', 'EUR', NULL, NULL),
(103, 'Luxembourg', 'LU', '+352', 'Euro', '€', 'EUR', NULL, NULL),
(104, 'Latvia', 'LV', '+371', 'Euro', '€', 'EUR', NULL, NULL),
(105, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'د.م.', 'MAD', NULL, NULL),
(106, 'Monaco', 'MC', '+377', 'Euro', '€', 'EUR', NULL, NULL),
(107, 'Moldova', 'MD', '+373', 'Moldovan leu', 'L', 'MDL', NULL, NULL),
(108, 'Montenegro', 'ME', '+382', 'Euro', '€', 'EUR', NULL, NULL),
(109, 'Madagascar', 'MG', '+261', 'Malagasy ariary', 'Ar', 'MGA', NULL, NULL),
(110, 'Marshall Islands', 'MH', '+692', 'United States dollar', '$', 'USD', NULL, NULL),
(111, 'Mali', 'ML', '+223', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL),
(112, 'Myanmar', 'MM', '+95', 'Burmese kyat', 'Ks', 'MMK', NULL, NULL),
(113, 'Mongolia', 'MN', '+976', 'Mongolian tögrög', '₮', 'MNT', NULL, NULL),
(114, 'Mauritania', 'MR', '+222', 'Mauritanian ouguiya', 'UM', 'MRO', NULL, NULL),
(115, 'Montserrat', 'MS', '+1664', 'East Caribbean dolla', '$', 'XCD', NULL, NULL),
(116, 'Malta', 'MT', '+356', 'Euro', '€', 'EUR', NULL, NULL),
(117, 'Mauritius', 'MU', '+230', 'Mauritian rupee', '₨', 'MUR', NULL, NULL),
(118, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', '.ރ', 'MVR', NULL, NULL),
(119, 'Malawi', 'MW', '+265', 'Malawian kwacha', 'MK', 'MWK', NULL, NULL),
(120, 'Mexico', 'MX', '+52', 'Mexican peso', '$', 'MXN', NULL, NULL),
(121, 'Malaysia', 'MY', '+60', 'Malaysian ringgit', 'RM', 'MYR', NULL, NULL),
(122, 'Mozambique', 'MZ', '+258', 'Mozambican metical', 'MT', 'MZN', NULL, NULL),
(123, 'Namibia', 'NA', '+264', 'Namibian dollar', '$', 'NAD', NULL, NULL),
(124, 'New Caledonia', 'NC', '+687', 'CFP franc', 'Fr', 'XPF', NULL, NULL),
(125, 'Niger', 'NE', '+227', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL),
(126, 'Nigeria', 'NG', '+234', 'Nigerian naira', '₦', 'NGN', NULL, NULL),
(127, 'Nicaragua', 'NI', '+505', 'Nicaraguan córdoba', 'C$', 'NIO', NULL, NULL),
(128, 'Netherlands', 'NL', '+31', 'Euro', '€', 'EUR', NULL, NULL),
(129, 'Norway', 'NO', '+47', 'Norwegian krone', 'kr', 'NOK', NULL, NULL),
(130, 'Nepal', 'NP', '+977', 'Nepalese rupee', '₨', 'NPR', NULL, NULL),
(131, 'Nauru', 'NR', '+674', 'Australian dollar', '$', 'AUD', NULL, NULL),
(132, 'Niue', 'NU', '+683', 'New Zealand dollar', '$', 'NZD', NULL, NULL),
(133, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', '$', 'NZD', NULL, NULL),
(134, 'Oman', 'OM', '+968', 'Omani rial', 'ر.ع.', 'OMR', NULL, NULL),
(135, 'Panama', 'PA', '+507', 'Panamanian balboa', 'B/.', 'PAB', NULL, NULL),
(136, 'Peru', 'PE', '+51', 'Peruvian nuevo sol', 'S/.', 'PEN', NULL, NULL),
(137, 'French Polynesia', 'PF', '+689', 'CFP franc', 'Fr', 'XPF', NULL, NULL),
(138, 'Papua New Guinea', 'PG', '+675', 'Papua New Guinean ki', 'K', 'PGK', NULL, NULL),
(139, 'Philippines', 'PH', '+63', 'Philippine peso', '₱', 'PHP', NULL, NULL),
(140, 'Pakistan', 'PK', '+92', 'Pakistani rupee', '₨', 'PKR', NULL, NULL),
(141, 'Poland', 'PL', '+48', 'Polish z?oty', 'zł', 'PLN', NULL, NULL),
(142, 'Portugal', 'PT', '+351', 'Euro', '€', 'EUR', NULL, NULL),
(143, 'Palau', 'PW', '+680', 'Palauan dollar', '$', '', NULL, NULL),
(144, 'Paraguay', 'PY', '+595', 'Paraguayan guaraní', '₲', 'PYG', NULL, NULL),
(145, 'Qatar', 'QA', '+974', 'Qatari riyal', 'ر.ق', 'QAR', NULL, NULL),
(146, 'Romania', 'RO', '+40', 'Romanian leu', 'lei', 'RON', NULL, NULL),
(147, 'Serbia', 'RS', '+381', 'Serbian dinar', 'дин. or din.', 'RSD', NULL, NULL),
(148, 'Russia', 'RU', '+7', 'Russian ruble', '', 'RUB', NULL, NULL),
(149, 'Rwanda', 'RW', '+250', 'Rwandan franc', 'Fr', 'RWF', NULL, NULL),
(150, 'Saudi Arabia', 'SA', '+966', 'Saudi riyal', 'ر.س', 'SAR', NULL, NULL),
(151, 'Solomon Islands', 'SB', '+677', 'Solomon Islands doll', '$', 'SBD', NULL, NULL),
(152, 'Seychelles', 'SC', '+248', 'Seychellois rupee', '₨', 'SCR', NULL, NULL),
(153, 'Sudan', 'SD', '+249', 'Sudanese pound', 'ج.س.', 'SDG', NULL, NULL),
(154, 'Sweden', 'SE', '+46', 'Swedish krona', 'kr', 'SEK', NULL, NULL),
(155, 'Singapore', 'SG', '+65', 'Brunei dollar', '$', 'BND', NULL, NULL),
(156, 'Slovenia', 'SI', '+386', 'Euro', '€', 'EUR', NULL, NULL),
(157, 'Slovakia', 'SK', '+421', 'Euro', '€', 'EUR', NULL, NULL),
(158, 'Sierra Leone', 'SL', '+232', 'Sierra Leonean leone', 'Le', 'SLL', NULL, NULL),
(159, 'San Marino', 'SM', '+378', 'Euro', '€', 'EUR', NULL, NULL),
(160, 'Senegal', 'SN', '+221', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL),
(161, 'Somalia', 'SO', '+252', 'Somali shilling', 'Sh', 'SOS', NULL, NULL),
(162, 'Suriname', 'SR', '+597', 'Surinamese dollar', '$', 'SRD', NULL, NULL),
(163, 'El Salvador', 'SV', '+503', 'United States dollar', '$', 'USD', NULL, NULL),
(164, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'L', 'SZL', NULL, NULL),
(165, 'Chad', 'TD', '+235', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL),
(166, 'Togo', 'TG', '+228', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL),
(167, 'Thailand', 'TH', '+66', 'Thai baht', '฿', 'THB', NULL, NULL),
(168, 'Tajikistan', 'TJ', '+992', 'Tajikistani somoni', 'ЅМ', 'TJS', NULL, NULL),
(169, 'Turkmenistan', 'TM', '+993', 'Turkmenistan manat', 'm', 'TMT', NULL, NULL),
(170, 'Tunisia', 'TN', '+216', 'Tunisian dinar', 'د.ت', 'TND', NULL, NULL),
(171, 'Tonga', 'TO', '+676', 'Tongan pa?anga', 'T$', 'TOP', NULL, NULL),
(172, 'Turkey', 'TR', '+90', 'Turkish lira', '', 'TRY', NULL, NULL),
(173, 'Trinidad and Tobago', 'TT', '+1868', 'Trinidad and Tobago ', '$', 'TTD', NULL, NULL),
(174, 'Tuvalu', 'TV', '+688', 'Australian dollar', '$', 'AUD', NULL, NULL),
(175, 'Taiwan', 'TW', '+886', 'New Taiwan dollar', '$', 'TWD', NULL, NULL),
(176, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', '₴', 'UAH', NULL, NULL),
(177, 'Uganda', 'UG', '+256', 'Ugandan shilling', 'Sh', 'UGX', NULL, NULL),
(178, 'United States', 'US', '+1', 'United States dollar', '$', 'USD', NULL, NULL),
(179, 'Uruguay', 'UY', '+598', 'Uruguayan peso', '$', 'UYU', NULL, NULL),
(180, 'Uzbekistan', 'UZ', '+998', 'Uzbekistani som', '', 'UZS', NULL, NULL),
(181, 'Vietnam', 'VN', '+84', 'Vietnamese ??ng', '₫', 'VND', NULL, NULL),
(182, 'Vanuatu', 'VU', '+678', 'Vanuatu vatu', 'Vt', 'VUV', NULL, NULL),
(183, 'Wallis and Futuna', 'WF', '+681', 'CFP franc', 'Fr', 'XPF', NULL, NULL),
(184, 'Samoa', 'WS', '+685', 'Samoan t?l?', 'T', 'WST', NULL, NULL),
(185, 'Yemen', 'YE', '+967', 'Yemeni rial', '﷼', 'YER', NULL, NULL),
(186, 'South Africa', 'ZA', '+27', 'South African rand', 'R', 'ZAR', NULL, NULL),
(187, 'Zambia', 'ZM', '+260', 'Zambian kwacha', 'ZK', 'ZMW', NULL, NULL),
(188, 'Zimbabwe', 'ZW', '+263', 'Botswana pula', 'P', 'BWP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_22_194805_create_doctors_table', 2),
(5, '2020_08_22_194837_create_patients_table', 2),
(6, '2020_08_22_194855_create_admins_table', 2),
(7, '2020_08_22_195944_create_specialities_table', 3),
(8, '2020_08_22_200953_create_countries_table', 4),
(9, '2020_08_27_024307_create_payments_table', 5),
(10, '2020_08_28_014222_create_social_identities_table', 6),
(11, '2020_08_30_021311_create_appointments_table', 7),
(12, '2020_09_01_211037_create_prescriptions_table', 8),
(13, '2020_09_06_151918_create_settings_table', 9),
(14, '2020_09_06_170335_create_calls_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tx_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `status`, `transaction_id`, `tx_ref`, `created_at`, `updated_at`) VALUES
(1, '2', 'successful', '1493063', 'hooli-tx-1920bbtyt', '2020-08-27 02:21:32', '2020-08-27 02:21:32'),
(2, '16', 'successful', '1513010', 'hooli-tx-1920bbtyt', '2020-09-04 14:56:04', '2020-09-04 14:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mg_ml` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overall_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctor_id`, `user_id`, `medicine_type`, `medicine_name`, `mg_ml`, `dose`, `day`, `medicine_comment`, `overall_comment`, `created_at`, `updated_at`) VALUES
(2, '1', '5', 'ksajbdjvhbasj', 'hjbfvvj', 'hjvajhfvjv', 'jvjvsfbbvj', 'vjhvfvbj', 'hvjhvshjdvsjhvdbjbsvjh', 'jhbfvjvshfjvhbdsjjh', '2020-09-02 13:26:52', '2020-09-02 13:26:52'),
(3, '1', '2', 'lbjjkasbdjasb', 'jhbjhfvvasbfjcabvsj', 'bjdwsjabfjasbjfh', 'jebdsbfbasdjdvhsajhv', 'bjsbdjfbhsbdj', 'bjhbadsbfhsdbfhdsbf', 'bjbfehjbfdsjbhfj', '2020-09-02 22:39:45', '2020-09-02 22:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dashboard_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tx_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACEBOOK_CLINET_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACEBOOK_CLINET_SECRET` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GMAIL_CLINET_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GMAIL_CLINET_SECRET` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TWITTER_CLINET_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TWITTER_CLINET_SECRET` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_secret` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_logo`, `dashboard_logo`, `email`, `mobile`, `address`, `facebook_link`, `twitter_link`, `instagram_link`, `public_key`, `tx_ref`, `amount`, `FACEBOOK_CLINET_ID`, `FACEBOOK_CLINET_SECRET`, `GMAIL_CLINET_ID`, `GMAIL_CLINET_SECRET`, `TWITTER_CLINET_ID`, `TWITTER_CLINET_SECRET`, `api_key`, `api_secret`, `created_at`, `updated_at`) VALUES
(1, 'image06Sep20201599407725.png', 'image06Sep20201599407910.png', 'adebayooluwadara@gmail.com', '08060373371', 'JOLLY HOSTEL, IFE, OSUN STATE', '', '', '', '', '', '', '', '', '', '', '', '', '46910364', 'b669016847c0e6cb7fca39162e34ea34914fc251', NULL, '2020-09-06 15:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `social_identities`
--

CREATE TABLE `social_identities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ayurveda', 'Active', '2020-08-23 16:04:31', NULL),
(2, 'Gynecologist', 'Active', '2020-08-23 16:04:31', NULL),
(3, 'Cardiologist', 'Active', '2020-08-23 16:05:37', NULL),
(4, 'Eye Care', 'Active', '2020-08-23 16:05:37', NULL),
(5, 'Urologist', 'Active', '2020-08-23 16:06:20', NULL),
(6, 'Pulmonologist', 'Active', '2020-08-23 16:06:20', NULL),
(7, 'Orthopedic', 'Active', '2020-08-23 16:06:55', NULL),
(8, 'Gastrologist', 'Active', '2020-08-23 16:06:55', NULL),
(9, 'Homeopathy', 'Active', '2020-08-23 16:07:31', NULL),
(10, 'Dermatologist', 'Active', '2020-08-23 16:07:31', NULL),
(11, 'Dentist', 'Active', '2020-08-23 16:08:12', NULL),
(12, 'Neurologist', 'Active', '2020-08-23 16:08:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality_id` int(10) NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(5) NOT NULL,
  `verify` int(2) NOT NULL DEFAULT 0,
  `paid` int(2) NOT NULL DEFAULT 0,
  `status` enum('Pending','Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `dob`, `speciality_id`, `about`, `gender`, `picture`, `cv`, `address`, `country_id`, `verify`, `paid`, `status`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@gmail.com', '08060373371', '2020-08-24', 2, 'jhvasxj nbsva nsvah xsva', 'Male', 'image24Aug20201598236634.jpg', 'cv24Aug20201598236634.pdf', 'JOLLY HOSTEL, IFE, OSUN STATE', 126, 0, 0, 'Active', 'Admin', NULL, '$2y$10$.49depMxcqO1muhlH9vWFuXvL4apowi1i1BfZrqRsxfG60.pBV/a2', NULL, '2020-08-24 01:37:14', '2020-09-03 01:51:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_identities`
--
ALTER TABLE `social_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_identities_provider_id_unique` (`provider_id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_identities`
--
ALTER TABLE `social_identities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
