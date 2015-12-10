Steam Web API v.2
=============

Version will be updated by me to new Web API.

A wrapper library that allows you to send requests to Steam Web API implemented in `PHP Laravel Framework`.

This library simply takes arguments from method call and uses `GuzzleHttp` to send request Steam Web API and returns the response as expected.

It requires minimum `PHP 5.6` version.

## Installation

You can easily install this package via Composer:

* Add `"sync667/steam-web-api2": "2.*"` to your `composer.json` file.
```
{
   "require": {
		"sync667/steam-web-api2": "2.*"
	    }
}
```

* Type `composer update` on Terminal

* Ready to use!


## Usage

* Add the following namespace to your file
```
 use Epigra\SteamWebApi\Api\AbstractSteamAPI;
```

* Then, you need to initialize client with your Steam Web API credentials
```php  
 AbstractSteamAPI::init('http://api.steampowered.com', 'YOUR_API_KEY', 'YOUR_RESPONSE_FORMAT');
```
Note : Response format can be either json or xml.

* Once you initialize, select your API module and then call the appropriate method.

Let say we would like to get player items, then following code block will be fine for that purpose
```php
  $appID = ApplicationIDs::TeamFortress2;
  $steamID = 76561197962033671;
  $response = IEconItemsAPI::getPlayerItems($appID, $steamID);
  var_dump($response);
```
## More Info About Library
 
* As you may know, there are some modules of Steam Web API. These are all available in this library. 
 
Here is the list of class names and their namespaces that you can use.
 ```
  ISteamApps => 'Epigra\SteamWebApi\Api\ISteamApps'
  ISteamEconomy => 'Epigra\SteamWebApi\Api\ISteamEconomy' 
  ISteamNews => 'Epigra\SteamWebApi\Api\ISteamNews'
  ISteamRemoteStorage => 'Epigra\SteamWebApi\Api\ISteamRemoteStorage'
  ISteamUser => 'Epigra\SteamWebApi\Api\ISteamUser'
  ISteamUserStats => 'Epigra\SteamWebApi\Api\ISteamUserStats'
  IPlayerService => 'Epigra\SteamWebApi\Api\IPlayerService'
  ISteamWebAPIUtil => 'Epigra\SteamWebApi\Api\ISteamWebAPIUtil'
  IEconItems => 'Epigra\SteamWebApi\Api\IEconItems'
```
* On the other hand, some of API calls require application ids. You can use Steam Application IDs via `ApplicationIDs` class under `Epigra\SteamWebApi\Constants` namespace.
 
List of applications and their ids provided by the library: 

```
  CounterStrikeBeta = 260; 
  CounterStrikeGlobalOffensiveBeta = 710;
  TeamFortress2 = 440;
  TeamFortress2PublicBeta = 520;
  Dota2 = 570;
  Dota2InternalTest = 620;
  Dota2Beta = 205790;
  Portal2 = 620;
  Portal2Beta = 841;
```

e.g. You can easily get TeamFortress2 ID like following 
```php 
  ApplicationIDs::TeamFortress2;
```
* This library is well documented and can be reached from `docs/` directory. 
 
* For more information [Visit Steam Page](http://steamcommunity.com/dev).

## LICENSE
```
 Copyright 2014 Epigra
 Updated 2015 sync667

 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
```
