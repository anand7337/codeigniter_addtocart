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
<?php
       if(isset($message)){
		echo "success";
	   }
	?>
	<?php
       if(isset($error)){
		echo "error";
	   }
	?>

   <div class="container">
   
   <table cellspacing="30">
	<tr>
		<td><h1>File Upload</h1></td>
	</tr>
	<form action="<?= base_url('regmain/change_password')?>" method="post">
		<tr>
			<td>old password:</td>
			<td><input type="text" name="old_pass" id="old_pass" required></td>
		</tr>
		<tr>
			<td>new password:</td>
			<td><input type="text" name="new_pass" id="new_pass" required></td>
         <tr>
			<td>confirm password:</td>
			<td><input type="text" name="confirm_pass" id="confirm_pass" required></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="submit"></td>
		</tr>
		<tr>
			<td>
				<a href="<?= base_url('regmain/login') ?>">Login</a>
			</td>
		</tr>
	</form>
   </table>

   </div>
</body>

</html>
