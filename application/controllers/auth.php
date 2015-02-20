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

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('m_auth');
    }

    public function index() {
        redirect('/');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/' ,'refresh');
        exit;
    }

    public function login($cek = NULL){
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));
        if($cek != NULL && $cek == "start") {
            if($username != FALSE && $password != FALSE) {
                $this->m_auth->login($username, $password);
            } else {
                redirect('auth/login' ,'refresh');
            }
        } else if($cek != NULL && $cek != "start") {
            redirect('auth/login' ,'refresh');
        } else {
            if($this->m_auth->isLogged() == "adm") {
                redirect('adminarea/');
            } else if($this->m_auth->isLogged() == "mbr") {
                redirect('member/');
            } else {
                $data['judul'] = "Login Page | <Sonic Book Rental>";
                $this->load->view('v_login', $data);
            }
        }
    }

    public function register(){

    }
         
}
 
/* End of file auth.php */
/* Location: ./application/controllers/auth.php */