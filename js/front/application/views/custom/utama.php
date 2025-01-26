<!DOCTYPE html>
<html lang="en" class="full-height">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 18 Feb 1991 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />

		<title>XbX Team - Jadwal Shalat & Informasi</title>

		<!-- <link href="https://fonts.googleapis.com/css?family=Scheherazade" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Khand" rel="stylesheet"> -->

		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/1920-1080.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/1366-768.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/1280-720.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/980-430.css" rel="stylesheet">

    	<link href="<?php echo base_url(); ?>assets/plugins/sweet-alert/dist/sweetalert.css" rel="stylesheet">

		<link href="<?php echo base_url(); ?>assets/plugins/owlcarousel/css/owl.carousel.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/plugins/owlcarousel/css/owl.theme.default.min.css" rel="stylesheet">


	    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bigvideo/css/style.css"> -->
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bigvideo/bower_components/BigVideo/css/bigvideo.css">

	    <!-- <link href="https://fonts.googleapis.com/css?family=Scheherazade:400,700&amp;subset=arabic" rel="stylesheet"> -->
		<style type="text/css">

			@font-face {
				src: url('<?php echo str_replace('front/', '', base_url());  ?>public/uploads/fonts/<?php echo app_get_font()->font_src; ?>');
				font-family: '<?php echo app_get_font()->font_family; ?>';
				font-style: <?php echo strtolower(app_get_font()->font_style); ?>;
				font-weight: <?php echo app_get_font()->font_weight; ?>;
			}

			body {
				font-family: '<?php echo app_get_font()->font_family; ?>';
				background-color: #000000;
			}

		</style>

	    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

	</head>

	<body class="fullBackground">

		<div class="wrapper">
		    <div class="header">
				<?php echo $_utama_header; ?>
		    </div>

            <div class="flex-centerx white-text">
				<div class="content">
					<?php echo $_utama_content; ?>
				</div>
			</div>

			<div class="footer container-fluid">
				<div class="row rgba-black-light-2">
					<div class="col-md-12 kajian">
						<!-- <?php echo $_utama_kajian; ?> -->
					</div>
				</div>
				<div class="row rgba-black-strong">
					<div class="col-md-12">
						<?php echo $_utama_footer; ?>
					</div>
				</div>
			</div>

			<input type="hidden" id="subuh" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['subuh'], 0,5) . ":00"; ?>">
			<input type="hidden" id="dzuhur" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['dzuhur'], 0,5) . ":00"; ?>">
			<input type="hidden" id="ashar" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['ashar'], 0,5) . ":00"; ?>">
			<input type="hidden" id="maghrib" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['maghrib'], 0,5) . ":00"; ?>">
			<input type="hidden" id="isya" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['isya'], 0,5) . ":00"; ?>">
			<input type="hidden" id="selanjutnya">
			<input type="hidden" id="1menit">
		</div>

        <a id="direct" href="http://digitalbee.id">load</a>

		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/circularcountdown.js"></script>
	    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script> -->
	    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/owlcarousel/js/owl.carousel.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bigvideo/js/video.js"></script>
	    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bigvideo/bower_components/BigVideo/lib/bigvideo.js"></script>
	    <script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment.min.js'></script>
	    <script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment-with-locales.js'></script>
	    <script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment-hijri.js'></script>
	    <script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/id.js'></script>
	    <script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/fullclip.min.js'></script>

	    <script type="text/javascript">

	    	$(function() {
	    		selanjutnya();
	    		function selanjutnya() {

		    		var subuh 		= $('#subuh').val();
		    		var dzuhur 		= $('#dzuhur').val();
		    		var ashar 		= $('#ashar').val();
		    		var maghrib 	= $('#maghrib').val();
		    		var isya 		= $('#isya').val();

					var now 		= moment().unix();

					var x_subuh		= (((moment(subuh).unix()) - now) < 0 ) ? 10000000 : moment(subuh).unix() - now;
					var x_dzuhur	= (((moment(dzuhur).unix()) - now) < 0 ) ? 10000000 : moment(dzuhur).unix() - now;
					var x_ashar		= (((moment(ashar).unix()) - now) < 0 ) ? 10000000 : moment(ashar).unix() - now;
					var x_maghrib	= (((moment(maghrib).unix()) - now) < 0 ) ? 10000000 : moment(maghrib).unix() - now;
					var x_isya		= (((moment(isya).unix()) - now) < 0 ) ? 10000000 : moment(isya).unix() - now;

					var min = Math.min(x_subuh, x_dzuhur, x_ashar, x_maghrib, x_isya);
					var myArray = {subuh: x_subuh, dzuhur: x_dzuhur, ashar: x_ashar, maghrib: x_maghrib, isya: x_isya};

					for (var key in myArray) {
						if (myArray[key] == min) {
							// console.log("key " + key + " has value " + myArray[key]);
							$('#selanjutnya').val(key)
							$('a#direct').attr('href', "<?php echo base_url(); ?>adzan/getdata/" + $('#selanjutnya').val());
							break;
						} else {
						}
					}

					$.ajax({
		    			url: '<?php echo base_url(); ?>service/get_hijri',
		    			type: 'POST',
		    			dataType: 'json',
		    			data: {maghrib: maghrib}
		    		})
		    		.done(function(res) {
						$('#date_hijriah').html(res.hijri);
		    		})
		    		.fail(function(res) {
		    			console.log(res);
		    		})
		    		.always(function() {
		    		});
		    		
	    		}


	    		var CS = setInterval(countdown_shalat, 1000)
				// countdown_shalat();
				function countdown_shalat() {
			    	var _next = $('#selanjutnya').val();
			    	var next = $('#'+_next).val();
					var sekarang = moment().unix();
			    	var WZ_1MNT = moment(next).subtract(1, 'minute').unix();
			    	var WZ = moment(next).unix();
			    	var WZ_3SCD = moment(next).add(3, 'seconds').unix();

					var iqomah_time = (moment(next).add(2, 'minute').unix() - WZ_3SCD) + WZ_3SCD;

			    	var WZ_sleep = moment(next).add(5, 'minute').unix(); // 3 menit add itu jeda iqomah + waktu sleep
			    	var WZ_sleep2 = 0;

					/*console.log(next + ' = next');
					console.log(sekarang + ' = sekarang');
					console.log(WZ_1MNT + ' = WZ_1MNT');
					console.log(WZ + ' = WZ');
					console.log(WZ_3SCD + ' = WZ_3SCD');
					console.log(iqomah_time + ' = iqomah_time');
					console.log(WZ_sleep + ' = WZ_sleep');
					console.log(WZ_sleep2 + ' = WZ_sleep2');*/


					if (WZ_1MNT <= sekarang && WZ >= sekarang) {
						window.location.href = $('a#direct').attr('href');
						// console.log('60 detik menjelang shalat ' + _next);
						clearInterval(CS)
					} else if (WZ <= sekarang &&  WZ_3SCD >= sekarang ) {
						// console.log('saatnya azan ' + _next);
					} else if (WZ_3SCD <= sekarang && iqomah_time >= sekarang) {
						// console.log('menjelang iqomah 2 menit sebelum shalat ' + _next);
					} else if (iqomah_time <= sekarang && WZ_sleep >= sekarang) {
						// console.log('matikan layar selama 5 menit saat shalat ' + _next);
					} else if (WZ_sleep <= sekarang) {
						// console.log('hidupkan layar lagi, setelah shalat ' + _next);
					} else {
						// console.log('belum saatnya waktu shalat ' + _next);
					}
				}


	    		setInterval(moment_header, 1000);
	            function moment_header() {
					$('#day').html(moment().format('dddd') + ", ");
					$('#time').html(moment().format('HH:mm:ss'));
					$('#date_masehi').html(moment().format('D MMMM YYYY'));
					// $('#date_hijriah').html(moment().subtract(1, 'days').format('iD iMMMM iYYYY') + " H");
				}

	    		setInterval(cek_reload, 5000);
	    		function cek_reload() {
		    		$.ajax({
		    			url: '<?php echo base_url(); ?>service/reload',
		    			dataType: 'json',
		    		})
		    		.done(function(res) {
		    			if (res.status) {
		    				reset_reload();
		    			}
		    		})
		    		.fail(function(res) {
		    			console.log(res);
		    		})
		    		.always(function() {
		    		});
		    	}

	    		function reset_reload() {
	    			$.ajax({
		    			url: '<?php echo base_url(); ?>service/reset_reload',
		    			dataType: 'json',
		    		})
		    		.done(function(res) {
		    			if (res.status) {
		    				swal({
								type: 'success',
								title: 'Perubahan data disimpan.',
								width: 800,
								padding: '5em',
								backdrop: 'rgba(63, 81, 181, 0.3)',
								showConfirmButton: false,
								timer: 3000
							})

		    				setInterval(reload_page, 3500);

		    			} else {
		    				swal({
								type: 'error',
								title: 'Terjadi kesalahan sistem !.',
								width: 800,
								padding: '5em',
								backdrop: 'rgba(63, 81, 181, 0.3)',
								showConfirmButton: false,
								timer: 3000
							})
		    			}
		    		})
		    		.fail(function(res) {
		    			console.log(res);
		    		})
		    		.always(function() {
		    		});
	    		}

		    	function reload_page(url = null) {
		    		if (url == null) {
		    			url = "<?php echo base_url(); ?>";
		    		}

		    		window.location.href = url;
		    	}

	    		var ajaxify = function(e, el){
	                e.preventDefault();
	                
	                var ajaxify     = [null, null, null];
	                var url = $(el).attr("href");
	                var pageContentBody = $('.content');

	                if(url != ajaxify[2]){
	                    ajaxify.push(url);
	                    history.pushState(null, null, url);
	                }
	                ajaxify = ajaxify.slice(-3, 5);

	                $.ajax({
	                    url: url,
	                    cache: false,
	                    type: 'POST',
	                    dataType: 'html',
	                    data: {status_link: 'ajax'},
	                })
	                .done(function(res) {
	                    pageContentBody.html(res);
	                })
	                .fail(function(res) {
	                })
	                .always(function() {
	                });
	            }

				$('.flex-center').on('click', 'a.utama', function (e) {
					var el = $(this);
					ajaxify(e,el);
				});


				$('.flex-center').on('click', 'a.konten', function (e) {
					var el = $(this);
					ajaxify(e,el);
				});


				/* set general */
				var hari = moment().format('dddd');
				var is_videos = ['Selasa', 'Kamis', 'Jumat'];

				var is_background = "<?php echo pengaturan_general()['Background']; ?>";
				var is_blackscreen = "<?php echo pengaturan_general()['Black Screen']; ?>";

				if (is_background == '1') {
				// if (jQuery.inArray(hari, is_videos) != -1) {
					set_bg_videos();
				} else {
					set_bg_images();
				}

				if (is_blackscreen == '1') {
					var url = "<?php echo base_url(); ?>blackscreen"
					reload_page(url);
				}

				/* end set general */

				function set_bg_videos() {
					// var ko = moment.duration(duration - interval).format("mm:ss");
					$.ajax({
		    			url: '<?php echo base_url(); ?>service/get_background',
						type: 'POST',
						dataType: 'json',
						data: {tipe: 'video'}
					})
					.done(function(res) {
			            var BV = new $.BigVideo();
			            var vids = res;
			            vids.sort(function() { return 0.5 - Math.random() }); // random order on load
						BV.init();
						BV.showPlaylist(vids,{ambient:false});
					})
					.fail(function(res) {
						console.log(res);
					})
					.always(function() {
					});
				}

				function set_bg_images() {
					$.ajax({
		    			url: '<?php echo base_url(); ?>service/get_background',
						type: 'POST',
						dataType: 'json',
						data: {tipe: 'picture'}
					})
					.done(function(res) {
						$('body').fullClip({
							images: res,
							transitionTime: 500,
							wait: 30000
						});
					})
					.fail(function(res) {
						console.log(res);
					})
					.always(function() {
					});
					

				}

				$.post('<?php echo base_url(); ?>kajian', {param1: 'value1'}, function(data, textStatus, xhr) {
					$('.kajian').html(data);

				});

	    	});

	    </script>

	</body>
</html>