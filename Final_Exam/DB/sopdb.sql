-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2023 at 08:18 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `proceduresteps`
--

CREATE TABLE `proceduresteps` (
  `stepID` int(11) NOT NULL,
  `procID` int(11) NOT NULL,
  `stepDescription` text NOT NULL,
  `stepFees` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proceduresteps`
--

INSERT INTO `proceduresteps` (`stepID`, `procID`, `stepDescription`, `stepFees`) VALUES
(1, 1, 'الحصول على نموذج براءة الذمة من التسجيل', 0),
(1, 2, 'الحصول على نموذج لطلب المادة البديلة من القسم', 0),
(1, 3, 'الحصول على نموذج طلب تحويل التخصص من رئيس القسم', 0),
(1, 4, 'الذهاب الى المالية لدفع رسم كشف العلامات ', 1),
(1, 5, 'الذهاب الى المالية لدفع رسم ورقة اثبات الطالب', 3),
(1, 6, 'الحصول على نموذج الانسحاب من دراسة الفصل من رئيس القسم ', 0),
(2, 1, 'تعبئة النموذج والتأكد من البيانات', 0),
(2, 2, 'تعبئة القسم الخاص بالطالب بالمعلومات المطلوبة', 0),
(2, 3, 'تعبئة المعلومات الخاصة بالطالب ', 0),
(2, 4, 'الذهاب الى مسجلة القسم لاخراج كشف العلامات ', 0),
(2, 5, 'الذهاب الى مسجلة القسم لاخراج ورقة اثبات الطالب \r\n(التأكد من احضار الهوية لتعبأة المعلومات بالشكل الصحيح)', 0),
(2, 6, 'تعبئة المعلومات الخاصة بالطالب', 0),
(3, 1, 'ختم النموذج من المسجل', 0),
(3, 2, ' والذهاب لمبنى القبول والتسجيل لتعبئة المعلومات الخاصة بهم\r\nوالتأكد من استيفاء الشروط المطلوبة\r\nوالحصول على برنامج المواد للطالب', 0),
(3, 3, 'تعبئة المعلومات الخاصة بالجهات المعنية (مسجلة القسم , رئيس القسم , عميد الكلية , المرشد الاكاديمي)', 0),
(3, 6, 'الذهاب الى دائرة القبول والتسجيل لتعبأة المعلومات الخاصة ب مسجل التخصص', 0),
(4, 1, 'اعماد النموذج من المكتبة و المالية و العيادة', 0),
(4, 2, 'الحصول على موافقة من رئيس القسم ', 0),
(4, 3, 'الحصول على موافقة من مدير دائرة القبول والتسجيل', 0),
(4, 6, 'الحصول على موافقة الجهات المعنية (المرشد الاكاديمي , الجهة الباعثة , رئيس القسم , وعميد الكلية )', 0),
(5, 1, 'ختم النموذج من القسم والكلية', 0),
(5, 2, 'الحصول على موافقة من عميد الكلية ', 0),
(5, 6, 'الحصول على موافقة مدير دائرة القبول والتسجيل', 0),
(6, 2, 'الحصول على موافقة من رئيس القبول والتسجيل ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `theprocedure`
--

CREATE TABLE `theprocedure` (
  `procID` int(11) NOT NULL,
  `procDescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theprocedure`
--

INSERT INTO `theprocedure` (`procID`, `procDescription`) VALUES
(1, 'اجراءات الحصول على براءة الذمة'),
(2, 'التقدم لطلب مادة بديلة'),
(3, 'طلب تحويل تخصص'),
(4, 'الحصول على كشف علامات '),
(5, 'الحصول على اثبات طالب'),
(6, 'الانسحاب من دراسة فصل ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `stNumber` bigint(11) NOT NULL,
  `stFirstName` varchar(20) NOT NULL,
  `stSecondName` varchar(20) NOT NULL,
  `stFamilyName` varchar(30) NOT NULL,
  `stPassWord` varchar(50) DEFAULT NULL,
  `stPassText` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`stNumber`, `stFirstName`, `stSecondName`, `stFamilyName`, `stPassWord`, `stPassText`) VALUES
(556644, 'Admin', 'Admin', 'Admin', '24c1f4b4103e7017eccfe8baf33202f27fa4c197', '112233445566'),
(320190112021, 'Ahmad', 'Abdullah', 'Zaghameem', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456'),
(320190112022, 'Omar', 'Abdullah', 'Zaghameem', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234'),
(320190112030, 'mohammed', 'nidal', 'dafor', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proceduresteps`
--
ALTER TABLE `proceduresteps`
  ADD PRIMARY KEY (`stepID`,`procID`);

--
-- Indexes for table `theprocedure`
--
ALTER TABLE `theprocedure`
  ADD PRIMARY KEY (`procID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`stNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
