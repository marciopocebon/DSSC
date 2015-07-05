<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LeaveEditController extends CI_Controller
{

    public function index()
    {
        $this->view();
    }

    public function view()
    {
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_editLeave');
        $this->load->view('style_Resources/footer');
    }

    public function dbSelect()
    {
        $query=mysql_query("SELECT * FROM `leave` LEFT JOIN `employee` ON `leave`.`user_id` = `employee`.`emp_id` WHERE `leave`.`accepted`=0");
        while($fetch = mysql_fetch_array($query))
        {
            $output[] = array ($fetch['leave_id'],$fetch['emp_name'],$fetch['signature_id'],$fetch['leave_type'],$fetch['leave_description']);
        }
        echo json_encode($output);

       // $this->view();
    }


    public function tableLink()
    {
        $data['leaveID'] = $this->input->get('index', TRUE);
        $id = $data['leaveID'];
        $this->load->model("dbaccess");
        $data['query'] = "SELECT * FROM `leave` LEFT JOIN `employee` ON `leave`.`user_id` = `employee`.`emp_id` WHERE `leave`.`leave_id`='$id' ";
        $data['result'] = $this->dbaccess->getAll($data);
        $this->editleave($data);
    }


    public function editleave($data)
    {
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_editLeave1');
        $this->load->view('style_Resources/footer');
    }

    public function leaveEdit()
    {
        $this->load->model('dbaccess');
        $data['dat_table'] = 'leave';

        $data =$this->input->post('txtLeaveID');
        $newRaw = array("leave_description" => $this->input->post('txtDescription')
        );

        //$this->dbaccess->Leave($data, $newRaw,$wh);
        $this->db->where('leave_id', $data);
        $this->db->update('leave',$newRaw);
        $this->dbSelect();
//        }
    }

    public function searchSigID()
    {
        $empID_txt = stripcslashes($_POST['empID']);

        // Decode the JSON array
        $empID_txt = json_decode($empID_txt,TRUE);

        // now $tableData can be accessed like a PHP array

        $this->load->model('dbaccess');

            $empID= $empID_txt['empID'];
         $query = $this->db->query("SELECT `emp_name` FROM `employee` WHERE `emp_id` ='$empID'");

        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $name =$row->emp_name;
        }
            $message = $name;
            $this->json_response(true, $message);

    }

    private function json_response($successful, $message)
    {
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        ));
    }
}