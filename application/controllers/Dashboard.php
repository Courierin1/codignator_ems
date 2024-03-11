<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        //$this->session->set_userdata("is_login","1");
		if(isset($_SESSION["user_login"])){
			redirect('events', 'refresh');
		}
		else{
			redirect('login', 'refresh');
		}
		//
    }
	public function index()
	{
		$roleid = $_SESSION["user_login"]["roleid"];
		if($roleid==2){
			// $this->load->view('includes/navbar_athlete');
			// $this->db->select('*');
			// $this->db->from('events');
			// $this->db->where('event_status', 1);
			// $query = $this->db->get();
			// $row = $query->result_array();
			// $data["events"] = $row;
			// $this->load->view('user_events',$data);
			// $this->load->view('includes/footer');
			// redirect('events', 'refresh');

			// $this->load->view('includes/navbar_athlete');
			// $this->db->select('*');
			// $this->db->from('events');
			// $this->db->where('event_status', 1);
			// $query = $this->db->get();
			// $row = $query->result_array();
			// $data["events"] = $row;
			// $this->load->view('user_events',$data);
			// $this->load->view('includes/footer');
		}
		else{
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('includes/navbar');

			$this->load->view('dashboard');
			$this->load->view('includes/footer');

		}
	}
	public function events(){
		$this->load->view('includes/navbar_athlete');
			$this->db->select('*');
			$this->db->from('events');
			$this->db->where('event_status', 1);
			$query = $this->db->get();
			$row = $query->result_array();
			$data["events"] = $row;
			$this->load->view('user_events',$data);
			$this->load->view('includes/footer');
	

}
public function events_view(){
	$this->load->view('includes/header');
	$this->load->view('includes/sidebar');
	$this->load->view('includes/navbar');

	$this->load->view('user_events');
	$this->load->view('includes/footer');


}
	
}
