<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_Create</title>

	<link rel="stylesheet" href="<?= base_url('style.css')  ?>">

</head>

<body>

   <div class="container">
   
   <table cellspacing="30">
	<tr>
		<td><h1>Login Form</h1></td>
	</tr>
	<form action="<?= base_url('regmain/login_user')?>" method="post">
	
		<tr>
			<td>USERNAME:</td>
			<td><input type="text" name="username" required></td>
		</tr>
		<tr>
			<td>USERMAIL:</td>
			<td><input type="text" name="usermail" required></td>
		<tr>
			<td><input type="submit" name="submit" value="login"></td>
		</tr>
		<tr>
			<td>
				<a href="<?= base_url('regmain/index') ?>">File Upload</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="<?= base_url('regmain/forgot_pass') ?>">forgot password?</a>
			</td>
		</tr>

	</form>
   </table>

   </div>
</body>

</html>
