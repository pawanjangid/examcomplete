        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           
          </div>

          
          <!-- Content Row -->
            <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Questions (total)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->get_where('quiz_question',array('test_id'=>$test_id))->num_rows(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calculator fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Maximum Marks</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        <?php 

                        $this->db->select_sum('add_mark');
                        echo $this->db->get_where('quiz_question',array('test_id'=>$test_id))->row()->add_mark;
                         ?>


                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Duration (in Min)</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $this->db->get_where('quiz',array('test_id'=>$test_id))->row()->duration; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 52%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Starting Time</div>
                      <div class="mb-0 font-weight-bold text-gray-800"><?php echo date('d-m-Y',$this->db->get_where('quiz',array('test_id'=>$test_id))->row()->start_time); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php $quiz_question = $this->db->get_where('quiz_question',array('test_id'=>$test_id))->result_array(); ?>
            <?php foreach ($quiz_question as $row): ?>
              <div class="col-lg-12">

              <!-- Dropdown Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['question_id']; ?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-12">
                       <?php echo $this->db->get_where('questions',array('question_id'=>$row['question_id']))->row()->question;


                         ?>
                        <div class="row">
                          <?php $options = $this->db->get_where('options',array('question_id'=>$row['question_id']))->result_array();
                          $count = 'A';
                           ?>
                          <?php foreach ($options as $row1): ?>
                          <div class="col-lg-6 md-4" style="<?php if ($row1['right']=='1') {
                            echo 'background-color: #75ff83';
                          } ?>; border-radius: 10px;">

                            <?php echo $count++; ?>. <?php echo $row1['option']; ?>
                          </div>  
                          <?php endforeach; ?>
                          
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            


        </div>