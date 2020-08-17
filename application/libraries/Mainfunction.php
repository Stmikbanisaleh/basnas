<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mainfunction
{
	public function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
		
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	public function blnthn_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
		
		return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	public function periode_bulan($bulan_int){
		$bulan_ind = '';
		switch ($bulan_int) {
			case 1:
				$bulan_ind = 'Januari';
				break;
				case 2:
					$bulan_ind = 'Februari';
					break;
					case 3:
						$bulan_ind = 'Maret';
						break;
						case 4:
							$bulan_ind = 'April';
							break;
							case 5:
								$bulan_ind = 'Mei';
								break;
								case 6:
									$bulan_ind = 'Juni';
									break;
									case 7:
										$bulan_ind = 'Juli';
										break;
										case 8:
											$bulan_ind = 'Agustus';
											break;
											case 9:
												$bulan_ind = 'September';
												break;
												case 10:
													$bulan_ind = 'Oktober';
													break;
													case 11:
														$bulan_ind = 'November';
														break;
														case 12:
															$bulan_ind = 'Desember';
															break;
			default:
			    $bulan_ind = '';
		}

		return $bulan_ind;
	}
}