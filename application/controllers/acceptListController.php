<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AcceptListController extends CI_Controller
{

    public function index()
    {

        $this->select();
    }

    //accept view loader
    public function viewAccList_Leave($data)
    {
        $data['title']='DSSC Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu');
        $this->load->view('view_ApprovedList');
        $this->load->view('style_Resources/footer');

    }

    public function select()
    {
        $this->load->model("dbaccess");
        $data['query']="SELECT * FROM `leave` LEFT JOIN `employee` ON `leave`.`user_id` = `employee`.`emp_id` WHERE `leave`.`accepted`=1";
        $data['results'] = $this->dbaccess->getAll($data);
        $this->viewAccList_Leave($data);
    }
}