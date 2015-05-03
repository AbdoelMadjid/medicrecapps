<?php
class Test_model extends CI_Model {

 function get_options($filter=''){

        switch($filter){
            case 1:
                $arr = array('option A', 'option B', 'option C');
            break;
            case 2:
                $arr = array('option D', 'option E', 'option F');
            break;
            case 3:
                $arr = array('option G', 'option H', 'option I');
            break;
            default: $arr = array('option Z');
        }

        return $arr;
    }
}
