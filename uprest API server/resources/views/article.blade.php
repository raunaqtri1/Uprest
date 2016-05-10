<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="./css/reset.css"> 
	<link rel="stylesheet" href="./css/style-article.css">
    <link rel="stylesheet" href="./css/style-changebg.css">
   
    	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="./js/modernizer.js"></script>
    <script src="./js/carousel/jquery.min.js"></script>
		<script src="./js/carousel/jquery.dropotron.min.js"></script>
		<script src="./js/carousel/skel.min.js"></script>
		<script src="./js/carousel/skel-panels.min.js"></script>
		<script src="./js/carousel/init.js"></script>
      	
      	
	<title>uprest.</title>
</head>
<body oncontextmenu="return false" class="noselect">
    
     
    
    
		<header>
    <div class="container clearfix">
        <h1 id="logo">
            <b>up</b><font color="darkgray">rest.</font>
        </h1>
	<!--  <nav>
            <a href="#signin">Sign In</a>
        </nav> -->
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
    
         
    
    
    
    
    
    <div class="cd-filter">
			<form>
				<div class="cd-filter-block">
					<h4>Select</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
                                <option value="">Choose an option</option>
								<option value=".option1">Sources</option>
								<option value=".option2">Interests</option>
								
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
                
                

				<div class="cd-filter-block hiddencontent" id="option1">
					<h4>Choose your favourite Sources</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Option 1</label>
						</li>

						<li>
							<input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Option 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Option 3</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

                <div class="cd-filter-block hiddencontent" id="option2">
					<h4>Choose your favourite Interests</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Option 1</label>
						</li>

						<li>
							<input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Option 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Option 3</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				
			</form>

			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->
    <a href="#0" class="cd-filter-trigger">Filters</a>
    
    
    
<!--<script src="../js/jquery-2.1.1.js"></script>-->
    
    
    
    
<script src="../js/jquery.mixitup.min.js"></script>
    
    <script>$(document).ready(function () {
  $('.hiddencontent').hide();
  $('#selectThis').change(function () {
    $('.hiddencontent').hide();
      var str=$(this).val();
      str=str.replace(".","");
    $('#'+str).show();
  })
});
</script>
    
<script src="../js/main.js"></script> <!-- Resource jQuery -->    


    
    
    <div class="click-nav">
			<ul class="no-js">
				<li>
					<a class="clicker">Dashboard</a>
					<ul>
                        <li><a href="#">My Profile</a></li>
						<li><a href="#">My Interests</a></li>
                        <li><a href="#">Newsboard</a></li>
                        <li><a href="#">Favourites</a></li>
                        <li><a href="#">Contact Us</a></li>
						<li><a href="#">Sign out</a></li>
					</ul>
				</li>
			</ul>
		</div>
    
    
    
   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    -->
    
    
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


    <!--follow unfollow------------------------------------------------------------------------>
    
     <div class="dashboard">
        
        <p style="z-index:400000;">Article Name</p>
         <div class="dashboard1">        
             <a href="#">
        <div class="add">Follow</div></a>
         
           <a href="#">
        <div class="add hidden">Unfollow</div></a>
        
        </div>

        
        
        
        </div>
    
    
    
    
     <!--follow unfollow------------------------------------------------------------------------>
    
    
    <main>
        <div class="contentnews">
            <div class="news1">
                     
                <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore1"><a href="page.html">...</a></div>
            </div>
             <div class="news2">
                           
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore2"><a href="page.html">...</a></div>
            </div>
             <div class="news3">
                          
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
            <div class="news3">
                     
                 <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
            <div class="news1">
                     
                <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore1"><a href="page.html">...</a></div>
            </div>
             <div class="news2">
                   
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore2"><a href="page.html">...</a></div>
            </div>
             <div class="news3">
                        
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
            <div class="news3">
                        
                 <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div> 
            
            <div class="news1">
                    
                <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore1"><a href="page.html">...</a></div>
            </div>
             <div class="news2">
                     
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore2"><a href="page.html">...</a></div>
            </div>
             <div class="news3">
                    
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
            <div class="news3">
                       
                 <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
    </main>
        
               <div class="dashboard">
        
        <p class="rec" >.</p>
         <div class="dashboard1">        
             <a href="#">
        <div class="showmore">Liked our choice? Read more!</div></a>
         
          
        
        </div>

        
          <br>  
        <p class="rec">Recommended</p>
        
        </div>
        
        
            
        
        <main>
            
            
            
            
            
       <div class="contentnews2">
           
            
            <!-- Carousel -->
			<div class="carousel">
				<div class="reel">
                    
                   <div class="news4">
                         
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
             <div class="news4">
                         
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
           <div class="news4">
                         
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
<div class="news4">
                         
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
             <div class="news4">
                         
                  <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>
            </div>
            <div class="news4">
                   
                 <b><span class="headin">HEADING</span></b>
                <p>Source</p>
                <p class="news">News</p>
                <div class="readmore3"><a href="page.html">...</a></div>        
                     
              
                    
                    
                    
                    
                    


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
            <form action="" class="mod">
        <input type="text" name="email" id="email" placeholder="Email" style="width:400px;height:50px"/>
        <input type="password" name="password" id="password" placeholder="Password" style="width:400px;height:50px"/><br/><br/>
                <button class="buttonmod" label="Sign In">Sign In</button>
                
            </form><br/>
            <a href="index.html"><font color="white" style="text-decoration:underline;text-align:center;margin-left:150px" >Not Registered Yet ?</font>
        </div>
	</div>
</div>
        
        
        
 
        
        <!--_--------------------------follow unfollow script---------------------------------------------------------------------------------------->>
        
        
        
        
   <script type="text/javascript">

$('.dashboard1').on('click', function (e) {
    $(this).children().children('.add').toggleClass("hidden");
});  
     
</script>
	       
      
</body>
</html>