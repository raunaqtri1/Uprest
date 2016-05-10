<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
{!!Form::open(['url' => 'users'])!!}
<p>
{!!Form::label('Name')!!}
{!!Form::text('name')!!}
{{$errors->first('name')}}
</p>
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
{!!Form::label('Confirm Password')!!}
{!!Form::password('confpasswd')!!}
{{$errors->first('confpasswd')}}
</p>
<p>
{!!Form::submit('Register')!!}
</p>
</body>
</html>