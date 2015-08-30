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
            $output[] = array ($fetch['leave_id'],$fetch['emp_name'],$fetch['signature_id'],$fetch['leave_type_o'],$fetch['leave_type'],$fetch['leave_date'],$fetch['leave_date_to'],$fetch['leave_description']);
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

        $leaveAccepts = stripcslashes($_POST['leaveAccepts']);

        // Decode the JSON array
        $leaveAccepts = json_decode($leaveAccepts,TRUE);

            $this->load->model('dbaccess');
            $data['dat_table'] = 'leave';

            $where =array('leave_id'=>$leaveAccepts['leaveID']
               );
            $newRaw = array("accepted" => 1
            );

            $this->dbaccess->updateDB($data, $newRaw,$where);

        insertLeaveCount($leaveAccepts['sigID'],dateCounter($leaveAccepts['fromDate'],$leaveAccepts['toDate']),leaveType($leaveAccepts['leaveType']),$leaveAccepts['fromDate']);

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

    /*
     * used to update and make records of leave count
     * First check the record available for the specific month , signature id and leave type
     * Else create a new record for that
     */
    public function insertLeaveCount($signatureNo,$dateCount,$leaveType,$leaveDate)
    {
        $query = $this->db->query("SELECT `count` FROM `leavecount` where EXTRACT(MONTH from `leavecount`.`year&month`)=EXTRACT(MONTH from  now()) and EXTRACT(YEAR from `leavecount`.`year&month`)=EXTRACT(YEAR from  now()) and `leavecount`.`leaveType`='$leaveType' and `leavecount`.`signatureID`='$signatureNo'");

        //check if there any rows return else assign count 0
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $count =$row->count;
            $count=$count+$dateCount;
            $this->db->query("UPDATE `leavecount` SET `count`=$count   where EXTRACT(MONTH from `leavecount`.`year&month`)=EXTRACT(MONTH from  now()) and EXTRACT(YEAR from `leavecount`.`year&month`)=EXTRACT(YEAR from  now()) and `leavecount`.`leaveType`='$leaveType' and `leavecount`.`signatureID`='$signatureNo'");
        }
        else
        {
            $this->load->model('dbaccess');
            $data['dat_table'] = 'leaveCount';


            $myDateTime = new DateTime($leaveDate);
            $newDateString = $myDateTime->format('Y-m-d');



            $newRaw = array("signatureID" =>$signatureNo,
                "leaveType" => $leaveType,
                "count" =>$dateCount,
                "year&month" => $newDateString
            );

            $this->dbaccess->insertDB($data, $newRaw);

        }
    }

    /*
    * calculate no of working days
    */
    public function dateCounter($sdate,$edate)
    {
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

        return count($days);
    }

    public function leaveType($leaveType)
    {
        $lType="";
        if ($leaveType == "Casual") {
            $lType="c";
        } else if ($leaveType == "Duty") {
            $lType="d";
        }else if ($leaveType == "Sick") {
            $lType="s";
        }else if ($leaveType == "Paid") {
            $lType="p";
        }
        return $lType;
    }
}