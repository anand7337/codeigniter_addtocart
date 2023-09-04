<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check-form</title>
	<style>
		.table{
			margin: auto;
			margin-top: 200px;
		}
	</style>
</head>

<body>

<?php





?>

<table cellspacing="30" class="table">

<form action="<?= base_url('regmain/register_item')  ?>" method="post">

<tr>
	<td>
		<input type="text" name="name" placeholder="Name" required>
	</td>
</tr>
<tr>
	<td>
		<input type="number" name="number" placeholder="Number" required>
	</td>
</tr>
<tr>
	<td>
		<input type="address" name="address" placeholder="Address" required>
	</td>
	</tr>
	<tr>
	<td>
		<input type="text" name="zipcode" placeholder="zip-code" required>
	</td>
	</tr>
	<tr>
	<td>
		<input type="submit" name="submit" value="order" required>
	</td>
</tr>

</form>
</table>






<table>
<thead>
	<tr>
		<th>ID</th>
		<th>QTY</th>
		<th>NAME</th>
		<th>PRICE</th>
		<th>IMAGE</th>
		<th>TOTAL</th>
		<th>DELETE</th>
	</tr>
</thead>
<?php

if($this->cart->total_items() > 0){
	foreach($cartItems as $row){
		?>
<tbody>
          <tr>
			<td>ID:<?= $row['id'] ?></td><br>
		 	<td> <form action="<?php echo base_url('regmain/cart'); ?>" method="post">
            <input type="number" name="qty" value="<?php echo $row['qty'] ?>"/>
            <input type="hidden" name="rowid" value="<?php echo $row['rowid'] ?>"/>
            <input type="submit" name="submit" value="Update"/>
            </form></td>
			<td><?= $row['name'] ?></td><br>
			<td><?= $row['price']  ?></td><br>
			<td><img src="<?= base_url('upload/' .$row['image']); ?>" alt="" width="150"  height="150"></td>

		    <td><?= $row['subtotal']  ?> </td>  
		     <td><a href="<?= base_url('regmain/cart_delete/' . $row['rowid'])  ?>" onclick="return confirm('are you sure?')">Delete</a></td>
		</tr>
		  </tbody>
		
		<?php
	}
}else {
	?>
   <h1>you cart is empty</h1>
	<?php
}
?>
  
</table>

<?php

if($this->cart->total_items() > 0){ ?>
 <h1>Total:      <?php echo 'RS : ' . $this->cart->total();  ?></h1>
<?php
}
?>





</body>

</html>
