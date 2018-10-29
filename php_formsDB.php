<!DOCTYPE html>
<html>
<head>
<title>PHP Forms</title>
<link type='text/css' rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
</head>
<body>
<form action="php_form_processorDB.php" method="POST" enctype="multipart/form-data">
<label>Name:</label>

<input type="text" name="Fullname"><br>
<label>Email:</label>
<input type="email" name="Email"><br>
<label>Number:</label>
<input type="mobile" name="Number" placeholder="Include Country Code"><br>
<label>Gender:</label>
<input type="radio" value="M" name="gender"> male
<input type="radio" value="F" name="gender"> Female<br>
<label>Upload File:</label>
<input type="file" name="uploaded" required> <br>
<label>Your Message</label><br>
<textarea name ="Message" required></textarea><br>
<input type="submit" name= "submit" value="submit" class="btn btn-success">
<button type="reset" name ="reset" class="btn btn-danger">Reset</button>
</form>
</body>
