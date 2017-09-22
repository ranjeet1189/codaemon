<?php

if (!defined('BASEPATH'))
    exite('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');

        $this->load->model('customers');
    }

    //To call this function for getting the info of all customers
    public function index($search = 'all') {
        if (!empty($_POST) && !empty($_POST['search']))
            $search = $_POST['search'];
        else if (!empty($search) && $search != 'all')
            $search = $search;
        else {
            $search = 'all';
        }

        if (!empty($_POST) && !empty($_POST['email_address'])) {
            $email_address = $_POST['email_address'];
            $this->session->set_userdata('email_address', $email_address);
        }
        if (!empty($_POST) && empty($_POST['email_address'])) {//if empty then
            $email_address = $_POST['email_address'];
            $this->session->set_userdata('email_address', $email_address);
        }

        if (!empty($_POST) && !empty($_POST['age'])) {
            $age = $_POST['age'];
            $this->session->set_userdata('age', $age);
        }

        if (!empty($_POST) && empty($_POST['age'])) {
            $age = $_POST['age'];
            $this->session->set_userdata('age', $age);
        }
        $email_address = $this->session->userdata('email_address');
        $age = $this->session->userdata('age');

        $base_url = base_url() . 'admin/customer/index/' . $search;
        $config['base_url'] = $base_url;
        $config['per_page'] = 5;
        $config['uri_segment'] = '5';
        if ($this->uri->segment(5) == "")
            $startCount = 0;
        else
            $startCount = $this->uri->segment(5);
        $this->data['allCustomers'] = $this->customers->getAllCustomers($search, $config['per_page'], $startCount, $email_address, $age);
        $count = $this->customers->countAllCustomers($search, $email_address, $age);
        $config['total_rows'] = $count;
        $this->data['total'] = $count;
        $this->pagination->initialize($config);
        $this->load->view('admin/customer/customers', $this->data);
    }

}

