    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="illastrator_png">
                            <img src="<?php echo base_url(); ?>front/img/banner/edu_ilastration.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_info">
                            <h3>Learn your <br>
                                Favorite Course <br>
                                From Online</h3>
                            <a href="#" class="boxed_btn">Browse Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <h3><?php echo $this->db->get_where('settings',array('type'=>'system_description'))->row()->description; ?></h3>
                        <p>
                            <?php echo $this->db->get_where('settings',array('type'=>'about'))->row()->description; ?>
                        </p>
                        <a href="<?php echo $this->db->get_where('settings',array('type'=>'app_link'))->row()->description; ?>" class="boxed_btn">Download Now</a>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="about_tutorials">
                        <div class="courses">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span><?php echo $this->db->get('student')->num_rows(); ?></span>
                                    <p>Students</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses-blue">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span><?php echo $this->db->get('courses')->num_rows(); ?></span>
                                    <p> Courses</p>
                                </div>

                            </div>
                        </div>
                        <div class="courses-sky">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span><?php echo $this->db->get('videos')->num_rows(); ?></span>
                                    <p>Tutorials</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Courses</h3>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="course_nav">
                        <nav>
                            <ul class="nav" id="myTab" role="tablist">
                                <?php $courses = $this->db->get('courses',8)->result_array(); ?>
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">All Courses</a>
                                </li>
                                <?php foreach ($courses as $row): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#<?php echo str_replace(' ', '_', $row['name']); ?>" role="tab"
                                            aria-controls="profile" aria-selected="false"><?php echo $row['name']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                    <?php $package = $this->db->get('package',6)->result_array(); ?>
                                    <?php foreach ($package as $row): ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="single_courses">
                                                <div class="thumb">
                                                    <a href="#">
                                                        <img src="<?php echo $row['poster']; ?>" style="height: 300px;max-width: 100%;" alt="">
                                                    </a>
                                                </div>
                                                <div class="courses_info">
                                                    <span><?php echo $this->db->get_where('courses',array('course_id'=>$row['course_id']))->row()->name; ?></span>
                                                    <h3><a href="#"><?php echo $row['title']; ?></a></h3>
                                                    <div class="star_prise d-flex justify-content-between">
                                                        <div class="star">
                                                            <i class="flaticon-mark-as-favorite-star"></i>
                                                            <span></span>
                                                        </div>
                                                        <div class="prise">
                                                            <span class="offer"><del>₹ <?php echo $row['mrp']; ?></del></span>
                                                            <span class="active_prise">
                                                                ₹ <?php echo $row['amount']; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-xl-12">
                                        <div class="more_courses text-center">
                                            <a href="#" class="boxed_btn_rev">More Courses</a>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <?php foreach ($courses as $row1): ?>
                    <div class="tab-pane fade" id="<?php echo str_replace(' ', '_', $row1['name']) ?>" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                    <?php $package = $this->db->get_where('package',array('course_id'=>$row1['course_id']),6)->result_array(); ?>
                                    <?php foreach ($package as $row): ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="single_courses">
                                                <div class="thumb">
                                                    <a href="#">
                                                        <img src="<?php echo $row['poster']; ?>" style="height: 300px;max-width: 100%;" alt="">
                                                    </a>
                                                </div>
                                                <div class="courses_info">
                                                    <span><?php echo $this->db->get_where('courses',array('course_id'))->row()->name; ?></span>
                                                    <h3><a href="#"><?php echo $row['title']; ?></a></h3>
                                                    <div class="star_prise d-flex justify-content-between">
                                                        <div class="star">
                                                            <i class="flaticon-mark-as-favorite-star"></i>
                                                            <span></span>
                                                        </div>
                                                        <div class="prise">
                                                            <span class="offer"><del>₹ <?php echo $row['mrp']; ?></del></span>
                                                            <span class="active_prise">
                                                                ₹ <?php echo $row['amount']; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-xl-12">
                                        <div class="more_courses text-center">
                                            <a href="#" class="boxed_btn_rev">More Courses</a>
                                        </div>
                                    </div>
                                </div>
                    </div>    
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->


    <!-- testimonial_area_start -->
    <div class="testimonial_area testimonial_bg_1 overlay">
        <div class="testmonial_active owl-carousel">
            <?php $testmonial = $this->db->get('testimonial')->result_array(); ?>
            <?php foreach ($testmonial as $row): ?>
            <div class="single_testmoial">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testmonial_text text-center">
                                <div class="author_img">
                                    <img src="<?php echo base_url().'uploads/testimonial/'.$row['image']; ?>" style="width: 100px;"  alt="">
                                </div>
                                <?php echo $row['description']; ?>
                                <span>- <?php echo $row['name']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <?php endforeach; ?>
        </div>
    </div>
    <!-- testimonial_area_end -->

    <!-- our_courses_start -->
    <div class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Our Course Speciality</h3>
                        <p>Your domain control panel is designed for ease-of-use and <br>
                            allows for all aspects of your domains.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon">
                            <i class="flaticon-art-and-design"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p>
                            Your domain control panel is designed for ease-of-use <br> and <br>
                            allows for all aspects of
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon blue">
                            <i class="flaticon-business-and-finance"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p>
                            Your domain control panel is designed for ease-of-use <br> and <br>
                            allows for all aspects of
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon">
                            <i class="flaticon-premium"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p>
                            Your domain control panel is designed for ease-of-use <br> and <br>
                            allows for all aspects of
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon gradient">
                            <i class="flaticon-crown"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p>
                            Your domain control panel is designed for ease-of-use <br> and <br>
                            allows for all aspects of
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_courses_end -->

    <!-- subscribe_newsletter_Start -->
    <div class="subscribe_newsletter">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="newsletter_text">
                        <h3>Subscribe Newsletter</h3>
                        <p>To get leatest update from the <?php echo $this->db->get_where('settings',array('type'=>'system_name'))->row()->description; ?></p>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="newsletter_form">
                        <h4><?php echo $this->session->flashdata('message'); ?></h4>
                        <form action="<?php echo base_url(); ?>newsletter" method="post" class="newsletter_form">
                            <input type="text" name="email" placeholder="Enter your mail">
                            <button type="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe_newsletter_end -->

    <!-- our_latest_blog_start -->
    <div class="our_latest_blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Demo Videos</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $demo_videos = $this->db->get('demo_video',3)->result_array(); ?>
                <?php foreach ($demo_videos as $row): ?>
                    <div class="col-xl-4 col-md-4">
                        <div class="single_latest_blog">
                            <div class="thumb" style="height: 250px;">
                                <div >
                                    <?php if($row['method']=='youtube'){ ?>
                                    <iframe width="100%" style="height: 250px;" src="https://www.youtube.com/embed/<?php echo $row['file']; ?>"></iframe>
                                    <?php }else{ ?>
                                      <video style="width: 100%;height: 250px;" poster="<?php echo $row['thumbnail']; ?>" controls>
                                        <source src="<?php echo $row['file']; ?>" type="">
                                      </video>
                                  <?php } ?>
                                </div>
                            </div>
                            <div class="content_blog">
                                <div class="date">
                                    <p><?php echo date('d-M-Y H:i',$row['time']); ?></p>
                                </div>
                                <div class="blog_meta">
                                    <h3><a href="#">Commitment to dedicated Support</a></h3>
                                </div>
                                <p class="blog_text">
                                    Firmament morning sixth subdue darkness creeping gathered divide.
                                </p>
                            </div>
                        </div>
                    </div>    
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>