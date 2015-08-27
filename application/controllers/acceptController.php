<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AcceptController extends CI_Controller
{

    public function index()
    {

        $this->viewAcceptLeave();
    }

    //accept view loader
    public function viewAcceptLeave()
    {
        $data['title'] = 'DSSC Management';
        $this->load->view('style_Resources/header', $data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_acceptLeave');
        $this->load->view('style_Resources/footer');
    }

    public function viewAcceptLeave1($data)
    {
        $data['title'] = 'DSSC Management';
        $this->load->view('style_Resources/header', $data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_acceptLeave1');
        $this->load->view('style_Resources/footer');
    }

    //retrieving data from the database
    public function select()
    {

        $query=mysql_query("SELECT * FROM `leave` LEFT JOIN `employee` ON `leave`.`user_id` = `employee`.`emp_id` WHERE `leave`.`accepted`=0");
        while($fetch = mysql_fetch_array($query))
        {
            $output[] = array ($fetch['leave_id'],$fetch['emp_name'],$fetch['signature_id'],$fetch['leave_type'],$fetch['leave_description']);
        }
        echo json_encode($output);
    }
    //search from date leave are for
    public function dateSearch()
    {
        $dateString = $this->input->post('table_search');
        $myDateTime = new DateTime($dateString);
        $newDateString = $myDateTime->format('Y-m-d');

        $this->load->model("dbaccess");
        $data['query'] = "SELECT * FROM `leave` LEFT JOIN `employee` ON `leave`.`user_id` = `employee`.`emp_id` WHERE `leave`.`accepted`=0 AND `leave`.`leave_date`='$newDateString'";
        $data['results'] = $this->dbaccess->getAll($data);
        $this->viewAcceptLeave($data);
    }

    public function update()
    {
        $this->load->model('dbaccess');
        $table = 'leave';
        $newRaw = array("signature_id" => $this->input->post('txtSignatureNo'),
            "leave_description" => $this->input->post('txtDescription'),
            "leave_type" => $this->input->post('selectType'),
        );

        $where=$this->input->get('index', TRUE);
        $this->dbaccess->updateDB($table, $newRaw,$where);

        $this->viewEditLeave();
    }


    public function acceptLeave()
    {

        $leaveID = stripcslashes($_POST['leaveID']);

        // Decode the JSON array
        $leaveID = json_decode($leaveID,TRUE);

            $this->load->model('dbaccess');
            $data['dat_table'] = 'leave';

            $where =array('leave_id'=>$leaveID
               );
            $newRaw = array("accepted" => 1
            );

            $this->dbaccess->updateDB($data, $newRaw,$where);

        $message = "<strong>Leave</strong> Accepted!";
        $this->json_response(TRUE, $message);

           // $this->acceptlist();
//        }
    }


    public function rejectLeave()
    {
        $leaveID = stripcslashes($_POST['leaveID']);

        // Decode the JSON array
        $leaveID = json_decode($leaveID,TRUE);

        $this->load->model('dbaccess');
        $data['dat_table'] = 'leave';

        $where =array('leave_id'=> $leaveID
        );
        $newRaw = array("accepted" => 2
        );

        $this->dbaccess->updateDB($data, $newRaw,$where);

        $message = "<strong>Leave</strong> Rejected!";
        $this->json_response(TRUE, $message);



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

}