<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LastTransNo extends CI_Model {
	public function getLastTransNumber()
	{
		$gblNewTransNo = false;
		$transNo = 0;
		$transNo1 = $this->db->select('max(Fld_Trans_No) as transNo1')
			->from('TempTransaction')
			->get()
			->row_array();
		$transNo1 = $transNo1['transNo1'];
		$transNo2 = $this->db->select('max(Fld_Trans_No) as transNo2')
			->from('Trans')
			->get()
			->row_array();
		$transNo2 = $transNo2['transNo2'];
		/*if (is_null($transNo1) && is_null($transNo2)) {
			$transNo = 1;
		} else if(is_null($transNo1)) {
			$transNo = $transNo2 + 1;
		} else if(is_null($transNo2)) {
			$transNo = $transNo1 + 1;
		} else if ($transNo1 > $transNo2) {
			$transNo = $transNo1 + 1;
		} else if ($transNo2 > $transNo1) {
 			$transNo = $transNo2 + 1;
 		}*/

 		if ((is_null($transNo1) && is_null($transNo2)) || ($transNo1==0 && $transNo2==0)) {
 			$gblNewTransNo = true;
 			$transNo = 1;
 		} else if(is_null($transNo1)) {
 			$transNo = $transNo2;
 		} else if(is_null($transNo2)) {
 			$transNo = $transNo1;
 		} else if ($transNo1 > $transNo2) {
 			$transNo = $transNo1;
 		} else if ($transNo2 > $transNo1) {
 			$transNo = $transNo2;
 		} else if ($transNo2 == $transNo1) {
 			$transNo = $transNo2 + 1;
 		}

 		$transNo3 = $this->db->select('max(Fld_Trans_No) as transNo3')
			->from('TempTransp')
			->get()
			->row_array();
		$transNo3 = $transNo3['transNo3'];

		if ((is_null($transNo3) || $transNo3==0) && $gblNewTransNo==false) {
			$transNo = $transNo + 1;
		} else if ((is_null($transNo3) || $transNo3==0) && $gblNewTransNo==true) { 
			$transNo = $transNo;
		} elseif ($transNo > $transNo3) {
			$transNo = $transNo + 1;
		} elseif ($transNo < $transNo3) {
			$transNo = $transNo3 + 1;
		} elseif ($transNo = $transNo3) {
			$transNo = $transNo3 + 1;
		}

		$transNo4 = $this->db->select('max(Fld_Trans_No) as transNo4')
			->from('Transp')
			->get()
			->row_array();
		$transNo4 = $transNo4['transNo4'];

		if (is_null($transNo4)) {
			$transNo = $transNo;
		} elseif ($transNo > $transNo4) {
			$transNo = $transNo;
		} elseif ($transNo < $transNo4) {
			$transNo = $transNo4 + 1;
		} elseif ($transNo = $transNo4) {
			$transNo = $transNo4 + 1;
		}
		return $transNo;
	}
}