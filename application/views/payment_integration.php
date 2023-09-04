<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment-Integration</title>
</head>

<body>
<table cellspacing="30">
	<form action="<?= base_url('regmain/pay_checkout')  ?>" method="post">
	<tr>
		<td>
			<input type="text" name="name" placeholder="Name..." required>
		</td>
	</tr>
	<tr>
		<td>
			<input type="email" name="email" placeholder="emal..." required>
		</td>
		</tr>
		
		<tr>
		<td>
			<input type="number" name="mobile" placeholder="mobile..." required>
		</td>
		</tr>
		<tr>
		<td>
			<input type="number" name="pay_amount" placeholder="Enter Amount..." required>
		</td>
		
		</tr>
		<tr>
		<td>
			<input type="submit" value="Pay">
		</td>
	</tr>
	</form>
</table>
<form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LyFb24fMM9HLql" async> </script> </form>


</body>

</html>
