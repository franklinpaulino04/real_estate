
var table = $('#list').DataTable({
    "ajax": url.baseUrl() + "cp_register/datatables",
    "language"    : url.baseUrl() + 'assets/sb_admin/js/demo/datatable_spanish.json',
    "columns": [
        {"data": 'userId',      "sClass": "dt-userId",      "width": "0",     "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'first_name',  "sClass": "dt-first_name",  "width": "25%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'last_name',   "sClass": "dt-last_name",   "width": "15%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'email',       "sClass": "dt-email",       "width": "15%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'images',      "sClass": "dt-images",      "width": "15%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'status',      "sClass": "dt-status",      "width": "20%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'action',      "sClass": "dt-action",      "width": "10%",   "defaultContent": "<i class='na'>N/A</i>"}
    ],
    'createdRow': function (row, data, index) {
        $('.dt-status', row).html(Status(data));
        $('.dt-action', row).html(actionLinks(data));
    }
});

table.columns([0]).visible(false, false);

$(document).ready(function () {

});

var Status = function (data) {
  return '<div class="btn '+ data.class + '">'+ data.status +'</div>';
};

var actionLinks = function (data) {
  var html = '',
      id   = data.userId;

  html += '<div class="dropdown">\n' +
          '    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
          '        Opciones' +
          '    </a>\n' +
          '    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">\n' +
          '        <a class="dropdown-item modal_trigger" data-url="'+url.baseUrl()+'cp_register/edit/'+id+'" data-target="#add-cp-register" data-toggle="modal" href="javascript:void(0)"><i class="fas fa-pencil-alt"> Editar </i></a>\n' +
          '        <a class="dropdown-item modal_trigger_delete" href="javascript:void(0)" data-url="'+url.baseUrl()+'cp_register/hide/'+id+'"><i class="fas fa-trash-alt"> Eliminar</i></a>\n' +
          '    </div>\n' +
          '    </div>';

  return html;
};