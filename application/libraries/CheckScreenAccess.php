<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckScreenAccess extends CI_Model {

    public function __construct(){
        parent::__construct();  
    	// $row = $this->db->select('*')
    	// ->from('tbl_wsq_security_Screen')
    	// ->where('fldSecurityProfileCode',$params[0])
    	// ->where('Fld_Module_Id',$params[0])
    	// ->where('Fld_Screen_Id',$params[0])
    	// ->where('fldAuthority',1)
    	// ->get();
    	// if($row->num_rows()>0){
    	// 	return true;
    	// }else{
    	// 	return false;
    	// }
    }

    public function CheckScreenSecurity($params){
    	$row = $this->db->select('*')
    	->from('tbl_wsq_security_Screen')
    	->where('fldSecurityProfileCode',$params[0])
    	->where('Fld_Module_Id',$params[1])
    	->where('Fld_Screen_Id',$params[2])
    	->where('fldAuthority',1)
    	->get();
    	if($row->num_rows()>0){
    		return true;
    	}else{
    		return false;
    	}
    }
}