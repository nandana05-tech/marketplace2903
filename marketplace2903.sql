-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 03:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace2903`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'nana@gmail.com', '893a6a6789d8aef157ac0615ac3855587daaac07', 'nana');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `foto_artikel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `foto_artikel`) VALUES
(1, 'Sofa Terbaik Kini Hadir di Toko Kita', '<p>Sofa terbaik kini hadir di toko kita, desain mewah yang menyatu sempurna dengan ruang tamu impianmu.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'IMG-20250712-WA00041.jpg'),
(2, 'Hoodie terbaik kini hadir di toko kita', '<p>Hoodie terbaik kini hadir di toko kita, hadir dengan desain eksklusif, bahan premium, dan kenyamanan maksimal untuk gaya harianmu!</p>\r\n', 'IMG-20250712-WA00112.jpg'),
(3, 'Alat makan terbaik kini hadir di toko kita', '<p>Alat makan terbaik kini hadir di toko kita dengan desain ekslusif</p>\r\n', 'IMG-20250712-WA00131.jpg'),
(4, 'Mainan Anak Terbaik Kini Hadir di Toko Kita', '<p>Mainan Anak Terbaik Kini Hadir di Toko Kita dengan desain menarik</p>\r\n', 'IMG-20250712-WA00061.jpg'),
(5, 'Gelas Kaca Aesthetic Gaya Jepang Terbaik Kini Hadir di Toko Kita', '<p>Gelas Kaca Aesthetic Gaya Jepang Terbaik Kini Hadir di Toko Kita dengan desain yang kece</p>\r\n', 'IMG-20250712-WA00151.jpg'),
(6, 'Kaca Estetik Cafe terbaik kini hadir di toko kita', '<p>Kaca Estetik Cafe terbaik kini hadir di toko kita dengan desain yang menarik</p>\r\n', 'IMG-20250712-WA00161.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `foto_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `foto_kategori`) VALUES
(1, 'Fashion Pria', 'IMG-20250712-WA00112.jpg'),
(2, 'Alat Makan', 'IMG-20250712-WA00141.jpg'),
(4, 'Mainan Anak', 'IMG-20250712-WA00071.jpg'),
(7, 'furniture', 'Slide-JJM1.png');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_member_jual` int(11) NOT NULL,
  `id_member_beli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `email_member` varchar(100) NOT NULL,
  `password_member` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Belum, 1=Terverifikasi',
  `verification_token` varchar(255) DEFAULT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat_member` text NOT NULL,
  `wa_member` varchar(50) NOT NULL,
  `kode_distrik_member` varchar(10) NOT NULL,
  `nama_distrik_member` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `email_member`, `password_member`, `is_verified`, `verification_token`, `nama_member`, `alamat_member`, `wa_member`, `kode_distrik_member`, `nama_distrik_member`) VALUES
(1, 'arifrahman@amikom.ac.id', 'eb8848597b2b1d0bf9a92f439c5a9625f83ab435', 1, NULL, 'Arif Nur Rohman, M. Kom.', 'Purwomartani Kalasan Sleman', '08990423789', '419', 'Kabupaten Sleman DI Yogyakarta'),
(2, 'lanesra@amikom.ac.id', 'a5375c7f48244c8f4876ee6f97bbda4d91fe1665', 1, NULL, 'Lanesra', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', '081336952939', '419', 'Kabupaten Sleman DI Yogyakarta'),
(3, 'nana@amikom.ac.id', '893a6a6789d8aef157ac0615ac3855587daaac07', 0, NULL, 'jjnjn', 'JL. Wediombo KM 0.5 Jepitu, Kec. Girisubo, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55883', '8989898989', '17', 'Kabupaten Badung Bali'),
(10, 'nandananatasakara@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, NULL, 'nandana', 'JL. K. H. Syarbini no. 257 A', '085227727700', '419', 'Kabupaten Sleman DI Yogyakarta'),
(11, 'nandana@students.amikom.ac.id', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, NULL, 'Nandana', 'JL. K. H. Syarbini no. 257 A', '085227727700', '105', 'Kabupaten Cilacap Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `berat_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_member`, `id_kategori`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `berat_produk`) VALUES
(1, 1, 7, 'Sofa Empuk', 200000, 'IMG-20250712-WA00041.jpg', '• Type :persegi panjang\r\n• Size: 54*54*48cm\r\n• Product: BEAN BAG sofa\r\n• untuk TERMASUK Isi Styrofoam\r\n• Great for your room/villa/ office/ home/ cafe / etc/ Kualitas produknya ringan, Anda dapat bergerak kapan saja\r\n\r\nSPECIFICATION:\r\n• Material: Polister Tebal Lembut\r\n• Finish material: Polister Tebal Lembut\r\n• Color: polos & Garis\r\n• Weight: +- 1.3kg\r\n• Weight: +- 1.3kg\r\n• Styrofoam filling: +-0.7 kg\r\n\r\nUkuran sofa besar, sehingga saat Anda membeli barang, biaya transportasi tinggi dan toko telah mengatur diskon barang untuk Anda.', 10000),
(2, 1, 7, 'Meja Makan Keluarga Cemara', 200000, 'u9c4tid-11134207-7rbke-m68i3s8axujs53.jpg', 'Fitur:\r\n- Lapisan Kuat dan Tahan Air. Tahan air dan anti rayapCantik, elegan, mudah dibersihkan\r\n- Bingkai baja, kinerja anti karat yang kuat dan baik. Sangat stabil untuk menempatkan sesuatu.\r\n- Meja lebar untuk segala keperluan.\r\n- Cocok untuk digunakan di ruang makan.\r\nSpesifikasi\r\nUkuran: 140×80×72CM\r\nWarna: Tekstur Marmer Putih\r\nBahan: MDF\r\nInformasi Instalasi: Produk dikirim dalam kondisi BELUM DIRAKIT. Perakitan dilakukan sendiri oleh customer.', 200),
(3, 1, 7, 'cendol', 10000, 'no_markReactNative-snapshot-image_2.png', 'Spesifikasi Meja:\r\n• Material: Rangka besi berkualitas + kaca tempered tahan ledakan\r\n• Warna: Hitam elegan\r\n• Ukuran Meja: Sesuai Dengan Gambar\r\n\r\nBentuk: Bundar\r\n\r\nFitur Lipat: Mudah dilipat & disimpan\r\n• Permukaan Meja: Kaca tempered - kuat, tahan gores, dan mudah dibersihkan\r\n\r\nSpesifikasi Kursi:\r\n• Material: Rangka besi kuat, dudukan dan sandaran ratan plastik imitasi\r\n\r\nDesain: Minimalis modern dengan bentuk busur ergonomis\r\n\r\nWarna: Coklat tua elegan\r\n• Ukuran Kursi: Sesuai Dengan Gambar\r\n• Fitur Kursi: Anti karat & tahan cuaca\r\n• Mudah dibersihkan\r\n• Ringan namun kokoh\r\n• Nyaman digunakan dalam waktu lama', 300),
(5, 1, 7, 'Dipan Kokoh', 600000, 'IMG-20250712-WA00031.jpg', 'spu: B-F-10031 \r\nMerek: Avenco \r\nPenggunaan: Kontrakan, Asrama\r\n\r\nStrukturnya dapat dilipat dan disimpan dengan mudah. Ketika kamu perlu pindah rumah, cukup lipat rangkanya, kemudian kemas kembali ke dalam paket tanpa memakan banyak ruang, praktis untuk dibawa dan dipasang kembali di tempat tinggal baru. Selain memiliki kualitas bahan dan teknologi produksi yang setara dengan produk umum di pasaran, produk kami juga menawarkan keunggulan berikut:\r\n• Kokoh\r\n• Mudah dirakit\r\n• Anti bising', 1000),
(6, 2, 2, 'Piring Keramik Jepang Seri Yamada Classic Lukisan Tangan', 100000, 'IMG-20250712-WA00131.jpg', 'DESKRIPSI PRODUK LENGKAP\r\n• Piring 18 cm (Semua Motif)\r\n• Diameter: 18 cm\r\n• Tinggi: 3.5 cm\r\n\r\nBisa Untuk Microwave, Oven, dan Dish Washer\r\n\r\nStandard packing kami udah pakai bubble & dus. Kalao mau lebih aman silakan beli \"Extra Bubble\", langsung search \"bubble\" saja.\r\n\r\nKalao beli Extra Bubble barang nya masih pecah/rusak, 100% di ganti.', 500),
(7, 11, 4, 'Boneka Pororo', 150000, 'IMG-20250712-WA00081.jpg', 'produk kami sangat cocok untuk di jadikan kado atau untuk koleksi pribadi anak anak, karna berbahan lembut serta aman untuk bayi\r\n\r\nspesifikasi produk\r\n\r\n• Menggunakan bahan Yelvo grade A kualitas terbaik yang lembut\r\n• Ukuran boneka 25Cm\r\n• Toleransi ukuran 1 - 3 cm saat potong bahan dan jait\r\n• 100% silikon Dacron tanpa bahan campuran lainnya, sehingga tidak mudah kempis dan akan mengembang kembali ke bentuk asli ketika di vacum\r\n• Berlabel SNI', 300),
(8, 11, 4, 'BonekaTedy Bear 15cm Buket Boneka Hampers Souvenir Boneka Viral', 200000, 'IMG-20250712-WA00071.jpg', 'Deskripsi dari Produk ini:\r\n• Boneka Terbuat dari Bahan VELBOA Import Yaitu Bahan Super Soft Halus dan Lembut Kualitas Terbaik.\r\n• Isi Boneka Menggunakan Kapas Dacron Great A yaitu Kapas Kualitas Terbaik.\r\n• Jahitan Boneka Rapih dan Kuat.\r\n• Quality Control Packaging\r\n• Boneka Berukuran 15cm\r\n• Isian Mesin Capit Boneka\r\n\r\nBoneka karakter Bear 15cm lucu boneka buket pajangan boneka hadiah /mainan Capit Boneka\r\nKami menyediakan berbagai macam macam karakter boneka Berlebel SNI', 250),
(9, 11, 4, 'Mainan Murah Bayi Balita Anak Bebek Karet', 20000, 'IMG-20250712-WA00061.jpg', 'Deskripsi Produk:\r\n• BERAT = 7gr\r\n• 1KG = 185pcs\r\n• 2KG = 328pcs\r\n• Bahan: Rubber / Karet\r\n• Ukuran: ±3 x ±3.5 x 3cm\r\n\r\nFitur:\r\n• Dapat Mengapung di Air.\r\n• Dapat Berbunyi Nyit Nyit saat di tekan\r\n• Aman jika di gigit oleh Bayi.', 100),
(10, 11, 4, 'Mainan Truk Molen', 50000, 'IMG-20250712-WA00051.jpg', '• Tanpa Batere: Mainan ini tidak memerlukan baterai, sehingga anak dapat bermain secara bebas tanpa khawatir kehabisan daya.\r\n• Berputar 360°: Nikmati kegembiraan bermain dengan mobil ini yang dapat berputar 360°, menambah keseruan dan kelincahan dalam permainan.\r\n• Bahan Aman: Dibuat dari bahan halus dan aman bagi bayi, sehingga Anda dapat memiliki ketenangan pikiran saat anak bermain.\r\n• Bahan Plastik ABS: Menggunakan bahan plastik ABS berkualitas tinggi yang tahan lama dan aman untuk digunakan oleh anak-anak.', 100),
(11, 10, 1, 'MORWICK - Kaos Short Sleeve Lengan Pendek Pria - Wellness - Putih', 100000, 'IMG-20250712-WA00091.jpg', 'Kaos Morwick lengan pendek dengan material Cotton Combed 30s yang lembut,nyaman, dan adem. Cocok digunakan di iklim tropis.\r\n\r\nSpesifikasi:\r\n• Material Cotton Combed 24S\r\n• Sablon Plastisol (Oil Based)\r\n\r\nPengembalian bisa dilakukan apabila ada kesalahan pengiriman/cacat produk dari pihak Kami, dengan menyertakan video unboxing.\r\n\r\nJangan lupa ambil voucher Gratis Ongkir dan Voucher Toko.\r\n\r\nTerima Kasih.\r\nSelamat Berbelanja!', 400),
(12, 10, 1, 'BRADERFACT - Celana Pendek Boardshort Unisex', 200000, 'IMG-20250712-WA00121.jpg', 'NOTE:\r\n• Toleransi 1-2 cm\r\n• Kenyamanan Tinggi : Bahan Fleece lembut dan nyaman\r\n• Pinggang Elastis: Cocok untuk berbagai Postur Tubuh\r\n• Mudah Dicuci: Cepat kering dan perawatan mudah\r\n\r\nJangan ragu untuk bertanya lebih detail melalui chat\r\n\r\nDapatkan celana pendek boardshort yang nyaman dan stylish untuk menemani aktivitas santai atau nongkrong anda\r\n\r\nPelayanan dan kepuasan pembeli adalah prioritas bagi kami\r\nHAPPY SHOPPING', 225),
(13, 10, 1, 'Gadabang Hoodie Boxy Oversize Starboy Menyala Sablon Reflective Gdbng Putih', 300000, 'IMG-20250712-WA00111.jpg', 'Sweater Hoodie Boxy Menyala Gdbng Putih Sablon Menyala Ketika Terkena Cahaya PRODUK READY\r\n\r\nBaca Deskripsi Terlebih Dahulu.\r\nTidak menerima pengembalian jika barang yang dikirimkan sesuai dan tidak ada cacat, sebelum membeli cek detail ukuran yang ada di deskripsi atau di photo\r\n\r\nMembeli produk ini berarti sudah setuju tidak melakukan pengembalian jika barang sudah dikirimkan sesuai dengan pesanan.\r\n\r\nDetail Produk:\r\n• Bahan: Fleece PE 280gsm\r\n• Sablon Menyala: Reflective Silver, Relective Grey Buat\r\n• Hoodie Warna Putih\r\n• Hodie Tanpa Tali\r\n• Jahitan Kupluk 2\r\n• Drop Shoulder Sleeve', 400),
(14, 10, 1, 'House of Smith Sweater Cardigan Pria - New Cartigre Bw', 225000, 'IMG-20250712-WA00101.jpg', 'Fitur Utama:\r\n• Bahan: French Terry Scouring, 60% Cotton 40%\r\n• Polyester, menawarkan perpaduan sempurna antara kelembutan dan Kenyamanan.\r\n• Desain: Desain Embroidery, Simpel dan Elegan yang cocok untuk berbagai kesempatan.\r\n• Warna: Broken White, mudah dipadukan dengan berbagai pakaian.\r\n• Kualitas: 260-280 gsm, memberikan kehangatan dan kenyamanan yang substansial.\r\n\r\nUsage:\r\nSweater Cardigan ini sangat cocok digunakan dalam berbagai aktivitas sehari-hari, baik untuk hangout bersama teman, maupun kegiatan outdoor ringan. Desainnya yang simpel & elegan membuatnya mudah dipadukan dengan berbagai jenis pakaian lain seperti jeans atau celana pendek. Ideal juga untuk berbagai cuaca, memberikan kenyamanan maksimal tanpa mengorbankan gaya.', 250),
(15, 2, 2, 'Piring Cantik Keramik/piring mangkok keramik/ piring aesthetic/piring/piring kramik', 75000, 'IMG-20250712-WA00141.jpg', 'Spesifikasi produk diperlihatkan pada gambar\r\n• Berat Estimasi Pengiriman: 7-inci ≈ 400g / 8-inci 500g\r\n• Setiap piring dibuat dengan bahan keramik berkualitas tinggi, melalui proses pengolahan yang sempurna dan pembakaran pada suhu tinggi, untuk memastikan kualitas yang unggul dan tahan lama.\r\n• Bisa untuk piring nasi, mie, steak, kue, roti dan sejenisnya, tahan panas dan dingin.', 400),
(16, 2, 2, 'Gelas Kaca Aesthetic Gaya Jepang', 50000, 'IMG-20250712-WA00151.jpg', 'Informasi Produk Loveyalty Gelas Japanese Style Yamazaki Rock Glass 180ml\r\n\r\nBuat acara Anda makin gemerlap dengan old fashioned glass atau rock glass dari Loveyalty ini. Desain Jepang dan pembiasan warna pelangi membuat tampilan gelas semakin memikat. Segera dapatkan gelas ini dan nikmati suasana seperti berlibur di Havana.\r\n\r\nFitur:\r\n• Menyajikan Minuman dengan Menawan\r\n• Kemewahan minuman tampak semakin menawan dengan gelas yang satu ini. Bentuk yang artistik serta pembiasan warna pelangi akan memukau siapa pun yang memegangnya. Dengan gelas ini, Anda tidak hanya menyajikan minuman tetapi juga sebuah karya seni.', 300),
(17, 2, 2, 'Gelas Kaca ALE / Gelas Cola / Can Glass / Gelas Kaca Estetik Cafe Restoran 470 ml', 75000, 'IMG-20250712-WA00161.jpg', '• Material: Kaca\r\n• Kapasitas: 470 ml\r\n• Diameter: 7.6 cm\r\n• Tinggi: 13.4 cm\r\n\r\nWAJIB BACA:\r\n• Sebelum dikirim semua barang sudah pasti kami cek\r\n• Kami tidak akan mengirimkan barang yang pecah, rusah, ataupun bekas.\r\n• Kerusakan / kehilangan yang terjadi dalam perjalanan (ekspedisi) di luar kendali dan bukan kesalahan penjual. Standard packing kami sudah menggunakan bubble wrap, kardus dan di sticker fragile.\r\n• Untuk pengiriman yang lebih aman silahkan tambah produk Extra Bubble Wrap Rp. 2000,- setiap pcs sesuai dengan jumlah pembelian gelas. Contoh: Pembelian 5 pcs gelas mohon membeli extra bubble wrap 5 pcs juga. Apabila pembelian 5 pcs gelas namun hany pc extra bubble, maka hanya 1 pcs gelas ya bubble wrap.', 250),
(18, 2, 2, 'Sendok Makan Lapisan Gold 24 Karat', 400000, 'IMG-20250712-WA00171.jpg', 'Sendok Dengan Lapisin Gold Asli 24 Karat - Premium Quality Super tebal dan permukaan halus - Bahan Stainless Steel Anti Karat Food Grade dan Quality Check\r\n\r\nPermukaan MENGKILAP Seperti Kaca = Mirror Polished\r\n\r\nPinggiran / Finishing Halus dan Mulus. Pinggiran Tidak Tajam dan Tidak Bergerigi / Kasar\r\n\r\nORIGINAL terbuat dari Stainless Steel yang merupakan kualitas Stainless Steel paling tinggi untuk Food Grade.', 200);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `caption_slider` text NOT NULL,
  `foto_slider` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `caption_slider`, `foto_slider`) VALUES
(1, '<p>Temukan hoodie terbaik di toko kita... hadir dengan desain eksklusif, bahan premium, dan kenyamanan maksimal untuk gaya harianmu!</p>\r\n', '1.png'),
(2, '<p>Temukan sofa terbaik di toko kita... desain mewah yang menyatu sempurna dengan ruang tamu impianmu.</p>\r\n', '2.png'),
(3, '<p>Temukan alat makan terbaik di toko kita... buat momen makanmu makin estetik dan penuh gaya!</p>\r\n', '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_member_beli` int(11) NOT NULL,
  `id_member_jual` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `belanja_transaksi` int(11) NOT NULL,
  `status_transaksi` enum('pesan','lunas','batal','dikirim','selesai') NOT NULL DEFAULT 'pesan',
  `ongkir_transaksi` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `bayar_transaksi` int(11) NOT NULL,
  `distrik_pengirim` varchar(255) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `wa_pengirim` varchar(50) NOT NULL,
  `alamat_pengirim` text NOT NULL,
  `distrik_penerima` varchar(255) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `wa_penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `nama_ekspedisi` varchar(100) NOT NULL,
  `layanan_ekspedisi` varchar(100) NOT NULL,
  `estimasi_ekspedisi` varchar(50) NOT NULL,
  `berat_ekspedisi` varchar(50) NOT NULL,
  `resi_ekspedisi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_member_beli`, `id_member_jual`, `tanggal_transaksi`, `belanja_transaksi`, `status_transaksi`, `ongkir_transaksi`, `total_transaksi`, `bayar_transaksi`, `distrik_pengirim`, `nama_pengirim`, `wa_pengirim`, `alamat_pengirim`, `distrik_penerima`, `nama_penerima`, `wa_penerima`, `alamat_penerima`, `nama_ekspedisi`, `layanan_ekspedisi`, `estimasi_ekspedisi`, `berat_ekspedisi`, `resi_ekspedisi`) VALUES
(1, '', 1, 2, '2025-03-13 09:56:01', 100000, 'pesan', 20000, 120000, 120000, 'Bantul', 'Lanesra', '08990423789', 'Bambanglipuro No 12 Bantul', 'Sleman', 'Arif Nur Rohman', '089530168889', 'Purwomartani RT 4 Kalasan Sleman', 'JNE', 'Kilat', '1 hari', '1000', NULL),
(2, '202506120309306903', 2, 1, '2025-06-12 03:09:30', 2000, 'pesan', 180000, 182000, 182000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '180000', '2000', NULL),
(3, '202506120313155165', 2, 1, '2025-06-12 03:13:15', 2000, 'pesan', 180000, 182000, 182000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '180000', '2000', NULL),
(4, '202506120313361124', 2, 1, '2025-06-12 03:13:36', 2000, 'pesan', 180000, 182000, 182000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '180000', '2000', NULL),
(5, '202506120319299094', 2, 1, '2025-06-12 03:19:29', 2000, 'lunas', 180000, 182000, 182000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '180000', '2000', '123#q0'),
(6, '202506190138053231', 2, 1, '2025-06-19 01:38:05', 2000, 'lunas', 45000, 47000, 47000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '45000', '1100', 'admin#123'),
(7, '202506190241009598', 2, 1, '2025-06-19 02:41:00', 2000, 'lunas', 90000, 92000, 92000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '90000', '2000', NULL),
(8, '202506190251475613', 2, 1, '2025-06-19 02:51:47', 2000, 'lunas', 90000, 92000, 92000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '90000', '2000', 'wawa'),
(9, '202506220941479876', 1, 2, '2025-06-22 09:41:47', 100000, 'lunas', 180000, 280000, 280000, 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '180000', '3000', NULL),
(10, '202506220948515480', 2, 1, '2025-06-22 09:48:51', 15000, 'pesan', 90000, 105000, 105000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '90000', '1500', '9090#'),
(11, '202506260434129351', 1, 2, '2025-06-26 04:34:12', 200000, 'lunas', 180000, 380000, 380000, 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '180000', '6000', NULL),
(12, '202506260447333836', 1, 2, '2025-06-26 04:47:33', 900000, 'lunas', 486000, 1386000, 1386000, 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '486000', '27000', '123#qq'),
(13, '202506260512286077', 2, 1, '2025-06-26 05:12:28', 9000, 'pesan', 45000, 54000, 54000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '45000', '900', NULL),
(14, '202506260515131862', 1, 2, '2025-06-26 05:15:13', 300000, 'lunas', 558000, 858000, 858000, 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '558000', '9000', NULL),
(15, '202507030148407540', 2, 1, '2025-07-03 01:48:40', 3000, 'pesan', 45000, 48000, 48000, 'Kabupaten Sambas Kalimantan Barat', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '45000', '300', NULL),
(16, '202507171432048270', 10, 2, '2025-07-17 14:32:04', 400000, 'lunas', 11000, 411000, 411000, 'Kabupaten Sleman DI Yogyakarta', 'Lanesra', '081336952939', 'Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta', 'Kabupaten Sleman - DI Yogyakarta', 'nandana', '085227727700', 'JL. K. H. Syarbini no. 257 A', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '11000', '200', NULL),
(17, '202507181339278147', 10, 1, '2025-07-18 13:39:27', 800000, 'lunas', 22000, 822000, 822000, 'Kabupaten Sleman DI Yogyakarta', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'nandana', '085227727700', 'JL. K. H. Syarbini no. 257 A', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '22000', '1200', '123#qq'),
(18, '202507181402216006', 10, 1, '2025-07-18 14:02:21', 600000, 'lunas', 11000, 611000, 611000, 'Kabupaten Sleman DI Yogyakarta', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'nandana', '085227727700', 'JL. K. H. Syarbini no. 257 A', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '11000', '1000', '0K3'),
(19, '202507181417449078', 10, 1, '2025-07-18 14:17:44', 200000, 'lunas', 11000, 211000, 211000, 'Kabupaten Sleman DI Yogyakarta', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'nandana', '085227727700', 'JL. K. H. Syarbini no. 257 A', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '11000', '200', NULL),
(20, '202507181511091132', 10, 1, '2025-07-18 15:11:09', 200000, 'lunas', 70000, 270000, 270000, 'Kabupaten Sleman DI Yogyakarta', 'Arif Nur Rohman, M. Kom.', '08990423789', 'Purwomartani Kalasan Sleman', 'Kabupaten Sleman DI Yogyakarta', 'nandana', '085227727700', 'JL. K. H. Syarbini no. 257 A', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '1-2', '10000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_beli` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `jumlah_rating` int(11) DEFAULT NULL,
  `ulasan_rating` text DEFAULT NULL,
  `waktu_rating` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_produk`, `nama_beli`, `harga_beli`, `jumlah_beli`, `jumlah_rating`, `ulasan_rating`, `waktu_rating`) VALUES
(1, 1, 1, 'Hijab Segi Empat', 50000, 1, NULL, NULL, NULL),
(2, 1, 2, 'Mukena', 50000, 1, NULL, NULL, NULL),
(3, 3, 1, 'Hijab Segi Empat', 1000, 2, NULL, NULL, NULL),
(4, 4, 1, 'Hijab Segi Empat', 1000, 2, NULL, NULL, NULL),
(5, 5, 1, 'Hijab Segi Empat', 1000, 2, NULL, NULL, NULL),
(6, 6, 5, 'onderdil', 1000, 1, 4, 'Bagus Banget', '2025-06-19 05:22:18'),
(7, 6, 1, 'Hijab Segi Empat', 1000, 1, 4, 'Next order lagi', '2025-06-19 05:22:18'),
(8, 7, 1, 'Hijab Segi Empat', 1000, 2, 5, 'Bagus saya suka', '2025-06-19 06:35:14'),
(9, 8, 1, 'Hijab Segi Empat', 1000, 2, NULL, NULL, NULL),
(10, 9, 6, 'Lorem Ipsum', 100000, 1, 5, 'Keren banget', '2025-07-07 15:49:58'),
(11, 10, 5, 'onderdil', 1000, 15, NULL, NULL, NULL),
(12, 11, 6, 'Lorem Ipsum', 100000, 2, 5, 'wowowowowowowoo', '2025-06-26 04:35:54'),
(13, 12, 6, 'Lorem Ipsum', 100000, 9, 5, 'oke banget', '2025-06-26 04:48:10'),
(14, 13, 5, 'onderdil', 1000, 9, NULL, NULL, NULL),
(15, 14, 6, 'Lorem Ipsum', 100000, 3, 5, '', '2025-06-26 05:20:07'),
(16, 15, 5, 'onderdil', 1000, 3, NULL, NULL, NULL),
(17, 16, 18, 'Sendok Makan Lapisan Gold 24 Karat', 400000, 1, NULL, NULL, NULL),
(18, 17, 2, 'Meja Makan Keluarga Cemara', 200000, 1, 4, 'Mantap banget', '2025-07-18 13:42:15'),
(19, 17, 5, 'Dipan Kokoh', 600000, 1, 4, 'Sip', '2025-07-18 13:42:15'),
(20, 18, 5, 'Dipan Kokoh', 600000, 1, 4, 'Kokoh banget', '2025-07-18 14:06:45'),
(21, 19, 2, 'Meja Makan Keluarga Cemara', 200000, 1, 4, '', '2025-07-18 14:19:54'),
(22, 20, 1, 'Sofa Empuk', 200000, 1, 5, 'Sofanya empuk banget', '2025-07-18 15:11:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
