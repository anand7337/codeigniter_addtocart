<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display_Data</title>

	<style>

table,tr th, tr td{
	border: 1px solid black;
	border-collapse: collapse;
	padding: 20px;
	margin: auto;
}

	</style>

</head>

<body>

<?php

$user=$this->session->userdata('username');

?>
<h3>USERNAME : <?= $user ?></h3><br><br><br>
<a href="<?= base_url('regmain/logout')  ?>">Logout</a><br><br>
<a href="<?= base_url('regmain/forgot_pass') ?>">forgot_password?</a>
    <table>
		<tr>
			<th>ID</th>
			<th>TITLE</th>
			<th>DESCRIPTION</th>
			<th>IMAGES</th>
			<th>EDIT</th>
			<th>DELETE</th>
		</tr>
<?php

              if(isset($data)){
				foreach($data as $row){
?>
		 <tr>
                 <td><?= $row->id  ?></td>
				 <td><?= $row->title  ?></td>
				 <td><?= $row->description  ?></td>
				 <td><img src="<?= base_url('upload/' .$row->file) ?>" alt="" width="150"  height="150"></td>
				 <td><a href="<?= base_url('regmain/edit/')  .$row->id?>">Edit</a></td>
				 <td><a href="<?= base_url('regmain/delete/') .$row->id?>">Delete</a></td>
		 </tr>
<?php 
				}
			}

?>
	</table>
   

</body>

</html>
