<?php 
	require_once __DIR__."/.env.local.php";
	class test_screenshots extends \PHPUnit_Framework_TestCase
	{
		public $hubstaff_api;
		public $options = array();
		function __construct()
		{
			$this->options["users"] = "61188";
			$this->options["projects"] ="112761";
			$this->options["organizations"] = "27572";

			require_once("../hubstaff.php");
			$this->hubstaff_api = new hubstaff\Client($_ENV['APP_TOKEN']);
			$this->hubstaff_api->set_auth_token($_ENV['AUTH_TOKEN']);
		}		
		public function testScreenshots()
		{
            $starttime = "2016-03-14";
            $stoptime = "2016-03-20";
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('screenshots/screenshots.yml');
			$this->hubstaff_api->screenshots($starttime, $stoptime, $options, 0);
		}
	}

?>