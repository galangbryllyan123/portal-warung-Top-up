-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Mar 2018 pada 17.30
-- Versi server: 5.6.38-log
-- Versi PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speadyma_incub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `apikey` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance_history`
--

CREATE TABLE `balance_history` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `action` enum('Add Balance','Cut Balance') COLLATE utf8_swedish_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `msg` text COLLATE utf8_swedish_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `time` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `balance_history`
--

INSERT INTO `balance_history` (`id`, `username`, `action`, `quantity`, `msg`, `date`, `time`) VALUES
(19, 'Username', 'Cut Balance', 4500, 'User buy service. Order ID : 555754', '2018-03-06', '04:54:36'),
(20, 'Username', 'Cut Balance', 4500, 'User buy service. Order ID : 219770', '2018-03-06', '04:56:43'),
(21, 'Username', 'Cut Balance', 4500, 'User buy service. Order ID : QXWAV5ML9B', '2018-03-06', '04:59:32'),
(22, 'Username', 'Cut Balance', 4500, 'User buy service. Order ID : PSXMVG6AZ8', '2018-03-06', '05:02:35'),
(23, 'Username', 'Cut Balance', 4500, 'User buy service. Order ID : ', '2018-03-06', '05:05:33'),
(24, 'Username', 'Cut Balance', 4500, 'User buy service. Order ID : ', '2018-03-06', '05:05:54'),
(25, 'Username', 'Cut Balance', 4500, 'User buy service. Order ID : ', '2018-03-06', '05:09:21'),
(26, 'Username', 'Cut Balance', 4500, 'User buy service. Order ID : NDVOST5OSW', '2018-03-06', '05:09:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `garena`
--

CREATE TABLE `garena` (
  `nama` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gemscool`
--

CREATE TABLE `gemscool` (
  `nama` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `historyall`
--

CREATE TABLE `historyall` (
  `id` int(10) NOT NULL,
  `no` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `pembeli` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `barang` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('Sukses','Pending','Gagal','Sedang Di Proses') COLLATE utf8_swedish_ci NOT NULL,
  `data` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `market`
--

CREATE TABLE `market` (
  `no` int(10) NOT NULL,
  `category` enum('CHEAT','WEBS') CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `service` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `rate` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `min` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `max` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `provider` varchar(50) NOT NULL,
  `provider_id` int(10) NOT NULL,
  `status` enum('Tersedia','Tidak tersedia') CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_history`
--

CREATE TABLE `order_history` (
  `id` int(10) NOT NULL,
  `order_id` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `provider` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `buyer` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `quantity` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `price` int(10) NOT NULL,
  `status` enum('Pending','Processing','Error','Success') COLLATE utf8_swedish_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `time` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provider`
--

CREATE TABLE `provider` (
  `id` int(10) NOT NULL,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `api_key` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `provider`
--

INSERT INTO `provider` (`id`, `code`, `link`, `api_key`) VALUES
(1, 'MANUAL', 'https://speadymaster-panel.web.id/api-SosialMedia', ''),
(2, 'SPEADY', 'https://speadymaster-panel.web.id/api-SosialMedia', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_balance`
--

CREATE TABLE `request_balance` (
  `id` int(10) NOT NULL,
  `kode` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `quantity` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `method` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('Pending','Success') COLLATE utf8_swedish_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `time` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `no` int(10) NOT NULL,
  `category` enum('IG','TW','FB','YT','GP','SC','WEB','VINE','CHEAT','WEBS','HOST') COLLATE utf8_swedish_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `rate` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `min` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `max` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `provider` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `provider_id` int(10) NOT NULL,
  `status` enum('Tersedia','Tidak tersedia') COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockcash`
--

CREATE TABLE `stockcash` (
  `id` int(10) NOT NULL,
  `jenis` enum('Gemscool Cash','SHELL','MI Cash','Lyto Cash','Digicash','NC') COLLATE utf8_swedish_ci NOT NULL,
  `isi` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `kodecash` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfersaldo`
--

CREATE TABLE `transfersaldo` (
  `username` varchar(1000) NOT NULL,
  `penerima` varchar(1000) NOT NULL,
  `jumlah` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `balance` int(10) NOT NULL,
  `level` enum('Member','Reseller','Agen','Admin') COLLATE utf8_swedish_ci NOT NULL,
  `register` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `balance_used` int(10) NOT NULL,
  `Status` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `balance`, `level`, `register`, `balance_used`, `Status`) VALUES
(1, 'Username', 'Password', 999999999, 'Admin', 'Server', 0, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `jenis` varchar(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `serial` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `balance_history`
--
ALTER TABLE `balance_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `historyall`
--
ALTER TABLE `historyall`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request_balance`
--
ALTER TABLE `request_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `stockcash`
--
ALTER TABLE `stockcash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodecash` (`kodecash`),
  ADD KEY `jenis` (`jenis`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `balance_history`
--
ALTER TABLE `balance_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `historyall`
--
ALTER TABLE `historyall`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT untuk tabel `market`
--
ALTER TABLE `market`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `request_balance`
--
ALTER TABLE `request_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `stockcash`
--
ALTER TABLE `stockcash`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12398;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
