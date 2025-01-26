<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Form
                </h2>
            </div>
            <div class="alert bg-orange alert-warning alert-dismissible">
				<strong>Warning!</strong> : <span class="message"></span>
			</div>
            <div class="body">
		        <?php echo form_open_multipart($initurl . '/action_' . @$action, 'id="my-form" method="POST" role="form" data-confirm="1"'); ?>
		        <?php echo form_hidden('ID', @$data->konten_id); ?>

		        <div class="form-group">
	            	<h2 class="card-inside-title">Posisi</h2>

	            	<input type="radio" value="1" class="with-gap" id="posisi1" name="posisi" checked>
	                <label for="posisi1">Tengah</label>

					<input type="radio" value="2" class="with-gap" id="posisi2" name="posisi" <?php echo (@$data->konten_posisi == "2") ? "checked" : ""; ?>>
	                <label for="posisi2">Bawah</label>
	            </div>

		        <div class="form-group farab">
					<label for="arab">Teks Arab</label>
		            <div class="form-line">
						<textarea type="text" id="arab" name="arab" class="form-control" rows="3"><?php echo @$data->konten_arab; ?></textarea>
					</div>
					<p class="help-block text-warning">Teks Arab boleh dikosongkan</p>
				</div>

				<div class="form-group">
					<label for="teks">Teks Indo <span class="running"></span></label>
		            <div class="form-line">
						<textarea type="text" id="teks" name="teks" class="form-control" rows="3"><?php echo @$data->konten_teks; ?></textarea>
					</div>
				</div>

	            <button class="btn bg-blue btn-lg m-t-15 waves-effect" type="submit">
	            	<?php echo ($action == "add") ? 'Tambah' : 'Edit'; ?>
	            </button>
            </div>
        </form>
    </div>
</div>



<script type="text/javascript">

	$(document).ready(function() {
        $('div.alert-warning').slideUp('slow');

		// fungsi validasi
	    var form = "#my-form";
	    var rules = {};
	    var message = {};

	    MyFormValidation.init(form, rules, message);
		
	});

	$(function() {
		var posisi1 = $('#posisi1');
		var posisi2 = $('#posisi2');

		if(posisi2.is(':checked')) { 
			$('.farab').slideUp('slow');
		}

		posisi2.change(function(event) {
			$('.farab').slideUp('slow');
			$('span.running').html('Running Text');
		});

		posisi1.change(function(event) {
			$('.farab').slideDown('slow');
			$('span.running').html('');
		});
	});
</script>