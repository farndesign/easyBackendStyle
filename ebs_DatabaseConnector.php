<?php

//TODO Refactor to classr
class ebsDatabaseConnector{

}

function setup_Database(){

	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'easyBackendStyle';

  	if ($wpdb->get_var("show tables like '" . $table_name . "'") != $table_name) {
  		$sql = "CREATE TABLE $table_name (
  		id mediumint(9) NOT NULL AUTO_INCREMENT,
    	Variable varchar(255) NOT NULL UNIQUE,
    	Value varchar(255) NOT NULL,
    	UNIQUE KEY id (id)
  	) $charset_collate;";

	  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	  dbDelta( $sql );

	 /**
  	 *	Setup default values
  	 */ 
	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'menuText',
	      'Value' => '#f0f0f1'
	    )
	  );

	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'baseMenu',
	      'Value' => '#1d2327'
	    )
	  );

	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'subMenu',
	      'Value' => '#2c3338'
	    )
	  );

	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'highlight',
	      'Value' => '#2271b1'
	    )
	  );

	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'notification',
	      'Value' => '#d63638'
	    )
	  );

  	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'background',
	      'Value' => '#f0f0f1'
	    )
	  );

  	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'links',
	      'Value' => '#2271b1'
	    )
	  );

  	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'buttons',
	      'Value' => '#2271b1'
	    )
	  );

  	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'formInputs',
	      'Value' => '#3582c4'
	    )
	  );

	  $wpdb->insert($table_name, 
	    array( 
	      'Variable' => 'customCSS',
	      'Value' => '<style></style>'
	    )
	  );
    }
}


//TODO NEEDS COMPLETION (check if it works!)
function checkFields(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'easyBackendStyle';

	$results = $wpdb->get_results('SELECT * FROM wp_easyBackendStyle', ARRAY_N);

	$databaseVariables = array();

	for ($x = 0; $x < count($results); $x++) {
  		//$out .= $results[$x][1].'<br>';
		$databaseVariables[] = $results[$x][1];
	}

	$defaultsMap = [
		'menuText' => '#f0f0f1',
		'baseMenu' => '#1d2327',
		'subMenu' => '#2c3338',
		'highlight' => '#2271b1',
		'notification' => '#d63638',
		'background' => '#f0f0f1',
		'links' => '#2271b1',
		'buttons' => '#2271b1',
		'formInputs' => '#3582c4',
		'customCSS' => '<style></style>'];

	foreach ($defaultsMap as $key => $value) {
		if(!in_array($key, $databaseVariables)){
		  $wpdb->insert($table_name, 
	    	array( 
	      	'Variable' => $key,
	      	'Value' => $value ));
		}
	}

	//return var_dump($defaultsMap);

}

function getValueFromDB($ebs_var){

	global $wpdb;
	$table_name = $wpdb->prefix . 'easyBackendStyle';

	$sql = "SELECT Value FROM wp_easyBackendStyle WHERE Variable = \"" . $ebs_var ."\";";

	$result = $wpdb->get_results($sql, ARRAY_N);

	return $result;
}

function saveValueInDB($ebs_value, $ebs_var){
	global $wpdb;
	$table_name = $wpdb->prefix . 'easyBackendStyle';

	$sql = "UPDATE wp_easyBackendStyle SET Value = \"". $ebs_value ."\" WHERE Variable = \"". $ebs_var ."\";";

	$result = $wpdb->get_results($sql, ARRAY_N);

	return $result;
}




?>