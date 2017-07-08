<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>MSDS ADMIN PANEL</title>

	<link rel="shortcut icon" href="{{ asset('img/pecahan/logo.png') }}">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" type="text/css" href="{{ asset('js/datetimepicker/jquery.datetimepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/msds.css') }}">

	
</head>
<body>

	@yield('content')

</body>
</html>