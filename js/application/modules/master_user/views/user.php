<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?php echo $_subtitle; ?>
                </h2>
                <div class="pull-right" style="margin-top: -27px;">
					<a class="ajaxify" href="<?php echo $fullurl; ?>/add">		
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
					      		<th>Tanggal</th>
					      		<th>User ID</th>
					      		<th>Nama</th>
					      		<th>Kelamin</th>
					      		<th>Level</th>
					      		<th>Action</th>
					    	</tr>
					  	</thead>
					  	<tbody>
						  	<?php foreach ($data as $key => $value) { ?>
							    <tr>
							    	<td><?php echo app_date_value($value['user_createdate'], 'd-m-Y H:i'); ?></td>
							    	<td><?php echo $value['user_uid']; ?></td>
							      	<td><?php echo $value['user_nama']; ?></td>
							      	<td class="text-center"><?php echo app_master_jk($value['user_jk']); ?></td>
							      	<td class="text-center"><?php echo app_master_level($value['user_level']); ?></td>
							      	<td class="text-center">
							      		<a class="ajaxify" href="<?php echo $fullurl; ?>/edit/<?php echo $value['user_id']; ?>">
							      			<button class="btn bg-orange btn-lg waves-effect">Edit</button>
							      		</a>
							      		<a class="ajaxify action_delete"
							      			data-url="<?php echo $fullurl; ?>/action_delete"
							      			data-id="<?php echo $value['user_id']; ?>"
							      			data-nama="<?php echo $value['user_nama']; ?>">
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
	    var nama        = $(this).attr('data-nama');

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
	                data: { id: id, nama: nama},
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
</script>