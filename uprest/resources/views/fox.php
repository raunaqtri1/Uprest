<html>
<head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<form action="sdsd.php" method="get">
<input type="text" id="autosearch" name="autosearch"/>
<input type="button" value="submit" name="submit"/>
</form>
<div id="log"></div>
<script>
$( "#autosearch" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "http://localhost/laravel/public/api/autocomplete",
          dataType: "json",
          data: {
            input: request.term
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
</body>
</html>