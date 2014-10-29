<?php


class ISteamAppsTest extends TestCase{

	public function testGetAppList()
	{
		// Dummy data for test
		$appID = ApplicationIDs::TeamFortress2;
		$response = ISteamAppsAPI::getAppList($appID);
		$this->assertTrue($response?true:false);
	}

	public function testGetServersAtAddress()
	{
		$address = '192.168.2.94'; // some IP address
		$response = ISteamAppsAPI::getServersAtAddress($address);
		$this->assertTrue($response?true:false);
	}

	public function testUpToDateCheck()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$version = '1.0';
		$response = ISteamAppsAPI::upToDateCheck($appID,$version);
		$this->assertTrue($response?true:false);
	}
}