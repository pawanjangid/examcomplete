        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
          </div>

         

          <!-- Content Row -->



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-9">

              <!-- Project Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add Student</h6>
                </div>
                <form class="user" method="post" action="<?php echo base_url() ?>admin/user_add/create">
                <div class="card-body">
                  <h4 class="small font-weight-bold">First Name</h4>
                  <div class="mb-4">
                    <input type="text" name="fname" class="form-control form-control-user" placeholder="First Name">
                  </div>
                  <h4 class="small font-weight-bold">Last Name</h4>
                  <div class="mb-4">
                    <input type="text" name="lname" class="form-control form-control-user" placeholder="Lat Name">
                  </div>

                  <h4 class="small font-weight-bold">Mobile</h4>
                  <div class="mb-4">
                    <input type="text" name="Mobile" class="form-control form-control-user" placeholder="Mobile Number">
                  </div>

                  <h4 class="small font-weight-bold">Address</h4>
                  <div class="mb-4">
                    <input type="text" name="address" class="form-control form-control-user" placeholder="Address">
                  </div>

                  <h4 class="small font-weight-bold">Email</h4>
                  <div class="mb-4">
                    <input type="text" name="email" class="form-control form-control-user" placeholder="Address">
                  </div>

                  <h4 class="small font-weight-bold">Password</h4>
                  <div class="mb-4">
                    <input type="text" name="password" class="form-control form-control-user" placeholder="password">
                  </div>
                 <div class=""><input type="submit" class="btn btn-success "  value="Submit"></div>
                </div>
              </form>
              </div>

              


            </div>

            <div class="col-lg-3">
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

        </div>