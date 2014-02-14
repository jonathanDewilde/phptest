<?php

require "DB.php";

class Users
{
	private $myDb;
	private $userName;
	
	function __construct()
	{
		
		$this->myDb = new DB();
		$this->myDb->connect();		
	}
	
	function Authorize($user,$pwd)
	{
		//indien 1 rij wil dit zeggen dat username en passwoord gevonden is!!!
		$sql = "select count(*) from users where username = '$user' and password = '$pwd'";
		
		$result = $this->myDb->query($sql);	
		
		
		$line = $this->myDb->fetchArray($result);
		return $line[0];

		
	}
	
	function getUser($user,$pwd)
	{
		$sql = "select username from users where username = '$user' and password = '$pwd'";
		
		$result = $this->myDb->query($sql);
		$line = $this->myDb->fetchArray($result);
		return $line['username'];
		
		}
}

?>