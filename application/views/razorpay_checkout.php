





<div>Do not back.payment process...</div>
<button id="rzp-button1" style="display: none;">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>


// function MakePayment(){

// var name = $('#name').val();
// // var email = $('#email').val();
// // var mobile = $('#mobile').val();
// var amount = $('#amount').val();



// var options = {
//     "key": "rzp_test_EQ3NN4h7zdh7hB", // Enter the Key ID generated from the Dashboard
//     "amount":amount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
//     "currency": "INR",
//     "name": name, //your business name
//     "description": "Test Transaction",
//     "image": "<?= base_url() ?>upload/cart12.jpg",
//     "handler":function(response){
//         console.log(response);
//     }
	
   


// };
// var rzp1 = new Razorpay(options);
// document.getElementById('rzp-button1').onclick = function(e){
//     rzp1.open();
//     e.preventDefault();
// }

// document.getElementById('rzp-button1').click();



// }





var options = {
    "key": "<?php echo $key_id;?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $order['amount'] * 100;   ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Anand Razorpay", //your business name
    "description": "Test Transaction",
    "image": "<?= base_url() ?>upload/cart12.jpg",
    "order_id": "<?php echo $order['id'];   ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "<?= base_url('regmain/payment_success'); ?>",
	
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
		"name": "<?php echo $data['name'];?> ", //your customer's name
        "email": "<?php echo $data['email'];?>",
        "contact": "<?php echo $data['mobile'];?>" //Provide the customer's phone number for better conversion rates 
	
	},
    "notes": {
        "address": "yakobu business solutions"
    },
    "theme": {
        "color": "#3399cc"
    }


};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

document.getElementById('rzp-button1').click();
</script>
