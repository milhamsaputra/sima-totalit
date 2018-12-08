<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
    }
    public function tambahfoto()
    {
        $data['error'] = '';
        $data['judul'] = 'Photo Album';
        $this->load->view('Gudang/uploadFoto/tambahFoto', $data);
    }
	public function index()	
	{
        //------------------------------------------------------------------------------------
    /*$getData = $this->db->get('tb_barang');
    $a = $getData->num_rows();
    $config['per_page'] = '6'; //the number of per page for pagination
    $config['uri_segment'] = 3; //see from base_url. 3 for this case
    $config['full_tag_open'] = '<p';
    $config['full_tag_close'] = '</p>';
    $this->pagination->initialize($config); //initialize pagination
    //------------------------------------------------------------------------------------  

    $data['data1'] = $this->mymodel->get_page('qw_barang', 'kodebarang', $config['per_page'],$this->uri->segment(3));*/

   
        $user['user'] = "Gudang";
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');

    $config['base_url'] = base_url().'Gudang/Barang/index'; 
    $config['total_rows'] = $this->mymodel->hitungrows('tb_barang');
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
    $config['full_tag_open'] = '<p>';
    $config['full_tag_close'] = '</p>';
    $config['last_link'] = 'Last <i class="icon-last-2"></i>;';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li> ';
    $config['first_link'] = '<i class="icon-first-2"></i> First;';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li> ';
    $config['next_link'] = '<i class="icon-next"></i>';
    $config['next_tag_open'] = '<li class="next">';
    $config['next_tag_close'] = '</li> ';
    $config['prev_link'] = '<i class="icon-previous"></i>';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li> ';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li> ';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li> ';
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
    $data['data_get'] = $this->mymodel->ambil('tb_barang', $config["per_page"], $page);
    $data["pagt"] = $this->pagination->create_links();
    $data["nomor"] = $page;
    if($data["nomor"]==""){
        $data["nomor"]="0";
    }

		$this->load->view('Gudang/DataBarang',$data);
		$this->load->view('library/Menu-Footer');   
	}
    public function Delete($id)
    {
        $where="kode_barang ='$id'";
        $photo = $this->mymodel->link_photo($id);
        if ($photo->num_rows() > 0)
        {
            $row = $photo->row();
            $file_photo = $row->photo_url;
           if($file_photo!="default.jpg"){
                $path_file = './img/photo/';
                unlink($path_file.$file_photo);
            }   
        }
        $del = $this->mymodel->hapus('tb_barang',$where);
        if($del>=1){
            $pesannya="Stok berhasil dihapus!";
            $this->session->set_flashdata('Pesan',$pesannya);
            $this->session->set_flashdata('Pad','padding5');
            $this->session->set_flashdata('Color','ribbed-Orange'); 
            redirect('Gudang/Barang');
        }else{
            echo "<h2>Hapus Gagal!</h2>";
            redirect('Gudang/Barang');
        }
    }
    public function Tambah()
	{
        $user['user'] = "Gudang";
        $data = $this->mymodel->tampil('tb_supplier');
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Gudang/TambahStokBarang');
		$this->load->view('library/Menu-Footer');   
	}
    public function Set_Add()
    {
        $foto = $_FILES['userfile']['name'];
        
        if(!empty($_POST['defaultFoto'])||($foto=="")){
            $nama_foto = "default.jpg";
        }else{
            //print_r($_POST);
        // Konfigurasi Upload Gambar
       
       $config['upload_path'] = './img/photo/'; 
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
        $config['max_size'] = '1000'; 
        $config['max_width'] = '1920'; 
        $config['max_height'] = '1280'; 
        $this->load->library('upload', $config); 
        if(!$this->upload->do_upload()){ 
            $this->upload->display_errors(); 
        }else{ 
            $fInfo = $this->upload->data(); //uploading
            $this->gallery_path = realpath(APPPATH . '../img/photo/');//fetching path

        $config1 = array(
            'source_image' => $fInfo['full_path'], //get original image
            'new_image' => $this->gallery_path.'/thumbs', //save as new image //need to create thumbs first
            'maintain_ratio' => true,
            'width' => 150,
            'height' => 100
       
        );
        $this->load->library('image_lib', $config1); //load library
        $this->image_lib->resize(); //generating thumb

        $nama_foto=$fInfo['file_name'];
        }
        }
        
        $nama=$_POST['nama'];
        $berat=$_POST['berat'];
        $kategori=$_POST['kategori'];
        $satuan=$_POST['satuan'];
        $jumlah=$_POST['jumlahstok'];
        $harga=$_POST['harga'];
        //$kadaluarsa=$_POST['kadaluarsa'];
        $supplier=$_POST['supplier'];
        $judul = $this->input->post('judul',TRUE);
         $attribut=array(
            'nama_barang'=>$nama,
            'id_berat'=>$berat,
            'id_kategori'=>$kategori,
            'id_satuan'=>$satuan,
            'jumlah_stok'=>$jumlah,
            'harga'=>$harga,
            'photo_url'=>$nama_foto,
           // 'kadaluarsa'=>$kadaluarsa,
            'id_supplier'=>$supplier
        );
        $res=$this->mymodel->tambah('tb_barang',$attribut);
        if($res>=1){
            $this->session->set_flashdata('Pesan','Berhasil Ditambahkan!');
            $this->session->set_flashdata('Pad','padding5');
            $this->session->set_flashdata('Color','ribbed-blue');
			$iduser=$_SESSION['kode_user'];
        	$aktifitas="Menambah Barang";
       		$tanggal=date('Y-m-d');
       		$waktu=date("H:i:s");   
			$datalogs=array(
				'id_user'=>$iduser,
        	    'aktifitas'=>$aktifitas,
        	    'tanggal'=>$tanggal,
        	    'waktu'=>$waktu,
			);
		 $res = $this->mymodel->tambah('qw_logs', $datalogs); 
            redirect('Gudang/Barang/Tambah');
        }else{
            echo "<h2>Gagal ditambahkan!</h2>";
        }
    }
    public function Edit($id)
	{
        if(empty($id)){
            redirect('Gudang/Barang');
        }
        $user['user'] = "Gudang";
        $data=$this->mymodel->tampil("qw_barang WHERE kode_barang='$id'");
        $this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Gudang/EditStokBarang',array('data' => $data));
		$this->load->view('library/Menu-Footer'); 
	}
    public function GantiFoto($id)
	{
        if(empty($id)){
            redirect('Gudang/Barang');
        }
        $user['user'] = "Gudang";
        $data=$this->mymodel->tampil("qw_barang WHERE kode_barang='$id'");
        $this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Gudang/GantiGambarStok',array('data' => $data));
		$this->load->view('library/Menu-Footer'); 
	}
    public function Update($id)
    {
        $nama=$_POST['nama'];
        $berat=$_POST['berat'];
        $kategori=$_POST['kategori'];
        $satuan=$_POST['satuan'];
        $jumlah=$_POST['jumlahstok'];
        $harga=$_POST['harga'];
       // $kadaluarsa=$_POST['kadaluarsa'];
        $supplier=$_POST['supplier'];
        $attribut=array(
            'nama_barang'=>$nama,
            'id_berat'=>$berat,
            'id_kategori'=>$kategori,
            'id_satuan'=>$satuan,
            'jumlah_stok'=>$jumlah,
            'harga'=>$harga,
         //   'kadaluarsa'=>$kadaluarsa,
            'id_supplier'=>$supplier
        );
        $where="kode_barang ='$id'";
        $res=$this->mymodel->ubah('tb_barang',$attribut,$where);
        if($res>=1){
            $pesannya="Stok berhasil diupdate!";
            $this->session->set_flashdata('Pesan',$pesannya);
            $this->session->set_flashdata('Pad','padding5');
            $this->session->set_flashdata('Color','ribbed-Green'); 
			$iduser=$_SESSION['kode_user'];
       		$aktifitas="Memperbarui Data Barang";
      		$tanggal=date('Y-m-d');
      		$waktu=date("H:i:s");   
			$datalogs=array(
				'id_user'=>$iduser,
        	    'aktifitas'=>$aktifitas,
       		    'tanggal'=>$tanggal,
        	    'waktu'=>$waktu,
			);
		 $reslogs = $this->mymodel->tambah('qw_logs', $datalogs);
            redirect('Gudang/Barang');
        }else{
            echo "<h2>Update Gagal!</h2>";
        }
    }
    public function PilihBarang(){
        $user['user'] = "Gudang";
        $data = $this->mymodel->tampil('qw_barang');
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Gudang/TukarBarang',array('data' => $data));
		$this->load->view('library/Menu-Footer');
    }
    public function TukarBarang($id){
        if(empty($id)){
            redirect('Gudang/Barang/PilihBarang');
        }
        $user['user'] = "Gudang";
        $data=$this->mymodel->tampil("qw_barang WHERE kode_barang='$id'");
        $this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Gudang/TukarBarang2',array('data' => $data));
		$this->load->view('library/Menu-Footer'); 
    }
    public function set_penukaran($id){
        
        $sqlcek=$this->db->query("SELECT * FROM tb_barang WHERE kode_barang ='$id'")->result();
        
        foreach($sqlcek as $att1){
            $kode_barang = $att1->kode_barang;
            $stok_awal = $att1->jumlah_stok;
           // $kadaluarsa_awal = $att1->kadaluarsa;
            $id_supplier = $att1->id_supplier;
        }
        
        $jumlah=$_POST['jumlahstok'];
        //$kadaluarsa=$_POST['kadaluarsa'];
        $attribut=array(
            'jumlah_stok'=>$jumlah,
          //  'kadaluarsa'=>$kadaluarsa
        );
		
        $where="kode_barang ='$id'";
		
        $res=$this->mymodel->ubah('tb_barang',$attribut,$where);
        if($res>=1){
            $attribut2=array(
                'kode_barang'=>$id,
                'stok_awal'=>$stok_awal,
                'stok_baru'=>$jumlah,
          //      'kadaluarsa_awal'=>$kadaluarsa_awal,
            //    'kadaluarsa_baru'=>$kadaluarsa,
                'id_supplier'=>$id_supplier,
                'tanggal'=>date('Y-m-d')
            );
            $this->mymodel->tambah('tb_tukar_stok',$attribut2);
            $pesannya="Stok berhasil disimpan!";
            $this->session->set_flashdata('Pesan',$pesannya);
            $this->session->set_flashdata('Pad','padding5');
            $this->session->set_flashdata('Color','ribbed-Green'); 
			$iduser=$_SESSION['kode_user'];
       		$aktifitas="Melakukan Transaksi Penukaran Barang";
       		$tanggal=date('Y-m-d');
       		$waktu=date("H:i:s");   
			$datalogs=array(
				'id_user'=>$iduser,
        	    'aktifitas'=>$aktifitas,
        	    'tanggal'=>$tanggal,
        	    'waktu'=>$waktu,
			);
		 	$reslogs = $this->mymodel->tambah('qw_logs', $datalogs);
            redirect('Gudang/Barang/PilihBarang');
        }else{
            echo "<h2>Gagal!</h2>";
        }
    }
    public function set_gantiGambar($id_photo){
    $photo = $this->mymodel->link_photo($id_photo);

	   if ($photo->num_rows() > 0)
	   {
	
          $row = $photo->row();
				
		  $file_photo = $row->photo_url;
           
           $data = array(
            'photo_url'=>$file_photo
            );
           if($file_photo!="default.jpg"){
                $path_file = './img/photo/';
                unlink($path_file.$file_photo);
                $path_file2 = './img/photo/thumbs/';
                unlink($path_file2.$file_photo);
            }   

        $config['upload_path'] = './img/photo/'; 
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
        $config['max_size'] = '1000'; 
        $config['max_width'] = '1920'; 
        $config['max_height'] = '1280'; 
        $this->load->library('upload', $config); 
        if(!$this->upload->do_upload()){ 
            $this->upload->display_errors(); 
        }else{ 
            $fInfo = $this->upload->data(); //uploading
            $this->gallery_path = realpath(APPPATH . '../img/photo/');//fetching path

        $config1 = array(
            'source_image' => $fInfo['full_path'], //get original image
            'new_image' => $this->gallery_path.'/thumbs', //save as new image //need to create thumbs first
            'maintain_ratio' => true,
            'width' => 150,
            'height' => 100
       
        );
    $this->load->library('image_lib', $config1); //load library
    $this->image_lib->resize(); //generating thumb

    $imagename=$fInfo['file_name'];

        $attribut=array(
            'photo_url'=>$imagename
        );
              $res=$this->mymodel->ubah('tb_barang',$attribut,"kode_barang ='$id_photo'");
             if($res>=1){
                 $this->session->set_flashdata('Pesan','Gambar Berhasil di Update!');
                 $this->session->set_flashdata('Pad','padding5');
                 $this->session->set_flashdata('Color','ribbed-blue'); 
				 $iduser=$_SESSION['kode_user'];
       			 $aktifitas="Mengganti Gambar Barang";
       			 $tanggal=date('Y-m-d');
       			 $waktu=date("H:i:s");   
				$datalogs=array(
					'id_user'=>$iduser,
            		'aktifitas'=>$aktifitas,
            		'tanggal'=>$tanggal,
            		'waktu'=>$waktu,
				);
				 $res = $this->mymodel->tambah('qw_logs', $datalogs);
                 redirect('Gudang/Barang','refresh');
             }else{
                 echo "<h2>Gagal diubah!</h2>";
             }
            }
        }   
    } 
    public function details($id){
        if(empty($id)){
            redirect('Gudang/Barang');
        }
        $user['user'] = "Gudang";
        $data=$this->mymodel->tampil("qw_barang WHERE kode_barang='$id'");
        $this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Gudang/DetailBarang',array('data' => $data));
		$this->load->view('library/Menu-Footer'); 
    }
}
    