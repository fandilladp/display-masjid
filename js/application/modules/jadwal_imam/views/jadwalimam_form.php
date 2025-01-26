<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?php echo $_subtitle; ?>
                </h2>
            </div>
            <div class="body">
                  <div class="table-responsive">
                        <?php echo form_open_multipart($initurl . '/action_' . @$action, 'id="my-form" method="POST" role="form" data-confirm="1"'); ?>
                        <table class="table table-bordered table-striped table-hover xjs-basic-example dataTable">
                            <thead>
                            <tr>
                                <th style="min-width: 20px;">No</th>
                                <th style="min-width: 80px;">Hari</th>
                                <th style="min-width: 200px;">Subuh</th>
                                <th style="min-width: 200px;">Dzuhur</th>
                                <th style="min-width: 200px;">Ashar</th>
                                <th style="min-width: 200px;">Maghrib</th>
                                <th style="min-width: 200px;">Isya</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            	<td>1</td>
                                <td>
                                	Minggu
                                </td>
                                <td>
                                	<select name="minggu[]" class="form-control select2">
                                		<?php if (@$data[0]['user_subuh_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[0]['user_subuh_id'] ?>"><?php echo $data[0]['user_subuh'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="minggu[]" class="form-control select2">
                                		<?php if (@$data[0]['user_dzuhur_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[0]['user_dzuhur_id'] ?>"><?php echo $data[0]['user_dzuhur'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="minggu[]" class="form-control select2">
                                		<?php if (@$data[0]['user_ashar_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[0]['user_ashar_id'] ?>"><?php echo $data[0]['user_ashar'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="minggu[]" class="form-control select2">
                                		<?php if (@$data[0]['user_maghrib_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[0]['user_maghrib_id'] ?>"><?php echo $data[0]['user_maghrib'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="minggu[]" class="form-control select2">
                                		<?php if (@$data[0]['user_isya_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[0]['user_isya_id'] ?>"><?php echo $data[0]['user_isya'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                            </tr>
                            <tr>
                            	<td>2</td>
                                <td>
                                	Senin
                                </td>
                                <td>
                                	<select name="senin[]" class="form-control select2">
                                		<?php if (@$data[1]['user_subuh_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[1]['user_subuh_id'] ?>"><?php echo $data[1]['user_subuh'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="senin[]" class="form-control select2">
                                		<?php if (@$data[1]['user_dzuhur_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[1]['user_dzuhur_id'] ?>"><?php echo $data[1]['user_dzuhur'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="senin[]" class="form-control select2">
                                		<?php if (@$data[1]['user_ashar_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[1]['user_ashar_id'] ?>"><?php echo $data[1]['user_ashar'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="senin[]" class="form-control select2">
                                		<?php if (@$data[1]['user_maghrib_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[1]['user_maghrib_id'] ?>"><?php echo $data[1]['user_maghrib'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="senin[]" class="form-control select2">
                                		<?php if (@$data[1]['user_isya_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[1]['user_isya_id'] ?>"><?php echo $data[1]['user_isya'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                            </tr>
                            <tr>
                            	<td>3</td>
                                <td>
                                	Selasa
                                </td>
                                <td>
                                	<select name="selasa[]" class="form-control select2">
                                		<?php if (@$data[2]['user_subuh_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[2]['user_subuh_id'] ?>"><?php echo $data[2]['user_subuh'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="selasa[]" class="form-control select2">
                                		<?php if (@$data[2]['user_dzuhur_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[2]['user_dzuhur_id'] ?>"><?php echo $data[2]['user_dzuhur'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="selasa[]" class="form-control select2">
                                		<?php if (@$data[2]['user_ashar_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[2]['user_ashar_id'] ?>"><?php echo $data[2]['user_ashar'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="selasa[]" class="form-control select2">
                                		<?php if (@$data[2]['user_maghrib_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[2]['user_maghrib_id'] ?>"><?php echo $data[2]['user_maghrib'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="selasa[]" class="form-control select2">
                                		<?php if (@$data[2]['user_isya_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[2]['user_isya_id'] ?>"><?php echo $data[2]['user_isya'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                            </tr>
                            <tr>
                            	<td>4</td>
                                <td>
                                	Rabu
                                </td>
                                <td>
                                	<select name="rabu[]" class="form-control select2">
                                		<?php if (@$data[3]['user_subuh_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[3]['user_subuh_id'] ?>"><?php echo $data[3]['user_subuh'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="rabu[]" class="form-control select2">
                                		<?php if (@$data[3]['user_dzuhur_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[3]['user_dzuhur_id'] ?>"><?php echo $data[3]['user_dzuhur'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="rabu[]" class="form-control select2">
                                		<?php if (@$data[3]['user_ashar_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[3]['user_ashar_id'] ?>"><?php echo $data[3]['user_ashar'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="rabu[]" class="form-control select2">
                                		<?php if (@$data[3]['user_maghrib_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[3]['user_maghrib_id'] ?>"><?php echo $data[3]['user_maghrib'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="rabu[]" class="form-control select2">
                                		<?php if (@$data[3]['user_isya_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[3]['user_isya_id'] ?>"><?php echo $data[3]['user_isya'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                            </tr>
                            <tr>
                            	<td>5</td>
                                <td>
                                	Kamis
                                </td>
                                <td>
                                	<select name="kamis[]" class="form-control select2">
                                		<?php if (@$data[4]['user_subuh_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[4]['user_subuh_id'] ?>"><?php echo $data[4]['user_subuh'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="kamis[]" class="form-control select2">
                                		<?php if (@$data[4]['user_dzuhur_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[4]['user_dzuhur_id'] ?>"><?php echo $data[4]['user_dzuhur'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="kamis[]" class="form-control select2">
                                		<?php if (@$data[4]['user_ashar_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[4]['user_ashar_id'] ?>"><?php echo $data[4]['user_ashar'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="kamis[]" class="form-control select2">
                                		<?php if (@$data[4]['user_maghrib_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[4]['user_maghrib_id'] ?>"><?php echo $data[4]['user_maghrib'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="kamis[]" class="form-control select2">
                                		<?php if (@$data[4]['user_isya_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[4]['user_isya_id'] ?>"><?php echo $data[4]['user_isya'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                            </tr>
                            <tr>
                            	<td>6</td>
                                <td>
                                	Jumat
                                </td>
                                <td>
                                	<select name="jumat[]" class="form-control select2">
                                		<?php if (@$data[5]['user_subuh_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[5]['user_subuh_id'] ?>"><?php echo $data[5]['user_subuh'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="jumat[]" class="form-control select2">
                                		<?php if (@$data[5]['user_dzuhur_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[5]['user_dzuhur_id'] ?>"><?php echo $data[5]['user_dzuhur'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="jumat[]" class="form-control select2">
                                		<?php if (@$data[5]['user_ashar_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[5]['user_ashar_id'] ?>"><?php echo $data[5]['user_ashar'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="jumat[]" class="form-control select2">
                                		<?php if (@$data[5]['user_maghrib_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[5]['user_maghrib_id'] ?>"><?php echo $data[5]['user_maghrib'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="jumat[]" class="form-control select2">
                                		<?php if (@$data[5]['user_isya_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[5]['user_isya_id'] ?>"><?php echo $data[5]['user_isya'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                            </tr>
                            <tr>
                            	<td>7</td>
                                <td>
                                	Sabtu
                                </td>
                                <td>
                                	<select name="sabtu[]" class="form-control select2">
                                		<?php if (@$data[6]['user_subuh_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[6]['user_subuh_id'] ?>"><?php echo $data[6]['user_subuh'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="sabtu[]" class="form-control select2">
                                		<?php if (@$data[6]['user_dzuhur_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[6]['user_dzuhur_id'] ?>"><?php echo $data[6]['user_dzuhur'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="sabtu[]" class="form-control select2">
                                		<?php if (@$data[6]['user_ashar_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[6]['user_ashar_id'] ?>"><?php echo $data[6]['user_ashar'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="sabtu[]" class="form-control select2">
                                		<?php if (@$data[6]['user_maghrib_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[6]['user_maghrib_id'] ?>"><?php echo $data[6]['user_maghrib'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                                <td>
                                	<select name="sabtu[]" class="form-control select2">
                                		<?php if (@$data[6]['user_isya_id'] != "") : ?>
                                			<option selected="selected" value="<?php echo $data[6]['user_isya_id'] ?>"><?php echo $data[6]['user_isya'] ?></option>
                                		<?php endif; ?>
                                	</select>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-primary btn-lg btn-block m-t-15 waves-effect" type="submit">
                        Simpan
                    </button>
        	</form>
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
	});

  

</script>