<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Contacts extends \Restserver\Libraries\REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->methods['contacts_get']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['contacts_post']['limit'] = 100; // 100 requests per hour per user/key
		$this->methods['contacts_delete']['limit'] = 50; // 50 requests per hour per user/key
	}

	public function contacts_get()
	{
		$id = $this->get('id');

		if ($id === NULL) {
			$result = $this->contact_model->getAllContacts();
			if ($result) {
				$this->response($result, \Restserver\Libraries\REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'No users were found'
				], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
			}
		} else {
			$id = (int)$id;

			if ($id <= 0) {
				$this->response(NULL, \Restserver\Libraries\REST_Controller::HTTP_BAD_REQUEST);
			}
			$result = $this->contact_model->getContactById($id);

			if (!empty($result)) {
				$this->set_response($result, \Restserver\Libraries\REST_Controller::HTTP_OK);
			} else {
				$this->set_response([
					'status' => FALSE,
					'message' => 'User could not be found'
				], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}

	public function contacts_post()
	{
		$dataArray = array(
			'first_name' => $this->post('first_name'),
			'last_name' => $this->post('last_name'),
			'country_code' => $this->post('country_code'),
			'contact_number' => $this->post('contact_number'),
			'email_address' => $this->post('email_address'),
			'picture_location' => $this->post('picture_location')
		);

		$result = $this->contact_model->addNewContact($dataArray);
		$this->set_response($result, \Restserver\Libraries\REST_Controller::HTTP_OK);
	}

	public function contacts_put()
	{
		$id = (int)$this->get('id');

		$dataArray = array(
			'first_name' => $this->put('first_name'),
			'last_name' => $this->put('last_name'),
			'country_code' => $this->put('country_code'),
			'contact_number' => $this->put('contact_number'),
			'email_address' => $this->put('email_address'),
			'picture_location' => $this->put('picture_location')
		);

		$result = $this->contact_model->updateExistingContact($id, $dataArray);
		$this->set_response($result, \Restserver\Libraries\REST_Controller::HTTP_OK);
	}

	public function contacts_delete()
	{
		$id = (int)$this->get('id');
		if ($id <= 0) {
			$this->response(NULL, \Restserver\Libraries\REST_Controller::HTTP_BAD_REQUEST);
		}

		$this->db->where('user_id', $id);
		$this->db->delete('contacts');

		$message = [
			'id' => $id,
			'message' => 'Deleted the resource'
		];

		$this->set_response($message, \Restserver\Libraries\REST_Controller::HTTP_OK);
	}

}
