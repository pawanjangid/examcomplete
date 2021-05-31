<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">SELL DATA</h1>
         
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Packages</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Package</th>
                      <th>Amount</th>
                      <th>Txn Id</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $orders = $this->db->get('orders',$limit,$offset)->result_array(); ?>
                    <?php foreach ($orders as $row) : ?>
			<?php $user = $this->db->get_where('student',array('user_id'=>$row['user_id']))->row_array();  ?>
                      <tr>
                        <td><?php echo $user['fname'] .' '.$user['lname']; ?></td>
                        <td><?php echo $row['filter']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['txn_id']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        
                      </tr>
                    <?php endforeach; ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>