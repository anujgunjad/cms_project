﻿-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 07:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts_atm`
--

CREATE TABLE `bank_accounts_atm` (
  `complaint_id` varchar(150) NOT NULL,
  `acc_id` varchar(150) NOT NULL,
  `atm_footage_id` varchar(150) NOT NULL,
  `atm_footage` varchar(150) NOT NULL,
  `email_sent` date NOT NULL,
  `email_received` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_accounts_atm`
--

INSERT INTO `bank_accounts_atm` (`complaint_id`, `acc_id`, `atm_footage_id`, `atm_footage`, `email_sent`, `email_received`, `created_date`, `last_updated`) VALUES
('101', '1', '1', 'No', '0000-00-00', '0000-00-00', '2020-06-23 18:35:58', '2020-06-23 18:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts_iplogs`
--

CREATE TABLE `bank_accounts_iplogs` (
  `complaint_id` varchar(150) NOT NULL,
  `acc_id` varchar(150) NOT NULL,
  `iplog_id` varchar(150) NOT NULL,
  `iplog` varchar(150) NOT NULL,
  `email_sent` date NOT NULL,
  `email_received` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_accounts_iplogs`
--

INSERT INTO `bank_accounts_iplogs` (`complaint_id`, `acc_id`, `iplog_id`, `iplog`, `email_sent`, `email_received`, `created_date`, `last_updated`) VALUES
('101', '1', '1', 'No', '0000-00-00', '0000-00-00', '2020-06-23 18:37:05', '2020-06-23 18:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `basic_details`
--

CREATE TABLE `basic_details` (
  `complaint_id` varchar(150) NOT NULL,
  `complaint_no` varchar(200) NOT NULL,
  `complaint_date` date NOT NULL,
  `ap_name` varchar(250) NOT NULL,
  `ap_age` varchar(100) NOT NULL,
  `ap_mob` varchar(100) NOT NULL,
  `ap_address` varchar(350) NOT NULL,
  `ap_country` varchar(150) NOT NULL,
  `ap_state` varchar(200) NOT NULL,
  `ap_city` varchar(150) NOT NULL,
  `ap_pin_code` varchar(150) NOT NULL,
  `ap_adhar` varchar(150) NOT NULL,
  `crime_type` varchar(200) NOT NULL,
  `way_of_crime` varchar(200) NOT NULL,
  `it_act` varchar(150) NOT NULL,
  `bh_dv` varchar(200) NOT NULL,
  `crime_date` date NOT NULL,
  `crime_time` time NOT NULL,
  `amount` varchar(150) NOT NULL,
  `checker_name` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic_details`
--

INSERT INTO `basic_details` (`complaint_id`, `complaint_no`, `complaint_date`, `ap_name`, `ap_age`, `ap_mob`, `ap_address`, `ap_country`, `ap_state`, `ap_city`, `ap_pin_code`, `ap_adhar`, `crime_type`, `way_of_crime`, `it_act`, `bh_dv`, `crime_date`, `crime_time`, `amount`, `checker_name`, `created_date`, `last_updated`) VALUES
('101', '110/19', '2019-03-15', 'श्याम लाल ', '40', '7772863775', 'गढ़ा ', 'भारत', 'मध्य प्रदेश', 'जबलपुर ', '482001', '11100025648', 'ऑनलाइन ठगी ', 'जॉब फ्रॉड ', '66 डी ', '420', '2020-06-10', '10:06:47', '3,25,000', 'उ नि समीर ', '2020-06-23 17:53:34', '2020-06-23 17:54:18'),
('102', '110/20', '2019-03-15', 'श्याम लाल ', '40', '7200154601', 'गढ़ा ', 'भारत', 'मध्य प्रदेश', 'जबलपुर ', '482001', '11100025648', 'ऑनलाइन ठगी ', 'जॉब फ्रॉड ', '66 डी ', '420', '2020-06-10', '10:06:47', '3,25,000', 'उ नि समीर ', '2020-06-23 17:53:34', '2020-06-23 17:54:18'),
('103', '110/21', '2019-03-15', 'श्याम लाल ', '40', '7200154601', 'गढ़ा ', 'भारत', 'मध्य प्रदेश', 'जबलपुर ', '482001', '11100025648', 'ऑनलाइन ठगी ', 'जॉब फ्रॉड ', '66 डी ', '420', '2020-06-10', '10:06:47', '3,25,000', 'उ नि समीर ', '2020-06-23 17:53:34', '2020-06-23 17:54:18'),
('104', '110/24', '2019-03-15', 'राम लाल ', '40', '7200154601', 'गढ़ा ', 'भारत', 'मध्य प्रदेश', 'जबलपुर ', '482001', '11100025648', 'ऑनलाइन ठगी ', 'जॉब फ्रॉड ', '66 डी ', '420', '2020-06-10', '10:06:47', '3,25,000', 'उ नि समीर ', '2020-06-23 17:53:34', '2020-06-23 17:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `type_id` int(100) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`type_id`, `type`) VALUES
(1, 'सोशल मीडिया'),
(2, 'सोशल मीडिया'),
(3, 'साइबर आतंकवाद'),
(4, 'अन्य');

-- --------------------------------------------------------

--
-- Table structure for table `sub_complaint_type`
--

CREATE TABLE `sub_complaint_type` (
  `sub_complaint_type_id` int(50) NOT NULL,
  `sub_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_complaint_type`
--

INSERT INTO `sub_complaint_type` (`sub_complaint_type_id`, `sub_type`) VALUES
(1, 'Online Bank Fraud'),
(2, 'Job Fraud'),
(3, 'OLX Fraud'),
(4, 'KYC Fraud'),
(5, 'Link Fraud'),
(6, 'Screen Sharing App'),
(7, 'Fake Facebook'),
(8, 'Fack Instagram'),
(9, 'Facebook Hack'),
(10, 'Instagram Hack'),
(11, 'Gmail Hack'),
(12, 'Social Media Harassment'),
(13, 'Whatsapp Harassment'),
(14, 'Whatsapp Hack'),
(15, 'Metrimonial Fraud'),
(16, 'Custom Fraud'),
(17, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_bank_accounts`
--

CREATE TABLE `suspect_bank_accounts` (
  `complaint_id` varchar(150) NOT NULL,
  `acc_id` int(200) NOT NULL,
  `acc_number` varchar(200) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `state` varchar(150) NOT NULL,
  `branch_name` varchar(150) NOT NULL,
  `mail_date` date NOT NULL,
  `mail_received` date NOT NULL,
  `freeze_amount` varchar(250) NOT NULL,
  `kyc_name` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_twice` varchar(150) NOT NULL,
  `alternate_number` varchar(150) NOT NULL,
  `profit_acc` varchar(150) NOT NULL,
  `internet_banking` varchar(150) NOT NULL,
  `bank_manager_name` varchar(200) NOT NULL,
  `bank_manager_number` varchar(200) NOT NULL,
  `kyc_pdf` varchar(200) NOT NULL,
  `bank_statement_file` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_bank_accounts`
--

INSERT INTO `suspect_bank_accounts` (`complaint_id`, `acc_id`, `acc_number`, `bank_name`, `state`, `branch_name`, `mail_date`, `mail_received`, `freeze_amount`, `kyc_name`, `address`, `city`, `state_twice`, `alternate_number`, `profit_acc`, `internet_banking`, `bank_manager_name`, `bank_manager_number`, `kyc_pdf`, `bank_statement_file`, `created_date`, `last_updated`) VALUES
('101', 1, '1012000456', 'sbi', 'झारखण्ड ', 'देवघर ', '2019-04-05', '2019-04-15', '50000', 'सुरेश सिंग ', 'सेक्टर 5 ', 'जामतारा ', 'झारखण्ड ', '8824460011', '', 'नही ', 'रामकुमार ', '7588242000', '', '', '2020-06-23 18:31:38', '2020-06-23 18:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_details`
--

CREATE TABLE `suspect_details` (
  `complaint_id` varchar(150) NOT NULL,
  `suspect_id` varchar(100) NOT NULL,
  `suspect_name` varchar(100) NOT NULL,
  `suspect_address` varchar(300) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `domain_name` varchar(100) NOT NULL,
  `upi_phone_no` varchar(100) NOT NULL,
  `upivpa` varchar(100) NOT NULL,
  `software_name` varchar(100) NOT NULL,
  `complaint_action` varchar(300) NOT NULL,
  `pending_reason` varchar(250) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_details`
--

INSERT INTO `suspect_details` (`complaint_id`, `suspect_id`, `suspect_name`, `suspect_address`, `email_id`, `domain_name`, `upi_phone_no`, `upivpa`, `software_name`, `complaint_action`, `pending_reason`, `remark`, `created_date`, `last_updated`) VALUES
('101', '1', '', '', '', '', '', '', '', '', '', '', '2020-06-24 16:14:31', '2020-06-24 16:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_ewallet_info`
--

CREATE TABLE `suspect_ewallet_info` (
  `complaint_id` varchar(150) NOT NULL,
  `suspect_ewallet_id` varchar(150) NOT NULL,
  `upi_name` varchar(200) NOT NULL,
  `mob_number` varchar(200) NOT NULL,
  `vpa_id` varchar(200) NOT NULL,
  `statement` varchar(150) NOT NULL,
  `email_sent` date NOT NULL,
  `email_received` date NOT NULL,
  `linked_account` varchar(250) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `ip_add_number` varchar(250) NOT NULL,
  `device_id` varchar(250) NOT NULL,
  `merchandise` varchar(200) NOT NULL,
  `hold_amount` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_ewallet_info`
--

INSERT INTO `suspect_ewallet_info` (`complaint_id`, `suspect_ewallet_id`, `upi_name`, `mob_number`, `vpa_id`, `statement`, `email_sent`, `email_received`, `linked_account`, `ip_address`, `ip_add_number`, `device_id`, `merchandise`, `hold_amount`, `number`, `created_date`, `last_updated`) VALUES
('101', '1', 'hdfc', '7942765824', '', 'प्राप्त ', '2019-02-02', '2019-02-16', 'sbi 12558340001 ', '116.144.16.6 ', ' ', 'vivo - 869845789001 ', '', '50000', '', '2020-06-23 18:38:49', '2020-06-23 18:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_numbers`
--

CREATE TABLE `suspect_numbers` (
  `complaint_id` varchar(200) NOT NULL,
  `number_id` int(150) NOT NULL,
  `number_one` varchar(100) NOT NULL,
  `company` varchar(50) NOT NULL,
  `files` varchar(50) NOT NULL,
  `email_sent` date NOT NULL,
  `email_received` date NOT NULL,
  `suspect_name` text NOT NULL,
  `suspect_address` varchar(100) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(150) NOT NULL,
  `retailer_name` varchar(50) NOT NULL,
  `uid_num` varchar(100) NOT NULL,
  `other_num` varchar(100) NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `confirmation` varchar(50) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `reminder` date NOT NULL,
  `mail_id` varchar(100) NOT NULL,
  `caf_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_numbers`
--

INSERT INTO `suspect_numbers` (`complaint_id`, `number_id`, `number_one`, `company`, `files`, `email_sent`, `email_received`, `suspect_name`, `suspect_address`, `city`, `state`, `retailer_name`, `uid_num`, `other_num`, `pdf`, `confirmation`, `remark`, `reminder`, `mail_id`, `caf_date`, `created_date`, `last_updated`) VALUES
('101', 1, '8842005824		', 'idea', 'आधार कार्ड ', '2019-03-15', '2019-03-20', 'सुरेन्द्र पाल ', 'नीम वाडा ', '24 परगना ', 'पश्चिम बंगाल ', 'स्याम  मोबाइल ', '12005466758', '7742102783', '', 'नही ', '', '0000-00-00', '', '2018-09-05', '2020-06-24 15:01:49', '2020-06-24 15:16:10'),
('101', 2, '8842005824		', 'idea', 'आधार कार्ड ', '2019-03-15', '2019-03-20', 'सुरेन्द्र पाल ', 'नीम वाडा ', '24 परगना ', 'पश्चिम बंगाल ', 'स्याम  मोबाइल ', '12005466758', '7742102783', '', 'नही ', '', '0000-00-00', '', '2018-09-05', '2020-06-24 15:01:49', '2020-06-24 15:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_number_cdr_info`
--

CREATE TABLE `suspect_number_cdr_info` (
  `complaint_id` varchar(150) NOT NULL,
  `number_id` varchar(150) NOT NULL,
  `cdr_id` varchar(150) NOT NULL,
  `cdr` varchar(200) NOT NULL,
  `email_sent` date NOT NULL,
  `email_received` date NOT NULL,
  `imei` varchar(200) NOT NULL,
  `imsi` varchar(200) NOT NULL,
  `location` varchar(150) NOT NULL,
  `location_date` date NOT NULL,
  `location_time` time NOT NULL,
  `night_loc` varchar(150) NOT NULL,
  `service_name` varchar(150) NOT NULL,
  `suspect_number` varchar(150) NOT NULL,
  `cdr_pdf` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_number_cdr_info`
--

INSERT INTO `suspect_number_cdr_info` (`complaint_id`, `number_id`, `cdr_id`, `cdr`, `email_sent`, `email_received`, `imei`, `imsi`, `location`, `location_date`, `location_time`, `night_loc`, `service_name`, `suspect_number`, `cdr_pdf`, `created_date`, `last_updated`) VALUES
('101', '1', '1', '8842005824', '2019-03-15', '2019-03-20', '86550029768145', '142548900025753', '24 परगना ', '2018-05-16', '12:35:25', '24 परगना ', '', '7894561230', '0', '2020-06-23 18:40:53', '2020-06-23 18:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_number_ipdr_info`
--

CREATE TABLE `suspect_number_ipdr_info` (
  `complaint_id` varchar(150) NOT NULL,
  `number_id` varchar(150) NOT NULL,
  `ipdr_id` varchar(150) NOT NULL,
  `ipdr` varchar(200) NOT NULL,
  `email_sent` date NOT NULL,
  `email_received` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_number_ipdr_info`
--

INSERT INTO `suspect_number_ipdr_info` (`complaint_id`, `number_id`, `ipdr_id`, `ipdr`, `email_sent`, `email_received`, `location`, `website`, `created_date`, `last_updated`) VALUES
('101', '1', '1', '116.112.41.6', '2019-04-05', '2019-04-08', '24 परगना ', '', '2020-06-23 18:42:47', '2020-06-23 18:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_number_upi_info`
--

CREATE TABLE `suspect_number_upi_info` (
  `complaint_id` varchar(150) NOT NULL,
  `number_id` varchar(150) NOT NULL,
  `upi_id` varchar(150) NOT NULL,
  `upi` varchar(150) NOT NULL,
  `upi_name` varchar(200) NOT NULL,
  `upi_link` varchar(200) NOT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_number_upi_info`
--

INSERT INTO `suspect_number_upi_info` (`complaint_id`, `number_id`, `upi_id`, `upi`, `upi_name`, `upi_link`, `created_date`, `last_updated`) VALUES
('101', '1', '1', '', '', 'No', '2020-06-23 18:46:44', '2020-06-23 18:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_pan_info`
--

CREATE TABLE `suspect_pan_info` (
  `complaint_id` varchar(250) NOT NULL,
  `acc_id` varchar(250) NOT NULL,
  `pan_info_id` varchar(250) NOT NULL,
  `pan` varchar(250) NOT NULL,
  `pan_verified` varchar(150) NOT NULL,
  `pan_username` varchar(250) NOT NULL,
  `adhar_number` varchar(250) NOT NULL,
  `income_tax` varchar(200) NOT NULL,
  `gst_in` varchar(200) NOT NULL,
  `tin` varchar(150) NOT NULL,
  `sales_tax` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_pan_info`
--

INSERT INTO `suspect_pan_info` (`complaint_id`, `acc_id`, `pan_info_id`, `pan`, `pan_verified`, `pan_username`, `adhar_number`, `income_tax`, `gst_in`, `tin`, `sales_tax`, `created_date`, `last_updated`) VALUES
('101', '1', '1', 'BNHP123589', 'yes ', 'रमेश सिंह ', '1258906849410', 'नही ', 'नही ', 'नही ', 'नही ', '2020-06-23 18:49:27', '2020-06-23 18:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_website_info`
--

CREATE TABLE `suspect_website_info` (
  `complaint_id` varchar(150) NOT NULL,
  `website_id` int(150) NOT NULL,
  `website_name` varchar(250) NOT NULL,
  `website_domain` varchar(250) NOT NULL,
  `mail_id` varchar(250) NOT NULL,
  `website_mobile_number` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_website_info`
--

INSERT INTO `suspect_website_info` (`complaint_id`, `website_id`, `website_name`, `website_domain`, `mail_id`, `website_mobile_number`, `created_date`, `last_updated`) VALUES
('101', 1, 'moneybank@account.com', 'Godaddy', 'moneybank@account.com', '7942765824', '2020-06-23 18:48:23', '2020-06-23 18:48:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_details`
--
ALTER TABLE `basic_details`
  ADD PRIMARY KEY (`complaint_id`),
  ADD UNIQUE KEY `complaint_no` (`complaint_no`);

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `sub_complaint_type`
--
ALTER TABLE `sub_complaint_type`
  ADD PRIMARY KEY (`sub_complaint_type_id`);

--
-- Indexes for table `suspect_bank_accounts`
--
ALTER TABLE `suspect_bank_accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `suspect_details`
--
ALTER TABLE `suspect_details`
  ADD PRIMARY KEY (`suspect_id`);

--
-- Indexes for table `suspect_numbers`
--
ALTER TABLE `suspect_numbers`
  ADD PRIMARY KEY (`number_id`);

--
-- Indexes for table `suspect_pan_info`
--
ALTER TABLE `suspect_pan_info`
  ADD PRIMARY KEY (`pan_info_id`);

--
-- Indexes for table `suspect_website_info`
--
ALTER TABLE `suspect_website_info`
  ADD PRIMARY KEY (`website_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_complaint_type`
--
ALTER TABLE `sub_complaint_type`
  MODIFY `sub_complaint_type_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `suspect_bank_accounts`
--
ALTER TABLE `suspect_bank_accounts`
  MODIFY `acc_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suspect_numbers`
--
ALTER TABLE `suspect_numbers`
  MODIFY `number_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suspect_website_info`
--
ALTER TABLE `suspect_website_info`
  MODIFY `website_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;