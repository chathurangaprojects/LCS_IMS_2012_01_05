var base_url = 'http://localhost/LCS_IMS/';
var site_url = 'http://localhost/LCS_IMS/index.php';

////Detect Enter Key for Item Name Auto Complete
//function validkey(e) {
//    var keynum;
//    var keychar;
//    var numcheck;
//    if (window.event) // IE
//    {
//        keynum = e.keyCode;
//    }
//    else if (e.which) // Netscape/Firefox/Opera
//    {
//        keynum = e.which;
//    }
//    if (keynum == 13)
//    {
//        chk();
//    }
//}

////Auto complete Item names
//$().ready(function () {

//    $("#item_name").autocomplete(base_url + "index.php/ItemMaster/ItemMasterManagement/autoComplete", {
//        width: 400,
//        matchContains: true,
//        formatItem: function (data, i, n, value) {
//            var x = value.split("-")[2];


//            //var sss = $("#item_name_test").val();

//            ///document.getElementById('item_name_test').value = jQuery.trim(value.split("-")[2]);

//            return "<span onclick='chk(\"" + jQuery.trim(value.split("-")[2]) + "\")'>" + value + "</span>";



//        },
//        formatResult: function (data, value) {
//            return value.split("-")[0];
//        }
//    });
//});


//function chk(i) {

//    //var sss = $("#item_name").val();
//    alert(i);
//}

$().ready(function () {
    $("#item_type").autocomplete(site_url + "/Autocomplete/loadItemTypes", {
        width: 525,
        matchContains: true,
        //mustMatch: true,
        //minChars: 0,
        //multiple: true,
        //highlight: false,
        //multipleSeparator: ",",
        selectFirst: false
    });
});