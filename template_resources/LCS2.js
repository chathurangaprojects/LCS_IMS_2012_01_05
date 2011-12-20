var base_url = 'http://localhost/LCS_IMS/';

function validkey(e) {
    var keynum;
    var keychar;
    var numcheck;
    if (window.event) // IE
    {
        keynum = e.keyCode;
    }
    else if (e.which) // Netscape/Firefox/Opera
    {
        keynum = e.which;
    }
    if (keynum == 13) {
        chk();
    }
}

$().ready(function () {
    //var st = $("#sup_type").val();
    $("#item_name").autocomplete(base_url + "index.php/ItemMaster/ItemMasterManagement/getData", {
        width: 400,
        matchContains: true,
        formatItem: function (data, i, n, value) {
            var x = value.split("-")[2];
            //var x = value;
            
            return "<span onclick='chk()'>" + value + "</span>";
        

        },
        formatResult: function (data, value) {
            return value.split("-")[0];
            //return value;
        }
    });
});




function chk() {

    var sss = $("#item_name").val();
    alert(sss);
}