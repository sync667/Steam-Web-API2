<?php
namespace sync667\SteamWebApi\Http;

/**
*  HTTP Method types.
*  
*  @author Gokhan Akkurt
*/
abstract class HTTPMethod {
	const GET = 'GET';
	const POST = 'POST';
	const PUT = 'PUT';
	const DELETE = 'DELETE';
}