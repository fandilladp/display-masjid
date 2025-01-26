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
                    <?php echo form_hidden('ID', @$data->perwaktushalat_id); ?>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <div class="form-line">
                                <input type="text" id="waktu" value="<?php echo @$data->perwaktushalat_nama; ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group" id="fJedaIqomah">
                            <label for="jeda_iqomah">Jeda Iqomah (menit)</label>
                            <div class="form-line">
                                <input type="text" id="jeda_iqomah" name="jeda_iqomah" value="<?php echo @$data->perwaktushalat_jeda_iqomah; ?>" class="form-control">
                            </div>
                            <span class="help-block text-warning">Dihitung dari mulai Adzan</span>
                        </div>
                        <div class="form-group" id="fJedaLayarMati">
                            <label for="jeda_iqomah">Jeda Layar Mati (menit)</label>
                            <div class="form-line">
                                <input type="text" id="jeda_layar_mati" name="jeda_layar_mati" value="<?php echo @$data->perwaktushalat_jeda_layar_mati; ?>" class="form-control">
                            </div>
                            <span class="help-block text-warning">Dihitung dari mulai Iqomah</span>
                        </div>
                        <div class="form-group" id="fPenyesuaian">
                            <label for="jeda_iqomah" class="lPenyesuaian">Penyesuaian Waktu Shalat (Menit)</label>
                            <div class="form-line">
                                <input type="text" id="penyesuaian" name="penyesuaian" value="<?php echo @$data->perwaktushalat_penyesuaian; ?>" class="form-control">
                            </div>
                            <span class="help-block help-block-penyesuaian teal-text">Tambah atau kurangi waktu shalat dari standar. Cth. +2 atau -1</span>
                        </div>
                    </div>
                    <button class="btn bg-blue btn-lg aves-effect" type="submit">Edit</button>
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


        var fJedaIqomah = $('#fJedaIqomah');
        var fPenyesuaian = $('#fPenyesuaian');
        var fJedaLayarMati = $('#fJedaLayarMati');
        var id = "<?php echo @$data->perwaktushalat_id; ?>";

        if (id == 6) {
            fJedaIqomah.slideUp('slow')
            fPenyesuaian.slideUp('slow')
        }

        if (id == 7 || id == 8) {
            fJedaIqomah.slideUp('slow')
            fJedaLayarMati.slideUp('slow')
            $('.lPenyesuaian').text('Penyesuaian Waktu')
            $('.help-block-penyesuaian').text('Tambah atau kurangi waktu dari standar. Cth. +2 atau -1')
            // fPenyesuaian.slideUp('slow')
        }
		
	});
</script>