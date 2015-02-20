<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
     * NMFZONE Project
     *
     * @author      : Nabil Muhammad Firdaus
     * @github      : nmfzone
     * @twitter     : nabilftd
     * @line        : nabilftd
     * @website     : www.nmfzone.com
     * @school      : Islamic University of Indonesia
     * @company     : Arvoid Media Coorporation
     * @copyright   : 2014
*/

class M_Function extends CI_Model {

	public function date() {
		$tgls = date('d-m-Y');
    	$tgl = explode('-',$tgls);
    	$dt = array(
            'Januari',
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
            'December'
    	);
    	for($i=1;$i<=12;$i++) {
        	if($tgl[1] == $i) {
            	$tgl[1] = $dt[$i-1];
        	}
    	}
    	$tanggal = implode(" ",$tgl);
    	return $tanggal;
	}

}