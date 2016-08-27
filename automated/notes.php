<?php 
	require_once __DIR__."/.env.local.php";
	class test_notes extends \PHPUnit_Framework_TestCase
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
		public function testNotes()
		{
            $starttime = "2016-03-14";
            $stoptime = "2016-03-20";
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('notes/notes.yml');
			$this->hubstaff_api->notes($starttime, $stoptime, $options, 0);
		}
		public function testFind_note()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('notes/find_note.yml');
			return $this->hubstaff_api->find_note("0");
		}
	}

?>