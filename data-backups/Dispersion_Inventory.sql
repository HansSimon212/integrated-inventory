-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2020 at 10:12 AM
-- Server version: 5.6.45-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LEI_Inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dispersion_Inventory`
--

CREATE TABLE `Dispersion_Inventory` (
  `name` varchar(100) NOT NULL,
  `MFG` varchar(6) DEFAULT NULL,
  `formula` varchar(20) DEFAULT NULL,
  `Exp_Date` date DEFAULT NULL,
  `quantity_Kg` float DEFAULT NULL,
  `pack_Out` varchar(20) DEFAULT NULL,
  `CM` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `shipping` varchar(100) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Dispersion_Inventory`
--

INSERT INTO `Dispersion_Inventory` (`name`, `MFG`, `formula`, `Exp_Date`, `quantity_Kg`, `pack_Out`, `CM`, `location`, `shipping`, `notes`, `uid`) VALUES
('MODIFIER 600', '0054', '03-136B', '2021-03-19', 37, '15 CHD', 'IP BRANDS', '204', '', 'WAITING ON IP BRANDS SHIPMENT', 1),
('MODIFIER 400', '0053', '03-135B', '2021-03-18', 5, '2.5 GP', 'IP BRANDS', '204', '', 'WAITING ON IP BRANDS SHIPMENT', 2),
('MODIFIER 400', '0053', '03-135B', '2021-03-18', 20, '6 GP', 'IP BRANDS', '204', '', 'WAITING ON IP BRANDS SHIPMENT', 3),
('MODIFIER 900', '0065', '07-94A', '2020-07-24', 20, '6 GP', 'IP BRANDS', '204', '', 'WAITING FOR IP BRANDS SHIPMENT', 4),
('MODIFIER 200', '0064', '03-133B', '2021-03-17', 20, '6 GP', 'IP BRANDS', '204', '', 'WAITING FOR IP BRANDS SHIPMENT', 5),
('VEGAN MODIFIER 200 BA NSB HL LP', '0127', '78-107A', '2021-05-19', 200, '55 CHD', 'KDC', '205', '', 'WAITING FOR KDC SHIPMENT', 6),
('VEGAN MODIFIER 200 BA NSB HL LP', '0127', '78-107A', '2021-05-19', 81, '30 CHD', 'KDC', '205', '', 'WAITING FOR KDC SHIPMENT', 7),
('VEGAN MODIFIER 200 BA NSB HL LP', '0133', '78-107A', '2021-05-29', 91, '30 CHD', 'KDC', '207', '', '', 8),
('VEGAN MODIFIER 200 BA NSB HL LP', '0129', '78-107A', '2021-05-26', 88, '30 CHD', 'KDC', '207', '', '', 9),
('VEGAN MODIFIER 200 BA NSB HL LP', '0128', '78-107A', '2021-05-22', 74, '30 CHD', 'KDC', '207', '', '', 10),
('VEGAN MODIFIER 200 BA NSB HL LP', '0130', '78-107A', '2021-05-27', 78, '30 CHD', 'KDC', '207', '', '', 11),
('VEGAN MODIFIER 200 BA NSB HL LP', '0131', '78-107A', '2021-05-27', 92, '30 CHD', 'KDC', '208', '', '', 12),
('VEGAN MODIFIER 200 BA NSB HL LP', '0131', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', '208', '', '', 13),
('VEGAN MODIFIER 200 BA NSB HL LP', '0132', '78-107A', '2021-05-28', 99, '30 CHD', 'KDC', '208', '', '', 14),
('VEGAN MODIFIER 200 BA NSB HL LP', '0132', '78-107A', '2021-05-28', 200, '55 CHD', 'KDC', '208', '', '', 15),
('MODIFIER OC-OST BA', '0072', '64-128V1-2', '2022-05-13', 200, '55CHD', 'EWL', '211', '', 'WAITING FOR EWL SHIPMENT', 16),
('MODIFIER OC-OST BA', '0072', '64-128V1-2', '2022-05-13', 200, '55CHD', 'EWL', '211', '', 'WAITING FOR EWL SHIPMENT', 17),
('RF OIL DISPERSION', '0080', '16-114A-1', '2021-05-14', 10, '3.5 GP', 'EWL', '211', '', '', 18),
('MODIFIER HMS/OS/AV BA', '0075', '64-127V1-2', '2021-05-14', 73, '30 CHD', 'LEI', '211', '', '', 19),
('GINKGO EXTRACT CCTG', '8148', '60-148A', '2020-04-26', 0.5, '5GP', 'INT', '213', '', 'INTERNAL', 20),
('HEATHER EXTRACT CCTG', '8226', '60-137A', '2020-06-14', 1.75, '5GP', 'INT', '213', '', 'INTERNAL', 21),
('BEARBERRY EXTRACT CCTG', '9188', '60-151A', '2021-06-25', 2.5, '5GP', 'INT', '213', '', 'INTERNAL', 22),
('BLADDERWRACK EXTRACT CCTG', '8364', '60-141A', '2020-08-06', 2.5, '6GP', 'INT', '213', '', 'INTERNAL', 23),
('LICORICE EXTRACT CCTG', '8138', '60-150A', '2020-04-23', 5, '5GP', 'INT', '213', '', 'INTERNAL', 24),
('BLADDERWRACK EXTRACT CCTG', '8364', '60-141A', '2020-08-06', 5, '6GP', 'INT', '213', '', 'INTERNAL', 25),
('BEARBERRY EXTRACT CCTG SBB SERUM', '8139R', '60-151A', '2020-05-03', 3, '5GP', 'INT', '213', '', 'INTERNAL', 26),
('JOJOBA OIL DISPERSION BA NSB LP', '9178', '15-48A', '2020-08-07', 7.5, '15CHD', 'INT', '213', '', 'INTERNAL', 27),
('VITAMIN C ESTER PHOTO-BRIGHTENING MOISTURIZER BROAD SPECTRUM SPF 30', '9343', '25-64B1', '2021-09-27', 8, '2GP', 'INT', '213', '', 'INTERNAL', 28),
('VITAMIN C ESTER PHOTO-BRIGHTENING MOISTURIZER BROAD SPECTRUM SPF 30', '9343', '25-64B1', '2021-09-27', 19, '5GP', 'INT', '213', '', 'INTERNAL', 29),
('ROSEMARY EXTRACT CCTG', '8335', '60-140A', '2020-10-10', 7.5, '6 GP', 'LEI -For MFG0164', '213', '', '', 30),
('ROSEMARY EXTRACT CCTG ', '8335', '60-140A', '2020-10-10', 3.5, '5 GP ', 'LEI -2 KG For MFG0164', '213', '', '', 31),
('MODIFIER OMC/OC/OS/AV BA EMT ', '9022', '32-55A', '2020-05-22', 12, '6GP', 'For MFG0061', '213', '', '', 32),
('MODIFIER HMS/OS/AVO/OCR BA', '9283', '76-66A', '2020-05-22', 7.25, '3.5GP', '', '213', '', '', 33),
('MODIFIER 200 HL', '9292', '12-63A', '2020-05-22', 19, '6GP', ' ', '213', '', '', 34),
('MODFIER FTN', '9389', '06-09A', '2021-01-31', 4, '2GP', '', '213', '', 'Combining into MFG0109.', 35),
('AVOCADO OIL DISPERSION BA HL', '9485', '39-92A', '2021-01-31', 6.5, '3.5GP', '', '213', '', '', 36),
('SAFFLOWER OIL DISPERSION BA NSB LP', '9444', '15-08A', '2021-02-04', 17.5, '6GP', '', '213', '', '', 37),
('TEXTURIZING MODIFER', '9191', '39-24B', '2020-07-10', 22, '6GP', 'LEI', '213', '', 'Used in MFG0114 for PO18785 (NCL Zero Dollar PO#65930 & PO# 64208)', 38),
('BLUE LIGHT COMPLEX Y', '0084', '70-75A', '2021-05-11', 9.4, '3.5GP', '', '213', '', '', 39),
('SAFFLOWER OIL DISPERSION 50% BA NSB', '9482R', '44-157A', '2021-02-06', 20, '55CHD', '', '214', '', '', 40),
('ALGENIST MYLK DISPERSION', '9381', '73-96A', '2020-04-29', 177.5, '55CHD', '', '214', '', 'INTERNAL', 41),
('O&R Dispersion LP', '0010', '13-153A', '2021-02-14', 92, '55CHD', '', '214', '', 'USE ALL IN PO19271 (Elevation Labs Zero Dollar PO#67194)', 42),
('JOJOBA OIL DISPERSION BA NSB LP', '9178', '15-48A', '2020-06-18', 71.8, '55CHD', '', '216', '', 'INTERNAL', 43),
('JOJOBA OIL DISPERSION BA NSB LP', '9384', '15-48A', '2020-10-14', 173.5, '55CHD', '', '216', '', 'INTERNAL', 44),
('VOLATILE DISPERSION  0.65CST', '8102', '26-78A', '2020-05-22', 8.5, '30CHD', 'USED IN MFG0096', '216', '', '', 45),
('GENIUS BODY MYLK', '0045', '81-60A', '2022-03-04', 197, '55CHD', '', '216', '', '', 46),
('Safflower Oil Dispersion 50% BA NSB ', '0151', '44-157A', '2021-06-09', 200, '55 Gal', 'LEI', '217', '', '', 47),
('Safflower Oil Dispersion 50% BA NSB ', '0151', '44-157A', '2021-06-09', 200, '55 Gal', 'LEI', '217', '', '', 48),
('Safflower Oil Dispersion 50% BA NSB ', '0151', '44-157A', '2021-06-09', 200, '55 Gal', 'LEI', '217', '', '', 49),
('Safflower Oil Dispersion 50% BA NSB ', '0151', '44-157A', '2021-06-09', 200, '55 Gal', 'LEI', '217', '', '', 50),
('ELASTICITY BOOSTER', '8411', '70-63A', '2020-11-19', 3.5, '2 GP', 'LEI', '246', '', '', 51),
('CANOLA OIL DISPERSION BA NSB', '8279', '16-41A', '2018-12-08', 4, '3.5 GP', 'LEI', '246', '', 'REJECTED MATERIAL', 52),
('ELASTICITY BOOSTER (SERUM)', '8301', '70-73A', '2020-08-10', 5, '3.5 GP', 'YOU', '246', '', 'REJECTED', 53),
('CANOLA OIL DISPERSION BA NSB', '8279', '16-41A', '2018-12-08', 15, '5 GP', 'BIO', '246', '', 'REJECTED MATERIAL', 54),
('CANOLA OIL DISPERSION BA NSB', '8279', '16-41A', '2018-12-08', 15, '5 GP', 'BIO', '246', '', 'REJECTED MATERIAL', 55),
('ELASTICITY BOOSTER (SERUM)', '8301', '70-73A', '2020-08-10', 105, '', '', '246', '', 'REJECTED', 56),
('ELASTICITY BOOSTER (SERUM)', '8235', '70-73A', '2020-07-03', 106.5, '', '', '246', '', 'REJECTED', 57),
('ELASTICITY BOOSTER (SERUM)', '8301', '70-73A', '2020-08-10', 200, 'CHD 55', 'YOU', '246', '', 'REJECTED', 58),
(' MODIFIER HMS/OS/AVO/OCR BA', '9255', '76-66A', '2019-10-24', 11, '5GP', '', '246', '', 'REJECTED', 59),
('MODIFIER HMS/OS/AVO/OCR BA', '9255', '76-66A', '2019-10-24', 15, '5GP', '', '246', '', 'REJECTED', 60),
('MODIFIER HMS/OS/AVO/OCR BA', '9249', '76-66A', '2019-10-24', 22, '5GP', '', '246', '', 'REJECTED', 61),
('CCTG Dispersion BA  NSB LP', '9480', '15-54A', '2020-12-02', 20, '6gp', '', '246', '', 'Rejected for Micro.  REWORKED INTO MFG0253 FOR PO 60974 / TS05292020', 62),
('RF OIL DISPERSION', '9447', '16-114A', '2021-01-30', 16, '6GP', '', '246', '', 'REJECTED FOR MICRO', 63),
('GENIUS BODY MYLK', '9172', '68-73A', '2021-07-12', 60.5, '30CHD', '', '247', '', 'REJECTED MATERIAL ', 64),
('GENIUS BODY MYLK', '9172', '68-73A', '2021-07-12', 200, '55CHD', '', '247', '', 'REJECTED MATERIAL ', 65),
('GENIUS BODY MYLK', '9172', '68-73A', '2021-07-12', 200, '55CHD', '', '247', '', 'REJECTED MATERIAL ', 66),
('GENIUS BODY MYLK', '9172', '68-73A', '2021-07-12', 200, '55CHD', '', '247', '', 'REJECTED MATERIAL ', 67),
('ELASTICITY BOOSTER (NIGHT CREAM)', '8327R', '70-63A', '2020-09-13', 187.5, '55CHD', '', '248', '', 'REJECTED', 68),
('MODIFIER 400 HL ', '9115', '12-62A', '2020-08-16', 3, '2GP', '', '255', '', 'Combining into MFG0107.', 69),
('OIL CONTROL BOOSTER (DAY CREAM)', '9380', '70-49A', '2021-11-21', 18, '5GP', '', '255', '', ' ', 70),
('REPLENSHMENT BOOSTER', '9215', '70-60A', '2021-08-07', 27, '30CHD', '', '255', '', '', 71),
('HYDRATING BOOSTER (CREAM)', '9469', '70-61A', '2021-12-13', 4.5, '2GP', '', '255', '', '', 72),
('MODIFIER 400 BA NSB HL', '9390', '12-56A', '2020-12-30', 13, '5GP', 'LEI', '255', '', '', 73),
('SHEA BUTTER DISPERSION CCTG HL BA NSB LP', '9446', '15-93A', '2020-07-10', 10, '5GP', '', '255', '', '', 74),
('PUFFINESS BOOSTER (CREAM)', '9484R', '70-62A', '2022-02-21', 21, '6GP', '', '255', '', '', 75),
('PUFFINESS BOOSTER (CREAM)', '9484R', '70-62A', '2022-02-21', 22.5, '6GP', '', '255', '', '', 76),
('ELASTICITY BOOSTER (SERUM)', '0022', '70-73A', '2022-02-26', 15, '5GP', '', '255', '', '', 77),
('MODIFIER 400', '0053', '03-135B ', '2021-03-18', 22, '6 GP', 'LEI', '255', '', '', 78),
('CERAMIDE BISABOLOL-CCTG DISPERSION', '9495', '59-84A', '2021-01-13', 5, '', 'LEI', '255', '', '', 79),
('MODIFIER FTN', '0055R', '06-09A', '2021-04-03', 10.5, '6 GP', 'LEI', '255', '', '', 80),
('HYDRATION BOOSTER(DAY CREAM)', '0015R', '70-64A', '2022-04-16', 3.5, '2GP', '', '255', '', '', 81),
('MODIFIER 200 BA NSB HL LP', '0067', '15-07A-1', '2021-05-04', 35, '15 GP', 'LEI', '255', '', '', 82),
('MODIFIER 200 BA NSB HL LP', '0067', '15-07A-1', '2021-05-04', 12, '30 GP', 'LEI', '255', '', '', 83),
('MODIFIER 200 BA NSB HL LP', '0067', '15-07A-1', '2021-05-04', 55, '15CHD', 'LEI', '255', '', '', 84),
('MODIIFER OMC/OC/OS/AV BA EMT', '0061', '32-55A', '2021-05-07', 2, '1GP', '', '255', '', '', 85),
('MODIIFER OMC/OC/OS/AV BA EMT', '0061', '32-55A', '2021-05-07', 55, '15CHD', '', '255', '', '', 86),
('LATENT HEAT COMPLEX', '85', '63-75A', '2021-05-12', 0.7, '1 GP', 'LEI', '255', '', '', 87),
('ENVIRONMENTAL SHIELD BOOSTER (DAY CREAM)', '0089', '70-65A', '2022-05-20', 17.5, '6 GP', 'LEI', '255', '', '', 88),
('TEXTURIZING MODIFIER', '0114', '39-24B', '2020-09-19', 20, '6 GP', 'LEI', '255', '', '', 89),
('TIME CORRECTING BOOSTER', '0094', '78-13A', '2022-06-02', 11, '6 GP', 'LEI', '255', '', '', 90),
('GENIUS BODY MYLK', '9366R', '68-73A', '2021-10-22', 181, '55CHD', 'LEI', '256', '', '', 91),
('MODIFIER 600 BA NSB HL LP', '9453', '16-43A1', '2021-01-21', 38, '55GAL', 'LEI', '256', '', 'Use 12Kg in Perricone- High Potency Classics: Hyaluronic Intensive Moisturizer 1oz (Formerly Hyalo Plasma)- PO 100018049/NB022020 (zero dollar PO 113923) USE 49Kg for  1st Safety Stock Order, 0$ PO 65929 rcvd 2/19/20. Use 101Kg for EWL Zero Dollar PO# 114336.', 92),
('PUFFINESS BOOSTER (CREAM)', '9484R1', '70-62A', '2022-02-21', 54, '15CHD', '', '256', '', '', 93),
('PUFFINESS BOOSTER (CREAM)', '9484R1', '70-62A', '2022-02-21', 21, '6GP', '', '256', '', '', 94),
('PUFFINESS BOOSTER (CREAM)', '9484R1', '70-62A', '2022-02-21', 23.5, '6GP', '', '256', '', '', 95),
('BRIGHTENING BOOSTER (SERUM)', '0087', '70-72A', '2022-05-13', 25.5, '30CHD', 'LEI', '256', '', '', 96),
('USG-107A DISPERSION BA NSB ', '0106', '32-56A', '2021-05-21', 23, '6 GP', 'LEI', '256', '', '', 97),
('USG-107A DISPERSION BA NSB ', '0106', '32-56A', '2021-05-21', 22, '6 GP', 'LEI', '256', '', '', 98),
('USG-107A DISPERSION BA NSB ', '0106', '32-56A', '2021-05-21', 20, '6 GP', 'LEI', '256', '', '', 99),
('MODIFIER OMC-OC DISPERSION', '9486', '06-149A', '2021-02-04', 11.5, '6GP', 'JJL', '258', '', '', 100),
('MODIFIER OMC-OC DISPERSION', '9486', '06-149A', '2021-02-04', 21, '6GP', 'JJL', '258', '', '', 101),
('MODIFIER OC-OST BA', '9408', '64-128V1', '2020-12-27', 38, '15GP', 'LEI', '258', '', '', 102),
('JOJOBA OIL DISPERSION BA NSB LP', '9171', '15-48A', '2020-05-13', 7, '30CHD', '', '258', '', '', 103),
('AVOCADO OIL DISPERSION BA HL', '9177', '39-92A', '2020-05-13', 11.8, '55CHD', '', '258', '', '', 104),
('MODIFIER HMS/OS/AVO/OCR BA', '9474', '76-66A', '2021-01-22', 22, '15GP', 'LEI', '258', '', '', 105),
('MODIFIER HMS/OS/AVO/OCR BA', '9476', '76-66A', '2021-01-31', 5.5, '6GP', '', '258', '', '', 106),
('SHEA BUTTER DISPERSION CCTG HL BA NSB LP', '0059', '15-93A', '2020-09-06', 8.5, '5GP', '', '258', '', '', 107),
('OIL CONTROL BOOSTER (DAY CREAM)', '0016', '70-49A', '2022-03-30', 7, '5GP', '', '258', '', '', 108),
('KARANJA SEED OIL DISPERSION BA NSB LP', '0057', '64-147A-1', '2020-10-01', 4, '2GP', '', '258', '', '', 109),
('FIRMNESS BOOSTER (SERUM)', '8194', '70-71A', '2020-06-18', 2, '', 'LEI', '258', '', '', 110),
('USG-107A DISPERSION BA NSB ', '0070', '32-56A-1', '2021-05-21', 97, '30 CHD', '', '259', '', '', 111),
('CALMING BOOSTER', '0093', '76-155B', '2022-05-15', 30.5, '15 CHD', 'LEI', '259', '', '', 112),
('RF OIL DISPERSION', '0080', '16-114A-1', '2021-05-14', 90, '55 CHD', 'LEI', '259', '', '', 113),
('BRIGHTENING BOOSTER (SERUM)', '9467', '70-72A', '2021-12-19', 15, '6GP', '', '261', '', '', 114),
('PC OIL DISPERSION 1(FOR TONER)', '9184', '25-47B', '2020-06-05', 2, '2GP', 'LEI', '261', '', '', 115),
('COUNTERMATCH PURE CALM CLEANSING MILK', '9132', '64-110A', '2021-05-24', 3, '6GP', 'LEI', '261', '', '', 116),
('HYDRATING BOOSTER', '9218', '70-61A', '2021-08-05', 4.3, '2GP', ' ', '261', '', '', 117),
('MODIFIER 400BA NSB HL', '9204', '12-56A', '2020-06-06', 4.8, '2GP', 'LEI', '261', '', '', 118),
('T-ZONE MASK ', '9396', '55-112A', '2021-10-29', 6, '5GP', 'LEI', '261', '', '', 119),
('MODIFIER 400 BA NSB HL', '9328', '12-56A', '2020-09-13', 9, '6GAL', 'LEI', '261', '', '', 120),
('PORE DIMINISHING BOOSTER(DAY CREAM)', '9143', '70-66A', '2021-04-26', 10, '3.5GP', 'LEI', '261', '', '', 121),
('ELASTICITY BOOSTER (SERUM)', '8356', '70-73A', '2020-10-12', 11.5, '5 GP', 'LEI', '261', '', '', 122),
('GLOW BOOSER(SERUM)', '9082', '70-74A', '2021-04-04', 15.5, '6GP', 'LEI', '261', '', '', 123),
('T-ZONE MASK ', '9397', '55-112A', '2021-10-31', 16, '6GP', 'LEI', '261', '', '', 124),
('GLOW BOOSTER (SERUM)', '9141', '70-74A', '2021-04-24', 19, '6GP', 'LEI', '261', '', '', 125),
('MODIFIER 400 BA NSB HL', '9400', '12-56A', '2020-10-21', 20, '6GP', ' ', '261', '', '', 126),
('MODIFIER 400 BA NSB HL', '9400', '12-56A', '2020-10-21', 22, '6GP', '', '261', '', '', 127),
('THE HEALTHY UNDERARM DETOX MASK', '9071', '57-99C', '2021-04-26', 97, '30CHD', 'LEI', '261', '', '', 128),
('ENVIRONMENTAL SHIELD BOOSTER (DAY CREAM)', '9460', '70-65A', '2021-11-25', 18, '6GP', '', '261', '', '', 129),
('FIRMNESS BOOSTER (SERUM)', '9087', '70-71A', '2021-04-05', 9, '3.5GP', 'LEI', '261', '', '', 130),
('PUFFINESS BOOSTER (CREAM)', '9437', '70-62A', '2021-12-12', 8, '3.5GP', '', '261', '', '', 131),
('PUFFINESS BOOSTER (CREAM)', '9471', '70-62A', '2021-12-20', 18, '6GP', '', '261', '', '', 132),
('MODIFIER 400 BA NSB HL', '9414', '12-56A', '2021-01-16', 7, '6GP', 'LEI', '261', '', '', 133),
('COCOA BUTTER DISPERSION CCTG HL BA NSB', '9412', '15-03A', '2021-01-15', 4.8, '2GP', 'LEI', '261', '', '', 134),
('CETEARYL A DISPERSION ', '9388', '04-95A', '2021-01-20', 18, '6GP', 'LEI', '261', '', '', 135),
('MODIFIER 600 HL ', '9391', '12-64A', '2021-01-23', 22, '6GP', 'LEI', '261', '', '16.5Kg Used for FAB PO 5421 / Bentley Zero dollar PO-040620-008', 136),
('ELASTICITY BOOSTER ( NIGHT CREAM )', '9436R', '70-63A', '2022-01-28', 19, '6GP', 'LEI', '261', '', '', 137),
('BRIGHTENING BOOSTER (SERUM)', '0021', '70-72A', '2022-02-25', 14, '6GP', '', '261', '', '', 138),
('CALMING BOOSTER ', '0092', '76-155B', '2022-04-23', 17.5, '6GP', '', '261', '', '', 139),
('WATERMELON HYDRATING MASK', '9045', '101-55A-V3', '2021-03-03', 149, '55OHD', 'LEI', '262', '', '', 140),
('GENIUS BODY MYLK', '0046', '68-73A', '2022-03-02', 196, '55CHD', '', '262', '', '', 141),
('USG-107A DISPERSION BA NSB ', '0060', '32-56A', '2021-04-15', 2, '1GP', ' ', '264', '', '', 142),
('ENVIRONMENTAL SHIELD BOOSTER(DAY CREAM)', '9084', '70-65A', '2021-04-04', 3, '3.5GP', 'LEI', '264', '', '', 143),
('PC OIL DISPERSION TONER', '9230', '25-47B', '2020-07-15', 8.5, '5GP', '', '264', '', '', 144),
('MODIFIER 600 HL ', '9116', '12-64A', '2020-08-15', 0.5, '1GP', 'LEI', '264', '', '', 145),
('WHOLLY KAW SKIN MILK', '9016', '70-13A', '2021-01-24', 1.8, '', '', '264', '', '', 146),
('FIRMING BOOSTER (SERUM)', '9195', '70-71A', '2021-07-03', 2.5, '1GP', '', '264', '', '', 147),
('FIRMING BOOSTER (SERUM)', '9195', '70-71A', '2021-07-03', 2.5, '1GP', '', '264', '', '', 148),
('CALMING BOOSTER(NIGHT)', '9200', '70-59A', '2021-07-02', 3, '1GP', '', '264', '', '', 149),
('OLIVE OIL DISPERSION BA NSB', '9207', '08-84A', '2020-07-25', 6, '2GP', '', '264', '', '', 150),
('PORE SIZE BOOSTER(DAY CREAM)', '9083', '70-66A', '2021-04-01', 10, '5GP', 'LEI', '264', '', '', 151),
('PORE DIMINISHING BOOSTER', '9199', '70-66A', '2021-08-14', 13, '6GP', 'LEI', '264', '', '', 152),
('FIRMING BOOSTER (SERUM)', '9251', '70-71A', '2021-08-09', 17, '5GP', '', '264', '', '', 153),
('CALMING BOOSTER(NIGHT)', '9139', '70-59A', '2021-04-29', 17.95, '6GP', 'LEI', '264', '', '', 154),
('GLOW BOOSTER (SERUM)', '9360', '70-74A', '2021-09-20', 21.35, '6GP', 'LEI', '264', '', ' ', 155),
('MODIFIER 400 BA NSB HL LP EMT ', '9307', '26-32A', '2020-12-09', 4, '2GP', 'LEI', '264', '', '', 156),
('TI02 DISPERSION FOR BROAD SPECTRUM SPF30+MOISTERIZER', '9403', '71-159A', '2021-12-10', 7, '3.5GP', 'LEI', '264', '', '', 157),
('TI02 DISPERSION FOR BROAD SPECTRUM SPF30+MOISTERIZER', '9402', '71-159A', '2021-12-09', 7, '3.5GP', 'LEI', '264', '', '', 158),
('MODIFIER OC-OST BA', '9407', '64-128V1', '2020-12-23', 9, '3.5GP', '', '264', '', '', 159),
('Modifier 200 HL', '9477', '12-63A', '2021-01-08', 20, '6GP', '', '264', '', '', 160),
('Modifier 200 HL', '9477', '12-63A', '2021-01-08', 20, '6GP', '', '264', '', '', 161),
('PC OIL DISPERSION 2B', '9059', '36-156B', '2020-05-22', 11.5, '6GP', 'LEI', '264', '', '', 162),
('DIMETHICONE 10CST DISPERSION LP', '0007', '78-97A', '2020-05-23', 2.5, '1GP', 'LEI', '264', '', '', 163),
('ELASTICITY BOOSTER ( NIGHT CREAM )', '9470R', '70-63A', '2022-01-28', 22, '6GP', 'LEI', '264', '', '', 164),
('PC OIL DISPERSION 2B', '0003', '36-156B', '2020-06-18', 15, '5GP', '', '264', '', '', 165),
('CETEARYL SHEA DISPERSION BA NSB', '9461', '44-55C', '2021-02-17', 21.5, '6GP', '', '264', '', '', 166),
('MODIFIER 200', '0064', '03-133B', '2021-03-17', 5, '2 GP', 'LEI', '264', '', '', 167),
('USG-107A DISPERSION BA NSB ', '0060', '32-56A', '2021-04-15', 9, '5GP', '', '264', '', '', 168),
('USG-107A DISPERSION BA NSB ', '0060', '32-56A', '2021-04-15', 20, '6GP', '', '264', '', '', 169),
('HYDRATING BOOSTER(NIGHT CREAN)', '0020', '70-61A', '2022-04-23', 3.6, '3.5GP', '', '264', '', '', 170),
('LEMC', '0082', '06-76A', '2022-05-15', 106, '30 CP', 'LEI', '264', '', '', 171),
('GENIUS BODY MYLK', '9137', '68-73A', '2021-05-01', 28, '15GP', 'LEI', '265', '', '', 172),
('GUAVA EXTRACT CCTG', '9194', '60-139A', '2021-06-21', 2.8, '3.5 GP', 'LEI', '265', '', '', 173),
('JOJOBA OIL DISPERSION BA NSB LP', '9133', '15-48A', '2019-08-17', 3.5, '3.5 GP ', 'LEI', '265', '', '', 174),
('ACEROLA EXTRACT CCTG', '9110', '60-138A', '2021-04-15', 1.8, '2 GP', 'LEI', '265', '', '', 175),
('ALGENIST MYLK DISPERSION', '9135', '73-96A', '2019-08-22', 1.6, '6 GP', 'LEI', '265', '', '', 176),
('CETEARYL A DISPERSION ', '9064', '57-34A', '2019-08-09', 3.7, '6 GP', 'LEI', '265', '', '', 177),
('TINTING BOOSTER BASE-OUT (DAY)', '9362', '71-154C', '2020-03-19', 14, '6 GP', 'LEI', '265', '', '', 178),
('TINTING BOOSTER BASE-OUT (DAY)', '9362', '71-154C', '2020-03-19', 4.3, '6 GP', 'LEI', '265', '', '', 179),
('LEI GEL 100 ', '9441', '63-153A', '2020-03-11', 6, '3.5 GP', 'LEI', '265', '', '', 180),
('Safflower Oil Dispersion 50% BA NSB ', '0150', '44-157A', '2021-06-05', 200, '55 Gal', 'LEI', '267', '', '', 181),
('Safflower Oil Dispersion 50% BA NSB ', '0150', '44-157A', '2021-06-05', 200, '55 Gal', 'LEI', '267', '', '', 182),
('Safflower Oil Dispersion 50% BA NSB ', '0150', '44-157A', '2021-06-05', 200, '55 Gal', 'LEI', '267', '', '', 183),
('Safflower Oil Dispersion 50% BA NSB ', '0150', '44-157A', '2021-06-05', 200, '55 Gal', 'LEI', '267', '', '', 184),
('Modifier 200 BA NSB HL LP', '0095', '15-07A', '2021-06-04', 39, '15 Gal', 'LEI', '268', '', '', 185),
('Safflower Oil Dispersion 50% BA NSB ', '0150', '44-157A', '2021-06-05', 32, '15 Gal', 'LEI', '268', '', '', 186),
('Safflower Oil Dispersion 50% BA NSB ', '0150', '44-157A', '2021-06-05', 100, '30 Gal', 'LEI', '268', '', '', 187),
('Safflower Oil Dispersion 50% BA NSB ', '0150', '44-157A', '2021-06-05', 200, '55 Gal', 'LEI', '268', '', '', 188),
('Safflower Oil Dispersion 50% BA NSB ', '0151', '44-157A', '2021-06-09', 74.5, '30 Gal', 'LEI', '269', '', '', 189),
('Safflower Oil Dispersion 50% BA NSB ', '0151', '44-157A', '2021-06-09', 200, '55 Gal', 'LEI', '269', '', '', 190),
('LEI MODIFER S+ OMC/AB/B3', '9092', '04-27C', '2019-07-08', 12, '3.5GP', 'BEN', '299', '', 'EXPIRED', 191),
('LEI MODIFER S+ OMC/AB/B3', '9092', '04-27C', '2019-07-08', 200, '55CHD', 'BEN', '299', '', 'EXPIRED', 192),
('V-LITE DISPERSION BA NSB HA LP', '9121', '15-44A', '2019-10-01', 2.5, '2GP', 'LEI', '302', '', 'PASSED MICRO 2/10/20', 193),
('KARITE DISPERSION COMBINED', '9024', '49-113A', '2019-09-11', 16, '6GP', '', '302', '', 'PASSED MICRO 2/10/20', 194),
('KARITE DISPERSION COMBINED', '9024', '49-113A', '2019-09-11', 20, '6GP', '', '302', '', 'PASSED MICRO 2/10/20', 195),
('KARITE DISPERSION COMBINED', '9024', '49-113A', '2019-09-11', 20, '6GP', '', '302', '', 'PASSED MICRO 2/10/20', 196),
('LEI VOLATILE DISPERION 0.65 CST', '9156', '26-78A', '2020-01-11', 17, '15CHD', 'LEI- USED IN MFG0096', '311', '', 'PASSED MICRO 2/10/20', 197),
('AVOCADO OIL DISPERSION BA HL', '9134', '39-92A', '2019-08-20', 2, '3.5GP', '', '311', '', 'EXPIRED- PASSED MICRO 2/10/20', 198),
('ALGENIST MYLK DISPERSION', '9175', '73-96A', '2019-10-20', 90, '55CHD', '', '311', '', 'EXPIRED', 199),
('MODIFIER HMS/OS/AVO/OCR BA', '9348', '76-66A', '2020-04-16', 37, '15CHD', '', '314', '', '', 200),
('MODIFIER 400 Y ', '8238', '12-62A', '2018-10-25', 90.65, '30 CHD', 'LEI', '314', '', 'EXPIRED', 201),
('MODIFIER 400 Y ', '8150', '12-62A', '2018-09-01', 180, '55 CHD', 'LEI', '314', '', 'EXPIRED', 202),
('MODIFIER 400 Y ', '8238', '12-62A', '2018-10-25', 30, '55 CHD', 'LEI', '320', '', 'EXPIRED', 203),
('MODIFIER 400 Y ', '8238', '12-62A', '2018-10-25', 210, '55 CHD', 'LEI', '320', '', 'EXPIRED', 204),
('MODIFIER 400 Y ', '8238', '12-62A ', '2018-10-25', 210, '55 CHD', 'LEI', '320', '', 'EXPIRED', 205),
('MODIFIER 200 BA NSB HL LP', '9057', '15-07A', '2020-01-24', 47, '30CHD', '', '320', '', 'EXPIRED', 206),
('C AND O DISPERSION Y ', '8237', '63-101A', '2018-11-18', 138, '55 CHD', 'LEI', '323', '', 'EXPIRED', 207),
('MODIFIER 200-600 Y', '8151', '63-182A ', '2018-10-11', 96, '55 CHD', 'LEI', '323', '', 'EXPIRED', 208),
('C AND O DISPERSION Y ', '8185', '63-101A ', '2018-09-01', 20, '55 CHD', 'LEI', '323', '', 'EXPIRED', 209),
('MODIFIER 200-600 Y', '8152', '63-102A1', '2019-07-26', 6.6, '5 GP', 'LEI', '323', '', 'EXPIRED', 210),
('O AND R DISPERSION', '8426', '13-153A ', '2019-03-29', 9.5, '15 CHD', 'LEI', '323', '', 'EXPIRED', 211),
('MODIFIER 400 Y ', '8239', '12-62A', '2018-10-26', 210, '55 CHD', 'LEI', '326', '', 'EXPIRED', 212),
('MODIFIER 400 Y ', '8239', '12-62A', '2018-10-26', 211, '55 CHD', 'LEI', '326', '', 'EXPIRED', 213),
('MODIFIER 400 Y ', '8239', '12-62A', '2018-10-26', 211, '55 CHD', 'LEI', '326', '', 'EXPIRED', 214),
('MODIFIER 400 Y ', '8239', '12-62A', '2018-10-26', 102.65, '55 CHD', 'LEI', '326', '', 'EXPIRED', 215),
('COUNTERMATCH CLEANSING MILK', '7307', '64-110A', '2020-01-03', 15, '', '', '329', '', '', 216),
('MODIFIER HMS/OS/AVO/OCR BA', '9371', '76-66A', '2020-02-25', 115, '30CHD', '', '335', '', 'Expired- PASSED MICRO 2/10/20', 217),
('MODIFIER HMS/OS/AVO/OCR BA', '9363', '76-66A', '2020-02-08', 12, '3.5GP', '', '335', ' ', 'Expired- PASSED MICRO 2/10/20', 218),
('V-LITE DISPERSION BA NSB HA LP', '9353', '15-44A', '2020-02-15', 6.5, '5GP', 'LEI', '335', '', 'Expired-PASSED MICRO 2/10/20', 219),
('MODIFIER HMS/OS/AVO/OCR BA', '9371', '76-66A', '2020-02-25', 8, '6GP', '', '335', '', 'Expired-PASSED MICRO 2/10/20', 220),
('MODIFIER OC-OST BA', '9100', '64-128V2', '2019-12-01', 1.6, '2GP', '', '335', '', 'PASSED MICRO 2/10/20', 221),
('MODIFIER EHP', '9117', '06-10A', '2019-12-16', 3.5, '2GP', 'LEI', '335', '', 'Expired-PASSED MICRO 2/10/20  Combining into MFG0108.', 222),
('CANOLA OIL DISPERSION BA NSB', '9208', '16-41A', '2019-11-26', 5, '2GP', '', '335', '', '', 223),
('MODIFIER 400 HL ', '9006', '12-62A', '2019-06-18', 6, '3.5GP', 'LEI', '338', '', 'EXPIRED MATERIAL- PASSED MICRO 3/17/20  Combining into MFG0107.', 224),
('MODIFIER 400 BA NSB HL', '7023', '26-32A', '2017-06-08', 14, '5GP', '', '338', '', 'EXPIRED MATERIAL- PASSED MICRO 2/12/20', 225),
('MODIFIER EHP', '8441', '13-183C', '2019-06-11', 14.75, '6GP', 'BENTLEY', '338', '', 'EXPIRED', 226),
('CETEARYL SHEA DISPERSION BA NSB', '8381', '44-55C', '2019-03-16', 6.5, '3.5GP', '', '341', '', 'EXPIRED- PASSED MICRO 2/10/20', 227),
('LEMC', '7126', '76-06A', '2019-06-02', 41, '55OHD', '', '344', '', 'EXPIRED/RETURN FROM NCL- PASSED MICRO 2/12/20', 228),
('VEGAN MODIFIER 200 BA NSB HL LP', '0127', '78-107A', '2021-05-19', 200, '55 CHD', 'KDC', 'Floor', '', 'WAITING FOR KDC SHIPMENT', 229),
('VEGAN MODIFIER 200 BA NSB HL LP', '0127', '78-107A', '2021-05-19', 200, '55 CHD', 'KDC', 'Floor', '', 'WAITING FOR KDC SHIPMENT', 230),
('VEGAN MODIFIER 200 BA NSB HL LP', '0127', '78-107A', '2021-05-19', 200, '55 CHD', 'KDC', 'Floor', '', 'WAITING FOR KDC SHIPMENT', 231),
('VEGAN MODIFIER 200 BA NSB HL LP', '0127', '78-107A', '2021-05-19', 200, '55 CHD', 'KDC', 'Floor', '', 'WAITING FOR KDC SHIPMENT', 232),
('VEGAN MODIFIER 200 BA NSB HL LP', '0131', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 233),
('VEGAN MODIFIER 200 BA NSB HL LP', '0131', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 234),
('VEGAN MODIFIER 200 BA NSB HL LP', '0131', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 235),
('VEGAN MODIFIER 200 BA NSB HL LP', '0131', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 236),
('VEGAN MODIFIER 200 BA NSB HL LP', '0132', '78-107A', '2021-05-28', 200, '55 CHD', 'KDC', 'Floor', '', '', 237),
('VEGAN MODIFIER 200 BA NSB HL LP', '0132', '78-107A', '2021-05-28', 200, '55 CHD', 'KDC', 'Floor', '', '', 238),
('VEGAN MODIFIER 200 BA NSB HL LP', '0132', '78-107A', '2021-05-28', 200, '55 CHD', 'KDC', 'Floor', '', '', 239),
('VEGAN MODIFIER 200 BA NSB HL LP', '0132', '78-107A', '2021-05-28', 200, '55 CHD', 'KDC', 'Floor', '', '', 240),
('VEGAN MODIFIER 200 BA NSB HL LP', '0129', '78-107A', '2021-05-26', 200, '55 CHD', 'KDC', 'Floor', '', '', 241),
('VEGAN MODIFIER 200 BA NSB HL LP', '0129', '78-107A', '2021-05-26', 200, '55 CHD', 'KDC', 'Floor', '', '', 242),
('VEGAN MODIFIER 200 BA NSB HL LP', '0129', '78-107A', '2021-05-26', 200, '55 CHD', 'KDC', 'Floor', '', '', 243),
('VEGAN MODIFIER 200 BA NSB HL LP', '0129', '78-107A', '2021-05-26', 200, '55 CHD', 'KDC', 'Floor', '', '', 244),
('VEGAN MODIFIER 200 BA NSB HL LP', '0129', '78-107A', '2021-05-26', 200, '55 CHD', 'KDC', 'Floor', '', '', 245),
('VEGAN MODIFIER 200 BA NSB HL LP', '0128', '78-107A', '2021-05-22', 200, '55 CHD', 'KDC', 'Floor', '', '', 246),
('VEGAN MODIFIER 200 BA NSB HL LP', '0128', '78-107A', '2021-05-22', 200, '55 CHD', 'KDC', 'Floor', '', '', 247),
('VEGAN MODIFIER 200 BA NSB HL LP', '0128', '78-107A', '2021-05-22', 200, '55 CHD', 'KDC', 'Floor', '', '', 248),
('VEGAN MODIFIER 200 BA NSB HL LP', '0128', '78-107A', '2021-05-22', 200, '55 CHD', 'KDC', 'Floor', '', '', 249),
('VEGAN MODIFIER 200 BA NSB HL LP', '0128', '78-107A', '2021-05-22', 200, '55 CHD', 'KDC', 'Floor', '', '', 250),
('VEGAN MODIFIER 200 BA NSB HL LP', '0130', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 251),
('VEGAN MODIFIER 200 BA NSB HL LP', '0130', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 252),
('VEGAN MODIFIER 200 BA NSB HL LP', '0130', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 253),
('VEGAN MODIFIER 200 BA NSB HL LP', '0130', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 254),
('VEGAN MODIFIER 200 BA NSB HL LP', '0130', '78-107A', '2021-05-27', 200, '55 CHD', 'KDC', 'Floor', '', '', 255),
('VEGAN MODIFIER 200 BA NSB HL LP', '0135', '78-107A', '2021-06-02', 193.5, '55 CHD', 'KDC', 'Floor', '', '', 256),
('VEGAN MODIFIER 200 BA NSB HL LP', '0135', '78-107A', '2021-06-02', 200, '55 CHD', 'KDC', 'Floor', '', '', 257),
('VEGAN MODIFIER 200 BA NSB HL LP', '0133', '78-107A', '2021-05-29', 200, '55 CHD', 'KDC', 'Floor', '', '', 258),
('VEGAN MODIFIER 200 BA NSB HL LP', '0133', '78-107A', '2021-05-29', 200, '55 CHD', 'KDC', 'Floor', '', '', 259),
('VEGAN MODIFIER 200 BA NSB HL LP', '0133', '78-107A', '2021-05-29', 200, '55 CHD', 'KDC', 'Floor', '', '', 260),
('VEGAN MODIFIER 200 BA NSB HL LP', '0133', '78-107A', '2021-05-29', 200, '55 CHD', 'KDC', 'Floor', '', '', 261),
('VEGAN MODIFIER 200 BA NSB HL LP', '0133', '78-107A', '2021-05-29', 200, '55 CHD', 'KDC', 'Floor', '', '', 262),
('VEGAN MODIFIER 200 BA NSB HL LP', '0134', '78-107A', '2021-06-01', 73.5, '30 CHD', 'KDC', 'Floor', '', '', 263),
('VEGAN MODIFIER 200 BA NSB HL LP', '0134', '78-107A', '2021-06-01', 200, '55 CHD', 'KDC', 'Floor', '', '', 264),
('VEGAN MODIFIER 200 BA NSB HL LP', '0134', '78-107A', '2021-06-01', 200, '55 CHD', 'KDC', 'Floor', '', '', 265),
('VEGAN MODIFIER 200 BA NSB HL LP', '0134', '78-107A', '2021-06-01', 200, '55 CHD', 'KDC', 'Floor', '', '', 266),
('VEGAN MODIFIER 200 BA NSB HL LP', '0134', '78-107A', '2021-06-01', 200, '55 CHD', 'KDC', 'Floor', '', '', 267),
('VEGAN MODIFIER 200 BA NSB HL LP', '0134', '78-107A', '2021-06-01', 214, '55 CHD', 'KDC', 'Floor', '', '', 268),
('Vegan Soy and Echium Dispersion', '0116', '78-106A', '2021-06-10', 110, '30 Gal', 'KDC', 'Floor', '', '', 269),
('Vegan Soy and Echium Dispersion', '0116', '78-106A', '2021-06-10', 200, '55 Gal', 'KDC', 'Floor', '', '', 270),
('Vegan Soy and Echium Dispersion', '0116', '78-106A', '2021-06-10', 200, '55 Gal', 'KDC', 'Floor', '', '', 271),
('O & R DISPERSION LP ', '8072', '13-153A', '2018-09-12', 3, '', '', 'Pallet#3 for lab', '', 'EXPIRED', 272),
('CANOLA OIL DISPERSION BA NSB', '9048', '16-41A', '2019-06-28', 2.5, '2GP', 'LEI', 'Pallet#3 for lab', '', 'EXPIRED MATERIAL', 273),
('CERAMIDE BISABOLOL-CCTG DISPERSION', '8083', '59-84A', '2018-07-23', 3, '', '', 'Pallet#3 for lab', '', 'EXPIRED', 274),
('CERAMIDE BISABOLOL-CCTG DISPERSION', '8404', '59-84A', '2019-03-04', 2, '2 GP', 'LEI', 'Pallet#3 for lab', '', 'EXPIRED', 275),
('VEGAN MODIFIER 200 BA NSB HL LP', '0117', '78-107A', '2021-05-19', 200, '55CHD', 'KDC', 'Floor', '', '', 276),
('VEGAN MODIFIER 200 BA NSB HL LP', '0117', '78-107A', '2021-05-19', 200, '55CHD', 'KDC', 'Floor', '', '', 277),
('VEGAN MODIFIER 200 BA NSB HL LP', '0117', '78-107A', '2021-05-19', 110, '30CHD', 'KDC', 'Floor', '', '', 278),
('Vegan Soy and Echium Dispersion', '0136', '78-106A', '2021-06-11', 200, '55CHD', 'KDC', 'Floor', '', '', 279),
('Vegan Soy and Echium Dispersion', '0136', '78-106A', '2021-06-11', 200, '55CHD', 'KDC', 'Floor', '', '', 280),
('Vegan Soy and Echium Dispersion', '0136', '78-106A', '2021-06-11', 200, '55CHD', 'KDC', 'Floor', '', '', 281),
('Vegan Soy and Echium Dispersion', '0136', '78-106A', '2021-06-11', 200, '55CHD', 'KDC', 'Floor', '', '', 282),
('Vegan Soy and Echium Dispersion', '0136', '78-106A', '2021-06-11', 200, '55CHD', 'KDC', 'Floor', '', '', 283),
('Latent Heat Complex', '0152', '63-75A', '2021-06-12', 61, '30CHD', 'LEI', '265', '', '', 284),
('Vegan Soy and Echium Dispersion', '0136', '78-106A', '2021-06-11', 77, '30CHD', 'LEI', '265', '', '', 285);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dispersion_Inventory`
--
ALTER TABLE `Dispersion_Inventory`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Dispersion_Inventory`
--
ALTER TABLE `Dispersion_Inventory`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;