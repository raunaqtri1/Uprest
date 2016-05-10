<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../css/style-article.css"> 
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
       @if(isset($interests))
        {!!Form::open(['url' => 'display', 'method' => 'get'])!!}
           <select name="category">
            @foreach($interests as $interest)
            <option value=<?php echo "\"".$interest."\""; ?>>{{strtoupper($interest)}}</option>
            @endforeach
          </select>  
          <input type="submit" value="choose" name=""/>
           {!! Form::close() !!}
          @endif 
        </nav>
	  <nav>
            <a href="#signin">Sign In</a>
        </nav>
    </div>
</header>
    
    <main>
        <div class="contentnews">
        @for($i=0;$i<12;$i=$i+4)
            <div class="news1">
                     <div class="icon fav"></div>      
                <b><span class="headin">{{$news->response->docs[$i]->title[0]}}</span></b>
                <p>Source:{{$news->response->docs[$i]->source[0]}}</p>
                <p class="news">{{$news->response->docs[$i]->description}}</p>
                <div class="readmore1">{!!HTML::link('page?url='.rawurlencode($news->response->docs[$i]->url),'...')!!}</div>
            </div>
             <div class="news2">
                      <div class="icon fav"></div>      
                 <b><span class="headin">{{$news->response->docs[$i+1]->title[0]}}</span></b>
                <p>Source:{{$news->response->docs[$i+1]->source[0]}}</p>
                <p class="news">{{$news->response->docs[$i+1]->description}}</p>
                <div class="readmore2">{!!HTML::link('page?url='.rawurlencode($news->response->docs[$i+1]->url),'...')!!}</div>
            </div>
             <div class="news3">
                      <div class="icon fav"></div>      
                 <b><span class="headin">{{$news->response->docs[$i+2]->title[0]}}</span></b>
                <p>Source:{{$news->response->docs[$i+2]->source[0]}}</p>
                <p class="news">{{$news->response->docs[$i+2]->description}}</p>
               <div class="readmore3">{!!HTML::link('page?url='.rawurlencode($news->response->docs[$i+2]->url),'...')!!}</div>
            </div>
            <div class="news3">
                     <div class="icon fav"></div>      
                <b><span class="headin">{{$news->response->docs[$i+3]->title[0]}}</span></b>
                <p>Source:{{$news->response->docs[$i+3]->source[0]}}</p>
                <p class="news">{{$news->response->docs[$i+3]->description}}</p>
               <div class="readmore3">{!!HTML::link('page?url='.rawurlencode($news->response->docs[$i+3]->url),'...')!!}</div>
            </div>
            @endfor   
        </div>
    </main>
    
    
     <script type="text/javascript">

$('.icon').on('click', function (e) {
    $(this).toggleClass(".fav-select");
  $(this).toggleClass(".fav");
});
      
</script>
	
    
    
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
        <input type="text" name="email" id="email" placeholder="Email" style="width:400px;height:50px" @if (session('semail'))
        <?php echo "value=\"".session('semail')."\""?>
@endif/>/>
        <input type="password" name="password" id="password" placeholder="Password" style="width:400px;height:50px"/><br/><br/>
                <input type="submit" class="buttonmod" label="Sign In" value="Sign In">
                {!! Form::close() !!}<br/>
            <a href="index.html"><font color="white" style="text-decoration:underline;text-align:center;margin-left:150px" >Not Registered Yet ?</font>
        </div>
	</div>
</div>
    
</body>
</html>