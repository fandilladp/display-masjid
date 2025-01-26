    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="overlay"></div>
    
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Jadwal Sholat</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->



    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <!-- <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>dashboard">
                            <i class="material-icons col-indigo">desktop_windows</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-indigo">chrome_reader_mode</i>
                            <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>master/user">User</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>konten">
                            <i class="material-icons col-indigo">description</i>
                            <span>Konten</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>petugas/shalat-jumat">
                            <i class="material-icons col-indigo">group</i>
                            <span>Petugas Sholat Jumat</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>jadwal-imam-shalat">
                            <i class="material-icons col-indigo">account_circle</i>
                            <span>Jadwal Imam Sholat</span>
                        </a>
                    </li>


                    <li class="">
                        <a href="<?php echo base_url(); ?>jadwal/kajian">
                            <i class="material-icons col-indigo">mic_none</i>
                            <span>Jadwal Kajian</span>
                        </a>
                    </li>
                    
                    <!-- <li class="">
                        <a href="<?php echo base_url(); ?>kasmasjid">
                            <i class="material-icons col-indigo">donut_large</i>
                            <span>Kas Masjid</span>
                        </a>
                    </li> -->

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-indigo">settings_applications</i>
                            <span>Pengaturan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>pengaturan/masjid">Masjid</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>pengaturan/waktu-shalat">Waktu Sholat</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>pengaturan/perwaktu-shalat">Penyesuaian Waktu</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>pengaturan/background/picture">Background</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>pengaturan/font">Font</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>pengaturan/general">General</a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>about">
                            <i class="material-icons col-indigo">update</i>
                            <span>About</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>auth/logout">
                            <i class="material-icons col-indigo">exit_to_app</i>
                            <span>Keluar</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <?php echo (date("Y") == "2018") ? "" : " - " . date("Y"); ?> <a href="http://xbxteam.web.id/">XbX Team</a>

                </div>
                <div class="version">
                    <b>Version: </b> <?php echo get_versi(); ?>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
    


<!-- 
    Double navigation
    <header>
        Sidebar navigation
        <div id="slide-out" class="side-nav sn-bg-4 fixed" style="transform: translateX(0%);">
            <ul class="custom-scrollbar">
                Logo
                <li>
                    <div class="logo-wrapper waves-light waves-effect waves-light">
                        <a href="#"><img src="<?php echo base_url(); ?>assets/img/digitalbee.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                /. Logo
                
                Side navigation links
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li class="list-unstyled">
                            <a href="<?php echo base_url(); ?>dashboard" class="ajaxify waves-effect arrow-r"><i class="fa fa-desktop"></i> Dashboard </a>
                        </li>
                        <li class=""><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Master Data<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body" style="display: none;">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="<?php echo base_url(); ?>master/user" class="ajaxify waves-effect">User</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="list-unstyled">
                            <a href="<?php echo base_url(); ?>konten" class="ajaxify waves-effect arrow-r"><i class="fa fa-file-text"></i> Konten </a>
                        </li>
                        <li class="list-unstyled">
                            <a href="<?php echo base_url(); ?>petugas/shalat-jumat" class="ajaxify waves-effect arrow-r"><i class="fa fa-address-card-o"></i>Petugas Shalat Jumat </a>
                        </li>
                        <li class="list-unstyled">
                            <a href="<?php echo base_url(); ?>jadwal-imam-shalat" class="ajaxify waves-effect arrow-r"><i class="fa fa-user-circle"></i> Jadwal Imam Shalat </a>
                        </li>


                        <li class="list-unstyled">
                            <a href="<?php echo base_url(); ?>jadwal/kajian" class="ajaxify waves-effect arrow-r"><i class="fa fa-user-circle"></i> Jadwal Kajian </a>
                        </li>

                        <li class="list-unstyled">
                            <a href="<?php echo base_url(); ?>kasmasjid" class="ajaxify waves-effect arrow-r"><i class="fa fa-money"></i> Kas Masjid </a>
                        </li>

                        <li class=""><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-gear"></i> Pengaturan <i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body" style="display: none;">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="<?php echo base_url(); ?>pengaturan/masjid" class="ajaxify waves-effect">Masjid</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>pengaturan/waktu-shalat" class="ajaxify waves-effect">Waktu Shalat</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>pengaturan/perwaktu-shalat" class="ajaxify waves-effect">Penyesuaian Waktu</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>pengaturan/background/picture" class="ajaxify waves-effect">Background</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>pengaturan/font" class="ajaxify waves-effect">Font</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>pengaturan/general" class="ajaxify waves-effect">General</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="list-unstyled">
                            <a href="<?php echo base_url(); ?>about" class="ajaxify waves-effect arrow-r"><i class="fa fa-question-circle-o" aria-hidden="true"></i> About </a>
                        </li>
                    </ul>
                </li>
                /. Side navigation links
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        /. Sidebar navigation
        Navbar
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            SideNav slide-out button
            <div class="float-left">
                <a href="<?php echo base_url(); ?>dashboard" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            Breadcrumb
            <div class="breadcrumb-dn mr-auto">
                <p>cPanel Bee</p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" href="<?php echo base_url(); ?>dashboard" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo get_current_user_nama(); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item waves-effect waves-light" href="#">Profil</a>
                        <a class="ajaxify dropdown-item waves-effect waves-light" href="<?php echo base_url("auth/logout"); ?>">Keluar</a>
                    </div>
                </li>
            </ul>
        </nav>
        /.Navbar
    </header>
    /.Double navigation -->