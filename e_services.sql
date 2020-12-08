-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2020 pada 08.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_services`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `email`, `name`, `gambar`) VALUES
(1, 'mohamadarief1090@gmail.com', 'sp_admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama`, `alamat`, `no_telp`, `email`, `password`, `gambar`) VALUES
(1, 'erik', 'jakarta', '0895 3547 383', 'erik@gmail.com', 'test', 'cr7.jpg'),
(2, 'mang Darma', 'Pondok Aren, Tangerang selatan  \r\n                                                                                                                                                                                               ', '0813144768', 'mangdarma@unpas.ac.id', 'test', 'montella.jpg'),
(3, 'Nurul', 'Perumnas 3, Bekasi                    ', '089767712324', 'nurulraws@gmail.com', 'test', 'montella2.jpg'),
(4, 'ahmad fauzi', 'Seroja, Bekasi Barat', '0895 3547 373', 'fauzismp13@gmail.com', 'test', 'default.jpg'),
(5, 'Ria Rahmawati', 'Tambun, Bekasi', '085289878225', 'ag6618836@gmail.com', 'test', 'default.jpg'),
(8, 'Mohamad Faturrahman', 'Tambun, Bekasi Selatan', '0895 3547 373', 'faturahman12345@gmail.com', 'test', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `upload_pembayaran` varchar(128) NOT NULL,
  `status_jasa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `id_customer`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`, `status_pembayaran`, `upload_pembayaran`, `status_jasa`) VALUES
(48, 3, 'Nurul', 'Perumnas 3, Bekasi                    ', '2020-12-08 13:36:27', '2020-12-09 13:36:27', 'Menunggu Pembayaran', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jasa`
--

CREATE TABLE `tb_jasa` (
  `id_tkg` int(11) NOT NULL,
  `nama_tkg` varchar(60) NOT NULL,
  `tempat_tgl_lahir` varchar(128) NOT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `umur` int(3) NOT NULL,
  `keahlian` varchar(60) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga_tkg` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `no_ktp` text DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jasa`
--

INSERT INTO `tb_jasa` (`id_tkg`, `nama_tkg`, `tempat_tgl_lahir`, `alamat`, `no_telp`, `agama`, `jk`, `pendidikan`, `umur`, `keahlian`, `kategori`, `harga_tkg`, `gambar`, `no_ktp`, `email`, `status`) VALUES
(34, 'Denny Septiadi', 'Surabaya, 20 januari 1980', 'Bekasi, Jawa Barat', '085219234541', 'Islam', 'L', 'smp', 40, 'Sumur Bor', 'Tukang Ledeng', 1500000, 'pompaair_1.jpg', 'ktpdenny_s1.jpg', 'dennyseptiady2012@gmail.com', ''),
(35, 'dejan jaya', 'Bekasi, 03 februari 1995', 'Rawa Lumbu - Bekasi', '081314476888', 'Islam', 'L', 'sma', 25, 'Instalasi Listrik', 'Electrical', 100000, 'dejan_listr.jpg', 'Ktpdejanjaya.jpg', 'dejanjaya0@gmail.com', ''),
(36, 'Budi Raharjo', 'Semarang, Jawa Tengah', 'Jl. Panjang, Karawnag                    ', '081314476899', 'Hindu', 'L', 'smp', 28, 'Las Pagar Rumah', 'Perkakas', 100000, 'budi_r.jpg', 'ktp_budi.jpg', 'budi_r@gmail.com', ''),
(37, 'Bedu subuh', 'Gianyar, 10 september 1996', 'Kp. Rambutan, Jakarta', '085289878335', 'Hindu', 'L', 'sma', 24, 'Membangun rumah', 'Tukang Bangunan', 150000, 'bangunanbedu.jpg', 'ktpbedu.jpg', 'bedusubuh@gmail.com', ''),
(38, 'Ali Zaenal', 'Medan, 24 maret 1996', 'jl.mawar 3 -  bekasi', '0895 3547 373', 'Islam', 'L', 'sma', 24, 'Riper Laptop', 'Elektronik', 100000, 'RiperKomputer_1.jpg', 'ali_Zaenal.jpg', 'alizaenal@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `metode` varchar(100) NOT NULL,
  `bkt_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_invoice`, `id_customer`, `tgl_bayar`, `metode`, `bkt_transaksi`) VALUES
(3, 25, 8, '2020-11-25', 'BCA - 5218432721', 'dd3a58fd6d40bad874666df74f3d9849.jpg'),
(4, 29, 8, '0000-00-00', 'BCA - 5218432721', 'cdacc89e997d801cb64f310cedad7af0.jpg'),
(5, 26, 8, '2020-11-29', 'MANDIRI - 5218432724', 'b9203826156e5fb175a96463424ee88c.jpg'),
(6, 27, 8, '0000-00-00', 'BCA - 5218432721', 'f85555ceaa891a564166559e0bf68333.jpg'),
(7, 28, 8, '2020-11-30', 'BCA - 5218432721', 'f85555ceaa891a564166559e0bf68333.jpg'),
(8, 31, 2, '2020-11-29', 'MANDIRI - 5218432724', 'b9203826156e5fb175a96463424ee88c.jpg'),
(9, 33, 5, '2020-11-30', 'BRI - 5218432723', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg'),
(10, 37, 5, '0000-00-00', 'BCA - 5218432721', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg'),
(11, 37, 5, '0000-00-00', 'BCA - 5218432721', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg'),
(12, 39, 5, '2020-11-30', 'BNI - 5218432722', '904dbff1cf66e1100e990161f319db56.jpg'),
(13, 40, 5, '2020-11-30', 'MANDIRI - 5218432724', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg'),
(14, 41, 5, '2020-11-30', 'BNI - 5218432722', 'b9203826156e5fb175a96463424ee88c.jpg'),
(15, 42, 5, '2020-11-30', 'BRI - 5218432723', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg'),
(16, 43, 5, '2020-11-30', 'BCA - 5218432721', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg'),
(17, 43, 5, '2020-11-30', 'BCA - 5218432721', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg'),
(18, 43, 5, '2020-11-30', 'BCA - 5218432721', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_tkg` int(11) NOT NULL,
  `nama_tkg` varchar(60) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga_tkg` int(11) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `email`, `id_invoice`, `id_tkg`, `nama_tkg`, `jumlah`, `harga_tkg`, `pilihan`) VALUES
(35, 'nurulraws@gmail.com', 48, 37, 'Bedu subuh', 1, 150000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id` int(11) NOT NULL,
  `no_awb` varchar(30) NOT NULL,
  `consignee` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `alamat` text NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `foto_penerima` varchar(100) NOT NULL,
  `foto_lokasi` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id`, `no_awb`, `consignee`, `tgl`, `alamat`, `id_kurir`, `foto_penerima`, `foto_lokasi`, `status`) VALUES
(1, '7156-202011-01774', 'KPP  PMA EMPAT', '2020-12-08', 'Jln. raya juang', 32, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `name`, `username`, `password`, `role_id`, `is_active`, `date_created`, `gambar`) VALUES
(1, 'mohamadarief1090@gmail.com', 'admin', 'admin', '123', 1, 1, '0000-00-00', ''),
(13, 'mangdarma@unpas.ac.id', 'mang Darma', '', '123', 3, 1, '0000-00-00', 'default.jpg'),
(14, 'nurulraws@gmail.com', 'Nurul', '', '123', 3, 1, '0000-00-00', 'default.jpg'),
(15, 'fauzismp13@gmail.com', 'ahmad fauzi', '', '123', 3, 0, '0000-00-00', 'default.jpg'),
(17, 'ag6618836@gmail.com', 'Ria Rahmawati', '', '123', 3, 1, '0000-00-00', 'default.jpg'),
(19, 'faturahman12345@gmail.com', 'Mohamad Faturrahman', '', '123', 3, 1, '0000-00-00', 'default.jpg'),
(27, 'dennyseptiady2012@gmail.com', 'Denny Septiadi', '', '123', 2, 1, '0000-00-00', 'pompaair_1.jpg'),
(28, 'dejanjaya0@gmail.com', 'dejan jaya', '', '123', 2, 1, '0000-00-00', 'dejan_listr.jpg'),
(29, 'budi_r@gmail.com', 'Budi Raharjo', '', '123', 2, 0, '0000-00-00', 'budi_r.jpg'),
(30, 'bedusubuh@gmail.com', 'Bedu subuh', '', '123', 2, 0, '0000-00-00', 'bangunanbedu.jpg'),
(31, 'alizaenal@gmail.com', 'Ali Zaenal', '', '123', 2, 0, '0000-00-00', 'RiperKomputer_1.jpg'),
(32, 'kurir@gmail.com', 'kurir', 'kurir', 'kurir', 2, 1, '0000-00-00', NULL),
(33, 'admin@gmail.com', 'admin', 'admin', 'admin', 1, 1, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(26, 'erik@gmail.com', 'VRVb+mHs1dw7HVKCVOtyJA1O4MD5CXfyF4dJhGs9zUs=', 1604500798),
(28, 'mangdarma@unpas.ac.id', '6nSO2yEvJ4Vz2lHA3kxYI+EPmaOZ3SAUkZFTSOFm1J4=', 1604672691),
(29, 'nurulraws@gmail.com', 'VEph4XLHwYiGS4rt5tNKE/Aj+p0O9OYPDRknUqaugPY=', 1605080388),
(30, 'fauzismp13@gmail.com', '0xGISxUqQvPRnLW8g/Y443Iu3AP0lzjUFGp63B9lcpE=', 1605682804),
(32, 'ag6618836@gmail.com', '4rUW38GYcmoDDyo9wdDJMHuE0VBprtHbRn+5A0bTvDE=', 1605868836),
(34, 'faturahman12345@gmail.com', 'az6K+8deE2qLjBltFSRemsBXtQ5lQXRZOm+PFgc1v+s=', 1606305870),
(42, 'dennyseptiady2012@gmail.com', 'vpNWMR/5FYp9SeSyQnaFay2JSBM3MqQH43c/YrdEUyc=', 1606802162),
(43, 'dejanjaya0@gmail.com', 'WrRWlj0RhCHSlQxTr4PctDw5zwtNCwvU0pan65NBU+Y=', 1606802762),
(44, 'budi_r@gmail.com', 'NhijMNsMEeqUknBS9Wod2k4usKdtyUPolmZN5qnwjew=', 1606808204),
(45, 'bedusubuh@gmail.com', 'eUtBotkYuD+iAGQVFd6cBy+TdySkHnmQSXQHfHLHAm8=', 1606808663),
(46, 'alizaenal@gmail.com', 'kiTsJkXGXQXaYF1nteFtuj+KuADZSf+l/fmdTxr8HFU=', 1606823978);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `tb_jasa`
--
ALTER TABLE `tb_jasa`
  ADD PRIMARY KEY (`id_tkg`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_jasa`
--
ALTER TABLE `tb_jasa`
  MODIFY `id_tkg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
