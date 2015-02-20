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

class M_Auth extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function login($username, $password){
        $password = sha1($password);
        if ($username == "admin" && $password == "4dfb958c893a43ebdd0f0b53ad6a9ec7c653f811") {
            //pass = adminsbr
            $data = array(
                        'username'  => 'admin',
                        'logged_in' => TRUE
            );
            $this->session->set_userdata($data);
            echo "0";
        } else {
            // $this->db->where('username', $username);
            // $this->db->where('password', $password);
            // $query = $this->db->get('member');
            $query = $this->db
                    ->where(array('username' => $username, 'password' => $password))
                    ->get('member');
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $row){
                    $data = array(
                                'username'  => $row->username,
                                'logged_in' => TRUE
                            );
                }
                $this->session->set_userdata($data);
                echo "1";
            } else {
                echo "Member dengan Username dan Password tersebut tidak Ada!";
            }
        }
        exit;
    }

    public function isLogged() {
        $is_logged = $this->session->userdata('logged_in');
        $status = $this->session->userdata('username');
 
        if($is_logged == TRUE && $status == 'admin') {
            return "adm";
        } if($is_logged == TRUE && $status != 'admin') {
            return "mbr";
        } else {
            return "not";
        }
        exit;
    }

    public function getUsername() {
        $username = $this->session->userdata('username');
        if (isset($username)) {
            return $username;
        } else {
            return '';
        }
        exit;
    }
     
    public function isLoggedIn() {
            header("cache-Control: no-store, no-cache, must-revalidate");
            header("cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
            $is_logged_in = $this->session->userdata('logged_in');
 
            if(!isset($is_logged_in) || $is_logged_in != TRUE) {
                redirect('/');
                exit;
            }
    }
    
}

/* End of file m_auth.php */
/* Location: ./application/models/m_auth.php */