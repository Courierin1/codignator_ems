-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2024 at 11:00 AM
-- Server version: 10.11.5-MariaDB-3
-- PHP Version: 8.3.3-1+0~20240216.17+debian11~1.gbp87e37b

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shu-don-lee`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutform`
--

CREATE TABLE `aboutform` (
  `id` int(11) NOT NULL,
  `text` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutform`
--

INSERT INTO `aboutform` (`id`, `text`) VALUES
(1, '<p><i><strong>About of Liability:</strong></i></p><p>I, the undersigned, knowingly and willingly submit my entry to the World Taiji Science Federation (WTSF), hereafter collectively referred to as the \"Organizing Committee\". By participating in all activities organized by the Organizing Committee, I acknowledge and assume all risks associated with physical and mental injuries, disabilities, and losses that may occur during or as a result of my participation in the events.</p><p>I hereby release the Organizing Committee, including their co-organizations, partners, officers, agents, representatives, volunteers, referees, and other related members, from any and all claims, actions, suits, and controversies, whether in law or equity, arising from or in connection with my participation in their activities. This release applies to any injury, harm, or loss sustained by me or caused by any matter, cause, or thing whatsoever.</p><p>I understand and acknowledge that any medical attention or treatment provided to me by the Organizing Committee, including their officers, medical personnel, representatives, volunteers, and other related members, will be limited to first aid only. I hereby release them from any liability associated with such medical assistance. I am fully responsible for obtaining my own medical coverage.</p><p>I agree to abide by and comply with the rules and regulations established by the Organizing Committee. I will conduct myself in a professional and respectful manner throughout the event.</p><p>I acknowledge that my performance, attendance, and participation at the WTSF or Organizing Committee events, including their co-organizations and partners, may be filmed, recorded, released, or broadcasted live. I hereby grant the Organizing Committee the right to use my name, voice, poses, pictures, and biographical data, in full or in part, in any form or language, with or without other materials, worldwide, without limitations, for television, radio, video, theatrical, or any other medium, using any existing or future devices. I waive any claim for compensation and release any future rights related to the aforementioned use.</p><p>I have read and fully understand the contents of this waiver of liability.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `enroll_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` varchar(222) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bed_setup`
--

CREATE TABLE `bed_setup` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `name` varchar(222) DEFAULT NULL,
  `price` varchar(222) DEFAULT NULL,
  `tax` varchar(222) DEFAULT NULL,
  `totalprice` varchar(222) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `text` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `text`) VALUES
(1, '<p><i><strong>Contact of Liability:</strong></i></p><p>I, the undersigned, knowingly and willingly submit my entry to the World Taiji Science Federation (WTSF), hereafter collectively referred to as the \"Organizing Committee\". By participating in all activities organized by the Organizing Committee, I acknowledge and assume all risks associated with physical and mental injuries, disabilities, and losses that may occur during or as a result of my participation in the events.</p><p>I hereby release the Organizing Committee, including their co-organizations, partners, officers, agents, representatives, volunteers, referees, and other related members, from any and all claims, actions, suits, and controversies, whether in law or equity, arising from or in connection with my participation in their activities. This release applies to any injury, harm, or loss sustained by me or caused by any matter, cause, or thing whatsoever.</p><p>I understand and acknowledge that any medical attention or treatment provided to me by the Organizing Committee, including their officers, medical personnel, representatives, volunteers, and other related members, will be limited to first aid only. I hereby release them from any liability associated with such medical assistance. I am fully responsible for obtaining my own medical coverage.</p><p>I agree to abide by and comply with the rules and regulations established by the Organizing Committee. I will conduct myself in a professional and respectful manner throughout the event.</p><p>I acknowledge that my performance, attendance, and participation at the WTSF or Organizing Committee events, including their co-organizations and partners, may be filmed, recorded, released, or broadcasted live. I hereby grant the Organizing Committee the right to use my name, voice, poses, pictures, and biographical data, in full or in part, in any form or language, with or without other materials, worldwide, without limitations, for television, radio, video, theatrical, or any other medium, using any existing or future devices. I waive any claim for compensation and release any future rights related to the aforementioned use.</p><p>I have read and fully understand the contents of this waiver of liability.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` longtext NOT NULL,
  `event_description` longtext NOT NULL,
  `name_creator` varchar(222) DEFAULT NULL,
  `presentation` int(11) DEFAULT 1,
  `health` int(11) DEFAULT 1,
  `emergency` int(11) DEFAULT 1,
  `academic` int(11) DEFAULT 1,
  `inquired` int(11) DEFAULT 1,
  `instruction` varchar(2222) DEFAULT NULL,
  `order_no` int(11) DEFAULT 999,
  `hotel` int(11) DEFAULT 1,
  `policy` longtext DEFAULT NULL,
  `event_fee` int(11) DEFAULT 1,
  `meals` int(11) DEFAULT 1,
  `image` varchar(222) DEFAULT NULL,
  `event_status` varchar(222) DEFAULT '1',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_enrolls`
--

CREATE TABLE `event_enrolls` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `profile_image` longtext DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `address2` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `health` varchar(222) DEFAULT NULL,
  `dietary` varchar(222) DEFAULT NULL,
  `emg_contact_name` varchar(222) DEFAULT NULL,
  `emg_contact_relation` varchar(222) DEFAULT NULL,
  `emg_contact` varchar(222) DEFAULT NULL,
  `emg_contact_email` varchar(222) DEFAULT NULL,
  `docs` varchar(255) DEFAULT NULL,
  `videos` varchar(255) DEFAULT NULL,
  `audio` varchar(222) DEFAULT NULL,
  `grouping` longtext DEFAULT NULL,
  `position` longtext DEFAULT NULL,
  `ptitle` longtext DEFAULT NULL,
  `major` longtext DEFAULT NULL,
  `websites` longtext DEFAULT NULL,
  `biodoc` longtext DEFAULT NULL,
  `event_enroll` varchar(222) DEFAULT NULL,
  `attend_type` varchar(222) DEFAULT NULL,
  `hotel_enroll` varchar(222) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `total_amt` varchar(222) DEFAULT NULL,
  `payerid` varchar(222) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_fees`
--

CREATE TABLE `event_fees` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `fees_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals_setup`
--

CREATE TABLE `meals_setup` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(222) DEFAULT NULL,
  `tax` varchar(222) DEFAULT NULL,
  `price` varchar(222) DEFAULT NULL,
  `totalprice` varchar(222) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `question` varchar(222) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_add_enroll`
--

CREATE TABLE `room_add_enroll` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `enroll_id` int(11) DEFAULT NULL,
  `star_select` varchar(2222) DEFAULT NULL,
  `bed_charges` varchar(222) DEFAULT NULL,
  `checkin` varchar(222) DEFAULT NULL,
  `checkout` varchar(222) DEFAULT NULL,
  `total_night` varchar(222) DEFAULT NULL,
  `total_price` varchar(222) DEFAULT NULL,
  `meal_fess` varchar(222) DEFAULT NULL,
  `bkfst_fess` varchar(222) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_person`
--

CREATE TABLE `room_person` (
  `id` int(11) NOT NULL,
  `enroll_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `person_type` varchar(222) DEFAULT NULL,
  `fname` varchar(222) DEFAULT NULL,
  `lname` varchar(222) DEFAULT NULL,
  `age` varchar(2222) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions_data`
--

CREATE TABLE `sessions_data` (
  `id` int(11) NOT NULL,
  `u_id` varchar(222) DEFAULT NULL,
  `enroll_id` varchar(222) DEFAULT NULL,
  `payerid` varchar(222) DEFAULT NULL,
  `event_id` varchar(222) DEFAULT NULL,
  `total_amt` varchar(222) DEFAULT NULL,
  `status` varchar(222) DEFAULT NULL,
  `token` varchar(222) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_event_enrolls`
--

CREATE TABLE `temp_event_enrolls` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `profile_image` longtext DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `address2` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `health` varchar(222) DEFAULT NULL,
  `dietary` varchar(222) DEFAULT NULL,
  `emg_contact_name` varchar(222) DEFAULT NULL,
  `emg_contact_relation` varchar(222) DEFAULT NULL,
  `emg_contact` varchar(222) DEFAULT NULL,
  `emg_contact_email` varchar(222) DEFAULT NULL,
  `docs` varchar(255) DEFAULT NULL,
  `videos` varchar(255) DEFAULT NULL,
  `audio` varchar(222) DEFAULT NULL,
  `grouping` longtext DEFAULT NULL,
  `position` longtext DEFAULT NULL,
  `ptitle` longtext DEFAULT NULL,
  `major` longtext DEFAULT NULL,
  `websites` longtext DEFAULT NULL,
  `biodoc` longtext DEFAULT NULL,
  `event_enroll` varchar(222) DEFAULT NULL,
  `attend_type` varchar(222) DEFAULT NULL,
  `hotel_enroll` varchar(222) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `answer` varchar(2222) DEFAULT NULL,
  `room_add_enroll` varchar(2222) DEFAULT NULL,
  `total_amt` varchar(222) DEFAULT NULL,
  `payerid` varchar(222) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `roleid` int(11) NOT NULL,
  `profile_image` varchar(222) DEFAULT NULL,
  `first_name` varchar(222) DEFAULT NULL,
  `last_name` varchar(222) DEFAULT NULL,
  `gender` varchar(222) DEFAULT NULL,
  `dob` varchar(222) DEFAULT NULL,
  `country` varchar(222) DEFAULT NULL,
  `address` varchar(222) DEFAULT NULL,
  `address2` varchar(222) DEFAULT NULL,
  `city` varchar(222) DEFAULT NULL,
  `state` varchar(222) DEFAULT NULL,
  `zip` varchar(222) DEFAULT NULL,
  `phone` varchar(222) DEFAULT NULL,
  `wiever_accpt` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `token` varchar(222) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `roleid`, `profile_image`, `first_name`, `last_name`, `gender`, `dob`, `country`, `address`, `address2`, `city`, `state`, `zip`, `phone`, `wiever_accpt`, `status`, `token`, `created_at`) VALUES
(7, 'admin', '123', 'courierin1@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-11-27 17:27:50'),
(8, 'user', '123', 'dynojuqug@mailinator.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-11-28 14:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `waiverform`
--

CREATE TABLE `waiverform` (
  `id` int(11) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waiverform`
--

INSERT INTO `waiverform` (`id`, `text`) VALUES
(1, '<p><strong>Waiver of Liability:</strong></p><p>I, the undersigned, knowingly and willingly submit my entry to the World Taiji Science Federation (WTSF), hereafter collectively referred to as the \"Organizing Committee\". By participating in all activities organized by the Organizing Committee, I acknowledge and assume all risks associated with physical and mental injuries, disabilities, and losses that may occur during or as a result of my participation in the events.</p><p>I hereby release the Organizing Committee, including their co-organizations, partners, officers, agents, representatives, volunteers, referees, and other related members, from any and all claims, actions, suits, and controversies, whether in law or equity, arising from or in connection with my participation in their activities. This release applies to any injury, harm, or loss sustained by me or caused by any matter, cause, or thing whatsoever.</p><p>I understand and acknowledge that any medical attention or treatment provided to me by the Organizing Committee, including their officers, medical personnel, representatives, volunteers, and other related members, will be limited to first aid only. I hereby release them from any liability associated with such medical assistance. I am fully responsible for obtaining my own medical coverage.</p><p>I agree to abide by and comply with the rules and regulations established by the Organizing Committee. I will conduct myself in a professional and respectful manner throughout the event.</p><p>I acknowledge that my performance, attendance, and participation at the WTSF or Organizing Committee events, including their co-organizations and partners, may be filmed, recorded, released, or broadcasted live. I hereby grant the Organizing Committee the right to use my name, voice, poses, pictures, and biographical data, in full or in part, in any form or language, with or without other materials, worldwide, without limitations, for television, radio, video, theatrical, or any other medium, using any existing or future devices. I waive any claim for compensation and release any future rights related to the aforementioned use.</p><p>I have read and fully understand the contents of this waiver of liability.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutform`
--
ALTER TABLE `aboutform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_setup`
--
ALTER TABLE `bed_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_enrolls`
--
ALTER TABLE `event_enrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_fees`
--
ALTER TABLE `event_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals_setup`
--
ALTER TABLE `meals_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_add_enroll`
--
ALTER TABLE `room_add_enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_person`
--
ALTER TABLE `room_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions_data`
--
ALTER TABLE `sessions_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_event_enrolls`
--
ALTER TABLE `temp_event_enrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiverform`
--
ALTER TABLE `waiverform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutform`
--
ALTER TABLE `aboutform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bed_setup`
--
ALTER TABLE `bed_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_enrolls`
--
ALTER TABLE `event_enrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_fees`
--
ALTER TABLE `event_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals_setup`
--
ALTER TABLE `meals_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_add_enroll`
--
ALTER TABLE `room_add_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_person`
--
ALTER TABLE `room_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions_data`
--
ALTER TABLE `sessions_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_event_enrolls`
--
ALTER TABLE `temp_event_enrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `waiverform`
--
ALTER TABLE `waiverform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
