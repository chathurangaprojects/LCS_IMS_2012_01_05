<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class PurchaseOrderManagement extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		
			$this->load->model(array('PurchaseOrder/DepartmentModel','PurchaseOrder/DepartmentService','PurchaseOrder/CurrencyModel','PurchaseOrder/CurrencyService','PurchaseOrder/PaymentTypeModel','PurchaseOrder/PaymentTypeService','PurchaseOrder/PurchaseOrderRequestModel','PurchaseOrder/PurchaseOrderRequestService'));
		   
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
			
			
			
			//setting up the data array
			$data=array('departmentName'=>$departmentName,'currencyObjectArray'=>$currencyObjectArray,'paymentTypeObjectArray'=>$paymentTypeObjectArray);
			
			
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
				 $poRequest->setPO_Remarks($this->input->post('pay_remark',TRUE));
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
		
		
		
		
	}//class
?>