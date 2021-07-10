CREATE TABLE `hospital`.`tbl_contact_us` ( `contact_us_id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NULL , `phone` VARCHAR(255) NOT NULL , `visited_before` VARCHAR(100) NOT NULL , `subject` VARCHAR(255) NOT NULL , `message` TEXT NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`contact_us_id`)) ENGINE = InnoDB;

CREATE TABLE `hospital`.`tbl_pages` ( `page_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `content` TEXT NOT NULL , `show_in_menu` TINYINT(1) NOT NULL DEFAULT '0' , PRIMARY KEY (`page_id`)) ENGINE = InnoDB;

ALTER TABLE `tbl_pages` ADD `sort_order` INT NULL AFTER `show_in_menu`;

/* NEW ADDED : 27 Sep, 2020 */

CREATE TABLE `tbl_admin` (
 `admin_id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(200) NOT NULL,
 `email` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 `phone` varchar(15) DEFAULT NULL,
 `is_active` tinyint(1) NOT NULL DEFAULT '0',
 `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/* AUTH MODULES */

CREATE TABLE `tbl_auth_module` (
 `auth_module_id` int(11) NOT NULL AUTO_INCREMENT,
 `module_name` varchar(100) NOT NULL,
 `module_url` varchar(200) NOT NULL,
 `is_active` tinyint(1) NOT NULL DEFAULT '1',
 PRIMARY KEY (`auth_module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tbl_auth_item` (
 `auth_item_id` int(11) NOT NULL AUTO_INCREMENT,
 `item_name` varchar(100) NOT NULL,
 `item_url` varchar(45) NOT NULL,
 `item_description` tinytext,
 `auth_module_id` int(11) NOT NULL,
 `rule_type` enum('A') NOT NULL,
 `is_active` tinyint(1) NOT NULL DEFAULT '1',
 PRIMARY KEY (`auth_item_id`),
 KEY `fk_tbl_auth_item_tbl_auth_module1_idx` (`auth_module_id`),
 CONSTRAINT `fk_tbl_auth_item_tbl_auth_module1` FOREIGN KEY (`auth_module_id`) REFERENCES `tbl_auth_module` (`auth_module_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tbl_auth_assignment` (
 `auth_assignment_id` int(11) NOT NULL AUTO_INCREMENT,
 `auth_item_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `user_type` enum('A') NOT NULL,
 PRIMARY KEY (`auth_assignment_id`),
 KEY `fk_tbl_auth_assignment_tbl_auth_item1_idx` (`auth_item_id`),
 CONSTRAINT `fk_tbl_auth_assignment_tbl_auth_item1` FOREIGN KEY (`auth_item_id`) REFERENCES `tbl_auth_item` (`auth_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1326 DEFAULT CHARSET=utf8mb4;

/* Doctor Timing Module */

CREATE TABLE `tbl_doctor_timing` (
 `doctor_timing_id` int(11) NOT NULL AUTO_INCREMENT,
 `doctor_id` int(11) NOT NULL,
 `date` date NOT NULL,
 `start_time` datetime NOT NULL,
 `end_time` datetime NOT NULL,
 `is_booked` tinyint(4) NOT NULL DEFAULT '0',
 `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
 PRIMARY KEY (`doctor_timing_id`),
 KEY `doctor_id` (`doctor_id`),
 CONSTRAINT `tbl_doctor_timing_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `tbl_doctors` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8


ALTER TABLE `tbl_appointments` ADD `doctor_timing_id` INT NULL AFTER `doctor_id`;

ALTER TABLE `tbl_appointments` ADD FOREIGN KEY (`doctor_timing_id`) REFERENCES `tbl_doctor_timing`(`doctor_timing_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_admin` ADD `is_hidden` TINYINT(1) NOT NULL DEFAULT '0' AFTER `is_deleted`;
