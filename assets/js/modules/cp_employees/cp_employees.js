
var table = $('#list').DataTable({
    "ajax": url.baseUrl() + "cp_employees/datatables",
    "language"    : url.baseUrl() + 'assets/sb_admin/js/demo/datatable_spanish.json',
    "columns": [
        {"data": 'userId',      "sClass": "dt-userId",      "width": "0",     "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'first_name',  "sClass": "dt-first_name",  "width": "25%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'last_name',   "sClass": "dt-last_name",   "width": "15%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'image',       "sClass": "dt-image",       "width": "15%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'status',      "sClass": "dt-status",      "width": "20%",   "defaultContent": "<i class='na'>N/A</i>"},
        {"data": 'action',      "sClass": "dt-action",      "width": "10%",   "defaultContent": "<i class='na'>N/A</i>"}
    ],
    'createdRow': function (row, data, index) {
        $('.dt-status', row).html(Status(data));
        $('.dt-image', row).html(image(data));
        $('.dt-action', row).html(actionLinks(data));
    }
});

table.columns([0]).visible(false, false);

$(document).ready(function () {

});

var image = function (data) {
	return (Object.keys(data.image).length === 0 || data.image === null)? '<img src="' + url.baseUrl() + 'assets/sb_admin/img/images_empty.png" width="50px" height="50px">' : '<img src="' + url.baseUrl() + 'assets/storage/files/employees/'+data.image+'" width="50px" height="50px">';
};

var Status = function (data) {
  return '<div class="btn '+ data.class + '">'+ data.status +'</div>';
};

var actionLinks = function (data) {
  var html = '',
      id   = data.employeId;
	  html += '<div class="dropdown">';
	  html += '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
	  html += 'Opciones';
	  html += '</a>';
	  html += '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
	  html += '<a class="dropdown-item modal_trigger" data-url="' + url.baseUrl() + 'cp_employees/edit/' + id + '" data-target="#add-cp-employees" data-toggle="modal" href="javascript:void(0)"><i class="fas fa-pencil-alt"> Editar </i></a>';
	  html += '<a class="dropdown-item modal_trigger_delete" href="javascript:void(0)" data-url="'+url.baseUrl()+'cp_employees/hide/'+id+'"><i class="fas fa-trash-alt"> Eliminar</i></a>';
	  html += '</div>';
	  html += '</div>';

  return html;
};
