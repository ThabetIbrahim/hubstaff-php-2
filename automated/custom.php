<?php 
	require_once __DIR__."/.env.local.php";
	class test_activities extends \PHPUnit_Framework_TestCase
	{
		public $hubstaff_api;
		public $options = array();
        public $start_date = "2016-05-01";
        public $end_date = "2016-05-07";
		function __construct()
		{
			$this->options["users"] = "61188";
			$this->options["projects"] ="112761";
			$this->options["organizations"] = "27572";
            $this->options["show_tasks"] = "1";
            $this->options["show_notes"] = "1";
            $this->options["show_activity"] = "1";
            $this->options["include_archived"] = "1";
		
			require_once("../hubstaff.php");
			$this->hubstaff_api = new hubstaff\Client($_ENV['APP_TOKEN']);
			$this->hubstaff_api->set_auth_token($_ENV['AUTH_TOKEN']);			
		}		
		public function testCustom_date_team()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('custom/custom_date_team.yml');
			$this->hubstaff_api->custom_date_team($start_date, $end_date, $options);
		}
		public function testCustom_date_my()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('custom/custom_date_my.yml');
			$this->hubstaff_api->custom_date_my($start_date, $end_date, $options);
		}
		public function testCustom_member_team()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('custom/custom_member_team.yml');
			$this->hubstaff_api->custom_member_team($start_date, $end_date, $options);
		}
		public function testCustom_member_my()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('custom/custom_member_my.yml');
			$this->hubstaff_api->custom_member_my($start_date, $end_date, $options);
		}
		public function testCustom_project_team()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('custom/custom_project_team.yml');
			$this->hubstaff_api->custom_project_team($start_date, $end_date, $options);
		}
		public function testCustom_project_my()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('custom/custom_project_my.yml');
			$this->hubstaff_api->custom_project_my($start_date, $end_date, $options);
		}
	}

?>