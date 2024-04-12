CREATE DATABASE blog;
USE blog;
CREATE TABLE post (
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	subtitle VARCHAR(255) NOT NULL,
	author_name VARCHAR(255) NOT NULL,
	author_avatar VARCHAR(255) NOT NULL,
	publish_date VARCHAR(10) NOT NULL,
	image_src VARCHAR(255) NOT NULL,
	image_alt VARCHAR(255) NOT NULL,
	content TEXT NOT NULL,
	featured BIT NOT NULL,
	most_recent BIT NOT NULL,
	label BIT NOT NULL
) 
ENGINE = InnoDB
CHARACTER SET = utf8mb4
COLLATE utf8mb4_unicode_ci
;
