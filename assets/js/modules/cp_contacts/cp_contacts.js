var table = $('#list').DataTable({
	"ajax": url.baseUrl() + "cp_contacts/datatables",
	"language"    : url.baseUrl() + 'assets/sb_admin/js/demo/datatable_spanish.json',
	"columns": [
		{"data": 'contactId',   "sClass": "dt-contactId",   "width": "0",     "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'name',  		"sClass": "dt-first_name",  "width": "25%",   "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'email', 		"sClass": "dt-last_name",   "width": "15%",   "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'message',     "sClass": "dt-status",      "width": "20%",   "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'date_time',   "sClass": "dt-date_time",   "width": "20%",   "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'action',      "sClass": "dt-action",      "width": "10%",   "defaultContent": "<i class='na'>N/A</i>"}
	],
	'createdRow': function (row, data, index) {
		$('.dt-action', row).html(actionLinks(data));
	}
});

table.columns([0]).visible(false, false);

$(document).ready(function () {

});

var actionLinks = function (data) {
	var html = '',
		id   = data.contactId;

	html += '<div class="dropdown">';
	html += '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
	html += 'Opciones';
	html += '</a>';
	html += '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
	html += '<a class="dropdown-item" data-url="'+url.baseUrl()+'cp_contacts/edit/'+id+'" href="javascript:void(0)"><i class="fas fa-pencil-alt"> Editar </i></a>';
	html += '</div>';
	html += '</div>';

	return html;
};
