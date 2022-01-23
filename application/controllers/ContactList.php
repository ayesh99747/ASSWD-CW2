<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactList extends CI_Controller
{
	public function index()
	{
		$data['main_view'] = "contacts_page";
		$this->load->view('main', $data);
	}
}
