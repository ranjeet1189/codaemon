<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    //This function is used for getting info of all customers
    function getAllCustomers($searchtext, $perpage, $startCount, $email_address, $age) {
        $this->db->select('*');
        if (!empty($searchtext) && $searchtext != "all") {
            $searchtext = addslashes(trim($searchtext));
            $this->db->like('c_name', $searchtext);
        }


        if (!empty($email_address)) {
            $email_address = trim($email_address);
            $this->db->like('c_email ', $email_address);
        }

        if (!empty($age)) {
            $age = trim($age);
            $searchSql = " ( YEAR(NOW()) - YEAR(customer.c_dob) ) $age ";
            $this->db->where($searchSql);
        }

        if ($perpage != '')
            $this->db->limit($perpage, $startCount);
        $this->db->order_by("c_id", "asc");
        $query = $this->db->get('customer');

        $rows = $query->num_rows();
        if ($rows > 0) {
            foreach ($query->result() as $result) {
                $allCustomers[] = $result;
            }
            return $allCustomers;
        } else {
            return false;
        }
    }

    //This function is used for counting the customers
    function countAllCustomers($searchtext, $email_address, $age) {
        $this->db->select('c_id');
        if (!empty($searchtext) && $searchtext != "all") {
            $searchtext = addslashes(trim($searchtext));
            $this->db->like('c_name', $searchtext);
        }


        if (!empty($email_address)) {
            $email_address = trim($email_address);
            $this->db->like('c_email ', $email_address);
        }

        if (!empty($age)) {
            $age = trim($age);
            $searchSql = " ( YEAR(NOW()) - YEAR(customer.c_dob) ) $age ";
            $this->db->where($searchSql);
        }

        $query = $this->db->get('customer');
        $count = $query->num_rows();
        return $count;
    }

}