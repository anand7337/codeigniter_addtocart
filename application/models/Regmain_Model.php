<?php

class Regmain_Model extends CI_Model{
	public function insertdata($data){
		$this->load->database();
		return $this->db->insert('ci3_file',$data);
	}

	public function fetchdata(){
		$this->load->database();
		return $this->db->get('ci3_file')->result();
	}
	
	public function fetchdata1($id){
		$this->load->database();
		$this->db->where('id',$id);
		return $this->db->get('ci3_file')->row_array();
	}
	
	public function get_edit($id){
		$this->load->database();
		$this->db->where('id',$id);
		return $this->db->get('ci3_file')->result();
	}
	
	public function fetchdata_signle_page($id){
		$this->load->database();
		$this->db->where('id', $id);
		return $this->db->get('ci3_file')->result();
	}
	
	public function update_data($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		return $this->db->update('ci3_file',$data);
	}
	
	public function delete_data($id){
		$this->load->database();
		$this->db->where('id',$id);
		return $this->db->delete('ci3_file');
	}
	public function delete_qty($id,$username){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->where('username',$username);
		return $this->db->delete('user_cart');
	}
	public function delete_qty_path($id){
        $this->load->database();
        $this->db->where('id',$id);
       return $this->db->get('user_cart')->row();
     }
	public function user($username,$usermail){
		$this->load->database();
		$result=$this->db->get_where('login_user', array('username'=>$username,'usermail'=>$usermail));
		return $result->row_array();
	}
	public function user_id($user){
		$this->load->database();
		$result=$this->db->get_where('user_cart',array('username'=>$user));
		return $result->row_array();
	}
	
	public function fetchdata_user(){
		$this->load->database();
		return $this->db->get('user_cart')->result();
	}
	public function fetchdata_user_id($username){
		$this->load->database();
		$this->db->where('username', $username);
		return $this->db->get('user_cart')->result();
	}
	
	public function fetchdata_user_cart($username,$id){
		$this->load->database();
		$this->db->where('username', $username);
		$this->db->where('pro_id', $id);
		return $this->db->get('user_cart')->result();
	}
	public function go_to_cart($username){
		$this->load->database();
		$this->db->where('username', $username);
		return $this->db->get('user_cart')->result();
	}
	public function fetchdata_count($username){
		$this->load->database();
		$this->db->where('username',$username);
		$q = $this->db->get('user_cart');
		$count=$q->result();
		return count($count);
	// return	$this->db->count_all("user_cart");
	}


	public function cart_goto($user01){
		$this->load->database();
		$this->db->where('username',$user1);
		$q = $this->db->get('user_cart');
		return $q->result();
		// return count($count);
	// return	$this->db->count_all("user_cart");
	}



public function edit_total($data1,$edit){
	$this->load->database();
	$this->db->where('id',$id);
	return $this->db->get('user_cart',$data1)->result();
}

 public function old_pass_match($id,$old_pass){
	$this->load->database();
	$query=$this->db->where('id',$id)->where('username',$old_pass)->get('login_user');
	if($query->num_rows() > 0){
		return true;
	}
	return false;
 }

 public function update_pass_change($id,$new_pass){
         $this->load->database();
		 $this->db->set('username',$new_pass)->where('id',$id)->update('login_user');
 }

// public function order_list_details($data){
//    $this->load->database();
//    return $this->db->insert('checkout_form',$data);
// }

public function order_list_details($data)
    {
        $this->db->insert('checkout_form', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
public function insert_order($order)
    {
        $this->db->insert('customer_order', $order);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
	public function insert_order_detail($order)
    {
        $this->db->insert('order_details', $order);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

     public function user_data($data_cart1){
	   $this->load->database();
	//    $this->db->where('username',$user1);
       return $this->db->insert('user_cart',$data_cart1);
                }
				
// public function user_data_update($datas){
// 	$this->load->database();
// 	return $this->db->update('user_cart',$datas);
// }
public function update_qty($data,$edit){
	$this->load->database();
	$this->db->where('id',$edit);
	return $this->db->update('user_cart',$data);
}

public function fetchdata_customer(){
	$this->load->database();
	return $this->db->get('checkout_form')->result();
}

public function pay_check($registrationData1){
	$this->load->database();
	return $this->db->insert('payment_02',$registrationData1);
}

public function verification($data){
	$this->load->database();
	return $this->db->insert('firebase',$data);
}
public function name_field($datass){
	$this->load->database();
	return $this->db->insert('payment_01',$datass);
}
}

?>
