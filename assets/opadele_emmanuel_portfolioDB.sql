-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2024 at 04:43 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: portfolio
--

-- --------------------------------------------------------

--
-- Table structure for table contacts
--

CREATE TABLE IF NOT EXISTS contacts (
  contact_id int UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name varchar(500) NOT NULL,
  last_name varchar(500) NOT NULL,
  email varchar(500) NOT NULL,
  comments varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (contact_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table contacts
--

INSERT INTO contacts (contact_id, first_name, last_name, email, comments) VALUES
(1, 'aaaa', 'aaaaa', 'aaaa', 'aaaaa'),
(2, '', '', 'adad@gmail.com', 'dadda'),
(3, 'sf', 'sfsf', 'sfsf', 'fsf'),
(4, 'agag', 'gsgs', 'fa@gamil', 'dsa'),
(5, '.user1.', '.test1.', '.user1test1@gmail.com.', '.User1 and test1.'),
(6, '.user1.', '.test1.', '.user1test1@gmail.com.', '.User1 and test1.'),
(7, '.TroyFirst.', '.TroyLast.', '.Troy@gmail.com.', '.Troy says Hello.'),
(8, '.fromworks.', '.workspage.', '.works1page@gmail.com.', '.Testing the for from the works page.'),
(9, 'redirect', 'directing', 'direxct@gmail.com', 'Testing the redirection and submission'),
(10, '.free.', '.guest.', '.guest@gmail.com.', '.Trying again...submiiting.'),
(11, '.dynamicIndex.', '.Setup.', '.test@gmail.com.', '.still yet to see the page direct to the submit page.'),
(12, 'dynamicIndex', 'Setup', 'test@gmail.com', 'still yet to see the page direct to the submit page'),
(13, 'Injection', 'Prevention', 'test@yahoo.com', 'Prevent injection'),
(14, 'ffff', 'ffwwwwf', 'datdata@gmail.com', 'gamers are cool'),
(15, 'data', 'bada', 'badadata@gmail.com', 'comment here--prevent injection by binding parameter'),
(16, 'fadaf', 'dada', 'cada@hotmail.com', 'comment here--removing the periods appearing in data'),
(17, 'insendmail', 'sendmailpage', 'sendmail@gmail.com', 'comment here using the form from the sendmail.php page'),
(18, 'insendmail', 'sendmailpage', 'sendmail@gmail.com', 'comment here using the form from the sendmail.php page'),
(19, 'gracie', 'Fred', 'g_fred@clipmail.com', 'actuall page testing'),
(20, 'ssssscsc', 'dsac', 'yes@gmail.com', 'comment hereacacacscac'),
(21, 'aazazaz', 'zazazaza', 'azaz@gotham.com', 'comment hereaaaasas'),
(22, 'thzgr', 'faada', 'adadda@cow.com', 'ddaadadaddaadada'),
(23, 'acas', 'acccac', 'work@great.com', 'working page testing form'),
(24, 'gates', 'tates', 'gtates@gmail.com', 'graopp'),
(25, 'rita', 'frey', 'rit54@gmail.com', 'including a databases connection');

-- --------------------------------------------------------

--
-- Table structure for table multimedia
--

CREATE TABLE IF NOT EXISTS multimedia (
  media_id int UNSIGNED NOT NULL AUTO_INCREMENT,
  project_id int UNSIGNED NOT NULL,
  media_name varchar(500) NOT NULL,
  PRIMARY KEY (media_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table multimedia
--

INSERT INTO multimedia (media_id, project_id, media_name) VALUES
(2, 1, 'zima1.png'),
(3, 1, 'zima2.png'),
(4, 1, 'zima3.png'),
(6, 2, 'trivox1.png'),
(7, 2, 'trivox2.png'),
(10, 2, 'trivox3.png'),
(12, 3, 'kavorka1.png'),
(13, 3, 'kavorka2.png'),
(14, 3, 'kavorka3.png');

-- --------------------------------------------------------

--
-- Table structure for table projects
--

CREATE TABLE IF NOT EXISTS projects (
  project_id int UNSIGNED NOT NULL AUTO_INCREMENT,
  project_title varchar(350) NOT NULL,
  main_images varchar(500) NOT NULL,
  client_name varchar(350) NOT NULL,
  collaboration varchar(3000) NOT NULL,
  problem_info varchar(3000) NOT NULL,
  solution_info varchar(3000) NOT NULL,
  project_info_text varchar(3000) NOT NULL,
  year int UNSIGNED NOT NULL,
  month varchar(50) NOT NULL,
  PRIMARY KEY (project_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table projects
--

INSERT INTO projects (project_id, project_title, main_images, client_name, collaboration, problem_info, solution_info, project_info_text, year, month) VALUES
(1, 'Zima Rebrand', 'zima-main-logo.png', 'College Deliverable', 'All collegues', 'Zima was facing declining sales and brand recognition, particularly with younger consumers. The brand’s outdated design and marketing strategy failed to connect with its target audience in a market saturated with newer, trendier beverages.', 'The Zima Rebrand resulted in a complete overhaul of the product’s visual identity and marketing approach. The sleek new packaging, modern logo, and vibrant color palette reinvigorated the brand, making it more appealing to a younger audience.', 'The Zima Rebrand project was a creative exercise to refresh and modernize the identity of Zima, a beer energy drink. The objective was to create a dynamic and appealing brand that would stand out in the competitive beverage market and boost sales.', 2023, 'August '),
(2, 'Trivox', 'trivox-main-logo.png', 'Trivox Technologies', 'All teams and colleagues', 'In a market saturated with countless earbuds and audio products, TRIVOX needed to differentiate itself by offering a unique blend of high-performance audio, innovative technology, and a bold, distinctive design.', 'Through a combination of cutting-edge product design, bold branding, and innovative technology, TRIVOX successfully establishes itself as a standout brand in the tech space. The clean, geometric design of the earbuds, combined with premium features like wireless charging, noise cancellation, and superior sound quality, sets TRIVOX apart from competitors.', 'TRIVOX is a new brand in the tech industry focused on delivering innovative earbuds that blend cutting-edge technology with sleek, modern design. The goal of the brand is to provide consumers with high-quality audio products that offer superior sound, advanced functionality, and a design aesthetic that stands out in the crowded tech market.', 2024, 'October '),
(3, 'Kavorka', 'kavorka-main-logo.png', 'Kavorka Cosmetics', 'Some more teams', 'The cosmetics industry is saturated with numerous brands, each vying for attention through unique aesthetics and messaging. Kavorka needed a clear, bold identity to differentiate itself, attract its target market, and position itself as a leader in empowering individuals through beauty products.', 'By combining sleek design, empowering language, and a modern aesthetic, we successfully created a brand identity that aligns with Kavorka’s vision. The resulting brand is bold, confident, and visually striking, allowing Kavorka to stand out in the competitive beauty market while staying true to its mission of empowering individuals.', 'Kavorka, a new cosmetics brand, sought a strong, modern identity that would resonate with a bold and confident audience. The goal was to create a brand that fused innovation, style, and empowerment while standing out in the competitive beauty industry.', 2024, 'November ');

-- --------------------------------------------------------

--
-- Table structure for table projects_techs
--

CREATE TABLE IF NOT EXISTS projects_techs (
  project_id int UNSIGNED NOT NULL,
  tech_id int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table projects_techs
--

INSERT INTO projects_techs (project_id, tech_id) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 8),
(3, 5),
(3, 6),
(3, 9),
(2, 7),
(1, 7),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table technologies
--

CREATE TABLE IF NOT EXISTS technologies (
  tech_id int UNSIGNED NOT NULL AUTO_INCREMENT,
  tech_name varchar(3000) NOT NULL,
  PRIMARY KEY (tech_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table technologies
--

INSERT INTO technologies (tech_id, tech_name) VALUES
(1, 'Html'),
(2, 'Css'),
(3, 'Sass'),
(4, 'JavaScript '),
(5, 'Photoshop'),
(6, 'Illustrator'),
(7, 'Cinema 4D'),
(8, 'Github'),
(9, 'Adobe XD');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
