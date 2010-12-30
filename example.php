<?php

require_once 'src/phpOpenNOS/OpenNOS.php';

$nos = new phpOpenNOS\OpenNOS('API-key');

//$articles = $nos->getLatestArticles();
//var_dump($articles);

//$videos = $nos->getLatestVideos(phpOpenNos\OpenNOS::SPORT);
//var_dump($videos);

//$audios = $nos->getLatestAudio(phpOpenNos\OpenNOS::SPORT);
//var_dump($audios);

//$documents = $nos->search('Nederland');
//var_dump($documents);

//$tv = $nos->getTvBroadcast('2010-12-15', '2010-12-20', 'NL1');
//var_dump($tv);

$radio = $nos->getRadioBroadcast('2010-12-01', '2010-12-03');
var_dump($radio);