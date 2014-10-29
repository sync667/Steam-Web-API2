<?php


class ISteamNewsTest extends TestCase{
	
	public function testGetNewsForApp()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$response = ISteamNewsAPI::getNewsForApp($appID,0,100);
		$this->assertTrue($response?true:false);
	}
}