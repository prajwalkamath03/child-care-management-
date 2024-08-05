-- Create babysitter_details table
CREATE TABLE `babysitter_details` (
  `babysitter_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create babysitter_list table
CREATE TABLE `babysitter_list` (
  `id` int(30) NOT NULL,
  `code` varchar(50) NOT NULL DEFAULT '50',
  `fullname` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create enrollment_details table
CREATE TABLE `enrollment_details` (
  `enrollment_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create enrollment_list table
CREATE TABLE `enrollment_list` (
  `id` int(30) NOT NULL,
  `code` varchar(50) NOT NULL,
  `child_fullname` text NOT NULL,
  `parent_fullname` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create service_list table
CREATE TABLE `service_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create system_info table
CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create users table
CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create before_insert_babysitter_details_trigger
DELIMITER //

CREATE TRIGGER before_insert_babysitter_details_trigger
BEFORE INSERT ON babysitter_details
FOR EACH ROW
BEGIN
    IF EXISTS (
        SELECT 1
        FROM babysitter_details
        WHERE babysitter_id = NEW.babysitter_id AND meta_field = NEW.meta_field
    ) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Duplicate entry for meta_field for this babysitter.';
    END IF;
END;
//

DELIMITER ;

-- Create before_update_babysitter_details_trigger
DELIMITER //

CREATE TRIGGER before_update_babysitter_details_trigger
BEFORE UPDATE ON babysitter_details
FOR EACH ROW
BEGIN
    IF OLD.babysitter_id != NEW.babysitter_id THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Updating babysitter_id is not allowed.';
    END IF;
END;
//

DELIMITER ;
