<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>CodeIgniter chained dropdowns</h1>

	<div id="body">
		<p>This page illustrates my technique for chaining multiple dropdown boxes, via AJAX and CodeIgniter.  Essentially, when the onchange event fires for the first dropdown, it initiates an AJAX request.  The AJAX request passes the State that was selected to another CodeIgniter controller method.  That method requests all of the possible zip codes for the state, from the Model.  Once it receives the data from the Model, then it "echo"s the data as the response to the AJAX request.  Finally, the javascript takes the response, empties the second dropdown, and re-fills it with the data from the response.  Right now, actually submitting the form just 404's, since this is really all about setting up the form.</p>
        <?php
            echo form_open('welcome/handle_submission');
        ?>
        <?php
            $state_options = array('Choose a State');
            foreach($all_states as $state){
                $state_options[$state->state_abbr] = $state->state_abbr;
            }

            echo form_label('Choose a state: ', 'states');
            echo form_dropdown('states', $state_options, '', 'id="statedrop"');
            echo form_label('Choose a zip code: ', 'zips');
            echo form_dropdown('zips', array('Choose a State First'), '', 'id="zipdrop"');
            echo br(3);
            echo form_submit('zipsubmit', 'Get Data');

        ?>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>js/dropdown.js"></script>
</body>
</html>
