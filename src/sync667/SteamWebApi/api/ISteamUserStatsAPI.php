<?php 
namespace sync667\SteamWebApi\Api;

use sync667\SteamWebApi\Api\AbstractSteamAPI;
use sync667\SteamWebApi\Util\SteamApiUtil;
use sync667\SteamWebApi\Constants\ApiModules;
use sync667\SteamWebApi\Constants\ApiMethods;
use sync667\SteamWebApi\Config\ApiConfiguration;
use sync667\SteamWebApi\Http\HTTPMethod;

/**
 * ISteamUserStatsAPI class handles operations relating to user statistics.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class ISteamUserStatsAPI extends AbstractSteamAPI{

    /**
     *  Gets statistics to show how much of the player base have unlocked various achievements.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetGlobalAchievementPercentagesForApp] [GetGlobalAchievementPercentagesForApp]
     *  @param $gameId [The ID of the game to retrieve achievement percentages for. This can be the ID of any Steamworks game with achievements available]
     *  @return $response 
     *
     */
	public static function getGlobalAchievementPercentagesForApp($gameId){
		$params = SteamApiUtil::formGETParameters(array('gameid' => $gameId, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::ISteamUserStats;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetGlobalAchievementPercentagesForApp');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
    }

    /**
     *  Gets global statistics about the game
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetGlobalStatsForGame] [GetGlobalStatsForGame]
     *  @param $appId [Application ID of the game]
     *  @param $count [max number of stats]
     *  @param $names [name of desired statistics]
     *  @return $response 
     *
     */
    public static function getGlobalStatsForGame($appid, $count, $names)
    {
      $parameters = array('appid' => $appid, 'count' => $count, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat());

      for ($i=0; $i < sizeof($names) ; $i++) { 
          $parameters["name".$i] = $names[$i];
      }

      $params = SteamApiUtil::formGETParameters($parameters);
      $module = ApiModules::ISteamUserStats;
      $endpoint = ApiMethods::getEndpointUrl($module, 'GetGlobalStatsForGame');
      $url = SteamApiUtil::formUrl($module,$endpoint);
      return parent::sendRequest(HTTPMethod::GET, $url, $params);
    }

    /**
     *  Returns the current number of players for an app.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetNumberOfCurrentPlayers] [GetNumberOfCurrentPlayers]
     *  @param $appId [Application ID of the game]
     *  @return $response 
     *
     */
    public static function getNumberOfCurrentPlayers($appId)
    {
       $params = SteamApiUtil::formGETParameters(array('appid' => $appId, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
       $module = ApiModules::ISteamUserStats;
       $endpoint = ApiMethods::getEndpointUrl($module, 'GetNumberOfCurrentPlayers');
       $url = SteamApiUtil::formUrl($module,$endpoint);
       return parent::sendRequest(HTTPMethod::GET, $url, $params);
    } 

   /**
     *  Gets player achievements .
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetPlayerAchievements] [GetPlayerAchievements]
     *  @param $steamId [Steam ID of the user]
     *  @param $appId [Application ID of the game]
     *  @param $language [Language for the response, default one is 'en']
     *  @return $response 
     *
     */
    public static function getPlayerAchievements($steamId, $appId, $language='en'){
      $params = SteamApiUtil::formGETParameters(array('steamid' => $steamId, 'appid' => $appId, 'language' =>$language, 'key' => parent::getConfiguration()->getApiKey(),'format'=> parent::getConfiguration()->getResponseFormat()));
      $module = ApiModules::ISteamUserStats;
      $endpoint = ApiMethods::getEndpointUrl($module, 'GetPlayerAchievements');
      $url = SteamApiUtil::formUrl($module,$endpoint);
      return parent::sendRequest(HTTPMethod::GET, $url, $params);
    }

    /**
     *  Gets schema for the game.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetSchemaForGame] [GetSchemaForGame]
     *  @param $appId [Application ID of the game]
     *  @return $response 
     *
     */
    public static function getSchemaForGame($appId){
      $params = SteamApiUtil::formGETParameters(array('appid' => $appId, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
      $module = ApiModules::ISteamUserStats;
      $endpoint = ApiMethods::getEndpointUrl($module, 'GetSchemaForGame');
      $url = SteamApiUtil::formUrl($module,$endpoint);
      return parent::sendRequest(HTTPMethod::GET, $url, $params);
    }
   
   /**
     *  Gets user statistics for the given game list of the user.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetUserStatsForGame] [GetUserStatsForGame]
     *  @param $steamId [Steam ID of the user]
     *  @param $appId [Application ID of the game]
     *  @return $response 
     *
     */
    public static function getUserStatsForGame($steamId, $appId){
      $params = SteamApiUtil::formGETParameters(array('steamid' => $steamId, 'appid' => $appId, 'key' => parent::getConfiguration()->getApiKey(), 'format'=> parent::getConfiguration()->getResponseFormat()));
      $module = ApiModules::ISteamUserStats;
      $endpoint = ApiMethods::getEndpointUrl($module, 'GetUserStatsForGame');
      $url = SteamApiUtil::formUrl($module,$endpoint);
      return parent::sendRequest(HTTPMethod::GET, $url, $params);
    }
}