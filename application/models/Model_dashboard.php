<?php
class Model_dashboard extends CI_model
{
    public function getZakatFitrah()
    {
        $bulan = date('m');
        $result = $this->db->query("SELECT SUM(mz.total_terima) terima FROM master_zakat mz WHERE month(mz.tgl_terima) = $bulan AND mz.jenis = 1");

        if($result->num_rows()>0){
            return $result->row()->terima;
        }else{
            return 0;
        }
    }

    public function getZakatMaal()
    {
        $bulan = date('m');
        $result = $this->db->query("SELECT SUM(mz.total_terima) terima FROM master_zakat mz WHERE month(mz.tgl_terima) = $bulan AND mz.jenis = 2");

        if($result->num_rows()>0){
            return $result->row()->terima;
        }else{
            return 0;
        }
    }

    public function getInfaq()
    {
        $bulan = date('m');
        $result = $this->db->query("SELECT SUM(mz.total_terima) terima FROM master_zakat mz WHERE month(mz.tgl_terima) = $bulan AND mz.jenis = 3");

        if($result->num_rows()>0){
            return $result->row()->terima;
        }else{
            return 0;
        }
    }

}
?>