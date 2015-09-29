<?php
/**
 * Created by PhpStorm.
 * User: wageeshwara
 * Date: 3/15/2015
 * Time: 8:21 PM
 */
class DBAccess extends CI_Model
{

    public function  getAll($data)
    {
        $query = $this->db->query($data['query']);
        //    ->result_array();
        return $query->result_array();
    }

    public function  get($data)
    {
        $query = $this->db->query($data['query']);
        //    ->result_array();
        return $query->result;
    }

    public function insertDB($data1,$data)
    {
        $this->db->insert($data1['dat_table'], $data);
    }

    public function updateDB($table,$data,$where)
    {
        $this->db->update($table['dat_table'], $data, $where);
    }

    public function Leave($table,$data,$wh)
    {
        $this->db->update($table['dat_table'], $data, $wh['leave_id']);
    }

    public function deleteDB($table,$where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


}