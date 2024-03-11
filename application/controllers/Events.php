<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct() {
        parent::__construct();
		
        // Load paypal library 
        $this->load->library('paypal_lib'); 
        // $this->session->set_userdata("is_login","1");
		if(isset($_SESSION["user_login"])){
			//redirect('dashboard', 'refresh');
		}
		else{
			redirect('login', 'refresh');
		}
		//
    }
    public function create(){
    		$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('includes/navbar');

			$this->load->view('events_add');
			$this->load->view('includes/footer');
    }
	
	public function status(){
		$insertid = $_POST["id"];
		$array = array(
			"event_status"=>$_POST["value"],
			);
		// print_r($_POST);
		// die();
		
		$this->db->where('id', $insertid);
    	$query = $this->db->update("events", $array);
		if ($query) {
			print("success");
		}else {
			print("error");
		}
	}
    public function event_process(){
		// echo "<pre> ";
		// print_r($_POST);
		// die;
    	$array = array(
    			"event_name"=>$_POST["title"],
    			"event_description"=>$_POST["event_description"],
    			"instruction"=>$_POST["instruction"],
    			"order_no"=>$_POST["order_no"],
    			"event_status"=>1,
				"name_creator"=>$_POST["name_creator"],
    			"created_at"=>date('Y-m-d H:i:s'),
    			);
				if (isset($_POST['health'])) { 	$array["health"]=0;}
			if (isset($_POST['emergency'])) { 	$array["emergency"]=0;}
			if (isset($_POST['academic'])) { 	$array["academic"]=0;}
			if (isset($_POST['presentation'])) { 	$array["presentation"]=0;}
			if (isset($_POST['meals'])) { 	$array["meals"]=0;}
			if (isset($_POST['event_fess'])) { 	$array["event_fee"]=0;}
			if (isset($_POST['hotel'])) { 	$array["hotel"]=0; }
			if (isset($_POST['inquired'])) { 	$array["inquired"]=0; }
			if (isset($_POST['policy'])) { 	$array["policy"]=$_POST["policy"];}
		if (isset($_FILES['image'])&& $_FILES['image']["name"]!='')
		{
			$path_folder = 'assets/images/event';
		$file_ext2 = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
		$newname = date('YmdHis')."_".'image.'.$file_ext2;
		$image_new=fileuploadCI('image',$path_folder,$newname);
		$array["image"]=$path_folder.'/'.$newname;
		} 
		$query = $this->db->insert("events",$array);
		if($query){
			$insert_id = $this->db->insert_id();

			if (isset($_POST['event_fess'])) { 	 
				if (isset($_POST['event_fess'])) { 
					foreach($_POST['fee_name'] as $key=>$value){
						$array2 = array(
							"fees_name"=>$value,
							"amount"=>$_POST['fee_amount'][$key],
							"event_id"=>$insert_id
								);
						 $this->db->insert("event_fees",$array2);
					}
				}
			}
			if (isset($_POST['inquired'])) { 	 
				if (isset($_POST['questions'])) { 
					foreach($_POST['questions'] as $key4=>$value5){
						$array5 = array(
							"question"=>$value5,
							"event_id"=>$insert_id
								);
						$this->db->insert("questions",$array5);
					}
				}
			}
			if (isset($_POST['hotel'])) {  
			
				if (isset($_POST['bed_name'])) { 
					foreach($_POST['bed_name'] as $key1=>$value1){
						$array3 = array(
							"name"=>$value1,
							"price"=>$_POST['bed_price'][$key1],
							"tax"=>$_POST['bed_tax'][$key1],
							"totalprice"=>$_POST['bed_totalprice'][$key1],
							"event_id"=>$insert_id
								);
						$this->db->insert("bed_setup",$array3);
					}
				}
				if (isset($_POST['meals'])) { 	 
					if (isset($_POST['m_name'])) { 
						foreach($_POST['m_name'] as $key4=>$value4){
							$array4 = array(
								"name"=>$value4,
								"price"=>$_POST['m_price'][$key4],
								"tax"=>$_POST['m_tax'][$key4],
								"totalprice"=>$_POST['m_totalprice'][$key4],
								"event_id"=>$insert_id
									);
							$this->db->insert("meals_setup",$array4);
						}
					}
				}
				
			}
			
			
			// echo "<pre> ";
			// print_r($_POST);
			// die;
			
			redirect('events', 'refresh');
		}
		else{
			echo "Insert Failed";
		}
    }
	public function index()
	{
		$roleid = $_SESSION["user_login"]["roleid"];
		if($roleid==2){
			$this->load->view('events');
		}
		else{
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('includes/navbar');

			$this->load->view('dashboard');
			$this->load->view('includes/footer');

		}
	}
	public function edit_event($slug=null){
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('includes/navbar');

			// event data
			$array = array("id"=>$slug);
			$this->db->select('*');
			$this->db->from('events');
			$this->db->where($array);
			$query = $this->db->get();
			$row = $query->result_array();
			$data["events"] = $row;

			// questions data
			$array = array("event_id"=>$slug);
			$this->db->select('*');
			$this->db->from('questions');
			$this->db->where($array);
			$query = $this->db->get();
			$row = $query->result_array();
			$data["questions"] = $row;

			// event data
			$array = array("event_id"=>$slug);
			$this->db->select('*');
			$this->db->from('event_fees');
			$this->db->where($array);
			$query = $this->db->get();
			$row = $query->result_array();
			$data["events_fees"] = $row;

			// hotel bed data
			$array = array("event_id"=>$slug);
			$this->db->select('*');
			$this->db->from('bed_setup');
			$this->db->where($array);
			$query = $this->db->get();
			$row = $query->result_array();
			$data["bed_setup"] = $row;

			// meals  data
			$array = array("event_id"=>$slug);
			$this->db->select('*');
			$this->db->from('meals_setup');
			$this->db->where($array);
			$query = $this->db->get();
			$row = $query->result_array();
			$data["meals_setup"] = $row;

			$this->load->view('events_edit',$data);
			$this->load->view('includes/footer');
	}
	// view enroll
	public function event_enroll_view($slug=null){
		// asdss
		$array1 = array("id"=>$slug);
		$this->db->select('*');
		$this->db->from('event_enrolls');
		$this->db->where($array1);
		$query = $this->db->get();
		$row1 = $query->result_array();
		$data["enrolled"] = $row1;
		$slug=$row1[0]['event_id'];
		$array2 = array("id"=>$slug);
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where($array2);
		$query = $this->db->get();
		$row2 = $query->result_array();
		$data["events"] = $row2;
		$array3 = array("event_id"=>$slug);
		$this->db->select('*');
		$this->db->from('event_fees');
		$this->db->where($array3);
		$query = $this->db->get();
		$row3 = $query->result_array();
		$data["events_fees"] = $row3;
		$this->load->view('includes/navbar_athlete',$data);
		$this->load->view('event_enroll_view',$data);
		$this->load->view('includes/footer');
}

	public function event_enroll_edit($slug=null){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');
		$array1 = array("id"=>$slug);
		$this->db->select('*');
		$this->db->from('event_enrolls');
		$this->db->where($array1);
		$query = $this->db->get();
		$row1 = $query->result_array();
		$data["enrolled"] = $row1;
		$slug=$row1[0]['event_id'];
		$array2 = array("id"=>$slug);
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where($array2);
		$query = $this->db->get();
		$row2 = $query->result_array();
		$data["events"] = $row2;
		$array3 = array("event_id"=>$slug);
		$this->db->select('*');
		$this->db->from('event_fees');
		$this->db->where($array3);
		$query = $this->db->get();
		$row3 = $query->result_array();
		$data["events_fees"] = $row3;
		$this->load->view('event_enroll_edit',$data);
		
		
		// $this->load->view('event_enroll_edit',$data);
		// $this->load->view('includes/footer');
}
	public function wevier_accept(){
			$user_id=$_SESSION["user_login"]["id"];
			$array = array("wiever_accpt"=>1);
			$id = array("id"=>$user_id);
			$this->db->where($id);
			$this->db->update("users", $array);
			$_SESSION["user_login"]["wiever_accpt"] =1;
			$_SESSION["msg"] = "Accepted";
			redirect('events', 'refresh');
		
	}
	public function edit_event_process(){
// echo "<pre> ";
// 		print_r($_POST);
// 		die;

		$array = array(
			"event_name"=>$_POST["title"],
			"event_description"=>$_POST["event_description"],
			"name_creator"=>$_POST["name_creator"],
			"instruction"=>$_POST["instruction"],
			"order_no"=>$_POST["order_no"],
    			"created_at"=>date('Y-m-d H:i:s'),
			);
			if (isset($_POST['health'])) { 	$array["health"]=0;}else{$array["health"]=1;}
			if (isset($_POST['emergency'])) { 	$array["emergency"]=0;}else{$array["emergency"]=1;}
			if (isset($_POST['academic'])) { 	$array["academic"]=0;}else{$array["academic"]=1;}
			if (isset($_POST['presentation'])) { 	$array["presentation"]=0;}else{$array["presentation"]=1;}
			if (isset($_POST['hotel'])) { 	$array["hotel"]=0; }else{ $array["hotel"]=1; }
			if(isset($_POST['policy'])) { $array["policy"]=$_POST["policy"];}
			if (isset($_POST['inquired'])) { 	$array["inquired"]=0; }else{ $array["inquired"]=1; }
			if (isset($_FILES['image'])&& $_FILES['image']["name"]!='')
			{
			$path_folder = 'assets/images/event';
			$file_ext2 = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
			$newname = date('YmdHis')."_".'image.'.$file_ext2;
			$image_new=fileuploadCI('image',$path_folder,$newname);
			$array["image"]=$path_folder.'/'.$newname;
			} 
			$insertid = $_POST["event_id"];
			$insert_id = $_POST["event_id"];
			$this->db->where('id', $insertid);
			$this->db->update("events", $array);

			if (isset($_POST['event_fess'])) { 	 
				if (isset($_POST['fee_name'])) { 
					foreach($_POST['fee_name'] as $key=>$value){
						$array2 = array(
							"fees_name"=>$value,
							"amount"=>$_POST['fee_amount'][$key],
							"event_id"=>$insert_id
								);
						$this->db->insert("event_fees",$array2);
					}
				}
				if (isset($_POST['fee_name_edit'])) { 
					foreach($_POST['fee_name_edit'] as $key5=>$value5){
						$array5 = array(
							"fees_name"=>$value5,
							"amount"=>$_POST['fee_amount_edit'][$key5],
								);
								$this->db->where('id', $key5);
								$this->db->update("event_fees", $array5);
					}
				}
			}
			if (isset($_POST['inquired'])) { 	 
				if (isset($_POST['questions'])) { 
					foreach($_POST['questions'] as $key4=>$value5){
						$array5 = array(
							"question"=>$value5,
							"event_id"=>$insert_id
								);
						$this->db->insert("questions",$array5);
					}
				}
				if (isset($_POST['questions_edit'])) { 
					foreach($_POST['questions_edit'] as $key10=>$value10){
						$array10 = array(
							"question"=>$value10,
								);
							$this->db->where('id', $key10);
							$this->db->update("questions", $array10);
					}
				}
			}
		if (isset($_POST['hotel'])) {  
		
			if (isset($_POST['bed_name'])) { 
				foreach($_POST['bed_name'] as $key1=>$value1){
					$array3 = array(
						"name"=>$value1,
						"price"=>$_POST['bed_price'][$key1],
						"tax"=>$_POST['bed_tax'][$key1],
						"totalprice"=>$_POST['bed_totalprice'][$key1],
						"event_id"=>$insert_id
							);
					$this->db->insert("bed_setup",$array3);
				}
				if (isset($_POST['bed_name_edit'])) { 
					foreach($_POST['bed_name_edit'] as $key7=>$value7){
						$array7 = array(
							"name"=>$value7,
							"price"=>$_POST['bed_price_edit'][$key7],
							"tax"=>$_POST['bed_tax_edit'][$key7],
							"totalprice"=>$_POST['bed_totalprice_edit'][$key7],
								);
							$this->db->where('id', $key7);
							$this->db->update("bed_setup", $array7);
					}
				}
			}
			if (isset($_POST['meals'])) { 	 
				if (isset($_POST['m_name'])) { 
					foreach($_POST['m_name'] as $key4=>$value4){
						$array4 = array(
							"name"=>$value4,
							"price"=>$_POST['m_price'][$key4],
							"tax"=>$_POST['m_tax'][$key4],
							"totalprice"=>$_POST['m_totalprice'][$key4],
							"event_id"=>$insert_id
								);
						$this->db->insert("meals_setup",$array4);
					}
				}
				if (isset($_POST['m_name_edit'])) { 
					foreach($_POST['m_name_edit'] as $key8=>$value8){
						$array8 = array(
							"name"=>$value8,
							"price"=>$_POST['m_price_edit'][$key8],
							"tax"=>$_POST['m_tax_edit'][$key8],
							"totalprice"=>$_POST['m_totalprice_edit'][$key8],
								);
							$this->db->where('id', $key8);
							$this->db->update("meals_setup", $array8);
					}
				}
				
			}
		}

		redirect('events', 'refresh');
	}
	public function remove_bed(){
		$this -> db -> where('id', $_POST['id']);
		$query	= $this -> db -> delete('bed_setup');
		if($query){
			echo "true";
		}
	}
	public function remove_meal(){
		$this -> db -> where('id', $_POST['id']);
		$query	= $this -> db -> delete('meals_setup');
		if($query){
		echo "true";
		}
	}
	public function remove_question(){
		$this -> db -> where('id', $_POST['id']);
		$query	= $this -> db -> delete('questions');
		if($query){
		echo "true";
		}
	}
	public function event_enroll_del($slug=null){
		// dd($slug);
		$this -> db -> where('id', $slug);
		$query	= $this -> db -> delete('event_enrolls');
		redirect('participate', 'refresh');
	}
	// event participate
	public function delete_event($slug=null){
		// event  delete
			$this -> db -> where('id', $slug);
   		 	$this -> db -> delete('events');
		// event enroll delete
			$this -> db -> where('event_id', $slug);
   		 	$this -> db -> delete('event_enrolls');
		// event enroll person delete
				$array = array("event_id"=>$slug);
				$this->db->select('id');
				$this->db->from('room_add_enroll');
				$this->db->where($array);
				$query = $this->db->get();
				$row2 = $query->result_array();
				foreach($row2 as $key=>$value){
					$this -> db -> where('room_id', $row2[$key]["id"]);
   		 	$this -> db -> delete('room_person');
				}	
// event enroll room delete
				$this -> db -> where('event_id', $slug);
   		 	$this -> db -> delete('room_add_enroll');
// event fees delete
				$this -> db -> where('event_id	', $slug);
   		 	$this -> db -> delete('event_fees');
				// $_SESSION["messages"] = "Successfully"; 
				redirect('events', 'refresh');
	}
	public function events(){
		$roleid = $_SESSION["user_login"]["roleid"];
		if (isset($_SESSION["enroll_id"])) {
			$this->db->where("id",$_SESSION["enroll_id"]);
        $this->db->delete("event_enrolls");
		}
		if($roleid==2){
			$this->load->view('includes/navbar_athlete');
			$this->db->select('*');
			$this->db->from('events');
			$this->db->order_by("order_no", "ASC");
			$this->db->where('event_status', 1);
			$query = $this->db->get();
			$row = $query->result_array();
			$data["events"] = $row;
			$this->load->view('user_events',$data);
			$this->load->view('includes/footer');
		}
		else{
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('includes/navbar');
			$this->db->select('*');
			$this->db->from('events');
			$this->db->order_by("order_no", "ASC");
			$query = $this->db->get();
			$row = $query->result_array();
			$data["events"] = $row;
			$this->load->view('event_view',$data);
			$this->load->view('includes/footer');
			
		}
	}
	public function password_change(){
		// if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="") {
		
		$user_id=$_SESSION["user_login"]["id"];
		$array = array("id"=>$user_id,"password"=>$_POST['old_password']);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($array);
		$query = $this->db->get();
		$row = $query->result_array();
		if(!empty($row)){
			$array = array("password"=>$_POST['password']);
			$id = array("id"=>$user_id);
			$this->db->where($id);
			$this->db->update("users", $array);
			$_SESSION["msg"] = "Password Updated";
			redirect('profile', 'refresh');
		}
		$_SESSION["error"] = "Invalid Users";
		redirect('profile', 'refresh');
	// }else{
	// 	$_SESSION["error"] = "Please checked the CAPTCHA to verify";
	// 	redirect('profile', 'refresh');
	// 	}
	}
	public function enroll($slug=null,$slug2=null,$slug3=null){
		$array = array("id"=>$slug);
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where($array);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["events"] = $row;
		$data["id"] = $slug;
		// $data["step"] = $slug2;
		// $data["insertid"] = $slug3;

		// $event_id = $slug;
		$user_id=$_SESSION["user_login"]["id"];
		$array = array("id"=>$user_id);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($array);
		$query = $this->db->get();
		$row = $query->result_array();
		if(!empty($row)){
			$data["event_data"] = $row;
		}
		

		$this->load->view('includes/navbar_athlete',$data);
		$this->load->view('event_enroll',$data);
		$this->load->view('includes/footer');
	}
	public function events_enroll_process(){
		// echo "<pre> ";
		// print_r($_POST);
		// die;
		// print_r("demo");
		if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="") {
		
			$first_name = str_replace(" ","-",$this->input->post("first_name"));
		$date = date('Ymdhis');
		$path_folder = 'assets/images/users/'.$first_name.''.$date;
		if (!is_dir($path_folder)) {
		    mkdir($path_folder, 0777, TRUE);
		}
		$array = array(
			"event_id"=>$_POST["event_id"],
				"first_name"=>$_POST["first_name"],
				"last_name"=>$_POST["last_name"],
				"gender"=>$_POST["gender"],
				"dob"=>$_POST["dob"],
				"country"=>$_POST["country"],
				"address"=>$_POST["address"],
				"address2"=>$_POST["address2"],
				"city"=>$_POST["city"],
				"state"=>$_POST["state"],
				"zip"=>$_POST["zip"],
				"phone"=>$_POST["phone"],
				"email"=>$_POST["email"],
				"created_at"=>date('Y-m-d H:i:s'),
				"status"=>0,
				"user_id"=>$_SESSION["user_login"]["id"],
				);
		if (isset($_FILES['docs']) && $_FILES['docs']['name']!='')
		{
		$file_ext3 = pathinfo($_FILES["docs"]["name"], PATHINFO_EXTENSION);
		$newname2 = str_replace(" ","-",$this->input->post("first_name")).'docs.'.$file_ext3;
		$image_new=fileuploadCI('docs',$path_folder,$newname2);
		$array["docs"]=$path_folder.'/'.$newname2;
		}else{
			$array["docs"]=$_POST["docs_temp"];
		}
		if (isset($_FILES['audio']) && $_FILES['audio']['name']!='')
		{
		$file_ext3 = pathinfo($_FILES["audio"]["name"], PATHINFO_EXTENSION);
		$newname2 = str_replace(" ","-",$this->input->post("first_name")).'audio.'.$file_ext3;
		$image_new=fileuploadCI('audio',$path_folder,$newname2);
		$array["audio"]=$path_folder.'/'.$newname2;
		}else{
			$array["audio"]=$_POST["audio_temp"];
		}
		if (isset($_FILES['videos']) && $_FILES['videos']['name']!='')
		{
		$file_ext4 = pathinfo($_FILES["videos"]["name"], PATHINFO_EXTENSION);
		$newname3 = str_replace(" ","-",$this->input->post("first_name")).'videos.'.$file_ext4;
		$image_new=fileuploadCI('videos',$path_folder,$newname3);
		// echo $image_new=move_uploaded_file($_FILES["videos"]["tmp_name"],$path_folder.'/'.$newname3);
		$array["videos"]=$path_folder.'/'.$newname3;
		}else{
			$array["videos"]=$_POST["videos_temp"];
		}

		if (isset($_FILES['profile_image']) && $_FILES['profile_image']['name']!='')
		{
		$file_ext2 = pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION);
		$newname = str_replace(" ","-",$this->input->post("first_name")).'profile_image.'.$file_ext2;
		$image_new =fileuploadCI('profile_image',$path_folder,$newname);
		$array["profile_image"]=$path_folder.'/'.$newname;
		
		}else{
			$array["profile_image"]=$_POST["profile_img"];
		}
		// echo "<pre>";
		// print_r($_POST);
		// die();
		if (isset($_POST["grouping"]) && isset($_POST["position"]))
		{
			$array["grouping"]=$_POST["grouping"];
			$array["position"]=$_POST["position"];
			$array["ptitle"]=$_POST["ptitle"];
			$array["major"]=$_POST["major"];
			$array["biodoc"]=$_POST["biodoc"];
			$array["websites"]=$_POST["websites"];
		}
		if (isset($_POST["grouping"]) && isset($_POST["position"]))
		{
			$array["grouping"]=$_POST["grouping"];
			$array["position"]=$_POST["position"];
			$array["ptitle"]=$_POST["ptitle"];
			$array["major"]=$_POST["major"];
			$array["biodoc"]=$_POST["biodoc"];
			$array["websites"]=$_POST["websites"];
		}
		if (isset($_POST["health"]) && isset($_POST["dietary"]))
		{
			$array["dietary"]=$_POST["dietary"];
			$array["health"]=$_POST["health"];
		}
		if (isset($_POST["emg_contact_name"]) && isset($_POST["emg_contact_relation"]))
		{
			$array["emg_contact_name"]=$_POST["emg_contact_name"];
			$array["emg_contact_relation"]=$_POST["emg_contact_relation"];
			$array["emg_contact"]=$_POST["emg_contact"];
			$array["emg_contact_email"]=$_POST["emg_contact_email"];
		}
		if (isset($_POST["event_enroll"]))
		{
			$array["event_enroll"]=json_encode($_POST["event_enroll"]);
			// print_r(json_encode($_POST["event_enroll"]));
		}
		if (isset($_POST["full_total_amt"]) && $_POST["full_total_amt"] !="")
		{
		// print_r("1")	;
			$array["total_amt"]=$_POST["full_total_amt"];
		}
		if (isset($_POST["hotel_enroll"]))
		{
			$array["hotel_enroll"]=$_POST["hotel_enroll"];
		}
		
			
		
		// die;
		$query = $this->db->insert("event_enrolls",$array);
		if($query){
			$html = '
			<html >
			<head>
			  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			  <meta name="viewport" content="width=device-width, initial-scale=1.0">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			  <title>New Assignment</title>
			  <style type="text/css">
				/* reset */
				article,
				aside,
				details,
				figcaption,
				figure,
				footer,
				header,
				hgroup,
				nav,
				section,
				summary {
				  display: block
				}
			
				audio,
				canvas,
				video {
				  display: inline-block;
				  *display: inline;
				  *zoom: 1
				}
			
				audio:not([controls]) {
				  display: none;
				  height: 0
				}
			
				[hidden] {
				  display: none
				}
			
				html {
				  font-size: 100%;
				  -webkit-text-size-adjust: 100%;
				  -ms-text-size-adjust: 100%
				}
			
				html,
				button,
				input,
				select,
				textarea {
				  font-family: sans-serif
				}
			
				body {
				  margin: 0
				}
			
				a:focus {
				  outline: thin dotted
				}
			
				a:active,
				a:hover {
				  outline: 0
				}
			
				h1 {
				  font-size: 2em;
				  margin: 0 0.67em 0
				}
			
				h2 {
				  font-size: 1.5em;
				  margin: 0 0 .83em 0
				}
			
				h3 {
				  font-size: 1.17em;
				  margin: 1em 0
				}
			
				h4 {
				  font-size: 1em;
				  margin: 1.33em 0
				}
			
				h5 {
				  font-size: .83em;
				  margin: 1.67em 0
				}
			
				h6 {
				  font-size: .75em;
				  margin: 2.33em 0
				}
			
				abbr[title] {
				  border-bottom: 1px dotted
				}
			
				b,
				strong {
				  font-weight: bold
				}
			
				blockquote {
				  margin: 1em 40px
				}
			
				dfn {
				  font-style: italic
				}
			
				mark {
				  background: #ff0;
				  color: #000
				}
			
				p,
				pre {
				  margin: 1em 0
				}
			
				code,
				kbd,
				pre,
				samp {
				  font-family: monospace, serif;
				  _font-family: "courier new", monospace;
				  font-size: 1em
				}
			
				pre {
				  white-space: pre;
				  white-space: pre-wrap;
				  word-wrap: break-word
				}
			
				q {
				  quotes: none
				}
			
				q:before,
				q:after {
				  content: "";
				  content: none
				}
			
				small {
				  font-size: 75%
				}
			
				sub,
				sup {
				  font-size: 75%;
				  line-height: 0;
				  position: relative;
				  vertical-align: baseline
				}
			
				sup {
				  top: -0.5em
				}
			
				sub {
				  bottom: -0.25em
				}
			
				dl,
				menu,
				ol,
				ul {
				  margin: 1em 0
				}
			
				dd {
				  margin: 0 0 0 40px
				}
			
				menu,
				ol,
				ul {
				  padding: 0 0 0 40px
				}
			
				nav ul,
				nav ol {
				  list-style: none;
				  list-style-image: none
				}
			
				img {
				  border: 0;
				  -ms-interpolation-mode: bicubic
				}
			
				svg:not(:root) {
				  overflow: hidden
				}
			
				figure {
				  margin: 0
				}
			
				form {
				  margin: 0
				}
			
				fieldset {
				  border: 1px solid #c0c0c0;
				  margin: 0 2px;
				  padding: .35em .625em .75em
				}
			
				legend {
				  border: 0;
				  padding: 0;
				  white-space: normal;
				  *margin-left: -7px
				}
			
				button,
				input,
				select,
				textarea {
				  font-size: 100%;
				  margin: 0;
				  vertical-align: baseline;
				  *vertical-align: middle
				}
			
				button,
				input {
				  line-height: normal
				}
			
				button,
				html input[type="button"],
				input[type="reset"],
				input[type="submit"] {
				  -webkit-appearance: button;
				  cursor: pointer;
				  *overflow: visible
				}
			
				button[disabled],
				input[disabled] {
				  cursor: default
				}
			
				input[type="checkbox"],
				input[type="radio"] {
				  box-sizing: border-box;
				  padding: 0;
				  *height: 13px;
				  *width: 13px
				}
			
				input[type="search"] {
				  -webkit-appearance: textfield;
				  -moz-box-sizing: content-box;
				  -webkit-box-sizing: content-box;
				  box-sizing: content-box
				}
			
				input[type="search"]::-webkit-search-cancel-button,
				input[type="search"]::-webkit-search-decoration {
				  -webkit-appearance: none
				}
			
				button::-moz-focus-inner,
				input::-moz-focus-inner {
				  border: 0;
				  padding: 0
				}
			
				textarea {
				  overflow: auto;
				  vertical-align: top
				}
			
				table {
				  border-collapse: collapse;
				  border-spacing: 0
				}
			
				/* custom client-specific styles including styles for different online clients */
				.ReadMsgBody {
				  width: 100%;
				}
			
				.ExternalClass {
				  width: 100%;
				}
			
				/* hotmail / outlook.com */
				.ExternalClass,
				.ExternalClass p,
				.ExternalClass span,
				.ExternalClass font,
				.ExternalClass td,
				.ExternalClass div {
				  line-height: 100%;
				}
			
				/* hotmail / outlook.com */
				table,
				td {
				  mso-table-lspace: 0pt;
				  mso-table-rspace: 0pt;
				}
			
				/* Outlook */
				#outlook a {
				  padding: 0;
				}
			
				/* Outlook */
				img {
				  -ms-interpolation-mode: bicubic;
				  display: block;
				  outline: none;
				  text-decoration: none;
				}
			
				/* IExplorer */
				body,
				table,
				td,
				p,
				a,
				li,
				blockquote {
				  -ms-text-size-adjust: 100%;
				  -webkit-text-size-adjust: 100%;
				  font-weight: normal !important;
				}
			
				.ExternalClass td[class="ecxflexibleContainerBox"] h3 {
				  padding-top: 10px !important;
				}
			
				/* hotmail */
				/* email template styles */
				h1 {
				  display: block;
				  font-size: 26px;
				  font-style: normal;
				  font-weight: normal;
				  line-height: 100%;
				}
			
				h2 {
				  display: block;
				  font-size: 20px;
				  font-style: normal;
				  font-weight: normal;
				  line-height: 120%;
				}
			
				h3 {
				  display: block;
				  font-size: 17px;
				  font-style: normal;
				  font-weight: normal;
				  line-height: 110%;
				}
			
				h4 {
				  display: block;
				  font-size: 18px;
				  font-style: italic;
				  font-weight: normal;
				  line-height: 100%;
				}
			
				.flexibleImage {
				  height: auto;
				}
			
				table[class=flexibleContainerCellDivider] {
				  padding-bottom: 0 !important;
				  padding-top: 0 !important;
				}
			
				body,
				#bodyTbl {
				  background-color: #E1E1E1;
				}
			
				#emailHeader {
				  background-color: #E1E1E1;
				}
			
				#emailBody {
				  background-color: #FFFFFF;
				}
			
				#emailFooter {
				  background-color: #E1E1E1;
				}
			
				.textContent {
				  color: #8B8B8B;
				  font-family: Helvetica;
				  font-size: 16px;
				  line-height: 125%;
				  text-align: Left;
				}
			
				.textContent a {
				  color: #205478;
				  text-decoration: underline;
				}
			
				.emailButton {
				  background-color: #205478;
				  border-collapse: separate;
				}
			
				.buttonContent {
				  color: #FFFFFF;
				  font-family: Helvetica;
				  font-size: 18px;
				  font-weight: bold;
				  line-height: 100%;
				  padding: 15px;
				  text-align: center;
				}
			
				.buttonContent a {
				  color: #FFFFFF;
				  display: block;
				  text-decoration: none !important;
				  border: 0 !important;
				}
			
				#invisibleIntroduction {
				  display: none;
				  display: none !important;
				}
			
				/* hide the introduction text */
				/* other framework hacks and overrides */
				span[class=ios-color-hack] a {
				  color: #275100 !important;
				  text-decoration: none !important;
				}
			
				/* Remove all link colors in IOS (below are duplicates based on the color preference) */
				span[class=ios-color-hack2] a {
				  color: #205478 !important;
				  text-decoration: none !important;
				}
			
				span[class=ios-color-hack3] a {
				  color: #8B8B8B !important;
				  text-decoration: none !important;
				}
			
				/* phones and sms */
				.a[href^="tel"],
				a[href^="sms"] {
				  text-decoration: none !important;
				  color: #606060 !important;
				  pointer-events: none !important;
				  cursor: default !important;
				}
			
				.mobile_link a[href^="tel"],
				.mobile_link a[href^="sms"] {
				  text-decoration: none !important;
				  color: #606060 !important;
				  pointer-events: auto !important;
				  cursor: default !important;
				}
			
				/* responsive styles */
				@media only screen and (max-width: 480px) {
				  body {
					width: 100% !important;
					min-width: 100% !important;
				  }
			
				  table[id="emailHeader"],
				  table[id="emailBody"],
				  table[id="emailFooter"],
				  table[class="flexibleContainer"] {
					width: 100% !important;
				  }
			
				  td[class="flexibleContainerBox"],
				  td[class="flexibleContainerBox"] table {
					display: block;
					width: 100%;
					text-align: left;
				  }
			
				  td[class="imageContent"] img {
					height: auto !important;
					width: 100% !important;
					max-width: 100% !important;
				  }
			
				  img[class="flexibleImage"] {
					height: auto !important;
					width: 100% !important;
					max-width: 100% !important;
				  }
			
				  img[class="flexibleImageSmall"] {
					height: auto !important;
					width: auto !important;
				  }
			
				  table[class="flexibleContainerBoxNext"] {
					padding-top: 10px !important;
				  }
			
				  table[class="emailButton"] {
					width: 100% !important;
				  }
			
				  td[class="buttonContent"] {
					padding: 0 !important;
				  }
			
				  td[class="buttonContent"] a {
					padding: 15px !important;
				  }
				}
			  </style>
			  <!--
				  MS Outlook custom styles
				-->
			  <!--[if mso 12]>
				  <style type="text/css">
					.flexibleContainer{display:block !important; width:100% !important;}
				  </style>
				<![endif]-->
			  <!--[if mso 14]>
				  <style type="text/css">
					.flexibleContainer{display:block !important; width:100% !important;}
				  </style>
				<![endif]-->
			</head>
			
			<body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
			  <center style="background-color:#E1E1E1;">
					  <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">
			
						<tr>
						  <td align="center" valign="top">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#2E7D32">
							  <tr>
								<td align="center" valign="top">
								  <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
									<tr>
									  <td align="center" valign="top" width="500" class="flexibleContainerCell">
										<table border="0" cellpadding="30" cellspacing="0" width="100%">
										  <tr>
											<td align="center" valign="top" class="textContent">
											  <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">World Taiji Science Federation </h1>
							  
											  
											</td>
										  </tr>
										</table>
									  </td>
									</tr>
								  </table>
								</td>
							  </tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td align="center" valign="top">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							  <tr>
								<td align="center" valign="top">
								  <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
									<tr>
									  <td align="center" valign="top" width="500" class="flexibleContainerCell">
										<table border="0" cellpadding="30" cellspacing="0" width="100%">
										  <tr>
											<td align="center" valign="top">
			
											  <table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
												  <td valign="top" class="textContent">
						 
													<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;"><b>Thank you!</b> for Registration of event in our website!</div>
												  </td>
												</tr>
											  </table>
			
											</td>
										  </tr>
										</table>
									  </td>
									</tr>
								  </table>
								</td>
							  </tr>
							</table>
						  </td>
						</tr>
			
						<tr>
						  <td align="center" valign="top">
						   
						  </td>
						</tr>
			
					  </table>
			
					</td>
				  </tr>
				</table>
			  </center>
			</body>
			
			</html>';
			$this->load->library('email');
			$this->email->from('admin@gowushu.com');
			$this->email->to($_POST["email"]);
			$this->email->bcc('asad.raza@ossols.com');
			$this->email->subject('World Taiji Science Federation');
			$this->email->message($html);	
			$this->email->send();
			
			$html2 = '
			<html >
			<head>
			  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			  <meta name="viewport" content="width=device-width, initial-scale=1.0">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			  <title>New Assignment</title>
			  <style type="text/css">
				/* reset */
				article,
				aside,
				details,
				figcaption,
				figure,
				footer,
				header,
				hgroup,
				nav,
				section,
				summary {
				  display: block
				}
			
				audio,
				canvas,
				video {
				  display: inline-block;
				  *display: inline;
				  *zoom: 1
				}
			
				audio:not([controls]) {
				  display: none;
				  height: 0
				}
			
				[hidden] {
				  display: none
				}
			
				html {
				  font-size: 100%;
				  -webkit-text-size-adjust: 100%;
				  -ms-text-size-adjust: 100%
				}
			
				html,
				button,
				input,
				select,
				textarea {
				  font-family: sans-serif
				}
			
				body {
				  margin: 0
				}
			
				a:focus {
				  outline: thin dotted
				}
			
				a:active,
				a:hover {
				  outline: 0
				}
			
				h1 {
				  font-size: 2em;
				  margin: 0 0.67em 0
				}
			
				h2 {
				  font-size: 1.5em;
				  margin: 0 0 .83em 0
				}
			
				h3 {
				  font-size: 1.17em;
				  margin: 1em 0
				}
			
				h4 {
				  font-size: 1em;
				  margin: 1.33em 0
				}
			
				h5 {
				  font-size: .83em;
				  margin: 1.67em 0
				}
			
				h6 {
				  font-size: .75em;
				  margin: 2.33em 0
				}
			
				abbr[title] {
				  border-bottom: 1px dotted
				}
			
				b,
				strong {
				  font-weight: bold
				}
			
				blockquote {
				  margin: 1em 40px
				}
			
				dfn {
				  font-style: italic
				}
			
				mark {
				  background: #ff0;
				  color: #000
				}
			
				p,
				pre {
				  margin: 1em 0
				}
			
				code,
				kbd,
				pre,
				samp {
				  font-family: monospace, serif;
				  _font-family: "courier new", monospace;
				  font-size: 1em
				}
			
				pre {
				  white-space: pre;
				  white-space: pre-wrap;
				  word-wrap: break-word
				}
			
				q {
				  quotes: none
				}
			
				q:before,
				q:after {
				  content: "";
				  content: none
				}
			
				small {
				  font-size: 75%
				}
			
				sub,
				sup {
				  font-size: 75%;
				  line-height: 0;
				  position: relative;
				  vertical-align: baseline
				}
			
				sup {
				  top: -0.5em
				}
			
				sub {
				  bottom: -0.25em
				}
			
				dl,
				menu,
				ol,
				ul {
				  margin: 1em 0
				}
			
				dd {
				  margin: 0 0 0 40px
				}
			
				menu,
				ol,
				ul {
				  padding: 0 0 0 40px
				}
			
				nav ul,
				nav ol {
				  list-style: none;
				  list-style-image: none
				}
			
				img {
				  border: 0;
				  -ms-interpolation-mode: bicubic
				}
			
				svg:not(:root) {
				  overflow: hidden
				}
			
				figure {
				  margin: 0
				}
			
				form {
				  margin: 0
				}
			
				fieldset {
				  border: 1px solid #c0c0c0;
				  margin: 0 2px;
				  padding: .35em .625em .75em
				}
			
				legend {
				  border: 0;
				  padding: 0;
				  white-space: normal;
				  *margin-left: -7px
				}
			
				button,
				input,
				select,
				textarea {
				  font-size: 100%;
				  margin: 0;
				  vertical-align: baseline;
				  *vertical-align: middle
				}
			
				button,
				input {
				  line-height: normal
				}
			
				button,
				html input[type="button"],
				input[type="reset"],
				input[type="submit"] {
				  -webkit-appearance: button;
				  cursor: pointer;
				  *overflow: visible
				}
			
				button[disabled],
				input[disabled] {
				  cursor: default
				}
			
				input[type="checkbox"],
				input[type="radio"] {
				  box-sizing: border-box;
				  padding: 0;
				  *height: 13px;
				  *width: 13px
				}
			
				input[type="search"] {
				  -webkit-appearance: textfield;
				  -moz-box-sizing: content-box;
				  -webkit-box-sizing: content-box;
				  box-sizing: content-box
				}
			
				input[type="search"]::-webkit-search-cancel-button,
				input[type="search"]::-webkit-search-decoration {
				  -webkit-appearance: none
				}
			
				button::-moz-focus-inner,
				input::-moz-focus-inner {
				  border: 0;
				  padding: 0
				}
			
				textarea {
				  overflow: auto;
				  vertical-align: top
				}
			
				table {
				  border-collapse: collapse;
				  border-spacing: 0
				}
			
				/* custom client-specific styles including styles for different online clients */
				.ReadMsgBody {
				  width: 100%;
				}
			
				.ExternalClass {
				  width: 100%;
				}
			
				/* hotmail / outlook.com */
				.ExternalClass,
				.ExternalClass p,
				.ExternalClass span,
				.ExternalClass font,
				.ExternalClass td,
				.ExternalClass div {
				  line-height: 100%;
				}
			
				/* hotmail / outlook.com */
				table,
				td {
				  mso-table-lspace: 0pt;
				  mso-table-rspace: 0pt;
				}
			
				/* Outlook */
				#outlook a {
				  padding: 0;
				}
			
				/* Outlook */
				img {
				  -ms-interpolation-mode: bicubic;
				  display: block;
				  outline: none;
				  text-decoration: none;
				}
			
				/* IExplorer */
				body,
				table,
				td,
				p,
				a,
				li,
				blockquote {
				  -ms-text-size-adjust: 100%;
				  -webkit-text-size-adjust: 100%;
				  font-weight: normal !important;
				}
			
				.ExternalClass td[class="ecxflexibleContainerBox"] h3 {
				  padding-top: 10px !important;
				}
			
				/* hotmail */
				/* email template styles */
				h1 {
				  display: block;
				  font-size: 26px;
				  font-style: normal;
				  font-weight: normal;
				  line-height: 100%;
				}
			
				h2 {
				  display: block;
				  font-size: 20px;
				  font-style: normal;
				  font-weight: normal;
				  line-height: 120%;
				}
			
				h3 {
				  display: block;
				  font-size: 17px;
				  font-style: normal;
				  font-weight: normal;
				  line-height: 110%;
				}
			
				h4 {
				  display: block;
				  font-size: 18px;
				  font-style: italic;
				  font-weight: normal;
				  line-height: 100%;
				}
			
				.flexibleImage {
				  height: auto;
				}
			
				table[class=flexibleContainerCellDivider] {
				  padding-bottom: 0 !important;
				  padding-top: 0 !important;
				}
			
				body,
				#bodyTbl {
				  background-color: #E1E1E1;
				}
			
				#emailHeader {
				  background-color: #E1E1E1;
				}
			
				#emailBody {
				  background-color: #FFFFFF;
				}
			
				#emailFooter {
				  background-color: #E1E1E1;
				}
			
				.textContent {
				  color: #8B8B8B;
				  font-family: Helvetica;
				  font-size: 16px;
				  line-height: 125%;
				  text-align: Left;
				}
			
				.textContent a {
				  color: #205478;
				  text-decoration: underline;
				}
			
				.emailButton {
				  background-color: #205478;
				  border-collapse: separate;
				}
			
				.buttonContent {
				  color: #FFFFFF;
				  font-family: Helvetica;
				  font-size: 18px;
				  font-weight: bold;
				  line-height: 100%;
				  padding: 15px;
				  text-align: center;
				}
			
				.buttonContent a {
				  color: #FFFFFF;
				  display: block;
				  text-decoration: none !important;
				  border: 0 !important;
				}
			
				#invisibleIntroduction {
				  display: none;
				  display: none !important;
				}
			
				/* hide the introduction text */
				/* other framework hacks and overrides */
				span[class=ios-color-hack] a {
				  color: #275100 !important;
				  text-decoration: none !important;
				}
			
				/* Remove all link colors in IOS (below are duplicates based on the color preference) */
				span[class=ios-color-hack2] a {
				  color: #205478 !important;
				  text-decoration: none !important;
				}
			
				span[class=ios-color-hack3] a {
				  color: #8B8B8B !important;
				  text-decoration: none !important;
				}
			
				/* phones and sms */
				.a[href^="tel"],
				a[href^="sms"] {
				  text-decoration: none !important;
				  color: #606060 !important;
				  pointer-events: none !important;
				  cursor: default !important;
				}
			
				.mobile_link a[href^="tel"],
				.mobile_link a[href^="sms"] {
				  text-decoration: none !important;
				  color: #606060 !important;
				  pointer-events: auto !important;
				  cursor: default !important;
				}
			
				/* responsive styles */
				@media only screen and (max-width: 480px) {
				  body {
					width: 100% !important;
					min-width: 100% !important;
				  }
			
				  table[id="emailHeader"],
				  table[id="emailBody"],
				  table[id="emailFooter"],
				  table[class="flexibleContainer"] {
					width: 100% !important;
				  }
			
				  td[class="flexibleContainerBox"],
				  td[class="flexibleContainerBox"] table {
					display: block;
					width: 100%;
					text-align: left;
				  }
			
				  td[class="imageContent"] img {
					height: auto !important;
					width: 100% !important;
					max-width: 100% !important;
				  }
			
				  img[class="flexibleImage"] {
					height: auto !important;
					width: 100% !important;
					max-width: 100% !important;
				  }
			
				  img[class="flexibleImageSmall"] {
					height: auto !important;
					width: auto !important;
				  }
			
				  table[class="flexibleContainerBoxNext"] {
					padding-top: 10px !important;
				  }
			
				  table[class="emailButton"] {
					width: 100% !important;
				  }
			
				  td[class="buttonContent"] {
					padding: 0 !important;
				  }
			
				  td[class="buttonContent"] a {
					padding: 15px !important;
				  }
				}
			  </style>
			  <!--
				  MS Outlook custom styles
				-->
			  <!--[if mso 12]>
				  <style type="text/css">
					.flexibleContainer{display:block !important; width:100% !important;}
				  </style>
				<![endif]-->
			  <!--[if mso 14]>
				  <style type="text/css">
					.flexibleContainer{display:block !important; width:100% !important;}
				  </style>
				<![endif]-->
			</head>
			
			<body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
			  <center style="background-color:#E1E1E1;">
					  <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">
			
						<tr>
						  <td align="center" valign="top">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#2E7D32">
							  <tr>
								<td align="center" valign="top">
								  <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
									<tr>
									  <td align="center" valign="top" width="500" class="flexibleContainerCell">
										<table border="0" cellpadding="30" cellspacing="0" width="100%">
										  <tr>
											<td align="center" valign="top" class="textContent">
											  <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">World Taiji Science Federation </h1>
							  
											  
											</td>
										  </tr>
										</table>
									  </td>
									</tr>
								  </table>
								</td>
							  </tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td align="center" valign="top">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							  <tr>
								<td align="center" valign="top">
								  <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
									<tr>
									  <td align="center" valign="top" width="500" class="flexibleContainerCell">
										<table border="0" cellpadding="30" cellspacing="0" width="100%">
										  <tr>
											<td align="center" valign="top">
			
											  <table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
												  <td valign="top" class="textContent">
						 
													<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;"> <b>'.$_POST["email"].'</b> This mail is recently register in event.</div>
												  </td>
												</tr>
											  </table>
			
											</td>
										  </tr>
										</table>
									  </td>
									</tr>
								  </table>
								</td>
							  </tr>
							</table>
						  </td>
						</tr>
			
						<tr>
						  <td align="center" valign="top">
						   
						  </td>
						</tr>
			
					  </table>
			
					</td>
				  </tr>
				</table>
			  </center>
			</body>
			
			</html>';
			$this->load->library('email');
			$this->email->from('admin@gowushu.com');
			$this->email->to('Forum@wtjsf.org');
			$this->email->bcc('asad.raza@ossols.com');
			$this->email->subject('World Taiji Science Federation');
			$this->email->message($html2);	
			$this->email->send();
			// if ($this->email->send()) {
			// 	echo 'Sent with success!';
			// 		} else {
			// 	show_error($this->email->print_debugger());
			// 	}
			
			// $_SESSION["enroll_id"] = "";
			 $insert_id2 = $this->db->insert_id();

			 if (isset($_POST["answer"])){
					foreach($_POST['answer']as $key_id=>$value3){
						$array_q = array(
							"answer"=>$_POST['answer'][$key_id],
							"question_id"=>$_POST['question'][$key_id],
							"enroll_id"=>$insert_id2
								);
						 $this->db->insert("answers",$array_q);
					}
					// echo "datai";
			 }
			//  die;
				if (isset($_POST["full_total_amt"]) && $_POST["full_total_amt"] !='') {
					$_SESSION["enroll_id"] = $insert_id2;
					$this -> db -> where('id', $_POST['temp_data_id']);
					$this -> db -> delete('temp_event_enrolls');
				}else {
					$_SESSION["msg1"] = "Thank you For registration.";
					$this -> db -> where('id', $_POST['temp_data_id']);
					$this -> db -> delete('temp_event_enrolls');
				}
			if (isset($_POST["hotel_enroll"]) && $_POST['hotel_enroll']==1){

			if (isset($_POST['checkin']) && isset($_POST['checkout'])) {
			foreach($_POST['checkin'] as $key2=>$value2){
				$array2 = array(
					"bed_charges"=>$_POST['bed_charges'][$key2],
					"checkin"=>$value2,
					"checkout"=>$_POST['checkout'][$key2],
					"total_night"=>$_POST['tnight'][$key2],
					"total_price"=>$_POST['room_cost'][$key2],
					"enroll_id"=>$insert_id2,
					"event_id"=>$_POST["event_id"]
						);

						if (isset($_POST["star_select"][$key2])) {
					$array2["star_select"]=$_POST["star_select"][$key2];
				}
				if (isset($_POST["meals"][$key2])) {
					$array2["meal_fess"]=$_POST["meals"][$key2];
				}
				if (isset($_POST['breaKfast'][$key2])) {
					$array2["bkfst_fess"]=$_POST["breaKfast"][$key2];
				}
				$query2 = $this->db->insert("room_add_enroll",$array2);
				if($query2){
					$insert_id3 = $this->db->insert_id();
					foreach($_POST['person_type'][$key2] as $key3=>$value3){
						$array3 = array(
							"person_type"=>$value3,
							"fname"=>$_POST['fname'][$key2][$key3],
							"lname"=>$_POST['lname'][$key2][$key3],
							"age"=>$_POST['age'][$key2][$key3],
							"enroll_id"=>$insert_id2,
							"room_id"=>$insert_id3
								);
						$query3 = $this->db->insert("room_person",$array3);
						
					}
				}
				
			}
		}
		// 
	}
	
	if (isset($_POST["full_total_amt"]) && $_POST["full_total_amt"] !="")
		{
			// print_r("SAd");
			$token = bin2hex(random_bytes(16)); 
			 // Set variables for paypal form 
        $returnURL = base_url().'paypal/success?token='.$token; //payment success url 
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url 
        $notifyURL = base_url().'paypal/ipn'; //ipn url 

        // Get current user ID from the session (optional) 
        $userID = $_SESSION["user_login"]["id"]; 

		$array55 = array(
			"event_id"=> $_POST["event_id"],
			"enroll_id"=>$_SESSION["enroll_id"],
			"token"=>$token,
			"total_amt"=>$_POST["full_total_amt"],
			"u_id"=>$userID
				);
		$query3 = $this->db->insert("sessions_data",$array55);
         
        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', "Registration Fees"); 
        $this->paypal_lib->add_field('item_number', $_SESSION["enroll_id"]); 
        $this->paypal_lib->add_field('amount',  $_POST["full_total_amt"]); 
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
		}else {
			echo '<script>location.replace("'.base_url().'dashboard")</script>';
		}
		// die;
		// redirect('dashboard', 'refresh');

		}
		else{
			$_SESSION["msg1"] = "Some thing went wrong!";
			redirect('Events/enroll/'.$_POST["event_id"], 'refresh');
		}
	}else{
		$_SESSION["msg1"] = "Please checked the CAPTCHA to verify";
		redirect('Events/enroll/'.$_POST["event_id"], 'refresh');
		}
		
	}
	public function edit_events_enroll_process(){
		// 	echo "<pre> ";
		// print_r($_POST);
		// die;
		$id = $_POST["enroll_id"];
		$first_name = str_replace(" ","-",$this->input->post("first_name"));
		$date = date('Ymdhis');
		$path_folder = 'assets/images/users/'.$first_name.''.$date;
		if (!is_dir($path_folder)) {
		    mkdir($path_folder, 0777, TRUE);
		}
		$array = array(
				"first_name"=>$_POST["first_name"],
				"last_name"=>$_POST["last_name"],
				"gender"=>$_POST["gender"],
				"dob"=>$_POST["dob"],
				"country"=>$_POST["country"],
				"address"=>$_POST["address"],
				"address2"=>$_POST["address2"],
				"city"=>$_POST["city"],
				"state"=>$_POST["state"],
				"zip"=>$_POST["zip"],
				"phone"=>$_POST["phone"],
				"email"=>$_POST["email"],
				// "event_enroll"=>$_POST["event_enroll"],
				// "total_amt"=>$_POST["full_total_amt"],
				);
		if (isset($_FILES['docs'] ) && $_FILES['docs']["name"] !='')
		{
		$file_ext3 = pathinfo($_FILES["docs"]["name"], PATHINFO_EXTENSION);
		$newname2 = str_replace(" ","-",$this->input->post("first_name")).'docs.'.$file_ext3;
		$image_new=fileuploadCI('docs',$path_folder,$newname2);
		$array["docs"]=$path_folder.'/'.$newname2;
		}
		if (isset($_FILES['audio']) && $_FILES['audio']['name']!='')
		{
		$file_ext3 = pathinfo($_FILES["audio"]["name"], PATHINFO_EXTENSION);
		$newname2 = str_replace(" ","-",$this->input->post("first_name")).'audio.'.$file_ext3;
		$image_new=fileuploadCI('audio',$path_folder,$newname2);
		$array["audio"]=$path_folder.'/'.$newname2;
		}
		if (isset($_FILES['videos'])&& $_FILES['videos']["name"]!='')
		{
		$file_ext4 = pathinfo($_FILES["videos"]["name"], PATHINFO_EXTENSION);
		$newname3 = str_replace(" ","-",$this->input->post("first_name")).'videos.'.$file_ext4;
		$image_new=fileuploadCI('videos',$path_folder,$newname3);
		$array["videos"]=$path_folder.'/'.$newname3;
		}
		if (isset($_FILES['profile_image'])&& $_FILES['profile_image']["name"]!='')
		{
		$file_ext2 = pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION);
		$newname = str_replace(" ","-",$this->input->post("first_name")).'profile_image.'.$file_ext2;
		$image_new=fileuploadCI('profile_image',$path_folder,$newname);
		$array["profile_image"]=$path_folder.'/'.$newname;
		} 
		if (isset($_POST["grouping"]) && isset($_POST["position"]))
		{
			$array["grouping"]=$_POST["grouping"];
			$array["position"]=$_POST["position"];
			$array["ptitle"]=$_POST["ptitle"];
			$array["major"]=$_POST["major"];
			$array["biodoc"]=$_POST["biodoc"];
			$array["websites"]=$_POST["websites"];
		}
		if (isset($_POST["grouping"]) && isset($_POST["position"]))
		{
			$array["grouping"]=$_POST["grouping"];
			$array["position"]=$_POST["position"];
			$array["ptitle"]=$_POST["ptitle"];
			$array["major"]=$_POST["major"];
			$array["biodoc"]=$_POST["biodoc"];
			$array["websites"]=$_POST["websites"];
		}
		if (isset($_POST["health"]) && isset($_POST["dietary"]))
		{
			$array["dietary"]=$_POST["dietary"];
			$array["health"]=$_POST["health"];
		}
		if (isset($_POST["emg_contact_name"]) && isset($_POST["emg_contact_relation"]))
		{
			$array["emg_contact_name"]=$_POST["emg_contact_name"];
			$array["emg_contact_relation"]=$_POST["emg_contact_relation"];
			$array["emg_contact"]=$_POST["emg_contact"];
			$array["emg_contact_email"]=$_POST["emg_contact_email"];
		}
		if (isset($_POST["event_enroll"]))
		{
			$array["event_enroll"]=json_encode($_POST["event_enroll"]);
		}
		if (isset($_POST["full_total_amt"]))
		{
			$array["total_amt"]=$_POST["full_total_amt"];
		}
		if (isset($_POST["hotel_enroll"]))
		{
			$array["hotel_enroll"]=$_POST["hotel_enroll"];
		}
		$this->db->where('id', $id);
		$query =  $this->db->update("event_enrolls", $array);
		if($query){
			if (isset($_POST["answer"])){
				foreach($_POST['answer']as $key_id=>$value3){
					$array_q = array(
						"answer"=>$_POST['answer'][$key_id],
						"question_id"=>$_POST['question'][$key_id],
						"enroll_id"=>$insert_id2
							);
					 $this->db->insert("answers",$array_q);
				}
				
		 }
		 if (isset($_POST["answer_edit"])){
			foreach($_POST['answer_edit']as $key_id=>$value3){
				$array_q = array(
					"answer"=>$_POST['answer_edit'][$key_id]
						);
				$where = array(
						"question_id"=>$_POST['question_edit'][$key_id],
						"enroll_id"=>$id
						);
				$this->db->where($where);
				 $this->db->update("answers",$array_q);
			}
			
	 }
			// $insert_id2 = $id;
			if (isset($_POST["hotel_enroll"]) && $_POST['hotel_enroll']==1){
				// echo 1;
			if (isset($_POST['up_checkin']) && isset($_POST['up_checkout'])) {
			foreach($_POST['up_checkin'] as $key2=>$value2){
				$array2 = array(
					"bed_charges"=>$_POST['up_bed_charges'][$key2],
					"checkin"=>$value2,
					"checkout"=>$_POST['up_checkout'][$key2],
					"total_night"=>$_POST['up_tnight'][$key2],
					"total_price"=>$_POST['up_room_cost'][$key2],
						);

						if (isset($_POST["up_star_select"][$key2])) {
					$array2["star_select"]=$_POST["up_star_select"][$key2];
				}
				if (isset($_POST["up_meals"][$key2])) {
					$array2["meal_fess"]=$_POST["up_meals"][$key2];
				}
				if (isset($_POST['up_breaKfast'][$key2])) {
					$array2["bkfst_fess"]=$_POST["up_breaKfast"][$key2];
				}
				$this->db->where('id', $key2);
				$query =  $this->db->update("room_add_enroll", $array2);
				if($query){
					foreach($_POST['up_person_type'][$key2] as $key3=>$value3){
						$array3 = array(
							"person_type"=>$value3,
							"fname"=>$_POST['up_fname'][$key2][$key3],
							"lname"=>$_POST['up_lname'][$key2][$key3],
							"age"=>$_POST['up_age'][$key2][$key3],
								);
							$this->db->where('id', $key3);
							$query =  $this->db->update("room_person", $array3);
						
					}
					if (isset($_POST['person_type'][$key2]) && isset($_POST['fname'][$key2])) {
					$insert_id3 = [$key2];
							foreach($_POST['person_type'][$key2] as $key3=>$value3){
								$array4 = array(
									"person_type"=>$value3,
									"fname"=>$_POST['fname'][$key2][$key3],
									"lname"=>$_POST['lname'][$key2][$key3],
									"age"=>$_POST['age'][$key2][$key3],
									"enroll_id"=>$id,
									"room_id"=>$insert_id3
										);
								$query3 = $this->db->insert("room_person",$array4);
								
							}
						}
				}
				
			}
				
	}
	// $insert_id2 = $id;
	if (isset($_POST['checkin']) && isset($_POST['checkout'])) {
		foreach($_POST['checkin'] as $key2=>$value2){
			$array2 = array(
				"bed_charges"=>$_POST['bed_charges'][$key2],
				"checkin"=>$value2,
				"checkout"=>$_POST['checkout'][$key2],
				"total_night"=>$_POST['tnight'][$key2],
				"total_price"=>$_POST['room_cost'][$key2],
				"enroll_id"=>$id,
				"event_id"=>$_POST["event_id"]
					);

					if (isset($_POST["star_select"][$key2])) {
				$array2["star_select"]=$_POST["star_select"][$key2];
			}
			if (isset($_POST["meals"][$key2])) {
				$array2["meal_fess"]=$_POST["meals"][$key2];
			}
			if (isset($_POST['breaKfast'][$key2])) {
				$array2["bkfst_fess"]=$_POST["breaKfast"][$key2];
			}
			$query2 = $this->db->insert("room_add_enroll",$array2);
			if($query2){
				$insert_id3 = $this->db->insert_id();
				foreach($_POST['person_type'][$key2] as $key3=>$value3){
					$array3 = array(
						"person_type"=>$value3,
						"fname"=>$_POST['fname'][$key2][$key3],
						"lname"=>$_POST['lname'][$key2][$key3],
						"age"=>$_POST['age'][$key2][$key3],
						"enroll_id"=>$id,
						"room_id"=>$insert_id3
							);
					$query3 = $this->db->insert("room_person",$array3);
					
				}
			}
			
		}
	}
}
	// die;
		// redirect('Events/enroll/'.$_POST["event_id"], 'refresh');
		
		redirect('spectator', 'refresh');

		}
		else{
			echo "Update Failed";
		}
	}
	public function remove_room_person_del(){
		$this -> db -> where('id', $_POST['id']);
		$query	= $this -> db -> delete('room_person');
if($query){
	echo "true";
}
			// redirect('events', 'refresh');
}
public function remove_room_del(){
	$this -> db -> where('id', $_POST['id']);
		$this -> db -> delete('room_add_enroll');

	$this -> db -> where('room_id', $_POST['id']);
	$query	=	$this -> db -> delete('room_person');
		if($query){
			echo "true";
		}
		// redirect('events', 'refresh');
}

	public function profile(){
		$array = array("id"=>$_SESSION["user_login"]["id"]);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($array);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["users"] = $row;
		$this->load->view('includes/navbar_athlete',$data);
		$this->load->view('profile',$data);
		$this->load->view('includes/footer');
	}
	public function profile_update(){
	// 	print_r($_POST);
    // die();
	// if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="") {
		
		$array = array(
			"first_name"=>$_POST["first_name"],
				"last_name"=>$_POST["last_name"],
				"gender"=>$_POST["gender"],
				"dob"=>$_POST["dob"],
				"country"=>$_POST["country"],
				"address"=>$_POST["address"],
				"address2"=>$_POST["address2"],
				"city"=>$_POST["city"],
				"state"=>$_POST["state"],
				"zip"=>$_POST["zip"],
				"phone"=>$_POST["phone"],
				"email"=>$_POST["email"],
		);
		
		if(isset($_FILES['profile_image']) && $_FILES['profile_image']['name']!=''){  
			$first_name = str_replace(" ","-",$this->input->post("first_name"));
			$date = date('Ymdhis');
			$path_folder = 'assets/images/profile_img/';
			
		$file_ext2 = pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION);
			$newname = str_replace(" ","_",$this->input->post("first_name")).$date.'.'.$file_ext2;
			$image_new=fileuploadCI('profile_image',$path_folder,$newname);
			$array["profile_image"]= $path_folder.'/'.$newname;
			}
			if(isset($_POST['password']) && $_POST['password'] !="" ){  
				$array["password"]= $_POST['password'];
				}
		$this->db->where('id', $_SESSION["user_login"]["id"]);
		$query =  $this->db->update("users", $array);
		if($query){
			
			$_SESSION["msg"] = "Profile Updated";
			redirect('profile', 'refresh');
		}else {
			echo "Error Occurs";
		}
	// }else{
	// 	$_SESSION["error"] = "Please checked the CAPTCHA to verify";
	// 	redirect('profile', 'refresh');
	// 	}

	}
	public function spectator(){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');

		$this->load->view('spectator');
		$this->load->view('includes/footer');
	}
	public function user_update(){
	// 	print_r($_POST);
    // die();
		$array = array(
			"first_name"=>$_POST["first_name"],
				"last_name"=>$_POST["last_name"],
				"gender"=>$_POST["gender"],
				"dob"=>$_POST["dob"],
				"country"=>$_POST["country"],
				"address"=>$_POST["address"],
				"address2"=>$_POST["address2"],
				"city"=>$_POST["city"],
				"state"=>$_POST["state"],
				"zip"=>$_POST["zip"],
				"phone"=>$_POST["phone"],
				"email"=>$_POST["email"],
				"status"=>$_POST["status"],
		);

		if(isset($_FILES['profile_image']) && $_FILES['profile_image']['name']!=''){  
			$first_name = str_replace(" ","-",$this->input->post("first_name"));
			$date = date('Ymdhis');
			$path_folder = 'assets/images/profile_img/';
			
		$file_ext2 = pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION);
			$newname = str_replace(" ","_",$this->input->post("first_name")).$date.'.'.$file_ext2;
			$image_new=fileuploadCI('profile_image',$path_folder,$newname);
			$array["profile_image"]= $path_folder.'/'.$newname;
			}
			if(isset($_POST['password']) && $_POST['password'] !="" ){  
			$array["password"]= $_POST['password'];
			
			}
			if(isset($_POST['username']) && $_POST['username'] !="" && $_SESSION["user_login"]["username"] !=$_POST['username']){  
			
				$array["username"]= $_POST['username'];
				$array = array("username"=>$_POST['username']);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($array);
		$query = $this->db->get();
		$row = $query->result_array();
				if(!empty($row)){
				$_SESSION["msg1"] = 'Username is already exist! Please enter a unique name';
				redirect('users/edit/'.$_SESSION["user_login"]["id"], 'refresh');
				}
			
			}
				
		$this->db->where('id', $_POST['id']);
		$query =  $this->db->update("users", $array);
		if($query){
			redirect('users', 'refresh');
		}else {
			echo "Error Occurs";
		}

	}
	public function user_edit($slug2){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');
		// $array = array("id"=>$slug);
		// print_r($slug2);
		// die();
		$array = array("id"=>$slug2);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($array);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["users"] = $row;
		$this->load->view('user_edit',$data);
		$this->load->view('includes/footer');
	}
	public function user_status(){
		$insertid = $_POST["id"];
		$array = array(
			"status"=>$_POST["value"],
			);
		$this->db->where('id', $insertid);
    	$query = $this->db->update("users", $array);
		if ($query) {
			print("success");
		}else {
			print("error");
		}
	}
	public function vips(){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');

		$this->load->view('vips');
		$this->load->view('includes/footer');
	}
	public function users(){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');

		$this->load->view('user_management');
		$this->load->view('includes/footer');
	}
	public function view(){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');

		$this->load->view('event_view_table');
		$this->load->view('includes/footer');
	}
	public function waiver(){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');
		$this->db->select('*');
		$this->db->from('waiverform');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["events"] = $row;
		$this->load->view('waiver_form',$data);
		$this->load->view('includes/footer');
	}
	public function contact(){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');
		$this->db->select('*');
		$this->db->from('contactform');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["contact"] = $row;
		$this->load->view('contact_form',$data);
		$this->load->view('includes/footer');
	}
	public function about(){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/navbar');
		$this->db->select('*');
		$this->db->from('aboutform');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["about"] = $row;
		$this->load->view('about_form',$data);
		$this->load->view('includes/footer');
	}
	public function waiver_view($slug=null){
		$this->load->view('includes/navbar_athlete');
		$this->db->select('*');
		$this->db->from('waiverform');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["events"] = $row;
		$data["slug"] = $slug;
		$this->load->view('waiver_form_view',$data);
		$this->load->view('includes/footer');
	}
	public function about_view($slug=null){
		$this->load->view('includes/navbar_athlete');
		$this->db->select('*');
		$this->db->from('aboutform');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["about"] = $row;
		$data["slug"] = $slug;
		$this->load->view('about',$data);
		$this->load->view('includes/footer');
	}
	public function contact_view($slug=null){
		$this->load->view('includes/navbar_athlete');
		$this->db->select('*');
		$this->db->from('contactform');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();
		$data["contact"] = $row;
		$data["slug"] = $slug;
		$this->load->view('contact',$data);
		$this->load->view('includes/footer');
	}
	
	public function waiver_form(){
		$array = array(
				"text"=>$_POST["text"]
			);
			$this->db->where('id', 1);
			$this->db->update("waiverform", $array);
			// $query = $this->db->insert("waiverform",$array);
			if($query){
				echo 1;
			}
	}
	public function about_form(){
		$array = array(
				"text"=>$_POST["text"]
			);
			$this->db->where('id', 1);
			$this->db->update("aboutform", $array);
			// $query = $this->db->insert("waiverform",$array);
			if($query){
				echo 1;
			}
	}
	public function contact_form(){
		$array = array(
				"text" => $_POST["text"]
			);
			$this->db->where('id', 1);
			$this->db->update("contactform", $array);
			// $query = $this->db->insert("waiverform",$array);
			if($query){
				echo 1;
			}
	}
	public function remove_user($slug=null){
		$this -> db -> where('id', $slug);
		$query	= $this -> db -> delete('users');
		redirect('users', 'refresh');
	}
	public function export_csv(){ 
		/* file name */
		// echo "<pre>";
		// $q_data=[];
		$filename = 'users_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   /* get data */
	   $this->db->select('(SELECT event_name FROM `events` where id = event_enrolls.event_id ) as event_name ,event_id
	   ,`first_name`, `last_name`, `gender`, `dob`, `country`, `address`, `address2`, `city`, `state`, `zip`, `phone`, `email`,`total_amt`');
		$this->db->from('event_enrolls');
		if (isset($_POST['id']) && $_POST['id'] !="") {
			$id = $_POST['id'];
			$this->db->where('(SELECT event_name FROM `events` where id = event_enrolls.event_id ) = "'.$id.'"');
		}
		$query = $this->db->get();
		$usersData = $query->result_array();
		$file = fopen('php://output','w');
		$header = array("Event","First_name", "Last_name", "Gender", "DOB", "Country", "Address", "Address2", "City", "State", "Zip", "Phone", "Email","Total amount","Question 1","Answer 1","Question 2","Answer 2","Question 3","Answer 3","Question 4","Answer 4","Question 5","Answer 5","Question 6","Answer 6","Question 7","Answer 7","Question 8","Answer 8","Question 9","Answer 9","Question 10","Answer 10"); 
		fputcsv($file, $header);
		foreach ($usersData as $key=>$line){ 
			$sql = "SELECT (SELECT question FROM `questions` where id = answers.question_id ) as question , answer FROM answers where question_id in (select id from questions where event_id =".$line['event_id'].")";
			$query = $this->db->query($sql);
			$data = $query->result_array();
			foreach ($data as $key => $data1) {
					array_push($line,$data1["question"]);
					array_push($line,$data1["answer"]);
			}
			 unset($line['event_id']);
			fputcsv($file,$line);
		}
		fclose($file); 
		exit; 
	}
	public function temp_get(){
		// echo "<pre> ";
		// print_r($_POST);
		// die;
		$this->db->select('*');
		$this->db->where('user_id', $_POST["id"]);
		$this->db->where('event_id', $_POST["event_id"]);
		$this->db->from('temp_event_enrolls');
		// $this->db->order_by('id','desc');
		// $this->db->limit(1);
		$query = $this->db->get();
		$row = $query->result_array();
		
		if (count($row)>0) {
			// print_r($row[0]);
			print_r(json_encode($row[0]));
			die;
		}
		
	}
	public function temp_enroll_process(){
		// echo "<pre> ";
		// print_r($_POST);
		// print_r($_FILES);
		// die;
		// print_r("demo");
		$first_name = str_replace(" ","-",$this->input->post("first_name"));
		$date = date('Ymdhis');
		$path_folder = 'assets/temp/users/'.$first_name.''.$date;
		if (!is_dir($path_folder)) {
		    mkdir($path_folder, 0777, TRUE);
		}
		$array = array(
			"event_id"=>$_POST["event_id"],
				"first_name"=>$_POST["first_name"],
				"last_name"=>$_POST["last_name"],
				"gender"=>$_POST["gender"],
				"dob"=>$_POST["dob"],
				"country"=>$_POST["country"],
				"address"=>$_POST["address"],
				"address2"=>$_POST["address2"],
				"city"=>$_POST["city"],
				"state"=>$_POST["state"],
				"zip"=>$_POST["zip"],
				"phone"=>$_POST["phone"],
				"email"=>$_POST["email"],
				"created_at"=>date('Y-m-d H:i:s'),
				"status"=>0,
				"user_id"=>$_SESSION["user_login"]["id"],
				);
		$array["room_add_enroll"]=[];
		$array["answer"]=[];
		if (isset($_FILES['docs']) && $_FILES['docs']['name']!='')
		{
		$file_ext3 = pathinfo($_FILES["docs"]["name"], PATHINFO_EXTENSION);
		$newname2 = str_replace(" ","-",$this->input->post("first_name")).'docs.'.$file_ext3;
		$image_new=fileuploadCI('docs',$path_folder,$newname2);
		$array["docs"]=$path_folder.'/'.$newname2;
		}

		if (isset($_FILES['audio']) && $_FILES['audio']['name']!='')
		{
		$file_ext3 = pathinfo($_FILES["audio"]["name"], PATHINFO_EXTENSION);
		$newname2 = str_replace(" ","-",$this->input->post("first_name")).'audio.'.$file_ext3;
		$image_new=fileuploadCI('audio',$path_folder,$newname2);
		$array["audio"]=$path_folder.'/'.$newname2;
		}

		if (isset($_FILES['videos']) && $_FILES['videos']['name']!='')
		{
		$file_ext4 = pathinfo($_FILES["videos"]["name"], PATHINFO_EXTENSION);
		$newname3 = str_replace(" ","-",$this->input->post("first_name")).'videos.'.$file_ext4;
		$image_new=fileuploadCI('videos',$path_folder,$newname3);
		$array["videos"]=$path_folder.'/'.$newname3;
		}
		if (isset($_FILES['profile_image']) && $_FILES['profile_image']['name']!='')
		{
		$file_ext2 = pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION);
		$newname = str_replace(" ","-",$this->input->post("first_name")).'profile_image.'.$file_ext2;
		$image_new =fileuploadCI('profile_image',$path_folder,$newname);
		$array["profile_image"]=$path_folder.'/'.$newname;
		
		}else{
			$array["profile_image"]=$_POST["profile_img"];
		}

		if (isset($_POST["grouping"]) && isset($_POST["position"]))
		{
			$array["grouping"]=$_POST["grouping"];
			$array["position"]=$_POST["position"];
			$array["ptitle"]=$_POST["ptitle"];
			$array["major"]=$_POST["major"];
			$array["biodoc"]=$_POST["biodoc"];
			$array["websites"]=$_POST["websites"];
		}
		if (isset($_POST["health"]) && isset($_POST["dietary"]))
		{
			$array["dietary"]=$_POST["dietary"];
			$array["health"]=$_POST["health"];
		}
		if (isset($_POST["emg_contact_name"]) && isset($_POST["emg_contact_relation"]))
		{
			$array["emg_contact_name"]=$_POST["emg_contact_name"];
			$array["emg_contact_relation"]=$_POST["emg_contact_relation"];
			$array["emg_contact"]=$_POST["emg_contact"];
			$array["emg_contact_email"]=$_POST["emg_contact_email"];
		}
		if (isset($_POST["event_enroll"]))
		{
			$array["event_enroll"]=json_encode($_POST["event_enroll"]);
		}
		if (isset($_POST["full_total_amt"]) && $_POST["full_total_amt"] !="")
		{
			$array["total_amt"]=$_POST["full_total_amt"];
		}
		if (isset($_POST["hotel_enroll"]))
		{
			$array["hotel_enroll"]=$_POST["hotel_enroll"];
		}
		if (isset($_POST["answer"])){
			foreach($_POST['answer']as $key_id=>$value3){
				$array['answer'][$key_id]= [
					"question_id"=>$_POST['question'][$key_id] ,
					"answer"=>$_POST['answer'][$key_id]
				];}
			}
				
			if (isset($_POST["hotel_enroll"]) && $_POST['hotel_enroll']==1){

			if (isset($_POST['checkin']) && isset($_POST['checkout'])) {
			foreach($_POST['checkin'] as $key2=>$value2){
				$array['room_add_enroll'][$key2] = array(
					"bed_charges"=>$_POST['bed_charges'][$key2],
					"checkin"=>$value2,
					"checkout"=>$_POST['checkout'][$key2],
					"total_night"=>$_POST['tnight'][$key2],
					"total_price"=>$_POST['room_cost'][$key2]);

				if (isset($_POST["star_select"][$key2])) {
					$array['room_add_enroll'][$key2]["star_select"]=$_POST["star_select"][$key2];
				}
				if (isset($_POST["meals"][$key2])) {
					$array['room_add_enroll'][$key2]["meal_fess"]=$_POST["meals"][$key2];
				}
				if (isset($_POST['breaKfast'][$key2])) {
					$array['room_add_enroll'][$key2]["bkfst_fess"]=$_POST["breaKfast"][$key2];
				}
				if (isset($_POST['person_type'][$key2])) {
					foreach($_POST['person_type'][$key2] as $key3=>$value3){
						$array['room_add_enroll'][$key2]["room_person"][$key3] = array(
							"person_type"=>$value3,
							"fname"=>$_POST['fname'][$key2][$key3],
							"lname"=>$_POST['lname'][$key2][$key3],
							"age"=>$_POST['age'][$key2][$key3]);
					}
				}
			}
		}
	}
		$data_t =	 json_encode($array['answer']);
		$array['answer'] =$data_t;
		$data_t =	 json_encode($array['room_add_enroll']);
		$array['room_add_enroll'] =$data_t;
		// print_r($_POST['fname']);
		// print_r($array);
		
		// die;
	if ($_POST["temp_data_id"] =='') {
		$this->db->insert("temp_event_enrolls",$array);
		 echo $this->db->insert_id();
	}else {
		$this->db->where('id', $_POST["temp_data_id"]);
		$this->db->update("temp_event_enrolls", $array);
		echo $_POST["temp_data_id"];
	}
	}
		
}
