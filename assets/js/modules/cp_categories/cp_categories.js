
var table = $('#list').DataTable({
    "ajax": url.baseUrl() + "cp_categories/datatables",
    "language"    : url.baseUrl() + 'assets/sb_admin/js/demo/datatable_spanish.json',
    "columns": [
        {"data": 'categoryId',  "sClass": "dt-categoryId",  "width": "0",     "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'name',  		"sClass": "dt-first_name",  "width": "25%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'description', "sClass": "dt-last_name",   "width": "15%",   "defaultContent": "<i class='na'>N/A</i>"},
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
  return (parseInt(data.status) == 1)? '<div class="badge badge-success" role="alert">Activo</div>' : '<div class="badge badge-danger" role="alert">Inactivo</div>';
};

var actionLinks = function (data) {
  var html = '',
      id   = data.categoryId;

  html += '<div class="dropdown">';
  html += '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
  html += 'Opciones';
  html += '</a>';
  html += '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
  html += '<a class="dropdown-item modal_trigger" data-url="'+url.baseUrl()+'cp_categories/edit/'+id+'" data-target="#add-cp-categories" data-toggle="modal" href="javascript:void(0)"><i class="fas fa-pencil-alt"> Editar </i></a>';
  html += '<a class="dropdown-item modal_trigger_delete" href="javascript:void(0)" data-url="'+url.baseUrl()+'cp_categories/hide/'+id+'"><i class="fas fa-trash-alt"> Eliminar</i></a>';
  html += '</div>';
  html += '</div>';

  return (parseInt(data.system) == 1)? html : '';
};
