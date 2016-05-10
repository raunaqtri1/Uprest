<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
{!!Form::open(['url' => 'login'])!!}
<p>
{!!Form::label('Email')!!}
{!!Form::email('email')!!}
{{$errors->first('email')}}
</p>
<p>
{!!Form::label('Password')!!}
{!!Form::password('passwd')!!}
{{$errors->first('passwd')}}
</p>
<p>
{!!Form::submit()!!}
</p>
</body>
</html>