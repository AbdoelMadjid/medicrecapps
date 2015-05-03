<?php

/* file: application/views/sample_dropdown.php */


    echo form_open('insert');

        echo form_dropdown('field1', $arr_field1, NULL, 'id="field1" onchange="load_dropdown_content($(\'#field2\'), this.value)"');

        echo form_dropdown('field2', array('0' => '...'), NULL, 'id="field2"');

    echo form_close();

?>
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

function load_dropdown_content(field_dropdown, selected_value){
    var result = $.ajax({
        'url' : '<?php echo site_url('ajax_sample/get_dropdown_values'); ?>/' + selected_value,
        'async' : false
    }).responseText;
    field_dropdown.replaceWith(result);
}

</script>