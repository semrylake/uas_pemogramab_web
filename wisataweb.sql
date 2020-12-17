-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 08:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisataweb`
--
CREATE DATABASE IF NOT EXISTS `wisataweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wisataweb`;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `date_create` date NOT NULL,
  `time_create` varchar(11) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `date_update` date NOT NULL,
  `time_update` varchar(11) NOT NULL,
  `sts` enum('no yet approved','approved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `author`, `tempat`, `lokasi`, `date_create`, `time_create`, `isi`, `foto`, `date_update`, `time_update`, `sts`) VALUES
(17, 'Umi Esty', 'Pantai Kolbano', 'Kolbano, Kab. TTS, Nusa Tenggara Timur', '2020-12-04', '21:55', '&lt;p&gt;Kolbano nampaknya telah menjadi primadona dan daya tarik utama bagi para pengunjung yang hendak menyambangi Kota Kupang dan mengeksplorasi Pulau Timor. Pantai Kolbano yang dulu sepi, nampaknya sudah tak asing lagi terdengar di kalangan para pelancong karena pasalnya keberadaan pantai ini sudah diliput oleh banyak acara di stasiun televisi dan juga para pengguna sosial media.&lt;/p&gt;\r\n\r\n&lt;p&gt;Terletak di Desa Kolbano, Kecamatan Kolbano, Kabupaten Timor Tengah Selatan (TTS) sekitar 135 km dari Ibu Kota Kupang, dibutuhkan waktu sekitar 3-4 jam untuk sampai ke lokasi cantik nan unik ini. Mengapa unik? karena bukan hamparan pasir hitam maupun putih yang akan kalian lihat melainkan hamparan bebatuan kerikil yang terlihat cantik berwarna-warni. Tak hanya itu saja, keindahan Pantai Kolbano juga dilengkapi dengan adanya landmark yang berupa sebuah batu raksasa yang menjadi ciri khas di Pantai Kolbano ini, penduduk setempat biasa menyebutnya batu besar &amp;ldquo;Fatu Un&amp;rdquo;. Sekilas batu Fatu Un ini terlihat seperti kepala singa jika dilihat dari sisi samping.&lt;/p&gt;\r\n\r\n&lt;p&gt;Pengunjung juga dapat menaiki batu tersebut untuk melihat keindahan panorama Pantai Kolbano dari ketinggian. Samudera Hindia yang ada di hadapan muka pantai dengan kombinasi birunya air laut serta hamburan bebatuan krikil berwarna-warni semakin menambah keindahan Pantai Kolbano.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Akses Menuju Lokasi&lt;/strong&gt;&lt;br /&gt;\r\nAkses untuk menuju ke tempat ini terbilang cukup sulit karena transportasi umum yang belum memadai, namun tak perlu khawatir karena sebelumnya pengunjung dapat menyewa kendaraan dari Kota Kupang. Kondisi jalan menuju kawasan Kolbano cukup variatif, pengunjung akan melewati jalan yang berkelok-kelok dan juga tanjakan dan turunan yang memacu adrenalin. Tapi tenang saja karena sepanjang jalan yang dilewati pengunjung juga akan disuguhkan berbagai pemandangan dan panorama alam yang beragam seperti sawah dan ladang penduduk desa sekitar, hamparan perbukitan dan tebing-tebing yang menjulang gagah juga beberapa rumah adat khas setempat.&lt;/p&gt;\r\n\r\n&lt;p&gt;Kurang lebih setelah melewati jarak 135 km dari Kota Kupang, pengunjung akan tiba di pantai yang berhamburan bebatuan krikil yang berwana-warni di tepian pantai yang akan membuat pengunjung terpesona. Perpaduan keindahan antara biru air laut dan hamparan batuan kerikil berwarna-warni sangat melengkapi keindahan panorama di Pantai Kolbano.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Harga Tiket Masuk (HTM)&lt;/strong&gt;&lt;br /&gt;\r\nDengan biaya masuk relatif murah yaitu sebesar 2.000 - 5.000 rupiah bagi yang membawa kendaraan, pengunjung sudah dapat menikmati indahnya Pantai Kolbano. Namun sayangnya di Pantai Kolbano belum terdapat fasilitas-fasilitas umum apapun bagi para pengunjung, hanya tersedia beberapa lopo-lopo (sejenis bale-bale/gazebo) yang dapat digunakan sebagai tempat untuk beristirahat para pengunjung.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Fasilitas di Sekitar Lokasi&lt;/strong&gt;&lt;br /&gt;\r\nBagi pengunjung yang hendak berwisata ke Pantai Kolbano disarankan untuk membawa bekal makanan dan minuman dikarenakan di sekitar Pantai Kolbano masih sangat sepi dan jarang terdapat warung yang menjajakan makanan dan minuman. Bagi kalian yang ingin mengeksplorasi keindahan alam di Pulau Timor, Pantai Kolbano dapat menjadi destinasi wisata yang sangat disayangkan untuk dilewati. Atau bagi kalian para pecinta batu-batu unik, tak ada salahnya untuk membuktikan cantiknya hamparan hamparan kerikil warna-warni di Kolbano.&lt;/p&gt;\r\n', '5fca4ded3917d.jpg', '2020-12-04', '21:55', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `level` enum('admin','operator') NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level`, `username`, `password`) VALUES
(1, 'admin', 'semry', '$2y$10$b8m4sFltB0wqmOPfOyJt..lBDt8CFM07yWAFESkyZFItxnqQEXCXS'),
(2, 'operator', 'esty', '$2y$10$a0ns27DUngjGHJnqVm6BQOoYjORpJCkBji09tyEha2ks3/Lex5cYu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
