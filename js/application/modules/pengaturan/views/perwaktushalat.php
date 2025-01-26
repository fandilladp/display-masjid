<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?php echo $_subtitle; ?>
                </h2>
            </div>
            <div class="body">
				<a class="reload-content ajaxify" href="<?php echo $fullurl; ?>"></a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
					  	<thead>
					    	<tr>
					      		<th class="text-center th-xs" width="80">No</th>
					      		<th class="text-center th-xs" width="300">Waktu</th>
					      		<th class="text-center th-xs" width="300">Jeda Iqomah (menit)</th>
					      		<th class="text-center th-xs" width="300">Jeda Layar Mati (menit)</th>
					      		<th class="text-center th-xs" width="300">Penyesuaian Waktu</th>
					      		<th class="text-center th-xs" width="250">Action</th>
					    	</tr>
					  	</thead>
					  	<tbody>
						  	<?php foreach ($data as $key => $value) { ?>
							    <tr>
							    	<td class="text-center"><?php echo $value['perwaktushalat_id']; ?></td>
							      	<td class="text-center"><?php echo $value['perwaktushalat_nama']; ?></td>
							      	<td class="text-center">
							      			<strong><?php echo $value['perwaktushalat_jeda_iqomah']; ?></strong>
							      	</td>
							      	<td class="text-center">
							      			<strong><?php echo $value['perwaktushalat_jeda_layar_mati']; ?></strong>
							      	</td>
							      	<td class="text-center">
							      		<?php if ($value['perwaktushalat_nama'] != "Jumat") : ?>
							      			<strong><?php echo $value['perwaktushalat_penyesuaian']; ?> <?php echo ($value['perwaktushalat_id'] != '8') ? 'Menit' : 'Hari'; ?></strong>
							      		<?php endif; ?>
							      	</td>
							      	<td class="text-center">
							      		<a class="ajaxify" href="<?php echo $fullurl; ?>/edit/<?php echo $value['perwaktushalat_id']; ?>">
							      			<button class="btn bg-orange btn-lg waves-effect">Edit</button>
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