<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display_Data</title>
	<link rel="stylesheet" href="<?php echo base_url()?>style.css">
 <!-- Icon Font Stylesheet -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<style>
.container{
	margin-top: 50px;
}
.fa{
	display: flex;
	margin: auto;
	align-items: center;
	
}
.cart-link{
  width: 100px;
  background-color:red !important;
}
	</style>

</head>

<body>



<?php
if(!empty($cart)){
  foreach($cart as $row1){
    ?>
<a href="">go to cart</a>
    <?php
  }
}else{
  ?>
  <a href="">add to cart</a>
  <?php
}

?>

       <br><br><br><br>

<a href="<?= base_url('regmain/login')  ?>">login</a><br>
<a href="<?=base_url('regmain/logout')?>">logout</a><br><br>
<?php
if($user=$this->session->userdata('user')){
  extract($user);
?>
<p>Name :<?=  $username ?></p>
<?php
}

?>
<!-- <?php
if($user_cart=$this->session->userdata('user')){
if(isset($data1)){
	?>
		<h3><i class="fa fa-shopping-cart"></i><span><?= $data1  ?></span></h3>
	<?php
}
}
?> -->
<?php
if($user=$this->session->userdata('user')){
extract($user);
?>

<a href="<?php  echo base_url('regmain/cart_view_id/') . $username?>" class="cart-link" title="view cart">

<span>
 <?php
if($user_cart=$this->session->userdata('user')){
if(!empty($data1)){
	?>
		<h3><i class="fa fa-shopping-cart"><?= $data1  ?></i><span></span></h3>
    <?php
}else{
  ?>
		<h3><i class="fa fa-shopping-cart"></i><span></span></h3>
  <?php
  
}
}
?>
</span>
</a>
<?php
}else{
  ?>
	<a href="<?php  echo base_url('regmain/cart_view_empty')?>">	<i class="fa fa-shopping-cart">empty</i></a>
  <?php
}
?>
    
<?php
              if(isset($data)){
				foreach($data as $row){
?>
                <div class="container">
                <div class="card">
				 <div><?= $row->title  ?></div>

				 <div><?= $row->description  ?></div>
				 <div><a href="<?=base_url('regmain/add_cart_single/') . $row->id  ?>"><img src="<?= base_url('upload/' .$row->file) ?>" alt="" width="150"  height="150"></a></div>
         <a href="<?php echo base_url('regmain/add_cart/').$row->id . "/" . $row->title?>">add to cart</a>
        </div>
				</div>
<?php 
				}
			}

?>
	</table>
 

</body>

</html>
