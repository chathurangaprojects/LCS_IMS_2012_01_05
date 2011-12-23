<?php
	class ItemMasterService extends CI_Model {
	
		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}//constructor
	
		public function loadItemTypes($itemMasterModel)
		{
			$val = explode(' ', trim($itemMasterModel->getItem_Name()));

			$qry = '';

			$i = 0;
			while($i < count($val))
			{
				if($i == 0)
				{
					$qry = "ta_ims_item_type.Item_Type LIKE '%" . $val[$i] . "%'";
				}
				else
				{
					$qry = $qry . " AND ta_ims_item_type.Item_Type LIKE '%" . $val[$i] . "%'";
				}

				$i += 1;
			}
		
			$sql = "SELECT ta_ims_item_type.*, ta_ims_main_category.Category_Name FROM ta_ims_item_type INNER JOIN ta_ims_main_category ON ta_ims_item_type.Category_Code = ta_ims_main_category.Category_Code WHERE " . trim($qry) . " OR ta_ims_item_type.Description LIKE '%" . trim($itemMasterModel->getItem_Name()) . "%'";
		
			$results = $this->db->query($sql);

			if($results->num_rows() > 0)
			{
				return $results;
			}
			else
			{
				return NULL;
			}
		}
	}
?>