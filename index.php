<?php
    $origURL = $_POST["myurl"];

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
    }
?>

<html>
    <head>
        <title>Yarlyk: My URL shortener</title>
        
        <style>
            input[type=text] {
                border: 2px solid grey;
                border-radius: 6px;
                font-size: 32px;
                text-align: center;
            }
            
            #submit {
                background-color: #bbb;
                padding: .5em;
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                border-radius: 6px;
                color: #fff;
                text-decoration: none;
                border: none;
                font-size: 28px;
            }

            #submit:hover {
                border: none;
                background: orange;
                box-shadow: 0px 0px 1px #777;
            }
            
            .urlText{
                font-size: 24px;
                color: darkblue;
                text-decoration: none;
            }
            
            .mailto{
                font-size: 18px;
                color: darkblue;
                text-decoration: none;
            }
        </style>
        
        <style>
            .verticalhorizontal {
                vertical-align: middle;
            }
        </style>
        
        
    </head>
    
    <body>
        <center>
            <a href="http://yarlyk.xyz" target="_self"><img src="yarlyk.png" alt="Yarlyk" /></a>
            
            <p>
                <form action="index.php" method="post" target="_self">
                    <input type="text" name="myurl" id="myurl" size="40" placeholder="Enter your URL here" />
                    
                    <br /><br />
                    
                    <input type="submit" id="submit" value="Shorten URL" class="verticalhorizontal" />
                    <a><img src="googleplay.png" class="verticalhorizontal" height="70" width="280" alt="Get it on Google Play" /></a>
                </form>
            </p>
        
            <?php 
                if($origURL != null){
            ?>
        
            <p>
                Your requested URL:
                
                <div id="url" class="urlText"><a href="<?php echo $origURL; ?>" target="_blank">
                    <?php echo $origURL; ?>
                </a></div>
            </p>
            <p>
                was shortened to:
        
                <div id="shortened" class="urlText"><a href="<?php echo 'http://yarlyk.xyz/b/'.$strHash; ?>" target="_blank">
                    <?php echo 'http://yarlyk.xyz/b/'.$strHash; ?>
                </a></div>
            </p>

            <?php
                }
            ?>

            <p>
                <br /><br/>
                <span class="mailto">&copy; <a href="https://www.giancarlosantini.com">Giancarlo Santini</a> - M&eacute;xico 2021</span>
            </p>
        </center>
    </body>
</html>