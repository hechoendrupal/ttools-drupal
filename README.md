TTools Drupal module 
============

This module provides integration with Twitter using the [TTools library](https://github.com/ttools/ttools) 

Installation
=====

Download TTools library
===
Add this requirement to your Drupal 8 installation composer.json file:

<pre>
{
    "require": {
            "ttools/ttools": "2.0.*@dev"
    }
}
</pre>

Download module 
===
<pre>
$ cd path/to/drupal8.dev/modules  
$ git clone https://github.com/jmolivas/ttools-drupal.git
</pre>

Usage
===
<pre>
* Open the OAuth Settings Form at `http://drupal8.dev/ttools/settings/oauth`
* Update using the keys of your twitter application.
 * consumer_key: application consumer key
 * consumer_secret: application consumer secret
 * access_token: user access token
 * access_token_secret: user access secret
* Get the keys you need to register your application at `http://dev.twitter.com`
* Set screen_name to load twitter user timeline.
* Set limit of items from user timeline to be listed. 
</pre>
