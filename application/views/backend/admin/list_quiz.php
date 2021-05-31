<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
          </div>

          

          <div class="row">

            <?php $test_list = $this->db->order_by('test_id desc')->get('quiz')->result_array(); ?>
            <?php foreach ($test_list as $row): ?>
            <div class="col-lg-4">

              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #4e73df;">
                  <h6 class="m-0 font-weight-bold" style="color: white;text-transform: capitalize;"><?php echo $row['name']; ?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">More Option</div>
                      <a class="dropdown-item" href="<?php echo base_url().'admin/assign_test_question/'.$row['test_id']; ?>">Add Question</a>
                      <a class="dropdown-item" href="<?php echo base_url().'admin/test_detail/'.$row['test_id'] ?>">Manage Test</a>
                      <a class="dropdown-item" href="<?php echo base_url().'admin/edit_quiz/'.$row['test_id']; ?>">Edit Test</a>
                      <a class="dropdown-item" href="<?php echo base_url().'admin/test_result/'.$row['test_id']; ?>">View Result</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url().'admin/add_test/delete/'.$row['test_id']; ?>">Delete</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <div style="text-align: center;">
                    <p><?php echo date('d-m-Y',$row['start_time']).' to '.date('d-m-Y',$row['end_time']); ?></p>
                    <p>Duration : <?php echo $row['duration']; ?> Minute</p>
                    <p>Question : <?php echo $this->db->get_where('quiz_question',array('test_id'=>$row['test_id']))->num_rows(); ?></p>
                    <p><?php echo $row['description']; ?></p>
                  </div>
                  
                </div>
              </div>
            </div>
            <?php endforeach; ?>
                          <div class="col-lg-12">
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