<?php 

# Set Headers
header("Content-Description: File Transfer");
header("Content-type: application/json; charset=utf-8");
header('Content-Disposition: attachment; filename="export.json"');

# Call global variable for database access
require_once('../../../../wp-config.php');
global $wpdb;

// $post = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."posts`", OBJECT_K);

// print_r($post);

$selectedTables = $_POST['tables'];
$output = array();

foreach($selectedTables as $selectedTablerow) {
    
    $eachTable = $wpdb->get_results("SELECT * FROM $selectedTablerow");

    array_push($output, $selectedTablerow);

    foreach($eachTable as $eachTablerow) {
        
        array_push($output, $eachTablerow);
    }
}

print_r($output);