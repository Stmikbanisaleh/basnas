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

    public function getGrafikMasuk()
    {
        $bulan = date('m');
        $tahun = date('Y');
        return $this->db->query("SELECT
                                        CONCAT(mt.column_2,' ', YEAR(mz.tgl_terima))  bulan_ind,
                                        SUM(mz.total_terima) total_terima
                                    FROM
                                    mapping_table mt
                                    JOIN master_zakat mz ON month(mz.tgl_terima) = mt.column_1
                                    WHERE
                                    mt.kd_mapping = 'MAPPING_MONTH_IND'
                                    AND YEAR(mz.tgl_terima) <= $tahun
                                    AND MONTH(mz.tgl_terima) <= $bulan
                                    GROUP BY CONCAT(YEAR(mz.tgl_terima),MONTH(mz.tgl_terima))
                                    ORDER BY YEAR(mz.tgl_terima), MONTH(mz.tgl_terima) ASC
                                    LIMIT 12");
    }

    public function getGrafikKeluar()
    {
        $bulan = date('m');
        $tahun = date('Y');
        return $this->db->query("SELECT
                                    CONCAT(mt.column_2,' ', YEAR(mp.createdAt))  bulan_ind,
                                    SUM(mp.jumlah_dana_disetujui) total_terima
                                FROM
                                mapping_table mt
                                JOIN master_penyaluran mp ON month(mp.createdAt) = mt.column_1
                                WHERE
                                mt.kd_mapping = 'MAPPING_MONTH_IND'
                                    AND YEAR(mp.createdAt) <= $tahun
                                    AND MONTH(mp.createdAt) <= $bulan
                                AND mp.is_approve = 2
                                GROUP BY CONCAT(YEAR(mp.createdAt),MONTH(mp.createdAt))
                                ORDER BY YEAR(mp.createdAt), MONTH(mp.createdAt) ASC
                                LIMIT 12");
    }

}
?>