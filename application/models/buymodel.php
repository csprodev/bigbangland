<?php
class Buymodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Get()
	{
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function GetByCode($email='')
	{
		// print_r($email);die(); 
		$this->db->where('email',$email);
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Update_config($post)
	{
		// print_r($post);die();
		$this->db->trans_start();
		$this->db->set('address',$post['address']);
		$this->db->set('phone1',$post['phone1']);
		$this->db->set('phone2',$post['phone2']);
		$this->db->set('information',$post['information']);
		$this->db->set('about_us',$post['about_us']);
		$this->db->set('update_date',date('Y-m-d'));
		$this->db->update('config');
		$this->db->trans_complete();
	}

	function Update($data,$name)
	{
		$this->db->trans_start();
		// $tipe = '';
		// if($post['user_type'] == '1')
		// 	$tipe = 'Seller';
		// else
		// 	$tipe = 'Buyer';
		// $user_code = $tipe.'003';
		// $this->db->set('user_code',$user_code);
		$this->db->set('user_name',$post['user_name']);
		if($data['password'] != '')
			$this->db->set('password',md5($data['password']));
		$this->db->set('id_no',$post['id_no']);
		$this->db->set('user_type',$post['user_type']);
		$this->db->set('address_by_id',$post['address_by_id']);
		$this->db->set('province_by_id',$post['province_by_id']);
		$this->db->set('city_by_id',$post['city_by_id']);
		$this->db->set('address',$post['address']);
		$this->db->set('province',$post['province']);
		$this->db->set('city',$post['city']);
		$this->db->set('phone',$post['phone']);
		$this->db->set('mobile_phone',$post['mobile_phone']);
		$this->db->set('email',$post['email']);
		$this->db->where('user_code',$post['user_code']);
		$this->db->update('users');
		$this->db->trans_complete();
	}

	function Delete($user_code)
	{
		$this->db->trans_start();
		$this->db->where('user_code',$user_code);
		$this->db->delete('users');
		$this->db->where('user_code',$user_code);
		$this->db->delete('user_access');
		$this->db->trans_complete();
	}

	function GetSetting()
	{
		$res = $this->db->get('config');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

}
?>