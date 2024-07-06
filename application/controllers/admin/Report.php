<?php
class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Report_model', 'Report_model');
    }

    public function index()
    {
        $data["page_title"] = "Laporan";



        $data['option_tahun'] = $this->Report_model->getYearsData();
        $this->load->view("admin/reports/index_view", $data);
    }

    public function filterReports()
    {
        // cek apakah user sudah memilih jenis laporan
        if (isset($_GET["reports"]) && !empty($_GET["reports"])) {
            $reports = $_GET["reports"];
            // jika jenis laporan yang dipilih penjualan
            if ($reports) {
                // cek apakah user sudah memfilter laporan
                if (isset($_GET["filter"]) && !empty($_GET["filter"])) {
                    $filter = $_GET["filter"];
                    // jika user memfilter dari bulan
                    if ($filter == "1") {
                        $this->_printGroomingReportsByMonth();
                    } else {
                        $this->_printGroomingReportsByYear();
                    }
                }
            }
        }
    }

    private function _printGroomingReportsByMonth()
    {
        $bulan = $_GET["month"];
        $tahun = $_GET["years"];
        $namaBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        $data["keterangan"] = "Data Pet Boarding Bulan " . $namaBulan[$bulan] . "" . $tahun;
        $data["url_cetak"] = 'laporan/cetak?filter=1&bulan=' . $bulan . '&tahun=' . $tahun;
        $data["grooming"] = $this->Report_model->viewGroomingByMonth($bulan, $tahun);
        if (!$data["grooming"]) {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect("laporan");
        }
        // cetak laporan
        ob_start();
        $this->load->view("admin/reports/report_grooming_view", $data);
        $html = ob_get_contents();
        ob_end_clean();

        require './assets/html2pdf/autoload.php';

        $pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('LAPORAN_PET_BOARDING_BULANAN.pdf', 'D');
    }

    private function _printGroomingReportsByYear()
    {
        $tahun = $_GET["years"];

        $data["keterangan"] = "Data Pet Boarding Tahun" . $tahun;
        $data["url_cetak"] = "laporan/cetak?filter=2&tahun=" . $tahun;
        $data["grooming"] = $this->Report_model->viewGroomingByYear($tahun);
        if (!$data["grooming"]) {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect("laporan");
        }
        // cetak laporan
        ob_start();
        $this->load->view("admin/reports/report_grooming_view", $data);
        $html = ob_get_contents();
        ob_end_clean();

        require './assets/html2pdf/autoload.php';

        $pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('LAPORAN_PET_BOARDING_TAHUNAN.pdf', 'D');
    }
}
