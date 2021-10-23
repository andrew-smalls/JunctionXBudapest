<?php

$link = 'https://journals.lww.com/annalsofsurgery/fulltext/2011/12000/nonintubated_thoracoscopic_lobectomy_for_lung.31.aspx';//https://news.cancerresearchuk.org/2009/08/24/high-impact-science-finding-faults-in-braf/'; 
$keywords = 'lung cancer,throat soarness'; //'cancer,treatment';

exec("python inner/install_imports.py $link $keywords", $output);

// foreach($output as $line){
//     echo $line . "\n";
// }
var_dump($output);
