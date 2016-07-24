<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
{{ 'hello from the other side' }}
@foreach ($users as $users)
{{ $user->name }}
@endforeach
</body>
</html>