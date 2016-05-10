<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/reset1.css"> 
	<link rel="stylesheet" href="../css/style-article1.css"> 
   
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
    
    @if((!isset($_GET['category']))&&(empty($myfav)))
    @if(session('token'))
    <div class="cd-filter">
			<form>
				<div class="cd-filter-block">
					<h4>Select</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option value="">Choose</option>
								<option value=".option1">Sources</option>
								<option value=".option2">Interests</option>
								
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
                
                

				<div class="cd-filter-block hiddencontent" id="option1">
					<h4>Choose your <br>favourite Sources</h4>

					<ul class="cd-filter-content cd-filters list">
          <?php $i=1;?>
          @foreach($sources as $interest)
          <a href=<?php echo "'".$url."/display?category=".$interest."'" ;?>>
						<li>
							<input class="filter" data-filter=<?php echo "'.check".$i."'" ;?> type="checkbox" name="source" value=<?php echo "'".$interest."'" ;?> id=<?php echo "'checkbox1".$i."'"; $i++;?>>
			    			<label class="checkbox-label" for="checkbox1">{{strtoupper($interest)}}</label>
						</li>
            </a>
            @endforeach
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

                <div class="cd-filter-block hiddencontent" id="option2">
					<h4>Choose your <br>favourite Interests</h4>

					<ul class="cd-filter-content cd-filters list">
						<?php $i=1;?>
          @foreach($interests as $interest)
            <li>
              <input class="filter" data-filter=<?php echo "'.check".$i."'" ;?> type="checkbox" name="interest" value=<?php echo "'".$interest."'" ;?> id=<?php echo "'checkbox2".$i."'"; $i++;?>>
              <a href=<?php echo "'".$url."/display?category=".$interest."'" ;?>>   <label class="checkbox-label" for="checkbox1">{{strtoupper($interest)}}</label></a>
            </li>
            @endforeach
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				
			</form>

			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->
     
    <a href="#0" class="cd-filter-trigger">Filters</a>
    @endif
    @endif
    
    
    <script src="../js/jquery-2.1.1.js"></script>
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


    <!--follow unfollow------------------------------------------------------------------------>
    
     <div class="dashboard">
       @if(isset($_GET['category']))
        <p><?php echo strtoupper($_GET['category']);?></p>
         <div class="dashboard1">  
           @if(session('token'))    
             <a href="#">
        <div class="add">Follow</div></a>
         
           <a href="#">
        <div class="add hidden">Unfollow</div></a>
        @endif
        </div>

        @endif
        
        
        </div>
    
    
    
    
     <!--follow unfollow------------------------------------------------------------------------>
    
     <div id="imageload" style="display: none;position:fixed;left:700px;top:300px;z-index:40000;">
        <img src="loader.gif" />
         </div>
    <main>
        <div class="contentnews" id="mainarticle">

         @for($i=0;$i<12;$i=$i+4)
            @if(!empty($news['response']['docs'][$i]))
            <div class="news1">
                <b><span class="headin">{{$news['response']['docs'][$i]['title'][0]}}</span></b>
                <p>Source:{{$news['response']['docs'][$i]['source'][0]}}</p>
                <p class="news">{{$news['response']['docs'][$i]['description']}}</p>
                <div class="readmore1">{!!HTML::link('page?url='.rawurlencode($news['response']['docs'][$i]['url']),'...')!!}</div>
            </div>
            @endif
            @if(!empty($news['response']['docs'][$i+1]))
             <div class="news2">
                  <b><span class="headin">{{$news['response']['docs'][$i+1]['title'][0]}}</span></b>
                <p>Source:{{$news['response']['docs'][$i+1]['source'][0]}}</p>
                <p class="news">{{$news['response']['docs'][$i+1]['description']}}</p>
                <div class="readmore2">{!!HTML::link('page?url='.rawurlencode($news['response']['docs'][$i+1]['url']),'...')!!}</div>
            </div>
            @endif
            @if(!empty($news['response']['docs'][$i+2]))
             <div class="news3">
                         <b><span class="headin">{{$news['response']['docs'][$i+2]['title'][0]}}</span></b>
                <p>Source:{{$news['response']['docs'][$i+2]['source'][0]}}</p>
                <p class="news">{{$news['response']['docs'][$i+2]['description']}}</p>
                <div class="readmore3">{!!HTML::link('page?url='.rawurlencode($news['response']['docs'][$i+2]['url']),'...')!!}</div>
            </div>
            @endif
            @if(!empty($news['response']['docs'][$i+3]))
            <div class="news3">
                 <b><span class="headin">{{$news['response']['docs'][$i+3]['title'][0]}}</span></b>
                <p>Source:{{$news['response']['docs'][$i+3]['source'][0]}}</p>
                <p class="news">{{$news['response']['docs'][$i+3]['description']}}</p>
                <div class="readmore3">{!!HTML::link('page?url='.rawurlencode($news['response']['docs'][$i+3]['url']),'...')!!}</div>
            </div>
            @endif
            @endfor
            </div>
    </main>
        
          <div class="dashboard">
          <div class="test">        
             <a href="#">
                 <div class="showmore">Liked our choice? Read more!<br><br><br></div></a>
         
              
             
        </div>

         
              <p class="rec">Recommended</p> 
            
        
        </div>

        
        
            
        @if(!isset($_GET['category']))
          @if(session('token'))
        <main>
        <div class="contentnews">
          @for($i=0;$i<sizeof($recommend['response']['docs']);$i=$i+1)
            <div class="news4">  
                  <b><span class="headin">{{$recommend['response']['docs'][$i]['title'][0]}}</span></b>
                <p>Source:{{$recommend['response']['docs'][$i]['source'][0]}}</p>
                <p class="news">{{$recommend['response']['docs'][$i]['description']}}</p>
                <div class="readmore3">{!!HTML::link('page?url='.rawurlencode($recommend['response']['docs'][$i]['url']),'...')!!}</div>
            </div>  
          @endfor  
          </div>       
    </main>
    @endif
    @endif
    
    
    
<footer><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#505050">COPYRIGHT 2015 All Rights Reserved.</font></span>
        <div class="searchbox">{!!Form::open(['url' => 'search','method' => 'get'])!!}<input name="q" type="image" src="../img/search.png" alt="Submit" height="30px" width="30px" style="float:left;margin-left:18px;margin-top:5px;" /><input type="text" placeholder="Search for what you like" class="search" autocomplete="off" id="autosearch" name="q" />{!! Form::close() !!}</div>
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
        
         @if(isset($_GET['category']))
      <script type="text/javascript">
   var strt={{$strtrow}}
   $('#scrol').on('click', function (e) {
        $.ajax({
        url: 'http://localhost:8000/display',
        type: "GET",
        dataType: 'json',
        data: { category:<?php echo $_GET['category'];?>,strtrow:strt},
        beforeSend: function(){
        $('#imageload').show();
        },
        complete: function(){
        $('#imageload').hide();
        },
        success: function (data) {
          
          var i;
         
          strt=data.strtrow;
        for (i = 0; i < 12; i=i+4) {
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news1'><b><span class='headin'>"+data.news.response.docs[i].title[0]+"</span></b><p>Source:"+data.news.response.docs[i].source[0]+"</p><p class='news'>"+data.news.response.docs[i].description+"</p><div class='readmore1'><a href='http://localhost:8000/page?url="+encodeURI(data.news.response.docs[i].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news2'><b><span class='headin'>"+data.news.response.docs[i+1].title[0]+"</span></b><p>Source:"+data.news.response.docs[i+1].source[0]+"</p><p class='news'>"+data.news.response.docs[i+1].description+"</p><div class='readmore2'><a href='http://localhost:8000/page?url="+encodeURI(data.news.response.docs[i+1].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news3'><b><span class='headin'>"+data.news.response.docs[i+2].title[0]+"</span></b><p>Source:"+data.news.response.docs[i+2].source[0]+"</p><p class='news'>"+data.news.response.docs[i+2].description+"</p><div class='readmore3'><a href='http://localhost:8000/page?url="+encodeURI(data.news.response.docs[i+2].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news4'><b><span class='headin'>"+data.news.response.docs[i+3].title[0]+"</span></b><p>Source:"+data.news.response.docs[i+3].source[0]+"</p><p class='news'>"+data.news.response.docs[i+3].description+"</p><div class='readmore3'><a href='http://localhost:8000/page?url="+encodeURI(data.news.response.docs[i+3].description)+"' >...</a></div></div>";  
          }
      
    }
});    
}); 
   </script>   
 @endif
        
        <!--_--------------------------follow unfollow script---------------------------------------------------------------------------------------->>
      @if((!isset($_GET['category']))&&(empty($myfav)))
    @if(session('token'))   
   <script type="text/javascript">
   var strt={{$strtrow}}
   $('#scrol').on('click', function (e) {
        $.ajax({
        url: 'http://localhost:8000/article',
        type: "GET",
        dataType: 'json',
        data: { strtrow:strt},
        beforeSend: function(){
        $('#imageload').show();
        },
        complete: function(){
        $('#imageload').hide();
        },
        success: function (data) {
          
          var i;
         
          strt=data.strtrow;
        for (i = 0; i < 12; i=i+4) {
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news1'><b><span class='headin'>"+data.news.response.docs[i].title[0]+"</span></b><p>Source:"+data.news.response.docs[i].source[0]+"</p><p class='news'>"+data.news.response.docs[i].description+"</p><div class='readmore1'><a href='http://localhost:8000/page?url="+encodeURI(data.news.response.docs[i].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news2'><b><span class='headin'>"+data.news.response.docs[i+1].title[0]+"</span></b><p>Source:"+data.news.response.docs[i+1].source[0]+"</p><p class='news'>"+data.news.response.docs[i+1].description+"</p><div class='readmore2'><a href='http://localhost:8000/page?url="+encodeURI(data.news.response.docs[i+1].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news3'><b><span class='headin'>"+data.news.response.docs[i+2].title[0]+"</span></b><p>Source:"+data.news.response.docs[i+2].source[0]+"</p><p class='news'>"+data.news.response.docs[i+2].description+"</p><div class='readmore3'><a href='http://localhost:8000/page?url="+encodeURI(data.news.response.docs[i+2].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news4'><b><span class='headin'>"+data.news.response.docs[i+3].title[0]+"</span></b><p>Source:"+data.news.response.docs[i+3].source[0]+"</p><p class='news'>"+data.news.response.docs[i+3].description+"</p><div class='readmore3'><a href='http://localhost:8000/page?url="+encodeURI(data.news.response.docs[i+3].description)+"' >...</a></div></div>";  
          }
      
    }
});    
}); 
   </script>     
  @endif
  @endif      
        
        

<script type="text/javascript">
$('.dashboard1').on('click', function (e) {
   $.ajax({
        url: 'http://localhost:8000/follow',
        type: "GET",
        dataType: 'json',
        data: { category: <?php if(isset($_GET['category'])){echo "\"".strtolower($_GET['category'])."\"" ;}?> },
        success: function (data) {
      $('.add').toggleClass("hidden");
    }
});   
});  
 <?php
    if(!empty($news[0]['follow'])){ 
    if ($news[0]['follow']=="yes") {
        echo " $('.add').toggleClass(\"hidden\");
        ";
    }
}
    ?>
  </script>
    <script type="text/javascript">

function func(){
  var sour=new Array();
  var intersst=new Array();
  var dat={};
   $('input[name="source"]:checked').each(function() {
   sour.push(this.value);
});
   $('input[name="interest"]:checked').each(function() {
    intersst.push(this.value);
});
 dat["sources"]=sour;
 dat["interests"]=intersst;


  $.ajax({
        url: 'http://localhost:8000/filter',
        type: "GET",
        dataType: 'json',
        data: { input:encodeURI(JSON.stringify(dat))},
        beforeSend: function(){
        $('#imageload').show();
        },
        complete: function(){
        $('#imageload').hide();
        },
        success: function (data) {
          document.getElementById('mainarticle').innerHTML="";
          var i;
         
          
        for (i = 0; i < 12; i=i+4) {
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news1'><b><span class='headin'>"+data.response.docs[i].title[0]+"</span></b><p>Source:"+data.response.docs[i].source[0]+"</p><p class='news'>"+data.response.docs[i].description+"</p><div class='readmore1'><a href='http://localhost:8000/page?url="+encodeURI(data.response.docs[i].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news2'><b><span class='headin'>"+data.response.docs[i+1].title[0]+"</span></b><p>Source:"+data.response.docs[i+1].source[0]+"</p><p class='news'>"+data.response.docs[i+1].description+"</p><div class='readmore2'><a href='http://localhost:8000/page?url="+encodeURI(data.response.docs[i+1].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news3'><b><span class='headin'>"+data.response.docs[i+2].title[0]+"</span></b><p>Source:"+data.response.docs[i+2].source[0]+"</p><p class='news'>"+data.response.docs[i+2].description+"</p><div class='readmore3'><a href='http://localhost:8000/page?url="+encodeURI(data.response.docs[i+2].description)+"' >...</a></div></div>";
          document.getElementById('mainarticle').innerHTML=document.getElementById('mainarticle').innerHTML+"<div class='news4'><b><span class='headin'>"+data.response.docs[i+3].title[0]+"</span></b><p>Source:"+data.response.docs[i+3].source[0]+"</p><p class='news'>"+data.response.docs[i+3].description+"</p><div class='readmore3'><a href='http://localhost:8000/page?url="+encodeURI(data.response.docs[i+3].description)+"' >...</a></div></div>";  
          }
      
    }
});  
 
}

<?php
if((!isset($_GET['category']))&&(empty($myfav))){
    if(session('token')){
$i=1;
foreach($interests as $interest){
echo " 
 $('#checkbox1".$i."').on('click',function (e){
         func();
  });
 ";
$i++;
}
}
}
if((!isset($_GET['category']))&&(empty($myfav))){
    if(session('token')){
$i=1;
foreach($sources as $interest){
echo " 
 $('#checkbox2".$i."').on('click',function (e){
         func();
  });
 ";
$i++;
}
}
}
?>
</script>
</body>
</html>