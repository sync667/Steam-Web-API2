<?php


class IPlayerServiceTest extends TestCase{

	public function testGetRecentlyPlayedGames()
	{
		// Dummy data for test
		$steamID = 76561197962033671;
		$response = IPlayerServiceAPI::getRecentlyPlayedGames($steamID, 10);
		$this->assertTrue($response?true:false);
	}

	public function testGetOwnedGames()
	{
		$steamID = 76561197962033671;
		$response = IPlayerServiceAPI::getOwnedGames($steamID, true, true);
		$this->assertTrue($response?true:false);
	}

	public function testGetSteamLevel()
	{
		$steamID = 76561197962033671;
		$response = IPlayerServiceAPI::getSteamLevel($steamID);
		$this->assertTrue($response?true:false);
	}

	public function testGetBadges()
	{
		$steamID = 76561197962033671;
		$response = IPlayerServiceAPI::getBadges($steamID);
		$this->assertTrue($response?true:false);
	}

	public function testGetCommunityBadgeProgress()
	{
		$steamID = 76561197962033671;
		$badgeID = 1; // dummy badge
		$response = IPlayerServiceAPI::getCommunityBadgeProgress($steamID, $badgeID);
		$this->assertTrue($response?true:false);
	}
}