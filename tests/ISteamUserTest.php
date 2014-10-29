<?php


class ISteamUserTest extends TestCase{
	
	public function testGetFriendList()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$steamID = 76561197962033671;
		$response = ISteamUserAPI::getFriendList($steamID,'all');
		$this->assertTrue($response?true:false);
	}

	public function testGetPlayerBans()
	{
		$response = ISteamUserAPI::getPlayerBans(['76561197962033671', '76561197962033671']);
		$this->assertTrue($response?true:false);
	}

	public function testGetPlayerSummaries()
	{
		$response = ISteamUserAPI::getPlayerSummaries(['76561197962033671', '76561197962033671']);
		$this->assertTrue($response?true:false);
	}

	public function testGetGroupList()
	{
		$steamID = 76561197962033671;
		$response = ISteamUserAPI::getUserGroupList($steamID);
		$this->assertTrue($response?true:false);
	}

	public function testResolveVanityURL()
	{
		$url = 'http://api.steampowered.com';
		$response = ISteamUserAPI::resolveVanityURL($url);
		$this->assertTrue($response?true:false);
	}
}