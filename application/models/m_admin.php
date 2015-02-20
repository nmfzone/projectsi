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

class M_Admin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_function');
    }
   
}

?>