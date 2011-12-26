var base_url = 'http://localhost/LCS_IMS/';
var site_url = 'http://localhost/LCS_IMS/index.php';

$().ready(function () {
    $("#Item_Type").autocomplete(site_url + "/Autocomplete/loadItemTypes", {
        width: 525,
        matchContains: true,
        //mustMatch: true,
        //minChars: 0,
        //multiple: true,
        //highlight: false,
        //multipleSeparator: ",",
        selectFirst: false,


        formatItem: function (data, i, n, value) {
            var x = value.split("-")[2];

            return "<span onclick='alert(\"" + jQuery.trim(value.split("-")[2]) + "\")'>" + value + "</span>";
        },
        formatResult: function (data, value) {
            return value.split("-")[0];
        }
        }).result(function(event, data, formatted){ 
	
	var selectedID = formatted.split("-")[2];
	 
	 //$('#sup_id_val').val(selectedID);
     alert(selectedID);
	
	}//result
	);
	
	
	
	
	//sup
	// extraParams: {serial: function() { return $("#serial").val(); } },
	//sup2
	
	$("#sup_name").autocomplete(site_url + "/Autocomplete/loadSuppliers", {
	    width: 525,
		//autoFill : true,
		
		extraParams: {sup_type: function() {  return $("#sup_type").val(); } },
        matchContains: true,
        selectFirst: false,
		cacheLength: 0,
formatItem: function (data, i, n, value) {
var supplierName = value.split("###")[1];
        //jQuery(this).flushCache();

return "<span>" + supplierName + "</span>";

},
formatResult: function (data, value) {
	return value.split("###")[1];
}


    }).result(function(event, data, formatted){ 
	
	var selectedID = formatted.split("###")[0];
    // $("#sup_type").flushCache();
    // $('form[name=purchase_order_request] #supplier_id').val(selectedID);
	 $('#supplier_id').val(selectedID);
	
	}//result
	
	);
	
	//sup2
	
	/*
	$("#sup_name").autocomplete(site_url + "/Autocomplete/loadSuppliers", {
	    width: 525,
        matchContains: true,
        selectFirst: false,
formatItem: function (data, i, n, value) {
var x = value.split("-")[2];

return "<span>" + value + "</span>";

},
formatResult: function (data, value) {
	return value.split("-")[0];
}


    }).result(function(event, data, formatted){ 
	
	var selectedID = formatted.split("###")[0];

    // $('form[name=purchase_order_request] #supplier_id').val(selectedID);
	 $('#supplier_id').val(selectedID);
	
	}//result
	
	);
	
	*/
	
	
	
	
	
    });
	
	
