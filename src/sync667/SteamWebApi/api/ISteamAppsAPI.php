<?php

namespace sync667\SteamWebApi\Api;

use sync667\SteamWebApi\Api\AbstractSteamAPI;
use sync667\SteamWebApi\Util\SteamApiUtil;
use sync667\SteamWebApi\Constants\ApiModules;
use sync667\SteamWebApi\Constants\ApiMethods;
use sync667\SteamWebApi\Config\ApiConfiguration;
use sync667\SteamWebApi\Http\HTTPMethod;

/**
 * ISteamAppsAPI class handles operations relating to Steam apps.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class ISteamAppsAPI extends AbstractSteamAPI{

    /**
     *  Gets full list of every publicly facing program in the store/library.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetAppList] [GetAppList]
     *  @param $appId [Steam ID of the user]
     *  @param $name [relationship name]
     *  @return $response 
     *
     */
	public static function getAppList($appId, $name=''){
		$params = SteamApiUtil::formGETParameters(array('appid' => $appId, 'name'=> $name, 'format'=> parent::getConfiguration()->getResponseFormat()));
		$module = ApiModules::ISteamApps;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetAppList');
		$url = SteamApiUtil::formUrl($module,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}
    
    /**
     *  Gets all steam-compatible servers related to a IPv4 Address.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetServersAtAddress] [GetServersAtAddress]
     *  @param $address [IPv4 Address]
     *  @return $response 
     *
     */
	public static function getServersAtAddress($address){
		$params = SteamApiUtil::formGETParameters(array('addr' => $address, 'format'=> parent::getConfiguration()->getResponseFormat()));
		$module = ApiModules::ISteamApps;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetServersAtAddress');
		$url = SteamApiUtil::formUrl($module,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
	 * Checks if a given app version is the most current available.
	 *  @link [https://wiki.teamfortress.com/wiki/WebAPI/UpToDateCheck] [UpToDateCheck]
     *  @param $appId [Application ID for the game]
     *  @param $version [current version]
     *  @return $response 
     *
     */
	public static function upToDateCheck($appId, $version){
		$params = SteamApiUtil::formGETParameters(array('appid' => $appId, 'version'=> $version, 'format'=> parent::getConfiguration()->getResponseFormat()));
		$module = ApiModules::ISteamApps;
		$endpoint = ApiMethods::getEndpointUrl($module, 'UpToDateCheck');
		$url = SteamApiUtil::formUrl($module,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}
}