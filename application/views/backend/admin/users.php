<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">USER DATA</h1>
         
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
              <h6 class="col-sm-10 font-weight-bold text-primary">Users</h6>
              
                <div class="col-sm-2">
              
              <button class="btn btn-primary"><a href="<?php echo base_url(); ?>admin/user_add" style="color: white;text-decoration: none;">Add new User</a></button> 
              
              </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $users = $this->db->get('student',$limit,$offset)->result_array(); ?>
                    <?php foreach ($users as $row) : ?>
                      <tr>
                        <td><?php echo $row['fname'] .' '.$row['lname']; ?></td>
                        <td><?php echo $row['Mobile']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><a href="<?php echo base_url().'admin/user_profile/'.$row['id']; ?>"><button class="btn btn-success">View</button></a></td>
                      </tr>
                    <?php endforeach; ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        
        <div class="col-lg-12">
              <div class="row">
               
               <div class="card shadow mb-4">
                <div>
                  <div>
                    <?php echo $this->session->flashdata('flash_message'); ?>
                  
                  </div>
                </div>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Message</h6>
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