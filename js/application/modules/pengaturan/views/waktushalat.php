<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Perhitungan Waktu Shalat
                </h2>
            </div>
            <div class="body">
                <dl class="row">
                    <dt class="col-md-3">Set Time Zone</dt>
                    <dd class="col-md-9"><?php echo $data->waktushalat_timezone_set; ?></dd>

                    <dt class="col-md-3">Ketinggian Laut</dt>
                    <dd class="col-md-9"><?php echo $data->waktushalat_ketinggian_laut; ?></dd>
                    
                    <dt class="col-md-3">Sudut Fajar Senja</dt>
                    <dd class="col-md-9"><?php echo $data->waktushalat_sudut_fajar_senja; ?></dd>
                    
                    <dt class="col-md-3">Sudut Malam Senja</dt>
                    <dd class="col-md-9"><?php echo $data->waktushalat_sudut_malam_senja; ?></dd>
                    
                    <dt class="col-md-3">Latitude</dt>
                    <dd class="col-md-9"><?php echo $data->waktushalat_latitude; ?></dd>
                    
                    <dt class="col-md-3">Longitude</dt>
                    <dd class="col-md-9"><?php echo $data->waktushalat_longitude; ?></dd>
                    
                    <dt class="col-md-3">Time Zone Jam</dt>
                    <dd class="col-md-9"><?php echo $data->waktushalat_time_zone; ?></dd>
                    
                    <dt class="col-md-3">Perhitungan Waktu Ashar</dt>
                    <dd class="col-md-9"><?php echo app_get_mazhab($data->waktushalat_mazhab); ?></dd>
                </dl>
                <a class="ajaxify" href="<?php echo $fullurl; ?>/edit/<?php echo ($data->waktushalat_id); ?>"> <button class="btn bg-blue btn-lg waves-effect">Edit</button> </a>
            </div>
        </div>
    </div>
</div>