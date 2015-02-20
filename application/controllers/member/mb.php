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

class Mb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_auth');
        $this->load->library('form_validation');
    }

    public function index() {
        if($this->m_auth->isLogged() == 'mbr') {
        	$data['title_page'] = "MEMBER AREA";
        	$data['username'] = $this->m_auth->getUsername();
            $this->load->view('member/v_member', $data);
        } else {
            redirect('auth/login');
        }
	}

    public function booking() {
    	$this->idb =  trim($this->input->POST('id'));
    	$this->nama =  trim($this->input->POST('nama'));
    	$wb = 7 * 60 * 60;
    	$wk = 3 * 60 * 60;
    	$this->now = gmdate('Y-m-d H:i:s', time()+($wb));
    	$this->db->where('username', $this->nama);
	    $sidm = $this->db->get('member');
	    foreach($sidm->result() as $row) {
	    	$this->idm = $row->id_member;
	    }
    	$this->db->where('id_buku', $this->idb);
        $this->db->where('id_member', $this->idm);
        $this->db->where('tanggal_kadaluarsa > ', $this->now);
        $query = $this->db->get('booking');
        if ($query->num_rows() == 0) {
			$data = array(
			            'id_booking'          => '',
			            'tanggal_booking'     => $this->now,
			            'tanggal_kadaluarsa'  => gmdate('Y-m-d H:i:s', time()+($wb)+($wk)),
			            'id_buku'             => $this->idb,
			            'id_member'           => $this->idm
			        );
			$this->db->insert('booking', $data);
            $dt = array(
                        'status'          => '1',
                    );
            $this->db->where('id_buku', $this->idb);
            $this->db->update('buku', $dt);
			echo "<div class='alert alert-success'><p><span style='float:left;'>Booking berhasil dilakukan</span><span style='float:right;'>Booking anda akan habis masa berlakunya pada ".$data['tanggal_kadaluarsa']."</span></p></div>";
		} else {
            $this->db->select('m.nama,m.username');
            $this->db->from('member m');
            $this->db->join('booking b', 'm.id_member = b.id_member');
            $this->db->join('buku u', 'b.id_buku = u.id_buku');
            $this->db->where('b.id_buku', $this->idb);
            $this->db->where('b.id_member', $this->idm);
            $query = $this->db->get();
            foreach($query->result() as $row) {
                $nama = $row->nama;
                $username = $row->username;
            }
            if ($username == $this->nama) {
                echo '<div class="alert alert-danger">Buku ini sudah Anda booking dan baru akan habis masa berlakunya pada ... !</div>';
            } else {
                echo '<div class="alert alert-danger">Buku ini sudah di Booking oleh '.$nama.'!</div>';
            }
		}
	}

}

/* End of file mb.php */
/* Location: ./application/controllers/member/mb.php */