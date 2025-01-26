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
                    <?php echo form_hidden('ID', @$data->masjid_id); ?>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div class="form-line">
                            <input type="text" id="nama" name="nama" value="<?php echo @$data->masjid_nama; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <div class="form-line">
        					<textarea type="text" id="alamat" name="alamat" class="form-control" rows="3"><?php echo @$data->masjid_alamat; ?></textarea>
        				</div>
                    </div>

                    <button class="btn bg-blue btn-lg waves-effect" type="submit">Edit</button>
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
		
	});
</script>