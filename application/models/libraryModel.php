<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LibraryModel extends CI_Model
{
    /*
     * Get All the book in library database and convert them into array
     */
    public function  getAllBooks()
    {
        $query = mysql_query("SELECT * FROM `librarybooks`");
        while ($fetch = mysql_fetch_array($query)) {
            $output[] = array($fetch['isbn'], $fetch['title'], $fetch['subject'], $fetch['author'], $fetch['eddition'], $fetch['publisher'],
                $fetch['copies'], $fetch['totalCopies'], $fetch['shelf_no']);
        }
        return $output;
    }

    /*
     * Retrive subject from data base and pushing data to Library controller as array
     */
    public function  getAllSubjects()
    {
        $query = mysql_query("SELECT * FROM `subjects`");
        while ($fetch = mysql_fetch_array($query)) {
            $output[] = array($fetch['subject_name']);

        }
        return $output;
    }

    /*
    * Retrive all not returned due books from data base and pushing data to Library controller as array
    */
    public function  dueBookToday()
    {
        $query = mysql_query("SELECT * FROM `librarybooks` LEFT JOIN `libraryborrow` ON `librarybooks`.`isbn` = `libraryborrow`.`isbn`
        LEFT JOIN `student_db` ON `libraryborrow`.`studentID` = `student_db`.`Index_No` WHERE `libraryborrow`.`due_date` = CURDATE() AND `libraryborrow`.`return`=0");
        while ($fetch = mysql_fetch_array($query)) {
            $output[] = array($fetch['isbn'], $fetch['title'], $fetch['subject'], $fetch['issue_date'], $fetch['due_date'], $fetch['Index_No'],
                $fetch['name']);

        }
        return $output;
    }

    /*
   * Retrieve non returned books for specific student from data base and pushing data to Library controller as array
   */
    public function  dueBookOfStudent($studentID)
    {
        $query = $this->db->query("SELECT * FROM `librarybooks` LEFT JOIN `libraryborrow` ON `librarybooks`.`isbn` = `libraryborrow`.`isbn`
        LEFT JOIN `student_db` ON `libraryborrow`.`studentID` = `student_db`.`Index_No` WHERE `libraryborrow`.`return`=0 AND  `libraryborrow`.`studentID`='$studentID'");

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $numberOfDays = $this->dateCounter($row->due_date);
            $output[] = array($row->isbn, $row->title, $row->issue_date, $row->due_date, $row->name, $numberOfDays);
        }
        return $output;
    }

    /*
     * Count the date when returning books
     */
    public function dateCounter($date)
    {
        $date1 = date_create($date);
        $date2 = date_create((new \DateTime())->format('Y-m-d'));
        $diff = date_diff($date1, $date2);

        $days = $diff->format("%R%a days");

        return $days;
    }

    /*
     * Function to insert data into database
     */
    public function insertDB($data1, $data)
    {
        $this->db->insert($data1['dat_table'], $data);
    }

    /*
     * Function to update tables in database
     */
    public function updateDB($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->set($data, FALSE);
        $this->db->update($table);

    }

    /*
     * Function to get categories from database
     */
    public function getCategories()
    {
        $query = $this->db->query("SELECT `subject_name` FROM `subjects`");
        return $query->result_array();
    }
}