<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LeaveController extends CI_Controller
{
    /*
     * Get leave type via javascript and return number of leaves
     * available
     */
    public function getLeaveCount()
    {
        $leaveType = stripcslashes($_POST['leaveType']);

        // Decode the JSON array
        $leaveType = json_decode($leaveType,TRUE);

        // now $tableData can be accessed like a PHP array

        $this->load->model('dbaccess');

        $type= $leaveType['leaveType'];
        $signatureNo=$leaveType['signatureNo'];
        $query = $this->db->query("SELECT `count` FROM `leavecount` where EXTRACT(MONTH from `leavecount`.`year&month`)=EXTRACT(MONTH from  now()) and EXTRACT(YEAR from `leavecount`.`year&month`)=EXTRACT(YEAR from  now()) and `leavecount`.`leaveType`='$type' and `leavecount`.`signatureID`='$signatureNo'");

        //check if there any rows return else assign count 0
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $count =$row->count;
        }
        else
        {
            $count=0;
        }

        $message = $count;
        $this->json_response(true,$message);

    }

    /*
     * encode massage to json format and push that into view
     */
    private function json_response($successful, $message)
    {
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        ));
    }



    /*
     * calculate no of working days
     */
    public function dateCounter()
    {
        $days1 = stripcslashes($_POST['days']);

        // Decode the JSON array
        $days1 = json_decode($days1,TRUE);

        // now $tableData can be accessed like a PHP array
        $sdate= $days1['from'];
        $edate=$days1['to'];

        //Define out start and end dates
        $start = new DateTime($sdate);
        $end = new DateTime($edate);

        $interval = new DateInterval('P1D');
        $end->setTime(0, 0)->add($interval);
        //Define our holidays
        $holidays = array(

        );
        //Create a DatePeriod with date intervals of 1 day between start and end dates
        $period = new DatePeriod( $start, new DateInterval( 'P1D' ), $end );
        //Holds valid DateTime objects of valid dates
        $days = array();
        //iterate over the period by day
        foreach( $period as $day )
        {
            //If the day of the week is not a weekend
            $dayOfWeek = $day->format( 'N' );
            if( $dayOfWeek < 6 ){
                //If the day of the week is not a pre-defined holiday
                $format = $day->format( 'd-m-Y' );
                if( false === in_array( $format, $holidays ) ){
                    //Add the valid day to our days array
                    //This could also just be a counter if that is all that is necessary
                    $days[] = $day;
                }
            }
        }

        $message = count($days);
        $this->json_response(true,$message);
    }

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
        $this->json_response(TRUE,$message);

    }

}