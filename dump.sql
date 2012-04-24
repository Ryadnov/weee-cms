-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2012 at 05:19 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `weee`
--

-- --------------------------------------------------------

--
-- Table structure for table `weee_blogs`
--

CREATE TABLE IF NOT EXISTS `weee_blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `posts_count` int(11) NOT NULL,
  `is_open` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `url` (`url`),
  KEY `is_open` (`is_open`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `weee_blogs`
--

INSERT INTO `weee_blogs` (`id`, `title`, `url`, `author`, `posts_count`, `is_open`) VALUES
(1, 'Тестовый блог', 'test', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `weee_blogs_can_write`
--

CREATE TABLE IF NOT EXISTS `weee_blogs_can_write` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `blog_id` (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `weee_blogs_can_write`
--

INSERT INTO `weee_blogs_can_write` (`id`, `blog_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `weee_blogs_posts`
--

CREATE TABLE IF NOT EXISTS `weee_blogs_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `text_html` text NOT NULL,
  `text_short` text NOT NULL,
  `date` datetime NOT NULL,
  `blog` int(11) NOT NULL DEFAULT '0',
  `author` int(11) NOT NULL,
  `rating` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `blog` (`blog`),
  KEY `author` (`author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `weee_blogs_posts`
--

INSERT INTO `weee_blogs_posts` (`id`, `title`, `text`, `text_html`, `text_short`, `date`, `blog`, `author`, `rating`) VALUES
(1, 'Тестовая запись', '<p>\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis nisi nec diam pretium in blandit est condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac ligula nec leo vestibulum bibendum sed nec urna. Pellentesque vitae felis id tellus egestas lobortis id ut elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras purus erat, condimentum sit amet rhoncus eget, blandit quis velit. Suspendisse tempor ligula quis massa molestie vehicula. Maecenas semper velit scelerisque orci tincidunt sed aliquet quam molestie. Mauris lorem lacus, varius at dictum non, porttitor at massa. Nunc auctor, leo et placerat dignissim, mi nunc facilisis nulla, at dictum justo ipsum ut elit.\r\n</p>\r\n\r\n<p>\r\n    Aliquam molestie turpis eget turpis tincidunt eu venenatis erat malesuada. Etiam eros sem, luctus a ultricies nec, dapibus sit amet sem. Vivamus accumsan tempor elit nec laoreet. Vestibulum orci diam, congue ut accumsan vitae, imperdiet non massa. Nam quis nisi tortor, vitae posuere odio. Maecenas auctor quam consequat turpis tincidunt eget condimentum turpis commodo. Vestibulum vitae ligula justo. Donec ut purus sit amet mi scelerisque malesuada. Nulla at volutpat ante. Donec et nisl nunc. Aliquam ligula magna, commodo vel faucibus in, suscipit a tellus. Praesent rhoncus tellus orci, ut semper ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec quis nulla elit, non mollis erat. Duis sed dui eu urna varius fringilla. Nunc feugiat lectus quis nibh porta semper.\r\n</p>\r\n<cut>\r\n<p>\r\n    Etiam sagittis, purus a vehicula gravida, metus massa semper turpis, et pulvinar nisi magna a sapien. In volutpat vehicula magna, in aliquam purus tincidunt sit amet. Nullam lobortis nulla vel arcu accumsan ut dapibus tortor sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris aliquam ligula vel ligula interdum interdum. Nam hendrerit augue sit amet eros aliquam id convallis orci tempus. Pellentesque risus lacus, hendrerit in faucibus in, ullamcorper vitae nisl. Ut tincidunt consequat mauris, a ultricies mauris dapibus ut. Integer in justo vitae justo pharetra facilisis eget at odio. Ut a erat nec nunc pharetra fringilla. Nulla facilisi. Quisque sit amet lobortis mi.\r\n</p>\r\n\r\n<p>\r\n    Vestibulum sit amet odio eget neque tempor viverra ac sit amet urna. Aliquam non dolor ut leo facilisis pharetra et non lorem. Aenean venenatis, lacus in sollicitudin pellentesque, erat nunc dictum mauris, vitae sodales augue ante in tellus. Cras tempus luctus facilisis. Donec vitae nibh at risus viverra feugiat nec nec nulla. Sed id nunc ac enim ultricies ultricies ut at lorem. Praesent lectus tellus, vestibulum in luctus sed, placerat in mi. Vestibulum eros lacus, suscipit at eleifend vitae, interdum vitae nunc. Donec nec velit nibh. Quisque at nisl id lorem pellentesque lacinia. Suspendisse risus nisi, aliquet a adipiscing at, eleifend ac ipsum.\r\n</p>\r\n\r\n<p>\r\n    Pellentesque aliquet lorem id nibh convallis molestie. Donec tempus ipsum dolor, at congue mi. Mauris massa turpis, condimentum sed faucibus vel, auctor non velit. Maecenas lobortis convallis nisi eget fermentum. Quisque ac libero ipsum, vel aliquam tortor. Vestibulum justo leo, elementum in sodales at, faucibus at arcu. Vivamus a odio enim, vel scelerisque arcu. Maecenas et faucibus enim. Curabitur facilisis vestibulum egestas. Phasellus adipiscing dictum augue, a placerat ligula fringilla eget. Sed tempus augue quis erat semper non placerat risus rhoncus. Nulla auctor pellentesque malesuada.\r\n</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis nisi nec diam pretium in blandit est condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac ligula nec leo vestibulum bibendum sed nec urna. Pellentesque vitae felis id tellus egestas lobortis id ut elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras purus erat, condimentum sit amet rhoncus eget, blandit quis velit. Suspendisse tempor ligula quis massa molestie vehicula. Maecenas semper velit scelerisque orci tincidunt sed aliquet quam molestie. Mauris lorem lacus, varius at dictum non, porttitor at massa. Nunc auctor, leo et placerat dignissim, mi nunc facilisis nulla, at dictum justo ipsum ut elit.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Aliquam molestie turpis eget turpis tincidunt eu venenatis erat malesuada. Etiam eros sem, luctus a ultricies nec, dapibus sit amet sem. Vivamus accumsan tempor elit nec laoreet. Vestibulum orci diam, congue ut accumsan vitae, imperdiet non massa. Nam quis nisi tortor, vitae posuere odio. Maecenas auctor quam consequat turpis tincidunt eget condimentum turpis commodo. Vestibulum vitae ligula justo. Donec ut purus sit amet mi scelerisque malesuada. Nulla at volutpat ante. Donec et nisl nunc. Aliquam ligula magna, commodo vel faucibus in, suscipit a tellus. Praesent rhoncus tellus orci, ut semper ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec quis nulla elit, non mollis erat. Duis sed dui eu urna varius fringilla. Nunc feugiat lectus quis nibh porta semper.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Etiam sagittis, purus a vehicula gravida, metus massa semper turpis, et pulvinar nisi magna a sapien. In volutpat vehicula magna, in aliquam purus tincidunt sit amet. Nullam lobortis nulla vel arcu accumsan ut dapibus tortor sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris aliquam ligula vel ligula interdum interdum. Nam hendrerit augue sit amet eros aliquam id convallis orci tempus. Pellentesque risus lacus, hendrerit in faucibus in, ullamcorper vitae nisl. Ut tincidunt consequat mauris, a ultricies mauris dapibus ut. Integer in justo vitae justo pharetra facilisis eget at odio. Ut a erat nec nunc pharetra fringilla. Nulla facilisi. Quisque sit amet lobortis mi.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Vestibulum sit amet odio eget neque tempor viverra ac sit amet urna. Aliquam non dolor ut leo facilisis pharetra et non lorem. Aenean venenatis, lacus in sollicitudin pellentesque, erat nunc dictum mauris, vitae sodales augue ante in tellus. Cras tempus luctus facilisis. Donec vitae nibh at risus viverra feugiat nec nec nulla. Sed id nunc ac enim ultricies ultricies ut at lorem. Praesent lectus tellus, vestibulum in luctus sed, placerat in mi. Vestibulum eros lacus, suscipit at eleifend vitae, interdum vitae nunc. Donec nec velit nibh. Quisque at nisl id lorem pellentesque lacinia. Suspendisse risus nisi, aliquet a adipiscing at, eleifend ac ipsum.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Pellentesque aliquet lorem id nibh convallis molestie. Donec tempus ipsum dolor, at congue mi. Mauris massa turpis, condimentum sed faucibus vel, auctor non velit. Maecenas lobortis convallis nisi eget fermentum. Quisque ac libero ipsum, vel aliquam tortor. Vestibulum justo leo, elementum in sodales at, faucibus at arcu. Vivamus a odio enim, vel scelerisque arcu. Maecenas et faucibus enim. Curabitur facilisis vestibulum egestas. Phasellus adipiscing dictum augue, a placerat ligula fringilla eget. Sed tempus augue quis erat semper non placerat risus rhoncus. Nulla auctor pellentesque malesuada.<br/>\r\n</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis nisi nec diam pretium in blandit est condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac ligula nec leo vestibulum bibendum sed nec urna. Pellentesque vitae felis id tellus egestas lobortis id ut elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras purus erat, condimentum sit amet rhoncus eget, blandit quis velit. Suspendisse tempor ligula quis massa molestie vehicula. Maecenas semper velit scelerisque orci tincidunt sed aliquet quam molestie. Mauris lorem lacus, varius at dictum non, porttitor at massa. Nunc auctor, leo et placerat dignissim, mi nunc facilisis nulla, at dictum justo ipsum ut elit.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Aliquam molestie turpis eget turpis tincidunt eu venenatis erat malesuada. Etiam eros sem, luctus a ultricies nec, dapibus sit amet sem. Vivamus accumsan tempor elit nec laoreet. Vestibulum orci diam, congue ut accumsan vitae, imperdiet non massa. Nam quis nisi tortor, vitae posuere odio. Maecenas auctor quam consequat turpis tincidunt eget condimentum turpis commodo. Vestibulum vitae ligula justo. Donec ut purus sit amet mi scelerisque malesuada. Nulla at volutpat ante. Donec et nisl nunc. Aliquam ligula magna, commodo vel faucibus in, suscipit a tellus. Praesent rhoncus tellus orci, ut semper ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec quis nulla elit, non mollis erat. Duis sed dui eu urna varius fringilla. Nunc feugiat lectus quis nibh porta semper.<br/>\r\n</p><br/>\r\n', '2012-04-24 17:17:23', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `weee_pages`
--

CREATE TABLE IF NOT EXISTS `weee_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `weee_pages`
--

INSERT INTO `weee_pages` (`id`, `url`, `title`, `text`) VALUES
(1, 'about', 'О нас', '<p>\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis nisi nec diam pretium in blandit est condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac ligula nec leo vestibulum bibendum sed nec urna. Pellentesque vitae felis id tellus egestas lobortis id ut elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras purus erat, condimentum sit amet rhoncus eget, blandit quis velit. Suspendisse tempor ligula quis massa molestie vehicula. Maecenas semper velit scelerisque orci tincidunt sed aliquet quam molestie. Mauris lorem lacus, varius at dictum non, porttitor at massa. Nunc auctor, leo et placerat dignissim, mi nunc facilisis nulla, at dictum justo ipsum ut elit.\r\n</p>\r\n\r\n<p>\r\n    Aliquam molestie turpis eget turpis tincidunt eu venenatis erat malesuada. Etiam eros sem, luctus a ultricies nec, dapibus sit amet sem. Vivamus accumsan tempor elit nec laoreet. Vestibulum orci diam, congue ut accumsan vitae, imperdiet non massa. Nam quis nisi tortor, vitae posuere odio. Maecenas auctor quam consequat turpis tincidunt eget condimentum turpis commodo. Vestibulum vitae ligula justo. Donec ut purus sit amet mi scelerisque malesuada. Nulla at volutpat ante. Donec et nisl nunc. Aliquam ligula magna, commodo vel faucibus in, suscipit a tellus. Praesent rhoncus tellus orci, ut semper ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec quis nulla elit, non mollis erat. Duis sed dui eu urna varius fringilla. Nunc feugiat lectus quis nibh porta semper.\r\n</p>\r\n\r\n<p>\r\n    Etiam sagittis, purus a vehicula gravida, metus massa semper turpis, et pulvinar nisi magna a sapien. In volutpat vehicula magna, in aliquam purus tincidunt sit amet. Nullam lobortis nulla vel arcu accumsan ut dapibus tortor sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris aliquam ligula vel ligula interdum interdum. Nam hendrerit augue sit amet eros aliquam id convallis orci tempus. Pellentesque risus lacus, hendrerit in faucibus in, ullamcorper vitae nisl. Ut tincidunt consequat mauris, a ultricies mauris dapibus ut. Integer in justo vitae justo pharetra facilisis eget at odio. Ut a erat nec nunc pharetra fringilla. Nulla facilisi. Quisque sit amet lobortis mi.\r\n</p>\r\n\r\n<p>\r\n    Vestibulum sit amet odio eget neque tempor viverra ac sit amet urna. Aliquam non dolor ut leo facilisis pharetra et non lorem. Aenean venenatis, lacus in sollicitudin pellentesque, erat nunc dictum mauris, vitae sodales augue ante in tellus. Cras tempus luctus facilisis. Donec vitae nibh at risus viverra feugiat nec nec nulla. Sed id nunc ac enim ultricies ultricies ut at lorem. Praesent lectus tellus, vestibulum in luctus sed, placerat in mi. Vestibulum eros lacus, suscipit at eleifend vitae, interdum vitae nunc. Donec nec velit nibh. Quisque at nisl id lorem pellentesque lacinia. Suspendisse risus nisi, aliquet a adipiscing at, eleifend ac ipsum.\r\n</p>\r\n\r\n<p>\r\n    Pellentesque aliquet lorem id nibh convallis molestie. Donec tempus ipsum dolor, at congue mi. Mauris massa turpis, condimentum sed faucibus vel, auctor non velit. Maecenas lobortis convallis nisi eget fermentum. Quisque ac libero ipsum, vel aliquam tortor. Vestibulum justo leo, elementum in sodales at, faucibus at arcu. Vivamus a odio enim, vel scelerisque arcu. Maecenas et faucibus enim. Curabitur facilisis vestibulum egestas. Phasellus adipiscing dictum augue, a placerat ligula fringilla eget. Sed tempus augue quis erat semper non placerat risus rhoncus. Nulla auctor pellentesque malesuada.\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `weee_users`
--

CREATE TABLE IF NOT EXISTS `weee_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `weee_users`
--

INSERT INTO `weee_users` (`id`, `name`, `surname`, `photo`, `role`, `password`, `email`) VALUES
(1, '', '', '', 'user', '14e1b600b1fd579f47433b88e8d85291', 'admin@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
