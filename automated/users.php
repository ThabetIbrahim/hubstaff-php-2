<?php 
	require_once __DIR__."/.env.local.php";
	class test_users extends \PHPUnit_Framework_TestCase
	{
		public $hubstaff_api;
		function __construct()
		{
			require_once("../hubstaff.php");
			$this->hubstaff_api = new hubstaff\Client($_ENV['APP_TOKEN']);
			$this->hubstaff_api->set_auth_token($_ENV['AUTH_TOKEN']);
		}	
		public function testUsers()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('users/users.yml');
			$this->hubstaff_api->users();
		}
		public function testFind_user()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('users/find_user.yml');
			$this->hubstaff_api->find_user("61188");
			
		}
		public function testFind_user_projects()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('users/find_user_projects.yml');
			$this->hubstaff_api->set_auth_token("5WZ1SCto37HBhH-AR1jn0kC3FXROO4b39CREMSyt_1U");
			$this->hubstaff_api->find_user_projects("61188");
		}
		public function testFind_user_orgs()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('users/find_user_organizations.yml');
			$this->hubstaff_api->set_auth_token("5WZ1SCto37HBhH-AR1jn0kC3FXROO4b39CREMSyt_1U");
			$this->hubstaff_api->find_user_orgs("27572");
		}
	}
?>