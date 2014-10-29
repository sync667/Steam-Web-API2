<?php
namespace Epigra\SteamWebApi\Constants;

use Epigra\SteamWebApi\Constants\ApiModules;

/**
 * ApiMethods stores endpoint urls for Steam API. 
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class ApiMethods{

	/** 
	 * A list of endpoint urls stored according to API Modules
	 */
	private static $endpoinUrls = array(

		ApiModules::ISteamApps => array(
			'GetAppList' => '/GetAppList/v2',
			'GetServersAtAddress' => '/GetServersAtAddress/v1',
			'UpToDateCheck' => '/UpToDateCheck/v1'
		),

		ApiModules::ISteamEconomy => array(
			'GetAssetClassInfo' => '/GetAssetClassInfo/v0001',
			'GetAssetPrices' => '/GetAssetPrices/v0001'
		),

		ApiModules::ISteamNews => array(
			'GetNewsForApp' => '/GetNewsForApp/v0002'
		),

		ApiModules::ISteamRemoteStorage => array(
			'GetCollectionDetails'=>'/GetCollectionDetails/v0001',
			'GetPublishedFileDetails'=>'/GetPublishedFileDetails/v1',
			'GetUGCFileDetails'=> '/GetUGCFileDetails/v1'
		),

		ApiModules::ISteamUser => array(
			'GetFriendList'=>'/GetFriendList/v1',
			'GetPlayerBans'=>'/GetPlayerBans/v1',
			'GetPlayerSummaries'=>'/GetPlayerSummaries/v0002',
			'GetUserGroupList'=>'/GetUserGroupList/v1',
			'ResolveVanityURL'=>'/ResolveVanityURL/v0001'
		),

		ApiModules::ISteamUserStats => array(
			'GetGlobalAchievementPercentagesForApp'=>'/GetGlobalAchievementPercentagesForApp/v0002',
			'GetGlobalStatsForGame'=>'/GetGlobalStatsForGame/v0001',
			'GetNumberOfCurrentPlayers'=>'/GetNumberOfCurrentPlayers/v1',
			'GetPlayerAchievements'=>'/GetPlayerAchievements/v1',
			'GetSchemaForGame'=>'/GetSchemaForGame/v2',
			'GetUserStatsForGame'=>'/GetUserStatsForGame/v2'
		),

		ApiModules::IPlayerService => array(
			'GetRecentlyPlayedGames'=>'/GetRecentlyPlayedGames/v1',
			'GetOwnedGames'=>'/GetOwnedGames/v1',
			'GetSteamLevel'=>'/GetSteamLevel/v1',
			'GetBadges'=>'/GetBadges/v1',
			'GetCommunityBadgeProgress'=>'/GetCommunityBadgeProgress/v1'
		),

		ApiModules::ISteamWebAPIUtil => array(
			
			'GetServerInfo'=>'/GetServerInfo/v0001',
			'GetSupportedAPIList'=>'/GetSupportedAPIList/v0001'
		),

		ApiModules::IEconItems => array(
			'GetPlayerItems'=>'/GetPlayerItems/v0001',
			'GetSchema'=>'/GetSchema/v0001',
			'GetSchemaURL'=>'/GetSchemaURL/v1',
			'GetStoreMetadata'=>'/GetStoreMetadata/v1',
			'GetStoreStatus'=>'/GetStoreStatus/'
		)
	);

 	/** 
	 * Returns endpoint url for the given module, name.
	 * @param $module [name of the module]
	 * @param $name [name of the endpoint]
	 */
	public static function getEndpointUrl($module, $name){
		return  self::$endpoinUrls[$module][$name];
	}
}