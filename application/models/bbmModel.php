
<?php

class bbmModel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
   

    function getCorousalData(){
    	$q = $this->db->select('*')
	    		->from('tbl_home_page')
	    		->get()
	    		->result_array();

	    return $q;
    }

    function getTeamMembersInfo(){
    	$q = $this->db->select('*')
	    		->from('members')
	    		->get()
	    		->result_array();

	    return $q;
    }

    function getServeyData(){
    	$q = $this->db->select('*')
	    		->from('tbl_services')
	    		->order_by('id','desc')
	    		->get()
	    		->result_array();

	    return $q;
    }
    function getTendersData(){
    	$q = $this->db->select('*')
	    		->from('tbl_portfolio')
	    		->order_by('id','desc')
	    		->get()
	    		->result_array();

	    return $q;
    }

    function getProfileData(){
    	$q = $this->db->select('*')
	    		->from('my_profile')
	    		//->order_by('id','desc')
	    		->get()
	    		->row();

	    return $q;
    }

    function deleteParticularFormData($formName,$id){
    	if($formName == 'services'){
    		$tableName = 'tbl_services';
    		
    	}else if($formName == 'about'){
    		$tableName = 'members';
    		
    	}else if($formName == 'homePage'){
    		$tableName = 'tbl_home_page';
    		
    	}else if($formName == 'tender'){
    		$tableName = 'tbl_portfolio';
    		
    	}
    	$this->db->where('id',$id);
    	$this->db->delete($tableName);

    	//echo $this->db->last_query();exit;
    }
    function uploadAdminsInfo($data){
    	foreach ($data as $key => $value) {
			if(isset($key) && !empty($value)){
				$this->db->set($key,$value);
			}
		}
		$this->db->insert('tbl_services');
    }

    function insertHomePageData($data){
    	foreach ($data as $key => $value) {
			if(isset($key) && !empty($value)){
				$this->db->set($key,$value);
			}
		}
		$this->db->insert('tbl_home_page');
    }

    function insertMembersInfo($data){
    	foreach ($data as $key => $value) {
			if(isset($key) && !empty($value)){
				$this->db->set($key,$value);
			}
		}
		$this->db->insert('members');

		//print_r($this->db->last_query());exit;
    }

    function insertMyProfileInfo($data){
    	foreach ($data as $key => $value) {
			if(isset($key) && !empty($value)){
				$this->db->set($key,$value);
			}
		}
		$this->db->insert('my_profile');
		//print_r($this->db->last_query());exit;
    }

    function insertTendersInfo($data){
    	foreach ($data as $key => $value) {
			if(isset($key) && !empty($value)){
				$this->db->set($key,$value);
			}
		}
		$this->db->insert('tbl_portfolio');


    }

    function getSpecificData($formName){
    	if($formName == 'services'){
    		$tableName = 'tbl_services';
    		$data['tableHeades'] = array('Si.No','Title','Short Desc','Desc');
    	}else if($formName == 'about'){
    		$tableName = 'members';
    		$data['tableHeades'] = array('Si.No','Title','Short Desc','Desc');
    	}else if($formName == 'homePage'){
    		$tableName = 'tbl_home_page';
    		$data['tableHeades'] = array('Si.No','Title','Short Desc','Desc');
    	}else if($formName == 'tender'){
    		$tableName = 'tbl_portfolio';
    		$data['tableHeades'] = array('Si.No','Title','Short Desc','Desc');
    	}
    	else if($formName == 'profile'){
    		$tableName = 'my_profile';
    		$data['tableHeades'] = array('Si.No','Title','Short Desc','Desc');
    	}
    	$q = $this->db->select('*')
    				->from($tableName)
    				->order_by('id','desc')
    				->get()
    				->result_array();

    	$data['resultData'] = $q;
    	//print_r($data);exit;
    	return $data;
    }




   }