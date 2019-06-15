-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2019 pada 18.52
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_konveksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `foto` varchar(55) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` varchar(55) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `deskripsi` text,
  `harga` double DEFAULT NULL,
  `foto` varchar(55) DEFAULT 'default.jpg',
  `foto2` varchar(55) DEFAULT NULL,
  `foto3` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `deskripsi`, `harga`, `foto`, `foto2`, `foto3`) VALUES
('5cef887e6afb6', 'Baju', 'Baju kaos lengan panjang', 45000, '5cef887e6afb6.png', '', ''),
('5cf02b0c56df4', 'Jaket', 'Jaket organisasi bahan licin', 125000, '5cf02b0c56df4.png', '5cf02b0c56df4.png', '5cf02b0c56df4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah`
--

CREATE TABLE `jumlah` (
  `id_jumlah` int(11) NOT NULL,
  `S` int(11) DEFAULT NULL,
  `M` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL,
  `XL` int(11) DEFAULT NULL,
  `XXL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(55) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `no_hp` int(12) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `foto` varchar(55) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(55) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `no_hp` int(12) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `foto` varchar(55) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(55) NOT NULL,
  `bukti_pembayaran` varchar(45) DEFAULT NULL,
  `pemesanan_id` varchar(55) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(55) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `barang_id` varchar(55) DEFAULT NULL,
  `jumlah_id` int(11) DEFAULT NULL,
  `desain` varchar(45) DEFAULT NULL,
  `catatan` varchar(150) DEFAULT NULL,
  `tanggal_pemesanan` date DEFAULT NULL,
  `pelanggan_id` varchar(55) DEFAULT NULL,
  `harga_tagihan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` varchar(55) NOT NULL,
  `label` varchar(45) DEFAULT NULL,
  `nama_penerima` varchar(45) DEFAULT NULL,
  `no_hp` int(12) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `kecamatan_kota` varchar(45) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `pemesanan_id` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` varchar(55) NOT NULL,
  `pembayaran_id` varchar(55) DEFAULT NULL,
  `saldo_akhir` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jumlah`
--
ALTER TABLE `jumlah`
  ADD PRIMARY KEY (`id_jumlah`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_pemesanan_idx` (`pemesanan_id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `fk_jumlah_idx` (`jumlah_id`),
  ADD KEY `fk_barang_idx` (`barang_id`),
  ADD KEY `fk_pelanggan_idx` (`pelanggan_id`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `fk_pemesanan_idx` (`pemesanan_id`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `fk_pembayaran_idx` (`pembayaran_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jumlah`
--
ALTER TABLE `jumlah`
  MODIFY `id_jumlah` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pemesanan_1` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jumlah` FOREIGN KEY (`jumlah_id`) REFERENCES `jumlah` (`id_jumlah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `fk_pemesanan` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
