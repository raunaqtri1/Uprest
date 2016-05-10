<!DOCTYPE html>
<html>
<head>
	<title>News</title>
</head>
<body>
@if(Auth::check())
Current user:{{Auth::user()->name}}. ({!!HTML::link('logout','logout')!!})
@endif
<?php $news=json_decode(file_get_contents('http://localhost:8983/solr/collection1/select?q=*%3A*&wt=json'),true);
	//dd($news);
	//return $news['response']['docs'][0]['category'];
	
	foreach($news['response']['docs'] as $new){

    echo $new['category'];
    echo "<br>";
}

?>
</body>
</html>
