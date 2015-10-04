<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class StudentController extends CI_Controller
{

    public function index()
    {
        $this->viewStudentHome();
    }

    public function viewStudentHome()
    {
        $data['title']='DSSC Student Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu_student');
        $this->load->view('view_studentMark_Home');
        $this->load->view('style_Resources/footer');
    }

    public function viewStudent_search($data)
    {
        $data['title']='DSSC Student Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu_student');
        $this->load->view('view_student_search',$data);
        $this->load->view('style_Resources/footer');
    }

    public function viewStudent_enterMarks()
    {
        $data['title']='DSSC Student Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu_student');
        $this->load->view('view_studentMarks');
        $this->load->view('style_Resources/footer');
    }

    public function viewStudentReport()
    {
        $data['title']='DSSC Student Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu_student');
        $this->load->view('view_studentReport');
        $this->load->view('style_Resources/footer');
    }


    public function StudentSearch()
    {
        $indexNo=$this->input->post('txtIndexNo');
        $this->load->model("dbaccess");
        $data['query']="SELECT `student_db`.*, `student_exam_resutlt`.*, `studentbelongs`.*, `subjects`.* FROM `student_exam_resutlt`  JOIN `dssc_db`.`subjects` ON `student_exam_resutlt`.`subject_id` = `subjects`.`subject_id` JOIN `dssc_db`.`student_db` ON `student_exam_resutlt`.`sutdent_id` = `student_db`.`Index_No`  JOIN `dssc_db`.`studentbelongs` ON `student_db`.`Index_No` = `studentbelongs`.`student_id`  JOIN `dssc_db`.`student_class` ON `studentbelongs`.`class_id` = `student_class`.`id` WHERE  `student_db`.`Index_No`='$indexNo'";
        $data['results'] = $this->dbaccess->getAll($data);
        $this->viewStudent_search($data);
    }

    public function StudentMarkSearch()
    {
        $this->load->model("dbaccess");
        $grade=$this->input->post('select_grade');
        $class=$this->input->post('select_class');

        $data['query']="SELECT `student_db`.*, `student_class`.* FROM `student_class` JOIN `dssc_db`.`studentbelongs` ON `student_class`.`id` = `studentbelongs`.`class_id` JOIN `dssc_db`.`student_db` ON `studentbelongs`.`student_id` = `student_db`.`Index_No` WHERE `student_class`.`grade`='$grade' AND `student_class`.`class`='$class'";
        $data['results'] = $this->dbaccess->getAll($data);
       // $this->viewStudent_enterMarks($data);

        $data['title']='DSSC Student Management';
        $this->load->view('style_Resources/header',$data);
        $this->load->view('style_Resources/menu_student');
        $this->load->view('view_studentMarks',$data);
        $this->load->view('style_Resources/footer');
    }

    public function insertMarks()
    {
        $tableData = stripcslashes($_POST['pTableData']);

        $tableData = json_decode($tableData,TRUE);

        $this->load->model('dbaccess');
        $table= 'student_exam_resutlt';
        $vals= $tableData['term'];

        if($vals=="Term1") {
            $newRaw = array("subject_id" => $tableData['Subject'],
                "sutdent_id" => $tableData['IndexNo'],
                "term1" => $tableData['Marks']
            );
            $this->db->insert($table, $newRaw);
            $message = "Success Updated";
            $this->json_response(true, $message);
        }
        elseif("Term2"==$vals)
        {
            $subjectID=$tableData['Subject'];
            $studentID= $tableData['IndexNo'];
            $where = array('subject_id' => $subjectID, 'sutdent_id' => $studentID);

            $data = array('term2' => $tableData['Marks']);
            $this->db->where($where);
            $this->db->update($table, $data);
        }
        else{
            $subjectID=$tableData['Subject'];
            $studentID= $tableData['IndexNo'];
            $where = array('subject_id' => $subjectID, 'sutdent_id' => $studentID);

            $data = array('term3' => $tableData['Marks']);
            $this->db->where($where);
            $this->db->update($table, $data);
        }
    }

    public function prints()
    {
        $dat = (new DateTime())->format('Y-m-d');
        $this->load->model("dbaccess");
        $indexNo=$this->input->post('txtIndexNo');
        $data['query'] = "SELECT `student_exam_resutlt`.*, `subjects`.* FROM `student_exam_resutlt` JOIN `dssc_db`.`subjects` ON `student_exam_resutlt`.`subject_id` = `subjects`.`subject_id` WHERE `student_exam_resutlt`.`sutdent_id`='$indexNo'";
        $data['results'] = $this->dbaccess->getAll($data);

        $data['query1'] = "SELECT * FROM `student_db` WHERE `Index_No`='$indexNo'";
        $data['student']= $this->db->query($data['query1']);

        $this->load->view('print_studentReport', $data);
    }

    private function json_response($successful, $message)
    {
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        ));
    }

}
