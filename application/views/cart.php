<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-To-Cart</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<style>
		table, tr th, tr td{
			border: 1px solid black;
			border-collapse: collapse;
		} 
		body{
			margin: ;
		}
		
		
	</style>
	<!-- <script>
		function updateCartItem(obj,rowid){
			$.get("<?=  base_url('regmain/updatqty/');?>",{rowid:rowid,qty:obj.value},function(resp)){
				if(resp == 'ok'){
					location.reload();
				}else{
					alert('cannot update');
				}
			}
		}
	</script> -->
</head>

<body>

<?php
if($user=$this->session->userdata('user')){
	extract($user);
?>
<h4><?=  $username  ?></h4>

<a href="<?= base_url()  ?>">Home Page</a>
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

<a href="<?=base_url('regmain/logout')?>">logout</a><br><br>


<?php

if($this->cart->total_items() > 0){
	foreach($cartItems as $row){
		?>
<tbody>
          <tr>
			<td>ID:<?= $row['id'] ?></td><br>
		 	<td> <form action="<?php echo base_url('regmain/cart'); ?>" method="post">
            <!-- <input type="number" name="qty" value="<?php echo $row['qty'] ?>"/>
            <input type="hidden" name="rowid" value="<?php echo $row['rowid'] ?>"/>
            <input type="submit" name="submit" value="Update"/> -->
			<div class="qty-container">
		        <button class="qty-btn-minus btn-light"  type="submit" name="submit" value="Update">-</button>
		    	<input type="text" name="qty" value="<?php echo $row['qty'] ?>" class="input-qty"/>
		        <input type="hidden" name="rowid" value="<?php echo $row['rowid'] ?>"/>
				<button class="qty-btn-plus btn-light"  type="submit" name="submit" value="Update">+</i></button>
		    </div>
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

 <a href="<?= base_url('regmain/check_out_card')?>"> checkout</a>
<?php
}
?>

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


<?php

}
?>
</body>
</html>
