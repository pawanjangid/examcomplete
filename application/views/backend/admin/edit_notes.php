        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           
          </div>

         
      <?php $row = $this->db->get_where('notes',array('notes_id'=>$notes_id))->row_array(); ?>
          <!-- Content Row -->



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Notes</h6>
                </div>
                <form class="user" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/edit_notes/update/<?php echo $notes_id; ?>">
                <div class="card-body">
                  <h4 class="small font-weight-bold">Title</h4>
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-user" name="title" value="<?php echo $row['title']; ?>">
                  </div>
                  <div class="mb-4">
                    <select class="form-control" name="course_id" required="required">
                      <option value="">-Select Course-</option>
                      <?php $course = $this->db->get('courses')->result_array(); ?>
                      <?php foreach ($course as $row1): ?>
                          <option value="<?php echo $row1['course_id']; ?>" <?php if ($row['course_id']==$row1['course_id']) {
                            echo 'selected="selected"';
                          } ?>><?php echo $row1['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                 <div class="mb-4">
                    <select class="form-control" name="teacher_id">
                      <option value="">-select Teacher-</option>
                      <?php $course = $this->db->get('teacher')->result_array(); ?>
                      <?php foreach ($course as $row1): ?>
                          <option value="<?php echo $row1['teacher_id']; ?>" <?php if ($row['teacher_id']==$row1['teacher_id']) {
                            echo 'selected="selected"';
                          } ?>><?php echo $row1['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="md-4">
                    <textarea name="description">
                      <?php echo $row['description']; ?>
                    </textarea>
                  </div>
                  
                 <div class=""><input type="submit" class="btn btn-success"  value="Submit"></div>
                </div>
              </form>
              </div>

              <!-- Color System -->


            </div>

            <div class="col-lg-6 mb-4">
              <div class="row">

                  <div class="col-sm-12 mb-4">
                    <div class="card bg-primary text-white shadow" style="background: linear-gradient(to bottom, #6600ff 0%, #cc6699 100%);">
                      <div class="card-body">
                        <div class="">
                          <?php echo $row['title']; ?>
                        </div>
                        <div>
                          <iframe src="<?php echo $row['file'] ?>" style="width: 100%;"></iframe>
                          
                        </div>
                        <div class="row">
                          <div class="col-lg-6 md-6">
                              <?php echo 'Course : '.$this->db->get_where('courses',array('course_id'=>$row['course_id']))->row()->name; ?>
                          </div>
                          <div class="col-lg-6 md-6">
                              <?php echo 'Topic : '.$this->db->get_where('topics',array('topic_id'=>$row['topic_id']))->row()->name; ?>
                          </div>
                        </div>
                        
                      </div>
                    </div>
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

        </div>