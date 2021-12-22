
<?php
class jrDelayModel extends CI_Model
{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
   	function getAllJrDelayTrack(){

		$query = $this->db->query("SELECT jr_number, DATEDIFF(jr_assigned_to_dpoc_on,jr_approved_date) AS 									JrWithAdmin,DATEDIFF(jr_assigned_to_apoc_on,jr_assigned_to_dpoc_on) as JrWithDPoc,DATEDIFF(jr_assigned_to_lm_on,jr_assigned_to_apoc_on) as JrWithAPoc,DATEDIFF(jr_assigned_to_hr_on,jr_assigned_to_lm_on) as JrWithLM,DATEDIFF(now(),jr_assigned_to_hr_on) as JrWithHR,DATEDIFF(negotiation_completed_date,jr_assigned_to_hr_on) AS                               doc_negotiation_completed1,DATEDIFF(offer_released_date,negotiation_completed_date) AS offer_rollout_date1 
from  complete_jr_history
where jr_number is not null");
        //print_r($this->db->last_query());exit;
        $data['days'] = $query->result_array();
        return $data;
   	}

}