<div class="quicksite">
        
    <h1 class="header">QUICKSITE</h1>
    <p>Please copy/paste your JSON formatted data below in order to add it to the database</p>
    <?php 
        global $wpdb;        
    ?>   
    <p>This datababase's prefix is: <strong><?php echo $wpdb->prefix; ?></strong></p>
    <form  name="import" action="<?php echo plugin_dir_url(__FILE__) . '../scripts/import.php' ?>" method="POST">
        <textarea name="json-data" id="json-data" cols="30" rows="10"></textarea>
        <input type="submit" value="Upload">
    </form>
</div>