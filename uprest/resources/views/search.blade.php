<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../css/style-search.css"> <!-- Resource style -->
    
    
    
 <!-- js -->   
   
    
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
    <script type="text/javascript" src="../js/modernizer.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    
   
	
  	
	<title>uprest.</title>
</head>
<body oncontextmenu="return false" class="noselect">
    
    <?php $ull=action('homecontroller@getIndex');?>
    <div class="header"><div class="searchbox">{!!Form::open(['url' => 'search','method' => 'get'])!!}<input name="q" type="image" src="../img/search.png" alt="Submit" height="30px" width="30px" style="float:left;margin-left:25px;margin-top:11px;"/><input type="text" placeholder="Search for what you like" class="search" id="autosearch" name="q" value=<?php echo "\"".$data["q"]."\"" ; ?> />{!! Form::close() !!}</div><br/><br/><font size="5px">Search Your Interest</font></div>
		<div class="interests">
        @if(!empty($data['categories']))
                 @foreach($data['categories'] as $d)
                <a href=<?php echo "'".$ull."/display?category=".$d."'" ;?> ><div class="containerbox">
                    <div class="videoframe not-selected" id=<?php echo '"div'.$d.'"' ;?>> 
                    <img src=<?php echo "\"../img/interests/".$d.".jpg\"" ;?> /> 
                       <div class="abcd">{{strtoupper($d)}}</div>
                    </div></div></a>
            
        @endforeach
      @endif
    
    </div>
    
    
    <div class="articles">
        <center><font size="5px" >Search Your Article</font></br></br></center>
               @for($i=0;$i<9;$i=$i+3) 
                @if(!empty($data['articles']['response']['docs'][$i]))
             <div class="news1">
                <b><span class="headin">{{$data['articles']['response']['docs'][$i]['title'][0]}}</span></b>
                <p>Source:{{$data['articles']['response']['docs'][$i]['source'][0]}}</p>
                <p class="news">{{$data['articles']['response']['docs'][$i]['description']}}</p>
                <div class="readmore1">{!!HTML::link('page?url='.rawurlencode($data['articles']['response']['docs'][$i]['url']),'...')!!}</div>
            </div>
            @endif
            @if(!empty($data['articles']['response']['docs'][$i+1]))
             <div class="news2">
                            
                  <b><span class="headin">{{$data['articles']['response']['docs'][$i+1]['title'][0]}}</span></b>
                <p>Source:{{$data['articles']['response']['docs'][$i+1]['source'][0]}}</p>
                <p class="news">{{$data['articles']['response']['docs'][$i]['description']}}</p>
                <div class="readmore2">{!!HTML::link('page?url='.rawurlencode($data['articles']['response']['docs'][$i+1]['url']),'...')!!}</div>
            </div>
            @endif
            @if(!empty($data['articles']['response']['docs'][$i+2]))
             <div class="news3">
                     
                  <b><span class="headin">{{$data['articles']['response']['docs'][$i+2]['title'][0]}}</span></b>
                <p>Source:{{$data['articles']['response']['docs'][$i+2]['source'][0]}}</p>
                <p class="news">{{$data['articles']['response']['docs'][$i]['description']}}</p>
                <div class="readmore3">{!!HTML::link('page?url='.rawurlencode($data['articles']['response']['docs'][$i+2]['url']),'...')!!}</div>
            </div>  
            @endif
             @endfor   
    </div>
    
    <footer class="hidden disp"><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#fff">Finally there!</font></span>
</div></footer>       

 <script type="text/javascript">

    $( "#autosearch" ).autocomplete({
        
      source: function( request, response ) {
        $.ajax({
          url: <?php echo "'".$ull."/autocomplete'";?>,
          dataType: "json",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
              }
    });

</script>
<script type="text/javascript">
// create the back to top button
$('body').prepend('<a href="#" class="back-to-top"></a>');

var amountScrolled = 300;

$(window).scroll(function() {
	if ($(window).scrollTop() > amountScrolled) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$('a.back-to-top, a.simple-back-to-top').click(function() {
	$('body').animate({
		scrollTop: 0
	}, 'fast');
	return false;
});


</script> 
    
   
	
</body>
</html>