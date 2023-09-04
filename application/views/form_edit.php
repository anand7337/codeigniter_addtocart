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
		<td><h1>File Update</h1></td>
	</tr>
	<?php
            if(isset($data)){
				
?>
	<form action="<?= base_url('regmain/update')?>" method="post" enctype="multipart/form-data">
	<tr>
			<td>Id:</td>
			<td><input type="hide" name="edid" required value="<?= $data[0]->id  ?>"></td>
		</tr>
	
		<tr>
			<td>Title:</td>
			<td><input type="text" name="edtitle" required value="<?= $data[0]->title  ?>"></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><input type="text" name="eddesc" required value="<?= $data[0]->description ?>"></td>
		</tr>
		<tr>
			<td>
				<img src="<?= base_url('upload/') .$data[0]->file ?>" alt="" width="100" height="100">
			</td>
		</tr>
         <tr>
			<td>File:</td>
			<td><input type="file" name="edfile" required value="<?= $data[0]->file   ?>"></td>
		</tr>

		<tr>
			<td><input type="submit" name="submit" value="update"></td>
		</tr>
	</form>
	<?php
			}

?>
   </table>

   </div>
</body>

</html>
