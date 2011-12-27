<?php
class UnitModelService extends CI_Model {
	

var	$Unit_Code;
var $Description;


 function __construct()
 {
        // Call the Model constructor
        parent::__construct();
 }//constructor
	
function getUnit_Code() { return $this->Unit_Code; } 
function getDescription() { return $this->Description; } 
function setUnit_Code($x) { $this->Unit_Code = $x; } 
function setDescription($x) { $this->Description = $x; } 





function retrieveAllUnitDetails(){
	
		$query = $this->db->get('ta_ims_unit');
		
		$unitArray=array();
		$index=0;
		
		foreach ($query->result() as $row)
		{
			$unitModel=new UnitModelService();
			
			$unitModel->setUnit_Code($row->Unit_Code);
			$unitModel->setDescription($row->Description);
			
    		$unitArray[$index]=$unitModel;
			$index++;
		}
		
		
		return $unitArray;
	
}//function




}//class
?>
	
	