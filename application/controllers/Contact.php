<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['contact_details'] = $this->Contacts->getAllContacts();
		$data['main_view'] = "contacts_page";
		$this->load->view('main', $data);
	}

	public function addNewContactForm()
	{
		$data['main_view'] = "add_contact_form";
		$this->load->view('main', $data);
	}

	// The following function is used to confirm the registration.
	public function addNewContactVerification()
	{
		// Setting the form validations for the signup form.
		$this->form_validation->set_rules('firstName', 'First Name', 'trim|required|min_length[3]|max_length[64]');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|min_length[3]|max_length[64]');
		$this->form_validation->set_rules('countryCode', 'Country Code', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('contactNumber', 'Contact Number', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|min_length[3]');
		$this->form_validation->set_rules('tag', 'Tag', 'trim|required');

		// Checking if the form_validation couldn't run and outputing the errors
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'additionErrors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			redirect('addition', 'refresh');
		} else {
			// Retrieving all the data from the post and assigning them to variables.
			$firstname = $this->input->post('firstName');
			$lastname = $this->input->post('lastName');
			$countryCode = $this->input->post('countryCode');
			$contactNumber = $this->input->post('contactNumber');
			$emailAddress = $this->input->post('email_address');
			$tag = $this->input->post('tag');


			$result = $this->Contacts->addNewContact($firstname, $lastname, $countryCode, $contactNumber, $emailAddress, $tag);
			if ($result) {
				log_message('debug', "Contact Addition Success! ");
				redirect('viewContactsPage');
			} else {
				// If the contact addition fails or image upload fails, the following code will be executed.
				$this->session->set_flashdata('additionFailMessage', "Sorry, your addition failed!");
				log_message('debug', "Addition Fail! ");
				redirect('addNewContactForm', 'refresh');
			}

		}
	}

	public function searchByTag(){
		$this->form_validation->set_rules('tag', 'Tag', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'searchErrors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			redirect('viewContactsPage', 'refresh');
		} else {
			// Retrieving all the data from the post and assigning them to variables.
			$tag = $this->input->post('tag');
			$data['contact_details'] = $this->Contacts->getAllContactsByTag($tag);
			$data['main_view'] = "contacts_page";
			$this->load->view('main', $data);

		}
	}

	public function searchByLastName(){
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|min_length[3]|max_length[64]');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'searchErrors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			redirect('viewContactsPage', 'refresh');
		} else {
			// Retrieving all the data from the post and assigning them to variables.
			$lastname = $this->input->post('lastName');
			$data['contact_details'] = $this->Contacts->getContactByLastName($lastname);
			$data['main_view'] = "contacts_page";
			$this->load->view('main', $data);

		}
	}

	public function editExistingContactForm()
	{
		$contact_id = trim($this->uri->segment(3));

		$data['details'] = $this->Contacts->getContactById($contact_id);
		$data['main_view'] = "update_contact_form";
		$this->load->view('main', $data);
	}

	public function updateExistingContactData()
	{
		// Setting the form validations for the signup form.
		$this->form_validation->set_rules('firstName', 'First Name', 'trim|required|min_length[3]|max_length[64]');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|min_length[3]|max_length[64]');
		$this->form_validation->set_rules('countryCode', 'Country Code', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('contactNumber', 'Contact Number', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|min_length[3]');
		$this->form_validation->set_rules('tag', 'Tag', 'trim|required');

		// Checking if the form_validation couldn't run and outputing the errors
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'additionErrors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			redirect('addition', 'refresh');
		} else {
			// Retrieving all the data from the post and assigning them to variables.
			$contact_id = $this->input->post('contact_id');
			$firstname = $this->input->post('firstName');
			$lastname = $this->input->post('lastName');
			$countryCode = $this->input->post('countryCode');
			$contactNumber = $this->input->post('contactNumber');
			$emailAddress = $this->input->post('email_address');
			$tag = $this->input->post('tag');


			$result = $this->Contacts->updateExistingContact($contact_id, $firstname, $lastname, $countryCode, $contactNumber, $emailAddress, $tag);
			if ($result) {
				log_message('debug', "Contact Change Success! ");
				redirect('viewContactsPage');
			} else {
				// If the contact addition fails or image upload fails, the following code will be executed.
				$this->session->set_flashdata('additionFailMessage', "Sorry, your change failed!");
				log_message('debug', "Change Fail! ");
				redirect('editExistingContact', 'refresh');
			}

		}
	}
	public function deleteExistingContact()
	{
		$contact_id = trim($this->uri->segment(3));
		$this->Contacts->deleteExistingContact($contact_id);
		$data['contact_details'] = $this->Contacts->getAllContacts();
		$data['main_view'] = "contacts_page";
		$this->load->view('main', $data);
	}

}
