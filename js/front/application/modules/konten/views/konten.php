<div class="content-data">
    <?php foreach ($data as $key => $value) { ?>
        <div class="slide">
            <h1><?php echo $value['konten_arab']; ?></h1>
            <p><?php echo $value['konten_teks']; ?></p>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    $(function() {
        $('div.flex-center').css({
            'background-color': '#000',
            'opacity': '0.6',
            'position': 'fixed',
            'bottom': '0',
            'min-width': '100',
            'min-height': '100'
        });
        

        var speed = 500; // Fade Speed
        var autoswitch = true; // Auto Slider Option
        var autoswitch_speed = 5000 // Auto Slider Speed

        // Add Initial Active Class
        $('.slide').first().addClass('active');

        var de = $('div.slide > div').first().attr('delay'); // belum nemu caranya delay per content

        // Hide  All Slides
        $('.slide').hide();

        // Show First Slide
        $('.active').show();

        // Auto Slider Handler
        if(autoswitch == true){
            setInterval(nextSlide, autoswitch_speed);
        }

        // Switch To Next Slide
        function nextSlide(){
            $('.active').removeClass('active').addClass('oldActive');
            if($('.oldActive').is(':last-child')){
                $('.slide').first().addClass('active');
                var de = $('div.slide > div').first().attr('delay');
            } else {
                $('.oldActive').next().addClass('active');
                var de = $('div.slide > div').first().attr('delay');
            }
            $('.oldActive').removeClass('oldActive');
            $('.slide').fadeOut('slow');
            $('.active').slideDown('fast');
        }
    });
</script>