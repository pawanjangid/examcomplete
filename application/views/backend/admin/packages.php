<div class="container-fluid">

          <!-- Page Heading -->
          <div class="row" style="margin-top: 20px;">
            <div class="col-lg-6" style="padding: 20px;">Package</div>
            <div class="col-lg-6" style="padding: 20px;"><a href="<?php echo base_url().'admin/add_package'; ?>" style="float: right;"><button class="btn btn-success">Add New Package</button></a></div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Package</h6>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Course</th>
                      <th>Amount</th>
                      <th>Expiry Date</th>
                      <th>Add New</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $pack = $this->db->get('package',$limit,$offset)->result_array(); ?>
                    <?php foreach ($pack as $row) : ?>
                      <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $this->db->get_where('courses',array('course_id'=>$row['course_id']))->row()->name; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo date('d-m-Y',$row['expiry']); ?></td>
                        <td>
                          <a href="<?php echo base_url().'admin/package_video/'.$row['package_id']; ?>" title="Add Video">
                            <i class="fas fa-video" style="color: green;"></i>
                          </a>
                          <a href="<?php echo base_url().'admin/package_test/'.$row['package_id']; ?>" title="Add Test">
                            <i class="fas fa-newspaper" style="color:voilet;"></i>
                          </a>
                          <a href="<?php echo base_url().'admin/package_notes/'.$row['package_id']; ?>" title="Add Study Material">
                            <i class="fas fa-paste" style="color:aqua;"></i>
                          </a>


                      </td>
                      <td>
                          <a href="<?php echo base_url().'admin/package_video/'.$row['package_id']; ?>" title="Edit Package">
                            <i class="fas fa-edit" style="color: black;"></i>
                          </a>
                          <a href="<?php echo base_url().'admin/package_test/'.$row['package_id']; ?>" title="Delete Package">
                            <i class="fas fa-trash" style="color:red;"></i>
                          </a>
                      </td>
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