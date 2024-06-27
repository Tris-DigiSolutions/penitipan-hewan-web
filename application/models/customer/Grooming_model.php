<?php

class Grooming_model extends CI_Model
{
    public function getAllPackages()
    {
        return $this->db->get("packages")->result_array();
    }

    public function getPackageById($package_id)
    {
        return $this->db->get_where('packages', ['package_id' => $package_id])->row_array();
    }

    public function getGroomingsDataByUser()
    {
        $this->db->select('*');
        $this->db->from("groomings");
        $this->db->join("packages", "packages.package_id = groomings.package_id");
        $this->db->where("customer_id", $this->session->userdata("customer_id"));
        return $this->db->get()->result_array();
    }

    public function registerGrooming($groomingData)
    {
        // Check if the customer record exists
        $customer_id = $this->getCustomerId($groomingData['customer_name'], $groomingData['customer_phone']);

        if (!$customer_id) {
            // Insert customer record if it doesn't exist
            $customer_id = $this->insertCustomer($groomingData['customer_name'], $groomingData['customer_phone']);
        }

        // Insert grooming record with the correct customer_id
        $groomingData['customer_id'] = $customer_id;
        $this->db->insert('groomings', $groomingData);
    }

    public function updateGroomingWithOrderId($grooming_id, $order_id)
    {
        $this->db->where('grooming_id', $grooming_id);
        $this->db->update('groomings', ['order_id' => $order_id]);
    }

    private function getCustomerId($customerName, $customerPhone)
    {
        $this->db->where('customer_name', $customerName);
        $this->db->where('customer_phone', $customerPhone);
        $customer = $this->db->get('customers')->row_array();

        return $customer ? $customer['customer_id'] : null;
    }

    private function insertCustomer($customerName, $customerPhone)
    {
        $customerData = array(
            'customer_name' => $customerName,
            'customer_phone' => $customerPhone
        );
        $this->db->insert('customers', $customerData);
        return $this->db->insert_id();
    }

    public function updateTransactionStatus($order_id, $status)
    {
        $this->db->where('order_id', $order_id);
        $this->db->update('groomings', ['transaction_status' => $status]);
    }

    public function getGroomingById($id)
    {
        $this->db->select('*');
        $this->db->from("groomings");
        $this->db->join("packages", "packages.package_id = groomings.package_id");
        $this->db->where("grooming_id", $id);
        return $this->db->get()->row_array();
    }

    public function deleteGrooming($id)
    {
        $this->db->where("grooming_id", $id);
        $this->db->delete("groomings");
    }
}
