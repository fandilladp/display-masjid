<div class="row">

    <div class="col-md-4">
        <div class="fs-kajian owl-carousel text-center">
            <?php foreach ($data_1 as $key => $value) : ?>
                <div class="item">
                    <span class="kaj-ket-ust"><?php echo $value['user_nama']; ?></span><br>
                    <span class="kaj-ket-materi"><?php echo $value['kajian_materi']; ?></span><br>
                    <span class="kaj-ket-waktu"><?php echo app_date_value($value['kajian_tanggal'], 'd M Y'); ?> - <?php echo $value['kajian_waktu']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-4">
        <div class="fs-kajian owl-carousel text-center">
            <?php foreach ($data_2 as $key => $value) : ?>
                <div class="item">
                    <span class="kaj-ket-ust"><?php echo $value['user_nama']; ?></span><br>
                    <span class="kaj-ket-materi"><?php echo $value['kajian_materi']; ?></span><br>
                    <span class="kaj-ket-waktu"><?php echo app_date_value($value['kajian_tanggal'], 'd M Y'); ?> - <?php echo $value['kajian_waktu']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-4">
        <div class="fs-kajian owl-carousel text-center">
            <?php foreach ($data_3 as $key => $value) : ?>
                <div class="item">
                    <span class="kaj-ket-ust"><?php echo $value['user_nama']; ?></span><br>
                    <span class="kaj-ket-materi"><?php echo $value['kajian_materi']; ?></span><br>
                    <span class="kaj-ket-waktu"><?php echo app_date_value($value['kajian_tanggal'], 'd M Y'); ?> - <?php echo $value['kajian_waktu']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<script>
    $(function() {
        fs_kajian();
        function fs_kajian() {
            $(".fs-kajian").owlCarousel({
                animateOut: 'slideOutUp',
                animateIn: 'flipInX',
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 15000,
            });
        }
    });
</script>