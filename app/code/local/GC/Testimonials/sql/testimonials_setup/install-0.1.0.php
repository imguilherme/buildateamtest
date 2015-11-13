<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 12/11/15
 * Time: 23:57
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->run("DROP TABLE IF EXISTS testimonials;
CREATE TABLE `testimonials` (
  `entity_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `description` longtext,
  `enabled` int(1) DEFAULT '0',
  PRIMARY KEY (`entity_id`),
  KEY `testimonials_customer` (`customer_id`),
  CONSTRAINT `testimonials_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer_entity` (`entity_id`)
);
	");
$installer->endSetup();