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
			echo "aaaaa - bbbbb - 10\n";
			echo "ccccc - ddddd - 20\n";
			echo "eeeee - fffff - 30\n";
			echo "ggggg - hhhhh - 40\n";
			echo "iiiii - jjjjj - 50\n";
			echo "jjjjj - kkkkk - 60\n";
		}
		
		
		public function loadSuppliers(){
			
			
			//echo $this->input->get('q',TRUE)."hello";
			
			$supplierModel = new SupplierModel();
			
			$supplierModel->setSupplierName("sup");
			
			$supplierService = new SupplierService();
			
			$supplierArray = array();
			
			$supplierArray = $supplierService->retriewSupplierNameAndID($supplierModel);
			
			//foreach($supplierArray as $supplier){
			for($index=0; $index<sizeof($supplierArray);$index++){
				
			$arr=$supplierArray[$index];
		
			echo $arr->getSupplierCode1();
			
	        //."###".$supplierArray[$index]->getSupplierName();
						
			}
			
		}//loadSuppliers
		
		
		
	}//Autocomplete
	
?>