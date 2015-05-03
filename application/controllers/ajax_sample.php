<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_sample extends CI_Controller {


/* file: application/controllers/ajax_sample.php */

    function test_dropdown(){
        $data = array();

        $data['arr_field1'] = array(
            1 => 'option 1',
            2 => 'option 2',
            3 => 'option 3',
        );

        $this->load->helper('form');

        $this->load->view('sample_dropdown', $data);
    }

    function get_dropdown_values($filter){

        $this->load->model('test_model');

        $result = $this->test_model->get_options($filter);

        $this->load->helper('form');

        echo form_dropdown('field2', $result, NULL, 'id="field2"');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
