<?php
namespace sync667\SteamWebApi\Api;

use sync667\SteamWebApi\Api\AbstractSteamAPI;
use sync667\SteamWebApi\Util\SteamApiUtil;
use sync667\SteamWebApi\Constants\ApiModules;
use sync667\SteamWebApi\Constants\ApiMethods;
use sync667\SteamWebApi\Config\ApiConfiguration;
use sync667\SteamWebApi\Http\HTTPMethod;

/**
 * ISteamNewsAPI class handles operations relating to Steam news.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class ISteamNewsAPI extends AbstractSteamAPI{

	/**
     *  Gets news feed for various games.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetNewsForApp] [GetNewsForApp]
     *  @param $appId [Application ID for the game]
     *  @param $count [max number of news to be fetched]
     *  @param $maxlength [max length of the contents field]
     *  @param $endDate [Unix timestamp, returns posts before this date]
     *  @param $feeds [Commma-seperated list of feed names to return news for]
     *  @return $response 
     *
     */
	public static function getNewsForApp($appid, $count=20, $maxlength='', $endDate='', $feeds=[])
	{	$parameters = array('appid' => $appid, 'count'=> $count, 'maxlength'=>$maxlength, 'enddate'=> $endDate, 'format'=> parent::getConfiguration()->getResponseFormat());
		
		for ($i=0; $i < sizeof($feeds); $i++) { 
		 	$parameters["feeds".$i] = $feeds[$i];
		}

		$params = SteamApiUtil::formGETParameters($parameters);
		$module = ApiModules::ISteamNews;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetNewsForApp');
		$url = SteamApiUtil::formUrl($module,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}
}