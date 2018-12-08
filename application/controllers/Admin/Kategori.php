<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Kategori extends CI_Controller {

	public function index()
	{  
        $this->mymodel->cek_log();
        $user['user'] = "Admin";
        $data = $this->mymodel->tampil('tb_kategori_barang');
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Admin/KategoriBarang', array('data'=>$data));
		$this->load->view('library/Menu-Footer');   
	}
    public function remove_kategori($kategori)
    {
		$res = $this->mymodel->tambah('qw_logs', $datalogs);
        $cek = $this->mymodel->hapus('tb_kategori_barang',"id_kategori = '$kategori'");    
        if($cek>=1){
            echo "Hapus Sukses!";
			$iduser=$_SESSION['kode_user'];
        	$aktifitas="Menghapus Kategori";
        	$tanggal=date('Y-m-d');
       		$waktu=date("H:i:s");   
			$datalogs=array(
				'id_user'=>$iduser,
        	    'aktifitas'=>$aktifitas,
        	    'tanggal'=>$tanggal,
        	    'waktu'=>$waktu,
			);
		 $res = $this->mymodel->tambah('qw_logs', $datalogs);
            redirect('Admin/Kategori');
        }else{
            echo "Hapus Gagal!";
            redirect('Admin/Kategori');
        }
    
	}
    public function add_kategori()
    {
        $nama=$_POST['kategori'];
        $idkategori=$_POST['idkategori'];
		$reslogs = $this->mymodel->tambah('qw_logs', $datalogs);
        $data=array(
        'nama_kategori'=>$nama,
        'id_kategori'=>$idkategori
        );
        $res=$this->mymodel->tambah('tb_kategori_barang',$data); 
        if($cek>=1){
            echo "Hapus Sukses!";
			$iduser=$_SESSION['kode_user'];
       	    $aktifitas="Menambah Kategori";
      	    $tanggal=date('Y-m-d');
         	$waktu=date("H:i:s");   
			$datalogs=array(
				'id_user'=>$iduser,
        	    'aktifitas'=>$aktifitas,
        	    'tanggal'=>$tanggal,
        	    'waktu'=>$waktu,
			);
		 $res = $this->mymodel->tambah('qw_logs', $datalogs);
            redirect('Admin/Kategori');
        }else{
            echo "Hapus Gagal!";
            redirect('Admin/Kategori');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */