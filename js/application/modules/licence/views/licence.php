<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Buy Licence</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

    <style>
    	.white-text {
    		color: #f6f7f8;
    	}
    </style>

</head>
<body>
<div class="card">

  <h5 class="card-header info-color white-text text-center py-4">
    <strong>Aktivasi Program</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <div class="text-center" style="color: #757575;">

		<div class="md-form input-group mb-3">
			<div class="input-group-prepend">
				<button class="btn btn-md btn-default m-0 px-3" type="button" id="MaterialButton-addon1">GenKey</button>
			</div>
			<input type="text" class="form-control showgn" placeholder="Generate Key">
			<input type="hidden" id="gn">
		</div>
		<div class="md-form input-group mb-3">
			<div class="input-group-prepend">
				<button class="btn btn-md btn-default m-0 px-3" type="button" id="MaterialButton-addon1">Licence</button>
			</div>
			<input type="text" class="form-control" placeholder="Enter your Licence" id="lc">
		</div>

		<span id="notif">Ada masalah dengan kode lisensinya</span>

    	<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0 aktifkan" type="submit">Aktifkan</button>

      <!-- Register -->
      <p class="contact">Belum punya Lisensi ?
        Silakan beli di <a href="http://digitalbee.id">digitalbee.id</a> atau <a href="https://wa.me/6289672057180">Whatsapp</a>
      </p>

    </div>
  </div>

</div>
</body>
</html>


<script>
	$(function() {

		$('#notif').hide();

		var button = $('.aktifkan');
		var lc = $('#lc');
		var gn = $('#gn');

		var enc = "<?php echo $enc; ?>";

		var getGN = localStorage.getItem("GN");
		if (getGN == null) {
        	setGN();
		} else {
			$('.showgn').val(getGN);
			gn.val(getGN);
		}

		function setGN() {
			// console.log();
        	localStorage.setItem("GN", enc);
			getGN = localStorage.getItem("GN");
			$('.showgn').val(getGN);
			gn.val(getGN);
		}

		button.click(function(event) {
			$('#notif').slideUp('fast');
			if (lc.val() == "") {
				$('#notif').slideDown('slow');
				$('#notif').addClass('alert alert-warning');
				$('#notif').html('Masukkan lisensi terlebih dahulu');
			} else {
				createlc();
			}
		});

		function createlc() {
			$('#notif').slideUp('slow');
			$('#notif').removeClass('alert alert-warning');
			$('#notif').removeClass('alert alert-success');

			var generate = gn.val();
			var licence = lc.val();
			$.ajax({
				url: '<?php echo base_url(); ?>licence/create',
				type: 'POST',
				dataType: 'json',
				data: {lc: licence, gn: generate},
			})
			.done(function(res) {
				if (res.status == false) {
					$('#notif').slideDown('slow');
					$('#notif').addClass('alert alert-warning');
					$('#notif').html(res.message);
				} else {
					$('#notif').slideDown('slow');
					$('#notif').addClass('alert alert-success');
					$('#notif').html(res.message);
					$('.aktifkan').hide();
					$('.contact').hide();
        			localStorage.removeItem("GN");
        			
				}
			})
			.fail(function(res) {
				console.log(res);
			})
			.always(function() {
			});
			
		}
		
	});
</script>