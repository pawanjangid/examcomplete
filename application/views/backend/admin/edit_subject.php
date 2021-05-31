        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           
          </div>

         <?php $subject = $this->db->get_where('subject',array('subject_id'=>$subject_id))->row_array(); ?>

          <!-- Content Row -->



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Subject</h6>
                </div>
                <form class="user" method="post" action="<?php echo base_url() ?>admin/add_subject/update/<?php echo $subject_id; ?>">
                <div class="card-body">
                  <h4 class="small font-weight-bold">Name</h4>
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-user" name="name" value="<?php echo $subject['name']; ?>">
                  </div>
                 <div class=""><input type="submit" class="btn btn-success "  value="Submit"></div>
                </div>
              </form>
              </div>

              <!-- Color System -->


            </div>

            <div class="col-lg-6 mb-4">
              <div class="row">
                <?php $subjects = $this->db->get('subject')->result_array(); ?>
                <?php foreach ($subjects as $row): ?>
                  <div class="col-sm-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                      <div class="card-body">
                        <div class="">
                          <?php echo $row['name']; ?>
                        </div>
                         <div style="margin-top: 15px;margin-left: 20px;">
                           <a href="<?php echo base_url().'admin/edit_subject/'.$row['subject_id']; ?>" ><i class="fas fa-edit" style="color: white"></i></a>
                           <a href="<?php echo base_url().'admin/add_subject/delete/'.$row['subject_id']; ?>" style="margin-left: 20px; color : red;"><i class="fas fa-trash" style="color: #eb0000"></i></a>

                         </div> 
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
               
                

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

        </div>