<style type="text/css">
	.cd > div.owl-carousel{
		position: relative;
		padding-top: 50px;
	}
</style>


<div class="container text-center">
	<div class="cd countdown-body">00:00</div>
	<input type="hidden" id="current">
	<div class="cd countdown-footer">
		<div class="owl-carousel">
			<?php foreach ($konten as $key => $value) { ?>
				<div class="cd-footer-text">
			    	<p><?php echo $value; ?></p>
				</div>
			<?php } ?>
		</div>
	</div>
</div>



<script type="text/javascript">
    $(function() {
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 10000,
            margin: 90,
        });
    });
</script>

<script type="text/javascript">

	$(function() {

		$('div.flex-center').css({
	        'background-color': '#000',
	        'opacity': '1',
	        'position': 'fixed',
	        'bottom': '0',
	        'min-width': '100',
	        'min-height': '100'
	    });

	    var newdate_m		= '<?php echo date("Y-m-d 00:"); ?>';
	    var newdate_s		= '<?php echo date("Y-m-d 00:00:"); ?>';
		var waktu_shalat 	= '<?php echo $waktu_shalat ?>';

		var iqomah_time	 	= moment('<?php echo $waktu_shalat ?>').add('<?php echo $jeda_iqomah; ?>', 'minute').unix();
		var currentTime 	= moment().unix();

		var diffTime 		= iqomah_time - currentTime;
		var duration 		= moment.duration(diffTime*1000, 'milliseconds');
		var interval 		= 1000;

		$('#current').val(iqomah_time);

		var intervas = setInterval(function(){
			var currentTime = moment().unix();
			duration = moment.duration(duration - interval, 'milliseconds');
			$('.countdown-body').text(moment(newdate_m + duration.minutes()).format('mm') + ":" + moment(newdate_s + duration.seconds()).format('ss'));

			console.log('runing');
			// console.log(iqomah_time);
			// console.log(currentTime);

			if ( (iqomah_time-5) <= currentTime) {
				 $('audio').get(0).play(); 
			}

			if (iqomah_time <= currentTime) {

				$('div.countdown-body').css({
					'font-size': '160px',
					'font-weight': '400',
					'color': '#FF0000',
					'padding': '0',
					'margin': '0'
				});

				$('.owl-carousel').slideUp('slow')

				console.log('iqomah dimulai');
				$('div.countdown-body').addClass('blink');
				$('div.countdown-body').text("LURUS & RAPATKAN SHAF");
				clearInterval(intervas);
				setInterval(direct, 6000)
			}
		}, interval);

		function direct() {
			console.log('layar mati');
			$('.container').slideUp();
			wakeup_time();
		}

		function wakeup_time() {
			var wt = setInterval(function() {
				var waktu_sleep = moment(waktu_shalat).add('<?php echo $waktu_sleep; ?>', 'minute').unix();
				var currentTime = moment().unix();

				if (waktu_sleep <= currentTime) {
					console.log('layar hidup lagi');
					window.location.href = "<?php echo base_url(); ?>";
				}
			}, interval)
		}

	});
</script>