<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web extends CI_Controller
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
    

    function index()
    {
        
        $page_data['page_name']  = 'index';
        $page_data['page_title'] = get_phrase('Home Page');
        $this->load->view('front/index', $page_data);
    }

    function contact()
    {
        
        $page_data['page_name']  = 'contact';
        $page_data['page_title'] = get_phrase('Contact Us');
        $this->load->view('front/index', $page_data);
    }

    function about()
    {
        
        $page_data['page_name']  = 'about';
        $page_data['page_title'] = get_phrase('About Us');
        $this->load->view('front/index', $page_data);
    }

    function newsletter()
    {
        
        $data['email'] = $this->input->post('email');
        $data['time'] = time();
        $check = $this->db->get_where('newsletter',array('email'=>$data['email']));
        if ($check->num_rows() < 1) {
            $this->db->insert('newsletter',$data);
            $this->session->set_flashdata('message','Successfully Added to newsletter');
            redirect(base_url(),'refresh');
        }else{
            $this->session->set_flashdata('message','Already Added to newsletter');
            redirect(base_url(),'refresh');
        }
    }

    function courses()
    {
        
        $page_data['page_name']  = 'courses';
        $page_data['page_title'] = get_phrase('Our Courses');
        $this->load->view('front/index', $page_data);
    }

    function study_material()
    {
        
        $page_data['page_name']  = 'study_material';
        $page_data['page_title'] = get_phrase('Download Study Material');
        $this->load->view('front/index', $page_data);
    }
    function vacancy()
    {
        
        $page_data['page_name']  = 'Vacancy';
        $page_data['page_title'] = get_phrase('Vacancy');
        $this->load->view('front/index', $page_data);
    }
     

}