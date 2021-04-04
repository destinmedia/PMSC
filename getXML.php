<?php
/**
 * @filename getXML.php
 * @params   $xml
 * @author   Jack Wright
 * @date     29/13/2021
**/

$url = "https://alterego-lingerie.com/wp-load.php?security_token=0f15c97507f1fc3c&export_id=113&action=get_data";
echo $url;


fclose($file);

$tbl = 'xml_alterego';
$conn = mysqli_connect("localhost", 'root', 'Ascarisafari98', 'bot_pmsc');

$sql = "TRUNCATE TABLE $tbl";

$sql = "
LOAD DATA LOCAL INFILE '$url'
INTO TABLE $tbl
FIELDS TERMINATED BY ','
ENCLOSED BY '\"'
LINES TERMINATED BY '\\n'
IGNORE 1 ROWS;
";

$result = mysqli_query($conn, $sql);

if(!$result){
  die("Couldnt perform: " . mysqli_error($conn));
}

?>
