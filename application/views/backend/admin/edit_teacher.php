        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           
          </div>

         

          <!-- Content Row -->
          
<?php $row = $this->db->get_where('teacher',array('teacher_id'=>$teacher_id))->row_array(); ?>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Teacher</h6>
                </div>
                <form class="user" method="post" action="<?php echo base_url() ?>admin/teachers/update/<?php echo $teacher_id; ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <h4 class="small font-weight-bold">Name</h4>
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-user" name="name" value="<?php echo $row['name']; ?>">
                  </div>
                  <div class="md-4">
                    <img src="<?php echo base_url().'uploads/teachers/'.$row['image']; ?>" style="width: 100%;">
                  </div>
                  <h4 class="small font-weight-bold">Photo</h4>
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
                <?php $teacher = $this->db->get('teacher')->result_array(); ?>
                <?php foreach ($teacher as $row): ?>
                  <div class="col-sm-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                      <div class="card-body">
                        <div class="">
                          <img src="<?php echo base_url().'uploads/teachers/'.$row['image']; ?>" style="max-width: 50px;border-radius: 50%;">
                          <?php echo $row['name']; ?>
                        </div>
                         <div style="margin-top: 15px;margin-left: 20px;">
                           <a href="<?php echo base_url().'admin/edit_teacher/'.$row['teacher_id']; ?>" ><i class="fas fa-edit" style="color: white"></i></a>
                           <a href="<?php echo base_url().'admin/teachers/delete/'.$row['teacher_id']; ?>" style="margin-left: 20px; color : red;"><i class="fas fa-trash" style="color: #ff5af3"></i></a>

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