<?php 
namespace sync667\SteamWebApi\Api;

use sync667\SteamWebApi\Api\AbstractSteamAPI;
use sync667\SteamWebApi\Util\SteamApiUtil;
use sync667\SteamWebApi\Constants\ApiModules;
use sync667\SteamWebApi\Constants\ApiMethods;
use sync667\SteamWebApi\Config\ApiConfiguration;
use sync667\SteamWebApi\Http\HTTPMethod;

/**
 * ISteamEconomyAPI class handles operations relating games' store's assets.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class ISteamEconomyAPI extends AbstractSteamAPI{

	/**
     *  Gets assets metadata.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetAssetClassInfo] [GetAssetClassInfo]
     *  @param $appId [Application ID for the game]
     *  @param $language [Language for the response, default value is 'en']
     *  @param $classCount [The number of classids passed to the request]
     *  @param $classIdN [Where N can be a series of sequential numbers to form a list of class IDs.]
     *  @return $response 
     *
     */
	public static function getAssetClassInfo($appId, $language='en', $classCount, $classIdN)
	{

		$parametersArray = array('appid' => $appId, 'language'=> $language, 'class_count'=>$classCount , 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat());
		
		for ($i=0; $i < sizeof($classIdN); $i++) { 
		 	$parametersArray["classid".$i] = $classIdN[$i];
		}

		$params = SteamApiUtil::formGETParameters($parametersArray);
		$module = ApiModules::ISteamEconomy;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetAssetClassInfo');
		$url = SteamApiUtil::formUrl($module,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}

    /**
     *  Gets prices of items in the economy.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetAssetPrices] [GetAssetPrices]
     *  @param $appId [Application ID for the game]
     *  @param $language [Language for the response, default value is 'en']
     *  @param $currency [code for currency default one is 'USD']
     *  @return $response 
     *
     */
	public static function getAssetPrices($appId, $language='en', $currency ='USD')
	{
		$params = SteamApiUtil::formGETParameters(array('appid' => $appId, 'language'=> $language, 'currency'=>$currency, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
		$module = ApiModules::ISteamEconomy;
		$endpoint = ApiMethods::getEndpointUrl($module, 'GetAssetPrices');
		$url = SteamApiUtil::formUrl($module,$endpoint);
		return parent::sendRequest(HTTPMethod::GET, $url, $params);
	}
}