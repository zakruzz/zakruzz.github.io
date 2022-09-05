-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 05:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webinfest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role_id`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrators', 'admin@admin.com', '$2y$10$oXkBYf2EP8SlAWeZmy.D4eSP/QO.PcZa0F3VfYPFUgE5XfN5gaEy.', 0, '2021-09-02 09:34:51', '127.0.0.1', NULL, NULL, '2021-09-02 02:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_meeting` int(11) NOT NULL,
  `link_meeting` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_accesses`
--

CREATE TABLE `certificate_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_white` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_short` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modal_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modal_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_latitude` double DEFAULT NULL,
  `address_longitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `title_website`, `logo`, `logo_white`, `icon`, `email`, `phone_number`, `about_us`, `about_short`, `youtube_link`, `organization`, `modal_status`, `modal_image`, `meta_description`, `meta_keywords`, `address_address`, `address_latitude`, `address_longitude`, `created_at`, `updated_at`) VALUES
(1, 'INFEST', 'LOGO_20210723_194828.png', 'LOGO_WHITE_20210830_013726.png', 'ICON_20210723_194828.png', 'email@email.com', '0812345678', '<p>-</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -94px; top: -6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '-', '-', 'ORGANISASI_SEKRETARIS_2020-07-14_15:41:13.jpg', 'disable', 'POPUP_2020-07-16_15:24:19.jpg', '-', '-', 'Surabaya, Indonesia', -7.156729299999999, 112.6554656, NULL, '2021-08-29 18:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_open` datetime NOT NULL,
  `registration_closed` datetime NOT NULL,
  `background` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `guidebook` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_children` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `slug`, `description`, `registration_open`, `registration_closed`, `background`, `guidebook`, `logo`, `status`, `has_children`, `created_at`, `updated_at`) VALUES
(1, 'Inspection (Karya Tulis Ilmiah)', 'inspection-kti', 'Sed ut perspiciatis undmnis iste natus error sit voluptatem accusantium dolore udantiuy totam rem aperiam.', '2021-08-22 21:55:51', '2021-08-22 21:55:51', 'default.jpg', 'default.pdf', 'default.png', 'open', 1, '2021-08-22 19:55:52', '2021-08-22 19:55:52'),
(2, 'Inspection (Gagasan Tertulis)', 'inspection-gt', 'Sed ut perspiciatis undmnis iste natus error sit voluptatem accusantium dolore udantiuy totam rem aperiam.', '2021-08-22 21:55:51', '2021-08-22 21:55:51', 'default.jpg', 'default.pdf', 'default.png', 'open', 1, '2021-08-22 19:58:00', '2021-08-22 19:58:00'),
(3, 'Instraining', 'instraining', 'Sed ut perspiciatis undmnis iste natus error sit voluptatem accusantium dolore udantiuy totam rem aperiam.', '2021-08-22 21:55:51', '2021-08-22 21:55:51', 'default.jpg', 'default.pdf', 'default.png', 'open', 0, '2021-08-22 19:58:00', '2021-08-22 19:58:00'),
(4, 'Intshow', 'intshow', 'Sed ut perspiciatis undmnis iste natus error sit voluptatem accusantium dolore udantiuy totam rem aperiam.', '2021-08-22 21:55:51', '2021-08-22 21:55:51', 'default.jpg', 'default.pdf', 'default.png', 'open', 0, '2021-08-22 19:58:00', '2021-08-22 19:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_faqs`
--

CREATE TABLE `event_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_timelines`
--

CREATE TABLE `event_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_27_045454_create_configuration_models_table', 1),
(5, '2020_03_27_050925_create_socmed_configs_table', 1),
(6, '2020_06_08_093833_create_news_table', 1),
(7, '2020_06_08_093902_create_news_categories_table', 1),
(8, '2020_06_08_093909_create_news_tags_table', 2),
(9, '2020_06_09_132431_create_news_comments_table', 2),
(10, '2020_06_14_161903_create_anggota_dprds_table', 3),
(11, '2020_06_14_161928_create_job_positions_table', 3),
(12, '2020_06_14_161953_create_political_parties_table', 3),
(13, '2020_06_14_162040_create_aspirations_table', 3),
(14, '2020_06_14_162050_create_galleries_table', 3),
(15, '2020_06_30_023226_create_structure_dprds_table', 4),
(16, '2019_10_14_110318_create_visits_table', 5),
(17, '2020_07_13_091337_create_regulations_table', 6),
(18, '2020_07_14_025620_create_trackers_table', 7),
(19, '2020_11_21_080526_create_divisions_table', 8),
(20, '2020_11_21_080709_create_division_items_table', 8),
(21, '2020_11_21_080922_create_price_plans_table', 8),
(22, '2020_11_21_080931_create_portofolios_table', 8),
(23, '2020_11_21_081022_create_portofolio_images_table', 8),
(24, '2020_11_21_081033_create_testimonials_table', 8),
(25, '2020_11_21_081039_create_clients_table', 8),
(26, '2021_02_24_061239_create_portofolios_table', 9),
(27, '2021_02_24_061252_create_portofolio_categories_table', 9),
(28, '2021_02_24_061306_create_price_plans_table', 9),
(29, '2021_02_24_061313_create_price_categories_table', 9),
(30, '2021_02_24_061322_create_price_descs_table', 9),
(31, '2021_02_24_064502_create_divisions_table', 10),
(32, '2021_02_24_064510_create_division_teams_table', 10),
(33, '2021_03_12_014610_create_messages_table', 11),
(34, '2021_04_12_073734_create_sliders_table', 12),
(35, '2021_08_12_162109_create_admins_table', 13),
(36, '2021_08_22_184231_create_events_table', 14),
(37, '2021_08_22_184928_create_event_timelines_table', 14),
(38, '2021_08_22_185230_create_event_faqs_table', 14),
(39, '2021_08_22_185543_create_participant_events_table', 14),
(40, '2021_08_22_185553_create_team_inspections_table', 14),
(41, '2021_08_22_185610_create_task_events_table', 14),
(42, '2021_08_22_185704_create_task_responses_table', 14),
(43, '2021_08_22_185824_create_announcements_table', 14),
(44, '2021_08_22_185953_create_certificates_table', 14),
(45, '2021_08_22_190002_create_certificate_accesses_table', 14),
(46, '2021_08_22_190019_create_sliders_table', 14),
(47, '2021_08_22_190101_create_testimonials_table', 14),
(48, '2021_08_22_190123_create_sponsors_table', 14),
(49, '2021_08_22_190151_create_products_table', 14),
(50, '2021_08_22_192936_create_transactions_table', 14),
(51, '2021_08_29_091716_create_transaction_carts_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `participant_events`
--

CREATE TABLE `participant_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `registration_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `stock`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Sticker Bundle', 'sticker-bundle', 25000, 100, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac maximus erat. Fusce vestibulum, lorem aliquam vulputate aliquam, ante justo convallis sapien, vitae maximus erat turpis at purus. Sed a pharetra quam. Aenean consectetur ex ut varius ultrices. Nullam vel auctor nisl. Nullam ut dignissim nibh. Integer justo dolor, mattis a dapibus id, finibus at nisl.</p><p>Nam porta scelerisque pulvinar. Maecenas et dui sem. Nam in enim sed ipsum porta egestas non at lacus. Nunc id sem quam. Curabitur maximus, risus vitae faucibus imperdiet, lacus orci blandit mi, at auctor elit quam sit amet velit.</p>', 'sticker-bundle_20210902_052736.png', 1, '2021-09-01 22:27:36', '2021-09-01 22:27:36'),
(3, 'Tote Bag', 'tote-bag', 40000, 100, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac maximus erat. Fusce vestibulum, lorem aliquam vulputate aliquam, ante justo convallis sapien, vitae maximus erat turpis at purus. Sed a pharetra quam. Aenean consectetur ex ut varius ultrices. Nullam vel auctor nisl. Nullam ut dignissim nibh. Integer justo dolor, mattis a dapibus id, finibus at nisl.</p><p>Nam porta scelerisque pulvinar. Maecenas et dui sem. Nam in enim sed ipsum porta egestas non at lacus. Nunc id sem quam. Curabitur maximus, risus vitae faucibus imperdiet, lacus orci blandit mi, at auctor elit quam sit amet velit.</p>', 'tote-bag_20210902_052759.png', 1, '2021-09-01 22:27:59', '2021-09-01 22:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `redirect_to`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Pendaftaran Telah Dibuka !!!', 'https://www.google.com', 'SLIDER_20210830_173522.jpg', '2021-08-30 09:32:45', '2021-08-30 10:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Petronas', 'SPONSOR_20210830_222510.png', '2021-08-30 15:19:37', '2021-08-30 15:25:10'),
(3, 'PI Energi', 'SPONSOR_20210830_222312.png', '2021-08-30 15:19:53', '2021-08-30 15:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `task_events`
--

CREATE TABLE `task_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_upload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_responses`
--

CREATE TABLE `task_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_inspections`
--

CREATE TABLE `team_inspections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `leader_id` bigint(20) NOT NULL,
  `member1_id` bigint(20) NOT NULL,
  `member2_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_positition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_filled` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

CREATE TABLE `trackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_visit` date NOT NULL,
  `time_visit` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trackers`
--

INSERT INTO `trackers` (`id`, `ip_address`, `hits`, `platform`, `browser`, `region`, `date_visit`, `time_visit`, `created_at`, `updated_at`) VALUES
(53, '127.0.0.1', '480', 'Windows', 'Opera', '0', '2021-07-23', '18:54:17', NULL, '2021-09-02 09:55:08'),
(54, '127.0.0.1', '478', 'Windows', 'Opera', '0', '2021-08-12', '00:53:03', NULL, '2021-09-02 09:55:08'),
(55, '127.0.0.1', '478', 'Windows', 'Opera', '0', '2021-08-18', '12:57:05', NULL, '2021-09-02 09:55:08'),
(56, '127.0.0.1', '478', 'Windows', 'Opera', '0', '2021-08-19', '20:39:20', NULL, '2021-09-02 09:55:08'),
(57, '127.0.0.1', '478', 'Windows', 'Opera', '0', '2021-08-22', '13:48:24', NULL, '2021-09-02 09:55:08'),
(58, '127.0.0.1', '478', 'Windows', 'Opera', '0', '2021-08-23', '01:14:14', NULL, '2021-09-02 09:55:08'),
(59, '127.0.0.1', '474', 'Windows', 'Opera', '0', '2021-08-28', '13:53:43', NULL, '2021-09-02 09:55:08'),
(60, '127.0.0.1', '472', 'Windows', 'Opera', '0', '2021-08-29', '15:00:27', NULL, '2021-09-02 09:55:08'),
(61, '127.0.0.1', '472', 'Windows', 'Opera', '0', '2021-08-30', '01:01:09', NULL, '2021-09-02 09:55:08'),
(62, '127.0.0.1', '436', 'Windows', 'Opera', '0', '2021-08-31', '00:01:50', NULL, '2021-09-02 09:55:08'),
(63, '127.0.0.1', '271', 'Windows', 'Opera', '0', '2021-09-02', '12:20:59', NULL, '2021-09-02 09:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` int(11) NOT NULL,
  `shipping_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_price` int(11) DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_carts`
--

CREATE TABLE `transaction_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `last_login_at`, `last_login_ip`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@user.com', NULL, '$2y$10$oXkBYf2EP8SlAWeZmy.D4eSP/QO.PcZa0F3VfYPFUgE5XfN5gaEy.', '2021-09-02 16:28:02', '127.0.0.1', 'superadmin', NULL, '2020-03-26 19:30:28', '2021-09-02 09:28:02');

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
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_accesses`
--
ALTER TABLE `certificate_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_faqs`
--
ALTER TABLE `event_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_timelines`
--
ALTER TABLE `event_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant_events`
--
ALTER TABLE `participant_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_events`
--
ALTER TABLE `task_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_responses`
--
ALTER TABLE `task_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_inspections`
--
ALTER TABLE `team_inspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trackers`
--
ALTER TABLE `trackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_carts`
--
ALTER TABLE `transaction_carts`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_accesses`
--
ALTER TABLE `certificate_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_faqs`
--
ALTER TABLE `event_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_timelines`
--
ALTER TABLE `event_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `participant_events`
--
ALTER TABLE `participant_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task_events`
--
ALTER TABLE `task_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_responses`
--
ALTER TABLE `task_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_inspections`
--
ALTER TABLE `team_inspections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trackers`
--
ALTER TABLE `trackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_carts`
--
ALTER TABLE `transaction_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
