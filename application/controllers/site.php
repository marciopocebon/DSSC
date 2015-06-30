<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
        if (!$this->session->userdata('is_logged_in')) {
            redirect('loginController');
        }
    }
    
    public function index(){
            $this->Home();
    }

    public function redir()
    {
        redirect('welcome');
    }
    //leave management home loading
    public function viewLeave(){
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_leave1');
        $this->load->view('style_Resources/footer');
    }

    public function Home()
    {
        $data['title']='DSSC Home';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('Home');
        $this->load->view('style_Resources/footer');
    }

    public function StudentMarks()
    {
       redirect('studentController');
    }

    //prepare future leave
    public function viewMaLeave(){
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_fuLeave');
        $this->load->view('style_Resources/footer');
    }

    //make a leave today present employees
    public function viewToLeave(){
        $this->load->helper('url');
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_toLeave');
        $this->load->view('style_Resources/footer');
    }

    //edit leave form
    public function viewEditLeave(){
        redirect('leaveEditController');
    }

    //daily leave report
    public function viewDailyLeave(){
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_dailyReport');
        $this->load->view('style_Resources/footer');
    }

    //daily leave report
    public function viewMonthlyLeave(){
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_monthlyReport');
        $this->load->view('style_Resources/footer');
    }


    public function viewAccList_Leave(){
       redirect('acceptListController');
    }

//    public function getvalue()
//    {
//        $this->load->model("dbAccess");
//        $data['query']='SELECT * FROM leave';
//        $data['result']=$this->Model_get_db->getAll($data);
//        $this->load->view('view_db',$data);
//    }

    public function inserts()
    {
       // sleep(1);
        $this->load->library('form_validation');
        // echo 'this works';
        $this->form_validation->set_rules('txtSignatureNo', 'Number', 'required|max_length[3]|alpha_numeric');
       // $this->form_validation->set_rules('date','Date','callback_checkDateFormat');

        if ($this->form_validation->run() == FALSE) {
            $message = "<strong>error</strong>";
            $this->json_response(FALSE, $message);
        }
        else {
            $this->load->model('dbaccess');
            $data['dat_table'] = 'leave';

            $dateString = $this->input->post('txtDate');
            $myDateTime = new DateTime($dateString);
            $newDateString = $myDateTime->format('Y-m-d');

            $dateStringto = $this->input->post('txtToDate');
            $myDateTime = new DateTime($dateStringto);
            $newDateStringto = $myDateTime->format('Y-m-d');

            $newRaw = array("signature_id" => $this->input->post('txtSignatureNo'),
                "leave_description" => $this->input->post('txtDescription'),
                "leave_type" => $this->input->post('selectType'),
                "leave_type_o" => $this->input->post('select_leave_Type'),
                "leave_date" => $newDateString,
                "leave_date_to" => $newDateStringto,
                "user_id" => $this->input->post('txtSignatureNo')
            );

            $this->dbaccess->insertDB($data, $newRaw);

            $message = "<strong>Leave</strong> Created!";
            $this->json_response(TRUE, $message);
            // $this->viewEditLeave();
        }
        }




    public function viewAccept()
    {
        redirect('acceptController');
    }

    function checkDateFormat($date)
    {
        if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
            if (checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
                return true;
            else
                return false;
        } else {
            return false;
        }
    }

    private function json_response($successful, $message)
    {
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        ));
    }

    public function printing()
    {
       redirect('printController');
    }
    }
