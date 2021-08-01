-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2021 pada 07.29
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `budgetings`
--

CREATE TABLE `budgetings` (
  `id_budget` int(11) NOT NULL,
  `jenis_laporan` int(2) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `act_stok` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `budgetings`
--

INSERT INTO `budgetings` (`id_budget`, `jenis_laporan`, `id_product`, `id_category`, `qty`, `act_stok`, `remark`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10001, 10, 11, 22, NULL, 1, 0, '2021-07-30 15:41:06', '2021-07-30 15:41:06'),
(2, 1, 10001, 10, 11, 22, NULL, 1, 0, '2021-07-30 15:44:21', '2021-07-30 15:44:21'),
(3, 1, 10002, 10, 11, 0, NULL, 0, 0, '2021-07-30 15:53:11', '2021-07-30 15:53:11'),
(4, 1, 10017, 10, 11, 0, 'tidak', 0, 0, '2021-07-30 15:53:30', '2021-07-30 15:53:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` int(3) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_category`, `kategori`, `created_at`, `updated_at`) VALUES
(10, 'Amai', '2021-07-05 07:41:58', NULL),
(20, 'Bube', '2021-07-05 07:42:20', NULL),
(30, 'Chirou', '2021-07-05 07:42:32', NULL),
(40, 'Hello Wagyu', '2021-07-05 07:42:47', NULL),
(50, 'Tousta', '2021-07-05 07:43:01', NULL),
(60, 'Holdak', '2021-07-05 07:43:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(3) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_customer`, `nama_konsumen`, `created_at`, `updated_at`) VALUES
(1, 'Konsumen A', '2018-11-27 06:11:23', '2018-12-06 21:18:48'),
(3, 'Konsumen B', '2018-11-30 16:28:15', '2018-12-06 21:18:58'),
(5, 'konsumen C', '2018-12-07 23:39:36', '2018-12-07 23:39:36'),
(6, 'Konsumen D', '2018-12-12 09:01:57', '2018-12-12 09:01:57'),
(7, 'Konsumen E', '2018-12-12 09:02:11', '2018-12-12 09:02:11'),
(8, 'Konsumen F', '2018-12-16 00:32:08', '2018-12-16 00:32:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_category` int(3) NOT NULL,
  `kemasan` varchar(50) DEFAULT '',
  `uom` varchar(50) NOT NULL DEFAULT '',
  `stok` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_product`, `nama_barang`, `id_category`, `kemasan`, `uom`, `stok`, `created_at`, `updated_at`) VALUES
(10001, 'Telur Ayam', 10, '', 'Kg', 22, '2021-07-05 08:26:20', '2021-07-28 13:26:23'),
(10002, 'Butter Elle', 10, '', 'Pack', 0, '2021-07-05 08:26:20', '2021-07-08 02:48:22'),
(10003, ' Daun Basil ', 10, '', 'Gr', 0, '2021-07-05 08:26:20', NULL),
(10004, ' Bawang Putih', 10, '', 'Kg', 0, '2021-07-05 08:26:20', NULL),
(10005, ' Bawang Merah', 10, '', 'Kg', 0, '2021-07-05 08:26:20', NULL),
(10006, ' Daun Parsley', 10, '', 'Gr', 0, '2021-07-05 08:26:20', NULL),
(10007, 'Daun Dill', 10, '', 'Gr', 0, '2021-07-05 08:26:20', NULL),
(10008, 'Bawang Bombay', 10, '', 'Kg', 0, '2021-07-05 08:26:20', NULL),
(10009, ' Ketimun', 10, '', 'Kg', 0, '2021-07-05 08:26:20', NULL),
(10010, 'Lemon', 10, '', 'Kg', 0, '2021-07-05 08:26:20', NULL),
(10011, 'Gula Jawa', 10, '', 'Gr', 0, '2021-07-05 08:32:25', NULL),
(10012, 'Cabe Rawit Merah', 10, '', 'Kg', 0, '2021-07-05 08:32:25', NULL),
(10013, 'Cabe Merah Kriting', 10, '', 'Kg', 0, '2021-07-05 08:32:25', NULL),
(10014, ' Cabe Merah Besar', 10, '', 'Kg', 0, '2021-07-05 08:32:25', NULL),
(10015, '  Sereh', 10, '', 'Kg', 0, '2021-07-05 08:32:25', NULL),
(10016, '  Daun Jeruk', 10, '', 'Gr', 0, '2021-07-05 08:32:25', NULL),
(10017, ' Tomat Merah', 10, '', 'Kg', 0, '2021-07-05 08:32:25', NULL),
(10018, 'Tomat Hijau', 10, '', 'Kg', 0, '2021-07-05 08:32:25', NULL),
(10019, ' Kecombrang', 10, '', 'Kg', 0, '2021-07-05 08:32:25', NULL),
(10020, ' Cabe Kriting Hijau', 10, '', 'Kg', 0, '2021-07-05 08:32:25', NULL),
(10021, ' Cabe Rawit Hijau', 10, '', 'Kg', 0, '2021-07-05 08:34:16', NULL),
(10022, ' Cabe Hijau Besar', 10, '', 'Kg', -153, '2021-07-05 08:34:16', NULL),
(10023, ' Daun Salam', 10, '', 'Gr', 0, '2021-07-05 08:34:16', NULL),
(10024, ' Daun Kunyit', 10, '', 'Gr', 0, '2021-07-05 08:34:16', NULL),
(10025, ' Jahe Kupas', 10, '', 'Kg', 0, '2021-07-05 08:34:16', NULL),
(10026, ' Lengkuas', 10, '', 'Kg', 0, '2021-07-05 08:34:16', NULL),
(10027, ' Kunyit', 10, '', 'Kg', 0, '2021-07-05 08:34:16', NULL),
(10028, ' Kemiri', 10, '', 'Kg', 0, '2021-07-05 08:34:16', NULL),
(10029, ' Asam Jawa', 10, '', 'Gr', 0, '2021-07-05 08:34:16', NULL),
(10030, ' Parmesan Cheese', 10, '', 'Gr', 0, '2021-07-05 08:34:16', NULL),
(10031, 'Mozarella', 10, '', 'Gr', 0, '2021-07-05 08:37:52', NULL),
(10032, ' Mayonaise', 10, '', 'Gln', 0, '2021-07-05 08:37:52', NULL),
(10033, ' Sauce Tomat ABC Galon 5700ml', 10, '', 'Gln', 0, '2021-07-05 08:37:52', NULL),
(10034, ' Sauce Sambal ABC Galon 5700ml', 10, '', 'Gln', 0, '2021-07-05 08:37:52', NULL),
(10035, 'SKM Bendera', 10, '', 'Kg', 0, '2021-07-05 08:37:52', NULL),
(10036, 'Mustard Yellow French', 10, '', 'Btl', 0, '2021-07-05 08:37:52', NULL),
(10037, 'Dijon Mustard', 10, '', 'Btl', 0, '2021-07-05 08:37:52', NULL),
(10038, ' Madu Nusantara', 10, '', 'Btl', 0, '2021-07-05 08:37:52', NULL),
(10039, ' L&P Worchester Sc', 10, '', 'Kg', 0, '2021-07-05 08:37:52', NULL),
(10040, 'Gulaku', 10, '', 'Kg', 0, '2021-07-05 08:37:52', NULL),
(10041, 'Kara Santan', 10, '', 'Ltr', 0, '2021-07-05 08:39:57', NULL),
(10042, ' Jinten', 10, '', 'Gr', 0, '2021-07-05 08:39:57', NULL),
(10043, 'Anistar', 10, '', 'Gr', 0, '2021-07-05 08:39:57', NULL),
(10044, 'Kluwek Bubuk', 10, '', 'Gr', 0, '2021-07-05 08:39:57', NULL),
(10045, 'Tepung Tapioka', 10, '', 'Kg', 0, '2021-07-05 08:39:57', NULL),
(10046, 'Tepung Beras', 10, '', 'Kg', 0, '2021-07-05 08:39:57', NULL),
(10047, 'Baking Powder Kupu-Kupu', 10, '', 'Btl', 0, '2021-07-05 08:39:57', NULL),
(10048, 'Bumbu Petis', 10, '', 'Btl', 0, '2021-07-05 08:39:57', NULL),
(10049, 'Bumbu Rendang', 10, '', 'Gr', 0, '2021-07-05 08:39:57', NULL),
(10050, 'Cabe Merah Giling', 10, '', 'Kg', 0, '2021-07-05 08:39:57', NULL),
(10051, 'Beras Ramos', 10, '', 'Kg', 0, '2021-07-05 08:42:02', NULL),
(10052, ' Beras Ketan', 10, '', 'Kg', 0, '2021-07-05 08:42:02', NULL),
(10053, 'Terigu Segitiga Biru', 10, '', 'Kg', 0, '2021-07-05 08:42:02', NULL),
(10054, 'Minyak Bimoli 18 liter', 10, '', 'Ltr', 0, '2021-07-05 08:42:02', NULL),
(10055, 'Bowl Rice Amai', 10, '', 'Pcs', 0, '2021-07-05 08:42:02', NULL),
(10056, 'Lid Bowl Amai', 10, '', 'Pcs', 0, '2021-07-05 08:42:02', NULL),
(10057, 'Carry to go Box', 10, '', 'Pcs', 0, '2021-07-05 08:42:02', NULL),
(10058, 'Vacum Bag', 10, '', 'Pack', 0, '2021-07-05 08:42:02', NULL),
(10059, 'Gula Merah', 10, '', 'Kg', 0, '2021-07-05 08:42:02', NULL),
(10060, 'Daun Kari', 10, '', 'Pack', 0, '2021-07-05 08:42:02', NULL),
(10061, 'Kentang Fresh', 10, '', 'Kg', 0, '2021-07-05 08:42:55', NULL),
(10062, 'Sendok Garpu Plastik', 10, '', 'Pack', 0, '2021-07-05 08:42:55', NULL),
(10063, 'Kentimun', 10, '', 'Kg', 0, '2021-07-05 08:42:55', NULL),
(10064, 'Daun Kailan', 10, '', 'Gr', 0, '2021-07-05 08:42:55', NULL),
(20001, 'Aloevera', 20, '3 Kg', 'Kg', 0, '2021-07-05 09:15:11', NULL),
(20002, 'Biji Kopi Umbe Blend (1kg/pack)/ Bube Coffee Bean)', 20, '1 Kg', 'Kg', 0, '2021-07-05 09:15:11', NULL),
(20003, 'Biscof Crumb (Tabur)', 20, '500 Gr', 'Gr', 0, '2021-07-05 09:15:11', NULL),
(20004, 'Biscuit Marie Regal', 20, '1 Bungkus', 'Bungkus', 0, '2021-07-05 09:15:11', NULL),
(20005, 'Gula cair', 20, '1 Kg', 'Kg', 0, '2021-07-05 09:15:11', NULL),
(20006, 'Pandan', 20, '1 Kg', 'Kg', 0, '2021-07-05 09:15:11', NULL),
(20007, 'Sedotan Bubble Sterill', 20, '1 Bungkus', 'Bungkus', 0, '2021-07-05 09:15:11', NULL),
(20008, 'Sedotan Hitam sterill', 20, '1 Bungkus', 'Bungkus', 0, '2021-07-05 09:15:11', NULL),
(20009, 'Stirrer HOT Bube (1000pcs/plastik)', 20, '1 Kg', 'Kg', 0, '2021-07-05 09:15:11', NULL),
(20010, 'Susu Carnation (SKM)', 20, '1 Klg', 'Klg', 0, '2021-07-05 09:15:11', NULL),
(20011, 'Tiramisu', 20, '1 Bungkus', 'Bungkus', 0, '2021-07-05 09:17:32', NULL),
(20012, 'Tutup Gelas HOT Bube (1000pcs/dus)', 20, '30 Ltr', 'Ltr', 0, '2021-07-05 09:17:32', NULL),
(20013, 'Yakult', 20, '1 Pack @ 100 Pcs', 'Pack', 0, '2021-07-05 09:17:32', NULL),
(20014, 'Biscof Spread', 20, '', 'Can', 0, '2021-07-05 09:19:22', NULL),
(20015, 'Boba (12kg/dus)', 20, '', 'Dus', 0, '2021-07-05 09:19:22', NULL),
(20016, 'Bube Lid Sealer ', 20, '', 'Pcs', 0, '2021-07-05 09:19:22', NULL),
(20017, 'Bubuk Oreo (1 kg/pack)', 20, '', 'Pack', 0, '2021-07-05 09:19:22', NULL),
(20018, 'Caramel Sauce', 20, '', 'Btl', 0, '2021-07-05 09:19:22', NULL),
(20019, 'Gelas Cup Bube (1000pcs/ dus ) Bube Cup 18Oz', 20, '', 'Dus', 0, '2021-07-05 09:19:22', NULL),
(20020, 'Gelas HOT Bube (1000pcs/dus)', 20, '', 'Pack', 0, '2021-07-05 09:19:22', NULL),
(20021, 'Gula Kelapa Organik (3kg per pack)', 20, '', 'Pack', 0, '2021-07-05 09:22:39', NULL),
(20022, 'Gulaku 3 kg', 20, '', 'Kg', 0, '2021-07-05 09:22:39', NULL),
(20023, 'Kabel Tis', 20, '', 'Pack', 0, '2021-07-05 09:22:39', NULL),
(20024, 'Lid Hot', 20, '', 'Pack', 0, '2021-07-05 09:22:39', NULL),
(20025, 'Nata De Coco', 20, '', 'Pack', 0, '2021-07-05 09:22:39', NULL),
(20026, 'Ovaltine Biskuit', 20, '', 'Pcs', 0, '2021-07-05 09:22:39', NULL),
(20027, 'Plastik Besar Bube (PE 35)', 20, '', 'Pack', 0, '2021-07-05 09:22:39', NULL),
(20028, 'Plastik merah Besar (PE 35)', 20, '', 'Pack', 0, '2021-07-05 09:22:39', NULL),
(20029, 'Plastik Panjang Bube (Double)', 20, '', 'Pack', 0, '2021-07-05 09:22:39', NULL),
(20030, 'Plastik Seal', 20, '', 'Pack', 0, '2021-07-05 09:22:39', NULL),
(20031, 'Plastik Single', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20032, 'Powder Alpukat (1kg/Pack) Avocado', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20033, 'Powder Banana', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20034, 'Powder Cheese (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20035, 'Powder Coklat (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20036, 'Powder Creamer (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20037, 'Powder Espresso (500g/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20038, 'Powder Honey', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20039, 'Powder Grass Jelly', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20040, 'Powder Lime (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:24:28', NULL),
(20041, 'Powder Lychee (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20042, 'Powder Machiato (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20043, 'Powder Mango (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20044, 'Powder Matcha (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20045, 'Powder Milk Tea (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20046, 'Powder Strowberry', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20047, 'Powder Taro (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20048, 'Powder Thai Tea (1kg/Pack)', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20049, 'Powder Vanila Latte', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20050, 'Sedotan Besar/ Sedotan Samping', 20, '', 'Pack', 0, '2021-07-05 09:25:59', NULL),
(20051, 'Susu UHT ( 1lt/ Pack)', 20, '', 'Pack', 0, '2021-07-05 09:27:21', NULL),
(20052, 'Test', 20, '', 'Pcs', 10, '2021-07-07 21:01:04', '2021-07-07 21:01:04'),
(20063, 'kacang', 20, '', 'Kg', 0, '2021-07-28 13:00:24', '2021-07-28 13:00:24'),
(30001, ' Kol Merah', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30002, 'Kol Putih', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30003, ' Wartel Import', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30004, ' Bawang Bombay', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30005, ' Head Lettuce', 30, '', 'Gr', 0, '2021-07-05 09:01:19', NULL),
(30006, ' Lemon Import', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30007, 'Cabai Merah Besar', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30008, 'Cabai Merah Kriting', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30009, ' Bawang Merah Kupas', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30010, ' Bawang Putih Kupas', 30, '', 'Kg', 0, '2021-07-05 09:01:19', NULL),
(30011, ' Terasi Udang', 30, '', 'Gr', 0, '2021-07-05 09:03:48', NULL),
(30012, ' Daun Jeruk', 30, '', 'Kg', 0, '2021-07-05 09:03:48', NULL),
(30013, ' Buah Nanas', 30, '', 'Kg', 0, '2021-07-05 09:03:48', NULL),
(30014, ' Daun Basil', 30, '', 'Gr', 0, '2021-07-05 09:03:48', NULL),
(30015, ' Tepung Meizena', 30, '', 'Kg', 0, '2021-07-05 09:03:48', NULL),
(30016, ' Minyak Goreng Bimoli', 30, '', 'Jar', 0, '2021-07-05 09:03:48', NULL),
(30017, ' Sambal Pedas ABC 5.7 liter', 30, '', 'Jar', 0, '2021-07-05 09:03:48', NULL),
(30018, ' Sambal Tomat ABC 5.7 liter', 30, '', 'Jar', 0, '2021-07-05 09:03:48', NULL),
(30019, 'Olive Oli Bertolli', 30, '', 'Gr', 0, '2021-07-05 09:03:48', NULL),
(30020, ' Parmesan Cheese', 30, '', 'Kg', 0, '2021-07-05 09:03:48', NULL),
(30021, ' Tepung Terigu Segitiga Biru', 30, '', 'Kg', 0, '2021-07-05 09:05:28', NULL),
(30022, ' Telur Ayam', 30, '', 'Kg', 0, '2021-07-05 09:05:28', NULL),
(30023, ' Mayonaise', 30, '', 'Kg', 0, '2021-07-05 09:05:28', NULL),
(30024, ' Lada Bubuk', 30, '', 'Gr', 0, '2021-07-05 09:05:28', NULL),
(30025, ' Parsley Bubuk', 30, '', 'Gr', 0, '2021-07-05 09:05:28', NULL),
(30026, ' Gulaku', 30, '', 'Kg', 0, '2021-07-05 09:05:28', NULL),
(30027, ' Beras Sego Pulen', 30, '', 'Kg', 0, '2021-07-05 09:05:28', NULL),
(30028, 'Garlic Powder', 30, '', 'Gr', 0, '2021-07-05 09:05:28', NULL),
(30029, ' Chiken Knoor Powder', 30, '', 'Kg', 0, '2021-07-05 09:05:28', NULL),
(30030, 'Beras Ketan', 30, '', 'Kg', 0, '2021-07-05 09:05:28', NULL),
(30031, 'Jahe', 30, '', 'Gr', 0, '2021-07-05 09:06:03', NULL),
(30032, 'Paprika Powder', 30, '', 'Kg', 0, '2021-07-05 09:06:03', NULL),
(30033, ' Saus Belibis Sachet Pedas', 30, '', 'Pack', 0, '2021-07-05 09:06:03', NULL),
(30037, 'Test', 30, '', 'Pcs', 22, '2021-07-07 21:09:52', '2021-07-07 21:09:52'),
(40001, ' Ao nori (Nori Bubuk)', 40, '', 'Pack', 0, '2021-07-05 08:46:40', NULL),
(40002, 'Ayam Fillet', 40, '', 'Porsi', 0, '2021-07-05 08:46:40', NULL),
(40003, ' Bawang Bombai', 40, '', 'Kg', 0, '2021-07-05 08:46:40', NULL),
(40004, ' Bawang Putih Kupas', 40, '', 'Kg', 0, '2021-07-05 08:46:40', NULL),
(40005, ' Beras Sego Pulen', 40, '', 'Kg', 0, '2021-07-05 08:46:40', NULL),
(40006, ' Biji Lada Hitam Kasar', 40, '', 'Pack', 0, '2021-07-05 08:46:40', NULL),
(40007, 'Bowl Rice Bowl ', 40, '', 'Pcs', 0, '2021-07-05 08:46:40', NULL),
(40008, 'Lid Rice Bowl ', 40, '', 'Pcs', 0, '2021-07-05 08:46:40', NULL),
(40009, ' Buncis ', 40, '', 'Kg', 0, '2021-07-05 08:46:40', NULL),
(40010, ' Chilli Flake', 40, '', 'Pack', 0, '2021-07-05 08:46:40', NULL),
(40011, ' Crabstick CEDEA', 40, '', 'Pack', 0, '2021-07-05 08:48:52', NULL),
(40012, ' Daun Bawang', 40, '', 'Kg', 0, '2021-07-05 08:48:52', NULL),
(40013, ' Foil Mentai AX350', 40, '', 'Pcs', 0, '2021-07-05 08:48:52', NULL),
(40014, ' Tutup Foil Mentai AX350', 40, '', 'Pcs', 0, '2021-07-05 08:48:52', NULL),
(40015, ' Garam (Dolphin)', 40, '', 'Kg', 0, '2021-07-05 08:48:52', NULL),
(40016, ' Garlic Flake', 40, '', 'Kg', 0, '2021-07-05 08:48:52', NULL),
(40017, ' Gula Pasir (GMP)', 40, '', 'Kg', 0, '2021-07-05 08:48:52', NULL),
(40018, 'Gyudon Normal', 40, '', 'Porsi', 0, '2021-07-05 08:48:52', NULL),
(40019, 'Gyudon Upsize', 40, '', 'Porsi', 0, '2021-07-05 08:48:52', NULL),
(40020, ' Jagung Frozen', 40, '', 'Kg', 0, '2021-07-05 08:48:52', NULL),
(40021, ' Jamur Tiram', 40, '', 'Pack', 0, '2021-07-05 08:51:50', NULL),
(40022, ' Jahe', 40, '', 'Kg', 0, '2021-07-05 08:51:50', NULL),
(40023, ' Kabel Ties 10cm @100pcs', 40, '', 'Pack', 0, '2021-07-05 08:51:50', NULL),
(40024, ' Kantong Plastik PE Putih UK (24x40)', 40, '', 'Pack', 0, '2021-07-05 08:51:50', NULL),
(40025, ' Kantong Plastik PE Putih UK (28x48)', 40, '', 'Pack', 0, '2021-07-05 08:51:50', NULL),
(40026, ' Kizami Nori', 40, '', 'Pack', 0, '2021-07-05 08:51:50', NULL),
(40027, ' Minyak Goreng', 40, '', 'Drigen', 0, '2021-07-05 08:51:50', NULL),
(40028, ' Olitalia Olio Extra Virgine Di Oliva Tartufo 250 ', 40, '', 'Btl', 0, '2021-07-05 08:51:50', NULL),
(40029, 'Oyakodon Sauce', 40, '', 'Pack', 0, '2021-07-05 08:51:50', NULL),
(40030, ' Plastik Klip 6x10cm', 40, '', 'Pack', 0, '2021-07-05 08:51:50', NULL),
(40031, ' Plastik Pipet Infuser Food 2Ml (pipet Truffle oil', 40, '', 'Butir', 0, '2021-07-05 08:54:41', NULL),
(40032, 'Salmon', 40, '', 'Porsi', 0, '2021-07-05 08:54:41', NULL),
(40033, ' Sendok Plastik', 40, '', 'Pack', 0, '2021-07-05 08:54:41', NULL),
(40034, ' Sesame Seed Rosted', 40, '', 'Pack', 0, '2021-07-05 08:54:41', NULL),
(40035, 'Shiro Sauce (Chiro Sauce)', 40, '', 'Pack', 0, '2021-07-05 08:54:41', NULL),
(40036, 'Shoyu Sauce', 40, '', 'Pack', 0, '2021-07-05 08:54:41', NULL),
(40037, 'Steak (Gyu Steak)', 40, '', 'Porsi', 0, '2021-07-05 08:54:41', NULL),
(40038, 'Sticker', 40, '', 'Pack', 0, '2021-07-05 08:54:41', NULL),
(40039, ' Susu UHT', 40, '', 'Dus', 0, '2021-07-05 08:54:41', NULL),
(40040, ' Telur', 40, '', 'Pcs', 0, '2021-07-05 08:54:41', NULL),
(40041, 'Teriyaki Sauce', 40, '', 'Pack', 0, '2021-07-05 08:57:05', NULL),
(40042, 'Truffle Oil', 40, '', 'Pcs', 0, '2021-07-05 08:57:05', NULL),
(40043, 'Torch Gas', 40, '', 'Tabung', 0, '2021-07-05 08:57:05', NULL),
(40044, 'Wagyu Normal', 40, '', 'Porsi', 0, '2021-07-05 08:57:05', NULL),
(40045, 'Wagyu Upsize', 40, '', 'Porsi', 0, '2021-07-05 08:57:05', NULL),
(50001, 'Bawang Bombai', 50, '', 'Pcs', 0, '2021-07-05 09:35:02', NULL),
(50002, 'Bawang Putih', 50, '', 'Kg', 0, '2021-07-05 09:35:02', NULL),
(50003, 'Beef Bacon @1kg', 50, '', 'Kg', 0, '2021-07-05 09:35:02', NULL),
(50004, 'Beef Patties @20Pcs', 50, '', 'Bungkus', 0, '2021-07-05 09:35:02', NULL),
(50005, 'Box Jumbo Bites', 50, '', 'Pcs', 0, '2021-07-05 09:35:02', NULL),
(50006, 'Cheddar Slice Orange/ Red @84Pcs', 50, '', 'Pack', 0, '2021-07-05 09:35:02', NULL),
(50007, 'Cheddar Slice White @84Pcs', 50, '', 'Pack', 0, '2021-07-05 09:35:02', NULL),
(50008, 'Chicken Burger @10Pcs', 50, '', 'Bungkus', 0, '2021-07-05 09:35:02', NULL),
(50009, 'Cream Cheese @2Kg', 50, '', 'Kg', 0, '2021-07-05 09:35:02', NULL),
(50010, 'Crunchy Hazelnut Spread @500Gr', 50, '', 'Pail', 0, '2021-07-05 09:35:02', NULL),
(50011, 'Cup 150ml u/ Tea Cream @25Pcs', 50, '', 'Pack', 0, '2021-07-05 09:37:37', NULL),
(50012, 'Cup 60ml', 50, '', 'Pcs', 0, '2021-07-05 09:37:37', NULL),
(50013, 'Cup Syrup @50Pcs', 50, '', 'Bungkus', 0, '2021-07-05 09:37:37', NULL),
(50014, 'Daging Bulgogi (Short Plate) @2Kg', 50, '', 'Kg', 0, '2021-07-05 09:37:37', NULL),
(50015, 'Earl Grey Tea @500Gr', 50, '', 'Pack', 0, '2021-07-05 09:37:37', NULL),
(50016, 'Garam', 50, '', 'Bungkus', 0, '2021-07-05 09:37:37', NULL),
(50017, 'Japanese Sauce @1800ml', 50, '', 'Btl', 0, '2021-07-05 09:37:37', NULL),
(50018, 'Kaldu', 50, '', 'Bungkus', 0, '2021-07-05 09:37:37', NULL),
(50019, 'Karaage', 50, '', 'Kg', 0, '2021-07-05 09:37:37', NULL),
(50020, 'Keju Prochiz', 50, '', 'Pack', 0, '2021-07-05 09:37:37', NULL),
(50021, 'Knoor Chiken Penyedap Rasa', 50, '', 'Kg', 0, '2021-07-05 09:39:24', NULL),
(50022, 'Lada', 50, '', 'Bungkus', 0, '2021-07-05 09:39:24', NULL),
(50023, 'Lotus Biscoff Biscuit @250Gr', 50, '', 'Pack', 0, '2021-07-05 09:39:24', NULL),
(50024, 'Maple Srup', 50, '', 'Btl', 0, '2021-07-05 09:39:24', NULL),
(50025, 'Earl Grey Tea @500Gr', 50, '', 'Pack', 0, '2021-07-05 09:39:24', NULL),
(50026, 'Marie Regal Silver @230Gr', 50, '', 'Pack', 0, '2021-07-05 09:39:24', NULL),
(50027, 'Marshmallow', 50, '', 'Bungkus', 0, '2021-07-05 09:39:24', NULL),
(50028, 'Mayonnaise Merah', 50, '', 'Kg', 0, '2021-07-05 09:39:24', NULL),
(50029, 'Mayonnaise Putih', 50, '', 'Kg', 0, '2021-07-05 09:39:24', NULL),
(50030, 'Meises', 50, '', 'Kg', 0, '2021-07-05 09:39:24', NULL),
(50031, 'Mentega', 50, '', 'Kg', 0, '2021-07-05 09:41:47', NULL),
(50032, 'Minyak Goreng @2liter', 50, '', 'Liter', 0, '2021-07-05 09:41:47', NULL),
(50033, 'Mozzarella', 50, '', 'Kg', 0, '2021-07-05 09:41:47', NULL),
(50034, 'Nutella', 50, '', 'Kg', 0, '2021-07-05 09:41:47', NULL),
(50035, 'Oreo Crumbs', 50, '', 'Kg', 0, '2021-07-05 09:41:47', NULL),
(50036, 'Parmesan', 50, '', 'Kg', 0, '2021-07-05 09:41:47', NULL),
(50037, 'Peanut Biscuit', 50, '', 'Bungkus', 0, '2021-07-05 09:41:47', NULL),
(50038, 'Roti', 50, '', 'Loaf', 0, '2021-07-05 09:41:47', NULL),
(50039, 'Salted Egg Powder', 50, '', 'Kg', 0, '2021-07-05 09:41:47', NULL),
(50040, 'Sambal Sachet', 50, '', 'Pcs', 0, '2021-07-05 09:41:47', NULL),
(50041, 'Saus Bulgogi @1000ml', 50, '', 'Btl', 0, '2021-07-05 09:44:04', NULL),
(50042, 'Saus Katsu @1000ml', 50, '', 'Btl', 0, '2021-07-05 09:44:04', NULL),
(50043, 'Selai Blueberry', 50, '', 'Kg', 0, '2021-07-05 09:44:04', NULL),
(50044, 'Selai Coklat', 50, '', 'Kg', 0, '2021-07-05 09:44:04', NULL),
(50045, 'Selai Kacang @2kg', 50, '', 'Kg', 0, '2021-07-05 09:44:04', NULL),
(50046, 'Selai Strawberry', 50, '', 'Kg', 0, '2021-07-05 09:44:04', NULL),
(50047, 'Shortening', 50, '', 'Kg', 0, '2021-07-05 09:44:04', NULL),
(50048, 'Smoked Beef @54Pcs', 50, '', 'Bungkus', 0, '2021-07-05 09:44:04', NULL),
(50049, 'Susu Kental Manis', 50, '', 'Klg', 0, '2021-07-05 09:44:04', NULL),
(50050, 'Susu UHT', 50, '', 'Ltr', 0, '2021-07-05 09:44:04', NULL),
(50051, 'Telur', 50, '', 'Pcs', 0, '2021-07-05 09:45:57', NULL),
(50052, 'Tousta Box Take Away', 50, '', 'Pcs', 0, '2021-07-05 09:45:57', NULL),
(50053, 'Tray Dine In', 50, '', 'Pcs', 0, '2021-07-05 09:45:57', NULL),
(50054, 'Tray Toast (kecil)', 50, '', 'Pcs', 0, '2021-07-05 09:45:57', NULL),
(50055, 'Truffle Spray @40ml', 50, '', 'Btl', 0, '2021-07-05 09:45:57', NULL),
(50056, 'Tuna @1440gr', 50, '', 'Bungkus', 0, '2021-07-05 09:45:57', NULL),
(50057, 'Whip Cream', 50, '', 'Ltr', 0, '2021-07-05 09:45:57', NULL),
(50058, 'Wrapping Paper @100lmbr', 50, '', 'Pack', 0, '2021-07-05 09:45:57', NULL),
(50059, 'Test', 50, '', 'Pcs', 0, '2021-07-07 21:15:54', '2021-07-07 21:16:34'),
(60001, '5 yangmyeon bone chicken', 60, '', 'Pack', 0, '2021-07-05 07:45:03', '2021-07-07 21:36:32'),
(60002, '9 yangmyeon bone chicken', 60, '', 'Pack', 0, '2021-07-05 07:53:54', NULL),
(60003, 'Ayam Boneless Frozen 135gr', 60, '', 'Porsi', 0, '2021-07-05 07:54:06', NULL),
(60004, 'Ayam Boneless Frozen 210gr', 60, '', 'Porsi', 0, '2021-07-05 07:56:36', NULL),
(60005, 'Ayam Boneless Frozen 80gr', 60, '', 'Porsi', 0, '2021-07-05 07:56:59', NULL),
(60006, 'Beef Galbi/ Bulgogi', 60, '', 'Pack', 0, '2021-07-05 07:57:51', NULL),
(60007, 'Beras', 60, '', 'Kg', 0, '2021-07-05 07:59:37', NULL),
(60008, 'Box Corn Dog', 60, '', 'Pcs', 0, '2021-07-05 07:59:41', NULL),
(60009, 'Cabe Bubuk ( Volcano)', 60, '', 'Gr', 0, '2021-07-05 07:59:45', NULL),
(60010, 'Carry Pack To Go Box', 60, '', 'Pcs', 0, '2021-07-05 08:00:37', NULL),
(60011, 'Cheese Sause (Corndog)', 60, '', 'Kg', 0, '2021-07-05 08:00:40', NULL),
(60012, 'Corndog Kentang (HJP)', 60, '', 'Pack', 0, '2021-07-05 08:00:44', NULL),
(60013, 'Corndog Sochi (SC)', 60, '', 'Pack', 0, '2021-07-05 08:02:43', NULL),
(60014, 'Corndog Sosis (SS)', 60, '', 'Pack', 0, '2021-07-05 08:02:50', NULL),
(60015, 'Corndog Mozza FC', 60, '', 'Pack', 0, '2021-07-05 08:02:54', NULL),
(60016, 'Cup 16 Oz (Gelas Minuman)', 60, '', 'Pcs', 0, '2021-07-05 08:05:27', NULL),
(60017, 'Cup 22 Oz', 60, '', 'Pcs', 0, '2021-07-05 08:05:32', NULL),
(60018, 'Cup 8 oz', 60, '', 'Pcs', 0, '2021-07-05 08:05:35', NULL),
(60019, 'Cup Mini Holdak', 60, '', 'Pcs', 0, '2021-07-05 08:06:28', NULL),
(60020, 'Cup Salad', 60, '', 'Pcs', 0, '2021-07-05 08:06:32', NULL),
(60021, 'Honey Butter (Condrog)', 60, '', 'Kg', 0, '2021-07-05 08:06:37', NULL),
(60022, 'Karkas Ayam/ Ayam 9', 60, '', 'Pack', 0, '2021-07-05 08:11:26', NULL),
(60023, 'Kentang/ French Fries', 60, '', 'Kg', 0, '2021-07-05 08:11:26', NULL),
(60024, 'Kertas Pembungkus', 60, '', 'Pcs', 0, '2021-07-05 08:11:26', NULL),
(60025, 'Kimchi Extract', 60, '', 'Gr', 0, '2021-07-05 08:11:26', NULL),
(60026, 'Kuah Odeng', 60, '', 'Pack', 0, '2021-07-05 08:11:26', NULL),
(60027, 'Lid 8', 60, '', 'Pack', 0, '2021-07-05 08:11:26', NULL),
(60028, 'Lid 12', 60, '', 'Pack', 0, '2021-07-05 08:11:26', NULL),
(60029, 'Lid Cup 22 Oz', 60, '', 'Pcs', 0, '2021-07-05 08:11:26', NULL),
(60030, 'Lid Cup Salad', 60, '', 'Pcs', 0, '2021-07-05 08:11:26', NULL),
(60031, 'Lid Dome', 60, '', 'Pcs', 0, '2021-07-05 08:11:26', NULL),
(60032, 'Lid Sealer', 60, '', 'Pcs', 0, '2021-07-05 08:14:20', NULL),
(60033, 'Mainan', 60, '', 'Pcs', 0, '2021-07-05 08:14:20', NULL),
(60034, 'Mayonaise (Condrog)', 60, '', 'Pack', 0, '2021-07-05 08:14:20', NULL),
(60035, 'Mie Telur', 60, '', 'Pack', 0, '2021-07-05 08:14:20', NULL),
(60036, 'Minyak Fry Best/ Minyak Beku', 60, '', 'Dus', 0, '2021-07-05 08:14:20', NULL),
(60037, 'Napa kimchi', 60, '', '-', 0, '2021-07-05 08:14:20', NULL),
(60038, 'Odeng/ Kulit Odeng', 60, '', 'Pack', 0, '2021-07-05 08:14:20', NULL),
(60039, 'Paper Tray', 60, '', 'Pack', 0, '2021-07-05 08:14:20', NULL),
(60040, 'Powder Chili BBQ', 60, '', 'Gr', 0, '2021-07-05 08:14:20', NULL),
(60041, 'Powder Keju/ Cheese Powder', 60, '', 'Gr', 0, '2021-07-05 08:14:20', NULL),
(60042, 'Powder Seaweed', 60, '', 'Gr', 0, '2021-07-05 08:16:55', NULL),
(60043, 'RICE BOWL + TUTUP', 60, '', '-', 0, '2021-07-05 08:16:55', NULL),
(60044, 'Rice Wrap ', 60, '', '-', 0, '2021-07-05 08:16:55', NULL),
(60045, 'Salted Egg', 60, '', 'Pack', 0, '2021-07-05 08:16:55', NULL),
(60046, 'Saus Gochucang', 60, '', '-', 0, '2021-07-05 08:16:55', NULL),
(60047, 'Saus Cheese/ Keju', 60, '', 'Pack', 0, '2021-07-05 08:16:55', NULL),
(60048, 'Saus Manis', 60, '', '-', 0, '2021-07-05 08:16:55', NULL),
(60049, 'Saus Pedas', 60, '', 'Pack', 0, '2021-07-05 08:16:55', NULL),
(60050, 'Sawi Putih', 60, '', 'Kg', 0, '2021-07-05 08:16:55', NULL),
(60051, 'Telur', 60, '', 'Pcs', 0, '2021-07-05 08:16:55', NULL),
(60052, 'Topping Chocomaltine', 60, '', '-', 0, '2021-07-05 08:18:54', NULL),
(60053, 'Topping Nutella', 60, '', '-', 0, '2021-07-05 08:18:54', NULL),
(60054, 'Topping Greentea ', 60, '', '-', 0, '2021-07-05 08:18:54', NULL),
(60055, 'Topping Tiramisu', 60, '', '-', 0, '2021-07-05 08:18:54', NULL),
(60056, 'Torch Gas', 60, '', 'Tabung', 0, '2021-07-05 08:18:54', NULL),
(60057, 'Tteokbokki Pack', 60, '', 'Kg', 0, '2021-07-05 08:18:54', NULL),
(60058, 'White Bag Large', 60, '', 'Pcs', 0, '2021-07-05 08:18:54', NULL),
(60059, 'White Bag Small', 60, '', 'Pcs', 0, '2021-07-05 08:18:54', NULL),
(60061, 'Test', 60, '', 'Pcs', 1, '2021-07-07 21:21:55', '2021-07-07 21:21:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchases`
--

CREATE TABLE `purchases` (
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_category` int(3) NOT NULL,
  `qty` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchases`
--

INSERT INTO `purchases` (`id_purchase`, `id_product`, `id_category`, `qty`, `status`, `date`, `updated_at`) VALUES
(4, 10001, 10, 1, 1, '2021-07-29 09:01:59', NULL),
(5, 10001, 10, 1, 1, '2021-07-30 17:33:31', NULL),
(6, 10001, 10, 11, 1, '2021-07-30 17:34:36', NULL);

--
-- Trigger `purchases`
--
DELIMITER $$
CREATE TRIGGER `cancel_purchase` AFTER DELETE ON `purchases` FOR EACH ROW BEGIN
	UPDATE products SET stok = products.stok - OLD.qty
	WHERE id_product = OLD.id_product;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `purchases_product` AFTER INSERT ON `purchases` FOR EACH ROW BEGIN 
	UPDATE products SET stok=stok+NEW.qty
	WHERE id_product=NEW.id_product;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `requisitions`
--

CREATE TABLE `requisitions` (
  `id_requisitions` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_category` int(3) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `date` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sells`
--

CREATE TABLE `sells` (
  `id_sell` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_category` int(3) NOT NULL,
  `qty` int(4) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sells`
--

INSERT INTO `sells` (`id_sell`, `id_product`, `id_category`, `qty`, `status`, `date`, `updated_at`) VALUES
(2, 10001, 10, 9, 1, '2020-07-06 10:32:17', '2021-07-29 02:42:13'),
(4, 10001, 10, 11, 1, '2021-07-06 10:32:55', '2021-07-06 03:32:58'),
(6, 10001, 20, 40, 1, '2021-07-07 23:00:39', '2021-07-08 06:54:42'),
(7, 10001, 10, 1, 1, '2021-07-08 00:03:20', '2021-07-07 17:03:22'),
(8, 10002, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(9, 10002, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(10, 10002, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(11, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(12, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(13, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(14, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(15, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(16, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(17, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(18, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(19, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(20, 10022, 10, 9, 1, '2021-07-07 10:32:17', '2021-07-30 12:02:06'),
(21, 10022, 10, 9, 1, '2021-07-07 10:32:17', '2021-07-30 12:02:02'),
(22, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(23, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(24, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(25, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(26, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(27, 10022, 10, 9, 1, '2021-07-06 10:32:17', '2021-07-06 03:32:27'),
(29, 10001, 10, 1, 1, '2021-07-29 08:56:19', '2021-07-29 01:56:31');

--
-- Trigger `sells`
--
DELIMITER $$
CREATE TRIGGER `cancel_sell` AFTER DELETE ON `sells` FOR EACH ROW BEGIN
	UPDATE products SET stok = products.stok + OLD.qty
	WHERE id_product = OLD.id_product;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sells_product` AFTER INSERT ON `sells` FOR EACH ROW BEGIN 
	UPDATE products SET stok=stok-NEW.qty
	WHERE id_product=NEW.id_product;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` int(3) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `nama_supplier`, `created_at`, `updated_at`) VALUES
(5, 'Supplier 2', '2018-11-30 16:27:49', '2018-12-06 21:18:23'),
(6, 'Supplier 3', '2018-12-06 21:18:35', '2018-12-06 21:18:35'),
(8, 'Supplier 4', '2018-12-12 09:01:18', '2018-12-12 09:01:18'),
(10, 'Supplier 1', '2018-11-27 02:01:36', '2018-12-06 21:18:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Arif', 'arif@contoh.com', '$2y$10$p2ih9YHRlyrQxbM2gG/ytO4f/2hdKEFNhSjJLBK0MJjQ.BziMoYgC', 'ADMIN', 'sCNjjCYVCHfUX2pi6Awv0CdNwvFU4jSTTd2fPRAJQSG70LtcDSUtq6NPsCcR', '2018-11-22 18:04:05', '2018-11-22 18:04:05'),
(3, 'lina', 'linacantik@email.com', '$2y$10$IA1oUYMugGabtdXsMGtDYewtSYNN4P.eJI0uebA3LeliaBZojjbfe', 'ADMIN', 'Wc6ZV1lqNldNF5HiWFiQKeTp6QMKvLonJ9WM5eNe2JFP1XxkKIkqG2Vf1NRb', '2021-07-05 00:25:23', '2021-07-05 00:25:23'),
(4, 'rian', 'rian@email.com', '$2y$10$irwEiPfEsIAgD9q..1zyCeAPp1TkruzTEaybFq3Z2tTOcTwwCYdtO', 'MEMBER', 'TngyM9bW7PQnd1JZHQIUWHpzMckOY50gZvfqhuXeDVsmwwyKAcf5jJlNfSfV', '2021-07-07 20:38:16', '2021-07-07 20:38:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `budgetings`
--
ALTER TABLE `budgetings`
  ADD PRIMARY KEY (`id_budget`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `nama` (`nama_barang`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchase`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id_requisitions`),
  ADD KEY `id_requisitions` (`id_requisitions`),
  ADD KEY `requisitions1` (`id_category`),
  ADD KEY `requisitions2` (`id_product`);

--
-- Indeks untuk tabel `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id_sell`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `sells_ibfk_2` (`id_category`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `budgetings`
--
ALTER TABLE `budgetings`
  MODIFY `id_budget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60062;

--
-- AUTO_INCREMENT untuk tabel `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id_requisitions` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sells`
--
ALTER TABLE `sells`
  MODIFY `id_sell` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Ketidakleluasaan untuk tabel `requisitions`
--
ALTER TABLE `requisitions`
  ADD CONSTRAINT `requisitions1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `requisitions2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `sells_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `sells_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
