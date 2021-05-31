        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           <?php $course = $this->db->get_where('courses',array('course_id'=>$course_id))->row_array(); ?>
          </div>

         

          <!-- Content Row -->



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-9">

              <!-- Project Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Question</h6>
                </div>
                <form class="user" method="post" action="<?php echo base_url() ?>admin/add_option">
                <div class="card-body">
                  <h4 class="small font-weight-bold">Question</h4>
                  <div class="mb-4">
                    <input type="text" name="option" class="form-control form-control-user" placeholder="Number of Options">
                  </div>
                  <h4 class="small font-weight-bold">Question Type</h4>
                  <div class="mb-4">
                    <select  name="type" class="form-control">
                      <option>--select question type --</option>
                      <option value="1">Single answer single choice</option>
                      <option value="2">Multiple answer Multiple choice</option>
                      <option value="3">Numaric Type</option>
                      <option value="4">Match the Column</option>
                    </select>
                  </div>

                  <?php for ($i=1; $i <= $option; $i++) { 
                    ?>


                    <h4 class="small font-weight-bold">Option #<?php echo $i; ?></h4>
                    <div class="mb-4">
                      <textarea name="answer[]"></textarea>
                    </div>


                    <?php 
                  } ?>




                 <div class=""><input type="submit" class="btn btn-success "  value="Submit"></div>
                </div>
              </form>
              </div>

              <!-- Color System -->


            </div>

            <div class="col-lg-3">
              <div class="row">
               
               <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Instructions</h6>
                </div>
                <div class="card-body">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
                </div>
              </div>
              </div>
                

              </div>
          </div>

        </div>