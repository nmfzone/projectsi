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

class Data extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function index() {
        if($this->m_auth->isLogged() == 'adm') {
            redirect('adminarea');
        } else {
            redirect('auth/login');
        }
	}

	public function booking($func = NULL) {
		if($this->m_auth->isLogged() == 'adm') {
	    	if ($func == "show") {
			        $data = $this->db
			        			->order_by("tanggal_booking", "dsc")
			        			->get('booking');
			        $i = 1;
			        foreach ($data->result() as $row){
			            $delete = base_url('adminarea/data/booking/delete/');
			            echo "<tr>
			            			<td>$i.</td>
			                        <td>$row->id_booking</td>
			                        <td>$row->tanggal_booking</td>
			                        <td>$row->tanggal_kadaluarsa</td>
			                        <td>$row->id_buku</td>
			                        <td>$row->id_member</td>
			                        <td><a href='$delete' data-id='$row->id_booking' class='btndelete' title='delete'><i class='glyphicon glyphicon-remove'></i></a></td>    
			                    </tr>";
			            $i++;
			        }
			        exit;
			} else if ($func == "delete") {
					$id =  $this->input->POST('id');
			        $this->db
			        		->where('id_booking', $id)
			        		->delete('booking');
			        echo '<div class="alert alert-success">Data Booking berhasil di hapus</div>';
			        exit;
	    	} else if ($func == NULL) {
			        $data['title_page'] = "Data Booking - ADMIN AREA";
			        $this->load->view('adminarea/v_booking', $data);
		    } else {
		    	$this->load->view('404');
		    }
	    } else {
		    redirect('auth/login');
		}
	}

	public function peminjaman($func = NULL) {
		if($this->m_auth->isLogged() == 'adm') {
	    	if ($func == "show") {
			        $data = $this->db
			        			->order_by("tanggal_pinjam", "asc")
			        			->get('peminjaman');
			        $i = 1;
			        foreach ($data->result() as $row){
			            $edit = base_url().'adminarea/data/peminjaman/edit/';
			            $delete = base_url().'adminarea/data/peminjaman/delete/';
			            echo "<tr>
			            			<td>$i.</td>
			            			<td>$row->id_peminjaman</td>
			                        <td>$row->tanggal_pinjam</td>
			                        <td>$row->tanggal_kembali</td>
			                        <td>$row->id_buku</td>
			                        <td>$row->id_member</td>
			                        <td>$row->id_booking</td>
			                        <td><a href='$edit' data-id='$row->id_peminjaman' class='btnedit' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$delete' data-id='$row->id_peminjaman' class='btndelete' title='delete'><i class='glyphicon glyphicon-remove'></i></a></td>    
			                    </tr>";
			            $i++;
			        }
			        exit;
		    } else if ($func == "new") {
				    $ms = 7 * 60 * 60;
				    $tb = 10 * 24 * 60 * 60;
			    	$res['error']="";
			        $res['success']="";
			        $this->form_validation->set_rules('idbuku', 'ID Buku', 'trim|required|max_length[255]');
			        $this->form_validation->set_rules('idmember', 'ID Member', 'trim|required|max_length[255]');
			        if ($this->form_validation->run() == FALSE){
			            $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';
			        } else {
			            $data = array(
			                'id_peminjaman'    => '',
			                'tanggal_pinjam'   => gmdate('Y-m-d H:i:s', time()+($ms)),
			                'tanggal_kembali'  => gmdate('Y-m-d H:i:s', time()+($ms)+($tb)),
			                'id_buku'          => $this->input->post('idbuku'),
			                'id_member'        => $this->input->post('idmember'),
			                'id_booking'       => ''
			                );
			        	$this->db->insert('peminjaman', $data);
			            $res['success'] = '<div class="alert alert-success">Data Peminjaman Berhasil ditambah</div>';
			        }
			       	header('Content-Type: application/json');
			        echo json_encode($res);
			        exit;
		   	} else if ($func == "viewnew") {
		   			$data['form'] = array(
			        					'class' => 'form',
			        					'id' => 'frmnewpinjam',
			        					'role' => 'form'
			        				);
		   			$this->load->view('adminarea/repository/v_tambahpinjam', $data);
		   	} else if (strpos($func, 'edit') !== false) {
		   			$id = "";
		   			$eid = explode("-", $func);
				   	$this->id = $eid[1];
			        $data['query'] = $this->db
			        					->where('id_peminjaman', $this->id)
			        					->get('peminjaman');
			        $data['id'] = $this->id;
			        $data['form'] = array(
			        					'class' => 'form',
			        					'id' => 'frmeditpinjam',
			        					'role' => 'form'
			        				);
			        $this->load->view('adminarea/repository/v_editpinjam', $data);
		   	} else if ($func == "update") {
				   	$res['error']="";
			        $res['success']="";
			        $this->form_validation->set_rules('idbuku', 'ID Buku', 'trim|required|max_length[255]');
			        $this->form_validation->set_rules('idmember', 'ID Member', 'trim|required|max_length[255]');
			        if ($this->form_validation->run() == FALSE) {
			            $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';    
			        } else {
				        $data = array(
				                	'id_buku'      => $this->input->post('idbuku'),
			                		'id_member'    => $this->input->post('idmember')
				        );
			            $this->db
			            	->where('id_peminjaman', $this->input->post('hidden'))
			            	->update('peminjaman', $data);
			            $res['success'] = '<div class="alert alert-success">Data Peminjaman berhasil di update</div>';
			        }
			        header('Content-Type: application/json');
			        echo json_encode($res);
			        exit;
			} else if ($func == "delete") {
					$id =  $this->input->POST('id');
			        $this->db
			        	->where('id_peminjaman', $id)
			        	->delete('peminjaman');
			        echo '<div class="alert alert-success">Data Peminjaman berhasil di hapus</div>';
			        exit;
	    	} else if ($func == NULL) {
			        $data['title_page'] = "Data Peminjaman - ADMIN AREA";
			        $this->load->view('adminarea/v_peminjaman', $data);
		    } else {
		    	$this->load->view('404');
		    }
	    } else {
		    redirect('auth/login');
		}
	}

    public function member($func = NULL) {
    	if($this->m_auth->isLogged() == 'adm') {
	    	if ($func == "show") {
			        $data = $this->db
			        			->order_by("nama", "asc")
			        			->get('member');
			        $i = 1;
			        foreach ($data->result() as $row){
			            $edit = base_url().'adminarea/data/member/edit/';
			            $delete = base_url().'adminarea/data/member/delete/';
			            echo "<tr>
			            			<td>$i.</td>
			            			<td>$row->id_member</td>
			                        <td>$row->no_identitas</td>
			                        <td>$row->nama</td>
			                        <td>$row->alamat</td>
			                        <td>$row->no_hp</td>
			                        <td><a href='$edit' data-id='$row->id_member' class='btnedit' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$delete' data-id='$row->id_member' class='btndelete' title='delete'><i class='glyphicon glyphicon-remove'></i></a></td>    
			                    </tr>";
			            $i++;
			        }
			        exit;
		    } else if ($func == "new") {
				    $ms = 7 * 60 * 60;
			    	$res['error']="";
			        $res['success']="";
			        $this->form_validation->set_rules('noid', 'Nomor Identitas', 'trim|required|max_length[50]');
			        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[40]');
			        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]');
			        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[30]');
			        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|max_length[100]');
			        $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required|numeric|max_length[20]');
			        if ($this->form_validation->run() == FALSE){
			            $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';
			        } else {
			            $data = array(
			                'id_member'    => '',
			                'no_identitas' => $this->input->post('noid'),
			                'nama'         => $this->input->post('nama'),
			                'username'     => $this->input->post('username'),
			                'password'     => sha1($this->input->post('password')),
			                'alamat'       => $this->input->post('alamat'),
			                'no_hp'        => $this->input->post('nohp'),
			                'created'      => gmdate('Y-m-d H:i:s', time()+($ms))
			                );
			        	$this->db->insert('member', $data);
			            $res['success'] = '<div class="alert alert-success">Member Berhasil ditambah</div>';
			        }
			       	header('Content-Type: application/json');
			        echo json_encode($res);
			        exit;
		   	} else if ($func == "viewnew") {
		   			$data['form'] = array(
			        					'class' => 'form',
			        					'id' => 'frmnewmember',
			        					'role' => 'form'
			        				);
		   			$this->load->view('adminarea/repository/v_tambahmember', $data);
		   	} else if (strpos($func, 'edit') !== false) {
		   			$id = "";
		   			$eid = explode("-", $func);
				   	$this->id = $eid[1];
			        $data['query'] = $this->db
			        					->where('id_member', $this->id)
			        					->get('member');
			        $data['id'] = $this->id;
			        $data['form'] = array(
			        					'class' => 'form',
			        					'id' => 'frmeditmember',
			        					'role' => 'form'
			        				);
			        $this->load->view('adminarea/repository/v_editmember', $data);
		   	} else if ($func == "update") {
				   	$res['error']="";
			        $res['success']="";
			        $this->form_validation->set_rules('noid', 'Nomor Identitas', 'trim|required|max_length[50]');
			        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[40]');
			        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]');
			        $this->form_validation->set_rules('password', 'Password', 'trim|max_length[30]');
			        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|max_length[100]');
			        $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required|numeric|max_length[20]');
			        if ($this->form_validation->run() == FALSE) {
			            $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';    
			        } else {
			        	$pass = $this->input->post('password', TRUE);
			        	if (($pass != FALSE)) {
				            $data = array(
				                'no_identitas' => $this->input->post('noid'),
				                'nama'         => $this->input->post('nama'),
				                'username'     => $this->input->post('username'),
				                'password'     => sha1($this->input->post('password')),
				                'alamat'       => $this->input->post('alamat'),
				                'no_hp'        => $this->input->post('nohp')
				            );
				        } else {
				        	$data = array(
				                'no_identitas' => $this->input->post('noid'),
				                'nama'         => $this->input->post('nama'),
				                'username'     => $this->input->post('username'),
				                'alamat'       => $this->input->post('alamat'),
				                'no_hp'        => $this->input->post('nohp')
				            );
				        }
			            $this->db
			            	->where('id_member', $this->input->post('hidden'))
			            	->update('member', $data);
			            $res['success'] = '<div class="alert alert-success">Data member berhasil di update</div>';
			        }
			        header('Content-Type: application/json');
			        echo json_encode($res);
			        exit;
			} else if ($func == "delete") {
					$id =  $this->input->POST('id');
			        $this->db
			        	->where('id_member', $id)
			        	->delete('member');
			        echo '<div class="alert alert-success">Member berhasil di hapus</div>';
			        exit;
	    	} else if ($func == NULL) {
			        $data['title_page'] = "Data Member - ADMIN AREA";
			        $this->load->view('adminarea/v_member', $data);
		    } else {
		    	$this->load->view('404');
		    }
	    } else {
			redirect('auth/login');
		}
	}

	public function buku($func = NULL) {
		if($this->m_auth->isLogged() == 'adm') {
	    	if ($func == "show") {
			        $data = $this->db
			        			->order_by("judul", "asc")
			        			->get('buku');
			        $i = 1;
			        foreach ($data->result() as $row){
			            $edit = base_url().'adminarea/data/buku/edit/';
			            $delete = base_url().'adminarea/data/buku/delete/';
			            if ($row->keterangan == '') {
			            	$keterangan = '<center>-</center>';
			            } else {
			            	$keterangan = $row->keterangan;
			            }
			            if ($row->status == 1) {
			            	$status = "Dipinjam";
			            } else {
			            	$status = "Tersedia";
			            }
			            echo "<tr>
			            			<td>$i.</td>
			                        <td>$row->kode</td>
			                        <td>$row->judul</td>
			                        <td>$row->pengarang</td>
			                        <td>$row->penerbit</td>
			                        <td>$row->halaman</td>
			                        <td>$row->tahun_terbit</td>
			                        <td>$row->jenis</td>
			                        <td>$row->tanggal_masuk</td>
			                        <td>$row->sumber_buku</td>
			                        <td>$status</td>
			                        <td>$keterangan</td>
			                        <td><a href='$edit' data-id='$row->id_buku' class='btnedit' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$delete' data-id='$row->id_buku' class='btndelete' title='delete'><i class='glyphicon glyphicon-remove'></i></a></td>    
			                    </tr>";
			            $i++;
			        }
			        exit;
		    } else if ($func == "new") {
			    	$res['error']="";
			        $res['success']="";
			        $this->form_validation->set_rules('nokode', 'Kode', 'trim|required|max_length[50]');
			        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|max_length[255]');
			        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|max_length[255]');
			        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|max_length[255]');
			        $this->form_validation->set_rules('halaman', 'Jumlah Halaman', 'trim|numeric|max_length[20]');
			        $this->form_validation->set_rules('tahun', 'Tahun Terbit', 'trim|numeric|max_length[10]');
			        $this->form_validation->set_rules('jenis', 'Jenis Buku', 'trim|max_length[20]');
			        $this->form_validation->set_rules('tglmasuk', 'Tanggal Masuk', 'trim|max_length[15]');
			        $this->form_validation->set_rules('sumber', 'Sumber Buku', 'trim|max_length[255]');
			        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[255]');
			        if ($this->form_validation->run() == FALSE){
			            $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';
			        } else {
			        	$jdl = preg_replace('/[^A-Za-z0-9-\s+]/', '', $this->input->post('judul'));
			        	$jdll = preg_replace('/\s+/', ' ', $jdl);
			        	$jdlll = str_ireplace(' ', '-', $jdll);
			            $data = array(
			                'id_buku'       => '',
			                'kode'          => $this->input->post('nokode'),
			                'judul'         => $this->input->post('judul'),
			                'pengarang'     => $this->input->post('pengarang'),
			                'penerbit'      => $this->input->post('penerbit'),
			                'halaman'       => $this->input->post('halaman'),
			                'tahun_terbit'  => $this->input->post('tahun'),
			                'jenis'         => $this->input->post('jenis'),
			                'status'        => 0,
			                'sumber_buku'   => $this->input->post('sumber'),
			                'tanggal_masuk' => $this->input->post('tglmasuk'),
			                'link'			=> strtolower($jdlll),
			                'keterangan'    => $this->input->post('keterangan')
			                );
			        	$this->db->insert('buku', $data);
			            $res['success'] = '<div class="alert alert-success">Buku Berhasil ditambah</div>';
			        }
			       	header('Content-Type: application/json');
			        echo json_encode($res);
			        exit;
		   	} else if ($func == "viewnew") {
		   			$data['form'] = array(
			        					'class' => 'form',
			        					'id' => 'frmnewbuku',
			        					'role' => 'form'
			        				);
		   			$this->load->view('adminarea/repository/v_tambahbuku', $data);
		   	} else if (strpos($func, 'edit') !== false) {
		   			$id = "";
		   			$eid = explode("-", $func);
				   	$this->id = $eid[1];
			        $data['query'] = $this->db
			        					->where('id_buku', $this->id)
			        					->get('buku');
			        $data['id'] = $this->id;
			        $data['form'] = array(
			        					'class' => 'form',
			        					'id' => 'frmeditbuku',
			        					'role' => 'form'
			        				);
			        $this->load->view('adminarea/repository/v_editbuku', $data);
		   	} else if ($func == "update") {
				   	$res['error']="";
			        $res['success']="";
			        $this->form_validation->set_rules('nokode', 'Kode', 'trim|required|max_length[50]');
			        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|max_length[255]');
			        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|max_length[255]');
			        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|max_length[255]');
			        $this->form_validation->set_rules('halaman', 'Jumlah Halaman', 'trim|numeric|max_length[20]');
			        $this->form_validation->set_rules('tahun', 'Tahun Terbit', 'trim|numeric|max_length[10]');
			        $this->form_validation->set_rules('jenis', 'Jenis Buku', 'trim|max_length[20]');
			        $this->form_validation->set_rules('tglmasuk', 'Tanggal Masuk', 'trim|max_length[15]');
			        $this->form_validation->set_rules('sumber', 'Sumber Buku', 'trim|max_length[255]');
			        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[255]');
			        if ($this->form_validation->run() == FALSE) {
			            $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';    
			        } else {
			        	$jdl = preg_replace('/[^A-Za-z0-9-\s+]/', '', $this->input->post('judul'));
			        	$jdll = preg_replace('/\s+/', ' ', $jdl);
			        	$jdlll = str_ireplace(' ', '-', $jdll);
				        $data = array(
			                'kode'          => $this->input->post('nokode'),
			                'judul'         => $this->input->post('judul'),
			                'pengarang'     => $this->input->post('pengarang'),
			                'penerbit'      => $this->input->post('penerbit'),
			                'halaman'       => $this->input->post('halaman'),
			                'tahun_terbit'  => $this->input->post('tahun'),
			                'jenis'         => $this->input->post('jenis'),
			                'status'        => $this->input->post('status'),
			                'sumber_buku'   => $this->input->post('sumber'),
			                'tanggal_masuk' => $this->input->post('tglmasuk'),
			                'link'			=> strtolower($jdlll),
			                'keterangan'    => $this->input->post('keterangan')
			                );
			            $this->db
			            	->where('id_buku', $this->input->post('hidden'))
			            	->update('buku', $data);
			            $res['success'] = '<div class="alert alert-success">Data Buku berhasil di update</div>';
			        }
			        header('Content-Type: application/json');
			        echo json_encode($res);
			        exit;
			} else if ($func == "delete") {
					$id =  $this->input->POST('id');
			        $this->db
			        	->where('id_buku', $id)
			        	->delete('buku');
			        echo '<div class="alert alert-success">Buku berhasil di hapus</div>';
			        exit;
	    	} else if ($func == NULL) {
			        $data['title_page'] = "Data Buku - ADMIN AREA";
			        $this->load->view('adminarea/v_buku', $data);
		    } else {
		    	$this->load->view('404');
		    }
		} else {
			redirect('auth/login');
		}
	}

}

/* End of file data.php */
/* Location: ./application/controllers/adminarea/data.php */