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
for ($i=0; $i < 213 ; $i++) { 
$client = new SolrClient($options);
$query = new SolrQuery();
$query->setQuery('*:*');
$query->setStart($i*10);
$query->setRows(10);
$query->addField('id');
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$result=json_decode($response,true);
foreach ($result['response']['docs'] as $y) {
$sql = "INSERT INTO articles (url)
VALUES ('".$y['id']."')";	
mysqli_query($conn, $sql);
	
}
}
mysqli_close($conn);
echo "Completed";
//dd(json_decode($response,true));
?>