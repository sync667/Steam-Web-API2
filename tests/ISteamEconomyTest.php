<?php


class ISteamEconomyTest extends TestCase{

	public function testGetClassInfo()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$classCount = 2;
		$classIdn = array('0' => '195151', '1' => '16891096');

		$response = ISteamEconomyAPI::getAssetClassInfo($appID, 'en', $classCount, $classIdn);
		$this->assertTrue($response?true:false);
	}

	public function testGetAssetPrices()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$response = ISteamEconomyAPI::getAssetPrices($appID);
		$this->assertTrue($response?true:false);
	}
}