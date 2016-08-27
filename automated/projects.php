<?php 
	require_once __DIR__."/.env.local.php";
	class test_projects extends \PHPUnit_Framework_TestCase
	{
		public $hubstaff_api;
		function __construct()
		{
			require_once("../hubstaff.php");
			$this->hubstaff_api = new hubstaff\Client($_ENV['APP_TOKEN']);
			$this->hubstaff_api->set_auth_token($_ENV['AUTH_TOKEN']);
		}		
		public function testProjects()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('projects/projects.yml');
			$this->hubstaff_api->projects();
		}
		public function testFind_project()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('projects/find_project.yml');
			$this->hubstaff_api->find_project("112761");
			
		}
		public function testFind_project_members()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('projects/find_project_members.yml');
			$this->hubstaff_api->find_project_members("112761");
		}
	}

?>