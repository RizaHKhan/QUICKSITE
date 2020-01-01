<div class="quicksite">
    <h2 class="header">QUICKSITE</h2>
    <p>Thank you for choosing QUICKSITE for your database management system. We thrive to provide you with a <strong>one-click</strong>, <strong>it just works</strong>, functionality.</p>    

    <h2>Select Tables for Download:</h2>
    
    <?php 
        global $wpdb;
        $tables = $wpdb->tables();       
    ?>

    <form  name="export" action="<?php echo plugin_dir_url(__FILE__) . '../scripts/export.php' ?>" method="POST">
        <select class="tables" name="tables[]" multiple>
        <?php

        foreach($tables as $row) {
            $individualTable = str_replace($wpdb->prefix, '', $row);
            ?>
            <option value=<?php echo $individualTable ?>><?php print_r($individualTable); ?></option>
        <?php }

        ?>
        </select>
        <input class="button" type="submit" value="Download Database">
    </form>
</div>