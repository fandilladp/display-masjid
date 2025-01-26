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
            	<?php echo form_hidden('ID', @$data->user_id); ?>
                    <div class="form-group form-float">
                        <div class="form-line">
                        	<input type="text" id="uid" name="uid" value="<?php echo (@$data->user_uid) ? $data->user_uid : app_generate_userid(); ?>" class="form-control" readonly>
                            <label class="form-label">User ID</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                        	<input type="text" id="nama" name="nama" value="<?php echo @$data->user_nama; ?>" class="form-control">
                            <label class="form-label">Nama</label>
                        </div>
                    </div>

                    <div class="form-group">
                    	<h2 class="card-inside-title">Jenis Kelamin</h2>

						<input type="radio" value="1" class="with-gap" id="male" name="jk" <?php echo (@$data->user_jk == "L") ? "checked" : ""; ?>>
                        <label for="male">Laki-Laki</label>

						<input type="radio" value="2" class="with-gap" id="female" name="jk" <?php echo (@$data->user_jk == "P") ? "checked" : ""; ?>>
                        <label for="female" class="m-l-10">Perempuan</label>
                    </div>


                    <div class="form-group" id="flevel">
                    	<h2 class="card-inside-title">Level Akses</h2>

						<input type="radio" value="2" class="with-gap" id="radio_30" name="level" <?php echo (@$data->user_level == "2") ? "checked" : ""; ?>>
                        <label for="radio_30">Admin</label>

						<input type="radio" value="3" class="with-gap" id="radio_31" name="level" <?php echo (@$data->user_level == "3") ? "checked" : ""; ?>>
                        <label for="radio_31" class="m-l-10">Pengguna</label>

                        <input type="radio" value="4" class="with-gap" id="radio_32" name="level" <?php echo (@$data->user_level == "4") ? "checked" : ""; ?>>
                        <label for="radio_32" class="m-l-10">No Akses</label>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
	                        <input type="password" id="password" name="password" class="form-control">
                            <label class="form-label">Password</label>
                        </div>
                        <?php if ($action == "edit") { ?>
                        	<span class="help-block text-warning">Password dikosongkan jika tidak diubah</span>
                        <?php } ?>
                    </div>

                    <button class="btn bg-blue btn-lg m-t-15 waves-effect" type="submit">
		            	<?php echo ($action == "add") ? 'Tambah' : 'Edit'; ?>
		            </button>

                </form>
            </div>
        </div>
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

	    var level = "<?php echo get_current_user_level(); ?>";
	    if (level == '3') {
	    	$('#flevel').slideUp('slow');
	    }

	    var action = "<?php echo $action; ?>";
	    if (action == "add") {
	    	$('#level3').attr('checked', 'checked');
	    }
		
	});

	$(function () {
    $('.jsdemo-notification-button button').on('click', function () {
        var placementFrom = $(this).data('placement-from');
        var placementAlign = $(this).data('placement-align');
        var animateEnter = $(this).data('animate-enter');
        var animateExit = $(this).data('animate-exit');
        var colorName = $(this).data('color-name');

        showNotification(colorName, null, placementFrom, placementAlign, animateEnter, animateExit);
    });
});


</script>