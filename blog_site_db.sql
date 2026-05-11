-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2026 at 01:57 PM
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
-- Database: `blog_site_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `category`, `image`, `content`, `created_at`) VALUES
(1, 1, 'Manage the efforts.', NULL, NULL, 'Including the Life aint felt . if the efforts are nor visible .', '2026-03-01 10:53:09'),
(2, 1, 'Whats happening Around !', NULL, NULL, 'Aint that selfish to not know , the audacity died while the remark been passed .Step outside the clowny lawns.', '2026-03-06 09:29:05'),
(3, 3, 'Schools are not to neglect culture, Create the dynamic stability', 'News', '1778497356_pexels-peterdanthy-32476662.jpg', '“Education is not the learning of facts, but the training of minds to think.” Albert Einstein Ever since I’ve gotten deeper into spirituality, meditation and metaphysics, a lot of my views on a variety of subjects have changed dramatically. But something that hasn’t changed since the time I was a kid is my views on the education system. We usually think of schools as environments to stimulate learning, but it ironically manages to stifle the innate curiosity and the eagerness to learn that are present in all of us as children. It promotes mindless conformity and conveniently ignores the fact that we are all unique individuals with different talents, inclinations, and aspirations. Schools curtail independent thinking and puts all of us through standardised tests, and sees it as a good indicator to determine someone’s level of intelligence. The system frankly never made sense to me, and I would often sit in class and wonder how most of what I was taught in class would have any real-life application.\r\n\r\nA serious educational shift has begun in recent years, moving away from traditional percentage grading to standards-based grading (SBG) models for both teaching and learning. SBG transitions from percentages to a skills-based system that focuses on how well students are reaching specific learning targets outlined and defined in a given curriculum. In place of percentages, students are graded on their level of proficiency, such as consistently meeting expectations, frequently meeting expectations, approaching expectations, or making minimal progress.\"', '2026-05-11 11:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$x/.vtB5AtzcrxHvKBXuCsugSLtDKTK4xJecyje/PnH5xvejdv48gq', '2026-03-01 10:51:07'),
(2, 'Alpha', 'alpha@beta.com', '$2y$10$NwxaL9V60gD60iXFQakDdO/ey9Fg.1R01ICeqpb.WQuNrdBk2dQmW', '2026-05-11 10:33:06'),
(3, 'xyzzzz', 'xyz@mail.com', '$2y$10$oiRU.UViRmUnC25oXDYJKeNWfq1vqIqjtA8udi9JdpQ1hgN0oPioO', '2026-05-11 10:47:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
