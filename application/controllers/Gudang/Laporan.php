<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Laporan extends CI_Controller {
    public function PrintPersediaanBarang(){
        $user['user'] = "Gudang";
        $data['data1']=$this->mymodel->tampil("tb_barang");
        $this->load->view('Laporan/Print/persediaanBarang',$data);
    }
    public function PrintDataSupplier(){
        $user['user'] = "Gudang";
        $data['data1']=$this->mymodel->tampil("tb_supplier");
        $this->load->view('Laporan/Print/DataSupplier',$data);
    }
    public function LaporanTukarBarang(){
        $user['user'] = "Gudang";
        $data['data1'] = $this->mymodel->tampil("qw_penukaran_stok");
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Laporan/RiwayatPenukaranBarang',$data);
		$this->load->view('library/Menu-Footer');
    }
}
