<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Autocomplete extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		
	        $this->load->model('UserModel');
			$this->load->model('UserService');
			$this->load->model(array('Supplier/SupplierModel','Supplier/SupplierService'));
		}
		
		
		public function loadItemTypes()
		{ 
					//$supplierType = $this->input->get('sup_type',TRUE);

			echo " aaaaa - bbbbb - 10\n";
			echo " ccccc - ddddd - 20\n";
			echo "eeeee - fffff - 30\n";
			echo "ggggg - hhhhh - 40\n";
			echo "iiiii - jjjjj - 50\n";
			echo "jjjjj - kkkkk - 60\n";
		}
		
		
		public function loadSuppliers(){
			
			
			$charactersTypingforSupplierName = $this->input->get('q',TRUE);
			
			$supplierModel = new SupplierModel();
			
			$supplierType = $this->input->get('sup_type',TRUE);
			
			if($supplierType !=""){
			//user has selected a supplier type
			$supplierModel->setSupplier_Type($supplierType);
            }
			else{
			//user haven selected a supplier type
			$supplierModel->setSupplier_Type(-1);
			}
			
			$supplierModel->setSupplier_Name($charactersTypingforSupplierName);
			
			$supplierService = new SupplierService();
			
			$supplierArray = array();
			
			$supplierArray = $supplierService->retriewSupplierNameAndID($supplierModel);
			
			//foreach($supplierArray as $supplier){
			for($index=0; $index<sizeof($supplierArray);$index++){
				
			//echo $supplierArray[$index]->getSupplier_Code()."###".$supplierArray[$index]->getSupplier_Name()."\n";
			echo $supplierArray[$index]->getSupplier_Code()."###".$supplierArray[$index]->getSupplier_Name()."###".$this->input->get('sup_type',TRUE)."\n";
						
			}
			
		}//loadSuppliers
		
		
		
	}//Autocomplete
	
?>