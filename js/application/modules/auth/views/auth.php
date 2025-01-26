<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <link href="<?php echo base_url(); ?>assets/font/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-2">
      <div class="row">
        <div class="col-lg"></div>
        <div class="col-lg">
          <div class="card">
            <h4 class="card-header unique-color  text-center py-4">
                <strong style="color: #f6f7f8;"><?php echo app_masjid()->masjid_nama; ?></strong>
            </h4>
            <div class="card-body px-lg-5 pt-0">
	            <form class="login-form mb-4" action="<?php echo $fullurl; ?>/action_login/?next=<?php echo @$get_next; ?>" method="post" novalidate="novalidate">
	                <div class="md-form">
	                  <input type="text" name="uid" class="form-control">
	                  <label for="uid">ID</label>
	                </div>
	                <div class="md-form">
	                  <input type="password" name="password" class="form-control">
	                  <label for="password">Password</label>
	                </div>
	                <div class="d-flex justify-content-around">
	                  <div>
	                    <div class="form-check">
	                    </div>
	                  </div>
	                  <div>
	                  </div>
	                </div>
	                <button class="btn btn-outline-primary btn-rounded btn-block my-4 mb-4 waves-effect z-depth-0" type="submit">Masuk</button>
                </form>

                <div class="row fSystem">
                    <div class="col">
                        <p class="text-center grey-text">Lihat jadwal Shalat?
                            <a href="<?php echo base_url() ?>front" class="blue-text">Klik Di Sini</a>
                        </p>
                        <div class="float-left text-center">
                            <a type="button" data-url="<?php echo base_url(); ?>publik/action" data-tipe="shutdown" class="system btn-floating btn-unique btn-sm waves-effect waves-light">
                                <i class="fa fa-power-off"></i>
                            </a>
                            <p class="grey-text"> SHUTDOWN </p>
                        </div>
                        <div class="float-right text-center">
                            <a type="button" data-url="<?php echo base_url(); ?>publik/action" data-tipe="restart" class="system btn-floating btn-blue-grey btn-sm waves-effect waves-light">
                                <i class="fa fa-repeat"></i>
                            </a>
                            <p class="grey-text"> RESTART </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col"> <hr>
                <div class="row">
	                <div class="col-9">
                        &copy  <?php echo date("Y"); ?><a href="http://xbxteam.web.id/"> XbX-Team</a>
                    </div>
                    <div class="col-3"><?php //echo get_versi(); ?></div>
                </div>
                </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg"></div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

    <script type="text/javascript">

        new WOW().init();

        $('form').ajaxForm({
        	success: function(res) {
        		if (res.status == 1) {
					toastr.success(res.message, 'Success', {timeOut: 1500})
					setInterval(function() { redirect(res.redirect); },1500);
					
        		} else {
        			toastr.error(res.message);
        		}
		    }
		});

		function redirect(url) {
			window.location.href = decodeURIComponent(url);
		}

        $(".fSystem").on('click', '.system', function(event) {
            event.preventDefault();

            var tipe         = $(this).attr('data-tipe');
            var url         = $(this).attr('data-url');

            if (tipe == 'shutdown') {
                var title = "Yakin matikan komputer?";
            } else {
                var title = "Yakin mulai ulang komputer?";
            }

            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-mdb-color',
                cancelButtonClass: 'btn btn-light',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: title,
                html: '',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: { tipe: tipe},
                    })
                    .done(function(res) {
                        if (res.status == 1) {
                            // toastr.success(res.message, 'Success', {timeOut: 2000})
                        } else {
                            toastr.error(res.message, 'Error', {timeOut: 2000})
                        }
                    })
                    .fail(function(res) {
                        toastr.error(res.message, 'Error', {timeOut: 2000})
                    })
                    .always(function() {
                    });
                }
            })
        });
      
    </script>

    </body>
</html>