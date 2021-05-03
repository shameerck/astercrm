 CREATE TABLE `orders` (   
`id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,   
`order_id` VARCHAR(200) NOT NULL,   
`order` JSON DEFAULT NULL,   
PRIMARY KEY (`id`) ) ENGINE=INNODB;

CREATE TABLE `customers` (   
`id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,   
`customer_id` VARCHAR(200) NOT NULL,   
`customer` JSON DEFAULT NULL,  
 PRIMARY KEY (`id`) ) ENGINE=INNODB


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location_id` int(11) NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;