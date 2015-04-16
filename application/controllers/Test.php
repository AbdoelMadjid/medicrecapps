<?php
class Test extends CI_Controller {

    public function __construct() {

        parent::__construct();


    }

    public function index() {

        $this->load->view('test_view');

    }

    public function do_search() {
     
        $this->load->view('search_results_view');
    }
}
?>