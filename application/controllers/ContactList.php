<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactList extends CI_Controller
{
	public function index()
	{

		$this->load->view('contacts_page');
	}
}
