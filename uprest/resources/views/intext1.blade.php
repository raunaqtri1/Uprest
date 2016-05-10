<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style1.css"> <!-- Resource style -->
    
 <!-- js -->   
    <script src="js/classie.js"></script>
<script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
</script>
    
    
    
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
  	
	<title>uprest.</title>
</head>
<body oncontextmenu="return false" class="noselect">
		<header>
    <div class="container clearfix">
        <h1 id="logo">
            <b>up</b><font color="darkgray">rest.</font>
        </h1>
	  <nav>
            <a href="#signin">Sign In</a>
        </nav>
    </div>
</header>

	<main class="cd-main-content">
		<div class="cd-fixed-bg cd-bg-1">
            <h1><br/><br/><font color="white">YOUR PERSONAL MAGAZINE</font><br/>
                <b><font color="white">Find, follow and collect stories on all the topics you love.</font><br/></b>
                
            {!!Form::open(['url' => 'signup'])!!}
                <input type="text" name="name" id="name" placeholder="Full Name" style="width:400px;height:50px"  @if (session('sname'))
        <?php echo "value=\"".session('sname')."\""?>
        @endif/>
        {{$errors->first('name')}}
        <input type="email" name="email" id="email" placeholder="Email" style="width:400px;height:50px" @if (session('semail'))
        <?php echo "value=\"".session('semail')."\""?>
        @endif/>
        {{$errors->first('email')}}
        <input type="password" name="password" id="password" placeholder="Password" style="width:400px;height:50px"/><br/><br/>
                 {{$errors->first('password')}}
                <input class="button" type="submit" value="Sign Up"/>
                {!! Form::close() !!}
                </br>
                <!--<button class="buttonfacebook" label="Sign Up Via Facebook"><font size=6 face="Arial Rounded MT Bold">f</font>       Sign Up Using Facebook</button>-->
                
     <style>
input:invalid {}
    </style>
            </form>
            </h1>
		</div> <!-- cd-fixed-bg -->

		<div class="cd-scrolling-bg cd-color-1">
			<div class="cd-container">
				<div class="containerbox1 floatl">
                    <h2 id="left"> FIND THE TOPICS THAT MATTER TO YOU.                        </h2>
                    <hr id="left">
                </div>
                <div class="containerbox2 floatl">
                    <div class="videoframe"> 
                        <img src="img/interest-5.jpg" /> 
                        <div>FOOTBALL</div>
                    </div>
                </div>
                <div class="containerbox2 floatl">
                     <div class="videoframe"> 
                        <img src="img/interest-3.jpg" />
                         <div>BUSINESS</div>
                    </div>
                </div>
                
                
                <div class="containerbox2 floatl">
                     <div class="videoframe"> 
                        <img src="img/interest-2.jpg" />
                         <div>SPORTS</div>
                    </div>
                </div>
                <div class="containerbox2 floatl">
                    <div class="videoframe"> 
                        <img src="img/interest-4.jpg" />  
                        <div>TECH</div>
                    </div>
                </div>
            
			</div> <!-- cd-container -->
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-2">
			<h2>Trivia is all about your personal interests, lets try to find them.</h2>
		</div> <!-- cd-fixed-bg -->

		<div class="cd-scrolling-bg cd-color-2">
			<div class="cd-container">
				<div class="shadow">
                     <div class="containerbox1 floatr">
                    <h2 id="right"> READ THE SOURCES YOU LOVE</h2>
                    <hr id="right">
                    </div>
                <div class="containerbox2 floatr">
                    <div class="videoframe"> 
                        <img src="img/resource-1.jpg" /> 
                        
                    </div>
                </div>
                <div class="containerbox2 floatr">
                     <div class="videoframe"> 
                        <img src="img/resource-2.jpg" />  
                   
                    </div>
                </div>            
                
                <div class="containerbox2 floatr">
                     <div class="videoframe"> 
                        <img src="img/resource-3.jpg" /> 
                        
                    </div>
                </div>
                <div class="containerbox2 floatr">
                    <div class="videoframe"> 
                        <img src="img/rescource-4.jpg" />  
                    
                    </div>
                </div>
                
                </div>
			</div> <!-- cd-container -->
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-3">
			<h2>Don't worry, you can always change them later.</h2>
		</div> <!-- cd-fixed-bg -->

		<div class="cd-scrolling-bg cd-color-3">
			<div class="cd-container">
				<div class="containerbox1 floatl">
                    <h2 id="left"> ABOUT US : THE DEVELOPERS</h2>
                    <hr id="left">
                </div>
                <div class="containerbox2 floatl">
                    <div class="videoframe"> 
                        <img src="img/img-2.jpg" /> 
                        <div>SARTHAK</div>
                    </div>
                </div>
                <div class="containerbox2 floatl">
                     <div class="videoframe"> 
                        <img src="img/img-1.jpg" />
                        <div>CHINMAY</div>
                    </div>
                </div>
                
               
                <div class="containerbox2 floatl">
                     <div class="videoframe"> 
                        <img src="img/img-4.jpg" />   
                        <div>RAUNAQ</div>
                    </div>
                </div>
                <div class="containerbox2 floatl">
                    <div class="videoframe"> 
                        <img src="img/img-3.jpg" />   
                        <div>SHUBHAM</div>
                    </div>
                </div>
            
			</div> <!-- cd-container -->
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-4">
			<h2>Keep Reading!</h2>
            <span class="footer-text"><font color="#505050">COPYRIGHT 2015 All Rights Reserved.</font></span>
            
        
		</div> <!-- cd-fixed-bg -->
        
	</main> <!-- cd-main-content -->
    
    
        
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
                {!! Form::close() !!}
            </form><br/>
            <a href="index.html"><font color="white" style="text-decoration:underline;text-align:center;margin-left:150px" >Not Registered Yet ?</font>
               
            </a>
        </div>
	</div>
</div>
   
    
	
	
</body>
</html>