// JavaScript Document
var base_url ='http://localhost/LCS_IMS/';

//user login process 


$(document).ready(function() {
    
    $('#login_button').click(function() {

	var login_username= $('#login_username').val();
	var login_password= $('#login_password').val();	
	
	$('#login_msg').html('<span class="response-msg notice ui-corner-all">validating...</span>');
	
	

	$.ajax({
	   type: "POST",
	   url: base_url+"index.php/Login/authenticateUser/",   
	   data: "login_username="+login_username+"&login_password="+login_password,
	   
	   
	   success: function(msg){
		   

	   if(msg==1){     
    $('#login_msg').html('<div class="response-msg success ui-corner-all">Login successfull..</div>');   
      setTimeout("location.href = base_url",100); 
          } else{			   
$('#login_msg').html('<div class="response-msg error ui-corner-all">Invalid login details...</div>');   
    	}	   
	  
   }
   
 });
	
	 });
	
	
			
});




//adding new employee
/*
function addNewEmployee(){
    
       
    var Employee_Name = $('#Employee_Name').val();
    var Designation = $('#Designation').val();
    var Department_Code = $('#Department_Code').val();
    var Email = $('#Email').val();
    var Level_Code = $('#Level_Code').val();
    
	  if(Employee_Name==""){
		  
		 $('#addnewempmsg').html('<font color="#CC0000">Employee Name is required </font>'); 
	  }
	  else if(Designation==""){
		  
		 $('#addnewempmsg').html('<font color="#CC0000">Designation field is required </font>'); 
	  }
      else if(Department_Code==""){
		  
		 $('#addnewempmsg').html('<font color="#CC0000">Department is Required </font>');
		 
	  }
	  else if(Email=="" && validateEmail()){
		 $('#addnewempmsg').html('<font color="#CC0000">Email is required </font>'); 
	  }
	  else if(Level_Code==""){
		  
		 $('#addnewempmsg').html('<font color="#CC0000">Security Level is required </font>'); 
	  }
	  
	  else{
	  
	  $('#addnewempmsg').html('<font color="#CC0000"> Please wait............ </font>'); 
	  
   $.ajax({
   type: "POST",   
   url: base_url+"index.php/UserAdministration/EmployeeAdministration/registerNewEmployee", 
   data: "Employee_Name="+Employee_Name+"&Designation="+Designation+"&Department_Code="+Department_Code+"&Email="+Email+"&Level_Code="+Level_Code,
   
   success: function(msg){
     
   $('#addnewempmsg').html(msg); 
     
   }
   
  
 });   
   
 
 }//else
	  
     
}//addEmployee
*/


function addNewEmployee(){
    
     
    var Employee_Name = $('#Employee_Name').val();
    var Designation = $('#Designation').val();
    var Department_Code = $('#Department_Code').val();
    var Email = $('#Email').val();
    var Level_Code = $('#Level_Code').val();

    
	  
	  
 $('#addnewempmsg').html('<font color="#CC0000"> Please wait............ </font>'); 
	  
   $.ajax({
   type: "POST",   
   url: base_url+"index.php/UserAdministration/EmployeeAdministration/registerNewEmployee", 
   data: "Employee_Name="+Employee_Name+"&Designation="+Designation+"&Department_Code="+Department_Code+"&Email="+Email+"&Level_Code="+Level_Code,
   
   success: function(msg){
     
   $('#addnewempmsg').html(msg); 
     
   
   }
  
 });   
   

  
}//addEmployee


/*
// validate signup form on keyup and submit
$("#user_registration_form").validate({
rules: {
Employee_Name: "required",
Designation: "required",
email: {
required: true,
email: true
},
messages: {
Employee_Name: "Please enter your firstname",
Designation: "Please enter your lastname",
email: "Please enter a valid email address",
}
}
});*/


/*
$().ready(function() {
	$("#user_registration_form").validate
	({
		rules:
		{
			Employee_Name: "required", messages:
			{
				Employee_Name: "Please enter your firstname"
			}
		}
	});
});

*/

function adduser(){
	
	
	alert('ddddd');
	
	
	
	
}




$().ready(function() {
    //form name and id
	$("#user_registration_form").validate
	({
	 
	 
	 
		rules:
		{
			Employee_Name: "required",
			Designation: "required",
			Department_Code: "required",
			Level_Code: "required",
			Email: {
				required: true,
				email: true
			}
		},
			messages:
			{
				Employee_Name: "Employee Name is required",
				Designation: "Designation is required",
				Department_Code: "Departmen code is required",
				Email: "Please enter valid email address",
				Level_Code: "Security Level is required"
				
			},
			
			submitHandler: function(form) {
				 $('#addnewempmsg').html('<font color="#CC0000"> Please wait............ </font>'); 
				$.post(base_url+'index.php/UserAdministration/EmployeeAdministration/registerNewEmployee', $("#user_registration_form").serialize(), function(msg) {
					$('#addnewempmsg').html(msg);
				});
			}

	});
});






//user edit start


$().ready(function() {
    //form name and id
	$("#user_profile_edit_form").validate
	({
	 
	 
	 
		rules:
		{
			Employee_Name: "required",
			Designation: "required",
			Department_Code: "required",
			Level_Code: "required",
			Email: {
				required: true,
				email: true
			}
		},
			messages:
			{
				Employee_Name: "Employee Name is required",
				Designation: "Designation is required",
				Department_Code: "Department code is required",
				Email: "Please enter valid email address",
				Level_Code: "Security Level is required"
				
			},
			
			submitHandler: function(form) {
				 $('#addnewempmsg').html('<font color="#CC0000"> Please wait............ </font>'); 
				$.post(base_url+'index.php/UserAdministration/EmployeeAdministration/updateEmployeeProfile', $("#user_profile_edit_form").serialize(), function(msg) {
					$('#addnewempmsg').html(msg);
				});
			}

	});
});






//user edit ends





//purchase order request

/*

$().ready(function() {
    //form name and id
	$("#purchase_order_request").validate
	({
	 
	 //sup_name
	 
		rules:
		{
			sup_name: "required",
			quatation_no: "required",
			attention: "required",
			order_date: {				
			   required: true,
			   date : true
			},
			expected_date: {				
			   required: true,
			   date : true
			},
			sup_type:"required",
			Department_Code:"required",
			currrency_selector:"required",
			conversion_rate : "required",
			payment_type:"required"
		},
			messages:
			{
				sup_name: "Supplier Name is required",
				sup_type: "Supplier type is required",
				quatation_no: "Quatation no required",
				attention: "Attention is required",
				order_date: "Order date is required",
		        expected_date: "Please select valid Expected Date",
				Department_Code:"Department is required",
				currrency_selector: "Please select the currency",
				conversion_rate : "Conversion rate is required",
				payment_type:"Please select the payment type"
				
				
			},
			
			submitHandler: function(form) {
				
				var isAllFiedsValidated=$('#required_fields').val();
				if(isAllFiedsValidated=='true'){
					
					// all the data fields are validated and ready for the submission
				$('#required_fields').val('true');
				//set this id using ajax			
			$.post(base_url+'index.php/PurchaseOrder/PurchaseOrderManagement/createNewPurchaseOrderRequest', $("#user_registration_form").serialize(), function(msg) {
					$('form[name=purchase_order_request] #po_request_id').val(msg);
				});
								
				}//if
				
			}//submitHandler

	});
	
});


*/





$().ready(function() {
    //form name and id
	//alert('lcs');
	$("#purchase_order_request").validate
	({
	 	 
		rules:
		{
			sup_name: "required",			
			order_date: {				
			   required: true,
			   date : true
			},
			expected_date: {				
			   date : true
			},
			sup_type:"required",
			Department_Code:"required",
			currrency_selector:"required",
			conversion_rate : "required",
			payment_type:"required"
		},
			messages:
			{
				sup_name: "Supplier Name is required",
				sup_type: "Supplier type is required",
				order_date: "Order date is required",
				expected_date: "Expected date is invalid",
				Department_Code:"Department is required",
				currrency_selector: "Please select the currency",
				conversion_rate : "Conversion rate is required",
				payment_type:"Please select the payment type"
				
				
			},
			
			submitHandler: function(form) {
								
				//var isAllFiedsValidated=$('#required_fields').val();
			  var expectedDateValidity =  $("#expected_date_validity").val();

				if(expectedDateValidity=='true'){
					
					// all the data fields are validated and ready for the submission
				//$('#required_fields').val('true');
				//set this id using ajax			
			$.post(base_url+'index.php/PurchaseOrder/PurchaseOrderManagement/createNewPurchaseOrderRequest', $("#purchase_order_request").serialize(), function(msg) {
					//$('form[name=purchase_order_request] #po_request_id').val(msg);
					$('#po_request_message').html('<font color="#009900">'+msg.split('#')[0]+'</font>'); 
					
					var purchaseOrderID=msg.split('#')[1];
					//set up the purchase order id for adding items for the purchase order 
					$('form[name=add_purchase_order_item] #purchase_order_id').val(purchaseOrderID);
					$('form[name=purchase_order_request] #po_request_id').val(purchaseOrderID);
					//setting up the valus changed as false... because the insert or update is already done
					//$('#po_details_change').val('false');
					
					$('#dlg_add_item').dialog('open');
					
				});
								
				}//if expectedDateValidity
				
				
			}//submitHandler

	});
	
	
		openDialog();
	
});



function openDialog(){
	
	
	$('#dialog').dialog({
		autoOpen: false,
		width: 600,
		bgiframe: false,
		modal: false,
		buttons: {
			"Ok": function() { 
				$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
		
		
}//openDialog



//purchase order request




function retriveDepartment(){
	
	
    var departmentCode = $('#Department_Code').val();
	
  $('#user_status').html("<label>Display all </label><br/> <input type='radio' id='employee_status' name='employee_status' value='1' onchange='retrieveAllRegisteredEmployees()' checked/> Active Employees </input> <br/> <br/><input type='radio' id='employee_status' name='employee_status' value='0' onchange='retrieveAllRegisteredEmployees()'/> Inactive Employees </input> <br/><br/><input type='radio' id='employee_status' name='employee_status' value='3' onchange='retrieveAllRegisteredEmployees()'/> Both Active and Inactive Employees </input> <br/><br/> ");
	
}


function retrieveAllRegisteredEmployees(){
	
	var departmentCode = $('#Department_Code').val();
	var employee_status = $('input:radio[name=employee_status]:checked').val()
	
	if(departmentCode=='-1'){
		
	alert('Please Select a Department');
	}
	else{
	
	//alert(employee_status+" employees in "+departmentCode+" department");
	$('#user_message').html('<font color="#CC0000"> Please wait.... your request is being processed.....</font>');
	
	//start
	
   $.ajax({
   type: "POST",   
   url: base_url+"index.php/UserAdministration/EmployeeAdministration/retriveRegisteredEmployeesInDepartment", 
   data: "employeeStatus="+employee_status+"&departmentCode="+departmentCode,
   
   success: function(msg){
    
   $('#user_message').html('');	
   $('#registeredEmployeeTable').html(msg);  
   
   }
   });
	
	//end
	
	}//else
}//function




function onValueChange(id){

	/* setting up the hidden field value based on the value change of the required fields */
	var value = $('#'+id).val();
	
	alert("lcs value["+value+"]");
	
	if(trim(value)==""){
		
		$('#required_fields').val('false');
	}
	
}




// Removes leading whitespaces
function LTrim( value ) {
	
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
	
}

// Removes ending whitespaces
function RTrim( value ) {
	
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");
	
}

// Removes leading and ending whitespaces
function trim( value ) {
	
	return LTrim(RTrim(value));
	
}



/*

function purchaseOrderRequestFormValidation(){
	
	
	var order_date=trim($('#order_date').val());
	var expected_date=trim($('#expected_date').val());
	
	var date_result=order_date<=expected_date;
	var sup_name=trim($('#sup_name').val());
	var sup_type=trim($('#sup_type').val());
	var attention=trim($('#attention').val());
	var quatation_no=trim($('#quatation_no').val());
	var Department_Code=trim($('#Department_Code').val());
	//displaying the date validation errors
    var Currency = trim($('#currrency_selector').val());
    var conversion_rate = trim($('#conversion_rate').val());
	var payment_type =  trim($('#payment_type').val());
	
	if(date_result==false){
		
		$('#date_error_message').html('<label style="color:#900" > <b>Expected date should be greater or equal to order date </b></label>');
		
	}
	else{
		
	 $('#date_error_message').html("");
	 
	}
	
	
	// validating the all fields in the form
	if(sup_name!="" & attention!="" & quatation_no!="" &order_date != "" & expected_date!="" & Department_Code!="" &sup_type!= "" & Currency!="" & conversion_rate!="" & payment_type != "" ){
		
		
		if(date_result){
		//all required fields are filled(not empty)
		//alert('date valid');
		$('#required_fields').val('true');
        $('#date_error_message').html("");
		}
		else{
			
		//alert('date invalid');
		$('#date_error_message').html('<label style="color:#900" > <b>Expected date should be greater or equal to order date </b></label>');
		$('#required_fields').val('false');
	
		}
		
		
	}
	else{		
		//all or some requird felds are emplty
	   
	    $('#required_fields').val('false');
		
	}
	
	
}//function

*/




/*
function purchaseOrderRequestFormValidation(){
	
	//po_details_change
	$('#po_details_change').val('true');
	
	var order_date=trim($('#order_date').val());
	var expected_date=trim($('#expected_date').val());
	
	var date_result=order_date<=expected_date;
	var sup_name=trim($('#sup_name').val());
	var sup_type=trim($('#sup_type').val());
	var attention=trim($('#attention').val());
	var quatation_no=trim($('#quatation_no').val());
	var Department_Code=trim($('#Department_Code').val());
    var Currency = trim($('#currrency_selector').val());
    var conversion_rate = trim($('#conversion_rate').val());
	var payment_type =  trim($('#payment_type').val());
		
	// validating the all required fields in the form
	if(sup_name!="" & order_date != "" & Department_Code!="" & sup_type!= "" & Currency!="" & conversion_rate!="" & payment_type != "" ){
		 
          if(order_date!="" && expected_date!=""){
		  
		  if(date_result){
			  
		  $('#required_fields').val('true');
		
		  }
		  else{
			 $('#date_error_message').html('<label style="color:#900" > <b>Expected date should be greater or equal to order date </b></label>');
			$('#required_fields').val('false');
		  }		
		  }//if
		   else{
			  		   
			   $('#required_fields').val('true'); 			   
		   }
		   
	}
	else{		
		//all or some requird felds are emplty
	  //alert('invalid'+"sup_name"+sup_name+"order_date"+order_date+"Department_Code"+Department_Code+"sup_type"+sup_type+"Currency"+Currency+"conversion_rate"+conversion_rate+"payment_type"+payment_type);
	   
	    $('#required_fields').val('false');
		
	}
	
	
}//function

*/




function expectedDateFieldValidation(){


	var order_date=trim($('#order_date').val());
	var expected_date=trim($('#expected_date').val());
	
	
	if(expected_date != "" ){

     
	 if(expected_date >= order_date ){
		 
		 //expected date is valid
		 $("#expected_date_validity").val('true');
		 		 $('#date_error_message').html('');
				 
		 
	 }//if inner
	 else{
		 //expected date is invalid
		 $("#expected_date_validity").val('false');
		 
		 $('#date_error_message').html('<label style="color:#900" > <b>Expected date should be greater or equal to order date </b></label>');
		 
	 }
	 
	 
	}//if outer
	

}








function select_currency(){
	//check whether the field value is set
	purchaseOrderRequestFormValidation();
	
	
}//function
	




function select_conversion_rate(){
	
var currencyCode = $('form[name=purchase_order_request] #currrency_selector').val();

if(currencyCode != ""){
//$('form[name=purchase_order_request] #conversion_rate').val('10');


   $.ajax({
   type: "POST",   
   url: base_url+"index.php/PurchaseOrder/PurchaseOrderManagement/retriveCurrrencyConversionRate", 
   data: "currencyCode="+currencyCode,
   
   success: function(msg){
 
   $('form[name=purchase_order_request] #conversion_rate').val(trim(msg));

   }
   });


}
else{

$('form[name=purchase_order_request] #conversion_rate').val('');
//$('form[name=purchase_order_request] #required_fields').val('false');

}

//check whther the all required fields are set and validated
purchaseOrderRequestFormValidation();

	
}//select_conversion_rate



