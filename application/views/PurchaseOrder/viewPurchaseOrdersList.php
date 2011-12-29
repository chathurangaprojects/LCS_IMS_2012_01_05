<div class="hastable">
  <div id="registeredEmployeeTable">
    <table id="sort-table">
      <thead>
        <tr>
          <th> Order ID</th>
          <th>Order Purpose </th>
          <th>Date Created</th>
          <th>Order For department</th>
          <th>Supplier</th>
          <th>Order Status</th>
          <th style="width:128px">Options</th>
        </tr>
      </thead>
      <tbody>
      
      <?php
	  
	  $this->load->model(array('PurchaseOrder/DepartmentService','PurchaseOrder/DepartmentModel','PurchaseOrder/PurchaseOrderGeneralService','Supplier/SupplierModel','Supplier/SupplierService'));
	  
	  $departmentModel = new DepartmentModel();
	  $deptService = new DepartmentService();
	  
	  $supplier = new SupplierModel();
	  $supService = new SupplierService();
	  
	  
	  $poGeneral = new PurchaseOrderGeneralService();
	  
	  for($index=0; $index < sizeof($PurchaseOrders); $index++){
	  
	  $departmentModel->setDepartmentCode($PurchaseOrders[$index]->getRequested_Dept());
	  
	  $supplier->setSupplier_Code($PurchaseOrders[$index]->getSupplier_Code());
	  
	  $supplierModel = $supService->getGivenSupplierDetails($supplier);
	  
	  ?>
        <tr>
          <td class="center"><?php echo $PurchaseOrders[$index]->getOrder_Code(); ?></td>
          <td><?php echo $PurchaseOrders[$index]->getPO_Purpose(); ?></td>
          <td><?php echo $PurchaseOrders[$index]->getOrder_Date(); ?></td>
          <td><?php echo $deptService->retrieveDepartmentName($departmentModel); ?></td>
          <td><?php echo $supplierModel->getSupplier_Name(); ?></td>
          <td><?php echo $poGeneral->retrievePoStatus($PurchaseOrders[$index]->getStatus_Code()); ?></td>
          <td><a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit this example" href="<?php  echo base_url(); ?>index.php/UserAdministration/EmployeeAdministration/editEmployeeProfile/"> <span class="ui-icon ui-icon-wrench"></span> </a> <span id="emp_status<?php //echo $rowallemployees->Employee_Code ; ?>"> <a href="#" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Enabled."  style="cursor:pointer;"> <span class="ui-icon ui-icon-arrowreturnthick-1-n"></span> </a> <a href="#" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Disabled."  style="cursor:pointer;"> <span class="ui-icon ui-icon-arrowreturnthick-1-s"></span> </a> </span></td>
        </tr>
        
        
        <?php
		}//for
		?>
        
        
      </tbody>
    </table>
  </div>
</div>
