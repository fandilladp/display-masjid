var MyFormValidation = function() {

    var handleValidation = function(_form, _rules, _messages) {

        var form        = $(_form);
        var confirm = (typeof form.attr('data-confirm') === "undefined") ? 0 : form.attr('data-confirm');

        title = (typeof title === "undefined") ? "Anda yakin?" : title;
        text  = (typeof text === "undefined") ? "Pastikan data telah diisi dengan benar. Lanjutkan proses?" : text;
        
        var data    = ''; 

        form.validate({
            focusInvalid : false,
            ignore: "",
            messages : _messages,
            rules : _rules,
            invalidHandler : function(event, validator) {
            },
            errorPlacement: function(error, element) {
            },
            highlight: function(element) {
            },
            unhighlight: function(element) {
            },
            success: function(label) {
            },
            submitHandler: function(form) {

                var options = { 
                    dataType:      'json',
                    success:       callback_form,
                    error:         callback_error
                }; 

                if ( confirm == 1 ) {
                    swal({
                        title: title,
                        text: text,
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak',
                        html: true,
                        closeOnConfirm: true
                    }, function (result) {
                        if (result) {
                            /*swalWithBootstrapButtons(
                                'Save!',
                                'Your data has been saved.',
                                'success'
                            )*/
                            $(form).ajaxSubmit(options);

                        }
                    })
                } else {
                    $(form).ajaxSubmit(options);
                }
            }
        });

        function callback_form(res, statusText, xhr, $form)
        {
                console.log(res);
            if(res.status == 1){
                // toastr.success(res.message, 'Success', {timeOut: 3000})
                

                showNotification('bg-teal', res.message);

                // $('div.alert-warning').fadeOut("fast");
                /*swal({
                  position: 'top-end',
                  type: 'success',
                  title: res.message,
                  showConfirmButton: false,
                  timer: 1500
                })*/
                $('div.alert-warning').slideUp('slow');

            } else if(res.status == 0){
                $('div.alert-warning').slideDown('slow');
                $('div.alert-warning').addClass('alert-danger')
                $('div.alert-warning > strong').html("Error!")
                $('div.alert-warning').addClass('show')
                $('div.alert-warning > span.message').html("Terjadi kesalahan sistem, hubungi <strong>System Admin</strong>.");
            }else{
                // toastr.success('ya')
                $('div.alert-warning').slideDown('slow');
                $('div.alert-warning').addClass('show');
                $('div.alert-warning > span.message').html(res.message);
            }

        }

        function callback_error(res){
                showNotification('bg-danger', res.message);
        }
    }

    function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
        if (colorName == null || colorName == '' || colorName == 'undefined') { colorName = 'bg-black'; }
        if (text == null || text == '' || text == 'undefined') { text = 'Turning standard Bootstrap alerts'; }
        if (animateEnter == null || animateEnter == '' || animateEnter == 'undefined') { animateEnter = 'animated bounceIn'; }
        if (animateExit == null || animateExit == '' || animateExit == 'undefined') { animateExit = 'animated bounceOut'; }
        var allowDismiss = true;

        $.notify({
            message: text
        },
            {
                type: colorName,
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 1000,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                animate: {
                    enter: animateEnter,
                    exit: animateExit
                },
                template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
    }

    var handleComponent = function() {
        $(".alert").on('click', function(event) {
            event.preventDefault();
            $(this).slideToggle('slow');
        });  
    }

    return {
        init : function(_form, _rules, _messages){
            handleValidation(_form, _rules, _messages);
            handleComponent();
        }
    }

}();