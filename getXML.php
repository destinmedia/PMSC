<?php
/**
 * @filename getXML.php
 * @params   $xml
 * @author   Jack Wright
 * @date     29/13/2021
**/

$url = $_GET['URL'];
$xml = simplexml_load_file($url, "SimpleXMLElement", LIBXML_NOCDATA);
$json = json_encode($xml);
$products = json_decode($json,TRUE);

?>
