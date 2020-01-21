$(document).ready(function () {
	$(document).on('click', '#submit', function (e) {
		e.preventDefault();

		var form       = $('#sent-mail'),
			url        = form.attr('action'),
			data       = form.serialize();

		$.ajax({type: 'post', url: url, data: data}).done(function (data) {
			var response = JSON.parse(data);

			if(response.result == 1){
				Swal.fire(
					'Confirmado!',
					'¡Gracias mensaje enviado correctamente.!',
					'success'
				);

				form.refresh();
			}
		});
	});
});
