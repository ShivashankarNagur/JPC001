
<?php

class jrAdminDashBoardModel extends CI_Model
{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getJrAdminDashBoard(){
    	$data['YetToShortListData'] = $this->db->select('domain,count(*) as yetToShortlist')
                    ->from('complete_jr_history')
                    ->where('candidate_shortlisted_date','0000-00-00 00:00:00')
                    ->group_by('domain')
                    ->get()
                    ->result_array();

        $data['YetToOfferRelease'] = $this->db->select('domain,count(*) as yetToOfferRelease')
                    ->from('complete_jr_history')
                    ->where('offer_released_date','0000-00-00')
                    ->group_by('domain')
                    ->get()
                    ->result_array();  
        $data['offered'] = $this->db->select('domain,count(*) as offered')
                    ->from('complete_jr_history')
                    ->where_not_in('offer_released_date','0000-00-00')
                    ->group_by('domain')
                    ->get()
                    ->result_array();  
         $data['confirmedDoj'] = $this->db->select('domain,count(*) as confirmedDoj')
                    ->from('complete_jr_history')
                    ->where_not_in('confirmed_doj','0000-00-00')
                    ->group_by('domain')
                    ->get()
                    ->result_array();
         $data['dynamicDojWeekWise'] = $this->db->select('domain,count(confirmed_doj) as dynamicDojWeekWise,week(confirmed_doj) as weekNumbers')
                    ->from('complete_jr_history')
                    ->where_not_in('confirmed_doj','0000-00-00')
                    ->group_by('domain')
                    ->get()
                    ->result_array();      
        $data['joined'] = $this->db->select('domain,count(*) as joined')
                    ->from('complete_jr_history')
                    ->where_not_in('candidate_joined','0000-00-00')
                    ->group_by('domain')
                    ->get()
                    ->result_array();    
                    //print_r($this->db->last_query());exit;
        return $data;
    }

    function  getAllJrCompleteHistory($ran,$state){
        $q = $this->db->select('*,DATEDIFF(jr_expiry_date,CURRENT_DATE) as leftDays');
                    $this->db->from('complete_jr_history');
                    $this->db->where('domain',$ran);
                    if($state == 'yetToShortlist'){
                    	$this->db->where('candidate_shortlisted_date','0000-00-00 00:00:00');
                    }
                    if($state == 'yetOffer'){                    	
                    	$this->db->where('offer_released_date','0000-00-00');
                    }
                    if($state == 'offered'){                   	
                    	$this->db->where_not_in('offer_released_date','0000-00-00');
                    }
                    if($state == 'ConfirmedDoj'){                    	
                    	$this->db->where_not_in('confirmed_doj','0000-00-00');
                    }
                    if($state == 'joined'){                   	
                    	$this->db->where_not_in('candidate_joined','0000-00-00');
                    }
                    $sql = $this->db->get_compiled_select();
                   // print_r($sql);exit;
                    $query = $this->db->query($sql);
                    $data['cirList'] = $query->result();
                    if($this->db->trans_status()===false){
					$data['db_error'] = $this->db->error();
					$data['error'] = true;
					$this->db->trans_rollback();
					}else{
						$data['success'] = true;
						$this->db->trans_commit();
					}
					if(empty($data['cirList']) && empty($data['db_error']) && empty($data['error'])){
						$data['emptyRecords'] = 'No records found';
					}
        return $data;
    }

}