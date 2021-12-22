
<?php

class loginModel extends CI_Model
{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    function ValidateUserAuthentication($data){
    	//print_r($data);exit;
    	/*$q = $this->db->query("SELECT 
    										Fld_UserId,
    										Fld_FirstName,
    										Fld_LastName,
    										Fld_Password
    								FROM
    										users
    								WHERE
    										Fld_UserId='".$data['username']."' and Fld_Password='".$data['password']."'");
    	//$result = $q->row();
    	return $result;*/
    	//$condition = "(Fld_UserId='". $data['username']."') AND Fld_Password ='" . $data['password'] . "' AND fldSecurityProfileCode=4";
		$this->db->select('*');
		$this->db->from('tl_tool_users');
		//$this->db->where('password',$data['password']);
		$this->db->where('userId',$data['username']);
		$this->db->limit(1);
		//echo $this->db->last_query();exit;
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		}
		else {
			return false;
		}
    }

    function getUserDetails($uid){
    	$q = $this->db->query("SELECT 
									*
    								FROM
    										tl_tool_users
    								WHERE
    										userId='".$uid."'
    										order by profileAccess asc");
    	$result = $q->row();
    	return $result;
    }

     function getUserDetailsForCmle($uid){
    	$q = $this->db->query("SELECT 
									*
    								FROM
    										tl_tool_users
    								WHERE
    										userId='".$uid."' and profileSecurity = 7
    										order by profileAccess asc");
    	$result = $q->row();
    	return $result;
    }
    function loginForSr($data)
    {
    	$q = $this->db->select('*')
	    		->from('tl_tool_users')
	    		->where('userName',$data['username']);
	    		//->where('password',$data['password']);
	    		//->where('profileAccess','1');
	    		if($q->get()->num_rows()>='1'){
	    			$data['success'] = 'true';
	    			$data['failLogin'] = '';
	    		}else{
	    			$data['failLogin'] = 'fail';
	    			$data['success'] = '';
	    		}
	    return $data;
    }

    function loginForCmle($data)
    {
    	$q = $this->db->select('*')
	    		->from('tl_tool_users')
	    		->where('userName',$data['username'])
	    		//->where('password',$data['password']);
	    		->where('profileSecurity','7');
	    		//->or_where('profileAccess','7');

	    		if($q->get()->num_rows()>='1'){
	    			$data['success'] = 'true';
	    			$data['failLogin'] = '';
	    		}else{
	    			$data['failLogin'] = 'fail';
	    			$data['success'] = '';
	    		}
	    return $data;
    }

    function loginForPoc($data){
    	$q = $this->db->select('*')
	    		->from('Users')
	    		->where('userName',$data['username'])
	    		->where('password',$data['password'])
	    		->where('profileAccess','4');
	    		if($q->get()->num_rows()=='1'){
	    			$data['success'] = 'true';
	    			$data['failLogin'] = '';
	    		}else{
	    			$data['failLogin'] = 'fail';
	    			$data['success'] = '';
	    		}
	    return $data;
    }

    function loginForAccountPocPoc($data){
    	$q = $this->db->select('*')
	    		->from('Users')
	    		->where('userName',$data['username'])
	    		->where('password',$data['password'])
	    		->where('profileAccess','5');
	    		if($q->get()->num_rows()=='1'){
	    			$data['success'] = 'true';
	    			$data['failLogin'] = '';
	    		}else{
	    			$data['failLogin'] = 'fail';
	    			$data['success'] = '';
	    		}
	    return $data;
    }

    function loginForLm($data)
    {
    	$q = $this->db->select('*')
	    		->from('tl_tool_users')
	    		->where('userName',$data['username'])
	    		//->where('password',$data['password'])
	    		->where('profileAccess','3');
	    		if($q->get()->num_rows()=='1'){

	    			$data['success'] = 'true';
	    			$data['failLogin'] = '';
	    		}else{
	    			//echo $this->db->last_query();
	    			$data['failLogin'] = 'true';
	    			$data['success'] = '';
	    		}
	    return $data;
    }

    function loginForSme($data){
    	$q = $this->db->select('*')
    			->from('tl_tool_users')
	    		->where('userName',$data['username'])
	    		//->where('password',$data['password'])
	    		->where('profileAccess',2);
	    		
	    		//print_r($q);exit;
	    		if($q->get()->num_rows()>='1'){

	    			$data['success'] = 'true';
	    			$data['failLogin'] = '';
	    		}else{
	    			
	    			$data['failLogin'] = 'true';
	    			$data['success'] = '';
	    		}
	    		//echo $this->db->last_query();exit;
	    return $data;
    }
     function loginForSpm($data){
     	$q = $this->db->select('*')
    			->from('tl_tool_users')
	    		->where('userName',$data['username'])
	    		//->where('password',$data['password'])
	    		->where('profileAccess','4');
	    		if($q->get()->num_rows()=='1'){
	    			$data['success'] = 'true';
	    			$data['failLogin'] = '';
	    		}else{
	    			//echo $this->db->last_query();
	    			$data['failLogin'] = 'true';
	    			$data['success'] = '';
	    		}
	    return $data;
    }
    function loginForHr($data)
    {
    	$q = $this->db->select('*')
	    		->from('tl_tool_users')
	    		->where('userId',$data['username'])
	    		//->where('password',$data['password'])
	    		->where('profileAccess','5');
	    		if($q->get()->num_rows()=='1'){
	    			$data['success'] = 'true';
	    			$data['failLogin'] = '';
	    		}else{
	    			$data['failLogin'] = 'true';
	    			$data['success'] = '';
	    		}
	    		//print_r($this->db->last_query());exit;
	    return $data;
    }
}