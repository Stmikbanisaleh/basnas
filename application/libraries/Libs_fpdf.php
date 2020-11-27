<?php
class Libs_fpdf {
 
    function __construct() {
        include_once APPPATH . '/third_party/fpdf/fpdf.php';
        // include_once APPPATH . '/third_party/mpdf/mpdf.php';
    }
}
?>