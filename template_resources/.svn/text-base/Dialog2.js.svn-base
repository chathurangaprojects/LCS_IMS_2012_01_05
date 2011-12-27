$(document).ready(function () {
    $('#add_new_type_link').click(function () {
        $('#add_new_type_dialog').dialog('open');

        return false;
    });

    $("#add_new_type_dialog").dialog({
        autoOpen: false,
        bgiframe: true,
        resizable: false,
        width: 600,
        modal: true,
        overlay: {
            backgroundColor: '#000',
            opacity: 0.5
        },
        buttons: {
            'Close': function () {
                $(this).dialog('close');
            }
        }
    });
});