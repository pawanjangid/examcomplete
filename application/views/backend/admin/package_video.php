<div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-4">
              <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
            </div>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-lg-4">
                  <select class="form-control" onchange="showsubject(this.value)">
                    <option value="">--Select Subject--</option>
                    <?php $subject = $this->db->get_where('subject')->result_array(); ?>
                    <?php foreach ($subject as $row): ?>
                      <option value="<?php echo str_replace(' ', '_', $row['name']) ?>"><?php echo $row['name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <select class="form-control" onchange="showteacher(this.value)">
                    <option value="">--Select Teacher--</option>
                    <?php $teacher = $this->db->get('teacher')->result_array(); ?>
                    <?php foreach ($teacher as $row): ?>
                      <option value="<?php echo str_replace(' ', '_', $row['name']) ?>"><?php echo $row['name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <button onclick="clearall()" class="btn btn-success">Clear Filter</button>
                </div>
              </div>
            </div>
          </div>
          

          <?php $pack_info = $this->db->get_where('package',array('package_id'=>$package_id))->row_array(); ?>
          

          <div class="row">

            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #d84edf;">
                  <h6 class="m-0 font-weight-bold" style="color: white;text-transform: capitalize;">Video List</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="height: 720px; overflow: scroll;">
                  <?php $video = $this->db->order_by('video_id desc')->get_where('videos',array('course_id'=>$pack_info['course_id']))->result_array(); ?>
                      <?php foreach ($video as $row): ?>
                        <?php $check = $this->db->get_where('package_videos',array('package_id'=>$package_id,'video_id'=>$row['video_id']))->num_rows();
                        $subject = $this->db->get_where('subject',array('subject_id'=>$this->db->get_where('topics',array('topic_id'=>$row['topic_id']))->row()->subject_id))->row()->name;
                        $teacher = $this->db->get_where('teacher',array('teacher_id'=>$row['teacher_id']));

                         ?>
                         <?php if(!($check > 0)){
                          ?>

                        <div class="row clearall <?php echo str_replace(' ', '_', $subject); ?> <?php if($teacher->num_rows() >0) echo str_replace(' ', '_', $teacher->row()->name); ?>" style="width: 100%;padding: 5px;background: linear-gradient(to bottom, #ff69f2 0%, #ffffff 100%);margin: 10px;border-radius: 10px;box-shadow: 2px 2px 10px 2px grey;" id="<?php echo $row['video_id']; ?>">
                          <div class="border-bottom-primary" style="width: 100%;">
                            
                            <div class="row">
                              
                              <div class="col-lg-12">
                                <div class="row">
                                <video style="width: 100%;height: 150px;" class="col-lg-12" poster="<?php echo $row['thumbnail']; ?>" controls>
                                    <source src="<?php echo $row['file']; ?>" type="">
                                  </video>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-11" style="padding-left: 20px">
                                  <h4 style="color:black;padding-left: 20px;padding: 10px"> <?php echo $row['title']; ?> </h4>
                                </div>
                                <div class="col-lg-1" style="padding: 10px;">
                                  <button class="btn btn-danger"  onclick="add_question(<?php echo $row['video_id']; ?>,'<?php echo $row['title']; ?>')"><i class="fas fa-plus"></i></button>
                                </div>  
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <?php
                         } ?>
                      <?php endforeach; ?>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #4edf5d;">
                  <h6 class="m-0 font-weight-bold" style="color: white;text-transform: capitalize;">Package Video</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="height: 720px; overflow: scroll;">

                  <form action="<?php echo base_url().'admin/package_video/'.$package_id.'/create'; ?>" method="post">
                    <div id="add_video_package">
                      
                    </div>
                    <input type="submit" value="submit" class="btn btn-success">
                  </form>
                  
                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="row">
                <?php $videos = $this->db->get_where('package_videos',array('package_id'=>$package_id))->result_array(); ?>
                <?php foreach ($videos as $row): ?>
                  <?php $video = $this->db->get_where('videos',array('video_id'=>$row['video_id']))->row_array(); ?>
                 <div class="col-lg-4">
                   <div class="row">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary"><?php echo $video['title']; ?></h6>
                        </div>
                        <div class="card-body">
                          <video style="width: 100%;" poster="<?php echo $video['thumbnail']; ?>" controls>
                            <source src="<?php echo $video['file']; ?>" type="">
                          </video>
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

<script type="text/javascript">
  function add_question(video_id,video_title) {
    var node = document.createElement("div");
    html = '<div class="row" style="margin:5px;padding:5px;border:1px solid green;border-radius:20px;"><div class="col-lg-10" style="padding:10px;color:green;">'+ video_title +'</div><div class="col-lg-2" style="padding:10px;" onclick="remove(this,'+video_id+');"><i class="fas fa-times-circle" style="color:red;"></i></div><input type="hidden" name="video_id[]" value="'+ video_id +'"></div>';
    node.innerHTML = html;
    document.getElementById("add_video_package").appendChild(node);
    document.getElementById(video_id).style.display='none';
  }

function remove(element,video_id) {
  element.parentNode.remove();
  document.getElementById(video_id).style.display = 'block';
}



function showsubject(classvalue) {
  var x = document.getElementsByClassName(classvalue);
  var y = document.getElementsByClassName('clearall');
  for (var k = y.length - 1; k >= 0; k--) {
    y[k].style.display = 'none';
  }

  for (var i = x.length - 1; i >= 0; i--) {
    
      x[i].style.display = 'block';
    
  }
}

function showteacher(teachername) {
  var x = document.getElementsByClassName(teachername);
  var y = document.getElementsByClassName('clearall');
  for (var k = y.length - 1; k >= 0; k--) {
    y[k].style.display = 'none';
  }

  for (var i = x.length - 1; i >= 0; i--) {
    
      x[i].style.display = 'block';
    
  }
}

function clearall() {
  var x = document.getElementsByClassName('clearall');
  for (var i = x.length - 1; i >= 0; i--) {
    x[i].style.display = 'block';
  }
}

</script>