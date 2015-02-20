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

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function index() {
        if($this->m_auth->isLogged() == 'adm') {
            $data['title_page'] = "ADMIN AREA";
            $this->load->view('adminarea/v_admin', $data);
        } else {
            redirect('auth/login');
        }
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/adminarea/admin.php */