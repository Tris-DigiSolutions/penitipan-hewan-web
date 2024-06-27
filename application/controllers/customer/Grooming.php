<?php
class Grooming extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('customer/Grooming_model', 'Grooming_model');
		if ($this->session->userdata("logged_in") !== "customer") {
			redirect("login");
		}

		// Load Midtrans library
		$this->load->library('midtrans');
	}

	public function index()
	{
		$data["page_title"] = "Status Layanan Pet Boarding Service";
		$data["groomings"] = $this->Grooming_model->getGroomingsDataByUser();

		$this->load->view("customer/groomings/index_view", $data);
	}

	public function groomingRegistration()
	{
		$data["page_title"] = "Registrasi Pet Boarding Service";
		$data["packages"] = $this->Grooming_model->getAllPackages();

		$this->_groomingValidation();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("customer/groomings/registration_view", $data);
		} else {
			$this->konfirmasiGrooming();
		}
	}

	public function konfirmasiGrooming()
	{
		$data["page_title"] = "Konfirmasi Pet Boarding Service";
		$customerName = htmlspecialchars($this->input->post("customer_name", true));
		$customerPhone = htmlspecialchars($this->input->post("customer_phone"));
		$customerAddress = htmlspecialchars($this->input->post("customer_address"));
		$petType = $this->input->post("pet_type");
		$packageId = $this->input->post("package_id");
		$customerNotes = htmlspecialchars($this->input->post("notes", true));
		$checkInDate = $this->input->post("date_created");
		$checkOutDate = $this->input->post("date_finished");

		$package = $this->Grooming_model->getPackageById($packageId);

		$tarif = $petType == "Kucing" ? $package["cost_for_cat"] : $package["cost_for_dog"];

		$data["grooming"] = [
			"customer_name" => $customerName,
			"customer_phone" => $customerPhone,
			"customer_address" => $customerAddress,
			"pet_type" => $petType,
			"package_id" => $packageId,
			"package_name" => $package["name"],
			"tarif" => $tarif,
			"notes" => $customerNotes,
			"date_created" => $checkInDate,
			"date_finished" => $checkOutDate
		];

		// Midtrans payment
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $tarif,
		);
		$item_details = array(
			array(
				'id' => $packageId,
				'price' => $tarif,
				'quantity' => 1,
				'name' => $package["name"]
			),
		);
		$customer_details = array(
			'first_name' => $customerName,
			'phone' => $customerPhone,
			'address' => $customerAddress
		);
		$transaction = array(
			'transaction_details' => $transaction_details,
			'customer_details' => $customer_details,
			'item_details' => $item_details,
		);
		$snapToken = $this->midtrans->getSnapToken($transaction);
		$data['snapToken'] = $snapToken;

		// Insert data into the database
		$groomingData = [
			"customer_name" => $customerName,
			"customer_phone" => $customerPhone,
			"customer_address" => $customerAddress,
			"pet_type" => $petType,
			"grooming_status" => "Didaftarkan",
			"package_id" => $packageId,
			"customer_id" => $this->session->userdata("customer_id"),
			"notes" => $customerNotes,
			"date_created" => $checkInDate,
			"date_finished" => $checkOutDate
		];

		$this->Grooming_model->registerGrooming($groomingData);
		$this->session->set_flashdata('message', 'Didaftarkan');
		$this->load->view("customer/groomings/konfirmasi_view", $data);
	}

	public function detailGrooming($id)
	{
		$data["page_title"] = "Detail Status Pet Boarding Service";
		$data["grooming"] = $this->Grooming_model->getGroomingById($id);

		$this->load->view("customer/groomings/detail_view", $data);
	}

	public function deleteGroomingData($id)
	{
		$this->Grooming_model->deleteGrooming($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("grooming");
	}

	private function _groomingValidation()
	{
		$this->form_validation->set_rules("customer_name", "Nama Customer", "required");
		$this->form_validation->set_rules("customer_phone", "Phone Customer", "required");
		$this->form_validation->set_rules("customer_address", "Alamat Customer", "required");
		$this->form_validation->set_rules("pet_type", "Tipe Peliharaan", "required");
		$this->form_validation->set_rules("date_created", "Check-in", "required");
		$this->form_validation->set_rules("date_finished", "Check-out", "required");
	}
}
