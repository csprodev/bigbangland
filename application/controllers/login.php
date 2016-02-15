<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersmodel');
	}

	public function index()
	{
		$this->load->helper('formlibrary');
		if(isset($_POST['btnsubmit']))
		{
			$post = $_POST;
			$usr = $this->usersmodel->CheckLogin($post);
			if($usr != null)
			{
				$this->session->set_userdata('email',$usr->email);
				redirect('index.php/home');
			}
			else
			{
				$usrAdm = $this->usersmodel->CheckloginAdm($post);
				
				if($usrAdm != null)
				{
					$this->session->set_userdata('email',$usrAdm->email);
					// print_r($this->session->userdata('user_code'));die();
					redirect('index.php/home');
				}
				else
					$data['error'] = 'User Code atau Password salah!';
			}
		}
		
		$this->RenderView('login');
	}

	public function register()
	{
		$data_prof = $this->usersmodel->get_data_prof();

		if(isset($_POST['btnsubmit']))
		{	
			if($_POST['user_type'] == '1')
				$user_id = $this->usersmodel->get_user_id('01-');
			else
				$user_id = $this->usersmodel->get_user_id('02-');

			if(empty($user_id))
				$_POST['user_id'] = '0'.$_POST['user_type'].'-00001';
			else
			{
				$sub_ui = substr($user_id['user_id'], 3);
				$next_ui = intval($sub_ui) + 1;
				$next_ui = sprintf("%05d", $next_ui);

				$_POST['user_id'] = substr($user_id['user_id'], 0,3).$next_ui;
			}

			$this->usersmodel->insert($_POST);
			redirect('login/success');
		}

		$data['action'] = 'add';
		$data['userdata'] = '';
		$data['province'] = $data_prof;

		$this->RenderView('register',$data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

	function success()
	{		
		$this->RenderView('successreg');
	}

	public function ajax_value()
	{
		$next_id = $_REQUEST['next_id'];
		$content = "<option value=\"999\"> - - - </option>";
		
		$kp = $_REQUEST['pv'];

		$city = $this->usersmodel->get_city($kp);

		foreach($city as $key => $val)
		{
			$content.= "<option value='".$val['id_city']."'>".$val['city']."</option>";
		}

		echo $content;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */