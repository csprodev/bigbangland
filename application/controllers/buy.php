<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buy extends MY_Controller {

	public function index()
	{
		$this->load->helper('formlibrary');
		$this->load->model('buymodel');
		$this->add();
		
		// $this->RenderView('buy');
	}

	function delete()
	{
		print_r('delete');die();
	}

	function edit($email)
	{
		print_r($email);die();
		$this->load->model('buymodel');
		if(isset($_POST['btnsubmit']))
		{
			$this->buymodel->update($_POST);
			redirect('login/success');
		}
		$data['userdata'] = $this->buymodel->GetByCode($email);
		$data['action'] = 'edit';
		
		$this->RenderView('register',$data);
	}

	function add()
	{
		$this->load->model('buymodel');
		$data_prof = $this->buymodel->get_data_prof();
		if(isset($_POST['btnsubmit']))
		{
			$this->buymodel->insert($_POST);
			redirect('buy');
		}
		$data['action'] = 'add';
		// print_r($user_name);die();
		$data['province'] = $data_prof;
		
		$this->RenderView('buy',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */