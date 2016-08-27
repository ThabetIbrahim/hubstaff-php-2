<?php 
	require_once __DIR__."/.env.local.php";
	class test_activities extends \PHPUnit_Framework_TestCase
	{
		public $hubstaff_api;
		public $options = array();
		function __construct()
		{
			$this->options["users"] = "61188";
			$this->options["projects"] ="112761";
			$this->options["organizations"] = "27572";
			$this->options["date"] = "2016-05-01";

			require_once("../hubstaff.php");
			$this->hubstaff_api = new hubstaff\Client($_ENV['APP_TOKEN']);
			$this->hubstaff_api->set_auth_token($_ENV['AUTH_TOKEN']);
		}		
		public function testWeekly_team()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('weekly/team.yml');
			$this->hubstaff_api->weekly_team($options);
		}
		public function testWeekly_my()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('weekly/my.yml');
			$this->hubstaff_api->weekly_my($options);
		}
	}

?>