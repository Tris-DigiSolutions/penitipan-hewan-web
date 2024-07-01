<?php

class Grooming extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Grooming_model', 'Grooming_model');
		if ($this->session->userdata("logged_in") !== "admin") {
			redirect("/");
		}
	}

	public function index()
	{
		$data["page_title"] = "Kelola Pet Boarding Pelanggan";
		$data["groomings"] = $this->Grooming_model->getAllGroomings();

		$this->load->view("admin/groomings/index_view", $data);
	}

	public function changeStatus($id)
	{
		$data["page_title"] = "Ubah Status Pet Boarding";
		$data["grooming"] = $this->Grooming_model->getGroomingById($id);

		$this->form_validation->set_rules("grooming_status", "Status Grooming", 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/groomings/changestatus_view", $data);
		} else {
			$groomingStatus = $this->input->post("grooming_status");
			$this->Grooming_model->updateGroomingStatus($id, $groomingStatus);
			$this->session->set_flashdata('message', 'Diubah');
			redirect("kelola-grooming");
		}
	}

	public function changeKuota()
	{
		$data["page_title"] = "Ubah Kuota Pet Boarding";

		$this->form_validation->set_rules("kuota", "Kuota Pet Boarding", 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/groomings/changekuota_view", $data);
		} else {
			$kuota = $this->input->post("kuota");
			$this->Grooming_model->updateKuota($kuota);
			$this->session->set_flashdata('message', 'Kuota berhasil diubah');
			redirect("kuota-boarding");
		}
	}

	public function detail($id)
	{
		$data["page_title"] = "Detail Data Pet Boarding";
		$data["grooming"] = $this->Grooming_model->getGroomingById($id);

		$this->load->view("admin/groomings/detail_view", $data);
	}

	public function delete($id)
	{
		$this->Grooming_model->deleteGrooming($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("kelola-grooming");
	}
}
