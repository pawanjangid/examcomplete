        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           <?php $test = $this->db->get_where('quiz',array('test_id'=>$test_id))->row_array(); ?>
          </div>



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-9">

              <!-- Project Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Exam</h6>
                </div>
                <form class="user" method="post" action="<?php echo base_url() ?>admin/add_test/update/<?php echo $test_id; ?>">
                <div class="card-body">

                  <h4 class="small font-weight-bold">Name</h4>
                  <div class="mb-4">
                    <input class="form-control" name="name" value="<?php echo $test['name']; ?>">
                  </div>

                  <h4 class="small font-weight-bold">Starting Time (Format dd-mm-YYYY h:i:s)</h4>
                  <div class="mb-4">
                    <input class="form-control" name="start" value="<?php
                     echo date('d-m-Y h:i:s',$test['start_time']); ?>">
                  </div>

                  <h4 class="small font-weight-bold">Ending Time (Format dd-mm-YYYY h:i:s)</h4>
                  <div class="mb-4">
                    <input class="form-control" name="end" value="<?php
                     echo date('d-m-Y h:i:s',$test['end_time']); ?>">
                  </div>
                  <h4 class="small font-weight-bold">Duration (in min.)</h4>
                  <div class="mb-4">
                    <input class="form-control" name="duration" value="<?php echo $test['duration']; ?>">
                  </div>
                  <h4 class="small font-weight-bold">Allow max Attempt</h4>
                  <div class="mb-4">
                    <input class="form-control" name="attempt" value="<?php echo $test['attempt']; ?>">
                  </div>
                  <h4 class="small font-weight-bold">Test Amount</h4>
                  <div class="mb-4">
                    <input class="form-control" name="amount" value="<?php echo $test['amount']; ?>">
                  </div>
                  <h4 class="small font-weight-bold">Teacher / Coaching</h4>
                  <div class="mb-4">
                    <select  name="teacher_id" class="form-control">
                      <?php $teacher = $this->db->get('teacher')->result_array(); ?>
                      <?php foreach ($teacher as $row): ?>
                        <option value="<?php echo $row['teacher_id']; ?>" <?php if ($test['teacher_id']==$row['teacher_id']) {
                          echo 'selected="selected"';
                        } ?>><?php echo $row['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <h4 class="small font-weight-bold">Description</h4>
                  <div class="mb-4">
                    <textarea name="description"><?php echo $test['description']; ?></textarea>
                  </div>




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