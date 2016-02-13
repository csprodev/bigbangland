<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seller extends MY_Controller {

	public function index()
	{
		$this->load->helper('formlibrary');
		$this->load->model('sellermodel');
		
		
		$this->RenderView('seller');
	}

	function delete()
	{
		print_r('delete');die();
	}

	function edit($email)
	{
		print_r($email);die();
		$this->load->model('usersmodel');
		if(isset($_POST['btnsubmit']))
		{
			$this->usersmodel->update($_POST);
			redirect('login/success');
		}
		$data['userdata'] = $this->usersmodel->GetByCode($email);
		$data['action'] = 'edit';
		
		$this->RenderView('register',$data);
	}

	function add()
	{
		$this->load->model('usersmodel');
		if(isset($_POST['btnsubmit']))
		{
			$this->usersmodel->insert($_POST);
			redirect('login/success');
		}
		$data['action'] = 'add';
		// print_r($user_name);die();
		
		$this->RenderView('register',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */