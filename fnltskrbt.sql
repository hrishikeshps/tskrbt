-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2015 at 01:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fnltskrbt`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delapp`(IN `acod` INT)
    NO SQL
begin
delete from tbapp  where appcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delasg`(IN `acod` INT)
    NO SQL
begin
delete from tbasg  where asgcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delcat`(IN `ccod` INT)
    NO SQL
begin
delete from tbcat where catcod=ccod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deldis`(IN `dcod` INT)
    NO SQL
begin
delete from tbdis where discod=dcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delmsg`(IN `mcod` INT)
    NO SQL
begin
delete from tbmsg  where msgcod=mcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delprf`(IN `pcod` INT)
    NO SQL
begin
delete from tbprf  where prfcod=pcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delreg`(IN `rcod` INT)
    NO SQL
begin
delete from tbreg  where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delrev`(IN `rcod` INT)
    NO SQL
begin
delete from  tbrev where revcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deltsk`(IN `tcod` INT)
    NO SQL
begin
delete from  tbtsk  where tskcod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspactapp`(IN `rcod` INT)
    NO SQL
begin
select tsktit,catnam,tskstrdat,appdat,appcod from
tbtsk,tbapp,tbcat where tskcod=apptskcod and
tskcatcod=catcod and appregcod=rcod and tskcod
not in(select asgtskcod from tbasg);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspapp`(IN `tcod` INT)
    NO SQL
begin
select appcod,appdat,appdsc,appregcod,regnam,
regpic,prfqal,prfhrlrat,prfexp,ifnull((select revscr from tbrev where revasgcod=(select asgcod from tbasg where asgregcod=b.regcod))
,0)scr from tbapp,tbreg b,tbprf where appregcod=
regcod and prfregcod=regcod and apptskcod=tcod
order by appdat ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspasg`()
    NO SQL
begin
select * from tbasg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspasgtsk`(IN `rcod` INT)
    NO SQL
begin
select asgcod,tsktit,tsksts,tskstrdat,tskdsc,
regnam,asghrlprc,asghrs from tbtsk,tbasg,tbreg
where tskregcod=regcod and asgtskcod=tskcod and
asgregcod=rcod order by tskstrdat desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspcat`()
    NO SQL
begin
select * from tbcat;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspdis`()
    NO SQL
begin
select * from tbdis;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspmsg`()
    NO SQL
begin
select * from tbmsg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspmsgbyapp`(IN `acod` INT)
    NO SQL
begin
select msgdat,msgdsc,msgfil,regeml from tbmsg
,tbreg where msgsndregcod=regcod and msgappcod=
acod order by msgdat desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspmytsk`(IN `rcod` INT)
    NO SQL
begin
select tskcod,tsktit,tskstrdat,tskdsc,catnam,tsksts
from tbtsk,tbcat where tskcatcod=catcod and
tskregcod=rcod order by tskdat desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspnonvrftsk`()
    NO SQL
begin
select regnam,regpic,prfqal,
prfexp,prfhrlrat,prfcod from
tbprf,tbreg where prfregcod=
regcod and prfsts='N';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspprf`()
    NO SQL
begin
select * from tbprf ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspreg`()
    NO SQL
begin
select * from tbreg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dsprev`()
    NO SQL
begin
select * from  tbrev;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dsptsk`()
    NO SQL
begin
select * from tbtsk;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspwrkhis`(IN `rcod` INT)
    NO SQL
begin
select tsktit,tskstrdat,asghrlprc,asghrs,regnam,
revdat,revdsc,revscr from tbtsk,tbasg,tbreg,
tbrev where tskcod=asgtskcod and asgregcod=
rcod and tskregcod=regcod and revasgcod=asgcod
and tsksts='C' order by revdat desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndapp`(IN `acod` INT)
    NO SQL
begin
select * from  tbapp where appcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndasg`(IN `acod` INT)
    NO SQL
begin
select * from tbasg  where asgcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndcat`(IN `ccod` INT)
    NO SQL
begin
select * from tbcat where catcod=ccod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fnddis`(IN `dcod` INT)
    NO SQL
begin
select * from tbdis where discod=dcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndmsg`(IN `mcod` INT)
    NO SQL
begin
select * from tbmsg  where msgcod=mcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndprf`(IN `pcod` INT)
    NO SQL
begin
select * from tbprf  where prfcod=pcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndreg`(IN `rcod` INT)
    NO SQL
begin
select * from tbreg  where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndrev`(IN `rcod` INT)
    NO SQL
begin
select * from  tbrev where revasgcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndtsk`(IN `tcod` INT)
    NO SQL
begin
select * from tbtsk  where tskcod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fndusr`(IN `eml` VARCHAR(50))
    NO SQL
begin
select * from tbreg where regeml=eml;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insapp`(IN `atcod` INT, IN `arcod` INT, IN `adat` DATETIME, IN `adsc` VARCHAR(1000))
    NO SQL
begin
insert tbapp values(null,atcod,arcod,adat,adsc);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insasg`(IN `atcod` INT, IN `arcod` INT, IN `ahprc` FLOAT, IN `ahrs` FLOAT)
    NO SQL
begin
insert tbasg values(null,atcod,arcod,ahprc,ahrs);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inscat`(IN `cnam` VARCHAR(100))
    NO SQL
begin
insert tbcat values(null,cnam);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insdis`(IN `dacod` INT, IN `drcod` INT, IN `ddat` DATETIME, IN `dtit` VARCHAR(100), IN `ddsc` VARCHAR(1000), IN `drsts` CHAR(1))
    NO SQL
begin
insert tbdis values(null,dacod,drcod,ddat,dtit,ddsc,drsts);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insmsg`(IN `mdat` DATETIME, IN `macod` INT, IN `msrcod` INT, IN `mdsc` VARCHAR(1000), IN `mfil` VARCHAR(50))
    NO SQL
begin
insert tbmsg values(null,mdat,macod,msrcod,mdsc,mfil);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insprf`(IN `prcod` INT, IN `pqal` VARCHAR(500), IN `pexp` VARCHAR(500), IN `phrat` FLOAT, IN `psts` CHAR(1))
    NO SQL
begin
insert tbprf values(null,prcod,pqal,pexp,phrat,psts);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insreg`(IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME, IN `rpic` VARCHAR(50), IN `rnam` VARCHAR(100), IN `rrol` CHAR(1))
    NO SQL
begin
insert tbreg values(null,reml,rpwd,rdat,rpic,rnam,rrol);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insrev`(IN `racod` INT, IN `rdat` DATETIME, IN `rdsc` VARCHAR(1000), IN `rscr` INT)
    NO SQL
begin
insert tbrev values(null,racod,rdat,rdsc,rscr);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `instsk`(IN `tdat` DATETIME, IN `trcod` INT, IN `ttit` VARCHAR(200), IN `tdsc` VARCHAR(1000), IN `tsdat` DATETIME, IN `tccod` INT, IN `tsts` CHAR(1))
    NO SQL
begin
insert tbtsk values(null,tdat,trcod,ttit,tdsc,tsdat,tccod,tsts);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logincheck`(IN `eml` VARCHAR(50), IN `pwd` VARCHAR(50), OUT `cod` INT, OUT `rol` CHAR(1))
    NO SQL
begin
declare actpwd varchar(50);
select regpwd from tbreg where regeml=eml into @actpwd;
if @actpwd=pwd then
select regcod from tbreg where regeml=eml into cod;
select regrol from tbreg where regeml=eml into rol;
else
set cod=-1;
set rol='N';
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `srcasgcod`(IN `tcod` INT)
    NO SQL
begin
select asgcod from tbasg where asgtskcod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `srcprf`(IN `rcod` INT)
    NO SQL
begin
select prfcod,prfexp,prfhrlrat,prfqal,prfsts,regpic from tbprf
,tbreg where prfregcod=regcod and prfregcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `srctsk`(IN `ccod` INT)
    NO SQL
begin
select tskcod,tsktit,tskdsc,tskstrdat,regnam,regcod from tbtsk,
tbreg where tskregcod=regcod and tskcatcod=ccod and tsksts='A' order by tskdat desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updapp`(IN `acod` INT, IN `atcod` INT, IN `arcod` INT, IN `adat` DATETIME, IN `adsc` VARCHAR(1000))
    NO SQL
begin
update tbapp set apptskcod=atcod,appregcod=arcod,appdat=adat,appdsc=adsc where appcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updasg`(IN `acod` INT, IN `atcod` INT, IN `arcod` INT, IN `ahprc` FLOAT, IN `ahrs` FLOAT)
    NO SQL
begin
update tbasg set asgtskcod=atcod,asgregcod=arcod,asghrlprc=ahprc,asghrs=ahrs where asgcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updcat`(IN `ccod` INT, IN `cnam` VARCHAR(100))
    NO SQL
begin
update tbcat set catnam=cnam where catcod=ccod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upddis`(IN `dcod` INT, IN `dacod` INT, IN `drcod` INT, IN `ddat` DATETIME, IN `dtit` VARCHAR(100), IN `ddsc` VARCHAR(1000), IN `drsts` CHAR(1))
    NO SQL
begin
update tbdis set disasgcod=dacod,disregcod=drcod,disdat=ddat,distit=dtit,disdsc=ddsc,disressts=drsts where discod=dcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updmsg`(IN `mcod` INT, IN `mdat` DATETIME, IN `macod` INT, IN `msrcod` INT, IN `mdsc` VARCHAR(1000), IN `mfil` VARCHAR(50))
    NO SQL
begin
update tbmsg set msgdat=mdat,msgappcod=macod,msgsndregcod=msrcod,msgdsc=mdsc,msgfil=mfil where msgcod=mcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updprf`(IN `pcod` INT, IN `prcod` INT, IN `pqal` VARCHAR(500), IN `pexp` VARCHAR(500), IN `phrat` FLOAT)
    NO SQL
begin
update tbprf set prfregcod=prcod,prfqal=pqal,prfexp=pexp,prfhrlrat=phrat where prfcod=pcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updprfsts`(IN `pcod` INT, IN `psts` CHAR(1))
    NO SQL
begin
update tbprf set prfsts=psts where prfcod=pcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updreg`(IN `rcod` INT, IN `rpic` VARCHAR(50))
    NO SQL
begin
update tbreg set regpic=rpic where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updrev`(IN `rcod` INT, IN `racod` INT, IN `rdat` DATETIME, IN `rdsc` VARCHAR(1000), IN `rscr` INT)
    NO SQL
begin
update tbrev set revasgcod=racod,revdat=rdat,revdsc=rdsc,revscr=rscr where revcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updtsk`(IN `tcod` INT, IN `tdat` DATETIME, IN `trcod` INT, IN `ttit` VARCHAR(200), IN `tdsc` INT, IN `tsdat` DATETIME, IN `tccod` INT, IN `tsts` CHAR(1))
    NO SQL
begin
update tbtsk set tskdat=tdat,tskregcod=trcod,tsktit=ttit,tskdsc=tdsc,tskstrdat=tsdat,tskcatcod=tccod,tsksts=tsts where tskcod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updtsksts`(IN `tcod` INT, IN `tsts` CHAR(1))
    NO SQL
begin
update tbtsk set tsksts=tsts where tskcod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updusr`(IN `rcod` INT, IN `pwd` VARCHAR(50))
    NO SQL
begin
update tbreg set regpwd=pwd where regcod=rcod;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbapp`
--

CREATE TABLE IF NOT EXISTS `tbapp` (
  `appcod` int(11) NOT NULL AUTO_INCREMENT,
  `apptskcod` int(11) NOT NULL,
  `appregcod` int(11) NOT NULL,
  `appdat` datetime NOT NULL,
  `appdsc` varchar(1000) NOT NULL,
  PRIMARY KEY (`appcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbapp`
--

INSERT INTO `tbapp` (`appcod`, `apptskcod`, `appregcod`, `appdat`, `appdsc`) VALUES
(6, 13, 6, '2015-05-06 00:00:00', 'i will do at 12%..'),
(7, 12, 6, '2015-05-06 00:00:00', 'i want to do this'),
(8, 16, 7, '2015-05-07 00:00:00', 'agree to do this'),
(9, 14, 9, '2015-05-07 00:00:00', 'I d love to do this work '),
(10, 12, 9, '2015-05-07 00:00:00', 'i want to do this job'),
(11, 17, 6, '2015-05-25 00:00:00', 'I want a valid and suitable candidate for this application.');

-- --------------------------------------------------------

--
-- Table structure for table `tbasg`
--

CREATE TABLE IF NOT EXISTS `tbasg` (
  `asgcod` int(11) NOT NULL AUTO_INCREMENT,
  `asgtskcod` int(11) NOT NULL,
  `asgregcod` int(11) NOT NULL,
  `asghrlprc` float NOT NULL,
  `asghrs` float NOT NULL,
  PRIMARY KEY (`asgcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbasg`
--

INSERT INTO `tbasg` (`asgcod`, `asgtskcod`, `asgregcod`, `asghrlprc`, `asghrs`) VALUES
(6, 13, 6, 20, 34),
(7, 14, 9, 23, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tbcat`
--

CREATE TABLE IF NOT EXISTS `tbcat` (
  `catcod` int(11) NOT NULL AUTO_INCREMENT,
  `catnam` varchar(100) NOT NULL,
  PRIMARY KEY (`catcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbcat`
--

INSERT INTO `tbcat` (`catcod`, `catnam`) VALUES
(1, 'Household'),
(2, 'Banker'),
(3, 'Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `tbdis`
--

CREATE TABLE IF NOT EXISTS `tbdis` (
  `discod` int(11) NOT NULL AUTO_INCREMENT,
  `disasgcod` int(11) NOT NULL,
  `disregcod` int(11) NOT NULL,
  `disdat` datetime NOT NULL,
  `distit` varchar(100) NOT NULL,
  `disdsc` varchar(1000) NOT NULL,
  `disressts` char(1) NOT NULL,
  PRIMARY KEY (`discod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbmsg`
--

CREATE TABLE IF NOT EXISTS `tbmsg` (
  `msgcod` int(11) NOT NULL AUTO_INCREMENT,
  `msgdat` datetime NOT NULL,
  `msgappcod` int(11) NOT NULL,
  `msgsndregcod` int(11) NOT NULL,
  `msgdsc` varchar(1000) NOT NULL,
  `msgfil` varchar(50) NOT NULL,
  PRIMARY KEY (`msgcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbmsg`
--

INSERT INTO `tbmsg` (`msgcod`, `msgdat`, `msgappcod`, `msgsndregcod`, `msgdsc`, `msgfil`) VALUES
(6, '2015-05-06 00:00:00', 6, 5, '                 ok i will ...give ..but i need it at time...\r\ncheck requirement in attachment(pdf).', 'File.PDF'),
(7, '2015-05-06 00:00:00', 6, 6, '                      ok i see your requirement', ''),
(8, '2015-05-06 00:00:00', 6, 6, '                see my previous work in attachment      ', 'File0001.PDF'),
(9, '2015-05-07 00:00:00', 9, 5, '                      i requment you for job but i will give only 10000', 'File.PDF'),
(10, '2015-05-07 00:00:00', 10, 5, '                      hiii   can you do it at 5000', 'File.PDF');

-- --------------------------------------------------------

--
-- Table structure for table `tbprf`
--

CREATE TABLE IF NOT EXISTS `tbprf` (
  `prfcod` int(11) NOT NULL AUTO_INCREMENT,
  `prfregcod` int(11) NOT NULL,
  `prfqal` varchar(500) NOT NULL,
  `prfexp` varchar(50) NOT NULL,
  `prfhrlrat` float NOT NULL,
  `prfsts` char(1) NOT NULL,
  PRIMARY KEY (`prfcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbprf`
--

INSERT INTO `tbprf` (`prfcod`, `prfregcod`, `prfqal`, `prfexp`, `prfhrlrat`, `prfsts`) VALUES
(4, 6, 'b.tech ', ' working as faculty at csinfo.tech from 2 years ', 200, 'V'),
(6, 7, 'MCA', ' working as accountant in bank', 500, 'V'),
(7, 8, 'm.com', '2 years', 300, 'N'),
(8, 9, 'b.tech', 'fresher ', 100, 'V');

-- --------------------------------------------------------

--
-- Table structure for table `tbreg`
--

CREATE TABLE IF NOT EXISTS `tbreg` (
  `regcod` int(11) NOT NULL AUTO_INCREMENT,
  `regeml` varchar(50) NOT NULL,
  `regpwd` varchar(50) NOT NULL,
  `regdat` datetime NOT NULL,
  `regpic` varchar(50) NOT NULL,
  `regnam` varchar(100) NOT NULL,
  `regrol` char(1) NOT NULL,
  PRIMARY KEY (`regcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbreg`
--

INSERT INTO `tbreg` (`regcod`, `regeml`, `regpwd`, `regdat`, `regpic`, `regnam`, `regrol`) VALUES
(4, 'admin@taskrabit.com', 'admin', '2015-05-03 00:00:00', '', 'Rishi', 'A'),
(5, 'preet@gmail.com', 'preet123', '2015-05-06 00:00:00', '', 'preet', 'H'),
(6, 'neeraj@gmail.com', 'neeraj123', '2015-05-06 00:00:00', 'img1.jpg', 'neeraj', 'T'),
(7, 'sandeep@gmail.com', 'sandeep123#', '2015-05-07 00:00:00', '123.jpg', 'sandeep', 'T'),
(8, 'bhupender@gmail.com', 'bhupender123#', '2015-05-07 00:00:00', 'bhupi.jpg', 'bhupender', 'T'),
(9, 'vikas@gmail.com', 'vikas123#', '2015-05-07 00:00:00', 'vicky.jpg', 'vikas', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbrev`
--

CREATE TABLE IF NOT EXISTS `tbrev` (
  `revcod` int(11) NOT NULL AUTO_INCREMENT,
  `revasgcod` int(11) NOT NULL,
  `revdat` datetime NOT NULL,
  `revdsc` varchar(100) NOT NULL,
  `revscr` int(11) NOT NULL,
  PRIMARY KEY (`revcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbrev`
--

INSERT INTO `tbrev` (`revcod`, `revasgcod`, `revdat`, `revdsc`, `revscr`) VALUES
(2, 6, '2015-05-06 00:00:00', '                      task was good ..', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbtsk`
--

CREATE TABLE IF NOT EXISTS `tbtsk` (
  `tskcod` int(11) NOT NULL AUTO_INCREMENT,
  `tskdat` datetime NOT NULL,
  `tskregcod` int(11) NOT NULL,
  `tsktit` varchar(200) NOT NULL,
  `tskdsc` varchar(1000) NOT NULL,
  `tskstrdat` datetime NOT NULL,
  `tskcatcod` int(11) NOT NULL,
  `tsksts` char(1) NOT NULL,
  PRIMARY KEY (`tskcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbtsk`
--

INSERT INTO `tbtsk` (`tskcod`, `tskdat`, `tskregcod`, `tsktit`, `tskdsc`, `tskstrdat`, `tskcatcod`, `tsksts`) VALUES
(11, '2015-05-06 00:00:00', 5, 'house shift', '                      i want to shift my house from #2343 sec 22-c to #3563 sec 69 mohali..i want workers to help me ', '2015-05-10 00:00:00', 1, 'A'),
(12, '2015-05-06 00:00:00', 5, 'account statements', '             i need a guye to help me in maintaining all my bank statements.. for parttime      ', '2015-05-12 00:00:00', 2, 'A'),
(13, '2015-05-06 00:00:00', 5, 'insurence target', '                      i need person to complete my insurance target.\r\ni will give  10% per insurence . ', '2015-05-12 00:00:00', 3, 'C'),
(14, '2015-05-07 00:00:00', 5, 'gardening', 'need person  which have  the practice of growing and cultivating plants as part of horticulture. In gardens, ornamental plants are often grown for their flowers, foliage,  ', '2015-05-05 00:00:00', 1, 'G'),
(15, '2015-05-07 00:00:00', 5, 'accounts open target job', '                      i need 20 accounts in month . i will pay 2000 per account.', '2015-05-13 00:00:00', 2, 'A'),
(16, '2015-05-07 00:00:00', 5, 'Health insuranceâ€Ž', ' I Need  talented people  for Health Insurance                   ', '2015-05-08 00:00:00', 3, 'A'),
(17, '2015-05-25 00:00:00', 5, 'Draft Checking ', 'Requirement for a person that can handle accounts                      ', '2015-05-26 00:00:00', 2, 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
