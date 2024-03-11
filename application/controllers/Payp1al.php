<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
        // ini_set('session.use_strict_mode', '0');
        // Load paypal library 
        $this->load->library('paypal_lib'); 
     } 
  
      function success(){ 
        $array = array(
            "token"=>$_GET["token"],
            );
        $this->db->select('*');
		$this->db->from('sessions_data');
		$this->db->where($array);
        $this->db->order_by('id',"desc")->limit(1);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 ){
        	$row = $query->row_array();
            $array = array(
                "id"=>$row["u_id"],
                );
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where($array);
            $query = $this->db->get();
            $row2 = $query->row_array();
        	$this->session->set_userdata("user_login",$row2);
        // Get the transaction data 
         if($_GET['PayerID'] !=""){
            $array3 = array(
                "status"=>'Paid',
                "payerid"=>$_GET['PayerID'],
                    );
            $this->db->where("id",$row["enroll_id"]);
            $query =  $this->db->update("event_enrolls", $array3);
            $this->db->where("token",$row["token"]);
            $this->db->update("sessions_data", $array3);
            $_SESSION["msg1"] = "Thank you For registration."; 

            redirect('events', 'refresh');
         }
         }
         	// print_r($_SESSION);
    } 
      
      
     function cancel(){ 
        // Load payment failed view 
        $this->db->where("id",$_SESSION["enroll_id"]);
        $this->db->delete("event_enrolls");
        $_SESSION["enroll_id"]="";
        $_SESSION["msg1"] = "Registration failed due to login";
        redirect('events', 'refresh');
     }  
     
}