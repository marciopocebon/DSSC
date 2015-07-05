<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->model("dbaccess");
		//$data['query']="SELECT `student_db`.*, `student_class`.* FROM `student_class` JOIN `dssc_db`.`studentbelongs` ON `student_class`.`id` = `studentbelongs`.`class_id` JOIN `dssc_db`.`student_db` ON `studentbelongs`.`student_id` = `student_db`.`Index_No`";
		//$data['results'] = $this->dbaccess->getAll($data);

		//$this->load->view('style_Resources/header');
		//$this->load->view('style_Resources/menu');
		$this->load->view('test');
		//$this->load->view('style_Resources/footer');
	}

	public function ifsets()
	{

	$query = mysql_query("select * from login_db");
while($fetch = mysql_fetch_array($query))
{
		$output[] = array ($fetch['name'],$fetch['password'],$fetch['role']);
}
echo json_encode($output);


	}

	private function json_response($successful, $message)
	{
		echo json_encode(array(
			'isSuccessful' => $successful,
			'message' => $message
		));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */