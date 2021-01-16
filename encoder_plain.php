<?php

    $origURL = $_GET["url"];

    $strHash = hash("crc32", $origURL, false);

    if(!file_exists("/var/www/html/yarlyk/".$strHash)){

        $html = '<html><head><meta http-equiv="refresh" content="0; URL='.$origURL.'" /></head><body></body></html>';

        mkdir("/var/www/html/yarlyk/".$strHash);

        $myfile = fopen("/var/www/html/yarlyk/".$strHash."/index.html", "w") or die("Imposible guardar datos!");

        fwrite($myfile, $html);

        fclose($myfile);
    }

    echo 'http://yarlyk.xyz/'.$strHash;
?>