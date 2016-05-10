<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style-page.css"> 
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
      <nav>
            <a href="#signin">Sign In</a>
        </nav>
    </div>
</header>
    
     
    <main>
        <div class="contentnews">
            <div class="news1">
                <div class="icon fav"></div>  
                 <div class="videoframe"> 
                 <img src=<?php  
                 echo "\"".$article['response']['docs'][0]['img']."\""?> >
                    </div>
                <div class="heading"><h1>{{$article['response']['docs'][0]['title'][0]}}</h1>
                <p>Source{{$article['response']['docs'][0]['source'][0]}}</p></div>
                <div class="para">
                
                    <p class="news">@foreach($article['response']['docs'][0]['content'] as $news)
                    {{$news}}
                    @endforeach</p></div>
              
            </div>
            
        </div>
    </main>
    
<footer><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#505050">COPYRIGHT 2015 All Rights Reserved.</font></span>
        <div class="searchbox"><img src="../img/search.png" height="30px" width="30px" style="float:left;margin-left:18px;margin-top:5px;"><input type="text" placeholder="Search for what you like" class="search"></div>
    </div>
</div></footer>
    
    
        
    <script type="text/javascript">

$('.icon').on('click', function (e) {
    $(this).toggleClass(".fav-select");
  $(this).toggleClass(".fav");
});
      
</script>
    
    
                
    
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
        
    
          
    
</body>
</html>