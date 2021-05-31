<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
          </div>

          

          <div class="row">

            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #d84edf;">
                  <h6 class="m-0 font-weight-bold" style="color: white;text-transform: capitalize;">Question List</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="height: 720px; overflow: scroll;">
                  <?php $questions = $this->db->order_by('question_id desc')->get('questions')->result_array(); ?>
                      <?php foreach ($questions as $row): ?>
                        <div class="row" style="width: 100%;padding: 5px;" id="<?php echo $row['question_id']; ?>">
                          <div class="border-bottom-primary" style="width: 100%;">
                            
                            <div class="row">
                              <div class="col-lg-2">
                                <?php echo $row['question_id']; ?>
                              </div>
                              <div class="col-lg-8">
                                  <?php echo $row['question']; ?>
                              </div>
                              <div class="col-lg-2">
                                <button class="btn btn-info" onclick="add_question(<?php echo $row['question_id']; ?>)">Add</button>
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
                  <h6 class="m-0 font-weight-bold" style="color: white;text-transform: capitalize;">Test Questions</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <form action="<?php echo base_url().'admin/assign_question/'.$test_id; ?>" method="post">
                    <div id="add_question_test">
                      
                    </div>
                    <input type="submit" value="submit" class="btn btn-success">
                  </form>
                  
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
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
              </div>
              </div>
                

              </div>
          </div>



        </div>
<?php $test_id = 2; ?>
<script type="text/javascript">
  function add_question(question_id) {
    var node = document.createElement("div");
    html = '<div class="row" style="margin-top:5px;"><div class="col-lg-2">'+ question_id +'</div><input type="hidden" name="question_id[]" value="'+ question_id +'">';
    html = html+'<div class="col-lg-4 md-2"> <input type="hidden" name="test_id"  value="'+ <?php echo $test_id; ?> +'"><input type="text" name="add_mark[]" class="form-control" value="1"></div><div class="col-lg-4 md-2">';
    html = html+' <input type="text" class="form-control" name="deduct[]" value="0"></div></div>';
    node.innerHTML = html;
    document.getElementById("add_question_test").appendChild(node);
    document.getElementById(question_id).remove();
  }

</script>