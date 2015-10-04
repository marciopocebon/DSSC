<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function index()
    {
        $this->loginView();
    }

    //login page
    public function loginView()
    {
        $this->load->view('login_view');
    }

    public function validating()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Name', 'required|max_length[100]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            redirect('loginController/error');
        } else {

            $is_a_user = $this->login_Model->validatelogin($this->input->post('username'), $this->input->post('password'));
           // $is_user = $this->login_Model->validatelogin($s,$d);

            if ($is_a_user) {
                $name = $this->input->post('username');
                $role = $this->login_Model->User_role($name);

                $data = array(
                    'name' => $name,
                    'is_logged_in' => TRUE,
                    'is_admin' => FALSE,
                    'role'=>$role
                );
                $this->session->set_userdata($data);
                if($role=='i')
                {
                    redirect('libraryController');
                }
                else {
                    redirect('site');
                }
            } else {
                redirect('loginController/error');
            }
        }
    }

    public function error()
    {
        $this->load->view('login_view', array('error' => TRUE));
    }

    public function logout()
    {
        if (!$this->is_logged_in()) {
            redirect('loginController');
        } else {
            $this->session->set_userdata(array('is_logged_in' => FALSE));
            $this->session->sess_destroy();
            redirect('loginController');
        }
    }

    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }

}