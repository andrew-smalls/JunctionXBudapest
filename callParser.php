<?php

$link = 'https://news.cancerresearchuk.org/2009/08/24/high-impact-science-finding-faults-in-braf/'; 
$keywords = 'cancer,treatment';

exec("python inner/install_imports.py $link $keywords", $output);

foreach($output as $line){
    echo $line . "\n";
}
#var_dump($output);

#$command = escapeshellcmd('../inner/test.py');
#$output = shell_exec($command);
#echo $output;