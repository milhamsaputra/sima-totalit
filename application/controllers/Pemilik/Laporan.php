<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Laporan extends CI_Controller {
	public function penjualanHariIni()
    {
        $user['user'] = "Pemilik";
        $hariIni=date('Y-m-d');
        $data['data1'] = $this->mymodel->tampil("tb_transaksi_jual WHERE tanggal ='$hariIni'");
        //$data['data2'] = $this->db->query("SELECT sum(total_harga) as pendapatan FROM tb_transaksi_jual WHERE tanggal ='$hariIni'");
		$this->load->view('library/requirements');
		$this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
		$this->load->view('Laporan/penjualanHariIni',$data);
		$this->load->view('library/Menu-Footer');
    
	}
    public function PrintFakturTransaksi($id_transaksi)
	{
        $user['user'] = "Pemilik";
        $data['data1']=$this->mymodel->tampil("tb_transaksi_jual WHERE id_transaksi = '$id_transaksi'");
        $data['data2']=$this->mymodel->tampil("tb_cart_transaksi WHERE id_transaksi = '$id_transaksi'");
		$this->load->view('Laporan/Print/FakturPenjualanBarang',$data);
	}
    public function PrintPersediaanBarang(){
        $user['user'] = "Pemilik";
        $data['data1']=$this->mymodel->tampil("tb_barang");
        $this->load->view('Laporan/Print/persediaanBarang',$data);
    }
    public function PrintDataSupplier(){
        $user['user'] = "Pemilik";
        $data['data1']=$this->mymodel->tampil("tb_supplier");
        $this->load->view('Laporan/Print/DataSupplier',$data);
	}
	
	function DataSuppliertopdf () {
		
    	    //this data will be passed on to the view
    	    $data['the_content'] = 'mPDF and CodeIgniter are cool!';
			//load the view, pass the variable and do not show it but "save" the output into $html variable
    	    $data = array(
        	    'Laporan/Print/DataSupplier' => $this->mymodel->tampil("tb_supplier"),
			
        	);
        	$html = $this->load->view('Laporan/Print/DataSupplier', $data, true);

			//this the the PDF filename that user will get to download
	        $pdfFilePath = "Data Supplier.pdf";

			//load mPDF library
   		    $this->load->library('m_pdf');
			//actually, you can pass mPDF parameter on this load() function
	        $pdf = $this->m_pdf->load();
			//generate the PDF!
    	    $pdf->WriteHTML($html);
			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
        	$pdf->Output($pdfFilePath, "D");
	    	
		}
	
	
    public function LaporanTukarBarang(){
        $user['user'] = "Pemilik";
        $data['data1'] = $this->mymodel->tampil("qw_penukaran_stok");
        $this->load->view('library/requirements');
        $this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
        $this->load->view('Laporan/RiwayatPenukaranBarang',$data);
        $this->load->view('library/Menu-Footer');
    }
	
	public function LaporanPenjualanBarang()
    {
        $user['user'] = "Pemilik";
        $this->load->view('library/requirements');
        $this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
        $this->load->view('Laporan/PenjualanAntarTanggal1');
        $this->load->view('library/Menu-Footer');
    }
    public function LaporanPenjualanBarang2()
    {
        $tanggal1=$_POST['tanggal1'];
        $tanggal2=$_POST['tanggal2'];
        if((empty($tanggal1))or(empty($tanggal2))){
            redirect('Pemilik/Laporan/LaporanPenjualanBarang');
        }
        $data['data1']=$this->mymodel->tampil("tb_transaksi_jual WHERE tanggal BETWEEN '".$tanggal1."' and '".$tanggal2."' ");
        $user['user'] = "Pemilik";
        $this->load->view('library/requirements');
        $this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
        $this->load->view('Laporan/PenjualanAntarTanggal3',$data);
        $this->load->view('library/Menu-Footer');
    }
	
	
    /* public function PrintPenjualanBarang2()
    {
        $tanggal1=$_POST['tanggal1'];
        $tanggal2=$_POST['tanggal2'];
        if((empty($tanggal1))or(empty($tanggal2))){
            redirect('Pemilik/Laporan/Print/PenjualanBarang');
        }
        $data['data1']=$this->mymodel->tampil("tb_transaksi_jual WHERE tanggal BETWEEN '".$tanggal1."' and '".$tanggal2."' ");
        $user['user'] = "Admin";
        $this->load->view('library/requirements');
        $this->load->view('library/Menu-Header',$user);
        $this->load->view('library/Menu-Header2');
        $this->load->view('Laporan/Print/PenjualanBarang2',$data);
        $this->load->view('library/Menu-Footer');
    } */
}
