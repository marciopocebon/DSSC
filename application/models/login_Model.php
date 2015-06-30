<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: wageeshwara
 * Date: 6/7/2015
 * Time: 3:44 PM
 */
class Login_Model extends CI_Model
{
   public function validatelogin($username,$password)
   {
       $check = $this->db->get_where('login_db', array('name' => $username, 'password' => $password));
       return ($check->num_rows == 1) ? TRUE : FALSE;
   }

    public function  User_role($username)
    {
        $query = $this->db->query("SELECT `role` FROM `login_db` where `name`='$username'");

        if ($query->num_rows() > 0)
        {
            $row = $query->row();

             $role =$row->role;
        }
        return $role;
    }
}