// Call the dataTables jQuery plugin
$(document).ready(function() {

  $(document).on('click', '.modal_trigger', function (e) {
    e.preventDefault();

    var selector = $(this),
        url      = selector.data('url'),
        target   = selector.data('target');

    $.ajax({type: 'get', url: url}).done(function (data) {
      var response = JSON.parse(data);
      $('.modal-dialog').html('');
      if(response.result == 1){
        $(target + ' .modal-dialog').html(response.view);
      }
    });
  });

  $(document).on('click', '#submit', function (e) {
    e.preventDefault();

    var selector = $(this).data(),
        form     = $('#form'),
        url      = form.attr('action'),
        data     = form.serialize();

    $.ajax({type: 'post', url: url, data: data}).done(function (data) {
      var response = JSON.parse(data);
      if(response.result == 1){
        $(selector.target).modal('hide');
        $('#list').DataTable().ajax.reload();
      }else{
        $('.response').html(response.error);
      }
    });
  });

  $(document).on('click', '.modal_trigger_delete', function (e) {
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
        $.ajax({
          type: 'get',
          url: url
        }).done(function (data) {
          var response = JSON.parse(data);

          if(response.result == 1){
            $('#list').DataTable().ajax.reload();
          }
        });
      }
    });
  });

	$(document).on('click', '.redirect', function (e) {
		e.preventDefault();
		var thisSelector = $(this).data(),
			url          = thisSelector.url;

		$.ajax({type: 'get', url: url}).done(function (data) {
			var response = JSON.parse(data);

			if(response.result == 1){
				window.location = response.url;
			}
		});
	});
});

var url = {
  baseUrl : function(){
    var host = location.hostname + '/',
        path = location.protocol + '//' +location.hostname + '/';

    if(host == 'localhost/') {
      path += "real_estate/";
    }

    return path;
  }
};

$(function() {
	// if($('.numeric').length > 0){$('.numeric').numeric({negative:false});}
	// if($('.numeric-decimal').length > 0){$('.numeric-decimal').numeric({negative : false, decimalPlaces: 2 });}
	if($('.date').length > 0){
		$('.date').daterangepicker({singleDatePicker: true, showDropdowns: true, locale: {format: 'YYYY-MM-DD'}});
	}
});
