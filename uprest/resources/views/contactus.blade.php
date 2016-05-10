<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../css/style-contactus.css">
     <link rel="stylesheet" href="../css/style-changebg.css">
    <!-- Resource style -->
    
    
    	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/modernizer.js"></script>
    
      	
	<title>uprest.</title>
</head>
<body oncontextmenu="return false" class="noselect">
		<header>
    <div class="container clearfix">
        <h1 id="logo">
            <b>up</b><font color="darkgray">rest.</font>
        </h1>
	  @if(!session('token'))
       <nav>
            <a href="#signin">Sign In</a>
        </nav>
        @endif

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
    @if(session('token'))
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
        @endif
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
    
    
    
    
     
    <main>
        <div style="background-color:white;opacity:0.9;" ; class="contentnews">
            <h1></h1>
            <h1>Get in touch!</h1>
            <h1>Hope to meet you for a coffee.</h1>
            
            <div class="news1">
                
                 <div style="background-color:black; opacity:1;" ; class="details">
                <h2>
                    
                    PHONE:
                </h2>
                
                <p>
                        <br>
                    (91) 9650952180
                        <br>
                    (91) 9812345908
                </p>
                
                <h2>
                        <br>
                    FAX:
                </h2>
                
                <p>
                        <br>
                    (041) 9812375626
                
                </p>  
                
                 <h2>
                        <br>
                    EMAIL:
                </h2>
                
                <p>
                    <br>
                        
                    info@uprest.com
                
                </p>  
                
                
            </div>
                   
                <div style="background-color:black; opacity:1;" class="location">
            
               <div id="googleMap"></div>
            
            </div>
              
            </div>
            
        </div>
    </main>
    
<footer><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#505050">COPYRIGHT 2015 All Rights Reserved.</font></span>
        <div class="searchbox"><img src="../img/search.png" height="30px" width="30px" style="float:left;margin-left:18px;margin-top:5px;"><input type="text" placeholder="Search for what you like" class="search"></div>
    </div>
</div></footer>
    
    
	
    
                
    
  
     <div id="signin" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="close">X</a>
        <h2>SIGN IN TO UPREST</h2>
        <br/><br/>
        <div>
            {!!Form::open(['url' => 'login'])!!}
        <input type="email" name="email" id="email" placeholder="Email" style="width:400px;height:50px" @if (session('semail'))
        <?php echo "value=\"".session('semail')."\""?>
@endif/>
        <input type="password" name="password" id="password" placeholder="Password" style="width:400px;height:50px"/><br/><br/>
                <input type="submit" class="buttonmod" label="Sign In" value="Sign In">
                {!! Form::close() !!}<br/>
            <a href="/"><font color="white" style="text-decoration:underline;text-align:center;margin-left:150px" >Not Registered Yet ?</font>
               
            </a>
        </div>
    </div>
</div>
       
        
        <!--favourite java script----------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        
        <script type="text/javascript">

$('.i1').on('click', function (e) {
    $('.i1').toggleClass("hidden");
});  
     
</script>
        
        
    <script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
    var myCenter=new google.maps.LatLng(28.6304021,77.3699221);
var marker;
function initialize() {
  var mapProp = {
    center:myCenter,
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
 var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
        
          
    
</body>
</html>