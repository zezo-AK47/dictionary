CREATE TABLE IF NOT EXISTS `dictionary_terms` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
    `term` VARCHAR(255) NOT NULL,
    `translation` VARCHAR(255) NOT NULL,
    `definition` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
);