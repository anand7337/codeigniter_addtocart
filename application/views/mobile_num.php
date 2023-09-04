<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile_Number</title>
		<script src="<?= base_url()?>https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
	.send{
		color:green;
		font-size: 20px;
		margin-bottom: 20px;
	}
	#error{
		color:red;
		font-size: 20px;
		margin-bottom: 20px;
	}
	/* .success{
		color:green;
		display: none;
	} */
</style>
	</head>
<body>

<div id="verify">
<form action="" method="post">
	<input type="number" id="phone" name="number" placeholder="Mobile Number"><br><br>
	<!-- <input type="submit" name="submit" value="submit"> -->
	<div id="recaptcha-container"></div>
	<button type="button" onclick="phoneAuth();">Send Otp</button>
	<!-- <input type="submit"  value="submit" onclick="phoneAuth();"> -->
</form>
	</div>
<br><br><br><br>

<div class="send" id="success_message" style="display:none;">Check your mobile for the OTP</div>


<div id="sender" style="display: none;">
<form action="" method="post">
<input type="text" id="verificationCode" name="otp" placeholder="Enter verification code"> 
<button type="button" onclick="codeverify();">Verify OTP</button>
<a href="" onclick="phoneAuth();">Resend otp</a><br>
 <!-- <div class="success">verified</div> -->
<div id="error" style="display:none ;">OTP-ERROR</div> 
</form>
</div>


<script type="text/javascript">
window.onload = function() {
    render();
}
function render() {
	window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
	recaptchaVerifier.render();
}
    // var coderesult;
    function phoneAuth() {
    // get the number
    var number = document.getElementById('phone').value;
		console.log(number);
		var num="+91"+number;
    // alert(number);
    // it takes two parameter first one is number and second one is recaptcha
    firebase.auth().signInWithPhoneNumber(num, window.recaptchaVerifier).then(function(confirmationResult) {
        //s is in lowercase
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        // if( coderesult){
        // window.location.href="<?= base_url('regmain/otp_send_number')?>";
        // }
        console.log(coderesult);
				document.getElementById('verify').style.display='none';
        document.getElementById('sender').style.display='block';
				// $('#recaptcha-container').hide();
				$('#success_message').show();

        // alert("Message sent");
    }).catch(function(error) {
        alert(error.message);
    });
		            // var number = $("#phone").val();
                // firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                //     window.confirmationResult = confirmationResult;
                //     coderesult = confirmationResult;
                //     console.log(coderesult);
								// 		alert("Message sent");
                // }).catch(function (error) {
								// 	alert(error.message);
                // });
}


function codeverify() {
    var code = document.getElementById('verificationCode').value;
		console.log(code);
		var num=code;
    coderesult.confirm(num).then(function(result) {
			// document.getElementsByClassName('success').style.display="block";
			// document.getElementsByClassName('error').style.display="none";
        var user = result.user;
				if(user){
					window.location.href="<?= base_url('regmain/otp_send')?>";
          
				}
        console.log(user);
				
				// alert("Successfully registered");
    }).catch(function(error) {
        // alert(error.message);
				// alert("error");
			// 	document.getElementsByClassName('success').style.display="none";
			document.getElementById('error').style.display='block';
    });
}



</script>
<!-- <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
<!-- <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase.js"></script> -->
<script type="text/javascript">
  // Import the functions you need from the SDKs you need
  // import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-app.js";
  // import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
		apiKey: "AIzaSyDoR_fTzjOo8SdhxLOj0atSNnToesl0sqM",
  authDomain: "anand-2d47c.firebaseapp.com",
  projectId: "anand-2d47c",
  storageBucket: "anand-2d47c.appspot.com",
  messagingSenderId: "647267527547",
  appId: "1:647267527547:web:5f075ab799ac9af7c8abde",
  measurementId: "G-ZTSTDPLL6L"
  };
  // Initialize Firebase
	firebase.initializeApp(firebaseConfig);
     firebase.analytics();
	// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);
</script>
<!-- <script src="<?= base_url() ?>assets/script.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
