//var base_url = 'http://localhost/LCS_IMS/';
//var site_url = 'http://localhost/LCS_IMS/index.php';

//$().ready(function () {
//    //form name and id
//    $("#insert_master_item_form").validate
//	({



//	    rules:
//		{
//		    Item_Name: "required",
//		    Item_Type: "required"
//		},
//	    messages:
//		{
//		    Item_Name: "Item Name is required",
//		    Item_Type: "Item Type is required"

//		},

//	    submitHandler: function (form) {
//	        $('#addnewempmsg').html('<div class="response-msg inf ui-corner-all"><span>Please Wait...</span>New Master Item is being inserted...</div>');

//	        $.post(site_url + '/ItemMaster/ItemMasterManagement/insertItemMasterDetails', $("#insert_master_item_form").serialize(), function (msg) {
//	            $('#addnewempmsg').html(msg);
//	        });
//	    }

//	});
//});

var base_url = 'http://localhost/LCS_IMS/';
var site_url = 'http://localhost/LCS_IMS/index.php';

$().ready(function () {
    //form name and id
    $("#insert_master_item_form").validate
	({
	    rules:
		{
		    Item_Name: "required",
		    Item_Type: "required",
		    Reorder_Level: "number",
		    Reorder_Quantity: "number"
		},
	    messages:
		{
		    Item_Name: "Item Name is required",
		    Item_Type: "Item Type is required",
		    Reorder_Level: "Invalid Re-Order Level",
		    Reorder_Quantity: "Invalid Re-Order Quantity"

		},

	    submitHandler: function (form) {
	        $('#addnewempmsg').html('<div class="response-msg inf ui-corner-all"><span>Please Wait...</span>New Master Item is being inserted...</div>');

	        $.post(site_url + '/ItemMaster/ItemMasterManagement/insertItemMasterDetails', $("#insert_master_item_form").serialize(), function (msg) {
	            if (jQuery.trim(msg) == '1') {
	                $('#addnewempmsg').html('<div class="response-msg success ui-corner-all"><span>Master Item Inserted</span>New Master Item is inserted to the database successfully</div>');
	            }
	            else {
	                $('#addnewempmsg').html('<div class="response-msg error ui-corner-all"><span>Master Item Cannot Be Inserted</span>New Master Item cannot be inserted. Please try again...</div>');
	            }
	        });
	    }

	});
});