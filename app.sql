-- Creation de la base de donnée  uor_archive

CREATE DATABASE IF NOT EXISTS `uor_archive`;

USE `uor_archive`;

CREATE TABLE `establishment_config`(
    `name` VARCHAR(200) NOT NULL,
    `acronym` VARCHAR(20),
    `name_aliases` VARCHAR(200),
    `logo` VARCHAR(100),
    `last_update` DATE
);

CREATE TABLE `faculties`(
    `id` SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `acronym` VARCHAR(20),
    `created_at` DATE,
    `last_update` DATE
);

CREATE TABLE `departments`(
    `id` SMALLINT NOT NUll PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `acronym` VARCHAR(20),
    `created_at` DATE,
    `last_update` DATE,
    `faculty_id` SMALLINT NOT NUll,
    FOREIGN KEY(`faculty_id`) REFERENCES `faculties`(`id`)
);

CREATE TABLE `promotions`(
    `id` SMALLINT NOT NUll PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `acronym` VARCHAR(20),
    `created_at` DATE,
    `last_update` DATE,
    `department_id` SMALLINT NOT NUll,
    FOREIGN KEY(`department_id`) REFERENCES `departments`(`id`)
);

CREATE TABLE `students`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `first_name` VARCHAR(40) NOT NULL,
    `second_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `phone_number` VARCHAR(20),
    `mail_address` VARCHAR(255)
    `picture` VARCHAR(255),
    `place_of_birth` VARCHAR(40),
    `date_of_birth` DATE NOT NULL,
    `sex` VARCHAR(10) NOT NULL,
    `civilian_status` VARCHAR(20) NOT NULL,
    `id_type` VARCHAR(30),
    `id_number` VARCHAR(30),
    `nationality` VARCHAR(150),
    `state` VARCHAR(60),
    `town` VARCHAR(60),
    `municipality` VARCHAR(60),
    `neighborhood` VARCHAR(60),
    `physical_address` VARCHAR(60),
    `student_status` VARCHAR(60),
    `faculty_id` SMALLINT NOT NULL,
    `department_id` SMALLINT NOT NULL,
    `orientation` VARCHAR(40),
    `promotion_id` SMALLINT NOT NULL,
    `state_origin` VARCHAR(60),
    `town_origin` VARCHAR(60),
    `municipality_origin` VARCHAR(60),
    `neighborhood_origin` VARCHAR(60),
    `clg_name` VARCHAR(140),
    `clg_state` VARCHAR(40),
    `clg_town` VARCHAR(40),
    `clg_section_studied` VARCHAR(40),
    `clg_l_e_center` VARCHAR(40),
    `clg_l_e_year` VARCHAR(4),
    `clg_l_e_percentage` VARCHAR(5),
    `clg_diploma_number` VARCHAR(10),
    `ps_father` VARCHAR(100),
    `ps_mother` VARCHAR(100),
    `ps_sponsor` VARCHAR(100),
    `ps_phone_number` VARCHAR(20),
    `ps_type_sponsor` VARCHAR(20),
    `blood_type` VARCHAR(20),
    `height` VARCHAR(20),
    `allergies` VARCHAR(90),
    `handicaps` VARCHAR(90),
    `document` VARCHAR(90),
    `registration_number` VARCHAR(20),
    `is_registered`  SMALLINT(1),
    `is_verified`  SMALLINT(1),
    `is_active`  SMALLINT(1),
    `student_since`  DATE,
    `created_at`  DATE,
    `last_update`  DATETIME
);

CREATE TABLE `personals` (
  `id` int(11) NOT NULL, #
  `first_name` varchar(40) NOT NULL,#
  `second_name` varchar(50) NOT NULL,#
  `last_name` varchar(50) NOT NULL,#
  `phone_number` varchar(20) DEFAULT NULL,#
  `mail_address` varchar(255) DEFAULT NULL,#
  `picture` varchar(255) DEFAULT NULL, #
  `place_of_birth` varchar(40) DEFAULT NULL,#
  `date_of_birth` date NOT NULL,#
  `civilian_status` varchar(30) NOT NULL,#
  `sex` varchar(10) NOT NULL,#
  `id_type` varchar(30) DEFAULT NULL,#
  `id_number` varchar(30) DEFAULT NULL,#
  `nationality` varchar(150) DEFAULT NULL,#
  `state` varchar(60) DEFAULT NULL,#
  `town` varchar(60) DEFAULT NULL,#
  `municipality` varchar(60) DEFAULT NULL,#
  `neighborhood` varchar(60) DEFAULT NULL,#
  `physical_address` varchar(60) DEFAULT NULL,#
  `function` varchar(60) NOT NULL, #
  `functional_type_id` SMALLINT(1) NOT NULL,
  `academical_level `SMALLINT(1) NOT NULL,
  `academical_status `VARCHAR(50) NOT NULL,
  `faculty_id` smallint(6) NOT NULL,
  `faculty_search_domain` smallint(6) NOT NULL,
  `search_domain` VARCHAR(100) NOT NULL,
  `engagement_date` DATE NOT NULL,
  `base_salary` VARCHAR(10),
  `prime` VARCHAR(100),
  `state_origin` varchar(60) DEFAULT NULL,
  `town_origin` varchar(60) DEFAULT NULL,
  `municipality_origin` varchar(60) DEFAULT NULL,
  `neighborhood_origin` varchar(60) DEFAULT NULL,
  `blood_type` varchar(20) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `allergies` varchar(90) DEFAULT NULL,
  `handicaps` varchar(90) DEFAULT NULL,
  `document` varchar(90) DEFAULT NULL,
  `registration_number` varchar(20) DEFAULT NULL, #
  `is_verified` smallint(1) DEFAULT NULL,
  `is_active` smallint(1) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
