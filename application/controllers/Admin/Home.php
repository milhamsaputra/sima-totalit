<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Home extends CI_Controller {
	
	public function index()
	{
        $this->mymodel->cek_log();
        $user['user'] = "Admin";
        $data = $this->mymodel->tampil('qw_barang');
		$data_highchart = $this->mymodel->highchart('tb_barang');
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Admin/Dasbor',array('data' => $data, 'data_highchart' =>$data_highchart));
		$this->load->view('library/Menu-Footer');
	}
}
