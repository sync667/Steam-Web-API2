<?php

namespace sync667\SteamWebApi\Api;

use sync667\SteamWebApi\Api\AbstractSteamAPI;
use sync667\SteamWebApi\Util\SteamApiUtil;
use sync667\SteamWebApi\Constants\ApiModules;
use sync667\SteamWebApi\Constants\ApiMethods;
use sync667\SteamWebApi\Config\ApiConfiguration;
use sync667\SteamWebApi\Http\HTTPMethod;

/**
 * IPlayerServiceAPI class handles operations relating to Steam user's game.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class IPlayerServiceAPI extends AbstractSteamAPI{

    /**
     *  Gets information about the game for the given user that recently played.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetRecentlyPlayedGames] [GetRecentlyPlayedGames]
     *  @param $steamId [Steam ID of the user]
     *  @param $count [number of games that recently played]
     *  @return $response 
     *
     */
	public static function getRecentlyPlayedGames($steamId, $count)
	{
		$params = SteamApiUtil::formGETParameters(array('steamid' => $steamId, 'count'=>$count,'key' => parent::getConfiguration()->getApiKey(),'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::IPlayerService;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetRecentlyPlayedGames');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
     *  Gets information about the owned games for the given user.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetOwnedGames] [GetOwnedGames]
     *  @param $steamId [Steam ID of the user]
     *  @param $includeAppInfo 
     *  @param $includePlayedFreeGames 
     *  @param $appidsFilter [Application id's filter]
     *  @return $response 
     *
     */
    public static function getOwnedGames($steamId, $includeAppInfo, $includePlayedFreeGames, $appidsFilter=[])
    {
		$params = SteamApiUtil::formGETParameters(array('steamid' => $steamId, 'include_appinfo' => $includeAppInfo, 'include_played_free_games' => $includePlayedFreeGames, 'appids_filter' => $appidsFilter , 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::IPlayerService;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetOwnedGames');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}
    
    /**
     *  Returns Steam Level of the given user.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetSteamLevel] [GetSteamLevel]
     *  @param $steamId [Steam ID of the user]
     *  @return $response 
     *
     */
	public static function getSteamLevel($steamId)
	{
		$params = SteamApiUtil::formGETParameters(array('steamid' => $steamId,'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::IPlayerService;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetSteamLevel');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
     *  Gets user's bagdes.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetBadges] [GetBadges]
     *  @param $steamId [Steam ID of the user]
     *  @return $response 
     *
     */
	public static function getBadges($steamId)
	{
		$params = SteamApiUtil::formGETParameters(array('steamid' => $steamId, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::IPlayerService;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetBadges');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
     *  Gets information about community badge progress with given user and badge id.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetCommunityBadgeProgress] [GetCommunityBadgeProgress]
     *  @param $steamId [Steam ID of the user]
     *  @param $badgeId [Badge ID]
     *  @return $response 
     *
     */
	public static function getCommunityBadgeProgress($steamId, $badgeId)
	{
		$params = SteamApiUtil::formGETParameters(array('steamid' => $steamId, 'badgeid' => $badgeId, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::IPlayerService;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetCommunityBadgeProgress');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}
}