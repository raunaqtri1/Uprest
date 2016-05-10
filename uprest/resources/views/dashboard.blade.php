<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../css/style-dash.css"> 
    <!-- Resource style -->
      	
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
    <div class="click-nav">
			<ul class="no-js">
				<li>
					<a class="clicker">Dashboard</a>
					<ul>
                        <li>{!!HTML::link('dashboard','My Profile')!!}</li>
						<li>{!!HTML::link('dashinterest','My Interests')!!}</li>
                        <li>{!!HTML::link('article','NewsBoard')!!}</li>
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
    
    
    <main><div class="dashboard"><div id="color" class="letter">{{substr(session()->get('name'),0,1)}} </div><h1>{{session()->get('name')}}</h1><div >     <p class="news">Email : {{session()->get('email')}} <a href="#edit1"><button label="edit1">Edit</button></a></p><br/>
         <p class="news">Birthday :<a href="#edit2"><button label="edit1">Edit</button></a></p><br/>
         <p class="news">Contact :<a href="#edit3"><button label="edit1">Edit</button></a></p></div>
        
   
        
        
        
        
        
        </div>
        </main>
    
    <script type="text/javascript">
            function ran_col() { //function name
                var color = '#'; // hexadecimal starting symbol
                var letters = ['000000','fdb546','35404f','dc143c','505050','8b475d','1e90ff']; //Set your colors here
                color += letters[Math.floor(Math.random() * letters.length)];
                document.getElementById('color').style.background = color; // Setting the random color on your div element.
            }
        </script>
    
    
                   
    
    
    
<footer><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#505050">COPYRIGHT 2015 All Rights Reserved.</font></span>
        <div class="searchbox"><img src="../img/search.png" height="30px" width="30px" style="float:left;margin-left:18px;margin-top:5px;"><input type="text" placeholder="Search for what you like" class="search"></div>
    </div>
</div></footer>
                
    
      <div id="edit1" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
        <h2>CHANGE YOUR EMAIL</h2>
        <br/><br/>
        <div>
            {!!Form::open(['url' => 'updatemail'])!!}
        <input type="email" name="email" id="email" placeholder="New Email" style="width:400px;height:50px"/>
        <br/><br/>
                <input type="submit" class="buttonmod" label="save1" value="Save">
            {!! Form::close() !!}
        </div>
	</div>
</div>
    
    
      <div id="edit2" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
        <h2>CHANGE YOUR BIRTHDAY</h2>
        <br/><br/>
        <div>
            {!!Form::open(['url' => 'updatebday'])!!}
        <input type="text" name="bday" id="bday" placeholder="Your b=Birthday" style="width:400px;height:50px"/>
        <br/><br/>
                <input type="submit" class="buttonmod" label="save2" value="Save">
            {!! Form::close() !!}
        </div>
	</div>
</div>
    
      <div id="edit3" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
        <h2>CHANGE YOUR CONTACT</h2>
        <br/><br/>
        <div>
            {!!Form::open(['url' => 'updatecontact'])!!}
        <input type="text" name="contact" id="contact" placeholder="New Contact" style="width:400px;height:50px"/>
        <br/><br/>
                <input type="submit" class="buttonmod" label="save3" value="Save">
          {!! Form::close() !!}
        </div>
	</div>
</div>
    
    
    
    
    
   
    
</body>
</html>