        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           
          </div>

         

          <!-- Content Row -->



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Topics</h6>
                </div>
                <form class="user" method="post" action="<?php echo base_url() ?>admin/add_topic/<?php echo $subject_id; ?>/create">
                <div class="card-body">
                  <h4 class="small font-weight-bold">Name</h4>
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-user" name="name">
                  </div>
                 <div class=""><input type="submit" class="btn btn-success "  value="Submit"></div>
                </div>
              </form>
              </div>

              <!-- Color System -->


            </div>

            <div class="col-lg-6 mb-4">
              <div class="row">
                <?php $topics = $this->db->get_where('topics',array('subject_id'=>$subject_id))->result_array(); ?>
                <?php foreach ($topics as $row): ?>
                  <div class="col-sm-6 mb-4">
                    <div class="card bg-primary text-white shadow" style="background: linear-gradient(to bottom, #6600ff 0%, #cc6699 100%);">
                      <div class="card-body">
                        <div class="">
                          <?php echo $row['name']; ?>
                        </div>
                         <div style="margin-top: 15px;margin-left: 20px;">
                           <a href="<?php echo base_url().'admin/edit_topic/'.$row['topic_id']; ?>" ><i class="fas fa-edit" style="color: white" title="Edit Topic"></i></a>
                           <a href="<?php echo base_url().'admin/edit_topic/delete/'.$row['topic_id']; ?>" style="margin-left: 20px; color : red;" title="Delete Topic"><i class="fas fa-trash" style="color: #eb0000"></i></a>
                           <a href="<?php echo base_url().'admin/video/'.$row['topic_id']; ?>" style="margin-left: 20px; color : red;" title="Add Videos"><i class="fas fa-video" style="color: #00ff08" ></i></a>
                           <a href="<?php echo base_url().'admin/notes/'.$row['topic_id']; ?>" style="margin-left: 20px; color : red;" title="Add Notes"><i class="fas fa-sticky-note" style="color: #00ffee;"></i></a>
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