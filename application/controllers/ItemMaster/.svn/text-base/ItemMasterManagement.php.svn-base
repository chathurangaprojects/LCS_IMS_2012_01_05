<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class ItemMasterManagement extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		
			if(!$this->session->userdata('logged_in'))
			{
				redirect(base_url() . 'index.php/login');
			}
		
		$this->load->model('ItemMaster/ItemMasterModel');
		$this->load->model('ItemMaster/ItemMasterService');
		}
	
		public function insertItemMasterDetails()
		{
			$this->template->setTitles('Insert Master Items', '', 'Add New Master Items', '');
			
			$this->template->load('template', 'ItemMaster/InsertItemMasterDetails');
		}
		
		public function autoComplete()
		{
			echo "aaaaa - bbbbb - 10\n";
			echo "ccccc - ddddd - 20\n";
			echo "eeeee - fffff - 30\n";
			echo "ggggg - hhhhh - 40\n";
			echo "iiiii - jjjjj - 50\n";
			echo "jjjjj - kkkkk - 60\n";
			
			
			
			
	//		$this->load->model('model','get_data');
	//		$query= $this->get_data->get_autocomplete();
 //       
	//		foreach($query->result() as $row):
 //       
	//		//echo "<li>id ."\")'>".$row->ciudad."</li>";
	//	
	//		echo "<li>".$row->Item_Name."</li>";
////
			//endforeach;
		}
	}
?>