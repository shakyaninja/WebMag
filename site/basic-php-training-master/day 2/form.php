<!DOCTYPE html>
<html>
<head>
	<title>Form Handling</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>Form</h1>
				<form action="signup.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="name" placeholder=" Username" id="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="email" placeholder=" Email" id="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" placeholder=" Password" id="password" class="form-control">
					</div>
					<div class="form-group">
						<input type="radio" name="gender" id="username" value="male">
						<label for="">Male</label>
						<input type="radio" name="gender" id="username" value="female">
						<label for="">Female</label>
					</div>
					<div class="form-group">
						<label for="">Contact</label>
						<input type="number" name="contact" placeholder=" Contact" id="contact" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Image</label><br>
						<input type="file" name="image[]" accept="image/*" multiple="multiple">
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>