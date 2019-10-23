
var table = $('#list').DataTable({
    "ajax": url.baseUrl() + "cp_categories/datatables",
    "columns": [
        // {"data": 'categoryId',          "sClass": "dt-categoryId",     "width": "0",       "defaultContent": "<i class='na'>N/A</i>"},
        // {"data": 'images',              "sClass": "dt-image",          "width": "15%",     "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'name',                "sClass": "dt-name",           "width": "25%",     "defaultContent": "<i class='na'>N/A</i>"},
        // {"data": 'description',         "sClass": "dt-description",    "width": "25%",     "defaultContent": "<i class='na'>N/A</i>"},
        // {"data": 'transaction',         "sClass": "dt-transaction",    "width": "15%",     "defaultContent": "<i class='na'>N/A</i>"},
        // {"data": 'status',              "sClass": "dt-status",         "width": "20%",     "defaultContent": "<i class='na'>N/A</i>"},
        // {"data": 'action',              "sClass": "dt-action",         "width": "10%",     "defaultContent": "<i class='na'>N/A</i>"}
    ],
    'createdRow': function (row, data, index) {
        // $('.dt-status', row).html(status(data));
        // $('.dt-action', row).html(actionLinks(data));
    }
});

// table.columns([0]).visible(false, false);

$(document).ready(function () {

});