-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2019 pada 04.39
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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` varchar(55) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `deskripsi` text,
  `harga` double DEFAULT NULL,
  `foto` varchar(55) DEFAULT 'default.jpg',
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `deskripsi`, `harga`, `foto`, `weight`) VALUES
('49efx8cjowg0', 'Jaket', 'Jaket hoodie bahan grade a', 150000, 'default.jpg', 250),
('5cef887e6afb6', 'Baju', 'Baju kaos lengan panjang', 50000, '5cef887e6afb6.jpg', 200),
('5cf02b0c56df4', 'Jaket', 'Jaket organisasi bahan licin', 125000, '5cf02b0c56df4.jpg', 300),
('5gddcodqz74s', 'Kemeja', 'Kemeja tangan panjang', 80000, 'default.jpg', 200),
('604v12pqvv4s', 'Celana', 'Celana panjang bahan licin', 90000, 'default.jpg', 120);

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
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `bukti_pembayaran` varchar(45) NOT NULL,
  `pemesanan_id` varchar(55) NOT NULL,
  `nominal` double NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `total_tagihan` double NOT NULL,
  `ket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `bukti_pembayaran`, `pemesanan_id`, `nominal`, `tanggal_pembayaran`, `total_tagihan`, `ket`) VALUES
(10, '22100371bd3.png', '22100371bd3', 210000, '2019-06-27', 210000, 11),
(364, '91000dc7c60d.jpg', '91000dc7c60d', 210000, '2019-06-28', 210000, 11),
(2147483647, 'c39e01b8cba3.png', 'c39e01b8cba3', 260000, '2019-06-26', 260000, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran2`
--

CREATE TABLE `pembayaran2` (
  `id_pembayaran` varchar(55) NOT NULL,
  `bukti_pembayaran` varchar(45) DEFAULT NULL,
  `pemesanan_id` varchar(55) DEFAULT NULL,
  `jumlah` double NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total_tagihan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(55) NOT NULL,
  `barang_id` varchar(55) DEFAULT NULL,
  `jumlah_id` int(11) DEFAULT NULL,
  `desain` varchar(45) DEFAULT NULL,
  `catatan` text,
  `tanggal_pemesanan` date DEFAULT NULL,
  `pelanggan_id` varchar(55) DEFAULT NULL,
  `tagihan` double DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `barang_id`, `jumlah_id`, `desain`, `catatan`, `tanggal_pemesanan`, `pelanggan_id`, `tagihan`, `jumlah`, `s`, `m`, `l`, `xl`, `xxl`, `xxxl`, `berat`, `status_id`) VALUES
('22100371bd3', '5cef887e6afb6', NULL, '22100371bd3.JPG', 'iyaaaaaaaaaaa', '2019-06-26', '67d840370e87', 200000, 4, 4, 0, 0, 0, 0, 0, 800, 6),
('91000dc7c60d', '5cef887e6afb6', NULL, '91000dc7c60d.jpg', 'ytaaaaaa', '2019-06-28', '67d840370e87', 200000, 4, 4, 0, 0, 0, 0, 0, 800, 6),
('c39e01b8cba3', '5cef887e6afb6', NULL, 'c39e01b8cba3.png', 'nyokkkkkkkk', '2019-06-25', '67d840370e87', 250000, 5, 5, 0, 0, 0, 0, 0, 1000, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `Id_pengiriman` int(11) NOT NULL,
  `no_resi` varchar(155) NOT NULL,
  `label` varchar(45) NOT NULL,
  `nama_penerima` varchar(125) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `provinsi` varchar(125) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_dikirim` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `pemesanan_id` varchar(55) NOT NULL,
  `ongkir` double NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `kurir` varchar(55) NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`Id_pengiriman`, `no_resi`, `label`, `nama_penerima`, `no_hp`, `provinsi`, `kota`, `alamat`, `tanggal_dikirim`, `tanggal_diterima`, `pemesanan_id`, `ongkir`, `kode_pos`, `kurir`, `keterangan`) VALUES
(327, '123243434356', 'Rumah', 'ikbalmaulana', '083165478965', 'Jawa Barat', 'Bandung Barat', 'Jl. Merbabu', '2019-06-27', '2019-06-27', 'c39e01b8cba3', 10000, 43215, 'jne - OKE 3-5 Hari', 7),
(328, '12345678', 'Rumah', 'Ahmad', '089493029401', 'Jawa Barat', 'Bogor', 'Jl. merbabu', '2019-07-01', '2019-07-01', '22100371bd3', 10000, 24153, 'jne - OKE 2-3 Hari', 7),
(548400, '123243434356', 'Rumah', 'ikbalmaulana', '083165478965', 'Jawa Barat', 'Bekasi', 'Jl. merbabu', '2019-06-28', '2019-06-28', '91000dc7c60d', 10000, 43215, 'jne - OKE 2-3 Hari', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman2`
--

CREATE TABLE `pengiriman2` (
  `id_pengiriman` varchar(55) NOT NULL,
  `label` varchar(45) DEFAULT NULL,
  `nama_penerima` varchar(45) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `provinsi` varchar(125) NOT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tanggal_dikirim` date DEFAULT NULL,
  `tanggal_diterima` date NOT NULL,
  `pemesanan_id` varchar(55) DEFAULT NULL,
  `ongkir` double NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `kurir` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pelanggan'),
(3, 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` varchar(55) NOT NULL,
  `pembayaran_id` varchar(55) DEFAULT NULL,
  `saldo_akhir` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Keranjang'),
(2, 'Menunggu Pembayaran'),
(3, 'Menunggu Konfirmasi'),
(4, 'Sedang Diproses'),
(5, 'Pengerjaan Selesai'),
(6, 'Pemesanan Selesai'),
(7, 'Sudah Diterima'),
(8, 'Belum Dibayar'),
(9, 'Belum Dikirim'),
(10, 'Sedang Dikirim'),
(11, 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(55) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `foto` varchar(55) NOT NULL DEFAULT 'default.jpg',
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `email`, `no_hp`, `alamat`, `jenis_kelamin`, `foto`, `is_active`, `date_created`, `role_id`) VALUES
('1815e00dc71f55', 'alfian', 'Admin', '$2y$10$Av7OMlq87C.zFFBFgJnXSeyK/e5KWmYeeqA0imHgV2UvrNgq0NZm2', NULL, NULL, NULL, NULL, 'default.jpg', 1, 1561617525, 1),
('259a01b8f1f4', 'tezaalfian', NULL, '$2y$10$LvtAzMTtUe7b5.Rjma8Foe8K8QdkygiPtSyTakXUD47GWG5TWISse', 'tezaalfian2916@gmail.com', NULL, NULL, NULL, 'default.jpg', 1, 1561707684, 2),
('67d840370e87', 'ikbalmaulana', NULL, '$2y$10$jyk0WdySK30itWJ96aSKZeAA925oesTeALxHTlCT3CRm0daUjQQLC', 'fany@gmail.com', '083165478965', 'Jl. Merbabu, RT.02/10, Kel. Karang Tengah', 'Laki-Laki', '67d840370e87.jpg', 1, 1560997207, 2),
('c85e01b889b2', 'admin', 'Teza Alfian', '$2y$10$ymQW1ZNkJHEj8vwyBSFvketh0QB9xXtt1vif8xRzwY3bhsA/SCiRm', 'user@gmail.com', NULL, NULL, NULL, 'c85e01b889b2.jpg', 1, 1561084662, 1);

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
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembayaran2`
--
ALTER TABLE `pembayaran2`
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
  ADD PRIMARY KEY (`Id_pengiriman`);

--
-- Indeks untuk tabel `pengiriman2`
--
ALTER TABLE `pengiriman2`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `fk_pemesanan_idx` (`pemesanan_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `fk_pembayaran_idx` (`pembayaran_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jumlah`
--
ALTER TABLE `jumlah`
  MODIFY `id_jumlah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `Id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548401;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran2`
--
ALTER TABLE `pembayaran2`
  ADD CONSTRAINT `fk_pemesanan_1` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jumlah` FOREIGN KEY (`jumlah_id`) REFERENCES `jumlah` (`id_jumlah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengiriman2`
--
ALTER TABLE `pengiriman2`
  ADD CONSTRAINT `fk_pemesanan` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran2` (`id_pembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
