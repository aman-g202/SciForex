<?php 

	class Seller_models extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function insert_seller($seller){
			$_ = $this->db->insert('sellerinfo', $seller);
   			$insert_id = $this->db->insert_id();
   			return array($_, $insert_id);
		}

		public function insertmore_seller($sellermore, $phone){
			// $sql = 'UPDATE `sellerinfo` set pancard='.$sellermore['pancard'].', aadharcard='.$sellermore['aadharcard'].', rbino='.$sellermore['rbino'].', businessname='.$sellermore['businessname'].', businessaddress='.$sellermore['businessaddress'].', resiaddress='.$sellermore['residenceaddress'].', pincode='.$sellermore['pincode'].' where phone='.$phone.';';
			// $_ = $this->db->query($sql);
			// $this->db->where('phone', $phone);
			// $_ = $this->db->update('sellerinfo',$sellermore);
			if ($sellermore['aadharcard'] != null) {
				# code...
				$data=array('pancard'=>$sellermore['pancard'], 'aadharcard'=>$sellermore['aadharcard'], 'rbino'=>$sellermore['rbino'], 'businessname'=>$sellermore['businessname'], 'businessaddress'=>$sellermore['businessaddress'], 'businesstype'=>$sellermore['businesstype'], 'pincode'=>$sellermore['pincode']);
				$this->db->set('pancard','pancard',false);
				$this->db->set('aadharcard','aadharcard',false);
				$this->db->set('rbino','rbino',false);
				$this->db->set('businessname','businessname',false);
				$this->db->set('businessaddress','businessaddress',false);
				$this->db->set('businesstype','businesstype',false);
				$this->db->set('pincode','pincode',false);
				$this->db->where('phone',$phone);
				$_ = $this->db->update('sellerinfo',$data);
				return array($_);
			}
			else{
				$data=array('pancard'=>$sellermore['pancard'], 'rbino'=>$sellermore['rbino'], 'businessname'=>$sellermore['businessname'], 'businessaddress'=>$sellermore['businessaddress'], 'businesstype'=>$sellermore['businesstype'], 'pincode'=>$sellermore['pincode']);
				$this->db->set('pancard','pancard',false);
				$this->db->set('rbino','rbino',false);
				$this->db->set('businessname','businessname',false);
				$this->db->set('businessaddress','businessaddress',false);
				$this->db->set('businesstype','businesstype',false);
				$this->db->set('pincode','pincode',false);
				$this->db->where('phone',$phone);
				$_ = $this->db->update('sellerinfo',$data);
				return array($_);
			}
		}

	}

 ?>
