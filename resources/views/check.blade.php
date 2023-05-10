<!DOCTYPE html>
<html>
<head>
	<title>Example HTML Page Encoded in PHP Blade File</title>
</head>
<body>
    <h1>This is a heads up text available </h1>
	<form method="POST" style="column-gap:20px;display:flex;">
		@csrf
		<label for="date-from">Date From:</label>
		<input type="date" id="date-from" name="date-from">

		<label for="time-from">Time From:</label>
		<input type="time" id="time-from" name="time-from">

		<label for="date-to">Date To:</label>
		<input type="date" id="date-to" name="date-to">

		<label for="time-to">Time To:</label>
		<input type="time" id="time-to" name="time-to">

		<button type="submit">Submit</button>
	</form>
</body>
</html>
