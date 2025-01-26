<div class="card">
	<div class="table-responsive">
	    <table class="table table-hover dashboard-task-infos">
		<?php foreach ($data as $key => $value) { ?>
	        <tr>
	            <td>
	            	<?php echo $value['general_nama']; ?> <br>
					<small class="col-teal"><?php echo $value['general_keterangan']; ?></small>
	            </td>
	            <td>
	                <div class="switch">
	                    <label>
					    	<span class="text-danger"><?php echo ($value['general_nama'] == 'Background') ? 'Pictures' : 'Off'; ?></span>
						    <input
								data-url="<?php echo @$fullurl; ?>/action_status"
								data-id="<?php echo @$value['general_id']; ?>"
								data-nama="<?php echo @$value['general_nama']; ?>"
								data-status="<?php echo @$value['general_status']; ?>"
								type="checkbox" <?php echo (@$value['general_status'] == '1') ? 'checked' : ''; ?>>
						    <span class="lever"></span> <span class="text-success"><?php echo ($value['general_nama'] == 'Background') ? 'Videos' : 'On'; ?></span>
						</label>
					</div>
	            </td>
	        </tr>
		<?php } ?>
	    </table>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$('input').each(function(index) {
			$(this).on('click', function() {
				var url = $(this).data('url');
				var id = $(this).data('id');
				var nama = $(this).data('nama');
				var status = $(this).data('status');

				$.ajax({
	                url: url,
	                type: 'POST',
	                dataType: 'json',
	                data: {id: id, nama: nama, status: status},
	            })
	            .done(function(res) {
	            })
	            .fail(function(res) {
	            })
	            .always(function() {
	            });

			});
	    });
	});
</script>