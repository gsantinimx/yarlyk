#!/bin/sh

shortened=`curl -s http://yarlyk.xyz/encoder.php?myurl=$1`

echo $shortened