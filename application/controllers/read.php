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

class Read extends CI_CONTROLLER {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_auth');
	}

	public function index($artc = NULL) {
		if ($artc == NULL) {
			redirect('/');
		} else {
			$this->judul = $artc;
			$this->db->limit('1');
		    $this->db->where('link', $this->judul);
		    $quer = $this->db->get('buku');
		    if ($quer->num_rows() == 1) {
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
				foreach ($quer->result() as $row) {
					$this->jdl = $row->judul;
				}
				$data['log'] = $log;
				$data['judul'] = $this->jdl." | <Sonic Book Rental>";
				$data['nmmember'] = $this->m_auth->getUsername();
		    	$this->db->where('link', $this->judul);
		    	$data['query'] = $this->db->get('buku');
		    	$this->db->limit('15');
				$this->tahun = array('tahun_terbit >' => '2010');
				$this->db->where($this->tahun);
				$data['listbuku'] = $this->db->get('buku');
		    	$this->load->view('v_artikel', $data);
		    } else {
		    	$this->load->view('404');
		    }
		}
	}

}

/* End of file read.php */
/* Location: ./application/controllers/read.php */