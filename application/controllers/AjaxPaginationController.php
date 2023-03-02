<?php
class AjaxPaginationController extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model('AjaxPaginationModel');
    }

    function index() {
        //pagination settings
        $config['base_url'] = site_url('AjaxPaginationController/index');
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = '5';
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // fetch employees list
        $data['results'] = $this->AjaxPaginationModel->getEmployees($config['per_page'], $data['page']);       
        // create pagination links
        $data['links'] = $this->pagination->create_links();
        if($this->input->post('ajax')) {
            $this->load->view('Data', $data);
        } else {
            $this->load->view('AjaxPaginationView', $data);
        }
    }
}
?>