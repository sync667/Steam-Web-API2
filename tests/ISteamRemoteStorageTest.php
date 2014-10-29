<?php


class ISteamRemoteStorageTest extends TestCase{
	
	public function testGetCollectionDetails()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$response = ISteamEconomyAPI::getAssetPrices($appID);
		$this->assertTrue($response?true:false);
	}

	public function testGetPublishedFileDetails()
	{
		$collectionCount = 1;
		$itemCount = 2;
		$response = ISteamEconomyAPI::getPublishedFileDetails($collectionCount, $itemCount);
		$this->assertTrue($response?true:false);
	}

	public function testGetUGCFileDetails()
	{
		$steamID = 76561197962033671;
		$ugcId = 234650;
		$appId = ApplicationIDs::TeamFortress2;
		$response = ISteamEconomyAPI::getUGCFileDetails($steamID, $ugcId, $appId);
		$this->assertTrue($response?true:false);
	}
}