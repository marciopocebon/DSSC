<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AcceptListController extends CI_Controller
{

    public function index()
    {

        $this->viewAccList_Leave();
    }

    //accept view loader
    public function viewAccList_Leave()
    {
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_ApprovedList');
        $this->load->view('style_Resources/footer');

    }

    public function populateTable()
    {

        $query=mysql_query("SELECT * FROM `leave` LEFT JOIN `employee` ON `leave`.`user_id` = `employee`.`emp_id` WHERE `leave`.`accepted`=1");
        //$output
        while($fetch = mysql_fetch_array($query))
        {
            $output[] = array ($fetch['leave_id'],$fetch['emp_name'],$fetch['signature_id'],$fetch['leave_type'],$fetch['leave_description']);

        }
        echo json_encode($output);

    }
}