
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'views/razorpay/Razorpay.php';

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Home extends CI_Controller {
	/**
	 * This function loads the registration form
	 */
	public function index()
	{
		$this->load->view('register');
	}

	/**
	 * This function creates order and loads the payment methods
	 */
	public function pay()
	{

        $_SESSION['payable_name'] = $this->input->post('name');
		$_SESSION['payable_email']  = $this->input->post('email');
		$_SESSION['payable_contact'] = $this->input->post('contact');
        $_SESSION['payable_address'] = $this->input->post('address');
		$_SESSION['payable_amount'] = $this->input->post('amount');
        
        $key_id='rzp_test_EQ3NN4h7zdh7hB';
	    $secret='0oT5oaWKyEzlZgM0kX1Sjloc'; 
        $api = new Api($key_id, $secret);

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' => 1 // auto capture
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount,$razorpayOrderId);

		$this->load->view('razorpayy',array('data' => $data));
	}

	/**
	 * This function verifies the payment,after successful payment
	 */
	public function verify()
	{
		$success = true;
		$error = "payment_failed";
        $key_id='rzp_test_EQ3NN4h7zdh7hB';
	    $secret='0oT5oaWKyEzlZgM0kX1Sjloc'; 
  
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api( $key_id,    $secret);
		try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);
				$pay=$api->utility->verifyPaymentSignature($attributes);
              
			}
             catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
			$this->setRegistrationData();
		}
		else {
			// redirect(base_url().'register/paymentFailed');
            // echo "Payment failed";
            $this->setFailed();
		}
	}

	/**
	 * This function preprares payment parameters
	 * @param $amount
	 * @param $razorpayOrderId
	 * @return array
	 */
	public function prepareData($amount,$razorpayOrderId)
   
	{
        $key_id='rzp_test_EQ3NN4h7zdh7hB';
        $secret='0oT5oaWKyEzlZgM0kX1Sjloc'; 
        $api = new Api($key_id, $secret);
		$data = array(
			"key" => $key_id,
			"amount" => $amount,
			"name" => "Coding Birds Online",
			"description" => "Learn To Code",
			"image" => "https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png",
			"prefill" => array(
				"name"  => $this->input->post('name'),
				"email"  => $this->input->post('email'),
				"contact" => $this->input->post('contact'),
			),
			"notes"  => array(
				"address"  => "Hello World",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#F37254"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	/**
	 * This function saves your form data to session,
	 * After successfull payment you can save it to database
	 */
	public function setRegistrationData()
	{




        
        extract($_POST);
		$name = $_SESSION['payable_name'];
		$email = 	$_SESSION['payable_email'] ;
		$contact = 	$_SESSION['payable_contact'];
        $address = 	$_SESSION['payable_address'];
		$amount = $_SESSION['payable_amount'];

		$registrationData = array(
			'order_id' => $_SESSION['razorpay_order_id'],
			'name' => $name,
			'email' => $email,
			'contact' => $contact,
            'address' => $address,
			'amount' => $amount,
            'status' => 'success',
		);
        echo "<pre>";
        print_r($registrationData);
		// save this to database
        // $this->load->model('Regmain_Model');
        // $result= $this->Regmain_Model->pay_check($registrationData);
        // if($result){
        //     redirect('/');
        // }

	}


 public function setFailed(){
    extract($_POST);
    $name = $_SESSION['payable_name'];
    $email = 	$_SESSION['payable_email'] ;
    $contact = 	$_SESSION['payable_contact'];
    $address = 	$_SESSION['payable_address'];
    $amount = $_SESSION['payable_amount'];

    $registrationData1 = array(
        'order_id' => $_SESSION['razorpay_order_id'],
        'name' => $name,
        'email' => $email,
        'contact' => $contact,
        'address' => $address,
        'amount' => $amount,
        'status' => 'failed',
    );
    // echo "<pre>";
    // print_r($registrationData1);
    	// save this to database
        $this->load->model('Regmain_Model');
        $result= $this->Regmain_Model->pay_check($registrationData1);
        if($result){
            redirect('/');
        }
 }


	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
	public function success()
	{
     

		$this->load->view('success');
	}
	/**
	 * This is a function called when payment failed,
	 * and shows the error message
	 */
	public function paymentFailed()
	{
		$this->load->view('error');
	}	
}


?>