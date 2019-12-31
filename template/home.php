<div class="quicksite">
    <h1 class="header">QUICKSITE</h1>
    <p>Thank you for choosing QUICKSITE for your database management system. We thrive to provide you with one-click functionality where you simply have to click and the magic happens.</p>
    

    <h2>Select Tables for Download:</h2>
    
    <?php 
        global $wpdb;
        $tables = $wpdb->tables();
    ?>

    <p>Click below to download your database:</p>
    <form  name="export" action="<?php echo plugin_dir_url(__FILE__) . '../scripts/export.php' ?>" method="POST">
        <select class="tables" name="tables[]" multiple>
        <?php

        foreach($tables as $row) {
            ?>
            <option value=<?php echo $row ?>><?php print_r($row); ?></option>
        <?php }

        ?>
        </select>
        <input class="button" type="submit" value="Download Database">
    </form>
</div>