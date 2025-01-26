<div class="fixed-top rgba-black-light">
	<div class="container-fluid">
		<div class="row">
		    <div class="kiri col-md-3 col-lg-3 col-xl-3 text-center">
		    	<span class="hari" id="day"></span>
		    	<span class="tanggal_masehi" id="date_masehi"></span> <br>
		    	<span class="tanggal_hijriah" id="date_hijriah"></span>
		    </div>

		    <div class="tengah col-md-6 col-lg-6 col-xl-6 text-center">
	    		<span class="nama"><?php echo app_masjid()->masjid_nama; ?></span><br>
	    		<span class="alamat" dir="alamat">
	    			<?php echo app_masjid()->masjid_alamat; ?>
				</span>
		    </div>

		    <div class="kanan col-md-3 col-lg-3 col-xl-3">
		    	<p class="jam align-middle float-right" id="time"></p>
		    	<!-- <p class="jam align-middle float-right" id="down"></p> -->
		    </div>
		</div>
	</div>
</div>
