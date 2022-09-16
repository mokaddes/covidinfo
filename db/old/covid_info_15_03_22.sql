-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2022 at 06:02 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Use this country in applications',
  `code3l` varchar(3) NOT NULL COMMENT 'ISO 3166-1 alpha-3 three-letter code',
  `code2l` varchar(2) NOT NULL COMMENT 'ISO 3166-1 alpha-2 two-letter code',
  `name` varchar(64) NOT NULL COMMENT 'Name of the country in English',
  `name_official` varchar(128) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `zoom` tinyint(1) DEFAULT NULL COMMENT 'Optimal zoom when showing country on map',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_countries_name` (`name`),
  UNIQUE KEY `idx_countries_code3l` (`code3l`),
  UNIQUE KEY `idx_countries_code2l` (`code2l`)
) ENGINE=InnoDB AUTO_INCREMENT=251 AVG_ROW_LENGTH=434 DEFAULT CHARSET=utf8 COMMENT='Hold the list of countries. Each country is a row';

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `enabled`, `code3l`, `code2l`, `name`, `name_official`, `latitude`, `longitude`, `zoom`) VALUES
(1, 1, 'AFG', 'AF', 'Afghanistan', 'Islamic Republic of Afghanistan', '33.98299275', '66.39159363', 6),
(2, 1, 'ALB', 'AL', 'Albania', 'Republic of Albania', '41.00017358', '19.87170014', 7),
(3, 1, 'DZA', 'DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', '27.89861690', '3.19771194', 5),
(4, 1, 'AND', 'AD', 'Andorra', 'Principality of Andorra', '42.54057088', '1.55201340', 11),
(5, 1, 'AGO', 'AO', 'Angola', 'Republic of Angola', '-12.16469683', '16.70933622', 6),
(6, 1, 'ATG', 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', '17.48060423', '-61.42014426', 9),
(7, 1, 'ARG', 'AR', 'Argentina', 'Argentine Republic', '-38.01529308', '-64.97897469', 4),
(8, 1, 'ARM', 'AM', 'Armenia', 'Republic of Armenia', '40.13475528', '45.01072318', 7),
(9, 1, 'AUS', 'AU', 'Australia', 'Australia', '-26.29594646', '133.55540944', 4),
(10, 1, 'AUT', 'AT', 'Austria', 'Republic of Austria', '47.63125476', '13.18776731', 7),
(11, 1, 'AZE', 'AZ', 'Azerbaijan', 'Republic of Azerbaijan', '40.35321757', '47.46706372', 7),
(12, 1, 'BHS', 'BS', 'Bahamas', 'Commonwealth of the Bahamas', '24.45991732', '-77.68192453', 7),
(13, 1, 'BHR', 'BH', 'Bahrain', 'Kingdom of Bahrain', '25.90740996', '50.65932354', 9),
(14, 1, 'BGD', 'BD', 'Bangladesh', 'People\'s Republic of Bangladesh', '24.08273251', '90.49915527', 7),
(15, 1, 'BRB', 'BB', 'Barbados', 'Barbados', '13.19383077', '-59.54319600', 11),
(16, 1, 'BLR', 'BY', 'Belarus', 'Republic of Belarus', '53.58628747', '27.95338900', 6),
(17, 1, 'BEL', 'BE', 'Belgium', 'Kingdom of Belgium', '50.49593874', '4.46993600', 8),
(18, 1, 'BLZ', 'BZ', 'Belize', 'Belize', '17.21153631', '-88.01424956', 8),
(19, 1, 'BEN', 'BJ', 'Benin', 'Republic of Benin', '9.37180859', '2.29386134', 7),
(20, 1, 'BTN', 'BT', 'Bhutan', 'Kingdom of Bhutan', '27.50752756', '90.43360300', 8),
(21, 1, 'BIH', 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', '44.00040856', '17.81640910', 7),
(22, 1, 'BWA', 'BW', 'Botswana', 'Republic of Botswana', '-22.18279485', '24.22344422', 6),
(23, 1, 'BRA', 'BR', 'Brazil', 'Federative Republic of Brazil', '-11.80965046', '-53.33152600', 4),
(24, 1, 'BRN', 'BN', 'Brunei Darussalam', 'Brunei Darussalam', '4.54189364', '114.60132823', 9),
(25, 1, 'BGR', 'BG', 'Bulgaria', 'Republic of Bulgaria', '42.70160678', '25.48583200', 7),
(26, 1, 'BFA', 'BF', 'Burkina Faso', 'Burkina Faso', '12.22492458', '-1.56159100', 7),
(27, 1, 'BDI', 'BI', 'Burundi', 'Republic of Burundi', '-3.40499707', '29.88592902', 8),
(28, 1, 'KHM', 'KH', 'Cambodia', 'Kingdom of Cambodia', '12.83288883', '104.84814273', 7),
(29, 1, 'CMR', 'CM', 'Cameroon', 'Republic of Cameroon', '7.38622543', '12.72825915', 6),
(30, 1, 'CAN', 'CA', 'Canada', 'Canada', '60.36196817', '-106.69833150', 4),
(31, 1, 'CPV', 'CV', 'Cabo Verde', 'Republic of Cabo Verde', '15.11988711', '-23.60517010', 10),
(32, 1, 'CAF', 'CF', 'Central African Republic', 'Central African Republic', '6.82541830', '20.64281514', 6),
(33, 1, 'TCD', 'TD', 'Chad', 'Republic of Chad', '14.80342407', '18.78714064', 5),
(34, 1, 'CHL', 'CL', 'Chile', 'Republic of Chile', '-38.01760790', '-71.40014474', 4),
(35, 1, 'CHN', 'CN', 'China', 'People\'s Republic of China', '36.71457440', '103.55819197', 4),
(36, 1, 'COL', 'CO', 'Colombia', 'Republic of Colombia', '3.68182320', '-73.53927436', 5),
(37, 1, 'COM', 'KM', 'Comoros', 'Union of the Comoros', '-11.64529989', '43.33330200', 10),
(38, 1, 'COG', 'CG', 'Congo', 'Republic of the Congo', '-0.68967806', '15.69033190', 6),
(39, 1, 'CRI', 'CR', 'Costa Rica', 'Republic of Costa Rica', '9.98427463', '-84.09949534', 8),
(40, 1, 'HRV', 'HR', 'Croatia', 'Republic of Croatia', '44.81372482', '16.29039507', 7),
(41, 1, 'CUB', 'CU', 'Cuba', 'Republic of Cuba', '21.54513189', '-79.00064743', 6),
(42, 1, 'CYP', 'CY', 'Cyprus', 'Republic of Cyprus', '35.12450768', '33.42986100', 9),
(43, 1, 'CZE', 'CZ', 'Czechia', 'Czech Republic', '49.76026136', '15.53888197', 7),
(44, 1, 'CIV', 'CI', 'Côte d\'Ivoire', 'Republic of Côte d\'Ivoire', '7.59684148', '-5.49214636', 7),
(45, 1, 'DNK', 'DK', 'Denmark', 'Kingdom of Denmark', '54.71794021', '9.41938953', 6),
(46, 1, 'DJI', 'DJ', 'Djibouti', 'Republic of Djibouti', '11.75959257', '42.65344839', 8),
(47, 1, 'DMA', 'DM', 'Dominica', 'Commonwealth of Dominica', '15.41473963', '-61.37097400', 10),
(48, 1, 'DOM', 'DO', 'Dominican Republic', 'Dominican Republic', '18.73076761', '-70.16264900', 8),
(49, 1, 'ECU', 'EC', 'Ecuador', 'Republic of Ecuador', '-1.22919037', '-78.55693916', 6),
(50, 1, 'EGY', 'EG', 'Egypt', 'Arab Republic of Egypt', '26.71650873', '30.80250000', 6),
(51, 1, 'SLV', 'SV', 'El Salvador', 'Republic of El Salvador', '13.79043561', '-88.89652800', 8),
(52, 1, 'GNQ', 'GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', '1.65068442', '10.26789700', 9),
(53, 1, 'ERI', 'ER', 'Eritrea', 'State of Eritrea', '15.21227764', '39.61204792', 7),
(54, 1, 'EST', 'EE', 'Estonia', 'Republic of Estonia', '58.74041141', '25.38165099', 7),
(55, 1, 'ETH', 'ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', '9.10727589', '39.84148164', 6),
(56, 1, 'FJI', 'FJ', 'Fiji', 'Republic of Fiji', '-17.71219757', '178.06503600', 9),
(57, 1, 'FIN', 'FI', 'Finland', 'Republic of Finland', '64.69610892', '26.36339137', 5),
(58, 1, 'FRA', 'FR', 'France', 'French Republic', '46.48372145', '2.60926281', 6),
(59, 1, 'GAB', 'GA', 'Gabon', 'Gabonese Republic', '-0.43426435', '11.43916591', 7),
(60, 1, 'GMB', 'GM', 'Gambia', 'Islamic Republic of the Gambia', '13.15921146', '-15.35956748', 8),
(61, 1, 'GEO', 'GE', 'Georgia', 'Georgia', '41.82754301', '44.17329916', 7),
(62, 1, 'DEU', 'DE', 'Germany', 'Federal Republic of Germany', '50.82871201', '10.97887975', 6),
(63, 1, 'GHA', 'GH', 'Ghana', 'Republic of Ghana', '7.69154199', '-1.29234904', 7),
(64, 1, 'GRC', 'GR', 'Greece', 'Hellenic Republic', '38.52254746', '24.53794505', 6),
(65, 1, 'GRD', 'GD', 'Grenada', 'Grenada', '12.11644807', '-61.67899400', 11),
(66, 1, 'GTM', 'GT', 'Guatemala', 'Republic of Guatemala', '15.72598421', '-89.96707712', 7),
(67, 1, 'GIN', 'GN', 'Guinea', 'Republic of Guinea', '9.94301472', '-11.31711839', 7),
(68, 1, 'GNB', 'GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', '11.80050682', '-15.18040700', 8),
(69, 1, 'GUY', 'GY', 'Guyana', 'Republic of Guyana', '4.47957059', '-58.72692293', 6),
(70, 1, 'HTI', 'HT', 'Haiti', 'Republic of Haiti', '19.07430861', '-72.79607526', 8),
(71, 1, 'HND', 'HN', 'Honduras', 'Republic of Honduras', '14.64994423', '-87.01643713', 7),
(72, 1, 'HUN', 'HU', 'Hungary', 'Hungary', '46.97670384', '19.35499657', 7),
(73, 1, 'ISL', 'IS', 'Iceland', 'Republic of Iceland', '64.99294495', '-18.57038755', 6),
(74, 1, 'IND', 'IN', 'India', 'Republic of India', '20.46549519', '78.50146222', 4),
(75, 1, 'IDN', 'ID', 'Indonesia', 'Republic of Indonesia', '-2.46229680', '121.18329789', 4),
(76, 1, 'IRQ', 'IQ', 'Iraq', 'Republic of Iraq', '32.90170182', '43.19590056', 6),
(77, 1, 'IRL', 'IE', 'Ireland', 'Ireland', '53.10101628', '-8.21092302', 6),
(78, 1, 'ISR', 'IL', 'Israel', 'State of Israel', '30.85883075', '34.91753797', 7),
(79, 1, 'ITA', 'IT', 'Italy', 'Republic of Italy', '41.77810840', '12.67725128', 5),
(80, 1, 'JAM', 'JM', 'Jamaica', 'Jamaica', '18.10838487', '-77.29750600', 9),
(81, 1, 'JPN', 'JP', 'Japan', 'Japan', '37.51848822', '137.67066061', 5),
(82, 1, 'JOR', 'JO', 'Jordan', 'Hashemite Kingdom of Jordan', '31.31616588', '36.37575510', 7),
(83, 1, 'KAZ', 'KZ', 'Kazakhstan', 'Republic of Kazakhstan', '45.38592596', '68.81334444', 4),
(84, 1, 'KEN', 'KE', 'Kenya', 'Republic of Kenya', '0.19582452', '37.97212297', 6),
(85, 1, 'KIR', 'KI', 'Kiribati', 'Republic of Kiribati', '1.87085244', '-157.36259310', 10),
(86, 1, 'KWT', 'KW', 'Kuwait', 'State of Kuwait', '29.43253341', '47.71798405', 8),
(87, 1, 'KGZ', 'KG', 'Kyrgyzstan', 'Kyrgyz Republic', '41.11509878', '74.25524574', 6),
(88, 1, 'LAO', 'LA', 'Lao People\'s Democratic Republic', 'Lao People\'s Democratic Republic', '17.76075593', '103.61611347', 6),
(89, 1, 'LVA', 'LV', 'Latvia', 'Republic of Latvia', '56.86697515', '24.54826936', 7),
(90, 1, 'LBN', 'LB', 'Lebanon', 'Lebanese Republic', '34.08249284', '35.66454309', 8),
(91, 1, 'LSO', 'LS', 'Lesotho', 'Kingdom of Lesotho', '-29.60303205', '28.23361200', 8),
(92, 1, 'LBR', 'LR', 'Liberia', 'Republic of Liberia', '6.44154681', '-9.39103485', 7),
(93, 1, 'LBY', 'LY', 'Libya', 'Libya', '27.06902914', '18.19513987', 5),
(94, 1, 'LIE', 'LI', 'Liechtenstein', 'Principality of Liechtenstein', '47.16587383', '9.55537700', 11),
(95, 1, 'LTU', 'LT', 'Lithuania', 'Republic of Lithuania', '55.25095948', '23.80987587', 7),
(96, 1, 'LUX', 'LU', 'Luxembourg', 'Grand Duchy of Luxembourg', '49.81327712', '6.12958700', 9),
(97, 1, 'MDG', 'MG', 'Madagascar', 'Republic of Madagascar', '-19.79858543', '46.97898228', 5),
(98, 1, 'MWI', 'MW', 'Malawi', 'Republic of Malawi', '-12.48684092', '34.14223524', 6),
(99, 1, 'MYS', 'MY', 'Malaysia', 'Malaysia', '4.97345793', '106.54609050', 5),
(100, 1, 'MDV', 'MV', 'Maldives', 'Republic of Maldives', '-0.64224221', '73.13373313', 12),
(101, 1, 'MLI', 'ML', 'Mali', 'Republic of Mali', '17.69385811', '-1.96368730', 5),
(102, 1, 'MLT', 'MT', 'Malta', 'Republic of Malta', '35.89706403', '14.43687877', 11),
(103, 1, 'MHL', 'MH', 'Marshall Islands', 'Republic of the Marshall Islands', '7.30130732', '168.75512619', 10),
(104, 1, 'MRT', 'MR', 'Mauritania', 'Islamic Republic of Mauritania', '20.28331239', '-10.21573334', 5),
(105, 1, 'MUS', 'MU', 'Mauritius', 'Republic of Mauritius', '-20.28368188', '57.56588291', 10),
(106, 1, 'MEX', 'MX', 'Mexico', 'United Mexican States', '22.92036676', '-102.33305344', 5),
(107, 1, 'MCO', 'MC', 'Monaco', 'Principality of Monaco', '43.70463620', '6.75444978', 9),
(108, 1, 'MNG', 'MN', 'Mongolia', 'Mongolia', '46.80556270', '104.30808978', 5),
(109, 1, 'MNE', 'ME', 'Montenegro', 'Montenegro', '42.71699590', '19.09699321', 8),
(110, 1, 'MAR', 'MA', 'Morocco', 'Kingdom of Morocco', '31.95441758', '-7.26839325', 6),
(111, 1, 'MOZ', 'MZ', 'Mozambique', 'Republic of Mozambique', '-19.07617816', '33.81570282', 5),
(112, 1, 'MMR', 'MM', 'Myanmar', 'Republic of Union of Myanmar', '19.20985380', '96.54949272', 5),
(113, 1, 'NAM', 'NA', 'Namibia', 'Republic of Namibia', '-22.70965620', '16.72161918', 6),
(114, 1, 'NRU', 'NR', 'Nauru', 'Republic of Nauru', '-0.52586763', '166.93270463', 13),
(115, 1, 'NPL', 'NP', 'Nepal', 'Federal Democratic Republic of Nepal', '28.28430770', '83.98119373', 7),
(116, 1, 'NLD', 'NL', 'Netherlands', 'Kingdom of Netherlands', '52.33939951', '4.98914998', 7),
(117, 1, 'NZL', 'NZ', 'New Zealand', 'New Zealand', '-40.95025298', '171.76586181', 5),
(118, 1, 'NIC', 'NI', 'Nicaragua', 'Republic of Nicaragua', '12.91806226', '-84.82270352', 7),
(119, 1, 'NER', 'NE', 'Niger', 'Republic of Niger', '17.23446679', '8.23547860', 6),
(120, 1, 'NGA', 'NG', 'Nigeria', 'Federal Republic of Nigeria', '9.02165273', '7.82933373', 6),
(121, 1, 'NOR', 'NO', 'Norway', 'Kingdom of Norway', '65.04680297', '13.50069228', 4),
(122, 1, 'OMN', 'OM', 'Oman', 'Sultanate of Oman', '20.69906846', '56.69230596', 6),
(123, 1, 'PAK', 'PK', 'Pakistan', 'Islamic Republic of Pakistan', '29.90335974', '70.34487986', 5),
(124, 1, 'PLW', 'PW', 'Palau', 'Republic of Palau', '7.49856307', '134.57291496', 10),
(125, 1, 'PAN', 'PA', 'Panama', 'Republic of Panama', '8.52135102', '-80.04603702', 7),
(126, 1, 'PNG', 'PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', '-6.62414046', '144.44993477', 7),
(127, 1, 'PRY', 'PY', 'Paraguay', 'Republic of Paraguay', '-23.38564782', '-58.29551057', 6),
(128, 1, 'PER', 'PE', 'Peru', 'Republic of Peru', '-8.50205247', '-76.15772412', 5),
(129, 1, 'PHL', 'PH', 'Philippines', 'Republic of Philippines', '12.82361200', '121.77401700', 6),
(130, 1, 'POL', 'PL', 'Poland', 'Republic of Poland', '52.10117636', '19.33190957', 6),
(131, 1, 'PRT', 'PT', 'Portugal', 'Portuguese Republic', '39.44879136', '-8.03768042', 6),
(132, 1, 'QAT', 'QA', 'Qatar', 'State of Qatar', '25.24551555', '51.24431480', 8),
(133, 1, 'ROU', 'RO', 'Romania', 'Romania', '45.56450023', '25.21945155', 6),
(134, 1, 'RUS', 'RU', 'Russian Federation', 'Russian Federation', '57.96812298', '102.41837137', 3),
(135, 1, 'RWA', 'RW', 'Rwanda', 'Republic of Rwanda', '-1.98589079', '29.94255855', 8),
(136, 1, 'KNA', 'KN', 'Saint Kitts and Nevis', 'Saint Kitts and Nevis', '17.33453669', '-62.76411725', 12),
(137, 1, 'LCA', 'LC', 'Saint Lucia', 'Saint Lucia', '13.90938495', '-60.97889500', 11),
(138, 1, 'VCT', 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', '13.25276143', '-61.19709800', 11),
(139, 1, 'WSM', 'WS', 'Samoa', 'Independent State of Samoa', '-13.57998954', '-172.45207363', 10),
(140, 1, 'SMR', 'SM', 'San Marino', 'Republic of San Marino', '43.94223356', '12.45777700', 11),
(141, 1, 'STP', 'ST', 'Sao Tome and Principe', 'Democratic Republic of Sao Tome and Principe', '0.23381910', '6.59935809', 10),
(142, 1, 'SAU', 'SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', '24.16687314', '42.88190638', 5),
(143, 1, 'SEN', 'SN', 'Senegal', 'Republic of Senegal', '14.43579003', '-14.68306489', 7),
(144, 1, 'SRB', 'RS', 'Serbia', 'Republic of Serbia', '44.06736041', '20.29725084', 7),
(145, 1, 'SYC', 'SC', 'Seychelles', 'Republic of Seychelles', '-4.68053204', '55.49061371', 11),
(146, 1, 'SLE', 'SL', 'Sierra Leone', 'Republic of Sierra Leone', '8.45575589', '-11.93368759', 8),
(147, 1, 'SGP', 'SG', 'Singapore', 'Republic of Singapore', '1.33873261', '103.83323559', 11),
(148, 1, 'SVK', 'SK', 'Slovakia', 'Slovak Republic', '48.66923253', '19.75396564', 7),
(149, 1, 'SVN', 'SI', 'Slovenia', 'Republic of Slovenia', '46.14315048', '14.99546300', 8),
(150, 1, 'SLB', 'SB', 'Solomon Islands', 'Solomon Islands', '-9.64554280', '160.15619400', 10),
(151, 1, 'SOM', 'SO', 'Somalia', 'Federal Republic of Somalia', '2.87224619', '45.27676444', 7),
(152, 1, 'ZAF', 'ZA', 'South Africa', 'Republic of South Africa', '-27.17706863', '24.50856092', 5),
(153, 1, 'ESP', 'ES', 'Spain', 'Kingdom of Spain', '39.87299401', '-3.67089492', 6),
(154, 1, 'LKA', 'LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', '7.61264985', '80.83772497', 7),
(155, 1, 'SDN', 'SD', 'Sudan', 'Republic of Sudan', '15.96646839', '30.37145459', 5),
(156, 1, 'SUR', 'SR', 'Suriname', 'Republic of Suriname', '4.26470865', '-55.93988238', 7),
(157, 1, 'SWZ', 'SZ', 'Swaziland', 'Kingdom of Swaziland', '-26.53892570', '31.47960891', 9),
(158, 1, 'SWE', 'SE', 'Sweden', 'Kingdom of Sweden', '61.42370427', '16.73188991', 4),
(159, 1, 'CHE', 'CH', 'Switzerland', 'Swiss Confederation', '46.81010721', '8.22751200', 8),
(160, 1, 'SYR', 'SY', 'Syrian Arab Republic', 'Syrian Arab Republic', '34.71097430', '38.66723516', 6),
(161, 1, 'TJK', 'TJ', 'Tajikistan', 'Republic of Tajikistan', '38.68075124', '71.23215769', 7),
(162, 1, 'THA', 'TH', 'Thailand', 'Kingdom of Thailand', '14.60009810', '101.38805881', 5),
(163, 1, 'TLS', 'TL', 'Timor-Leste', 'Democratic Republic of Timor-Leste', '-8.88926365', '125.99671404', 9),
(164, 1, 'TGO', 'TG', 'Togo', 'Togolese Republic', '8.68089206', '0.86049757', 7),
(165, 1, 'TON', 'TO', 'Tonga', 'Kingdom of Tonga', '-21.17890075', '-175.19824200', 11),
(166, 1, 'TTO', 'TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', '10.43241863', '-61.22250300', 10),
(167, 1, 'TUN', 'TN', 'Tunisia', 'Republic of Tunisia', '33.88431940', '9.71878341', 6),
(168, 1, 'TUR', 'TR', 'Turkey', 'Republic of Turkey', '38.27069555', '36.28703317', 5),
(169, 1, 'TKM', 'TM', 'Turkmenistan', 'Turkmenistan', '38.94915421', '59.06190323', 6),
(170, 1, 'TUV', 'TV', 'Tuvalu', 'Tuvalu', '-8.45968122', '179.13310944', 12),
(171, 1, 'UGA', 'UG', 'Uganda', 'Republic of Uganda', '1.54760620', '32.44409759', 7),
(172, 1, 'UKR', 'UA', 'Ukraine', 'Ukraine', '48.89358596', '31.10516920', 6),
(173, 1, 'ARE', 'AE', 'United Arab Emirates', 'United Arab Emirates', '24.64324405', '53.62261227', 7),
(174, 1, 'URY', 'UY', 'Uruguay', 'Eastern Republic of Uruguay', '-32.49342987', '-55.76583300', 7),
(175, 1, 'UZB', 'UZ', 'Uzbekistan', 'Republic of Uzbekistan', '41.30829147', '62.62970960', 6),
(176, 1, 'VUT', 'VU', 'Vanuatu', 'Republic of Vanuatu', '-15.37256614', '166.95916000', 8),
(177, 1, 'VNM', 'VN', 'Viet Nam', 'Socialist Republic of Viet Nam', '17.19931699', '107.14012804', 5),
(178, 1, 'YEM', 'YE', 'Yemen', 'Republic of Yemen', '15.60865453', '47.60453676', 6),
(179, 1, 'ZMB', 'ZM', 'Zambia', 'Republic of Zambia', '-13.01812188', '28.33274444', 6),
(180, 1, 'ZWE', 'ZW', 'Zimbabwe', 'Republic of Zimbabwe', '-19.00784952', '30.18758584', 6),
(181, 1, 'COK', 'CK', 'Cook Islands', 'Cook Islands', '-21.23673066', '-159.77766900', 13),
(182, 1, 'BOL', 'BO', 'Bolivia (Plurinational State of)', 'Plurinational State of Bolivia', '-16.74518128', '-65.19265691', 6),
(183, 1, 'COD', 'CD', 'Democratic Republic of the Congo', 'Democratic Republic of Congo', '-4.05373938', '23.01110741', 5),
(184, 1, 'EUR', 'EU', 'European Union', 'European Union', '48.76380654', '14.26843140', 3),
(185, 1, 'FSM', 'FM', 'Micronesia (Federated States of)', 'Federated States of Micronesia', '6.88747377', '158.21507170', 12),
(186, 1, 'GBR', 'GB', 'United Kingdom', 'United Kingdom of Great Britain and Northern Ireland', '53.36540813', '-2.72184767', 6),
(187, 1, 'IRN', 'IR', 'Iran (Islamic Republic of)', 'Islamic Republic of Iran', '31.40240324', '51.28204814', 5),
(188, 1, 'PRK', 'KP', 'Democratic People\'s Republic of Korea', 'Democratic People\'s Republic of Korea', '40.00785500', '127.48812834', 6),
(189, 1, 'KOR', 'KR', 'Republic of Korea', 'Republic of Korea', '36.56344139', '127.51424646', 7),
(190, 1, 'MDA', 'MD', 'Republic of Moldova', 'Republic of Moldova', '47.10710437', '28.54018109', 7),
(191, 1, 'MKD', 'MK', 'The former Yugoslav Republic of Macedonia', 'The former Yugoslav Republic of Macedonia', '41.60059479', '21.74527900', 8),
(192, 1, 'NIU', 'NU', 'Niue', 'Niue', '-19.04976362', '-169.86585571', 11),
(193, 1, 'TZA', 'TZ', 'United Republic of Tanzania', 'United Republic of Tanzania', '-6.37551085', '34.85587302', 6),
(194, 1, 'VEN', 'VE', 'Venezuela (Bolivarian Republic of)', 'Bolivarian Republic of Venezuela', '5.98477766', '-65.94152264', 6),
(195, 1, 'AIA', 'AI', 'Anguilla', 'Anguilla', '18.22053521', '-63.06861300', 12),
(196, 1, 'ATA', 'AQ', 'Antarctica', 'Antarctica', '-45.13806295', '10.48095703', 2),
(197, 1, 'ASM', 'AS', 'American Samoa', 'The United States Territory of American Samoa', '-14.30634641', '-170.69501750', 11),
(198, 1, 'ABW', 'AW', 'Aruba', 'Aruba of the Kingdom of the Netherlands', '12.52109661', '-69.96833800', 12),
(199, 1, 'ALA', 'AX', 'Åland Islands', 'Åland Islands', '60.25403213', '20.35918350', 9),
(200, 1, 'BLM', 'BL', 'Saint Barthélemy', 'Territorial collectivity of Saint Barthélemy', '17.90042417', '-62.83376215', 13),
(201, 1, 'BMU', 'BM', 'Bermuda', 'Bermudas', '32.31995785', '-64.76182765', 12),
(202, 1, 'BES', 'BQ', 'Bonaire, Saint Eustatius And Saba', 'Bonaire, Saint Eustatius and Saba', '12.17229702', '-68.28831170', 11),
(203, 1, 'BVT', 'BV', 'Bouvet Island', 'Bouvet Island', '-54.42316906', '3.41319600', 12),
(204, 1, 'CCK', 'CC', 'Cocos (Keeling) Islands', 'Territory of Cocos (Keeling) Islands', '-12.12890685', '96.84689104', 12),
(205, 1, 'CUW', 'CW', 'Curaçao', 'Curaçao', '12.20710309', '-69.02160369', 11),
(206, 1, 'CXR', 'CX', 'Christmas Island', 'Territory of Christmas Island', '-10.49170619', '105.68083796', 11),
(207, 1, 'ESH', 'EH', 'Western Sahara', 'Western Sahara', '24.79324356', '-13.67683563', 6),
(208, 1, 'FLK', 'FK', 'Falkland Islands (Malvinas)', 'Falkland Islands', '-51.78838251', '-59.52361100', 8),
(209, 1, 'FRO', 'FO', 'Faroe Islands (Associate Member)', 'Faroe Islands', '61.88590482', '-6.91180400', 8),
(210, 1, 'GUF', 'GF', 'French Guiana', 'French Guiana', '4.01114381', '-52.97746057', 7),
(211, 1, 'GGY', 'GG', 'Guernsey', 'Bailiwick of Guernsey', '49.46565975', '-2.58527200', 12),
(212, 1, 'GIB', 'GI', 'Gibraltar', 'Gibraltar', '36.14864641', '-5.34404779', 12),
(213, 1, 'GRL', 'GL', 'Greenland', 'Greenland', '71.42932629', '-34.38651956', 3),
(214, 1, 'GLP', 'GP', 'Guadeloupe', 'Department of Guadeloupe', '16.26472785', '-61.55099400', 10),
(215, 1, 'SGS', 'GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', '-54.38130284', '-36.67305304', 9),
(216, 1, 'GUM', 'GU', 'Guam', 'Territory of Guam', '13.44410137', '144.80747791', 10),
(217, 1, 'HKG', 'HK', 'Hong Kong', 'Hong Kong Special Administrative Region of the People\'s Republic', '22.33728531', '114.14657786', 11),
(218, 1, 'HMD', 'HM', 'Heard Island And McDonald Islands', 'Heard and McDonald Islands', '-53.08168847', '73.50415800', 11),
(219, 1, 'IMN', 'IM', 'Isle of Man', 'The Isle of Man', '54.23562697', '-4.54805400', 10),
(220, 1, 'IOT', 'IO', 'British Indian Ocean Territory', 'The British Indian Ocean Territory', '-7.33461519', '72.42425280', 12),
(221, 1, 'JEY', 'JE', 'Jersey', 'Bailiwick of Jersey', '49.21440771', '-2.13124600', 12),
(222, 1, 'CYM', 'KY', 'Cayman Islands', 'The Cayman Islands', '19.31322102', '-81.25459800', 11),
(223, 1, 'MAF', 'MF', 'Saint Martin', 'Saint Martin', '18.07637107', '-63.05019106', 12),
(224, 1, 'MAC', 'MO', 'Macao', 'Macau Special Administrative Region', '22.19872287', '113.54387700', 12),
(225, 1, 'MNP', 'MP', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands', '15.09783636', '145.67390000', 11),
(226, 1, 'MTQ', 'MQ', 'Martinique', 'Department of Martinique', '14.64128045', '-61.02417600', 10),
(227, 1, 'MSR', 'MS', 'Montserrat', 'Montserrat', '16.74774077', '-62.18736600', 12),
(228, 1, 'NCL', 'NC', 'New Caledonia', 'Territory of New Caledonia and Dependencies', '-21.26104020', '165.58783760', 8),
(229, 1, 'NFK', 'NF', 'Norfolk Island', 'Norfolk Islands', '-29.02801043', '167.94303023', 13),
(230, 1, 'PYF', 'PF', 'French Polynesia', 'Territory of French Polynesia', '-17.66243898', '-149.40683900', 10),
(231, 1, 'SPM', 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', '46.88469499', '-56.31590200', 10),
(232, 1, 'PCN', 'PN', 'Pitcairn Islands', 'Pitcairn Group of Islands', '-24.37673925', '-128.32423730', 13),
(233, 1, 'PRI', 'PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', '18.21963053', '-66.59015100', 9),
(234, 1, 'PSE', 'PS', 'Palestinian Territory, Occupied', 'Occupied Palestinian Territory', '32.26367103', '35.21936714', 8),
(235, 1, 'REU', 'RE', 'Réunion', 'Department of Reunion', '-21.11480084', '55.53638200', 10),
(236, 1, 'SHN', 'SH', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helena, Ascension and Tristan da Cunha', '-37.10521846', '-12.27768580', 12),
(237, 1, 'SJM', 'SJ', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', '77.92215764', '18.99010622', 4),
(238, 1, 'SXM', 'SX', 'Sint Maarten', 'Sint Maarten', '18.04433885', '-63.05616320', 12),
(239, 1, 'TCA', 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', '21.72816866', '-71.79654471', 9),
(240, 1, 'ATF', 'TF', 'French Southern and Antarctic Lands', 'Territory of the French Southern and Antarctic Lands', '-49.27235903', '69.34856300', 8),
(241, 1, 'TKL', 'TK', 'Tokelau (Associate Member)', 'Tokelau', '-9.16682644', '-171.83981693', 10),
(242, 1, 'TWN', 'TW', 'Taiwan', 'Republic of China', '23.71891402', '121.10884043', 7),
(243, 1, 'UMI', 'UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', '19.46305694', '177.98631092', 5),
(244, 1, 'USA', 'US', 'United States of America', 'United States of America', '37.66895362', '-102.39256450', 4),
(245, 1, 'VAT', 'VA', 'Holy See', 'Holy see', '41.90377810', '12.45340142', 16),
(246, 1, 'VGB', 'VG', 'Virgin Islands', 'British Virgin Islands', '17.67004187', '-64.77411010', 10),
(247, 1, 'VIR', 'VI', 'United States Virgin Islands', 'Virgin Islands of the United States', '18.01000938', '-64.77411410', 9),
(248, 1, 'WLF', 'WF', 'Wallis and Futuna', 'Territory of the Wallis and Futuna Islands', '-14.29378486', '-178.11649800', 12),
(249, 1, 'MYT', 'YT', 'Mayotte', 'Overseas Department of Mayotte', '-12.82744522', '45.16624200', 11),
(250, 1, 'SSD', 'SS', 'South Sudan', 'Republic of South Sudan', '7.91320803', '30.15342434', 6);

-- --------------------------------------------------------

--
-- Table structure for table `covideffects`
--

DROP TABLE IF EXISTS `covideffects`;
CREATE TABLE IF NOT EXISTS `covideffects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `covid_side_effect_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'comma separated ids',
  `on_behalf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_behalf_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaints` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_batch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symptoms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_effect` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affect_quality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitalized` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitalized_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effect_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'comma seprate id from diseases table',
  `diagnosis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effect_confirm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_recipient_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_recipient_phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_recipient_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_recipient_countries` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_recipient_zip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_status` int(11) DEFAULT NULL COMMENT '1=attended, 2 = under treatments, 3 = victim dead, 4 = give some medicine, 5 = problem solve',
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `covideffects`
--

INSERT INTO `covideffects` (`id`, `user_id`, `doctor_id`, `covid_side_effect_id`, `on_behalf`, `on_behalf_relation`, `recipient_name`, `age`, `gender`, `profession`, `nation`, `vaccine_type`, `complaints`, `vaccine_date`, `vaccine_location`, `vaccine_batch`, `symptoms`, `other_effect`, `affect_quality`, `hospitalized`, `ward_type`, `hospitalized_duration`, `hospital_name`, `effect_duration`, `present_status`, `previous_disease`, `diagnosis`, `effect_confirm`, `vaccine_recipient_card`, `vaccine_recipient_phone`, `vaccine_recipient_email`, `vaccine_recipient_countries`, `vaccine_recipient_zip`, `report`, `npra`, `contact`, `comments`, `file`, `report_status`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 3, 28, '1', 'Diri Sendiri', 'Anak', 'dfd', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', '2022-02-02', 'dfds', 'dsfsd', 'Awam', NULL, 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', NULL, 'Diri Sendiri', 'Diri Sendiri', NULL, NULL, 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, 'Diri Sendiri', 'Diri Sendiri', NULL, NULL, NULL, 4, NULL, '2022-02-06 08:08:32', '2022-02-27 13:00:56'),
(3, 2, 28, '1, 2, 39', 'Diri Sendiri', 'Anak', '2Ho3nio9Xu', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', NULL, 'Uk2nantb35', '9a9VW2qcgq', 'Awam', '5hO2AjPKlC', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'aBKIzCvHcb', 'Diri Sendiri', 'Diri Sendiri', NULL, '97bpiaaHjY', 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, 'Diri Sendiri', 'Diri Sendiri', '3569949404', 'R9a4KrRx1B', NULL, 4, 'test details', '2022-02-06 11:11:08', '2022-02-19 14:31:26'),
(4, 4, 28, '1, 3, 4', 'Diri Sendiri', 'Anak', 'UwBcv5EdZE', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', NULL, 'EreWOo5o4j', 'cBKelIdykI', 'Awam', 'ukhwHgR3qT', 'Diri Sendiri', 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'media/patient/20220207121547.jpg', 5, NULL, '2022-02-06 12:50:02', '2022-03-01 14:09:43'),
(5, 1, NULL, NULL, 'Diri Sendiri', 'Anak', '9hciCW9IYK', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', NULL, 'zFwa8q2uya', 'Z6qBmsoTa3', 'Awam', 'kBEb2nMdzo', 'Diri Sendiri', 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-02-06 12:52:58', '2022-02-19 14:19:58'),
(6, 13, NULL, NULL, 'Diri Sendiri', 'Anak', 'ZHyXQJRbZj', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', NULL, 'U4fBxwTaCB', 'jx79NEPqqd', 'Awam', 'mOhIxgCDro', 'Diri Sendiri', 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, '1, 3, 5, 7, 9, 11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 14, 28, '1, 2', 'Waris', 'Ibu/bapa', 'EIlHPghhHi', '45', 'Lelaki', 'Swasta', 'Awam', 'Awam', 'Awam', '2022-02-25', 'XXHjuLigHp', 'Ijna5QVzlk', 'Awam', '85NUniONoq', 'Diri Sendiri', 'Diri Sendiri', 'Waris', 'Waris', 'Waris', 'Diri Sendiri', 'Diri Sendiri', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 34, 22, ', 'ddddddddd', 'Waris', NULL, NULL, NULL, NULL, NULL, 'Waris', 'Waris', '25458796587', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 3, NULL, NULL, '2022-03-01 14:09:46'),
(8, 15, NULL, '1, 2, 3, 4, 5', 'Diri Sendiri', 'Anak', 'ggfg', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', NULL, NULL, 'gdfg', 'Awam', 'dfd', 'Diri Sendiri', 'Diri Sendiri', 'd', 'd', 'd', 'd', 'd', '1', 'd', 'd', NULL, NULL, NULL, NULL, NULL, 'd', 'd', 'a', 'd', 'd', NULL, NULL, NULL, NULL),
(9, 17, NULL, '2, 4', 'Diri Sendiri', 'Anak', 'dfdsf', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', '2022-02-25', 'dfdsf', 'dsf', 'Awam', NULL, 'Diri Sendiri', 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'media/patient/20220207121547.sql', NULL, NULL, NULL, NULL),
(10, 18, NULL, '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12', 'Diri Sendiri', 'Anak', 'Final', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', '2022-02-07', 'Final', 'Final', 'Awam', 'Final', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Final', 'Diri Sendiri', 'Diri Sendiri', '1, 3, 5, 7, 9, 11', 'Final', 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, 'Diri Sendiri', 'Diri Sendiri', 'Final', 'Final', 'media/patient/20220207130625.pdf', 3, NULL, NULL, '2022-02-19 14:29:38'),
(11, 2, NULL, NULL, 'Diri Sendiri', 'Anak', NULL, '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', NULL, NULL, NULL, 'Awam', NULL, 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', NULL, 'Diri Sendiri', 'Diri Sendiri', NULL, NULL, 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, 'Diri Sendiri', 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 21, NULL, '1, 6, 10, 12, 15, 25, 26, 28, 31', 'Diri Sendiri', 'Anak', 'kamrul', '11', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', '2022-02-08', 'dhaka', '50', 'Awam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'dhaka', 'Diri Sendiri', 'Diri Sendiri', '1, 6, 9, 10', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'Diri Sendiri', NULL, NULL, NULL, NULL, NULL, 'Diri Sendiri', 'Diri Sendiri', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'media/patient/20220208100347.jpg', NULL, NULL, NULL, NULL),
(13, 43, NULL, '1, 7, 9', NULL, 'Anak', 'Rony', '27', 'Lelaki', 'Swasta', 'Awam', 'Awam', 'Awam', '02/18/2022', 'dhaka', '50', 'Awam', 'Other side effects please specify', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Other side effects please specify', 'Diri Sendiri', 'Diri Sendiri', '7, 9, 11', 'The doctor\'s reaction and diagnosis to the side effects you/your heirs receive', 'Diri Sendiri', 'afjlsdfjl', '01990572321', 'rony12@gmail.com', 'dhaka', '1213', 'Diri Sendiri', 'Diri Sendiri', 'Are you willing to be contacted? State information such as telephone/email number and name (if contacted on behalf of the beneficiary', 'Additional comments or complaints about side effects and current living conditions', 'media/patient/20220218101243.png', 4, NULL, NULL, '2022-03-01 14:09:52'),
(17, 44, NULL, NULL, NULL, 'Anak', 'Maidul', '30', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', '03/01/2022', 'TEST', '879999', 'Awam', 'TEST Other side effects please specify', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Diri Sendiri', 'Name of hospital where treated', 'Diri Sendiri', 'Diri Sendiri', NULL, 'How long have you/your heirs experienced these side', 'Diri Sendiri', '7899999', '0191899426333', 'maidul.tech@gmail.com', 'Bangladesh', '1200', 'Diri Sendiri', 'Diri Sendiri', 'How long have you/your heirs experienced these side', 'How long have you/your heirs experienced these side', NULL, NULL, NULL, NULL, NULL),
(18, 46, 2, '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12', NULL, 'Anak', 'Maidul', '30', 'Lelaki', 'Awam', 'Awam', 'Awam', 'Awam', NULL, 'TEST', '879999', 'Awam', 'TEST Other side effects please specify', 'Diri', 'Diri', 'Diri', 'Diri', 'Name of hospital where treated', 'Diri', 'Diri', '1,2,3,4,5,6,7,8', 'How long have you/your heirs experienced these side', 'Diri', '7899999', '0191899426333', 'maidul.tech@gmail.com', 'Bangladesh', '1200', 'Diri', 'Diri', 'How long have you/your heirs experienced these side', 'How long have you/your heirs experienced these side', NULL, 4, NULL, NULL, '2022-03-01 14:09:54'),
(21, 52, NULL, NULL, NULL, 'Diri', 'Mokaddes Hosain', '27', 'Lelaki', 'Tidak berkerja', 'Not a citizen', 'Pfizer - Comirnaty', 'Pertama', '02/23/2022', 'Sylhet', '0145', '24 jam', NULL, 'Sederhana', 'ya', 'ordinary ward', '2-3 hari', 'Sylhet MAG', 'Seminggu', 'Pulih sepenuhnya', NULL, 'Doctor', 'ya', '9102535946', '+603454657', 'mr.mokaddes@yahoo.com', 'Bangladesh', '5460', 'ya', 'tidak', 'No', 'Yes', NULL, NULL, NULL, NULL, NULL),
(22, 53, NULL, NULL, NULL, 'Diri', 'Mkds Hsn', '25', 'Lelaki', 'Lain-lain', 'Not a citizen', 'Tidak tahu', 'Kedua', '02/24/2022', 'Dhaka', '123', '24 jam', NULL, 'Kecacatan sementara', 'ya', 'ordinary ward', '3 minggu', 'NOT DEAD', '3 minggu', 'Tiada perubahan', NULL, 'we', 'ya', '95687945123', '+6001788189944', 'mr.mokddes@gmai.com', 'Bangladesh', '3100', 'tidak', 'tidak', 'ew', 'we', NULL, NULL, NULL, NULL, NULL),
(23, 54, NULL, NULL, NULL, 'Diri', 'My Name', '23', 'Lelaki', 'Lain-lain', 'Permanent resident', 'AstraZeneca', 'Kedua', '01/06/2022', 'Location', 'Batch No 4', '24 jam', NULL, 'Teruk', 'ya', 'icu (intensive care unit)', 'Sebulan dan ke atas', 'no', '3 minggu', 'Pulih sepenuhnya', NULL, 'Doc', 'ya', '123456789', '+601234567890', 'email@gmail.cm', 'Afghanistan', '1234', 'tidak', 'tidak', 'bhrt', 'adition', NULL, NULL, NULL, NULL, NULL),
(24, 55, NULL, NULL, NULL, 'Diri', 'sdf', '26', 'Perempuan', 'Pesara', 'Not a citizen', 'AstraZeneca', 'Kedua', '03/14/2022', 'fgfg', 'fgg', '1 week', NULL, 'Meninggal dunia', 'tidak', 'icu (intensive care unit)', 'Seminggu', 'fgfdg', 'Sebulan', 'Berkurang, masih ada baki kesakitan', NULL, NULL, 'ya', 'dsf', '+6033231', 'fgfdg', 'Afghanistan', 'fgfdg', 'tidak', 'ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 56, NULL, NULL, NULL, 'Diri', 'dfdf', '29', 'Lelaki', 'Pelajar Kolej/Universiti', 'India', 'AstraZeneca', 'Kedua', '02/16/2022', 'fgfdgf', 'dfgfg', '24 jam', NULL, 'Kecacatan sementara', 'tidak', 'icu (intensive care unit)', 'Seminggu', 'fdg', '3 minggu', 'Berkurang, masih ada baki kesakitan', NULL, 'dfgdg', 'ya', 'dfsdf', '+603244', 'fgfgf@dfdsf', 'Angola', '2132', 'ya', 'ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 57, NULL, NULL, NULL, 'Diri', 'dfgdfg', '28', 'Lelaki', 'Kesihatan', 'India', 'Sinovac - Coronavac', 'Kedua', '02/15/2022', 'dfdgfg', '43543', '24 jam', NULL, 'Kecacatan kekal', 'ya', 'ordinary ward', '2-3 hari', 'dfdf', '2-3 hari', 'Berkurang, masih ada baki kesakitan', NULL, 'dfdg', 'ya', '3434', '+6023435', 'dfgdfg', 'Albania', '4543', 'ya', 'ya', 'fsdfsdf', 'dsf', NULL, NULL, NULL, NULL, NULL),
(27, 60, NULL, '1, 2, 3, 4, 5, 6, 7, 8', NULL, 'Diri', 'rony', '23', 'Lelaki', 'Awam', 'Malay', 'Pfizer - Comirnaty', 'Pertama', '03/11/2022', 'dhaka', '1324', '1 jam', NULL, 'Kecacatan kekal', 'ya', 'ordinary ward', '2-3 hari', 'cms', 'Sehari', 'Pulih sepenuhnya', '1, 2, 3, 4, 6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'ya', '4567891423', '+6012345678844', 'rony@gmail.com', 'Afghanistan', '1234', 'ya', 'ya', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'media/patient/20220309184054.jpg', NULL, NULL, '2022-03-09 12:40:54', NULL),
(28, 61, 28, '1, 3', NULL, 'Diri', 'test', '13', 'Perempuan', 'Pendidikan', 'China', 'AstraZeneca', 'Kedua', '03/12/2022', 'dhaka', '12345678', '1 jam', NULL, 'Meninggal dunia', 'ya', 'ordinary ward', '2-3 hari', 'cms', '2-3 hari', 'Pulih sepenuhnya', '1, 3, 5', 'Lorem Ipsum is simply dummy text of the', 'ya', '123456', '+601254789654', 'test3@gmail.com', 'Afghanistan', '1234', 'ya', 'ya', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'media/patient/20220311044015.jpg', 1, NULL, '2022-03-10 22:40:15', '2022-03-10 23:09:20'),
(29, 62, NULL, '1, 5, 6, 7, 8, 9, 25, 26, 43, 44, 59', NULL, 'Diri', 'Maidul', '30', 'Lelaki', 'Awam', 'Malay', 'Pfizer - Comirnaty', 'Pertama', '03/10/2022', 'Dhaka', '7854555', '1 jam', NULL, 'Kecacatan kekal', 'ya', 'ordinary ward', '2-3 hari', 'TEST', '2-3 hari', 'Pulih sepenuhnya', '1, 3, 5, 12', 'TESTTESTTEST', 'ya', '788456', '+601122334455', 'maidul.tech@gmail.com', 'Bangladesh', '7896532', 'ya', 'ya', 'TEST', 'TEST', 'media/patient/20220311090449.png', NULL, NULL, '2022-03-11 03:04:49', NULL),
(30, 63, NULL, '20, 22', NULL, 'Diri', 'XSPDhjTPel', '26', 'Perempuan', 'Swasta', 'China', 'Sinovac - Coronavac', 'Booster ketiga', '03/13/2022', 'HXX68ZfBD9', '6iJLnlJ9uG', '2-3 days', NULL, 'Meninggal dunia', 'tidak', 'icu (intensive care unit)', '2-3 hari', 'HqkXNAkuOJ', 'Seminggu', 'Berkurang, masih ada baki kesakitan', '1', 'Nclwo7WfLb', 'ya', 'QlKNv5lmXV', '+607623230809', 'RUtxvcxi5k', 'Albania', 'S9txpk8XxW', 'ya', 'ya', '6193969459', 'QdCEb56mPd', 'media/patient/20220313191022.png', NULL, NULL, '2022-03-13 13:10:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `covideffect_doctor_mapping`
--

DROP TABLE IF EXISTS `covideffect_doctor_mapping`;
CREATE TABLE IF NOT EXISTS `covideffect_doctor_mapping` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `f_covideffect_no` int(10) DEFAULT NULL,
  `f_patient_no` int(10) DEFAULT NULL COMMENT 'from user table',
  `f_doctor_no` int(10) DEFAULT NULL COMMENT 'from user table',
  `assign_at` datetime DEFAULT NULL,
  `assign_by` int(10) DEFAULT NULL,
  `unassign_at` datetime DEFAULT NULL,
  `unassign_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Dumping data for table `covideffect_doctor_mapping`
--

INSERT INTO `covideffect_doctor_mapping` (`id`, `f_covideffect_no`, `f_patient_no`, `f_doctor_no`, `assign_at`, `assign_by`, `unassign_at`, `unassign_by`, `created_at`, `created_by`, `updated_by`, `updated_at`, `status`) VALUES
(1, 2, 3, 38, '2022-02-27 18:01:23', 1, '2022-02-27 19:00:56', 1, '2022-02-27 18:01:23', 1, 1, '2022-02-27 19:00:56', 0),
(2, 2, 3, 28, '2022-02-27 19:00:56', 1, NULL, NULL, '2022-02-27 19:00:56', 1, NULL, NULL, 1),
(3, 7, 14, 28, '2022-02-28 17:03:33', 1, '2022-03-01 20:09:46', 1, '2022-02-28 17:03:33', 1, 1, '2022-03-01 20:09:46', 0),
(4, 4, 4, 2, '2022-02-28 17:03:51', 1, '2022-02-28 18:29:43', 1, '2022-02-28 17:03:51', 1, 1, '2022-02-28 18:29:43', 0),
(5, 4, 4, 28, '2022-02-28 18:29:43', 1, '2022-03-01 20:03:53', 1, '2022-02-28 18:29:43', 1, 1, '2022-03-01 20:03:53', 0),
(6, 18, 46, 2, '2022-03-01 13:49:50', 1, '2022-03-01 19:26:24', 1, '2022-03-01 13:49:50', 1, 1, '2022-03-01 19:26:24', 0),
(7, 18, 46, 2, '2022-03-01 19:26:24', 1, '2022-03-01 19:26:39', 1, '2022-03-01 19:26:24', 1, 1, '2022-03-01 19:26:39', 0),
(8, 18, 46, 2, '2022-03-01 19:26:39', 1, '2022-03-01 20:09:53', 1, '2022-03-01 19:26:39', 1, 1, '2022-03-01 20:09:53', 0),
(9, 4, 4, 28, '2022-03-01 20:03:53', 1, '2022-03-01 20:09:43', 1, '2022-03-01 20:03:53', 1, 1, '2022-03-01 20:09:43', 0),
(10, 4, 4, 28, '2022-03-01 20:09:43', 1, NULL, NULL, '2022-03-01 20:09:43', 1, NULL, NULL, 1),
(11, 7, 14, 28, '2022-03-01 20:09:46', 1, NULL, NULL, '2022-03-01 20:09:46', 1, NULL, NULL, 1),
(12, 18, 46, 2, '2022-03-01 20:09:53', 1, NULL, NULL, '2022-03-01 20:09:53', 1, NULL, NULL, 1),
(13, 28, 61, 28, '2022-03-11 05:09:10', 52, NULL, NULL, '2022-03-11 05:09:10', 52, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `covid_side_effects`
--

DROP TABLE IF EXISTS `covid_side_effects`;
CREATE TABLE IF NOT EXISTS `covid_side_effects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oder_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `covid_side_effects`
--

INSERT INTO `covid_side_effects` (`id`, `name`, `oder_by`, `created_at`, `updated_at`) VALUES
(1, 'Pengsan', NULL, NULL, NULL),
(2, 'Sakit kepala/gelap mata/kepala berpusing', NULL, NULL, NULL),
(3, 'Strok', NULL, NULL, NULL),
(4, 'Masalah penglihatan', NULL, NULL, NULL),
(5, 'Masalah pendengaran', NULL, '2022-02-05 10:39:15', '2022-02-05 10:39:15'),
(6, 'Sawan', NULL, '2022-02-05 10:39:15', '2022-02-05 10:39:15'),
(7, 'Bells palsy (otot muka)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(8, 'Lumpuh', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(9, 'Sesak nafas', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(10, 'Jantung berdebar laju', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(11, 'Masalah jantung', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(12, 'Darah tinggi', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(13, 'Masalah kulit / gatal', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(14, 'Alahan (allergy)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(15, 'Kepenatan teruk', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(16, 'Anggota badan lemah / sakit / kejang / kebas', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(17, 'Masalah untuk berjalan / berdiri', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(18, 'Mati pucuk', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(19, 'Masalah haidh', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(20, 'Keguguran kandungan', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(21, 'Masalah haidh', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(22, 'Keguguran kandungan1', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(23, 'Disahkan positif COVID-19', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(24, 'Pendarahan daripada rongga badan', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(25, 'Kematian', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(26, 'Muntah', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(27, 'Cirit-birit', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(28, 'Nanah (abcess) pada tubuh/anggota', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(29, 'Sakit dada (paru-paru)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(30, 'Sakit dada (bahagian jantung)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(31, 'Kanser', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(32, 'Reflux acid perut (GERD)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(33, 'Gastrik', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(34, 'Demam', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(35, 'Batuk', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(36, 'Selesema', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(37, 'Hilang deria rasa/bau', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(38, 'Gangguan emosi (anxiety, marah etc)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(39, 'Ulser', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(40, 'Muncul masalah kencing manis (gula tinggi)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(41, 'Mata makin kabur', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(42, 'Buta', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(43, 'Pendarahan ketika hamil', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(44, 'Gout', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(45, 'Batuk berpanjangan', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(46, 'Kayap (shingles)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(47, 'Masalah tidur (insomnia)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(48, 'Anaphylactic shock', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(49, 'Ketumbuhan baru/membesar (fibroid, ketulan, etc)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(50, 'Darah beku', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(51, 'Pendarahan dari rahim (tidak hamil)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(52, 'Radang jantung (myocarditis/pericarditis)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(53, 'Athma', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(54, 'Keguguran rambut teruk', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(55, 'Masalah hati', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(56, 'Masalah buah pinggang', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(57, 'Jangkitan dalam darah', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(58, 'Heart attack (serangan jantung)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(59, 'Masalah berkaitan saraf', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34'),
(60, 'Radang paru-paru (pneumonia)', NULL, '2022-02-05 11:24:34', '2022-02-05 11:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
CREATE TABLE IF NOT EXISTS `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tiada sejarah penyakit', '2022-02-07 12:50:45', '2022-02-07 12:50:45'),
(2, 'Masalah jantung', '2022-02-07 12:50:45', '2022-02-07 12:50:45'),
(3, 'Kencing manis', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(4, 'Gout', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(5, 'Alahan (allergy)', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(6, 'Athma', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(7, 'Penyakit auto-imun', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(8, 'Darah tinggi', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(9, 'Masalah buah pinggang', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(10, 'Kanser', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(11, 'Masalah hati', '2022-02-07 12:54:35', '2022-02-07 12:54:35'),
(12, 'Anemia', '2022-02-07 12:54:35', '2022-02-07 12:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_email` int(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `status_sms` int(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `type`, `subject`, `body`, `created_at`, `updated_at`, `status_email`, `status_sms`) VALUES
(1, 'Registration	', 'Welcome To PATV', 'test', NULL, NULL, 1, 1),
(4, 'Doctor_assigned_to_doctor ', 'Doctor assigned ', 'Doctor assigned to the customer', NULL, NULL, 1, 1),
(5, 'Doctor_assigned_to_patient', 'Doctor assigned ', 'Doctor assigned to the customer', NULL, NULL, 1, 1),
(6, 'Change_status', 'Change report status', 'Your Report has been changed', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_02_05_162656_create_covid_side_effects_table', 1),
(12, '2022_02_06_111349_create_covideffects_table', 1),
(13, '2022_02_06_181716_create_language_table', 2),
(14, '2022_02_07_123840_create_diseases_table', 2),
(15, '2022_02_11_094719_create_smtp_table', 3),
(16, '2022_02_11_111007_create_email_templates_table', 4),
(17, '2022_03_04_114718_create_privacypolicy_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `otp_verification`
--

DROP TABLE IF EXISTS `otp_verification`;
CREATE TABLE IF NOT EXISTS `otp_verification` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) COLLATE utf8mb4_estonian_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_estonian_ci DEFAULT NULL COMMENT 'session id',
  `otp_date` date DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8mb4_estonian_ci DEFAULT NULL,
  `expire_time` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=sent, 1=verified,2=expired ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Dumping data for table `otp_verification`
--

INSERT INTO `otp_verification` (`id`, `mobile`, `user_id`, `otp_date`, `otp`, `expire_time`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(31, '7156440338', 'e7bXh1eQRjrbhDtcGNYfuquv5rKVccqg819sy73j', '2022-03-13', '2988', '2022-03-13 19:16:50', '2022-03-13 19:06:50', 1, NULL, NULL, 2),
(32, '7623230809', 'e7bXh1eQRjrbhDtcGNYfuquv5rKVccqg819sy73j', '2022-03-13', '1668', '2022-03-13 19:18:39', '2022-03-13 19:08:39', 1, NULL, NULL, 1),
(30, '5407717064', 'e7bXh1eQRjrbhDtcGNYfuquv5rKVccqg819sy73j', '2022-03-13', '4261', '2022-03-13 19:14:40', '2022-03-13 19:04:40', 1, NULL, NULL, 2),
(28, '1234567899', 'e7bXh1eQRjrbhDtcGNYfuquv5rKVccqg819sy73j', '2022-03-13', '6103', '2022-03-13 17:23:21', '2022-03-13 17:13:21', 1, NULL, NULL, 2),
(29, '4222982140', 'e7bXh1eQRjrbhDtcGNYfuquv5rKVccqg819sy73j', '2022-03-13', '1615', '2022-03-13 19:12:56', '2022-03-13 19:02:56', 1, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$FK6jAF/zYVojmsuMwnh4wueR18Aha2EFZ2D0CmZ/QYAbj.fPbIjiq', '2022-03-04 07:04:26'),
('doctor@doctor.com', '$2y$10$zg5hfbAv.OxoM1isP7.xcuYDHlfTqquCpaA2TZ1vB0RJ5NMQG9xDe', '2022-03-10 23:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacypolicy`
--

DROP TABLE IF EXISTS `privacypolicy`;
CREATE TABLE IF NOT EXISTS `privacypolicy` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacypolicy`
--

INSERT INTO `privacypolicy` (`id`, `title`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: undefined;\">﻿</span><b>What is Lorem Ipsum?</b></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\"><b><br></b><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; text-align: justify; margin: 0px; padding: 0px;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\"><br></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 13px;=\"\" text-align:=\"\" justify;\"=\"\"></span></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\"><b>Where does it come from?</b></h2><div><br></div><div><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><div><br></div></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"></div></div>', NULL, '2022-03-04 06:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

DROP TABLE IF EXISTS `smtp`;
CREATE TABLE IF NOT EXISTS `smtp` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_encryption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp`
--

INSERT INTO `smtp` (`id`, `email_host`, `email_port`, `email_encryption`, `email_user`, `email_pass`, `email_from`, `email_from_name`, `contact_email`, `created_at`, `updated_at`) VALUES
(1, 'smtp.mailtrap.io', '2525', 'tls', '6652a40848972d', '2adca561246b85', 'patv@email.com', 'PATV', 'patv@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialties` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=admin,2=doctor,3=patient ',
  `supper_admin` int(1) DEFAULT NULL,
  `phone_number` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_str` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT 1 COMMENT '1=active,0=inactive',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `specialties`, `email_verified_at`, `role`, `supper_admin`, `phone_number`, `password`, `password_str`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 'superadmin@admin.com', 'frontend/assets/images/profile/1644424469.jpg', NULL, NULL, '1', NULL, '+601234567895', '$2y$10$MgDWS7jCDliZB1wmhHscIuFxZjWMZ0SCwefRfEP2yALXW.RmsR/Xy', NULL, NULL, '2022-02-05 00:39:31', '2022-03-10 23:04:08', 1),
(2, 'Doctor', 'doctor@doctor.com', 'frontend/assets/images/doctor/1646162511.png', 'test', NULL, '2', NULL, '133407676', '$2y$10$buN0U59apzV//q4LNhLm0uZFJ8kigJ1vYt.L/ESu6oXo5G8XfKU0K', NULL, NULL, '2022-02-05 05:35:40', '2022-03-01 13:25:57', 1),
(4, 'ghgfh', 'mkds@mkds.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$nx6wo8T6BsRBjvNE46n/U.IEbYROZS63HtK0H.UeOrWkbJxYTMEXG', NULL, NULL, '2022-02-06 07:45:08', '2022-02-06 07:45:08', 1),
(14, 'Patient', 'patient@gmail.com', 'frontend/assets/images/profile/1644513465.jpg', NULL, NULL, '3', NULL, NULL, '$2y$10$MgDWS7jCDliZB1wmhHscIuFxZjWMZ0SCwefRfEP2yALXW.RmsR/Xy', 'F2c9GL0W', NULL, NULL, '2022-02-10 11:18:08', 1),
(28, 'doctor 2', 'doctor2@gmail.com', NULL, 'doctor', NULL, '2', NULL, NULL, '$2y$10$yzR03rX0gdlP9IeMR4BClOStNyh5d358S9JDYpJkEkOFosXvTlV0y', NULL, NULL, '2022-02-09 03:16:08', '2022-02-10 11:35:17', 1),
(38, 'doctor', 'doctor@gmail.com', NULL, 'doctor', NULL, '2', NULL, NULL, '$2y$10$es7MVjSRQY2pI1vVuWLw7.LLNVCrVVzWTJkpIdiN4GwhGylJX7x3G', NULL, NULL, '2022-02-10 11:34:30', '2022-02-10 11:34:30', 1),
(39, 'rony', 'rony8@gmail.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$g6ecFrQs9Cntg6qMZJH9Hez.Jgwj.GJSLMW.iOy6cCiHQsAz.qhpy', 'mPecmoSU', NULL, NULL, NULL, 1),
(43, 'Rony', 'rony11@gmail.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$SKAgVJju/EuZp2ckJuWvbePVTRaYDnb24FUAeBjva1sj86kSkMxh2', 'J5z2joji', NULL, NULL, NULL, 1),
(46, 'Maidul Islam', 'maidul.tech1@gmail.com', 'frontend/assets/images/profile/1646155502.png', NULL, NULL, '3', NULL, NULL, '$2y$10$MgDWS7jCDliZB1wmhHscIuFxZjWMZ0SCwefRfEP2yALXW.RmsR/Xy', '7pqmuXTY', NULL, NULL, '2022-03-01 11:29:14', 1),
(47, 'dd', 'dd@gmail.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$o.7d7BOwef3r7f7rugakUOsLJ9Vdj3My11gzEzeLYEToYtcD9W2z2', NULL, NULL, '2022-03-04 05:56:39', '2022-03-04 05:56:39', 1),
(48, 'rabin mia', 'admin@gmail.com', NULL, NULL, NULL, '3', NULL, '+6001990572321', '$2y$10$dfZGi7dqMKnNEjGGTqfm..Pa/b37V5elBK0l9mLIm0TJKIt46Sq1W', NULL, NULL, '2022-03-04 07:29:37', '2022-03-04 07:29:37', 1),
(49, 'rabin', 'rabin@gmailc.om', 'frontend/assets/images/patient/1646400629.jpg', NULL, NULL, '3', NULL, '+6001111111111', '$2y$10$oCnszidi70oQ6rXmyA3zoOer4MNlUFrPClGqOzPv8xRpS5iP0/4hm', NULL, NULL, '2022-03-04 07:30:29', '2022-03-04 07:30:29', 1),
(52, 'admin', 'admin@admin.com', NULL, NULL, NULL, '1', 1, '8547152451', '$2y$10$ji/P9sZj8llVtCYdO8l3FecQEfQXi7fbrz8LJE0GSKRiNd2UOdWly', 'rnZrqXzP', NULL, NULL, '2022-03-10 23:05:24', 1),
(53, 'Mkds Hsn', 'mkds1001@gmail.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$i6p0SqGdKYX1O18wkm2ZGebcClLzjHsqDiNdsxXdXagJe66PMahBy', 'nsjBE0Ug', NULL, NULL, NULL, 1),
(58, 'dfdf', 'emailQ@kahd', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$opECxNqo/mZzJKBs7ayILeYvoBKj4M484gANA54IFoS82Dl7u/E7.', 'OcHTWjXS', NULL, NULL, NULL, 1),
(59, 'dfdf', 'fdgfdgdfg@kahd', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$/x8nY0/WrTs2R.A8V7PbbOFAmyV.uiburHX2lB1nLb2cXRp6tys8a', 'Km3h4JS0', NULL, '2022-03-08 19:11:56', NULL, 1),
(60, 'rony', 'rony@gmail.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$XWBDMiozssLSNKGKXjcrT.qM0VqTm15sSgnAEvRBbc/dq4YA3a0YO', 'JWs15shh', NULL, NULL, NULL, 1),
(61, 'test', 'test3@gmail.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$C.SAshTILSCI1qigow2MguPOr.gSDs08sj2oOKr/rel8j22NmnLSa', 'MB4K7I4A', NULL, NULL, NULL, 1),
(62, 'Maidul', 'maidul.tech@gmail.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$SNN/wvFf1WoC9IJ9dYG/9Ox.7wne4QrOxnkvU1lU6Zm.SwF7H8T9i', 'zPhDCKaU', NULL, NULL, NULL, 1),
(63, 'XSPDhjTPel', 'plcsc@plsu.com', NULL, NULL, NULL, '3', NULL, NULL, '$2y$10$l7/JSWNx.AUwmLdWeMnoj.Vp6ZNfIUn4e7kkdlhNgA4nrDtdezelu', 'H7pmd7k8', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

DROP TABLE IF EXISTS `web_settings`;
CREATE TABLE IF NOT EXISTS `web_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `env_mode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `app_name`, `logo`, `favicon`, `keywords`, `description`, `footer`, `created_at`, `env_mode`) VALUES
(1, 'PATV', 'back/images/1646850529.png', 'back/images/1644403815.png', 'lorem,dolor,ipsum,ssdd', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip', 'PATV. All Rights Reserved', '2022-02-09 10:02:35', 'local');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
