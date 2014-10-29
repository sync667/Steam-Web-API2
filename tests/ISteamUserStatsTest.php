<?php


class ISteamUserStatsTest extends TestCase{

	public function testGetGlobalAchievementPercentagesForApp()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$response = ISteamUserStatsAPI::getGlobalAchievementPercentagesForApp($appID);
		$this->assertTrue($response?true:false);
	}

	public function testGetGlobalStatsForGame()
	{
		// deliberately does nothing
	}

	public function testGetNumberOfCurrentPlayers()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$response = ISteamUserStatsAPI::getNumberOfCurrentPlayers($appID);
		$this->assertTrue($response?true:false);
	}

	public function testGetPlayerAchievements()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$steamID = 76561197962033671;
		$response = ISteamUserStatsAPI::getPlayerAchievements($steamID, $appID);
		$this->assertTrue($response?true:false);
	}

	public function testGetSchemaForGame()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$response = ISteamUserStatsAPI::getSchemaForGame($appID);
		$this->assertTrue($response?true:false);
	}

	public function testGetUserStatsForGame()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$steamID = 76561197962033671;
		$response = ISteamUserStatsAPI::getUserStatsForGame($steamID, $appID);
		$this->assertTrue($response?true:false);
	}
}