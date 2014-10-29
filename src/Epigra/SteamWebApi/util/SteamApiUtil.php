<?php 
namespace Epigra\SteamWebApi\Util;

use Epigra\SteamWebApi\Api\AbstractSteamAPI;
use Epigra\SteamWebApi\Util\StringBuilder;

/**
*  A list of util class for performing Steam Api operations. 
*  
*  @author Gokhan Akkurt
*/
class SteamApiUtil {

    /**
     *  Forms endpoint url for the steam web api
     *  @param $moduleName 
     *  @param $endpoint 
     *  @return $url 
     *
     */
    public static function formUrl($moduleName, $endpoint){
    	$baseApiUrl = AbstractSteamAPI::getConfiguration()->getApiUrl();
    	$stringBuilder = new StringBuilder($baseApiUrl);
    	return $stringBuilder->appendString('/')
    						 ->appendString($moduleName)
    						 ->appendString($endpoint)
    						 ->stringValue();
    }

	 /**
     *  Forms GET parameters for HTTP Guzzle
     *  @param $parameters 
     *  @return $arrayOfParameters 
     *
     */
	 public static function formGETParameters($parameters){
	 	return array('query' => $parameters);	
	 }

	 /**
     *  Forms POST parameters for HTTP Guzzle
     *  @param $parameters 
     *  @return $arrayOfParameters 
     *
     */
	 public static function formPOSTParameters($parameters){
	 	return array('body' => $parameters);
	 }

	 /**
     *  Forms Header parameters for HTTP Guzzle
     *  @param $parameters 
     *  @return $arrayOfParameters 
     *
     */
	 public static function formHeaders($headers){
	 	return array('headers' => $headers);
	 }
	}