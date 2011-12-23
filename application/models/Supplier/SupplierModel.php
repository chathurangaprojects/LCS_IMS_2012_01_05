<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class SupplierModel extends CI_Model {
	
		var $supplierCode;
		var $supplierName;
	
		function getSupplierCode() { return $this->upplier_Code; } 
		function getSupplierName() { return $this->supplierName; } 
	
		function setSupplierCode($x) { $this->upplier_Code = $x; } 
		function setSupplierName($x) { $this->supplierName = $x; } 

		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
		}
	
	}//class
?>