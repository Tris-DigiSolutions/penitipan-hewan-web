<?php
class Report_model extends CI_Model
{

    public function getYearsData()
    {
        $this->db->select('YEAR(date_created) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('groomings'); // select ke tabel transaksi
        $this->db->order_by('YEAR(date_created)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(date_created)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result_array(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    public function viewGroomingByMonth($bulan, $tahun)
    {
        $this->db->select("*");
        $this->db->from("groomings");
        $this->db->join("packages", "packages.package_id = groomings.package_id");
        $this->db->where("MONTH(date_created)", $bulan);
        $this->db->where("YEAR(date_created)", $tahun);
        return $this->db->get()->result_array();
    }

    public function viewGroomingByYear($tahun)
    {
        $this->db->select("*");
        $this->db->from("groomings");
        $this->db->join("packages", "packages.package_id = groomings.package_id");
        $this->db->where("YEAR(date_created)", $tahun);
        return $this->db->get()->result_array();
    }
}
