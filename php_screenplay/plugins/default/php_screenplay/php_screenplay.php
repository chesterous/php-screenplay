<?php
# copied greetings and greetings-evening classes from greetings css
# and fa and fa-moon-o
# will replace later
$file_list = array("bones", "cats");
?>
<div class="greetings greetings-evening">
		<div class="row">
        	<div class="col-md-6">
				<p><?php echo ossn_print("php_screenplay:intro", array(ossn_loggedin_user()->first_name));?></p>
                <p>Your files:</p>
                <?php echo join(" ", $file_list) ?>
                <?php echo "url... " . ossn_site_url("components/php_screenplay/screenplays/sample.txt") ?>
                
           </div>
         	<div class="col-md-6">
	        	<span class="icon"><i class="fa fa-moon-o"></i></span>
           	</div> 
        </div>    
</div>