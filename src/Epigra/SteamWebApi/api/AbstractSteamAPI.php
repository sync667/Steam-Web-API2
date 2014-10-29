<?php

namespace Epigra\SteamWebApi\Api;

use GuzzleHttp\Client;
use Epigra\SteamWebApi\Config\ApiConfiguration;

/**
 * AbstractSteamAPI class that encapsulates api configuration instance. 
 * Basically, sends request to Steam Web API and parse the response according response format
 * 
 * @author Gokhan Akkurt
 * @link [https://developer.valvesoftware.com/wiki/Steam_Web_API] [Steam Web]
 */
abstract class AbstractSteamAPI{
	/**
	 *  ApiConfiguration instance variable
	 */
	private static $apiConfiguration = null;

	/**
     *  Initialize API configurations with given parameters.
     *  @param $apiUrl [Api base url]
     *  @param $apiKey [An access key to Steam WEB API]
     *  @param $responseFormat [This could be json or xml]
     *
     */
	public static function init($apiUrl,$apiKey, $responseFormat='json'){
		self::$apiConfiguration = new ApiConfiguration($apiUrl,$apiKey,$responseFormat);
	}

	/**
     *  Returns $apiConfiguration instance
     *  @return $apiConfiguration
     *
     */
	public static function getConfiguration(){
		return self::$apiConfiguration;
	}

	/**
     *  Sets newly $apiConfiguration instance
     *  @param $apiConfiguration [new ApiConfiguration insance] @see ApiConfiguration
     *
     */
	protected static function setConfiguration($apiConfiguration){
		self::$apiConfiguration = $apiConfiguration;
	}

	/**
     *  Sends HTTP request to given URL with parameters. 
     *  Parses response as desired and returns it.
     *  @param $method [HTTP method type] [GET, POST, PUT, DELETE] 
     *  @param $url [A url that will to be requested]
     *  @param $parameters [Fo]
     *  @return $response [Resulting response. If it fails returns null]
     *
     */
	 protected static function sendRequest($method, $url, $parameters=[]){

	 	if(self::$apiConfiguration == null){
	 		throw new Exception("Api configuration must be initialized before sending request", 1001);
	 	}

	 	$client = new Client();
	 	$request = $client->createRequest($method, $url, $parameters);
	 	$response = $client->send($request);

	 	if($response->getStatusCode() == 200){
	 		if(strcmp(self::getConfiguration()->getResponseFormat(), 'xml') == 0){
	 			return self::responseAsXML($response);
	 		}
	 		else{
	 			return self::responseAsJson($response);
	 		}
	 	}
	 	return null; 
	 }

	/**
     *  Parses $response variable to JSON format.
     *  @param $response [HTTP Body Content]
     *  @return response as JSON
     */
	private static function responseAsJson($response)
	{
		return $response->json();
	}

 	/**
     *  Parses $response variable to XML format.
     *  @param $response [HTTP Body Content]
     *  @return response as XML
     */
 	private static function responseAsXML($response)
 	{
 		return $response->xml();
 	}
 }