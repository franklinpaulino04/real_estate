var table = $('#list').DataTable({
	"ajax": url.baseUrl() + "cp_properties/datatables",
	"language"    : url.baseUrl() + 'assets/sb_admin/js/demo/datatable_spanish.json',
	"columns": [
		{"data": 'propertyId',  "sClass": "dt-propertyId",  "width": "0",    "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'name',  		"sClass": "dt-first_name",  "width": "25%",  "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'full_name',   "sClass": "dt-full_name",   "width": "20%",  "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'category', 	"sClass": "dt-category",    "width": "10%",  "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'type', 		"sClass": "dt-type",   		"width": "10%",  "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'price', 		"sClass": "dt-price",   	"width": "10%",  "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'status',      "sClass": "dt-status",      "width": "10%",  "defaultContent": "<i class='na'>N/A</i>"},
		{"data": 'action',      "sClass": "dt-action",      "width": "10%",  "defaultContent": "<i class='na'>N/A</i>"}
	],
	'createdRow': function (row, data, index) {
		$('.dt-status', row).html(Status(data));
		$('.dt-price', row).html('$'+formatCurrency(data.price));
		$('.dt-action', row).html(actionLinks(data));
	}
});

table.columns([0]).visible(false, false);

$(document).ready(function () {
	$(document).on('click', '.unlink-file', function(){
		var selector = $(this).data(),
			url      = selector.url;

		Swal.fire({
			title: 'Atención',
			text: '¿Esta seguro que desea borrar este registro?',
			type: 'warning',
			showCancelButton: true,
			cancelButtonText: 'No',
			confirmButtonText: 'Continuar',
		}).then((result) => {
			if (result.value) {
				$.ajax({type: 'get', url: url}).done(function (data) {
					var response = JSON.parse(data);

					if(response.result == 1){
						$('#properties-documents').html(response.view);
					}
				});
			}
		});
	});
});

var Status = function (data) {
	return '<div class="btn '+ data.class + '">'+ data.status +'</div>';
};

var actionLinks = function (data) {
	var html = '',
		id   = data.propertyId;
		html += '<div class="dropdown">';
		html += '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
		html += 'Opciones';
		html += '</a>';
		html += '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
		html += '<a class="dropdown-item" href="' + url.baseUrl() + 'cp_properties/edit/' + id + '"><i class="fas fa-pencil-alt"> Editar </i></a>';
		html += '<a class="dropdown-item modal_trigger_delete" href="javascript:void(0)" data-url="' + url.baseUrl() + 'cp_properties/hide/' + id + '"><i class="fas fa-trash-alt"> Eliminar</i></a>';
		html += '</div>';
		html += '</div>';

	return html;
};
