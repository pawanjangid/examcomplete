<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Result For <?php echo $this->db->get_where('quiz',array('test_id'=>$test_id))->row()->name; ?></h1>
         
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Obtained</th>
                      <th>Attempted</th>
                      <th>Correct</th>
                      <th>Wrong</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $users = $this->db->get('result')->result_array(); ?>
                    <?php foreach ($users as $row) : ?>
                      <tr>
                        <?php $user = $this->db->get_where('student',array('id'=>$row['user_id']))->row_array(); ?>
                        <td><?php echo $user['fname'] .' '.$user['lname']; ?></td>
                        <td><?php echo $row['obtained']; ?></td>
                        <td><?php echo $row['total_attempt']; ?></td>
                        <td><?php echo $row['right']; ?></td>
                        <td><?php echo $row['wrong']; ?></td>
                        <td><a href="<?php echo base_url().'admin/result_preview/'.$row['result_id']; ?>"><button class="btn btn-success">Detail</button></a></td>
                      </tr>
                    <?php endforeach; ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

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
        <!-- /.container-fluid -->

      </div>

