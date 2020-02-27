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
		globalPlugins();
		Ladda.stopAll();
    });
  });

  $(document).on('click', '#submit', function (e) {
    e.preventDefault();

    var selector   = $(this).data(),
        form       = $('#form'),
        url        = form.attr('action'),
        data       = form.serialize();
	  var formData = new FormData(form[0]);

    $.ajax({type: 'post', url: url, data: formData, async: false, cache: false, contentType: false, enctype: 'multipart/form-data', processData: false}).done(function (data) {
      var response = JSON.parse(data);

      if(response.result == 1){
        $(selector.target).modal('hide');
        $('#list').DataTable().ajax.reload();
      }else{
        $('.response').html(response.error);
      }

		if(response.result == 1 && response.url != undefined){
			window.location = response.url;
		}

		Ladda.stopAll();
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

	$(document).on('change', '.currency-format, .currency, .number', function() {
		$(this).val(formatCurrency($(this).val()));
	});

	$(document).on('click', '.cancel_document', function (e) {
		e.preventDefault();
		var thisSelector       = $(this).data(),
			title              = 'Atención',
			text               = 'Esta Seguro que Desea Cancelar este Documento?',
			type               = 'warning',
			confirmButtonText  = 'OK',
			cancelButtonText   = 'Cancelar';

		Swal.fire({
			title: title,
			text: text,
			type: type,
			showCancelButton: true,
			cancelButtonText: cancelButtonText,
			confirmButtonText: confirmButtonText,
		}).then((result) => {
			if (result.value == true) {
				window.location = thisSelector.redirect;
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
	globalPlugins();
});

var globalPlugins = function () {
	if($('.numeric').length > 0){$('.numeric').numeric({negative:false});}
	if($('.numeric-decimal').length > 0){$('.numeric-decimal').numeric({negative : false, decimalPlaces: 2 });}
	if($('.date').length > 0){ $('.date').daterangepicker({singleDatePicker: true, showDropdowns: true, locale: {format: 'YYYY-MM-DD'}});}
	$('.chosen-select').chosen({ allow_single_deselect: true });
	if($('.phone').length > 0){$('.phone').mask("999-999-9999");}
	Ladda.bind('.ladda-button');
	$(".tags").tagsinput();
};

var formatCurrency = function(num) {
	num             = ((typeof num !== 'undefined') && (num !== null))? num : 0;
	num             = num.toString().replace(/\$|\,/g,'');

	if(isNaN(num)){
		num         = "0";
	}

	sign            = (num == (num = Math.abs(num)));
	num             = Math.floor(num*100+0.50000000001);
	cents           = num%100;
	num             = Math.floor(num/100).toString();

	if(cents < 10) {
		cents       = "0" + cents;
	}

	for(var i = 0; i < Math.floor((num.length-(1+i))/3); i++) {

		num = num.substring(0,num.length-(4*i+3))+','+ num.substring(num.length-(4*i+3));

	}

	return (((sign)?'':'-') + num + '.' + cents);
};


