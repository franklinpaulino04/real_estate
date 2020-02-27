var table = $('#list').DataTable({
	"ajax": url.baseUrl() + "cp_contacts/datatables",
	"language"    : url.baseUrl() + 'assets/sb_admin/js/demo/datatable_spanish.json',
	"columns": [
		{"data": 'mail_sentId', 	"sClass": "dt-mail_sentId",  	"width": "0",     "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'title',  			"sClass": "dt-title",        	"width": "25%",   "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'correo', 			"sClass": "dt-correo",       	"width": "15%",   "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'message',     	"sClass": "dt-message",      	"width": "20%",   "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'creation_date',   "sClass": "dt-creation_date",   "width": "20%",   "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'action',      	"sClass": "dt-action",       	"width": "10%",   "defaultContent": "<i class='na'>N/A</i>"}
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
		id   = data.mail_sentId;

	html += '<div class="dropdown">';
	html += '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
	html += 'Opciones';
	html += '</a>';
	html += '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
	html += '<a class="dropdown-item modal_trigger_delete" href="javascript:void(0)" data-url="' + url.baseUrl() + 'cp_contacts/hide/' + id + '"><i class="fas fa-trash-alt"> Eliminar</i></a>';
	html += '</div>';
	html += '</div>';

	return html;
};
