<?php

class Grooming_model extends CI_Model
{
	public function getAllGroomings()
	{
		$this->db->select("*");
		$this->db->from("groomings");
		$this->db->join("packages", "packages.package_id = groomings.package_id");
		return $this->db->get()->result_array();
	}

	public function updateGroomingStatus($id, $groomingStatus)
	{
		$this->db->set("grooming_status", $groomingStatus);
		$this->db->where("grooming_id", $id);
		$this->db->update("groomings");
	}

	public function getGroomingById($id)
	{
		$this->db->select("*");
		$this->db->where("grooming_id", $id);
		$this->db->from("groomings");
		$this->db->join("packages", "packages.package_id = groomings.package_id");
		return $this->db->get()->row_array();
	}

	public function deleteGrooming($id)
	{
		$this->db->where("grooming_id", $id);
		$this->db->delete("groomings");
	}
	// Fungsi untuk mendapatkan kuota saat ini
	public function getKuota()
	{
		$query = $this->db->get('kuota_pet_boarding');
		return $query->row();
	}

	// Fungsi untuk memperbarui kuota
	public function updateKuota($kuota)
	{
		$data = array('kuota' => $kuota);
		return $this->db->update('kuota_pet_boarding', $data);
	}

	// Fungsi untuk mengurangi kuota setelah pendaftaran berhasil
	public function decreaseKuota()
	{
		$this->db->set('kuota', 'kuota-1', FALSE);
		return $this->db->update('kuota_pet_boarding');
	}
}
