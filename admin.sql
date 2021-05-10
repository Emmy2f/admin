-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 09:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

CREATE TABLE `adminmaster` (
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminmaster`
--

INSERT INTO `adminmaster` (`email`, `password`) VALUES
('admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `bedallocationstatus`
--

CREATE TABLE `bedallocationstatus` (
  `bedNumber` varchar(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bedallocationstatus`
--

INSERT INTO `bedallocationstatus` (`bedNumber`, `status`) VALUES
('A111', 1),
('A112', 1),
('A113', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bedmaster`
--

CREATE TABLE `bedmaster` (
  `bedNumber` varchar(4) NOT NULL,
  `roomNumber` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bedmaster`
--

INSERT INTO `bedmaster` (`bedNumber`, `roomNumber`) VALUES
('A111', '101'),
('A112', '002'),
('A113', '003'),
('A116', '601');

-- --------------------------------------------------------

--
-- Table structure for table `blogimages`
--

CREATE TABLE `blogimages` (
  `blogId` int(11) NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogmaster`
--

CREATE TABLE `blogmaster` (
  `blogId` int(11) NOT NULL,
  `blogTitle` varchar(50) NOT NULL,
  `blogCategory` varchar(20) NOT NULL,
  `blogStatus` int(1) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departmentmaster`
--

CREATE TABLE `departmentmaster` (
  `deptId` int(11) NOT NULL,
  `deptName` varchar(30) NOT NULL,
  `deptHead` int(11) NOT NULL,
  `deptContact` varchar(10) NOT NULL,
  `deptDesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departmentmaster`
--

INSERT INTO `departmentmaster` (`deptId`, `deptName`, `deptHead`, `deptContact`, `deptDesc`) VALUES
(1, 'Cardiology', 4, '9865784545', 'Provides medical care to patients who have problems with their heart or circulation.'),
(2, 'Gynecology', 3, '6758674896', 'Investigates and treats problems relating to the female urinary tract and reproductive organs, such '),
(3, 'General Surgery', 7, '6785768999', 'Covers a wide range of types of surgery and procedures on patients.'),
(4, 'Oncology', 5, '7869786978', 'A branch of medicine that deals with cancer and tumors. A medical professional who practices oncolog'),
(5, 'Otolaryngology (Ear, Nose, and', 8, '9879006788', 'The ENT Department provide comprehensive and specialized care covering both Medical and Surgical con'),
(6, 'Admissions', 2, '8796879098', 'At the Admitting Department, the patient will be required to provide personal information and sign c'),
(7, 'General Services', 2, '6688786908', 'Support Services include services provided by Departments such as Portering, Catering, Housekeeping,');

-- --------------------------------------------------------

--
-- Table structure for table `doctoravailability`
--

CREATE TABLE `doctoravailability` (
  `doctorId` int(11) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursady','Friday','Saturday','Sunday') NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctoravailability`
--

INSERT INTO `doctoravailability` (`doctorId`, `day`, `startTime`, `endTime`) VALUES
(2, 'Monday', '10:00:00', '18:00:00'),
(2, 'Tuesday', '10:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctoravailabilitydays`
--

CREATE TABLE `doctoravailabilitydays` (
  `doctorId` int(11) NOT NULL,
  `Monday` int(11) NOT NULL,
  `Tuesday` int(11) NOT NULL,
  `Wednesday` int(11) NOT NULL,
  `Thursday` int(11) NOT NULL,
  `Friday` int(11) NOT NULL,
  `Saturday` int(11) NOT NULL,
  `Sunday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctoravailabilitydays`
--

INSERT INTO `doctoravailabilitydays` (`doctorId`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`) VALUES
(2, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctorcharges`
--

CREATE TABLE `doctorcharges` (
  `DoctorID` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `charges` double NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctormaster`
--

CREATE TABLE `doctormaster` (
  `doctorId` int(11) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `middleName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `registrationNumber` varchar(9) NOT NULL,
  `contactNumber` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `password` varchar(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dateOfJoining` date NOT NULL,
  `marital` int(11) NOT NULL,
  `qualificationID` int(11) NOT NULL,
  `specializationID` int(11) NOT NULL,
  `uploadedImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctormaster`
--

INSERT INTO `doctormaster` (`doctorId`, `firstName`, `middleName`, `lastName`, `registrationNumber`, `contactNumber`, `email`, `gender`, `dateOfBirth`, `password`, `address`, `dateOfJoining`, `marital`, `qualificationID`, `specializationID`, `uploadedImage`) VALUES
(2, 'Avinash', 'Vasant', 'Sabharwal', '2020', '9675787845', 'avisab@gmail.com', 0, '1996-01-01', 'Avi@!34', '222,Surya Apartment,Station Road, Navsari', '2021-05-08', 0, 1, 5, 'doctor/indian-latin-doctor-expertise-smiling-hospital-20118258.jpg'),
(3, 'Vanshita', 'Narayan', 'Gandhi', '3956', '9456321567', 'vanshita@gmail.com', 1, '1988-05-05', '', '101,Shivteerth Residency, Tankal', '2021-04-25', 1, 2, 7, 'doctor/2.jpeg'),
(4, 'Jagdish', 'Mohan', 'Gandhi', '5674', '9876578960', 'jadgishdr@gmail.com', 0, '1984-05-17', '', 'Kesali,Luhar Faliya', '2021-04-25', 1, 3, 2, 'doctor/ramukakak.jpg'),
(5, 'Vipul', 'Navin', 'Aggarwal', '5634', '6321897068', 'vipuldr45@gmail.com', 0, '1991-02-12', '', '21,Sunflower Society,Chikhli', '2021-03-31', 0, 3, 4, 'doctor/indian-doctor-with-stethoscope-hospital-room_94347-7.jpg'),
(6, 'Sanjeev', 'Keshav', 'Arora', '5675', '9876758465', 'sanjjev@gmal.com', 0, '1993-02-02', '', '301,MG Road,Navsari', '2021-05-09', 0, 1, 1, 'doctor/9.jpg'),
(7, 'Mihika', 'Rakesh', 'Bhandari', '5647', '6574896784', 'bhandarim@gmail.com', 1, '1993-12-27', '', '202,Shiddhishila Apartment,Bardoli', '2021-03-29', 1, 3, 6, 'doctor/newdoc.jpg.jpg'),
(8, 'Kailash', 'Raghav', 'Bose', '5467', '8767540129', 'kailash@gmail.com', 1, '1986-06-25', '', 'Nandarkha,Ugamana Faliya,Navsari', '2021-04-09', 1, 2, 8, 'doctor/4.jpeg'),
(9, 'Santi', 'Vipul', 'Roy', '4563', '8675467584', 'santi@yahoo.com', 1, '1991-02-14', '', '303,New heights,Surat', '2021-04-02', 0, 1, 9, 'doctor/7.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackmaster`
--

CREATE TABLE `feedbackmaster` (
  `feedbackId` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(100) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbackmaster`
--

INSERT INTO `feedbackmaster` (`feedbackId`, `title`, `description`, `rating`, `date`) VALUES
(1, 'Dirty Rooms', 'I stayed in room 101 for 5 days and no cleaning was done for 5 days	', '1', '2021-05-03'),
(2, 'Excellent Staff', 'The staff were very kind and helpful	', '4', '2021-04-20'),
(3, 'Spacious and well furnished rooms', 'The rooms are spacious and very well maintained.	', '5', '2021-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `inpatientmaster`
--

CREATE TABLE `inpatientmaster` (
  `patientId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `bedNumber` int(11) NOT NULL,
  `admittedDate` date NOT NULL,
  `dischargeDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `outpatientmaster`
--

CREATE TABLE `outpatientmaster` (
  `patientId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patientmaster`
--

CREATE TABLE `patientmaster` (
  `patientId` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `contactNumber` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `registrationDate` date NOT NULL,
  `marital` int(1) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientmaster`
--

INSERT INTO `patientmaster` (`patientId`, `firstName`, `middleName`, `lastName`, `contactNumber`, `email`, `gender`, `address`, `dateOfBirth`, `registrationDate`, `marital`, `password`) VALUES
(1, 'Ravi', 'Rajeshkumar', 'Patel', '9879771911', 'ravi23@yahoo.com', 0, 'Nandarkha', '2021-04-27', '2021-05-09', 0, 'Ravi@34');

-- --------------------------------------------------------

--
-- Table structure for table `qualificationmaster`
--

CREATE TABLE `qualificationmaster` (
  `qualificationId` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualificationmaster`
--

INSERT INTO `qualificationmaster` (`qualificationId`, `name`) VALUES
(1, 'MBBS'),
(2, 'MD'),
(3, 'MS');

-- --------------------------------------------------------

--
-- Table structure for table `roommaster`
--

CREATE TABLE `roommaster` (
  `roomNumber` varchar(3) NOT NULL,
  `floor` enum('Ground','1','2','3','4','5','6') NOT NULL,
  `roomTypeId` varchar(3) NOT NULL,
  `numberOfBeds` int(11) NOT NULL,
  `costPerDay` double NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roommaster`
--

INSERT INTO `roommaster` (`roomNumber`, `floor`, `roomTypeId`, `numberOfBeds`, `costPerDay`, `description`) VALUES
('001', 'Ground', 'RT2', 1, 1000, 'single bed with AC and attached bathroom'),
('002', 'Ground', 'RT2', 1, 1000, 'single bed with AC and attached bathroom'),
('003', 'Ground', 'RT2', 1, 1000, 'single bed with AC and attached bathroom'),
('101', '1', 'RT1', 6, 500, 'It has 6 beds with fan, 2 extra chairs and common bathroom'),
('102', '1', 'RT1', 6, 500, 'It has 6 beds with fan, 2 extra chairs and common bathroom'),
('501', '5', 'RT4', 1, 3500, 'It has a single bed with oxygen facility, a guest bed and AC. It has attached washroom.\r\n'),
('502', '5', 'RT4', 1, 3500, 'It has a single bed with oxygen facility, a guest bed and AC. It has attached washroom.\r\n\r\n'),
('601', '6', 'RT5', 1, 5000, 'It has a single bed with oxygen facility, a guest bed, sofa, AC and Refrigerator. It has attached washroom.\r\n'),
('602', '6', 'RT5', 1, 5000, 'It has a single bed with oxygen facility, a guest bed, sofa, AC and Refrigerator. It has attached washroom.\r\n'),
('603', '6', 'RT5', 1, 5000, 'It has a single bed with oxygen facility, a guest bed, sofa, AC and Refrigerator. It has attached washroom.\r\n'),
('604', '6', 'RT5', 1, 5000, 'It has a single bed with oxygen facility, a guest bed, sofa, AC and Refrigerator. It has attached washroom.\r\n'),
('605', '6', 'RT5', 1, 5000, 'It has a single bed with oxygen facility, a guest bed, sofa, AC and Refrigerator. It has attached washroom.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `roomTypeId` varchar(3) NOT NULL,
  `roomType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`roomTypeId`, `roomType`) VALUES
('RT1', 'General'),
('RT2', 'Private'),
('RT3', 'Sharing'),
('RT4', 'Deluxe'),
('RT5', 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `specializationmaster`
--

CREATE TABLE `specializationmaster` (
  `specializationID` int(11) NOT NULL,
  `specializationName` varchar(30) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specializationmaster`
--

INSERT INTO `specializationmaster` (`specializationID`, `specializationName`, `description`) VALUES
(1, 'Allergists', 'They treat immune system disorders such as asthma, eczema, food allergies, insect sting allergies,etc.'),
(2, 'Cardiologists', 'They’re experts on the heart and blood vessels. You might see them for heart failure or a heart attack'),
(3, 'Neurologists', 'These are specialists in the nervous system, which includes the brain, spinal cord, and nerves.'),
(4, 'Oncologists', 'These internists are cancer specialists. They do chemotherapy treatments and often work with radiation therapy'),
(5, 'General Physicians', 'They conduct regular patient check-ups of patients, diagnose any ailments, prescribe medications, and counsel them on diet, hygiene, and preventive healthcare.'),
(6, 'General Surgeon', 'They treat patients with acute problems in different body areas, such as the digestive tract, skin or abdomen. Some surgeons specialize in specific areas of medicine, like oncology, pediatrics, organ transplant, orthopedics, and trauma. '),
(7, 'Gynecologist', 'A gynecologist treats the overall health of their female patients, treating problems and diseases of the female reproductive system. '),
(8, 'ENT Specialist', 'ENT Specialists focus on areas related to ear, nose, and throat, and sometimes even ailments related to the neck or the head.'),
(9, 'Pediatricians', 'They examine children regularly to assess their growth and development. Pediatricians provide a wide range of services, from preventative health (e.g. immunizations and health screenings) to the diagnosis, assessment, and treatment of serious illnesses and diseases.');

-- --------------------------------------------------------

--
-- Table structure for table `staffmaster`
--

CREATE TABLE `staffmaster` (
  `staffID` int(11) NOT NULL,
  `staffFName` varchar(12) NOT NULL,
  `staffMName` varchar(15) NOT NULL,
  `staffLName` varchar(12) NOT NULL,
  `contactNumber` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` int(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `dateOfJoining` date NOT NULL,
  `maritalStatues` int(1) NOT NULL,
  `staffTypeId` int(11) NOT NULL,
  `staffImage` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffmaster`
--

INSERT INTO `staffmaster` (`staffID`, `staffFName`, `staffMName`, `staffLName`, `contactNumber`, `email`, `gender`, `address`, `dateOfBirth`, `dateOfJoining`, `maritalStatues`, `staffTypeId`, `staffImage`, `password`) VALUES
(19, 'Archi', 'Jayeshkumar', 'Patel', '9879771911', 'archi@gmail.com', 1, '301,Shiv Society,Bilimora', '2001-01-01', '2021-04-08', 0, 2, 'staff/user-05.jpg', 'Arch@12'),
(20, 'Richa', 'Ritesh', 'Patel', '9864567210', 'richa45@gmail.com', 1, '31,Jalaram Complex,Chikhli', '1992-05-24', '2021-04-21', 1, 1, 'staff/5.jpeg', ''),
(21, 'Radhika', 'Kishorbhai', 'Savaliya', '9537270890', 'radhika@yahoo.com', 1, '100,Mahavir Complex,Bardoli', '1991-10-25', '2021-04-22', 1, 2, 'staff/6.jpeg', ''),
(22, 'Aakash', 'Navinbhai', 'Patel', '9878967890', 'aakash34@gmail.com', 0, 'Navsari', '1993-10-08', '2021-05-02', 1, 3, 'staff/201903100110119_1.png', 'Aakash@12'),
(23, 'Meet', 'Rakesh', 'Gandhi', '6789789609', 'meet@gmail.com', 0, '222,Surya Apartment,Station Road, Navsari', '1991-06-20', '2021-05-21', 1, 1, 'staff/1.jpg', 'Meet#23'),
(24, 'Kiara', 'Mehul', 'Mistry', '9876859678', 'kiara@gmail.com', 1, '22,Ramji Society, Bardoli', '1983-06-15', '2021-05-13', 0, 1, 'staff/7.jpeg', 'Kia#23'),
(25, 'Kriti', 'Elvish', 'Mehra', '8769078967', 'kriti@gmail.com', 1, '76,Surya Society,Mahuva', '1992-06-09', '2021-05-10', 0, 2, 'staff/WhatsApp Image 2021-04-24 at 8.28.28 PM.jpeg', 'Kriti#45'),
(26, 'Mehul', 'Ravindra', 'Desai', '8887968798', 'ravi@gmail.com', 0, 'Nandarkha', '1994-06-09', '2021-05-13', 0, 1, 'staff/th_3.jpg', 'Meh@345');

-- --------------------------------------------------------

--
-- Table structure for table `stafftypemaster`
--

CREATE TABLE `stafftypemaster` (
  `staffTypeId` int(11) NOT NULL,
  `staffType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stafftypemaster`
--

INSERT INTO `stafftypemaster` (`staffTypeId`, `staffType`) VALUES
(1, 'Receptionist'),
(2, 'Nurse'),
(3, 'Ward Boy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept_staff`
--

CREATE TABLE `tbl_dept_staff` (
  `deptId` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dept_staff`
--

INSERT INTO `tbl_dept_staff` (`deptId`, `staffID`) VALUES
(2, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmaster`
--
ALTER TABLE `adminmaster`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `bedallocationstatus`
--
ALTER TABLE `bedallocationstatus`
  ADD PRIMARY KEY (`bedNumber`);

--
-- Indexes for table `bedmaster`
--
ALTER TABLE `bedmaster`
  ADD PRIMARY KEY (`bedNumber`,`roomNumber`),
  ADD KEY `roomNumber` (`roomNumber`);

--
-- Indexes for table `blogimages`
--
ALTER TABLE `blogimages`
  ADD KEY `blogId` (`blogId`);

--
-- Indexes for table `blogmaster`
--
ALTER TABLE `blogmaster`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `departmentmaster`
--
ALTER TABLE `departmentmaster`
  ADD PRIMARY KEY (`deptId`),
  ADD KEY `deptHead` (`deptHead`);

--
-- Indexes for table `doctoravailability`
--
ALTER TABLE `doctoravailability`
  ADD KEY `doctorId` (`doctorId`);

--
-- Indexes for table `doctoravailabilitydays`
--
ALTER TABLE `doctoravailabilitydays`
  ADD KEY `doctorId` (`doctorId`);

--
-- Indexes for table `doctormaster`
--
ALTER TABLE `doctormaster`
  ADD PRIMARY KEY (`doctorId`),
  ADD KEY `Foreign Qualification` (`qualificationID`),
  ADD KEY `Foreign Specialization` (`specializationID`);

--
-- Indexes for table `feedbackmaster`
--
ALTER TABLE `feedbackmaster`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `patientmaster`
--
ALTER TABLE `patientmaster`
  ADD PRIMARY KEY (`patientId`);

--
-- Indexes for table `qualificationmaster`
--
ALTER TABLE `qualificationmaster`
  ADD PRIMARY KEY (`qualificationId`);

--
-- Indexes for table `roommaster`
--
ALTER TABLE `roommaster`
  ADD PRIMARY KEY (`roomNumber`),
  ADD KEY `roomTypeId` (`roomTypeId`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`roomTypeId`);

--
-- Indexes for table `specializationmaster`
--
ALTER TABLE `specializationmaster`
  ADD PRIMARY KEY (`specializationID`);

--
-- Indexes for table `staffmaster`
--
ALTER TABLE `staffmaster`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `staffType Foreign` (`staffTypeId`);

--
-- Indexes for table `stafftypemaster`
--
ALTER TABLE `stafftypemaster`
  ADD PRIMARY KEY (`staffTypeId`);

--
-- Indexes for table `tbl_dept_staff`
--
ALTER TABLE `tbl_dept_staff`
  ADD PRIMARY KEY (`deptId`,`staffID`),
  ADD KEY `staff foreign` (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogmaster`
--
ALTER TABLE `blogmaster`
  MODIFY `blogId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departmentmaster`
--
ALTER TABLE `departmentmaster`
  MODIFY `deptId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctormaster`
--
ALTER TABLE `doctormaster`
  MODIFY `doctorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedbackmaster`
--
ALTER TABLE `feedbackmaster`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patientmaster`
--
ALTER TABLE `patientmaster`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qualificationmaster`
--
ALTER TABLE `qualificationmaster`
  MODIFY `qualificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specializationmaster`
--
ALTER TABLE `specializationmaster`
  MODIFY `specializationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staffmaster`
--
ALTER TABLE `staffmaster`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `stafftypemaster`
--
ALTER TABLE `stafftypemaster`
  MODIFY `staffTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bedallocationstatus`
--
ALTER TABLE `bedallocationstatus`
  ADD CONSTRAINT `bedallocationstatus_ibfk_1` FOREIGN KEY (`bedNumber`) REFERENCES `bedmaster` (`bedNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bedmaster`
--
ALTER TABLE `bedmaster`
  ADD CONSTRAINT `bedmaster_ibfk_1` FOREIGN KEY (`roomNumber`) REFERENCES `roommaster` (`roomNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blogimages`
--
ALTER TABLE `blogimages`
  ADD CONSTRAINT `blogimages_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blogmaster` (`blogId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departmentmaster`
--
ALTER TABLE `departmentmaster`
  ADD CONSTRAINT `deptHead` FOREIGN KEY (`deptHead`) REFERENCES `doctormaster` (`doctorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctoravailability`
--
ALTER TABLE `doctoravailability`
  ADD CONSTRAINT `doctoravailability_ibfk_1` FOREIGN KEY (`doctorId`) REFERENCES `doctormaster` (`doctorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctoravailabilitydays`
--
ALTER TABLE `doctoravailabilitydays`
  ADD CONSTRAINT `doctoravailabilitydays_ibfk_1` FOREIGN KEY (`doctorId`) REFERENCES `doctormaster` (`doctorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctormaster`
--
ALTER TABLE `doctormaster`
  ADD CONSTRAINT `Foreign Qualification` FOREIGN KEY (`qualificationID`) REFERENCES `qualificationmaster` (`qualificationId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Foreign Specialization` FOREIGN KEY (`specializationID`) REFERENCES `specializationmaster` (`specializationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roommaster`
--
ALTER TABLE `roommaster`
  ADD CONSTRAINT `roommaster_ibfk_1` FOREIGN KEY (`roomTypeId`) REFERENCES `roomtype` (`roomTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffmaster`
--
ALTER TABLE `staffmaster`
  ADD CONSTRAINT `staffType Foreign` FOREIGN KEY (`staffTypeId`) REFERENCES `stafftypemaster` (`staffTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dept_staff`
--
ALTER TABLE `tbl_dept_staff`
  ADD CONSTRAINT `dept foreign` FOREIGN KEY (`deptId`) REFERENCES `departmentmaster` (`deptId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff foreign` FOREIGN KEY (`staffID`) REFERENCES `staffmaster` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
