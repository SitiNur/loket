-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_event`;
CREATE TABLE `tb_event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL,
  `id_location` int(11) NOT NULL,
  `event_file` varchar(255) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_user` (`id_user`),
  KEY `id_location` (`id_location`),
  CONSTRAINT `tb_event_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  CONSTRAINT `tb_event_ibfk_2` FOREIGN KEY (`id_location`) REFERENCES `tb_location` (`id_location`),
  CONSTRAINT `tb_event_ibfk_3` FOREIGN KEY (`id_location`) REFERENCES `tb_location` (`id_location`),
  CONSTRAINT `tb_event_ibfk_4` FOREIGN KEY (`id_location`) REFERENCES `tb_location` (`id_location`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_event` (`id_event`, `id_user`, `title`, `description`, `datetime`, `id_location`, `event_file`) VALUES
(1,	2,	'Special Concert Sheila On 7',	'Special Concert Sheila On 7. Opening ACT The Goodfellas Ft Jessica Renita, Nyioer Melambuai, Govinda\'s',	'2018-06-01 20:00:00',	1,	'assets/eventimage/26670210496c743dfa3305ed64ffe4b6.jpg'),
(2,	2,	'PASSION',	'Pakci Music In Celebration. Sheila On7, Payung Teduh, FSTVLS, and many more.',	'2018-06-08 20:00:00',	1,	'assets/eventimage/71695dfa1a98a3396d01eb47c86183ca.jpg'),
(3,	5,	'PRESENT BREAK 2015',	'Geological Enginering UPN Proudly Present : Sheila On7, Endah N Resha, Sri Plecit, Asteria, Murrisch, Midsummer Manggo',	'2018-06-15 20:00:00',	3,	'assets/eventimage/ca48e9361ffce961b4927e2479f7eaf7.jpg'),
(4,	5,	'Music Versary',	'Jawa Pos Radar Malang Present Music Versary With Sheila On 7',	'2018-06-29 20:00:00',	4,	'assets/eventimage/dc498c6e4324965d448d8e92d56101b7.jpg');

DROP TABLE IF EXISTS `tb_location`;
CREATE TABLE `tb_location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id_location`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_location` (`id_location`, `location`) VALUES
(1,	'Jakarta'),
(2,	'Bandung'),
(3,	'Bogor'),
(4,	'Tangerang');

DROP TABLE IF EXISTS `tb_ticket`;
CREATE TABLE `tb_ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `idEvent` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_ticket` (`id_ticket`, `id_event`, `name`, `price`) VALUES
(5,	2,	'Fest',	35),
(6,	2,	'Tribun',	50),
(7,	2,	'VIP',	65),
(8,	2,	'VVIP',	80),
(9,	3,	'Tribun',	50),
(10,	3,	'Festival',	65),
(11,	3,	'VIP',	90),
(12,	4,	'Festival',	75),
(13,	4,	'VIP',	180),
(14,	4,	'VVIP',	350),
(15,	1,	'Festival',	50),
(16,	1,	'Tribun',	75),
(17,	1,	'VIP Silver',	100),
(18,	1,	'VIP Gold',	150);

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tb_user` (`id_user`, `oauth_provider`, `oauth_uid`, `user_name`, `password`, `first_name`, `last_name`, `locale`, `picture_url`, `profile_url`, `created`, `modified`) VALUES
(2,	'',	'',	'siti@gmail.com',	'617c6b68ba97af552454cd85f67873357c12d964b72f81a6138494872364eb7a',	'Siti',	'Nurhasanah',	'',	'',	'',	'2018-05-02 11:56:57',	'2018-05-02 11:56:57'),
(3,	'twitter',	'156663227',	'yana2908',	'',	'yana',	'',	'en',	'http://pbs.twimg.com/profile_images/665609903856181248/OWVaUv2A_normal.jpg',	'https://twitter.com/yana2908',	'2018-05-04 12:31:15',	'2018-05-04 07:31:15'),
(4,	'twitter',	'152449853',	'sunnirito',	'',	'sani',	'fathuddin',	'en',	'http://pbs.twimg.com/profile_images/549756432547995648/Z_Fwdksy_normal.jpeg',	'https://twitter.com/sunnirito',	'2018-05-04 13:04:25',	'2018-05-04 08:04:25'),
(5,	'twitter',	'9.9229043107226e17',	'shadj92',	'',	'Khadijah',	'',	'en',	'http://abs.twimg.com/sticky/default_profile_images/default_profile_normal.png',	'https://twitter.com/shadj92',	'2018-05-04 14:42:53',	'2018-05-04 09:42:53');

-- 2018-05-04 07:54:55
