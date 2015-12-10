<?php

namespace sync667\SteamWebApi\Api;

use Epigra\SteamWebApi\Api\AbstractSteamAPI;
use Epigra\SteamWebApi\Util\SteamApiUtil;
use Epigra\SteamWebApi\Constants\ApiModules;
use Epigra\SteamWebApi\Constants\ApiMethods;
use Epigra\SteamWebApi\Config\ApiConfiguration;
use Epigra\SteamWebApi\Http\HTTPMethod;

/**
 * IEconItemsAPI class handles operations relating to in-game items for supported games. 
 * Provides a concrete interface to perform such operations.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */

class IEconItemsAPI extends AbstractSteamAPI{

	/**
     *  Requests items of player from Steam API and returns as response.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetPlayerItems] [GetPlayerItems]
     *  @param $appId [Application ID for the game]
     *  @param $steamId [Steam ID of the user]
     *  @return $response 
     *
     */
	public static function getPlayerItems($appId, $steamId)
	{	
		$params = SteamApiUtil::formGETParameters(array('steamid'=> $steamId, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
		$module = ApiModules::IEconItems;
		$moduleUrl = ApiModules::IEconItems."_".$appId;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetPlayerItems');
		$url = SteamApiUtil::formUrl($moduleUrl,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

	/**
     *  Gets information about the items in a supporting game.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetSchema] [GetSchema]
     *  @param $appId [Application ID for the game]
     *  @param $language [Language for the response type. Default is 'en']
     *  @return $response 
     *
     */
	public static function getSchema($appId,$language='en')
	{
		$params = SteamApiUtil::formGETParameters(array('language'=> $language, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
		$module = ApiModules::IEconItems;
		$moduleUrl = ApiModules::IEconItems."_".$appId;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetSchema');
		$url = SteamApiUtil::formUrl($moduleUrl,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

	/**
     *  Returns a URL for the games' item_game.txt file.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetSchemaURL] [GetSchemaURL]
     *  @param $appId [Application ID for the game]
     *  @return $response 
     *
     */
	public static function getSchemaURL($appId)
	{
		$params = SteamApiUtil::formGETParameters(array('key' => parent::getConfiguration()->getApiKey(),'format'=> parent::getConfiguration()->getResponseFormat()));
		$module = ApiModules::IEconItems;
		$moduleUrl = ApiModules::IEconItems."_".$appId;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetSchemaURL');
		$url = SteamApiUtil::formUrl($moduleUrl,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

	/**
     *  Gets store status of the game.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetStoreMetadata] [GetStoreMetadata]
     *  @param $appId [Application ID for the game]
     *  @param $language [Language for the response type. Default is 'en']
     *  @return $response 
     *
     */
	public static function getStoreMetadata($appId,$language='en')
	{
		$params = SteamApiUtil::formGETParameters(array('language'=> $language, 'key' => parent::getConfiguration()->getApiKey(),'format'=> parent::getConfiguration()->getResponseFormat()));
		$module = ApiModules::IEconItems;
		$moduleUrl = ApiModules::IEconItems."_".$appId;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetStoreMetadata');
		$url = SteamApiUtil::formUrl($moduleUrl,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}
}