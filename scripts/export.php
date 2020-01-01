<?php 

# Set Headers
header("Content-Description: File Transfer");
header("Content-type: application/json; charset=utf-8");
header('Content-Disposition: attachment; filename="export.json"');

# Call global variable for database access
require_once('../../../../wp-config.php');
global $wpdb;

$selectedTables = $_POST['tables'];
$json_array = array();

foreach($selectedTables as $selectedTablerow) {
    
    $eachTable = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."$selectedTablerow`", OBJECT_K);

    foreach($eachTable as $eachTablerow) {
        
        $json_array[] = array(
            $selectedTablerow => $eachTablerow
        );
    }
}

print_r(json_encode($json_array));