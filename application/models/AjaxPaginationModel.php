<?php
class AjaxPaginationModel extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getEmployees($limit, $start) {
        $query = $this->db->get('posts', $limit, $start);
        return $query->result();
    }
}
?>