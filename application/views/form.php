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
		<td><h1>File Upload</h1></td>
	</tr>
	<form action="<?= base_url('regmain/savedata')?>" method="post" enctype="multipart/form-data">
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" required></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><input type="text" name="desc" required></td>
		
         <tr>
			<td>File:</td>
			<td><input type="file" name="file" required></td>
		</tr>

		<tr>
			<td><input type="submit" name="submit" value="create"></td>
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
