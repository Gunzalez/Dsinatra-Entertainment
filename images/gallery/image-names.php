<?php
if ($handle = opendir('/wamp/www/websites/Dsinatra/images/gallery/rachel-ikehwame')) {
    /*    echo "Directory handle: $handle\n";
        echo "Entries:\n";*/

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        //echo "$entry". "\n";
        $value = str_replace('.jpg','', $entry);
        echo '<a href="images/gallery/rachel-ikehwame/' . $value . '.jpg"><img src="images/gallery/rachel-ikehwame/' . $value . '_small.jpg" alt="" /></a>';
        echo "\n";
    }



    closedir($handle);
}
?>
