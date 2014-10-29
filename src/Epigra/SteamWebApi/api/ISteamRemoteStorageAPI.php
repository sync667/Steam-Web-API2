<?php
namespace Epigra\SteamWebApi\Api;

use Epigra\SteamWebApi\Api\AbstractSteamAPI;
use Epigra\SteamWebApi\Util\SteamApiUtil;
use Epigra\SteamWebApi\Constants\ApiModules;
use Epigra\SteamWebApi\Constants\ApiMethods;
use Epigra\SteamWebApi\Config\ApiConfiguration;
use Epigra\SteamWebApi\Http\HTTPMethod;

/**
 * ISteamRemoteStorageAPI class handles operations relating to stored files.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class ISteamRemoteStorageAPI extends AbstractSteamAPI{

    /**
     *  Gets collection details
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetCollectionDetails] [GetCollectionDetails]
     *  @param $collectioncount [Number of collections being requested]
     *  @param $publishedfileids [published collection id to look up]
     *  @return $response 
     *
     */
   	public static function getCollectionDetails($collectioncount, $publishedfileids)
   	{
   		$params = SteamApiUtil::formGETParameters(array('collectioncount' => $collectioncount, 'publishedfileids'=> $publishedfileids, 'format'=> parent::getConfiguration()->getResponseFormat()));
         $module = ApiModules::ISteamRemoteStorage;
         $endpoint = ApiMethods::getEndpointUrl($module, 'GetCollectionDetails');
         $url = SteamApiUtil::formUrl($module,$endpoint);
         return parent::sendRequest(HTTPMethod::GET, $url, $params);
   	}

   /**
     *  Gets news feed for various games.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetPublishedFileDetails] [GetPublishedFileDetails]
     *  @param $itemcount [Number of items being requested]
     *  @param $publishedfileids [published file id to look up]
     *  @return $response 
     *
     */
   	public static function getPublishedFileDetails($itemcount,$publishedfileids)
   	{
         $params = SteamApiUtil::formGETParameters(array('publishedfileids' => $publishedfileids, 'itemcount'=> $itemcount, 'format'=> parent::getConfiguration()->getResponseFormat()));
         $module = ApiModules::ISteamRemoteStorage;
         $endpoint = ApiMethods::getEndpointUrl($module, 'GetPublishedFileDetails');
         $url = SteamApiUtil::formUrl($module,$endpoint);
         return parent::sendRequest(HTTPMethod::GET, $url, $params);
      }
   
   /**
     *  Gets news feed for various games.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetUGCFileDetails] [GetUGCFileDetails]
     *  @param $steamId [Steam ID of the user]
     *  @param $ugcId [ID of UGC file to get info for]
     *  @param $appId [Application ID for the game]
     *  @return $response 
     *
     */
   	public static function getUGCFileDetails($steamId, $ugcId, $appId)
   	{
   		$params = SteamApiUtil::formGETParameters(array('steamid' => $steamId, 'ugcid'=> $ugcId, 'appid' =>$appId ,'format'=> parent::getConfiguration()->getResponseFormat()));
         $module = ApiModules::ISteamRemoteStorage;
         $endpoint = ApiMethods::getEndpointUrl($module, 'GetUGCFileDetails');
         $url = SteamApiUtil::formUrl($module,$endpoint);
         return parent::sendRequest(HTTPMethod::GET, $url, $params);
   	}
}