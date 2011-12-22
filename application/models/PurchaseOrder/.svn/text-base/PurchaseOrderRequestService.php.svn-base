<?php
class PurchaseOrderRequestService extends CI_Model {


 function __construct()
 {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->model('PurchaseOrderRequestModel');
		
 }//constructor
 
 
 
 
 function createNewPurchaseOrder($purchaseOrderRequestModel){
	 
	 
	 $this->db->insert('ta_ims_po_header', $purchaseOrderRequestModel); 
	 	 
	 return $this->db->insert_id();
  
 }//createNewPurchaseorder
 



 function updatePurchaseOrder($purchaseOrderRequestModel){
	 
	 $this->db->where('Order_Code',$purchaseOrderRequestModel->getOrder_Code()); 
	 $this->db->update('ta_ims_po_header', $purchaseOrderRequestModel); 
	 
  
 }//createNewPurchaseorder
 
 
 
 
 
 
}//class

?>
