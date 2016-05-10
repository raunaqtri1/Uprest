<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style-interest.css"> <!-- Resource style -->
    
    
    
 <!-- js -->   
   
    
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script type="text/javascript" src="../js/modernizer.js"></script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    
    
    
    
    <title>uprest.</title>
    
</head>
<body oncontextmenu="return false" class="noselect">
    <div class="header"><h1>Follow topics to personalize your Uprest</h1><br/><br/><div class="searchbox">{!!Form::open(['url' => 'search','method' => 'get'])!!}<input name="q" type="image" src="../img/search.png" alt="Submit" height="30px" width="30px" style="float:left;margin-left:25px;margin-top:11px;"/><input type="text" placeholder="Search for what you like" class="search" id="autosearch" name="q"/>{!! Form::close() !!}</div><br/><br/><font size="4px">Popular Topics{!!Form::open(['url' => 'yourinterest'])!!}<p id="demo"></p><input style="background-color:white; border:1px solid ; border-color:rgba(74, 170, 165, 0.8);padding:5px;margin-top:10px; border-radius:5px;cursor:pointer;" type="submit" value="Continue"  /> {!! Form::close() !!}</div>
        <div class="interests">
        @for($i=0;$i<sizeof($inter);$i++)
                <div class="containerbox">
                    <div class="videoframe not-selected" id=<?php echo '"div'.str_replace(' ','_',$inter[$i]).'"' ;?>> 
                    <img src=<?php echo "\"../img/interests/".$inter[$i].".jpg\"" ;?> /> 
                       <div class="abcd">{{strtoupper($inter[$i])}}</div>
                    </div></div>
            
        @endfor
         @for($i=0;$i<sizeof($interest);$i++)
                <div class="containerbox">
                    <div class="videoframe not-selected" id=<?php echo '"div'.$interest[$i].'"' ;?>> 
                    <img src=<?php echo "\"../img/interests/".$interest[$i].".jpg\"" ;?> /> 
                       <div class="abcd">{{strtoupper($interest[$i])}}</div>
                    </div></div>
            
        @endfor      
    </div>
    
    <footer class="hidden disp"><div id="info-bar">
    <div class="container clearfix">
        <span class="footer-text"><font color="#fff">Finally there!</font></span>
</div></footer>
    
  <p id="demo"></p> 
  <?php $ull=action('homecontroller@getIndex');?>
  <script type="text/javascript">

    $( "#autosearch" ).autocomplete({
        
      source: function( request, response ) {
        $.ajax({
          url: <?php echo "\"".$ull."/autocomplete\"";?>,
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


    var intere=new Array();
$('.videoframe').on('click', function (e) {
 
    $(this).children('.abcd').toggleClass("color");

    
});
        
    $('.videoframe').on('click', function (e) {
    $(this).toggleClass("not-selected");
});
        
        $('.videoframe').on('click', function (e) {
    $(this).toggleClass("scale");
       if(intere[$(this).text().replace(/^[ \n]+|[ \n]+$/g,'')])
       {
         intere[$(this).text().replace(/^[ \n]+|[ \n]+$/g,'')]=0;
         var inter=[];
        for (i in intere) { if(intere[i]!=0){inter.push(i);} };
            document.getElementById('demo').innerHTML="<input type='hidden' name='data' value='"+JSON.stringify(inter)+"' />";
      //  alert(JSON.stringify(intere));

        }
       else if(intere[$(this).text().replace(/^[ \n]+|[ \n]+$/g,'')]==0)
       {
       
       
       intere[$(this).text().replace(/^[ \n]+|[ \n]+$/g,'')]=1;
       var inter=[];
        for (i in intere) { if(intere[i]!=0){inter.push(i);} };
            document.getElementById('demo').innerHTML="<input type='hidden' name='data' value='"+JSON.stringify(inter)+"' />";
    //alert(JSON.stringify(intere));
       }
       else
       {
        intere[$(this).text().replace(/^[ \n]+|[ \n]+$/g,'')]=1;
        var inter=[];
        for (i in intere) { if(intere[i]!=0){inter.push(i);} };
            document.getElementById('demo').innerHTML="<input type='hidden' name='data' value='"+JSON.stringify(inter)+"' />";
      //  alert(JSON.stringify(intere));
       }
});
        var numItems = $('.scale').length
        
        if(numItems>6)
        {
    
    $('.disp').toggleClass(".hidden");
        }

/*       function contin(){

        var inter=[];
        for (i in intere) { if(intere[i]!=0){inter.push(i);} };
    $.ajax({
  type: "POST",
  url: "yourinterest",
  data: { interest: JSON.stringify(inter) }
}).done(function( data ) {
    alert(data);
  });

window.location="dashboard";
       }*/ 
  <?php for($i=0;$i<sizeof($inter);$i++){
    echo "$(\"#div".str_replace(' ','_',$inter[$i])."\").trigger(\"click\");\n";
  }?>
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