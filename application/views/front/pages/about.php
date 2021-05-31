<div class="bradcam_area breadcam_bg overlay2">
            <h3><?php echo $page_title; ?></h3>
</div>
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

    <!-- our_team_member_start -->
    <div class="our_team_member">
        <div class="container">
            <div class="row">
                <?php $team = $this->db->get('teacher',4)->result_array(); ?>
                <?php foreach ($team as $row): ?>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="single_team">
                            <div class="thumb">
                                <img src="<?php echo base_url(); ?>uploads/teachers/<?php echo $row['image']; ?>" alt="">
                                <div class="social_link">
                                    <a href="<?php echo $row['email'] ?>"><i class="fa fa-envelope"></i></a>
                                    <a href="<?php echo $row['facebook'] ?>"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="master_name text-center">
                                <h3><?php echo $row['name']; ?></h3>
                                <p><?php echo $row['about']; ?></p>
                            </div>
                        </div>
                    </div>    
                <?php endforeach; ?>
                
                
               
            </div>
        </div>
    </div>
    <!-- our_team_member_end -->

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