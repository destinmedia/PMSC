<?php
/**
 * @filename getXML.php
 * @params   $xml
 * @author   Jack Wright
 * @date     29/13/2021
**/

// $url = "https://alterego-lingerie.com/wp-load.php?security_token=0f15c97507f1fc3c&export_id=113&action=get_data";



fclose($file);

//$tbl = 'xml_alterego';
$urls = [];
$conn = mysqli_connect("localhost", 'root', 'Ascarisafari98', 'bot_pmsc');
$sql = "SELECT * FROM Wholesale_urls";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  $urls[] = $row;
}
foreach($urls as $x){
  $tbl = $x['tbl'];
  $url = $x['url'];
  $sql = "TRUNCATE TABLE $tbl";
  echo $url;

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
}


?>
