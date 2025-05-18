-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 03:35 AM
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
-- Database: `pharmacy_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(250) NOT NULL,
  `AdminUsername` varchar(250) NOT NULL,
  `AdminPassword` varchar(13) NOT NULL,
  `AdminEmail` varchar(250) NOT NULL,
  `AdminImage` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `AdminUsername`, `AdminPassword`, `AdminEmail`, `AdminImage`) VALUES
(1, 'Ziki', 'admin', '11223344abc', 'ziki@gmail.com', 'AdminPic/jq.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductCode` varchar(20) NOT NULL,
  `ProductName` varchar(250) NOT NULL,
  `ProductQuantity` int(12) NOT NULL,
  `ProductPrice` varchar(12) NOT NULL,
  `ProductDescription` varchar(1000) NOT NULL,
  `ProductImage` varchar(250) NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductCode`, `ProductName`, `ProductQuantity`, `ProductPrice`, `ProductDescription`, `ProductImage`, `AdminID`) VALUES
(22, 'M001', 'Medicos Face Mask White 50s', 41, '30.50', 'It is MEDICOS 4 Ply Lumi Series Surgical Face Mask Snow White 50s, ultra soft series, 50pcs/box, has elastic ear loops.', 'Storage/Medicos_mask_white.jpg', 1),
(23, 'P001', 'Panadol Regular Tablets', 40, '13', 'It is paracetamol-based. It provides gentle and suitable relief of pain and discomfort, relieve fever. The active ingredients includes 500mg of Paracetamol.', 'Storage/panadol_tablet.jpg', 1),
(24, 'Y001', 'Yu Yee Oil Cap Limau', 47, '23', 'For external use only, Keep out of reach of children. Consult a physician if symptom does not improve. Store at temperature (25-30 degree Celsius).', 'Storage/yuyeeoil.jpg', 1),
(25, 'Y002', 'Yasmin Tablet 21s', 15, '50', 'It is a contraceptive pill and used to prevent pregnancy.', 'Storage/yasmin_tablet.jpeg', 1),
(26, 'P002', 'Plevix 75mg Tablet', 35, '115', 'It is an antiplatelet drug to prevent blood cloths. It keeps platelets in the blood from coming together and making clots.', 'Storage/plevix_75mg.jpg', 1),
(27, 'D001', 'Dettol Original Body Wash 950ml', 55, '15', 'It provides protection against germs. For external use only. Keep out of reach of children unless under adult supervision. Not to be used for children under 3 years of age. Avoid direct contact with eyes.', 'Storage/dettol_body_wash.jpg', 1),
(28, 'R001', 'Rejoice Hair Shampoo 600ml', 51, '14', 'It keeps your hair tangle-free and fragrant. It provides the cleaning of the scalp skin and hair.', 'Storage/rejoice_600ml.jpg', 1),
(29, 'B001', 'Biore UV Aqua Rich Watery Essenve Spf50+ 50g', 31, '28', 'Watery light sunscreen with invisibly powerful UV defense for daily use. Formulated with revolutionary Worlds First Technology, this unique formulation spreads evenly on skin to fend off harmful UV rays even at micro level. Upon application, it forms an even coverage of seamless netting invisibly strong protective veil against UV rays, providing advanced beauty protection from premature ageing.', 'Storage/bioreuv_50g.jpeg', 1),
(31, 'B002', 'Blockmores Vitamin C 500mg 60s', 34, '42', 'Blackmores Vitamin C 500 is a dietary supplement that provides vitamin C in the form of ascorbic acid. This easy-to-swallow tablet is suitable for those who require additional vitamin C for general health and wellbeing of the body.', 'Storage/blackmores_vitaminc.jpeg', 1),
(32, 'D002', 'Dettol Hand Sanitizer Original 50ml', 68, '10', 'Simple, fast and effective, Dettol Instant Hand Sanitisers help protect against 99.99% of germs, with no need for soap or water. The rinse free, non-sticky formula makes it a great hygiene solution for mums and families needing on-the-go protection, no matter where you are in your busy day.', 'Storage/dettol_hand.jpg', 1),
(33, 'T001', 'Tai Yi Yuan Watermelon Plus Spray 2G', 48, '6', 'Traditionally used for relief sore throat, toothaches and mouth ulcers due to heatiness.', 'Storage/watermelon_plus_spray.jpg', 1),
(34, 'M002', 'My Scheming Hyaluronan Hydrating Black Mask 5s', 42, '20', 'Hyaluronan provides moisturizing power to skin and can effectively improve rough, dry, and cracked skin conditions. Pure hyaluronan provides refreshing sensation when using and can be easily absorbed by your skin and can thus provide your skin with the additional moisture it needs with a silky, smooth touch.', 'Storage/black_mask.jpeg', 1),
(35, 'B003', 'Bye Bye Fever Children 6s + 2s', 30, '15', 'It consists of a single use cooling gel sheet with cooling effects lasting up to 10 hours. It is skin-friendly and safe to use with other medications. The strong and immediate chilling feeling aids in the lowering of high temperatures over the forehead.', 'Storage/byebye_fever.png', 1),
(36, 'S001', 'Silkygirl No-Sebum Mineral Powder 1s', 80, '17', 'A silky soft textured no sebum powder that contains Sebum Catcher to abosrb excess sebum, power-packed with natural minerals and ingredients - for a shine-free, bright and smooth skin.', 'Storage/sillygirl.jpg', 1),
(37, 'S002', 'Systane Hydration Eye Drops 10ml', 68, '36', 'For the temporary relief of burning and irritation due to dryness of the eye. May be used to lubricate and rewet daily, extended wear, and disposable silicone hydrogel and soft (hydrophilic) contact lenses.', 'Storage/systane_eye_drop.jpeg', 1),
(38, 'C001', 'Cap Ibu & Anak Ubat ', 58, '10', 'It is traditionally used for symptomatic relief of cough, phlegm, sore throat & body heatiness. Suitable for pregnant women. Sip without water for better effect, or dissolve the syrup in warm water and drink slowly. Keeping the preparation in the refrigerator will enhance the cooling and soothing effect of the preparation on the throat especially hot weather.', 'Storage/ubat_batuk.jpg', 1),
(39, 'R002', 'Redoxon Orange Effer', 40, '40', 'Special combination of Vitamin C, D, B6 and Calcium for bone health support. Calcium helps in the formation and maintenance of bones & teeth. Vitamin D helps our body’s utilization of calcium. For everyday use. Orange flavour effervescent tablets for quick absorption. No added sugar. No preservatives.', 'Storage/redoxon.jpg', 1),
(40, 'H001', 'Hansaplast Elastic 20s', 100, '5', 'For covering & protection of minor, everyday wound such as scratches, cuts & grazes. Extra flexible & breathable with strong adhesion in textile texture. Ideal for joints. Clean wound & gently dry skin. Apply without stretching.', 'Storage/handsaplast.jpg', 1),
(41, 'B004', 'Bausch & Lomb Renu Fresh Multi Purpose Solution 3 x 355ml', 30, '40', 'Experience the feeling of wearing a fresh pair of lenses cushioned in moisture everyday. Clean, rinse, disinfect, remove protein and store your lenses with one bottle – renu.', 'Storage/bausch.jpg', 1),
(42, 'J001', 'Johnsons Baby Bedtime Powder 500g', 62, '15', 'Clinically proven to help babies sleep better. A soothing nightly ritual can help send your growing baby to dreamland. Our product compliments your baby bedtime routine for a comfortable night sleep.', 'Storage/johnson_baby)powder.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SalesID` int(12) NOT NULL,
  `SalesQuantity` int(12) NOT NULL,
  `SalesDate` date NOT NULL,
  `SalesTime` varchar(225) NOT NULL,
  `ProductID` int(20) NOT NULL,
  `StaffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SalesID`, `SalesQuantity`, `SalesDate`, `SalesTime`, `ProductID`, `StaffID`) VALUES
(4, 2, '2023-06-24', '05:40:52 PM', 28, 1),
(5, 2, '2023-06-24', '05:41:01 PM', 22, 1),
(6, 10, '2023-06-26', '05:04:34 AM', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(12) NOT NULL,
  `StaffName` varchar(250) NOT NULL,
  `StaffUsername` varchar(250) NOT NULL,
  `StaffPassword` varchar(20) NOT NULL,
  `StaffGender` varchar(20) NOT NULL,
  `StaffAge` int(11) NOT NULL,
  `StaffIC` varchar(20) NOT NULL,
  `StaffEmail` varchar(225) NOT NULL,
  `StaffContactNo` varchar(20) NOT NULL,
  `StaffImage` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `StaffUsername`, `StaffPassword`, `StaffGender`, `StaffAge`, `StaffIC`, `StaffEmail`, `StaffContactNo`, `StaffImage`) VALUES
(1, 'Blablabla', 'staff', '11223344abc', 'Female', 20, '820213065432', 'blablabla@gmail.com', '0132349876', 'StaffPic/jq.jpg'),
(2, 'KaiLing', 'ling', '12345', 'Female', 18, '820213065432', 'ling@abc.com', '0132349876', 'Storage/profilepicture.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SalesID`),
  ADD KEY `StaffID` (`StaffID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SalesID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
