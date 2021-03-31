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

$columns = implode(", ",array_keys($products['post'][0]));
$escaped_values = array_map('mysql_real_escape_string', array_values($products['post'][0]));
echo "<br> $values";
$values  = implode(", ", $escaped_values);
$sql = "INSERT INTO `xml_alterego`($columns) VALUES ($values)";

echo "<br>" . $sql;
?>
