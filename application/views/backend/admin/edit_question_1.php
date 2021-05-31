        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title; ?></h1>
           <?php $course = $this->db->get_where('courses',array('course_id'=>$course_id))->row_array(); ?>
          </div>

         
<?php 

if (!$subject_id) {
  $subject_id = 0;
}

$question = $this->db->get_where('questions',array('question_id'=>$question_id))->row_array();

 ?>



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-9">

              <!-- Project Card Example -->
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Question</h6>
                </div>
                <form class="user" method="post" action="<?php echo base_url() ?>admin/edit_question_1/<?php echo $question_id; ?>/update">
                <div class="card-body">
                  <h4 class="small font-weight-bold">Subject</h4>
                  <div class="mb-4">
                    <select name="subject_id" class="form-control" required="required">
                      <?php $subject = $this->db->get('subject')->result_array(); ?>
                      <?php foreach ($subject as $row): ?>
                        <option value="<?php echo $row['subject_id'] ?>"   <?php if ($question['subject_id'] == $row['subject_id']) {
                          echo 'selected="selected"';
                        } ?> ><?php echo $row['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <h4 class="small font-weight-bold">Question</h4>
                  <div class="mb-4">
                    <textarea name="question"><?php echo $question['question']; ?></textarea>
                  </div>
                  <h4 class="small font-weight-bold">Solution</h4>
                  <div class="mb-4">
                    <textarea name="solution"><?php echo $question['solution']; ?></textarea>
                  </div>
                  <?php $option = $this->db->get_where('options',array('question_id'=>$question_id))->result_array();$count=1; ?>
                  <?php foreach ($option as $row) { 
                    ?>

                    <input type="hidden" name="option_id[]" value="<?php echo $row['option_id']; ?>">
                    <h4 class="small font-weight-bold">Option #<?php echo $count; ?>
                      <input type="radio" name="right" value="<?php echo $count; ?>" <?php if ($row['right']==1) {
                        echo 'checked="checked"';
                      } ?>>
                    </h4>
                    <div class="mb-4">

                      <textarea name="option[]"><?php echo $row['option']; ?></textarea>
                    </div>


                    <?php 
                    $count++;
                  } ?>




                 <div class=""><input type="submit" class="btn btn-success "  value="Submit"></div>
                </div>
              </form>
              </div>

              <!-- Color System -->


            </div>

            <div class="col-lg-3">
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