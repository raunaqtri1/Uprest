<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/reset.css"> 
	<link rel="stylesheet" href="../css/style-dash1.css"> 
     <link rel="stylesheet" href="../css/style-changebg.css">   	
	<title>uprest.</title>
</head>
<body oncontextmenu="return false" class="noselect" onload="return ran_col()">
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
    
    
    <main><div class="dashboard"><div id="color" class="letter">{{substr(session()->get('name'),0,1)}}</div><h1>{{session()->get('name')}}</h1><div >     <p class="news">Email : {{session()->get('email')}} <a href="#edit1"><button style="background-color:white; border:1px solid ; border-color:rgba(74, 170, 165, 0.8);padding:5px;margin-top:10px; border-radius:5px" label="edit1">Edit</button></a></p><br/>
        </div>
        </main>
    
    <script type="text/javascript">
            function ran_col() {
                var color = '#'; 
                var letters = ['000000','fdb546','35404f','dc143c','505050','8b475d','1e90ff']; 
                color += letters[Math.floor(Math.random() * letters.length)];
                document.getElementById('color').style.background = color; // 
            }
        </script>
    
    
                   
    
    
    
<footer><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#505050">COPYRIGHT 2015 All Rights Reserved.</font></span>
        <div class="searchbox">{!!Form::open(['url' => 'search','method' => 'get'])!!}<input name="q" type="image" src="../img/search.png" alt="Submit" height="30px" width="30px" style="float:left;margin-left:18px;margin-top:5px;" /><input type="text" placeholder="Search for what you like" class="search" autocomplete="off" id="autosearch" name="q" />{!! Form::close() !!}</div>
    </div>
</div></footer>
                
    
      <div id="edit1" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
        <h2>CHANGE YOUR EMAIL</h2>
        <br/><br/>
        <div>
             {!!Form::open(['url' => 'updatemail'])!!}
        <input type="text" name="email" id="email" placeholder="New Email" style="width:400px;height:50px"/>
        <br/><br/>
                <input type="submit" class="buttonmod" label="save1" value="Save">
            {!! Form::close() !!}
        </div>
	</div>
</div>   

</body>
</html>