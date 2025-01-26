<div class="container text-center">
	<div class="cd countdown-body">60</div>
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
	        'position': 'fixed',
	        'bottom': '0',
	        'min-width': '100',
	        'min-height': '100'
	    });

	    moment.locale();

	    var is_jumat	= '<?php echo $is_jumat; ?>';

		var waktu_shalat 	= '<?php echo $waktu_shalat ?>';

	    var newdate		= '<?php echo date("Y-m-d 00:00: "); ?>';
    	var eventTime	= '<?php echo strtotime($waktu_shalat); ?>';
		var currentTime = moment().unix();
		var diffTime 	= eventTime - currentTime;
		var duration 	= moment.duration(diffTime*6000, 'milliseconds');
		var interval 	= 1000;

		// alert(is_jumat);

		var intervas = setInterval(function(){
			var currentTime = moment().unix();
			duration = moment.duration(duration - interval, 'milliseconds');
			$('.countdown-body').text(moment(newdate + duration.seconds()).format('ss'));
			$('#current').val(duration.seconds())

			console.log('runing');

			if (duration.seconds() <= 5) {
				 $('audio').get(0).play(); 
			}
			
			if (is_jumat == true && $('#current').val() < 1) {
				$('.container').slideUp();
				wakeup_time();
			} else if ($('#current').val() < 1) {
				$('div.countdown-body').css({
					'font-size': '220px',
					'font-weight': '400',
					'color': '#FF0000',
					'padding': '0',
					'margin': '0'
				});

				$('.owl-carousel').slideUp('slow')

				$('div.countdown-body').addClass('blink');
				$('div.countdown-body').text("Adzan <?php echo ucfirst($shalat); ?>");
				clearInterval(intervas);
				setInterval(direct, 6000)
			}
		}, interval);

		function direct() {
			window.location.href = "<?php echo base_url(); ?>iqomah/getdata/<?php echo lcfirst($shalat); ?>";
		}

    });
</script>