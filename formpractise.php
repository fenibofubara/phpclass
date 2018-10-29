<!DOCTYPE html>
<html>
<head>
<label>Fill Form</label>
<link type = "text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<form method = "POST" action= "form_practise_processor.php">
<label>name:</label>
<input name=fullname type="text"><br>
<label>phone:</label>
<input name=phone type="mobile"><br>
<label>Email:</label>
<input name=email type="email"><br>
<label>Sex</label>
<input name="m" type="radio">male;
<input name="f" type="radio">female;<br>
<label>Message</label><br>
<textarea name="message" required></textarea><br>
<input type="reset" name="btn" value="RESET" class="btn btn-danger">
<button class="btn btn-success">SEND</button>
</form>
</body>
</html>


