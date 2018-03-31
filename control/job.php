<?php

class job{
	public function index()
	{
		global $jobApiURL;
		include_once './view/job/index.html';
	}

	public function lists()
	{
		global $jobApiURL;
		$cateID = $_GET['cateID'];
		include_once './view/job/lists.html';
	}

	public function info()
	{
		global $jobApiURL;
		include_once './view/job/info.html';	 
	}

	public function company()
	{
		global $jobApiURL;
		include_once './view/job/company.html';
	}
	public function jianli()
	{
		global $jobApiURL;
		include_once './view/job/jianli.html';
	}
	public function home()
	{
		global $jobApiURL;
		global $baseURL;
		include_once './view/index.html';
	}
}

?>