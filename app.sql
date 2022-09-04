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