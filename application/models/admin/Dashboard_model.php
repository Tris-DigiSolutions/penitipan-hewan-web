<?php
class Dashboard_model extends CI_Model
{

	public function countAllCustomers()
	{
		return $this->db->get("customers")->num_rows();
	}

	public function countAllProducts()
	{
		return $this->db->get("items")->num_rows();
	}

	public function countAllGroomings()
	{
		return $this->db->get("groomings")->num_rows();
	}

	public function countAllOrders()
	{
		return $this->db->get("orders")->num_rows();
	}
	public function countKuota()
	{
		// $this->db->select('kuota');
		$query = $this->db->get('kuota_pet_boarding');
		return $query->row()->kuota;
		// if ($query->num_rows() > 0) {
		// 	return $query->row()->kuota;
		// } else {
		// 	return null;
		// }
	}
}
