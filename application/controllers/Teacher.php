<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher extends CI_Controller
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
    
    /***default functin, redirects to login page if no teacher logged in yet***/
    public function index()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('teacher_login') == 1)
            redirect(base_url() . 'index.php?teacher/dashboard', 'refresh');
    }
    
    /***TEACHER DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('teacher_dashboard');
        $this->load->view('backend/index', $page_data);
    }
    
    
    /*ENTRY OF A NEW STUDENT*/
    
    
    /****MANAGE STUDENTS CLASSWISE*****/
    function student_add()
	{
		if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
			
		$page_data['page_name']  = 'student_add';
		$page_data['page_title'] = get_phrase('add_student');
		$this->load->view('backend/index', $page_data);
	}

    function story_add()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
            
        $page_data['page_name']  = 'story_add';
        $page_data['page_title'] = get_phrase('Add_New_Story');
        $this->load->view('backend/index', $page_data);
    }

    function stories()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'stories';
        $page_data['page_title'] = get_phrase('Stories');
        $this->load->view('backend/index', $page_data);
    }

    function story($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        if ($param1 == 'create') {
            $data['name']           = $this->input->post('name');
            //$data['class_id']       = $this->input->post('class_id');
            //$data['course_id']            = $this->input->post('course_id');
            $data['topic_id']        = $this->input->post('topic_id');
            $data['description']          = $this->input->post('description');
            $data['time']          = time();
            $data['teacher_id'] = $this->session->userdata('teacher_id');
            
            $files = $_FILES['file_name'];
            $this->load->library('upload');
            $config['upload_path']   =  'uploads/stories/';
            $config['allowed_types'] =  '*';
            $_FILES['file_name']['name']     = uniqid().'.jpg';
            $_FILES['file_name']['type']     = $files['type'];
            $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
            $_FILES['file_name']['size']     = $files['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file_name');

            $data['file'] = $_FILES['file_name']['name'];
            

            $this->db->insert('stories', $data);
            $student_id = $this->db->insert_id();
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            //$this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?teacher/stories/', 'refresh');
        }

        if ($param1 == 'delete') {
           
            $this->db->where('st_id', $param2);
            $this->db->delete('stories');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?teacher/stories', 'refresh');
        }
    }

    function concept_add()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');    
        $page_data['page_name']  = 'concept_add';
        $page_data['page_title'] = get_phrase('Add_New_Concept');
        $this->load->view('backend/index', $page_data);
    }
    function concepts()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'concepts';
        $page_data['page_title'] = get_phrase('Concepts');
        $this->load->view('backend/index', $page_data);
    }

   function concept($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        if ($param1 == 'create') {
            $data['name']           = $this->input->post('name');
            $data['topic_id']        = $this->input->post('topic_id');
            $data['description']          = $this->input->post('description');
            $data['time']          = time();
            $data['teacher_id'] = $this->session->userdata('teacher_id');
            
            $files = $_FILES['file_name1'];
            $this->load->library('upload');
            $config['upload_path']   =  'uploads/concept/';
            $config['allowed_types'] =  '*';
            $file_name = uniqid().'.jpg';
            $_FILES['file_name']['name']     = $file_name;
            $_FILES['file_name']['type']     = $files['type'];
            $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
            $_FILES['file_name']['size']     = $files['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file_name');

            $data['file'] = $file_name;
            

            $this->db->insert('concept', $data);
            $student_id = $this->db->insert_id();
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            //$this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?teacher/concepts/', 'refresh');
        }

        if ($param1 == 'delete') {
           
            $this->db->where('conc_id', $param2);
            $this->db->delete('concept');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?teacher/concepts', 'refresh');
        }
    }

    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']        = $this->input->post('name');
            $data['email']       = $this->input->post('email');
            
            $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
            $this->db->update('teacher', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $this->session->userdata('teacher_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?teacher/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
            
            $current_password = $this->db->get_where('teacher', array(
                'teacher_id' => $this->session->userdata('teacher_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
                $this->db->update('teacher', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?teacher/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('teacher', array(
            'teacher_id' => $this->session->userdata('teacher_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    
	
	/****** DAILY ATTENDANCE *****************/
    function manage_attendance($class_id)
    {
        if($this->session->userdata('teacher_login')!=1)
            redirect(base_url() , 'refresh');

        $class_name = $this->db->get_where('class' , array(
            'class_id' => $class_id
        ))->row()->name;
        $page_data['page_name']  =  'manage_attendance';
        $page_data['class_id']   =  $class_id;
        $page_data['page_title'] =  get_phrase('manage_attendance_of_class') . ' ' . $class_name;
        $this->load->view('backend/index', $page_data);
    }

    function manage_attendance_view($class_id = '' , $section_id = '' , $timestamp = '')
    {
        if($this->session->userdata('teacher_login')!=1)
            redirect(base_url() , 'refresh');
        $class_name = $this->db->get_where('class' , array(
            'class_id' => $class_id
        ))->row()->name;
        $page_data['class_id'] = $class_id;
        $page_data['timestamp'] = $timestamp;
        $page_data['page_name'] = 'manage_attendance_view';
        $section_name = $this->db->get_where('section' , array(
            'section_id' => $section_id
        ))->row()->name;
        $page_data['section_id'] = $section_id;
        $page_data['page_title'] = get_phrase('manage_attendance_of_class') . ' ' . $class_name . ' : ' . get_phrase('section') . ' ' . $section_name;
        $this->load->view('backend/index', $page_data);
    }

   

    
    function video_add()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['page_name']  = 'video_add';
        $page_data['page_title'] = get_phrase('Add_New_Video');
        $this->load->view('backend/index', $page_data);
    }
    
    function videos($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        if ($param1 == 'create') {
            $data['title']           = $this->input->post('title');
            $data['class_id']       = $this->input->post('class_id');
            $data['course_id']            = $this->input->post('course_id');
            $data['topic_id']        = $this->input->post('topic_id');
            $data['description']          = $this->input->post('description');
            $data['time']          = time();
            $data['teacher_id'] = $this->session->userdata('teacher_id');
            
            $files = $_FILES['file_name'];
            $this->load->library('upload');
            $config['upload_path']   =  'uploads/videos/';
            $config['allowed_types'] =  '*';
            $file_name = uniqid().'.mp4';
            $_FILES['file_name']['name']     = $file_name;
            $_FILES['file_name']['type']     = $files['type'];
            $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
            $_FILES['file_name']['size']     = $files['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file_name');
 

            $data['file'] = $file_name;
            $files = $_FILES['file_name1'];
            $this->load->library('upload');
            $config['upload_path']   =  'uploads/thumbnail/';
            $config['allowed_types'] =  '*';

            $file_name1 = uniqid().'.jpg';
            $_FILES['file_name']['name']     = $file_name1;
            $_FILES['file_name']['type']     = $files['type'];
            $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
            $_FILES['file_name']['size']     = $files['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file_name');
            $data['thumbnail'] = $file_name1;
            $this->db->insert('videos', $data);
            $student_id = $this->db->insert_id();
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            //$this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?teacher/video_add/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['title']           = $this->input->post('title');
            $data['description']          = $this->input->post('description');
            $data['time']          = time();
            $this->db->where('video_id' , $param2);
            $this->db->update('videos' ,$data);

            $vid = $this->db->get_where('videos',array('video_id'=>$param2))->row_array();
            
            redirect(base_url() . 'index.php?teacher/manage_video', 'refresh');
        }

        if ($param1 == 'delete') {
            $video = $this->db->get_where('videos',array('video_id'=>$param2))->row_array();
            $this->db->where('video_id', $param2);
            $this->db->delete('videos');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?teacher/manage_video', 'refresh');
        }
    }


    function packages($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['class_id']    = $this->input->post('class_id');
            $data['course_id']   = $this->input->post('subject_id');
            $data['amount']         = $this->input->post('amount');
            $data['teacher_id'] = $this->session->userdata('teacher_id');
            $data['tax']         = $this->input->post('tax');
            $data['mrp']         = $this->input->post('amount')+$data['tax']*$data['amount']/100;
            $data['description']         = $this->input->post('description');
            $data['time']     = time();
            $this->db->insert('package', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?teacher/packages/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['amount']         = $this->input->post('amount');
            $data['mrp']         = $this->input->post('mrp');
            $data['description']         = $this->input->post('description');
            $data['time']     = time();

            $this->db->where('package_id', $param2);
            $this->db->update('package', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?teacher/packages/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('package_id', $param2);
            $this->db->delete('package');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?teacher/packages/', 'refresh');
        }
        $page_data['packages']   = $this->db->get_where('package',array('teacher_id'=>$this->session->userdata('teacher_id')))->result_array();
        $page_data['page_name']  = 'packages';
        $page_data['page_title'] = get_phrase('manage_package');
        $this->load->view('backend/index', $page_data);
    }
    
  

    function manage_video()
    {
        if($this->session->userdata('teacher_login')!=1)
            redirect(base_url() , 'refresh');

        $page_data['page_name']  =  'manager_video_view';
        $page_data['page_title'] =  get_phrase('manage_videos');
        $this->load->view('backend/index', $page_data);
    }
    /**********MANAGE LIBRARY / BOOKS********************/
    function book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['books']      = $this->db->get('book')->result_array();
        $page_data['page_name']  = 'book';
        $page_data['page_title'] = get_phrase('manage_library_books');
        $this->load->view('backend/index', $page_data);
        
    }
    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
    function transport($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['transports'] = $this->db->get('transport')->result_array();
        $page_data['page_name']  = 'transport';
        $page_data['page_title'] = get_phrase('manage_transport');
        $this->load->view('backend/index', $page_data);
        
    }
    
    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->insert('noticeboard', $data);
            redirect(base_url() . 'index.php?teacher/noticeboard/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);
            $this->session->set_flashdata('flash_message', get_phrase('notice_updated'));
            redirect(base_url() . 'index.php?teacher/noticeboard/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            redirect(base_url() . 'index.php?teacher/noticeboard/', 'refresh');
        }
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices']    = $this->db->get_where('noticeboard',array('status'=>1))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    
    /**********MANAGE DOCUMENT / home work FOR A SPECIFIC CLASS or ALL*******************/
    function document($do = '', $document_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        if ($do == 'upload') {
            move_uploaded_file($_FILES["userfile"]["tmp_name"], "uploads/document/" . $_FILES["userfile"]["name"]);
            $data['document_name'] = $this->input->post('document_name');
            $data['file_name']     = $_FILES["userfile"]["name"];
            $data['file_size']     = $_FILES["userfile"]["size"];
            $this->db->insert('document', $data);
            redirect(base_url() . 'teacher/manage_document', 'refresh');
        }
        if ($do == 'delete') {
            $this->db->where('document_id', $document_id);
            $this->db->delete('document');
            redirect(base_url() . 'teacher/manage_document', 'refresh');
        }
        $page_data['page_name']  = 'manage_document';
        $page_data['page_title'] = get_phrase('manage_documents');
        $page_data['documents']  = $this->db->get('document')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /*********MANAGE STUDY MATERIAL************/
    function study_material($task = "", $document_id = "")
    {
        if ($this->session->userdata('teacher_login') != 1)
        {
            $this->session->set_userdata('last_page' , current_url());
            redirect(base_url(), 'refresh');
        }
                
        if ($task == "create")
        {
            $this->crud_model->save_study_material_info();
            $this->session->set_flashdata('flash_message' , get_phrase('study_material_info_saved_successfuly'));
            redirect(base_url() . 'index.php?teacher/study_material' , 'refresh');
        }
        
        if ($task == "update")
        {
            $this->crud_model->update_study_material_info($document_id);
            $this->session->set_flashdata('flash_message' , get_phrase('study_material_info_updated_successfuly'));
            redirect(base_url() . 'index.php?teacher/study_material' , 'refresh');
        }
        
        if ($task == "delete")
        {
            $this->crud_model->delete_study_material_info($document_id);
            redirect(base_url() . 'index.php?teacher/study_material');
        }
        
        $data['study_material_info']    = $this->crud_model->select_study_material_info();
        $data['page_name']              = 'study_material';
        $data['page_title']             = get_phrase('study_material');
        $this->load->view('backend/index', $data);
    }
    
    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '') {
        if ($this->session->userdata('teacher_login') != 1)
        {
            $this->session->set_userdata('last_page' , current_url());
            redirect(base_url(), 'refresh');
        }

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?teacher/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?teacher/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }
    
    // MANAGE QUESTION PAPERS
    function question_paper($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('teacher_login') != 1)
        {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
                
        if ($param1 == "create")
        {
            $this->crud_model->create_question_paper();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?teacher/question_paper', 'refresh');
        }
        
        if ($param1 == "update")
        {
            $this->crud_model->update_question_paper($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?teacher/question_paper', 'refresh');
        }
        
        if ($param1 == "delete")
        {
            $this->crud_model->delete_question_paper($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?teacher/question_paper', 'refresh');
        }
        
        $data['page_name']  = 'question_paper';
        $data['page_title'] = get_phrase('question_paper');
        $this->load->view('backend/index', $data);
    }
}