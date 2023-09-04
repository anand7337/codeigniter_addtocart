

<?php
  require APPPATH.'views/razorpay/Razorpay.php';
  use Razorpay\Api\Api;
//   #[\ReturnTypeWillChange] 





class Regmain extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('cart');
		$this->load->helper('url');


		$this->load->model('Regmain_Model');
		$this->load->helper(array('form', 'url'));
	}
    public function index(){
		$this->load->model('Regmain_Model');
		$result['data']=$this->Regmain_Model->fetchdata();
		if($user_total=$this->session->userdata('user')){
			$username = $user_total['username'];
		$result['data1']=$this->Regmain_Model->fetchdata_count($username);
		}
		
		$this->load->view('home',$result);

	}
	public function register(){
        $this->load->view('form');
	}
	public function savedata(){
		extract($_POST);
		extract($_FILES);
		 $file_name=$_FILES['file']['name'];
		 $config = [
			'upload_path' => './upload/',
			'allowed_types'=>'png|jpg|jpeg|gif',
			'file_name' => $file_name,
		 ];
		 $this->load->library('upload',$config);
		 if(!$this->upload->do_upload('file')){
			$error=array('error' =>  $this->upload->display_errors());
			$this->load->view('form',$error);
		 }else{
			$file_data=$this->upload->data('file_name');
			$data=[
				'title'=>$title,
				'description'=>$desc,
				'file'=>$file_data,
			];
			$this->load->model('Regmain_Model');
			$result=$this->Regmain_Model->insertdata($data);
			if($result){
				redirect('regmain/register');
			}
		 }
	}
public function view_data(){
	if($this->session->userdata('user')){
	$this->load->model('Regmain_Model');
	$result['data']=$this->Regmain_Model->fetchdata();

	$this->load->view('display_data',$result);
	}else{
		redirect('/');
	}
}

public function edit($id){
$this->load->model('Regmain_Model');
$result['data']=$this->Regmain_Model->get_edit($id);
$this->load->view('form_edit',$result);	
}

public function update(){
	extract($_POST);
	if($_FILES['edfile']['name']){
		$new_name=$_FILES['edfile']['name'];
		$config = [
             'upload_path' => './upload/',
			 'allowed_types'=>'jpg|png|jpeg|gif',
			 'file_name'=>  $new_name,
		];
		$this->load->library('upload',$config);
		 if(!$this->upload->do_upload('edfile')){
			$error=array('errors' => $this->upload->display_errors());
			$this->load->view('form_edit',$error);
		 }else{
			$file_data=$this->upload->data('file_name');
			$id=$edid;
			$data=[
				'title' => $edtitle,
				'description'=>$eddesc,
				'file'=>$file_data,
			];
			$this->load->model('Regmain_Model');
			$result=$this->Regmain_Model->update_data($data,$id);
			if($result === true){
				redirect(base_url('regmain\view_data'));
			}
		 }
	}
}

public function delete($id){
$this->load->model('Regmain_Model');
if(file_exists('./upload/')){
	unlink('./upload/');
}
$result=$this->Regmain_Model->delete_data($id);
if($result === true){
	redirect(base_url('regmain\view_data'));
}
}

public function login(){
	$this->load->view('login');
}

public function login_user(){
	extract($_POST);
	$username=$this->input->post('username');
	$usermail=$this->input->post('usermail');
	$this->load->model('Regmain_Model');
	$result=$this->Regmain_Model->user($username,$usermail);
	if($result){
		// $result1=$this->Regmain_Model->user_id($username,$usermail);
		$this->session->set_userdata('user',$result);
		$this->session->set_flashdata('logged','Logged in successfully');
		redirect(base_url('regmain/index'));
	}else{
		echo "username and usermail incorrect";
	}
}

public function logout(){
	$result=$this->session->unset_userdata('user');
	// $result=$this->session->unset_userdata('username');
		$this->cart->destroy();
        redirect('/');
}

public function forgot_pass(){
	// if($this->session->has_userdata){
	$this->load->view('cp_form');
	// }
}

public function change_password(){
$old_pass=$this->input->post('old_pass');
$new_pass=$this->input->post('new_pass');
$confirm_pass=$this->input->post('confirm_pass');

if(strcmp($old_pass,$new_pass) == 0){
$message="New password should be a different password";
}else{
      $id=$this->session->userdata('id');
	  $this->load->model('Regmain_Model');
    if($this->Regmain_Model->old_pass_match($id,$old_pass)){
	   $this->Regmain_Model->update_pass_change($id,$new_pass);
	   $message ='password change successfully';
	}else{
		$error = "old password not match";
	}
}
$this->load->view('cp_form',array( 'message'=> $message, 'error' => $error));
}

public function add_cart($id){
	if($users=$this->session->userdata('user')){
	$this->load->model('Regmain_Model');
	$products=$this->Regmain_Model->fetchdata1($id);
	  $data = array(
	 	'id'      => $products['id'],
        'qty'     => 1,
        'price'   => 39.95,
        'name'    => $products['title'],
		'image'   => $products['file'],
		'username'=> $users['username'],
	    'usermail'=> $users['usermail'],
        // 'coupon'         => 'XMAS-50OFF',
		// 'subtotal'=>'subtotal'
	  );	
   $datas['mark']=$this->cart->insert($data);
   redirect('regmain/addtocart');

	}else{
		echo "Login";
	}
}

public function addtocart(){
	if($users=$this->session->userdata('user')){
		$user1 = $users['username'];
		$this->load->model('Regmain_Model');
		if($data_cart= $this->cart->contents()){
			foreach($data_cart as $row){
		$data_cart1 = array(
			'pro_id' => $row['id'],
			'qty' => $row['qty'],
			'price' => $row['price'],
			'name' => $row['name'],
			'image' => $row['image'],
            'username' => $row ['username'],
			'usermail' => $row['usermail'],
			'rowid' => $row['rowid'],
			'subtotal' => $row['subtotal'],
		);
	}
}
	   $datass['cartItems']=$this->Regmain_Model->user_data($data_cart1);
	   redirect('regmain/cart_view_id/'.$user1);		
	}else{
		redirect('/');
	}
 }


 public function cart_view_id($username){
	if($user_total=$this->session->userdata('user')){
	$this->load->model('Regmain_Model');
	$result['cartItems']=$this->Regmain_Model->fetchdata_user_id($username);
	$result['data1']=$this->Regmain_Model->fetchdata_count($username);
	$user = $user_total['username'];
	$cart_data=$this->load->view('cart_2',$result);
	
	}else{
		redirect('/');
	}
 }
 public function add_cart_single($id){
	if($user_total=$this->session->userdata('user')){
		$username=$user_total['username'];
		$this->load->model('Regmain_Model');
		$result['single']=$this->Regmain_Model->fetchdata_signle_page($id);
		$result['data1']=$this->Regmain_Model->fetchdata_count($username);
		$result['cart']=$this->Regmain_Model->fetchdata_user_cart($username,$id);	
		// echo "<pre>";
		// print_r($result);
		$this->load->view('single_page_cart',$result);

	}else{
		redirect('/');
	}
 }

 public function cart_view_empty(){
	$this->load->view('cart_empty');
 }

public function cart_price(){
	if($user_edit=$this->session->userdata('user')){
		extract($user_edit);
	extract($_POST);
	$rowid = $_POST['rowid'];
	$price = $_POST['price'];
	$amount = $price * $_POST['qty'];
	$qty = $_POST['qty'];
    $edid=$id;

	$data = array(
		'rowid' => $rowid,
		'price' => $price,
		'subtotal' => $amount,
		'qty' => $qty
		);
		$this->load->model('Regmain_Model');
		$update=$this->Regmain_Model->update_qty($data,$edid);
		$update1 = $this->cart->update($update);
		redirect('regmain/cart_view_id/'.$username);
	}else{
		redirect('/');
	}
}



 public function cart(){
	$update = 0;
	// Get cart item info
	$qty = $this->input->post('qty');
	$rowid = $this->input->post('rowid');
	
	// Update item in the cart
	if(!empty($rowid) && !empty($qty)){
		$data = array(
			'rowid' => $rowid,
			'qty'   => $qty,
		
		);
		// $this->Regmain_Model->update_qty($data);
		$update = $this->cart->update($data);
	}
	
	// Return response
	redirect('regmain/cart_view');
 }

// public function cart_edit(){
// 	$update = 0;
// 	// Get cart item info
// 	$qty = $this->input->post('qty');
// 	$rowid = $this->input->post('rowid');
	
// 	// Update item in the cart
// 	if(!empty($rowid) && !empty($qty)){
// 		$data = array(
// 			'rowid' => $rowid,
// 			'qty'   => $qty,
// 		);
// 		$this->load->model('Regmain_Model');
// 		$update=$this->Regmain_Model->update_qty($data);
// 		$update1 = $this->cart->update($update);
// 	}
	
// 	// Return response
// 	redirect('regmain/cart_view');
// }

public function cart_delete($rowid){
	$this->cart->remove($rowid);
	redirect('regmain/addtocart');
}

public function checkout(){
	$this->load->view('check_form');
	// $data=array();
	// $data['cartItems']= $this->cart->contents();
	// echo "<pre>";
	// print_r($data); die;
}

public function checkout_page(){
	$this->load->view('checkout_page');
}
public function register_item(){
	extract($_POST);
	$data = [
		'name'=>$name,
		'number'=>$number,
		'address'=>$address,
		'zipcode'=>$zipcode, 
	];
	$result=$this->Regmain_Model->order_list_details($data);
	$order = array(
		'data' => date('Y-m-d'),
		'customer_id' => $result
		);
		$ord_id = $this->Regmain_Model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
			$order_detail = array(
			'orderid' => $ord_id,
			'productid' => $item['name'],
			'quantity' => $item['qty'],
			'price' => $item['image']
			);
		
			// Insert product imformation with order detail, store in cart also store in database.
		
			$cust_id = $this->Regmain_Model->insert_order_detail($order_detail);
			endforeach;
			endif;
		
			$this->cart->destroy();
//   $this->load->view('checkout_page');
     redirect(base_url('regmain/order_fetch'));
	// if($cust_id === true){
	// 	redirect('regmain/checkout_page');
	// }
}
public function check_out_card(){
	$data=array();
	$data['cartItems']= $this->cart->contents();
	// echo "<pre>";
	// print_r($data); die;
	$result=$this->load->view('check_form',$data);
 }

 public function order_fetch(){
	$this->load->model('Regmain_Model');
	$result['data']=$this->Regmain_Model->fetchdata_customer();
	$this->load->view('order_fetch_data',$result);
 }
 
public function payment(){
	$this->load->view('payment_integration');
}

public function pay_checkout(){
	
	extract($_POST);
	$key_id='rzp_test_EZp9OjjSutcozz';
	$secret='rV6h6TwWlRfXLcMSpRelDOf7'; 
	$data =[
		'name'=>$name,
		'email'=>$email,
		'mobile'=>$mobile,
		'amount'=>$pay_amount,
	];
	// $name=$this->input->post('name');
	// $pay_amount=$this->input->post('pay_amount');
	// $name=$this->input->post('name');
	// $status=$this->input->post('status');
	$api = new Api($key_id, $secret);
     $order=$api->order->create([
	 'receipt' => '123',
	 'amount' => $pay_amount * 100, 
	 'currency' => 'INR', 
	]);
	// echo "<pre>";
	// print_r($order);
    //  $this->load->model('Regmain_Model');
	//  $this->Regmain_Model->pay_check($order);
	 $succes=$this->load->view('razorpay_checkout', ['order' => $order,'key_id'=>$key_id,'secret'=>$secret,'data'=>$data]);
	}

public function payment_success(){
	extract($_POST);
	print_r($_POST);
	$razorpay_payment_id = $this->input->post ('razorpay_payment_id');
	$razorpay_order_id = $this->input->post ('razorpay_order_id');
	$razorpay_signature =$this->input->post ('razorpay_signature');
	$key_id='rzp_test_EZp9OjjSutcozz';
	$secret='rV6h6TwWlRfXLcMSpRelDOf7'; 
	$api = new Api($key_id, $secret);
     $pay=$api->payment->fetch($razorpay_payment_id);	
echo "<pre>";
print_r($pay);
                        
	// if($pay){
	// 	$data1= [
	// 	// 'payment_id' => $pay['id'],
	// 	// 'name'=> 'anand',
	// 	'name'=> $pay['name'],
	// 	'email' => $pay['email'],
	// 	'amount' => $pay['amount']/100,
	// 	'status' => $pay['status'],
	// 	'bank_name'=>$pay['bank'],
	// 	'order_id'=>$pay['order_id'],
	// 	'response_msg'=>$pay['description'],
	// 	'pay_number'=>$pay['contact'],
	// 	// 'hold_funds'=> true,
	// 	// 'captured' =>$pay['captured'],
	// 	// 'currency'=>$pay['currency'],
	// 	// "prefill"           => [
	// 	// 	// "name"              => $pay['name'],
	// 	// 	"email"             => $pay['email'],
	// 	// 	"contact"           => $pay['contact'],
	// 	// 	],
		
	// 	];
    //     echo "<pre>";
	// 	print_r($data1);
	// // 	  $this->load->model('Regmain_Model');
	// //     $result= $this->Regmain_Model->pay_check($data1);
	// // if($result){
	// // 	redirect(base_url('regmaimn/payment'));
	// // }
	// }else{
	// 	$data= [
	// 		'payment_id' => $pay['id'],
	// 	'amount' => $pay['amount']/100,
	// 	'status' => $pay['status'],
	// 	'bank_name'=>$pay['bank'],
	// 	'order_id'=>$pay['order_id'],
	// 	'response_msg'=>$pay['description'],
	// 	'contact'=>$pay['contact'],
	// 	'email' => $pay['email'],
	// 	'hold_funds'=> true,
	// 	"holder_name"=>$pay[ "name"],
	// 	'captured' =>$pay['captured'],
	// 	'currency'=>$pay['currency'],
	// 		];
	// }
	// // $razorpay_status =$this->input->post ('razorpay_status');
	// // $secret='0oT5oaWKyEzlZgM0kX1Sjloc'; 
	// // redirect(base_url('regmain/payment'));
}

public function number(){
	$this->load->view('mobile_num');
}
public function otp_send(){
	extract($_POST);
	$num  = $this->input->post('number');
	$ot = $this->input->post('otp');

	if($ot == true){
		$num  = $this->input->post('number');
		echo "<pre>";
		print_r($num);
	}else{
		echo "error";
	}
	// $data= [
    //      'mobile' => $number,
	// ];
// $this->load->model('Regmain_Model');
// $result=$this->Regmain_Model->verification($data);
// echo "<pre>";
// print_r($_POST);

$this->load->view('success_otp');
}

public function delete_cart($id,$username){	
	$this->load->model('Regmain_Model');
	$result=$this->Regmain_Model->delete_qty($id,$username);
	if($user_delete=$this->session->userdata('user')){
		extract($user_delete);
	redirect('regmain/cart_view_id/'.$username);
	}else{
		redirect('/');
	}
}

}
?>
