var base_url = 'http://localhost/LCS_IMS/';
var site_url = 'http://localhost/LCS_IMS/index.php';

$().ready(function () {
    //form name and id
    $("#insert_master_item_form").validate
	({



	    rules:
		{
		    Item_Name: "required",
		    Item_Type: "required"
		},
	    messages:
		{
		    Item_Name: "Item Name is required",
		    Item_Type: "Item Type is required"

		},

	    submitHandler: function (form) {
	        $('#addnewempmsg').html('<div class="response-msg inf ui-corner-all"><span>Please Wait...</span>New Master Item is being inserted...</div>');

	        $.post(site_url + '/ItemMaster/ItemMasterManagement/insertItemMasterDetails', $("#insert_master_item_form").serialize(), function (msg) {
	            $('#addnewempmsg').html(msg);
	        });
	    }

	});
});