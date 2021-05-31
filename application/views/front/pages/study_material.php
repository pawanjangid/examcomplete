<div class="bradcam_area breadcam_bg overlay2">
    <h3><?php echo $page_title; ?></h3>
</div>
    <!-- slider_area_end -->
    <div class="our_latest_blog">
        <div class="container">
            <div class="row">
                <?php $study_material = $this->db->get('study_material')->result_array(); ?>
                <?php foreach ($study_material as $row): ?>
                    <div class="col-xl-4 col-md-4">
                        <div class="single_latest_blog">
                            <div class="thumb" style="height: 250px;">
                                <div >
                                   <img src="<?php echo base_url(); ?>uploads/logo.png">
                                </div>
                            </div>
                            <div class="content_blog">
                                <div class="date">
                                    <p><?php echo date('d-M-Y H:i',$row['time']); ?></p>
                                </div>
                                <div class="blog_meta">
                                    <h3><a href="<?php echo $row['file']; ?>"><?php echo $row['title']; ?></a></h3>
                                </div>
                                <p class="blog_text">
                                    <?php echo $row['description']; ?>
                                </p>
                            </div>
                        </div>
                    </div>    
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>





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