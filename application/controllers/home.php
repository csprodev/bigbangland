<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		// print_r('tes');die();
		$this->load->model('usersmodel');
		$this->RenderView('home');
	}

	public function aboutus()
	{
		// print_r('tes');die();
		$this->load->model('adminmodel');
		$this->load->model('usersmodel');

		$data['desc'] = $this->adminmodel->GetSetting();

		$this->RenderView('aboutus', $data);
	}

	public function blog()
	{
		// print_r('tes');die();
		$this->load->model('adminmodel');
		$this->load->model('usersmodel');

		$data['desc'] = $this->adminmodel->GetSetting();

		$this->RenderView('blog', $data);
	}

	public function blogsingle()
	{
		// print_r('tes');die();
		$this->load->model('adminmodel');
		$this->load->model('usersmodel');

		$data['desc'] = $this->adminmodel->GetSetting();

		$this->RenderView('blogsingle', $data);
	}

	public function terms()
	{
		// print_r('tes');die();
		$this->load->model('adminmodel');
		$this->load->model('usersmodel');

		$data['desc'] = $this->adminmodel->GetSetting();

		$this->RenderView('terms', $data);
	}

	public function contact()
	{
		// print_r('tes');die();
		$this->load->model('adminmodel');
		$this->load->model('usersmodel');

		$data['desc'] = $this->adminmodel->GetSetting();

		$this->RenderView('contactus', $data);
	}

	public function setting()
	{
		// print_r('tes');die();
		$this->load->model('adminmodel');
		$this->load->model('usersmodel');

		if(isset($_POST['btnsubmit']))
		{
			$post = $_POST;
			$this->adminmodel->Update_config($post);
			redirect('home/setting');
		}

		$data['conf'] = $this->adminmodel->GetSetting();

		$this->RenderView('setting', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */