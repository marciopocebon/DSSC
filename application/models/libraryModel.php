<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LibraryModel extends CI_Model
{

    public function  getAllBooks()
    {
        $query=mysql_query("SELECT * FROM `librarybooks`");
        while($fetch = mysql_fetch_array($query))
        {
            $output[] = array ($fetch['isbn'],$fetch['title'],$fetch['subject'],$fetch['author'],$fetch['eddition'],$fetch['publisher'],$fetch['copies'],$fetch['shelf_no']);

        }
        return $output;
    }
}