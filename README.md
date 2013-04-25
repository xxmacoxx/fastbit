Fastbit
============

It is a program that allows you to be able to quickly register the activities that often use Fitbit.
I assume the activities that are fixed, such as a lesson to be performed weekly.

This program use the following services, API, package.
* Fitbit
    * Service
        * http://www.fitbit.com/
    * Fitbit API
        * http://dev.fitbit.com
    * FitbitPHP
        * https://github.com/heyitspavel/fitbitphp
* Twitter
    * Service
        * http://twitter.com
    * Twitter API
        * https://dev.twitter.com/
    * codebird-php
        * https://github.com/mynetx/codebird-php
* Package
    * PECL :: Package :: oauth
        * http://pecl.php.net/package/oauth

 
1. Get Started
-----------------
### 1.1. Authentication key settings for each service.

You must register in advance activity.
Please create a data.json file in json format.
Example **fastbit_config.sample.php**:

```php
define("FITBIT_KEY", "XXXXXXXXXX");
define("FITBIT_SECRET", "XXXXXXXXXX");

define("TWITTER_KEY", "XXXXXXXXXX");
define("TWITTER_SECRET", "XXXXXXXXXX");

define("TWITTER_ACCESS_TOKEN", "XXXXXXXXXX");
define("TWITTER_ACCESS_TOKEN_SECRET", "XXXXXXXXXX");
```


### 1.2. Set of activities.

First, pre-registered activities.
Create a data.json file in json format.
Example **data.sample.json**:

```json
{
    "ShapeBoxig"  : {
        "name" : "ShapeBoxig", 
        "activityId" : "365236",
        "duration" : "3000000",
        "calories" : "434", 
        "startHour" : "21", 
        "startMinute" : "35"
    },
    "Kickboxing_sat"  : {
        "name" : "FIGHT DO", 
        "activityId" : "55002",
        "duration" : "3600000",
        "calories" : "465", 
        "startHour" : "20", 
        "startMinute" : "50"
    }
}
```
* name
    * The display items tweet.
* activityId
    * id of the activity, directory activity or intensity level activity.
* duration
    *  in milliseconds.
* calories
    * amount of calories defined manually.
* startHour
    *  hours in the format HH.
* startMinute
    * minutes in the format mm.

The information you configure, Please make sure you get the activity of the past getActivities method of Fitbit API.
http://dev.fitbit.com


 2. How to use ?
-----------------
Access to html/index.html, please select the button of activity that is displayed.

<img src="http://media.tumblr.com/d93209b40a95ae641c022fdf6841c507/tumblr_inline_mlrjeoupDc1qz4rgp.png" alt="index.html" width="200" />

It is useful to add  Website Icon on an iPhone 5 Home Screen.


licence
-----------------
Please follow the license of each for each library in the lib below.
