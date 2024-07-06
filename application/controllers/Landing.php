<?php
class Landing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data["page_title"] = "Home";

		$this->load->view("landing_view", $data);
	}
}
