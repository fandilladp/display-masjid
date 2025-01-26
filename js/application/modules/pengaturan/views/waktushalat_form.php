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
		            <?php echo form_hidden('ID', @$data->waktushalat_id); ?>
		            <div class="form-row">
		                <div class="form-group">
		                    <label for="timezone_set">Set Time Zone</label>
		                    <div class="form-line">
		                        <input type="text" id="timezone_set" name="timezone_set" value="<?php echo @$data->waktushalat_timezone_set; ?>" class="form-control">
		                    </div>
	                        <p class="teal-text">
	                        	WIB : <strong>Asia/Jakarta</strong>, WITA : <strong>Asia/Makassar</strong>, WIT : <strong>Asia/Jayapura</strong>
	                        </p>
		                </div>
		                <div class="form-group">
							<label for="ketinggian_laut">Ketinggian Laut</label>
			                <div class="form-line">
		                        <input type="text" id="ketinggian_laut" name="ketinggian_laut" value="<?php echo @$data->waktushalat_ketinggian_laut; ?>" class="form-control">
							</div>
							<p class="teal-text">
	                        	Satuan Meter, dari permukaan laut, menentukan waktu Terbit dan waktu Maghrib.
	                        </p>
						</div>
		                <div class="form-group">
							<label for="sudut_fajar_senja">Sudut Fajar Senja</label>
			                <div class="form-line">
		                        <input type="text" id="sudut_fajar_senja" name="sudut_fajar_senja" value="<?php echo @$data->waktushalat_sudut_fajar_senja; ?>" class="form-control">
							</div>
							<p class="teal-text">
	                        	Menentukan waktu Subuh.
	                        </p>
						</div>
		                <div class="form-group">
							<label for="sudut_malam_senja">Sudut Malam Senja</label>
			                <div class="form-line">
		                        <input type="text" id="sudut_malam_senja" name="sudut_malam_senja" value="<?php echo @$data->waktushalat_sudut_malam_senja; ?>" class="form-control">
							</div>
							<p class="teal-text">
	                        	Menentukan waktu Isya.
	                        </p>
						</div>
		                <div class="form-group">
							<label for="latitude">Latitude</label>
			                <div class="form-line">
		                        <input type="text" id="latitude" name="latitude" value="<?php echo @$data->waktushalat_latitude; ?>" class="form-control">
							</div>
							<p class="teal-text">
	                        	Garis Lintang Utara (derajat)
	                        </p>
						</div>
		                <div class="form-group">
							<label for="longitude">Longitude</label>
			                <div class="form-line">
		                        <input type="text" id="longitude" name="longitude" value="<?php echo @$data->waktushalat_longitude; ?>" class="form-control">
							</div>
							<p class="teal-text">
	                        	Garis Bujur Timur (derajat)
	                        </p>
						</div>
		                <div class="form-group">
							<label for="time_zone">Time Zone (GMT)</label>
			                <div class="form-line">
		                        <input type="text" id="time_zone" name="time_zone" value="<?php echo @$data->waktushalat_time_zone; ?>" class="form-control">
							</div>
							<p class="teal-text">
								Waktu Daerah (jam)
	                        </p>
						</div>
		                <div class="form-group">
								<label for="time_zone">Metode perhitungan Ashar : </label>
		                	<!-- Material inline 1 -->
							<div class="form-check form-check-inline">
								<input type="radio" value="1" class="form-check-input" id="materialInline1" name="mazhab" <?php echo (@$data->waktushalat_mazhab == "1") ? "checked" : ""; ?>>
								<label class="form-check-label" for="materialInline1">Syafi'i, Maliki, Hanbali</label>
							</div>

							<!-- Material inline 2 -->
							<div class="form-check form-check-inline">
								<input type="radio" value="2" class="form-check-input" id="materialInline2" name="mazhab" <?php echo (@$data->waktushalat_mazhab == "2") ? "checked" : ""; ?>>
								<label class="form-check-label" for="materialInline2">Hanafi</label>
							</div>
						</div>
		            </div>
		            <!-- Send button -->
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