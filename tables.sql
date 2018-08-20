CREATE TABLE `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry` varchar(120) COLLATE utf8_czech_ci NOT NULL,
  `leave` varchar(120) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entry_entry_uindex` (`entry`),
  UNIQUE KEY `entry_leave_uindex` (`leave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci