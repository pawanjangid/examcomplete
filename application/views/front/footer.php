    <footer class="footer footer_bg_1">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>uploads/logo.png" style="max-width: 100%;height: 100px;" alt="">
                                </a>
                            </div>
                            <p>
                                <?php echo $this->db->get_where('settings',array('type'=>'about'))->row()->description; ?>
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a target="_blank" href="<?php echo $this->db->get_where('social_link',array('name'=>'facebook'))->row()->link; ?>">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="<?php echo $this->db->get_where('social_link',array('name'=>'twitter'))->row()->link; ?>">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="<?php echo $this->db->get_where('social_link',array('name'=>'instagram'))->row()->link; ?>">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="<?php echo $this->db->get_where('social_link',array('name'=>'youtube'))->row()->link; ?>">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Courses
                            </h3>
                            <ul>
                                <?php $course = $this->db->get_where('courses')->result_array(); ?>
                                <?php foreach ($course as $row): ?>
                                    <li><a href="#"><?php echo $row['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Vacancy
                            </h3>
                            <ul>
                                <?php $vacancy = $this->db->get('vacancy')->result_array(); ?>
                                <?php foreach ($vacancy as $row): ?>
                                    <li><a target="_blank" href="<?php echo $row['url']; ?>"><?php echo $row['title']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Address
                            </h3>
                            <p>
                                <?php echo $this->db->get_where('settings',array('type'=>'address'))->row()->description; ?> <br>
                                <?php echo $this->db->get_where('settings',array('type'=>'primary_contact'))->row()->description; ?> <br>
                                <?php echo $this->db->get_where('settings',array('type'=>'contact_mail'))->row()->description; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <form id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>uploads/logobig.png" alt="">
                    </a>
                </div>
                <h3>Sign in</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="email" placeholder="Enter email">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" placeholder="Password">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed_btn_orange">Sign in</button>
                        </div>
                    </div>
                </form>
                <p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form2">Sign Up</a>
                </p>
            </div>
        </div>
    </form>
    <!-- form itself end -->

    <!-- form itself end-->
    <form id="test-form2" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>uploads/logobig.png" alt="">
                    </a>
                </div>
                <h3>Resistration</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="email" placeholder="Enter email">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" placeholder="Password">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="Password" placeholder="Confirm password">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed_btn_orange">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>