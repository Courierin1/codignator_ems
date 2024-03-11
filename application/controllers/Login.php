<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		//
    }
	public function index($slug=null)
	{
		if(isset($slug)){
			$data["slug"] = $slug;
			$this->load->view('login',$data);
		}
		else{
			$this->load->view('login');
		}
		/*die();
		if(isset($slug)){
			$data["slug"] = $slug;
			$this->load->view('login',$slug);
		}
		else{
			$this->load->view('login');
		}*/
	}
	public function login_process(){
		// dd($_POST);
		// if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="") {
			$array = array(
				"username"=>$_POST["username"],
				"password"=>$_POST["password"],
				"status"=>1,
				);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($array);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 ){
        	$row = $query->row_array();
        	$this->session->set_userdata("user_login",$row);
        	redirect('home', 'refresh');
    	}else{
			redirect('login/failed', 'refresh');
		}
		// }else{
		// 	redirect('login/failed1', 'refresh');
		// }
	}
	public function register($slug1=null,$slug2=null)
	{
		
		if(isset($slug1)){
			$data["error"] = $slug2;
			$this->load->view('register',$data); 
		}
		else{
			$this->load->view('register'); 
		}
		                                                        
	}
	public function forget_password()
	{
		// if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="") {
		
		
		$token = bin2hex(random_bytes(16)); 
		$email = $_POST["email"];
		$sql = "select * from users where email='$email' ";  
		$query = $this->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			$html ='
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
												<td align="center" valign="middle" class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
												<h3 style="color:#000;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">Forget Password</h3>
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
						<td align="center" valign="middle" class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;background:rgb(46, 125, 50);">
						<a style="color:#fff;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;" href="'.base_url().'new_password?token='.$token.'" target="_blank">Reset Password</a>
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
			$this->email->to($email);
			$this->email->bcc('asad.raza@ossols.com');
			$this->email->subject('Forget Password');
			$this->email->message($html);	
			$mail =$this->email->send();
				if ($mail) {
					$array = array("token"=>$token);
			$id = array("email"=>$email);
			$this->db->where($id);
			$this->db->update("users", $array);
					$_SESSION["login_msg"] = "Please check your email and click in reset password Button!";

				}else {
					$_SESSION["login_msg"] = "Some thing went wrong!";	
				}
				echo '<script>location.replace("'.base_url().'login")</script>';
				
		}else {
			$_SESSION["login_msg"] = "Email is not exist!";
			echo '<script>location.replace("'.base_url().'login")</script>';
		}
	}
	public function new_password()
	{
		$this->load->view('reset_password');                                                     
	}
	public function password_reset()
	{
		// $_SESSION["login_msg"] = "Please checked the CAPTCHA to verify!";
		// if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="") {
			$id = array("token"=>$_POST['token_key']);
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($id);
			$query = $this->db->get();
			$row = $query->result_array();
			if(!empty($row)){
			$array = array("password"=>$_POST['password']);
			$this->db->where($id);
			$query = $this->db->update("users",$array);
			
			$_SESSION["login_msg"] = "Your Password is Updated, Please try to check";
			// }else {
			// 	$_SESSION["login_msg"] = "Some thing went wrong!";	
			// }	
			  
			
		redirect('login', 'refresh'); 
			                                     
		}
		
		redirect('new_password?token='.$_POST['token_key'], 'refresh'); 
	}
	public function register_process(){
		// if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="") {
		$username = $_POST["username"];
		$email = $_POST["email"];
		$sql = "select * from users where username='$username'";
		$query = $this->db->query($sql);
		$row = $query->result_array();


		$sql2 = "select * from users where email='$email'";
		$query2 = $this->db->query($sql2);
		$row2 = $query2->result_array();
		if(!empty($row)){
			redirect('register/error/1', 'refresh');
		}
		if(!empty($row2)){
			redirect('register/error/2', 'refresh');
		}
		else{
			$array = array(
				"username"=>$_POST["username"],
				"password"=>$_POST["password"],
				"email"=>$_POST["email"],
				"roleid"=>2,
				// "createdat"=>date("Y-m-d H:i:s"),
				);
			$query = $this->db->insert("users",$array);
			if($query){
				$_SESSION["login_msg"] = "Your account has been created!";
				redirect('login/success', 'refresh');
			}
			else{
				redirect('register/error/2', 'refresh');
			}
		}
	// }else{
	// 	redirect('register/error/3', 'refresh');
	// }
	}
	public function logout(){
		$this->session->sess_destroy();
        redirect('login', 'refresh');
	}
	
}
