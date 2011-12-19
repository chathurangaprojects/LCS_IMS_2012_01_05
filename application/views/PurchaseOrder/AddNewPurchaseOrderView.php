<div class="content-box">
	<form method="post" action="">
            <fieldset>
                <table width="100%" border="1px" class="flexme2">
                    <tr>
                        <td colspan="1" style="padding: 5px 5px 5px 0;">
                            <b>Supplier Type *</b>
                        </td>
                        
                        <td colspan="3" style="padding: 5px 5px 5px 0;">
                            <select id="sup_type" class="field select full" name="cmb_sup_type" onchange="select_currency();">
                                <option value=""></option>
                                <option value="0">Local Supplier</option>
                                <option value="1">Foreign Supplier</option>
                            </select>
                            <script type="text/javascript">
                                var sup_type = new LiveValidation('sup_type', {onlyOnSubmit: true });
                                sup_type.add( Validate.Presence, {failureMessage: "Please Select Supplier Type"} );
                            </script>
                        </td>
                        
                        <td colspan="1" style="padding: 5px 5px 5px 0;">
                            <b>Supplier Name *</b>
                        </td>
                        
                        <td colspan="3" style="padding: 5px 5px 5px 0;">
                            <input type="text" id="sup_name" class="field text full" name="txt_sup_name" />
                            <script type="text/javascript">
                                var sup_name = new LiveValidation('sup_name', {onlyOnSubmit: true });
                                sup_name.add( Validate.Presence, {failureMessage: "Please Enter Supplier Name"} );
                            </script>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 5px 5px 5px 0;">
                            <b>Order Date *</b>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <input type="text" id="ord_date" class="field text full" name="txt_ord_date" value="<?php echo date("Y-m-d"); ?>" readonly="readonly"/>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <b>Expected Date</b>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <input type="text" id="exp_date" class="field text full" name="txt_exp_date" />
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <b>Quotation No.</b>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <input type="text" id="quote_no" class="field text full" name="txt_quote_no" />
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <b>Attention</b>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <input type="text" id="attention" class="field text full" name="txt_attention" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="1" style="padding: 5px 5px 5px 0;">
                            <b>Department *</b>
                        </td>
                        
                        <td colspan="3" style="padding: 5px 5px 5px 0;">
                            <select id="req_dept" class="field select full" name="cmb_req_dept">
                                <option value=""></option>
                                <?php
                                //foreach ($depts->result_array() as $row)
                                //{
                                //	echo '<option value="' . $row['Department_Code'] . '">' . $row['Department_Name'] . '</option>';
                                //}
                                ?>
                            </select>
                            <script type="text/javascript">
                                var req_dept = new LiveValidation('req_dept', {onlyOnSubmit: true });
                                req_dept.add( Validate.Presence, {failureMessage: "Please Select Requested Department"} );
                            </script>
                        </td>
                        
                        <td colspan="1" style="padding: 5px 5px 5px 0;">
                            <b>Requested By *</b>
                        </td>
                        
                        <td colspan="3" style="padding: 5px 5px 5px 0;">
                            <select id="req_by" class="field select full" name="cmb_req_by">
                                <?php
                                //foreach ($emps->result_array() as $row)
                                //{
                                //	echo '<option value="' . $row['Employee_Code'] . '">' . $row['Employee_Name'] . '</option>';
                                //}
                                ?>
                            </select>
                            <script type="text/javascript">
                                var req_by = new LiveValidation('req_by', {onlyOnSubmit: true });
                                req_by.add( Validate.Presence, {failureMessage: "Please Select Requested Employee"} );
                            </script>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="1" style="padding: 5px 5px 5px 0;">
                            <b>Payment Type *</b>
                        </td>
                        
                        <td colspan="3" style="padding: 5px 5px 5px 0;">
                            <select id="pay_type" class="field select full" name="cmb_pay_type">
                                <option value=""></option>
                                <?php
                                //foreach ($pay_types->result_array() as $row)
                                //{
                                //	echo '<option value="' . $row['Payment_Type_Code'] . '">' . $row['Payment_Type'] . '</option>';
                                //}
                                ?>
                            </select>
                            <script type="text/javascript">
                                var pay_type = new LiveValidation('pay_type', {onlyOnSubmit: true });
                                pay_type.add( Validate.Presence, {failureMessage: "Please Select Payment Type"} );
                            </script>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <b>Currency *</b>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <select id="curr" class="field select full" name="cmb_curr" onchange="select_conv_rate();">
                                <option value=""></option>
                                <?php
                                //foreach ($currency->result_array() as $row)
                                //{
                                //	echo '<option value="' . $row['Currency_Code'] . '">' . $row['Currency'] . '</option>';
                                //}
                                ?>
                            </select>
                            <script type="text/javascript">
                                var curr = new LiveValidation('curr', {onlyOnSubmit: true });
                                curr.add( Validate.Presence, {failureMessage: "Please Select Currency"} );
                            </script>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <b>Conversion Rate *</b>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <input type="text" id="con_rate" class="field text full" name="txt_con_rate" />
                            <script type="text/javascript">
                                var con_rate = new LiveValidation('con_rate', {onlyOnSubmit: true });
                                con_rate.add( Validate.Presence, {failureMessage: "Please Enter Conversion Rate"} );
                            </script>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="1" style="padding: 5px 5px 5px 0;">
                            <b>Payment Remarks</b>
                        </td>
                        
                        <td colspan="7" style="padding: 5px 5px 5px 0;">
                            <!-- <input type="text" id="pay_remark" class="field text full" name="txt_pay_remark" /> -->
                            <textarea id="pay_remark" class="field text full" name="txt_pay_remark" rows="2"></textarea>
                        </td>
                        
                        <!-- <td style="padding: 5px 5px 5px 0;">
                            <b>Discount %</b>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <input type="text" id="discount" class="field text full" name="txt_discount" />
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <b>Discount Amount</b>
                        </td>
                        
                        <td style="padding: 5px 5px 5px 0;">
                            <input type="text" id="discount_amount" class="field text full" name="txt_discount_amount" />
                        </td> -->
                    </tr>
                    
                    <tr>
                        <td colspan="1" style="padding: 5px 5px 5px 0;">
                            <label class="desc">PO Purpose</label>
                        </td>
                        
                        <td colspan="3" style="padding: 5px 5px 5px 0;">
                            <!-- <input type="text" id="po_purpose" class="field text full" name="txt_po_purpose" /> -->
                            <textarea id="po_purpose" class="field text full" name="txt_po_purpose" rows="2"></textarea>
                        </td>
                        
                        <td colspan="1" style="padding: 5px 5px 5px 0;">
                            <label class="desc">PO Remarks</label>
                        </td>
                        
                        <td colspan="3" style="padding: 5px 5px 5px 0;">
                            <!-- <input type="text" id="po_remarks" class="field text full" name="txt_po_remarks" /> -->
                            <textarea id="po_remarks" class="field text full" name="txt_po_remarks" rows="2"></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="8">
                            <input type="text" name="txt_po_no" id="po_no" value="">
                            
                            <span class="cont tooltip ui-corner-all" title="Click here to add an Item">
                                <a id="lnk_add_item" class="btn ui-state-default ui-corner-all" href="#">
                                    <span class="ui-icon ui-icon-newwin"></span>
                                    Add Item
                                </a>
                            </span>
                            
                            <!-- <button class="ui-state-default ui-corner-all float-left ui-button" type="submit" disabled="disabled">Save</button> -->
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
</div>