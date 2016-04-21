-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2016 at 05:44 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL,
  `administrator_name` varchar(512) DEFAULT NULL,
  `administrator_phone_number` varchar(30) DEFAULT NULL,
  `administrator_date_of_birth` date DEFAULT NULL,
  `administrator_address` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `administrator_name`, `administrator_phone_number`, `administrator_date_of_birth`, `administrator_address`) VALUES
(6, 'Nguyễn Văn Quản Trị', '0963935709', '1992-10-12', 'K100/44 Phan Van Dinh Street, Da Nang City');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(512) NOT NULL,
  `applicant_phone_number` varchar(30) NOT NULL,
  `applicant_date_of_birth` date NOT NULL,
  `applicant_sex` tinyint(1) NOT NULL DEFAULT '1',
  `applicant_address` varchar(1024) NOT NULL,
  `applicant_about` longtext NOT NULL,
  `applicant_marital_status` tinyint(1) NOT NULL,
  `applicant_objective` longtext NOT NULL,
  `applicant_website` varchar(45) DEFAULT NULL,
  `applicant_status` tinyint(1) NOT NULL COMMENT 'Status mean that application is a employee or an umemployee',
  `major_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_applicants_cs_majors1_idx` (`major_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `applicant_name`, `applicant_phone_number`, `applicant_date_of_birth`, `applicant_sex`, `applicant_address`, `applicant_about`, `applicant_marital_status`, `applicant_objective`, `applicant_website`, `applicant_status`, `major_id`) VALUES
(4, 'Le Cong Quoc', '0969696969', '1994-06-09', 1, 'Son Tra District, Danang City, Vietnam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'careersystem.vn', 1, 12),
(5, 'Huynh Kim Khoa', '0963935710', '1987-04-15', 1, 'Da Nang, Viet Nam', '1If you want to know more about a company, website, and a person, you’ll certainly go to their About page - which I always do. I love reading people''s about page especially those who are in the same industry as me. It''s always quite interesting to have a quick glimpse of who and what they are.', 1, 'While the About Page can be very informative, some websites go the extra mile and make their About page more than just a testimony of who they are.', 'www.kyler.com', 1, 54);

-- --------------------------------------------------------

--
-- Table structure for table `applicants_follow_posts`
--

CREATE TABLE IF NOT EXISTS `applicants_follow_posts` (
  `applicant_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `follow_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`applicant_id`,`post_id`),
  KEY `fk_cs_applicants_has_cs_posts_cs_posts1_idx` (`post_id`),
  KEY `fk_cs_applicants_has_cs_posts_cs_applicants1_idx` (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicants_follow_posts`
--

INSERT INTO `applicants_follow_posts` (`applicant_id`, `post_id`, `follow_status`) VALUES
(4, 96, 0),
(4, 98, 0),
(5, 97, 1),
(5, 98, 1),
(5, 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicants_has_hobbies`
--

CREATE TABLE IF NOT EXISTS `applicants_has_hobbies` (
  `applicant_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  PRIMARY KEY (`applicant_id`,`hobby_id`),
  KEY `fk_cs_applicants_has_cs_hobbies_cs_hobbies1_idx` (`hobby_id`),
  KEY `fk_cs_applicants_has_cs_hobbies_cs_applicants1_idx` (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicants_has_hobbies`
--

INSERT INTO `applicants_has_hobbies` (`applicant_id`, `hobby_id`) VALUES
(4, 1),
(4, 2),
(5, 2),
(5, 3),
(4, 4),
(4, 5),
(5, 5),
(5, 7),
(4, 8),
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `applicants_has_skills`
--

CREATE TABLE IF NOT EXISTS `applicants_has_skills` (
  `applicant_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `skill_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`applicant_id`,`skill_id`),
  KEY `fk_cs_applicants_has_cs_skills_cs_skills1_idx` (`skill_id`),
  KEY `fk_cs_applicants_has_cs_skills_cs_applicants1_idx` (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicants_has_skills`
--

INSERT INTO `applicants_has_skills` (`applicant_id`, `skill_id`, `skill_level`) VALUES
(4, 1, 5),
(4, 6, 2),
(4, 8, 5),
(4, 11, 1),
(4, 412, 4),
(5, 1, 4),
(5, 2, 4),
(5, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL,
  `appointment_name` varchar(512) DEFAULT NULL,
  `appointment_description` text,
  `appointment_start` datetime DEFAULT NULL,
  `appointment_end` datetime DEFAULT NULL,
  `appointment_address` varchar(512) DEFAULT NULL,
  `appointment_SMS_alert` int(11) DEFAULT NULL,
  `hiring_manager_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_appointments_cs_hiring_managers1_idx` (`hiring_manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appointments_has_applicants`
--

CREATE TABLE IF NOT EXISTS `appointments_has_applicants` (
  `appointment_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `user_rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`appointment_id`,`applicant_id`),
  KEY `fk_cs_appointments_has_cs_applicants_cs_applicants1_idx` (`applicant_id`),
  KEY `fk_cs_appointments_has_cs_applicants_cs_appointments1_idx` (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(512) NOT NULL,
  `category_description` text,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `parent_id`, `lft`, `rght`) VALUES
(1, 'Post categories', 'Post category', NULL, 1, 84),
(2, 'Game Design', 'Description here', 1, 6, 7),
(3, 'Accounting', 'Description here', 1, 2, 3),
(4, 'Advertising', 'Description here,', 1, 4, 5),
(5, 'Aerospace', 'Description here', 1, 8, 9),
(6, 'Architecture', 'Description here', 1, 10, 11),
(7, 'Art', 'Description here', 1, 12, 13),
(8, 'Automotive', 'Description here', 1, 14, 15),
(9, 'Banking', 'Description here', 1, 16, 17),
(10, 'Biotechnology', 'Description here.', 1, 18, 19),
(11, 'Computer Games', 'Description here', 1, 20, 21),
(12, 'Computer Software', 'Description here', 1, 22, 23),
(13, 'Consumer Electronics', 'Description here', 1, 24, 25),
(14, 'Consumer Goods', 'Description here', 1, 26, 27),
(15, 'Defense', 'Description here', 1, 28, 29),
(16, 'Education', 'Description here', 1, 30, 31),
(17, 'Engineering', 'Description here', 1, 32, 33),
(18, 'Fashion', 'Description here', 1, 34, 35),
(19, 'Film', 'Description here', 1, 36, 37),
(20, 'Finance', 'Description here', 1, 38, 39),
(21, 'Graphic Design', 'Description here', 1, 40, 41),
(22, 'Health Wellness', 'Description here', 1, 42, 43),
(23, 'Hospitality', 'Description here', 1, 44, 45),
(24, 'Legal', 'Description here', 1, 46, 47),
(25, 'Manufacturing', 'Description here', 1, 48, 49),
(26, 'Market Research', 'Description here', 1, 50, 51),
(27, 'Marketing', 'Description here', 1, 52, 53),
(28, 'Media', 'Description here', 1, 54, 55),
(29, 'Medicine', 'Description here', 1, 56, 57),
(30, 'Music', 'Description here', 1, 58, 59),
(31, 'Nonprofit', 'Description here', 1, 60, 61),
(32, 'Photography', 'Description here', 1, 62, 63),
(33, 'Politics', 'Description here', 1, 64, 65),
(34, 'Public Relations', 'Description here', 1, 66, 67),
(35, 'Publishing', 'Description here', 1, 68, 69),
(36, 'Real Estate', 'Description here', 1, 70, 71),
(37, 'Sports', 'Description here', 1, 72, 73),
(38, 'Technology', 'Description here', 1, 74, 75),
(39, 'Television', 'Description here', 1, 76, 77),
(41, 'Web', 'Description here', 1, 78, 79),
(42, 'Theatre', 'Description here', 1, 82, 83),
(44, 'Internship', 'Description here', 1, 80, 81);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_vitaes`
--

CREATE TABLE IF NOT EXISTS `curriculum_vitaes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `curriculum_vitae_name` varchar(512) NOT NULL,
  `curriculum_vitae_template_id` int(11) NOT NULL,
  `curriculum_vitae_data` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_curriculum_vitaes_cs_applicants1_idx` (`applicant_id`),
  KEY `fk_cs_curriculum_vitaes_cs_curriculum_vitae_templates1_idx` (`curriculum_vitae_template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `curriculum_vitaes`
--

INSERT INTO `curriculum_vitaes` (`id`, `applicant_id`, `curriculum_vitae_name`, `curriculum_vitae_template_id`, `curriculum_vitae_data`) VALUES
(1, 5, 'First CV', 2, '{"cvdata":{"major":"Web Developer","objective":"The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\"de Finibus Bonorum et Malorum\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.","educations":[{"education_title":"DN of Education University","education_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","education_start":"Sep 2010","education_end":"Mar 2014"}],"experiences":[{"experience_title":"MICROSOFT","experience_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","experience_start":"Aug 2014","experience_end":"Now"}],"activities":[{"activity_title":"MARKETING CLUB","activity_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","activity_start":"Apr 2013","activity_end":"Jan 2014"}],"awards":[{"award_title":"Windows certifications","award_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","award_date":"15 Jan 2016"}],"skills":[{"skill_name":".NET","skill_level":"5"},{"skill_name":"AJAX","skill_level":"2"},{"skill_name":"Amazon Web Services","skill_level":"5"},{"skill_name":"Android Wear SDK","skill_level":"5"},{"skill_name":"3D Animation","skill_level":"4"}],"hobbies":[{"hobby_name":"Amateur radio"},{"hobby_name":"Baton twirling"},{"hobby_name":"Board games"},{"hobby_name":"Calligraphy"}]}}'),
(11, 4, 'Undefine', 2, '{"cvdata":{"major":"Mobile Developer","objective":"The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\"de Finibus Bonorum et Malorum\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.","educations":[{"education_title":"DN of Education University","education_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","education_start":"Sep 2010","education_end":"Mar 2014"}],"experiences":[{"experience_title":"MICROSOFT","experience_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","experience_start":"Aug 2014","experience_end":"Now"}],"activities":[{"activity_title":"MARKETING CLUB","activity_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","activity_start":"Apr 2013","activity_end":"Jan 2014"}],"awards":[{"award_title":"Windows certifications","award_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","award_date":"11 Nov 2015"}],"skills":[{"skill_name":".NET","skill_level":"5"},{"skill_name":"AJAX","skill_level":"2"},{"skill_name":"Amazon Web Services","skill_level":"5"},{"skill_name":"Android Wear SDK","skill_level":"5"},{"skill_name":"3D Animation","skill_level":"4"}],"hobbies":[{"hobby_name":"3D printing"},{"hobby_name":"Amateur radio"},{"hobby_name":"Baton twirling"},{"hobby_name":"Board games"},{"hobby_name":"Calligraphy"},{"hobby_name":"Candle making"},{"hobby_name":"Dance"}]}}'),
(12, 4, 'Undefine', 1, '{"cvdata":{"major":"Web Developer","objective":"The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\"de Finibus Bonorum et Malorum\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.","educations":[{"education_title":"DN of Education University sd","education_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","education_start":"Sep 2010","education_end":"Mar 2014"}],"experiences":[{"experience_title":"FACEBOOK","experience_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","experience_start":"Feb 2011","experience_end":"Jun 2013"},{"experience_title":"GOOGLE","experience_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","experience_start":"Jul 2013","experience_end":"Aug 2014"},{"experience_title":"MICROSOFT","experience_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","experience_start":"Aug 2014","experience_end":"Now"}],"activities":[{"activity_title":"MARKETING CLUB","activity_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","activity_start":"Apr 2013","activity_end":"Jan 2014"},{"activity_title":"IStork CLUB","activity_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","activity_start":"Sep 2015","activity_end":"Now"}],"awards":[{"award_title":"Windows certifications","award_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","award_date":"11 Nov 2015"}],"skills":[{"skill_name":".NET","skill_level":"5"},{"skill_name":"AJAX","skill_level":"2"},{"skill_name":"Amazon Web Services","skill_level":"5"},{"skill_name":"Android Wear SDK","skill_level":"1"},{"skill_name":"3D Animation","skill_level":"4"}],"hobbies":[{"hobby_name":"3D printing"},{"hobby_name":"Amateur radio"},{"hobby_name":"Baton twirling"},{"hobby_name":"Board games"},{"hobby_name":"Calligraphy"},{"hobby_name":"Candle making"},{"hobby_name":"Dance"}]}}'),
(13, 5, 'Undefine', 2, '{"cvdata":{"major":"Sales Representative","objective":"While the About Page can be very informative, some websites go the extra mile and make their About page more than just a testimony of who they are...","educations":[{"education_title":"Harvard University","education_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","education_start":"Sep 2012","education_end":"Jun 2016"}],"experiences":[{"experience_title":"Microsoft","experience_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","experience_start":"Jan 2014","experience_end":"Oct 2015"}],"activities":[{"activity_title":"Marketing Club","activity_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","activity_start":"Jan 2014","activity_end":"Jan 2015"}],"awards":[{"award_title":"Microsoft Certification","award_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","award_date":"1 Jan 2014"}],"skills":[{"skill_name":".NET","skill_level":"4"},{"skill_name":"Adobe Air","skill_level":"3"},{"skill_name":"Branding","skill_level":"5"}],"hobbies":[{"hobby_name":"3D printing"},{"hobby_name":"Acting"},{"hobby_name":"Board games"}]}}'),
(14, 5, 'Undefine', 2, '{"cvdata":{"major":"Public Relations Specialist","objective":"null","educations":[{"education_title":"Harvard University","education_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","education_start":"Sep 2012","education_end":"Jun 2016"}],"experiences":[{"experience_title":"Microsoft","experience_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","experience_start":"Jan 2014","experience_end":"Oct 2015"}],"activities":[{"activity_title":"Marketing Club","activity_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","activity_start":"Jan 2014","activity_end":"Jan 2015"}],"awards":[{"award_title":"Microsoft Certification","award_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","award_date":"1 Jan 2014"}],"skills":[{"skill_name":".NET","skill_level":"4"},{"skill_name":"Adobe Air","skill_level":"3"},{"skill_name":"Branding","skill_level":"5"}],"hobbies":[{"hobby_name":"3D printing"},{"hobby_name":"Acting"},{"hobby_name":"Board games"}]}}'),
(15, 5, 'Undefine', 1, '{"cvdata":{"major":"Public Relations Specialist","objective":"While the About Page can be very informative, some websites go the extra mile and make their About page more than just a testimony of who they are.","educations":[{"education_title":"Harvard University","education_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","education_start":"Sep 2012","education_end":"Jun 2016"}],"experiences":[{"experience_title":"Microsoft","experience_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","experience_start":"Jan 2014","experience_end":"Oct 2015"}],"activities":[{"activity_title":"Marketing Club","activity_detail":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.","activity_start":"Jan 2014","activity_end":"Jan 2015"}],"awards":[],"skills":[{"skill_name":".NET","skill_level":"4"},{"skill_name":"Adobe Air","skill_level":"3"},{"skill_name":"Branding","skill_level":"5"}],"hobbies":[{"hobby_name":"3D printing"},{"hobby_name":"Acting"},{"hobby_name":"Board games"}]}}');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_vitae_templates`
--

CREATE TABLE IF NOT EXISTS `curriculum_vitae_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_vitae_template_name` varchar(512) NOT NULL,
  `curriculum_vitae_template_image` varchar(1024) DEFAULT NULL,
  `curriculum_vitae_template_url` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `curriculum_vitae_templates`
--

INSERT INTO `curriculum_vitae_templates` (`id`, `curriculum_vitae_template_name`, `curriculum_vitae_template_image`, `curriculum_vitae_template_url`) VALUES
(1, 'Simple', 'simple.png', 'simple.cvtp'),
(2, 'model', 'model.png', 'model.cvtp');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `email_created` datetime DEFAULT NULL,
  `is_become_user` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_title` varchar(1024) DEFAULT NULL,
  `feedback_comment` text,
  `feedback_date` date NOT NULL,
  `feedback_result` text,
  `feedback_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_feedbacks_cs_feedback_types1_idx` (`feedback_type_id`),
  KEY `fk_cs_feedbacks_cs_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `feedback_title`, `feedback_comment`, `feedback_date`, `feedback_result`, `feedback_type_id`, `user_id`) VALUES
(1, 'Title', 'Comment', '2016-03-02', NULL, 2, 1),
(2, 'Title2', 'Coment', '2016-02-04', NULL, 2, 1),
(3, 'Title 3', 'Cooment\r\n', '2016-03-08', NULL, 2, 1),
(4, 'Title', 'asdasdas\r\n', '2016-03-17', NULL, 3, 1),
(5, 'Zxz', 'asda', '2016-03-22', NULL, 3, 1),
(6, 'ádádấd', 'ádasdád', '2016-02-17', NULL, 4, 1),
(7, 'Hellio', 'ádád', '2016-01-06', NULL, 2, 1),
(8, 'asdasdádád', 'ádasdá', '2016-01-06', NULL, 3, 1),
(9, 'asdádấáda', 'ádasd', '2015-12-02', NULL, 3, 1),
(10, 'Title', 'Content\r\n', '2016-03-02', NULL, 1, 1),
(13, 'Titleaaaaaaaaaaaa', 'aaaaaaaaaaa', '2016-03-22', NULL, 1, 1),
(14, 'Titleaaaaaaaaaaaa', 'aaaaaaaaaaa', '2016-03-22', NULL, 1, 1),
(15, 'Titleaaaaaaaaaaaa', 'aaaaaaaaaaa', '2016-03-22', NULL, 1, 1),
(16, '', '', '2016-03-24', NULL, 3, 1),
(17, 'testfeedback', 'Time for lunch closes :">', '2016-03-24', NULL, 4, 1),
(18, 'afgadgad', 'gadgadgadgadgdagadg\nadgadgadg\ndagadg\nadgadg\nadg\nadg\ndagadgdagadg\nadgadgadg\nadg\nadg\nadg\nadg\nadg\ng\nsgdas\ng\nadg\nad\ng\nadg\nad\ng\nadg', '2016-03-24', NULL, 2, 1),
(19, 'Test', 'Content\r\n', '2016-03-02', NULL, 1, 1),
(20, 'hihihihi', 'abc', '2016-03-31', NULL, 3, 1),
(21, 'hihihihi', 'abc', '2016-03-31', NULL, 3, 1),
(22, 'hihihihi', 'abc1111', '2016-03-31', NULL, 3, 1),
(23, 'Login Problem', 'This is a comment', '0000-00-00', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_types`
--

CREATE TABLE IF NOT EXISTS `feedback_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_type_name` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feedback_types`
--

INSERT INTO `feedback_types` (`id`, `feedback_type_name`) VALUES
(1, 'Idea'),
(2, 'Problem'),
(3, 'Question'),
(4, 'Praise');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `hiring_manager_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `follow_hiring_manager` tinyint(1) DEFAULT NULL,
  `follow_applicant` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`hiring_manager_id`,`applicant_id`),
  KEY `fk_cs_hiring_managers_has_cs_applicants_cs_applicants1_idx` (`applicant_id`),
  KEY `fk_cs_hiring_managers_has_cs_applicants_cs_hiring_managers1_idx` (`hiring_manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`hiring_manager_id`, `applicant_id`, `follow_hiring_manager`, `follow_applicant`) VALUES
(1, 4, 1, 1),
(1, 5, 1, 1),
(2, 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(512) NOT NULL,
  `group_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `group_description`) VALUES
(1, 'Administrator', 'Description here'),
(2, 'Hiring Manager', 'Descriptions'),
(3, 'Applicant', 'Descriptions');

-- --------------------------------------------------------

--
-- Table structure for table `hiring_managers`
--

CREATE TABLE IF NOT EXISTS `hiring_managers` (
  `id` int(11) NOT NULL,
  `hiring_manager_name` varchar(512) NOT NULL,
  `hiring_manager_phone_number` varchar(30) DEFAULT NULL,
  `hiring_manager_status` tinyint(1) NOT NULL DEFAULT '0',
  `company_name` varchar(1024) DEFAULT NULL,
  `company_address` varchar(1024) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_size` int(11) DEFAULT NULL,
  `company_about` text,
  `company_logo` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_hiring_managers_cs_users1_idx` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hiring_managers`
--

INSERT INTO `hiring_managers` (`id`, `hiring_manager_name`, `hiring_manager_phone_number`, `hiring_manager_status`, `company_name`, `company_address`, `company_email`, `company_size`, `company_about`, `company_logo`) VALUES
(1, 'Nguyen The Vien', '0963935709', 1, 'Dell Inc', 'Round Rock, Texas.', 'recruitment@dell.vn', 900000, 'Litchfield Performing Arts (LPA) is a charitable organization founded in 1981 whose mission is to educate and inspire young people to be confident, creative, expressive individuals through challenging programs in both jazz music and the performing arts while sharing the passion and magic of the arts with the wider community..Litchfield Performing Arts (LPA) is a charitable organization founded in 1981 whose mission is to educate and inspire young people to be confident, creative, expressive individuals through challenging programs in both jazz music and the performing arts while sharing the passion and magic of the arts with the wider community..Litchfield Performing Arts (LPA) is a charitable organization founded in 1981 whose mission is to educate and inspire young people to be confident, creative, expressive individuals through challenging programs in both jazz music and the performing arts while sharing the passion and magic of the arts with the wider community..Litchfield Performing Arts (LPA) is a charitable organization founded in 1981 whose mission is to educate and inspire young people to be confident, creative, expressive individuals through challenging programs in both jazz music and the performing arts while sharing the passion and magic of the arts with the wider community..', '1.jpg'),
(2, 'Le Ba Thuan', '01213163475', 1, 'Alphabet Inc', 'Mountain View, California.', 'recruitment@alphabet.vn', 800000, 'Alphabet Inc. (commonly known as Alphabet, and frequently informally referred to as Google) is an American multinational conglomerate created in 2015 as the parent company of Google and several other companies previously owned by Google. The company is based in Mountain View, California and headed by Google''s co-founders, Larry Page and Sergey Brin, with Page serving as CEO and Brin as President. The reorganization of Google into Alphabet was completed on October 2, 2015.] Alphabet''s portfolio encompasses several industries, including technology, life sciences, investment capital, and research. Some of its subsidiaries include Google, Calico, GV, Google Capital, X, and Google Fiber. Some of the subsidiaries of Alphabet have altered their names since leaving Google - Google Ventures becoming GV, Google Life Sciences becoming Verily and Google X becoming just X. Following the restructuring Page became CEO of Alphabet while Sundar Pichai took his position as CEO of Google. Shares of Google''s stock have been converted into Alphabet stock, which trade under Google''s former ticker symbols of "GOOG" and "GOOGL".', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE IF NOT EXISTS `hobbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hobby_name` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=294 ;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `hobby_name`) VALUES
(1, '3D printing'),
(2, 'Amateur radio'),
(3, 'Acting'),
(4, 'Baton twirling'),
(5, 'Board games'),
(6, 'Book restoration'),
(7, 'Cabaret'),
(8, 'Calligraphy'),
(9, 'Candle making'),
(10, 'Computer programming'),
(11, 'Coffee roasting'),
(12, 'Cooking'),
(13, 'Coloring'),
(14, 'Cosplaying'),
(15, 'Couponing'),
(16, 'Creative writing'),
(17, 'Crocheting'),
(18, 'Crossword puzzles'),
(19, 'Cryptography'),
(20, 'Dance'),
(21, 'Digital arts'),
(22, 'Drama'),
(23, 'Drawing'),
(24, 'Do it yourself'),
(25, 'Electronics'),
(26, 'Embroidery'),
(27, 'Fashion'),
(28, 'Flower arranging'),
(29, 'Foreign language learning'),
(30, 'Gaming'),
(31, 'tabletop games'),
(32, 'role-playing games'),
(33, 'Gambling'),
(34, 'Genealogy'),
(35, 'Glassblowing'),
(36, 'Gunsmithing'),
(37, 'Homebrewing'),
(38, 'Ice skating'),
(39, 'Jewelry making'),
(40, 'Jigsaw puzzles'),
(41, 'Juggling'),
(42, 'Knapping'),
(43, 'Knitting'),
(44, 'Kabaddi'),
(45, 'Knife making'),
(46, 'Kombucha Brewing'),
(47, 'Lacemaking'),
(48, 'Lapidary'),
(49, 'Leather crafting'),
(50, 'Lego building'),
(51, 'Lockpicking'),
(52, 'Machining'),
(53, 'Macrame'),
(54, 'Metalworking'),
(55, 'Magic'),
(56, 'Model building'),
(57, 'Listening to music'),
(58, 'Origami'),
(59, 'Painting'),
(60, 'Playing musical instruments'),
(61, 'Pet'),
(62, 'Poi'),
(63, 'Pottery'),
(64, 'Puzzles'),
(65, 'Quilting'),
(66, 'Reading'),
(67, 'Scrapbooking'),
(68, 'Sculpting'),
(69, 'Sewing'),
(70, 'Singing'),
(71, 'Sudoku'),
(72, 'Sketching'),
(73, 'Soapmaking'),
(74, 'Stand-up comedy'),
(75, 'Table tennis'),
(76, 'Video gaming'),
(77, 'Watching movies'),
(78, 'Web surfing'),
(79, 'Whittling'),
(80, 'Wood carving'),
(81, 'Woodworking'),
(82, 'Worldbuilding'),
(83, 'Writing'),
(84, 'Yoga'),
(85, 'Yo-yoing'),
(86, 'Air sports'),
(87, 'Archery'),
(88, 'Astronomy'),
(89, 'Backpacking'),
(90, 'BASE jumping'),
(91, 'Baseball'),
(92, 'Basketball'),
(93, 'Beekeeping'),
(94, 'Bird watching'),
(95, 'Blacksmithing'),
(96, 'Board sports'),
(97, 'Bodybuilding'),
(98, 'Brazilian jiu-jitsu'),
(99, 'Community'),
(100, 'Cycling'),
(101, 'Camping'),
(102, 'Dowsing'),
(103, 'Driving'),
(104, 'Fishing'),
(105, 'Flag Football'),
(106, 'Flying'),
(107, 'Flying disc'),
(108, 'Foraging'),
(109, 'Gardening'),
(110, 'Geocaching'),
(111, 'Ghost hunting'),
(112, 'Graffiti'),
(113, 'Handball'),
(114, 'Hiking'),
(115, 'Hooping'),
(116, 'Horseback riding'),
(117, 'Hunting'),
(118, 'Inline skating'),
(119, 'Jogging'),
(120, 'Kayaking'),
(121, 'Kite flying'),
(122, 'Kitesurfing'),
(123, 'LARPing'),
(124, 'Letterboxing'),
(125, 'Metal detecting'),
(126, 'Motor sports'),
(127, 'Mountain biking'),
(128, 'Mountaineering'),
(129, 'Mushroom hunting'),
(130, 'Mycology'),
(131, 'Netball'),
(132, 'Nordic skating'),
(133, 'Orienteering'),
(134, 'Paintball'),
(135, 'Parkour'),
(136, 'Photography'),
(137, 'Polo'),
(138, 'Rafting'),
(139, 'Rappelling'),
(140, 'Rock climbing'),
(141, 'Roller skating'),
(142, 'Rugby'),
(143, 'Running'),
(144, 'Sailing'),
(145, 'Sand art'),
(146, 'Scouting'),
(147, 'Scuba diving'),
(148, 'Sculling'),
(149, 'Rowing'),
(150, 'Topiary'),
(151, 'Shooting'),
(152, 'Shopping'),
(153, 'Skateboarding'),
(154, 'Skiing'),
(155, 'Skimboarding'),
(156, 'Skydiving'),
(157, 'Slacklining'),
(158, 'Snowboarding'),
(159, 'Stone skipping'),
(160, 'Surfing'),
(161, 'Swimming'),
(162, 'Taekwondo'),
(163, 'Tai chi'),
(164, 'Urban exploration'),
(165, 'Vacation'),
(166, 'Vehicle restoration'),
(167, 'Walking'),
(168, 'Water sports'),
(169, 'Action figure'),
(170, 'Antiquing'),
(171, 'Art collecting'),
(172, 'Book collecting'),
(173, 'Card collecting'),
(174, 'Coin collecting'),
(175, 'Comic book collecting'),
(176, 'Deltiology'),
(177, 'Die-cast toy'),
(178, 'Element collecting'),
(179, 'Movie and movie memorabilia collecting'),
(180, 'Record collecting'),
(181, 'Stamp collecting'),
(182, 'Video game collecting'),
(183, 'Vintage cars'),
(184, 'Antiquities'),
(185, 'Auto audiophilia'),
(186, 'Flower collecting and pressing'),
(187, 'Fossil hunting'),
(188, 'Insect collecting'),
(189, 'Metal detecting'),
(190, 'Stone collecting'),
(191, 'Mineral collecting'),
(192, 'Rock balancing'),
(193, 'Sea glass collecting'),
(194, 'Seashell collecting'),
(195, 'Aqua-lung'),
(196, 'Animal fancy'),
(197, 'Badminton'),
(198, 'Baton Twirling'),
(199, 'Billiards'),
(200, 'Bowling'),
(201, 'Boxing'),
(202, 'Bridge'),
(203, 'Cheerleading'),
(204, 'Chess'),
(205, 'Color guard'),
(206, 'Curling'),
(207, 'Dancing'),
(208, 'Darts'),
(209, 'Debate'),
(210, 'Fencing'),
(211, 'Go'),
(212, 'Gymnastics'),
(213, 'Marbles'),
(214, 'Martial arts'),
(215, 'Mahjong'),
(216, 'Poker'),
(217, 'Slot car racing'),
(218, 'Table football'),
(219, 'Video Games'),
(220, 'Volleyball'),
(221, 'Weightlifting'),
(222, 'Airsoft'),
(223, 'American football'),
(224, 'Archery'),
(225, 'Association football'),
(226, 'Australian rules football'),
(227, 'Auto racing'),
(228, 'Baseball'),
(229, 'Beach Volleyball'),
(230, 'Breakdancing'),
(231, 'Climbing'),
(232, 'Cricket'),
(233, 'Cycling'),
(234, 'Disc golf'),
(235, 'Dog sport'),
(236, 'Equestrianism'),
(237, 'Exhibition drill'),
(238, 'Field hockey'),
(239, 'Figure skating'),
(240, 'Fishing'),
(241, 'Footbag'),
(242, 'Golfing'),
(243, 'Handball'),
(244, 'Ice hockey'),
(245, 'Judo'),
(246, 'Jukskei'),
(247, 'Kart racing'),
(248, 'Knife throwing'),
(249, 'Lacrosse'),
(250, 'Laser tag'),
(251, 'Model aircraft'),
(252, 'Pigeon racing'),
(253, 'Racquetball'),
(254, 'Radio-controlled car racing'),
(255, 'Roller derby'),
(256, 'Rugby league football'),
(257, 'Sculling'),
(258, 'Rowing'),
(259, 'Shooting sport'),
(260, 'Skateboarding'),
(261, 'Speed skating'),
(262, 'Squash'),
(263, 'Surfing'),
(264, 'Swimming'),
(265, 'Table tennis'),
(266, 'Tennis'),
(267, 'Tour skating'),
(268, 'Triathlon'),
(269, 'Ultimate Disc'),
(270, 'Volleyball'),
(271, 'Fishkeeping'),
(272, 'Learning'),
(273, 'Microscopy'),
(274, 'Reading'),
(275, 'Shortwave listening'),
(276, 'Videophilia'),
(277, 'Aircraft spotting'),
(278, 'Amateur astronomy'),
(279, 'Amateur geology'),
(280, 'Astrology'),
(281, 'Birdwatching'),
(282, 'Bus spotting'),
(283, 'Geocaching'),
(284, 'Gongoozling'),
(285, 'Herping'),
(286, 'Meteorology'),
(287, 'People watching'),
(288, 'Photography'),
(289, 'Trainspotting'),
(290, 'Traveling'),
(291, 'Hiking'),
(292, 'backpacking'),
(293, 'Whale Watching');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_activity` varchar(45) DEFAULT NULL,
  `log_date` varchar(45) DEFAULT NULL,
  `administrator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_logs_cs_administrators1_idx` (`administrator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE IF NOT EXISTS `majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major_name` varchar(512) DEFAULT NULL,
  `major_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `major_name`, `major_description`) VALUES
(4, 'Dentist', 'Description'),
(5, 'Registered Nurse', 'Description'),
(6, 'Pharmacist', 'Description'),
(7, 'Computer Systems Analyst', 'Description'),
(8, 'Physician', 'Description'),
(9, 'Database Administrator', 'Description'),
(10, 'Software Developer', 'Description'),
(11, 'Physical Therapist', 'Description'),
(12, 'Web Developer', 'Description'),
(13, 'Dental Hygienist', 'Description'),
(14, 'Occupational Therapist', 'Description'),
(15, 'Veterinarian', 'Description'),
(16, 'Computer Programmer', 'Description'),
(17, 'School Psychologist', 'Description'),
(18, 'Physical Therapist Assistant', 'Description'),
(19, 'Interpreter & Translator', 'Description'),
(20, 'Mechanical Engineer', 'Description'),
(21, 'Veterinary Technologist & Technician', 'Description'),
(22, 'Epidemiologist', 'Description'),
(23, 'IT Manager', 'Description'),
(24, 'Market Research Analyst', 'Description'),
(25, 'Diagnostic Medical Sonographer', 'Description'),
(26, 'Computer Systems Administrator', 'Description'),
(27, 'Respiratory Therapist', 'Description'),
(28, 'Medical Secretary', 'Description'),
(29, 'Civil Engineer', 'Description'),
(30, 'Substance Abuse Counselor', 'Description'),
(31, 'Speech-Language Pathologist', 'Description'),
(32, 'Landscaper & Groundskeeper', 'Description'),
(33, 'Radiologic Technologist ', 'Description'),
(34, 'Cost Estimator', 'Description'),
(35, 'Financial Advisor', 'Description'),
(36, 'Marriage & Family Therapist', 'Description'),
(37, 'Medical Assistant', 'Description'),
(38, 'Lawyer', 'Description'),
(39, 'Accountant', 'Description'),
(40, 'Compliance Officer', 'Description'),
(41, 'High School Teacher', 'Description'),
(42, 'Clinical Laboratory Technician', 'Description'),
(43, 'Maintenance & Repair Worker', 'Description'),
(44, 'Bookkeeping, Accounting, & Audit Clerk', 'Description'),
(45, 'Financial Manager', 'Description'),
(46, 'Recreation & Fitness Worker', 'Description'),
(47, 'Insurance Agent', 'Description'),
(48, 'Elementary School Teacher', 'Description'),
(49, 'Dental Assistant', 'Description'),
(50, 'Management Analyst', 'Description'),
(51, 'Home Health Aide', 'Description'),
(52, 'Pharmacy Technician', 'Description'),
(53, 'Construction Manager', 'Description'),
(54, 'Public Relations Specialist', 'Description'),
(55, 'Middle School Teacher', 'Description'),
(56, 'Massage Therapist', 'Description'),
(57, 'Paramedic', 'Description'),
(58, 'Preschool Teacher', 'Description'),
(59, 'Hairdresser', 'Description'),
(60, 'Marketing Manager', 'Description'),
(61, 'Patrol Officer', 'Description'),
(62, 'School Counselor', 'Description'),
(63, 'Executive Assistant', 'Description'),
(64, 'Financial Analyst', 'Description'),
(65, 'Personal Care Aide', 'Description'),
(66, 'Clinical Social Worker', 'Description'),
(67, 'Business Operations Manager', 'Description'),
(68, 'Loan Officer', 'Description'),
(69, 'Meeting, Convention & Event Planner', 'Description'),
(70, 'Mental Health Counselor', 'Description'),
(71, 'Nursing Aide', 'Description'),
(72, 'Sales Representative', 'Description'),
(73, 'Architect', 'Description'),
(74, 'Sales Manager', 'Description'),
(75, 'HR Specialist', 'Description'),
(76, 'Plumber', 'Description'),
(77, 'Real Estate Agent', 'Description'),
(78, 'Glazier', 'Description'),
(79, 'Art Director', 'Description'),
(80, 'Customer Service Representative', 'Description'),
(81, 'Logistician', 'Description'),
(82, 'Auto Mechanic', 'Description'),
(83, 'Bus Driver', 'Description'),
(84, 'Restaurant Cook', 'Description'),
(85, 'Child & Family Social Worker', 'Description'),
(86, 'Administrative Assistant', 'Description'),
(87, 'Receptionist', 'Description'),
(88, 'Paralegal', 'Description'),
(89, 'Cement Mason & Concrete Finisher', 'Description'),
(90, 'Painter', 'Description'),
(91, 'Sports Coach', 'Description'),
(92, 'Teacher Assistant', 'Description'),
(93, 'Brickmason & Blockmason', 'Description'),
(94, 'Cashier', 'Description'),
(95, 'Janitor', 'Description'),
(96, 'Electrician', 'Description'),
(97, 'Delivery Truck Driver', 'Description'),
(98, 'Maid & Housekeeper', 'Description'),
(99, 'Carpenter', 'Description'),
(100, 'Security Guard', 'Description'),
(101, 'Construction Worker', 'Description'),
(102, 'Fabricator', 'Description'),
(103, 'Telemarketer', 'Description');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_title` varchar(512) DEFAULT NULL,
  `notification_message` varchar(1024) NOT NULL,
  `notification_type` tinyint(5) DEFAULT NULL,
  `notification_object_id` int(11) NOT NULL,
  `is_seen` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_notifications_cs_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_title`, `notification_message`, `notification_type`, `notification_object_id`, `is_seen`, `user_id`) VALUES
(2, 'New CV apply', 'User test was apply to your post.', 1, 101, 0, 2),
(3, 'New CV apply', 'User test was apply to your post.', 1, 101, 0, 2),
(4, 'New CV apply', 'User test was apply to your post.', 1, 101, 0, 2),
(5, 'New CV apply', 'User test was apply to your post.', 1, 101, 0, 2),
(6, 'New CV apply', 'User test was apply to your post.', 1, 101, 0, 2),
(7, 'Accept CV', 'Your CV was accepted by kyler', 2, 1, 0, 5),
(8, 'Reject CV', 'Your CV was rejected by mark', 2, 11, 0, 4),
(9, 'Accept CV', 'Your CV was accepted by kyler', 2, 1, 0, 5),
(10, 'Reject CV', 'Your CV was rejected by kyler', 2, 1, 0, 5),
(11, 'New CV apply', 'User test was apply to your post.', 1, 97, 0, 2),
(12, 'Accept CV', 'Your CV was accepted by kyler', 2, 1, 0, 5),
(13, 'Accept CV', 'Your CV was accepted', 2, 1, 0, 5),
(14, 'Reject CV', 'Your CV was rejected by kyler', 2, 1, 0, 5),
(15, 'New CV apply', 'An user was apply to your post.', 1, 97, 0, 2),
(16, 'New CV apply', 'An user was apply to your post.', 1, 98, 0, 2),
(17, 'Accept CV', 'Your CV was accepted', 2, 12, 0, 4),
(18, 'New CV apply', 'An user was apply to your post.', 1, 99, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_history`
--

CREATE TABLE IF NOT EXISTS `personal_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_history_title` varchar(1024) NOT NULL,
  `personal_history_detail` text NOT NULL,
  `personal_history_start` date NOT NULL,
  `personal_history_end` date DEFAULT NULL,
  `personal_history_type_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_personal_history_cs_personal_history_types1_idx` (`personal_history_type_id`),
  KEY `fk_cs_personal_history_cs_applicants1_idx` (`applicant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `personal_history`
--

INSERT INTO `personal_history` (`id`, `personal_history_title`, `personal_history_detail`, `personal_history_start`, `personal_history_end`, `personal_history_type_id`, `applicant_id`) VALUES
(1, 'DN of Education University', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.', '2010-09-11', '2014-03-29', 1, 4),
(3, 'FACEBOOK', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.', '2011-02-22', '2013-06-22', 2, 4),
(4, 'GOOGLE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.', '2013-07-02', '2014-08-12', 2, 4),
(5, 'MICROSOFT', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.', '2014-08-12', NULL, 2, 4),
(6, 'MARKETING CLUB', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.', '2013-04-04', '2014-01-02', 3, 4),
(7, 'IStork CLUB', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.', '2015-09-01', NULL, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_history_types`
--

CREATE TABLE IF NOT EXISTS `personal_history_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_history_type_name` varchar(512) NOT NULL,
  `personal_history_type_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `personal_history_types`
--

INSERT INTO `personal_history_types` (`id`, `personal_history_type_name`, `personal_history_type_description`) VALUES
(1, 'Education', 'Where did you study at?'),
(2, 'Experience', 'Where did you work at?'),
(3, 'Activity', 'What activities did you join?'),
(4, 'Award', 'What awards did you get?');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(1024) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_salary` int(11) DEFAULT NULL,
  `post_location` varchar(512) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_status` tinyint(2) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `hiring_manager_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_posts_cs_categories_idx` (`category_id`),
  KEY `fk_cs_posts_cs_hiring_managers1_idx` (`hiring_manager_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_content`, `post_salary`, `post_location`, `post_date`, `post_status`, `category_id`, `hiring_manager_id`) VALUES
(3, 'GRAPHIC DESIGNER', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 400000000, 'Mountain View, CA', '2016-03-18', 0, 21, 1),
(4, 'LIVE CONCERT REVIEWER', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 900000000, 'Los Angeles, CA', '2016-03-18', 1, 28, 1),
(5, 'FILM INTERN - LA', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 560000000, 'Los Angeles, CA', '2016-03-22', 1, 1, 1),
(6, 'Digital Strategist/Technical Director (Sitecore CMS)', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 123, 'Danana, VN', '2016-03-18', 1, 1, 1),
(7, 'Sr. Applications Support Analyst', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-22', 0, 2, 1),
(8, 'Electrician Industrial Mechanic PLC', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-31', 0, 2, 1),
(9, 'Human Resources Generalist', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-31', 1, 2, 1),
(11, 'SharePoint Technical Consultant', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-31', 0, 2, 1),
(12, 'MS Dynamics NAV Financial Accountant', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-22', 0, 2, 1),
(13, 'MS Dynamics GP Technical Consultant', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-15', 0, 2, 1),
(14, 'Sr. SharePoint Developer', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-31', 0, 2, 1),
(15, 'MS Dynamics CRM- Developer', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-31', 0, 2, 1),
(16, 'MS BI Analyst-Chicago, IL (Healthcare)', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-22', 0, 2, 1),
(17, 'Recruitment Consultant', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(18, 'Entry-Level Recruitment Consultant', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(19, 'BI Architect- MS BI', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-22', 0, 2, 1),
(20, 'LEAD CMS Developer', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(22, 'Azure Solution Arch', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-15', 0, 2, 1),
(23, 'MS Azure Regional Director', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-15', 0, 2, 1),
(24, 'Sr. Sitecore Developer Role Washington D.C', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(25, 'Process Technician', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 500000000, 'Los Angeles, CA', '2016-03-09', 1, 29, 1),
(27, 'Dynamics NAV Junior Implementation Consultant', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 215434, 'adgadgadg', '2016-03-09', 1, 6, 1),
(29, 'Industrial Mechanic', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 500000000, 'Los Angeles, CA', '2016-03-09', 1, 29, 1),
(30, 'Machine Operator/Assembler/Packer', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 500000000, 'Los Angeles, CA', '2016-03-23', 1, 29, 1),
(31, 'Pharmacy Technician', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 500000000, 'Los Angeles, CA', '2016-03-09', 1, 29, 1),
(34, 'SQL Server Database Administrator- DBA-Wisconsin', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 123123, 'Da nang', '2016-03-23', 1, 2, 1),
(35, 'Financial Data Scientist', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 135135, 'gwgwr', '2016-03-23', 1, 1, 1),
(36, 'MS Dynamics NAV-DEVELOPER Illinois', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 135135135, 'wgwrgwr g', '2016-03-23', 1, 1, 1),
(37, 'Dynamics NAV/Navision - Project Manager', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 3151515, ' wrgwrg wrg', '2016-03-23', 1, 1, 1);
INSERT INTO `posts` (`id`, `post_title`, `post_content`, `post_salary`, `post_location`, `post_date`, `post_status`, `category_id`, `hiring_manager_id`) VALUES
(38, 'Clinical Informatics Educator Job', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 0, 'rwgwrgrwgrw', '2016-03-23', 1, 1, 1),
(39, 'Retail Sales Manager - Entry Level Management Training Program', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 112312416, 'adgadg', '2016-03-23', 1, 1, 1),
(40, 'Signals Intelligence (SIGINT) Systems Engineer - EE5-4072', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 2147483647, 'adgadg', '2016-03-23', 1, 1, 1),
(41, 'API Developer Job', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 11111111, 'adgadg', '2016-03-23', 1, 1, 1),
(42, 'Front End Java Developer - Financial SaaS Product Giant!', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 0, 'abc', '2016-03-25', 1, 3, 1),
(43, 'Senior Consultant Mergers & Acquisitions Transactions Analytics', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 0, 'adgadg', '2016-03-25', 1, 1, 1),
(44, 'Manager Mergers & Acquisitions Transactions Analytics', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 0, 'adgadg', '2016-03-25', 1, 1, 1),
(45, 'Cisco UCS Technical Marketing Engineer - Management Controller Infrastructure', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 12, 'adgadg', '2016-03-25', 0, 1, 1),
(46, 'Sr. MS BI Developer', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 123, 'da nang', '2016-03-31', 0, 4, 1),
(47, 'SUMMER INTERN', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 500000001, 'Los Angeles, CA', '2016-03-22', 1, 29, 1),
(48, 'GAME DESIGNER ', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 6000000, 'Da Nang City', '2016-03-18', NULL, 21, 2),
(49, 'Sr. Manager of Cost Accounting and Ops Planning', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 8000000, 'Da Nang City', '2016-03-15', 1, 3, 2),
(50, 'Entry Level Accounting Position Room for Growth', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 12000000, 'Da Nang City', '2016-03-15', 0, 3, 2),
(51, 'Director of Accounting', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 11000000, 'Da Nang City', '2016-03-15', 0, 3, 2),
(90, 'Retail Sales Manager - Entry Level Management Training Program', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-03-22', 1, 5, 2),
(91, 'Signals Intelligence (SIGINT) Systems Engineer - EE5-4072', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-03-22', 1, 5, 2),
(92, 'API Developer Job', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-03-18', 1, 5, 2),
(93, 'Clinical Informatics Educator Job', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-03-18', 1, 5, 2),
(94, 'Auto Parts Associate', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-03-18', 1, 5, 2),
(95, 'MS Dynamics NAV-DEVELOPER Illinois | $90K-$110K', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-03-18', 1, 5, 2),
(96, 'SQL Server Database Administrator- DBA-Wisconsin- $85k-$95k', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 0, 5, 2),
(97, 'Dynamics NAV Junior Implementation Consultant $65-85K', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(98, 'Dynamics NAV/Navision - Project Manager - $65-85/hourly', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(99, 'Sr. MS BI Developer | Havertown, PA | $115-130K', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(100, 'MS BI Analyst-Chicago, IL (Healthcare) 70k-90k', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(101, 'Digital Strategist/Technical Director (Sitecore CMS) Arlington', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(102, 'SharePoint Technical Consultant - Chicago - Contract - $90-$120', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(103, 'MS Dynamics NAV Financial Accountant - Mass | $65-95k+benefits', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(104, 'MS Dynamics GP Technical Consultant - Greater Boston Area - $85', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2);
INSERT INTO `posts` (`id`, `post_title`, `post_content`, `post_salary`, `post_location`, `post_date`, `post_status`, `category_id`, `hiring_manager_id`) VALUES
(105, 'Sr. SharePoint Developer', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(106, 'MS Dynamics CRM- Developer- Phoenix, AZ |Contract/Onsite 100/hr', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2),
(107, 'Recruitment Consultant - NYC - Potential Earnings of $80k+', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 15000000, 'Da Nang, Viet Nam', '2016-04-19', 1, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts_has_curriculum_vitaes`
--

CREATE TABLE IF NOT EXISTS `posts_has_curriculum_vitaes` (
  `post_id` int(11) NOT NULL,
  `curriculum_vitae_id` int(11) NOT NULL,
  `applied_cv_status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`,`curriculum_vitae_id`),
  KEY `fk_cs_posts_has_cs_curriculum_vitaes_cs_curriculum_vitaes1_idx` (`curriculum_vitae_id`),
  KEY `fk_cs_posts_has_cs_curriculum_vitaes_cs_posts1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts_has_curriculum_vitaes`
--

INSERT INTO `posts_has_curriculum_vitaes` (`post_id`, `curriculum_vitae_id`, `applied_cv_status`) VALUES
(97, 1, 0),
(98, 12, 0),
(99, 15, 0),
(101, 1, 2),
(101, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(512) NOT NULL,
  `skill_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_skills_cs_skill_types1_idx` (`skill_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=898 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `skill_type_id`) VALUES
(1, '.NET', 1),
(2, '4D', 1),
(3, 'Active Directory', 1),
(4, 'Adobe Air', 1),
(5, 'Agile Development', 1),
(6, 'AJAX', 1),
(7, 'Alibaba', 1),
(8, 'Amazon Web Services', 1),
(9, 'AMQP', 1),
(10, 'Analytics', 1),
(11, 'Android Wear SDK', 1),
(12, 'Angular.js', 1),
(13, 'Apache', 1),
(14, 'Apache Ant', 1),
(15, 'Apache Solr', 1),
(16, 'Apple Safari', 1),
(17, 'Applescript', 1),
(18, 'Argus Monitoring Software', 1),
(19, 'Artificial Intelligence', 1),
(20, 'AS400 &amp; iSeries', 1),
(21, 'ASP', 1),
(22, 'ASP.NET', 1),
(23, 'Assembly', 1),
(24, 'Asterisk PBX', 1),
(25, 'Augmented Reality', 1),
(26, 'AutoHotkey', 1),
(27, 'Azure', 1),
(28, 'backbone.js', 1),
(29, 'Balsamiq', 1),
(30, 'Big Data', 1),
(31, 'BigCommerce', 1),
(32, 'Binary Analysis', 1),
(33, 'Bitcoin', 1),
(34, 'Biztalk', 1),
(35, 'Blog Install', 1),
(36, 'Bluetooth Low Energy (BLE)', 1),
(37, 'BMC Remedy', 1),
(38, 'Boonex Dolphin', 1),
(39, 'Bower', 1),
(40, 'BSD', 1),
(41, 'Business Catalyst', 1),
(42, 'C Programming', 1),
(43, 'C# Programming', 1),
(44, 'C++ Programming', 1),
(45, 'CakePHP', 1),
(46, 'Call Control XML', 1),
(47, 'CasperJS', 1),
(48, 'Cassandra', 1),
(49, 'Chef Configuration Management', 1),
(50, 'Chordiant', 1),
(51, 'Chrome OS', 1),
(52, 'Cisco', 1),
(53, 'CLIPS', 1),
(54, 'Cloud Computing', 1),
(55, 'CMS', 1),
(56, 'COBOL', 1),
(57, 'Cocoa', 1),
(58, 'Codeigniter', 1),
(59, 'Cold Fusion', 1),
(60, 'Computer Graphics', 1),
(61, 'Computer Security', 1),
(62, 'CRE Loaded', 1),
(63, 'CS-Cart', 1),
(64, 'CubeCart', 1),
(65, 'CUDA', 1),
(66, 'D3.js', 1),
(67, 'Dart', 1),
(68, 'Data Warehousing', 1),
(69, 'Database Administration', 1),
(70, 'Database Development', 1),
(71, 'Database Programming', 1),
(72, 'DataLife Engine', 1),
(73, 'DDS', 1),
(74, 'Debian', 1),
(75, 'Debugging', 1),
(76, 'Delphi', 1),
(77, 'Django', 1),
(78, 'DNS', 1),
(79, 'DOS', 1),
(80, 'DotNetNuke', 1),
(81, 'Drupal', 1),
(82, 'Dynamics', 1),
(83, 'eCommerce', 1),
(84, 'edX', 1),
(85, 'Elasticsearch', 1),
(86, 'eLearning', 1),
(87, 'Electronic Forms', 1),
(88, 'Embedded Software', 1),
(89, 'Ember.js', 1),
(90, 'Erlang', 1),
(91, 'Express JS', 1),
(92, 'Expression Engine', 1),
(93, 'Face Recognition', 1),
(94, 'FileMaker', 1),
(95, 'Firefox', 1),
(96, 'Fortran', 1),
(97, 'Forum Software', 1),
(98, 'FreelancerAPI', 1),
(99, 'FreeSwitch', 1),
(100, 'Game Consoles', 1),
(101, 'Game Design', 1),
(102, 'Game Development', 1),
(103, 'GameSalad', 1),
(104, 'Gamification', 1),
(105, 'Git', 1),
(106, 'Golang', 1),
(107, 'Google Analytics', 1),
(108, 'Google App Engine', 1),
(109, 'Google Cardboard', 1),
(110, 'Google Chrome', 1),
(111, 'Google Cloud Storage', 1),
(112, 'Google Earth', 1),
(113, 'Google Maps API', 1),
(114, 'Google Plus', 1),
(115, 'Google Web Toolkit', 1),
(116, 'Google Webmaster Tools', 1),
(117, 'Google Website Optimizer', 1),
(118, 'GoPro', 1),
(119, 'GPGPU', 1),
(120, 'Grease Monkey', 1),
(121, 'Growth Hacking', 1),
(122, 'Grunt', 1),
(123, 'Hadoop', 1),
(124, 'Haskell', 1),
(125, 'HBase', 1),
(126, 'Heroku', 1),
(127, 'Hive', 1),
(128, 'HomeKit', 1),
(129, 'HP Openview', 1),
(130, 'HTML', 1),
(131, 'HTML5', 1),
(132, 'iBeacon', 1),
(133, 'IBM Tivoli', 1),
(134, 'IBM Websphere Transformation Tool', 1),
(135, 'IIS', 1),
(136, 'Instagram', 1),
(137, 'Internet Security', 1),
(138, 'Interspire', 1),
(139, 'Ionic Framework', 1),
(140, 'ITIL', 1),
(141, 'J2EE', 1),
(142, 'Jabber', 1),
(143, 'Java', 1),
(144, 'JavaFX', 1),
(145, 'Javascript', 1),
(146, 'Joomla', 1),
(147, 'jQuery / Prototype', 1),
(148, 'JSON', 1),
(149, 'JSP', 1),
(150, 'Kinect', 1),
(151, 'Knockout.js', 1),
(152, 'LabVIEW', 1),
(153, 'Laravel', 1),
(154, 'Leap Motion SDK', 1),
(155, 'LESS/Sass/SCSS', 1),
(156, 'Link Building', 1),
(157, 'Linkedin', 1),
(158, 'LINQ', 1),
(159, 'Linux', 1),
(160, 'Lisp', 1),
(161, 'Lotus Notes', 1),
(162, 'Lua', 1),
(163, 'Mac OS', 1),
(164, 'Magento', 1),
(165, 'Magic Leap', 1),
(166, 'Map Reduce', 1),
(167, 'MariaDB', 1),
(168, 'Metatrader', 1),
(169, 'Microsoft', 1),
(170, 'Microsoft Access', 1),
(171, 'Microsoft Exchange', 1),
(172, 'Microsoft Expression', 1),
(173, 'Microsoft Hololens', 1),
(174, 'Microsoft SQL Server', 1),
(175, 'Minitlab', 1),
(176, 'MMORPG', 1),
(177, 'Mobile App Testing', 1),
(178, 'MODx', 1),
(179, 'MonetDB', 1),
(180, 'Moodle', 1),
(181, 'MQTT', 1),
(182, 'MVC', 1),
(183, 'MySpace', 1),
(184, 'MySQL', 1),
(185, 'Network Administration', 1),
(186, 'Nginx', 1),
(187, 'Ning', 1),
(188, 'node.js', 1),
(189, 'NoSQL Couch &amp; Mongo', 1),
(190, 'OAuth', 1),
(191, 'Objective C', 1),
(192, 'OCR', 1),
(193, 'Oculus Mobile SDK', 1),
(194, 'Open Cart', 1),
(195, 'OpenBravo', 1),
(196, 'OpenCL', 1),
(197, 'OpenGL', 1),
(198, 'OpenSSL', 1),
(199, 'OpenStack', 1),
(200, 'OpenVMS', 1),
(201, 'Oracle', 1),
(202, 'OSCommerce', 1),
(203, 'Papiamento', 1),
(204, 'Parallax Scrolling', 1),
(205, 'Parallels Automation', 1),
(206, 'Parallels Desktop', 1),
(207, 'Pattern Matching', 1),
(208, 'PayPal API', 1),
(209, 'Paytrace', 1),
(210, 'PencilBlue CMS', 1),
(211, 'Pentaho', 1),
(212, 'Perl', 1),
(213, 'PhoneGap', 1),
(214, 'Photoshop Coding', 1),
(215, 'PHP', 1),
(216, 'PICK Multivalue DB', 1),
(217, 'Pinterest', 1),
(218, 'Plesk', 1),
(219, 'Plugin', 1),
(220, 'PostgreSQL', 1),
(221, 'Powershell', 1),
(222, 'Prestashop', 1),
(223, 'Prolog', 1),
(224, 'Protoshare', 1),
(225, 'Puppet', 1),
(226, 'Python', 1),
(227, 'QlikView', 1),
(228, 'Qualtrics Survey Platform', 1),
(229, 'QuickBase', 1),
(230, 'R Programming Language', 1),
(231, 'React.js', 1),
(232, 'REALbasic', 1),
(233, 'Red Hat', 1),
(234, 'Redis', 1),
(235, 'Redshift', 1),
(236, 'Regular Expressions', 1),
(237, 'RESTful', 1),
(238, 'Rocket Engine', 1),
(239, 'Ruby', 1),
(240, 'Ruby on Rails', 1),
(241, 'Salesforce App Development', 1),
(242, 'Samsung Accessory SDK', 1),
(243, 'SAP', 1),
(244, 'Scala', 1),
(245, 'Scheme', 1),
(246, 'Script Install', 1),
(247, 'Scrum', 1),
(248, 'Scrum Development', 1),
(249, 'Sencha / YahooUI', 1),
(250, 'SEO', 1),
(251, 'Sharepoint', 1),
(252, 'Shell Script', 1),
(253, 'Shopify', 1),
(254, 'Shopping Carts', 1),
(255, 'Siebel', 1),
(256, 'Silverlight', 1),
(257, 'Smarty PHP', 1),
(258, 'Snapchat', 1),
(259, 'Social Engine', 1),
(260, 'Social Networking', 1),
(261, 'Socket IO', 1),
(262, 'Software Architecture', 1),
(263, 'Software Development', 1),
(264, 'Software Testing', 1),
(265, 'Solaris', 1),
(266, 'Spark', 1),
(267, 'Sphinx', 1),
(268, 'SPSS Statistics', 1),
(269, 'SQL', 1),
(270, 'SQLite', 1),
(271, 'Squarespace', 1),
(272, 'Squid Cache', 1),
(273, 'Steam API', 1),
(274, 'Stripe', 1),
(275, 'Subversion', 1),
(276, 'SugarCRM', 1),
(277, 'Swift', 1),
(278, 'Symfony PHP', 1),
(279, 'System Admin', 1),
(280, 'Tableau', 1),
(281, 'TaoBao API', 1),
(282, 'TestStand', 1),
(283, 'Tibco Spotfire', 1),
(284, 'Tizen SDK for Wearables', 1),
(285, 'Tumblr', 1),
(286, 'Twitter', 1),
(287, 'TYPO3', 1),
(288, 'Ubuntu', 1),
(289, 'Umbraco', 1),
(290, 'UML Design', 1),
(291, 'Unity 3D', 1),
(292, 'UNIX', 1),
(293, 'Usability Testing', 1),
(294, 'User Interface / IA', 1),
(295, 'VB.NET', 1),
(296, 'vBulletin', 1),
(297, 'VertexFX', 1),
(298, 'Virtual Worlds', 1),
(299, 'Virtuemart', 1),
(300, 'Virtuozzo', 1),
(301, 'Visual Basic', 1),
(302, 'Visual Basic for Apps', 1),
(303, 'Visual Foxpro', 1),
(304, 'VMware', 1),
(305, 'VoiceXML', 1),
(306, 'VoIP', 1),
(307, 'Volusion', 1),
(308, 'VPS', 1),
(309, 'vTiger', 1),
(310, 'Vuforia', 1),
(311, 'WatchKit', 1),
(312, 'Web Hosting', 1),
(313, 'Web Scraping', 1),
(314, 'Web Security', 1),
(315, 'Web Services', 1),
(316, 'webMethods', 1),
(317, 'Website Management', 1),
(318, 'Website Testing', 1),
(319, 'Weebly', 1),
(320, 'WHMCS', 1),
(321, 'Windows 8', 1),
(322, 'Windows API', 1),
(323, 'Windows Desktop', 1),
(324, 'Windows Server', 1),
(325, 'Wix', 1),
(326, 'Wordpress', 1),
(327, 'WPF', 1),
(328, 'Wufoo', 1),
(329, 'x86/x64 Assembler', 1),
(330, 'XML', 1),
(331, 'XMPP', 1),
(332, 'Xojo', 1),
(333, 'Xoops', 1),
(334, 'XQuery', 1),
(335, 'XSLT', 1),
(336, 'Yarn', 1),
(337, 'Yii', 1),
(338, 'YouTube', 1),
(339, 'Zen Cart', 1),
(340, 'Zend', 1),
(341, 'Zendesk', 1),
(342, 'Zoho', 1),
(343, 'Amazon Fire', 2),
(344, 'Amazon Kindle', 2),
(345, 'Android', 2),
(346, 'Android Honeycomb', 2),
(347, 'Appcelerator Titanium', 2),
(348, 'Apple Watch', 2),
(349, 'Blackberry', 2),
(350, 'Geolocation', 2),
(351, 'iPad', 2),
(352, 'iPhone', 2),
(353, 'J2ME', 2),
(354, 'Metro', 2),
(355, 'Mobile Phone', 2),
(356, 'Nokia', 2),
(357, 'Palm', 2),
(358, 'Samsung', 2),
(359, 'Symbian', 2),
(360, 'WebOS', 2),
(361, 'Windows CE', 2),
(362, 'Windows Mobile', 2),
(363, 'Windows Phone ', 2),
(364, 'Academic Writing', 3),
(365, 'Apple iBooks Author', 3),
(366, 'Article Rewriting', 3),
(367, 'Articles', 3),
(368, 'Blog', 3),
(369, 'Book Writing', 3),
(370, 'Business Writing', 3),
(371, 'Cartography &amp; Maps', 3),
(372, 'Catch Phrases', 3),
(373, 'Communications', 3),
(374, 'Content Writing', 3),
(375, 'Copy Typing', 3),
(376, 'Copywriting', 3),
(377, 'Creative Writing', 3),
(378, 'eBooks', 3),
(379, 'Editing', 3),
(380, 'Fiction', 3),
(381, 'Financial Research', 3),
(382, 'Forum Posting', 3),
(383, 'Ghostwriting', 3),
(384, 'Grant Writing', 3),
(385, 'LaTeX', 3),
(386, 'Medical Writing', 3),
(387, 'Newsletters', 3),
(388, 'Online Writing', 3),
(389, 'PDF', 3),
(390, 'Poetry', 3),
(391, 'Powerpoint', 3),
(392, 'Press Releases', 3),
(393, 'Product Descriptions', 3),
(394, 'Proofreading', 3),
(395, 'Proposal/Bid Writing', 3),
(396, 'Publishing', 3),
(397, 'Report Writing', 3),
(398, 'Research', 3),
(399, 'Resumes', 3),
(400, 'Reviews', 3),
(401, 'Screenwriting', 3),
(402, 'Short Stories', 3),
(403, 'Slogans', 3),
(404, 'Speech Writing', 3),
(405, 'Technical Writing', 3),
(406, 'Translation', 3),
(407, 'Travel Writing', 3),
(408, 'WIKI', 3),
(409, 'Wikipedia', 3),
(410, 'Word Processing ', 3),
(411, '360-degree video', 4),
(412, '3D Animation', 4),
(413, '3D Design', 4),
(414, '3D Modelling', 4),
(415, '3D Rendering', 4),
(416, '3ds Max', 4),
(417, 'ActionScript', 4),
(418, 'Adobe Dreamweaver', 4),
(419, 'Adobe Fireworks', 4),
(420, 'Adobe Flash', 4),
(421, 'Adobe InDesign', 4),
(422, 'Adobe Lightroom', 4),
(423, 'Adobe LiveCycle Designer', 4),
(424, 'Advertisement Design', 4),
(425, 'After Effects', 4),
(426, 'Animation', 4),
(427, 'Apple Compressor', 4),
(428, 'Apple Logic Pro', 4),
(429, 'Apple Motion', 4),
(430, 'Arts &amp; Crafts', 4),
(431, 'Audio Production', 4),
(432, 'Audio Services', 4),
(433, 'Autodesk Inventor', 4),
(434, 'Autodesk Revit', 4),
(435, 'Axure', 4),
(436, 'Banner Design', 4),
(437, 'Blog Design', 4),
(438, 'Bootstrap', 4),
(439, 'Brochure Design', 4),
(440, 'Building Architecture', 4),
(441, 'Business Cards', 4),
(442, 'Capture NX2', 4),
(443, 'Caricature &amp; Cartoons', 4),
(444, 'CGI', 4),
(445, 'Cinema 4D', 4),
(446, 'Commercials', 4),
(447, 'Concept Art', 4),
(448, 'Concept Design', 4),
(449, 'Corporate Identity', 4),
(450, 'Covers &amp; Packaging', 4),
(451, 'Creative Design', 4),
(452, 'CSS', 4),
(453, 'Fashion Design', 4),
(454, 'Fashion Modeling', 4),
(455, 'Final Cut Pro', 4),
(456, 'Finale / Sibelius', 4),
(457, 'Flash 3D', 4),
(458, 'Flex', 4),
(459, 'Flow Charts', 4),
(460, 'Flyer Design', 4),
(461, 'Format &amp; Layout', 4),
(462, 'Furniture Design', 4),
(463, 'GarageBand', 4),
(464, 'Google SketchUp', 4),
(465, 'Graphic Design', 4),
(466, 'Icon Design', 4),
(467, 'Illustration', 4),
(468, 'Illustrator', 4),
(469, 'iMovie', 4),
(470, 'Industrial Design', 4),
(471, 'Infographics', 4),
(472, 'Interior Design', 4),
(473, 'Invitation Design', 4),
(474, 'JDF', 4),
(475, 'Label Design', 4),
(476, 'Landing Pages', 4),
(477, 'Logo Design', 4),
(478, 'Makerbot', 4),
(479, 'Maya', 4),
(480, 'Motion Graphics', 4),
(481, 'Music', 4),
(482, 'Package Design', 4),
(483, 'Photo Editing', 4),
(484, 'Photography', 4),
(485, 'Photoshop', 4),
(486, 'Photoshop Design', 4),
(487, 'Post-Production', 4),
(488, 'Poster Design', 4),
(489, 'Pre-production', 4),
(490, 'Presentations', 4),
(491, 'Prezi', 4),
(492, 'Print', 4),
(493, 'PSD to HTML', 4),
(494, 'PSD2CMS', 4),
(495, 'QuarkXPress', 4),
(496, 'RWD', 4),
(497, 'Shopify Templates', 4),
(498, 'Sound Design', 4),
(499, 'Stationery Design', 4),
(500, 'Sticker Design', 4),
(501, 'T-Shirts', 4),
(502, 'Tattoo Design', 4),
(503, 'Templates', 4),
(504, 'Typography', 4),
(505, 'User Experience Design', 4),
(506, 'Vectorization', 4),
(507, 'Vehicle Signage', 4),
(508, 'Video Broadcasting', 4),
(509, 'Video Editing', 4),
(510, 'Video Production', 4),
(511, 'Video Services', 4),
(512, 'Videography', 4),
(513, 'Visual Arts', 4),
(514, 'Voice Talent', 4),
(515, 'Website Design', 4),
(516, 'Wireframes', 4),
(517, 'Word', 4),
(518, 'Yahoo! Store Design', 4),
(519, 'Zbrush', 4),
(520, 'Article Submission', 5),
(521, 'Bookkeeping', 5),
(522, 'BPO', 5),
(523, 'Call Center', 5),
(524, 'Customer Service', 5),
(525, 'Customer Support', 5),
(526, 'Data Entry', 5),
(527, 'Data Processing', 5),
(528, 'Desktop Support', 5),
(529, 'Email Handling', 5),
(530, 'Excel', 5),
(531, 'General Office', 5),
(532, 'Helpdesk', 5),
(533, 'Investment Research', 5),
(534, 'Microsoft Office', 5),
(535, 'Microsoft Outlook', 5),
(536, 'Order Processing', 5),
(537, 'Phone Support', 5),
(538, 'Procurement', 5),
(539, 'Technical Support', 5),
(540, 'Telephone Handling', 5),
(541, 'Time Management', 5),
(542, 'Transcription', 5),
(543, 'Video Upload', 5),
(544, 'Virtual Assistant', 5),
(545, 'Web Search', 5),
(546, 'Aeronautical Engineering', 6),
(547, 'Aerospace Engineering', 6),
(548, 'Agronomy', 6),
(549, 'Algorithm', 6),
(550, 'Arduino', 6),
(551, 'Astrophysics', 6),
(552, 'AutoCAD', 6),
(553, 'Biology', 6),
(554, 'Biotechnology', 6),
(555, 'Broadcast Engineering', 6),
(556, 'CAD/CAM', 6),
(557, 'CATIA', 6),
(558, 'Chemical Engineering', 6),
(559, 'Circuit Design', 6),
(560, 'Civil Engineering', 6),
(561, 'Clean Technology', 6),
(562, 'Climate Sciences', 6),
(563, 'Construction Monitoring', 6),
(564, 'Cryptography', 6),
(565, 'Data Mining', 6),
(566, 'Data Science', 6),
(567, 'Digital Design', 6),
(568, 'Drones', 6),
(569, 'Electrical Engineering', 6),
(570, 'Electronics', 6),
(571, 'Engineering', 6),
(572, 'Engineering Drawing', 6),
(573, 'Finite Element Analysis', 6),
(574, 'FPGA', 6),
(575, 'Genetic Engineering', 6),
(576, 'Geology', 6),
(577, 'Geospatial', 6),
(578, 'Geotechnical Engineering', 6),
(579, 'GPS', 6),
(580, 'Home Design', 6),
(581, 'Human Sciences', 6),
(582, 'Imaging', 6),
(583, 'Industrial Engineering', 6),
(584, 'Instrumentation', 6),
(585, 'Linear Programming', 6),
(586, 'Machine Learning', 6),
(587, 'Manufacturing Design', 6),
(588, 'Materials Engineering', 6),
(589, 'Mathematics', 6),
(590, 'Matlab &amp; Mathematica', 6),
(591, 'Mechanical Engineering', 6),
(592, 'Mechatronics', 6),
(593, 'Medical', 6),
(594, 'Microbiology', 6),
(595, 'Microcontroller', 6),
(596, 'Microstation', 6),
(597, 'Mining Engineering', 6),
(598, 'Nanotechnology', 6),
(599, 'Natural Language', 6),
(600, 'PCB Layout', 6),
(601, 'Petroleum Engineering', 6),
(602, 'Physics', 6),
(603, 'PLC &amp; SCADA', 6),
(604, 'Product Management', 6),
(605, 'Project Scheduling', 6),
(606, 'Quantum', 6),
(607, 'Remote Sensing', 6),
(608, 'Renewable Energy Design', 6),
(609, 'Robotics', 6),
(610, 'RTOS', 6),
(611, 'Scientific Research', 6),
(612, 'Solidworks', 6),
(613, 'Statistical Analysis', 6),
(614, 'Statistics', 6),
(615, 'Structural Engineering', 6),
(616, 'Surfboard Design', 6),
(617, 'Telecommunications Engineering', 6),
(618, 'Textile Engineering', 6),
(619, 'Verilog / VHDL', 6),
(620, 'Wireless', 6),
(621, 'Wolfram', 6),
(622, '3D Printing', 7),
(623, 'Buyer Sourcing', 7),
(624, 'Logistics &amp; Shipping', 7),
(625, 'Manufacturing', 7),
(626, 'Product Design', 7),
(627, 'Product Sourcing', 7),
(628, 'Supplier Sourcing', 7),
(629, 'Ad Planning &amp; Buying', 8),
(630, 'Advertising', 8),
(631, 'Affiliate Marketing', 8),
(632, 'Airbnb', 8),
(633, 'Branding', 8),
(634, 'Bulk Marketing', 8),
(635, 'Classifieds Posting', 8),
(636, 'Conversion Rate Optimisation', 8),
(637, 'CRM', 8),
(638, 'eBay', 8),
(639, 'Email Marketing', 8),
(640, 'Etsy', 8),
(641, 'Facebook Marketing', 8),
(642, 'Google Adsense', 8),
(643, 'Google Adwords', 8),
(644, 'Internet Marketing', 8),
(645, 'Internet Research', 8),
(646, 'Leads', 8),
(647, 'Mailchimp', 8),
(648, 'Mailwizz', 8),
(649, 'Market Research', 8),
(650, 'Marketing', 8),
(651, 'MLM', 8),
(652, 'Periscope', 8),
(653, 'Sales', 8),
(654, 'Search Engine Marketing', 8),
(655, 'Social Media Marketing', 8),
(656, 'Telemarketing', 8),
(657, 'Viral Marketing', 8),
(658, 'WooCommerce', 8),
(659, 'Accounting', 9),
(660, 'Audit', 9),
(661, 'Autotask', 9),
(662, 'Business Analysis', 9),
(663, 'Business Plans', 9),
(664, 'Compliance', 9),
(665, 'Contracts', 9),
(666, 'Crystal Reports', 9),
(667, 'Employment Law', 9),
(668, 'Entrepreneurship', 9),
(669, 'ERP', 9),
(670, 'Event Planning', 9),
(671, 'Finance', 9),
(672, 'Financial Analysis', 9),
(673, 'Fundraising', 9),
(674, 'Human Resources', 9),
(675, 'Inventory Management', 9),
(676, 'ISO9001', 9),
(677, 'Legal', 9),
(678, 'Legal Research', 9),
(679, 'Legal Writing', 9),
(680, 'Management', 9),
(681, 'MYOB', 9),
(682, 'Nintex Forms', 9),
(683, 'Nintex Workflow', 9),
(684, 'Patents', 9),
(685, 'Payroll', 9),
(686, 'PeopleSoft', 9),
(687, 'Personal Development', 9),
(688, 'Project Management', 9),
(689, 'Property Development', 9),
(690, 'Property Law', 9),
(691, 'Property Management', 9),
(692, 'Public Relations', 9),
(693, 'Quickbooks &amp; Quicken', 9),
(694, 'Recruitment', 9),
(695, 'Risk Management', 9),
(696, 'Salesforce.com', 9),
(697, 'SAS', 9),
(698, 'Startups', 9),
(699, 'Tax', 9),
(700, 'Tax Law', 9),
(701, 'Visa / Immigration', 9),
(702, 'Xero', 9),
(703, 'Afrikaans', 10),
(704, 'Albanian', 10),
(705, 'Arabic', 10),
(706, 'Basque', 10),
(707, 'Bengali', 10),
(708, 'Bosnian', 10),
(709, 'Bulgarian', 10),
(710, 'Catalan', 10),
(711, 'Croatian', 10),
(712, 'Czech', 10),
(713, 'Danish', 10),
(714, 'Dari', 10),
(715, 'Dutch', 10),
(716, 'English (UK)', 10),
(717, 'English (US)', 10),
(718, 'English Grammar', 10),
(719, 'English Spelling', 10),
(720, 'Estonian', 10),
(721, 'Filipino', 10),
(722, 'Finnish', 10),
(723, 'French', 10),
(724, 'French (Canadian)', 10),
(725, 'German', 10),
(726, 'Greek', 10),
(727, 'Hebrew', 10),
(728, 'Hindi', 10),
(729, 'Hungarian', 10),
(730, 'Indonesian', 10),
(731, 'Italian', 10),
(732, 'Japanese', 10),
(733, 'Kannada', 10),
(734, 'Korean', 10),
(735, 'Latvian', 10),
(736, 'Lithuanian', 10),
(737, 'Macedonian', 10),
(738, 'Malay', 10),
(739, 'Malayalam', 10),
(740, 'Maltese', 10),
(741, 'Norwegian', 10),
(742, 'Polish', 10),
(743, 'Portuguese', 10),
(744, 'Portuguese (Brazil)', 10),
(745, 'Punjabi', 10),
(746, 'Romanian', 10),
(747, 'Russian', 10),
(748, 'Serbian', 10),
(749, 'Simplified Chinese (China)', 10),
(750, 'Slovakian', 10),
(751, 'Slovenian', 10),
(752, 'Spanish', 10),
(753, 'Spanish (Spain)', 10),
(754, 'Swedish', 10),
(755, 'Tamil', 10),
(756, 'Telugu', 10),
(757, 'Thai', 10),
(758, 'Traditional Chinese (Hong Kong)', 10),
(759, 'Traditional Chinese (Taiwan)', 10),
(760, 'Turkish', 10),
(761, 'Ukrainian', 10),
(762, 'Urdu', 10),
(763, 'Vietnamese', 10),
(764, 'Welsh', 10),
(765, 'Videography', 11),
(766, 'Photography', 11),
(767, 'Air Conditioning', 11),
(768, 'Antenna Services', 11),
(769, 'Appliance Installation', 11),
(770, 'Appliance Repair', 11),
(771, 'Asbestos Removal', 11),
(772, 'Asphalt', 11),
(773, 'Attic Access Ladders', 11),
(774, 'Awnings', 11),
(775, 'Balustrading', 11),
(776, 'Bamboo Flooring', 11),
(777, 'Bathroom', 11),
(778, 'Brackets', 11),
(779, 'Bricklaying', 11),
(780, 'Building', 11),
(781, 'Building Certifiers', 11),
(782, 'Building Consultants', 11),
(783, 'Building Designer', 11),
(784, 'Building Surveyors', 11),
(785, 'Carpentry', 11),
(786, 'Carpet Repair &amp; Laying', 11),
(787, 'Carports', 11),
(788, 'Carwashing', 11),
(789, 'Ceilings', 11),
(790, 'Cement Bonding Agents', 11),
(791, 'Cleaning Carpet', 11),
(792, 'Cleaning Domestic', 11),
(793, 'Cleaning Upholstery', 11),
(794, 'Clothesline', 11),
(795, 'Coating Materials', 11),
(796, 'Columns', 11),
(797, 'Commercial Cleaning', 11),
(798, 'Computer Help', 11),
(799, 'Concreting', 11),
(800, 'Cooking / Baking', 11),
(801, 'Courses', 11),
(802, 'Damp Proofing', 11),
(803, 'Decking', 11),
(804, 'Decoration', 11),
(805, 'Delivery', 11),
(806, 'Demolition', 11),
(807, 'Disposals', 11),
(808, 'Drafting', 11),
(809, 'Drains', 11),
(810, 'Electricians', 11),
(811, 'Equipment Hire', 11),
(812, 'Event Staffing', 11),
(813, 'Excavation', 11),
(814, 'Extensions &amp; Additions', 11),
(815, 'Fencing', 11),
(816, 'Feng Shui', 11),
(817, 'Financial Planning', 11),
(818, 'Floor Coatings', 11),
(819, 'Flooring', 11),
(820, 'Flyscreens', 11),
(821, 'Food Takeaway', 11),
(822, 'Frames &amp; Trusses', 11),
(823, 'Furniture Assembly', 11),
(824, 'Gardening', 11),
(825, 'Gas Fitting', 11),
(826, 'General Labor', 11),
(827, 'Glass / Mirror &amp; Glazing', 11),
(828, 'Guttering', 11),
(829, 'Hair Styles', 11),
(830, 'Handyman', 11),
(831, 'Heating Systems', 11),
(832, 'Home Automation', 11),
(833, 'Home Organization', 11),
(834, 'Hot Water', 11),
(835, 'House Cleaning', 11),
(836, 'Housework ', 11),
(837, 'IKEA Installation', 11),
(838, 'Inspections', 11),
(839, 'Installation', 11),
(840, 'Interiors', 11),
(841, 'Kitchen', 11),
(842, 'Landscaping', 11),
(843, 'Landscaping &amp; Gardening', 11),
(844, 'Laundry and Ironing', 11),
(845, 'Lawn Mowing', 11),
(846, 'Lighting', 11),
(847, 'Locksmith', 11),
(848, 'Make Up', 11),
(849, 'Millwork', 11),
(850, 'Mortgage Brokering', 11),
(851, 'Moving', 11),
(852, 'Packing &amp; Shipping', 11),
(853, 'Painting', 11),
(854, 'Pavement', 11),
(855, 'Pest Control', 11),
(856, 'Pet Sitting', 11),
(857, 'Pickup', 11),
(858, 'Piping', 11),
(859, 'Plumbing', 11),
(860, 'Removalist', 11),
(861, 'Roofing', 11),
(862, 'Sculpturing', 11),
(863, 'Sewing', 11),
(864, 'Shopping', 11),
(865, 'Tiling', 11),
(866, 'Workshops', 11),
(867, 'Yard Work &amp; Removal', 11),
(868, 'Anything Goes', 12),
(869, 'Automotive', 12),
(870, 'Brain Storming', 12),
(871, 'Business Coaching', 12),
(872, 'Christmas', 12),
(873, 'Cooking &amp; Recipes', 12),
(874, 'Dating', 12),
(875, 'Education &amp; Tutoring', 12),
(876, 'Energy', 12),
(877, 'Financial Markets', 12),
(878, 'Flashmob', 12),
(879, 'Freelance', 12),
(880, 'Genealogy', 12),
(881, 'Health', 12),
(882, 'History', 12),
(883, 'Insurance', 12),
(884, 'Jewellery', 12),
(885, 'Life Coaching', 12),
(886, 'Nutrition', 12),
(887, 'Pattern Making', 12),
(888, 'Psychology', 12),
(889, 'Real Estate', 12),
(890, 'Sports', 12),
(891, 'Test Automation', 12),
(892, 'Testing / QA', 12),
(893, 'Training', 12),
(894, 'Troubleshooting', 12),
(895, 'Valuation &amp; Appraisal', 12),
(896, 'Weddings', 12),
(897, 'XXX', 12);

-- --------------------------------------------------------

--
-- Table structure for table `skill_types`
--

CREATE TABLE IF NOT EXISTS `skill_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_type_name` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `skill_types`
--

INSERT INTO `skill_types` (`id`, `skill_type_name`) VALUES
(1, 'Websites, IT & Software'),
(2, 'Mobile Phones & Computing'),
(3, 'Writing & Content'),
(4, 'Design, Media & Architecture'),
(5, 'Data Entry & Admin'),
(6, 'Engineering & Science'),
(7, 'Product Sourcing & Manufacturing'),
(8, 'Sales & Marketing'),
(9, 'Business, Accounting, Human Resources & Legal'),
(10, 'Translation & Languages'),
(11, 'Local Jobs & Services'),
(12, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_registered` date NOT NULL,
  `user_status` tinyint(1) DEFAULT NULL,
  `user_activation_key` varchar(10) NOT NULL,
  `user_avatar` varchar(1024) DEFAULT NULL,
  `user_android_token` varchar(512) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_activation_key_UNIQUE` (`user_activation_key`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`),
  KEY `fk_cs_users_cs_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_email`, `user_registered`, `user_status`, `user_activation_key`, `user_avatar`, `user_android_token`, `group_id`) VALUES
(1, 'vic', '$2y$10$0CVCuU6tytIlw7va6qujm.a27X3VlmINAacazE/ymNlWaxpwkKK.O', 'vic@enclave.vn', '2016-03-16', 1, '123', 'user1-128x128.jpg', 'fPW96qYHMd4:APA91bG-gfVe0nsIr9drbhGWVYR-UgsHCx2ClsO9z82QkpFds28GIyStYANAa1nqtcX70vg16eqtLFs7USTIfE-7d8q8cskT4jHMaw1_eDXtsPTQ2_Yc-grwEAPkCFfnff8xSSrpB5qP', 2),
(2, 'travis', '$2y$10$0CVCuU6tytIlw7va6qujm.a27X3VlmINAacazE/ymNlWaxpwkKK.O', 'travis@enclave.vn', '2016-03-22', 1, '123123', 'user2-128x128.jpg', 'fPW96qYHMd4:APA91bG-gfVe0nsIr9drbhGWVYR-UgsHCx2ClsO9z82QkpFds28GIyStYANAa1nqtcX70vg16eqtLFs7USTIfE-7d8q8cskT4jHMaw1_eDXtsPTQ2_Yc-grwEAPkCFfnff8xSSrpB5qP', 2),
(4, 'mark', '$2y$10$0CVCuU6tytIlw7va6qujm.a27X3VlmINAacazE/ymNlWaxpwkKK.O', 'mark@enclave.vn', '2016-03-28', 1, '1231', 'user6-128x128.jpg', 'fPW96qYHMd4:APA91bG-gfVe0nsIr9drbhGWVYR-UgsHCx2ClsO9z82QkpFds28GIyStYANAa1nqtcX70vg16eqtLFs7USTIfE-7d8q8cskT4jHMaw1_eDXtsPTQ2_Yc-grwEAPkCFfnff8xSSrpB5qP', 3),
(5, 'kyler', '$2y$10$0CVCuU6tytIlw7va6qujm.a27X3VlmINAacazE/ymNlWaxpwkKK.O', 'kyler@enclave.vn', '2016-03-29', 1, '1313413r1', 'user8-128x128.jpg', 'fPW96qYHMd4:APA91bG-gfVe0nsIr9drbhGWVYR-UgsHCx2ClsO9z82QkpFds28GIyStYANAa1nqtcX70vg16eqtLFs7USTIfE-7d8q8cskT4jHMaw1_eDXtsPTQ2_Yc-grwEAPkCFfnff8xSSrpB5qP', 3),
(6, 'admin', '$2y$10$0CVCuU6tytIlw7va6qujm.a27X3VlmINAacazE/ymNlWaxpwkKK.O', 'admin@careersystem.vn', '2016-04-19', 1, '', 'user4-128x128.jpg', 'fPW96qYHMd4:APA91bG-gfVe0nsIr9drbhGWVYR-UgsHCx2ClsO9z82QkpFds28GIyStYANAa1nqtcX70vg16eqtLFs7USTIfE-7d8q8cskT4jHMaw1_eDXtsPTQ2_Yc-grwEAPkCFfnff8xSSrpB5qP', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `fk_cs_administrators_cs_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `fk_cs_applicants_cs_majors1` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_applicants_cs_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `applicants_follow_posts`
--
ALTER TABLE `applicants_follow_posts`
  ADD CONSTRAINT `fk_cs_applicants_has_cs_posts_cs_applicants1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_applicants_has_cs_posts_cs_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `applicants_has_hobbies`
--
ALTER TABLE `applicants_has_hobbies`
  ADD CONSTRAINT `fk_cs_applicants_has_cs_hobbies_cs_applicants1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_applicants_has_cs_hobbies_cs_hobbies1` FOREIGN KEY (`hobby_id`) REFERENCES `hobbies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `applicants_has_skills`
--
ALTER TABLE `applicants_has_skills`
  ADD CONSTRAINT `fk_cs_applicants_has_cs_skills_cs_applicants1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_applicants_has_cs_skills_cs_skills1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_cs_appointments_cs_hiring_managers1` FOREIGN KEY (`hiring_manager_id`) REFERENCES `hiring_managers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointments_has_applicants`
--
ALTER TABLE `appointments_has_applicants`
  ADD CONSTRAINT `fk_cs_appointments_has_cs_applicants_cs_applicants1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_appointments_has_cs_applicants_cs_appointments1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `curriculum_vitaes`
--
ALTER TABLE `curriculum_vitaes`
  ADD CONSTRAINT `fk_cs_curriculum_vitaes_cs_applicants1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_curriculum_vitaes_cs_curriculum_vitae_templates1` FOREIGN KEY (`curriculum_vitae_template_id`) REFERENCES `curriculum_vitae_templates` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `fk_cs_feedbacks_cs_feedback_types1` FOREIGN KEY (`feedback_type_id`) REFERENCES `feedback_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_feedbacks_cs_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `fk_cs_hiring_managers_has_cs_applicants_cs_applicants1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_hiring_managers_has_cs_applicants_cs_hiring_managers1` FOREIGN KEY (`hiring_manager_id`) REFERENCES `hiring_managers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hiring_managers`
--
ALTER TABLE `hiring_managers`
  ADD CONSTRAINT `fk_cs_hiring_managers_cs_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_cs_logs_cs_administrators1` FOREIGN KEY (`administrator_id`) REFERENCES `administrators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_cs_notifications_cs_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personal_history`
--
ALTER TABLE `personal_history`
  ADD CONSTRAINT `fk_cs_personal_history_cs_applicants1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_personal_history_cs_personal_history_types1` FOREIGN KEY (`personal_history_type_id`) REFERENCES `personal_history_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_cs_posts_cs_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_posts_cs_hiring_managers1` FOREIGN KEY (`hiring_manager_id`) REFERENCES `hiring_managers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts_has_curriculum_vitaes`
--
ALTER TABLE `posts_has_curriculum_vitaes`
  ADD CONSTRAINT `fk_cs_posts_has_cs_curriculum_vitaes_cs_curriculum_vitaes1` FOREIGN KEY (`curriculum_vitae_id`) REFERENCES `curriculum_vitaes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cs_posts_has_cs_curriculum_vitaes_cs_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk_cs_skills_cs_skill_types1` FOREIGN KEY (`skill_type_id`) REFERENCES `skill_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_cs_users_cs_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
