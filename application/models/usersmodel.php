<?php
class Usersmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function GenerateNo()
	{
		$this->db->order_by("substr(user_code,-3)","desc");
		$this->db->select("substr(user_code,-3) as no");
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return str_pad(intval($res->row()->no)+1,3,'0',STR_PAD_LEFT);
		else
			return '001';
	} 

	function CheckLogin($post)
	{
		// print_r($post);die();
		$this->db->where('email',$post['email']);
		$this->db->where('password',md5($post['password']));
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function CheckLoginAdm($post)
	{
		$this->db->where('email',$post['email']);
		$this->db->where('password',md5($post['password']));
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function GetCheckPass($email,$pass)
	{
		$this->db->where('email',$email);
		$this->db->where('password',md5($pass));
		$res = $this->db->get('users');//print_r($this->db->last_query());die();
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Get()
	{
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function UpdateLogin($user_code)
	{
		$this->db->trans_start();
		$this->db->set('user_code',$user_code);
		$this->db->set('table_name','');
		$this->db->set('action','Login');
		$this->db->set('action_date',date('Y-m-d H:i:s'));
		$this->db->insert('user_log');
		$this->db->trans_complete();
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

	function GetById($id='')
	{
		// print_r($id);die(); 
		$this->db->where('id',$id);
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Insert($post)
	{
		// print_r($post);die();
		$this->db->trans_start();
		// $tipe = '';
		// if($post['user_type'] == '1')
		// 	$tipe = 'Seller';
		// else
		// 	$tipe = 'Buyer';
		// $user_code = $tipe.'003';
		// $this->db->set('user_code',$user_code);
		$this->db->set('user_name',$post['user_name']);
		$this->db->set('password',md5($post['password']));
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
		$this->db->insert('users');
		$this->db->trans_complete();
	}

	function Update($post)
	{
		$this->db->trans_start();
		$this->db->set('user_name',$post['user_name']);
		if($post['password'] != '')
			$this->db->set('password',md5($post['password']));
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
		$this->db->where('id',$post['id']);
		$this->db->update('users');//print_r($this->db->last_query());die();
		$this->db->trans_complete();
	}

	function UpdatePassword($data)
	{
		$this->db->trans_start();
		$this->db->where('user_code',$data['user_code']);
		$this->db->set('password',md5($data['passwordNew']));
		$this->db->update('users');
		$this->db->trans_complete();
	}

	function Delete($id)
	{
		$this->db->trans_start();
		$this->db->where('id',$id);
		$this->db->delete('users');//print_r($this->db->last_query());die();
		$this->db->trans_complete();
	}

	function Gets()
	{
		$this->db->where('id', $this->session->userdata('id'));
		$res = $this->db->get('tb_users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

}
?>