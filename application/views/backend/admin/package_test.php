<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
          </div>
<?php $pack_info = $this->db->get_where('package',array('package_id'=>$package_id))->row_array(); ?>
          

          <div class="row">

            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #d84edf;">
                  <h6 class="m-0 font-weight-bold" style="color: white;text-transform: capitalize;">Test List</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="height: 720px; overflow: scroll;">
                  <?php $tests = $this->db->order_by('test_id desc')->get_where('quiz',array('course_id'=>$pack_info['course_id']))->result_array(); ?>
                      <?php foreach ($tests as $row): ?>
                        <?php $check = $this->db->get_where('package_tests',array('package_id'=>$package_id,'test_id'=>$row['test_id']))->num_rows(); ?>
                        <div class="row" style="width: 100%;padding: 5px;<?php if($check > 0) echo 'display:none;'; ?>" id="<?php echo $row['test_id']; ?>">
                          <div class="border-bottom-primary" style="width: 100%;">
                            
                            <div class="row">
                              <div class="col-lg-2">
                                <?php echo $row['test_id']; ?>
                              </div>
                              <div class="col-lg-8">
                                <div>
                                <div style="width: 100%;" >
                                  </div>
                                  <?php echo $row['name']; ?>
                              </div>
                                    <source src="<?php echo $row['description']; ?>" type="">
                                  </div>
                                
                              <div class="col-lg-2">
                                <button class="btn btn-info" onclick="add_question(<?php echo $row['test_id']; ?>,'<?php echo $row['name']; ?>')">Add</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #4edf5d;">
                  <h6 class="m-0 font-weight-bold" style="color: white;text-transform: capitalize;">Package Test</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <form action="<?php echo base_url().'admin/package_test/'.$package_id.'/create'; ?>" method="post">
                    <div id="add_video_package">
                      
                    </div>
                    <input type="submit" value="submit" class="btn btn-success">
                  </form>
                  
                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="row">
                <?php $videos = $this->db->get_where('package_tests',array('package_id'=>$package_id))->result_array(); ?>
                <?php foreach ($videos as $row): ?>
                  <?php $test = $this->db->get_where('quiz',array('test_id'=>$row['test_id']))->row_array(); ?>
                 <div class="col-lg-4">
                   <div class="row">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary"><?php echo $test['title']; ?></h6>
                        </div>
                        <div class="card-body">
                          <video style="width: 100%;" poster="<?php echo $test['description']; ?>" controls>
                            <source src="<?php echo $test['duration']; ?>" type="">
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
  function add_question(test_id,title) {
    var node = document.createElement("div");
    html = '<div class="row" style="margin:5px;padding:5px;border:1px solid green;border-radius:20px;"><div class="col-lg-10" style="padding:10px;color:green;">'+ title +'</div><div class="col-lg-2" style="padding:10px;" onclick="remove(this,'+test_id+');"><i class="fas fa-times-circle" style="color:red;"></i></div><input type="hidden" name="test_id[]" value="'+ test_id +'"></div>';
    node.innerHTML = html;
    document.getElementById("add_video_package").appendChild(node);
    document.getElementById(test_id).style.display='none';
  }

function remove(element,test_id) {
  element.parentNode.remove();
  document.getElementById(test_id).style.display = 'block';
}


</script>