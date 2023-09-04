<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-To-Cart</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<style>
		table, tr th, tr td{
			border: 1px solid black;
			border-collapse: collapse;
		} 
		body{
			margin: ;
		}
	</style>
</head>

<body>
<?php
if($user_cart=$this->session->userdata('user')){
if(isset($data1)){
	?>
		<h3><i class="fa fa-shopping-cart"></i><span><?= $data1  ?></span></h3>
	<?php
}
}
?>
<?php

if($user_cart=$this->session->userdata('user')){
	extract($user_cart);
?>
<a href="<?=base_url('regmain/logout')?>">logout</a><br><br>
<h1><?=  $username ?></h1>

<?php
}else{
	echo "cart is empty";
}
?>

<?php
if(!empty(($cartItems))){
?>
<table>
	<thead>
	<tr>
		<th>ID</th>
		<th>QTY</th>
		<th>NAME</th>
		<th>IMAGE</th>
		<th>PRICE</th>
		<th>TOTAL</th>
		<th>DELETE</th>
	</tr>
	</thead>
					<?php
					foreach($cartItems as $row){
	?>
	<tbody>
		<tr>
			<td><?= $row->id  ?></td>
			<td>
			<form action="<?php echo base_url('regmain/cart_price') ?>" method="post">
			<div class="qty-container">
		        <button class="qty-btn-minus btn-light"  type="submit" name="submit" value="Update">-</button>
		    	 <input type="text" name="id" hidden value="<?= $row->id  ?>">
				<input type="text" name="qty" value="<?= $row->qty ?>" class="input-qty"/>
		        <input type="hidden" name="rowid" value="<?= $row->rowid ?>"/>
				<button class="qty-btn-plus btn-light"  type="submit" name="submit" value="Update">+</i></button>
		    </div>
			<td><input type="text" name="price" value="<?= $row->price  ?>"></td><br>
			<td> <input type="text" class="txt" class="subtotal" name="subtotal" value="<?= $row->subtotal  ?>"> </td>  
			<td class="total">INR <span class="subtotal subtotal<?=  $row->rowid ?>"><?= $row->subtotal  ?></span></td>
		</form>	
			<td><?= $row->name ?></td><br>		
			<td><img src="<?= base_url('upload/' .$row->image); ?>" alt="" width="150"  height="150"></td>
			 <!-- <form action="<?= base_url('regmain/cart_price')?>">
			</form> -->
			<td><a href="<?=  base_url('regmain/delete_cart/') . $row->id . "/" .$username  ?>">Delete</a></td>
		</td>
		</tr>
	</tbody>
	<?php
				}
	?>
     </table>
             <center>
              <tr class="item">
                  <td class="thumb" colspan="4" align="right">&nbsp;</td>
                  <td class="">Total :  <span class="grandtotal">0 </span> INR </td>
                  <td>&nbsp;</td>
                </tr> 
				</center>
				<?php
}
else{
	redirect(base_url('regmain/cart_view_empty'));
}
?>
<script>
	var total = 0;
$('.subtotal').each(function(){
    total += parseInt($(this).text());
    $('.grandtotal').text(total);
});

</script>

<script>
	var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  $n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount-1);
  }
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>
