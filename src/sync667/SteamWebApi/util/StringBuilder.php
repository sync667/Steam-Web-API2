<?php
namespace sync667\SteamWebApi\Util;

/**
*  A string builder class for PHP.
*  Provides a concrete interface for appending new strign values easily.
* 
*  @author Gokhan Akkurt
*/
class StringBuilder {

	/**
	 * Instance variable  
	 */
	private $string;
   
    /**
     *  Constrouctor for the StringBuilder
     *  @param $string 
     *
     */
	public function __construct($baseString=''){
		$this->string = $baseString;
	}
	
	/**
     *  Sets new string value to given parameter
     *  @param $string 
     *
     */
	public function setString($newString){
		$this->string = $newString;
	}

	/**
     *  Appends new string to current string
     *  @param $string [appending string]
     *  @return $this [StringBuilder instance]
     *
     */
	public function appendString($newString){
		$this->string .= $newString;
		return $this;
	}
	
	/**
     *  Returns current string value
     *  @return $string
     *
     */
	public function stringValue(){
		return $this->string;
	}
}