CREATE TABLE `districts` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM; 

CREATE TABLE `cities` ( `id` INT NOT NULL AUTO_INCREMENT , `district_id` INT NOT NULL , `name` VARCHAR(100) NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM; 

CREATE TABLE `ad_posts` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TINYTEXT NOT NULL , `sub_cat_id` INT NOT NULL , `description` TEXT NULL , `thumb` VARCHAR(100) NULL , `approve` INT(10) NOT NULL DEFAULT '1' , `status` INT(10) NOT NULL DEFAULT '1' , `verify` INT(10) NOT NULL DEFAULT '0' , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM; 

CREATE TABLE `ad_post_images` ( `id` INT NOT NULL AUTO_INCREMENT , `ad_post_id` INT NOT NULL , `name` VARCHAR(100) NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM; 

<!-- category -->
CREATE TABLE `ref_categories` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `code` VARCHAR(45) NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM; 

CREATE TABLE `ref_sub_categories` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `parent` INT NOT NULL , `cover_image` VARCHAR(100) NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM; 