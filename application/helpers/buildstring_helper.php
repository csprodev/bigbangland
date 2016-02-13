<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 



function BuildStringId($string_id,$addition = '')
{
	$string_id = strtolower(str_replace(' ','-',$string_id.$addition));
	$string_id = strtolower(str_replace('%','',$string_id));
	$string_id = strtolower(str_replace('(','',$string_id));
	$string_id = strtolower(str_replace(')','',$string_id));
	$string_id = strtolower(str_replace('/','',$string_id));
	$string_id = strtolower(str_replace('+','',$string_id));
	$ret = '';

	for($i=0;$i<strlen($string_id);$i++)
	{
		if(is_numeric($string_id[$i]))
		{
			$ret .= $string_id[$i];
		}
		if($string_id[$i] == '-')
		{
			$ret .= $string_id[$i];
		}
		if($string_id[$i] >= 'A' && $string_id[$i] <= 'Z')
		{
			$ret .= $string_id[$i];
		}
		if($string_id[$i] >= 'a' && $string_id[$i] <= 'z')
		{
			$ret .= $string_id[$i];
		}
	}
	return $ret;
}

function BuildUserStringId($_this,$name,$id=0)
{
	$_this->load->model('usermodel','user');
	$obj = null;
	$str_id = '';
	$addition = '';
	do{
		$str_id = BuildStringId($name,$addition);
		$obj = $_this->user->GetUserByStringId($str_id,$id);
		if($obj != null)
		{
			if($addition == '')
				$addition = 1;
			else
				$addition++;
		}
	}
	while($obj != null);
	return $str_id;
}

function BuildBarangStringId($_this,$name,$id=0)
{
	$_this->load->model('barangmodel','barang');
	$obj = null;
	$str_id = '';
	$addition = '';
	do{
		$str_id = BuildStringId($name,$addition);
		$obj = $_this->barang->GetBarangByStringId($str_id,$id);
		if($obj != null)
		{
			if($addition == '')
				$addition = 1;
			else
				$addition++;
		}
	}
	while($obj != null);
	return $str_id;
}

?>