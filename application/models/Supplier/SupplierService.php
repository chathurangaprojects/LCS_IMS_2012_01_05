<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class SupplierService extends CI_Model {

		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
			$this->load->model('SupplierModel');
		}
		
		public function retriewSupplierNameAndID($supplierModel)
		{
			//get supplier name
			$supplierName = $supplierModel->getSupplierName();
			
			//database select query based on like operator on name
             $this->db->like('Supplier_Name',$supplierName);  
             $query = $this->db->get('ta_ims_supplier_header');
			
			$supplierArray = array();
			$index = 0;
            foreach ($query->result() as $row)
			{
			$supplier = new SupplierModel();
				
			 $supplier->setSupplierCode($row->Supplier_Code);	
			 $supplier->setSupplierName($row->Supplier_Name);
			 
			  $supplierArray[$index] = $supplier; 
			  
			 $index++;
			}
			return $supplierArray;
      }
	}
?>