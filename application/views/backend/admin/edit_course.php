        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           <?php $course = $this->db->get_where('courses',array('course_id'=>$course_id))->row_array(); ?>
          </div>

         

          <!-- Content Row -->



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
                </div>
                <form class="user" method="post" action="<?php echo base_url() ?>admin/courses/update/<?php echo $course_id; ?>">
                <div class="card-body">
                  <h4 class="small font-weight-bold">Name</h4>
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-user" name="name" value="<?php echo $course['name']; ?>">
                  </div>
                  <h4 class="small font-weight-bold">Icon</h4>
                  <div class="mb-4">
                    <input type="file"  name="userfile">
                  </div>
                 <div class=""><input type="submit" class="btn btn-success "  value="Submit"></div>
                </div>
              </form>
              </div>

              <!-- Color System -->


            </div>

            <div class="col-lg-6">
              <div class="row">
                <?php $course = $this->db->get('courses')->result_array(); ?>
                <?php foreach ($course as $row): ?>
                  <div class="col-sm-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                      <div class="card-body">
                        <div class="">
                          <img src="<?php echo base_url().'uploads/courses/'.$row['icon']; ?>" style="max-width: 50px;border-radius: 50%;">
                          <?php echo $row['name']; ?>
                        </div>
                         <div style="margin-top: 15px;margin-left: 20px;">
                           <a href="<?php echo base_url().'admin/edit_course/'.$row['course_id']; ?>" ><i class="fas fa-edit" style="color: white"></i></i></a>
                           <a href="<?php echo base_url().'admin/courses/delete/'.$row['course_id']; ?>" style="margin-left: 20px; color : red;"><i class="fas fa-trash" style="color: #eb0000;"></i></i></a>

                         </div> 
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
               
                

              </div>

              </div>
          </div>

        </div>