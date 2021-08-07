<?php
    $origURL = $_GET["myurl"];

    $strHash = "";

    if($origURL != null){
        $origURL = strtolower($origURL);
        
        if(!(substr($origURL, 0, 4) == 'http')){
            $origURL = 'https://'.$origURL;
        }
        
        $strHash = hash("crc32", $origURL, false);
        
        if(!file_exists("/var/www/html/yarlyk/b/".$strHash)){

            $html = '<html><head><meta http-equiv="refresh" content="0; URL='.$origURL.'" /></head><body></body></html>';

            $myfile = fopen("/var/www/html/yarlyk/b/".$strHash, "w") or die("Imposible guardar datos!");

            fwrite($myfile, $html);

            fclose($myfile);
        }
        
        echo 'http://yarlyk.xyz/b/'.$strHash;
    }
?>