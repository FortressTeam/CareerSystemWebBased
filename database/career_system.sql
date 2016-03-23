-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2016 at 06:48 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `career_system`
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

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(512) NOT NULL,
  `applicant_phone_number` varchar(30) NOT NULL,
  `applicant_date_of_birth` date NOT NULL,
  `applicant_place_of_birth` varchar(1024) NOT NULL,
  `applicant_address` varchar(1024) NOT NULL,
  `applicant_country` varchar(512) NOT NULL,
  `applicant_about` longtext NOT NULL,
  `applicant_marital_status` int(11) NOT NULL,
  `applicant_future_goals` longtext NOT NULL,
  `aoolicant_website` varchar(45) DEFAULT NULL,
  `applicant_status` tinyint(1) NOT NULL COMMENT 'Status mean that application is a employee or an umemployee',
  `career_path_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_applicants_cs_career_paths1_idx` (`career_path_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicants_follow_posts`
--

CREATE TABLE IF NOT EXISTS `applicants_follow_posts` (
  `applicant_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`applicant_id`,`post_id`),
  KEY `fk_cs_applicants_has_cs_posts_cs_posts1_idx` (`post_id`),
  KEY `fk_cs_applicants_has_cs_posts_cs_applicants1_idx` (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `apply_status`
--

CREATE TABLE IF NOT EXISTS `apply_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `career_paths`
--

CREATE TABLE IF NOT EXISTS `career_paths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `career_path_name` varchar(512) DEFAULT NULL,
  `career_path_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(2, 'Accounting', 'Description here', 1, 2, 3),
(3, 'Accounting', 'Description here', 1, 4, 5),
(4, 'Advertising', 'Description here,', 1, 6, 7),
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
  `curriculum_vitae_template_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_curriculum_vitaes_cs_applicants1_idx` (`applicant_id`),
  KEY `fk_cs_curriculum_vitaes_cs_curriculum_vitae_templates1_idx` (`curriculum_vitae_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_vitae_templates`
--

CREATE TABLE IF NOT EXISTS `curriculum_vitae_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_vitae_template_name` varchar(512) NOT NULL,
  `curriculum_vitae_template_description` text,
  `curriculum_vitae_template_url` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

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
(11, 'asdasd', 'asdasd', '0000-00-00', NULL, 1, 1),
(12, 'zzz', 'zzzz', '0000-00-00', NULL, 1, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(512) NOT NULL,
  `group_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `group_description`) VALUES
(1, 'Administrator', 'Description here');

-- --------------------------------------------------------

--
-- Table structure for table `hiring_managers`
--

CREATE TABLE IF NOT EXISTS `hiring_managers` (
  `id` int(11) NOT NULL,
  `hiring_manager_name` varchar(512) NOT NULL,
  `hiring_manager_phone_number` varchar(30) DEFAULT NULL,
  `company_name` varchar(1024) DEFAULT NULL,
  `company_address` varchar(1024) DEFAULT NULL,
  `company_size` int(11) DEFAULT NULL,
  `company_about` text,
  `company_logo` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_hiring_managers_cs_users1_idx` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hiring_managers`
--

INSERT INTO `hiring_managers` (`id`, `hiring_manager_name`, `hiring_manager_phone_number`, `company_name`, `company_address`, `company_size`, `company_about`, `company_logo`) VALUES
(1, 'Nguyen The Vien', '0963354060', 'Dell Inc', 'CDE St.', 100, 'Litchfield Performing Arts (LPA) is a charitable organization founded in 1981 whose mission is to educate and inspire young people to be confident, creative, expressive individuals through challenging programs in both jazz music and the performing arts while sharing the passion and magic of the arts with the wider community.', '1.jpg'),
(2, 'Kyler', '01213163478', 'Duckky', 'Da nang', 123, 'Hello World', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE IF NOT EXISTS `hobbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hobby_name` varchar(512) NOT NULL,
  `hobby_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_title` varchar(512) DEFAULT NULL,
  `notification_detail` text,
  `notification_time` datetime DEFAULT NULL,
  `is_seen` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_notifications_cs_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personal_history_types`
--

CREATE TABLE IF NOT EXISTS `personal_history_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_history_type_name` varchar(512) NOT NULL,
  `personal_history_type_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `post_status` tinyint(1) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `hiring_manager_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cs_posts_cs_categories_idx` (`category_id`),
  KEY `fk_cs_posts_cs_hiring_managers1_idx` (`hiring_manager_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_content`, `post_salary`, `post_location`, `post_date`, `post_status`, `category_id`, `hiring_manager_id`) VALUES
(1, 'SUMMER INTERN', '<p style="text-align: justify; text-transform: uppercase; font-size: 19px; margin-top: 50px; margin-bottom: 10px; line-height: 12px;"><span style="font-family: Arial; letter-spacing: 0.1px;">THE POSITION</span><br></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">The Volunteer Coordinator will be responsible for the full management (recruiting, scheduling, training, and overseeing on-site) of 100+ volunteers for the Litchfield Jazz Festival.</span></p><p class="infoTitle" style="text-align: justify; text-transform: uppercase; font-size: 19px; margin-top: 50px; margin-bottom: 10px; letter-spacing: normal; line-height: 12px;"><span style="font-family: Arial;">ESSENTIAL DUTIES AND RESPONSIBILITIES:</span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">•</span><span style="font-family: Arial;">&nbsp;</span><span style="font-family: Arial;">Maintain volunteer applications, schedules, and other paperwork </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Communicate with Regional 6 and Torrington Public School administration, local businesses, colleges, civic organizations, youth groups, and churches to encourage referrals of potential volunteers </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Develop and deliver training programs for volunteers </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Review policies and procedures for issues related to volunteers, prepare and maintain procedural and training materials, and the LPA volunteer database </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Monitor volunteers’ performance and satisfaction and provide ongoing training and support as needed</span></p><p class="infoTitle" style="text-align: justify; text-transform: uppercase; font-size: 19px; margin-top: 50px; margin-bottom: 10px; letter-spacing: normal; line-height: 12px;"><span style="font-family: Arial;">REQUIREMENTS/SKILLS:</span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Have a GPA of 3.0 or above , </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Be a college student or within six months post-graduation; college credit is available. Preferably working on a degree towards communications, marketing, or in a similar field, </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Be customer-service oriented and diplomatic, </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Be able to work independently as well as with teams, </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Be proficient in Microsoft Word and Excel , </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Have excellent verbal and written communication skills, </span></p><p style="text-align: justify; font-size: 15px; line-height: 26px; letter-spacing: normal;"><span style="font-family: Arial;">• Have strong organizational skills, including prioritizing and multi-tasking,</span></p>', 500000001, 'Los Angeles, CA', '2016-03-22', 1, 29, 1),
(2, 'SUMMER DEVELOPMENT INTERN', 'THE POSITION\r\n\r\nThe Combine, a Los Angeles-based film production company, is looking for resourceful and hungry interns to start Summer 2015! If you want to learn producing, development, and production, this is an excellent opportunity to contribute to a new, quickly growing company.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nResponsibilities include, but are not limited to, answering phones as needed, script reading and coverage, project research, assisting busy executives and assistant with crafting presentation material, and other administrative tasks.\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nCandidates should be independent, hard working, detail-oriented, level headed, and personable. Candidates also would ideally have 1-2 years experience with script coverage, good storytelling instincts, and a passion for films with authenticity. Valid drivers'' license and working car required. A working knowledge of Mac’s and graphic design/editing software such as Final Draft, Photoshop, Illustrator, Keynote, Adobe Acrobat and Final Cut a plus.', 500000000, 'Los Angeles, CA', '2016-03-10', 1, 11, 1),
(3, 'GRAPHIC DESIGNER', 'THE POSITION\r\n\r\nRapchat, a 500 Startups company, is an app that lets you create, share, and discover freestyle raps. We''re currently seeking a baller-ass Graphic Design intern to assist our creative team in developing/creating assets for Mobile, Web, Social, Email and more! If you can drop bars or spit a quick 16 that be awesome... but not necessarily required.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nCreating/crafting content across all Social Media platforms. Assisting with Email graphics and designs. Design one-sheeters for potential industry partners Assist with Web design, branding and App screen mock ups.\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nAdvanced Photoshop, Freestyle skills, Mailchimp HTML design, Social Media', 400000000, 'Mountain View, CA', '2016-03-18', 1, 21, 1),
(4, 'LIVE CONCERT REVIEWER', 'THE POSITION\r\n\r\nLooking for a new opportunity to broaden your horizons and strengthen your writing skills? Are you passionate about experiencing live music? Combine the two and become a concert reviewer! We are an eclectic daily music magazine devoted to providing a well-rounded selection of content. We hold a professional and enthusiastic standard for the information we publish. An essential part of what makes the magazine tick is live coverage of musical performances. We are currently adding to our team of concert reviewers in the southern California area including Los Angeles, Orange County, San Diego and surrounding cities. If you are passionate about writing and music, this is the job for you. As a concert reviewer, you will be able to attend some of the most promising live music shows passing through California all while building your journalism portfolio. Aspiring photographers are also encouraged to apply because visual reports enrich our live coverage. If you are interested in becoming a part of the concert reviewer team, please email a resume, a small personal description, and any writing samples, and we''ll go from there.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nWriting experience/samples Passion and interest for music Eagerness to participate Diligence with responses to emails, etc. ability to attend shows 1-2x/week Ability to get oneself to shows\r\n\r\nREQUIREMENTS/SKILLS:\r\n\r\nWriting experience , Positive attitude , Ability to process and create articles according to deadlines , Post info online , Professional demeanor , Team player', 900000000, 'Los Angeles, CA', '2016-03-17', 1, 28, 1),
(5, 'FILM INTERN - LA', 'THE POSITION\r\n\r\nJump-start your pro-freedom film career in the Moving Picture Institute’s paid internship program. Gain support, training, and a like-minded network in this competitive program that is designed to foster your professional growth and give you a foot in the door in the film industry. We have positions in New York and Los Angeles. MPI is a 501(c)(3) nonprofit organization that promotes freedom through film, comedy, and online videos. MPI places interns on MPI film sets, in production companies, and in major studios like NBC Universal, Fox, and Lionsgate. Our interns get hands-on experience in film while building professional relationships and establishing themselves within the industry. MPI is currently filling spots for summer 2016. Interns should be committed to advancing a free society and passionate about telling stories about freedom. We look for independent, dynamic, creative, energetic, and self-motivated college juniors and seniors, graduate students, or recent graduates who possess excellent communication abilities and who have a demonstrable interest in film production. Judgment, focus, humility, organization, an ability to work under pressure, and a sense of humor are also important. Internships are available for spring, summer, and fall, can be part-time or full-time, and are an average duration of 12-15 weeks.\r\n\r\nESSENTIAL DUTIES AND RESPONSIBILITIES:\r\n\r\nInterns'' responsibilities vary depending upon their hosts'' job descriptions. Typical tasks can include, but are not limited to, script coverage (reading, analyzing, and performing written evaluations of screenplays), production assistance, video editing, research, social media and outreach assistance, and administrative duties. MPI responsibilities may include attending and actively participating in educational masterclasses (in-person and online) as well as networking gatherings, and submitting written evaluations of your internship experience to MPI.', 560000000, 'Los Angeles, CA', '2016-03-10', 1, 1, 1),
(6, 'Post title6', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 1, 2, 1),
(7, 'Post title7', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(8, 'Post title8', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(9, 'Post title9', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(10, 'Post title10', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(11, 'Post title11', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(12, 'Post title12', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(13, 'Post title13', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(14, 'Post title14', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(15, 'Post title15', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(16, 'Post title16', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(17, 'Post title17', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(18, 'Post title18', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(19, 'Post title19', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(20, 'Post title20', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(21, 'Post title21', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(22, 'Post title22', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(23, 'Post title23', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(24, 'Post title24', 'Returns a URL pointing to a combination of controller and action. If $url is empty, it returns the REQUEST\\_URI, otherwise it generates the URL for the controller and action combo. If full is true, the full base URL will be prepended to the result:', 5000000, 'Danana, VN', '2016-03-25', 0, 2, 1),
(25, 'Test Post', 'a', 500000000, 'Los Angeles, CA', '2189-12-03', 1, 29, 1),
(26, 'Testtttttttttttttttttttttttttttttt', 'a', 2147483647, 'Los Angeles, CA', '2180-12-12', 1, 29, 1),
(27, 'gssgsg', 'qgqegqeg qeg qe gq geqe g', 215434, 'adgadgadg', '2190-12-03', 1, 6, 1),
(29, 'Test Post', 'a', 500000000, 'Los Angeles, CA', '2170-05-02', 1, 29, 1),
(30, 'Test Post', 'a', 500000000, 'Los Angeles, CA', '2016-03-23', 1, 29, 1),
(31, 'Test Post', 'a', 500000000, 'Los Angeles, CA', '2009-07-09', 1, 29, 1),
(34, 'grwgrwgh', 'grgw rg wrg wr gwr g', 123123, 'Da nang', '2016-03-23', 1, 2, 1),
(35, 'dagadgad', 'gwrgwr  rwgw rg wrg wr', 135135, 'gwgwr', '2016-03-23', 1, 1, 1),
(36, 'gg sggagda', ' wrg wrg wrg wrgw', 135135135, 'wgwrgwr g', '2016-03-23', 1, 1, 1),
(37, 'gwrgrwg ', 'wr gwr g wrg rw', 3151515, ' wrgwrg wrg', '2016-03-23', 1, 1, 1),
(38, 'eegwgwrg', 'rwgwr wr gwr gwrgw g', NULL, 'rwgwrgrwgrw', '2016-03-23', 1, 1, 1),
(39, 'dgdada', 'adgadgadg', 2147483647, 'adgadg', '2016-03-23', 1, 1, 1),
(40, 'dgdada', 'adgadgadg', 2147483647, 'adgadg', '2016-03-23', 1, 1, 1),
(41, 'dgdada', 'adgadgadg', 11111111, 'adgadg', '2016-03-23', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts_has_curriculum_vitaes`
--

CREATE TABLE IF NOT EXISTS `posts_has_curriculum_vitaes` (
  `post_id` int(11) NOT NULL,
  `curriculum_vitae_id` int(11) NOT NULL,
  `apply_status_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`curriculum_vitae_id`),
  KEY `fk_cs_posts_has_cs_curriculum_vitaes_cs_curriculum_vitaes1_idx` (`curriculum_vitae_id`),
  KEY `fk_cs_posts_has_cs_curriculum_vitaes_cs_posts1_idx` (`post_id`),
  KEY `fk_posts_has_curriculum_vitaes_apply_status1_idx` (`apply_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(512) NOT NULL,
  `skill_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_activation_key_UNIQUE` (`user_activation_key`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`),
  KEY `fk_cs_users_cs_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_email`, `user_registered`, `user_status`, `user_activation_key`, `user_avatar`, `group_id`) VALUES
(1, 'noname', '123456798v', 'thevien@outlook.com', '2016-03-16', 1, '123', 'bca', 1),
(2, 'kyler', '123123', 'kyler@gmail.com', '2016-03-22', 1, '123123', 'bca', 1);

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
  ADD CONSTRAINT `fk_cs_applicants_cs_career_paths1` FOREIGN KEY (`career_path_id`) REFERENCES `career_paths` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_cs_posts_has_cs_curriculum_vitaes_cs_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_posts_has_curriculum_vitaes_apply_status1` FOREIGN KEY (`apply_status_id`) REFERENCES `apply_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_cs_users_cs_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
