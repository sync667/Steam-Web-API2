<?php
namespace sync667\SteamWebApi\Api;

use sync667\SteamWebApi\Api\AbstractSteamAPI;
use sync667\SteamWebApi\Util\SteamApiUtil;
use sync667\SteamWebApi\Constants\ApiModules;
use sync667\SteamWebApi\Constants\ApiMethods;
use sync667\SteamWebApi\Config\ApiConfiguration;
use sync667\SteamWebApi\Http\HTTPMethod;

/**
 * ISteamUserAPI class handles operations relating to Steam users.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class ISteamUserAPI extends AbstractSteamAPI{
    
    /**
     *  Gets friend list of the user.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetFriendList] [GetFriendList]
     *  @param $steamId [Steam ID of the user]
     *  @param $relationship [relationship name]
     *  @return $response 
     *
     */
	public static function getFriendList($steamId, $relationship)
	{
		$params = SteamApiUtil::formGETParameters(array('steamid' => $steamId, 'relationship'=> $relationship, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::ISteamUser;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetFriendList');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
     *  Gets player bans 
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetPlayerBans] [GetPlayerBans]
     *  @param $steamids [Number of steam ids comma seperated]
     *  @return $response 
     *
     */
	public static function getPlayerBans($steamids)
	{
		$parameters = array('steamids'=>'', 'key' => parent::getConfiguration()->getApiKey(),'format'=> parent::getConfiguration()->getResponseFormat());
		
		for ($i=0; $i < sizeof($steamids); $i++) { 
			$parameters['steamids'] .= ",".$steamids[$i];
		}

		$params = SteamApiUtil::formGETParameters($parameters);
        $module = ApiModules::ISteamUser;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetPlayerBans');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
     *  Gets player summaries for the given steam id
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetPlayerSummaries] [GetPlayerSummaries]
     *  @param $steamids [Number of steam ids comma seperated]
     *  @return $response 
     *
     */
	public static function getPlayerSummaries($steamids)
	{
		$parameters = array('steamids' => '', 'key' => parent::getConfiguration()->getApiKey(),'format'=> parent::getConfiguration()->getResponseFormat());
		
		for ($i=0; $i < sizeof($steamids); $i++) { 
			$parameters['steamids'] .= ",".$steamids[$i];
		}

		$params = SteamApiUtil::formGETParameters($parameters);
        $module = ApiModules::ISteamUser;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetPlayerSummaries');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
     *  Gets user's group as list
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetUserGroupList] [GetUserGroupList]
     *  @param $steamid [Steam ID for the user]
     *  @return $response 
     *
     */
	public static function getUserGroupList($steamid)
	{
		$params = SteamApiUtil::formGETParameters(array('steamid' => $steamid, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::ISteamUser;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetUserGroupList');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
	 * Resolves vanity URL parts to a 64 bit ID.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/ResolveVanityURL] [ResolveVanityURL]
     *  @param $vanityurl [The user's vanity URL that you would like to retrieve a steam ID]
     *  @return $response 
     *
     */
	public static function resolveVanityURL($vanityurl)
	{
		$params = SteamApiUtil::formGETParameters(array('key' => parent::getConfiguration()->getApiKey(), 'vanityurl' => $vanityurl, 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::ISteamUser;
        $endpoint = ApiMethods::getEndpointUrl($module, 'ResolveVanityURL');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}
}