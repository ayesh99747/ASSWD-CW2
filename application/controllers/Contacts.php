<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacts extends CI_Controller
{
	public function index()
	{
		$data['main_view'] = "contacts_page";
		$this->load->view('main', $data);
	}

	public function addNewContact()
	{
		$data['main_view'] = "add_contact_form";
		$this->load->view('main', $data);
	}
}
