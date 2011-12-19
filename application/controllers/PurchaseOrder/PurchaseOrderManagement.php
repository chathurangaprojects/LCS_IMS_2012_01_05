<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class PurchaseOrderManagement extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		
			if(!$this->session->userdata('logged_in'))
			{
				redirect(base_url() . 'index.php/login');
			}
		}
		
		function createNewPurchaseOrder()
		{
			$this->template->setTitles('LankaCom Inventory Management System', 'Subsidiry of Singapoor Telecom', 'Create New Purchase Order', 'Please Fill All The Mandatory Fields...');
		
			$this->template->load('template', 'PurchaseOrder/AddNewPurchaseOrderView');
		}
	}
?>