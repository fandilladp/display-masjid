<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="icon bg-blue-grey">
                <i class="material-icons">access_alarm</i>
            </div>
            <div class="content">
                <div class="text">SUBUH</div>
                <div class="number"><?php echo substr(jadwal_shalat()['subuh'], 0,5); ?></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="icon bg-amber">
                <i class="material-icons">access_alarm</i>
            </div>
            <div class="content">
                <div class="text">TERBIT</div>
                <div class="number"><?php echo substr(jadwal_shalat()['terbit'], 0,5); ?></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="icon bg-orange">
                <i class="material-icons">access_alarm</i>
            </div>
            <div class="content">
                <div class="text">DZUHUR</div>
                <div class="number"><?php echo substr(jadwal_shalat()['dzuhur'], 0,5); ?></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="icon bg-teal">
                <i class="material-icons">access_alarm</i>
            </div>
            <div class="content">
                <div class="text">ASHAR</div>
                <div class="number"><?php echo substr(jadwal_shalat()['ashar'], 0,5); ?></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="icon bg-green">
                <i class="material-icons">access_alarm</i>
            </div>
            <div class="content">
                <div class="text">MAGHRIB</div>
                <div class="number"><?php echo substr(jadwal_shalat()['maghrib'], 0,5); ?></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="icon bg-blue">
                <i class="material-icons">access_alarm</i>
            </div>
            <div class="content">
                <div class="text">ISYA</div>
                <div class="number"><?php echo substr(jadwal_shalat()['isya'], 0,5); ?></div>
            </div>
        </div>
    </div>
</div>