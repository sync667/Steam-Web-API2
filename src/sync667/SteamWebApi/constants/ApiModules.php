<?php
namespace sync667\SteamWebApi\Constants;

/**
*  Steam Application IDs provided by the API. 
*  
*  @link [https://wiki.teamfortress.com/wiki/WebAPI#General_interfaces] [Application Modules]
*  @author Gokhan Akkurt
*/
abstract class ApiModules{
	const ISteamApps = 'ISteamApps';
	const ISteamEconomy = 'ISteamEconomy';
	const ISteamNews = 'ISteamNews';
	const ISteamRemoteStorage = 'ISteamRemoteStorage';
	const ISteamUser = 'ISteamUser';
	const ISteamUserStats = 'ISteamUserStats';
	const IPlayerService = 'IPlayerService';
	const ISteamWebAPIUtil = 'ISteamWebAPIUtil';
	const IEconItems = 'IEconItems';
}