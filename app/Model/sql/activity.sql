CREATE TABLE IF NOT EXISTS `activity` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `content` TEXT NOT NULL,
    `type` ENUM('text', 'photo', 'video') NOT NULL,
    `created_at` DATETIME NOT NULL,
    `user_id` INT(11),
    PRIMARY KEY (`id`)
);
