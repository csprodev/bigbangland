<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersmodel');
	}

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
		// $data_prof = $this->usersmodel->get_data_prof();
		if(isset($_POST['btnsubmit']))
		{

		}
		$data['action'] = 'add';
		// print_r($user_name);die();
		// $data['province'] = $data_prof;
		$this->RenderView('seller',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */