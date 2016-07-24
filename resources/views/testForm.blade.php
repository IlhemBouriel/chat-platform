<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="{{ URL::to('test') }}">
	<input type="text" name="val">
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <input type="submit" value="valider">
</form>
</body>
</html>