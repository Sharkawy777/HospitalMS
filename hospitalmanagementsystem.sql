-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 12:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
AUTOCOMMIT = 0;
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments_doctor`
--

CREATE TABLE `appointments_doctor`
(
    `id`        tinyint(4) NOT NULL,
    `day`       char(50) NOT NULL,
    `from_time` time     NOT NULL,
    `to_time`   time     NOT NULL,
    `doctor_id` tinyint(4) NOT NULL,
    `status`    tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments_doctor`
--

INSERT INTO `appointments_doctor` (`id`, `day`, `from_time`, `to_time`, `doctor_id`, `status`)
VALUES (33, '1642719600', '16:09:00', '05:55:00', 27, 0),
       (34, '1642633200', '12:40:00', '10:47:00', 22, 1),
       (35, '1643151600', '07:26:00', '04:36:00', 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor-more-info`
--

CREATE TABLE `doctor-more-info`
(
    `id`            tinyint(4) NOT NULL,
    `title`         char(100) NOT NULL,
    `specialize_id` tinyint(4) NOT NULL,
    `doctor_id`     tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor-more-info`
--

INSERT INTO `doctor-more-info` (`id`, `title`, `specialize_id`, `doctor_id`)
VALUES (6, 'Commodi id qui qui i', 1, 27),
       (7, 'Autem animi quisqua', 1, 28),
       (8, 'PHD', 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations`
(
    `id`                tinyint(4) NOT NULL,
    `patient_id`        tinyint(4) NOT NULL,
    `appoint_doctor_id` tinyint(4) NOT NULL,
    `created_at`        datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `patient_id`, `appoint_doctor_id`, `created_at`)
VALUES (21, 29, 34, '2022-01-20 12:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles`
(
    `id`    tinyint(4) NOT NULL,
    `title` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`)
VALUES (1, 'admin'),
       (2, 'doctor'),
       (3, 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations`
(
    `id`         tinyint(4) NOT NULL,
    `specialize` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `specialize`)
VALUES (1, 'Medical genetics'),
       (2, 'Family medicine');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `id`             tinyint(4) NOT NULL,
    `name`           char(150) NOT NULL,
    `gender`         tinyint(1) NOT NULL COMMENT '"1 for male, 2 for female" ',
    `email`          char(100) NOT NULL,
    `password`       char(100) NOT NULL,
    `address`        char(150) NOT NULL,
    `phone`          char(11)  NOT NULL,
    `emergencyPhone` char(11)  NOT NULL,
    `image`          char(150) DEFAULT NULL,
    `role_id`        tinyint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `password`, `address`, `phone`, `emergencyPhone`, `image`,
                     `role_id`)
VALUES (19, 'aa', 1, 'a@a.a', 'd41d8cd98f00b204e9800998ecf8427e', 'auuassssssssssssssssssssssssssssdasds',
        '01512345678', '01512345678', '1642671374577336063.jpg', 1),
       (20, 'Beverly Key', 1, 'gaqixulyv@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Modi sunt minim ani',
        '01012345678', '01012345678', '1642672099820534590.png', 3),
       (21, 's', 1, 'nasr@gmail.com', '96e79218965eb72c92a549dd5a330112', 'assssssssssssssssssssssssssad',
        '01012345678', '01012345678', '16426721201836665136.jpg', 3),
       (22, 'Germaine Russo', 1, 'ryfon@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Voluptas in dolore v',
        '01012345678', '01012345678', '16426710861614636679.jpg', 2),
       (26, 'Maya Morrow', 1, 'admin@admin.com', '64e1b8d34f425d19e1ee2ea7236d3028', 'Provident placeat', '01012345678',
        '01012345678', '16426701761610823343.jpg', 1),
       (27, 'Indira Jarvis', 1, 'doctor@doctor.com', '1e34e7aed11d7f7c35957a46d005deee', 'Et deleniti molestia',
        '01027314115', '01027314115', '16426711211795404137.png', 2),
       (28, 'Alexis Cole', 2, 'ciqisoqyp@mailinator.com', '8283b5fd9bbc7668579da41f2fb22a05', 'Culpa illo dolores p',
        '01012345678', '01012345678', '1642671608781327662.png', 2),
       (29, 'Upton Ratliff', 2, 'patient@patient.com', 'aadacec5a1966989ef7f866b22e74b0b', 'Delectus aspernatur',
        '01012345678', '01012345678', '16426719061632568337.png', 3),
       (30, 'Kalia Vaughn', 2, 'nulelamav@mailinator.com', '8c3f53010da306e244e0b15e0ef4da78', 'Voluptas ut corrupti',
        '01012345678', '01012345678', '16426720031342689207.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments_doctor`
--
ALTER TABLE `appointments_doctor`
    ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctor-more-info`
--
ALTER TABLE `doctor-more-info`
    ADD PRIMARY KEY (`id`),
  ADD KEY `doctorUserRelation` (`doctor_id`),
  ADD KEY `specialize` (`specialize_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
    ADD PRIMARY KEY (`id`),
  ADD KEY `appoint_patient_id` (`patient_id`),
  ADD KEY `appoint_doctor_id` (`appoint_doctor_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments_doctor`
--
ALTER TABLE `appointments_doctor`
    MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `doctor-more-info`
--
ALTER TABLE `doctor-more-info`
    MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
    MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
    MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
    MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments_doctor`
--
ALTER TABLE `appointments_doctor`
    ADD CONSTRAINT `appoint_doctor_relation` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor-more-info`
--
ALTER TABLE `doctor-more-info`
    ADD CONSTRAINT `doctorSpecializeRelation` FOREIGN KEY (`specialize_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctorUserRelation` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON
DELETE
CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
    ADD CONSTRAINT `appointDoctorRelation` FOREIGN KEY (`appoint_doctor_id`) REFERENCES `appointments_doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointpatientRelation` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON
DELETE
CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
    ADD CONSTRAINT `role_relation` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
