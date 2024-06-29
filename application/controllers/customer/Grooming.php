<?php
class Grooming extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('customer/Grooming_model', 'Grooming_model');
		$this->load->model('customer/Payment_model', 'Payment_model');
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
			"date_finished" => $checkOutDate,
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
				// "pet_type" => $petType,
				// "notes" => $customerNotes,
				'quantity' => 1,
				'name' => $package["name"]
			),
		);
		$customer_details = array(
			'name' => $customerName,
			'phone' => $customerPhone,
			'address' => $customerAddress
		);
		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);
		$transaction_data = array(
			// 'data' => $data,
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			// 'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);
		// error_log(json_encode($transaction_data));
		// $snapToken = $this->midtrans->getSnapToken($transaction_data);
		// error_log($snapToken);
		// echo $snapToken;
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		$data['snapToken'] = $snapToken;

		// Terima dan decode data JSON dari request body
		// $result = json_decode($this->input->post('result_data'), true);

		// echo "<pre>";
		// var_dump($result);
		// echo "</pre>";
		// die;

		// // Insert data into the database

		$groomingData = [
			"order_id" => $transaction_details['order_id'],
			"customer_name" => $customerName,
			"customer_phone" => $customerPhone,
			"customer_address" => $customerAddress,
			"pet_type" => $petType,
			"package_id" => $packageId,
			"customer_id" => $this->session->userdata("customer_id"),
			"notes" => $customerNotes,
			"date_created" => $checkInDate,
			"date_finished" => $checkOutDate,
			// "status_code" => $result["status_code"],
			// "payment_type" => $payment_result["payment_type"],
			// "bank" => $payment_result["bank"],
			// "va_number" => $payment_result['va_numbers'][0]['va_number'],
			// "transaction_time" => $payment_result["transaction_time"],
			"grooming_status" => "Didaftarkan",
			// "pdf_url" => $payment_result["pdf_url"],
		];

		$this->Grooming_model->registerGrooming($groomingData);
		$this->session->set_flashdata('message', 'Didaftarkan');
		$this->load->view("customer/groomings/konfirmasi_view", $data);
	}

	// public function finishPayment()
	// {
	// 	$result = json_decode($this->input->post('result_data'), true);
	// 	echo "<pre>";
	// 	var_dump($result);
	// 	echo "</pre>";
	// 	die;
	// }

	// public function savePayment()
	// {
	// 	$payment_result = $this->input->post('payment_result');

	// 	// Simpan data hasil pembayaran ke database
	// 	$data = array(
	// 		'transaction_id' => $payment_result['transaction_id'],
	// 		'order_id' => $payment_result['order_id'],
	// 		'gross_amount' => $payment_result['gross_amount'],
	// 		'payment_type' => $payment_result['payment_type'],
	// 		'transaction_time' => $payment_result['transaction_time'],
	// 		'transaction_status' => $payment_result['transaction_status'],
	// 		// Tambahkan data lain yang diperlukan dari $payment_result
	// 	);

	// 	$this->Payment_model->insert_payment($data);

	// 	echo json_encode(array('status' => 'success'));
	// }

	// public function paymentSuccess()
	// {
	// 	// $order_id = $this->session->flashdata('order_id');
	// 	redirect($this->detailGrooming);
	// }

	// public function paymentPending()
	// {
	// 	$order_id = $this->session->flashdata('order_id');
	// 	redirect($this->detailGrooming($order_id));
	// }

	// public function paymentError()
	// {
	// 	// Handle error page here
	// 	$this->load->view('customer/groomings/error_view');
	// }

	// public function detailGrooming($id = null)
	// {
	// 	if ($id === null) {
	// 		show_404(); // Tampilkan halaman 404 jika id tidak diberikan
	// 	}

	// 	$data["page_title"] = "Detail Status Pet Boarding Service";
	// 	$data["grooming"] = $this->Grooming_model->getGroomingById($id);

	// 	if (!$data["grooming"]) {
	// 		show_404(); // Tampilkan halaman 404 jika data grooming tidak ditemukan
	// 	}

	// 	$this->load->view("customer/groomings/detail_view", $data);
	// }

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
