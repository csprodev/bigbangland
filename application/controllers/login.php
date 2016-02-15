<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		$this->load->helper('formlibrary');
		$this->load->model('usersmodel');
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
		$this->load->model('usersmodel');
		if(isset($_POST['btnsubmit']))
		{
			$this->usersmodel->insert($_POST);
			redirect('login/success');
		}
		$data['action'] = 'add';
		
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */