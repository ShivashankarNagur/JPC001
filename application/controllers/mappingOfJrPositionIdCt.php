
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mappingOfJrPositionIdCt extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('mappingOfJrPositionIdModel','Ommodel');
    //print_r($this->session->userdata['logged_in']);exit;
    $this->load->library(array('session','form_validation'));
	if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in')['UserType']!=0){
		redirect(base_url());
	}
	}
	public function index()
	{
		$this->load->view('OnTrackJr/MappingOfJrPositionIdView');
	}

	function mappJrWIthPId(){
		$this->load->view('OnTrackJr/MapJRAndPositionIDView');
	}

	function mapJRAndPositionId(){
		$jrNumber = $_REQUEST['jr_number'];
		$positionId = $_REQUEST['position_id'];
		$data = $this->Ommodel->mapJRAndPositionId($jrNumber,$positionId);
		/*if(isset($data)){
			$p = $this->sendAllMails();
			if($p =='true'){
				$this->db->delete('mail_queue');
			}
		}*/
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function sendAllMails(){
		$q = $this->db->select('signum, master_jr,job_stage,
                                GROUP_CONCAT( jr_number ) AS jr_number
                               ')
                    ->from('mail_queue')
                    ->group_by('signum,master_jr')
                    ->get();
        $res = $q->result_array();
        if($q->num_rows()>0){
            for($i=0;$i<$q->num_rows();$i++){
                $from_email = 'shivashankar.nagure@ericsson.com';
                $to_email = 'shivashankar.nagure@ericsson.com';
                $to_email_sms = '+918123942279@sms.ericsson.com';
                $subject = "JR Recieved mail";
                $messageBody = "
                <html>
                <body>
                <p>Dear Shivashankar,
                <br><br>
                This is to inform that you have a received ".$res[$i]['jr_number']." these JR's. for job stage ".$res[$i]['job_stage'].". 
                <br>
                Please update the same ASAP.
                <br>
                <br><br><br>
                Regards,<br>
                On Track
                </p>
                </body>
                </html>
                ";
                $smsBody = '
                    Dear Shivashankar,
                   
                This is to inform that you have a received '.$res[$i]['jr_number'].' these JR for job stage '.$res[$i]['job_stage'].'. 
                Please update the same ASAP.
               	
                Regards,
                On Track
                ';
                $messageBody2 = '';
                $headers = "From: " . $from_email . "\r\n";
                $headers .= "Reply-To: ". $from_email . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                mail($to_email,$subject,$messageBody,$headers);
                mail($to_email_sms,$smsBody,$messageBody2,$headers);
            }
            
        }
        return true;

	}

	public function sendWelocomeMessage(){
		$from_email = 'shivashankar.nagure@ericsson.com';
		$to_email = 'shivashankar.nagure@ericsson.com';
		//$from_email = '+918123942279@sms.ericsson.com';
		$subject = "Milestone update Reminder mail";
		//$hrmsofAssessor = $hrmsData;
		$messageBody = "
		<html>
		<body>
		<p>Dear Shivashankar,
		<br><br>
		This is to inform that you have a milestone to update  '<b>On_Track</b>'.The Due date for the same is 2019-12-12.
		<br>
		Please update the same ASAP.
		<br>
		<br><br><br>
		Regards,<br>
		On Track
		</p>
		</body>
		</html>
		";
		$headers = "From: " . $from_email . "\r\n";
		$headers .= "Reply-To: ". $from_email . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($to_email,$subject,$messageBody,$headers);
	}

	function getAllUnMappedUniqueId(){
		$data = $this->Ommodel->getAllUnMappedUniqueId();
		header('Content-Type: application/json');
		echo json_encode($data);
	}


}