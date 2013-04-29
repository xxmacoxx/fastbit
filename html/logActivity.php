<?php
require_once ('lib/codebird-php-master/src/codebird.php');
require_once ('lib/fitbitphp-master/fitbitphp.php');
require_once ('../fastbit_config.php');

// Fitbit setting
$callback_url = "http://".$_SERVER["HTTP_HOST"]."/index.html";
$fitbit = new FitBitPHP(FITBIT_KEY, FITBIT_SECRET);
$fitbit->initSession($callback_url);
date_default_timezone_set('Asia/Tokyo');

// Twitter setting
Codebird::setConsumerKey(TWITTER_KEY, TWITTER_SECRET); 
$cb = Codebird::getInstance();
$cb->setToken(TWITTER_ACCESS_TOKEN, TWITTER_ACCESS_TOKEN_SECRET);

// Get activity parameter
$activity = htmlspecialchars($_GET["activity"]);

// Get actibity data
$data_url = "data.json";  
$json = file_get_contents($data_url,true);

if ($json == false) {
   echo "Failed to get actbity-data.";
   return;
} 

$activities = json_decode($json);
  

// Set fitbit parameter
$date = date_create();
date_time_set($date, $activities->$activity->{'startHour'}, $activities->$activity->{'startMinute'});
$activityId = $activities->$activity->{'activityId'};
$duration = $activities->$activity->{'duration'};
$calories = $activities->$activity->{'calories'};
$activityName = $activities->$activity->{'name'};

// Post Fitbit Activity
$xml = $fitbit->logActivity($date, $activityId, $duration, $calories);


// Set twitter parameter
$status = 'Burned ' . $calories . ' calories! : ' . $activityName .' (' . $duration/60000 . 'min) #Fitstats ';

// Post Tweet
$param = array('status' => $status);
$reply = (array) $cb->statuses_update($param);


echo $xml->activityLog->name .' (' . ($xml->activityLog->duration)/60000 .'min) done !';
echo '<hr>';
echo 'twitter_httpstatus : ' . $reply['httpstatus'];

