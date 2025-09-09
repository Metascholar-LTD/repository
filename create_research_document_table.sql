-- Create the research_document table
-- Based on fields from Research_documentController.php

CREATE TABLE IF NOT EXISTS `research_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `authors` varchar(500) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `subjects` text NOT NULL,
  `issues_date` date NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `abstract` text NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `thumbs` varchar(500) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `citations` int(11) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1','0.0') DEFAULT '0',
  `ctrl` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_faculty` (`faculty`),
  KEY `idx_program` (`program`),
  KEY `idx_authors` (`authors`),
  KEY `idx_uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;