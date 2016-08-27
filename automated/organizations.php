<?php 
	require_once __DIR__."/.env.local.php";
	class test_orgs extends \PHPUnit_Framework_TestCase
	{
		public $hubstaff_api;
		function __construct()
		{
			require_once("../hubstaff.php");
			$this->hubstaff_api = new hubstaff\Client($_ENV['APP_TOKEN']);
			$this->hubstaff_api->set_auth_token($_ENV['AUTH_TOKEN']);
		}		
		public function testOrganizations()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('organizations/organizations.yml');
			$this->hubstaff_api->organizations();
		}
		public function testFind_organization()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('organizations/find_organization.yml');
			return $this->hubstaff_api->find_organization("27572");
			
		}
		public function testFind_org_projects()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('organizations/find_org_projects.yml');
			return $this->hubstaff_api->find_org_projects("27572");
		}
		public function testFind_org_members()
		{
			\VCR\VCR::turnOn();
			\VCR\VCR::insertCassette('organizations/find_org_members.yml');
			return $this->hubstaff_api->find_org_members("27572");
		}
	}

?>