<?php
$folder = 'mwai-2014/grand-finale';

if ($handle = opendir('/wamp/www/websites/Dsinatra/images/gallery/'. $folder .'/')) {
    /*    echo "Directory handle: $handle\n";
        echo "Entries:\n";*/
    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        //echo "$entry". "\n";
        $value = str_replace('.jpg','', $entry);
        echo '<a href="images/gallery/'. $folder .'/large/' . $value . '.jpg"><img src="images/gallery/'. $folder .'/' . $value . '.jpg" alt="" /></a>';
        echo "\n";
    }
    closedir($handle);
}
?>
