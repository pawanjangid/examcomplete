<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Admin extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');

		/*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

	}

	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'login', 'refresh');
		if ($this->session->userdata('admin_login') == 1)
			redirect(base_url() . 'admin/dashboard', 'refresh');
	}

	/***ADMIN DASHBOARD***/
	function dashboard()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = $this->db->get_where('settings',array('type'=>'system_name'))->row()->description;
		$this->load->view('backend/index', $page_data);
	}

	/***ADMIN DASHBOARD***/
	function loadpage($page='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['page_name']  = $page;
		$page_data['page_title'] = $page;
		$this->load->view('backend/index', $page_data);
	}

	function users($limit='',$offset = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['limit'] = $limit;
		$page_data['offset'] = $offset;
		$page_data['page_name']  = 'users';
		$page_data['page_title'] = 'USERS';
		$this->load->view('backend/index', $page_data);
	}

	public function user_add($param1='',$param2='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(),'refresh');
		if ($param1 =='create') {
			$data['fname'] = $this->input->post('fname');
			$data['lname'] = $this->input->post('lname');
			$data['address'] = $this->input->post('address');
			$data['Mobile'] = $this->input->post('Mobile');
			$data['email'] = $this->input->post('email');
			$data['password'] = sha1($this->input->post('password'));
			$this->db->insert('student',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
			redirect(base_url() . 'admin/users', 'refresh');
		}
		if ($param1=='delete') {
			$this->db->where('id',$param2);
			$this->db->delete('student');
			$this->session->set_flashdata('flash_message' , get_phrase('data_removed_successfully'));
			redirect(base_url() . 'admin/users', 'refresh');
		}
		$page_data['page_name']  = 'add_user';
		$page_data['page_title'] = 'add user';
		$this->load->view('backend/index', $page_data);
	}

	function edit_course($course_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['course_id'] = $course_id;
		$page_data['page_name']  = 'edit_course';
		$page_data['page_title'] = 'Edit Course';
		$this->load->view('backend/index', $page_data);
	}


	function add_subject($param1='',$param2='',$param3='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {

			$upload_path = './uploads/subjects';

			$uppath = $upload_path;
			if (!(file_exists($uppath))) {
				mkdir($uppath, 0777, true);
			}
			$config = array(
				'upload_path'=>$uppath,
				'encrypt_name'=> TRUE,
				'allowed_types'=>'*',
				'overwrite' => FALSE,
			);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('flash_message' , get_phrase($this->upload->display_errors()));
			}else{
				$imageDetailArray = $this->upload->data();
				$data['file'] = base_url().$uppath .'/'. $imageDetailArray['file_name'];
				$data['name'] = $this->input->post('name');
				$data['time'] = time();
				$this->db->insert('subject',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            	redirect(base_url() . 'admin/add_subject', 'refresh');

			}

		}
		if ($param1=='update') {
			$data['name'] = $this->input->post('name');
			$this->db->where('subject_id',$param2);
			$this->db->update('subject',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
            redirect(base_url() . 'admin/add_subject', 'refresh');
		}
		if ($param1=='delete') {
			$this->db->where('subject_id',$param2);
			$this->db->delete('subject');
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/add_subject', 'refresh');
		}

		$page_data['page_name']  = 'add_subject';
		$page_data['page_title'] = 'Add Subject';
		$this->load->view('backend/index', $page_data);
	}

	function edit_subject($subject_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['subject_id'] = $subject_id;
		$page_data['page_name']  = 'edit_subject';
		$page_data['page_title'] = 'Edit Subject';
		$this->load->view('backend/index', $page_data);
	}
	

	function courses($param1='',$param2='',$param3='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$data['name'] = $this->input->post('name');
			$file_name = uniqid().'.png';
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/courses/'.$file_name);
			$data['icon'] = $file_name;
			$data['time'] = time();
			$this->db->insert('courses',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/courses', 'refresh');
		}
		if ($param1=='update') {
			$data['name'] = $this->input->post('name');
			$file_name = uniqid().'.png';
			move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/courses/'.$file_name);
			$data['icon'] = $file_name;
			$data['time'] = time();
			$this->db->where('course_id',$param2);
			$this->db->update('courses',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
            redirect(base_url() . 'admin/courses', 'refresh');
		}
		if ($param1=='delete') {
			$this->db->where('course_id',$param2);
			$this->db->delete('courses');
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/courses', 'refresh');
		}

		$page_data['page_name']  = 'courses';
		$page_data['page_title'] = 'Courses';
		$this->load->view('backend/index', $page_data);
	}

	function new_question($value='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');

		$page_data['page_name']  = 'new_question';
		$page_data['page_title'] = 'Question Type';
		$this->load->view('backend/index', $page_data);
	}
	
	function add_option($value='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$type = $this->input->post('type');
		$options = $this->input->post('option');

		if ($type =='1') {
			redirect(base_url() . 'admin/add_question_1/'.$options, 'refresh');
		}
		if ($type == '2') {
			$page_data['page_name'] = 'add_question_2';
			redirect(base_url() . 'admin/add_question_2/'.$options, 'refresh');
		}
		if ($type =='3') {
			redirect(base_url() . 'admin/add_question_3/'.$options, 'refresh');
		}

		if ($type == '4') {
			redirect(base_url() . 'admin/add_question_4/'.$options, 'refresh');
		}
		
	}

	function add_question_1($option='',$subject_id = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['option'] = $option;
		$page_data['subject_id'] = $subject_id;
		$page_data['page_name']  = 'add_question_1';
		$page_data['page_title'] = 'Question';
		$this->load->view('backend/index', $page_data);
	}

	function question_data_1()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$data['question'] = $this->input->post('question');
		$data['solution'] = $this->input->post('solution');
		$data['subject_id'] = $this->input->post('subject_id');
		$data['type'] = '1';
		$data['time'] = time();
		$this->db->insert('questions',$data);
		$question_id = $this->db->insert_id();
		$options = $this->input->post('option');
		$right	 = $this->input->post('right')-1;
		//echo $right;
		//print_r($options);
		for ($i=0; $i < sizeof($options); $i++) { 
			$data1['option'] = $options[$i];
			$data1['question_id'] = $question_id;
			if ($i == $right) {
				$data1['right'] = '1';
			}else{
				$data1['right'] = '0';
			}
			
			$data1['time'] = time();
			$this->db->insert('options',$data1);
		}
		$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
        redirect(base_url() . 'admin/add_question_1/'.sizeof($options).'/'.$data['subject_id'], 'refresh');

	}

	function edit_question_1($question_id='',$param1='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');

		if ($param1=='update') {
			
		$data['question'] = $this->input->post('question');
		$data['solution'] = $this->input->post('solution');
		$data['subject_id'] = $this->input->post('subject_id');
		$data['type'] = '1';
		$data['time'] = time();
		$this->db->where('question_id',$question_id);
		$this->db->update('questions',$data);
		$options_ids = $this->input->post('option_id');
		$options = $this->input->post('option');
		$right	 = $this->input->post('right')-1;

		for ($i=0; $i < sizeof($options); $i++) { 
			$data1['option'] = $options[$i];
			if ($i == $right) {
				$data1['right'] = '1';
			}else{
				$data1['right'] = '0';
			}
			
			$data1['time'] = time();
			$this->db->where('option_id',$options_ids[$i]);
			$this->db->update('options',$data1);
		}
		$this->session->set_flashdata('flash_message' , get_phrase('Data_Updated_Successfully'));
        redirect(base_url() . 'admin/edit_question_1/'.$question_id, 'refresh');
		}


		$page_data['question_id'] = $question_id;
		$page_data['page_name']  = 'edit_question_1';
		$page_data['page_title'] = 'Edit Question';
		$this->load->view('backend/index', $page_data);


	}
	function delete_question_1($question_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$this->db->where('question_id',$question_id);
		$this->db->delete('quiz_question');
		$this->db->where('question_id',$question_id);
		$this->db->delete('questions');
		$this->db->where('question_id',$question_id);
		$this->db->delete('options');
		$this->session->set_flashdata('flash_message' , get_phrase('Question_removed_Successfully_from_list'));
        redirect(base_url() . 'admin/question_list', 'refresh');
	}


	function question_list($limit='',$offset='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['limit'] = $limit;
		$page_data['offset'] = $offset;
		$page_data['page_name']  = 'question_list';
		$page_data['page_title'] = 'All Question List';
		$this->load->view('backend/index', $page_data);
	}



	function add_test($param1='',$param2='',$param3='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$data['name'] = $this->input->post('name');
			$data['course_id'] = $this->input->post('course_id');
			$data['start_time'] = strtotime($this->input->post('start'));
			$data['end_time'] = strtotime($this->input->post('end'));
			$data['duration'] = $this->input->post('duration');
			$data['attempt'] = $this->input->post('attempt');
			$data['amount'] = $this->input->post('amount');
			$data['description'] = $this->input->post('description');
			$data['teacher_id'] = $this->input->post('teacher_id');
			$data['time'] = time();
			$this->db->insert('quiz',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/list_quiz', 'refresh');
		}
		if ($param1=='update') {
			$data['name'] = $this->input->post('name');
			$data['course_id'] = $this->input->post('course_id');
			$data['start_time'] = strtotime($this->input->post('start'));
			$data['end_time'] = strtotime($this->input->post('end'));
			$data['duration'] = $this->input->post('duration');
			$data['attempt'] = $this->input->post('attempt');
			$data['amount'] = $this->input->post('amount');
			$data['description'] = $this->input->post('description');
			$data['teacher_id'] = $this->input->post('teacher_id');
			$data['time'] = time();
			$this->db->where('test_id',$param2);
			$this->db->update('quiz',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
            redirect(base_url() . 'admin/list_quiz', 'refresh');
		}
		if ($param1=='delete') {
			$this->db->where('test_id',$param2);
			$this->db->delete('quiz');
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/list_quiz', 'refresh');
		}

		$page_data['page_name']  = 'create_test';
		$page_data['page_title'] = 'Add New Test';
		$this->load->view('backend/index', $page_data);
	}

	function edit_quiz($test_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['test_id'] = $test_id;
		$page_data['page_name']  = 'edit_test';
		$page_data['page_title'] = 'Quiz';
		$this->load->view('backend/index', $page_data);
	}

	function list_quiz()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['page_name']  = 'list_quiz';
		$page_data['page_title'] = 'Quiz';
		$this->load->view('backend/index', $page_data);
	}

	function assign_test_question($test_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['test_id'] = $test_id;
		$page_data['page_name']  = 'assign_question';
		$page_data['page_title'] = 'Add Question to Test';
		$this->load->view('backend/index', $page_data);
	}


	function assign_question($test_id='')
	{		
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$questions = $this->input->post('question_id');
		$add_marks  = $this->input->post('add_mark');
		$deducts  = $this->input->post('deduct');
		for ($i=0; $i < sizeof($questions); $i++) { 
			$check = $this->db->get_where('quiz_question',array('test_id'=>$test_id,'question_id'=>$questions[$i]));
			if ($check->num_rows() < 1) {
				$data['question_id'] = $questions[$i];
				$data['test_id'] = $test_id;
				$data['add_mark'] = $add_marks[$i];
				$data['deduct'] = $deducts[$i];
				$data['time'] = time();
				$this->db->insert('quiz_question',$data);
			}
		}
		$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
		redirect(base_url() . 'admin/list_quiz', 'refresh');
	}

	function test_detail($test_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['test_id'] = $test_id;
		$page_data['page_name']  = 'test_detail';
		$page_data['page_title'] = 'Test Detail';
		$this->load->view('backend/index', $page_data);
	}

	function test_result($test_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['test_id'] = $test_id;
		$page_data['page_name']  = 'test_result';
		$page_data['page_title'] = 'Test Result';
		$this->load->view('backend/index', $page_data);
	}

	function result_preview($result_id='')
	{

		$page_data['result_id'] = $result_id;
		$page_data['page_name']  = 'result_preview';
		$page_data['page_title'] = 'Test Result';
		$this->load->view('backend/index', $page_data);
	}



		function teachers($param1='',$param2='',$param3='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$data['name'] = $this->input->post('name');
			$file_name = uniqid().'.png';
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teachers/'.$file_name);
			$data['image'] = $file_name;
			$data['time'] = time();
			$this->db->insert('teacher',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/teachers', 'refresh');
		}
		if ($param1=='update') {
			$data['name'] = $this->input->post('name');
			$file_name = uniqid().'.png';
			if($_FILES['userfile']['tmp_name']){
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teachers/'.$file_name);
				$data['image'] = $file_name;
			}
			
			$data['time'] = time();
			$this->db->where('teacher_id',$param2);
			$this->db->update('teacher',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
            redirect(base_url() . 'admin/teachers', 'refresh');
		}
		if ($param1=='delete') {
			$file_name = $this->db->get_where('teacher',array('teacher_id'=>$param2))->row()->image;
			$file = './uploads/teachers/'.$file_name;
			unlink($file);
			$this->db->where('teacher_id',$param2);
			$this->db->delete('teacher');
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/teachers', 'refresh');
		}

		$page_data['page_name']  = 'teachers';
		$page_data['page_title'] = 'Teachers';
		$this->load->view('backend/index', $page_data);
	}

	function edit_teacher($teacher_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['teacher_id'] = $teacher_id;
		$page_data['page_name']  = 'edit_teacher';
		$page_data['page_title'] = 'Edit Teachers';
		$this->load->view('backend/index', $page_data);
	}


		function add_topic($subject_id='',$param1 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$data['subject_id'] = $subject_id;
			$data['name'] = $this->input->post('name');
			$data['time'] = time();
			$this->db->insert('topics',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/add_topic/'.$subject_id, 'refresh');
		}
		$page_data['subject_id'] = $subject_id;
		$page_data['page_name']  = 'topics';
		$page_data['page_title'] = 'Topics of '. $this->db->get_where('subject',array('subject_id'=>$subject_id))->row()->name;
		$this->load->view('backend/index', $page_data);
	}
	function edit_topic($param1='',$topic_id)
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='update') {
			$data['subject_id'] = $this->input->post('subject_id');
			$data['name'] = $this->input->post('name');
			$this->db->where('topic_id',$topic_id);
			$this->db->update('topics',$data);
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
			 redirect(base_url() . 'admin/add_topic/'.$data['subject_id'], 'refresh');

		}
		if($param1=='delete'){
			$subject_id = $this->db->get_where('topics',array('topic_id'=>$topic_id))->row()->subject_id;
			$this->db->where('topic_id',$topic_id);
			$this->db->delete('topics');
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
			 redirect(base_url() . 'admin/add_topic/'.$subject_id, 'refresh');
		}
	}

	function video($topic_id='',$param1=''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
		    
		    if($this->input->post('upload_type') =='Youtube'){
		        $data['file'] = $this->input->post('youtube_link');
				$data['title'] = $this->input->post('title');
				$data['topic_id'] = $topic_id;
				$data['course_id'] = $this->input->post('course_id');
				$data['method'] = 'youtube';
				$data['description'] = $this->input->post('description');
				    						$upload_path = './uploads/thumbnail';
    
    						$uppath = $upload_path.'/'.$topic_id;
    						if (!(file_exists($uppath))) {
    							mkdir($uppath, 0777, true);
    						}
    						$config = array(
    							'upload_path'=>$uppath,
    							'encrypt_name'=> TRUE,
    							'allowed_types'=>'jpg|jpeg|png',
    							'overwrite' => FALSE,
    						);
    						$this->upload->initialize($config);
    						if ($this->upload->do_upload('thumbnail')) {
    							$imageDetailArray = $this->upload->data();
    							$data['thumbnail'] = base_url().$uppath.'/'.$imageDetailArray['file_name'];
    						}else{
    							$data['thumbnail'] = base_url().'uploads/logo.png';
    						}
    			$data['time'] = time();			
				$this->db->insert('videos',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/video/'.$topic_id, 'refresh');
				
		    }else{
		        			$upload_path = './uploads/videos';

			$uppath = $upload_path.'/'.$topic_id;
			if (!(file_exists($uppath))) {
				mkdir($uppath, 0777, true);
			}
    			$config = array(
    				'upload_path'=>$uppath,
    				'encrypt_name'=> TRUE,
    				'allowed_types'=>'*',
    				'overwrite' => FALSE,
    			);
    			$this->upload->initialize($config);
    			if (!$this->upload->do_upload('file')) {
    				$this->session->set_flashdata('flash_message' , get_phrase($this->upload->display_errors()));
    			}else{
    				$imageDetailArray = $this->upload->data();
    				$data['file'] = base_url().$uppath .'/'. $imageDetailArray['file_name'];
    				$data['title'] = $this->input->post('title');
    				$data['topic_id'] = $topic_id;
    				$data['course_id'] = $this->input->post('course_id');
    				$data['method'] = 'upload';
    				$data['description'] = $this->input->post('description');
    				if($this->input->post('teacher_id')){
    					$data['teacher_id'] = $this->input->post('teacher_id');
    				}else{
    					$data['teacher_id'] = 0;
    				}
    				$data['time'] = time();
    
    						$upload_path = './uploads/thumbnail';
    
    						$uppath = $upload_path.'/'.$topic_id;
    						if (!(file_exists($uppath))) {
    							mkdir($uppath, 0777, true);
    						}
    						$config = array(
    							'upload_path'=>$uppath,
    							'encrypt_name'=> TRUE,
    							'allowed_types'=>'jpg|jpeg|png',
    							'overwrite' => FALSE,
    						);
    						$this->upload->initialize($config);
    						if ($this->upload->do_upload('thumbnail')) {
    							$imageDetailArray = $this->upload->data();
    							$data['thumbnail'] = base_url().$uppath.'/'.$imageDetailArray['file_name'];
    						}else{
    							$data['thumbnail'] = base_url().'uploads/logo.png';
    						}		
    				$this->db->insert('videos',$data);
    				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
    				redirect(base_url() . 'admin/video/'.$topic_id, 'refresh');
    
    			}
		    }
		    
			
			
		}










		$page_data['topic_id'] = $topic_id;
		$page_data['page_name']  = 'videos';
		$page_data['page_title'] = 'Videos of '. $this->db->get_where('topics',array('topic_id'=>$topic_id))->row()->name;
		$this->load->view('backend/index', $page_data);
	}
	
	function edit_video($param1='',$video_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
		redirect(base_url(), 'refresh');
		if ($param1=='delete') {
			$files = $this->db->get_where('videos',array('video_id'=>$video_id))->row_array();
			
			$file1array = explode('/', $files['file']);
			$file2array = explode('/', $files['thumbnail']);
			$path1 = './uploads/videos/'.$files['topic_id'].'/'.end($file1array);
			$path2 = './uploads/thumbnail/'.$files['topic_id'].'/'.end($file2array);
			//echo $path1;
			unlink($path1);
			unlink($path2);
			$this->db->where('video_id',$video_id);
			$this->db->delete('videos');
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/video/'.$files['topic_id'], 'refresh');
		}

		if ($param1=='update') {
			$data['title'] = $this->input->post('title');
			$data['course_id'] = $this->input->post('course_id');
			$data['description'] = $this->input->post('description');
			if($this->input->post('teacher_id')){
					$data['teacher_id'] = $this->input->post('teacher_id');
				}else{
					$data['teacher_id']=0;
				}
			$this->db->where('video_id',$video_id);
			$this->db->update('videos',$data);
			$topic_id = $this->db->get_where('videos',array('video_id'=>$video_id))->row()->topic_id;
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/video/'.$topic_id, 'refresh');
		}
		$page_data['video_id'] = $video_id;
		$page_data['page_name']  = 'edit_video';
		$page_data['page_title'] = 'Edit Video';
		$this->load->view('backend/index', $page_data);

	}

	function notes($topic_id='',$param1=''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$upload_path = './uploads/notes';

			$uppath = $upload_path.'/'.$topic_id;
			if (!(file_exists($uppath))) {
				mkdir($uppath, 0777, true);
			}
			$config = array(
				'upload_path'=>$uppath,
				'encrypt_name'=> TRUE,
				'allowed_types'=>'*',
				'overwrite' => FALSE,
			);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('flash_message' , get_phrase($this->upload->display_errors()));
			}else{
				$imageDetailArray = $this->upload->data();
				$data['file'] = base_url().$uppath .'/'. $imageDetailArray['file_name'];
				$data['title'] = $this->input->post('title');
				$data['topic_id'] = $topic_id;
				$data['course_id'] = $this->input->post('course_id');
				$data['description'] = $this->input->post('description');
				$data['time'] = time();

				if($this->input->post('teacher_id')){
					$data['teacher_id'] = $this->input->post('teacher_id');
				}else{
					$data['teacher_id']=0;
				}

						$upload_path = './uploads/thumbnailnotes';

						$uppath = $upload_path.'/'.$topic_id;
						if (!(file_exists($uppath))) {
							mkdir($uppath, 0777, true);
						}
						$config = array(
							'upload_path'=>$uppath,
							'encrypt_name'=> TRUE,
							'allowed_types'=>'jpg|jpeg|png',
							'overwrite' => FALSE,
						);
						$this->upload->initialize($config);
						if ($this->upload->do_upload('thumbnail')) {
							$imageDetailArray = $this->upload->data();
							$data['thumbnail'] = base_url().$uppath.'/'.$imageDetailArray['file_name'];
						}else{
							$data['thumbnail'] = base_url().'uploads/logo.png';
						}		
				$this->db->insert('notes',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/notes/'.$topic_id, 'refresh');

			}
		}

		$page_data['topic_id'] = $topic_id;
		$page_data['page_name']  = 'notes';
		$page_data['page_title'] = 'Notes of '. $this->db->get_where('topics',array('topic_id'=>$topic_id))->row()->name;
		$this->load->view('backend/index', $page_data);
	}

		function edit_notes($param1='',$notes_id='')
	{
		if ($this->session->userdata('admin_login') != 1)
		redirect(base_url(), 'refresh');
		if ($param1=='delete') {
			$files = $this->db->get_where('notes',array('notes_id'=>$notes_id))->row_array();
			
			$file1array = explode('/', $files['file']);
			$file2array = explode('/', $files['thumbnail']);
			$path1 = './uploads/notes/'.$files['topic_id'].'/'.end($file1array);
			$path2 = './uploads/thumbnailnotes/'.$files['topic_id'].'/'.end($file2array);
			//echo $path1;
			unlink($path1);
			unlink($path2);
			$this->db->where('notes_id',$notes_id);
			$this->db->delete('notes');
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/notes/'.$files['topic_id'], 'refresh');
		}

		if ($param1=='update') {
			$data['title'] = $this->input->post('title');
			$data['course_id'] = $this->input->post('course_id');
			$data['description'] = $this->input->post('description');
			if($this->input->post('teacher_id')){
					$data['teacher_id'] = $this->input->post('teacher_id');
				}else{
					$data['teacher_id']=0;
				}
			$this->db->where('notes_id',$notes_id);
			$this->db->update('notes',$data);
			$topic_id = $this->db->get_where('notes',array('notes_id'=>$notes_id))->row()->topic_id;
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/notes/'.$topic_id, 'refresh');
		}
		$page_data['notes_id'] = $notes_id;
		$page_data['page_name']  = 'edit_notes';
		$page_data['page_title'] = 'Edit Notes';
		$this->load->view('backend/index', $page_data);

	}

	function add_package()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		$page_data['page_name']  = 'add_package';
		$page_data['page_title'] = 'Add Package';
		$this->load->view('backend/index', $page_data);
	}

	function package($param1=''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$upload_path = './uploads/poster';

			$uppath = $upload_path;
			if (!(file_exists($uppath))) {
				mkdir($uppath, 0777, true);
			}
			$config = array(
				'upload_path'=>$uppath,
				'encrypt_name'=> TRUE,
				'allowed_types'=>'*',
				'overwrite' => FALSE,
			);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('flash_message' , get_phrase($this->upload->display_errors()));
				print_r($this->upload->display_errors());
			}else{
				$imageDetailArray = $this->upload->data();
				$data['poster'] = base_url().$uppath .'/'. $imageDetailArray['file_name'];
				$data['title'] = $this->input->post('title');
				$data['course_id'] = $this->input->post('course_id');
				$data['description'] = $this->input->post('description');
				$data['amount'] = $this->input->post('amount');
				$data['mrp'] = $this->input->post('mrp');
				$data['filter'] = $this->input->post('filter');
				$data['expiry'] = strtotime($this->input->post('expiry'));
				$data['time'] = time();
		
				$this->db->insert('package',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/package/', 'refresh');
			}
		}

		$page_data['page_name']  = 'packages';
		$page_data['page_title'] = 'Packages';
		$this->load->view('backend/index', $page_data);
	}

	function package_video($package_id='',$param1='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');

		if ($param1=='create') {
			$videos = $this->input->post('video_id');
			for ($i=0; $i < sizeof($videos); $i++) { 
				$data['video_id'] = $videos[$i];
				$data['topic_id'] = $this->db->get_where('videos',array('video_id'=>$videos[$i]))->row()->topic_id;
				$data['package_id'] = $package_id;
				$data['time'] = time();
				$this->db->insert('package_videos',$data);
			}
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
			redirect(base_url() . 'admin/package/', 'refresh');
		}


		$page_data['package_id'] = $package_id;
		$page_data['page_name']  = 'package_video';
		$page_data['page_title'] = 'Add Video to Package';
		$this->load->view('backend/index', $page_data);
	}

	function package_test($package_id='',$param1='')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');

		if ($param1=='create') {
			$tests = $this->input->post('test_id');
			for ($i=0; $i < sizeof($tests); $i++) { 
				$data['test_id'] = $tests[$i];
				$data['package_id'] = $package_id;
				$data['time'] = time();
				$this->db->insert('package_tests',$data);
			}
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
			redirect(base_url() . 'admin/package/', 'refresh');
		}


		$page_data['package_id'] = $package_id;
		$page_data['page_name']  = 'package_test';
		$page_data['page_title'] = 'Add Test to Package';
		$this->load->view('backend/index', $page_data);
	}

	function demo_video($param1='',$video_id=''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
		    
		    if($this->input->post('method')=='Youtube'){
		     $data['method'] = 'Youtube';
		     $data['file'] = $this->input->post('youtube_link');
				$data['title'] = $this->input->post('title');
				$data['subtitle'] = $this->input->post('subtitle');
				if ($this->input->post('teacher')) {
					$data['teacher'] = $this->db->get_where('teacher',array('teacher_id'=>$this->input->post('teacher')))->row()->name;
				}else{
					$data['teacher'] = 'Rinchtar';
				}
				
				$data['description'] = $this->input->post('description');
				$data['time'] = time();

						$upload_path = './uploads/demothumbnail';

						$uppath = $upload_path;
						if (!(file_exists($uppath))) {
							mkdir($uppath, 0777, true);
						}
						$config = array(
							'upload_path'=>$uppath,
							'encrypt_name'=> TRUE,
							'allowed_types'=>'jpg|jpeg|png',
							'overwrite' => FALSE,
						);
						$this->upload->initialize($config);
						if ($this->upload->do_upload('thumbnail')) {
							$imageDetailArray = $this->upload->data();
							$data['thumbnail'] = base_url().$uppath.'/'.$imageDetailArray['file_name'];
						}else{
							$data['thumbnail'] = base_url().'uploads/logo.png';
						}		
				$this->db->insert('demo_video',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/demo_video/', 'refresh');
		       
		    }else{
			$upload_path = './uploads/demo_videos';

			$uppath = $upload_path;
			if (!(file_exists($uppath))) {
				mkdir($uppath, 0777, true);
			}
			$config = array(
				'upload_path'=>$uppath,
				'encrypt_name'=> TRUE,
				'allowed_types'=>'*',
				'overwrite' => FALSE,
			);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('flash_message' , get_phrase($this->upload->display_errors()));
			}else{
				$imageDetailArray = $this->upload->data();
				$data['file'] = base_url().$uppath .'/'. $imageDetailArray['file_name'];
				$data['title'] = $this->input->post('title');
				$data['subtitle'] = $this->input->post('subtitle');
				$data['method'] = 'upload';
				if ($this->input->post('teacher')) {
					$data['teacher'] = $this->db->get_where('teacher',array('teacher_id'=>$this->input->post('teacher')))->row()->name;
				}else{
					$data['teacher'] = 'Rinchtar';
				}
				
				$data['description'] = $this->input->post('description');
				$data['time'] = time();

						$upload_path = './uploads/demothumbnail';

						$uppath = $upload_path;
						if (!(file_exists($uppath))) {
							mkdir($uppath, 0777, true);
						}
						$config = array(
							'upload_path'=>$uppath,
							'encrypt_name'=> TRUE,
							'allowed_types'=>'jpg|jpeg|png',
							'overwrite' => FALSE,
						);
						$this->upload->initialize($config);
						if ($this->upload->do_upload('thumbnail')) {
							$imageDetailArray = $this->upload->data();
							$data['thumbnail'] = base_url().$uppath.'/'.$imageDetailArray['file_name'];
						}else{
							$data['thumbnail'] = base_url().'uploads/logo.png';
						}		
				$this->db->insert('demo_video',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/demo_video/', 'refresh');
			}		        
		    }
		    
		    
		    

		}

		if ($param1=='delete') {
			$files = $this->db->get_where('demo_video',array('video_id'=>$video_id))->row_array();
			
			$file1array = explode('/', $files['file']);
			$file2array = explode('/', $files['thumbnail']);
			$path1 = './uploads/demo_videos/'.end($file1array);
			$path2 = './uploads/demothumbnail/'.end($file2array);
			//echo $path1;
			unlink($path1);
			unlink($path2);
			$this->db->where('video_id',$video_id);
			$this->db->delete('demo_video');
			$this->session->set_flashdata('flash_message' , get_phrase('deleted_successfully'));
				redirect(base_url() . 'admin/demo_video', 'refresh');
		}

		$page_data['page_name']  = 'demo_video';
		$page_data['page_title'] = 'Demo Videos';
		$this->load->view('backend/index', $page_data);
	}



	function banner($param1='',$banner_id=''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$upload_path = './uploads/banner';

			$uppath = $upload_path;
			if (!(file_exists($uppath))) {
				mkdir($uppath, 0777, true);
			}
			$config = array(
				'upload_path'=>$uppath,
				'encrypt_name'=> TRUE,
				'allowed_types'=>'*',
				'overwrite' => FALSE,
			);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('flash_message' , get_phrase($this->upload->display_errors()));
			}else{
				$imageDetailArray = $this->upload->data();
				$data['file'] = base_url().$uppath .'/'. $imageDetailArray['file_name'];
				$data['type'] = $this->input->post('type');
				$data['title'] = $this->input->post('title');
				$data['description'] = $this->input->post('description');
				$data['time'] = time();
	
				$this->db->insert('banner',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/banner/'.$topic_id, 'refresh');

			}
		}

		if ($param1=='delete') {
			$files = $this->db->get_where('banner',array('banner_id'=>$banner_id))->row_array();
			
			$file1array = explode('/', $files['file']);
			$path1 = './uploads/banner/'.end($file1array);
			unlink($path1);
			$this->db->where('banner_id',$banner_id);
			$this->db->delete('banner');
			$this->session->set_flashdata('flash_message' , get_phrase('deleted_successfully'));
				redirect(base_url() . 'admin/banner', 'refresh');
		}

		$page_data['page_name']  = 'banner';
		$page_data['page_title'] = 'Banner';
		$this->load->view('backend/index', $page_data);
	}

	function vacancy($param1='',$vacancy_id=''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$upload_path = './uploads/vacancy';

			$uppath = $upload_path;
			if (!(file_exists($uppath))) {
				mkdir($uppath, 0777, true);
			}
			$config = array(
				'upload_path'=>$uppath,
				'encrypt_name'=> TRUE,
				'allowed_types'=>'*',
				'overwrite' => FALSE,
			);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('flash_message' , get_phrase($this->upload->display_errors()));
			}else{
				$imageDetailArray = $this->upload->data();
				$data['file'] = base_url().$uppath .'/'. $imageDetailArray['file_name'];
				$data['url'] = $this->input->post('url');
				$data['title'] = $this->input->post('title');
				$data['description'] = $this->input->post('description');
				$data['time'] = time();
	
				$this->db->insert('vacancy',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/vacancy/'.$topic_id, 'refresh');

			}
		}

		if ($param1=='delete') {
			$files = $this->db->get_where('vacancy',array('vacancy_id'=>$vacancy_id))->row_array();
			
			$file1array = explode('/', $files['file']);
			$path1 = './uploads/banner/'.end($file1array);
			unlink($path1);
			$this->db->where('banner_id',$banner_id);
			$this->db->delete('banner');
			$this->session->set_flashdata('flash_message' , get_phrase('deleted_successfully'));
				redirect(base_url() . 'admin/banner', 'refresh');
		}

		$page_data['page_name']  = 'vacancy';
		$page_data['page_title'] = 'Vacancy';
		$this->load->view('backend/index', $page_data);
	}

	function study_material($param1='',$material_id=''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
		if ($param1=='create') {
			$upload_path = './uploads/material';

			$uppath = $upload_path;
			if (!(file_exists($uppath))) {
				mkdir($uppath, 0777, true);
			}
			$config = array(
				'upload_path'=>$uppath,
				'encrypt_name'=> TRUE,
				'allowed_types'=>'*',
				'overwrite' => FALSE,
			);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('flash_message' , get_phrase($this->upload->display_errors()));
			}else{
				$imageDetailArray = $this->upload->data();
				$data['file'] = base_url().$uppath .'/'. $imageDetailArray['file_name'];
				$data['title'] = $this->input->post('title');
				$data['description'] = $this->input->post('description');
				$data['time'] = time();
	
				$this->db->insert('study_material',$data);
				$this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
				redirect(base_url() . 'admin/study_material/'.$topic_id, 'refresh');

			}
		}

		if ($param1=='delete') {
			$files = $this->db->get_where('study_material',array('material_id'=>$material_id))->row_array();
			
			$file1array = explode('/', $files['file']);
			$path1 = './uploads/material/'.end($file1array);
			unlink($path1);
			$this->db->where('material_id',$material_id);
			$this->db->delete('study_material');
			$this->session->set_flashdata('flash_message' , get_phrase('deleted_successfully'));
				redirect(base_url() . 'admin/study_material', 'refresh');
		}

		$page_data['page_name']  = 'study_material';
		$page_data['page_title'] = 'Study Material';
		$this->load->view('backend/index', $page_data);
	}



    
}

