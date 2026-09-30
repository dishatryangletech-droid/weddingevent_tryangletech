-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2026 at 01:10 PM
-- Server version: 8.4.7
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page_banners`
--

DROP TABLE IF EXISTS `about_page_banners`;
CREATE TABLE IF NOT EXISTS `about_page_banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'LUXURY CELEBRATIONS | SCENIC LOVE STORIES',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Artfully directed wedding experiences',
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Let''s plan',
  `button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `tag_1` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Bespoke',
  `tag_2` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Artistry',
  `tag_3` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Modern',
  `tag_4` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Design',
  `tag_5` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Elegant',
  `tags` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Bespoke, Artistry, Modern, Design, Elegant',
  `background_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_banners`
--

INSERT INTO `about_page_banners` (`id`, `tagline`, `title`, `subtitle`, `button_text`, `button_link`, `tag_1`, `tag_2`, `tag_3`, `tag_4`, `tag_5`, `tags`, `background_image`, `card_image`, `card_text`, `created_at`, `updated_at`) VALUES
(1, 'LUXURY CELEBRATIONS | SCENIC LOVE STORIES', 'Artfully directed wedding experiences', 'A walkthrough of how we translate your personal love story into a visual language at Knotcraft.', 'Let\'s plan', '#', 'Bespoke', 'Artistry', 'Modern', 'Design', 'Elegant', 'Bespoke, Artistry, Modern, Design, Elegant', 'uploads/about/1790761862_about_bg.avif', 'uploads/about/1790761862_about_card.avif', 'We craft wedding experiences that bring your love story to life.', '2026-09-28 04:20:12', '2026-09-30 04:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_expertises`
--

DROP TABLE IF EXISTS `about_page_expertises`;
CREATE TABLE IF NOT EXISTS `about_page_expertises` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'OUR EXPERTISE',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Bespoke planning services for luxury celebrations',
  `left_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_expertises`
--

INSERT INTO `about_page_expertises` (`id`, `tagline`, `title`, `left_image`, `created_at`, `updated_at`) VALUES
(1, 'OUR EXPERTISE', 'Bespoke planning services for luxury celebrations', 'uploads/about/1790761820_about_exp_left.avif', '2026-09-28 04:43:04', '2026-09-30 04:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_expertise_items`
--

DROP TABLE IF EXISTS `about_page_expertise_items`;
CREATE TABLE IF NOT EXISTS `about_page_expertise_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_expertise_items`
--

INSERT INTO `about_page_expertise_items` (`id`, `title`, `description`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Destination scouting', 'Finding the perfect, breathtaking backdrop to frame your unique love story and create lifelong memories.', 'images/6a6305bf5040b777232a1836_Event-image-two.avif', 1, '2026-09-28 04:43:04', '2026-09-28 04:43:04'),
(2, 'Creative art direction', 'Crafting a cohesive visual narrative, blending color, texture, and mood into an unforgettable aesthetic.', 'images/6a6305bf5040b777232a1838_Event-image-five.avif', 2, '2026-09-28 04:43:04', '2026-09-28 04:43:04'),
(3, 'Full wedding orchestration', 'Seamless management of every logistical detail from vendor coordination to timeline control on your big day.', 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif', 3, '2026-09-28 04:43:04', '2026-09-28 04:43:04'),
(4, 'Bespoke decor design', 'Designing custom floral arrangements, tablescapes, lighting, and ambient styling tailored specifically for you.', 'images/6a6305bf5040b777232a1834_Event-post-one-image-four.avif', 4, '2026-09-28 04:43:04', '2026-09-28 04:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_missions`
--

DROP TABLE IF EXISTS `about_page_missions`;
CREATE TABLE IF NOT EXISTS `about_page_missions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'OUR MISSION',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Dedicated to create graceful wedding experiences',
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Contact us',
  `button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '/contact',
  `video_poster` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_mp4` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_webm` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_1_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_1_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_2_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_2_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_3_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_3_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_4_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_4_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_missions`
--

INSERT INTO `about_page_missions` (`id`, `tagline`, `title`, `description`, `button_text`, `button_link`, `video_poster`, `video_mp4`, `video_webm`, `feature_1_title`, `feature_1_image`, `feature_2_title`, `feature_2_image`, `feature_3_title`, `feature_3_image`, `feature_4_title`, `feature_4_image`, `created_at`, `updated_at`) VALUES
(1, 'OUR MISSION', 'Dedicated to create graceful wedding experiences', 'We craft elegant, personalized celebrations that reflect your love story, ensuring every moment feels seamless, meaningful, and beautifully memorable.', 'Contact us', '/contact', 'images/69e06bfff096fe744c997c8d_6a43634cafebe64db07790d1_new_poster.0000000.jpg', 'videos/6a6305bf5040b777232a1809_new_mp4.mp4', 'videos/6a6305bf5040b777232a1809_new_webm.webm', 'Elevated experiences for every guest', 'images/6a6305bf5040b777232a1836_Event-image-two.avif', 'Flawless execution of your exact vision', 'images/6a6305bf5040b777232a1839_Event-image-four.avif', 'Bespoke design and artistic styling for you', 'images/6a6305bf5040b777232a1838_Event-image-five.avif', 'Capturing every timeless shared moment', 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif', '2026-09-28 04:20:12', '2026-09-28 04:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_stats`
--

DROP TABLE IF EXISTS `about_page_stats`;
CREATE TABLE IF NOT EXISTS `about_page_stats` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `background_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_stats`
--

INSERT INTO `about_page_stats` (`id`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'uploads/about/1790762114_stats_bg.avif', '2026-09-28 04:38:33', '2026-09-30 04:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_stat_items`
--

DROP TABLE IF EXISTS `about_page_stat_items`;
CREATE TABLE IF NOT EXISTS `about_page_stat_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_number` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_stat_items`
--

INSERT INTO `about_page_stat_items` (`id`, `item_number`, `number_title`, `description`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, '01', 'Since 2014', 'Couples routinely praise our team for providing flawless coordination, bespoke design, and magical celebrations that thrill everyone involved.', 1, '2026-09-28 04:38:33', '2026-09-28 04:48:36'),
(2, '02', '120+ weddings', 'Clients frequently applaud our brand for offering premium guidance, detailed curation, and stunning events that delight couples without fail.', 2, '2026-09-28 04:38:33', '2026-09-28 04:48:36'),
(3, '03', '1500+ guests / yr', 'Families regularly award us top marks for providing custom attention, intentional styling, and memorable events that amaze guests every time.', 3, '2026-09-28 04:38:33', '2026-09-28 04:48:36'),
(4, '04', '4.9★ rating', 'Our clients consistently rate us highly for delivering exceptional service, thoughtful planning, and beautifully executed weddings that exceed expectations every time.', 4, '2026-09-28 04:38:33', '2026-09-28 04:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_stories`
--

DROP TABLE IF EXISTS `about_page_stories`;
CREATE TABLE IF NOT EXISTS `about_page_stories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Designing weddings that reflect your story',
  `description` text COLLATE utf8mb4_unicode_ci,
  `left_main_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_1_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Beautifully curated',
  `feature_1_desc` text COLLATE utf8mb4_unicode_ci,
  `feature_1_button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'View packages',
  `feature_1_button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `feature_2_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Seamless celebrations',
  `feature_2_desc` text COLLATE utf8mb4_unicode_ci,
  `feature_2_button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'View packages',
  `feature_2_button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `right_card_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Wedding studio',
  `right_card_subtitle` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Est. 2011',
  `right_card_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_card_bottom_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Redefining wedding experiences',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_stories`
--

INSERT INTO `about_page_stories` (`id`, `title`, `description`, `left_main_image`, `feature_1_title`, `feature_1_desc`, `feature_1_button_text`, `feature_1_button_link`, `feature_2_title`, `feature_2_desc`, `feature_2_button_text`, `feature_2_button_link`, `right_card_title`, `right_card_subtitle`, `right_card_image`, `right_card_bottom_text`, `created_at`, `updated_at`) VALUES
(1, 'Designing weddings that reflect your story', 'Welcome to our wedding studio, where every celebration is thoughtfully designed with elegance and emotion. We create timeless wedding experiences that blend creativity.', 'uploads/about/1790761878_story_left.avif', 'Beautifully curated', 'Part of the wedding journey begins with understanding your unique story.', 'View packages', '#', 'Seamless celebrations', 'A beautiful marriage launch begins with honoring your personal romance.', 'View packages', '#', 'Wedding studio', 'Est. 2011', 'uploads/about/1790761878_story_right.avif', 'Redefining wedding experiences', '2026-09-28 04:20:12', '2026-09-30 04:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_teams`
--

DROP TABLE IF EXISTS `about_page_teams`;
CREATE TABLE IF NOT EXISTS `about_page_teams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'ARTISTRY IN MOTION',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'The artists behind your wedding legacy',
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'About us',
  `button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `video_poster` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_mp4` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_webm` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_teams`
--

INSERT INTO `about_page_teams` (`id`, `tagline`, `title`, `description`, `button_text`, `button_link`, `video_poster`, `video_mp4`, `video_webm`, `created_at`, `updated_at`) VALUES
(1, 'ARTISTRY IN MOTION', 'The artists behind your wedding legacy', 'A collective of artists transforming stories into cinematic experiences. We blend logistics with visionary design to craft legacies endure.', 'About us', '#', 'images/69e06bfff096fe744c997c8d_6a43634cafebe64db07790d1_new_poster.0000000.jpg', 'videos/6a6305bf5040b777232a1809_new_mp4.mp4', 'videos/6a6305bf5040b777232a1809_new_webm.webm', '2026-09-28 04:38:33', '2026-09-28 04:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_team_items`
--

DROP TABLE IF EXISTS `about_page_team_items`;
CREATE TABLE IF NOT EXISTS `about_page_team_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_team_items`
--

INSERT INTO `about_page_team_items` (`id`, `name`, `designation`, `image`, `facebook`, `twitter`, `linkedin`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Mia Collings', 'Creative lead', 'images/6a6305bf5040b777232a1836_Event-image-two.avif', '#', '#', '#', 1, '2026-09-28 04:38:33', '2026-09-28 04:38:33'),
(2, 'Lucas Vance', 'Production director', 'images/6a6305bf5040b777232a1839_Event-image-four.avif', '#', '#', '#', 2, '2026-09-28 04:38:33', '2026-09-28 04:38:33'),
(3, 'Elena Rostova', 'Floral designer', 'images/6a6305bf5040b777232a1838_Event-image-five.avif', '#', '#', '#', 3, '2026-09-28 04:38:33', '2026-09-28 04:38:33'),
(4, 'Julian Hayes', 'Event architect', 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif', '#', '#', '#', 4, '2026-09-28 04:38:33', '2026-09-28 04:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_banner_sections`
--

DROP TABLE IF EXISTS `blog_banner_sections`;
CREATE TABLE IF NOT EXISTS `blog_banner_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `banner_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_banner_sections`
--

INSERT INTO `blog_banner_sections` (`id`, `tag`, `title`, `description`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Our blog', 'Wedding stories journal', NULL, 'blog/lSTumxFZlP4W3mMaQkFApJIcOVVpxAtSi4C1uJHI.avif', 'active', '2026-09-29 03:35:03', '2026-09-29 23:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `blog_items`
--

DROP TABLE IF EXISTS `blog_items`;
CREATE TABLE IF NOT EXISTS `blog_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `author_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_role` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `status` enum('active','deactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_items_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_items`
--

INSERT INTO `blog_items` (`id`, `title`, `slug`, `publish_date`, `image`, `banner_image`, `content`, `author_name`, `author_role`, `author_image`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Romantic couple posing against an ancient stone wall 4444', 'romantic-couple-posing-against-an-ancient-stone-wall', '09 January 2026', 'images/6a6305be5040b777232a144e_Blog-image-one.webp', 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif', '<h2>Designing timeless moments inspired by romance and heritage</h2>\r\n\r\n<p>A meaningful celebration begins with the emotions that define your relationship and the atmosphere you wish to create together. We take time to understand your story, your inspirations, and the details that matter most, shaping a wedding experience that feels deeply personal and effortlessly refined. From historic venues to intimate settings filled with charm, every element is thoughtfully curated to reflect your vision with elegance and authenticity.</p>\r\n\r\n<p>Every luxury wedding deserves a balance of artistic storytelling and flawless coordination. Our process focuses on transforming ideas into immersive experiences where every texture, color palette, and design detail works harmoniously together, creating a celebration that feels timeless, sophisticated, and unforgettable for you and your guests.</p>\r\n\r\n<h3>Creating elegant celebrations filled with emotion and refined beauty</h3>\r\n\r\n<p>Our planning philosophy combines creativity, precision, and thoughtful collaboration to deliver exceptional wedding experiences tailored to your unique style. From concept development to event execution, we guide every stage with care, ensuring each moment unfolds seamlessly while maintaining the highest standards of luxury and sophistication throughout the celebration.</p>\r\n\r\n<p>Through curated design direction, personalized planning strategies, and trusted industry expertise, we help couples bring their dream celebrations to life with confidence and clarity. Every detail is intentionally considered to create an atmosphere that feels immersive, romantic, and beautifully connected to your story.</p>\r\n\r\n<p><img alt=\"blog-image\" src=\"/images/6a6305bf5040b777232a1749_blog-details-features-image-one.webp\" style=\"width:469px\" /></p>\r\n\r\n<p><img alt=\"blog-image\" src=\"/images/6a6305bf5040b777232a1733_blog-details-features-image-two.webp\" style=\"width:469px\" /></p>\r\n\r\n<h3>Your trusted creative team for unforgettable destination wedding experiences</h3>\r\n\r\n<p>Whether your vision includes a romantic countryside ceremony, a historic architectural backdrop, or a grand destination celebration, our team provides the expertise needed to deliver a flawless and elevated experience. We focus on creating events that feel luxurious yet deeply personal, ensuring every detail&mdash;from guest experiences to visual storytelling&mdash;is executed with elegance, professionalism, and exceptional attention to detail for a truly memorable occasion.</p>\r\n\r\n<ul>\r\n	<li>Personalized wedding styling and concept development</li>\r\n	<li>Luxury guest coordination and travel assistance</li>\r\n	<li>Romantic floral artistry and table scape design</li>\r\n	<li>Professional timeline and event production management</li>\r\n	<li>Access to exclusive venues and creative partners</li>\r\n</ul>', 'Dennis Taylor', 'Event Manager', 'images/6a6305bf5040b777232a1848_User-image-one.webp', 1, 'active', '2026-09-29 03:31:49', '2026-09-29 23:41:26'),
(2, 'Dreamy gondola beautiful ride through the canals of Venice', 'dreamy-gondola-beautiful-ride-through-the-canals-of-venice', '18 June 2025', 'images/6a6305be5040b777232a14b6_Blog-image-two.webp', 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif', '<h2>Designing timeless moments inspired by romance and heritage</h2><p>A meaningful celebration begins with the emotions that define your relationship and the atmosphere you wish to create together. We take time to understand your story, your inspirations, and the details that matter most, shaping a wedding experience that feels deeply personal and effortlessly refined. From historic venues to intimate settings filled with charm, every element is thoughtfully curated to reflect your vision with elegance and authenticity.</p><p>Every luxury wedding deserves a balance of artistic storytelling and flawless coordination. Our process focuses on transforming ideas into immersive experiences where every texture, color palette, and design detail works harmoniously together, creating a celebration that feels timeless, sophisticated, and unforgettable for you and your guests.</p><h3>Creating elegant celebrations filled with emotion and refined beauty</h3><p>Our planning philosophy combines creativity, precision, and thoughtful collaboration to deliver exceptional wedding experiences tailored to your unique style. From concept development to event execution, we guide every stage with care, ensuring each moment unfolds seamlessly while maintaining the highest standards of luxury and sophistication throughout the celebration.</p><p>Through curated design direction, personalized planning strategies, and trusted industry expertise, we help couples bring their dream celebrations to life with confidence and clarity. Every detail is intentionally considered to create an atmosphere that feels immersive, romantic, and beautifully connected to your story.</p><div class=\"w-layout-hflex fda-features-image-wrapper\" style=\"display:flex;gap:15px;margin:20px 0;\"><div appear=\"\" class=\"fda-features-image fda-overflow-hidden fda-radius\"><img src=\"/images/6a6305bf5040b777232a1749_blog-details-features-image-one.webp\" loading=\"lazy\" width=\"469\" alt=\"blog-image\" /></div><div appear=\"\" class=\"fda-features-image fda-overflow-hidden fda-radius\"><img src=\"/images/6a6305bf5040b777232a1733_blog-details-features-image-two.webp\" loading=\"lazy\" width=\"469\" alt=\"blog-image\" /></div></div><div class=\"fda-more-details-content w-richtext\"><h3>Your trusted creative team for unforgettable destination wedding experiences</h3><p>Whether your vision includes a romantic countryside ceremony, a historic architectural backdrop, or a grand destination celebration, our team provides the expertise needed to deliver a flawless and elevated experience. We focus on creating events that feel luxurious yet deeply personal, ensuring every detail—from guest experiences to visual storytelling—is executed with elegance, professionalism, and exceptional attention to detail for a truly memorable occasion.</p><ul role=\"list\"><li>Personalized wedding styling and concept development</li><li>Luxury guest coordination and travel assistance</li><li>Romantic floral artistry and table scape design</li><li>Professional timeline and event production management</li><li>Access to exclusive venues and creative partners</li></ul></div>', 'Victoria Hayes', 'Creative Director', 'images/6a6305bf5040b777232a1863_Author.avif', 2, 'active', '2026-09-29 03:31:49', '2026-09-29 03:37:22'),
(3, 'Ethereal bridal portrait featuring soft garden greenery light', 'ethereal-bridal-portrait-featuring-soft-garden-greenery-light', '09 January 2025', 'images/6a6305be5040b777232a14dc_Blog-image-three.webp', 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif', '<h2>Designing timeless moments inspired by romance and heritage</h2><p>A meaningful celebration begins with the emotions that define your relationship and the atmosphere you wish to create together. We take time to understand your story, your inspirations, and the details that matter most, shaping a wedding experience that feels deeply personal and effortlessly refined. From historic venues to intimate settings filled with charm, every element is thoughtfully curated to reflect your vision with elegance and authenticity.</p><p>Every luxury wedding deserves a balance of artistic storytelling and flawless coordination. Our process focuses on transforming ideas into immersive experiences where every texture, color palette, and design detail works harmoniously together, creating a celebration that feels timeless, sophisticated, and unforgettable for you and your guests.</p><h3>Creating elegant celebrations filled with emotion and refined beauty</h3><p>Our planning philosophy combines creativity, precision, and thoughtful collaboration to deliver exceptional wedding experiences tailored to your unique style. From concept development to event execution, we guide every stage with care, ensuring each moment unfolds seamlessly while maintaining the highest standards of luxury and sophistication throughout the celebration.</p><p>Through curated design direction, personalized planning strategies, and trusted industry expertise, we help couples bring their dream celebrations to life with confidence and clarity. Every detail is intentionally considered to create an atmosphere that feels immersive, romantic, and beautifully connected to your story.</p><div class=\"w-layout-hflex fda-features-image-wrapper\" style=\"display:flex;gap:15px;margin:20px 0;\"><div appear=\"\" class=\"fda-features-image fda-overflow-hidden fda-radius\"><img src=\"/images/6a6305bf5040b777232a1749_blog-details-features-image-one.webp\" loading=\"lazy\" width=\"469\" alt=\"blog-image\" /></div><div appear=\"\" class=\"fda-features-image fda-overflow-hidden fda-radius\"><img src=\"/images/6a6305bf5040b777232a1733_blog-details-features-image-two.webp\" loading=\"lazy\" width=\"469\" alt=\"blog-image\" /></div></div><div class=\"fda-more-details-content w-richtext\"><h3>Your trusted creative team for unforgettable destination wedding experiences</h3><p>Whether your vision includes a romantic countryside ceremony, a historic architectural backdrop, or a grand destination celebration, our team provides the expertise needed to deliver a flawless and elevated experience. We focus on creating events that feel luxurious yet deeply personal, ensuring every detail—from guest experiences to visual storytelling—is executed with elegance, professionalism, and exceptional attention to detail for a truly memorable occasion.</p><ul role=\"list\"><li>Personalized wedding styling and concept development</li><li>Luxury guest coordination and travel assistance</li><li>Romantic floral artistry and table scape design</li><li>Professional timeline and event production management</li><li>Access to exclusive venues and creative partners</li></ul></div>', 'Benjamin Calder', 'Lead Planner', 'images/6a6305bf5040b777232a184a_User-image-three.webp', 3, 'active', '2026-09-29 03:31:49', '2026-09-29 03:37:22'),
(4, 'Elegant outdoor banquet table set for a wedding ceremony', 'elegant-outdoor-banquet-table-set-for-a-wedding-ceremony', '22 August 2025', 'images/6a6305bf5040b777232a15b1_Blog-image-four.webp', 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif', '<h2>Designing timeless moments inspired by romance and heritage</h2>\r\n\r\n<p>A meaningful celebration begins with the emotions that define your relationship and the atmosphere you wish to create together. We take time to understand your story, your inspirations, and the details that matter most, shaping a wedding experience that feels deeply personal and effortlessly refined. From historic venues to intimate settings filled with charm, every element is thoughtfully curated to reflect your vision with elegance and authenticity.</p>\r\n\r\n<p>Every luxury wedding deserves a balance of artistic storytelling and flawless coordination. Our process focuses on transforming ideas into immersive experiences where every texture, color palette, and design detail works harmoniously together, creating a celebration that feels timeless, sophisticated, and unforgettable for you and your guests.</p>\r\n\r\n<h3>Creating elegant celebrations filled with emotion and refined beauty</h3>\r\n\r\n<p>Our planning philosophy combines creativity, precision, and thoughtful collaboration to deliver exceptional wedding experiences tailored to your unique style. From concept development to event execution, we guide every stage with care, ensuring each moment unfolds seamlessly while maintaining the highest standards of luxury and sophistication throughout the celebration.</p>\r\n\r\n<p>Through curated design direction, personalized planning strategies, and trusted industry expertise, we help couples bring their dream celebrations to life with confidence and clarity. Every detail is intentionally considered to create an atmosphere that feels immersive, romantic, and beautifully connected to your story.</p>\r\n\r\n<p><img alt=\"blog-image\" src=\"/images/6a6305bf5040b777232a1749_blog-details-features-image-one.webp\" style=\"width:469px\" /></p>\r\n\r\n<p><img alt=\"blog-image\" src=\"/images/6a6305bf5040b777232a1733_blog-details-features-image-two.webp\" style=\"width:469px\" /></p>\r\n\r\n<h3>Your trusted creative team for unforgettable destination wedding experiences</h3>\r\n\r\n<p>Whether your vision includes a romantic countryside ceremony, a historic architectural backdrop, or a grand destination celebration, our team provides the expertise needed to deliver a flawless and elevated experience. We focus on creating events that feel luxurious yet deeply personal, ensuring every detail&mdash;from guest experiences to visual storytelling&mdash;is executed with elegance, professionalism, and exceptional attention to detail for a truly memorable occasion.</p>\r\n\r\n<ul>\r\n	<li>Personalized wedding styling and concept development</li>\r\n	<li>Luxury guest coordination and travel assistance</li>\r\n	<li>Romantic floral artistry and table scape design</li>\r\n	<li>Professional timeline and event production management</li>\r\n	<li>Access to exclusive venues and creative partners</li>\r\n</ul>', 'Eleanor Brooks', 'Stylist', 'images/6a6305bf5040b777232a1841_User-image-four.webp', 4, 'active', '2026-09-29 03:31:49', '2026-09-29 08:00:29'),
(5, 'Intimate wedding moment captured in a lush garden', 'intimate-wedding-moment-captured-in-a-lush-garden', '06 August 2025', 'images/6a6305bf5040b777232a1583_Blog-image-five.webp', 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif', '<h2>Designing timeless moments inspired by romance and heritage</h2><p>A meaningful celebration begins with the emotions that define your relationship and the atmosphere you wish to create together. We take time to understand your story, your inspirations, and the details that matter most, shaping a wedding experience that feels deeply personal and effortlessly refined. From historic venues to intimate settings filled with charm, every element is thoughtfully curated to reflect your vision with elegance and authenticity.</p><p>Every luxury wedding deserves a balance of artistic storytelling and flawless coordination. Our process focuses on transforming ideas into immersive experiences where every texture, color palette, and design detail works harmoniously together, creating a celebration that feels timeless, sophisticated, and unforgettable for you and your guests.</p><h3>Creating elegant celebrations filled with emotion and refined beauty</h3><p>Our planning philosophy combines creativity, precision, and thoughtful collaboration to deliver exceptional wedding experiences tailored to your unique style. From concept development to event execution, we guide every stage with care, ensuring each moment unfolds seamlessly while maintaining the highest standards of luxury and sophistication throughout the celebration.</p><p>Through curated design direction, personalized planning strategies, and trusted industry expertise, we help couples bring their dream celebrations to life with confidence and clarity. Every detail is intentionally considered to create an atmosphere that feels immersive, romantic, and beautifully connected to your story.</p><div class=\"w-layout-hflex fda-features-image-wrapper\" style=\"display:flex;gap:15px;margin:20px 0;\"><div appear=\"\" class=\"fda-features-image fda-overflow-hidden fda-radius\"><img src=\"/images/6a6305bf5040b777232a1749_blog-details-features-image-one.webp\" loading=\"lazy\" width=\"469\" alt=\"blog-image\" /></div><div appear=\"\" class=\"fda-features-image fda-overflow-hidden fda-radius\"><img src=\"/images/6a6305bf5040b777232a1733_blog-details-features-image-two.webp\" loading=\"lazy\" width=\"469\" alt=\"blog-image\" /></div></div><div class=\"fda-more-details-content w-richtext\"><h3>Your trusted creative team for unforgettable destination wedding experiences</h3><p>Whether your vision includes a romantic countryside ceremony, a historic architectural backdrop, or a grand destination celebration, our team provides the expertise needed to deliver a flawless and elevated experience. We focus on creating events that feel luxurious yet deeply personal, ensuring every detail—from guest experiences to visual storytelling—is executed with elegance, professionalism, and exceptional attention to detail for a truly memorable occasion.</p><ul role=\"list\"><li>Personalized wedding styling and concept development</li><li>Luxury guest coordination and travel assistance</li><li>Romantic floral artistry and table scape design</li><li>Professional timeline and event production management</li><li>Access to exclusive venues and creative partners</li></ul></div>', 'Dennis Taylor', 'Event Manager', 'images/6a6305bf5040b777232a1848_User-image-one.webp', 5, 'active', '2026-09-29 03:31:49', '2026-09-29 03:37:22'),
(6, 'Close up detail of a beautiful white bouquet loudge', 'close-up-detail-of-a-beautiful-white-bouquet-loudge', '23 July 2025', 'images/6a6305bf5040b777232a15e1_Blog-image-six.webp', 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif', '<h2>Designing timeless moments inspired by romance and heritage</h2><p>A meaningful celebration begins with the emotions that define your relationship and the atmosphere you wish to create together. We take time to understand your story, your inspirations, and the details that matter most, shaping a wedding experience that feels deeply personal and effortlessly refined. From historic venues to intimate settings filled with charm, every element is thoughtfully curated to reflect your vision with elegance and authenticity.</p><p>Every luxury wedding deserves a balance of artistic storytelling and flawless coordination. Our process focuses on transforming ideas into immersive experiences where every texture, color palette, and design detail works harmoniously together, creating a celebration that feels timeless, sophisticated, and unforgettable for you and your guests.</p><h3>Creating elegant celebrations filled with emotion and refined beauty</h3><p>Our planning philosophy combines creativity, precision, and thoughtful collaboration to deliver exceptional wedding experiences tailored to your unique style. From concept development to event execution, we guide every stage with care, ensuring each moment unfolds seamlessly while maintaining the highest standards of luxury and sophistication throughout the celebration.</p><p>Through curated design direction, personalized planning strategies, and trusted industry expertise, we help couples bring their dream celebrations to life with confidence and clarity. Every detail is intentionally considered to create an atmosphere that feels immersive, romantic, and beautifully connected to your story.</p><div class=\"w-layout-hflex fda-features-image-wrapper\" style=\"display:flex;gap:15px;margin:20px 0;\"><div appear=\"\" class=\"fda-features-image fda-overflow-hidden fda-radius\"><img src=\"/images/6a6305bf5040b777232a1749_blog-details-features-image-one.webp\" loading=\"lazy\" width=\"469\" alt=\"blog-image\" /></div><div appear=\"\" class=\"fda-features-image fda-overflow-hidden fda-radius\"><img src=\"/images/6a6305bf5040b777232a1733_blog-details-features-image-two.webp\" loading=\"lazy\" width=\"469\" alt=\"blog-image\" /></div></div><div class=\"fda-more-details-content w-richtext\"><h3>Your trusted creative team for unforgettable destination wedding experiences</h3><p>Whether your vision includes a romantic countryside ceremony, a historic architectural backdrop, or a grand destination celebration, our team provides the expertise needed to deliver a flawless and elevated experience. We focus on creating events that feel luxurious yet deeply personal, ensuring every detail—from guest experiences to visual storytelling—is executed with elegance, professionalism, and exceptional attention to detail for a truly memorable occasion.</p><ul role=\"list\"><li>Personalized wedding styling and concept development</li><li>Luxury guest coordination and travel assistance</li><li>Romantic floral artistry and table scape design</li><li>Professional timeline and event production management</li><li>Access to exclusive venues and creative partners</li></ul></div>', 'Victoria Hayes', 'Creative Director', 'images/6a6305bf5040b777232a1863_Author.avif', 6, 'active', '2026-09-29 03:31:49', '2026-09-29 03:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

DROP TABLE IF EXISTS `contact_enquiries`;
CREATE TABLE IF NOT EXISTS `contact_enquiries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_replied` tinyint(1) NOT NULL DEFAULT '0',
  `reply_message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `name`, `email`, `phone`, `budget`, `message`, `is_replied`, `reply_message`, `created_at`, `updated_at`) VALUES
(1, 'Disha Suthar', 'disha.tryangletech@gmail.com', '7854120369', 'k - k', 'dsfdsf', 1, 'xzXZ', '2026-09-30 07:04:42', '2026-09-30 07:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_cards`
--

DROP TABLE IF EXISTS `contact_page_cards`;
CREATE TABLE IF NOT EXISTS `contact_page_cards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon_type` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'email',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_page_cards`
--

INSERT INTO `contact_page_cards` (`id`, `icon_type`, `title`, `subtitle`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'email', 'info@example.com', 'Have a project in mind? Send a message.', 1, '2026-09-28 04:56:14', '2026-09-28 04:56:14'),
(2, 'phone', '(888) 456 - 7890', 'We\'re interested in working together!', 2, '2026-09-28 04:56:14', '2026-09-28 04:56:14'),
(3, 'address', '123 Riverbend, California 94025, USA', 'Join our growing team?', 3, '2026-09-28 04:56:14', '2026-09-28 04:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_faqs`
--

DROP TABLE IF EXISTS `contact_page_faqs`;
CREATE TABLE IF NOT EXISTS `contact_page_faqs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'FAQ',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Elegant answers for your special celebrations',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_page_faqs`
--

INSERT INTO `contact_page_faqs` (`id`, `tagline`, `title`, `created_at`, `updated_at`) VALUES
(1, 'FAQ', 'Elegant answers for your special celebrations', '2026-09-28 04:56:14', '2026-09-28 04:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_faq_items`
--

DROP TABLE IF EXISTS `contact_page_faq_items`;
CREATE TABLE IF NOT EXISTS `contact_page_faq_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_page_faq_items`
--

INSERT INTO `contact_page_faq_items` (`id`, `question`, `answer`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'How do you plan our wedding from start to finish?', 'We start with an in-depth consultation to understand your vision, followed by detailed curation, vendor coordination, and seamless on-day management.', 1, '2026-09-28 04:56:14', '2026-09-28 04:56:14'),
(2, 'Can you customize weddings based on our theme?', 'Absolutely! Every element from venue styling to floral arrangements and tableware is completely tailored to your theme and personal story.', 2, '2026-09-28 04:56:14', '2026-09-28 04:56:14'),
(3, 'Do you offer budget friendly planning options?', 'We offer transparent, flexible packages tailored to fit a range of investment levels without compromising on quality or elegance.', 3, '2026-09-28 04:56:14', '2026-09-28 04:56:14'),
(4, 'What is your policy on cancellations or date changes?', 'We offer flexible rescheduling options subject to venue and vendor availability, ensuring peace of mind during unforeseen events.', 4, '2026-09-28 04:56:14', '2026-09-28 04:56:14'),
(5, 'Is it possible to change dates or cancels a booked event?', 'Yes, our team works closely with you and all key partners to accommodate date changes wherever possible.', 5, '2026-09-28 04:56:14', '2026-09-28 04:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_forms`
--

DROP TABLE IF EXISTS `contact_page_forms`;
CREATE TABLE IF NOT EXISTS `contact_page_forms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Send us a message',
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_page_forms`
--

INSERT INTO `contact_page_forms` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Send us a message', 'uploads/contact/1790687026_contact_form_img.avif', '2026-09-28 04:56:14', '2026-09-29 07:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_headers`
--

DROP TABLE IF EXISTS `contact_page_headers`;
CREATE TABLE IF NOT EXISTS `contact_page_headers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'GET IN TOUCH',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Inquire about your timeless union',
  `background_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_page_headers`
--

INSERT INTO `contact_page_headers` (`id`, `tagline`, `title`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'GET IN TOUCH', 'Inquire about your timeless union', 'uploads/contact/1790687008_contact_bg.avif', '2026-09-28 04:56:14', '2026-09-29 07:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `event_banner_sections`
--

DROP TABLE IF EXISTS `event_banner_sections`;
CREATE TABLE IF NOT EXISTS `event_banner_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `client_image_1` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_image_2` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_image_3` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_banner_sections`
--

INSERT INTO `event_banner_sections` (`id`, `tag`, `title`, `description`, `client_image_1`, `client_image_2`, `client_image_3`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upcoming events', 'Upcoming weddings and showcases', 'Every love story is unique and deserves a beautiful beginning. We design heartfelt celebrations with thoughtful details,with creating timeless experiences.', 'images/6a6305be5040b777232a1497_event-client-image.webp', 'images/6a6305be5040b777232a1499_event-client-image-two.webp', 'images/6a6305be5040b777232a1498_event-client-image-three.webp', 'images/6a6305bf5040b777232a15d9_event-banner-image.avif', 'active', '2026-09-28 07:39:28', '2026-09-29 05:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `event_items`
--

DROP TABLE IF EXISTS `event_items`;
CREATE TABLE IF NOT EXISTS `event_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `detail_headline` text COLLATE utf8mb4_unicode_ci,
  `detail_content` text COLLATE utf8mb4_unicode_ci,
  `detail_sub_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_highlight_1` text COLLATE utf8mb4_unicode_ci,
  `detail_highlight_2` text COLLATE utf8mb4_unicode_ci,
  `gallery_image_1` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image_2` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image_3` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image_4` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'WEDDING Gallery',
  `gallery_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Explore our exclusive signature wedding clicks',
  `location` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '1',
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_items`
--

INSERT INTO `event_items` (`id`, `title`, `slug`, `date_text`, `description`, `detail_headline`, `detail_content`, `detail_sub_image`, `detail_highlight_1`, `detail_highlight_2`, `gallery_image_1`, `gallery_image_2`, `gallery_image_3`, `gallery_image_4`, `gallery_tag`, `gallery_title`, `location`, `time_text`, `image`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Romantic garden couple shoot', 'romantic-garden-couple-shoot', 'August 12, 2025', 'A romantic garden-inspired couple edit capturing timeless elegance, soft florals, and intimate wedding moments.', 'Celebrate timeless romance surrounded by blooming florals, elegant styling, and intimate moments designed to inspire unforgettable wedding celebrations.', '<p>Step into a beautifully curated garden experience where romance and refined design come together in perfect harmony. Inspired by modern love stories and timeless wedding traditions, this showcase captures the beauty of intimate celebrations through lush floral installations, candlelit pathways, and sophisticated décor details. Every setting is thoughtfully designed to create an atmosphere filled with warmth, elegance, and emotional connection.</p><p>Couples are invited to explore immersive ceremony concepts, luxurious reception inspirations, and bespoke styling arrangements tailored for refined celebrations. From handcrafted tablescapes to romantic lounge settings, each detail reflects artistry, sophistication, and a deep appreciation for meaningful experiences. Our creative team collaborates closely with floral designers, stylists, and planners to transform ordinary spaces into enchanting garden escapes that feel effortlessly romantic.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><h6>A romantic garden experience thoughtfully designed to celebrate artistry, elegance, and the beauty of timeless love stories.</h6><ul><li>Elegant Styling : Our creative team combines layered textures, soft floral palettes, ambient lighting, and refined décor details to create wedding settings filled with sophistication, intimacy, and visual harmony.</li><li>Curated Experiences : We partner with trusted photographers, luxury vendors, couture designers, and entertainment specialists to provide couples with seamless access to exceptional wedding services and personalized planning support.</li></ul><h6>Experience an atmosphere where thoughtful hospitality and romantic design inspire unforgettable wedding celebrations.</h6><p>From enchanting garden ceremonies to candlelit receptions beneath the evening sky, every detail within the showcase reflects a commitment to meaningful experiences and timeless elegance. Couples leave inspired with fresh ideas, expert guidance, and a deeper appreciation for how intentional styling and personalized details can transform a wedding celebration into an unforgettable story.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/dNquvJAVPxmx4o1RiI3rh5WLAzn2D1gJePOlxNbh.avif', 'events/iz8pXK9q7mCO4KYJdagawoRrOgTG97Y3LfAmsUH6.avif', 'events/vmelnULBz4SxqSakXMT3Vbw8gLTTncCPQZGGkQfd.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'Paris', '9:00 AM - 11:00 AM', 'images/6a6305bf5040b777232a182e_Event-image-one.avif', 1, 'active', '2026-09-28 07:39:28', '2026-09-29 04:06:18'),
(2, 'Luxury vintage car arrival', 'luxury-vintage-car-arrival', 'September 2, 2025', 'A refined wedding moment featuring graceful arrivals, classic elegance, and unforgettable celebrations.', 'Experience a beautifully curated welcome where sophistication, romance, and refined details create the perfect beginning to an unforgettable wedding celebration.', '<p>From the very first arrival, guests are welcomed into an atmosphere designed to reflect timeless elegance and effortless sophistication. Grand estate entrances, romantic floral installations, candlelit pathways, and thoughtfully styled décor create a warm and memorable first impression that sets the tone for the entire celebration. Every detail is intentionally curated to make couples and guests feel immersed in an experience filled with beauty, charm, and meaningful moments.</p><p>Our creative team collaborates with luxury stylists, floral designers, and hospitality specialists to craft seamless arrival experiences tailored to each wedding vision. From elegant valet welcomes and bespoke signage to refined lounge settings and ambient lighting, every element contributes to a celebration that feels polished, intimate, and visually unforgettable. Guests are invited to enjoy a welcoming atmosphere where thoughtful hospitality and timeless design come together effortlessly.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><h6>A refined wedding experience inspired by graceful details, romantic styling, and unforgettable first impressions.</h6><ul><li>Luxury Styling : Soft floral palettes, elegant textures, custom décor arrangements, and sophisticated lighting designs create an elevated atmosphere filled with warmth and timeless beauty.</li><li>Curated Hospitality<strong> </strong>: Our trusted network of planners, stylists, entertainment specialists, and hospitality professionals work together to ensure every guest arrival feels seamless, welcoming, and exceptionally memorable.</li></ul><h6>Celebrate the beginning of your wedding journey with an atmosphere designed to inspire elegance, connection, and lasting memories.</h6><p>Whether hosting an intimate garden ceremony or a grand estate reception, every arrival experience is crafted to reflect the couple’s unique story and personal style. From the first welcome to the final celebration, thoughtful details and refined presentation create a timeless wedding experience guests will remember long after the event concludes.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/e6lKOTmjH9EDKb7y5xbSLA4tskQmwvCgEVeUsNoE.avif', 'events/GomemTIPYNPT8aO6XgTcpC11j9wJyIk86nDH9Ooq.avif', 'events/n6YPGf1zkozTimGLeRyWOP0dlAqCstAXuqBo2bev.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'Florence', '10:15 AM - 11:15 AM', 'images/6a6305bf5040b777232a1836_Event-image-two.avif', 2, 'active', '2026-09-28 07:39:29', '2026-09-29 04:13:17'),
(3, 'A sparkling moment together', 'a-sparkling-moment-together', 'July 1, 2025', 'A beautiful couple moment filled with joy, elegance, and timeless romance in a sparkling wedding atmosphere.', 'Celebrate love through unforgettable moments filled with elegance, romance, and the timeless beauty of meaningful connection.', '<p>Every love story deserves moments that feel magical, intimate, and beautifully unforgettable. Inspired by refined celebrations and modern romance, this experience captures the joy of togetherness through glowing candlelight, elegant floral styling, and thoughtfully curated details that create an atmosphere of warmth and sophistication. From romantic garden settings to sparkling evening receptions, every element is designed to reflect the beauty of connection and celebration.</p><p>Our creative team works closely with couples to design experiences that feel personal, elevated, and effortlessly timeless. Luxurious tablescapes, soft ambient lighting, handcrafted décor accents, and carefully styled spaces come together to create moments that feel both intimate and visually captivating. Guests are welcomed into an environment where meaningful interactions, heartfelt celebrations, and elegant styling blend seamlessly to create memories that last forever.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><h6>An enchanting celebration experience inspired by romance, elegance, and unforgettable shared moments.</h6><ul><li>Romantic Styling<strong> </strong>: Refined floral arrangements, layered textures, candlelit details, and sophisticated décor concepts create a setting filled with charm, warmth, and timeless beauty.</li><li>Curated Experiences<strong> </strong>: From luxury planning support to exceptional hospitality and entertainment, every detail is thoughtfully coordinated to ensure a seamless and memorable celebration.</li></ul><h6>Experience the joy of celebrating together in an atmosphere designed to sparkle with beauty, emotion, and timeless romance.</h6><p>Whether shared beneath glowing lights, during an intimate ceremony, or throughout a grand evening celebration, every moment is thoughtfully crafted to reflect the couple’s unique story. With elegant design, heartfelt details, and a refined atmosphere, the celebration becomes more than an event — it becomes a cherished memory filled with love and lasting beauty.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/FyIF5WWVqGtERDY0pDtE4LKDsB3xNi1zgZH8fnw9.avif', 'events/Z6O6H2pLTYynKBU4g5lhQEZYF1dyy5JIte5cfGw3.avif', 'events/ZKX8Q6asgoVAtDm0Ebv7SQi0Mbpan3EsDHphmu2Z.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'London', '11:30 AM - 12:30 PM', 'events/DNvhsyC9FSuLSVzSlSHjIp8lFNra9ovoP8OIgLoO.avif', 3, 'active', '2026-09-28 07:39:29', '2026-09-29 04:31:46'),
(4, 'Candid moments of joy with love', 'candid-moments-of-joy-with-love', 'August 21, 2025', 'Natural moments of laughter and love beautifully captured, celebrating genuine emotions.', 'Celebrate genuine emotions, heartfelt connections, and beautifully unscripted moments captured within an atmosphere of timeless romance and elegance.', '<p>Every wedding celebration is filled with spontaneous laughter, meaningful glances, and unforgettable memories that deserve to be cherished forever. Inspired by authentic love stories and refined celebrations, this experience embraces the beauty of candid moments shared between couples, family, and friends. From joyful garden ceremonies to intimate evening receptions, every setting is thoughtfully styled to create a warm and emotionally rich atmosphere where genuine connections naturally unfold.</p><p>Our creative team carefully designs elegant spaces that encourage comfort, intimacy, and celebration while maintaining a sophisticated aesthetic. Romantic floral arrangements, ambient lighting, luxurious décor details, and beautifully curated lounge settings come together to create the perfect backdrop for heartfelt interactions and timeless photography. Guests are invited to experience an environment where every smile, embrace, and shared moment becomes part of a beautifully memorable celebration.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><h6>An elegant celebration experience inspired by authentic emotions, timeless romance, and unforgettable shared memories.</h6><ul><li>Refined Styling : Soft floral palettes, layered textures, candlelit accents, and sophisticated décor arrangements create spaces that feel intimate, welcoming, and visually captivating.</li><li>Thoughtful Experiences<strong> </strong>: Our trusted planners, stylists, and hospitality specialists collaborate to ensure every detail feels seamless, allowing couples and guests to fully enjoy each meaningful moment together.</li></ul><h6>Experience a celebration where genuine joy, romantic elegance, and heartfelt connections create memories that last forever.</h6><p>From quiet emotional exchanges to joyful celebrations shared beneath glowing lights, every detail is thoughtfully designed to honor the beauty of togetherness. Through elegant styling, intentional hospitality, and authentic experiences, the celebration becomes a timeless reflection of love, happiness, and unforgettable moments shared with the people who matter most.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/pbiiWOxMklXyboa9z8TvaAmzDUGgFGHI1Z2RYjhJ.avif', 'events/sEm0v4HLuf3wAtotfoTyYjQ1ltvExvfsxAoqFwcj.avif', 'events/WRxXgZ7wfE65MhcRz0OMy5rY9Pg5j44DbrjWf9YZ.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'Rome', '12:45 PM - 1:45 PM', 'images/6a6305bf5040b777232a1839_Event-image-four.avif', 4, 'active', '2026-09-28 07:39:29', '2026-09-29 05:21:38'),
(5, 'Waterfront garden altar sea views', 'waterfront-garden-altar-sea-views', 'October 15, 2025', 'A breathtaking waterfront garden altar surrounded by sea views, creating a romantic celebrations.', 'Experience a breathtaking wedding setting where romantic garden elegance meets panoramic waterfront views for an unforgettable celebration.', '<p>Set against the beauty of the open sea, this enchanting waterfront garden altar creates a timeless atmosphere designed for elegant and meaningful wedding celebrations. Flowing coastal breezes, lush floral arrangements, and beautifully styled ceremony spaces come together to create a setting filled with romance, tranquility, and refined sophistication. Every detail is thoughtfully curated to capture the natural beauty of the surroundings while offering couples a truly unforgettable experience beside the water.</p><p>Our creative designers collaborate with floral artists and luxury stylists to transform the venue into a serene coastal escape featuring romantic aisle arrangements, candlelit accents, and elegant reception concepts inspired by the sea. Guests are welcomed into an environment where scenic ocean views and graceful garden styling blend seamlessly to create moments that feel intimate, elevated, and visually breathtaking. From sunset ceremonies to sophisticated evening receptions, every celebration is designed with timeless elegance in mind.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><h6>A romantic waterfront experience inspired by coastal beauty, refined design, and unforgettable wedding moments.</h6><ul><li>Coastal Styling : Soft floral palettes, natural textures, flowing drapery, and ambient lighting create a sophisticated atmosphere that perfectly complements the surrounding sea views and garden setting.</li><li>Curated Celebrations : Our trusted planners, hospitality specialists, and luxury vendors work together to deliver seamless experiences tailored to each couple’s unique wedding vision and personal style.</li></ul><h6>Celebrate your love beside the water in an atmosphere filled with elegance, serenity, and timeless romantic charm.</h6><p>Whether exchanging vows beneath a floral altar overlooking the ocean or hosting an intimate reception beneath the evening sky, every detail is designed to create lasting memories. The combination of breathtaking scenery, thoughtful hospitality, and refined styling transforms each celebration into a truly extraordinary waterfront wedding experience.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/VOw9FLXSt2BD31fz0xXlejutGvIVjdvDkGCuWLjk.avif', 'events/RgySeqBym9V6T658HZMvBWtzkSwQ9UXMFnILrSxY.avif', 'events/av0usvX5xAHQ4m4KRal4ePN2YVGEwk1WQb4qF47G.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'Milan', '2:00 PM - 3:00 PM', 'images/6a6305bf5040b777232a1838_Event-image-five.avif', 5, 'active', '2026-09-28 07:39:29', '2026-09-29 05:23:20'),
(6, 'Sunset stroll through gardens', 'sunset-stroll-through-gardens', 'December 17, 2025', 'A romantic sunset stroll through blooming gardens, capturing timeless love in a peaceful atmosphere.', 'Experience the beauty of golden sunsets, romantic garden pathways, and timeless moments shared within an atmosphere of refined elegance.', '<p>As the evening light settles across blooming gardens and softly illuminated pathways, couples are invited to embrace a romantic experience inspired by nature, beauty, and meaningful connection. This enchanting setting captures the warmth of sunset celebrations through elegant floral arrangements, peaceful outdoor spaces, and thoughtfully styled details designed to create unforgettable memories. Every corner of the garden reflects a sense of tranquility, sophistication, and timeless romance.</p><p>Our creative team carefully curates immersive garden experiences that blend natural scenery with refined wedding styling. Flowing floral installations, ambient candlelight, elegant lounge settings, and intimate walkways create the perfect backdrop for quiet conversations, joyful celebrations, and breathtaking photography. Guests are welcomed into an atmosphere where every sunset moment feels intimate, graceful, and beautifully unforgettable.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><h6>A romantic garden experience inspired by golden light, timeless elegance, and unforgettable evening celebrations.</h6><ul><li>Garden Styling : Lush florals, layered textures, warm lighting, and sophisticated décor elements come together to create a setting filled with beauty, charm, and romantic ambiance.</li><li>Curated Experiences : Our trusted planners, stylists, and hospitality specialists collaborate to ensure every detail feels seamless, personalized, and thoughtfully designed for meaningful celebrations.</li></ul><h6>Celebrate love beneath glowing skies in an atmosphere where nature, elegance, and romance come together effortlessly.</h6><p>Whether enjoying a quiet walk through blooming pathways or sharing unforgettable moments beneath the evening sky, every detail is crafted to inspire connection and lasting memories. With refined styling, breathtaking scenery, and thoughtful hospitality, the experience becomes a timeless celebration of love, beauty, and togetherness.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/oAVvCRaP8zUDA3dULjHUdehRsHT7wTnK8Hnyb8sY.avif', 'events/JYrMjaHgH3EC4UKRyRxLzYRrtopHcD7HfJ8TgvDw.avif', 'events/e0bzlpfne1p131tvu36YnIvWqbTodeqGPa5rECNc.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'Nice', '3:15 PM - 4:15 PM', 'images/6a6305bf5040b777232a183d_Event-image-six.avif', 6, 'active', '2026-09-28 07:39:29', '2026-09-29 05:27:32'),
(7, 'Floral bridal garden mood', 'floral-bridal-garden-mood', 'April 16, 2025', 'A dreamy floral bridal garden setting filled with soft blooms, elegant details, and timeless romantic charm.', 'Immerse yourself in a romantic bridal experience filled with blooming florals, graceful styling, and timeless garden elegance.', '<p>Inspired by the beauty of nature and the charm of refined wedding celebrations, this floral bridal garden setting creates an atmosphere designed to feel elegant, intimate, and unforgettable. Lush floral installations, soft pastel palettes, and beautifully styled outdoor spaces transform the venue into a romantic escape where every detail reflects sophistication and timeless romance. From delicate ceremony arches to candlelit reception arrangements, the experience is thoughtfully curated to inspire modern bridal celebrations.</p><p>Our creative designers collaborate with floral artists and luxury stylists to craft immersive garden concepts that blend natural beauty with elevated wedding aesthetics. Elegant tablescapes, flowing floral arrangements, ambient lighting, and bespoke décor accents create the perfect setting for meaningful moments and unforgettable memories. Guests are invited to explore beautifully designed spaces where romance, artistry, and thoughtful hospitality come together seamlessly.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><h6>A beautifully curated bridal experience inspired by floral artistry, romantic elegance, and timeless garden celebrations.</h6><ul><li>Bridal Styling : Soft floral textures, elegant décor arrangements, refined furnishings, and layered lighting designs create a sophisticated atmosphere filled with warmth and charm.</li><li>Curated Details : From personalized planning support to exceptional hospitality and luxury vendor collaborations, every element is carefully designed to bring each bridal vision to life effortlessly.</li></ul><h6>Celebrate love surrounded by blooming beauty, graceful details, and an atmosphere designed for unforgettable wedding moments.</h6><p>Whether hosting an intimate garden ceremony or a grand outdoor reception, every detail within the experience reflects timeless sophistication and romantic storytelling. Through elegant styling, breathtaking floral designs, and thoughtful experiences, the celebration becomes a meaningful reflection of love, beauty, and lasting memories.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/aEliMaal1zjcmJQ506pnmX55GigPUyUZeNcnavVB.avif', 'events/6JNxgeIPCWmICHxYebkLxyYaamq1jBrNiG7YkPyP.avif', 'events/SVuo63E6DHlHTHX3yeUHu0uNxkhK3LFgpTueEkla.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'Venice', '4:30 PM - 5:30 PM', 'images/69fda8c857c7ebe55cda2a82_Event-image-seven.avif', 7, 'active', '2026-09-28 07:39:29', '2026-09-29 05:29:12'),
(8, 'Chic spring wedding scene', 'chic-spring-wedding-scene', 'January 24, 2026', 'A chic spring wedding scene featuring fresh florals, elegant styling, and a romantic atmosphere full of charm.', 'Discover a sophisticated spring wedding experience where modern elegance, romantic florals, and timeless celebration details come together beautifully.', '<p>Inspired by the freshness of spring and the charm of refined wedding design, this chic celebration setting blends contemporary sophistication with romantic garden beauty. Soft seasonal florals, elegant décor accents, and thoughtfully styled spaces create an atmosphere that feels vibrant, graceful, and effortlessly luxurious. From intimate outdoor ceremonies to stylish evening receptions, every detail is curated to reflect timeless romance with a modern touch.</p><p>Our creative team collaborates with luxury floral designers, stylists, and hospitality specialists to craft immersive wedding experiences tailored for unforgettable celebrations. Elegant tables capes, ambient lighting, flowing floral installations, and bespoke décor concepts come together to create visually captivating spaces filled with warmth and charm. Guests are welcomed into an environment designed to inspire meaningful moments, joyful gatherings, and lasting memories shared with loved ones.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><p>A stylish spring celebration inspired by romantic elegance, modern sophistication, and beautifully curated wedding experiences.</p><ul><li>Modern Styling : Seasonal floral palettes, layered textures, refined furnishings, and elegant lighting arrangements create a sophisticated atmosphere filled with beauty and contemporary charm.</li><li>Curated Celebrations : Our trusted planners, stylists, entertainment specialists, and hospitality professionals collaborate seamlessly to deliver personalized wedding experiences with exceptional attention to detail.</li></ul><h6>Celebrate your wedding in an atmosphere where spring beauty, refined styling, and timeless romance create unforgettable moments.</h6><p>Whether exchanging vows beneath blooming florals or hosting a stylish reception beneath glowing evening lights, every detail is designed to reflect the couple’s unique story and vision. Through elegant design, thoughtful hospitality, and romantic ambiance, the celebration becomes a timeless expression of love, sophistication, and joyful connection.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/PLNOOj1z0hvabmDR6R4EEGPuFTFRHnU5VxWNxa1Y.avif', 'events/Lri0yNktzdqGbwfcLyUN76aW2ztPvBxZYnEzV4mC.avif', 'events/vuZDjN0RQDF1NpeKlm75UHvajZHl35ctxnR8CAFq.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'Vienna', '5:45 PM - 6:30 PM', 'images/6a6305bf5040b777232a1861_Event-image-eight.avif', 8, 'active', '2026-09-28 07:39:29', '2026-09-29 05:30:20'),
(9, 'Spring bridal garden showcase', 'spring-bridal-garden-showcase', 'November 19, 2025', 'An elegant spring bridal garden showcase filled with blooming florals, refined decor, and wedding inspiration.', 'Explore the upcoming season’s enchanting wedding trends at The Grand Estate. A showcase designed to inspire couples seeking a refined and timeless celebration.', '<p>Throughout the event, guests are invited to explore beautifully styled ceremony settings, bespoke reception concepts, and signature tables capes created by our lead designers alongside internationally inspired floral artists. Every detail is carefully composed to evoke warmth, sophistication, and natural beauty while highlighting the latest wedding trends for the upcoming season.</p><p>Couples can meet privately with our planning specialists to discuss personalized celebrations tailored to their vision, whether intimate gatherings or grand multi-day events. From custom stationery suites and couture-inspired styling ideas to curated entertainment concepts and elegant venue layouts, every element is designed to inspire a seamless and meaningful wedding experience.</p><p>‍</p><p><img src=\"https://cdn.prod.website-files.com/6a6305be5040b777232a1424/6a6305bf5040b777232a184b_Event%20data.avif\" alt=\"Event image\" width=\"736\" height=\"383\"></p><p>‍</p><p>Guests will also enjoy a carefully selected menu of seasonal refreshments, handcrafted desserts, and artisanal beverages while discovering refined décor textures, luxury linen pairings, and romantic lighting concepts throughout the estate grounds.</p><ul><li>Bespoke Styling : Our creative team transforms every space with layered floral compositions, sophisticated color palettes, and thoughtfully curated décor details that reflect each couple’s personality and story.</li><li>Curated Network :Collaborate with a trusted collection of premium photographers, stylists, musicians, and hospitality partners known for delivering exceptional wedding experiences with elegance and professionalism.</li></ul><h6>Experience an atmosphere where artistry, romance, and thoughtful hospitality come together to create the perfect beginning for your celebration journey.</h6><p>From intimate ceremony concepts to grand reception inspirations, every detail within the showcase is thoughtfully curated to help couples explore meaningful ideas for their special day. Guests will leave with fresh inspiration, valuable planning insights, and a deeper understanding of how refined design, exceptional service, and intentional storytelling can transform a wedding celebration into a truly unforgettable.</p>', 'images/6a6305bf5040b777232a184b_Event-data.avif', NULL, NULL, 'images/6a6305bf5040b777232a1703_Classic-gallery.avif', 'events/SR0aSQXw3xlYmc3Qp3v4grZQeAKzHYMt7TcTO37l.avif', 'events/psvUfbJDtPuyJByiYj5UNKUs6dtly2wlOO3pltaU.avif', 'events/NTKc8qtbLmHeYChKfku0ylqr52D25CqP8vkhfFzK.avif', 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', 'New York,USA', '5:30 PM - 6:30 PM', 'images/6a6305bf5040b777232a1850_Event-image-nine.avif', 9, 'active', '2026-09-28 07:39:29', '2026-09-29 05:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `event_section_headers`
--

DROP TABLE IF EXISTS `event_section_headers`;
CREATE TABLE IF NOT EXISTS `event_section_headers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_section_headers`
--

INSERT INTO `event_section_headers` (`id`, `tag`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Our event', 'Planning your perfection', 'Thoughtfully curating every detail to bring your vision to life with elegance, seamless coordination, and unforgettable wedding moments.', '2026-09-28 07:39:28', '2026-09-28 07:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

DROP TABLE IF EXISTS `footer_settings`;
CREATE TABLE IF NOT EXISTS `footer_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_text` text COLLATE utf8mb4_unicode_ci,
  `social_heading` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quick_links_heading` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_heading` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_view_all_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_view_all_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_links` json DEFAULT NULL,
  `contact_heading` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_label` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_label` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_link_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_link_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenses_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenses_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_guide_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_guide_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `logo`, `about_text`, `social_heading`, `facebook_url`, `linkedin_url`, `twitter_url`, `instagram_url`, `youtube_url`, `quick_links_heading`, `services_heading`, `services_view_all_text`, `services_view_all_url`, `services_links`, `contact_heading`, `email_label`, `email`, `phone_label`, `phone`, `copyright_text`, `copyright_link_text`, `copyright_link_url`, `licenses_text`, `licenses_url`, `style_guide_text`, `style_guide_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'images/elegant_occasions_logo_white.png', 'Crafting unforgettable celebrations that tell your story, with artistry, precision, and heart.', 'Follow us', 'https://facebook.com', 'https://linkedin.com', 'https://x.com', 'https://instagram.com', 'https://youtube.com', 'Useful links', 'Get in touch', 'View all services', '/service-three', '[{\"url\": \"/\", \"title\": \"Home\"}, {\"url\": \"/about\", \"title\": \"About\"}, {\"url\": \"/service\", \"title\": \"Service\"}, {\"url\": \"/event\", \"title\": \"Events\"}, {\"url\": \"/portfolio\", \"title\": \"Portfolio\"}, {\"url\": \"/blog\", \"title\": \"Blog\"}, {\"url\": \"/contact\", \"title\": \"Contact\"}]', 'Get in touch', 'Email us', 'info@elegantoccasions.com', 'Call us', '(888) 123 4567', 'Designed by :', 'Flow Design Agency', 'https://www.flowdesignagency.com/', 'Licenses', '#', 'Style guide', '#', 'active', '2026-09-28 05:23:04', '2026-09-30 06:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `home_abouts`
--

DROP TABLE IF EXISTS `home_abouts`;
CREATE TABLE IF NOT EXISTS `home_abouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_left` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_right` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_1` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_2` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_3` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stat_number` int DEFAULT NULL,
  `stat_symbol` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stat_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_abouts`
--

INSERT INTO `home_abouts` (`id`, `tagline`, `title`, `description`, `image_left`, `image_right`, `service_1`, `service_2`, `service_3`, `stat_number`, `stat_symbol`, `stat_text`, `created_at`, `updated_at`) VALUES
(1, 'About', 'Turning moments into memories', 'Every love story deserves a beautiful beginning. We design heartfelt celebrations with thoughtful details,with creating timeless experiences filled with joy.', 'images/6a6305bf5040b777232a15f1_Vision-home-two-image.avif', 'images/6a6305bf5040b777232a15ee_Vision-home-two-image.avif', 'Wedding planning', 'Coordination & execution', 'Design & decor', 98, '%', 'Average client growth rate', '2026-09-30 05:08:57', '2026-09-30 05:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

DROP TABLE IF EXISTS `home_banners`;
CREATE TABLE IF NOT EXISTS `home_banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_poster` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_mp4` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_webm` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_1_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_1_desc` text COLLATE utf8mb4_unicode_ci,
  `feature_1_icon` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_2_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_2_desc` text COLLATE utf8mb4_unicode_ci,
  `feature_2_icon` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_3_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_3_desc` text COLLATE utf8mb4_unicode_ci,
  `feature_3_icon` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_4_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_4_desc` text COLLATE utf8mb4_unicode_ci,
  `feature_4_icon` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `title`, `subtitle`, `button_text`, `button_link`, `background_image`, `video_poster`, `video_mp4`, `video_webm`, `video_text`, `created_at`, `updated_at`, `feature_1_title`, `feature_1_desc`, `feature_1_icon`, `feature_2_title`, `feature_2_desc`, `feature_2_icon`, `feature_3_title`, `feature_3_desc`, `feature_3_icon`, `feature_4_title`, `feature_4_desc`, `feature_4_icon`) VALUES
(1, 'Where forever begins beautifully together', 'A walkthrough of how we translate your personal love story into a visual language at Knotcraft.', 'Start planning', '#', 'images/6a6305bf5040b777232a181c_Banner-home-one-image.avif', NULL, NULL, NULL, 'A walkthrough of how we shape your vision and turn dreams into real.', '2026-09-30 05:08:57', '2026-09-30 05:10:57', 'Handpicked destinations', 'Design elegant luxury and craft timeless wedding memories flawlessly', 'images/6a6305bf5040b777232a17ee_Location-logo.svg', 'End-to-end planning', 'Secure bespoke vendors and orchestrate premier events beautifully', 'images/6a6305bf5040b777232a17ef_Door.svg', 'Luxury experiences', 'Curate detailed elements and create striking visual narratives gracefully', 'images/6a6305bf5040b777232a17c0_Flower.svg', 'Cinematic memories', 'Capture artistic visuals and preserve romantic milestone timelines seamlessly', 'images/6a6305bf5040b777232a17bd_Memory.svg');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner_portfolios`
--

DROP TABLE IF EXISTS `home_banner_portfolios`;
CREATE TABLE IF NOT EXISTS `home_banner_portfolios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banner_portfolios`
--

INSERT INTO `home_banner_portfolios` (`id`, `title`, `description`, `icon`, `sort_order`, `created_at`, `updated_at`) VALUES
(3, 'Aarav & Ananya\'s Destination Beach Vows', NULL, 'portfolio/items/bv5ujeDd9kv4aXFSPZSrHOv8sDShBIFVNETx2R7F.avif', 1, '2026-09-30 05:22:54', '2026-09-30 05:22:54'),
(4, 'Anne & Cameron', NULL, 'portfolio/items/lNE83gdyiO6cxb6tzI7ZIfkgyhwE4jHuMOymb9lA.jpg', 2, '2026-09-30 05:22:57', '2026-09-30 05:22:57'),
(5, 'Briana & Richard', NULL, 'portfolio/items/UMQ6M16ihqmhrBFT9utf9j6T7cNZHmnCCiKeRGxD.jpg', 3, '2026-09-30 05:22:59', '2026-09-30 05:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `home_core_promises`
--

DROP TABLE IF EXISTS `home_core_promises`;
CREATE TABLE IF NOT EXISTS `home_core_promises` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_1_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_1_desc` text COLLATE utf8mb4_unicode_ci,
  `item_2_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_2_desc` text COLLATE utf8mb4_unicode_ci,
  `item_3_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_3_desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_mp4` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_webm` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_core_promises`
--

INSERT INTO `home_core_promises` (`id`, `tagline`, `title`, `button_text`, `button_link`, `image`, `item_1_title`, `item_1_desc`, `item_2_title`, `item_2_desc`, `item_3_title`, `item_3_desc`, `created_at`, `updated_at`, `video_mp4`, `video_webm`) VALUES
(1, 'OUR CORE PROMISE', 'Crafting memorable celebrations through timeless elegance and thoughtful planning', 'Discover our story', '#', NULL, 'Tailored celebrations for every unique love story', 'Crafting memorable moments with bespoke experiences.', 'Bespoke designs inspired by romance and sophistication', 'Transforming venues with elegant details and florals.', 'Dedicated planners ensuring flawless wedding experiences', 'Managing celebrations seamlessly with passion and precision.', '2026-09-30 05:09:27', '2026-09-30 05:09:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_philosophy_items`
--

DROP TABLE IF EXISTS `home_philosophy_items`;
CREATE TABLE IF NOT EXISTS `home_philosophy_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_philosophy_items`
--

INSERT INTO `home_philosophy_items` (`id`, `title`, `sort_order`, `created_at`, `updated_at`, `description`) VALUES
(5, 'Crafted with passion and heartfelt storytelling', 1, '2026-09-30 05:09:27', '2026-09-30 05:09:27', 'Every wedding is more than aesthetics—it is driven by emotions, meaningful details, and shared dreams. Our philosophy influences every decision we make, helping us create unforgettable celebrations filled with beauty and purpose.'),
(6, 'The values that shape every celebration we design', 2, '2026-09-30 05:09:27', '2026-09-30 05:09:27', 'Integrity, intentionality, and deep connection form the core of our creative process. We honor your unique journey by weaving personal milestones into the decor and flow, ensuring that your day feels entirely genuine and true to you.'),
(7, 'Creating timeless experiences through planning', 3, '2026-09-30 05:09:27', '2026-09-30 05:09:27', 'Seamless organization meets refined artistry to bring your grand vision to life. By managing every logistical element with absolute precision, we offer a flawless, stress-free production, allowing yourselves completely in the magic.'),
(8, 'Inspired by love, guided by memories', 4, '2026-09-30 05:09:27', '2026-09-30 05:09:27', 'Your history is our greatest inspiration. We carefully transform your fondest nostalgic moments, inside jokes, and shared passions into a stunning living canvas, building a rich atmospheric experience that honors where your love began.');

-- --------------------------------------------------------

--
-- Table structure for table `home_philosophy_sections`
--

DROP TABLE IF EXISTS `home_philosophy_sections`;
CREATE TABLE IF NOT EXISTS `home_philosophy_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_stars` int NOT NULL DEFAULT '5',
  `review_text` text COLLATE utf8mb4_unicode_ci,
  `review_author` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_author_subtitle` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_author_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_philosophy_sections`
--

INSERT INTO `home_philosophy_sections` (`id`, `tagline`, `title`, `image`, `review_stars`, `review_text`, `review_author`, `review_author_subtitle`, `review_author_image`, `created_at`, `updated_at`) VALUES
(1, 'OUR PHILOSOPHY', 'The moments that inspire who we are and how we celebrate', 'images/6a6305bf5040b777232a179f_Moments-image.avif', 5, 'Our day felt beautifully seamless all night, thanks to their incredible team, timeless design, and guidance.', 'Sophia Bennett', 'Wedding planner client', 'images/6a6305bf5040b777232a16e7_User.avif', '2026-09-30 05:09:27', '2026-09-30 05:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `home_portfolio_sections`
--

DROP TABLE IF EXISTS `home_portfolio_sections`;
CREATE TABLE IF NOT EXISTS `home_portfolio_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'PORTFOLIO',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Event design to make your heart skip a beat',
  `button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'EXPLORE ENTIRE PORTFOLIO GALLERY →',
  `button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '/portfolio',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_portfolio_sections`
--

INSERT INTO `home_portfolio_sections` (`id`, `tagline`, `title`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'PORTFOLIO', 'Event design to make your heart skip a beat', 'EXPLORE ENTIRE PORTFOLIO GALLERY →', '/portfolio', '2026-09-28 03:40:32', '2026-09-28 03:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `home_promises`
--

DROP TABLE IF EXISTS `home_promises`;
CREATE TABLE IF NOT EXISTS `home_promises` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_1_tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_1_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_1_desc` text COLLATE utf8mb4_unicode_ci,
  `card_1_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_2_tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_2_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_2_desc` text COLLATE utf8mb4_unicode_ci,
  `card_2_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_3_tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_3_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_3_desc` text COLLATE utf8mb4_unicode_ci,
  `card_3_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_promises`
--

INSERT INTO `home_promises` (`id`, `tagline`, `title`, `card_1_tagline`, `card_1_title`, `card_1_desc`, `card_1_image`, `card_2_tagline`, `card_2_title`, `card_2_desc`, `card_2_image`, `card_3_tagline`, `card_3_title`, `card_3_desc`, `card_3_image`, `created_at`, `updated_at`) VALUES
(1, 'our promise', 'Since 2014, creating magical wedding moments beautifully', 'BESPOKE PLANNING', 'Bespoke planning', 'Personalized wedding experiences crafted with elegance and thoughtful precision.', 'images/6a6305bf5040b777232a17f3_Moment-small-image.avif', 'FLAWLESS COORDINATION', 'Flawless coordination', 'Every celebration managed seamlessly from planning to final farewell.', 'images/6a6305bf5040b777232a17f8_Moment-small-image.avif', 'LUXURY EXPERIENCES', 'Luxury experiences', 'Creating unforgettable moments through refined styling and exceptional hospitality.', 'images/6a6305bf5040b777232a1802_Moment-small-image.avif', '2026-09-30 05:08:57', '2026-09-30 05:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `home_recognitions_sections`
--

DROP TABLE IF EXISTS `home_recognitions_sections`;
CREATE TABLE IF NOT EXISTS `home_recognitions_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Recognitions',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Capturing beautiful moments that last forever',
  `video_poster` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_mp4` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_webm` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_recognitions_sections`
--

INSERT INTO `home_recognitions_sections` (`id`, `tagline`, `title`, `video_poster`, `video_mp4`, `video_webm`, `created_at`, `updated_at`) VALUES
(1, 'Recognitions', 'Capturing beautiful moments that last forever', 'images/69e06bfff096fe744c997c8d_6a4f812362ce3a5e3f982a0f_GG_poster.0000000.jpg', 'videos/6a6305bf5040b777232a1810_GG_mp4.mp4', 'videos/6a6305bf5040b777232a1810_GG_webm.webm', '2026-09-28 03:26:55', '2026-09-28 03:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `home_recognition_items`
--

DROP TABLE IF EXISTS `home_recognition_items`;
CREATE TABLE IF NOT EXISTS `home_recognition_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_recognition_items`
--

INSERT INTO `home_recognition_items` (`id`, `title`, `year`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Elegant floral curation awards', '2026', 1, '2026-09-28 03:26:55', '2026-09-28 03:26:55'),
(2, 'Excellence in event planning', '2025', 2, '2026-09-28 03:26:55', '2026-09-28 03:26:55'),
(3, 'Customer satisfaction award', '2024', 3, '2026-09-28 03:26:55', '2026-09-28 03:26:55'),
(4, 'Innovative wedding design award', '2023', 4, '2026-09-28 03:26:55', '2026-09-28 03:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `home_recommended_portfolios`
--

DROP TABLE IF EXISTS `home_recommended_portfolios`;
CREATE TABLE IF NOT EXISTS `home_recommended_portfolios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_recommended_portfolios`
--

INSERT INTO `home_recommended_portfolios` (`id`, `title`, `description`, `icon`, `sort_order`, `created_at`, `updated_at`) VALUES
(7, 'Sophia & Liam\'s Grand Royal Wedding', NULL, 'portfolio/items/Qwe1S5wk8Ga0PNvGw0fBlVQ8mIQEIekxiqIQmg4E.avif', 3, '2026-09-30 05:23:08', '2026-09-30 05:23:08'),
(5, 'Jennifer & Oliver', NULL, NULL, 1, '2026-09-30 05:23:03', '2026-09-30 05:23:03'),
(6, 'Linda & Charles', NULL, 'portfolio/items/aqXt0o72pJerXFbsyDvgxyUC3ddtLO9kmfQjrREW.jpg', 2, '2026-09-30 05:23:05', '2026-09-30 05:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `home_service_cards`
--

DROP TABLE IF EXISTS `home_service_cards`;
CREATE TABLE IF NOT EXISTS `home_service_cards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_service_cards`
--

INSERT INTO `home_service_cards` (`id`, `title`, `description`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(10, 'Serene bridal preparation', 'Creating a calm space for your morning of radiant, peaceful, and beautifully effortless preparation.', 'images/6a6305be5040b777232a14ea_Bride-image.avif', 3, '2026-09-30 05:18:27', '2026-09-30 05:18:27'),
(8, 'Bespoke wedding planning', 'We provide comprehensive management to ensure a nice seamless journey stress-free celebration of your love.', 'images/6a6305be5040b777232a14eb_Bride-image.avif', 1, '2026-09-30 05:18:23', '2026-09-30 05:18:23'),
(9, 'Artful floral design', 'Curating organic and elegant arrangements that transform your venue into a breathtaking sanctuary.', 'images/6a6305bf5040b777232a157c_Bride.avif', 2, '2026-09-30 05:18:25', '2026-09-30 05:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_service_sections`
--

DROP TABLE IF EXISTS `home_service_sections`;
CREATE TABLE IF NOT EXISTS `home_service_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_service_sections`
--

INSERT INTO `home_service_sections` (`id`, `tagline`, `title`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Services', 'Since 2014, creating magical wedding moments beautifully', 'Explore services', '#', '2026-09-30 05:09:27', '2026-09-30 05:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_28_063642_create_home_banners_table', 2),
(5, '2026_09_28_064748_add_features_to_home_banners_table', 3),
(6, '2026_09_28_065200_create_home_abouts_table', 4),
(7, '2026_09_28_070052_create_home_promises_table', 5),
(8, '2026_09_28_070053_create_home_core_promises_table', 5),
(9, '2026_09_28_071555_add_videos_to_home_core_promises_table', 6),
(10, '2026_09_28_072052_create_home_services_and_philosophy_tables', 7),
(11, '2026_09_28_073101_create_service_masters_table', 8),
(12, '2026_09_28_074343_add_description_to_home_philosophy_items_table', 9),
(13, '2026_09_28_075559_create_portfolio_masters_table', 10),
(14, '2026_09_28_075600_create_home_banner_portfolios_table', 10),
(15, '2026_09_28_081500_create_home_recognitions_tables', 11),
(16, '2026_09_28_090000_create_home_portfolio_sections_table', 12),
(17, '2026_09_28_093000_create_home_recommended_portfolios_table', 13),
(19, '2026_09_28_100000_create_about_page_tables', 14),
(21, '2026_09_28_110000_create_about_team_and_stats_tables', 15),
(22, '2026_09_28_120000_create_about_expertise_tables', 16),
(23, '2026_09_28_130000_create_contact_page_tables', 17),
(24, '2026_09_28_140000_create_footer_settings_table', 18),
(25, '2026_09_28_150000_create_service_page_tables', 19),
(26, '2026_09_28_151000_add_fields_to_service_banner_sections_table', 20),
(27, '2026_09_28_152000_add_center_image_to_service_expertise_sections_table', 21),
(28, '2026_09_28_183000_add_images_to_service_faq_sections_table', 22),
(29, '2026_09_28_190000_create_event_page_tables', 23),
(30, '2026_09_28_193000_add_detail_fields_to_event_items_table', 24),
(31, '2026_09_29_054829_add_gallery_title_to_event_items_table', 25),
(32, '2026_09_29_060717_create_portfolio_banner_sections_table', 26),
(33, '2026_09_29_061611_create_portfolio_tags_table', 27),
(34, '2026_09_29_062822_create_portfolio_items_table', 28),
(35, '2026_09_29_063603_add_time_text_to_portfolio_items_table', 29),
(36, '2026_09_29_072835_add_banner_and_guests_to_portfolio_items_table', 30),
(37, '2026_09_29_080925_add_media_fields_to_portfolio_items_table', 31),
(38, '2026_09_29_084242_update_gallery_images_in_portfolio_items_table', 32),
(39, '2026_09_29_085421_create_blog_banner_sections_table', 33),
(40, '2026_09_29_085437_create_blog_items_table', 33),
(41, '2026_09_29_091310_create_service_offer_sections_table', 34),
(42, '2026_09_29_091330_create_service_offer_items_table', 34),
(43, '2026_09_30_122020_create_contact_enquiries_table', 35),
(44, '2026_09_30_124722_create_testimonials_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_banner_sections`
--

DROP TABLE IF EXISTS `portfolio_banner_sections`;
CREATE TABLE IF NOT EXISTS `portfolio_banner_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'Portfolio',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Event design to make your heart skip a beat',
  `description` text COLLATE utf8mb4_unicode_ci,
  `banner_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_banner_sections`
--

INSERT INTO `portfolio_banner_sections` (`id`, `tag`, `title`, `description`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Portfolio', 'Event design to make your heart skip a beat', NULL, 'portfolio/LPNN3ynw3DI0SCNOQM7X40GFvMec3KyLr9WlERsO.avif', 'active', '2026-09-29 00:43:54', '2026-09-29 06:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_items`
--

DROP TABLE IF EXISTS `portfolio_items`;
CREATE TABLE IF NOT EXISTS `portfolio_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `portfolio_tag_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guests_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_headline` text COLLATE utf8mb4_unicode_ci,
  `detail_content` longtext COLLATE utf8mb4_unicode_ci,
  `detail_sub_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_highlight_1` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_highlight_2` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_images` json DEFAULT NULL,
  `video_mp4` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_webm` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_poster` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_items_portfolio_tag_id_foreign` (`portfolio_tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_items`
--

INSERT INTO `portfolio_items` (`id`, `portfolio_tag_id`, `title`, `slug`, `subtitle`, `client_name`, `date_text`, `time_text`, `guests_text`, `location`, `description`, `image`, `banner_image`, `detail_headline`, `detail_content`, `detail_sub_image`, `detail_highlight_1`, `detail_highlight_2`, `gallery_tag`, `gallery_title`, `gallery_images`, `video_mp4`, `video_webm`, `video_poster`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(4, 5, 'Linda & Charles', 'linda-charles', 'Classic Vintage Charm & Heritage Romance', 'Linda & Charles', 'October 05, 2025', NULL, NULL, 'Grand Palace Ballroom & Courtyard', NULL, 'portfolio/items/aqXt0o72pJerXFbsyDvgxyUC3ddtLO9kmfQjrREW.jpg', NULL, '\"An unforgettable evening of pure elegance, warmth, and breathtaking beauty.\"', '<p>A grand celebration inside a historic ballroom featuring gold leaf detailing, majestic chandeliers, and a lavish 5-tier cake. Linda and Charles embraced timeless vintage glamour in every single detail.</p>', NULL, NULL, NULL, 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', '[\"portfolio/items/HGtIO51W0J5HHY3C3sAYeAcJAuzM5f3elMPNwUHE.jpg\", \"portfolio/items/bznLlKbd9P4ruDqsiQbe5Y3RjNrW0Ml6mlvJrqdE.jpg\", \"portfolio/items/qL0d8S3d6veedG9guSu6c77qgxDZPrKo5VKza0uU.avif\", \"portfolio/items/PbsO8TDhjWG5wDGLEmZgxjnzqjZyClni05NyoZsi.avif\", \"portfolio/items/dtfz8RdI1mLvmsxenVXeCkIwMcDLd9tA6LEV7tVL.avif\", \"portfolio/items/W1KmgLhlabBJghcAKIxYR9ttbJkNGdStb2nbJjGD.avif\"]', NULL, NULL, NULL, 4, 'active', '2026-09-29 01:31:25', '2026-09-29 06:49:37'),
(9, 5, 'Jennifer & Oliver', 'jennifer-oliver', 'Romantic Botanical Garden Celebration', 'Jennifer & Oliver', 'June 18, 2025', '9:00 AM - 11:00 AM', '200 Guests', 'Lakeside Conservatory & Gardens', NULL, NULL, 'portfolio/items/fi0vYJAG8YaKsMe81lvmTRiJ0AEpUvY7MSm8fpme.avif', '\"We turn dreams into reality. Weave story into every thread of your event.\"', '<p>Lacus, ultrices sit nunc, pretium amet amet. Fermentum velit, mauris, laoreet cras quam tempus lorem. Vulputate risus eget quis commodo. A bespoke romantic wedding in an ethereal garden glasshouse surrounded by lush florals and soft glowing lanterns.</p>', NULL, NULL, NULL, 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', '[\"portfolio/items/zjlBG9wgcQIHKy6cUK0AM4KqmNcJNtHPuFHSAiQO.jpg\", \"portfolio/items/a4pJhdNo4Ch8gILzJNCJ5kaNxPAqF490Et2HYe4O.jpg\", \"portfolio/items/nMuy0vK5besDVnv3uvdaSMIeE40h6S8d7iNdpOy9.jpg\", \"portfolio/items/Losj4CyMp81aSUv8GeydSR9jyuhDsMuaeC45Nt1n.jpg\", \"portfolio/items/DhXInv2DQmBBGgibxw6U4FYnsr6r0dGiiUg3o1do.jpg\", \"portfolio/items/iPqnoChV8FOYhVxCCKrBSpqGHIHmcZM0CZ7XcNXF.jpg\"]', NULL, NULL, NULL, 1, 'active', '2026-09-29 01:46:28', '2026-09-29 06:35:53'),
(10, 5, 'Briana & Richard', 'briana-richard', 'Ethereal Country Estate Romance', 'Briana & Richard', 'July 24, 2025', NULL, NULL, 'Heritage Country Manor & Lawn', NULL, 'portfolio/items/GSW4PDeUJzaQp88rT5iV3RS1XzRF7iNVO1Vr9tJA.avif', NULL, '\"Every moment felt effortlessly luxurious and deeply personal. It was truly the best day of our lives.\"', '<p>Set against rolling hills and ancient oak trees, Briana and Richard brought timeless elegance to their open-air celebration. Delicate white florals, velvet seating lounges, and twilight festoon lighting created an unforgettable atmosphere.</p>', NULL, NULL, NULL, 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', '[\"portfolio/items/5ASA0dLxa7IRQY567EmR7a5F56dyyy2ggPjKcn0h.jpg\", \"portfolio/items/17QxALTdvkLZwYi5V503AVvUjhDVhhW6P4KvONsd.jpg\", \"portfolio/items/cxCHm4hVmt2GT9FdiGj7HTxQRCVv8R75HWUFalS1.jpg\", \"portfolio/items/hPJgZVk4fvqWeqtcB8nqjFDH1VylFFTeKxR9ODIK.avif\", \"portfolio/items/cxksDPQ6a397ltxw6r9A7j5pI49OD7x6qntcJK3y.avif\", \"portfolio/items/n7ehSaKkpJpvGO2ZPOMfBadhXsTPikuvhWkZ3AMn.avif\"]', NULL, NULL, NULL, 2, 'active', '2026-09-29 01:46:28', '2026-09-30 05:43:38'),
(11, 5, 'Anne & Cameron', 'anne-cameron', 'Modern Minimalist Villa Affair', 'Anne & Cameron', 'September 12, 2025', NULL, NULL, 'Ocean View Cliffside Villa', NULL, 'portfolio/items/KYhmVoOzx3awOLOZn8TZIDhaVNhek4iwmD8zGDu6.jpg', NULL, '\"Sleek, stylish, and flawlessly executed from start to finish.\"', '<p>Sophisticated simplicity overlooking the ocean. Anne and Cameron celebrated with clean architectural lines, monochrome floral arrangements, and intimate candlelit long tables under the stars.</p>', NULL, NULL, NULL, 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', '[\"portfolio/items/7Kt1GVuYTc3kKqvAzIcLYFyA4Ek0ERANje8FCgwl.jpg\", \"portfolio/items/fPAk2mkIuiUmr9RTMdO0DYhX0iLiXcxBAsqL9Rwx.jpg\", \"portfolio/items/YbBgzZEQhipJOaM8u0Bs8FHoYFuWpNCc3chcQwxM.jpg\", \"portfolio/items/YoIdmggdZ4qw7sIAaSE0pl1fw5WHYDk1fMGimQzA.avif\", \"portfolio/items/prBCFtrzTqV2ifjwC02qw4qadxGw0ukrPNVFl06V.avif\", \"portfolio/items/h4Ykk9P8bcSei6Pfo2yC2SgK40s57aRUeq2lONKN.avif\", \"portfolio/items/gy6ivPIX51STA0eV6L8XCLWt9wPdVDc19dbCzjf1.avif\", \"portfolio/items/S9NfAcYiwhlxVx528DGFQEWmO0UX8c9AixPUx89l.avif\"]', NULL, NULL, NULL, 3, 'active', '2026-09-29 01:46:28', '2026-09-30 05:43:21'),
(13, 3, 'Sophia & Liam\'s Grand Royal Wedding', 'sophia-liams-grand-royal-wedding', 'Imperial Opulence & Gold Floral Splendor', 'Sophia & Liam', 'October 14, 2025', NULL, NULL, 'Monarch Palace Hall & Gardens', NULL, 'portfolio/items/Qwe1S5wk8Ga0PNvGw0fBlVQ8mIQEIekxiqIQmg4E.avif', NULL, '\"Knotcraft turned our grandest dream into a fairytale reality. Every single detail felt like stepping into a royal masterpiece.\"', '<p>A royal celebration held in the heart of Monarch Palace Hall. Surrounded by 40,000 hand-selected white roses and gold filigree arches, Sophia and Liam exchanged vows under crystal chandeliers before a night of live orchestra music and fireworks.</p>', NULL, NULL, NULL, 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', '[\"portfolio/items/2zXu66EYTwkyuXfVO6OQjtLrixxdQvLkm3XS8LnB.jpg\", \"portfolio/items/OdhQQQSZ1WVjwzq1L5C16ga1dUZ6Hr8NXbdwVnO3.jpg\", \"portfolio/items/lgSb18YJJsNTzfC7EgQWpkt4Nflau2u4UVFkSM1N.jpg\", \"portfolio/items/0IU8NIf2DequgUwvbr5rdFD7Jmd3YI7tPDEtNQuu.jpg\", \"portfolio/items/KmTZyGqhpcIna63vdwYwhNl7psFg5WDWxVRylycb.avif\", \"portfolio/items/Q9y3VY6bpkTSIOORnHE5bw8I59LGePPwIg2nSeVX.avif\"]', NULL, NULL, NULL, 5, 'active', '2026-09-29 01:46:28', '2026-09-29 06:52:06'),
(14, 6, 'Aarav & Ananya\'s Destination Beach Vows', 'aarav-ananyas-destination-beach-vows', 'Coastal Sunset Breeze & White Sand Elegance', 'Ananya & Aarav', 'November 22, 2025', NULL, NULL, 'Azure Shore Sunset Sanctuary', NULL, 'portfolio/items/EZlsbK9Oz2oI1KHMBuZQ5cQotNtEnAi36ga3XwJ2.avif', NULL, '\"The warmth, ocean breeze, and ethereal setup created memories that our guests are still raving about.\"', '<p>Set against the soothing waves of the Azure Shore, Aarav and Ananya brought intimate luxury to beachside celebrations.</p>', NULL, NULL, NULL, 'WEDDING Gallery', 'Explore our exclusive signature wedding clicks', '[\"portfolio/items/kaq66WzEMo0koUruancuvvh4GmaRpHsrGP8uIAY3.jpg\", \"portfolio/items/RAkl21WYCc3Ps4KMTWCkj8YvtY9mSJweJEgJpE2h.jpg\", \"portfolio/items/67gGJu2kIlaNLbA4O20CbgUSfYv6JHJsxHPht139.jpg\", \"portfolio/items/x2o5cxlF0t8fTqdJZrc0fauOySGpFalET1Ou0COw.jpg\", \"portfolio/items/8nlGMhdqaKqtYQfWB86jf8PQwUyj1O1hUZ13HND4.jpg\", \"portfolio/items/SH13HiEzhtYscsFb4QpPPJStlXFKLPVZ8VbrGO50.jpg\", \"portfolio/items/r3ZWw76Whou4uWKaibS5ZiQttzOrANaiVf69gYjC.avif\"]', 'portfolio/items/9RJyjUlbJGOT5eNb6yUYmlv3D0ppoXzXeVIKAfll.mp4', NULL, NULL, 6, 'active', '2026-09-29 01:46:28', '2026-09-30 05:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_masters`
--

DROP TABLE IF EXISTS `portfolio_masters`;
CREATE TABLE IF NOT EXISTS `portfolio_masters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_masters`
--

INSERT INTO `portfolio_masters` (`id`, `title`, `description`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Beach Wedding', 'A beautiful sunset wedding at the beach.', 'images/portfolio1.jpg', NULL, '2026-09-28 02:27:23', '2026-09-28 02:27:23'),
(2, 'Royal Palace Wedding', 'Grand celebration at a heritage palace.', 'images/portfolio2.jpg', NULL, '2026-09-28 02:27:23', '2026-09-28 02:27:23'),
(3, 'Vintage Garden', 'A cozy garden setup with vintage decor.', 'images/portfolio3.jpg', NULL, '2026-09-28 02:27:23', '2026-09-28 02:27:23'),
(4, 'Modern Minimalist', 'Clean and contemporary styling.', 'images/portfolio4.jpg', NULL, '2026-09-28 02:27:23', '2026-09-28 02:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_tags`
--

DROP TABLE IF EXISTS `portfolio_tags`;
CREATE TABLE IF NOT EXISTS `portfolio_tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_tags`
--

INSERT INTO `portfolio_tags` (`id`, `name`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'All Celebrations', 'active', 1, '2026-09-29 00:46:43', '2026-09-29 00:56:21'),
(3, 'Luxury Weddings', 'active', 3, '2026-09-29 00:46:43', '2026-09-29 00:46:43'),
(4, 'Destination', 'active', 4, '2026-09-29 00:46:43', '2026-09-29 00:46:43'),
(5, 'Wedding', 'active', 0, '2026-09-29 01:31:25', '2026-09-29 01:31:25'),
(6, 'Destination Weddings', 'active', 0, '2026-09-29 01:31:25', '2026-09-29 01:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_banner_sections`
--

DROP TABLE IF EXISTS `service_banner_sections`;
CREATE TABLE IF NOT EXISTS `service_banner_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Discover packages',
  `button_url` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/booking-inquiry',
  `banner_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_text` text COLLATE utf8mb4_unicode_ci,
  `items` json DEFAULT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_banner_sections`
--

INSERT INTO `service_banner_sections` (`id`, `title`, `subtitle`, `button_text`, `button_url`, `banner_image`, `card_image`, `card_text`, `items`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Making your wedding dreams real', 'A walkthrough of how we translate your personal love story into a visual language at Knotcraft.', 'Discover packages', '/booking-inquiry', 'service-banner/nhZOoq3iBWmypjBi7JDb7r7fBaZmrh5Kehcd52ED.avif', 'images/6a6305be5040b777232a14ba_service-three-right-image.avif', 'We craft wedding experiences that bring your love story to life.', '[{\"title\": \"12+ Years of work experience\"}, {\"title\": \"98% Rated 4.9/5 from over 1200 reviews\"}]', 'active', '2026-09-28 05:48:46', '2026-09-30 00:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `service_expertise_sections`
--

DROP TABLE IF EXISTS `service_expertise_sections`;
CREATE TABLE IF NOT EXISTS `service_expertise_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `center_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cards` json DEFAULT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_expertise_sections`
--

INSERT INTO `service_expertise_sections` (`id`, `tag`, `title`, `center_image`, `cards`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABOUT US', 'Crafting timeless celebrations', 'images/6a6305bf5040b777232a15fa_About-home-one-image.avif', '[{\"image\": \"images/6a5eeacfc71e4284d7209709_Service-page-about-one-image.avif\", \"title\": \"Our Approach\", \"description\": \"Our approach transforms romantic visions into vision realities that define unforgettable life milestones.\"}, {\"image\": \"images/6a5ef42ebf6ca9cfcecf2cd6_Service-page-about-two-image.avif\", \"title\": \"Personalized planning\", \"description\": \"Tailoring every celebration to reflect your all unique story and dreams.\"}, {\"image\": \"images/6a5eeacfc71e4284d7209709_Service-page-about-one-image.avif\", \"title\": \"Seamless experience\", \"description\": \"Ensuring a seamless journey so you can enjoy every moment.\"}]', 'active', '2026-09-28 05:48:46', '2026-09-30 00:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `service_faqs`
--

DROP TABLE IF EXISTS `service_faqs`;
CREATE TABLE IF NOT EXISTS `service_faqs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_faqs`
--

INSERT INTO `service_faqs` (`id`, `question`, `answer`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'How do you plan our wedding from start to finish?', 'We handle everything from initial venue scouting, moodboard design, vendor negotiations, budget allocation, to on-the-day management and coordination.', 1, 'active', '2026-09-28 05:48:46', '2026-09-28 05:48:46'),
(2, 'Can you customize weddings based on our theme?', 'Absolutely! Every detail is tailored specifically to reflect your vision, love story, and unique design aesthetic.', 2, 'active', '2026-09-28 05:48:46', '2026-09-28 05:48:46'),
(3, 'Do you offer budget friendly planning options?', 'Yes, we offer flexible service packages tailored to different wedding scales, budgets, and guest capacities.', 3, 'active', '2026-09-28 05:48:46', '2026-09-28 05:48:46'),
(4, 'What is your policy on cancellations or date changes?', 'We provide transparent contracts with flexible rescheduling options to accommodate unexpected date changes or unforeseen events.', 4, 'active', '2026-09-28 05:48:46', '2026-09-28 05:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `service_faq_sections`
--

DROP TABLE IF EXISTS `service_faq_sections`;
CREATE TABLE IF NOT EXISTS `service_faq_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `image_one` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_subtitle` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_button_text` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_button_url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_faq_sections`
--

INSERT INTO `service_faq_sections` (`id`, `tag`, `title`, `subtitle`, `image_one`, `image_two`, `contact_title`, `contact_subtitle`, `contact_button_text`, `contact_button_url`, `contact_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FAQ', 'Elegant answers for your special celebrations', 'Answers to common questions about our wedding planning services.', 'images/6a6305bf5040b777232a16b0_Faq-image.avif', 'images/6a6305bf5040b777232a1575_faq-image.avif', 'All your questions are always welcome!', 'Reach out to our team anytime.', 'Contact now', '/contact', 'service-faqs/RBssfquX0xkcKtM9jUyDpK9BYmqfu11UJi5EdbqA.avif', 'active', '2026-09-28 05:48:46', '2026-09-30 01:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `service_masters`
--

DROP TABLE IF EXISTS `service_masters`;
CREATE TABLE IF NOT EXISTS `service_masters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_masters`
--

INSERT INTO `service_masters` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Venue styling', 'Transforming beautiful settings into unforgettable wedding experiences with refined details.', NULL, '2026-09-28 02:02:25', '2026-09-28 02:02:25'),
(2, 'Luxe styling', 'Artfully planned atmosphere creations, backdrops, and stunning aesthetic features.', NULL, '2026-09-28 02:02:25', '2026-09-28 02:02:25'),
(3, 'Decor design', 'Thoughtfully curated floral arrangements, tablescapes, and elegant visual elements.', NULL, '2026-09-28 02:02:25', '2026-09-28 02:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_offer_items`
--

DROP TABLE IF EXISTS `service_offer_items`;
CREATE TABLE IF NOT EXISTS `service_offer_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_offer_items`
--

INSERT INTO `service_offer_items` (`id`, `title`, `description`, `image`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Artful floral design', 'Curating organic and elegant arrangements that transform your venue into a breathtaking sanctuary.', 'images/6a6305bf5040b777232a157c_Bride.avif', 'active', 1, '2026-09-29 03:51:29', '2026-09-30 00:53:13'),
(2, 'Bespoke wedding planning', 'We provide comprehensive management to ensure a nice seamless journey stress-free celebration of your love.', 'images/6a6305be5040b777232a14eb_Bride-image.avif', 'active', 2, '2026-09-29 03:51:29', '2026-09-29 03:51:29'),
(3, 'Serene bridal preparation', 'Creating a calm space for your morning of radiant, peaceful, and beautifully effortless preparation.', 'images/6a6305be5040b777232a14ea_Bride-image.avif', 'active', 3, '2026-09-29 03:51:29', '2026-09-29 03:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_offer_sections`
--

DROP TABLE IF EXISTS `service_offer_sections`;
CREATE TABLE IF NOT EXISTS `service_offer_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','deactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_offer_sections`
--

INSERT INTO `service_offer_sections` (`id`, `tag`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Services we offer', 'Browse luxury wedding services with curated planning, styling, and ideas for your perfect celebration', 'active', '2026-09-29 03:52:41', '2026-09-29 03:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `service_process_sections`
--

DROP TABLE IF EXISTS `service_process_sections`;
CREATE TABLE IF NOT EXISTS `service_process_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `steps` json DEFAULT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_process_sections`
--

INSERT INTO `service_process_sections` (`id`, `tag`, `title`, `steps`, `status`, `created_at`, `updated_at`) VALUES
(1, 'OUR PROCESS', 'How we bring your dream wedding to life', '[{\"image\": \"service-process/GyAk2bXbWLYD9qCIhfJe7VzfHI61pPKkoiaIxMuQ.svg\", \"title\": \"Planning\", \"description\": \"From themes to timelines, we curate every detail for a seamless experience.\", \"step_number\": \"01\"}, {\"image\": \"service-process/ibnVjb2h1a66CTVUV8zrTRE1ZMbap7NjB7XAf0RP.svg\", \"title\": \"Design phase\", \"description\": \"Transforming your vision into cohesive decor, florals, and spatial layouts.\", \"step_number\": \"02\"}, {\"image\": \"service-process/7waIT2o298txyZEYYOjqBaQijoNaBSD3xCg48FEd.svg\", \"title\": \"Execution\", \"description\": \"Coordinating vendors, schedules, and production to execute flawlessly on site.\", \"step_number\": \"03\"}, {\"image\": \"service-process/FRV6E1eD7IgTbPp8E966vdiu0FOgAL9C8Wu3Zz8g.svg\", \"title\": \"On-site support\", \"description\": \"From arrivals to the final dance, we oversee every single moment to create a celebration.\", \"step_number\": \"04\"}]', 'active', '2026-09-28 05:48:46', '2026-09-30 01:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('f2NEXYGAxElTRW56ZeVGmaUOxq8k6RvaxwxRLKgD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIxc2tiMnhxd2FQQ2QzcnpVeFJlSXF0YmtTM0xPSWFSc0ZpOER2amlFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidXJsIjpbXSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1790773759);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `headline`, `review`, `image`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'James Anderson', 'Full mastery planner!', 'Our wedding was flawlessly planned, every detail felt magical and personal. The team handled everything smoothly, making our special day truly unforgettable.', NULL, 'active', 1, '2026-09-30 07:23:58', '2026-09-30 07:34:23'),
(2, 'Charlotte Williams', 'Seamless event planning!', 'Amazing experience from start to finish, they understood our vision perfectly and executed it beautifully without any stress or last minute chaos.', 'testimonials/SNUIQsgnPp1kxfoUJ5tFkQ9cgCvRaNmebIBcvbrF.avif', 'active', 2, '2026-09-30 07:23:58', '2026-09-30 07:39:11'),
(3, 'Oliver Smith', 'From vision to reality!', 'From decor to coordination, everything was beyond perfect. They turned our dream wedding into reality with elegance, care, and seamless planning we truly loved.', NULL, 'active', 3, '2026-09-30 07:23:58', '2026-09-30 07:23:58'),
(4, 'Sophia Bennett', 'Absolutely breathtaking!', 'Every single element of our day was thoughtfully curated and breathtakingly executed. The team truly understood our aesthetic and brought it to life effortlessly.', NULL, 'active', 4, '2026-09-30 07:37:57', '2026-09-30 07:37:57'),
(5, 'David & Emma', 'A dream come true!', 'We couldn\'t have asked for a better experience. They took all the stress away and let us simply enjoy the most important day of our lives. Pure perfection.', NULL, 'active', 5, '2026-09-30 07:37:57', '2026-09-30 07:37:57'),
(6, 'Michael Chen', 'Exceeded all expectations', 'Professional, creative, and attentive to every detail. The atmosphere they created was exactly what we envisioned, but a hundred times better.', NULL, 'active', 6, '2026-09-30 07:37:57', '2026-09-30 07:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$eOPJN8zof2MDcUPZ0G2XUuFfWxjIKgqHoTC0ocM.hokR0/yq6/jOq', NULL, '2026-09-28 00:05:40', '2026-09-28 00:05:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
