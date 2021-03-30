<?php
/**
 * @filename getXML.php
 * @params   $xml
 * @author   Jack Wright
 * @date     29/13/2021
**/

$url = "https://alterego-lingerie.com/wp-load.php?security_token=d61a45e35f7c71e3&export_id=235&action=get_data";
echo $url;
$xml = simplexml_load_file($url, "SimpleXMLElement", LIBXML_NOCDATA);
$json = json_encode($xml);
$products = json_decode($json,TRUE);
echo "<pre>";
print_r(array_keys($products['post'][0]));
echo "</pre>";
?>
