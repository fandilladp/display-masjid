<div class="content-data owl-carousel" id="owl-conten">
    <?php foreach ($data as $key => $value) { ?>
        <div class="slide">
            <?php if ($value['konten_arab'] != "") : ?>
                <h1><?php echo $value['konten_arab']; ?></h1>
            <?php endif; ?>
            <p><?php echo $value['konten_teks']; ?></p>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('div.flex-center').css({
            // 'background-color': '#000',
            // 'opacity': '0.4',
            'position': 'fixed',
            'bottom': '0',
            'min-width': '100',
            'min-height': '100'
        });
        
		$("#owl-conten").owlCarousel({
			items: 1,
			loop: true,
			autoplay: true,
			autoplayTimeout: 15000,
			margin: 90,
		});
	});
</script>