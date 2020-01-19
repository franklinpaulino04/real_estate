$(document).ready(function(){
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
