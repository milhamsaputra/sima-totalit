<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Notice extends CI_Controller {
	public function index()
	{
        $user['user'] = "Gudang";
        $data=$this->mymodel->tampil('qw_barang');
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Pemberitahuan/PemberitahuanStokPersediaan',array('data'=>$data));
		$this->load->view('library/Menu-Footer');
	}
}