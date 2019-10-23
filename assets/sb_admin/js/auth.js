$(document).ready(function () {

    $(document).on('click', '#submit', function (e) {
        e.preventDefault();

        var form = $('#form').serialize(),
            url  = $('#form').attr('action');

        $.ajax({
            type: 'post',
            url: url,
            data: form
        }).done(function (data) {
            var response = JSON.parse(data);
            if(response.result == 1){
                window.location = response.controller;
            }else{

                $('.response').html(response.error);
            }
        });
    });
});