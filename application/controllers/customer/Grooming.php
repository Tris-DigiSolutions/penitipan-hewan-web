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

		$order_id = rand(); // Ideally, use a more robust method to generate unique order IDs

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
			"date_finished" => $checkOutDate,
			"order_id" => $order_id, // Save the order ID
			"transaction_status" => 'pending'
		];

		// Midtrans payment
		$transaction_details = array(
			'order_id' => $order_id,
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
		$this->Grooming_model->registerGrooming($data['grooming']);
		// Redirect to payment page with order_id as a parameter
		redirect("grooming/payment/{$data['grooming']['order_id']}");
	}

	public function notificationHandler()
	{
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, true);

		if ($result) {
			$order_id = $result['order_id'];
			$transaction_status = $result['transaction_status'];
			// $fraud_status = $result['fraud_status'];

			// // Handle different transaction statuses
			// if ($transaction_status == 'capture') {
			// 	if ($fraud_status == 'accept') {
			// 		$status = 'success';
			// 	} else if ($fraud_status == 'challenge') {
			// 		$status = 'challenge';
			// 	} else {
			// 		$status = 'deny';
			// 	}
			// } else if ($transaction_status == 'settlement') {
			// 	$status = 'success';
			// } else if ($transaction_status == 'pending') {
			// 	$status = 'pending';
			// } else if ($transaction_status == 'deny') {
			// 	$status = 'deny';
			// } else if ($transaction_status == 'expire') {
			// 	$status = 'expire';
			// } else if ($transaction_status == 'cancel') {
			// 	$status = 'cancel';
			// }

			// Update transaction status in the database
			$this->Grooming_model->updateTransactionStatus($order_id, $transaction_status);

			// Respond with 200 OK
			http_response_code(200);
		}
	}

	public function paymentSuccess()
	{
		$order_id = $this->session->flashdata('order_id');
		redirect('customer/grooming/detailGrooming/' . $order_id);
	}

	public function paymentPending()
	{
		$order_id = $this->session->flashdata('order_id');
		redirect('customer/grooming/detailGrooming/' . $order_id);
	}

	public function paymentError()
	{
		// Handle error page here
		$this->load->view('customer/groomings/error_view');
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
		$this->form_validation->set_rules("customer_phone", "Phone Customer", "required|numeric");
		$this->form_validation->set_rules("customer_address", "Alamat Customer", "required");
		$this->form_validation->set_rules("pet_type", "Tipe Peliharaan", "required");
		$this->form_validation->set_rules("package_id", "Paket", "required");
		$this->form_validation->set_rules("date_created", "Check-in", "required");
		$this->form_validation->set_rules("date_finished", "Check-out", "required");
	}
}
