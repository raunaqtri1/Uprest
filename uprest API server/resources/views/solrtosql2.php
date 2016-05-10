<?php
 $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lrv";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
for ($i=1; $i < 213 ; $i++) { 
$client = new SolrClient($options);
$query = new SolrQuery();
$query->setQuery('*:*');
$query->setStart($i*10);
$query->setRows(10);
$query->addField('id');
$query->addField('category');
$query->addField('source');
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$result=json_decode($response,true);
  foreach ($result['response']['docs'] as $y) {
	$sql = "SELECT id FROM categories WHERE category='".strtolower($y['category'][0])."'";
//	echo $sql."<br>";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$id1=$row['id'];
//echo $id1."\n";
$sql = "SELECT id FROM sources WHERE sources='".strtolower($y['source'][0])."'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$id2=$row['id'];
//echo $id2."\n";
$sql = "SELECT id FROM articles WHERE url='".$y['id']."'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$id3=$row['id'];
//echo $id3."\n";
$sql = "INSERT INTO article_category (article_id,category_id)
VALUES (".$id3.",".$id1.")";	
mysqli_query($conn, $sql);
$sql = "INSERT INTO article_source (article_id,source_id)
VALUES (".$id3.",".$id2.")";	
mysqli_query($conn, $sql);	
 }
}
mysqli_close($conn);
echo "Completed";
//dd(json_decode($response,true));
?>