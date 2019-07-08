-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2019 pada 04.50
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
('49efx8cjowg0', 'Jas Almamater', 'Jas almamater bahan drill', 150000, '49efx8cjowg0.jpg', 250),
('5cef887e6afb6', 'Baju', 'Baju kaos lengan pendek desain sablon bebas', 50000, '5cef887e6afb6.jpg', 150),
('5cf02b0c56df4', 'Jaket', 'Jaket hoodie bahan grade A tanpa resleting', 125000, '5cf02b0c56df4.jpeg', 300),
('604v12pqvv4s', 'Kemeja', 'Kemeja lengan panjang bahan katun', 110000, '604v12pqvv4s.jpg', 120);

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
-- Struktur dari tabel `medsos`
--

CREATE TABLE `medsos` (
  `id` int(11) NOT NULL,
  `kode` varchar(155) NOT NULL,
  `link` varchar(500) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `medsos`
--

INSERT INTO `medsos` (`id`, `kode`, `link`, `nama`) VALUES
(2, 'fa fa-facebook', 'https://www.facebook.com/', 'Co Tailor'),
(3, 'fa fa-envelope', '', 'admin@cotailor.com'),
(4, 'fa fa-whatsapp', 'https://wa.me/6289631902592', '089631902592');

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
(1562435009, 'd175c03728e7.jpg', 'd175c03728e7', 160000, '2019-07-06', 160000, 11);

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
('d175c03728e7', '5cef887e6afb6', NULL, 'd175c03728e7.jpg', '', '2019-07-06', '2e80372132', 150000, 3, 3, 0, 0, 0, 0, 0, 600, 6);

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
(548402, '12345678', 'rumah', 'alfian', '089631902592', 'Jawa Barat', 'Tasikmalaya', 'Jl. Merbabu, RT.02/10, Kec. Gunung Puyuh, Sukabumi', '2019-07-06', '2019-07-06', 'd175c03728e7', 10000, 43234, 'jne - OKE 5-7 Hari', 7);

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
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id` varchar(155) NOT NULL,
  `slide` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id`, `slide`) VALUES
('1562432793', '1562432793.png'),
('1562432823', '1562432823.png'),
('1562434191', '1562434191.jpg');

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
('2e80372132', 'alfian', NULL, '$2y$10$tsjBUTyBKJaBf2wtvevtb.ZghpjyXYFEKusXsNkSMqTP5A.zsjPbm', 'tezaalfian2916@gmail.com', '089631902592', 'Jl. Merbabu, RT.02/10, Kec. Gunung Puyuh, Sukabumi', 'Laki-Laki', 'default.jpg', 1, 1562049628, 2),
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
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(5, 'dokumentasi@tahfizhdulido.com', '7U46/G9Qpy5QU390wGk4z/PX0wfcEDKBomWTxZR3Xgs=', 1562052058);

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
-- Indeks untuk tabel `medsos`
--
ALTER TABLE `medsos`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `medsos`
--
ALTER TABLE `medsos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1562444176;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `Id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548404;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
