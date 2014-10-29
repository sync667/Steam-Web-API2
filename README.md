Steam Web API
=============

A wrapper library that allows you to send requests to Steam Web API implemented in PHP language


## Installation

You can easily install this package via Composer:

* Add `"epigra/steam-web-api": "1.0.0"` to your `composer.json` file.

```
{
    "require": {
		"epigra/steam-web-api": "1.0.0"
	}
}
```

* Type `composer update` on Terminal

* Ready to use!


## Usage

* Add the following namespace to your file

```php
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

## LICENSE
```
 Copyright 2014 Epigra

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