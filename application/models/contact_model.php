<?php


class contact_model extends CI_Model
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
		$this->db->where('user_id', $id);
		$contact = $this->db->get('contacts');

		if ($contact->num_rows() > 0) {
			return $contact->result_array();
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

	public function addNewContact($data)
	{
		if ($this->db->insert('contacts', $data)) {
			return $this->db->insert_id();;
		}
	}

	public function updateExistingContact($id, $data)
	{
		$this->db->where('user_id', $id);
		return $this->db->update('contacts', $data);
	}


	public function deleteExistingContact($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->delete('contacts');
	}

}
