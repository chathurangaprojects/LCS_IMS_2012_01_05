<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>
<?php
echo $this->template->getPage_title();
?>
</title>

<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/live_search.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/tooltip.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/ui/ui.sortable.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/ui/ui.draggable.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/ui/ui.resizable.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/ui/ui.dialog.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/custom.js"></script>

<link href="<?php echo base_url(); ?>template_resources/css/ui/ui.base.css" rel="stylesheet" media="all" />

<link href="<?php echo base_url(); ?>template_resources/css/themes/black_rose/ui.css" rel="stylesheet" title="style" media="all" />

<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/js-functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/livevalidation_standalone.js"></script>

<link href="<?php echo base_url(); ?>template_resources/css/livevalidation_standalone.css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/js/autocomplete/jquery.autocomplete.js"></script><hr />


<link href="<?php echo base_url(); ?>template_resources/js/autocomplete/jquery.autocomplete.css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/LCS.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/LCS2.js"></script>


<!--[if IE 6]>
<link href="<?php echo base_url(); ?>template_resources/css/ie6.css" rel="stylesheet" media="all" />

<script src="<?php echo base_url(); ?>template_resources/js/pngfix.js"></script>

<script>
DD_belatedPNG.fix('.logo, ul#dashboard-buttons li a, .response-msg, #search-bar input');
</script>
<![endif]-->

<script type="text/javascript" src="<?php echo base_url(); ?>template_resources/jquery.validate.js"></script>


</head>

<body>
<div id="page_wrapper">
<div id="page-header">
<div id="page-header-wrapper">
<div id="top">
<a href="dashboard.html" class="logo" title="LankaCom Services">LankaCom Services</a>


<div class="welcome">
<span class="note">Welcome, <a href="#" title="Welcome, Horia Simon">Horia Simon</a></span>

<a class="btn ui-state-default ui-corner-all" href="#">
<span class="ui-icon ui-icon-wrench"></span>

Settings
</a>
<a class="btn ui-state-default ui-corner-all" href="#">
<span class="ui-icon ui-icon-person"></span>

My account
</a>
<a class="btn ui-state-default ui-corner-all" href="<?php echo base_url(); ?>index.php/Login/userLogout">
<span class="ui-icon ui-icon-power"></span>

Logout
</a>
</div>

</div>

<ul id="navigation">
<li>
<a href="<?php echo base_url(); ?>" class="sf-with-ul">Dashboard</a>
</li>

<li>
<a href="<?php echo base_url(); ?>" class="sf-with-ul">Purchase Order</a>

<ul>
<li>
<a href="<?php echo base_url(); ?>index.php/PurchaseOrder/PurchaseOrderManagement/createNewPurchaseOrder" class="sf-with-ul">Create PO Request</a>
</li>
</ul>
</li>


<li>
<a href="<?php echo base_url(); ?>" class="sf-with-ul">Employees</a>

<ul>
<li>
<a href="<?php echo base_url(); ?>index.php/UserAdministration/EmployeeAdministration/employeeRegistrationView" class="sf-with-ul">Add New Employee</a>
</li>

<li>
<a href="<?php echo base_url(); ?>index.php/UserAdministration/EmployeeAdministration/displayRegisteredEmployees" class="sf-with-ul">Manage Employees</a>
</li>

</ul>
</li>




</ul>

<div id="search-bar">
<form method="post" action="http://www.google.com/">
<input type="text" name="q" value="live search demo" />
</form>
</div>
</div>
</div>

<div id="sub-nav">
<div class="page-title">
<h1>
<?php
echo $this->template->getPage_title();
?>
</h1>

<span>
<?php
echo $this->template->getPage_sub_title();
?>
</span>
</div>

<?php
if(!empty($top_buttons))
{
echo $top_buttons;
}
?>

<!--
<div id="top-buttons">
<a id="dialog_link" class="btn ui-state-default ui-corner-all" href="#">
<span class="ui-icon ui-icon-newwin"></span> Dialog Window
</a>

<a class="btn ui-state-default ui-corner-all" id="drop" href="#drop_down">
<span class="ui-icon ui-icon-carat-2-n-s"></span> DropDown Menu
</a>

<div id="drop_down" class="hidden">
<ul>
<li><a href="#">Google</a></li>
</ul>
</div>

<a id="modal_confirmation_link" class="btn ui-state-default ui-corner-all" href="#">
<span class="ui-icon ui-icon-grip-dotted-horizontal"></span> Modal Confirmation
</a>
</div>

<div id="dialog" title="Dialog Title">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<div id="modal_confirmation" title="An example modal title ?">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
-->
</div>

<div id="page-layout">
<div id="page-content">
<div id="page-content-wrapper">
<div class="inner-page-title">
<h2>
<?php
echo $this->template->getInner_page_title();
?>
</h2>

<span>
<?php
echo $this->template->getInner_page_sub_title();
?>
</span>
</div>

<?php echo $contents; ?>

<div id="sidebar">
<div class="sidebar-content">
<a id="close_sidebar" class="btn ui-state-default full-link ui-corner-all" href="#drill">
<span class="ui-icon ui-icon-circle-arrow-e"></span>

Close Sidebar
</a>

<a id="open_sidebar" class="btn tooltip ui-state-default full-link icon-only ui-corner-all" title="Open Sidebar" href="#">
<span class="ui-icon ui-icon-circle-arrow-w"></span>
</a>
</div>
</div>

<div class="clear"></div>
</div>

<div class="clear"></div>
</div>
</div>

<div class="clear"></div>

<div id="footer">
<a href="#" title="Home">Home</a> |

<a href="#" title="About Us">About Us</a>
</div>

<div id="copyright">
Powered by <a href="http://www.admintasia.com/" title="Powerful admin UI template">Admintasia.com</a>
</div>
</div>
</body>
</html>

