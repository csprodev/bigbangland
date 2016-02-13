<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	public $menuActive = '';

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->Category = array(
            '0'=>'Kategori',
            'bw'=>'Baju Wanita',
            'bp'=>'Baju Pria',
            'cw'=>'Celana Wanita',
            'cp'=>'Celana Pria'
            );
	}

	function _setMenuActive($str)
	{
		$this->menuActive=$str;
	}

	function _getConfigMail($emailtype)
	{
	  	$config['protocol']     = 'smtp';
		$config['smtp_host']    = SMTP_HOST;
		$config['smtp_port']    = SMTP_PORT;
		$config['smtp_timeout'] = '30';
		$config['smtp_user']    = SMTP_USER;
		$config['smtp_pass']    = SMTP_PASSWORD;
		$config['charset']      = 'utf-8';
		$config['newline']      = "\r\n";
		$config['mailtype']      = $emailtype;
		return $config;
	}

	function _sendSingleEmail($to, $sbj, $msg, $type='html')
	{
		$this->load->library('email');
		$this->email->initialize($this->_getConfigMail($type));
		$this->email->from(SMTP_USER, EMAIL_NAME);
	  	$this->email->to($to);
		$this->email->subject($sbj);
		$this->email->message($msg);
		return $this->email->send();
	}

	function _sendEmail($to, $sbj, $msg, $type, $queue=false)
	{
		if(!is_array($to))
		{
			if(!$queue)
			{
				$this->_sendSingleEmail($to, $sbj, $msg, $type, $quee);
			}
			else
			{
				//set email to database
			}
		}
		else
		{
			if(!$queue)
			{
				foreach ($to as $t) 
				{
					$this->_sendSingleEmail($t, $sbj, $msg, $type, $quee);
				}
			}
			else
			{
				foreach ($to as $t) 
				{
					//set email to database
				}
				
			}
		}
		return;
	}

	public function RenderHeader()
	{
		$this->load->model('usersmodel','user');
		$dataHeader = array();
		$email = $this->session->userdata('email');
		if($email != '')
			$dataHeader['users'] = $this->user->GetByCode($email);
		$this->template->write_view('header', 'template/header',
			$dataHeader
		);
	}

	public function RenderFooter($data = array())
	{
		$this->template->write_view('footer', 'template/footer',
			$data
		);
	}

    public function Init($data)
    {
        if(!isset($data['title']))
        {
            $data['title'] = 'Bigbangland';
        }
    
        $this->session->set_userdata('last_url',$this->uri->uri_string.'?'.$_SERVER['QUERY_STRING']);
        $this->RenderHeader($data);
        $this->RenderFooter($data); 
    }

    public function RenderView($str,$data= array())
    {
        $this->Init($data); 
        $email = $this->session->userdata('email');
        if($email != '')
            $data['users'] = $this->user->GetByCode($email);
        $this->template->write_view('content', $str, $data);
        $this->template->render();
    }

	public function _setRenderView($str,$data= array())
	{
		$this->session->set_userdata('last_url',$this->uri->uri_string.'?'.$_SERVER['QUERY_STRING']);
		if(!isset($data['active_page']))
			$data['active_page'] = 'home';
		$this->RenderHeader($data);	
		$this->RenderNavigation($data);		
		$this->RenderFooter($data);		
		$this->template->write_view('content', $str, $data);
		
		$this->template->render();
	}

	public function _setRenderViewWithSub($subtemp,$str,$data= array())
	{
		$this->session->set_userdata('last_url',$this->uri->uri_string.'?'.$_SERVER['QUERY_STRING']);
		if(!isset($data['active_page']))
			$data['active_page'] = 'home';
		if(!isset($data['subActive']))
			$data['subActive'] = '';
		$this->RenderHeader($data);
		$this->RenderNavigation($data);	
		$this->RenderFooter($data);		
		$data['subcontent'] = $this->load->view($str,$data,true);
		$this->template->write_view('content', $subtemp, $data);
		$this->template->render();
	}

	function _SetTemplate($template)
	{
	  $this->template->set_master_template($template);
	}

	function _secure()
	{

	}

	function sanitize($someString)
 	{
  		return $this->db->escape_str(htmlspecialchars(stripslashes(trim($someString)), ENT_QUOTES));
 	}

 	 function cleanstring($someString)
	 {
		  $someString = str_replace("\t",'',$someString);
		  $someString = str_replace("\r",'',$someString);
		  $someString = str_replace("\n",'',$someString);
		  return $someString;
	 }

 	function populate_post()
    {
        $data = array();
        foreach($_POST as $key => $value)
        {
            if($key != 'btnSubmit' )
            	if(!is_array($value))
                	$data[$key] = $this->sanitize($value);
                else
                	$data[$key] = $value;
        }
        return $data;
    }

    function return_empty()
    {    
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => 0,
            "iTotalDisplayRecords" => 0,
            "aaData" => array()
        );
        return array('output'=>$output,'datares'=>array() );
    }
    
    function getdata($aColumns = array(),$sIndexColumn = '',$sTable ='',$add_where = '')
    {
        if(empty($aColumns) || $sIndexColumn == '' || $sTable == '')
            return $this->return_empty();
        $sLimit = "";
    	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    	{
    		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
    			mysql_real_escape_string( $_GET['iDisplayLength'] );
    	}
    	
    	/*
    	 * Ordering
    	 */
        $sOrder = '';
    	if ( isset( $_GET['iSortCol_0'] ) )
    	{
    		$sOrder = "ORDER BY  ";
    		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
    		{
    			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
    			{
    				//custom from here
                    /*$add = false;
                    if($controller == 'project')
                    {
                        if($aColumns[ intval( $_GET['iSortCol_'.$i] ) ] == 'status')
                        {   
        				    $sOrder .= "FIELD(status,'Open','Close')".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
                            $add = true;
                        }
                    }
                    else if($controller == 'ticket')
                    {
                        if($aColumns[ intval( $_GET['iSortCol_'.$i] ) ] == 'status')
                        {   
        				    $sOrder .= "FIELD(status,'Open','On Progress','Wait for Patch','Close')".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
                            $add = true;
                        }
                        else if($aColumns[ intval( $_GET['iSortCol_'.$i] ) ] == 'priority')
                        {
        				    $sOrder .= "FIELD(priority,'Urgent','High','Normal','Low')".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
                            $add = true;
                        }
                    }
                    //end here
                    if(!$add)*/
    				    $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
    				 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
    			}
    		}
    		
    		$sOrder = substr_replace( $sOrder, "", -2 );
    		if ( $sOrder == "ORDER BY" )
    		{
    			$sOrder = "";
    		}
    	}
        
    	$sWhere = "";
    	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    	{
    		$sWhere = "WHERE (";
    		for ( $i=0 ; $i<count($aColumns) ; $i++ )
    		{
    			//check for date field start here
                $datefield = array('last_login','start_date','create_date');
                if(in_array($aColumns[$i],$datefield))
                    $sWhere .= "DATE_FORMAT(".$aColumns[$i].",'%d %b %Y') LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
                else   		  
                    $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
                //end here
    		}
    		$sWhere = substr_replace( $sWhere, "", -3 );
    		$sWhere .= ')';
    	}
    	
    	/* Individual column filtering */
    	for ( $i=0 ; $i<count($aColumns) ; $i++ )
    	{
    		if ( isset($_GET['bSearchable_'.$i]) && ($_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ))
    		{
    			if ( $sWhere == "" )
    			{
    				$sWhere = "WHERE ";
    			}
    			else
    			{
    				$sWhere .= " AND ";
    			}
    			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
    		}
    	}
        if($add_where != '')
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= " ".$add_where." ";
		}
    	/*
    	 * SQL queries
    	 * Get data to display
    	 */
    	$sQuery = "
    		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
    		FROM   $sTable
    		$sWhere
    		$sOrder
    		$sLimit
    	";
    	
        $datares = $this->db->query($sQuery);
        
    	/* Data set length after filtering */
        
        
    	$sQuery = "
    		SELECT FOUND_ROWS() as count
    	";
        
        $datacount = $this->db->query($sQuery);
        $iFilteredTotal = $datacount->row()->count;
    	
    	/* Total data set length */
    	
		if($add_where != '')
		{
			$sQuery = "
				SELECT COUNT(".$sIndexColumn.") as count
				FROM   $sTable ".$sWhere;
		}
		else
		{
			$sQuery = "
				SELECT COUNT(".$sIndexColumn.") as count
				FROM   $sTable ";
		}
        
        $datacount = $this->db->query($sQuery);
        $iTotal = $datacount->row()->count;
    	
    	
    	/*
    	 * Output
    	 */
    	$output = array(
    		"sEcho" => isset($_GET['sEcho']) ? intval($_GET['sEcho']) : 0,
    		"iTotalRecords" => $iTotal,
    		"iTotalDisplayRecords" => $iFilteredTotal,
    		"aaData" => array()
    	);
    	        
        return array('output'=>$output,'datares'=>$datares);
    }
}

/* End of file masterTemplate.php */
/* Location: ./application/controllers/masterTemplate.php */