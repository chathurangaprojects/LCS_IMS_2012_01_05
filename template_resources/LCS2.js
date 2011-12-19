var base_url = 'http://localhost/LCS_IMS/';

$().ready(function () {
    //var st = $("#sup_type").val();
    $("#sup_name").autocomplete(base_url + "index.php/Supplier/SupplierManagement/retriewSupplierNameAndID", {
        width: 400,
        matchContains: true,
        selectFirst: false
    });
});