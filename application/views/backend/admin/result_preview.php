<div class="container-fluid">
<?php $result_info = $this->db->get_where('result',array('result_id'=>$result_id))->row_array() ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Result Preview</h1>
          

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Toppers</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <div id="barchart"></div>
                  </div>
                  
                </div>
              </div>

            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Result Analysis</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <div id="piechart"></div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-12">
              <div class="row">
               
               <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Result Analysis</h6>
                </div>
                <div class="card-body">
                  <div class="row" style="padding: 20px;">
                    <div class="col-lg-6">
                      <div style="width: 100%;">Student Details</div>
                      <div class="row">
                        Name : <?php echo $this->db->get_where('student',array('id'=>$result_info['user_id']))->row()->fname.' '.$this->db->get_where('student',array('id'=>$result_info['user_id']))->row()->lname; ?><br>
                        Email : <?php echo $this->db->get_where('student',array('id'=>$result_info['user_id']))->row()->email; ?><br>
                        Number : <?php echo $this->db->get_where('student',array('id'=>$result_info['user_id']))->row()->Mobile; ?>
                      </div>
                    </div>
                    <div class="col-lg-6">

                      Result Detail
                      <div class="row">
                        Mark Obtained : <?php echo $result_info['obtained']; ?><br>
                        Question Attempted : <?php echo $this->db->get_where('response',array('result_id'=>$result_info['result_id']))->num_rows(); ?><br>
                        Mark Obtained : <?php echo $result_info['obtained']; ?><br>
                      </div>
                    </div>

                    
                    <div class="col-lg-12" style="margin-top: 20px;">
                      This detaill is associated with the student how is attempted test all the analytical data is performance of student
                    </div>
                 
                  </div>
                </div>
              </div>
              </div>
                

              </div>
          </div>
          <div class="col-lg-12">
            <?php $questions = $this->db->get_where('quiz_question',array('test_id'=>$result_info['test_id']))->result_array();$count=1; ?>
             <?php foreach ($questions as $row) : ?>
              <div class="row">
               
               <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><span><?php echo 'Question #'.$count++; ?></span><span style="float: right;">Added Marks : <?php echo $row['add_mark']; ?></span><span style="float: right;margin-right: 10px;">Deduct : <?php echo $row['deduct']; ?></span></h6>
                </div>
                <div class="card-body">
                  <p>
                    <?php echo $this->db->get_where('questions',array('question_id'=>$row['question_id']))->row()->question; ?>
                  </p>
                  <div class="row">
                    <?php $options = $this->db->get_where('options',array('question_id'=>$row['question_id']))->result_array();$count1='A'; ?>
                    <?php $response = $this->db->get_where('response',array('question_id'=>$row['question_id'],'result_id'=>$result_id));
                    if($response->num_rows() > 0){
                      $response = $response->row()->option_id;
                    }else{
                      $response = 0;
                    }
                      
                     ?>
                    <?php foreach ($options as $row1): ?>
                      <div class="col-lg-6" style="<?php if($row1['right']=='1'){echo 'background-color: #c4eaff;';} if($row1['option_id']==$response){if($row1['right']=='1'){echo 'background-color: #d0ffc4;';}else{echo 'background-color: #ffc4c4;';}} ?>border-radius: 10px;padding: 20px;">
                        <div class="row">
                          <div class="col-lg-2">
                          <?php echo $count1++; ?>
                        </div>
                        <div class="col-lg-10"><?php echo $row1['option']; ?></div>
                        </div>
                        
                        </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              </div>
               <?php endforeach; ?>  

              </div>
              
        </div>
        <!-- /.container-fluid -->

      </div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
<?php  ?>
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Work', 8],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':300, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Work', 8],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':300, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.BarChart(document.getElementById('barchart'));
  chart.draw(data, options);
}
</script>


