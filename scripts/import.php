<?php

$assoc_array = json_decode($_POST['json-data'], true);

# Call global variable for database access
require_once('../../../../wp-config.php');
global $wpdb;

foreach($assoc_array as $row) {
        
    foreach($row as $individual) {
        
        $wpdb->insert($wpdb->prefix.array_keys($row)[0], $individual);
        
    }
}
