<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?php echo $_subtitle; ?>
                </h2>
            </div>
            <div class="body">
                <h5 class="card-title font-weight-bold mb-3"><?php echo $data->masjid_nama; ?></h5>
                <p class="card-text mb-0">
                    <?php echo $data->masjid_alamat; ?>
                </p>
                <a class="ajaxify" href="<?php echo $fullurl; ?>/edit/<?php echo ($data->masjid_id); ?>"> <button class="btn bg-blue btn-lg waves-effect">Edit</button> </a>
            </div>
        </div>
    </div>
</div>

