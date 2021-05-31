    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="<?php echo base_url(); ?>uploads/logobig.png" height="50px;" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="<?php echo base_url(); ?>">home</a></li>
                                        <li><a href="<?php base_url(); ?>courses">Courses</a></li>
                                        <!-- <li><a href="#">Gallery <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo base_url(); ?>photos">Photos</a></li>
                                                <li><a href="<?php echo base_url(); ?>videos">Videos</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="<?php echo base_url(); ?>about">About</a></li>
                                        <li><a href="#">More <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo base_url(); ?>study_material">Study Material</a></li>
                                                <li><a href="<?php echo base_url(); ?>vacancy">Vacancy</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url() ?>contact;">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <a href="#test-form" class="login popup-with-form">
                                    <i class="flaticon-user"></i>
                                    <span>log in</span>
                                </a>
                                <div class="live_chat_btn">
                                    <a class="boxed_btn_orange" href="#">
                                        <i class="fa fa-phone"></i>
                                        <span><?php echo $this->db->get_where('settings',array('type'=>'primary_contact'))->row()->description; ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>