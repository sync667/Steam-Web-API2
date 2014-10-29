<?php


class ISteamWebAPIUtilTest extends TestCase{
	
	public function testGetServerInfo()
	{
		$response = ISteamWebAPIUtil::getServerInfo();
		$this->assertTrue($response?true:false);
	}

	public function testGetSupportedAPIList()
	{
		$key = 'DDEEFFD85F2405CE40DE1CCCC621EC4D';
		$response = ISteamWebAPIUtil::getSupportedAPIList($key);
		$this->assertTrue($response?true:false);
	}
}