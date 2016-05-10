<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../css/style-dashinterest.css">
     <link rel="stylesheet" href="../css/style-changebg.css"><!-- Resource style -->
    
    
    
 <!-- js -->   
   
    
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
    <script type="text/javascript" src="../js/modernizer.js"></script>
    
    
    
	
  	
	<title>uprest.</title>
</head>
<body oncontextmenu="return false" class="noselect">
    
    
    <!-- <div class="header"><h1>1 more step! Follow topics to personalize your Uprest</h1><br/><br/><div class="searchbox"><img src="../img/search.png" height="30px" width="30px" style="float:left;margin-left:25px;margin-top:11px;"><input type="text" placeholder="Search for what you like" class="search"></div><br/><br/><font size="4px">Popular Topics</font></div> -->
  <!------------------------------------------>  
    <header>
    <div class="container clearfix">
        <h1 id="logo">
            <b>up</b><font color="darkgray">rest.</font>
        </h1>
	
    </div>
            
   
</header>
  
    
     <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
            <li><span>Image 06</span></li>
        </ul>
    
     <div class="click-nav">
			<ul class="no-js">
				<li>
					<a class="clicker">Dashboard</a>
					<ul>
                        <li>{!!HTML::link('dashboard','My Profile')!!}</li>
						<li>{!!HTML::link('dashinterest','My Interests')!!}</li>
                        <li>{!!HTML::link('article','NewsBoard')!!}</li>
                         <li>{!!HTML::link('myfavourites','Favourites')!!}</li>
						<li>{!!HTML::link('contactus','Contact Us')!!}</li>
						<li>{!!HTML::link('logout','Sign out')!!}</li>
					</ul>
				</li>
			</ul>
		</div>
    
    
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
		$(function() {
			$('.click-nav > ul').toggleClass('no-js js');
			$('.click-nav .js ul').hide();
			$('.click-nav .js').click(function(e) {
				$('.click-nav .js ul').slideToggle(200);
				$('.clicker').toggleClass('active');
				e.stopPropagation();
			});
			$(document).click(function() {
				if ($('.click-nav .js ul').is(':visible')) {
					$('.click-nav .js ul', this).slideUp();
					$('.clicker').removeClass('active');
				}
			});
		});
		</script>
    
    <script>
			var _gaq=[['_setAccount','UA-20440416-10'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)})(document,'script');
		</script>
    
    
     <div class="dashboard">
        
   
      <a href="interest"> <div class="add">Edit Interests</div></a>
        
        
        
        
        
        </div>
        
    
     <script type="text/javascript">
            function ran_col() { //function name
                var color = '#'; // hexadecimal starting symbol
                var letters = ['000000','fdb546','35404f','dc143c','505050','8b475d','1e90ff']; //Set your colors here
                color += letters[Math.floor(Math.random() * letters.length)];
                document.getElementById('color').style.background = color; // Setting the random color on your div element.
            }
        </script>
    
   <!-- <footer><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#505050">COPYRIGHT 2015 All Rights Reserved.</font></span>
        <div class="searchbox"><img src="../img/search.png" height="30px" width="30px" style="float:left;margin-left:18px;margin-top:5px;"><input type="text" placeholder="Search for what you like" class="search"></div>
    </div>
</div></footer>  -->
    
  <!------------------------------------------>    
    
		<div class="interests">
    <?php $ull=action('homecontroller@getIndex');?>
                @for($i=0;$i<sizeof($inter);$i++)
                <a href=<?php echo "'".$ull."/display?category=".$inter[$i]."'" ;?> >
                <div class="containerbox">
                    <div class="videoframe not-selected" id=<?php echo '"div'.str_replace(' ','_',$inter[$i]).'"' ;?>> 
                    <img src=<?php echo "\"../img/interests/".$inter[$i].".jpg\"" ;?> /> 
                       <div class="abcd">{{strtoupper($inter[$i])}}</div>
                    </div></div></a>
            
        @endfor
    
             
         
                
            
             
                    </div>
                
    
    
    
    
        
<footer><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#505050">COPYRIGHT 2015 All Rights Reserved.</font></span>
        <div class="searchbox">{!!Form::open(['url' => 'search','method' => 'get'])!!}<input name="q" type="image" src="../img/search.png" alt="Submit" height="30px" width="30px" style="float:left;margin-left:18px;margin-top:5px;" /><input type="text" placeholder="Search for what you like" class="search" autocomplete="off" id="autosearch" name="q" />{!! Form::close() !!}</div>
    </div>
</div></footer>
                
    
	
    
        
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