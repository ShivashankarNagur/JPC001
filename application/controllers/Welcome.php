

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('bbmModel','bmodel');
	}
	public function index()
	{
		
		$this->load->view('welcome_message');
		//$this->load->view('bbmAdminHomePage');
	}

	function adminHomePage()
	{
		//echo 'hi';exit;
		$this->load->view('bbmAdminHomePage');
	}

	function getCorousalData(){
		$data = $this->bmodel->getCorousalData();
		header('Content-Type: application/json');
		echo json_encode($data);

	}

	function getServeyData(){
		$data = $this->bmodel->getServeyData();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function getTeamMembersInfo(){
		$data = $this->bmodel->getTeamMembersInfo();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function getTendersData(){
		$data = $this->bmodel->getTendersData();
		header('Content-Type: application/json');
		echo json_encode($data);
	
	}

	function getSpecificData(){
		$formName = $_REQUEST['tabName'];
		$data = $this->bmodel->getSpecificData($formName);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function deleteParticularFormData(){
		$formName = $_REQUEST['tabName'];
		$id = $_REQUEST['id'];
		$data = $this->bmodel->deleteParticularFormData($formName,$id);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	function uploadAdminsInfo(){
		$formName = $_REQUEST['formName'];
		//print_r($formName);exit;
		if($formName == 'services'){
			$fields = array('service_title','short_desc');
			$formData = array();
			foreach ($fields as $value) {
				if(isset($_REQUEST[$value]) && !empty($_REQUEST[$value])){
					$formData[$value] = $_REQUEST[$value];
				}
			}
			$data = $this->bmodel->uploadAdminsInfo($formData);
			header('Content-Type: application/json');
			echo json_encode($data);
		}else if($formName == 'homePage'){

			$homePageInfo = array('title'
								,'heading'
								,'sub_heading'
								,'home_image'
								);
			$homePageData = array();
			foreach ($homePageInfo as $field)
				{
					if(isset($_REQUEST[$field]) && !empty($_REQUEST[$field]))
					{
						$homePageData[$field] = $_REQUEST[$field];
					}
				}
			    if ($_FILES){
				$tempMessage = "";
				foreach ($_FILES as $key => $file){	
					if (!empty($file['name'])){
						$config['file_name'] = time()."_".strtolower(str_replace(' ', '_', $file['name']));
						$config['upload_path'] = 'assets/img/homePage/';
						$config['max_size'] = '3072';
						$config['allowed_types'] = 'gif|jpg|png|pdf';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);	
						if (!$this->upload->do_upload($key)){
							$tempMessage.=$this->upload->display_errors();
						}else{
							$homePageData['home_image'] = $config['file_name'];
						}
					}
				}
				$data['message'] = $tempMessage;		
			}
			$data = $this->bmodel->insertHomePageData($homePageData);
			header('Content-Type: application/json');
			echo json_encode($data);

		}
		else if($formName == 'about'){

			$membersInfo = array('member_name'
								,'profile'
								,'about_Desc'
								,'member_image'
								);
			$membersData = array();
			foreach ($membersInfo as $field)
				{
					if(isset($_REQUEST[$field]) && !empty($_REQUEST[$field]))
					{
						$membersData[$field] = $_REQUEST[$field];
					}
				}
			    if ($_FILES){
				$tempMessage = "";
				foreach ($_FILES as $key => $file){	
					if (!empty($file['name'])){
						$config['file_name'] = time()."_".strtolower(str_replace(' ', '_', $file['name']));
						$config['upload_path'] = 'assets/img/team/';
						$config['max_size'] = '3072';
						$config['allowed_types'] = 'gif|jpg|png|pdf';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);	
						if (!$this->upload->do_upload($key)){
							$tempMessage.=$this->upload->display_errors();
						}else{
							$membersData['member_image'] = $config['file_name'];
						}
					}
				}
				$data['message'] = $tempMessage;		
			}
			$data = $this->bmodel->insertMembersInfo($membersData);
			header('Content-Type: application/json');
			echo json_encode($data);

		}
		else if($formName == 'tender'){

			$tenderInfo = array('title'
								,'Description'
								,'image_path'
								
								);
			$tendersData = array();
			foreach ($tenderInfo as $field)
				{
					if(isset($_REQUEST[$field]) && !empty($_REQUEST[$field]))
					{
						$tendersData[$field] = $_REQUEST[$field];
					}
				}
			    if ($_FILES){
				$tempMessage = "";
				foreach ($_FILES as $key => $file){	
					if (!empty($file['name'])){
						$config['file_name'] = time()."_".strtolower(str_replace(' ', '_', $file['name']));
						$config['upload_path'] = 'assets/img/tenders/';
						$config['max_size'] = '3072';
						$config['allowed_types'] = 'gif|jpg|png|pdf';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);	
						if (!$this->upload->do_upload($key)){
							$tempMessage.=$this->upload->display_errors();
						}else{
							$tendersData['image_path'] = $config['file_name'];
						}
					}
				}
				$data['message'] = $tempMessage;		
			}
			$data = $this->bmodel->insertTendersInfo($tendersData);
			header('Content-Type: application/json');
			echo json_encode($data);

		}else if($formName == 'profile'){
			echo 'hi';

			$tenderInfo = array('profile_name'
								,'mailId'
								,'contact_number'
								,'image_path'
								
								);
			$profileData = array();
			foreach ($tenderInfo as $field)
				{
					if(isset($_REQUEST[$field]) && !empty($_REQUEST[$field]))
					{
						$profileData[$field] = $_REQUEST[$field];
					}
				}
			    if ($_FILES){
				$tempMessage = "";
				foreach ($_FILES as $key => $file){	
					if (!empty($file['name'])){
						$config['file_name'] = time()."_".strtolower(str_replace(' ', '_', $file['name']));
						$config['upload_path'] = 'assets/img/team/';
						$config['max_size'] = '3072';
						$config['allowed_types'] = 'gif|jpg|png|pdf';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);	
						if (!$this->upload->do_upload($key)){
							$tempMessage.=$this->upload->display_errors();
						}else{
							$profileDataprofileData['image_path'] = $config['file_name'];
						}
					}
				}
				$data['message'] = $tempMessage;		
			}
			$data = $this->bmodel->insertMyProfileInfo($profileData);
			header('Content-Type: application/json');
			echo json_encode($data);

		}
			
	}
}


