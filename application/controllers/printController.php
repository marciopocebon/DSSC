<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PrintController extends CI_Controller
{

    public function index()
    {
        $this->select();
    }


    public function select()
    {
		$dates= new DateTime();
        $dat=$dates->format('Y-m-d');
       // $dat=(new DateTime())->format('Y-m-d');
        $this->load->model("dbaccess");
        $data['query']="SELECT * FROM `leave` LEFT JOIN `employee` ON `leave`.`user_id` = `employee`.`emp_id` WHERE `leave`.`leave_date`='$dat'";
        //$data['query'] = "SELECT * FROM `leave` WHERE `accepted`=0";
        $data['results'] = $this->dbaccess->getAll($data);
        $this->printreport($data);
    }

    public function printreport($data)
    {
        $this->load->view('print_report',$data);
    }

}