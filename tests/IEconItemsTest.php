<?php


class IEconItemsTest extends TestCase{

	public function testGetPlayerItems()
	{
		// Dummy data for test
		$appID = ApplicationIDs::TeamFortress2;
		$steamID = 76561197962033671;
		$response = IEconItemsAPI::getPlayerItems($appID, $steamID);
		$this->assertTrue($response?true:false);
	}

	public function testGetSchema()
	{
		// Dummy data for test
		$appID = ApplicationIDs::TeamFortress2;
		$response = IEconItemsAPI::getSchema($appID);
		$this->assertTrue($response?true:false);
	}

	public function testGetSchemaUrl()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$response = IEconItemsAPI::getSchemaURL($appID);
		$this->assertTrue($response?true:false);
	}

	public function testGetStoreMetadata()
	{
		$appID = ApplicationIDs::TeamFortress2;
		$response = IEconItemsAPI::getStoreMetadata($appID);
		$this->assertTrue($response?true:false);
	}
}