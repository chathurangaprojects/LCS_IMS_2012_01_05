<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class PurchaseOrderManagement extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		
			$this->load->model(array('PurchaseOrder/DepartmentModel','PurchaseOrder/DepartmentService','PurchaseOrder/CurrencyModel','PurchaseOrder/CurrencyService','PurchaseOrder/PaymentTypeModel','PurchaseOrder/PaymentTypeService','PurchaseOrder/PurchaseOrderRequestModel','PurchaseOrder/PurchaseOrderRequestService','PurchaseOrder/UnitModelService','PurchaseOrder/PurchaseOrderItemModel','PurchaseOrder/PurchaseOrderItemService','ItemMaster/ItemMasterModel','ItemMaster/ItemMasterService','Supplier/SupplierModel','Supplier/SupplierService'));
		   
			if(!$this->session->userdata('logged_in'))
			{
				redirect(base_url() . 'index.php/login');
			}
		}
		
		function createNewPurchaseOrder()
		{
			
			
		  if($this->session->userdata('logged_in'))
			{
		     //the user is logged and priviledges should be checked
			$userPriviledgeModel=new UserPriviledge();
			
		    $userPriviledgeModel->setLevelCode($this->session->userdata('level'));
			$userPriviledgeModel->setDepartmentCode( $this->session->userdata('department'));
			$userPriviledgeModel->setPriviledgeCode(5);//priviledge 5 is for creating purchase order requests
			
			$hasPriviledges=$userPriviledgeModel->checkUserPriviledge($userPriviledgeModel);
						
			if($hasPriviledges){			
			
			//retrieveing department details
			$departmentModel = new DepartmentModel();
			$departmentService = new DepartmentService();
			
			$departmentModel->setDepartmentCode($this->session->userdata('department'));
			$departmentName=$departmentService->retrieveDepartmentName($departmentModel);
			
			
			//retrieving currency details
			$currencyService = new CurrencyService();
			$currencyObjectArray = $currencyService->retriveAllCurrencyDetails();
			
			
			//retrieving payment type details
			$paymentTypeService = new PaymentTypeService();
			$paymentTypeObjectArray = $paymentTypeService->retriveAllPaymentTypes();
			
			
			$unitService = new UnitModelService();
			
			$unitModelObjArr = $unitService->retrieveAllUnitDetails();
			
			//setting up the data array
			$data=array('departmentName'=>$departmentName,'currencyObjectArray'=>$currencyObjectArray,'paymentTypeObjectArray'=>$paymentTypeObjectArray,'UnitArray'=>$unitModelObjArr);
			
			
						$this->template->setTitles('LankaCom Inventory Management System', 'Subsidiry of Singapoor Telecom', 'Create New Purchase Order', 'Please Fill All The Mandatory Fields...');
		
			$this->template->load('template', 'PurchaseOrder/AddNewPurchaseOrderView',$data);			
				
		     }
			else{
				
			  // "user doesnt have the priviledges";
			  
			  $this->template->setTitles('Access Denied', 'You are not allowed to access this page.', 'You are not allowed to access this page.', 'Please Contact Administrator...');
			
			$this->template->load('template', 'errorPage');
						
			}
			
			}//if
			else{
				
				
			redirect(base_url().'index.php');
	
			
			}
			
		 
		 
			
		}//createNewPurchaseOrder
		
		
		
		
		
		
		
		
		
		
		
		
		// the below function is used to retrive the currency conversion rate based on the ajax request made by the purchase order request form
	
		function retriveCurrrencyConversionRate(){
			
    

			 //echo "retriveCurrrencyConversionRate";			
			 $this->input->post('currencyCode', TRUE);
			
			$currencyCode=$this->input->post('currencyCode', TRUE);
			
			
				   
			$currencyService = new CurrencyService();
					
			$currencyModel = new CurrencyModel();
			
			
		 
			$currencyModel->setCurrency_Code($currencyCode);
	
	
			$currencyModelRetrieved = $currencyService->retriveSelectedCurrencyDetails($currencyModel);

          
             //sending the conversion rate as ajax response to the browser
			 echo $currencyModelRetrieved->getConversion_Rate();
		
			 
			 
		}//function
		
		
		
		
		
		
		
		
		function createNewPurchaseOrderRequest(){
			
			
			
		//echo "inserting/updating po request data ";
		
		//PurchaseOrderRequestModel
			
			
			if($this->session->userdata('logged_in'))
			{
		     //the user is logged and priviledges should be checked
			$userPriviledgeModel=new UserPriviledge();
			
		    $userPriviledgeModel->setLevelCode($this->session->userdata('level'));
			$userPriviledgeModel->setDepartmentCode( $this->session->userdata('department'));
			$userPriviledgeModel->setPriviledgeCode(5);//priviledge 5 is for creating purchase order requests
			
			$hasPriviledges=$userPriviledgeModel->checkUserPriviledge($userPriviledgeModel);
						
			if($hasPriviledges){			
			 
			 //echo "user has the priviledges";
			 
			 
			 $poRequest = new PurchaseOrderRequestModel();

             $poService = new PurchaseOrderRequestService();
			 
               //setting the values start
			   /*
			     $poRequest->setSupplier_Code('1');
				 $poRequest->setOrder_Date('2011-11-11'); 
				 $poRequest->setExpected_Date('2011-11-11');
				 $poRequest->setQuote_No('123');
				 $poRequest->setAttn('attention'); 
				 $poRequest->setRequested_Dept('1');
				 $poRequest->setRequested_By('1');
				 $poRequest->setCreated_By('1');
				 //$poRequest->setDiscount('10');
				 //$poRequest->setDiscount_Value('12');
				 //$poRequest->setPO_Total('500');
				 $poRequest->setCurrency_Code('1'); 
				 $poRequest->setCurrency_Rate('12');
				 $poRequest->setPayment_Type_Code('1');
				 //$poRequest->setPayment_Status('1') ;
				 $poRequest->setPO_Purpose('prpose');
				 $poRequest->setPO_Remarks('remarks');
				 $poRequest->setPO_Payment_Remarks('paymet'); 
			     $poRequest->setPrint_Original(0);
			   
			   */
			   $user_id = $this->session->userdata('emp_id');
			   

			   //getting the purchase order id			   
			   $purchase_order_id = $this->input->post('po_request_id',TRUE);
			   	 
				 $poRequest->setSupplier_Code($this->input->post('supplier_id',TRUE));
				 $poRequest->setOrder_Date($this->input->post('order_date',TRUE)); 
				 //$poRequest->setExpected_Date($this->input->post('expected_date',TRUE));
				 $poRequest->setQuote_No($this->input->post('quatation_no',TRUE));
				 $poRequest->setAttn($this->input->post('attention',TRUE)); 
				 $poRequest->setRequested_Dept($this->input->post('Department_Code',TRUE));
				 $poRequest->setRequested_By($this->input->post('requested_by',TRUE));
				 $poRequest->setCreated_By($user_id);
				 $poRequest->setCurrency_Code($this->input->post('currrency_selector',TRUE));
				 $poRequest->setCurrency_Rate($this->input->post('conversion_rate',TRUE));
				 $poRequest->setPayment_Type_Code($this->input->post('payment_type',TRUE));
				 $poRequest->setPO_Purpose($this->input->post('po_purpose',TRUE));
				 $poRequest->setPO_Remarks($this->input->post('po_remarks',TRUE));
				 $poRequest->setPO_Payment_Remarks($this->input->post('pay_remark',TRUE)); 
			     $poRequest->setPrint_Original(0);
				 $poRequest->setStatus_Code(1); //change the status based on status table
			   
			   
			   //setting the values end
			   
			   
            if($purchase_order_id==""){
		  
		     //purchase order is not in dabase and it should be inserted
			  $purchaseOrderID = $poService->createNewPurchaseOrder($poRequest);
				  
		 	  echo "Purchase Order was succesfully Created.. #".$purchaseOrderID;
			
			}
			else{
			
			$poRequest->setOrder_Code($purchase_order_id);
			
			//purchase order already exists and it should be updated
		      $poService->updatePurchaseOrder($poRequest);	
	    	  echo "Purchase Order was succesfully Updated..#".$purchase_order_id;
				
			}
				  
		     }//hasPriviledges
			else{
				
			  // "user doesnt have the priviledges";
			  
			  $this->template->setTitles('Access Denied', 'You are not allowed to access this page.', 'You are not allowed to access this page.', 'Please Contact Administrator...');
			
			$this->template->load('template', 'errorPage');
						
			}
			
			}//if
			else{
				
				
			redirect(base_url().'index.php');
	
			
			}
			
			
		}//function
		
		
		
		
		
		
		
		
function addItemsToPurchaseOrder(){
		
		//check the priviledges
			
		$poItemService = new PurchaseOrderItemService();
		$poItemModel =new PurchaseOrderItemModel();
		
		
		$discountVal = $this->input->post('discount_amount',TRUE);
		$discountPercentage = $this->input->post('discount_percentage',TRUE);
		
		$taxVal = $this->input->post('tax_value',TRUE);
		$taxPercentage = $this->input->post('tax_percentage',TRUE);
		
		if($discountVal==""){
		
		 $discountVal = 0;
		 
		}
		
		
		if($discountPercentage==""){
		
		$discountPercentage = 0.0;
		
		}
		
		
		if($taxVal==""){
		
		 $taxVal = 0;
		 
		}
		
		
		if($taxPercentage==""){
		
		$taxPercentage = 0.0;
		
		}
		
	
 $poItemModel->setOrder_Code($this->input->post('purchase_order_id',TRUE));
 $poItemModel->setMaster_Item_Code($this->input->post('item_id',TRUE));
 $poItemModel->setUnit($this->input->post('po_item_unit',TRUE));
 $poItemModel->setUnit_Price($this->input->post('po_item_unit_price',TRUE));
 $poItemModel->setQuantity($this->input->post('po_item_qty',TRUE));
 $poItemModel->setDiscount($discountPercentage);
 $poItemModel->setDiscount_Value($discountVal);
 $poItemModel->setItem_Value($this->input->post('po_item_value',TRUE));
 $poItemModel->setInd_Tax($taxPercentage);
 $poItemModel->setTax_Value($taxVal);
 $poItemModel->setDescription($this->input->post('po_description',TRUE));
 $poItemModel->setItem_added_by($this->session->userdata('emp_id'));
	
/*
 $poItemModel->setOrder_Code($this->input->post('purchase_order_id',TRUE));
 $poItemModel->setMaster_Item_Code($this->input->post('item_id',TRUE));
 $poItemModel->setUnit($this->input->post('po_item_unit',TRUE));
 $poItemModel->setUnit_Price($this->input->post('po_item_unit_price',TRUE));
 $poItemModel->setQuantity($this->input->post('po_item_qty',TRUE));
 $poItemModel->setDiscount($this->input->post('discount_percentage',TRUE));
 $poItemModel->setDiscount_Value($this->input->post('discount_amount',TRUE));
 $poItemModel->setItem_Value($this->input->post('po_item_value',TRUE));
 $poItemModel->setInd_Tax($this->input->post('tax_percentage',TRUE));
 $poItemModel->setTax_Value($this->input->post('tax_value',TRUE));
 $poItemModel->setDescription($this->input->post('po_description',TRUE));
 $poItemModel->setItem_added_by($this->session->userdata('emp_id'));
*/
		
 $insertID = $poItemService->addNewItemForPurchaseOrder($poItemModel);
	
	$message="";
	
	if($insertID==1){
	
	$message= '<div class="response-msg success ui-corner-all"><span> Item Added</span>New Item was succesfully added for the purchase order </div>';
	
	}
	else{
	
	$message= '<div class="response-msg error ui-corner-all"><span> Item exists</span>the item is already included in the purchase order request</div>';
	
	}

$purchaseOrderID = $this->input->post('purchase_order_id',TRUE);

$poItemTableView = $this->loadItemTable($purchaseOrderID);

echo $message.'#######----#######'.$poItemTableView;


}//function
		
		
		
		

	
	/*
   function loadItemTable($poID){
			
			
			//$pono = trim($_POST['pono']);
            $pono=$poID;

            $poItemModel = new PurchaseOrderItemModel();
			$poItemService = new PurchaseOrderItemService();
			 
			$poItemModel->setOrder_Code($pono);
			
			$poItemModelArray = $poItemService->getAddedItemForGivenPurchaseOrderRequest($poItemModel);
			
            if(!empty($poItemModelArray))
            {
                echo '<table width="100%">';
                echo '<tr style="background-color: #CDB79E;height: 25px;margine: 5px;" valign="middle">';
                //echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Item Code</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Item Description</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Quantity</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Unit</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Price</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Item Value</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Discount %</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Discount Value</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Ind Tax %</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Ind Tax Value</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Net Value</th>';
                echo '<th style="padding: 5px 5px 5px 0;font-weight:bold;">Action</th>';
                echo '</tr>';
                
                $i = 1;
                
               // foreach ($result->result_array() as $row)
			   for($index=0;$index<sizeof($poItemModelArray);$index++)
                {
                   // $iv = ((floatval($row['Unit_Price']) - (floatval($row['Unit_Price']) * floatval($row['Discount']) / 100) + (floatval(floatval($row['Unit_Price']) - (floatval($row['Unit_Price']) * floatval($row['Discount']) / 100)) * floatval($row['Ind_Tax']) / 100)) * floatval($row['Quantity'])) - floatval($row['Discount_Value']) + floatval($row['Tax_Value']);
				  $iv =100;
				  
                    $i = 1 - $i;
                    
                    if($i == 0)
                    {
                        echo '<tr style="background-color: #FFFFFF;">';
                    }
                    else
                    {
                        echo '<tr style="background-color: #F5F5DC;">';
                    }
                    
                    //echo '<td style="padding: 5px 5px 5px 0;">' . $row['Master_Item_Code'] . '</td>';
                    echo '<td style="padding: 5px 5px 5px 0;">Item name</td>';
                    echo '<td style="padding: 5px 5px 5px 0;">' . $poItemModelArray[$index]->getQuantity(). '</td>';
                    echo '<td style="padding: 5px 5px 5px 0;"> Description </td>';
                  echo '<td style="padding: 5px 5px 5px 0;">' . $poItemModelArray[$index]->getUnit_Price(). '</td>';
                   echo '<td style="padding: 5px 5px 5px 0;">' .$poItemModelArray[$index]->getItem_Value(). '</td>';
                    echo '<td style="padding: 5px 5px 5px 0;">' .$poItemModelArray[$index]->getDiscount(). '</td>';
               echo '<td style="padding: 5px 5px 5px 0;">' .$poItemModelArray[$index]->getDiscount_Value(). '</td>';
                    echo '<td style="padding: 5px 5px 5px 0;">' . $poItemModelArray[$index]->getInd_Tax(). '</td>';
                    echo '<td style="padding: 5px 5px 5px 0;">' .$poItemModelArray[$index]->getTax_Value(). '</td>';
                    echo '<td style="padding: 5px 5px 5px 0;">' . $iv . '<input type="hidden" id="net_val_' . $poItemModelArray[$index]->getMaster_Item_Code(). '" name="txt_net_val_' . $poItemModelArray[$index]->getMaster_Item_Code(). '" value="' . $iv . '"/></td>';
                    echo '<td style="padding: 5px 5px 5px 0;">

                            <a class="lnk_edit_item" href="#" title="Edit Item" onclick="load_item_to_edit(' . $poItemModelArray[$index]->getMaster_Item_Code(). ');">
                                <img src="' . base_url() . 'resources/images/edit_item.png" alt="Edit Item"/>
                            </a>

                            <a class="lnk_delete_item" href="#" onclick="delete_po_items(' .$poItemModelArray[$index]->getMaster_Item_Code(). ');" title="Delete Item">
                                <img src="' . base_url() . 'resources/images/delete_item.png" alt="Delete"/>
                            </a>
                            
                            <a class="lnk_read_more" href="#" title="Read More">
                                <img src="' . base_url() . 'resources/images/read_more.png" alt="Read More"/>
                            </a>
                        </td>';
                    echo '</tr>';
                }//for
                
                echo '</table>';
            }//if
			
			
			
			
			
			
   }//loadItemTable
		
*/



 function loadItemTable($poID){
			
		   ?>
             <script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/custom.js"></script>
          <?php
			 
			$resultTbl="";
			//$pono = trim($_POST['pono']);
            $pono=$poID;

            $poItemModel = new PurchaseOrderItemModel();
			$poItemService = new PurchaseOrderItemService();
			 
			$poItemModel->setOrder_Code($pono);
			
			$poItemModelArray = $poItemService->getAddedItemForGivenPurchaseOrderRequest($poItemModel);
			
            if(!empty($poItemModelArray))
            {
                 $resultTbl= $resultTbl.'<table width="100%">';
                 $resultTbl= $resultTbl.'<tr style="background-color: #CDB79E;height: 25px;margine: 5px;" valign="middle">';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Item Name</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Quantity</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Unit</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Price</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Item Value</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Discount %</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Discount Value</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Ind Tax %</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Ind Tax Value</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Net Value</th>';
                 $resultTbl= $resultTbl.'<th style="padding: 5px 5px 5px 0;font-weight:bold;">Action</th>';
                 $resultTbl= $resultTbl.'</tr>';
                
                $i = 1;
                
               // foreach ($result->result_array() as $row)
			   for($index=0;$index<sizeof($poItemModelArray);$index++)
                {
                   // $iv = ((floatval($row['Unit_Price']) - (floatval($row['Unit_Price']) * floatval($row['Discount']) / 100) + (floatval(floatval($row['Unit_Price']) - (floatval($row['Unit_Price']) * floatval($row['Discount']) / 100)) * floatval($row['Ind_Tax']) / 100)) * floatval($row['Quantity'])) - floatval($row['Discount_Value']) + floatval($row['Tax_Value']);
				   
				   //retirve Item name
				   $itemMasterModel =  new ItemMasterModel();
				   $itemMasterModel->setMaster_Item_Code($poItemModelArray[$index]->getMaster_Item_Code());
				   
				   $itemMasterService = new ItemMasterService();
				   $itemMasterModelRetrieved = $itemMasterService->retrieveItemDetails($itemMasterModel);
				
				   //retieve unit details
				   $unitService = new UnitModelService();
				   $unitService->setUnit_Code($poItemModelArray[$index]->getUnit());
				   
				   $unitRetrieved = $unitService->retrieveUnitDetails($unitService);
				   $unitDescription = $unitRetrieved->getDescription();
				   
				   
				 $unitPrice=$poItemModelArray[$index]->getUnit_Price();
				 $discount=$poItemModelArray[$index]->getDiscount();
				 $discountVal=$poItemModelArray[$index]->getDiscount_Value();
				 $indTax= $poItemModelArray[$index]->getInd_Tax();
				 $taxVal=$poItemModelArray[$index]->getTax_Value();
				 $quantity=$poItemModelArray[$index]->getQuantity();
				 
				 $iv = ((($unitPrice) - (floatval($unitPrice) * floatval($discount) / 100) + (floatval(floatval($unitPrice) - (floatval($unitPrice) * floatval($discount) / 100)) * floatval($indTax) / 100)) * floatval($quantity)) - floatval($discountVal) + floatval($taxVal);
				 
                    $i = 1 - $i;
                    
                    if($i == 0)
                    {
                         $resultTbl= $resultTbl.'<tr style="background-color: #FFFFFF;">';
                    }
                    else
                    {
                         $resultTbl= $resultTbl.'<tr style="background-color: #F5F5DC;">';
                    }
                    
                    //echo '<td style="padding: 5px 5px 5px 0;">' . $row['Master_Item_Code'] . '</td>';
                     $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">'.substr($itemMasterModelRetrieved->getItem_Name(),0,25).'</td>';
                     $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">' . $poItemModelArray[$index]->getQuantity(). '</td>';
                     $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;"> '.$unitDescription.' </td>';
                   $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">' . $poItemModelArray[$index]->getUnit_Price(). '</td>';
                    $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">' .$poItemModelArray[$index]->getItem_Value(). '</td>';
                     $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">' .$poItemModelArray[$index]->getDiscount(). '</td>';
                $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">' .$poItemModelArray[$index]->getDiscount_Value(). '</td>';
                     $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">' . $poItemModelArray[$index]->getInd_Tax(). '</td>';
                     $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">' .$poItemModelArray[$index]->getTax_Value(). '</td>';
                     $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">' . $iv . '<input type="hidden" id="net_val_' . $poItemModelArray[$index]->getMaster_Item_Code(). '" name="txt_net_val_' . $poItemModelArray[$index]->getMaster_Item_Code(). '" value="' . $iv . '"/></td>';
                     $resultTbl= $resultTbl.'<td style="padding: 5px 5px 5px 0;">

                            <a  class="lnk_update_item" href="#" onclick="load_item_details_for_edit(' .$poItemModelArray[$index]->getMaster_Item_Code(). ','.$poItemModelArray[$index]->getOrder_Code().')">
                              <img src="' . base_url() . 'template_resources/images/edit_item.png" alt="Edit Item"/>
                            </a> &nbsp;&nbsp;

                            <a class="lnk_delete_item" href="#" onclick="delete_po_items(' .$poItemModelArray[$index]->getMaster_Item_Code(). ');" title="Delete Item">
                                <img src="' . base_url() . 'template_resources/images/delete_item.png" alt="Delete"/>
                            </a>
                            
                        </td>';
                     $resultTbl= $resultTbl.'</tr>';
                }//for
                
                 $resultTbl= $resultTbl.'</table>';
            }//if
			
			return  $resultTbl;
			
			
			
			
   }//loadItemTable




     function displayAddedItemsForPurchaseOrder($po_request_id){
	 
	 echo $this->loadItemTable($po_request_id);
		 
	 }//function
	 
	 
	 
	 
	 
	 
	 
	 
	 function editItemsInPurchaseOrder(){
		
		//check the priviledges
			
		$poItemService = new PurchaseOrderItemService();
		$poItemModel =new PurchaseOrderItemModel();
		
	//	$poOldItemModel =new PurchaseOrderItemModel();

		
		$discountVal = $this->input->post('edit_discount_amount',TRUE);
		$discountPercentage = $this->input->post('edit_discount_percentage',TRUE);
		
		$taxVal = $this->input->post('edit_tax_value',TRUE);
		$taxPercentage = $this->input->post('edit_tax_percentage',TRUE);
		
		if($discountVal==""){
		
		 $discountVal = 0;
		 
		}
		
		
		if($discountPercentage==""){
		
		$discountPercentage = 0.0;
		
		}
		
		
		if($taxVal==""){
		
		 $taxVal = 0;
		 
		}
		
		
		if($taxPercentage==""){
		
		$taxPercentage = 0.0;
		
		}
		
	
 //$previousItemID = $this->input->post('previous_item_id',TRUE);
 
 $poItemModel->setOrder_Code($this->input->post('updating_po_id',TRUE));
 $poItemModel->setMaster_Item_Code($this->input->post('updating_item_id',TRUE));
 $poItemModel->setUnit($this->input->post('edit_po_item_unit',TRUE));
 $poItemModel->setUnit_Price($this->input->post('edit_po_item_unit_price',TRUE));
 $poItemModel->setQuantity($this->input->post('edit_po_item_qty',TRUE));
 $poItemModel->setDiscount($discountPercentage);
 $poItemModel->setDiscount_Value($discountVal);
// $poItemModel->setItem_Value($this->input->post('edit_po_item_value',TRUE));
 $poItemModel->setInd_Tax($taxPercentage);
 $poItemModel->setTax_Value($taxVal);
 $poItemModel->setDescription($this->input->post('edit_po_description',TRUE));
 $poItemModel->setItem_added_by($this->session->userdata('emp_id'));
	

 //setting up the old PO Item data moderl
 /* $poOldItemModel->setMaster_Item_Code($previousItemID);
  $poOldItemModel->setOrder_Code($this->input->post('updating_po_id',TRUE));*/
  
 // echo "updated 123";
  
 $poItemService->updateItemInPurchaseOrder($poItemModel);
  
/*
 $insertID = $poItemService->addNewItemForPurchaseOrder($poItemModel);
	
	$message="";
	
	if($insertID==1){
	
	$message= '<div class="response-msg success ui-corner-all"><span> Item Added</span>New Item was succesfully added for the purchase order </div>';
	
	}
	else{
	
	$message= '<div class="response-msg error ui-corner-all"><span> Item exists</span>the item is already included in the purchase order request</div>';
	
	}
*/

$message= '<div class="response-msg success ui-corner-all"><span> Item Updated</span>Item was succesfully updated for the purchase order </div>';

$purchaseOrderID = $this->input->post('updating_po_id',TRUE);

$poItemTableView = $this->loadItemTable($purchaseOrderID);

echo $message.'#######----#######'.$poItemTableView;


}//function
		
		
	 
	 
	 
	 
	 function retrivePurchaseOrderItemDetails(){
		 
		 
		 //echo "retriveItemDetails".$this->input->post('itemID',TRUE);
		
		  $poItemModel = new PurchaseOrderItemModel();
		  $poItemModel->setOrder_Code($this->input->post('purchaseOrderID',TRUE));
          $poItemModel->setMaster_Item_Code($this->input->post('itemID',TRUE));
 
		$poItemService = new PurchaseOrderItemService();
		$poItemModelRetrieved = $poItemService->retrieveSelectedPurchaseOrderItemDetails($poItemModel);
		 
		 $arr = (array) $poItemModelRetrieved;
		 
		 		   $itemMasterModel =  new ItemMasterModel();
				   $itemMasterModel->setMaster_Item_Code($poItemModelRetrieved->getMaster_Item_Code());
				   
				   $itemMasterService = new ItemMasterService();
				   $itemMasterModelRetrieved = $itemMasterService->retrieveItemDetails($itemMasterModel);
		 
		// echo "retrived datab ".print_r($arr);
		 
		// echo "item name ".$itemMasterModelRetrieved->getItem_Name();
		
		$data = $itemMasterModelRetrieved->getItem_Name();
		$data = $data."####".$poItemModelRetrieved->getUnit()."####".$poItemModelRetrieved->getUnit_Price()."####".$poItemModelRetrieved->getQuantity()."####".$poItemModelRetrieved->getDiscount()."####".$poItemModelRetrieved->getDiscount_Value()."####".$poItemModelRetrieved->getInd_Tax()."####".$poItemModelRetrieved->getTax_Value()."####".$poItemModelRetrieved->getDescription();
		
		echo $data;
		
	 }//retriveItemDetails
	 
	 







     function viewListOfPurchaseOrders(){
		 
		 
		 if($this->session->userdata('logged_in'))
			{
		     //the user is logged and priviledges should be checked
			$userPriviledgeModel=new UserPriviledge();
			
		    $userPriviledgeModel->setLevelCode($this->session->userdata('level'));
			$userPriviledgeModel->setDepartmentCode( $this->session->userdata('department'));
			$userPriviledgeModel->setPriviledgeCode(5);//priviledge 5 is for creating purchase order requests
			
			$hasPriviledges=$userPriviledgeModel->checkUserPriviledge($userPriviledgeModel);
						
			if($hasPriviledges){			
			 
			 $employeeID = $this->session->userdata('emp_id');
			 
			  // echo "user has the priviledges";
			  
			  $poReqModel = new PurchaseOrderRequestModel();
			  
			  
			  $poReqModel->setCreated_By($employeeID);

			  $poReqService = new PurchaseOrderRequestService();
			  
			  $purchaseOrders = $poReqService->getPurchaseOrderDetailsPlacedByGivenUser($poReqModel);
			  
			  			//setting up the data array
			       $data = array('PurchaseOrders'=>$purchaseOrders);
			
						$this->template->setTitles('LankaCom Inventory Management System', 'Subsidiry of Singapoor Telecom', 'Purchase Orders', 'Your List of Purchase Orders...');
		
			$this->template->load('template', 'PurchaseOrder/viewPurchaseOrdersList',$data);
			 			//$this->template->load('template', 'PurchaseOrder/viewPurchaseOrdersList');

			      
				  
		     }//hasPriviledges
			else{
				
			  // "user doesnt have the priviledges";
			  
			  $this->template->setTitles('Access Denied', 'You are not allowed to access this page.', 'You are not allowed to access this page.', 'Please Contact Administrator...');
			
			$this->template->load('template', 'errorPage');
						
			}
			
			}//if
			else{
				
				
			redirect(base_url().'index.php');
	
			
			}
			
		 
	 }//function
	 
	 
	 
	 
	 
	 
	 function editPurchaseOrderView($purchaseOrderCode){
		 
		 
		if($this->session->userdata('logged_in'))
			{
		     //the user is logged and priviledges should be checked
			$userPriviledgeModel=new UserPriviledge();
			
		    $userPriviledgeModel->setLevelCode($this->session->userdata('level'));
			$userPriviledgeModel->setDepartmentCode( $this->session->userdata('department'));
			$userPriviledgeModel->setPriviledgeCode(5);//priviledge 5 is for creating purchase order request
			
			$hasPriviledges=$userPriviledgeModel->checkUserPriviledge($userPriviledgeModel);
						
			if($hasPriviledges){			
			 
			 $employeeID = $this->session->userdata('emp_id');
			 
			  // echo "user has the priviledges";
			  
			  //start
			  
			  //retrieveing department details
			$departmentModel = new DepartmentModel();
			$departmentService = new DepartmentService();
			
			$departmentModel->setDepartmentCode($this->session->userdata('department'));
			$departmentName=$departmentService->retrieveDepartmentName($departmentModel);
			
			
			//retrieving currency details
			$currencyService = new CurrencyService();
			$currencyObjectArray = $currencyService->retriveAllCurrencyDetails();
			
			
			//retrieving payment type details
			$paymentTypeService = new PaymentTypeService();
			$paymentTypeObjectArray = $paymentTypeService->retriveAllPaymentTypes();
			
			
			$unitService = new UnitModelService();
			
			$unitModelObjArr = $unitService->retrieveAllUnitDetails();
			//retrieving all details related to the purchase order request
			
			$poReqService = new PurchaseOrderRequestService();
			
			$poModel = new PurchaseOrderRequestModel();
			
			$poModel->setOrder_Code($purchaseOrderCode);
			
			$poModelRetrieved = $poReqService->getPurchaseOrderDetailsForGivenOrderID($poModel);
			
			
			//supplier type retrieving
			$supplierModelObject = new SupplierModel();
			
			$supplierModelObject->setSupplier_Code($poModelRetrieved->getSupplier_Code());
			$supService = new SupplierService();
			$supModRetrieved = $supService->getGivenSupplierDetails($supplierModelObject);
			
			//setting up the data array
			$data=array('departmentName'=>$departmentName,'currencyObjectArray'=>$currencyObjectArray,'paymentTypeObjectArray'=>$paymentTypeObjectArray,'UnitArray'=>$unitModelObjArr,'PurchaseOrderID'=>$purchaseOrderCode,'PurchaseOrderRequestObject'=>$poModelRetrieved,'SupplierType'=>$supModRetrieved->getSupplier_Type());
			  		  
			  //end
			  
			
						$this->template->setTitles('LankaCom Inventory Management System', 'Subsidiry of Singapoor Telecom', 'Edit Purchase Order', 'Edit Your Purchase Order...');
						
		    if($poModelRetrieved->getStatus_Code()=='1'){
			   
			$this->template->load('template', 'PurchaseOrder/EditPurchaseOrderView',$data);	
			
			}
			else{
				
				
				redirect(base_url()."index.php/PurchaseOrder/PurchaseOrderManagement/viewListOfPurchaseOrders");
				
			}//else
				  
		     }//hasPriviledges
			else{
				
			  // "user doesnt have the priviledges";
			  
			  $this->template->setTitles('Access Denied', 'You are not allowed to access this page.', 'You are not allowed to access this page.', 'Please Contact Administrator...');
			
			$this->template->load('template', 'errorPage');
						
			}
			
			}//if
			else{
				
				
			redirect(base_url().'index.php');
	
			
			}
			
		 
	 }//editPurchaseOrderView
	 
	 
	 
	 
	 
	 function sendForHODapproval(){
		 
		 
		 $poRequestID = $this->input->post('PO_Request_ID',TRUE);
		 
		 $poRequestModel = new PurchaseOrderRequestModel();
		 
		 $poRequestService = new PurchaseOrderRequestService();
		 
		 $poRequestModel->setOrder_Code($poRequestID);
		 $poRequestModel->setStatus_Code(2);
		 
		 $poRequestService->updatePurchaseOrderRequest($poRequestModel);
		 
		 echo '<font color="#009900">Purchase Order Request was succesfully sent for the HOD Approval</font>';
		 
		 
	 }//sendForHODapproval
	 
	 
	 
	 
	 function displayApprovedPO(){
			 
		 echo  "displayApprovedPO";
		 
	 }//displayApprovedPO

	
		
		
	}//class
?>