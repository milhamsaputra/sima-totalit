<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Barang extends CI_Controller {

    public function index()
    {
		$this->load->view('library/header');
		$this->load->view('StokBarang');
		$this->load->view('library/footer');
    }
    public function Details($id)
    {
        $data=array(
            'kode_barang'=>$id
        );
        $cek = $this->mymodel->m_aksi("qw_barang",$data);
        if($cek>=1){
            $data = $this->mymodel->tampil("qw_barang WHERE kode_barang ='$id'");
            if(empty($id)){
                redirect('Barang');
            }
            $this->load->view('library/header');
            $this->load->view('Details',array('data'=>$data));
            $this->load->view('library/footer');
        }else{
            redirect('Barang');            
        }
    }
}