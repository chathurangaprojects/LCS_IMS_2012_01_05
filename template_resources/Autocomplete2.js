var base_url = 'http://localhost/LCS_IMS/';
var site_url = 'http://localhost/LCS_IMS/index.php';

$().ready(function () {

    //Autocomplete Product Type
    $("#Item_Type").autocomplete(site_url + "/Autocomplete/loadItemTypes", {
        width: 525,
        //matchContains: true,
        highlight: false,
        selectFirst: false,

        formatItem: function (data, i, n, value) {
            return "<b>" + jQuery.trim(value.split(" !@#$%^&*() ")[0]) + "</b> - " + jQuery.trim(value.split(" !@#$%^&*() ")[1]);
        },
        formatResult: function (data, value) {
            return jQuery.trim(value.split(" !@#$%^&*() ")[0]);
        }
    }).result(function (event, data, formatted) {
        var selectedID = jQuery.trim(formatted.split(" !@#$%^&*() ")[2]);

        $('#Item_Type_Hidden').val(selectedID)
    });
});