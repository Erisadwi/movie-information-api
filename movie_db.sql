-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2026 pada 03.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `api_logs`
--

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL,
  `endpoint` varchar(100) DEFAULT NULL,
  `copied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `api_logs`
--

INSERT INTO `api_logs` (`id`, `endpoint`, `copied_at`) VALUES
(1, 'http://localhost/UTSAPI/api/get_movies.php', '2026-04-07 07:14:57'),
(2, 'http://localhost/UTSAPI/api/get_movies.php', '2026-04-07 07:15:24'),
(3, 'http://localhost/UTSAPI/api/get_movies.php', '2026-04-07 07:15:37'),
(4, 'http://localhost/UTSAPI/api/get_movie.php?id=1', '2026-04-07 07:16:27'),
(5, 'http://localhost/UTSAPI/api/add_movie.php', '2026-04-07 07:16:30'),
(6, 'http://localhost/UTSAPI/api/update_movie.php?id=1', '2026-04-07 07:16:33'),
(7, 'http://localhost/UTSAPI/api/delete_movie.php?id=1', '2026-04-07 07:16:37'),
(8, 'http://localhost/UTSAPI/api/get_movies.php', '2026-04-07 08:07:27'),
(9, 'http://localhost/UTSAPI/api/add_movie.php', '2026-04-07 11:39:10'),
(10, 'http://localhost/UTSAPI/api/update_movie.php?id=1', '2026-04-07 12:02:08'),
(11, 'http://localhost/UTSAPI/api/add_movie.php', '2026-04-07 12:08:35'),
(12, 'http://localhost/UTSAPI/api/update_movie.php?id=1', '2026-04-07 12:09:24'),
(13, 'http://localhost/UTSAPI/api/delete_movie.php?id=1', '2026-04-07 12:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `year`, `rating`) VALUES
(1, 'Inception', 'Sci-Fi', 2010, 9),
(2, 'Interstellar', 'Sci-Fi', 2014, 9.2),
(3, 'The Dark Knight', 'Action', 2008, 9.3),
(4, 'Batman Begins', 'Action', 2005, 8.2),
(5, 'Avengers Endgame', 'Action', 2019, 8.9),
(6, 'Avengers Infinity War', 'Action', 2018, 8.7),
(7, 'Iron Man', 'Action', 2008, 8),
(8, 'Captain America Civil War', 'Action', 2016, 8.1),
(9, 'Doctor Strange', 'Action', 2016, 7.9),
(10, 'Thor Ragnarok', 'Action', 2017, 8),
(11, 'Parasite', 'Thriller', 2019, 8.6),
(12, 'Joker', 'Drama', 2019, 8.5),
(13, 'The Social Network', 'Drama', 2010, 7.9),
(14, 'Forrest Gump', 'Drama', 1994, 8.8),
(15, 'The Shawshank Redemption', 'Drama', 1994, 9.3),
(16, 'Fight Club', 'Drama', 1999, 8.8),
(17, 'Whiplash', 'Drama', 2014, 8.5),
(18, 'La La Land', 'Musical', 2016, 8),
(19, 'Titanic', 'Romance', 1997, 8),
(20, 'The Notebook', 'Romance', 2004, 7.8),
(21, 'Frozen', 'Animation', 2013, 7.8),
(22, 'Toy Story', 'Animation', 1995, 8.3),
(23, 'Toy Story 3', 'Animation', 2010, 8.4),
(24, 'Finding Nemo', 'Animation', 2003, 8.2),
(25, 'Up', 'Animation', 2009, 8.3),
(26, 'Inside Out', 'Animation', 2015, 8.1),
(27, 'The Conjuring', 'Horror', 2013, 7.5),
(28, 'Insidious', 'Horror', 2010, 7.4),
(29, 'A Quiet Place', 'Horror', 2018, 7.6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `api_key`, `created_at`) VALUES
(1, 'Admin Movie', 'admin@movieapi.com', NULL, 'MOVIE-API-123456', '2026-04-07 04:14:35'),
(2, 'Budi Santoso', 'budi@mail.com', NULL, 'MOVIE-API-111111', '2026-04-07 04:14:35'),
(3, 'Siti Aisyah', 'siti@mail.com', NULL, 'MOVIE-API-222222', '2026-04-07 04:14:35'),
(4, 'Rizky Pratama', 'rizky@mail.com', NULL, 'MOVIE-API-333333', '2026-04-07 04:14:35'),
(5, 'Dewi Lestari', 'dewi@mail.com', NULL, 'MOVIE-API-444444', '2026-04-07 04:14:35'),
(6, 'Andi Wijaya', 'andi@mail.com', NULL, 'MOVIE-API-555555', '2026-04-07 04:14:35'),
(7, 'Rina Kurnia', 'rina@mail.com', NULL, 'MOVIE-API-666666', '2026-04-07 04:14:35'),
(8, 'Fajar Hidayat', 'fajar@mail.com', NULL, 'MOVIE-API-777777', '2026-04-07 04:14:35'),
(10, 'Erisa Dwi Xena Anindhyta', '23081010049@student.upnjatim.ac.id', '$2y$10$S73tGpNQ/iplHWf4OM/Cje2woJLMW8OdP4/LxUwBTQn5cCWjSh3E2', 'MOVIE-API-bfd1036e28', '2026-04-07 04:39:55'),
(11, 'Maheswari', 'dian@gmail.com', '$2y$10$I7Z4lJdyciStY0oGkTu5neXxvBUIS0di27AQl5cJ4eddjEhBWG2YW', 'MOVIE-API-3d425ec29b', '2026-04-07 04:43:46'),
(12, 'DEWI', 'DEWI@gmail.com', '$2y$10$hv5r7yw9g0/tp8/D72rBeeYxPE3dnQZZjz7XF0uYg7HHnASfVk3tu', 'MOVIE-API-c4609af7db', '2026-04-07 04:47:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
