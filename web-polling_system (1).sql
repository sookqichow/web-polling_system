-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2023 at 01:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-polling_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_pass` varchar(40) NOT NULL,
  `admin_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidates`
--

CREATE TABLE `tbl_candidates` (
  `candidate_id` int(50) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `candidate_manifesto` varchar(2000) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `candidate_vote` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_candidates`
--

INSERT INTO `tbl_candidates` (`candidate_id`, `candidate_name`, `candidate_manifesto`, `school_id`, `school_name`, `candidate_vote`) VALUES
(1, 'Farisha Rabiha Binti Zainal', '1. Memperjuangkan untuk membaik pulih semula gerai jualan yang sedia ada di SBM\r\n2. Memperjuangkan untuk melaksanakan inisiatif SBM Prihatin\r\n', 1, 'School of Business Management', 0),
(2, 'Vimalanathan A/L Murugesosn', '1. Memberi peluang kepada warga SBM untuk berniaga di Kawasan SBM.\r\n2. Menyediakan saluran rasmi yang strategik untuk menyampaikan informasi yang penting kepada warga SBM.', 1, 'School of Business Management', 3),
(3, 'Tan Soon Yao', '1. Memanfaatkan sepenuh fasiliti-fasiliti di kawasan bangunan SBM \r\n2. Mengadakan banyak program keusahawanan dengan kerjasama cedi dan korporat swasta, untuk memberi peluang pelajar menseburi bidang keusahawanan.\r\n3. Menyediakan saluran aduan secara atas talian serta fizikal yang lebih berkesan dan mesra pelajar. \r\n4. Menyediakan perkhidmatan fotostat untuk pelajar di kawasan bangunan SBM, keuntungan disalur kepada program kebajikan pelajar.\r\n5. Membina hubungan antara syarikat dalam industri pengurusan perniagaan dengan SBM untuk memberi acara untuk belajar ilmu pengetahuan industri dan membekalkan peluang praktikum. ', 1, 'School of Business Management', 2),
(4, 'Abdul Fattah bin Zaid Arafat', '1. Memperkenalkan sistem pembelajaran share to score dalam kalangan pelajar IBS\r\n2. Memberi nilai tambah kepada pelajar-pelajar IBS daripada aspek permintaan Industri', 2, 'Islamic Business School', 1),
(5, 'Anwar Iqbal', '1. Mewujudkan unit kebajikan mahasiswa IBS\r\n2. Menyelesaikan isu kekeliruan bagi urusan Add Drop ', 2, 'Islamic Business School', 0),
(6, 'Siti Nur Athirah Binti Azhar', '1. Memperjuangkan untuk mengadakan Program NLP kepada student IBS\r\n2. Memperjuangkan untuk melahirkan graduan yang mampu mencipta peluang pekerjaan melalui Program Sijil Halal Eksekutif', 2, 'Islamic Business School', 4),
(7, 'Haikal Bin Abdul Rahim', '1. Mewujudkan \"Art-Heal Lounge\" bertemakan seni yang berfungsi sebagai akomodasi rehat & rawat pelajar mental dan fizikal.\r\n2. Memperjuangkan untuk mewujudkan \"6 Days Mart\" yang menyediakan pelbagai servis-barangan seperti printing,fotokopi dan makanan di SCIMPA.', 3, 'School of Creative Industry Management and Performing Arts', 0),
(8, 'Nurul Aziidah binti Azlan', '1. Mewujudkan tabung bantuan bencana kepada pelajar bagi mempercepatkan pemberian bantuan kepada pelajar SCIMPA\r\n2. Menyediakan sumbangan laptop kepada pelajar SCIMPA yang memerlukan ', 3, 'School of Creative Industry Management and Performing Arts', 0),
(9, 'Nurul Najihah Binti Azhan ', '1. Memperjuangkan kegiatan seni seperti aktiviti muzik agar dapat melahirkan pelajar SCIMPA yang berkualiti dan berkemahiran. \r\n2. Memperjuangkan anak didik SCIMPA sebagai pembantu utama dalam merealisasikan program anjuran SCIMPA. ', 3, 'School of Creative Industry Management and Performing Arts', 5),
(10, 'Masturina Yusoff', '1. Memperjuangkan hak dan kebajikan mahasiswa Universiti Utara Malaysia.\r\n2. Menggesa UUM untuk melanjutkan pembukaan pintu pagar utama sehingga jam 2 pagi.', 4, 'School of Education', 1),
(11, 'Muhammad Ammar Syahmi bin Sulaiman', '1.  Memperjuangkan sistem Latihan Industri yang lebih efisien terhadap SoE. \r\n2. Melaksanakan program Education Conference: To be A Future Educator. ', 4, 'School of Education', 2),
(12, 'Tibanras', '1. Menyediakan buku panduan akademik yang lengkap\r\n2. Berusaha melaksanakan program kemahiran profession perguruan untuk nilai tambah pelajar seebagai persediaan ke temuduga SPP', 4, 'School of Education', 2),
(13, 'Aiman Najmee', '1. Membaik pulih kelengkapan dan kemudahan asas serta menghidupkan semula Student Lounge di SOG. \r\n2. Melaksanakan siri pemantapan akademik yang dikenali sebagai \'Tutor Muda’ khususnya kepada pelajar SOG.', 5, 'School of Government', 3),
(14, 'Asif Ahmad Bin Mohd Bakeri', '1. Memperluas jaringan MOU antara pemain industri dan mahasiswa secara holistik.  \r\n2. Mewujudkan satu platform yang berkesan di antara pensyarah dan pelajar.', 5, 'School of Government', 0),
(15, 'Muhammad Amirul Ashraf', '1. Mewujudkan tabung aktiviti dan kebajikan UUM COLGIS\r\n2. Membentuk koperasi pelajar SOG', 5, 'School of Government', 2),
(16, 'Tengku Ariff Zaquan bin Tengku Azmi', '1. Mewujudkan satu platform e-library (The Bibliotheca)\r\n2. Memartabatkan suara mahasiswa melalui SOIS UNION', 6, 'School of International Studies', 2),
(17, 'Muhammad Adam Bakhtiar Bin Mohamad Mohlis', '1. Mencadangkan dan mengusahakan penubuhan Platform E-Dagang bagi membuka peluang kepada para pelajar untuk menjana pendapatan sampingan.\r\n2. Mewujudkan dan membina sistem platform mudah alih yang akan menghubung', 6, 'School of International Studies', 1),
(18, 'Nurul Najiha Byrose Khan ', '1. Memastikan telekung di surau Sois sentiasa bersih\r\n2. Memaksimumkan penggunaan computer lab', 6, 'School of International Studies', 2),
(19, 'Aiman Nadim', '1. Mewujudkan sebuah \"online platform\" untuk pelajar mengemukakan sebarang aduan atau cadangan.\r\n2. Mengembalikan hak dan memudahkan pelajar mendapat inapan siswa kerana status tamat belajar selepas practicum I dan II. \r\n3. Mewujudkan kembali kedai photostat di Foyer COLGIS untuk kemudahan pelajar.', 7, 'School of Law', 0),
(20, 'Irwan Yuhazril', '1. Mewujudkan sebuah \"online platform\" untuk pelajar mengemukakan sebarang aduan atau cadangan.\r\n2. Mengembalikan hak dan memudahkan pelajar mendapat inapan siswa kerana status tamat belajar selepas practicum I dan II. \r\n3. Mewujudkan kembali kedai photostat di Foyer COLGIS untuk kemudahan pelajar.', 7, 'School of Law', 0),
(21, 'Tee Yuan Sheng', '1. Enhance the Academic System of SOL\r\n2. Improve the facilities around COLGIS Building\r\n3. Improve the Welfare of Student by Cooperation with LAWSOC', 7, 'School of Law', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ibscandidates`
--

CREATE TABLE `tbl_ibscandidates` (
  `candidate_id` int(50) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `candidate_manifesto` varchar(2000) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `candidate_vote` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ibscandidates`
--

INSERT INTO `tbl_ibscandidates` (`candidate_id`, `candidate_name`, `candidate_manifesto`, `school_id`, `school_name`, `candidate_vote`) VALUES
(4, 'Abdul Fattah bin Zaid Arafat', '1. Memperkenalkan sistem pembelajaran share to score dalam kalangan pelajar IBS\r\n2. Memberi nilai tambah kepada pelajar-pelajar IBS daripada aspek permintaan Industri', 2, 'Islamic Business School', 1),
(5, 'Anwar Iqbal', '1. Mewujudkan unit kebajikan mahasiswa IBS\r\n2. Menyelesaikan isu kekeliruan bagi urusan Add Drop ', 2, 'Islamic Business School', 0),
(6, 'Siti Nur Athirah Binti Azhar', '1. Memperjuangkan untuk mengadakan Program NLP kepada student IBS\r\n2. Memperjuangkan untuk melahirkan graduan yang mampu mencipta peluang pekerjaan melalui Program Sijil Halal Eksekutif', 2, 'Islamic Business School', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sbmcandidates`
--

CREATE TABLE `tbl_sbmcandidates` (
  `candidate_id` int(50) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `candidate_manifesto` varchar(2000) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `candidate_vote` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sbmcandidates`
--

INSERT INTO `tbl_sbmcandidates` (`candidate_id`, `candidate_name`, `candidate_manifesto`, `school_id`, `school_name`, `candidate_vote`) VALUES
(1, 'Farisha Rabiha Binti Zainal', '1. Memperjuangkan untuk membaik pulih semula gerai jualan yang sedia ada di SBM\r\n2. Memperjuangkan untuk melaksanakan inisiatif SBM Prihatin\r\n', 1, 'School of Business Management', 0),
(2, 'Vimalanathan A/L Murugesosn', '1. Memberi peluang kepada warga SBM untuk berniaga di Kawasan SBM.\r\n2. Menyediakan saluran rasmi yang strategik untuk menyampaikan informasi yang penting kepada warga SBM.', 1, 'School of Business Management', 3),
(3, 'Tan Soon Yao', '1. Memanfaatkan sepenuh fasiliti-fasiliti di kawasan bangunan SBM \r\n2. Mengadakan banyak program keusahawanan dengan kerjasama cedi dan korporat swasta, untuk memberi peluang pelajar menseburi bidang keusahawanan.\r\n3. Menyediakan saluran aduan secara atas talian serta fizikal yang lebih berkesan dan mesra pelajar. \r\n4. Menyediakan perkhidmatan fotostat untuk pelajar di kawasan bangunan SBM, keuntungan disalur kepada program kebajikan pelajar.\r\n5. Membina hubungan antara syarikat dalam industri pengurusan perniagaan dengan SBM untuk memberi acara untuk belajar ilmu pengetahuan industri dan membekalkan peluang praktikum. ', 1, 'School of Business Management', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schools`
--

CREATE TABLE `tbl_schools` (
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schools`
--

INSERT INTO `tbl_schools` (`school_id`, `school_name`) VALUES
(1, 'School of Business Management'),
(2, 'Islamic Business School'),
(3, 'School of Creative Industry Management and Performing Arts'),
(4, 'School of Education'),
(5, 'School of Government'),
(6, 'School of International Studies'),
(7, 'School of Law');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scimpacandidates`
--

CREATE TABLE `tbl_scimpacandidates` (
  `candidate_id` int(50) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `candidate_manifesto` varchar(2000) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `candidate_vote` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_scimpacandidates`
--

INSERT INTO `tbl_scimpacandidates` (`candidate_id`, `candidate_name`, `candidate_manifesto`, `school_id`, `school_name`, `candidate_vote`) VALUES
(7, 'Haikal Bin Abdul Rahim', '1. Mewujudkan \"Art-Heal Lounge\" bertemakan seni yang berfungsi sebagai akomodasi rehat & rawat pelajar mental dan fizikal.\r\n2. Memperjuangkan untuk mewujudkan \"6 Days Mart\" yang menyediakan pelbagai servis-barangan seperti printing,fotokopi dan makanan di SCIMPA.', 3, 'School of Creative Industry Management and Performing Arts', 0),
(8, 'Nurul Aziidah binti Azlan', '1. Mewujudkan tabung bantuan bencana kepada pelajar bagi mempercepatkan pemberian bantuan kepada pelajar SCIMPA\r\n2. Menyediakan sumbangan laptop kepada pelajar SCIMPA yang memerlukan ', 3, 'School of Creative Industry Management and Performing Arts', 0),
(9, 'Nurul Najihah Binti Azhan', '1. Memperjuangkan kegiatan seni seperti aktiviti muzik agar dapat melahirkan pelajar SCIMPA yang berkualiti dan berkemahiran. \r\n2. Memperjuangkan anak didik SCIMPA sebagai pembantu utama dalam merealisasikan program anjuran SCIMPA. ', 3, 'School of Creative Industry Management and Performing Arts', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soecandidates`
--

CREATE TABLE `tbl_soecandidates` (
  `candidate_id` int(50) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `candidate_manifesto` varchar(2000) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `candidate_vote` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_soecandidates`
--

INSERT INTO `tbl_soecandidates` (`candidate_id`, `candidate_name`, `candidate_manifesto`, `school_id`, `school_name`, `candidate_vote`) VALUES
(10, 'Masturina Yusoff', '1. Memperjuangkan hak dan kebajikan mahasiswa Universiti Utara Malaysia.\r\n2. Menggesa UUM untuk melanjutkan pembukaan pintu pagar utama sehingga jam 2 pagi.', 4, 'School of Education', 1),
(11, 'Muhammad Ammar Syahmi bin Sulaiman', '1.  Memperjuangkan sistem Latihan Industri yang lebih efisien terhadap SoE. \r\n2. Melaksanakan program Education Conference: To be A Future Educator. ', 4, 'School of Education', 2),
(12, 'Tibanras', '1. Menyediakan buku panduan akademik yang lengkap\r\n2. Berusaha melaksanakan program kemahiran profession perguruan untuk nilai tambah pelajar seebagai persediaan ke temuduga SPP', 4, 'School of Education', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sogcandidates`
--

CREATE TABLE `tbl_sogcandidates` (
  `candidate_id` int(50) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `candidate_manifesto` varchar(2000) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `candidate_vote` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sogcandidates`
--

INSERT INTO `tbl_sogcandidates` (`candidate_id`, `candidate_name`, `candidate_manifesto`, `school_id`, `school_name`, `candidate_vote`) VALUES
(13, 'Aiman Najmee', '1. Membaik pulih kelengkapan dan kemudahan asas serta menghidupkan semula Student Lounge di SOG. \r\n2. Melaksanakan siri pemantapan akademik yang dikenali sebagai \'Tutor Muda’ khususnya kepada pelajar SOG.', 5, 'School of Government', 3),
(14, 'Asif Ahmad Bin Mohd Bakeri', '1. Memperluas jaringan MOU antara pemain industri dan mahasiswa secara holistik.  \r\n2. Mewujudkan satu platform yang berkesan di antara pensyarah dan pelajar.', 5, 'School of Government', 0),
(15, 'Muhammad Amirul Ashraf', '1. Mewujudkan tabung aktiviti dan kebajikan UUM COLGIS\r\n2. Membentuk koperasi pelajar SOG ', 5, 'School of Government', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soiscandidates`
--

CREATE TABLE `tbl_soiscandidates` (
  `candidate_id` int(50) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `candidate_manifesto` varchar(2000) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `candidate_vote` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_soiscandidates`
--

INSERT INTO `tbl_soiscandidates` (`candidate_id`, `candidate_name`, `candidate_manifesto`, `school_id`, `school_name`, `candidate_vote`) VALUES
(16, 'Tengku Ariff Zaquan bin Tengku Azmi', '1. Mewujudkan satu platform e-library (The Bibliotheca)\r\n2. Memartabatkan suara mahasiswa melalui SOIS UNION', 6, 'School of International Studies', 2),
(17, 'Muhammad Adam Bakhtiar Bin Mohamad Mohlis', '1. Mencadangkan dan mengusahakan penubuhan Platform E-Dagang bagi membuka peluang kepada para pelajar untuk menjana pendapatan sampingan.\r\n2. Mewujudkan dan membina sistem platform mudah alih yang akan menghubung', 6, 'School of International Studies', 1),
(18, 'Nurul Najiha Byrose Khan', '1. Memastikan telekung di surau Sois sentiasa bersih\r\n2. Memaksimumkan penggunaan computer lab', 6, 'School of International Studies', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_solcandidates`
--

CREATE TABLE `tbl_solcandidates` (
  `candidate_id` int(50) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `candidate_manifesto` varchar(2000) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `candidate_vote` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_solcandidates`
--

INSERT INTO `tbl_solcandidates` (`candidate_id`, `candidate_name`, `candidate_manifesto`, `school_id`, `school_name`, `candidate_vote`) VALUES
(19, 'Aiman Nadim', '1. Mewujudkan sebuah \"online platform\" untuk pelajar mengemukakan sebarang aduan atau cadangan.\r\n2. Mengembalikan hak dan memudahkan pelajar mendapat inapan siswa kerana status tamat belajar selepas practicum I dan II. \r\n3. Mewujudkan kembali kedai photostat di Foyer COLGIS untuk kemudahan pelajar.', 7, 'School of Law', 0),
(20, 'Irwan Yuhazril', '1. Mewujudkan sebuah \"online platform\" untuk pelajar mengemukakan sebarang aduan atau cadangan.\r\n2. Mengembalikan hak dan memudahkan pelajar mendapat inapan siswa kerana status tamat belajar selepas practicum I dan II. \r\n3. Mewujudkan kembali kedai photostat di Foyer COLGIS untuk kemudahan pelajar.', 7, 'School of Law', 0),
(21, 'Tee Yuan Sheng', '1. Enhance the Academic System of SOL\r\n2. Improve the facilities around COLGIS Building\r\n3. Improve the Welfare of Student by Cooperation with LAWSOC', 7, 'School of Law', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `matric_no` int(6) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_pass` varchar(40) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_school` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`matric_no`, `user_email`, `user_pass`, `user_name`, `user_school`, `user_phone`, `user_status`) VALUES
(123456, 'abc123@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'abc123', 'sqs', '0123456789', 'Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_candidates`
--
ALTER TABLE `tbl_candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbl_ibscandidates`
--
ALTER TABLE `tbl_ibscandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbl_sbmcandidates`
--
ALTER TABLE `tbl_sbmcandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `tbl_scimpacandidates`
--
ALTER TABLE `tbl_scimpacandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbl_soecandidates`
--
ALTER TABLE `tbl_soecandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbl_sogcandidates`
--
ALTER TABLE `tbl_sogcandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbl_soiscandidates`
--
ALTER TABLE `tbl_soiscandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbl_solcandidates`
--
ALTER TABLE `tbl_solcandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`matric_no`),
  ADD UNIQUE KEY `user_email` (`user_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
