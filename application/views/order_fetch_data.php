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


    <table>
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>NUMBER</th>
			<th>ADDRESS</th>
			<th>ZIPCODE</th>
					</tr>
<?php

              if(isset($data)){
				foreach($data as $row){
?>
		 <tr>
		        <td><?= $row->id  ?></td>
                 <td><?= $row->name  ?></td>
				 <td><?= $row->number  ?></td>
				 <td><?= $row->address ?></td>
				<td><?= $row->zipcode  ?></td>
		 </tr>
<?php 
				}
			}
?>
	</table>
   

</body>
</html>
