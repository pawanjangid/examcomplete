<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }



    public function index()
    {
    	echo 'hello';
    }

   	public function login($value='')
   	{
   		$mobile = $this->input->post('mobile');
   		$otp = $this->input->post('otp');
   		$check = $this->db->get_where('student',array('mobile'=>$mobile));
   		if ($check->num_rows() > 0) {
   			$mobile = $mobile;
			$apiKey = urlencode('tAE4qmJH12E-vaSN6uvHkNH5s1j9CnI87quAb9C4hK	');
			$numbers = array($mobile);
// 			$sender = urlencode('SATYAM');
// 			$message = rawurlencode('Use OTP '.$otp.' to login your account on SATYAM STUDY POINT');
// 			$numbers = implode(',', $numbers);
// 			$data3 = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
// 			$ch = curl_init('http://api.textlocal.in/send/');
// 			curl_setopt($ch, CURLOPT_POST, true);
// 			curl_setopt($ch, CURLOPT_POSTFIELDS, $data3);
// 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 			$response = curl_exec($ch);
   			$data = $check->row_array();
   			echo json_encode(array('status'=>'1','message'=>'Login Success','Data'=>$data));
   		}else{
   			$mobile = $mobile;
			$apiKey = urlencode('tAE4qmJH12E-vaSN6uvHkNH5s1j9CnI87quAb9C4hK	');
			$numbers = array($mobile);
// 			$sender = urlencode('SATYAM');
// 			$message = rawurlencode('Use OTP '.$otp.' to login your account on SATYAM STUDY POINT');
// 			$numbers = implode(',', $numbers);
// 			$data3 = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
// 			$ch = curl_init('http://api.textlocal.in/send/');
// 			curl_setopt($ch, CURLOPT_POST, true);
// 			curl_setopt($ch, CURLOPT_POSTFIELDS, $data3);
// 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 			$response = curl_exec($ch);
			$data1['profile'] = '0';
			$data1['mobile'] = $mobile;
			$this->db->insert('student',$data1);
			$insert_id=$this->db->insert_id();
			$data = $this->db->get_where('student',array('id'=>$insert_id))->row_array();
   			echo json_encode(array('status'=>'1','message'=>'Send to register','Data'=>$data));
   		}

   	}

   	public function profile($value='')
   	{
   		$user_id = $this->input->post('user_id');
   		$check = $this->db->get_where('student',array('id'=>$user_id));
   		if($check->num_rows() > 0){
   			$data['fname'] = $this->input->post('fname');
	   		$data['lname'] = $this->input->post('lname');
	   		$data['email'] = $this->input->post('email');
	   		$data['address'] = $this->input->post('address');
	   		$data['address_status'] = '1';
	   		$data['profile'] = '1';
	   		$this->db->where('id',$user_id);
	   		$this->db->update('student',$data);
	   		$data2 = $this->db->get_where('student',array('id'=>$user_id))->row_array();
	   		echo json_encode(array('status'=>'1','message'=>'successfully added','data'=>$data2));
   		}else{
   			echo json_encode(array('status'=>'0','message'=>'user not valid'));
   		}
   	}

   	public function address($value='')
   	{
   		$user_id = $this->input->post('user_id');
   		$check = $this->db->get_where('student',array('id'=>$user_id));
   		if ($check->num_rows() > 0) {
   			$data['address'] = $this->input->post('address');
   			$data['address_status'] = '1';
   			$this->db->where('id',$user_id);
   			$this->db->update('student',$data);
   			$data2 = $this->db->get_where('student',array('id'=>$user_id))->row_array();
   			echo json_encode(array('status'=>'1','message'=>'successfully added','data'=>$data2));
   		}else{
   			echo json_encode(array('status'=>'0','message'=>'user not valid'));
   		}
   	}



   	public function sendsms($value='')
   	{
   		$mobile = '8875210882';
			$apiKey = urlencode('tAE4qmJH12E-vaSN6uvHkNH5s1j9CnI87quAb9C4hK');
			$numbers = array($mobile);
			$sender = urlencode('SATYAM');
			$otp = '123456';
			$message = rawurlencode('Use OTP '.$otp.' to login your account on SATYAM STUDY POINT');
			$numbers = implode(',', $numbers);
			$data3 = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
			$ch = curl_init('http://api.textlocal.in/send/');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data3);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			echo $response;
   	}

   	public function courses($value='')
   	{
   		$courses = $this->db->get('courses');
   		if($courses->num_rows()){
   			$courses = $courses->result_array();
   			$list = array();
   			foreach ($courses as $row) {
   				$row['icon'] = base_url().'uploads/courses/'.$row['icon'];
   				array_push($list, $row);
   			}
   			echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$list));
   		}else{
   			echo json_encode(array('status'=>'0','message'=>'failed'));
   		}
   	}


   	public function test_list()
   	{
   		$quiz = $this->db->get('quiz')->result_array();
   		$output = array();
   		foreach ($quiz as $row) {
   			date_default_timezone_set('Asia/Calcutta');
   			$time_now = time();
   			if ($time_now > $row['start_time']) {
   				$row['start_test'] = '1';
   				$row['remaining_time'] = '0';
   			}else{
   				$row['start_test'] = '0';
   				$row['remaining_time'] = strval($row['start_time']-$time_now);
   			}
   			$row['start_time'] = date('d-m-Y h:i:s',$row['start_time']);
   			$row['end_time']	= date('d-m-Y h:i:s',$row['end_time']);
   			$row['no_question'] = strval($this->db->get_where('quiz_question',array('test_id'=>$row['test_id']))->num_rows());
   			$this->db->select_sum('add_mark');
            $row['max_marks'] = $this->db->get_where('quiz_question',array('test_id'=>$row['test_id']))->row()->add_mark;
            if($row['teacher_id']){
   					$teacher = $this->db->get_where('teacher',array('teacher_id'=>$row['teacher_id']))->row_array();
   					$row['teacher_name'] = $teacher['name'];
   					$row['teacher_image'] = base_url().'uploads/teachers/'.$teacher['image'];
   				}else{
   					$row['teacher_name'] = 'SATYAM STUDY POINT';
   					$row['teacher_image'] = base_url().'uploads/teachers/'.$teacher['image'];
   				}
   			array_push($output, $row);
   		}
   		if ($quiz) {
   			echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$output));
   		}else{
   			echo json_encode(array('status'=>'0','message'=>'failed'));
   		}
   	}
   	
   	public function test()
   	{
   		$test_id=$this->input->post('test_id');
   		$user_id = $this->input->post('user_id');
   		$data['test_id'] = $test_id;
   		$data['user_id'] = $user_id;
   		$data['time']	 = time();

   		$attempt = $this->db->get_where('quiz',array('test_id'=>$test_id))->row()->attempt;
   		$attempted = $this->db->get_where('attempt',array('test_id'=>$test_id))->num_rows();
   		if($attempt > $attempted){
	   		$this->db->insert('attempt',$data);
	   		$test = $this->db->get_where('quiz',array('test_id'=>$test_id));
	   		$question_list = array();
	   		$output = array();
	   		if ($test->num_rows() > 0) {
	   			$duration = $test->row()->duration;
	   			$question = $this->db->get_where('quiz_question',array('test_id'=>$test_id))->result_array();
	   			foreach ($question as $row) {
	   				$q = $this->db->get_where('questions',array('question_id'=>$row['question_id']))->row_array();
	   				$question_list['question_type'] = '1';
	   				$question_list['question'] = $q['question'];
	   				$question_list['solution'] = $q['solution'];
	   				$question_list['options'] = $this->db->get_where('options',array('question_id'=>$row['question_id']))->result_array();

	   				array_push($output, $question_list);
	   			}
	   			date_default_timezone_set('Asia/Calcutta');
	   			echo json_encode(array('status'=>'1','message'=>'successfully','current_time'=>date('Y-m-d H:i:s',time()),'end_time'=>date('Y-m-d H:i:s',time()+$duration*60),'data'=>$output));
	   		}else{
	   			echo json_encode(array('status'=>'0','message'=>'no test associated with this id'));
	   		}
   		}else{
   			echo json_encode(array('status'=>'0','message'=>'Your attempt for this Test is over'));
   		}


   	}

   	function result()
   	{
   		$user_id = $this->input->post('user_id');
   		$test_id = $this->input->post('test_id');
   		$response = $this->input->post('resp');
   		$resp = explode(',', $response);
   		$total_obtain = 0;
   		$right = 0;
   		$wrong = 0;
   		$total_attempt = 0;
   		
   		foreach ($resp as $row) {
   			$re = explode('-', $row);
   			
   			$check = $this->db->get_where('options',array('option_id'=>$re[1]))->row()->right;
   			if ($check=='1') {
   				$add = $this->db->get_where('quiz_question',array('question_id'=>$re[0]))->row()->add_mark;
   				$total_obtain = $total_obtain+$add;
   				$right = $right+1;
   			}else{
   				 $deduct = $this->db->get_where('quiz_question',array('question_id'=>$re[0]))->row()->deduct;
   				$total_obtain = $total_obtain-$deduct;
   				$wrong = $wrong+1;
   			}
   			$total_attempt = $total_attempt+1;
   		}
		$data1['test_id']  = $test_id;
		$data1['obtained']  = $total_obtain;
		$data1['total_attempt'] = $total_attempt;
		$data1['right'] = $right;
		$data1['wrong'] = $wrong;
		$data1['user_id'] = $user_id;
		$data1['time'] = time();
		$this->db->insert('result',$data1);
		$result_id = $this->db->insert_id();

		foreach ($resp as $row) {
   			$re = explode('-', $row);
   			$data['question_id'] = $re[0];
   			$data['option_id'] = $re[1];
   			$data['user_id'] = $user_id;
   			$data['test_id'] = $test_id;
   			$data['time'] = time();
	   		$data['result_id'] = $result_id;
			$this->db->insert('response',$data);
   		}

		echo json_encode(array('status'=>'1','message'=>'Result Inserted Successfully','result_id'=>$result_id));
   	}

   	function result_list()
   	{
   		$user_id = $this->input->post('user_id');
   		$result = $this->db->get_where('result',array('user_id'=>$user_id));
   		$result_list = array();
   		if ($result->num_rows() > 0) {
   			$result = $result->result_array();
   			foreach ($result as $row) {
   				$row['test_name'] = $this->db->get_where('quiz',array('test_id'=>$row['test_id']))->row()->name;
   				$row['questions'] = strval($this->db->get_where('quiz_question',array('test_id'=>$row['test_id']))->num_rows());
   				$row['time'] = date('d-m-Y h:i:s',$row['time']);
   				$this->db->select_sum('add_mark');
   				$total = $this->db->get_where('quiz_question',array('test_id'=>$row['test_id']))->row()->add_mark;
   				$row['maximum_mark'] = $total;
   				array_push($result_list,$row);
   			}
   			echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$result_list));
   		}
   	}

   	function result_preview()
   	{
   		$result_id   = $this->input->post('result_id');
   		$result_info = $this->db->get_where('result',array('result_id'=>$result_id))->row_array();
   		$test_detail  = $this->db->get_where('quiz',array('test_id'=>$result_info['test_id']))->row_array();
   		$q = $this->db->get_where('quiz_question',array('test_id'=>$result_info['test_id']))->result_array();
   		$question = array();
   		$q_result = array();
   		foreach ($q as $row) {
   			$q_info = $this->db->get_where('questions',array('question_id'=>$row['question_id']))->row_array();
   			$question['question'] = $q_info['question'];
   			$question['solution'] = $q_info['solution'];
   			$check = $this->db->get_where('response',array('result_id'=>$result_id,'question_id'=>$row['question_id']));
   			if($check->num_rows()>0){
   				$response = $check->row()->option_id;
   			}else{
   				$response = 0;
   			}
   			$question['correct_option_id'] = $response;
   			$question['options'] = $this->db->get_where('options',array('question_id'=>$row['question_id']))->result_array();
   			
   			array_push($q_result, $question);
   		}
   		echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$q_result));
   	}



   function package_course()
   {
      $course = $this->input->post('course_id');
      $user_id = $this->input->post('user_id');
      $output = array();
      $output1 = array();
      $output2 = array();
      $output3 = array();
      $output4 = array();
         $package1 = $this->db->order_by('package_id desc')->get_where('package',array('course_id'=>$course,'filter'=>'Complete'));
         if ($package1->num_rows() > 0) {
            $package1=$package1->result_array();
            foreach ($package1 as $row) {
               $row['videos'] = strval($this->db->get_where('package_videos',array('package_id'=>$row['package_id']))->num_rows());
               $row['tests'] = strval($this->db->get_where('package_tests',array('package_id'=>$row['package_id']))->num_rows());
               $row['notes'] = strval($this->db->get_where('package_notes',array('package_id'=>$row['package_id']))->num_rows());
               $check = $this->db->get_where('orders',array('user_id'=>$user_id,'package_id'=>$row['package_id']));
               if($check->num_rows() > 0){
                  $row['status'] = '1';
               }else{
                  $row['status'] = '0';
               }
               array_push($output1, $row);
            }
            
         }
         $package2 = $this->db->order_by('package_id desc')->get_where('package',array('course_id'=>$course,'filter'=>'Subjectwise'));
         if ($package2->num_rows() > 0) {
            $package2=$package2->result_array();
               foreach ($package2 as $row) {
                  $row['videos'] = strval($this->db->get_where('package_videos',array('package_id'=>$row['package_id']))->num_rows());
                  $row['tests'] = strval($this->db->get_where('package_tests',array('package_id'=>$row['package_id']))->num_rows());
                  $row['notes'] = strval($this->db->get_where('package_notes',array('package_id'=>$row['package_id']))->num_rows());
                  $check = $this->db->get_where('orders',array('user_id'=>$user_id,'package_id'=>$row['package_id']));
                  if($check->num_rows() > 0){
                     $row['status'] = '1';
                  }else{
                     $row['status'] = '0';
                  }
                  array_push($output2, $row);
               }
            
         }
         $package3 = $this->db->order_by('package_id desc')->get_where('package',array('course_id'=>$course,'filter'=>'TeacherWise'));
         if ($package3->num_rows() > 0) {
            $package3=$package3->result_array();
               foreach ($package3 as $row) {
                  $row['videos'] = strval($this->db->get_where('package_videos',array('package_id'=>$row['package_id']))->num_rows());
                  $row['tests'] = strval($this->db->get_where('package_tests',array('package_id'=>$row['package_id']))->num_rows());
                  $row['notes'] = strval($this->db->get_where('package_notes',array('package_id'=>$row['package_id']))->num_rows());
                  $check = $this->db->get_where('orders',array('user_id'=>$user_id,'package_id'=>$row['package_id']));
                  if($check->num_rows() > 0){
                     $row['status'] = '1';
                  }else{
                     $row['status'] = '0';
                  }
                  array_push($output3, $row);
               }
            
         }
         $package4 = $this->db->order_by('package_id desc')->get_where('package',array('course_id'=>$course,'filter'=>'TopicWise'));
         if ($package4->num_rows() > 0) {
            $package4=$package4->result_array();
               foreach ($package4 as $row) {
                  $row['videos'] = strval($this->db->get_where('package_videos',array('package_id'=>$row['package_id']))->num_rows());
                  $row['tests'] = strval($this->db->get_where('package_tests',array('package_id'=>$row['package_id']))->num_rows());
                  $row['notes'] = strval($this->db->get_where('package_notes',array('package_id'=>$row['package_id']))->num_rows());
                  $check = $this->db->get_where('orders',array('user_id'=>$user_id,'package_id'=>$row['package_id']));
               if($check->num_rows() > 0){
                  $row['status'] = '1';
               }else{
                  $row['status'] = '0';
               }
                  array_push($output4, $row);
               }
            
         }

         if ((sizeof($output1)>0)||(sizeof($output2)>0)||(sizeof($output3)>0)||(sizeof($output4)>0)) {
            $output['complete'] = $output1;
            $output['Subjectwise'] = $output2;
            $output['TeacherWise'] = $output3;
            $output['TopicWise'] = $output4;
            echo json_encode(array('status'=>'1','message'=>'Successfully','data'=>$output));
         }else{
            echo json_encode(array('status'=>'0','message'=>'no data found'));
         }

   }

   function package()
   {
     
      $output = array();
         $package = $this->db->order_by('package_id desc')->get('package',10)->result_array();
         if (sizeof($package) > 0) {
            foreach ($package as $row) {
               $row['videos'] = strval($this->db->get_where('package_videos',array('package_id'=>$row['package_id']))->num_rows());
               $row['tests'] = strval($this->db->get_where('package_tests',array('package_id'=>$row['package_id']))->num_rows());
               $row['notes'] = strval($this->db->get_where('package_notes',array('package_id'=>$row['package_id']))->num_rows());
               array_push($output, $row);
            }
            echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$output));
         }else{
            echo json_encode(array('status'=>'0','message'=>'failed'));
         }
   }

   function videos(){
      $package_id = $this->input->post('package_id');
      $user_id  = $this->input->post('user_id');
      $videos = array();
      $check = $this->db->get_where('orders',array('package_id'=>$package_id,'user_id'=>$user_id));
      if ($check->num_rows() > 0) {
         $video_ids = $this->db->get_where('package_videos',array('package_id'=>$package_id));
         if ($video_ids->num_rows() > 0) {
            $video_ids = $video_ids->result_array();
            foreach ($video_ids as $row) {
               $video = $this->db->get_where('videos',array('video_id'=>$row['video_id']))->row_array();
               array_push($videos, $video);
            }
            echo json_encode(array('status'=>'1','message'=>'Successfully','data'=>$videos));
         }else{
            echo json_encode(array('status'=>'0','message'=>'failed'));
         }
      }else{
         echo json_encode(array('status'=>'0','message'=>'please buy package first'));
      }

   }

   function demo_video(){
      $check = $this->db->get('demo_video');
      $output = array();
      if ($check->num_rows() > 0) {

         echo json_encode(array('status'=>'1','message'=>'Successfully','data'=>$check->result_array()));
      }else{
         echo json_encode(array('status'=>'0','message'=>'Zero Video added to Demo'));
      }
   }

   function home_banner()
   {
      $banner = $this->db->get_where('banner',array('type'=>'Home'));

      if ($banner->num_rows() > 0) {
         echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$banner->result_array()));
      }else{
         echo json_encode(array('status'=>'0','message'=>'no banner available'));
      }
   }

   function vacancy(){
      $vacancy = $this->db->get('vacancy');
         if ($vacancy->num_rows() > 0) {
            echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$vacancy->result_array()));
         }else{
            echo json_encode(array('status'=>'0','message'=>'no vacancies'));
         }
      }

   function package_check(){
      $user_id = $this->input->post('user_id');
      $package_id = $this->input->post('package_id');
      $check = $this->db->get_where('orders',array('user_id'=>$user_id,'package_id'=>$package_id));
      if ($check->num_rows() > 0) {
         $package_id = $check->row_array();
         foreach ($package_id as $row) {
            $package = $this->db->get_where('package',array('package_id'=>$row['package_id']));
            if ($package->num_rows() > 0) {
               array_push($output, $row);
            }
         }
         echo json_encode(array('status'=>'1','message'=>'Successfully','data'=>$output));
      }else{
         echo json_encode(array('status'=>'0','message'=>'failed'));
      }
   }


   function course_buy()
   {
      $user_id = $this->input->post('user_id');
      $package_id = $this->input->post('package_id');
      $txn_id  = $this->input->post('txn_id');
      $data['user_id'] = $user_id;
      $data['package_id'] = $package_id;
      $data['tx_id'] = $txn_id;
      $data['method'] = 'Online';
      $data['amount'] = $this->input->post('amount');
      $data['time'] = time();
      $this->db->insert('orders',$data);
      echo json_encode(array('status'=>'1','message'=>'successfully'));
   }

   function mypackages(){
      $user_id = $this->input->post('user_id');
      $orders = $this->db->get_where('orders',array('user_id'=>$user_id));
      $output=array();
      if($orders->num_rows() > 0){
         $orders = $orders->result_array();
         foreach ($orders as $row) {
            $package = $this->db->get_where('package',array('package_id'=>$row['package_id']));
            if ($package->num_rows() > 0) {
               $package = $package->row_array();
               $package['expiry'] = date('d-m-Y',$package['expiry']);
               $package['videos'] = strval($this->db->get_where('package_videos',array('package_id'=>$package['package_id']))->num_rows());
               $package['tests'] = strval($this->db->get_where('package_tests',array('package_id'=>$package['package_id']))->num_rows());
               $package['notes'] = strval($this->db->get_where('package_notes',array('package_id'=>$package['package_id']))->num_rows());
               array_push($output, $package);
            }
         }
         echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$output));
      }else{
         echo json_encode(array('status'=>'0','message'=>'You havn\'t active package now' ));
      }
   }

   function package_data()
   {
      $package_id = $this->input->post('package_id');
      $package = $this->db->get_where('package',array('package_id'=>$package_id));
      if ($package->num_rows() > 0) {
         $pack = $package->row_array();
         if ($pack['filter']=='Complete') {
            $subjects = $this->db->get('subject')->result_array();
            $subject_list = array();
            foreach ($subjects as $row) {
               $topic_list = array();

               $topics = $this->db->get_where('topics',array('subject_id'=>$row['subject_id']))->result_array();
                  foreach ($topics as $row1) {
                     $video_list = array();
                     $notes_list = array();
                     $test_list = array();
                     $videos = $this->db->get_where('package_videos',array('package_id'=>$package_id,'topic_id'=>$row1['topic_id']))->result_array();
                     foreach ($videos as $row2) {
                        $rr = $this->db->get_where('videos',array('video_id'=>$row2['video_id']));
                        if($rr->num_rows() > 0){
                           $rr =$rr->row_array();
                           array_push($video_list, $rr);
                        }
                        
                     }
                     $tests = $this->db->get_where('package_tests',array('package_id'=>$package_id))->result_array();
                     foreach ($tests as $row3) {
                        $rr = $this->db->get_where('quiz',array('test_id'=>$row3['test_id']));
                        if($rr->num_rows() > 0){
                           $rr =$rr->row_array();
                           //print_r($rr);
                           $rr['start_time']= date('d-m-Y h:i:s',$rr['start_time']);
                           $rr['end_time'] = date('d-m-Y h:i:s',$rr['end_time']);
                           $rr['time'] = date('d-m-Y h:i:s',$rr['time']);
                           $rr['questions'] = strval($this->db->get_where('quiz_question',array('test_id'=>$row3['test_id']))->num_rows());
                           $this->db->select_sum('add_mark');
            				$rr['max_marks'] = $this->db->get_where('quiz_question',array('test_id'=>$row3['test_id']))->row()->add_mark;
                           array_push($test_list, $rr);
                        }
                     }

                      $notes = $this->db->get_where('package_notes',array('package_id'=>$package_id))->result_array();
                     foreach ($notes as $row4) {
                        $rr = $this->db->get_where('notes',array('notes_id'=>$row4['note_id']));
                        if($rr->num_rows() > 0){
                           $rr =$rr->row_array();
                           
                           array_push($notes_list, $rr);
                        }
                     }

                     $row1['videos'] = $video_list;
                     $row1['tests'] = $test_list;
                     $row1['notes'] = $notes_list;
                     array_push($topic_list, $row1);
                  }
                  $row['topics'] = $topic_list;
                  array_push($subject_list, $row);
            }
            echo json_encode(array('status'=>'1','message'=>'Successfully','data'=>$subject_list));
         }
         if (($pack['filter']=='Subjectwise')||($pack['filter']=='TeacherWise')||($pack['filter']=='TopicWise')) {


            $subject_id = $this->db->get_where('topics',array('topic_id'=>$this->db->get_where('package_videos',array('package_id'=>$package_id))->row()->topic_id))->row()->subject_id;

            $subjects = $this->db->get_where('subject',array('subject_id'=>$subject_id))->result_array();
            $subject_list = array();
            foreach ($subjects as $row) {
               $topic_list = array();
               $topics = $this->db->get_where('topics',array('subject_id'=>$row['subject_id']))->result_array();
                  foreach ($topics as $row1) {
                     $video_list = array();
                     $notes_list = array();
                     $test_list = array();
                     $videos = $this->db->get_where('package_videos',array('package_id'=>$package_id,'topic_id'=>$row1['topic_id']))->result_array();
                     foreach ($videos as $row2) {
                        $rr = $this->db->get_where('videos',array('video_id'=>$row2['video_id']));
                        if($rr->num_rows() > 0){
                           $rr =$rr->row_array();
                           array_push($video_list, $rr);
                        }
                     }

                     $tests = $this->db->get_where('package_tests',array('package_id'=>$package_id))->result_array();
                     foreach ($tests as $row3) {
                        $rr = $this->db->get_where('quiz',array('test_id'=>$row3['test_id']));
                        if($rr->num_rows() > 0){
                           $rr =$rr->row_array();
                           $rr['start_time']= date('d-m-Y h:i:s',$rr['start_time']);
                           $rr['end_time'] = date('d-m-Y h:i:s',$rr['end_time']);
                           $rr['time'] = date('d-m-Y h:i:s',$rr['time']);
                           $rr['questions'] = strval($this->db->get_where('quiz_question',array('test_id'=>$row3['test_id']))->num_rows());
                           array_push($test_list, $rr);
                        }
                     }

                     $notes = $this->db->get_where('package_notes',array('package_id'=>$package_id))->result_array();
                     foreach ($notes as $row4) {
                        $rr = $this->db->get_where('notes',array('notes_id'=>$row4['note_id']));
                        if($rr->num_rows() > 0){
                           $rr =$rr->row_array();
                           
                           array_push($notes_list, $rr);
                        }
                     }

                     
                     $row1['videos'] = $video_list;
                     $row1['tests'] = $test_list;
                     $row1['notes'] = $notes_list;



                     array_push($topic_list, $row1);
                  }
                  $row['topics'] = $topic_list;
                  array_push($subject_list, $row);
            }
            echo json_encode(array('status'=>'1','message'=>'Successfully','data'=>$subject_list));
         }


      }else{
         echo json_encode(array('status'=>'0','message'=>'No package found'));
      }
   }


      function package_video()
      {

         $package_id = $this->input->post('package_id');
         $topic_id = $this->input->post('topic_id');
         $local=array();
         $check=$this->db->get_where('package_videos',array('package_id'=>$package_id,'topic_id'=>$topic_id));
         if($check->num_rows() > 0){
            $data=$check->result_array();
            foreach($data as $row) {
               $row2=$this->db->get_where('videos',array('video_id'=>$row['video_id']))->row_array();

               array_push($local,$row2);
            }

            echo json_encode(array('status'=>'1','message'=>'successful','data'=>$local));
         }else{
             echo json_encode(array('status'=>'0','message'=>'failed'));

         }


      }
   
      function study_material()
      {
      	$study_material = $this->db->get('study_material');

      	if ($study_material->num_rows()>0) {
      		$study_material=$study_material->result_array();
      		echo json_encode(array('status'=>'1','message'=>'successfully','data'=>$study_material));
      	}else{
		 	echo json_encode(array('status'=>'0','message'=>'failed'));
		 }     
	}

   function buy_test()
   {
      $user_id = $this->input->post('user_id');
      $test_id = $this->input->post('test_id');
      $data['amount'] = $this->input->post('amount');
      $data['txn_id'] = $this->input->post('txn_id');
      $data['time'] =time();
      $data['test_id'] = $test_id;
      $data['user_id'] = $user_id;
      $check = $this->db->get_where('test_orders',array('test_id'=>$test_id,'user_id'=>$user_id));
      if ($check->num_rows() < 1) {
         $this->db->insert('test_orders',$data);
         echo json_encode(array('status'=>'1','message'=>'Successfully'));
      }else{
         echo json_encode(array('status'=>'0','message'=>'already buyed'));
      }
   }














}