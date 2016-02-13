<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index()
	{
		$this->load->helper('formlibrary');
		$this->load->model('usersmodel');
		
		
		$this->RenderView('users');
	}

	public function datasource()
	{        
		$aColumns = array('id','user_name','user_type','id_no','address_by_id','province_by_id','city_by_id','phone','mobile_phone','email');
		$sIndexColumn = 'email';
		$sTable = "users";
		$add_where = '';
		$data = $this->getdata($aColumns,$sIndexColumn,$sTable,$add_where);
		$output = $data['output'];
		$datares = $data['datares'];
		if(!empty($datares))
		{
			foreach($datares->result_array() as $aRow)
			{
				$row = array();
				foreach($aColumns as $c)
				{
					if($c == 'province_by_id' || $c == 'city_by_id' || $c == 'id')
					{

					}
					else if($c == 'user_type')
					{
						if($aRow['user_type'] == '1')
						{
							$row[] = 'Seller';
						}
						else if($aRow['user_type'] == '9')
						{
							$row[] = 'Admin';
						}
						else
						{
							$row[] = 'Buyer';
						}
					}
					else if($c == 'address_by_id')
					{
						$row[] = $aRow['address_by_id'].' '.$aRow['city_by_id'].' '.$aRow['province_by_id'];
					}
					else if($c == 'email')
					{
						$row[] = $aRow[$c];
            			$row[] = '<a href= '.site_url().'Users/Edit/'.$aRow['id'].'><button class="btnEdit" title="Edit">Edit</button></a>';
						$row[] = '<button class="btnDelete" data="'.$aRow['id'].'" title="Delete">Delete</button>';
					}
					else
						$row[] = $aRow[$c];
				}
				$output['aaData'][] = $row;
			}
		}
		echo json_encode($output);
	}

	function delete($id)
	{
		$this->load->model('usersmodel');
		$this->usersmodel->delete($id);
		redirect('users');
	}

	function edit($id)
	{
		$this->load->model('usersmodel');
		if(isset($_POST['btnsubmit']))
		{
			$this->usersmodel->update($_POST);
			redirect('users');
		}
		$data['id'] = $id;
		$data['userdata'] = $this->usersmodel->GetById($id);
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