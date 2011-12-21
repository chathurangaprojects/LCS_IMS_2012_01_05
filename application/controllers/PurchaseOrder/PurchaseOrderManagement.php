<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class PurchaseOrderManagement extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		
			$this->load->model(array('PurchaseOrder/DepartmentModel','PurchaseOrder/DepartmentService'));

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
			
			$departmentModel = new DepartmentModel();
			$departmentService = new DepartmentService();
			
			$departmentModel->setDepartmentCode($this->session->userdata('department'));
			$departmentName=$departmentService->retrieveDepartmentName($departmentModel);
			
			$data=array('departmentName'=>$departmentName);
			 			
						$this->template->setTitles('LankaCom Inventory Management System', 'Subsidiry of Singapoor Telecom', 'Create New Purchase Order', 'Please Fill All The Mandatory Fields...');
		
			$this->template->load('template', 'PurchaseOrder/AddNewPurchaseOrderView',$data);
			
			
			
			//echo "department".$this->session->userdata('department');
			
				
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
	}
?>