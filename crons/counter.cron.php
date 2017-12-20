<?php
require_once  dirname(__FILE__).'/../inc/initf.php';
$db = db::getInstance();
$q1 = "SELECT `filed_car_brand` as `id`,COUNT(*) as `qty` FROM `offers` WHERE `offers`.`active` GROUP BY `filed_car_brand`";
$q2 = "SELECT `filed_car_brand_model` as `id`,COUNT(*) as `qty` FROM `offers` WHERE `offers`.`active` GROUP BY `filed_car_brand_model`";
$q3 = "SELECT `filed_car_brand_model` as `id` ,COUNT(*) as `qty` FROM `offers` WHERE `offers`.`active` GROUP BY `filed_car_brand_model`";


$qu0 = "UPDATE brandmodel   SET `brandmodel`.`offers_count` = 0";
$qu1 = "UPDATE brandmodel , ($q1) as `counter` SET `brandmodel`.`offers_count` = `counter` .`qty` WHERE `brandmodel`.`id` = `counter` .`id`;\n";
$qu2 = "UPDATE brandmodel , ($q2) as `counter` SET `brandmodel`.`offers_count` = `counter` .`qty` WHERE `brandmodel`.`id` = `counter` .`id`;\n";
$qu3 = "UPDATE brandmodel , ($q2) as `counter` SET `brandmodel`.`offers_count` = `counter` .`qty` WHERE `brandmodel`.`id` = `counter` .`id`;\n";



$db->query($qu0);

$db->query($qu1);

$db->query($qu2);

//$db->query($qu3);
?>