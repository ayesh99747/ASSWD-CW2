<?php


class Contacts extends CI_Model
{
	public function getAllContacts()
	{
		$contacts = $this->db->get('contacts');
		if ($contacts->num_rows() > 0) {
			return $contacts->result_array();
		} else {
			return 0;
		}
	}

	public function getContactById($id)
	{
		$this->db->where('contact_id', $id);
		$contact = $this->db->get('contacts');

		if ($contact->num_rows() > 0) {
			return $contact->row_array();
		} else {
			return 0;
		}
	}

	public function getContactByFirstName($first_name)
	{
		$this->db->where('first_name', $first_name);
		$contact = $this->db->get('contacts');

		if ($contact->num_rows() > 0) {
			return $contact->result_array();
		} else {
			return 0;
		}
	}

	public function getContactByLastName($last_name)
	{
		$this->db->where('last_name', $last_name);
		$contact = $this->db->get('contacts');

		if ($contact->num_rows() > 0) {
			return $contact->result_array();
		} else {
			return 0;
		}
	}

	public function addNewContact($firstname, $lastname, $countryCode, $contactNumber, $emailAddress, $tag)
	{
		$dataArray = array(
			'first_name' => $firstname,
			'last_name' => $lastname,
			'country_code' => $countryCode,
			'contact_number' => $contactNumber,
			'email_address' => $emailAddress,
			'tag' => $tag
		);
		if ($this->db->insert('contacts', $dataArray)) {
			return $this->db->insert_id();;
		}
	}

	public function getAllContactsByTag($tag)
	{
		$this->db->where('tag', $tag);
		$contact = $this->db->get('contacts');

		if ($contact->num_rows() > 0) {
			return $contact->result_array();
		} else {
			return 0;
		}
	}

	public function updateExistingContact($id, $firstname, $lastname, $countryCode, $contactNumber, $emailAddress, $tag)
	{
		$dataArray = array(
			'first_name' => $firstname,
			'last_name' => $lastname,
			'country_code' => $countryCode,
			'contact_number' => $contactNumber,
			'email_address' => $emailAddress,
			'tag' => $tag
		);
		$this->db->where('contact_id', $id);
		return $this->db->update('contacts', $dataArray);
	}


	public function deleteExistingContact($id)
	{
		$this->db->where('contact_id', $id);
		return $this->db->delete('contacts');
	}

}
