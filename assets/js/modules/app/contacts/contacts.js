$(document).ready(function () {
	$(document).on('submit', '#form', function (e) {
		e.preventDefault();
		$.ajax({method: 'post', url: $(this).attr('action'), data : $(this).serialize(),
			success: function (data) {
				var response = JSON.parse(data);
				if (response.result == 1){
					Swal.fire( 'Atención!','Mensaje enviado exitosamente!','success');
					window.location.reload();
				}
				else
				{
					$('.response').html(response.error);
				}
			},
			error: function (err) {
				console.log(err);
				Swal.fire('Atención!','hubo un problema al enviar el mensaje!','error');
			}
		});
	});
});
