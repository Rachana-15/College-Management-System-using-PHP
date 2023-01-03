-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 06:59 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Rachana', 'rachanasingh4888@gmail.com', 'rachana');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_short_name` varchar(250) NOT NULL,
  `course_full_name` varchar(250) NOT NULL,
  `course_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_short_name`, `course_full_name`, `course_date`) VALUES
(44, 'M.C.A', 'MASTER OF COMPUTER APPLICATION	', '25-04-2019'),
(45, 'M.S.C	', 'MASTER OF SCIENCE	', '25-04-2019'),
(46, 'B.COM	', 'BACHELOR OF COMMERCE	', '25-04-2019'),
(48, 'M.B.A	', 'MASTER OF BUSINESS ADMINISTRATION	', '25-04-2019');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `to_user_id` int(20) NOT NULL,
  `from_user_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `to_user_id`, `from_user_id`) VALUES
(29, 23, 20),
(33, 20, 32),
(37, 0, 21),
(38, 21, 21),
(40, 21, 20),
(45, 30, 20),
(46, 40, 20),
(47, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE `followings` (
  `id` int(11) NOT NULL,
  `from_user_id` varchar(20) NOT NULL,
  `to_user_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `to_user_id` int(20) NOT NULL,
  `from_user_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `from_user_id` varchar(3) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `from_user_id`, `content`, `image`, `timestamp`) VALUES
(10, '1', 'Priyanka chopra', 'priyanka chopra.jpg', '2019-05-08 10:07:52'),
(70, '1', 'This website is developed by Social Codia.', 'socialcodia.png', '2020-04-27 15:45:56'),
(15, '1', 'The results of the best video ever try to get the way this can be its own incomplete website and I will be its own incomplete website and I will be its own incomplete website and I will be its own incomplete website and I will be its own incomplete websit', 'Screenshot_2019-05-0', '2019-05-08 11:42:44'),
(17, '8', 'True Love &hearts;ï¸', '918369709214_status_', '2019-05-08 13:44:13'),
(21, '8', 'Wow , Looking great Umair... ðŸ˜˜ðŸ˜˜ðŸ˜˜', 'IMG_20190513_2235074', '2019-05-13 16:52:56'),
(22, '8', 'Ramzan Mubarak Umair... ðŸ˜˜ðŸ˜˜ðŸ˜˜', 'B612_20190509_075024', '2019-05-13 16:54:01'),
(23, '8', 'Beautiful Pic Of My Husband And Nanand. ðŸ˜˜ðŸ˜˜ðŸ˜˜', 'IMG_20190514_1649315', '2019-05-14 17:40:20'),
(24, '8', 'Mine sona .ðŸ˜˜ðŸ˜˜ðŸ˜˜ðŸ˜˜', 'IMG_20190513_2235074', '2019-05-16 10:20:00'),
(25, '20', 'Umair Farooqui The Boss', '6.jpg', '2019-05-19 00:25:07'),
(35, '20', 'Your genes decide whether you will own a dog or not, pawsible? Although dogs and other pets are common household members across the globe, little is known how they impact our daily life and health.', 'dogsgenes.jpeg', '2019-05-19 18:58:40'),
(36, '20', 'Two killed in Delhi as Gangs of Wasseypur style shootouts turn Dwarka into war zone Two gang members were killed on Sunday as the area near Dwarka Mor metro station in Delhi became another Wasseypur, typical to the one portrayed in the movie Gangs of Wass', 'download__12__0.jpeg', '2019-05-19 18:59:22'),
(37, '20', 'England set new ODI record, thrash Pakistan 4-0 ahead of World Cup 2019 5th ODI: England posted their 4th straight 340-plus total in ODIs and thrashed Pakistan by 54 runs to complete a 4-0 sweep of Pakistan on Sunday in Leeds.', 'eoinmorganengvpak2.j', '2019-05-19 18:59:38'),
(38, '20', 'England set new ODI record, thrash Pakistan 4-0 ahead of World Cup 2019 5th ODI: England posted their 4th straight 340-plus total in ODIs and thrashed Pakistan by 54 runs to complete a 4-0 sweep of Pakistan on Sunday in Leeds.', 'Shilpa-Shetty.jpeg', '2019-05-19 18:59:55'),
(39, '20', 'India Today Axis Poll: Data shows BJP bridged the urban-rural divide India Today-Axis My India exit poll suggests that the BJP and its allies have managed to curtail the gap between the rural and urban areas.', '20190408_130354_0.jp', '2019-05-19 19:00:15'),
(40, '20', 'Saffron whitewash: BJP+ likely to sweep India show exit poll results, win 339-369 seats Exit poll results: India Today- Axis My India Exit Poll predicts BJP-led NDA will win between 339 and 369 seats. The Congress-led UPA will be able to win 77 to 108 sea', 'narendra_modi_reuter', '2019-05-19 19:00:30'),
(42, '20', '#mufazmi', 'BeautyPlus_201906070', '2019-06-06 18:38:51'),
(43, '20', 'Gddhgd', 'BeautyPlus_201906100', '2019-06-11 02:20:38'),
(44, '20', 'Umair Farooqui. Demo Upload', 'BeautyPlus_201908251', '2019-09-09 02:46:45'),
(47, '21', 'demo post from student_id = 21', 'mufazmi.png', '2019-10-10 11:37:40'),
(46, '20', 'The best sir please find the attached file is scanned image in PDF format to the best sir please find the attached file is scanned image in PDF format to the best sir please find the attached file', 'tuxpi.com.1568636544', '2019-09-20 10:15:32'),
(48, '21', 'stack image', 'stock-vector-editabl', '2019-10-10 11:36:33'),
(49, '22', 'icon from id 22 and username is sajid', 'icon.png', '2019-10-11 12:27:56'),
(50, '22', 'icon from id 22 and username is sajid', 'background-1939128_1', '2019-10-11 12:28:10'),
(51, '20', 'test 21', 'mufazmi.png', '2019-10-11 19:21:01'),
(52, '20', 'shilpa shetty.. posting this content using student ai id 20', 'Shilpa-Shetty.jpeg', '2019-10-11 20:31:04'),
(59, '21', 'Firdos Abbasi', 'firdos - Copy.jpg', '2019-10-20 23:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `standerd` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `rollno`, `standerd`, `username`, `name`, `gender`, `contact`, `email`, `password`, `city`, `image`) VALUES
(20, '1', 'BCA', 'mufazmi', 'Umair Farooqui', 'male', '9867503256', 'info.mufazmi@gmail.com', 'farooqui', 'Thane', 'mufazmi.png'),
(21, '2', 'Botanology', 'firdos', 'Firdos Abbasi', 'female', '9867503256', 'firdosfatima.it@gmail.com', 'farooqui', 'Sipah', 'firdos.jpg'),
(22, '6', '3', 'sajid', 'Sajid Farooqui', 'male', '82684000646', 'sajidfarooqui82@gmail.com', 'farooqui', 'Thane', '6.jpg'),
(27, '10', '1', 'ibbu', 'Ibrahim Imadi', 'male', '9920322293', 'info.ibraheemimadi@gmail.com', 'farooqui', 'Mumbra, Thane', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `position` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `contact`, `gender`, `position`, `password`, `address`, `image`) VALUES
(1, 'Umair Farooqui', 'info.mufazmi@gmail.com', '9867503256', 'male', 'Manager', 'farooqui', 'kausa, mumbra, thane', 'mufazmi.png'),
(8, 'Firdos Farooqui', 'firdosfatima.it@gmail.com', '7236901464', 'female', 'Head Teacher', 'abbasi', 'Sipah', 'firdos.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
