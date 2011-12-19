<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class SupplierModel extends CI_Model {
	
		var $supplierCode;
		var $supplierName;
	
		function getUpplierCode() { return $this->upplier_Code; } 
		function getSupplierName() { return $this->supplierName; } 
	
		function setUpplierCode($x) { $this->upplier_Code = $x; } 
		function setSupplierName($x) { $this->supplierName = $x; } 

		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
		}
	
	}//class
?>