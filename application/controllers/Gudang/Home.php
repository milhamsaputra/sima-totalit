<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Home extends CI_Controller {

	public function Index()
	{
        $this->mymodel->cek_log();
        $user['user'] = "Gudang";
        $data = $this->mymodel->tampil('qw_barang');
		$data_highchart = $this->mymodel->highchart('tb_barang');
		$data_highchartkategori = $this->mymodel->highchartkategori('tb_barang');
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Gudang/Dasbor',array('data' => $data, 'data_highchart' =>$data_highchart, 'data_highchartkategori'=>$data_highchartkategori));
		$this->load->view('library/Menu-Footer');
	}
}
