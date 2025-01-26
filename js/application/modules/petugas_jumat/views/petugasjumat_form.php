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
            	<?php echo form_hidden('ID', @$data[0]['petugasshalatjumat_id']); ?>

            	<div class="form-group">
					<label for="bs_datepicker_container">Tanggal</label>
                    <div class="form-line" id="bs_datepicker_container">
						<input type="text" name="tanggal" class="form-control" value="<?php echo @$data[0]['petugasshalatjumat_tanggal']; ?>" data-value="<?php echo @$data[0]['petugasshalatjumat_tanggal']; ?>" placeholder="Pilih Tanggal" autocomplete="off">
                    </div>
                </div>
		    
				<div class="form-group">
					<label for="select-muazin-1">Muazin</label>
					<select name="muazin_1" class="form-control show-tick select2" id="select-muazin-1" style="width: 100%">
                		<?php if (@$data[0]['petugasshalatjumat_muadzin_1'] != "") : ?>
                			<option selected="selected" value="<?php echo @$data[0]['petugasshalatjumat_muadzin_1'] ?>"><?php echo @$data[0]['petugasshalatjumat_muadzin_1_nama'] ?></option>
                		<?php endif; ?>
                	</select>
				</div>

				<div class="form-group">
					<label for="select-muazin-2">Khatib</label>
					<select name="muazin_2" class="form-control show-tick select2" id="select-muazin-2" style="width: 100%">
                		<?php if (@$data[0]['petugasshalatjumat_muadzin_2'] != "") : ?>
                			<option selected="selected" value="<?php echo @$data[0]['petugasshalatjumat_muadzin_2'] ?>"><?php echo @$data[0]['petugasshalatjumat_muadzin_2_nama'] ?></option>
                		<?php endif; ?>
                	</select>
				</div>

				<div class="form-group">
					<label for="select-khatib">Khatib Cadangan</label>
					<select name="khatib" class="form-control show-tick select2" id="select-khatib" style="width: 100%">
                		<?php if (@$data[0]['petugasshalatjumat_khatib'] != "") : ?>
                			<option selected="selected" value="<?php echo @$data[0]['petugasshalatjumat_khatib'] ?>"><?php echo @$data[0]['petugasshalatjumat_khatib_nama'] ?></option>
                		<?php endif; ?>
                	</select>
				</div>

				<div class="form-group">
					<label for="select-imam">Imam</label>
					<select name="imam" class="form-control show-tick select2" id="select-imam" style="width: 100%">
                		<?php if (@$data[0]['petugasshalatjumat_imam'] != "") : ?>
                			<option selected="selected" value="<?php echo @$data[0]['petugasshalatjumat_imam'] ?>"><?php echo @$data[0]['petugasshalatjumat_imam_nama'] ?></option>
                		<?php endif; ?>
                	</select>
				</div>

				<button class="btn btn-primary btn-lg m-t-15 waves-effect" type="submit">
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

	    var action = "<?php echo $action; ?>";

	    $('.select2').select2({
	    	placeholder: 'Pilih',
	    	allowClear:true,
            ajax: {
                url: "<?php echo base_url(); ?>service/get_user",
                processResults: function (res) {
                    return {
                        results: res
                    };
                }
            }
        });

	    $('#bs_datepicker_container input').datepicker({
	    	format: 'yyyy/mm/dd',
	        autoclose: true,
	        todayBtn: true,
	        todayHighlight: true,
	        toggleActive: true,
	        weekStart: 1,
	        container: '#bs_datepicker_container'
	    });

        /*$('.datepicker').bootstrapMaterialDatePicker({
	        format: 'dddd DD MMMM YYYY',
	        clearButton: true,
	        weekStart: 1,
	        time: false
	    });*/

	    /*$('.datepicker').pickadate({
			// weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
			// showMonthsShort: true
			monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober','November', 'Desember'],
			monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
			weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
			weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
			// showMonthsShort: undefined,
			// showWeekdaysFull: undefined,

			// firstDay: 1,
		    format: 'dd mmmm yyyy',
		    formatSubmit: 'yyyy-mm-dd',
		    min: true,
			today: 'Hari Ini',
			clear: 'Hapus',
			close: 'Batal'
		})*/

		if (action == "edit") {
	    	// var tanggal = $('input[name=tanggal]').attr('value');
	    	// $('input[name=tanggal_submit]').val(tanggal);
	    }
		
	});
	
</script>