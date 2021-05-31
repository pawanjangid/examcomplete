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
                  <h6 class="m-0 font-weight-bold text-primary">Demo Videos</h6>
                </div>
                <form class="user" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/demo_video/create">
                <div class="card-body">
                  <h4 class="small font-weight-bold">Title</h4>
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-user" name="title">
                  </div>
                  <h4 class="small font-weight-bold">Sub Title</h4>
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-user" name="subtitle">
                  </div>
                  <h4 class="small font-weight-bold">Teacher</h4>
                  <div class="mb-4">
                    <select class="form-control" name="teacher" >
                      <option value="">-Select Teacher-</option>
                      <?php $course = $this->db->get('teacher')->result_array(); ?>
                      <?php foreach ($course as $row): ?>
                          <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="mb-4">
                    <label>Thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail">
                  </div>
                  
                  <div class="mb-4">
                    <select class="form-control" name="upload_type" onchange="select_method(this.value);">
                      <option value="">-Select Upload Method-</option>
                      <option value="Youtube">Youtube</option>
                      <option value="upload">Upload Video</option>
                    </select>
                  </div>
                  <div class="mb-4" id="youtube" style="display:none">
                    <label>Youtube Link</label>
                    <input type="text" class="form-control" name="youtube_link">
                  </div>
                  <div class="mb-4"  id="upload" style="display:none">
                    <label>Video File</label>
                    <input type="file" class="form-control" name="file">
                  </div>
                  
                  <div class="md-4">
                    <textarea name="description">
                      
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
                <?php $videos = $this->db->get('demo_video')->result_array(); ?>
                <?php foreach ($videos as $row): ?>
                  <div class="col-sm-12 mb-4">
                    <div class="card bg-primary text-white shadow" style="background: linear-gradient(to bottom, #6600ff 0%, #cc6699 100%);">
                      <div class="card-body">
                        <div class="">
                          <?php echo $row['title']; ?>
                        </div>
                        <div>
                            <?php if($row['method']=='youtube'){ ?>
                            <iframe width="100%" src="<?php echo $row['file']; ?>"></iframe>
                            <?php }else{ ?>
                          <video style="width: 100%;" poster="<?php echo $row['thumbnail']; ?>" controls>
                            <source src="<?php echo $row['file']; ?>" type="">
                          </video>
                          <?php } ?>
                        </div>
                         <div style="margin-top: 15px;margin-left: 20px;">
                          
                           <a href="<?php echo base_url().'admin/demo_video/delete/'.$row['video_id']; ?>" style="margin-left: 20px; color : red;"><i class="fas fa-trash" style="color: #eb0000"></i></a>
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
        
        
        
    <script>
        function select_method(value){
            if(value=='Youtube'){
                document.getElementById('youtube').style.display = 'block';
                document.getElementById('upload').style.display = 'none';
            }else{
                document.getElementById('youtube').style.display = 'none';
                document.getElementById('upload').style.display = 'block';
            }
        }
    </script> 