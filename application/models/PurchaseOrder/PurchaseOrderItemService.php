<?php
class PurchaseOrderItemService extends CI_Model {


 function __construct()
 {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->model('PurchaseOrderItemModel');
		
 }//constructor
 
 
 

 function addNewItemForPurchaseOrder($purchaseOrderItemModel){
	 
	 
   $this->db->insert('ta_ims_po_details', $purchaseOrderItemModel); 

   return $this->db->insert_id();

 }//addNewItemForPurchaseOrder
 
 
 
 
 
 function getAddedItemForGivenPurchaseOrderRequest($poItemModel){
	 
	 
	 $query = $this->db->get_where('ta_ims_po_details', array('Order_Code' => $poItemModel->getOrder_Code()));
	 
	 
	 	$poItemArray=array();
		$index=0;
		
		foreach ($query->result() as $row)
		{
			$poItemModel=new PurchaseOrderItemModel();
			
			$poItemModel->setMaster_Item_Code($row->Master_Item_Code);
			$poItemModel->setOrder_Code ($row->Order_Code );
			$poItemModel->setUnit($row->Unit);
			$poItemModel->setUnit_Price($row->Unit_Price);
			$poItemModel->setQuantity($row->Quantity);
			$poItemModel->setDiscount($row->Discount);
			$poItemModel->setDiscount_Value($row->Discount_Value);
			$poItemModel->setItem_Value($row->Item_Value);
			$poItemModel->setInd_Tax($row->Ind_Tax);
			$poItemModel->setTax_Value($row->Tax_Value);
            $poItemModel->setDescription($row->Description);

			
    		$poItemArray[$index]=$poItemModel;
			$index++;
		}
		
		
		return $poItemArray;
	 
 }//getAddedItemForGivenPurchaseOrderRequest
 
 
 
}//class

?>
