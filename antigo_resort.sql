-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 12:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antigo_resort`
--

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `RATES_NO` int(11) NOT NULL,
  `RATES_NAME` varchar(500) NOT NULL,
  `RATES_UNITNO` varchar(500) NOT NULL,
  `RATES_DESCRIPTION` varchar(10000) NOT NULL,
  `RATES_IMAGE` varchar(1000) NOT NULL,
  `RATES_PRICE` varchar(100) NOT NULL,
  `RATES_BEST` varchar(50) NOT NULL,
  `RATES_DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`RATES_NO`, `RATES_NAME`, `RATES_UNITNO`, `RATES_DESCRIPTION`, `RATES_IMAGE`, `RATES_PRICE`, `RATES_BEST`, `RATES_DELETION`) VALUES
(1, 'PRIVATE POOL', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat risus turpis, id aliquet urna malesuada sed. Sed convallis, est in sagittis venenatis, elit purus laoreet nibh, vel placerat ipsum nibh nec turpis. Nulla sit amet mi lorem. Mauris varius, sapien eu maximus iaculis, augue nibh euismod odio, tempus porttitor tellus tortor auctor justo. Morbi ornare viverra ligula nec interdum. Aenean tincidunt sapien vel diam scelerisque, sed molestie mi pretium. Duis auctor tellus tellus, fermentum ultricies lorem ullamcorper et. Sed quis ligula pellentesque, finibus nulla in, ultrices libero. Sed at fermentum nisi. Duis vitae venenatis urna, vitae convallis turpis.\n\nNam mollis elementum iaculis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut et vulputate enim. Morbi sed massa fringilla turpis finibus vehicula. Nulla sed lectus at magna faucibus sodales. Vestibulum laoreet, augue nec pellentesque suscipit, nisl risus sagittis leo, sit amet finibus sapien dolor non arcu. Phasellus ornare metus erat, nec mollis enim sagittis lobortis. Suspendisse luctus aliquet dolor vitae malesuada. Suspendisse auctor lacinia porta.\n\nProin laoreet, massa et vestibulum accumsan, ex lacus faucibus elit, vitae pellentesque purus mauris et arcu. Duis ultrices imperdiet sapien, iaculis dignissim felis pretium vitae. Aliquam nec quam nec nisi consectetur interdum sed ut mi. Donec convallis tellus at leo molestie, vel rutrum magna dapibus. Nunc id erat ante. Aenean euismod faucibus turpis in suscipit. Aliquam erat volutpat. Vestibulum faucibus quis augue id sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi libero lectus, rhoncus vitae lorem id, porttitor varius ex. Nulla venenatis, tortor sed blandit dignissim, massa augue scelerisque tellus, nec vehicula nisl leo vitae erat. Fusce tincidunt euismod ex, a consequat lorem posuere vel.', 'rates-1.jpg', '6000', '2', 0),
(2, 'FISHING VILLA', '', 'Etiam et nisi non diam maximus imperdiet. Curabitur tempor rutrum justo ut imperdiet. In semper, nibh nec dictum aliquam, purus dui laoreet mauris, eget accumsan neque quam a quam. Sed ultricies dignissim ex, ultrices elementum dui vehicula tempor. Duis sodales urna eget dictum feugiat. Duis ut molestie nunc. Etiam gravida ut odio vitae faucibus. Sed maximus, elit vitae tristique vehicula, ante lorem sollicitudin libero, pulvinar elementum lorem ex ut leo. Morbi bibendum, nisi ac euismod condimentum, nisl tellus hendrerit metus, non condimentum libero justo luctus orci. Sed vel eros auctor, elementum quam nec, consectetur felis.\n\nDuis mattis diam id pellentesque tristique. Morbi consectetur lorem diam, id vehicula tortor dapibus ut. Integer vulputate ullamcorper ultricies. Etiam porttitor vulputate libero, at dictum lorem tristique eget. Mauris porta enim sed consequat ultrices. Sed tristique aliquet maximus. Duis semper metus elit, a malesuada metus elementum quis. Cras in porttitor mauris.\n\nAenean dignissim tortor at facilisis dictum. Ut odio mi, viverra non faucibus a, ultrices sit amet libero. In ornare augue eget maximus tempor. Donec nec ipsum urna. Mauris euismod velit nec rhoncus gravida. Mauris eu odio quis nisi cursus fermentum. Mauris nisi nisi, sodales et iaculis quis, mattis sed quam. Nulla non libero elit.', 'rates-2.jpg', '5000', '1', 0),
(3, 'LARGE COTTAGE', '', 'Suspendisse quis aliquet mi, eu sagittis ante. Phasellus sit amet convallis purus, vitae volutpat purus. Duis interdum, augue et dignissim lobortis, nisl dolor semper mi, vitae gravida nisl diam in tellus. Maecenas ultrices sit amet justo non ornare. Fusce porttitor, leo et laoreet egestas, mi sapien varius nulla, eget aliquet ex orci vel ligula. Quisque a odio ante. Aenean eget massa magna. Sed in sollicitudin quam. Fusce a turpis sit amet ligula accumsan gravida. Sed nec ex sapien.\n\nAenean pulvinar, enim vitae tristique mattis, metus purus feugiat purus, quis vulputate nisl nisi vel lectus. Nam nec sem est. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus hendrerit nulla massa, a vestibulum ante aliquet ut. Sed a elementum leo. Donec non nisi feugiat urna gravida interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut at metus elit. Ut nunc leo, condimentum id risus pretium, feugiat finibus eros. Mauris et dui lacus. Mauris in enim vitae arcu sagittis bibendum.\n\nNulla et eleifend lorem. Vivamus porttitor facilisis felis pharetra ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tempor vel quam eu varius. Etiam ligula massa, dapibus a fermentum nec, convallis ac erat. Sed tempus vel lectus sit amet ullamcorper. Phasellus efficitur turpis et porttitor dapibus. Vestibulum malesuada sem et hendrerit cursus. Aenean fermentum egestas malesuada.', 'rates-3.jpg', '500', '3', 0),
(4, 'SMALL COTTAGE', '', 'Aenean pulvinar, enim vitae tristique mattis, metus purus feugiat purus, quis vulputate nisl nisi vel lectus. Nam nec sem est. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus hendrerit nulla massa, a vestibulum ante aliquet ut. Sed a elementum leo. Donec non nisi feugiat urna gravida interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut at metus elit. Ut nunc leo, condimentum id risus pretium, feugiat finibus eros. Mauris et dui lacus. Mauris in enim vitae arcu sagittis bibendum.', 'rates-4.jpg', '700', '', 0),
(5, 'PAVILION', '', 'Aenean dignissim tortor at facilisis dictum. Ut odio mi, viverra non faucibus a, ultrices sit amet libero. In ornare augue eget maximus tempor. Donec nec ipsum urna. Mauris euismod velit nec rhoncus gravida. Mauris eu odio quis nisi cursus fermentum. Mauris nisi nisi, sodales et iaculis quis, ', 'rates-5.jpg', '8000', '', 0),
(6, 'Testing', '', 'safdasfdasfdasdf', 'rates-6.jpg', '10000', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `RES_NO` int(11) NOT NULL,
  `RES_USERSNO` int(11) NOT NULL,
  `RES_RATESNO` int(11) NOT NULL,
  `RES_DATETO` varchar(100) NOT NULL,
  `RES_TIMESTAMPDATETO` varchar(100) NOT NULL,
  `RES_TIMESLOT` varchar(50) NOT NULL,
  `RES_TOTALPRICE` varchar(100) NOT NULL,
  `RES_PAIDSTATUS` varchar(50) NOT NULL,
  `RES_APPROVEDADMIN` varchar(50) NOT NULL,
  `RES_TIMESTAMPINSERT` varchar(100) NOT NULL,
  `RES_TIMESTAMPUPDATE` varchar(100) NOT NULL,
  `RES_DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`RES_NO`, `RES_USERSNO`, `RES_RATESNO`, `RES_DATETO`, `RES_TIMESTAMPDATETO`, `RES_TIMESLOT`, `RES_TOTALPRICE`, `RES_PAIDSTATUS`, `RES_APPROVEDADMIN`, `RES_TIMESTAMPINSERT`, `RES_TIMESTAMPUPDATE`, `RES_DELETION`) VALUES
(1, 6, 2, 'February 14, 2018', '', 'PM', '500', 'Not yet', 'Not yet', '', '', 0),
(2, 6, 3, 'February 16, 2018', '', 'PM', '4000', 'Not yet', 'Not yet', '', '', 0),
(3, 6, 1, 'February 20, 2018', '', 'PM', '4000', 'Not yet', 'Not yet', '', '', 0),
(4, 3, 3, 'February 27, 2018', '1519660800', '', '8700', 'Not yet', 'Not yet', '1518330900', '', 0),
(5, 2, 6, 'February 12, 2018', '1518364800', '', '3300', 'Not yet', 'Not yet', '1518331080', '', 0),
(6, 4, 6, 'February 12, 2018', '1518364800', '', '462', 'Not yet', 'Not yet', '1518331140', '', 0),
(7, 3, 8, 'February 12, 2018', '1518364800', '', '330', 'Not yet', 'Not yet', '1518344820', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USERS_NO` int(11) NOT NULL,
  `USERS_EMAILADDRESS` varchar(250) NOT NULL,
  `USERS_PASSWORD` varchar(50) NOT NULL,
  `USERS_FIRSTNAME` varchar(100) NOT NULL,
  `USERS_MIDDLEINITIAL` varchar(10) NOT NULL,
  `USERS_LASTNAME` varchar(100) NOT NULL,
  `USERS_CONTACT` varchar(15) NOT NULL,
  `USERS_ADDRESS` varchar(500) NOT NULL,
  `USERS_TYPE` varchar(50) NOT NULL,
  `USERS_VERIFIED` varchar(10) NOT NULL,
  `USERS_VERIFICATION` varchar(50) NOT NULL,
  `USERS_TIMESTAMP_CREATED` varchar(50) NOT NULL,
  `USERS_TIMESTAMP_UPDATED` varchar(50) NOT NULL,
  `USERS_DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USERS_NO`, `USERS_EMAILADDRESS`, `USERS_PASSWORD`, `USERS_FIRSTNAME`, `USERS_MIDDLEINITIAL`, `USERS_LASTNAME`, `USERS_CONTACT`, `USERS_ADDRESS`, `USERS_TYPE`, `USERS_VERIFIED`, `USERS_VERIFICATION`, `USERS_TIMESTAMP_CREATED`, `USERS_TIMESTAMP_UPDATED`, `USERS_DELETION`) VALUES
(1, 'user@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'Ojing', 'R', 'Labongray', '09123456789', '1234 Address St. Valenzuela City', '1', 'Yes', '', '1518225780', '', 0),
(2, 'admin@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'Admin', 'T', 'Developer', '09123456789', '1234 Address St. Valenzuela City', '2', 'Yes', '', '1518225780', '', 0),
(3, 'kajshdf@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'asd', '', 'sdfasdfasdf', '09123456789', 'kjahsdfkjhaskdjfh', '1', 'No', '93997192', '1518225780', '', 0),
(4, 'lkajsdlf@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'lasdf', '', 'lkjasldjf', '09208317004', 'kjahsdfkhaskdjhf', '1', 'No', '32589721', '1518225960', '', 0),
(5, 'dfasdfasdf@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'asdfasdf', '', 'asdfasdfas', '09321321321', 'testing', '1', 'Yes', '', '1518226020', '', 0),
(6, 'frrhmgrgrio@gmail.com', '6b7330782b2feb4924020cc4a57782a9', 'Farrah Mae', '', 'Gregorio', '09484416546', 'ASDflasjdfjasdlfkjalsdjfljasdfljalsdfasdfasdf', '1', 'Yes', '', '1518255480', '', 0),
(7, 'asdfasdfasdf@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'asdfasdf', '', 'asdf', '09213213213', 'asdfasdfasdfasdfasdf', '1', 'Yes', '', '1518270420', '', 0),
(8, 'asdf@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'sdfg', '', 'sdfgsdgf', '09546546546', 'asdfasdfasfasdf', '1', 'Yes', '', '1518344580', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`RATES_NO`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`RES_NO`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USERS_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `RATES_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `RES_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USERS_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
