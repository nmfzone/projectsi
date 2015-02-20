<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
	 * NMFZONE Project
	 *
	 * @author 		: Nabil Muhammad Firdaus
	 * @github 		: nmfzone
	 * @twitter 	: nabilftd
	 * @line 		: nabilftd
	 * @website 	: www.nmfzone.com
	 * @school 		: Islamic University of Indonesia
	 * @company 	: Arvoid Media Coorporation
	 * @copyright	: 2014
*/

class Index extends CI_CONTROLLER {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_auth');
	}

	public function index() {
		$log = $this->m_auth->isLogged();
		if($log == "mbr") {
			$data = array(
		            'link' => 'member',
		            'nm'   => 'Member Area'
		    );
		} else if ($log == "adm") {
			$data = array(
		            'link' => 'adminarea',
		            'nm'   => 'Admin Area'
		    );
		}
		$data['log'] = $log;
		$data['judul'] = "Peminjaman Komik | <Sonic Book Rental>";
		$data['nmmember'] = $this->m_auth->getUsername();
		$data['listbuku'] = $this->db
								->limit('15')
								->where(array('tahun_terbit >' => '2010'))
								->get('buku');

		// Ini untuk mendelete Booking yang telah melewati batas kadaluarsa
        $wb = 7 * 60 * 60;
        $this->now = gmdate('Y-m-d H:i:s', time()+($wb));
        $dl = $this->db
        			->where('tanggal_kadaluarsa < ', $this->now)
        			->get('booking');
        foreach ($dl->result() as $row) {
            $this->db
            	->delete('booking', array('id_booking' => $row->id_booking));
            $this->db
            	->where('id_buku', $row->id_buku)
            	->update('buku', array('status' => 0));
        }
		
		$this->load->view('v_depan', $data);
	}

	public function search() {
		$q = trim($this->input->post('search'));
		$wh = trim($q);
		if ($wh != '' ) {
			$query = $this->db
						->like('judul', $q)
						->limit('6')
						->get('buku');
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$judul   = $row->judul;
					$judull  = '<b>'.$q.'</b>';
					$link    = $row->link;
					$final   = str_ireplace($q, $judull, $judul);
					echo '<li onclick=location.href="'.base_url().'read/'.$link.'" title="'.$judul.'">'.$final.'</a></li>';
				}
			} else {
				echo " ";
			}
		} else {
			echo " ";
		}
		exit;
	}

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */