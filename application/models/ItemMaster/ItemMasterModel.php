<?php
	class ItemMasterModel extends CI_Model {
		
		var $Item_Name;
		var $Item_Type_Code;
		
		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
		}//constructor
		
		function getItem_Name() { return $this->Item_Name; }
		function getItem_Type_Code() { return $this->Item_Type_Code; }
			
		function setItem_Name($x) { $this->Item_Name = $x; }
		function setItem_Type_Code($x) { $this->Item_Type_Code = $x; }
	}//class
?>