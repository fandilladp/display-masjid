<!-- <div class="classic-tabs">
		<ul class="nav tabs-cyan" id="xmyClassicTab" role="tablist">
			<li class="nav-item">
			</li>
			<li class="nav-item">
			</li>
		</ul>
		<div class="float-right">
			<a class="ajaxify" href="<?php echo $fullurl; ?>/add/<?php echo lcfirst($tipe); ?>">		
				<button class="btn btn-md btn-fb">Tambah Data</button>
			</a>
		</div>
	</div> -->

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <ul class="nav nav-tabs tab-nav-right tab-col-teal" role="tablist">
                    <li role="presentation" class="<?php echo ($tipe == 'Picture') ? 'active' : ''; ?>">
						<a class="nav-link waves-light show" id="profile-tab-classic" href="<?php echo base_url(); ?>pengaturan/background/picture" role="tab" aria-controls="profile-classic" aria-selected="true">Pictures</a>
                    </li>
                    <li role="presentation" class="<?php echo ($tipe == 'Video') ? 'active' : ''; ?>">
						<a class="nav-link waves-light" id="follow-tab-classic" href="<?php echo base_url(); ?>pengaturan/background/video" role="tab" aria-controls="follow-classic" aria-selected="false">Videos</a>
                    </li>
                </ul>
                <div class="pull-right" style="margin-top: -48px;">
					<a class="ajaxify" href="<?php echo $fullurl; ?>/add/<?php echo lcfirst($tipe); ?>">		
						<button type="button" class="btn bg-blue btn-lg btn-block waves-effect">Tambah Data</button>
					</a>
                </div>
            </div>
            <div class="body">
				<a class="reload-content ajaxify" href="<?php echo $fullurl; ?>"></a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
					  	<thead>
					    	<tr>
					      		<th class="text-center th-xs" width="80">No</th>
					      		<th class="text-center th-xs" width="200">Tanggal</th>
					      		<!-- <th class="text-center th-xs" width="100">Tipe</th> -->
					      		<th class="text-center th-xs" width="400">Files</th>
					      		<th class="text-center th-xs" width="200">Upload By</th>
					      		<th class="text-center th-xs" width="100">Status</th>
					      		<th class="text-center th-xs" width="250">Action</th>
					    	</tr>
					  	</thead>
					  	<tbody>
						  	<?php $no=1; foreach ($data as $key => $value) { ?>
							    <tr>
							    	<td class="text-center"><?php echo $no++; ?></td>
							      	<td class="text-center"><?php echo app_date_value($value['background_createdate'], 'd M Y H:i'); ?></td>
							      	<!-- <td class="text-center"><?php echo $value['background_tipe']; ?></td> -->

							      	<td class="">
								      	<?php if ($value['background_tipe'] == 'picture' ) { ?>
								      			<img width="100" src="<?php echo base_url(); ?>public/uploads/images/<?php echo $value['background_file']; ?>">
								      		
								      	<?php } else { ?>
								      		<?php echo $value['background_file']; ?>
								      	<?php } ?>
							      	</td>
							      	<td class="text-center"><?php echo $value['user_nama']; ?></td>
							      	<td class="text-center" id="fstatus">
							      		<div class="switch">
											<label>
												<input 
													data-url="<?php echo $fullurl; ?>/action_status"
													data-id="<?php echo $value['background_id']; ?>"
													data-status="<?php echo $value['background_status']; ?>"
													type="checkbox" <?php echo ($value['background_status'] == '1') ? 'checked' : ''; ?>>
												<span class="lever"></span>
											</label>
							      		</div>
							      	</td>
							      	<td class="text-center">
							      		<a class="ajaxify action_delete"
							      			data-url="<?php echo $fullurl; ?>/action_delete"
							      			data-id="<?php echo $value['background_id']; ?>"
							      			data-file="<?php echo $value['background_file']; ?>"
							      			data-tipe="<?php echo $value['background_tipe']; ?>">
							      		<button class="btn bg-red btn-lg waves-effect">Hapus</button>
							      		</a>
							      	</td>
							    </tr>
						  	<?php } ?>
					  	</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// delete button
    $(".body").on('click', '.action_delete', function(event) {
	    event.preventDefault();

	    var url         = $(this).attr('data-url');
	    var id          = $(this).attr('data-id');
	    var file        = $(this).attr('data-file');
	    var tipe        = $(this).attr('data-tipe');

	    swal({
	        title: 'Yakin Hapus Data',
	        text: 'Apakah anda yakin ingin menghapus data ini?',
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Ya",
	        cancelButtonText: 'Tidak',
	        html: true,
	        closeOnConfirm: true
	    }, function (result) {
	        if (result) {
	            $.ajax({
	                url: url,
	                type: 'POST',
	                dataType: 'json',
	                data: { id: id, file: file, tipe: tipe},
	            })
	            .done(function(res) {
	            	if (res.status == 1) {
                		showNotification('bg-teal', res.message);

		                var redirect = $('a.reload-content').attr('href');
		                setInterval(function() {
		                    window.location.href = (redirect);
		                }, 2000)
	            	}

	            	if (res.status == 2) {
                		showNotification('bg-orange', res.message);

	            	}

	            	if (res.status == 0) {
                		showNotification('bg-danger', res.message);

	            	}
	            })
	            .fail(function(res) {
                	showNotification('bg-danger', res.message);

	            })
	            .always(function() {
	            });

	        }
	    });
	    
	});

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

	$('.switch > label > input').each(function(index) {
		$(this).on('click', function() {
			var url = $(this).data('url');
			var id = $(this).data('id');
			var status = $(this).data('status');

			$.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: { id: id, status: status},
            })
            .done(function(res) {
            })
            .fail(function(res) {
            })
            .always(function() {
            });

		});
    });
</script>