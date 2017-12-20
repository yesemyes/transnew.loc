<?php
require_once  dirname(__FILE__).'/../inc/initf.php';
$db = db::getInstance();

$res=$db->getArray('view_count','*');

foreach($res as $key)
{
    if($key['type'] == 'offer')
    {
        $countOffer = $db->query("UPDATE `offers` SET `view_count` = '{$key['view_count']}' WHERE `id` = '{$key['id']}'");
    }
    elseif($key['type'] == 'news')
    {
        $countNews = $db->query("UPDATE `news` SET `view_count` = '{$key['view_count']}' WHERE `id` = '{$key['id']}'");
    }
    else
    {
        $countAds = $db->query("UPDATE `ads` SET `views_qty` = '{$key['view_count']}' WHERE `id` = '{$key['id']}'");
    }
    
    
}
?>