<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Question List</h1>
         
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Question</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="50%">Question</th>
                      <th width="20%">Question Type</th>
                      <th width="10%">Options</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $question = $this->db->get('questions',$limit,$offset)->result_array(); ?>
                    <?php foreach ($question as $row) : ?>
                      <tr>
                        <td><?php echo $row['question'] ; ?></td>
                        <td><?php if ($row['type']=='1') {
                          echo 'Single Choice Single Answer';
                        } ?></td>
                        <td><?php echo $this->db->get_where('options',array('question_id'=>$row['question_id']))->num_rows(); ?></td>
                        <td>

                          <div class="row">
                            <div class="col-lg-5" style="margin:2px;">
                              <a href="<?php echo base_url().'admin/edit_question_1/'.$row['question_id']; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                            </div>
                            <div class="col-lg-5" style="margin:2px;">
                              <a href="<?php echo base_url().'admin/delete_question_1/'.$row['question_id']; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                            </div>
                          </div>
                          
                          



                        </td>
                      </tr>


                      
                    <?php endforeach; ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>