-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2015 at 02:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbemployee10`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `bookins`(IN `bid` INT, IN `tit` VARCHAR(50), IN `aut` VARCHAR(50), IN `pub ` VARCHAR(50), IN `prc` INT, IN `img` VARCHAR(50))
    NO SQL
begin
insert into tbbook values(bid,tit,aut,pub,prc,img);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `bookupd`(IN `bid` INT, IN `tit` VARCHAR(50), IN `aut` VARCHAR(50), IN `pub` VARCHAR(50), IN `prc` INT, IN `img` VARCHAR(50))
    NO SQL
begin
update tbbook set booktit=tit,bookaut=aut,bookpub=pub,bookprc=prc,bookimg=img where bookid=bid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delemp`(IN `eno` INT)
    NO SQL
begin
delete from tbemp where empno=eno;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispemp`()
    NO SQL
begin
select * from tbemp;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findemp`(IN `eno` INT)
    NO SQL
begin
select * from tbemp where empno=eno;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insdep`(IN `dno` INT, IN `dname` VARCHAR(50))
    NO SQL
begin
insert into tbdep values(dno,dname);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insemp`(IN `eno` INT, IN `en` VARCHAR(50), IN `ed` VARCHAR(50), IN `es` INT)
    NO SQL
begin
insert into tbemp values(eno,en,ed,es);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logincheck`(IN `u` VARCHAR(50), IN `p` VARCHAR(50), OUT `ret` INT)
    NO SQL
begin
declare ap varchar(50);
select upass from tbuser where uname=u into @ap;
if @ap is null then
set ret=-1;
else
if @ap=p then
set ret=1;
else
set ret=-2;
end if;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updemp`(IN `eno` INT, IN `en` VARCHAR(50), IN `ed` VARCHAR(50), IN `es` INT)
    NO SQL
begin
update tbemp set ename=en,eadd=ed,esal=es where empno=eno;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbbook`
--

CREATE TABLE IF NOT EXISTS `tbbook` (
  `bookid` int(11) NOT NULL,
  `booktit` varchar(50) NOT NULL,
  `bookaut` varchar(50) NOT NULL,
  `bookpub` varchar(50) NOT NULL,
  `bookprc` int(11) NOT NULL,
  `bookimg` varchar(50) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbook`
--

INSERT INTO `tbbook` (`bookid`, `booktit`, `bookaut`, `bookpub`, `bookprc`, `bookimg`) VALUES
(101, 'PHP', 'vhg', 'hghg', 757, 'a1.jpg'),
(102, 'VB.NET', 'Jude Adams', 'Wrox', 230, 'a2.jpg'),
(103, 'Oracle PL/SQL', 'Micheal M.', 'Oracle', 1980, 'a3.jpg'),
(104, 'HTML5', 'Ruben D.', 'Penguin', 450, 'a4.jpg'),
(105, 'PlSQl', 'akaj', 'kjas', 178, 'jsjs'),
(106, 'C++', 'jahas', 'ahah', 7272, 'jsks'),
(107, 'HTML Dynamic', 'sjhsd', 'yuqyu', 262, 'uaua'),
(108, 'Dot Net', 'ajas', 'usks', 200, 'lalk'),
(109, 'qeqr', 'pqpq', 'ljsk', 7272, 'mcns'),
(110, 'shah', 'nsa nmd', 'mnsdabn', 7812, 'nmasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbcnt`
--

CREATE TABLE IF NOT EXISTS `tbcnt` (
  `cntcod` int(11) NOT NULL,
  `cntnam` varchar(50) NOT NULL,
  PRIMARY KEY (`cntcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcnt`
--

INSERT INTO `tbcnt` (`cntcod`, `cntnam`) VALUES
(1, 'India'),
(2, 'US'),
(3, 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `tbcty`
--

CREATE TABLE IF NOT EXISTS `tbcty` (
  `ctycod` int(11) NOT NULL,
  `ctynam` varchar(50) NOT NULL,
  `ctystacod` int(11) NOT NULL,
  PRIMARY KEY (`ctycod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcty`
--

INSERT INTO `tbcty` (`ctycod`, `ctynam`, `ctystacod`) VALUES
(1, 'Ludhiana', 1),
(2, 'Jaipur', 2),
(3, 'San Francisco', 3),
(4, 'Albany', 4),
(5, 'London', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbdep`
--

CREATE TABLE IF NOT EXISTS `tbdep` (
  `dno` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  PRIMARY KEY (`dno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdep`
--

INSERT INTO `tbdep` (`dno`, `dname`) VALUES
(10, 'Accounts'),
(20, 'Sales'),
(30, 'Mkt'),
(40, 'SEO');

-- --------------------------------------------------------

--
-- Table structure for table `tbdsg`
--

CREATE TABLE IF NOT EXISTS `tbdsg` (
  `dsgcod` int(11) NOT NULL,
  `dsgnam` varchar(50) NOT NULL,
  PRIMARY KEY (`dsgcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdsg`
--

INSERT INTO `tbdsg` (`dsgcod`, `dsgnam`) VALUES
(101, 'PM'),
(102, 'TL'),
(103, 'Prog');

-- --------------------------------------------------------

--
-- Table structure for table `tbeml`
--

CREATE TABLE IF NOT EXISTS `tbeml` (
  `emailcode` int(11) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(50) NOT NULL,
  PRIMARY KEY (`emailcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbeml`
--

INSERT INTO `tbeml` (`emailcode`, `emailid`) VALUES
(1, 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbemp`
--

CREATE TABLE IF NOT EXISTS `tbemp` (
  `empno` int(11) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `eadd` varchar(100) NOT NULL,
  `esal` int(11) NOT NULL,
  PRIMARY KEY (`empno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbemp`
--

INSERT INTO `tbemp` (`empno`, `ename`, `eadd`, `esal`) VALUES
(101, 'Hrishikesh Sharma', 'panchkula', 56000),
(102, 'Mohit Walia', '#718', 70000),
(103, 'Rajat Sharma', '345', 12000),
(105, 'Shubham', 'jkjkj', 18298),
(106, 'amit', 'chandigarh', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tbemployee`
--

CREATE TABLE IF NOT EXISTS `tbemployee` (
  `empno` int(11) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `eadd` varchar(50) NOT NULL,
  `esal` int(11) NOT NULL,
  `edno` int(11) NOT NULL,
  `edsgcod` int(11) NOT NULL,
  PRIMARY KEY (`empno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbemployee`
--

INSERT INTO `tbemployee` (`empno`, `ename`, `eadd`, `esal`, `edno`, `edsgcod`) VALUES
(1, 'Amit', 'Chandigarh', 12000, 10, 101),
(2, 'Vikas', 'Ludhiana', 21000, 20, 101),
(3, 'Daman', 'Panchkula', 45000, 30, 101),
(4, 'Raman', 'Mohali', 34000, 10, 102);

-- --------------------------------------------------------

--
-- Table structure for table `tbord`
--

CREATE TABLE IF NOT EXISTS `tbord` (
  `ordcod` int(11) NOT NULL AUTO_INCREMENT,
  `orddat` date NOT NULL,
  PRIMARY KEY (`ordcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbord`
--

INSERT INTO `tbord` (`ordcod`, `orddat`) VALUES
(1, '2015-03-12'),
(2, '2015-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `tborddet`
--

CREATE TABLE IF NOT EXISTS `tborddet` (
  `orddetordcod` int(11) NOT NULL,
  `orddetbookid` int(11) NOT NULL,
  `orddetbookqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbrat`
--

CREATE TABLE IF NOT EXISTS `tbrat` (
  `ratcod` int(11) NOT NULL AUTO_INCREMENT,
  `ratnam` varchar(50) NOT NULL,
  `ratval` int(11) NOT NULL,
  PRIMARY KEY (`ratcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbreg`
--

CREATE TABLE IF NOT EXISTS `tbreg` (
  `regcod` int(11) NOT NULL,
  `regnam` varchar(50) NOT NULL,
  `regadd` varchar(50) NOT NULL,
  `regeml` varchar(50) NOT NULL,
  `regphn` varchar(50) NOT NULL,
  `regctycod` int(11) NOT NULL,
  PRIMARY KEY (`regcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbreg`
--

INSERT INTO `tbreg` (`regcod`, `regnam`, `regadd`, `regeml`, `regphn`, `regctycod`) VALUES
(1, 'Ravinder', '#5161', 'abc@abc.com', '918128301', 1),
(2, 'Rishi', '#829', 'abc1@xyz.com', '981283291', 3),
(3, 'Mohit', '#718', 'abc@xyz.com', '9282191', 4),
(4, 'Rajat', '#7282', 'edf@abc.com', '1738302', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbreg1`
--

CREATE TABLE IF NOT EXISTS `tbreg1` (
  `regcod` int(11) NOT NULL AUTO_INCREMENT,
  `regnam` varchar(50) NOT NULL,
  `regadd` varchar(50) NOT NULL,
  PRIMARY KEY (`regcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbsta`
--

CREATE TABLE IF NOT EXISTS `tbsta` (
  `stacod` int(11) NOT NULL,
  `stanam` varchar(50) NOT NULL,
  `stacntcod` int(11) NOT NULL,
  PRIMARY KEY (`stacod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsta`
--

INSERT INTO `tbsta` (`stacod`, `stanam`, `stacntcod`) VALUES
(1, 'Punjab', 1),
(2, 'Rajasthan', 1),
(3, 'California', 2),
(4, 'New York', 2),
(5, 'England', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `uname` varchar(50) NOT NULL,
  `upass` varchar(50) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`uname`, `upass`) VALUES
('admin', 'ad'),
('admin1', 'ad1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
