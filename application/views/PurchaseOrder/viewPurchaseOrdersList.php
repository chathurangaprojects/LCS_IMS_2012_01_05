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
          <td>
          <a title="Edit this example" href="<?php  echo base_url(); ?>index.php/PurchaseOrder/PurchaseOrderManagement/editPurchaseOrderView/<?php echo $PurchaseOrders[$index]->getOrder_Code(); ?>" onclick="retrieveItemDetails()" > <!--<span class="ui-icon ui-icon-wrench"></span> -->
          <?php echo '<img src="' . base_url() . 'template_resources/images/edit_item.png" alt="Edit Item"/>'; ?>
          </a> 
          &nbsp;  &nbsp;  &nbsp;  &nbsp;
          <span id="emp_status<?php //echo $rowallemployees->Employee_Code ; ?>"> 
          <a href="#"  title="Delete PO Request"  style="cursor:pointer;"> <?php echo '<img src="' . base_url() . 'template_resources/images/delete_item.png" alt="Edit Item"/>'; ?>
          </a> 

          </span>
          </td>
        </tr>
       
        <?php
		}//for
		?>
        
        
      </tbody>
    </table>
  </div>
</div>
